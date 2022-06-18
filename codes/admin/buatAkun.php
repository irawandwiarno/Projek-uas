<?php

    session_start();
    include "../konek.php";
    include "regis.php";

    if(isset($_SESSION['session_title'])){
        if($_SESSION['session_title'] == '1'){
            header("location: ../dosen/index.php");
        }else if($_SESSION['session_title'] == '2'){
            header("location: ../mahasiswa/index.php");
        }
    } else {
        header('Location: ../../index.php');
    }
    
    if (isset($_POST["submit"])) {
        #kondisi ketika data lebih dari 0 berarti terdapat user baru
        if (registrasi($_POST) > 0) {
            echo "<script> alert('user baru telah ditambahkan'); document.location='index.php'; </script>";
        } else {
            echo mysqli_error($conn);

        }
    }
?>


<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="../../css/style.css" />
    <!-- Akhir My CSS  -->
    <title>Document</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #4771ea;">
        <div class="container">
            <a class="navbar-brand fw-normal fs-5" href="#">Awan Hosting</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="buatAkun.php">Input</a>
                <a class="nav-link" href="dosen.php">Dosen</a>
                <a class="nav-link" href="index.php">Mahasiswa</a>
                <a class="nav-link" aria-current="page" href="../logout.php">log-out</a>
              </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->


<!-- Isi data form -->
    <div class="container my-3">   
        <div class="row justify-content-center">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3 style="color: #fff;">Data Baru</h3>
                        </div>
                    </div>                  
                        <form id="loginform" class="form-horizontal" action="" method="POST" role="form">       
                            <div class="container bg-light p-4 rounded-2 mb-5">
                            <div class="row g-3 ">
                                <div class="col-2 text-start fs-6 fst-italic text-capitalize">
                                    <div class="px-1">
                                        <label class=" my-2">Nrp</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">Nama</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">Kelas</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-1">Jurusan</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">Title</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-2">Username</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">Password</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">Konfirmasi Ulang</label>
                                    </div>
                                </div>
                                <div class="col-1 text-end">
                                    <div class="px-1">
                                        <label class=" my-2">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-1">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-2">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">:</label>
                                    </div>
                                    <div class="px-1">
                                        <label class=" my-3">:</label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="nrp" placeholder="Nrp" autocomplete="off">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" autocomplete="off">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="kelas" placeholder="Kelas">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="jurusan" placeholder="Jurusan">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="title" placeholder="Title">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">                                        
                                    </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                                    </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="password2" placeholder="Konfrimasi Ulang" autocomplete="off">
                                    </div>
                                    <div style="margin-top:10px" class="form-group">
                                        <div class="col-sm-12 controls">
                                            <a href="masuk.php"><button class="btn btn-success right" name="submit">Tambah Data</button></a>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>                     
                </div>  
            </div>
        </div> 
    </div>
    <!--akhir login form -->
</body>
</html>


