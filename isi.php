<?php
if(isset($_POST['kirim'])){
    
        if ( $_SERVER ['REQUEST_METHOD'] ==  "POST") {
    
                $nama = $_POST['nama'];
                $nik = $_POST['nik'];
                $um = $_POST['umur'];
    

    function tambahdata($nama,$nik,$um) {
        include("koneksi.php");
  
  $sql = "insert into tb_crud(nama,nik,umur) 
    values ('$nama','$nik','$um')";

    $query = mysqli_query($server, $sql);
    if($query){
        echo "<script>
            alert ('Pendaftaran Berhasil') ;
            document.location.href = 'tampil.php';
        </script>";
    }
    else {
        echo "data gagal";
    }

    return $query;


}

tambahdata($nama,$nik,$um); 

}}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cek login</title>
</head>
<body>

<center>
<h1>Tambah Data penduduk</h1>


<br><br>

<form action="" method="post">
    Nama <input type="text" name = "nama">
    NIK <input type="text" name =  "nik">
    Umur <input type="text" name = "umur">
    <button type="submit" name="kirim">Kirim</button>

</form>
<br>
<button><a href="tampil.php"> Kembali Ke Data
</a></button>

</body>
</html>