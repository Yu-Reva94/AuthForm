<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользователя</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<form action="" method="post" class="reg-form">
    <h2>Регистрация пользователя</h2>
    <label for="login">Логин:</label>
    <input type="text" name="login">
    <label for="phone">Телефон:</label>
    <input type="number" name="phone" placeholder="+7">
    <label for="email">Эл.почта:</label>
    <input type="email" name="email">
    <label for="firstPass">Пароль:</label>
    <input type="password" name="firstPass">
    <label for="secondPass">Повторите пароль:</label>
    <input type="password" name="secondPass">
    <button type="submit" name="reg-btn" class="btn">Зарегистрироваться</button>
    <a href="<?= "index.php" ?>">Войти</a>
    <p class="msg-err"><? errorsMessage($errMsg) ?> </p>
    <p class="success"><?= $regSuccess; ?></p>
</form>
</body>