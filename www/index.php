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
        <input type="file" name="file"><br>
        <label for="file">限制下载次数：</label>
        <input type="number" name="file_max_download_count" value="1"><br>
        <input type="submit" name="submit" value="提交">
    </form>
<?php
} else {
    header("Location: /login.php");
}
?>

</html>