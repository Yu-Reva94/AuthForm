<?php
require_once "database/connect.php";
require_once "database/userFunctions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg-btn'])) {

    $userLogin = strip_tags(trim($_POST["login"]));
    $userPhone = strip_tags(trim($_POST["phone"]));
    $userEmail = strip_tags(trim($_POST["email"]));
    $userFirstPass = strip_tags(trim($_POST["firstPass"]));
    $userSecondPass = strip_tags(trim($_POST["secondPass"]));

    if (empty($userLogin)) {
        $errMsg[] = "Заполните логин";
    } elseif (mb_strlen($userLogin) < 4) {
        $errMsg[] = "Логин должен содержать не менее 4-х символов";
    } elseif ($res = getUser($userLogin, 'login')) {
        $errMsg[] = "Пользователь с таким логим уже зарегистрирован";
    }
    if (!preg_match('/^\d{11}$/', $userPhone)) {
        $errMsg[] = "Заполните телефон, телефон должен содержать 11 цифр";
    } elseif ($res = getUser($userPhone, 'phone')) {
        $errMsg[] = "Пользователь с таким телефоном уже зарегистрирован";
    }
    if (empty($userEmail)) {
        $errMsg[] = "Заполните эл.почту";
    } elseif ($res = getUser($userEmail, 'email')) {
        $errMsg[] = "Пользователь с такой эл.почтой уже зарегистрирован";
    }
    if (empty($userFirstPass)) {
        $errMsg[] = "Заполните пароль";
    } elseif (mb_strlen($userFirstPass) < 6) {
        $errMsg[] = "Пароль не должен быть менее 6-ти символов";
    }
    if (empty($userSecondPass)) {
        $errMsg[] = "Заполните пароль повторно,";
    } elseif ($userFirstPass != $userSecondPass) {
        $errMsg[] = "Пароли должны совпадать";
    }
    if (empty($errMsg)) {
        $userFirstPass = password_hash($userFirstPass, PASSWORD_DEFAULT);
        createUser($userLogin, $userPhone, $userEmail, $userFirstPass);
        $regSuccess = "Пользователь успешно зарегистрирован";
    }
}