<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/"> -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <title>Traveltrace</title>

    <link href="css/busData.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">
</head>

<body>
    <?php require 'partials/_nav.php' ?>

    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <?php

        $servername = "localhost";
        $username = "root";
        $dbname = "traveltrace";
        $password = "";


        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            //echo "Connection successful";
            $sql = "SELECT  Bus_name, Bus_number, Seat_count, Start_location , Destination , Starting_time , current_location FROM bus_data";
            echo '<table>
    <tr> 
    
    <td class="table-hd">Bus name</td> 
    <td class="table-hd">Bus number</td> 
    <td class="table-hd">Start_location</td> 
    <td class="table-hd">Destination</td> 
    <td class="table-hd">Seat count</td> 
    <td class="table-hd">Starting_time</td> 
    <td class="table-hd">current location</td>
    </tr>';

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row_Bus_name = $row["Bus_name"];
                    $row_Bus_number = $row["Bus_number"];
                    $row_Seat_count = $row["Seat_count"];
                    $row_Start_location = $row["Start_location"];
                    $row_Destination = $row["Destination"];
                    $row_Starting_time = $row["Starting_time"];
                    $row_current_location = $row["current_location"];
                    // $row_current_location = "17.719505,83.295181";
                    $ggl = "https://www.google.com/maps/search/?api=1&query=" . $row_current_location;
                    echo '<tr> 
            
            <td>' . $row_Bus_name . '</td> 
            <td>' . $row_Bus_number . '</td> 
            <td>' . $row_Start_location . '</td>
            <td>' . $row_Destination . '</td>
            <td>' . $row_Seat_count . '/50</td>
            <td>' . $row_Starting_time . ':00</td>
            <td><a href="' . $ggl . '">
            <button class="btn btn-lg btn-secondary">View</button>
        </a></td> 
            </tr>';
                }
                $result->free();
            }
            $conn->close();
        }
        ?>
        </table>

    </div>
    <div class="reload-button">
        <button class="btn btn-lg btn-secondary " onclick="window.location.reload()">reload</button>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>