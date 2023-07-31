<?php include "koneksi.php";
if(isset($_GET['edit'])){
    $esql = mysqli_query($con, "select * from tb_karyawan where kd_karyawan='$_GET[id]'");
     $datax =  mysqli_fetch_array($esql);
   }

   if(isset($_POST['ubah'])) {
       $nama = $_POST["nama_karyawan"];
       $jk = $_POST["jk"];
       $nohp = $_POST["no_hp"];
       $jabatan = $_POST["jabatan"];
   
       $query = "update tb_karyawan set nama_karyawan='$nama',jk='$jk',no_hp='$nohp',jabatan='$jabatan' where kd_karyawan='$_GET[id]'";
   
       mysqli_query($con,$query);
   
       echo "<script>alert('Data Sudah Terubah');</script>";
   
   }
if(isset($_GET['hapus'])){
    mysqli_query($con,"delete from tb_karyawan where kd_karyawan='$_GET[id]'");
    echo "<script>alert('data terhapus!')</script>";
    echo "<script>document.location.href='karyawan.php'</script>";
}
if(isset($_POST['simpan'])){
    mysqli_query($con,"insert into tb_karyawan values ('','$_POST[nama_karyawan]','$_POST[jk]','$_POST[no_hp]','$_POST[jabatan]')");
    echo "<script>alert('Data Tersimpan');</script>";
}
?>

<html>
    <head>
        <body style="background-color: #D3D3D3">
<h3>by: Nur Nisrina Sudrayanti</h3>
<h1><center>DAFTAR KARYAWAN</center></h1> 
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
                <td bgcolor=" #999999"><font face="arial"><center>KOLOM PENGISIAN DATA</td>
</tr>
    <table style="margin-left:auto;margin-right:auto" border="2">
        <tr>
            <td><input value="<?php echo @$datax ['nama_karyawan']?>" type="text" name="nama_karyawan" placeholder="Masukan Nama Karyawan" required></td></tr>
        <tr>
            <td><select name="jk" id="">
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option></tr>
        <tr>
            <td><input value="<?php echo @$datax ['no_hp']?>" type="text" name="no_hp" placeholder="No-Hp" required></td></tr>
            <tr>
        <td><select name="jabatan" id="">
            <option value="programmer">Programmer</option>
            <option value="system analysist">System Analysist</option>
            <option value="web developer">Web Developer</option>
            <option value="designer">Designer</option>
            <option value="technical support">Technical Support</option></tr>
        <tr>
        <td><input type="submit" name="simpan" value="Simpan"></td></tr>
        <td><input type="submit" name="ubah" value="Ubah"></td></tr>
</table>
</form> <br>

<form method="post">
    <table style="float:right" border="1">
        <tr>
            <td><input type="text" name="tcari" placeholder="ketik nama_jabatan yang ingin dicari" required></td>
            <td><input type="submit" name="cari" value="cari"></td></tr>
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
            background-color: #999999;
            color: white;
        }
        </style>
    <tr style="background-color: #999999    ;
            color: white;">
        <td><center>No</center></td>
        <td><center>Nama Karyawan</center></td>
        <td><center>Jenis Kelamin</center></td>
        <td><center>No.Hp</center></td>
        <td><center>Jabatan</center></td>
        <td><center>Action</center></td>
</tr>
<?php
if(isset($_POST['cari'])){
$sql=mysqli_query ($con,"select * from tb_karyawan where jabatan like '%$_POST[tcari]%'");
}else{
    $sql=mysqli_query ($con,"select * from tb_karyawan");
}
$no=0;
while($data=mysqli_fetch_array($sql)){
    $no++;
    ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $data ['nama_karyawan']?></td>
        <td><?php echo $data ['jk']?></td>
        <td><?php echo $data ['no_hp']?></td>
        <td><?php echo $data ['jabatan']?></td>
        <td><a href="?edit&id=<?php echo $data['kd_karyawan']?>">Edit</a>
        <a href="?hapus&id=<?php echo $data['kd_karyawan']?>">Hapus</a>
</td>
</tr>
<?php } ?>
</table>
</form>



