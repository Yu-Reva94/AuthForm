<?php
require_once "connect.php";

function createUser($userLogin, $userPhone, $userEmail, $userFirstPass)
{
    global $pdo;
    $sql = "INSERT INTO users (login, phone, email, password) VALUES (?, ?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$userLogin, $userPhone, $userEmail, $userFirstPass]);
}

function getUser($params1, $params2)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE $params2 = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$params1]);
    return $query->fetch();
}

function editUser($userLogin, $userPhone, $userEmail, $userFirstPass, $id)
{
    global $pdo;
    $sql = "UPDATE users SET login = ?, phone = ?, email = ?, password = ? WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$userLogin, $userPhone, $userEmail, $userFirstPass, $id]);
}
