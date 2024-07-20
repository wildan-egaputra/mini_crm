<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiUserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna dari tabel users
        return view('pegawai.users.index', compact('users')); // Mengembalikan data ke view
    }
}
