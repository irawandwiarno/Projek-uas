<?php
function registrasi($data){
    include '../konek.php';
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $title = htmlspecialchars($data['title']);
    
    //MENGECEK APAKAH USERNAME SUDAH ADA ATAU BELUM
    $cek = mysqli_query($conn, "SELECT user FROM data_user WHERE user = '$username'");
    
    if( mysqli_fetch_assoc($cek) > 0 ){
        echo "<script> alert ('registrasi gagal, username sudah terdaftar')</script>";
        return false;
    }
    
    //CEK KONFIRMASI PASSWORD
    if($password !== $password2){
        echo "<script>alert('password tidak sesuai')</script>";
        return false;
    }
    
    //CARA MENGENKRIPSIKAN PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // MENAMBHAKAN USERBARU KEDALAM DATABASE
     mysqli_query($conn, "INSERT INTO data_user VALUES('','$nrp','$nama','$kelas','$jurusan','$username', '$password','$title','')");
    
    return mysqli_affected_rows($conn);
}
?>