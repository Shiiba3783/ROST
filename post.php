<?php

$db = new mysqli('localhost', 'root', '', 'rost_development');

$time = $_REQUEST['time'];
$body = $_REQUEST['body'];

if($db->connect_error) {
    echo 'エラーです';
}else{
    $db->set_charset("utf-8"); 
}
if(empty($body)) {
    echo '内容を入力してください';
    die;
}
if(empty($time)) {
    echo '時間を入力してください';
    die;
}

$insert_sql = "INSERT INTO posts(time, body) VALUES('$time', '$body')";
if(mysqli_query($db,$insert_sql)) {
    $db->close();
    return header('Location:index.php');
    exit();
}else{
    echo 'エラーが発生しました';
}


?>