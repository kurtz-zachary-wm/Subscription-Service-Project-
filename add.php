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
        Welcome to Gainz Crate, If you wish to submit a recipe of your own <a> click here </a>
    </p>
    <br />

    <?php

        require_once 'connect.php';


        if (isset($_POST['submit'])) {

            $name           =       $_POST['name'];
            $screenshot     =       $_FILES['screenshot']['name'];
            $screenshot_size =      $_FILES['screenshot']['size'];
            $screenshot_type =      $_FILES['screenshot']['type'];


            if (!empty($name) && !empty($screenshot)) {

                $target = GW_UPLOADPATH . $screenshot;

                if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
                    $name   =   $_POST['name'];

                    if (!empty($name)) {

                        $query = "INSERT INTO recipe VALUES (0, NOW(), :name, :screenshot)";
                        $stmt = $dbh->prepare($query);
                        $stmt->execute(
                            array(

                                'name'  =>  $name,

                                'screenshot' =>  $screenshot

                            )
                        );
                        $result     =   $stmt->fetchAll();


                        echo '<p>Thanks for adding your recipe to Gainz Crate!</p>';
                        echo '<p><strong>Name: </strong></p>' . $name . '<br />';
                        echo '<p><a href="index.php">&lt;&lt; Back to recipe page</a></p>';

                        $name   =   "";
                    }
                    else {
                        echo '<p class="error">Sorry, there was a problem uploading your recipe.</p>';
                    }
                }
            }
            else {
                echo'<p class="error">The picture must be a GIF, JPEG, or PNG image file no' . 'Greater than' . (GW_MAXSIZE / 1024) . 'KB in size </p>';
            }
        }
    else {
        echo '<p class="error">Please enter all the information to add your recipe </p>';
    }
    ?>

</div>

<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <input type="hidden" name="MAX_FILE_SIZE" value="32768"/>
    <label style="text-align: center" for="name">Name: </label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>"/>
    <br />

    <label for="screenshot">Recipe: </label>
    <input style="text-align: center" type="file" id="screenshot" name="screenshot" />
    <hr />
    <input type="submit" value="add" name="submit"/>

</form>

<footer class="container-fluid text-center">
    <p>&copy; Zachary Kurtz 2016</p>
</footer>

</body>
</html>


