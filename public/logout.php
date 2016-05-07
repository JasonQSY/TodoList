<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/27/16
 * Time: 8:58 PM
 */
session_start();
if( !empty($_SESSION['username'])){
    session_unset();
    session_destroy();
}
header("Location: login.php");