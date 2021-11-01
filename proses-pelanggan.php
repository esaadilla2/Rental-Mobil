<?php
include ("connection.php");
if (isset($_POST["simpan_pelanggan"])) {
    # data input dari user
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_petugas"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    // insert ke tabel pelanggan
    $sql = "insert into pelanggan values
    ('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak')";

    //eksekusi perintah sql
    if (mysqli_query($connect, $sql)){
        //menuju halaman list pelanggan
        header("location:listPelanggan.php");
    }else {
        //gagal
        echo mysqli_error($connect);
    }
}
else if (isset($_POST["edit_pelanggan"])) {
    # data yg akan diupdate
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_petugas"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    $sql = "update pelanggan set id_pelanggan = '$id_pelanggan',
    nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',kontak='$kontak' 
    where id_pelanggan='$id_pelanggan'";
    
    }
    # eksekusi perintah SQL
    mysqli_query($connect, $sql);

    # direct / dikembalikan ke halaman list pelanggan
    header("location:listPelanggan.php");
?>