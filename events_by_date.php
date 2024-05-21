<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #007FFF;
        font-weight: bold;

    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
      
    }
</style>
<body>
    <div class="container mt-4">
        <a href="kegiatan_admin.php">Kembali</a>
        <center><h2 class="mt-4">Event List for <?php echo htmlspecialchars($_GET['date']); ?></h2></center>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Description</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
              
                include 'koneksi.php';

             
                $date = $_GET['date'];

             
                $data = mysqli_query($conn, "
                SELECT * FROM tb_jadwal 
                WHERE DATE(mulai) <= '$date' AND DATE(selesai) >= '$date'
            ");
            
                function isMultiDayEvent($event, $date) {
                    $start = date('Y-m-d', strtotime($event['mulai']));
                    $end = date('Y-m-d', strtotime($event['selesai']));
                    return $start <= $date && $end >= $date;
                }

                while ($d = mysqli_fetch_array($data)) {
                    if (isMultiDayEvent($d, $date)) {
                        echo "<tr>";
                        echo "<td>". htmlspecialchars($d['kegiatan']). "</td>";
                        echo "<td>". htmlspecialchars($d['mulai']). "</td>";
                        echo "<td>". htmlspecialchars($d['selesai']). "</td>";
                        echo "<td>". htmlspecialchars($d['keterangan']). "</td>";
                        ?>
                        <td><a href="edit_Kegiatan.php">Edit</a></td>
                        <?php
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkfj7N4uj6He9w5bzl0s2U6el6ng5rq0E0P5kL9HJg6HM1j6z7w4" crossorigin="anonymous"></script>
</body>
</html>
