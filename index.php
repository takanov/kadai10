<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズアプリケーション</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <a href="create_q.php" target="_blank"><button>問題作成</button></a>
    <a href="logout.php"><button>ログアウト</button></a>
    <?php
        session_start();
        require_once('funcs.php');
        loginCheck();
        
        try {
            $pdo = new PDO('mysql:dbname=kadai_10_db;charset=utf8;host=localhost', 'root', '');
        } catch (PDOException $e) {
            exit('DBConnectError'.$e->getMessage());
        }

        $stmt = $pdo->prepare("SELECT * FROM questions");
        $status = $stmt->execute();

        echo '<form method="post" action="answer.php">';
        if ($status == false) {
            //execute（SQL実行時にエラーがある場合）
            $error = $stmt->errorInfo();
            exit("ErrorMessage:".$error[2]);
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $question_id = $result["question_id"];
                echo '<h3>'.$result["question_id"].' '.$result["question_text"].'</h3>';

                $stmt2 = $pdo->prepare("SELECT * FROM choices WHERE question_id = :question_id");
                $stmt2->bindValue(':question_id', $question_id, PDO::PARAM_INT);
                $stmt2->execute();
                while ($choice = $stmt2->fetch(PDO::FETCH_ASSOC)){
                    echo '<label><input type="radio" name="'.$question_id.'" value="'.$choice["choice_id"].'">'.$choice["choice_text"].'</label><br>';
                }
            }
        }
        echo '<input type="submit" value="送信">';
        echo '</form>';
    ?>
</body>
</html>
