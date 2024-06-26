<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar User ',
            'list' => ['Home', 'User']
        ];
        $activeMenu = 'user';
        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];
        $level = LevelModel::all();
        return view(
            'user.index', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
                'level' => $level,
            ]
        );
    }

    public function list(Request $request) {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level')->get();
        if ($request->level_id) {
            $users = $users->where('level_id', $request->level_id);
        }
        return DataTables::of($users)->addIndexColumn()->addColumn('action', function ($user) {
                $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/'.$user->user_id) . '">'
                . csrf_field()
                . method_field('DELETE')
                . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button>' 
                . '</form>';
                return $btn;
            })->rawColumns(['action'])->make(true);
    }

    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah User ',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $activeMenu = 'user';

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all();

        return view(
            'user.create', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
                'level' => $level
            ]
        );
    }

    public function store(Request $request) {
        $request->validate([
            'username'  =>  'required|string|min:3|unique:m_user,username',
            'nama'      =>  'required|string|max:100',
            'password'  =>  'required|min:5',
            'level_id'  =>  'required|integer',
        ]);
        
        UserModel::create([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => bcrypt($request->password),
            'level_id'  => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function show(string $id) {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User ',
            'list' => ['Home', 'User', 'Detail']
        ];

        $activeMenu = 'user';

        $page = (object) [
            'title' => 'Detail user'
        ];

        return view(
            'user.show', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
                'user' => $user
            ]
        );
    }

    public function edit(string $id) {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User ',
            'list' => ['Home', 'User', 'Edit']
        ];

        $activeMenu = 'user';

        $page = (object) [
            'title' => 'Edit user'
        ];

        return view(
            'user.edit', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
                'user' => $user,
                'level' => $level
            ]
        );
    }

    public function update(Request $request, $id) {
        $request->validate([
            'username'  =>  'required|string|min:3|unique:m_user,username,' . $id . ', user_id',
            'nama'      =>  'required|string|max:100',
            'password'  =>  'nullable|min:5',
            'level_id'  =>  'required|integer',
        ]);
        
        UserModel::find($id)->update([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id'  => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id) {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }
        try {
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat label lain yang terkait dengan data ini');
        }
    }
}
