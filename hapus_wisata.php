<?php
    include "koneksi.php";
    $id = $_GET['idwisata'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM wisata WHERE idwisata='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/pesona-indramayu/kel_wisata.php'>";
?>