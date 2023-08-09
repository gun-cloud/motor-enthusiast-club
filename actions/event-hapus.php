<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_event = $_GET['id'];

    //mengambil gambar
    $query_image = "SELECT gambar FROM event WHERE id_event = $id_event";
    $result_image = mysqli_query($koneksi, $query_image);

    // jika gambar ada
    if ($result_image && mysqli_num_rows($result_image) > 0) {
        $image_name = mysqli_fetch_assoc($result_image)['gambar'];

        // hapus gambar 
        unlink('../assets/img/' . $image_name);

        // hapus event
        $query_delete = "DELETE FROM event WHERE id_event = $id_event";
        if (mysqli_query($koneksi, $query_delete)) {
            $_SESSION['pesan'] = 'Data berhasil dihapus';
        } else {
            $_SESSION['pesan'] = 'Gagal menghapus data';
        }
    } else {
        $_SESSION['pesan'] = 'event tidak ditemukan';
    }
} else {
    $_SESSION['pesan'] = 'ID event tidak valid';
}

header('location: /lsp-jwd/admin/event.php');
exit();
