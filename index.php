<?php
session_start();
require_once('includes/new-connection.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration - Login and Registration Coding Dojo Assignment</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>

<div id="wrapper">

    <h1>Registration</h1>

    <h3>Login and Registration Coding Dojo Assignment</h3>

    <form action="includes/process.php" method="post">

        <p>First Name: <input type="text" name="first_name"/></p>
        <p>Last Name: <input type="text" name="last_name"/></p>
        <p>Email: <input type="text" name="email"/></p>
        <p>Password: <input type="password" name="password"/></p>
        <p>Retype Password: <input type="password" name="retype_password"/></p>
        <p><input name="submit" type="submit" value="Submit"/></p>

    </form>

    <div id="errors">

        <?php
        if(isset($_SESSION['errors']))
        {

            foreach($_SESSION['errors'] as $error)
            {
                echo "<p>$error</p>";
            }

        }
        ?>

    </div>

    <p>&nbsp;</p>
    <p><a href="includes/reset.php">DESTROY SESSION</a></p>

</div>

</body>
</html>