<?php
$env = loadEnv('env');
$dataSiteKey = $env['DATA_SITE_KEY']
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация пользователя</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
</head>
<body>
<form action="" method="post" class="log-form">
    <h2>Авторизация пользователя</h2>
    <label for="phone">Введите телефон или эл.почту:</label>
    <input type="text" name="phoneOrEmail">
    <label for="firstPass">Введите пароль:</label>
    <input type="password" name="firstPass">
    <div class="smart-captcha" data-sitekey="<?= $dataSiteKey?>"></div>
    <button type="submit" name="log-btn" class="log-btn">Войти</button>
    <a href=<?= "index.php?mode=registration" ?>>Зарегистрироваться</a>
    <p class="msg-err"><? errorsMessage($errMsg) ?> </p>
</form>

</body>