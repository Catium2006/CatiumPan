<?php

include('db.php');

function generate_uuid($arg = '')
{
    $timestamp = microtime();
    $uuid = md5($timestamp . $arg);
    return $uuid;
}

function register($user_name, $user_password, $user_email)
{
    if (empty(exec_sql("SELECT * FROM `CatiumPan`.`users` WHERE user_name = $user_name; "))) {
        $user_uuid = generate_uuid($user_name . '/' . $user_email);
        $user_password_md5 = md5($user_password);
        $sql = "INSERT INTO `CatiumPan`.`users`(`user_name`,`user_email`,`user_password_md5`,`user_uuid`) " .
            "VALUES('$user_name','$user_email' ,'$user_password_md5','$user_uuid'); ";
        if (exec_sql($sql)) {
            setcookie('uuid', $user_uuid);
            return '{"status":"success","user_uuid":"' . "$user_uuid" . '"}';
        } else {
            return '{"status":"failed","why":"sql insertion failed"}';
        }
    } else {
        return '{"status":"failed","why":"user_name is not unique"}';
    }
}

function logout()
{
    setcookie('uuid', 'null');
}

function auth_user_name_password_md5($user_name, $user_password_md5)
{
    $sql = "SELECT * FROM `CatiumPan`.`users` WHERE user_name = $user_name; ";
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
    $users = exec_sql("SELECT * FROM `CatiumPan`.`users` WHERE user_uuid = $user_uuid; ");
    return !empty($users);
}
