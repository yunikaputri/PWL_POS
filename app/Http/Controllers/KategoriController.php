<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory; 
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title'=>'Daftar kategori barang',
            'list'=>['Home','kategori']
        ];
        $page = (object)[
            'title'=>'Daftar kategori barang yang terdaftar dalam sistem '
        ];
        $activeMenu ='kategori';
        $kategori = kategorimodel::all();
        return view('kategori.index',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'kategori'=>$kategori]);
    }

    public function list(Request $request){
        $kategori = kategorimodel::select('kategori_id','kategori_kode','kategori_nama');
        if($request->kategori_id){
            $kategori->where('kategori_id',$request->kategori_id);
        }
        return DataTables::of($kategori)
        // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addIndexColumn()
        ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
            $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
                '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
                '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
                '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title'=>'Tambah kategori barang',
            'list'=>['Home','kategori','tambah']
        ];
        $page = (object)[
            'title'=>'Tambah kategori barang baru'
        ];
        $activeMenu = 'kategori';
        $kategori = kategorimodel::all();
        return view('kategori.create',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'kategori'=>$kategori]);
    }

    public function store(Request $request){
        $request->validate([
            'kategori_kode'=>'required|string|min:3|unique:m_kategori,kategori_kode',
            'kategori_nama'=>'required|string|max:100'
        ]);
        kategorimodel::create([
            'kategori_kode'=>$request->kategori_kode,
            'kategori_nama'=>$request->kategori_nama,
        ]);
        return redirect('/kategori')->with('success','Data kategori berhasil disimpan');
    }

    // Menampilkan halaman form tambah_ajax kategori
    public function create_ajax()
    {
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('kategori.create_ajax')->with('kategori', $kategori);
    }

    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode',
                'kategori_nama' => 'required|string|max:100'
            ];

            // use Illuminate\Support\Facades\Validation;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(), // pesan error validasi
                ]);
            }

            KategoriModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    public function show(string $kategori_id){
        $kategori = kategorimodel::find($kategori_id);
        $breadcrumb = (object)[
            'title'=>'Detail Kategori',
            'list'=>['Home','kategori','detail']
        ];
        $page = (object)[
            'title'=>'Detail kategori'
        ];
        $activeMenu ='kategori';
        return view('kategori.show',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'kategori'=>$kategori]);
    }

    public function show_ajax(string $id) {
        $kategori = KategoriModel::find($id);
        return view('kategori.show_ajax', ['kategori' => $kategori]);
    }

    public function edit(string $kategori_id){
        $kategori = kategorimodel::find($kategori_id);

        $breadcrumb = (object)[
            'title'=>'Edit kategori',
            'list'=>['Home','kategori','edit']
        ];
        $page = (object)[
            'title'=>'Edit kategori'
        ];
        $activeMenu ='kategori';
        return view('kategori.edit',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'kategori'=>$kategori]);
    }

    public function update(Request $request, string $kategori_id){
        $request->validate([
            'kategori_kode'=>'required|string|min:3|unique:m_kategori,kategori_kode',
            'kategori_nama'=>'required|string|max:100'
        ]);
        $kategori = kategorimodel::find($kategori_id);
        $kategori->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama'=>$request->kategori_nama
        ]);
        return redirect('/kategori')->with('success','Data kategori berhasil diperbarui');
    }

    // Menampilkan halaman form edit user Ajax
    public function edit_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit_ajax', ['kategori' => $kategori]);
    }

    // Menyimpan perubahan data kategori Ajax
    public function update_ajax(Request $request, $id)
    {
        //cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100'
            ];

            // use Illuminate\Support\Facades\Validation;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(), // pesan error validasi
                ]);
            }
            $check = KategoriModel::find($id);
            if ($check) {
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

    public function destroy(string $kategori_id){
        $check = kategorimodel::find($kategori_id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data level tidak ditemukan');
        }
        try {
            kategorimodel::destroy($kategori_id);
            return redirect('/kategori')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data level gagal dhapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // Menampilkan halaman confirm hapus
    public function confirm_ajax(string $id) {
        $kategori = KategoriModel::find($id);
        return view('kategori.confirm_ajax', ['kategori' => $kategori]);
    }

    // Menghapus data kategori dengan AJAX
    public function delete_ajax(Request $request, $id) {
        //cek apakah request dari ajax
        if($request->ajax() || $request->wantsJson()) {
            $kategori = KategoriModel::find($id);
            if ($kategori) {
                $kategori->delete();
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

    public function import()
    {
        return view('kategori.import');
    }
    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_kategori' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_kategori'); // ambil file dari request
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
                            'kategori_kode' => $value['B'],
                            'kategori_nama' => $value['C'],
                            'created_at' => now(),
                        ];
                    }
                }
                if (count($insert) > 0) {
                    // insert data ke database, jika data sudah ada, maka diabaikan
                    KategoriModel::insertOrIgnore($insert);
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
        // ambil data kategorika yang akan di export
        $kategori = KategoriModel::select('kategori_kode', 'kategori_nama')
            ->get();
        
        // load libary excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Kategori');
        $sheet->setCellValue('C1', 'Nama Kategori');

        $sheet->getStyle('A1:c1')->getFont()->setBold(true); // bold header

        $no = 1;    // nomor data dimulai dari 1
        $baris = 2; // baris data dimulai dari 2
        foreach ($kategori as $key => $value) {
            $sheet->setCellValue('A'. $baris, $no);
            $sheet->setCellValue('B'. $baris, $value->kategori_kode);
            $sheet->setCellValue('C'. $baris, $value->kategori_nama);
            $baris++;
            $no++;
        }

        foreach(range('A','C') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); // set auto size untuk kolom
        }

        $sheet->setTitle('Data Kategori'); // set title sheet
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data Kategori '.date('Y-m-d H:i:s').'.xlsx';
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
}