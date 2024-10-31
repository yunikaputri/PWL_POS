<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Method untuk mendapatkan semua data kategori
    public function index()
    {
        return KategoriModel::all();
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $kategori = KategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }

    // Method untuk menampilkan data kategori tertentu
    public function show(KategoriModel $kategori)
    {
        return response()->json($kategori);
    }

    // Method untuk memperbarui data kategori
    public function update(Request $request, KategoriModel $kategori)
    {
        $kategori->update($request->all());
        return response()->json($kategori);
    }

    // Method untuk menghapus data kategori
    public function destroy(KategoriModel $kategori)
    {
        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ], 200);
    }
}
