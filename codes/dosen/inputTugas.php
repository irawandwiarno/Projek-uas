<?php
    session_start();
    include '../konek.php';

    if($_SESSION['session_title'] != '0'){
        if($_SESSION['session_title'] == '3'){
            header("location: ../admin/index.php");
        }else if($_SESSION['session_title'] == '2'){
            header("location: ../mahasiswa/index.php");
        }
    } else {
        header('Location: ../../index.php');
    }

    
    
    
    if(isset($_POST['submit'])){

        $des = htmlspecialchars($_POST['des']);
        $judul = htmlspecialchars($_POST['judul']);
        $deadline = $_POST['date'];
        $kelas = htmlspecialchars($_POST['kelas']);

       mysqli_query($conn, "INSERT INTO tugas VALUES ('','$_SESSION[session_id_user]','$des','$deadline','$judul','$kelas')");
    
       echo '<script><alert>Input Berhasil</alert></script>';
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
<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #4771ea">
        <div class="container">
            <a class="navbar-brand fw-normal fs-5" href="#">Awan E-learning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link"  href="index.php">Home</a>
                    <a class="nav-link active" href="inputTugas.php">Buat Tugas</a>
                    <a class="nav-link" href="data.php">Data Mahasiswa</a>
                    <a class="nav-link" href="profile.php">Profile</a>
                    <a class="nav-link" href="../logout.php">Log-out</a>
                </div>
            </div>
        </div>
    </nav>
<!--AKHIR NAVBAR -->

<!-- INPUT -->
<div class="container my-5 px-4">
    <div class="row gx-5">
        <div class="col-8">
            <div class="p-3 border bg-light">
                <span class=" fs-4">Buat Tugas Baru</span>
                <div class="card border-light mb-3" style="max-width: 60rem;">
                    <div class="card-header fw-bold fs-4"></div>
                    <div class="card-body">
                        <form id="loginform" class="form-horizontal" action="" method="POST" role="form" >
                            <div class="dropdown">
                                <div class="mb-3">
                                    <label class="form-label">Pilih Kelas</label>
                                    <select id="Select" name="kelas" class="form-select">
                                        <option value="A">Kelas A</option>
                                        <option value="B">Kelas B</option>
                                    </select>
                                </div>
                            </div>
                            <label for="" class="form-label mt-4">Judul tugas</label>
                            <input type="text" name="judul"  class="form-control" autocomplete="off">
                            <label for="" class="form-label">Descripsi Tugas</label>
                            <textarea name="des" class="form-control" cols="30" rows="5"></textarea>
                            <label for="" class="form-label">Deadline</label>
                            <input class="form-control" type="datetime-local" name="date">
                            <button class="btn btn-primary mt-3" name="submit" type="submit">Submit</button>
                        </form>
                    </div>
            </div>
            </div>
        </div>
    <div class="col-4">
      <div class="p-3 border bg-light"></div>
    </div>
</div>
</div>
<!--AKHIR INPUT -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>