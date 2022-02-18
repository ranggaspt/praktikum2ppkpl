<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Kuliner</title>
    <link rel="stylesheet" href="css/kelola.css">
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>
    <nav class="u">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="kel_tentang.php" class="logo">
                    <?php
                    include "koneksi.php";
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tentang");
                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                        <img src="img/<?php echo $data['tgambar']; ?>"></a>
            <?php } ?>
            </a>
            </li>
            <li class="nav-item">
                <a href="kel_wisata.php">Wisata</a>
            </li>
            <li class="nav-item">
                <a href="kel_budaya.php">Budaya</a>
            </li>
            <li class="nav-item">
                <a class="on" href="kel_kuliner.php">Kuliner</a>
            </li>
            <li class="nav-item">
                <a href="kel_tentang.php">Tentang</a>
            </li>
            <li class="nav-item">
                <a href="logout.php">Keluar</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            <?php

            session_start();

            if (!isset($_SESSION['username'])) {
                header("Location: login.php");
            }

            ?>
            <?php echo "Selamat datang " . $_SESSION['username'] . "!"; ?>
            <a href="kuliner.php"><button class="a btn-p">Lihat Beranda</button></a>
        </div>
        <div class="card-body">
            KELOLA DATA KULINER
            <a href="tambah_kuliner.php"><button class="b btn-primary">Tambah Data</button></a>
            <table class="table-fill">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>DESKRIPSI</th>
                        <th>HARGA</th>
                        <th>GAMBAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <?php
                include "koneksi.php";
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM kuliner");
                while ($data = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <td class="d"> <?php echo $no++; ?> </td>
                        <td> <?php echo $data['nama']; ?> </td>
                        <td> <?php echo $data['deskripsi']; ?> </td>
                        <td> <?php echo $data['harga']; ?> </td>
                        <td><img src="img/<?php echo $data['gambar']; ?>" width="100px"></td>
                        <td class="c">
                            <a href="edit_kuliner.php?idkuliner=<?php echo $data['idkuliner']; ?>"><button class="c btn btn-primary">Edit</button></a>
                            <a href="hapus_kuliner.php?idkuliner=<?php echo $data['idkuliner']; ?>"><button class="c btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>