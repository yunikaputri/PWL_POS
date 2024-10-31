<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Method untuk mendapatkan semua data user
    public function index()
    {
        return UserModel::all();
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $user = UserModel::create($request->all());
        return response()->json($user, 201);
    }

    // Method untuk menampilkan data user tertentu
    public function show(UserModel $user)
    {
        return response()->json($user);
    }

    // Method untuk memperbarui data user
    public function update(Request $request, UserModel $user)
    {
        $user->update($request->all());
        return response()->json($user);
    }

    // Method untuk menghapus data user
    public function destroy(UserModel $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ], 200);
    }
}
