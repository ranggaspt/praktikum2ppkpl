<?php
    include "koneksi.php";
    $id = $_GET['idbudaya'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM budaya WHERE idbudaya='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/pesona-indramayu/kel_budaya.php'>";
?>