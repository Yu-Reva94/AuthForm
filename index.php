<?php
require_once "app/functions.php";
require_once "app/database/connect.php";
require_once "app/database/userFunctions.php";
require_once "app/errors.php";

if (!$_GET['mode']) {
    require_once "app/loginUser.php";
    $login = "templates/login.php";
    echo renderTemplate($login, compact("errMsg"));
} elseif (($_GET['mode'] == 'registration')) {
    require_once "app/registrationsUser.php";
    $registration = "templates/registration.php";
    echo renderTemplate($registration, compact("errMsg", "regSuccess"));
} elseif (($_GET['mode'] == 'myProfile')) {
    require_once "app/editUser.php";
    require_once "app/logout.php";
    $myProfile = "templates/myProfile.php";
    echo renderTemplate($myProfile, compact("errMsg", "editSuccess"));
}

