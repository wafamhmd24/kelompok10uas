<?php
    include 'koneksi.php';

    function tambah_data($data, $files) {
        $nisn = $_POST['nisn'];
            $nama_siswa = $_POST['nama_siswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $foto_siswa = $_FILES['foto']['name'];
            $alamat = $_POST['alamat'];

            $dir = "";
            $tmpFile = $_FILES['foto']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$foto_siswa);
    
            $query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$nama_siswa', '$jenis_kelamin', '$foto_siswa', '$alamat')";
            $sql = mysqli_query($conn, $query);
    }
?>