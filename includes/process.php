<?php
session_start();
require_once('new-connection.php');

// Create empty errors array
$errors = [];

// First name validate
if(!isset($_POST['first_name']) || $_POST['first_name'] == NULL)
{
    $errors[] = 'Please enter a first name.';
}
elseif(strlen($_POST['first_name']) < 2 || strlen($_POST['first_name'] > 100))
{
    $errors[] = 'Your first name must be at least 2 characters and less than 100 characters.';
}

// Last name validate
if(!isset($_POST['last_name']) || $_POST['last_name'] == NULL)
{
    $errors[] = 'Please enter a last name.';
}
elseif(strlen($_POST['last_name']) < 2 || strlen($_POST['last_name']) > 100)
{
    $errors[] = 'Your last name must be at least 2 characters and less than 100 characters.';
}

// Email validate
if(!isset($_POST['email']) || $_POST['email'] == NULL)
{
    $errors[] = 'Please enter an email.';
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    $errors[] = 'Please enter a valid email.';
}

// Password validate
if(!isset($_POST['password']) || $_POST['password'] == NULL)
{
    $errors[] = 'Please enter a password.';
}
elseif(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 20)
{
    $errors[] = 'Your password must be at least 6 characters and 20 characters or less.';
}

// Re-type password validate
if(!isset($_POST['retype_password']) || $_POST['retype_password'] == NULL)
{
    $errors[] = 'Please re-type your password.';
}
elseif($_POST['password'] != $_POST['retype_password'])
{
    $errors[] = 'Your password must match your re-typed password.';
}


// Display errors if $errors array is NOT null
if($errors != NULL)
{
    $_SESSION['errors'] = $errors;
    header('Location: ../index.php');
}

// If no errors redirect to logged-in.php, input form fields into database, and
// show submitted form field info and database info on this new page
else {

    if(!isset($_SESSION['first_name']) && !isset($_SESSION['last_name']))
    {

        // Set first name, last name, email
        // to session variables and escape them
        $_SESSION['first_name'] = mysqli_real_escape_string($connection, $_POST['first_name']);
        $_SESSION['last_name'] = mysqli_real_escape_string($connection, $_POST['last_name']);
        $_SESSION['email'] = mysqli_real_escape_string($connection, $_POST['email']);

        // Escape and encrypt the inputted password and
        // DON'T SET IT to a session variable
        $password_sec = mysqli_real_escape_string($connection, md5($_POST['password']));

        // Insert user MySQL query
        $insert_user = "INSERT INTO users(first_name, last_name, email, password, created_at, updated_at) VALUES ('{$_SESSION['first_name']}', '{$_SESSION['last_name']}', '{$_SESSION['email']}', '$password_sec', NOW(), NOW())";

        // Execute insert user MySQL query
        $execute_insert_user = run_mysql_query($insert_user);

        header('Location: ../logged-in.php');

    }

}


?>