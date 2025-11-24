<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeCrudProyek extends Command
{
    protected $signature = 'make:crud:proyek';
    protected $description = 'Generate CRUD untuk tabel proyek (model, migration, controller, route)';

    public function handle()
    {
        $name = 'Proyek';
        $table = 'proyek';
        $modelFqn = "App\\Models\\{$name}";

        $fields = [
            ['name' => 'kode_proyek', 'type' => 'string', 'unique' => true],
            ['name' => 'nama_proyek', 'type' => 'string'],
            ['name' => 'tahun', 'type' => 'integer'],
            ['name' => 'lokasi', 'type' => 'string'],
            ['name' => 'anggaran', 'type' => 'decimal', 'params' => '(15,2)'],
            ['name' => 'sumber_dana', 'type' => 'string'],
            ['name' => 'deskripsi', 'type' => 'text', 'nullable' => true],
        ];

        // 1. Buat model + migration
        $this->call('make:model', [
            'name' => $name,
            '--migration' => true,
        ]);

        // 2. Update migration
        $this->updateMigration($table, $fields);

        // 3. Buat controller
        $this->call('make:controller', [
            'name' => "{$name}Controller",
            '--resource' => true,
        ]);

        $this->updateController($name, $table, $modelFqn);

        // 4. Tambahkan route
        $this->appendRoute($name, $table);

        $this->info("CRUD {$name} berhasil dibuat!");
    }

    protected function updateMigration($table, $fields)
    {
        $migrations = File::files(database_path('migrations'));
        $targetFile = null;
        foreach ($migrations as $migration) {
            if (str_contains($migration->getFilename(), "create_{$table}_table")) {
                $targetFile = $migration->getPathname();
                break;
            }
        }

        if (!$targetFile) {
            $this->error('Migration tidak ditemukan!');
            return;
        }

        $fieldsMigration = "";
        foreach ($fields as $field) {
            $param = $field['params'] ?? '';
            $nullable = isset($field['nullable']) && $field['nullable'] ? "->nullable()" : "";
            $unique = isset($field['unique']) && $field['unique'] ? "->unique()" : "";
            $fieldsMigration .= "\$table->{$field['type']}('{$field['name']}'{$param}){$unique}{$nullable};\n            ";
        }

        $stub = <<<PHP
public function up(): void
{
    Schema::create('$table', function (Blueprint \$table) {
        \$table->bigIncrements('proyek_id');
        {$fieldsMigration}\$table->timestamps();
    });
}
PHP;

        $content = File::get($targetFile);
        $content = preg_replace('/public function up\(\): void\s*\{[\s\S]*?\}/', $stub, $content);
        File::put($targetFile, $content);
    }

    protected function updateController($name, $table, $modelFqn)
    {
        $controllerPath = app_path("Http/Controllers/{$name}Controller.php");
        $modelVar = Str::camel($name);
        $modelVarPlural = Str::plural($modelVar);

        $rules = <<<PHP
'kode_proyek' => 'required|string|max:50',
'nama_proyek' => 'required|string|max:255',
'tahun'       => 'required|numeric',
'lokasi'      => 'required|string|max:255',
'anggaran'    => 'required|numeric',
'sumber_dana' => 'required|string|max:255',
'deskripsi'   => 'nullable|string',
PHP;

        $controllerTemplate = <<<PHP
<?php

namespace App\Http\Controllers;

use $modelFqn;
use Illuminate\Http\Request;

class {$name}Controller extends Controller
{
    public function index()
    {
        \${$modelVarPlural} = {$name}::latest()->paginate(10);
        return view('admin.proyek.index', compact('{$modelVarPlural}'));
    }

    public function create()
    {
        return view('admin.proyek.create');
    }

    public function store(Request \$request)
    {
        \$data = \$request->validate([
            {$rules}
        ]);

        {$name}::create(\$data);

        return redirect()->route('{$table}.index')->with('success', '{$name} berhasil ditambahkan.');
    }

    public function edit({$name} \${$modelVar})
    {
        return view('admin.proyek.edit', compact('{$modelVar}'));
    }

    public function update(Request \$request, {$name} \${$modelVar})
    {
        \$data = \$request->validate([
            {$rules}
        ]);

        \${$modelVar}->update(\$data);

        return redirect()->route('{$table}.index')->with('success', '{$name} berhasil diperbarui.');
    }

    public function destroy({$name} \${$modelVar})
    {
        \${$modelVar}->delete();
        return redirect()->route('{$table}.index')->with('success', '{$name} berhasil dihapus.');
    }
}
PHP;

        File::put($controllerPath, $controllerTemplate);
    }

    protected function appendRoute($name, $table)
    {
        $routePath = base_path('routes/web.php');
        $route = "Route::resource('{$table}', \\App\\Http\\Controllers\\{$name}Controller::class);\n";
        File::append($routePath, $route);
    }
}
