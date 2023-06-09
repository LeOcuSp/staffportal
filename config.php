<?php
    $pdo = mysqli_connect('localhost', 'root', '', 'ehssg');

    if(!$pdo){
        die('Error:'.mysqli_connect_error($pdo));
    }
?>