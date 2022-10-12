<?php

include('db.php');

function logout()
{
    setcookie('uuid', 'null');
}

function auth_user_name_password_md5($user_name, $user_password_md5)
{
    $sql = "SELECT * FROM `CatiumPan`.`users` WHERE user_name = '$user_name'; ";
    $users = exec_sql($sql);
    if ($users) {
        $user = $users[0];
        if ($user['user_password_md5'] == $user_password_md5) {
            setcookie('uuid', $user['user_uuid']);
            return true;
        }
    }
    return false;
}

function is_logined()
{
    $user_uuid = $_COOKIE['uuid'];
    $users = exec_sql("SELECT * FROM `CatiumPan`.`users` WHERE user_uuid = '$user_uuid'; ");
    return !empty($users);
}
