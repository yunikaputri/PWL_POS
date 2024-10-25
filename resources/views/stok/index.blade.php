@extends('layouts.template')
@section('content')
<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Daftar Stok Penjualan yang terdaftar dalam sistem</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-sm btn-success mt-1">Import Stok</button>
            <a href="{{ url('/stok/export_excel') }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-file-excel"></i> Export Stok</a>
            <a href="{{ url('/stok/export_pdf') }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-file-pdf"></i> Export Stok</a>
            <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Stok (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <!-- Filter data -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                <label class="col-1 control-label col-form-label">Filter </label>
                <div class="col-3">
                    <select name="filter_kategori" class="form-control filter_kategori">
                        <option value="">- Semua -</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                        @endforeach
                    </select>
                <small class="form-text text-muted">Kategori Barang</small>
                </div>
            </div>
        </div>
    </div>
        <table class="table table-bordered table-sm table-striped table-hover" id="table-stok">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Supplier</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }
    
    var dataStok;
    $(document).ready(function(){
        dataStok = $('#table-stok').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('stok/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.filter_barang = $('.filter_barang').val();
                    d.filter_kategori = $('.filter_kategori').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "stok_tanggal",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "barang.barang_nama",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "stok_jumlah",
                    orderable: true,
                    searchable: false,
                    render: function(data, type, row){
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                {
                    data: "supplier.supplier_nama",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "user.nama",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }
            ]
        });
    
        // Listener untuk filter barang
        $('.filter_barang').change(function() {
            dataStok.draw(); // Refresh tabel saat filter barang berubah
        });
    
        // Listener untuk filter kategori
        $('.filter_kategori').change(function() {
            dataStok.draw(); // Refresh tabel saat filter kategori berubah
        });
    
        $('#stok_id').on('change', function () {
            dataStok.ajax.reload(); // Reload data jika stok_id berubah
        });
    });
    </script>
@endpush
