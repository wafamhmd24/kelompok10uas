<?php
  include 'koneksi.php';
  session_start();


  $query = "SELECT * FROM tb_siswa;";
  $sql= mysqli_query($conn,$query);
  $no = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <title>Projek UAS - Kelompok 10</title>
</head>

    

    <script>
        $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>
    

<body>
    <nav class="navbar navbar-light bg-secondary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="smkkdw.png" alt="Logo" class="d-inline-block align-text-center" style="width: 50px;">
            <b style="color: white;">SMK N 1 KEDUNGWUNI</b>
          </a>
        </div>
      </nav>
      <div class="container-fluid">
        <h1 class="mt-4">Data Siswa</h1>
        <figure>
        <blockquote class="blockquote">
          <p>Berisi Data yang Telah Disimpan di Database.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Create Read Update Delete</cite>
        </figcaption>
      </figure>
      <a href="kelola.php" type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Tambah Data
      </a>

      <?php
        if(isset($_SESSION['eksekusi'])):
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>
            <?php
              echo $_SESSION['eksekusi'];
            ?>
          </strong> 
      </div>
      <?php
        session_destroy();
        endif;
      ?>

      <div class="table-responsive">
        <table id="myTable" class="table align-middle cell-border hover">
            <thead>
              <tr style="text-align: center;">
                <th>No.</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                while($result = mysqli_fetch_assoc($sql)){
              ?>
              <tr style="text-align: center;;">
                <td>
                  <?php echo ++$no;
                  ?>.
                </td>
                <td>
                  <?php echo $result['nisn'];
                  ?>
                </td>
                <td>
                  <?php echo $result['nama_siswa'];
                  ?>
                </td>
                <td>
                  <?php echo $result['jenis_kelamin'];
                  ?>
                </td>
                <td>
                  <img src="<?php echo $result['foto_siswa'];
                  ?>" style="width: 200px;">
                </td>
                <td>
                  <?php echo $result['alamat'];
                  ?>
                </td>
                <td>
                  <a href="kelola.php?ubah=<?php echo $result['id_siswa'];
                  ?>" type="button" class="btn btn-success btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="proses.php?hapus=<?php echo $result['id_siswa'];
                  ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="mb-5"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>