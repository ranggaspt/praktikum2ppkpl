<?php
include "koneksi.php";
$id = $_GET['idwisata'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM wisata WHERE idwisata='$id'");
$data = mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Wisata</title>
    <link rel="stylesheet" href="css/kelola.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="card-header">
        Edit Data Wisata
    </div>
    <div class="card-body">
        <form action="" method="POST" class="form-item" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Wisata</label><br>
                <input type="text" name="nama" value="<?php echo $data['nama'] ?> " placeholder="Masukkan Nama" class="input-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label><br><br>
                <textarea name="deskripsi" id="deskripsi" required><?php echo $data['deskripsi'] ?></textarea><br>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label><br>
                <textarea name="lokasi" required class="input-control"><?php echo $data['lokasi'] ?></textarea>
                <iframe src="<?php echo $data['lokasi']; ?>" loading="lazy"></iframe>
            </div><br>

            <div class="form-group">
                <label for="tiket">Tiket</label><br>
                <input type="text" name="tiket" value="<?php echo $data['tiket'] ?>" placeholder="Masukkan Tiket" class="input-control" required>
            </div><br>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar"><br>
                <img src="img/<?php echo $data['gambar']; ?>" class="input-control" required>
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
if (isset($_POST['simpan'])) {
    $nama       = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $lokasi     = $_POST['lokasi'];
    $tiket      = $_POST['tiket'];
    $gambar     = $_FILES['gambar']['name'];
    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "img/" . $gambar);
        $query = mysqli_query($koneksi, "UPDATE wisata SET gambar = '$gambar'  WHERE idwisata = '$id'");
    }

    $query = mysqli_query($koneksi, "UPDATE wisata
            SET nama='$nama', deskripsi='$deskripsi', lokasi ='$lokasi', tiket='$tiket'
            WHERE idwisata='$id'");

    if ($query) {
        header("Location:kel_wisata.php");
    }
}
?>