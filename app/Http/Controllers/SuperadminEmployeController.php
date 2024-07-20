<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Employe;
use App\Models\Company;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SuperadminEmployeController extends Controller
{
    /**
     * Menampilkan daftar employe
     *
     * @return View
     */
    public function index(): View
    {
        $employes = Employe::latest()->paginate(10);
        return view('superadmin.employe.index', compact('employes'));
    }

    /**
     * Menampilkan form untuk menambahkan employe baru
     *
     * @return View
     */
    public function create(): View
    {
        $companies = companies::all();
        $divisions = Divisi::all(); // Ambil semua data divisi dari model Division
    
        return view('superadmin.employe.create', compact('companies', 'divisions'));
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
            'companies_id' => 'required',
        ]);

        // Simpan data employe baru
        Employe::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'companies_id' => $request->companies_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect('superadmin/employe')->with('success', 'Data employe berhasil disimpan');
    }

    /**
     * Menampilkan form untuk mengedit data employe
     *
     * @param  Employe  $employe
     * @return View
     */
    public function edit(Employe $employe): View
    {
        $companies = companies::all();
        return view('superadmin.employe.edit', compact('employe', 'companies'));
    }

    /**
     * Mengupdate data employe yang sudah ada
     *
     * @param  Request  $request
     * @param  Employe  $employe
     * @return RedirectResponse
     */
    public function update(Request $request, Employe $employe): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'nama_depan' => 'required',
            'email' => 'required|email|unique:employe,email,' . $employe->id,
            'companies_id' => 'required',
        ]);

        // Update data employe
        $employe->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'companies_id' => $request->companies_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('superadmin.employe.index')->with('success', 'Data employe berhasil diperbarui');
    }

    /**
     * Menghapus data employe
     *
     * @param  Employe  $employe
     * @return RedirectResponse
     */
    public function destroy(Employe $employe): RedirectResponse
    {
        $employe->delete();
        return redirect()->route('superadmin.employe.index')->with('success', 'Data employe berhasil dihapus');
    }
}
