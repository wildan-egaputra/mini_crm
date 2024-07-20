<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Employe;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiEmployeController extends Controller
{
    /**
     * Menampilkan daftar employe
     *
     * @return View
     */
    public function index(): View
    {
        $employes = Employe::latest()->paginate(10);
        return view('pegawai.employe.index', compact('employes'));
    }

    /**
     * Menampilkan form untuk menambahkan employe baru
     *
     * @return View
     */
    public function create(): View
    {
        $companies = companies::all();
        return view('pegawai.employe.create', compact('companies'));
    }

    /**
     * Menyimpan data employe baru
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'nama_depan' => 'required',
            'email' => 'required|email|unique:employe,email',
            'companies_id' => 'nullable',
        ]);

        // Simpan data employe baru
        Employe::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'companies_id' => $request->companies_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('pegawai.employe.index')->with('success', 'Data employe berhasil disimpan');
    }
}