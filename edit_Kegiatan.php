<?php
include 'koneksi.php';

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare statement to avoid SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM tb_jadwal WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is any event with the given ID
    if (mysqli_num_rows($result) > 0) {
        // Fetch the event
        $event = mysqli_fetch_assoc($result);
?>

    <!-- Display the edit event form with the event data -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-warning" role="alert">
                    <h4>Edit Kegiatan</h4>
                </div>
                <div class="card">
                    <form action="proses_edit_Kegiatan.php" method="POST">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                            <div class="form-group">
                                <div class="form-label">Keterangan Kegiatan</div>
                                <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30" rows="2"><?php echo $event['kegiatan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Ruangan</div>
                                <input type="text" class="form-control" name="ruangan" id="ruangan" value="<?php echo $event['ruangan']; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tgl Mulai</div>
                                <input type="datetime-local" class="form-control" name="mulai" id="mulai">
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tgl Selesai</div>
                                <input type="datetime-local" class="form-control" name="selesai" id="selesai">
                            </div>
                            <div class="form-group">
                                <div class="form-label">Keterangan</div>
                                <input type="text" class="form-control" name="ket" id="ket" value="<?php echo $event['keterangan']; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">Selesai</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    } else {
        echo "Tidak ada data event yang sesuai dengan ID yang dipilih.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID tidak ditentukan.";
}

// Close the connection
mysqli_close($conn);
?>
