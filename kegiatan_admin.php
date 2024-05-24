<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap cdn  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fullcalendar css  -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-warning" role="alert">
                    <h4>Form Kegiatan</h4>
                </div>
                <div class="card">
                    <form action="simpan.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-label">Keterangan Kegiatan</div>
                                <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Ruangan</div>
                                <input type="text" class="form-control" name="ruangan" id="ruangan">
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
                                <input type="text" class="form-control" name="ket" id="ket">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="calendar"></div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-event-title"></p>
                    <p id="modal-event-start"></p>
                    <p id="modal-event-end"></p>
                    <div class="modal-footer">
                        <a href="#" id="edit-event" class="btn btn-warning">Edit</a>
                        <a href="#" id="delete-event" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php 
                    include 'koneksi.php';
                    $data = mysqli_query($conn, 'SELECT * FROM tb_jadwal');
                    while ($d = mysqli_fetch_array($data)) {     
                    ?>
                    {
                        title: '<?php echo $d['kegiatan']; ?>',
                        start: '<?php echo $d['mulai']; ?>',
                        end: '<?php echo $d['selesai']; ?>',
                        id: '<?php echo $d['id']; ?>'
                    },
                    <?php } ?>
                ],
                selectOverlap: function (event) {
                    return event.rendering === 'background';
                },
                dateClick: function (info) {
                    var date = info.dateStr;
                    window.location.href = 'events_by_date.php?date=' + date;
                },
                eventClick: function (info) {
                    var event = info.event;
                    var start = moment(event.start).format('MMMM Do YYYY, h:mm a');
                    var end = moment(event.end).format('MMMM Do YYYY, h:mm a');
                    var eventId = event.id;
                    var eventTitle = event.title;

                    document.getElementById('modal-event-title').innerText = 'Event: ' + eventTitle;
                    document.getElementById('modal-event-start').innerText = 'Start: ' + start;
                    document.getElementById('modal-event-end').innerText = 'End: ' + end;
                    document.getElementById('edit-event').href = 'edit_Kegiatan.php?id=' + eventId;
                    document.getElementById('delete-event').href = 'hapus_kegiatan.php?id=' + eventId;

                    
                    $('#eventModal').modal('show');
                }
            });

            calendar.render();
        });
    </script>
</body>

</html>
