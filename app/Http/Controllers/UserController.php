<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //TAMBAH
        /*DB::insert('insert into m_level (level_id, level_kode, level_nama, created_at) values(?, ?, ?, ?)', ['4', 'CUS', 'Customer', now()]);
        return 'Insert data baru berhasil'; */

        // Tambah data user dengan Eloquent Model
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); //update data user

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_dua',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345'), // Hashing password sebelum disimpan
        // ];

        $data = [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345'), // Hashing password sebelum disimpan
        ];

        // Menambahkan data baru menggunakan metode Eloquent create
        UserModel::create($data);
        
        // UserModel::insert($data); // Tambahkan data ke tabel m_user

        // Coba akses model UserModel
        $user = UserModel::all(); // Ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}
