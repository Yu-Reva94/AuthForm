<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-task'])) {
    $task = strip_tags(trim($_POST["task"]));
    $user_id = $_POST["id"];
    if (empty($task)) {
        $errMsg[] = "Заполните поле с делом";
    } else {
        createTask($task, $user_id);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-btn'])) {
    header("Location: index.php?mode=myProfile");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout-btn'])) {
    header("Location: index.php");
}

