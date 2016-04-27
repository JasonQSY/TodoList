<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/27/16
 * Time: 7:41 PM
 */
session_start();
$location = '../data/';

if(empty($_POST['username'])){
    die("You need type the username!");
}

if(empty($_POST['password'])){
    die("You need type the password");
}
$username = $_POST['username'];
$password = $_POST['password'];

if(file_exists($location.$username.'.csv')){
    /* log in */
    $info = file_get_contents($location.$username.'.csv');
    $lines = explode(PHP_EOL, $info);
    $firstLine = $lines[0];
    $words = explode(',', $firstLine);
    if( $words[0] === $username && $words[1] === $password) {
        /* Success */
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        /* Fail */
        die("Incorrect password.");
    }
} else {
    /* register */
    $contents = $username.','.$password.PHP_EOL.'complete,programming'.PHP_EOL.'incomplete,Write an essay'.PHP_EOL.'incomplete,Game'.PHP_EOL;
    file_put_contents($location.$username.'.csv', $contents);
    $_SESSION['username'] = $username;
    header("Location: index.php");
}