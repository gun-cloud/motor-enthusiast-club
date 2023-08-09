<?php
session_start();
include 'koneksi.php';

$id_event = $_POST['id_event'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$id_anggota = $_POST['id_anggota'];

// cek gambar baru
if ($_FILES['gambar']['name']) {
    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg');
    $filename = $_FILES['gambar']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        $_SESSION['pesan'] = 'Pastikan Ekstensi png, jpg, jpeg';
        header('location: /lsp-jwd/admin/edit_event.php?id=' . $id_event);
        exit();
    }

    $query_old_image = "SELECT gambar FROM event WHERE id_event = $id_event";
    $result_old_image = mysqli_query($koneksi, $query_old_image);

    // hapus gambar lama
    if ($result_old_image && mysqli_num_rows($result_old_image) > 0) {
        $old_image = mysqli_fetch_assoc($result_old_image)['gambar'];
        unlink('../assets/img/' . $old_image);
    }

    // ubah dengan gambar baru
    $nama_file = $rand . '_' . $filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $rand . '_' . $filename);
    $query = "UPDATE event SET nama='$nama', deskripsi='$deskripsi', gambar='$nama_file' WHERE id_event=$id_event";
} else {
    // ubah tanpa gambar
    $query = "UPDATE event SET nama='$nama', deskripsi='$deskripsi' WHERE id_event=$id_event";
}

if (mysqli_query($koneksi, $query)) {
    $_SESSION['pesan'] = 'Data berhasil diupdate';
    header('location: /lsp-jwd/admin/event.php');
    exit();
} else {
    $_SESSION['pesan'] = 'Gagal mengupdate data';
    header('location: /lsp-jwd/admin/edit_event.php?id=' . $id_event);
    exit();
}
