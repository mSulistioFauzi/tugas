<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:tampil.php');
} 

?>
<?php
$nik = $_GET['nik'];



include("koneksi.php");

$sql = "SELECT * FROM tb_crud WHERE nik = '$nik'";
$query = mysqli_query($server, $sql);
if(mysqli_num_rows($query) > 0) {
    while($tampil = mysqli_fetch_assoc($query)) { 
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
    
    <form action="" method="get">
        Nama <br>
        <input type="text" name="nama" id="nama" value="<?php echo $tampil['nama'] ?>"></input> 
        <br/r>
        Nis <br>
        <input type="number" name="nik" id="nik" value="<?php echo $tampil['nik'] ?>"></input> 
        <br/r>
        Rombel <br>
        <input type="text" name="um" id="um" value="<?php echo $tampil['umur'] ?>"></input> 
        <br/r>
        <input type="submit" name = "submit" value="Perbaharui"></input>  
    </form>
    </body>
    </html>
    <?php
    }
    
}


?>

<?php
if(isset($_GET['submit'])){
include("koneksi.php");
$nama = $_GET['nama'];
$nik = $_GET['nik'];
$um = $_GET['um'];;



$sql = "UPDATE `tb_crud` SET `nama`='$nama',`umur`='$um' WHERE nik = '$nik'" ;

$query = mysqli_query($server,$sql);

if($query){
    echo "<script>
    alert ('Update data Berhasil') ;
    document.location.href = 'tampil.php';
</script>";
}
}
?>
