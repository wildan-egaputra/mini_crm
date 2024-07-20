<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperadminUserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna dari tabel users
        return view('superadmin.users.index', compact('users')); // Mengembalikan data ke view
    }
}
