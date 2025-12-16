<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:super admin,admin',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => strtolower($validated['role']),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:super admin,admin',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => strtolower($validated['role']),
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $data['profile_photo_path'] = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Profil pengguna berhasil diperbarui.');
    }
}

