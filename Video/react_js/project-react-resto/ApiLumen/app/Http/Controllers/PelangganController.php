<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all());
    }

    public function show($id)
    {
        return response()->json(Pelanggan::find($id));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pelanggan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email|unique:pelanggans',
            'password' => 'required'
        ]);

        $pelanggan = Pelanggan::create([
            'pelanggan' => $request->pelanggan,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => app('hash')->make($request->password)
        ]);

        return response()->json($pelanggan, 201);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $this->validate($request, [
            'pelanggan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email|unique:pelanggans,email,' . $id,
            'password' => 'required'
        ]);

        $pelanggan->update([
            'pelanggan' => $request->pelanggan,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => app('hash')->make($request->password)
        ]);

        return response()->json($pelanggan, 200);
    }

    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}