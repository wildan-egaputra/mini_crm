<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Employe;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeController extends Controller
{
    /**
     * Menampilkan daftar employe
     *
     * @return View
     */
    public function index(): View
    {
        $employes = Employe::latest()->paginate(10);
        return view('admin.employe.index', compact('employes'));
    }

    /**
     * Menampilkan form untuk menambahkan employe baru
     *
     * @return View
     */
    public function create(): View
    {
        $companies = companies::all();
        return view('admin.employe.create', compact('companies'));
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

        return redirect('/admin/employe')->with('success', 'Data employe berhasil disimpan');
    }

    // ...

    /**
     * Menghapus data employe berdasarkan ID.
     *
     * @param  Employe  $employe
     * @return RedirectResponse
     */
    public function destroy(Employe $employe): RedirectResponse
    {
        $employe->delete();

        return redirect('/admin/employe')->with('success', 'Data employe berhasil dihapus');
    }

    /**
     * Menampilkan form untuk mengedit data employe berdasarkan ID.
     *
     * @param  Employe  $employe
     * @return View
     */
    public function edit(Employe $employe): View
    {
        $companies = Companies::all(); // Ambil semua perusahaan untuk dropdown
        return view('admin.employe.edit', compact('employe', 'companies'));
    }

    /**
     * Menyimpan perubahan data employe berdasarkan ID.
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

        return redirect('/admin/employe/')->with('success', 'Data employe berhasil diperbarui');
    }
}