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
                'proyek' => $this->safeModelCount('App\Models\Proyek'),
                'tahapan' => $this->safeModelCount('App\Models\TahapanProyek'),
                'users' => $this->safeModelCount('App\Models\User'),
                'kontraktor' => $this->safeModelCount('App\Models\Kontraktor'),
                'progres' => $this->safeModelCount('App\Models\ProgresProyek'),
                'lokasi' => $this->safeModelCount('App\Models\LokasiProyek'),
            ];

            return view('admin.dashboard', compact('stats'));
            
        } catch (\Exception $e) {
            // Jika ada error, gunakan stats default
            $stats = [
                'proyek' => 0,
                'tahapan' => 0,
                'users' => 1, // Minimal ada 1 user yang login
                'kontraktor' => 0,
                'progres' => 0,
                'lokasi' => 0,
            ];
            
            // Log error untuk debugging
            \Log::error('Dashboard error: ' . $e->getMessage());
            
            return view('admin.dashboard', compact('stats'));
        }
    }

    private function safeModelCount($modelClass)
    {
        try {
            if (class_exists($modelClass)) {
                return $modelClass::count();
            }
            return 0;
        } catch (\Exception $e) {
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
