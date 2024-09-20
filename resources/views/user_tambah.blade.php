<!DOCTYPE html>
<html>
<head>
    <title>TambahData User</title>
</head>
<body>
    <h1>Form Tambah Data User</h1>
    <form method="POST" action="{{url('/user/tambah_simpan')}}">
        @csrf <!-- Gunakan @csrf untuk menggantikan {{ csrf_field() }} -->

        {{ csrf_field() }}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username" required>
        <br>

        <label>Nama</label> 
        <input type="text" name="nama" placeholder="Masukan Nama" required>
        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password" required>
        <br>

        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level" required>
        <br><br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
