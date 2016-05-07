<?php
    require 'TodoList.php';
    $TodoList = new TodoList();
    $list = $TodoList->get_list();

    if( empty($_SESSION['username']) ){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TODO List</title>
    <link rel="stylesheet" type="text/css" href="default.css">
</head>
<body>
<h1>TODO List</h1>
<div id="author">
    This is a TODO list created by <a href="https://github.com/JasonQSY">JasonQSY</a>.
</div>
<div id="user">
    <p>
        Hello, <?= $_SESSION['username'] ?>
        <a href="logout.php">Log Out</a>
    </p>
</div>
<div id="list">
    <form method="POST" action="process.php">
        <!-- The TODO list -->
        <?php foreach ($list as $i => $item): ?>
            <p>
                <?php if ($item['state']): ?>
                    <a class="selected" href="<?= 'process.php?comname='.rawurldecode($item['name'])?>"></a>
                <?php else: ?>
                    <a class="blank" href="<?= 'process.php?comname='.rawurldecode($item['name'])?>"></a>
                <?php endif; ?>
                <input class="itemname" type="text" name="<?= "itemname[{$item['name']}]" ?>" value="<?= $item['name'] ?>">
                <a href="<?= 'process.php?delname='.rawurldecode($item['name']) ?>">
                    <span class="right">Delete</span>
                </a>
            </p>
        <?php endforeach; ?>
        <!-- New Item and Renew Button -->
        <p>
            <a id="no" class="selected"></a>
            <input class="itemname" type="text" name="name" placeholder="New item">
            <span class="right">
                <button id="renew">Renew</button>
            </span>
        </p>
    </form>
</div>
</body>
</html>
