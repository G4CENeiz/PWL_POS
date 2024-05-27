<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
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

    public function store(StorePostRequest $request): RedirectResponse {
        $validated = $request->validated();

        $validated = $request->safe()->only(['kategori_kode','kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode','kategori_nama']);
        
        return redirect('/kategori');
    }

    public function update($id) {
        $data = KategoriModel::find($id);
        return view('kategori.update', ['data' => $data]);
    }
    
    public function edit(Request $request, $id) {
        $data = KategoriModel::find($id);
        $data->kategori_kode = $request->kategori_kode;
        $data->kategori_nama = $request->kategori_nama;
        $data->save();
        return redirect('/kategori');
    }
    
    public function delete($id) {
        $data = KategoriModel::find($id);
        $data->delete();
        return redirect('/kategori');
    }
}
