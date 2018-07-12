<?php

    $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    $nickname = htmlspecialchars($_POST['nickname']);
    $comment = htmlspecialchars($_POST['comment']);
    $id = htmlspecialchars($_POST['id']);

    // DBからデータを取得する処理
    $sql = 'UPDATE `posts` SET `nickname` = ?, `comment` = ? WHERE `id` = ?';
    $data = [$nickname, $comment, $id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $dbh = null;

    header("Location: bbs.php");
    exit();