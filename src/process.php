<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/23/16
 * Time: 5:53 PM
 */

require 'TodoList.php';

$TodoList = new TodoList();
$list = $TodoList->get_list();

if(!empty($_POST['name'])){
    $TodoList->add_item($_POST['name']);
}

if(!empty($_GET['delname'])){
    $TodoList->remove_item($_GET['delname']);
}

if(!empty($_GET['comname'])){
    $TodoList->reverse_state($_GET['comname']);
    echo $_GET['comname'];
}

if(isset($_POST['itemname'])){
    foreach ($_POST['itemname'] as $ori_name => $new_name){
        $TodoList->edit_name($ori_name, $new_name);
    }
}

header("Location: index.php");
