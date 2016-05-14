<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/27/16
 * Time: 7:26 PM
 */
session_start();
if( !empty($_SESSION['username']) ){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Log in - TodoList</title>
    <link rel="stylesheet" type="text/css" href="../public/default.css">
</head>
<body>
    <h1>TODO List</h1>
    <p>You need log in or register. If you are a new user, you will register automatically.</p>
    <form method="POST" action="result.php">
        <p>
            Username:
            <input type="text" placeholder="name" name="username">
        </p>
        <p>
            Password:
            <input type="password" placeholder="password" name="password">
        </p>
        <button>Login</button>
    </form>
</body>
</html>
