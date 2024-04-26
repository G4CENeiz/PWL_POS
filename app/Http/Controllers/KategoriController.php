<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable) {
        return $dataTable->render('kategori.index');
    }

    public function create(): View {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validateWithBag('category', [
            'kategori_kode' => 'bail|required|unique:m_kategori',
            'kategori_nama' => 'required',
        ]);
        
        KategoriModel::create([
            'kategori_kode' => $validated['kategori_kode'],
            'kategori_nama' => $validated['kategori_nama']
        ]);
        
        // KategoriModel::create([
        //     'kategori_kode' => $request->kodeKategori,
        //     'kategori_nama' => $request->namaKategori
        // ]);
        
        return redirect('/kategori');
    }

    public function update($id) {
        $data = KategoriModel::find($id);
        return view('kategori.update', ['data' => $data]);
    }
    
    public function edit(Request $request, $id) {
        $data = KategoriModel::find($id);
        $data->kategori_kode = $request->kodeKategori;
        $data->kategori_nama = $request->namaKategori;
        $data->save();
        return redirect('/kategori');
    }
    
    public function delete($id) {
        $data = KategoriModel::find($id);
        $data->delete();
        return redirect('/kategori');
    }
}
