<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "reviewfilm";
    $con = mysqli_connect($host, $username, $password, $db);
    if($con){
        // echo "koneksi sukses <br>"
    } else {
        echo "koneksi gagal <br>";
    }
?>