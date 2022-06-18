<?php 
    session_start();
    
    include '../konek.php';

    $id = $_SESSION['session_id_user'];

    $data = mysqli_query($conn,"SELECT * FROM data_user where id_user = $id");
    $tampung = mysqli_fetch_array($data);

    $foto = $tampung['foto'];

    if(isset($_GET['hapus'])){
        $hapus = $_GET['hapus'];

        $sql = "UPDATE data_user SET foto = '' WHERE id_user = $id";
        $result = mysqli_query($conn, $sql);
        $lokasi = 'default.jpg';
        header("location: profile.php");
    }

    if($foto != NULL){
        $lokasi = $foto;
    }else{
        $lokasi = 'default.jpg';
    }
   
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Akhir Bootstrap CSS -->

    <!-- MY CSS -->
    <link href="../../css/profile.css">
    <!--AKHIR MY CSS -->

    <title>Document</title>
</head>
<body>
<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #4771ea">
        <div class="container">
            <a class="navbar-brand fw-normal fs-5" href="#">Awan E-learning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link"  href="index.php">Home</a>
                    <a class="nav-link" href="tugas.php">Tugas</a>
                    <a class="nav-link active" href="profile.php">Profile</a>
                    <a class="nav-link " href="../logout.php">Log-out</a>
                </div>
            </div>
        </div>
    </nav>
<!--AKHIR NAVBAR -->

<!-- BIO DATA -->
<div class="container mt-5 p-4 d-flex justify-content-center " style="height: 30rem;">
    <div class="card mb-3 " style="width: 50rem; height: 100%;">
        <div class="row g-0 ">
            <div class="col-md-4 p-2 ">
                <img src="../../imgUpload/<?php echo $lokasi;?>" class="img-fluid rounded-circle" alt="Profile.png">
                <div class="row gy-2 p-3">
                    <a class="btn btn-primary" href="chooseFoto.php">Choose Picture</a>
                    <a class="btn btn-danger" href="profile.php?hapus=1" name="hapus">Hapus foto</a>
                </div>
            </div>
        <div class="col-md-8 mt-2  border" style="height: 25rem;">
            <div class="card-body ">
                <div class="row">
                    <h5 class="card-title text-uppercase fw-bold"><?php echo $tampung['nama']; ?></h5>                    
                </div>
                <table cellpadding="5">
                    <tr>
                        <td class="card-text fst-italic fs-6 text-start">NRP</td>
                        <td>:</td>
                        <td><?php echo $tampung['nrp']; ?></td>
                    </tr>
                    <tr>
                        <td class="card-text fst-italic fs-6 text-start">Kelas Ajar</td>
                        <td>:</td>
                        <td><?php echo $tampung['kelas']; ?></td>
                    </tr>
                    <tr>
                        <td class="card-text fst-italic fs-6 text-start">Jurusan</td>
                        <td>:</td>
                        <td><?php echo $tampung['jurusan']; ?></td>
                    </tr>
                    <tr>
                        <td class="card-text fst-italic fs-6 text-start">Username</td>
                        <td>:</td>
                        <td><?php echo $tampung['user']; ?></td>
                    </tr>
                </table>
                <div class="position-absolute top-50 start-50 translate-middle">
                    <a href="changePw.php" class="btn btn-success">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--AKHIR BIO DATA -->

<!-- <div class="row">
                    <h5 class="card-title text-uppercase fw-bold"><?php echo $tampung['nama']; ?></h5>                    
                </div>
                <div class="row gx-1">
                    <div class="col-2">
                        <p class="card-text fst-italic fs-6 text-start">NRP</p>
                    </div>
                    <div class="col-1 text-end">
                        <p class="card-text">:</p>
                    </div>
                    <div class="col-9">
                        <p class="card-text"><?php echo $tampung['nrp']; ?></p>
                    </div>
                </div>
<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
</body>
</html>