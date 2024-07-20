<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Company; // Pastikan modelnya bernama Company
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $companies = companies::latest()->paginate(10);

        return view('admin.companies.index', compact('companies'));
        
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.companies.create');
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

     /**
     * edit
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $company = companies::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * update
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $company = companies::findOrFail($id);

        // Validate form
        $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'logo'      => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'website'   => 'required|url'
        ]);

        // Check if logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo
            Storage::delete('public/companies/' . $company->logo);

            // Upload new logo
            $logo = $request->file('logo');
            $logo->storeAs('public/companies', $logo->hashName());

            // Update company with new logo
            $company->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'logo'      => $logo->hashName(),
                'website'   => $request->website
            ]);
        } else {
            // Update company without logo
            $company->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'website'   => $request->website
            ]);
        }

        // Redirect to index
        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
   /**
     * show
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        $company = companies::findOrFail($id);
        return view('admin.companies.show', compact('company'));
    }
    /**
 * destroy
 *
 * @param  int  $id
 * @return RedirectResponse
 */
public function destroy(int $id): RedirectResponse
{
    $company = companies::findOrFail($id);

    // Check if logo exists and delete it
    if ($company->logo && Storage::exists('public/companies/' . $company->logo)) {
        Storage::delete('public/companies/' . $company->logo);
    }

    // Delete company
    $company->delete();

    // Redirect to index
    return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Dihapus!']);
}
}
