<?php
    session_start();
    include '../konek.php';
    
    $id = $_GET['idTugas'];
    $data = mysqli_query($conn,"SELECT * FROM tugas where id_tugas = '$id'");
    $tampil = mysqli_fetch_array($data)
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

<a class="btn btn-light fw-bold my-3 mx-2" href="index.php">X</a>
<!-- DETILE TUGAS -->
    <div class="container-fluid ">
        <div class="row gx-4">
            <div class="col-6">
                <div class="card border-light mb-3" style="max-width: 60rem;">
                    <div class="card-header fw-bold fs-4 text-capitalize"><?php echo $tampil['judul_tugas'];?></div>
                    <div class="card-body">
                        <h5 class="card-title fs-5">Descripsi :</h5>
                        <p class="card-text"><?php echo $tampil['des_tugas']?></p>
                        <h5 class="card-title fs-5 mt-4">Kelas :</h5>
                        <p class="card-text"><?php echo $tampil['kelas']?></p>
                        <h5 class="card-title fs-5 mt-4">Deadline :</h5>
                        <p class="card-text"><?php echo $tampil['waktu']?></p>
                    </div>
                </div>
            </div>
<!--AKHIR DETILE TUGAS -->

<!-- SUDAH MENGUMPULKAN -->
            <div class="col-6">
                <div class="p-3 border fs-6">
                    <span class="fw-bold fs-4">Sudah Mengumpulkan</span>
                    <table class="table table-striped mt-4">
                        <thead >
                            <th >NRP</th>
                            <th>NAMA</th>
                            <th>JURUSAN</th>
                            <th>KELAS</th>
                            <th>Nilai</th>
                            <th class="text-center" >AKSI</th>
                        </thead>
                        <tbody>
                            <?php
                                $ambilDataIdUser = mysqli_query($conn,"SELECT * FROM terkumpul where id_tugas = $id");
                                
                                while ($tabelTerkumpul = mysqli_fetch_array($ambilDataIdUser)){
                                    $dataUser = mysqli_query($conn,"SELECT * FROM data_user where  id_user = '$tabelTerkumpul[id_user]' ORDER BY kelas,nrp");
                                    while ($tampil = mysqli_fetch_array($dataUser)){
                                        $namaFile = $tabelTerkumpul['data'];
                                        $idUser = $tabelTerkumpul['id_user'];
                                        $nilaiData = $tabelTerkumpul['nilai'];
                                        
                                        
                                        echo" 
                                        <tr>
                                            <td>$tampil[nrp]</td>
                                            <td>$tampil[nama]</td>
                                            <td>$tampil[jurusan]</td>
                                            <td>$tampil[kelas]</td>
                                            <td>$nilaiData</td>
                                            <td> <a class='btn btn-primary' href='view.php?idTugas=$id&idUser=$idUser'>VIEW</a></td>
                                        </tr>";
                                    }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
<!--AKHIR SUDAH MENGUMPULKAN -->
        </div>
    </div>
</body>
</html>