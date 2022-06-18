<?php
  
  function upload($data) {
    include '../konek.php';

    $namaFile = $_FILES[$data]['name'];
    $error = $_FILES[$data]['error'];
    $tmpName = $_FILES[$data]['tmp_name'];
  
    //cek apakah tidak ada file yang dipilih
    if ($error === 4) {
      echo"<script>
      alert('Tolong Pilih File Terlebih Dahulu');
      </script>";
      return false;
    }
  
    //cek apakah yang diupload bukan gambar
    $ekstensiFileValid = ['doc','docx','pdf'];
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
  
      $namaFileBaru = date("d-M-Y") . "-$data-" . uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiFile;
    
      move_uploaded_file($tmpName, '../../tugas/' . $namaFileBaru);

    return $namaFileBaru;
  }
?>