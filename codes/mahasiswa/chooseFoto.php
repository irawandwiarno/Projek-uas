<?php
    session_start();
    include '../konek.php';
    include 'upload.php';
    
        $id = $_SESSION['session_id_user'];

        $sql1 = "SELECT * FROM data_user WHERE id_user = $id";
        $data = mysqli_query($conn, $sql1);
        $ambil = mysqli_fetch_array($data);


        $foto = $ambil['foto'];

        if($foto != NULL){
            $lokasi = $foto;
        }else if($foto==''){
            $lokasi = 'default.jpg';
        }
        

        if(isset($_POST['ganti'])){
            $profile = upload('gambar');
            
            if($profile != false){
                $sql = "UPDATE data_user SET foto = '$profile' WHERE id_user = $id";
                $result = mysqli_query($conn, $sql);
            }
            
            if ($profile != false) { 
                echo "<script>
                alert('Foto Berhasil Dirubah');
                document.location.href='profile.php';
                </script>"; 
            }else { 
                echo "<script>
                alert('Data Gagal Ditambahkan');
                </script>"; 
            }
            var_dump($lokasi);
        }
        

        
?>

<!DOCTYPE html>
<html>
<head>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Akhir Bootstrap CSS -->

    <title>Document</title>
</head>
<body>
<!-- <a class="btn btn-light fw-bold my-3 mx-2" href="profile.php">X</a> -->
    
<!-- CARD -->
<div class="position-absolute top-50 start-50 translate-middle ">
    <div class="card" style="width: 20rem; height: 30rem;">
        <img src="../../imgUpload/<?php echo $lokasi;?>" class="img-fluid text-center" alt="...">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Pictures</label>
                    <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
                <button class="btn btn-primary" type="submit" name="ganti">GANTI</button>
                <a class="btn btn-danger" name="submit" href="profile.php">BATAL</a>
            </form>
        </div>
    </div>
</div>
<!-- AKHIR CARD -->
</body>
</html>