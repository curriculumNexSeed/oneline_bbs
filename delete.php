<?php

    $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    // 削除処理
    $sql = 'DELETE FROM `posts` WHERE `id` = ?';
    $data[] = $_GET['id'];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $dbh = null;
     
    header("Location: bbs.php");
    exit();