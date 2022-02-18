<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Budaya</title>
    <link rel="stylesheet" href="css/kelola.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
        <div class="card-header">
            Tambah Data Budaya
        </div>
        <div class="card-body">
            <form action="" method="POST" class="form-item" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama">Nama Budaya</label><br>
                    <input type="text" name="nama" placeholder="Masukkan Nama" class="input-control" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label><br><br>
                    <textarea name="deskripsi" id="deskripsi" required></textarea> <br>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label><br>
                    <textarea name="lokasi" placeholder="Masukkan link maps lokasi" required class="input-control"></textarea>
                    <iframe src="<?php echo $data['lokasi']; ?>" loading="lazy"></iframe>
                </div><br>

                <div class="form-group">
                    <label for="event">Event</label><br>
                    <input type="text" name="event" placeholder="Masukkan event" class="input-control" required>
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="input-control">
                </div>

                <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
                <button type="reset" class="btn btn-danger">RESET</button>
            </form>
        </div>
    <script type="text/javascript">
        CKEDITOR.replace('deskripsi');
    </script>


</body>

</html>

<?php

include "koneksi.php";
if (isset($_POST['simpan'])) {
    $nama       = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $lokasi     = $_POST['lokasi'];
    $event      = $_POST['event'];
    $gambar     = $_FILES['gambar']['name'];

    move_uploaded_file($_FILES['gambar']['tmp_name'],"img/".$gambar);

    mysqli_query($koneksi, "INSERT INTO budaya VALUES('',
                '$nama','$deskripsi', '$lokasi', '$event', '$gambar')") or die(mysqli_error($koneksi));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan.... </h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/pesona-indramayu/kel_budaya.php'>";
}
?>