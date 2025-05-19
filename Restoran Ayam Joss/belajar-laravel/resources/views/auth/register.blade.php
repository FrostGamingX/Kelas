@extends('layouts.app')
@section('content')
<style>
    footer{
        position: absolute;
        bottom: 0;
        width: 100%
    }
</style>
<div class="container col-md-4 py-5">
    <h3 class="text-center mb-4">Register</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nama" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
        </div>
        <button class="btn btn-success w-100">Register</button>
    </form>
</div>
@endsection
