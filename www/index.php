<!DOCTYPE html>
<html>

<head>
    <title>CatiumPan</title>
</head>
<?php

include('auth.php');

if (is_logined()) {
?>
    <p>已登录</p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">文件：</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="提交">
    </form>
<?php
} else {
    header("Location: /login.php");
}
?>

</html>