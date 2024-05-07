    

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
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
                                    <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30"
                                        rows="2"></textarea>
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [<?php 
            include 'koneksi.php';
            $data = mysqli_query($conn,'select * from tb_jadwal');
            while($d = mysqli_fetch_array($data)){     
        ?>
        {
            title: '<?php echo $d['kegiatan']; ?>',
            start: '<?php echo $d['mulai']; ?>',
            end: '<?php echo $d['selesai']; ?>'
        },
        <?php } ?>],
        selectOverlap: function(event) {
            return event.rendering === 'background';
        },
        dateClick: function(info) {
    var clickedDate = moment(info.date);
    var eventsOnDate = calendar.getEvents().filter(function(event) {
        var eventStart = moment(event.start);
        var eventEnd = moment(event.end);

        // Check if clicked date is between event start and end dates
        // Or if event starts before clicked date but ends after it
        return clickedDate.isBetween(eventStart, eventEnd, null, '[]') || 
               (eventStart.isBefore(clickedDate) && eventEnd.isAfter(clickedDate));
    });

    var eventDescriptions = eventsOnDate.map(function(event) {
        var startTime = moment(event.start).format('HH:mm');
        var endTime = moment(event.end).format('HH:mm');
        var enddate = moment(event.end).format('DD');
        return event.title + ' pukul ' + startTime + ' - ' + event.end;
    }).join(', ');

    if (eventDescriptions) {
        alert('Events on ' + info.date.toLocaleDateString() + ': ' + eventDescriptions);
    } else {
        alert('No events on ' + info.date.toLocaleDateString());
    }
}
    });

    calendar.render();

});
        </script>
    </body>
    
    </html>