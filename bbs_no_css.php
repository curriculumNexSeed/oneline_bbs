<?php
    // ここにDBに登録する処理を記述する
    $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    // 定義しなくても使える
    // $_GET
    if (!empty($_POST)) {
        $nickname = htmlspecialchars($_POST['nickname']);
        $comment = htmlspecialchars($_POST['comment']);

        $sql = "INSERT INTO posts (nickname, comment, created) VALUES (?, ?, ?)";
        $data[] = $nickname;
        $data[] = $comment;
        $data[] = date("Y-m-d H:i:s");
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <form method="post" action="">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->
    <?php 
        // ORDER BYはソート DESCで降順, ASCで昇順
        $sql = 'SELECT * FROM posts ORDER BY nickname DESC';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        while (1) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            echo $rec['nickname'] .  '<br>';
            echo $rec['comment'] .  '<br>';
            echo $rec['created'] .  '<br>';
            echo '<br>';
        }
        $dbh = null;
    ?>

</body>
</html>


    // $sql = 'SELECT * FROM post ORDER BY created DESC';
    // if (!empty($_POST)) {
    //     $sql = "INSERT INTO posts (nickname, comment, created) VALUES (:nickname, :comment, :created)";
    //     $stmt = $dbh->prepare($sql);
    //     $stmt->bindValue(':nickname', $_POST['nickname'], PDO::PARAM_STR);
    //     $stmt->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);
    //     $stmt->bindValue(':created', date("Y-m-d H:i:s"));
    //     $stmt->execute();
    // }