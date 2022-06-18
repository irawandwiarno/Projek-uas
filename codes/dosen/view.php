<?php
    session_start();
    include '../konek.php';

    $idTugas = $_GET['idTugas'];
    $id_user = $_GET['idUser'];

    $query_tabel_terkumpul = mysqli_query($conn, "SELECT * FROM terkumpul WHERE id_tugas = $idTugas AND id_user = $id_user");
    $ambil_data_tabel_terkumpul = mysqli_fetch_array($query_tabel_terkumpul);


    $id_tugas = $ambil_data_tabel_terkumpul['id_tugas'];
    $nama_tugas = $ambil_data_tabel_terkumpul['data'];
    $komen = $ambil_data_tabel_terkumpul['komen'];
    $dataNilai = $ambil_data_tabel_terkumpul['nilai'];

    $query_tabel_data_user = mysqli_query($conn, "SELECT * FROM data_user WHERE id_user = $id_user");
    $ambil_data_tabel_data_user = mysqli_fetch_array($query_tabel_data_user);

    $nama = $ambil_data_tabel_data_user['nama'];
    $nrp = $ambil_data_tabel_data_user['nrp'];

    $query_tabel_tugas = mysqli_query($conn, "SELECT * FROM tugas WHERE id_tugas = $id_tugas");
    $ambil_data_tabel_tugas = mysqli_fetch_array($query_tabel_tugas);

    $judul = $ambil_data_tabel_tugas['judul_tugas'];
    $dess = $ambil_data_tabel_tugas['des_tugas'];    

    if(isset($_POST['kirim'])){
        $nilai = $_POST['nilai'];

        $update_nilai = mysqli_query($conn, "UPDATE terkumpul SET nilai ='$nilai' WHERE id_tugas = $idTugas AND id_user = $id_user");
        echo "<script>
        alert('Berhasil Memberikan Nilai');
        document.location.href='detil.php?idTugas=$idTugas';
        </script>";
    }

    if($dataNilai == NULL){
        $warnaBtn = 'btn-primary';
        $isiBtn = 'Kirim Nilai';
    }else{
        $warnaBtn = 'btn-warning';
        $isiBtn = 'Edit Nilai';
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
<!-- DETILE TUGAS -->
    <div class="container-fluid p-3">
        <div class="row gx-4 ">
            <div class="col-8 ">
                <div class="card shadow-sm" style="max-width: 60rem;">
                <div class="card-header fs-4 fw-bold text-capitalize ps-4" style="background-color: #ddddda;"><?php echo "$nama";?></div>
                    <div class="card-body border-light mb-3 ms-3">
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo "$nrp";?></h6>
                        <h5 class="card-title mt-3 fs-5 text-capitalize"><?php echo "$judul";?></h5>
                        <p class="card-text fs-6" style="color: rgb(132, 132, 132); font-size: 11pt"><?php echo "$dess"?></p>
                        <div class="row alert border shadow-sm me-5" role="alert" style="width: 20rem;">
                            <div class="col-10">
                                <p>Download File Tugas Disini</p>
                            </div>
                            <div class="col-1">
                                <a href="../download.php?file=<?php echo "$nama_tugas";?>"><img style="width: 2rem;" src="../../icon/download.png" alt="download"></a>
                            </div>
                        </div>
                        <div class="row g-1">
                            <div class="col-1 text-start">
                              <p class="fs-6 fst-italic">Pesan :</p>  
                            </div>
                            <div class="col-10 border px-3 py-1 text-capitalize" style="height: 10rem;">
                                <p><?php echo "$komen";?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--AKHIR DETILE TUGAS -->

<!-- SUDAH MENGUMPULKAN -->
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-header fs-4 fw-bold text-capitalize ps-4" style="background-color: #ddddda;">Berikan Penilaian</div>
                        <div class="row g-3 align-items-center">
                            <form action="" method="POST">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Input Nilai</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputPassword6" class="form-control" name="nilai" autocomplete="off" <?php if($dataNilai != NULL){echo "Value='$dataNilai'";} ?>>
                                </div>
                                <button class="btn <?php echo"$warnaBtn";?> mt-2" type="submit" name="kirim"><?php echo "$isiBtn";?></button>
                            </form>
                        </div>      
                    </div>
                </div>
            </div>
<!--AKHIR SUDAH MENGUMPULKAN -->
        </div>
    </div>
</body>
</html>