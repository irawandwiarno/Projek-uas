<?php
    session_start();
    include '../konek.php';
    include 'uploadTugas.php';
    
    $idUser = $_SESSION['session_id_user'];
    $id = $_GET['idTugas'];
    $data = mysqli_query($conn,"SELECT * FROM tugas where id_tugas = $id");
    $tampil = mysqli_fetch_array($data);

    $dataTugas = mysqli_query($conn,"SELECT * FROM terkumpul where id_tugas = $id AND id_user = $idUser");
    $cekTugas = mysqli_fetch_array($dataTugas);

    if($cekTugas != NULL){
        $sudahAda = $cekTugas['data'];
        $dataNilai = $cekTugas['nilai'];
    }else{
        $sudahAda = false;
        $dataNilai = NULL;
    }

    if(isset($_POST['submit'])){
        $dataFile = upload('fileTugas');
        
        if($dataFile != false){
            $idTugas = $id;
            $komen = $_POST['dess'];

            $sql = "INSERT INTO terkumpul VALUES ('','$idTugas','$idUser','','$dataFile','$komen')";
            $query = mysqli_query($conn, $sql);
        }

        if ($dataFile != false) { 
            echo "<script>
            alert('Berhasil Mengupload Tugas');
            </script>"; 
        }else { 
            echo "<script>
            alert('Data Gagal Ditambahkan');
            </script>"; 
        }
    }

    if($sudahAda == NULL){
        $butonColor = 'btn-success';
        $textButon = 'Submit Tugas';
    }else{
        $butonColor = 'btn-warning';
        $textButon = 'Edit Tugas';
    }

    if($dataNilai <= 100 && $dataNilai >= 75){
        $text = "Bagus, Teruskan bakatmu!";
        $textColor = '#68bb59';
    }else if($dataNilai <= 74 && $dataNilai >= 50){
        $text = "Ayo, Semangat Belajar!!";
        $textColor = '#ffd700';
    }else if($dataNilai <= 49 && $dataNilai >= 1){
        $text = "Ditingkatkan ya Belajarnya!!";
        $textColor = '#db1514';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Akhir Bootstrap CSS -->

    <style>
        body{
            background-color: #f7f7f7;
        }
    </style>

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
                    <a class="nav-link active"  href="index.php">Home</a>
                    <a class="nav-link" href="tugas.php">Tugas</a>
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
            <div class="col-8 ">
                <div class="card" style="max-width: 60rem; height:27rem;">
                    <div class="card-header fs-4 fw-bold text-capitalize" style="background-color: #ddddda;"><?php echo $tampil['judul_tugas'];?></div>
                    <div class="card-body border ">
                        <h5 class="card-title " style="color: rgb(132, 132, 132); font-size: 12pt; ">Descripsi :</h5>
                        <p class="card-text fs-6" style="color: rgb(132, 132, 132); font-size: 11pt"><?php echo $tampil['des_tugas']?></p>
                        <h5 class="card-title mt-4" style="color: rgb(132, 132, 132); font-size: 12pt">Kelas :</h5>
                        <p class="card-text fs-6" style="color: rgb(132, 132, 132); font-size: 11pt"><?php echo $tampil['kelas']?></p>
                        <h5 class="card-title mt-4" style="color: rgb(132, 132, 132); font-size: 12pt">Deadline :</h5>
                        <p class="card-text fs-6 mb-5" style="color: rgb(132, 132, 132); font-size: 11pt"><?php echo $tampil['waktu']?></p>
                        <?php if($sudahAda != NULL){?>
                            <div class="row alert alert-success" role="alert">
                                <div class="col-11">
                                    <p>Sudah Mengumpulkan!</p>
                                </div>
                                <div class="col-1">
                                    <a href="../download.php?file=<?php echo "$sudahAda";?>"><img style="width: 2rem;" src="../../icon/download.png" alt="download"></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
<!--AKHIR DETILE TUGAS -->

<!-- SUDAH MENGUMPULKAN -->
            <div class="col-4">
                <?php if($dataNilai == 0){?>
                <div class="card border-light mb-3" style="max-width: 60rem; ">
                    <div class="card-header fs-5 text-capitalize" style="background-color: #ddddda;">Kumpulkan Tugas</div>
                    <div class="card-body border">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <h5 class="card-title fs-5 ms-1">Upload Tugas</h5>
                            <p class="card-text ms-1">Hanya bisa file doc,pdf,docx dan maxsimal size 3 MB</p>
                                <div class="mt-4 fw-bold ms-1">Komentar</div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="dess" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Pilih File</label>
                                    <input class="form-control" type="file" id="formFile" name="fileTugas">
                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <button class="btn <?php echo "$butonColor";?> fw-bold" name="submit" style="color: #fff;"><?php echo "$textButon";?></button>
                                    </div>
                                </div>
                            
                        </form>
                    </div>
                </div>
                <?php }else{?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-header text-center fs-4 fw-bold text-capitalize ps-4" style="background-color: #ddddda;">Nilai Anda</div>
                        <div class="row g-3 align-items-center text-center">
                            <h1 class="fw-bold" style="font-size: 7rem;"><?php echo"$dataNilai";?></h1>
                            <div class="shadow-sm pt-3" style="background-color: <?php echo "$textColor";?>;">
                                <p class="text-center ps-6 fw-bold" style="color: white;"><?php echo "$text";?></p>
                            </div>
                        </div>      
                    </div>
                </div>
                <?php }?>
            </div>
<!--AKHIR SUDAH MENGUMPULKAN -->
        </div>
    </div>
</body>
</html>