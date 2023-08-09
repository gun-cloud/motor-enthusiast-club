<?php
session_start();
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM anggota");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encryptedPassword = sha1($password);
    echo $encryptedPassword;

    $loginSuccess = false;

    foreach ($query as $row) {
        if ($email === $row['email'] && $encryptedPassword === $row['password']) {
            $_SESSION['admin'] = $row['id_anggota'];
            $_SESSION['anggota'] = $row['level'];
            $loginSuccess = true;
            break;
        }
    }

    if ($loginSuccess) {
        if ($_SESSION['level'] == 1) {
            header('location: index.php');
        } elseif ($_SESSION['level'] == 0) {
            header('location: /lsp-jwd/admin/dashboard.php');
            exit();
        }
    } else {
        $_SESSION['pesan'] = 'Username atau Password Salah';
        header('location: /lsp-jwd/sign-in.php');
    }
}
