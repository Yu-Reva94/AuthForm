<?php
require_once "database/connect.php";
require_once "database/userFunctions.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log-btn'])) {

    $userLogin = trim($_POST["phoneOrEmail"]);
    $userFirstPass = trim($_POST["firstPass"]);
    $env = loadEnv('env');

    $ch = curl_init();
    $args = http_build_query([
        "secret" => $secret = $env['SECRET'],
        "token" => $_POST["smart-token"],
        "ip" => $_SERVER['REMOTE_ADDR'],
    ]);
    curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpcode !== 200) {
        return false;
    }
    $resp = json_decode($server_output);
    if ($resp->status !== "ok") {
        $errMsg[] = "Пройдите капчу!";
        return false;
    }

    if (empty($userLogin)) {
        $errMsg[] = "Укажите Ваш телефон или эл.почту";
    }
    if (empty($userFirstPass)) {
        $errMsg[] = "Укажите Ваш пароль";
    }
    $res = getUser($userLogin, 'phone');
    if (!$res) {
        $res = getUser($userLogin, 'email');
    }
    if ($res && password_verify($userFirstPass, $res['password'])) {
        session_start();
        $_SESSION['email'] = $res['email'];
        $_SESSION['phone'] = $res['phone'];
        $_SESSION['id'] = $res['id'];
        $_SESSION['password'] = $userFirstPass;
        $_SESSION['login'] = $res['login'];
        header("Location: index.php?mode=myProfile");
        exit();
    } elseif (!empty($userLogin) && !empty($userFirstPass)) {
        $errMsg[] = "Неверный логин или пароль";
    }
}
