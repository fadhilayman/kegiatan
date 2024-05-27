<!DOCTYPE html>
<html lang="en">
<head>
<style>
  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 2rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 1rem;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  input[type="text"],
  input[type="datetime-local"],
  textarea {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  }

  input[type="submit"] {
    width: 100%;
    padding: 0.5rem;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    <div class="container">
  <form action="proses_edit_Kegiatan.php" method="POST">
    <div class="form-group">
      <label for="kegiatan">Keterangan Kegiatan</label>
      <textarea name="kegiatan" id="kegiatan" cols="30" rows="2"><?php echo $event['kegiatan']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="ruangan">Ruangan</label>
      <input type="text" name="ruangan" id="ruangan" value="<?php echo $event['ruangan']; ?>">
    </div>
    <div class="form-group">
      <label for="mulai">Tgl Mulai</label>
      <input type="datetime-local" name="mulai" id="mulai" value="<?php echo $event['mulai']; ?>">
    </div>
    <div class="form-group">
      <label for="selesai">Tgl Selesai</label>
      <input type="datetime-local" name="selesai" id="selesai" value="<?php echo $event['selesai']; ?>">
    </div>
    <div class="form-group">
      <label for="ket">Keterangan</label>
      <input type="text" name="ket" id="ket" value="<?php echo $event['keterangan']; ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
    <input type="submit" value="Selesai">
  </form>
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

</body>
</html>