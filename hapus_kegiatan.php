<?php
$conn = mysqli_connect("localhost", "root", "", "mydatabase");

if (!$conn) {
    die("Koneksi gagal: ". mysqli_connect_error());
}

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "DELETE FROM event WHERE id =?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header('Location: events_by_date.php?tanggal='. $_GET['tanggal']);