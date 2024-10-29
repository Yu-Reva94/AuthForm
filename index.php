<?php
require_once "app/functions.php";
require_once "app/database/connect.php";
require_once "app/users/userFunctions.php";
require_once "app/todo/taskFunctions.php";

if (!$_GET['mode']) {
    require_once "app/users/loginUser.php";
    $login = "templates/login.php";
    echo renderTemplate($login, compact("errMsg"));
} elseif (($_GET['mode'] == 'registration')) {
    require_once "app/users/registrationUser.php";
    $registration = "templates/registration.php";
    echo renderTemplate($registration, compact("errMsg", "regSuccess"));
} elseif (($_GET['mode'] == 'myProfile')) {
    require_once "app/users/editUser.php";
    require_once "app/users/logout.php";
    $myProfile = "templates/myProfile.php";
    echo renderTemplate($myProfile, compact("errMsg", "editSuccess"));
} elseif (($_GET['mode'] == 'todoList.php')) {
    require_once "app/todo/createTask.php";
    require_once "app/todo/deleteTask.php";
    require_once "app/users/logout.php";
    $todoList = "templates/todoList.php";
    echo renderTemplate($todoList, compact("errMsg"));
}

