<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">Form Pelanggan</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_pelanggan"])){
                    //memeriksa apakah ketika load file ini
                    //apkh membawa data get dg nama id pelanggan
                    //jk iya, digunakan untuk edit data

                    include("connection.php");

                    # mengakses data pelanggan dari id pelanggan yg terkirim
                    $id_pelanggan = $_GET["id_pelanggan"];
                    $sql = "select * from pelanggan where id_pelanggan='$id_pelanggan'";

                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);

                    #konversi hasil query ke bentuk array
                    $pelanggan = mysqli_fetch_array($hasil);
                ?>
                <form action="proses-pelanggan.php" method="post">
                    ID Pelanggan
                    <input type="text" name="id_pelanggan" 
                    class="form-control mb-2" readonly 
                    value="<?=($pelanggan["id_pelanggan"])?>" />

                    Nama Pelanggan
                    <input type="text" name="nama_pelanggan" 
                    class="form-control mb-2" required 
                    value="<?=($pelanggan["nama_pelanggan"])?>"/>

                    Alamat
                    <input type="text" name="alamat_pelanggan" 
                    class="form-control mb-2" required 
                    value="<?=($pelanggan["alamat_pelanggan"])?>"/>

                    Kontak
                    <input type="text" name="kontak" 
                    class="form-control mb-2" required 
                    value="<?=($pelanggan["kontak"])?>"/>

                    <button type="submit" 
                    class=" btn btn-success btn-block"
                    name="edit_pelanggan">
                        Simpan
                    </button>
                </form>
                <?php
                }else{
                    //jk tidak maka digunakan untuk insert data
                    ?>
                    <form action="proses-pelanggan.php" method="post">
                    ID Pelanggan
                    <input type="text" name="id_pelanggan" 
                    class="form-control mb-2"/>

                    Nama Pelanggan
                    <input type="text" name="nama_pelanggan" 
                    class="form-control mb-2" required/>

                    Alamat
                    <input type="text" name="alamat_pelanggan" 
                    class="form-control mb-2" required/>

                    Kontak
                    <input type="text" name="kontak" 
                    class="form-control mb-2" required/>

                    <button type="submit" 
                    class=" btn btn-success btn-block"
                    name="simpan_pelanggan">
                        Simpan
                    </button>
                </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>