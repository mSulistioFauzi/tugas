<?php

function hapusdata() {
    $nik = $_GET['nik'];
    $server = mysqli_connect("localhost","root","","db_data");
 
    $sql = "DELETE FROM tb_crud WHERE nik = '$nik'";

    $query = mysqli_query($server, $sql);
     if ($query) {
        echo "<script>
        alert ('Data berhasil dihapus! Anda akan di bawa Ke form data ') ;
        document.location.href = 'tampil.php';
    </script>";
    } else {
        echo "Penghapusan gagal sebab : <br>".mysqli_error($server);
    }
    
}
echo hapusdata();

?>