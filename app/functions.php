<?php
//Шаблонизатор
function renderTemplate($fileName, $data)
{
    if (!file_exists($fileName)) {
        return "шаблон не найден";
    } else {
        ob_start();
        extract($data);
        require("$fileName");
        return ob_get_clean();
    }
}

//Проверям ошибки в массиве и выводим на экран
function errorsMessage($errMsg)
{
    if (isset($errMsg) && count($errMsg) > 0) {
        foreach ($errMsg as $err)
            echo $err . '<br>';
    }
}
//подключаем данные из env
function loadEnv($filePath)
{
    $env = [];

    if (file_exists($filePath)) {
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue; // Игнорируем комментарии
            }
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value);
        }
    } else {
        die("Файл .env не найден: $filePath");
    }
    return $env;
}




