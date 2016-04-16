<?php
require_once('connect.php');
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
<?php


if (isset($_POST['submit'])) {

    // Grab the user data from the POST
    $username   =   $_POST['username'];
    $password   =   $_POST['password'];
    $email      =   $_POST['email'];
    $address    =   $_POST['address'];

    if (empty($username) || empty($password) || empty($email) || empty($address))   {

        echo '<p>Please fill out all the form</p>';
    }

    else {
        $query = 'INSERT INTO users (username, password, email, address)
        VALUES (:username, :password, :email, :address)';
        $stmt = $dbh->prepare($query);
        $result = $stmt->execute(
            array(
                'username'  =>  $username,
                'password'  =>  $password,
                'email'     =>  $email,
                'address'   =>  $address,
            )
        );
        echo '<div class="content"><p>Thanks for subscribing</p>';
        echo '<p><strong>Username: </strong>' . $username . '<br />';
        echo '<p><strong>Password: </strong>' . $password . '<br />';
        echo '<p><strong>Email: </strong>' . $email . '<br />';
        echo '<p><strong>Address: </strong>' . $address . '<br />';
        echo '<p><a href="index.php">&lt;&lt; Back to main page </a></p></div>';

        $username   = "";
        $password   = "";
        $email      = "";
        $address    = "";
    }
}

?>
<div class="content">

    <h2 style="text-align: center">
        Register
    </h2>

    <form style="text-align: center;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /> <br />

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" value="<?php if (!empty($password)) echo '<strong>PASSWORD</strong>'; ?>" /> <br />

        <label for="email">Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /> <br />

        <label for="address">Address: &nbsp; </label>
        <input type="text" id="address" name="address" value="<?php if (!empty($address)) echo $address; ?>" /> <br />

        <input type="submit" value="Subscribe" name="submit">

    </form>

</div><br>
<footer class="container-fluid text-center">
    <p>&copy; Zachary Kurtz 2016</p>
</footer>




</body>
</html>
