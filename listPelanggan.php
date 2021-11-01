<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">Daftar Pelanggan</h4>
            </div>

            <div class="card-body">
                <!--kotak pencarian data pelanggan-->
                <form action="listPelanggan.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2"
                    placeholder="Masukkan Keyword" required/>
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat load halaman ini
                        # akan mengecek apakah ada data dengan method 
                        # get yang bernama search

                        $search = $_GET["search"];
                        $sql = "select * from pelanggan where id_pelanggan like '%$search%'
                        or nama_pelanggan like '%$search%'
                        or alamat_pelanggan like '%$search%'  
                        or kontak like '%$search%' ";
                    }else{
                        $sql = "select * from pelanggan";
                    }

                    //eksekusi perintah sql
                    $query = mysqli_query ($connect, $sql);
                    while($pelanggan = mysqli_fetch_array($query)) { ?>

                    <li class="list-group-item">
                        <div class="row">
                            <!--bagian data pelanggan-->
                            <div class="col-lg-8 col-md-10">
                                <h5>Id Pelanggan: <?php echo $pelanggan["id_pelanggan"] ?></h5>
                                <h6>Nama Pelanggan: <?php echo $pelanggan["nama_pelanggan"] ?></h6>
                                <h6>Alamat: <?php echo $pelanggan["alamat_pelanggan"] ?></h6>
                                <h6>Kontak: <?php echo $pelanggan["kontak"] ?></h6>
                            </div>
                            <!--bagian tombol-->
                            <div class="col-lg-4 col-md-2">
                            <a href="form-pelanggan.php?id_pelanggan=<?=$pelanggan["id_pelanggan"]?>">
                                <button class="btn btn-info btn-block">
                                    Edit
                                </button>
                                </a>
                                <div class="card-footer">
                                    <a href="deletePelanggan.php?id_pelanggan=<?=$pelanggan["id_pelanggan"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">
                                </div>
                                <button class="btn btn-block btn-danger">
                                    Hapus
                                </button>
                                    </a>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-pelanggan.php">
                    <button class="btn btn-success">Tambah Data Petugas</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>