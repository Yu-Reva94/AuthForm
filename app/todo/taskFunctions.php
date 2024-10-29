<?php
function createTask($task, $user_id)
{
    global $pdo;
    $sql = "INSERT INTO tasks (task, user_id) VALUES (?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$task, $user_id]);
}

function getTask($userId)
{
    global $pdo;
    $sql = "SELECT id, task FROM tasks WHERE user_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$userId]);
    return $query->fetchAll();
}

function deleteTask($taskId)
{
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$taskId]);

}
