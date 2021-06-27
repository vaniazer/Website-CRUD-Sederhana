<?php 
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
     $db->input($_POST['judul_musik'],$_POST['album'],$_POST['artis'],$_POST['cover']);	
    header("location:tampil.php");
 }
 elseif($aksi == "hapus"){  
    $db->hapus($_GET['id']);
    header("location:tampil.php");
 }
 elseif($aksi == "update"){
    $db->update($_POST['id'],$_POST['judul_musik'],$_POST['album'],$_POST['artis'],$_POST['cover']);
    header("location:tampil.php");
 }
 elseif($aksi == "search"){  
	$keyword = $_POST['search'];
	header("location:tampil.php?search=$keyword");
} 
?>
