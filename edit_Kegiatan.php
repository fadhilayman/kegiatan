<?php 
include "koneksi.php";
$id = $_GET['id'];
$queryjadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE id = '$id'") or die (mysqli_error($conn));
$event = mysqli_fetch_array($queryjadwal); 
?>
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
  .back-button {
    background-color: #0080FF;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 0px;
    cursor: pointer;
  }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
    <a href="kegiatan_admin.php" class="back-button">Kembali</a>
        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-warning" role="alert">
                  <center>  <h4>Edit Kegiatan</h4> </center>
                </div>
                <div class="card">
                    <div class="container">
  <form action="proses_edit_Kegiatan.php?id=<?= $id ?>" method="POST">
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
    <input type="submit" name="edit" value="Selesai">
  </form>
</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>