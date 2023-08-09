<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_artikel = $_GET['id'];

    //mengambil gambar
    $query_image = "SELECT gambar FROM artikel WHERE id_artikel = $id_artikel";
    $result_image = mysqli_query($koneksi, $query_image);

    // jika gambar ada
    if ($result_image && mysqli_num_rows($result_image) > 0) {
        $image_name = mysqli_fetch_assoc($result_image)['gambar'];

        // hapus gambar 
        unlink('../assets/img/' . $image_name);

        // hapus artikel
        $query_delete = "DELETE FROM artikel WHERE id_artikel = $id_artikel";
        if (mysqli_query($koneksi, $query_delete)) {
            $_SESSION['pesan'] = 'Data berhasil dihapus';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data';
        }
    } else {
        $_SESSION['pesan'] = 'Artikel tidak ditemukan';
    }
} else {
    $_SESSION['pesan'] = 'ID artikel tidak valid';
}

header('location: /lsp-jwd/admin/artikel.php');
exit();
