<?php 
session_start();
include '../konek.php';

    if(isset($_SESSION['session_title'])){
        if($_SESSION['session_title'] == '3'){
            header("location: ../admin/index.php");
        }else if($_SESSION['session_title'] == '2'){
            header("location: ../mahasiswa/index.php");
        }
    } else {
        header('Location: ../../index.php');
    }
    if(isset($_GET['kelas'])){
        $kelasPilih = $_GET['kelas'];
    }

    $id = $_SESSION['session_id_user'];
    $cek1 = 0;

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
                    <a class="nav-link" href="inputTugas.php">Buat Tugas</a>
                    <a class="nav-link active" href="data.php">Data Mahasiswa</a>
                    <a class="nav-link" href="profile.php">Profile</a>
                    <a class="nav-link" href="../logout.php">Log-out</a>
                </div>
            </div>
        </div>
    </nav>
<!--AKHIR NAVBAR -->
<div class="container my-5">
<form action="" method="$_POST">
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
    Pilih Kelas
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li><a href="data.php?kelas=A" class="dropdown-item" type="submit">D4 IT A</a></li>
        <li><a href="data.php?kelas=B" class="dropdown-item" type="submit">D4 IT B</a></li>
    </ul>
</div>
</form>
</div>


<div class="row">
    <div class="col-7">
        <div class="container ms-3  border shadow-sm rounded">
            <table class="table table-hover my-4">
                <thead>
                    <th>NRP</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>JURUSAN</th>
                </thead>
                <tbody>
                    <?php
                        if(isset($_GET['kelas'])){
                            $data = mysqli_query($conn,"SELECT * FROM data_user where kelas = '$kelasPilih' ORDER BY nrp");
                            while($tampil = mysqli_fetch_array($data)){
                                echo" 
                                <tr>
                                    <td>$tampil[nrp]</td>
                                    <td>$tampil[nama]</td>
                                    <td >$tampil[kelas]</td>
                                    <td>$tampil[jurusan]</td>
                                </tr>";
                            }
                        }
                    ?>   
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-5 px-4">
        <div class="container border ">
            <div class="fs-4 fw-bold py-1">TUGAS</div>
            <div class="container bg-dark" style="height:2px;"></div>
            <?php
            if(isset($_GET['kelas'])){
                $dataTugas = mysqli_query($conn,"SELECT * FROM tugas WHERE kelas = '$kelasPilih' AND id_dosen = $id");
                while ($tampilTugas = mysqli_fetch_array($dataTugas)){
                    $cek1 = 1;
                    echo" 
                    <div class='container my-3'>
                        <div class='card timbul' style='width: 23rem;'>
                            <div class='card-body'>
                                <h5 class='card-title mb-4 text-capitalize'>$tampilTugas[judul_tugas]</h5>
                                
                                <p class='card-text mb-4'>$tampilTugas[des_tugas]</p>
                                <a href='detil.php?idTugas=$tampilTugas[id_tugas]' class='btn btn-outline-success'>Detile tugas</a>
                            </div>
                        </div>
                    </div>
                    ";
                }
            }
            ?>
            <?php if(isset($_GET['kelas'])){?>
                <?php if($cek1!=1){?>
                    <p class="fs-4 fw-bold text-center my-3">Belum Ada Tugas</p>
                <?php }?>
            <?php }else{?>
                <p class="fs-4 fw-bold text-center my-3">Belum Ada Tugas</p>
            <?php }?>
        </div>
    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>