<?php
// Connect to your database
include 'koneksi.php';

// Get the date parameter from the URL
$date = $_GET['date'];

// Query the database to get the events for the selected date
$data = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE mulai LIKE '%$date%' OR selesai LIKE '%$date%'");

// Display the events in a table or list format
while ($d = mysqli_fetch_array($data)) {
  echo "<h4>". $d['kegiatan']. "</h4>";
  echo "<p>Start: ". $d['mulai']. "</p>";
  echo "<p>End: ". $d['selesai']. "</p>";
  echo "<p>Keterangan: ". $d['keterangan']. "</p>";
  echo "<hr>";
}
?>