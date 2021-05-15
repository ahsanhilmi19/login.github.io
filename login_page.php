<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <style>
    body{
      background-color: lightblue;
    }
    .table-login{
      width: 400px;
      font-size: 16px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
<body>

  <h2 class="text-center">Login</h2>
  <table class="table table-warning table-login">
    <form class="form" action="" method="POST">
      <tr>
        <td>Username</td><td><input class="form-control user-input" type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password</td><td><input class="form-control user-input" type="password" name="password"></td>
      </tr>
      <tr>
        <td>Ingat Saya</td><td><input class="form-check-input" type="checkbox" value="" name="cookie_checkbox" id="flexCheckDefault"></td>
      </tr>
      <tr>
        <td></td><td><button class="btn btn-outline-info" type="submit" name="login_clicked">Masuk</button></td>  
      </tr>
    </form>
  </table>
  <script src="bootstrap/bootstrap.min.js"></script>
</body>
</html>

<?php
require "db.php";
session_start();

  if(isset($_SESSION['status_login']) || isset($_COOKIE['status_login'])){
    if(isset($_COOKIE['status_login'])){
      $_SESSION['status_login'] = $_COOKIE['status_login'];
    }
    header("Location: index.php");
    
  }
  else{
    if(isset($_POST['login_clicked'])){
      // var_dump($_POST);
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $query = mysqli_query($connector,"SELECT * FROM akun WHERE username='$username' and password = '$password'");

      if(mysqli_num_rows($query)){
        
        if(isset($_POST['cookie_checkbox'])){
          setcookie('status_login',$username,time()+120);
          setcookie('waktu_habis',gmdate("i:s",time()+120),time()+120);
        }
        $_SESSION['status_login'] = $username;
        header("Location: index.php");

      }
      else{
        echo "<script>alert('username/kata sandi salah')</script>";
      }
    }
  }
?>

