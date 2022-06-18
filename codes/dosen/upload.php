<?php
  
  function upload($data) {
    include '../konek.php';

    $id = $_SESSION['session_id_user'];
    $tabel = mysqli_query($conn,"SELECT * FROM data_user where id_user = $id");
    $tampung = mysqli_fetch_array($tabel);

    $fileFoto = $tampung['foto'];

    $namaFile = $_FILES[$data]['name'];
    $error = $_FILES[$data]['error'];
    $tmpName = $_FILES[$data]['tmp_name'];
  
    //cek apakah tidak ada file yang dipilih
    if ($error === 4) {
      echo"<script>
      alert('Tolong masukan foto');
      </script>";
      return false;
    }
  
    //cek apakah yang diupload bukan gambar
    $ekstensiFileValid = ['jpg','jpeg','png'];

    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
  
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
      echo "
        <script>
          alert('Format file $data yang anda upload salah!');
        </>
      ";
      return false;
    }
  
    if($fileFoto == ''){
      $namaFileBaru = date("d-M-Y") . "-$data-" . uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiFile;
    }else{
      $namaFileBaru = explode('.', $fileFoto);
      $namaFileBaru = $namaFileBaru[0];
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiFile;
    }
    
      move_uploaded_file($tmpName, '../../imgUpload/' . $namaFileBaru);

    return $namaFileBaru;
  }
?>