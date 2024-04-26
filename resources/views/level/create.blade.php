@extends('adminlte::page')
@section('title', 'Create Level')
@section('content_header')
    <h1>Create Level</h1>
@stop

@section('content')
<div class="card-body">
    <form>
        <div class="form-group">
            <label for="level_kode">Level Kode</label>
            <input type="text" class="form-control" id="level_kode" name="level_kode">
        </div>
        <div class="form-group">
            <label for="level_nama">Level Nama</label>
            <input type="text" class="form-control" id="level_nama" name="level_nama">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop