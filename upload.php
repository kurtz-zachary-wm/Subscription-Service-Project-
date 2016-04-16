<?php
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gainz Crate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height:200px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="data">

    <h2 style="text-align: center">
        Gainz Crate - User Recipes
    </h2>
    <p style="text-align: center">
        Welcome to Gainz Crate, If you wish to submit a recipe of your own <a href="add.php"> click here </a>
    </p>
    <br />

    <?php


        $query = "SELECT * recipe FROM ";

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $recipe = $stmt->fetchALL();

        echo '<table>';

        $i = 0;

        foreach ($recipe as $row) {
            $filepath = GW_UPLOADPATH . $row ['recipe'];

            if ($i = 0) {
                echo '<tr><td colspan="2" class="recipes" id="recipes">Recipes:' . $row['recipe'].'</td></td>';
            }

            echo '<tr><td class="recipes"></td>';
            echo '<span class="recipes">' . $row['recipe'];
            echo '<strong>Name: </strong>' . $row['name'] . '<br />';
                if (is_file($filepath) && filesize($filepath) > 0 ) {
                    echo '<td><img src="' . $filepath . '" alt="Recipe image" /> </td></tr>';
                }
            else {
                echo '<td><img src="images/unverified.gif" alt="Unverified score"/></td></tr>';

            }
        }
    echo '</table>';


    ?>

</div>

<footer class="container-fluid text-center">
    <p>&copy; Zachary Kurtz 2016</p>
</footer>

</body>
</html>

