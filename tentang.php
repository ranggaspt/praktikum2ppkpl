<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Tentang</title>
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>
    <nav>
        <ul class="nav-list">
            <li class="nav-item">
                <a href="tentang.php" class="logo">
                    <?php
                    include "koneksi.php";
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tentang");
                    while ($data = mysqli_fetch_array($tampil)) {
                    ?><img src="img/<?php echo $data['tgambar']; ?>"></a>
            <?php } ?>
            </a>
            </li>
            <li class="nav-item">
                <a href="wisata.php">Wisata</a>
            </li>
            <li class="nav-item">
                <a href="budaya.php">Budaya</a>
            </li>
            <li class="nav-item">
                <a href="kuliner.php"">Kuliner</a>
            </li>
            <li class=" nav-item">
                <a  class="on" href="tentang.php">Tentang</a>
            </li>
        </ul>
    </nav>

    <div class="w">
        <section id="home">
        <div class="kolom">
            <?php
            include "koneksi.php";
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tentang");
            while ($data = mysqli_fetch_array($tampil)) {
            ?>
                <img src="img/<?php echo $data['tgambar']; ?>">
            <?php } ?>
        </div>

            <div class="kolom">
                <?php
                include "koneksi.php";
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tentang");
                while ($data = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <h2><td> <?php echo $data['nama']; ?> </td></h2>
                        <td> <?php echo $data['deskripsi']; ?> </td>
                    </tr>
                <?php } ?>
            </div>

        </section>
    </div>

    </body>
</html>