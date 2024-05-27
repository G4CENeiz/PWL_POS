@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Edit')
{{-- Content Body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Level</h3>
            </div>

            <form action="{{ route('level.edit', $data->level_id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}   
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeLevel">Kode Level</label>
                        <input type="text" name="kodeLevel" id="kodeLevel" class="form-control" placeholder="Masukkan Kode Level" value="{{ $data->level_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="namaLevel">Nama Level</label>
                        <input type="text" name="namaLevel" id="namaLevel" class="form-control" placeholder="Masukkan Nama Level" value="{{ $data->level_nama }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection