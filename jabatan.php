<?php include "koneksi.php";
 if(isset($_GET['edit'])) {
    $esql=mysqli_query($con,"select * from tb_jabatan where kd_jabatan='$_GET[id]'");
    $udata=mysqli_fetch_array($esql);
}

   if(isset($_POST['ubah'])) {
       $nama = $_POST["nama_jabatan"];
       $tugas = $_POST["tugas"];
   
       $query = "update tb_jabatan set nama_jabatan='$nama',tugas='$tugas' where kd_jabatan='$_GET[id]'";
   
       mysqli_query($con,$query);
   
       echo "<script>alert('Data Sudah Terubah');</script>";
   }
if(isset($_GET['hapus'])){
    mysqli_query($con,"delete from tb_jabatan where kd_jabatan='$_GET[id]'");
    echo "<script>alert('data terhapus!')</script>";
    echo "<script>document.location.href='jabatan.php'</script>";
}
if(isset($_POST['simpan'])){
mysqli_query($con,"insert into tb_jabatan values ('','$_POST[nama_jabatan]','$_POST[tugas]')");
echo "<script>alert('Data Tersimpan');</script>";
echo "<script>document.location.href='jabatan.php'</script>";
}
?>
<html>
    <head>
        <body style="background-color: #FBE4FF">
<h3>by: Nur Nisrina Sudrayanti</h3>
<h1><center>DAFTAR JABATAN</center></h1> 
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
                <td bgcolor=" #8F6E76"><font face="arial"><center>KOLOM PENGISIAN DATA</td>
</tr>
    <table style="margin-left:auto;margin-right:auto" border="2">
        <tr>
            <td><input value="<?php echo @$datax ['nama_jabatan']?>" type="text" name="nama_jabatan" placeholder="Masukan Nama Jabatan"></td></tr>
        <tr>
            <td><input value="<?php echo @$datax ['tugas']?>" type="text" name="tugas" placeholder="Masukan tugas"></td></tr>
        <tr>
        <td><input type="submit" name="simpan" value="Simpan"></td></tr>
        <td><input type="submit" name="ubah" value="ubah"></td></tr>
</table>
</form> <br>

<form method="post">
    <table style="float:right" border="1">
        <tr>
            <td><input type="text" name="tcari" placeholder="ketik jabatan yang ingin dicari" required></td>
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
            background-color: #8F6E76;
            color: white;
        }
        </style>
    <tr style="background-color: #8F6E76;
            color: white;">
        <td><center>No</center></td>
        <td><center>Nama Jabatan</center></td>
        <td><center>Tugas</center></td>
        <td><center>Action</center></td>
</tr>
<?php
if(isset($_POST['cari'])){
$sql=mysqli_query ($con,"select * from tb_jabatan where nama_jabatan like '%$_POST[tcari]%'");
}else{
    $sql=mysqli_query ($con,"select * from tb_jabatan");
}
$no=0;
while($data=mysqli_fetch_array($sql)){
    $no++;
    ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $data ['nama_jabatan']?></td>
        <td><?php echo $data ['tugas']?></td>
        <td><span><a href="?edit&id=<?php echo $data['kd_jabatan']?>">Edit</span></a>
        <a href="?hapus&id=<?php echo $data['kd_jabatan']?>">Hapus</a>
</td>
</tr>
<?php } ?>
</table>
</form>



