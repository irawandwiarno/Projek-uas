<?php
  session_start();
  include 'codes/konek.php';

    //atur variabel
  $err        = "";
  $username   = "";

  if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];




    if($username == '' || $password == ''){
      $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }else{
      $sql1 = "SELECT * FROM data_user where user = '$username'";
      $q1   = mysqli_query($conn,$sql1);
      $data  = mysqli_fetch_assoc($q1);

      if(mysqli_num_rows($q1) == 0){
        $err .= "<li>User <b>$username</b> tidak tersedia.</li>";
      } else {
        if($data['paswd'] != password_verify($password, $data['paswd'])){
          $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       
      }
      
      if($username == 'admin'){
        if($password == 'admin'){
          $_SESSION['session_title'] = '3';
          header("location: codes/admin/buatAkun.php");
        }
      }


      if(empty($err)){
          $_SESSION['session_username'] = $username; //server
          $_SESSION['session_password'] = password_verify($password, $data['password']);
          $_SESSION['session_title'] = $data['title'];
          $_SESSION['session_id_user'] = $data['id_user'];


          if($data['title']== 1 ){
            header("location: codes/dosen/index.php");
          }else if($data['title']== 2){
            header("location: codes/mahasiswa/index.php");
          }
          exit();
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
    <link rel="stylesheet" href="css/style.css" />
    <!-- Akhir My CSS  -->

    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div id="loginbox" style="margin-top: 50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">
                <h3 style="color: #fff">Login dan Masuk Ke Sistem</h3>
              </div>
            </div>
            <div style="padding-top: 30px" class="panel-body">

            <?php if(!empty($err)){ ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $err;?>
                </div>
              <?php }?>
              <form id="loginform" class="form-horizontal" action="" method="POST" role="form">
                <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" />
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="login-password" type="password" class="form-control" name="password" placeholder="password" />
                </div>
                <div style="margin-top: 10px" class="form-group">
                  <div class="col-sm-12 controls">
                    <input type="submit" name="login" class="btn btn-success" value="Login" />
                    <!-- <input style="color: #fff" type="submit" name="register" class="btn" value="| Register" /> -->
                    <!-- <a class="btn" href="codes/buatAkun.php">Register</a> -->
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
