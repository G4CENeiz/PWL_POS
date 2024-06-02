<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return BarangModel::all();
    }

    public function store(Request $request) {
        $item = BarangModel::create($request->all());
        return response()->json($item, 201);
    }

    public function show(BarangModel $item) {
        return BarangModel::find($item);
    }

    public function update(Request $request, BarangModel $item) {
        $item->update($request->all());
        return BarangModel::find($item);
    }

    public function destroy(BarangModel $item) {
        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
