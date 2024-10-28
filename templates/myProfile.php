<?php
session_start();
if (isset($_SESSION["login"])) { ?>
    <html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет пользователя</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<form action="" method="post" class="reg-form">
    <h2>Личный кабинет <?= $_SESSION["login"] ?></h2>
    <label for="login">Логин:</label>
    <input type="text" name="login" value="<?= $_SESSION["login"] ?>">
    <label for="phone">Телефон:</label>
    <input type="number" name="phone" placeholder="+7" value="<?= $_SESSION["phone"] ?>">
    <label for="email">Эл.почта:</label>
    <input type="email" name="email" value="<?= $_SESSION["email"] ?>">
    <label for="firstPass">Пароль:</label>
    <input type="password" name="firstPass" value="<?= $_SESSION["password"] ?>">
    <label for="secondPass">Повторите пароль:</label>
    <input type="password" name="secondPass" value="<?= $_SESSION["password"] ?>">
    <button type="submit" name="edit-btn" class="edit-btn">Изменить</button>
    <button type="submit" name="logout-btn" class="logout-btn">Выйти</button>
    <p class="msg-err"><? errorsMessage($errMsg) ?> </p>
    <p class="success"><?= $editSuccess; ?></p>
</form>
</body>
<?php } else {
    header("Location: login.php");
    exit();
}
?>