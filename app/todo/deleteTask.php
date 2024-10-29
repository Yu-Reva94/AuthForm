<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del-task'])) {
    $taskId = $_POST["task-id"];

    deleteTask($taskId);
}