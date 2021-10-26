<?php
function registrasiakun($data){
    global $db;
    $name = strtolower(stripslashes($data["name"]));
    $username = strtolower(stripslashes($data["username"]));
    $password =  mysqli_real_escape_string($db, $data["password"]);
    $password2 =  mysqli_real_escape_string($db, $data["password2"]);
    $level = isset($level['level'])? $level['level']:'';

    //cek pengguna sudah ada atau belum
    
    //cek konfirmasi password
    if($password !== $password2){
        echo "<script>
        alert('Konfirmasi password tidak sesuai'); 
        </script>";
    
    return false;
    }

    //eksripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan pengguna baru ke database
    mysqli_query($db,"INSERT INTO register VALUES('','$name','$username','$password','$level')");
    return mysqli_affected_rows($db);

}
?>