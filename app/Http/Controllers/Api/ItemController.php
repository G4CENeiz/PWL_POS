<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index() {
        return BarangModel::all();
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'kategori_id'   => 'required',
            'barang_kode'   => 'required',
            'barang_nama'   => 'required',
            'harga_beli'    => 'required',
            'harga_jual'    => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $item = BarangModel::create([
            'kategori_id'   => $request->kategori_id,
            'barang_kode'   => $request->barang_kode,
            'barang_nama'   => $request->barang_nama,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual,
            'image'  => $request->image->hashName(),
        ]);

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item,
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
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
