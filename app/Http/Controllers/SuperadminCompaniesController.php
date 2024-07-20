<?php
namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SuperadminCompaniesController extends Controller
{
    /**
     * Menampilkan daftar perusahaan
     *
     * @return View
     */
    public function index(): View
    {
        $companies = companies::latest()->paginate(10);
        return view('superadmin.companies.index', compact('companies'));
    }

    /**
     * Menampilkan form untuk menambahkan perusahaan baru
     *
     * @return View
     */
    public function create(): View
    {
        return view('superadmin.companies.create');
    }

    /**
     * Menyimpan data perusahaan baru
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'logo'      => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'website'   => 'required|url'
        ]);

        // Upload logo
        $logo = $request->file('logo');
        $logo->storeAs('public/companies', $logo->hashName());

        // Simpan data perusahaan baru
        companies::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'logo'      => $logo->hashName(),
            'website'   => $request->website
        ]);

        return redirect('superadmin/companies')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Menampilkan form untuk mengedit data perusahaan
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $company = companies::findOrFail($id);
        return view('superadmin.companies.edit', compact('company'));
    }

    /**
     * Memperbarui data perusahaan
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $company = companies::findOrFail($id);

        // Validasi data
        $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'logo'      => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'website'   => 'required|url'
        ]);

        // Periksa apakah ada logo yang diupload
        if ($request->hasFile('logo')) {
            // Hapus logo lama
            Storage::delete('public/companies/' . $company->logo);

            // Upload logo baru
            $logo = $request->file('logo');
            $logo->storeAs('public/companies', $logo->hashName());

            // Update data perusahaan dengan logo baru
            $company->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'logo'      => $logo->hashName(),
                'website'   => $request->website
            ]);
        } else {
            // Update data perusahaan tanpa logo
            $company->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'website'   => $request->website
            ]);
        }

        return redirect()->route('superadmin.companies.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Menampilkan detail perusahaan
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        $company = companies::findOrFail($id);
        return view('superadmin.companies.show', compact('company'));
    }

    /**
 * Menghapus data perusahaan dan logo-nya
 *
 * @param  int  $id
 * @return RedirectResponse
 */
public function destroy(int $id): RedirectResponse
{
    // Temukan perusahaan berdasarkan ID
    $company = companies::findOrFail($id);

    // Periksa apakah logo ada dan hapus jika ada
    if ($company->logo && Storage::exists('public/companies/' . $company->logo)) {
        // Hapus logo dari penyimpanan
        Storage::delete('public/companies/' . $company->logo);
    }

    // Hapus data perusahaan dari database
    $company->delete();

    // Redirect ke halaman daftar perusahaan dengan pesan sukses
    return redirect()->route('superadmin.companies.index')->with(['success' => 'Data Berhasil Dihapus!']);
}
}
