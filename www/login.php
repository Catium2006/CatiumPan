<?php
include('auth.php');

if (!empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_password_md5 = md5($user_password);
    if (!auth_user_name_password_md5($user_name, $user_password_md5)) {
?>
        <p>failed</p>
        <script type="text/javascript">
            alert('login unsucessful.');
        </script>
    <?php
    }else{
        header("Location: /");
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>CatiumPan - Login</title>
    </head>

    <body>
        <div style="background-color:gray;margin:0 auto;width:30%;">
            <p>登录</p>
            <a href="/register.php">注册</a>
            <form action="login.php" method="post">
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