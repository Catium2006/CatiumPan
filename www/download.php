<?php
include('db.php');
if ($_GET['file_id']) {
    $file_id = $_GET['file_id'];
    $arr = exec_sql("SELECT * FROM files WHERE file_id = '$file_id'");
    if (count($arr) > 0) {
        $row = $arr[0];
        $file_res = $row['file_res'];
        $file_name = $row['file_name'];
        $file_size = filesize('res/' . $file_res);
        header("Content-type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: " . $file_size);
        header("Content-Disposition: attachment; filename=" . $file_name);
        $file = fopen('res/' . $file_res, "rb");
        echo fread($file, $file_size);
        fclose($file);
    } else {
        header('HTTP/1.1 404 NOT FOUND');
    }
}
