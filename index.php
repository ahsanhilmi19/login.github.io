<?php
require "db.php";

session_start();

if(isset($_COOKIE['status_login'])){
  $status_cookie = "on";
}
else{
  $status_cookie = "off";
  $_COOKIE['waktu habis'] = "";
}



if(isset($_SESSION['status_login'])){
  echo " <h3>cookie = $status_cookie</h3>  <br> ";
  if( $status_cookie == 'on' ){
    echo " <h3>cookie akan habis pada jam saat ini, menit ke $_COOKIE[waktu_habis]</h3>  <br>";
  }

  echo " <h3>hello $_SESSION[status_login]</h3> ";
}


else{
  header("Location: login_page.php");
}

if(isset($_POST['logout'])){
  session_destroy();  
  setcookie('status_login',"", time() - 3600);
  header("Location: login_page.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
  
  <form action="" method="POST">
    <button class="btn btn-outline-primary" type="submit" name="logout">logout</button>
  </form>


  <script src="bootstrap/bootstrap.min.js"></script>
</body>
</html>