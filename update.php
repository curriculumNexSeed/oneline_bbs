<?php

    $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    $nickname = htmlspecialchars($_POST['nickname']);
    $comment = htmlspecialchars($_POST['comment']);
    $id = htmlspecialchars($_POST['id']);

    $hoge = [1, 2, 3, 4, 5];
    // 配列に値を追加
    $hoge[] = 6;
    $hoge[] = 7;
    $hoge[10] = 15;
    $hoge[] = 17;

    // 配列の値を上書き
    $hoge['0'] = 10;

    $fuga = ['banana' => 'バナナ'];
    $fuga[] = 'huga';
    $fuga['orange'] = 'オレンジ';
    
    // var_dump($hoge, $fuga);die();

    // DBからデータを取得する処理   
    // $var = 'hoge';
    // var_dump("$var", '$var');die();
    // $sql = 'UPDATE `posts` SET `nickname` = "' . $nickname .'", `comment` = "' . $comment . '" WHERE `id` =' . $id;
    //$sql = "UPDATE `posts` SET `nickname` = \"{$nickname}\", `comment` = \"{$comment}\" WHERE `id` = {$id}";
    $sql = 'UPDATE `posts` SET `nickname` = ?, `comment` = ? WHERE `id` = ?';
    //$sql = 'UPDATE `posts` SET `nickname` = :nickname, `comment` = :comment WHERE `id` = :id';
    $data = [$nickname, $comment, $id];
    $stmt = $dbh->prepare($sql);
    // $stmt->bindValue(':nickname', $nickname);
    // $stmt->bindValue(':comment', $comment);
    // $stmt->bindValue(':id', $id);
    // $stmt->execute();
    $stmt->execute($data);

    $dbh = null;

    header("Location: bbs.php");
    exit();