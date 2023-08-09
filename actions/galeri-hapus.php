<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_galeri = $_GET['id'];

    //mengambil gambar
    $query_image = "SELECT * FROM galeri WHERE id_galeri = $id_galeri";
    $result_image = mysqli_query($koneksi, $query_image);

    // jika gambar ada
    if ($result_image && mysqli_num_rows($result_image) > 0) {
        $image_name = mysqli_fetch_assoc($result_image)['galeri'];

        // hapus gambar 
        unlink('../assets/img/' . $image_name);

        // hapus gambar
        $query_delete = "DELETE FROM galeri WHERE id_galeri = $id_galeri";
        if (mysqli_query($koneksi, $query_delete)) {
            $_SESSION['pesan'] = 'Data berhasil dihapus';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data';
        }
    } else {
        $_SESSION['pesan'] = 'galeri tidak ditemukan';
    }
} else {
    $_SESSION['pesan'] = 'ID galeri tidak valid';
}

header('location: /lsp-jwd/admin/galeri.php');
exit();
