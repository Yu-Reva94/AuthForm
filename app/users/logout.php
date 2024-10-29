<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout-btn'])) {
    session_start();
    unset($_SESSION["login"]);
    header("Location: index.php");
    exit();
}