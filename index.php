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

    <form action="includes/process.php" method="post">

        <input type="hidden" name="action" value="register"/>
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

    <h1>Log In</h1>

    <form action="includes/process.php" method="post">

        <input type="hidden" name="action" value="login"/>
        <p>Email: <input type="text" name="email"/></p>
        <p>Password: <input type="password" name="password"/></p>
        <p><input name="submit" type="submit" value="Submit"/></p>

    </form>

    <p>&nbsp;</p>
    <p><a href="includes/reset.php">DESTROY SESSION</a></p>

</div>

</body>
</html>