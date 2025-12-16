<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\TahapanProyek;
use App\Models\User;
use App\Models\Kontraktor;
use App\Models\ProgresProyek;
use App\Models\LokasiProyek;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('login');
        }

        // Hanya gunakan model yang pasti ada
        $stats = [
            'proyek' => $this->safeCount(Proyek::class),
            'tahapan' => $this->safeCount(TahapanProyek::class),
            'users' => $this->safeCount(User::class),
            'kontraktor' => $this->safeCount(Kontraktor::class),
            'progres' => $this->safeCount(ProgresProyek::class),
            'lokasi' => $this->safeCount(LokasiProyek::class),
        ];

        // Gunakan dashboard sederhana jika ada masalah dengan database
        if ($stats['proyek'] === 0 && $stats['tahapan'] === 0 && $stats['kontraktor'] === 0) {
            return view('admin.dashboard-simple', compact('stats'));
        }
        
        return view('admin.dashboard', compact('stats'));
    }

    private function safeCount($modelClass)
    {
        try {
            return $modelClass::count();
        } catch (\Exception $e) {
            // Jika tabel belum ada atau ada error, return 0
            \Log::warning("Error counting {$modelClass}: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
