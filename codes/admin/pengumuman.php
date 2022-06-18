<?php

    session_start();
    include "../konek.php";

    if($_SESSION['session_title'] != '0'){
        if($_SESSION['session_title'] == '1'){
            header("location: ../dosen/index.php");
        }else if($_SESSION['session_title'] == '2'){
            header("location: ../mahasiswa/index.php");
        }
    } else {
        header('Location: ../../index.php');
    }

    $judul = strtolower(stripslashes($data["judul"]));
    $sub_judul = mysqli_real_escape_string($conn, $data["sub_judul"]);
    $des = mysqli_real_escape_string($conn, $data["des"]);

    if (isset($_POST["submit"])) {
        mysqli_query($conn, "INSERT INTO data_user VALUES('','$nrp','$nama','$kelas','$jurusan','$username', '$password','$title')");
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
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #4771ea;">
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


<!-- login form -->
    <div class="container">   
        <div class="row justify-content-center">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3 style="color: #fff;">Registrasi</h3>
                        </div>
                    </div>                  
                        <form id="loginform" class="form-horizontal" action="" method="POST" role="form">       
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="judul" placeholder="Judul">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="sub_judul" placeholder="sub_judul">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="text" class="form-control" name="des" placeholder="des">
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="text" class="form-control" name="link" placeholder="link">
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <button class="btn btn-success right" name="submit">Tambah Data</button> 
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


