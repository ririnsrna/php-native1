<?php include "koneksi.php";
if(isset($_GET['edit'])){
    $esql  = mysqli_query($con,"select * from tb_keluhan where kd_keluhan='$_GET[id]'");
     $datax =  mysqli_fetch_array($esql);
   }

   if(isset($_POST['ubah'])) {
       $keluhan = $_POST["keluhan"];
       $tgl_keluhan = $_POST["tgl_keluhan"];
       $nama = $_POST["nama_karyawan"];
   
       $query = "update tb_keluhan set keluhan='$keluhan',tgl_keluhan='$tgl_keluhan',nama_karyawan='$nama' where kd_keluhan='$_GET[id]'";
   
       mysqli_query($con,$query);
   
       echo "<script>alert('Data Sudah Terubah');</script>";
   
   }
if(isset($_GET['hapus'])){
    mysqli_query($con,"delete from tb_keluhan where kd_keluhan='$_GET[id]'");
    echo "<script>alert('data terhapus!')</script>";
    echo "<script>document.location.href='keluhan.php'</script>";
}
if(isset($_POST['simpan'])){
    mysqli_query($con,"insert into tb_keluhan values ('','$_POST[keluhan]','$_POST[tgl_keluhan]','$_POST[nama_karyawan]')");
    echo "<script>alert('Data Tersimpan');</script>";
}
?>
<html>
    <head>
        <body style="background-color: #daeaf6">
<h3>by: Nur Nisrina Sudrayanti</h3>
<h1><center>DAFTAR KELUHAN</center></h1>  
</table>
</form> <br>

<form method="post">
<center>
        <table border="2" class="tabel2">
<tr>
<center> 
<td bgcolor=" #C6DBDA"><font face="arial"><center>Halaman Berikutnya</td></tr>
<tr>   
<table style="margin-left:auto;margin-right:auto" border="2">
<td bgcolor=" #C6DBDA"><a href="karyawan.php"> Karyawan</a></td>
<td bgcolor=" #C6DBDA"><a href="jabatan.php"> Jabatan</a></td>
<td bgcolor=" #C6DBDA"><a href="keluhan.php"> Keluhan</a></td>
</center></tr>
</table>
</form><br><br>

<form method="post">
<center>
        <table border="2" class="tabel1">
            <tr>
                <td bgcolor=" #5E7496"><font face="arial"><center>KOLOM PENGISIAN DATA</td>
</tr>
    <table style="margin-left:auto;margin-right:auto" border="2">
        <tr>
            <td><input value="<?php echo @$datax ['keluhan']?>"  type="text" name="keluhan" placeholder="Masukan keluhan" required></td></tr>
        <tr>
            <td><input value="<?php echo @$datax ['tgl_keluhan']?>" type="date" name="tgl_keluhan" placeholder="Tanggal Keluhan" required></td></tr>
        <tr>
            <td><input value="<?php echo @$datax ['nama_karyawan']?>" type="text" name="nama_karyawan" placeholder="Nama Karyawan" required></td></tr>
        <tr>
        <td><input type="submit" name="simpan" value="Simpan"></td></tr>
        <td><input type="submit" name="ubah" value="Ubah"></td></tr>
</table>
</form> <br>

<form method="post">
    <table style="float:right" border="1">
        <tr>
            <td><input type="text" name="tcari" placeholder="ketik keluhan yang ingin dicari" required></td>
            <td><input type="submit" name="cari" value="cari" required></td></tr>
            </table>
</form> <br><br><br>

            <?php include "koneksi.php"; ?>
            <table border="1" width="100%">
    <style>
        table { border-collapse: collapse;
        }
        table, th, td {
            border: 1 px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #3F5F90;
            color: black;
        }
        </style>
    <tr style="background-color: #3F5F90;
            color: white;">
        <td><center>No</center></td>
        <td><center>Keluhan</center></td>
        <td><center>Tanggal Keluhan</center></td>
        <td><center>Nama Karyawan</center></td>
        <td><center>Action</center></td>
</tr>
<?php
if(isset($_POST['cari'])){
$sql=mysqli_query ($con,"select * from tb_keluhan where keluhan like '%$_POST[tcari]%'");
}else{
    $sql=mysqli_query ($con,"select * from tb_keluhan");
}
$no=0;
while($data=mysqli_fetch_array($sql)){
    $no++;
    ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $data ['keluhan']?></td>
        <td><?php echo $data ['tgl_keluhan']?></td>
        <td><?php echo $data ['nama_karyawan']?></td>
        <td><a href="?edit&id=<?php echo $data['kd_keluhan']?>">Edit</a>
        <a href="?hapus&id=<?php echo $data['kd_keluhan']?>">Hapus</a>
</td>
</tr>
<?php } ?>
</table>
</form>



