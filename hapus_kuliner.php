<?php
    include "koneksi.php";
    $id = $_GET['idkuliner'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM kuliner WHERE idkuliner='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/pesona-indramayu/kel_kuliner.php'>";
?>