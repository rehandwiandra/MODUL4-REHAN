<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
    $con = mysqli_connect('localhost', 'root', '', 'modul4');
// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
    if(!$con){
        die("Koneksi gagal: " . mysqli_connect_error());
    }
// 
 
?>