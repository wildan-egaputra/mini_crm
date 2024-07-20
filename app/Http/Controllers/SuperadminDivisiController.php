<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SuperadminDivisiController extends Controller
{
    // Method lainnya...

    /**
     * Menampilkan form untuk menambahkan divisi baru
     *
     * @return View
     */
    public function create(): View
    {
        $employes = Employe::all();
        return view('superadmin.divisi.create', compact('employes'));
    }

    /**
     * Menampilkan daftar divisi
     *
     * @return View
     */
    public function index(): View
    {
        $divisions = Divisi::latest()->paginate(10);
        return view('superadmin.divisi.index', compact('divisions'));
    }

    /**
     * Menyimpan data divisi baru
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'name' => 'required|unique:divisi,name',
            'employes' => 'array',
            'employes.*' => 'exists:employe,id',
        ]);

        // Simpan data divisi baru
        $divisi = Divisi::create([
            'name' => $request->name,
        ]);

        // Simpan relasi employes dengan divisi
        $divisi->employes()->attach($request->employes);

        return redirect('superadmin/divisi')->with('success', 'Data divisi berhasil disimpan');
    }

    /**
     * Menampilkan detail divisi beserta employe yang terkait
     *
     * @param  Divisi  $divisi
     * @return View
     */
    public function show(Divisi $divisi): View
    {
        // Memuat relasi employes
        $divisi->load('employes');
        return view('superadmin.divisi.show', compact('divisi'));
    }

    /**
     * Menampilkan form untuk mengedit divisi
     *
     * @param  Divisi  $divisi
     * @return View
     */
    public function edit(Divisi $divisi): View
    {
        $employes = Employe::all();
        $divisi->load('employes'); // Memuat relasi employes
        return view('superadmin.divisi.edit', compact('divisi', 'employes'));
    }

    /**
     * Memperbarui data divisi yang ada
     *
     * @param  Request  $request
     * @param  Divisi  $divisi
     * @return RedirectResponse
     */
    public function update(Request $request, Divisi $divisi): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'name' => 'required|unique:divisi,name,' . $divisi->id,
            'employes' => 'array',
            'employes.*' => 'exists:employe,id',
        ]);

        // Perbarui data divisi
        $divisi->update([
            'name' => $request->name,
        ]);

        // Perbarui relasi employes dengan divisi
        $divisi->employes()->sync($request->employes);

        return redirect('superadmin/divisi')->with('success', 'Data divisi berhasil diperbarui');
    }

    /**
     * Menghapus divisi yang ada
     *
     * @param  Divisi  $divisi
     * @return RedirectResponse
     */
    public function destroy(Divisi $divisi): RedirectResponse
    {
        $divisi->delete();

        return redirect('superadmin/divisi')->with('success', 'Data divisi berhasil dihapus');
    }
}
