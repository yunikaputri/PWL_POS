<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    // Method untuk mendapatkan semua data barang
    public function index()
    {
        return BarangModel::all();
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }

    // Method untuk menampilkan data barang tertentu
    public function show(BarangModel $barang)
    {
        return response()->json($barang);
    }

    // Method untuk memperbarui data barang
    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        return response()->json($barang);
    }

    // Method untuk menghapus data barang
    public function destroy(BarangModel $barang)
    {
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ], 200);
    }
}
