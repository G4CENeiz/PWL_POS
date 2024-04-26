<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index() {
        $data = LevelModel::all();
        return view('level', ['data' => $data]);
    }

    public function create() {
        return view('level.create');
    }
}
