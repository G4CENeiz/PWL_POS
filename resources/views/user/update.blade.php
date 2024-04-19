@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Edit')
{{-- Content Body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit user</h3>
            </div>

            <form action="{{ route('user.edit', $data->user_id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}   
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="{{ $data->username }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input type="number" name="level_id" id="level_id" class="form-control" placeholder="Masukkan Level ID" value="{{ $data->level_id }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection