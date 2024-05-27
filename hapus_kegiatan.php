<?php
include 'koneksi.php';

if (!$conn) {
    die("Koneksi gagal: ". mysqli_connect_error());
}

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "DELETE FROM tb_jadwal WHERE id =?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header('Location: kegiatan_admin.php');