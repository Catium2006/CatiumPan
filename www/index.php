<!DOCTYPE html>
<html>

<head>
    <title>CatiumPan</title>
</head>

<body>

    <?php

    include('auth.php');

    if (is_logined()) {
    ?>
        <p>已登录</p>
        <button onclick="document.cookie='uuid=null'">登出</button>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <span>文件</span>
            <input type="file" name="file"><br>
            <span>限制下载次数</span>
            <input type="number" name="file_max_download_count" value="1"><br>
            <input type="submit" name="submit" value="提交">
        </form>
    <?php
    } else {
        // header("Location: /login.php");
    ?>
        <a href="/login.php">登录</a>
        <a href="/register.php">注册</a>
    <?php
    }
    ?>
    <form action="download.php" method="get" enctype="multipart/form-data">
        <span>下载id</span>
        <input type="number" name="file_id"><br>
        <input type="submit" name="submit" value="提交">
    </form>

</body>

</html>