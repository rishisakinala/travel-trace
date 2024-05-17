<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <title>Traveltrace</title>

    <link href="css/search.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">

</head>

<body class="text-center">
    <?php require 'partials/_nav.php' ?>

    <div class="container d-flex w-100 h-100 p-3 flex-column">



        <main role="main" class="inner cover bg-text" id="cov">
            <h1 class="cover-heading ">Search routines</h1>
            <div class="cov">

                <form action="searchData.php" method="POST">
                    <div>
                        <label for="from">From :</label>
                        <!-- <input class="in" type="text" name="from" placeholder="from"> -->

                        <select class="in" type="text" name="from" placeholder="from">
                            <?php
                            $locations = array("", "Madhurawada", "kommadi", "Bheemunipatnam", "Aganampudi");
                            foreach ($locations as $location) {
                                echo "<option value='$location'>$location</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div>
                        <label for="to">To <span class="sp_to"></span> :</label>
                        <!-- <input class="in" type="text" name="to" placeholder="to"> -->
                        <select class="in" type="text" name="to" placeholder="to">
                            <?php
                            $locations = array("", "Bus complex", "Aganampudi", "Akkayyapalem");
                            foreach ($locations as $location) {
                                echo "<option value='$location'>$location</option>";
                            }
                            ?>
                        </select>
                        <style>
                            
                            .sp_to{
                                margin-right: 20px;
                            }
                        </style>

                    </div>
                    <div class="bt">
                        <a href="searchData.php">
                            <input class="btn btn-lg btn-secondary" type="submit" value="Search Buses">
                        </a>
                    </div>
                </form>

            </div>

        </main>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>