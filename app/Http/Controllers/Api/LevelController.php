<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelModel;

class LevelController extends Controller
{
    // Method untuk mendapatkan semua data level
    public function index()
    {
        return LevelModel::all();
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $level = LevelModel::create($request->all());
        return response()->json($level, 201);
    }

    // Method untuk menampilkan data level tertentu
    public function show(LevelModel $level)
    {
        return response()->json($level);
    }

    // Method untuk memperbarui data level
    public function update(Request $request, LevelModel $level)
    {
        $level->update($request->all());  
        return response()->json($level);
    }

    // Method untuk menghapus data level
    public function destroy(LevelModel $level)
    {
        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ], 200);
    }
}
