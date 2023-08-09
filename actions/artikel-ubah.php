<?php
session_start();
include 'koneksi.php';

$id_artikel = $_POST['id_artikel'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$id_anggota = $_POST['id_anggota'];

// cek gambar baru
if ($_FILES['gambar']['name']) {
    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg');
    $filename = $_FILES['gambar']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        $_SESSION['pesan'] = 'Pastikan Ekstensi png, jpg, jpeg';
        header('location: /lsp-jwd/admin/edit_artikel.php?id=' . $id_artikel);
        exit();
    }

    $query_old_image = "SELECT gambar FROM artikel WHERE id_artikel = $id_artikel";
    $result_old_image = mysqli_query($koneksi, $query_old_image);

    // hapus gambar lama
    if ($result_old_image && mysqli_num_rows($result_old_image) > 0) {
        $old_image = mysqli_fetch_assoc($result_old_image)['gambar'];
        unlink('../assets/img/' . $old_image);
    }

    // ubah dengan gambar baru
    $nama_file = $rand . '_' . $filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $rand . '_' . $filename);
    $query = "UPDATE artikel SET judul='$judul', konten='$konten', gambar='$nama_file' WHERE id_artikel=$id_artikel";
} else {
    // ubah tanpa gambar
    $query = "UPDATE artikel SET judul='$judul', konten='$konten' WHERE id_artikel=$id_artikel";
}

if (mysqli_query($koneksi, $query)) {
    $_SESSION['pesan'] = 'Data berhasil diupdate';
    header('location: /lsp-jwd/admin/artikel.php');
    exit();
} else {
    $_SESSION['pesan'] = 'Gagal mengupdate data';
    header('location: /lsp-jwd/admin/edit_artikel.php?id=' . $id_artikel);
    exit();
}
