<?php
namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiDivisiController extends Controller
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
        return view('pegawai.divisi.create', compact('employes'));
    }

    /**
     * Menampilkan daftar divisi
     *
     * @return View
     */
    public function index(): View
    {
        $divisions = Divisi::latest()->paginate(10);
        return view('pegawai.divisi.index', compact('divisions'));
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
        return view('pegawai.divisi.show', compact('divisi'));
    }
}
