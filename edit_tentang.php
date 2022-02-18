<?php
include "koneksi.php";
$id = $_GET['idtentang'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tentang WHERE idtentang='$id'");
$data = mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tentang</title>
    <link rel="stylesheet" href="css/kelola.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="card-header">
        Edit Data Tentang
    </div>
    <div class="card-body">
        <form action="" method="POST" class="form-item" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" value="<?php echo $data['nama'] ?> " placeholder="Masukkan Nama" class="input-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label><br><br>
                <textarea name="deskripsi" id="deskripsi" class="input-control" required><?php echo $data['deskripsi'] ?></textarea> <br>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="tgambar"><br><br>
                <img src="img/<?php echo $data['tgambar']; ?>" style="width:auto" class="input-control" required>
            </div>

            <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
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

    $tgambar     = $_FILES['tgambar']['name'];
    if (!empty($tgambar)) {
        move_uploaded_file($_FILES['tgambar']['tmp_name'], "img/" . $tgambar);
        $query = mysqli_query($koneksi, "UPDATE tentang SET tgambar = '$tgambar'  WHERE idtentang = '$id'");
    }

    $query = mysqli_query($koneksi, "UPDATE tentang
            SET nama='$nama', deskripsi='$deskripsi' WHERE idtentang='$id'");

    if ($query) {
        header("Location:kel_tentang.php");
    }
}
?>