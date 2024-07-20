<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('superadmin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('superadmin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|string|in:pegawai,admin,superadmin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('superadmin.users.index')->with('success', 'Pengguna baru berhasil disimpan');
    }

    public function edit(User $user): View
    {
        return view('superadmin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'usertype' => 'required|string|in:pegawai,admin,superadmin',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('superadmin.users.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('superadmin.users.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
