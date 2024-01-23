<?php 

require 'koneksi.php';


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data) {

    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // konfirmasi password
    if( $password !== $password2 ) {
        echo "<script>alert('Konfirmasi Password salah!')</script>";
        return false;
    }
    
    //enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert ke database
    mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");
    header("Location: login.php");

    mysqli_affected_rows($conn);
}








?>