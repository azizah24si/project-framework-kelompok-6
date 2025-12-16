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

        $stats = [
            'proyek' => Proyek::count(),
            'tahapan' => TahapanProyek::count(),
            'users' => User::count(),
            'kontraktor' => Kontraktor::count(),
            'progres' => ProgresProyek::count(),
            'lokasi' => LokasiProyek::count(),
        ];

        return view('admin.dashboard', compact('stats'));
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
