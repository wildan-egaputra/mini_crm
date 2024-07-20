<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Company; // Pastikan modelnya bernama Company
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiCompaniesController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $companies = companies::latest()->paginate(10);

        return view('pegawai.companies.index', compact('companies'));
        
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
     * store
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'logo'      => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'website'   => 'required|url'
        ]);

        // Upload logo
        $logo = $request->file('logo');
        $logo->storeAs('public/companies', $logo->hashName());

        // Create company
        companies::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'logo'      => $logo->hashName(),
            'website'   => $request->website
        ]);

        // Redirect to index
        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
