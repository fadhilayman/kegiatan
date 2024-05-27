<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $kegiatan = $_POST['kegiatan'];
    $ruangan = $_POST['ruangan'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $ket = $_POST['ket'];

    // Prepare statement to avoid SQL injection
    $stmt = mysqli_prepare($conn, "UPDATE tb_jadwal SET kegiatan=?, ruangan=?, tgl_mulai=?, tgl_selesai, keterangan WHERE id=$id");
    mysqli_stmt_bind_param($stmt, "sssssi", $kegiatan, $ruangan, $mulai, $selesai, $ket);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Event updated successfully";
        header("Location: kegiatan_admin.php"); // Redirect back to the calendar page
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid request method.";
}

// Close the connection
mysqli_close($conn);
?>
