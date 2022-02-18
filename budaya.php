<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Budaya</title>
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>
    <nav class="u">
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
                <a class="on" href="budaya.php">Budaya</a>
            </li>
            <li class="nav-item">
                <a href="kuliner.php"">Kuliner</a>
            </li>
            <li class=" nav-item">
                    <a href="tentang.php">Tentang</a>
            </li>
        </ul>
    </nav>

    <div class="wrapper">
        <div class="card-header">
        BUDAYA KABUPATEN INDRAMAYU
        </div>
        <section>
            <div class="card-body">
                <?php
                include("koneksi.php");
                $tampil = mysqli_query($koneksi, "SELECT * FROM budaya");
                if (mysqli_num_rows($tampil) > 0) {
                    while ($data = mysqli_fetch_array($tampil)) {
                ?>
                <div class="kolom">
                <div class="ol">
                    <h2><?php echo $data['nama'] ?></h2>
                </div>

                    <img src="img/<?php echo $data['gambar']; ?>">
                    <div class="lom">
                        <?php echo $data['deskripsi'] ?>
                    </div>
                    <div class="lom">
                        <h4>Event: </h4><?php echo $data['event'] ?>
                    </div>
                    <div class="lom">
                        <h4>Lokasi: </h4><iframe src="<?php echo $data['lokasi']; ?>" loading="lazy"></iframe>
                    </div>
                    <div class="lom">
                        <br><br><br>
                    </div>
                </div>
                <?php }}else{ ?>
                    <p>Tidak Ada</p>
                    <?php } ?>
            </div>

        </section>
    </div>

</body>

</html>