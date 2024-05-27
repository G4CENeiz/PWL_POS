<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Http\Requests\StoreLevelRequest;
use App\Models\LevelModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable) {
        return $dataTable->render('level.index');
    }

    public function create() {
        return view('level.create');
    }

    public function store(StoreLevelRequest $request): RedirectResponse {
        
        $validated = $request->validated();

        LevelModel::create([
            'level_kode' => $validated['level_kode'],
            'level_nama' => $validated['level_nama'],
        ]);

        return redirect('/level');
    }

    public function update($id) {
        $data = LevelModel::find($id);
        return view('level.update', ['data' => $data]);
    }

    public function edit(Request $request, $id) {
        $data = LevelModel::find($id);
        $data->level_kode = $request->level_kode;
        $data->level_nama = $request->level_nama;
        $data->save();
        return redirect('/level');
    }

    public function delete($id) {
        $data = LevelModel::find($id);
        $data->delete($id);
        return redirect('/kategori');
    }
}
