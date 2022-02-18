<?php
include "koneksi.php";
$id = $_GET['idkuliner'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM kuliner WHERE idkuliner='$id'");
$data = mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kuliner</title>
    <link rel="stylesheet" href="css/kelola.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="card-header">
        Edit Data Kuliner
    </div>
    <div class="card-body">
        <form action="" method="POST" class="form-item" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Kuliner</label><br>
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
                <label for="harga">Harga</label><br>
                <input type="text" name="harga" value="<?php echo $data['harga'] ?>" placeholder="Masukkan Harga" class="input-control" required>
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
    $harga      = $_POST['harga'];
    $gambar     = $_FILES['gambar']['name'];
    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "img/" . $gambar);
        $query = mysqli_query($koneksi, "UPDATE kuliner SET gambar = '$gambar'  WHERE idkuliner = '$id'");
    }

    $query = mysqli_query($koneksi, "UPDATE kuliner
            SET nama='$nama', deskripsi='$deskripsi', lokasi ='$lokasi', harga='$harga' WHERE idkuliner='$id'");

    if ($query) {
        header("Location:kel_kuliner.php");
    }
}
?>