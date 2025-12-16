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

        try {
            $stats = [
                'proyek' => Proyek::count(),
                'tahapan' => TahapanProyek::count(),
                'users' => User::count(),
                'kontraktor' => $this->safeCount(Kontraktor::class),
                'progres' => $this->safeCount(ProgresProyek::class),
                'lokasi' => $this->safeCount(LokasiProyek::class),
            ];
        } catch (\Exception $e) {
            // Jika ada error dengan database, set default values
            $stats = [
                'proyek' => 0,
                'tahapan' => 0,
                'users' => User::count(), // User pasti ada karena baru register
                'kontraktor' => 0,
                'progres' => 0,
                'lokasi' => 0,
            ];
        }

        return view('admin.dashboard', compact('stats'));
    }

    private function safeCount($modelClass)
    {
        try {
            return $modelClass::count();
        } catch (\Exception $e) {
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
