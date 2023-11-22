<?php
include 'koneksi.php';
session_start();

  if (isset($_SESSION['nama'])) {
      header("Location: berhasil_login.php");
      exit();
  }
  
  if (isset($_POST['submit'])) {
      $email = mysqli_real_escape_string($koneksi, $_POST['email']);
      $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
  
      $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
      $result = mysqli_query($koneksi, $sql);
  
      if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['nama'] = $row['nama'];
          header("Location: home.php");
          exit();
      } else {
          echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">

    <div class="row">

      <div class="col">
        <img class="position-absolute bottom-0 start-0" src="logo.png" style="width: 500px; height: 200px;">
      </div>

      <div class="col p-4 cloginter">

        <img src="login.png" style="width: 100px; height: 100px;">

        <form>
          <div class="mb-3">
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" placeholder="kata sandi" required>
          </div>
          <div class="mb-3">
            <p class="text1">Belum punya akun? <b><a class="link-light link-offset-2 link-underline-opacity-0" href="register.html  ">Daftar Sekarang</a></b></p> 
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label text1" for="ingatSaya">Ingat saya</label>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>

      </div>
      
    </div>

  </div>
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
