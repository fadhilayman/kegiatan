    

 <?php
      include 'koneksi.php';
    //mengambil data dari form input
    $kegiatan   = $_POST['kegiatan'];
    $ruangan   = $_POST['ruangan'];
    $mulai      = $_POST['mulai'];
    $selesai    = $_POST['selesai'];
    $ket   = $_POST['ket'];

    //membuat koneksi ke database
    // $koneksi = mysqli_connect('localhost', 'root', '', 'db_kegiatan');

    //insert data ke dalam database
    // mysqli_query($conn, "insert into tb_jadwal set kegiatan='$kegiatan',ruangan='$ruangan', mulai='$mulai', selesai='$selesai',keterangan='$ket'");
    $sql = "INSERT INTO tb_jadwal VALUES (NULL , '$kegiatan', '$ruangan' , '$mulai','$selesai','$ket' )";
    $query = mysqli_query($conn, $sql);

    //kembali ke halaman index.php
    header("location: kegiatan_admin.php");

?>