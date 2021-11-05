<?php
include ("connection.php");
if (isset($_POST["simpan_karyawan"])) {
    # data input dari user
    $id_karyawan = $_POST["id_karyawan"];
    $nama_karyawan = $_POST["nama_karyawan"];
    $alamat_karyawan = $_POST["alamat_karyawan"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    // insert ke tabel karyawan
    $sql = "insert into karyawan values
    ('$id_petugas','$nama_petugas','$alamat_petugas','$kontak','$username','$password')";

    //eksekusi perintah sql
    if (mysqli_query($connect, $sql)){
        //menuju halaman list karyawan
        header("location:listKaryawan.php");
    }else {
        //gagal
        echo mysqli_error($connect);
    }
}
else if (isset($_POST["edit_karyawan"])) {
    # data yg akan diupdate
    $id_karyawan = $_POST["id_karyawan"];
    $nama_karyawan = $_POST["nama_karyawan"];
    $alamat_karyawan = $_POST["alamat_karyawan"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"];
    
    if (empty($_POST["password"])) {
        #pass tdk diedit 
        $sql = "update karyawan set nama_karyawan = '$nama_karyawan', 
        alamat_karyawan = '$alamat_karyawan', kontak = '$kontak', 
        username = '$username' where id_karyawan = '$id_karyawan'";
    }else {
        # pass diedit
        $password = sha1($_POST["password"]);
        $sql = "update karyawan set id_karyawan = '$id_karyawan', nama_karyawan = '$nama_karyawan', 
        alamat_karyawan = '$alamat_karyawan', kontak = '$kontak', 
        username = '$username', password = '$password'";
    }
    # eksekusi perintah sql
    if(mysqli_query($connect, $sql)){
        header("location:listKaryawan.php");
    }else {
        //gagal
        echo mysqli_error($connect);
    }
}
?>