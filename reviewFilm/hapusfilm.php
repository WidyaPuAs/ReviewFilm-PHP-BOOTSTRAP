<?php
    include "koneksi.php";
    $idfilm = $_GET['idfilm'];
    $query = "DELETE from film where idfilm=$idfilm";
    $hasil = mysqli_query($con,$query);
    if($hasil){
        " <script> 
        alert ('data film berhasil Dihapus')
        window.location.href='datafilm.php'
        </script> ";
    }
?>