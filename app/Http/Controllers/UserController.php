<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    // public function index(){
    //Menambahkan data user dengan Eloquent Model
    // $data = [
    //     'username' => 'customer-1',
    //     'nama' => 'Pelanggan',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2
    // ];
    // UserModel::insert($data); 

    // $user = UserModel::all();
    // return view('user', ['data' => $user]);

    // $data = [
    //     'nama' => 'Pelanggan Pertama',
    // ];
    // UserModel::where('username', 'Customer-1')->update($data); 

    // mencoba mengakses model UserModel
    // $user = UserModel::all(); // Mengambil semua data dari tabel m_user
    // return view('user', ['data' => $user]);

    //praktikum 4
    // $data = [
    //     'level_id' => 2,
    //     'username' => 'manager_dua',
    //     'nama' => 'Manager 2',
    //     'password' => Hash::make('12345'),
    // ];
    // UserModel::create($data);

    // $user = UserModel::all();
    // return view('user', ['data' => $user]);

    // $user = UserModel::find(1);
    // return view('user', ['data' => $user]);

    //praktikum 2.1

    // $user = UserModel::Where('level_id', 1)->first();
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstWhere('level_id', 1);
    // return view('user', ['data' => $user]);

    // $user = UserModel::findOr(1, ['username', 'nama'], function (){
    //     abort(404);
    // });
    // return view('user', ['data' => $user]);

    // $user = UserModel::findOr(20, ['username', 'nama'], function (){
    //     abort(404);
    // });
    // return view('user', ['data' => $user]);

    //praktikum 2.2

    // $user = UserModel::findOrFail(1);
    // return view('user', ['data' => $user]);

    //praktikum  2.3

    // $user = UserModel::where('level_id', 2)->count();
    // return view('user', ['data' => $user]);

    //praktikum  2.4

    // $user = UserModel::firstOrCreate([
    //     'username' => 'manager',
    //     'nama' => 'Manager',
    // ]);
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstOrCreate([
    //         'username' => 'manager22',
    //         'nama' => 'Manager Dua Dua',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstOrNew([
    //         'username' => 'manager',
    //         'nama' => 'Manager',
    //     ],
    // );
    // return view('user', ['data' => $user]);

    // $user = UserModel::firstOrNew([
    //         'username' => 'manager33',
    //         'nama' => 'Manager Tiga Tiga',
    //         'password' =>  Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );
    // $user->save();
    // return view('user', ['data' => $user]);

    //praktikum  2.5

    // $user = UserModel::create([
    //     'username'=>'manager55',
    //     'nama'=>'Manager55',
    //     'password'=>Hash::make('12345'),
    //     'level_id'=>2
    // ]);

    // $user->username = 'manager56';

    // $user->isDirty();//true
    // $user->isDirty('username');//true
    // $user->isDirty('nama');//true
    // $user->isDirty(['nama','username']);//true

    // $user->isClean();//false
    // $user->isClean('username');//false
    // $user->isClean('nama');//false
    // $user->isClean(['nama','username']);//false

    // $user->save();

    // $user->isDirty();//false
    // $user->isClean();//true
    // dd($user->isDirty());

    // $user = UserModel::create([
    //     'username'=>'manager11',
    //     'nama'=>'Manager11',
    //     'password'=>Hash::make('12345'),
    //     'level_id'=>2
    // ]);

    // $user->username = 'manager12';

    // $user->save();

    // $user->wasChanged();//true
    // $user->wasChanged('username');//true
    // $user->wasChanged(['username','level_id']);//true
    // $user->wasChanged('nama');//false
    // dd($user->wasChanged(['nama','username']));//true

    //praktikum  2.6

    // $user = UserModel::all();
    // return view('user', ['data' => $user]);

    //praktikum 2.7

    // $user = UserModel::with('level')->get();
    // dd($user);

    //     $user = UserModel::with('level')->get();
    //     return view('user', ['data' => $user]);
    // }

    // public function tambah(){
    //     return view('user_tambah');
    // }

    // public function tambah_simpan(Request  $request){
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id
    //     ]);
    //     return redirect('/user');
    // }

    // public function ubah($id){
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }

    // public function ubah_simpan($id, Request $request){
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make('$request->password');
    //     $user->level_id = $request->level_id;

    //     $user->save();

    //     return redirect('/user');
    // }

    // public function hapus($id){
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar user',
            'list' =>[
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'Welcome', 'url' => url('/welcome')]
            ]
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; //set menu yang aktif
        $level = levelmodel::all(); //mengambil data level untuk filter levell
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'level' => $level]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        // Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }
        return DataTables::of($users)
            ->addIndexColumn()            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                                // $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btnsm">Detail</a> ';
                //                 $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                //                 $btn .= '<form class="d-inline-block" method="POST" action="' .
                //                     url('/user/' . $user->user_id) . '">'
                //                     . csrf_field() . method_field('DELETE') .
                //                     '<button type="submit" class="btn btn-danger btn-sm" onclick="return
                // confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';

                $btn = '<button onclick="modalAction(\'' . url('/user/' . $user->user_id .
                    '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id .
                    '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id .
                    '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' =>[
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'User', 'url' => url('/user')],
                ['name' => 'User', 'url' => url('/tambah')]
            ]
        ];

        $page = (object) [
            'title' => 'Form Tambah User',
        ];

        $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // Set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik ditabel m_user komol username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' =>  bcrypt($request->password),
        ]);

        return redirect('/user')->with('success', 'Data user berhasil dsimpan');
    }

    public function show(string $id)
    {
        $user = usermodel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail user',
            'list' =>[
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'User', 'url' => url('/user')],
                ['name' => 'User', 'url' => url('/detail')]
            ]
        ];

        $page = (object)[
            'title' => 'Detail user'
        ];

        $activeMenu = 'user';
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $user = usermodel::find($id);
        $level = levelmodel::all();

        $breadcrumb = (object)[
            'title' => 'Edit user',
            'list' =>[
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'User', 'url' => url('/user')],
                ['name' => 'User', 'url' => url('/edit')]
            ]
        ];

        $page = (object)[
            'title' => 'Edit User'
        ];

        $activeMenu = 'user';

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu, 'user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter,
            // dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);

        $user = UserModel::find($id);

        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = usermodel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            usermodel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dhapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('user.create_ajax')
            ->with('level', $level);
    }

    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:6'
            ];

            // use Illuminate\Support\Facades\vaidator
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            UserModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('user.edit_ajax', ['user' => $user, 'level' => $level]);
    }

    public function update_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'required|max:100',
                'password' => 'nullable|min:6|max:20'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }
            $check = UserModel::find($id);
            if ($check) {
                if (!$request->filled('password')) { // jika password tidak diisi, maka hapus dari request
                    $request->request->remove('password');
                }
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
    public function confirm_ajax(string $id)
    {
        $user = UserModel::find($id);

        return view('user.confirm_ajax', ['user' =>  $user]);
    }

    public function delete_ajax(Request  $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function show_ajax(string $id)
    {
        $user = UserModel::with('level')->find($id);

        return view('user.show_ajax', ['user' => $user]);
    }

    public function import()
    {
        return view('user.import');
    }
    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_user' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_user'); // ambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // load reader file excel
            $reader->setReadDataOnly(true); // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // load file excel
            $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
            $data = $sheet->toArray(null, false, true, true); // ambil data excel
            $insert = [];
            if (count($data) > 1) { // jika data lebih dari 1 baris
                foreach ($data as $baris => $value) {
                    if ($baris > 1) { // baris ke 1 adalah header, maka lewati
                        $insert[] = [
                            'level_id' => $value['A'],
                            'username' => $value['B'],
                            'nama' => $value['C'],
                            'password' => Hash::make($value['D']),
                            'created_at' => now(),
                        ];
                    }
                }
                if (count($insert) > 0) {
                    // insert data ke database, jika data sudah ada, maka diabaikan
                    UserModel::insertOrIgnore($insert);
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }

    public function export_excel() {
        // ambil data user yang akan di export
        $user = UserModel::select('user_id', 'level_id', 'username', 'nama', 'password')
            ->orderBy('level_id')
            ->with('level')
            ->get();
        
        // load libary excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Username');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Password');
        $sheet->setCellValue('E1', 'Level Pengguna');

        $sheet->getStyle('A1:E1')->getFont()->setBold(true); // bold header

        $no = 1;    // nomor data dimulai dari 1
        $baris = 2; // baris data dimulai dari 2
        foreach ($user as $key => $value) {
            $sheet->setCellValue('A'. $baris, $no);
            $sheet->setCellValue('B'. $baris, $value->username);
            $sheet->setCellValue('C'. $baris, $value->nama);
            $sheet->setCellValue('D'. $baris, $value->password);
            $sheet->setCellValue('E'. $baris, $value->level->level_nama); // ambil nama level
            $baris++;
            $no++;
        }

        foreach(range('A','E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); // set auto size untuk kolom
        }

        $sheet->setTitle('Data User'); // set title sheet
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data User '.date('Y-m-d H:i:s').'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        $writer->save('php://output'); // download file excel ke browser
        exit; // keluar proses
    } // end function export_excel

    public function export_pdf() {
        // ambil data user yang akan di export
        $user = UserModel::select('user_id', 'level_id', 'username', 'nama')
        ->orderBy('level_id')
        ->with('level')
        ->get();

        // use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = Pdf::loadView('user.export_pdf', ['user' => $user]);
        $pdf->setPaper('A4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render();

        return $pdf->stream('Data User '.date('Y-m-d H:i:s').'.pdf');
    }
}