<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Subscription Project
        </title>
    </head>

    <body>





<?php

if (isset($_POST['submit'])) {
    // Grab the user data from the POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($password) && !empty($email)) {

        if (!empty($username) && !empty($password)) {

            $dbh = new PDO('mysql:host=localhost;dbname=ssp', 'root', 'root');

            //Write data to database
            $query = "INSERT INTO users";
            $stmt = $dbh->prepare($query);
            $stmt->execute(
                array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email
                )
            );
            $result = $stmt->fetchAll();;

            echo '<p>Thanks for registering for this website </p>';
            echo '<p> <strong>Username: </strong>'   . $username . '<br />';
            echo '<p> <strong>Password: </strong>'   . $password . '<br />';
            echo '<p> <strong>Email: </strong>'      . $email . '<br />';
        }
    }
}

?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username ?>">
        <br />

        <label for="password">Password: </label>
        <input type="text" id="password" name="password" value="<?php if (!empty($password)) echo $password ?>"
        <br />

        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email?>">
        <br />

        <input type="submit" value="Add" name="submit">


    </form>



    </body>
</html>
