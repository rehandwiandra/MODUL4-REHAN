<?php

    require 'connect.php';

// (1) Mulai session
    session_start();
//

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $email = $_POST['email'];
    // b. Ambil nilai input name
    $name = $_POST['name'];
    // c. Ambil nilai input username
    $username = $_POST['username'];
    // d. Ambil nilai input password
    $password = $_POST['password'];
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $password = password_hash($password, PASSWORD_DEFAULT);

//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $q1 = "SELECT * FROM users WHERE email = '$email'";
    $r1 = mysqli_query($con, $q1);
//

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if(mysqli_num_rows($r1)==0){
    // a. Buatlah query untuk melakukan insert data ke dalam database
        $q2 = "INSERT INTO users (email, name, username, password) VALUES ('$email','$name','$username','$password')";
        $i1 = mysqli_query($con, $q2);
    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
        if($i1){
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
            $_SESSION['message'] = 'Pendaftaran sukses, silakan login';
            $_SESSION['color'] = 'succes';
            header('Location: ../views/login.php');
        }else{
            $_SESSION['message'] = 'Pendaftaran Gagal!';
        }
    }
// 

// (5) Buat juga kondisi else
    else{
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
        $_SESSION['meesage'] = 'Email sudah terdaftar!';
        header('Location: /modul4/views/register.php');
    }
//

?>