@extends('layouts.app')
@section('content')
<style>
    footer{
        position: absolute;
        bottom: 0;
        width: 100%
    }
</style>
<h2>Pesan Sekarang</h2>
<form>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama">
    </div>
    <div class="mb-3">
        <label for="menu" class="form-label">Pilih Menu</label>
        <select class="form-control" id="menu">
            <option>Ayam Goreng Original</option>
            <option>Ayam Goreng Pedas</option>
            <option>Paket Ayam + Nasi</option>
        </select>
    </div>
    <button type="submit" class="btn btn-danger">Pesan</button>
</form>
@endsection
