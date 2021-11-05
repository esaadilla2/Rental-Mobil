<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        
       <div class="card">
           <div class="card-header bg-dark">
               <h4 class="text-white">
                   Form Mobil
               </h4>
           </div>

           <div class="card-body">
               <?php
               if (isset($_GET["id_mobil"])) {
                   # form utk edit
                   $id_mobil = $_GET["id_mobil"];
                   $sql = "select * from mobil
                   where id_mobil='$id_mobil'";

                   include "connection.php";
                   # eksekusi SQL
                   $hasil = mysqli_query($connect, $sql);

                   # konversi ke array
                   $mobil = mysqli_fetch_array($hasil);
                   ?>
                   <form action="proses-mobil.php" method="post"
                enctype="multipart/form-data">
                   Id Mobil
                   <input type="text" name="id_mobil"
                   class="form-control mb-2" required
                   value="<?=$mobil["id_mobil"]?>" readonly>

                   Nomor Mobil
                   <input type="text" name="nomor_mobil"
                   class="form-control mb-2" required
                   value="<?=$mobil["nomor_mobil"]?>">

                   Merk 
                   <input type="text" name="merk"
                   class="form-control mb-2" required
                   value="<?=$mobil["merk"]?>">

                   Jenis
                   <select name="jenis" class="form-control mb-2"
                   required>
                        <option value="<?=$mobil["jenis"]?>" selected>
                            <?=$mobil["jenis"]?>
                        </option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="MPV">MPV</option>
                        <option value="Sport">Sport</option>
                   </select>

                   Warna
                   <input type="text" name="warna"
                   class="form-control mb-2" required
                   value="<?=$mobil["warna"]?>">

                   Tahun Pembuatan
                   <input type="text" name="tahun_pembuatan"
                   class="form-control mb-2" required
                   value="<?=$mobil["tahun_pembuatan"]?>">

                   Biawa sewa
                   <input type="text" name="biaya_sewa_per_hari"
                   class="form-control mb-2" required
                   value="<?=$mobil["biaya_sewa_per_hari"]?>">

                   Image <br>
                   <img src="image/<?=$mobil["image"]?>" 
                   width="300" />
                   <input type="file" name="image"
                   class="form-control mb-2">

                   <button type="submit" 
                   class="btn btn-info btn-block" 
                   name="update_mobil">
                   Simpan
                   </button>
                    </form>
                   <?php
               } else {
                   # form utk insert
                   ?>
                   <form action="proses-mobil.php" method="post"
               enctype="multipart/form-data">
                    Id Mobil
                   <input type="text" name="id_mobil"
                   class="form-control mb-2" required>

                   Nomor Mobil
                   <input type="text" name="nomor_mobil"
                   class="form-control mb-2" required>

                   Merk 
                   <input type="text" name="merk"
                   class="form-control mb-2" required>

                   Jenis
                   <select name="jenis" class="form-control mb-2"
                   required>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="MPV">MPV</option>
                        <option value="Sport">Sport</option>
                   </select>

                   Warna
                   <input type="text" name="warna"
                   class="form-control mb-2" required>

                   Tahun Pembuatan
                   <input type="text" name="tahun_pembuatan"
                   class="form-control mb-2" required>

                   Biawa sewa
                   <input type="text" name="biaya_sewa_per_hari"
                   class="form-control mb-2" required>

                   Image
                   <input type="file" name="image"
                   class="form-control mb-2" required>

                   <button type="submit" 
                   class="btn btn-info btn-block" name="simpan_mobil">
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