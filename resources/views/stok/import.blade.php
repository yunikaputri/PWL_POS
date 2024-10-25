<form action="{{ url('/stok/import_ajax') }}" method="POST" enctype="multipart/form-data" id="form-import">
    @csrf 
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Download Template</label>
                    <a href="{{ asset('template_stok.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download
                    </a>
                    <small id="error-kategori_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Pilih File</label>
                    <input type="file" name="file_stok" id="file_stok" class="form-control" required>
                    <small id="error-file_stok" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Validasi dan submit form import stok
        $("#form-import").validate({
            rules: {
                file_stok: {
                    required: true,
                    extension: "xlsx"
                },
            },
            submitHandler: function(form, event) {
                event.preventDefault(); // Mencegah form submit default

                var formData = new FormData(form); // Mengubah form menjadi FormData untuk menangani file
                $.ajax({
                    url: form.action,
                    type: 'POST', // Pastikan menggunakan POST
                    data: formData, // Data yang dikirim berupa FormData
                    processData: false, // Agar jQuery tidak memproses data
                    contentType: false, // Agar jQuery tidak menetapkan tipe konten
                    success: function(response) {
                        if(response.status){ // Jika sukses
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            })
                            dataStok.ajax.reload();
                        } else { // Jika terjadi error
                            $('.error-text').text(''); // Bersihkan pesan error sebelumnya
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-'+prefix).text(val[0]); // Tampilkan error per field
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Ada kesalahan, coba lagi nanti.'
                        });
                    }
                });
                return false; // Cegah form submit default
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
