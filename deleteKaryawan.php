<?php
include './connection.php';

$id_karyawan = $_GET['id_karyawan'];

$sql ="delete from karyawan where id_karyawan = '".$id_karyawan."'" ;

$result = mysqli_query($connect,$sql);

if ($result) {
    header('location:listKaryawan.php');
} else {
    printf('Gagal ya'.mysqli_error($connect));
    exit();
}
?>