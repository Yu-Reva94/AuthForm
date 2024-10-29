<?php
require_once "controllers/pages.php";
require_once "app/functions.php";
require_once "app/database/connect.php";
require_once "app/users/userFunctions.php";
require_once "app/todo/taskFunctions.php";


if ($_GET['mode']) {
    $mode = $_GET['mode'];
} else {
    $mode = "index";
}

pages($mode);
