<?php
    session_start();
    include '../konek.php';

    $id = $_SESSION['session_id_user'];

    if(isset($_POST['submit'])){
        $pwLama = $_POST['passLama'];
        $pwBaru = $_POST['password'];
        $pwBaruKon = $_POST['password2'];
        $err = '';

        // CEK PW LAMA
        if($pwLama == ''){
            $err .= "<li>Silakan masukkan password lama anda.</li>";
          }else{
            $sql1 = "SELECT * FROM data_user where id_user = $id";
            $q1   = mysqli_query($conn,$sql1);
            $data  = mysqli_fetch_assoc($q1);

            $cek = password_verify($pwLama, $data['paswd']);
            var_dump($cek);
            if($pwBaru == '' || $pwBaruKon == ''){
              $err .= "<li>Password Baru dan Konfirmasi Tidak Boleh Kosong</li>";
            }else{
              if($cek == false){
                $err .= "<li>Password Lama yang dimasukkan tidak sesuai.</li>";
              }       
            }
            // CEK KONFIRM PW
            if($pwBaru !== $pwBaruKon){
                $err .= "<li>Password Tidak Sesuai</li>";
            }
        }

        if(empty($err)){
         //CARA MENGENKRIPSIKAN PASSWORD
        $pasBaru = password_hash($pwBaru, PASSWORD_DEFAULT);

        $sql = "UPDATE data_user SET paswd = '$pasBaru' WHERE id_user = $id";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            echo "<script> alert('Password Berhasil Di rubah'); document.location='profile.php'; </script>";
        }else{
            echo "<script> alert('Password Gagal Di rubah');</script>";
        }
    }
}

?>



<!DOCTYPE html>
<html>
<head>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Akhir Bootstrap CSS -->

    <!-- WARNA BODY -->
    <link rel="stylesheet" href="../../css/style.css">
    <!--AKHIR WARNA BODY -->

    <title>Document</title>
</head>
<body>

    
<!-- CARD -->
<div class="container"  >
    <div class="card position-absolute top-50 start-50 translate-middle shadow bg-body rounded" style="width: 30rem;">
        <div class="card-body">
            <form action="" method="POST">
                <?php if(!empty($err)){ ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $err;?>
                    </div>
                <?php }?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label ">Password Anda</label>
                    <div id="emailHelp" class="form-text">Masukan Password Lama Anda</div>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="passLama" autocomplete="off" placeholder="Password">
                </div>
                <div class="my-3">
                    <label for="pwBaru" class="form-label ">Input Password Baru</label>
                    <input id="pwBaru" type="password" class="form-control" name="password" placeholder="Password Baru" autocomplete="off">
                </div>
                <div class="mb-3">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password2" placeholder="Konfrimasi Ulang Baru" autocomplete="off">
                </div>
                <div class="row justify-content-between gx-4">
                    <div class="col-6 text-start">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                    <div class="col-6 text-end">
                        <a href="profile.php" class="btn btn-danger ">Batal</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<!-- AKHIR CARD -->
</body>
</html>
    