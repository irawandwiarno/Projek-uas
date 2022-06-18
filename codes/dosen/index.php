<?php
    session_start();

    if(isset($_SESSION['session_title'])){
        if($_SESSION['session_title'] == '3'){
            header("location: ../admin/index.php");
        }else if($_SESSION['session_title'] == '2'){
            header("location: ../mahasiswa/index.php");
        }
    } else {
        header('Location: ../../index.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Akhir Bootstrap CSS -->

    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/dosen.css" />
    <!-- Akhir My CSS  -->
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
                    <a class="nav-link active"  href="#">Home</a>
                    <a class="nav-link" href="inputTugas.php">Buat Tugas</a>
                    <a class="nav-link" href="data.php">Data Mahasiswa</a>
                    <a class="nav-link" href="profile.php">Profile</a>
                    <a class="nav-link" href="../logout.php">Log-out</a>
                </div>
            </div>
        </div>
    </nav>
<!--AKHIR NAVBAR -->

<!-- MENU -->
<div class="container mt-4">
    <div class="container border bg-light p-3">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col biru">
                <div class="p-3 mt-3 text-center ">
                    <a class="rounded" href="#"><img src="../../img/kelas.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Kelas Virtual</span>
                </div>
            </div>
            <div class="col biru">
                <div class="p-3 mt-3 text-center">
                    <a class="rounded" href="#"><img src="../../img/materi.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Materi Perkuliahan</span>
                </div>
            </div>
            <div class="col biru">
                <div class="p-3 mt-3 text-center">
                    <a class="rounded" href="#"><img src="../../img/lab.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Laboratory</span>
                </div>
            </div>
            <div class="col biru">
                <div class="p-3 mt-3 text-center">
                    <a class="rounded" href="#"><img src="../../img/admin.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Administrasi</span>
                </div>
            </div>
            <div class="col biru">
                <div class="p-3 mt-3 text-center">
                    <a class="rounded" href="#"><img src="../../img/praktik.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Praktikum</span>
                </div>
            </div>
            <div class="col biru">
                <div class="p-3 mt-3 text-center">
                    <a class="rounded" href="#"><img src="../../img/perpus.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">E-Perpustakaan</span>
                </div>
            </div>
            <div class="col biru">
                <div class="p-3 mt-3 text-center">
                    <a class="rounded" href="#"><img src="../../img/ujian.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Ruang Ujian</span>
                </div>
            </div>
            <div class="col ">
                <div class="p-3 mt-3 text-center ">
                    <a class="rounded" href="#"><img src="../../img/vidio.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">Materi Vidio</span>
                </div>
            </div>
            <div class="col ">
                <div class="p-3 mt-3 text-center ">
                    <a class="rounded" href="#"><img src="../../img/etfl.png" alt=""></a>
                </div>
                <div class="text-center mb-3 ">
                    <span class="text-break fw-bold">ETFL</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--AKHIR MENU -->
<div class="container m-5">
     
</div>
<!-- PENGUMUMAN -->
<div class="container px-4">
  <div class="row gx-3 ">
    <div class="col-6">
        <div class="p-3 border">
            <div class="container">
                <span class="fs-4 fw-bold">Pengumuman</span>
            </div>

            <?php
            include '../konek.php';

                $data = mysqli_query($conn,"SELECT * FROM pengumuman ");
                while ($tampil = mysqli_fetch_array($data)){
                    echo" 
                    <div class='container my-3'>
                        <div class='card timbul ' style='width: 23rem;'>
                            <div class='card-body'>
                                <h5 class='card-title mb-4 text-capitalize'>$tampil[judul]</h5>
                                <p class='card-text'>$tampil[des]</p>
                                <a href='$tampil[link]' class='btn btn-outline-success'>Go link</a>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

        </div>
    </div>
<!-- AKHIR PENGUMUMAN -->
<!-- TUGAS -->
    <div class="col-6">
      <div class="p-3 border ">
        <div class="container">
            <span class="fs-4 fw-bold">Tugas</span>
        </div>

        <?php

            $data = mysqli_query($conn,"SELECT * FROM tugas where id_dosen = '$_SESSION[session_id_user]'");
            while ($tampil = mysqli_fetch_array($data)){
                echo" 
                <div class='container my-3'>
                    <div class='card timbul' style='width: 23rem;'>
                        <div class='card-body'>
                            <h5 class='card-title mb-4 text-capitalize'>$tampil[judul_tugas]</h5>
                            
                            <p class='card-text mb-4'>$tampil[des_tugas]</p>
                            <a href='detil.php?idTugas=$tampil[id_tugas]' class='btn btn-outline-success'>Detile tugas</a>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- AKHIR TUGAS -->
</body>
</html>

