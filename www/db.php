<?php
function exec_sql($sql)
{
    $dbtype = "mysql";
    $username = "web";
    $password = "web";
    $dbname = "CatiumPan";
    try {
        $conn = new PDO("$dbtype:host=localhost;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = [];
        foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $k => $v) {
            array_push($arr, $v);
        }
    } catch (PDOException $e) {
        // echo '{"status":"failed","result":"' . $e->getMessage() . '"}<br>';
        return false;
    }
    return $arr;
}
