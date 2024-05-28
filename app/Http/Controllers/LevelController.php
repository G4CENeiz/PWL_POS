<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Level ',
            'list' => ['Home', 'Level']
        ];
        $activeMenu = 'level';
        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];
        return view(
            'level.index', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
            ]
        );
    }

    public function list() {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama')->get();
        return DataTables::of($levels)->addIndexColumn()->addColumn('action', function ($level) {
                $btn = '<a href="'.url('/level/' . $level->level_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/level/' . $level->level_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/'.$level->level_id) . '">'
                . csrf_field()
                . method_field('DELETE')
                . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button>' 
                . '</form>';
                return $btn;
            })->rawColumns(['action'])->make(true);
    }

    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah Level ',
            'list' => ['Home', 'Level', 'Tambah']
        ];
        $activeMenu = 'level';
        $page = (object) [
            'title' => 'Tambah level baru'
        ];
        $level = LevelModel::all();
        return view(
            'level.create', 
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
            'level_kode'    =>  'required|string|max:10|unique:m_level,level_kode',
            'level_nama'    =>  'required|string|max:100',
        ]);
        LevelModel::create([
            'level_kode'    =>  $request->level_kode,
            'level_nama'    =>  $request->level_nama,
        ]);
        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    public function show(string $id) {
        $level = LevelModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Level ',
            'list' => ['Home', 'Level', 'Detail']
        ];
        $activeMenu = 'level';
        $page = (object) [
            'title' => 'Detail level'
        ];
        return view(
            'level.show', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
                'level' => $level
            ]
        );
    }

    public function edit(string $id) {
        $level = LevelModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Edit Level ',
            'list' => ['Home', 'Level', 'Edit']
        ];
        $activeMenu = 'level';
        $page = (object) [
            'title' => 'Edit level'
        ];
        return view(
            'level.edit', 
            [
                'breadcrumb' => $breadcrumb, 
                'activeMenu' => $activeMenu,
                'page' => $page,
                'level' => $level,
            ]
        );
    }

    public function update(Request $request, $id) {
        $request->validate([
            'level_kode'    =>  'required|string|max:10|unique:m_level,level_kode',
            'level_nama'    =>  'required|string|max:100',
        ]);
        
        LevelModel::find($id)->update([
            'level_kode'    =>  $request->level_kode,
            'level_nama'    =>  $request->level_nama,
        ]);
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy(string $id) {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }
        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat label lain yang terkait dengan data ini');
        }
    }
}
