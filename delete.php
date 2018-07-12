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


データの更新機能を実装する。
Edit.phpの作成までは授業でやっているのでそのあとの作業が宿題です。
①つぶやくボタンを押す→
②データを更新する→
③一覧画面に戻る
※本日の授業で削除機能を実装したときのように細かい