<?php 
session_start();
include '../konek.php';

    if(isset($_SESSION['session_title'])){
        if($_SESSION['session_title'] == '3'){
            header("location: ../admin/index.php");
        }else if($_SESSION['session_title'] == '1'){
            header("location: ../dosen/index.php");
        }
    } else {
        header('Location: ../../index.php');
    }
    if(isset($_GET['matkul'])){
        $matkul= $_GET['matkul'];

        $ambilId = mysqli_query($conn,"SELECT * FROM mata_kuliah WHERE matkul = $matkul");
        $temp = mysqli_fetch_array($ambilId);
        $idDosen = $temp['id_dosen'];

        $ambilNamaMatkul = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = $idDosen");
        $tempNamaMatkul = mysqli_fetch_array($ambilNamaMatkul);
        $namaMatkul = $tempNamaMatkul['jurusan'];

    }

    

// var_dump($_GET['kelas']); die;
//   if(isset($_GET['kelas'] )=='A'){
//       $kelasPilih = 'A';
//   }else if(isset($_GET['kelas'])=='B'){
//     $kelasPilih = 'B';
// }
?>

<!DOCTYPE html>
<html lang="en">
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
                    <a class="nav-link active" href="tugas.php">Tugas</a>
                    <a class="nav-link" href="profile.php">Profile</a>
                    <a class="nav-link" href="../logout.php">Log-out</a>
                </div>
            </div>
        </div>
    </nav>
<!--AKHIR NAVBAR -->
<div class="container my-5">
    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Mata Kuliah
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><a href="tugas.php?matkul='ASD'" class="dropdown-item" type="submit">Algoritma Struktur Data</a></li>
            <li><a href="tugas.php?matkul='OS'" class="dropdown-item" type="submit">Oprating Sistem</a></li>
            <li><a href="tugas.php?matkul='DB'" class="dropdown-item" type="submit">Data Base</a></li>
        </ul>
    </div>
</div>



    <div class="container px-5 border shadow-sm bg-body rounded">
    <?php if(isset($_GET['matkul'])){?>
        <h5 class="fs-4"><?php echo "<div class='fs-4 my-3'>$namaMatkul</div>"?></h5>    
    <?php } ?>
    <div class="row">
        <?php
        if(isset($_GET['matkul'])){
            $data = mysqli_query($conn,"SELECT * FROM tugas WHERE id_dosen = $idDosen");
            while ($tampil = mysqli_fetch_array($data)){
                echo" 
                    <div class='col-4 my-3'>
                        <div class='card timbul' style='width: 20rem;'>
                            <div class='card-body'>
                                <h5 class='card-title mb-4 fs-4 fw-bold text-capitalize'>$tampil[judul_tugas]</h5>
                                <h5 class='card-title fs-5'>Descripsi :</h5>
                                <p class='card-text mb-4'>$tampil[des_tugas]</p>
                                <a href='detil.php?idTugas=$tampil[id_tugas]' class='btn btn-outline-success'>Detile tugas</a>
                            </div>
                        </div>
                    </div>
                
                ";
            }
        }
        ?>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>