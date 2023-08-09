<?php
session_start();
include 'koneksi.php';


$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$id_anggota = $_POST['id_anggota'];
$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg',);
$filename = $_FILES['gambar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


if (!in_array($ext, $ekstensi)) {
    $_SESSION['pesan'] = 'Pastikan Ekstensi png, jpg, jpeg';
} else {
    $nama_file = $rand . '_' . $filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $rand . '_' . $filename);
    $query = "INSERT INTO event VALUES ('', '$nama', '$deskripsi', '$nama_file','$id_anggota')";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['pesan'] = 'Data berhasil ditambahkan';
        header('location: /lsp-jwd/admin/event.php');
        exit();
    }
}
