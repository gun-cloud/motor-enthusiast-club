<?php
session_start();
include 'koneksi.php';

$id_anggota = $_POST['id_anggota'];
$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg',);
$filename = $_FILES['gambar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


if (!in_array($ext, $ekstensi)) {
    $_SESSION['pesan'] = 'Pastikan Ekstensi png, jpg, jpeg';
} else {
    $nama_file = 'galeri' . $rand . '_' . $filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . 'galeri' . $rand . '_' . $filename);
    $query = "INSERT INTO galeri VALUES ('', '$nama_file','$id_anggota')";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['pesan'] = 'Data berhasil ditambahkan';
        header('location: /lsp-jwd/admin/galeri.php');
        exit();
    }
}
