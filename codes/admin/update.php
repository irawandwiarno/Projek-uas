<?php

    session_start();
    include "../konek.php";

    // if(isset($_SESSION['session_title'])){
    //     if($_SESSION['session_title'] == 2){
    //         header("location: ../mahasiswa/index.php");
    //     }else if($_SESSION['session_title'] == 3){
    //         header("location: ../admin/index.php");
    //     }
    // } else {
    //     header('Location: ../../index.php');
    // }

    $sql = mysqli_query($conn, "SELECT * FROM data_user WHERE id_user='$_GET[kode]'");
    $data = mysqli_fetch_array($sql);
    
    if($data['title'] == 2){
        $direk = 'index.php';   
    }else{
        $direk = 'dosen.php';
    }
    
?>
<?php
    if(isset($_POST['kirim'])){
        mysqli_query($conn, "UPDATE data_user set
        nrp = '$_POST[nrp]', 
        nama = '$_POST[nama]', 
        kelas = '$_POST[kelas]', 
        jurusan = '$_POST[jurusan]',
        title = '$_POST[title]',
        user = '$_POST[username]'
        WHERE id_user= '$_GET[kode]'");
        echo "<script>
        <alert>Pengeditan Data Berhasil</alert> 
        </script>";
        if($data['title'] == 2){  
            header('Location: index.php');
        }else{
            header('Location: dosen.php');
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
                                </div>
                                <div class="col-9">
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="nrp" value="<?php echo $data['nrp']; ?>" autocomplete="off">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" autocomplete="off">                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="kelas" value="<?php echo $data['kelas']; ?>" >                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan'];?>" >                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" >                                        
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="username" value="<?php echo $data['user']; ?>" autocomplete="off">                                        
                                    </div>
                                    <div style="margin-top:10px" class="form-group">
                                        <div class="col-sm-12 controls">
                                            <button class="btn btn-success right" type="submit" name="kirim">KIRIM</button> 
                                            <a href="<?php $direk?>" ><button class="btn btn-success right" type="submit" name="kirim">BATAL</button></a>
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


