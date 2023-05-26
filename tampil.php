<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:index.php');
} else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
<h1>Haloo <?= $_SESSION['username']?> Desa Benda</h1>

Data data Penduduk Desa Benda 
<br>
Untuk menambahkan data klik ->

    


    <table border = "5" cellpadding = "20" align = center>
        <th>Nama</th>
        <th>NIK</th>
        <th>Umur</th>
        <th>Aksi</th>

        

<?php

include("koneksi.php");

if ( $_SERVER ['REQUEST_METHOD'] ==  "POST") {

   
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $um = $_POST['umur'];

    
}
$sql = "SELECT * FROM tb_crud";
$query = mysqli_query($server, $sql);
if(mysqli_num_rows($query) > 0) {
    while($tampil = mysqli_fetch_assoc($query)) { 
?>
    <tr>
        <td><?php echo $tampil["nama"];?></td>
        <td><?php echo $tampil["nik"];?></td>
        <td><?php echo $tampil["umur"];?></td>
        <td><a href="hapus.php?nik=<?php echo $tampil['nik'] ?>">Hapus |
            <a href="edit.php?nik=<?php echo $tampil['nik'] ?>"> Edit
        </a></td>
    </tr>
    
      
    <?php
    }
    
    
}
else {
    echo "0 results";
}


?>

<button><a href="isi.php"> tambah penduduk
</a></button>
<br>
<button><a href="logout.php"> Logout
</a></button>
<br><br>

<?php
}
?>

</body>
</html>