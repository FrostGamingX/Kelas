@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ route('admin.menu.create') }}" class="btn btn-danger w-100 p-3">
                Tambah Menu Baru
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/menu') }}" class="btn btn-warning w-100 p-3">
                Lihat Semua Menu
            </a>
        </div>

        {{-- Tambahan fungsi lainnya --}}
        {{-- 
        <div class="col-md-4">
            <a href="{{ route('admin.banner') }}" class="btn btn-info w-100 p-3">
                Kelola Banner
            </a>
        </div>
        --}}
    </div>
</div>
@endsection
