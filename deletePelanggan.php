<?php
include("connection.php");

$id = $_GET['id'];

$sql = "delete from pelanggan where id_pelanggan = '".$id_pelanggan."'" ;

$result = mysqli_query($connect, $sql);

if ($result) {
    header ("location:listPelanggan.php");
} else {
    printf ('Gagal'.mysqli_error($connect));
    exit();
}
?>