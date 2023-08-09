<?php
session_start();
include 'koneksi.php';


$judul = $_POST['judul'];
$konten = $_POST['konten'];
$id_anggota = $_POST['id_anggota'];
$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg',);
$filename = $_FILES['gambar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


$nama_file = 'artikel' . $rand . '_' . $filename;
move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . 'artikel' . $rand . '_' . $filename);
$query = "INSERT INTO artikel VALUES ('', '$judul', '$konten', '$nama_file','$id_anggota')";

if (mysqli_query($koneksi, $query)) {
    $_SESSION['pesan'] = 'Data berhasil ditambahkan';
    header('location: /lsp-jwd/admin/artikel.php');
    exit();
}
