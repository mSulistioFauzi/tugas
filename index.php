<?php

session_start();

if(isset($_SESSION['username'])){
    header('location:tampil.php');
} else {
    
?>

<?php
include('koneksi.php');

if(isset($_POST["submit"])){
$nama = $_POST["nama"];
$password = $_POST["pw"];

$sql = "SELECT * FROM tb_login 
        WHERE   username = '$nama' AND password = '$password'";

$query = mysqli_query($server, $sql);
$hasil =  mysqli_num_rows($query);
if(mysqli_num_rows($query)){

session_start();        
if (isset($_SESSION['username'])) {
    header('localtion:tampil.php');
}else{
    $sql = "SELECT * FROM tb_login 
        WHERE   username = '$nama' AND password = '$password'";
    $query = mysqli_query($server, $sql);

    if (mysqli_num_rows($query) > 0) {
        $array = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $array['username'];//membuat atau register sesi
    
        header('location:tampil.php');
    }
}
 } else {

    $error = true;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silahkan Login</title>
</head>
<body>
<center>

<h2><b>Data Penduduk Desa Benda</b></h2>
<p>Silahkan Login Terlebih Dahulu</p>

<?php if( isset($error)) {    ?>

<i style="color: red; font-style: italic;">username / password salah!</i>

<?php } ?>


    <form action="" method="post">
    <div class="form-group">
        <label for="">Username</label>  
        <br> <input type="text" name = "nama"> </input> <br>
        <label for="">Password</label>   
        <br> <input type="password" name = "pw"> </input> <br>
        <br> 
        
        <button type="submit" name = "submit" class="btn btn-dark mb-2"> Login    </button> 
    </form>

    
    


</center>
<br>

<?php
}
?>


</body>
</html>