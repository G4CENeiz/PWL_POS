@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage User</div>
            <div class="card-body">
                <span class="container d-flex flex-row-reverse">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Add</a>
                </span>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{ $dataTable->scripts() }}
@endpush