<?php
function pages($mode)
{
    switch ($mode) {
        case 'index':
            require_once "app/users/loginUser.php";
            $login = "templates/login.php";
            echo renderTemplate($login, compact("errMsg"));
            break;
        case 'registration':
            require_once "app/users/registrationUser.php";
            $registration = "templates/registration.php";
            echo renderTemplate($registration, compact("errMsg", "regSuccess"));
            break;
        case 'myProfile':
            require_once "app/users/editUser.php";
            require_once "app/users/logout.php";
            $myProfile = "templates/myProfile.php";
            echo renderTemplate($myProfile, compact("errMsg", "editSuccess"));
            break;
        case 'todoList':
            require_once "app/todo/createTask.php";
            require_once "app/todo/deleteTask.php";
            require_once "app/users/logout.php";
            $todoList = "templates/todoList.php";
            echo renderTemplate($todoList, compact("errMsg"));
            break;
    }
}
