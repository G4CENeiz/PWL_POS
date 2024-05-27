<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StoreUserRequest;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable) {
        return $dataTable->render('user.index');
    }

    public function tambah() {
        return view('user.create');
    }

    public function tambah_simpan(StoreUserRequest $request): RedirectResponse {

        $validated = $request->validated();
        
        UserModel::create([
            'username' => $validated['username'],
            'nama' => $validated['nama'],
            'password' => Hash::make($validated['password']),
            'level_id' => $validated['level_id']
        ]);
        return redirect('/user');
    }

    public function ubah($id) {
        $user = UserModel::find($id);
        return view('user.update', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }

    public function hapus($id) {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
