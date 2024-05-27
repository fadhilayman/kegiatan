<?php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $kegiatan = $_POST['kegiatan'];
    $ruangan  = $_POST['ruangan'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $ket = $_POST['ket'];

    $update = mysqli_query($conn, "UPDATE tb_jadwal SET kegiatan='$kegiatan', ruangan='$ruangan', mulai='$mulai', selesai='$selesai', keterangan='$ket' WHERE id = '$id'");
    if ($update) {
        echo "
        <script>
            alert('Jadwal Berhasil di Edit');
            window.location.href='kegiatan_admin.php';
        </script>
        ";
    } else {
        echo "
    <script>
        alert('Jadwal Gagal di Edit');  
        window.location.href='edit_kegiatan.php?id=$id';
    </script>
    ";
    }
}
?>
