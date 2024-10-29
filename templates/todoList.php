<?php
session_start();
if (isset($_SESSION["login"])) { ?>
    <html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список дел</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<form action="" method="post" class="task-form">
    <h2>Список дел <?= $_SESSION["login"] ?></h2>
    <label for="login">Введите дело:</label>
    <input type="text" name="task">
    <input type="hidden" name="id" value="<?= $_SESSION["id"] ?>">
    <button type="submit" name="add-task" class="add-task">Добавить дело</button>
    <p class="msg-err"> <? errorsMessage($errMsg) ?> </p>
    <ul class="task-list">
        <?php foreach (getTask($_SESSION["id"]) as $task) : ?>
            <ul>
                <input type='hidden' name='task-id' value="<?= $task['id'] ?>">
                <?php echo $task['task'] . "<button type='submit' name='del-task'>Удалить</button>" ?>
            </ul>
        <?php endforeach; ?>
    </ul>
    <button type="submit" name="edit-btn" class="edit-btn">Редактировать профиль</button>
    <button type="submit" name="logout-btn" class="logout-btn">Выйти</button>
</form>
</body>
<?php } else {
    header("Location: index.php");
    exit();
}
?>