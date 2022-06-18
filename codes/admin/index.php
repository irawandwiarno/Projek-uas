<?php 
session_start();

include '../konek.php';

if(isset($_SESSION['session_title'])){
    if($_SESSION['session_title'] == '1'){
        header("location: ../dosen/index.php");
    }else if($_SESSION['session_title'] == '2'){
        header("location: ../mahasiswa/index.php");
    }
} else {
    header('Location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Akhir Bootstrap CSS -->

    <!-- sosmed UI -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!--Akhir sosmed UI -->

    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" />
    <!--Akhir Icon Bootstrap -->

    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <!-- Akhir My CSS  -->

    <title>Document</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #4771ea;">
        <div class="container">
            <a class="navbar-brand fw-normal fs-5" href="#">Awan E-learning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                  <a class="nav-link" href="buatAkun.php">Input</a>
                  <a class="nav-link " href="dosen.php">Dosen</a>
                  <a class="nav-link active" href="index.php">Mahasiswa</a>
                  <a class="nav-link" aria-current="page" href="../logout.php">log-out</a>
              </div>
            </div>
        </div>
    </nav>
        <!-- Akhir Navbar -->

    <div class="container">
        
        <table class="table table-striped mt-4">
            <thead>
                <th>NRP</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>USER</th>
                <th>TITLE</th>
                <th class="text-center" >AKSI</th>
            </thead>
            <tbody>
                <?php
                    $data = mysqli_query($conn,"SELECT * FROM data_user where title = '2' ORDER BY nrp");
                    while ($tampil = mysqli_fetch_array($data)){
                        echo" 
                        <tr>
                            <td>$tampil[nrp]</td>
                            <td>$tampil[nama]</td>
                            <td>$tampil[kelas]</td>
                            <td>$tampil[jurusan]</td>
                            <td>$tampil[user]</td>
                            <td>$tampil[title]</td>
                            <td class='text-center'><a class='btn btn-danger' href='?kode=$tampil[id_user]'>HAPUS</a>   <a class='btn btn-primary' href='update.php?kode=$tampil[id_user]'>UBAH</a></td>
                        </tr>";
                    }
                ?>
                
            </tbody>
        </table>
    </div>

    <?php
    if(isset($_GET['kode'])){

    mysqli_query($conn, "DELETE FROM  data_user WHERE id_user ='$_GET[kode]'");
    echo "Penghapusan Data Berhasil";
    }
    ?>
</body>
</html>

