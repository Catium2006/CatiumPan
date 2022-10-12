<!DOCTYPE html>
<html>

<head>
    <title>CatiumPan</title>
</head>
<?php

include('auth.php');

if (is_logined()) {
?>
    <p>logined</p>
<?php
} else {
    header("Location: /login.php");
}
?>

</html>