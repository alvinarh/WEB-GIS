<?php
include 'koneksi.php';
 
// menyimpan data kedalam variabel
$id            = $_POST['id'];
$nama           = $_POST['nama'];
$alamat           = $_POST['alamat'];
$lat        = $_POST['lat'];
$lng       = $_POST['lng'];
 
if($id=="")
{
  // echo "NIM kosong belum diisi, ";
  echo "<script>alert('ID Belum diisi');history.go(-1);</script>";
}
 
if($nama=="")
{
  echo "<script>alert('Nama Belum diisi');history.go(-1);</script>";
}

if($alamat=="")
{
  echo "<script>alert('Alamat Belum diisi');history.go(-1);</script>";
}
 
if($lat=="")
{
  echo "<script>alert('Latitude Belum diisi');history.go(-1);</script>";
}
if($lng=="")
{
  echo "<script>alert('Longitude Belum diisi');history.go(-1);</script>";
}
  else
{
 
/* cek input NIM apakah sudah ada nim yang digunakan */
   $pilih="select * from titik_hotel where id='$id'";
   $cek=mysqli_query($conn, $pilih);
 
   $jumlah_data = mysqli_num_rows($cek);
   if ($jumlah_data >= 1 ) 
   {
 
  echo "<script>alert('ID yang sama sudah digunakan');history.go(-1);</script>";
    }
   else
{
 
// query untuk insert data mahasiswa
   $query="INSERT INTO titik_hotel SET  id='$id',nama='$nama',alamat='$alamat',lat='$lat',lng='$lng'";
mysqli_query($conn, $query);
 
// echo " Input Data yang anda masukkan sukses berhasil";
// header("location:query.php");
 
echo "<script>alert('Data yang anda Input sukses');window.location='data_pesebaran.php'</script>";
    }
 }
?>