<?php
include './connection.php';

$id_mobil = $_GET['id_mobil'];

$sql ="delete from mobil where id_mobil = '".$id_mobil."'" ;

$result = mysqli_query($connect,$sql);

if ($result) {
    header('location:listMobil.php');
} else {
    printf('Gagal ya'.mysqli_error($connect));
    exit();
}
?>