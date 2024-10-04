<?php


namespace App\Http\Controllers;


use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;




class UserController extends Controller
{
    // Menampilkan halaman awal user
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


        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'), // Hashing password sebelum disimpan
        // ];


        // // Menambahkan data baru menggunakan metode Eloquent create
        // UserModel::create($data);
       
        // // UserModel::insert($data); // Tambahkan data ke tabel m_user


        // // Coba akses model UserModel
        // $user = UserModel::all(); // Ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);


        // $user = UserModel::find(1);
        // return view('user', ['data' => $user]);


        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data' => $user]);


        // $user = UserModel::findOr(4, ['username', 'nama'], function() {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);


        // $user = UserModel::findOr(20, ['username', 'nama'], function() {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);


        // $user = UserModel::findOrFail(1);
        // return view('user', ['data' => $user]);


        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // return view('user', ['data' => $user]);


        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user);
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //     ],
        // );
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);


        /*$user = UserModel::create(
            [
                'username' => 'manager55',
                'nama' => 'Manager55',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            ]);
           
            $user->username = 'manager56';


            $user->isDirty(); // true
            $user->isDirty('username'); // true
            $user->isDirty('nama'); // false
            $user->isDirty(['nama', 'username']); // true


            $user->isClean(); // false
            $user->isClean('username'); // false
            $user->isClean('nama'); // true
            $user->isClean(['nama', 'username']); // false


            $user->save();


            $user->isDirty(); // false
            $user->isClean(); // true
            dd($user->isDirty());
        */
       
        /*$user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);


        $user->username = 'manager12';


        $user->save();


        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama'); // false
        dd($user->wasChanged(['nama', 'username'])); // true
        */


        // $user = UserModel::all();
        // return view('user', ['data' => $user]);
       
        // $user = UserModel::with('level')->get();
        // dd($user);


        // $user = UserModel::with('level')->get();
        // return view('user', ['data' => $user]);


        $breadcrumb = (object)[
            'title' => 'Daftar user',
            'list' => ['Home', 'user'],
        ];


        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];


        $activeMenu = 'user'; //set menu yang aktif
        $level = LevelModel::all(); //ambil data level untuk filter level
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level ,'activeMenu' => $activeMenu]);
    }


    // // Method untuk menampilkan form tambah user
    // public function tambah()
    // {
    //     return view('user_tambah'); // Mengarahkan ke halaman form 'user_tambah'
    // }


    // // Method untuk menyimpan data pengguna baru
    // public function tambah_simpan(Request $request)
    // {
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id,
    //     ]);


    //     return redirect('/user');
    // }


    // // Method untuk mengubah data pengguna
    // public function ubah($id)
    // {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }


    // // Method untuk menyimpan data yang diubah
    // public function ubah_simpan($id, Request $request)
    // {
    //     $user = UserModel::find($id);


    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make('$request->password');
    //     $user->level_id = $request->level_id;


    //     $user->save();


    //     return redirect('/user');
    // }


    // // Method untuk menhapus data pengguna
    // public function hapus($id)
    // {
    //     $user = UserModel::find($id);
    //     $user->delete();


    //     return redirect('/user');
    // }


    // // Ambil data user dalam bentuk json untuk datatables
    // public function list(Request $request)
    // {
    //     $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
    //                 ->with('level');
       
    //     // Filter data user berdasarkan level_id
    //     if ($request->level_id){
    //         $users->where('level_id',$request->level_id);
    //     }
   
    //     return DataTables::of($users)
    //         // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
    //         ->addIndexColumn()  
    //         ->addColumn('aksi', function ($user) {  // menambahkan kolom aksi
    //             $btn  = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
    //             $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
    //             $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'">'
    //                     . csrf_field() . method_field('DELETE') .  
    //                     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';      
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
    //         ->make(true);
    // }


    // Ambil data user dalam bentuk json untuk datatables  
    public function list(Request $request)  
    {  
        // Memilih kolom yang diperlukan dari UserModel dan memuat data level yang terkait
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
                    ->with('level');
       
        // Memfilter pengguna berdasarkan level_id jika disediakan dalam permintaan
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }


        // Menyiapkan respons DataTables
        return DataTables::of($users)  
            ->addIndexColumn()  // Menambahkan kolom index (nama default: DT_RowIndex)  
            ->addColumn('aksi', function ($user) {  // Menambahkan kolom 'aksi'
                $btn  = '<button onclick="modalAction(\''.url('/user/' . $user->user_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id . '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button>';
               
                return $btn;  
            })  
            ->rawColumns(['aksi']) // Menyatakan bahwa kolom 'aksi' berisi HTML
            ->make(true);
    }


    // Menampilkan halaman form tambah user
    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];


        $page = (object) [
            'title' => 'Form Tambah User',
        ];


        $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // Set menu yang sedang aktif


        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }


    // Menyimpan data user baru
    public function store(Request $request) {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik ditabel m_user komol username
            'username' =>'required|string|min:3|unique:m_user,username',
            'nama' =>'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' =>'required|integer'
        ]);


        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' =>  bcrypt($request->password),
            'level_id' => $request->level_id
        ]);


        return redirect('/user')-> with('success', 'Data user berhasil dsimpan');
    }


    // Menampilkan detail user
    public function show(string $id)
    {
        // Mengambil data user beserta levelnya berdasarkan ID
        $user = UserModel::with('level')->find($id);


        // Menyiapkan breadcrumb untuk navigasi
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];


        // Menyiapkan informasi halaman
        $page = (object) [
            'title' => 'Detail user: ' . $user->nama // Menggunakan nama user untuk judul
        ];


        $activeMenu = 'user'; // Set menu yang sedang aktif


        // Mengembalikan view dengan data yang diperlukan
        return view('user.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }


    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();


        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];


        $page = (object) [
            'title' => 'Edit user'
        ];


        $activeMenu = 'user'; // set menu yang sedang aktif


        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }


    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter,
            // dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5', // password bisa diisi (minimal 5 karakter) dan bisa tidak diisi
            'level_id' => 'required|integer' // level_id harus diisi dan berupa angka
        ]);


        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);


        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }


    // Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }


        try {
            UserModel::destroy($id); // Hapus data user
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
   
    // Create Ajax
    public function create_ajax()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();


        return view('user.create_ajax')->with('level', $level);
    }


    // Mengakomodir proses simpan data melalui ajax
    public function store_ajax(Request $request) {
        // Cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:6'
            ];
   
            $validator = Validator::make($request->all(), $rules);
   
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // Response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(), // Pesan error validasi
                ]);
            }
   
            UserModel::create($request->all());
   
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
   
        // Jika bukan permintaan Ajax
        return response()->json([
            'status' => false,
            'message' => 'Permintaan tidak valid'
        ]);
    }


    // Menampilkan halaman form edit pengguna menggunakan AJAX
    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();


        return view('user.edit_ajax', ['user' => $user, 'level' => $level]);
    }


    // Mengakomodir request update data user melalui ajax
    public function update_ajax(Request $request, $id) {
        // Cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama'     => 'required|max:100',
                'password' => 'nullable|min:6|max:20'
            ];
   
            // Gunakan Illuminate\Support\Facades\Validator
            $validator = Validator::make($request->all(), $rules);
   
            if ($validator->fails()) {
                return response()->json([
                    'status'   => false, // respon json, true: berhasil, false: gagal
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }
   
            $user = UserModel::find($id);
            if ($user) {
                // Jika password tidak diisi, maka hapus dari request
                if (!$request->filled('password')) {
                    $request->request->remove('password');
                }
   
                $user->update($request->all()); // Update data pengguna
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
   
        return redirect('/'); // Jika bukan request AJAX, redirect ke halaman beranda
    }    
}
