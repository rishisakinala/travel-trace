<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="css/searchData.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">

    <!-- Custom inline CSS -->
    <style>
        #red td,
        #red tr {
            background-color: rgba(66, 6, 6, 0.633);
        }

        #green td,
        #green tr {
            background-color: rgba(17, 69, 27, 0.686);
        }
    </style>
</head>

<body>
    <?php require 'partials/_nav.php' ?>

    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <?php

        session_start();

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "traveltrace";
        $from = $_POST['from'];
        $to = $_POST['to'];


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query
        $sql = "SELECT * FROM bus_data WHERE start_location = '$from' AND Destination = '$to'";

        // Execute SQL query
        $result = $conn->query($sql);

        // Output table header
        echo '<table>
            <tr> 
                <td id="table-hd">Bus name</td> 
                <td id="table-hd">Bus number</td> 
                <td id="table-hd">Start location</td> 
                <td id="table-hd">Destination</td> 
                <td id="table-hd">Seat count</td> 
                <td id="table-hd">Starting time</td> 
                <td id="table-hd">Current location</td>
            </tr>';

        // Output table rows
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Extract data from row
                $row_Bus_name = $row["Bus_name"];
                $row_Bus_number = $row["Bus_number"];
                $row_Seat_count = $row["Seat_count"];
                $row_Start_location = $row["Start_location"];
                $row_Destination = $row["Destination"];
                $row_Starting_time = $row["Starting_time"];
                $row_current_location = $row["current_location"];
                $ggl = "https://www.google.com/maps/search/?api=1&query=" . $row_current_location;

                // Output row
                echo '<tr>';
                echo '<td>' . $row_Bus_name . '</td>';
                echo '<td>' . $row_Bus_number . '</td>';
                echo '<td>' . $row_Start_location . '</td>';
                echo '<td>' . $row_Destination . '</td>';
                echo '<td>' . $row_Seat_count . '/50</td>';
                echo '<td class="Starting_time">' . $row_Starting_time . ':00</td>';
                echo '<td><a href="' . $ggl . '"><button class="btn btn-lg btn-secondary">View</button></a></td>';
                echo '</tr>';
            }
        } else {
            // No rows found
            echo '<tr><td colspan="7">No data found</td></tr>';
        }

        // Close result set and database connection
        $result->free();
        $conn->close();
        ?>
        </table>
    </div>
    <div class="reload-button">
        <button class="btn btn-lg btn-secondary" onclick="window.location.reload()">Reload</button>
    </div>

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script>
        // Get all elements with class "Starting_time"
        var times = document.getElementsByClassName("Starting_time");

        // Get current hour
        var currentHour = new Date().getHours();

        // Loop through each "Starting_time" element
        for (var i = 0; i < times.length; i++) {
            // Get the text content of the "Starting_time" element
            var time = parseInt(times[i].textContent);

            // If current time is greater than the time from the element, add "red" ID to its parent <tr> element
            if (currentHour > time) {
                times[i].parentElement.id = 'red';
            } else {
                times[i].parentElement.id = 'green';
            }
        }
    </script>
</body>

</html>