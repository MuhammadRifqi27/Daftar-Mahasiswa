<?php  
// koneksi ke DB MySQL
// buat var untuk menampung resource koneksi
// $db = mysqli_connect('host','user','pass','db_name');
// error suppressor 
$db = @mysqli_connect('localhost','root','','webprak') or die('Gangguan terhadap server.. silahkan coba lagi..');
?>