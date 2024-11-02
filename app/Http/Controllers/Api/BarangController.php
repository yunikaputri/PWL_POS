<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        // $barang = BarangModel::create($request->all());
        // return response()->json($barang, 201);

        // Set validation
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Ambil file gambar dari request
        $image = $request->file('image');

        // Create barang
        $barang = BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            // 'image' => $request->image
            'image' => $image->hashName(),
        ]);

        // Return response JSON if barang is created
        if ($barang) {
            return response()->json([
                'success' => true,
                'barang' => $barang,
            ], 201);
        }

        // Return JSON if insert process fails
        return response()->json([
            'success' => false,
        ], 409);
    }

    // Method untuk menampilkan data barang tertentu
    public function show(BarangModel $barang)
    {
        return response()->json($barang);
    }

    // Method untuk update data barang tertentu
    public function update(Request $request, BarangModel $barang)
    {
        $request->validate([
            'kategori_id' => ['sometimes', 'required', Rule::exists('m_kategori', 'kategori_id')],
            'barang_kode' => 'sometimes|required|string|max:10',
            'barang_nama' => 'sometimes|required|string|max:50',
            'harga_beli' => 'sometimes|required|numeric',
            'harga_jual' => 'sometimes|required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($barang->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('images/' . $barang->image);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $image->store('images', 'public');
            $data['image'] = $image->hashName();
        }

        $barang->update($data);

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