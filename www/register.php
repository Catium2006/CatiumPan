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
    if (empty(exec_sql("SELECT * FROM `CatiumPan`.`users` WHERE user_name = '$user_name'; "))) {
        $user_uuid = generate_uuid($user_name . '/' . $user_email);
        $user_password_md5 = md5($user_password);
        $sql = 'INSERT INTO `CatiumPan`.`users`(`user_name`,`user_email`,`user_password_md5`,`user_uuid`) ' .
            "VALUES('$user_name','$user_email','$user_password_md5','$user_uuid'); ";
        if (is_array(exec_sql($sql))) {
            setcookie('uuid', $user_uuid);
            header("Location: /");
        } else {
?>
            <p>failed</p>
            <script type="text/javascript">
                alert('register unsucessful: sql insertion failed.');
            </script>
        <?php
        }
    } else {
        ?>
        <p>failed</p>
        <script type="text/javascript">
            alert('register unsucessful: user_name is not unique.');
        </script>
    <?php
    }
}

if (!empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    register($user_name, $user_password, $user_email);
} else {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>CatiumPan - Register</title>
    </head>

    <body>
        <div style="background-color:gray;margin:0 auto;width:30%;">
            <p>注册</p>
            <form action="register.php" method="post">
                邮箱: <input type="text" name="user_email"><br>
                用户名: <input type="text" name="user_name"><br>
                密码: <input type="password" name="user_password"><br>
                <input type="submit" value="提交">
            </form>
        </div>
    </body>

    </html>

<?php
}
?>