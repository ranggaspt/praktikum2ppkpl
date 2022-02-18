<?php
include "koneksi.php";
$id = $_GET['idbudaya'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM budaya WHERE idbudaya='$id'");
$data = mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Budaya</title>
    <link rel="stylesheet" href="css/kelola.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="card-header">
        Edit Data Budaya
    </div>
    <div class="card-body">
        <form action="" method="POST" class="form-item" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Budaya</label><br>
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
                <label for="event">Event</label><br>
                <input type="text" name="event" value="<?php echo $data['event'] ?>" placeholder="Masukkan event" class="input-control" required>
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
    $event      = $_POST['event'];

    $gambar     = $_FILES['gambar']['name'];
    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "img/" . $gambar);
        $query = mysqli_query($koneksi, "UPDATE budaya SET gambar = '$gambar'  WHERE idbudaya = '$id'");
    }

    $query = mysqli_query($koneksi, "UPDATE budaya
            SET nama='$nama', deskripsi='$deskripsi', lokasi ='$lokasi', event='$event' WHERE idbudaya='$id'");

    if ($query) {
        header("Location:kel_budaya.php");
    }
}
?>