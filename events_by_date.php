<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
</head>
<body>
    <div id="calendar"></div>

    <?php
    // Connect to your database
    include 'koneksi.php';

    // Get the date parameter from the URL, if it exists
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); // Default to today if no date is provided

    // Query the database to get the events for the selected date
    $data = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE mulai LIKE '%$date%' OR selesai LIKE '%$date%'");

    // Fetch the events and prepare them in JSON format
    $events = array();
    while ($d = mysqli_fetch_array($data)) {
        $events[] = array(
            'title' => $d['kegiatan'],
            'start' => $d['mulai'],
            'end' => $d['selesai'],
            'description' => $d['keterangan']
        );
    }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the events data from the PHP
            var events = <?php echo json_encode($events); ?>;
            
            // Function to determine if an event is more than one day
            function isMultiDayEvent(event) {
                var start = new Date(event.start);
                var end = new Date(event.end);
                return (end.getDate() !== start.getDate() || end.getMonth() !== start.getMonth() || end.getFullYear() !== start.getFullYear());
            }

            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridDay',
                initialDate: '<?php echo $date; ?>', // Set the initial date based on the provided date
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: ''
                },
                events: events.map(event => {
                    if (isMultiDayEvent(event)) {
                        event.allDay = true;
                        // Adjust the end date to be exclusive (for FullCalendar)
                        var endDate = new Date(event.end);
                        endDate.setDate(endDate.getDate() + 1);
                        event.end = endDate.toISOString().split('T')[0]; // Set end date to next day without time
                    }
                    return event;
                }),
                eventClick: function(info) {
                    // Handle event click
                    alert('Event: ' + info.event.title + '\nDescription: ' + info.event.extendedProps.description + '\nStart: ' + info.event.start.toISOString() + '\nEnd: ' + info.event.end.toISOString());
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>
