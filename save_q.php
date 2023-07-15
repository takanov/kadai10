<?php
session_id();
require_once('funcs.php');
loginCheck();



    //1. POSTデータ取得
    $question_text = $_POST["question"];
    $choices = array($_POST["answer_1"], $_POST["answer_2"], $_POST["answer_3"], $_POST["answer_4"]);
    $correct = $_POST["correct"];

    try {
        $pdo = new PDO('mysql:dbname=kadai_10_db;charset=utf8;host=localhost', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // トランザクション開始
        $pdo->beginTransaction();

        // questions テーブルに問題を保存
        $sql = "INSERT INTO questions (question_text) VALUES (:question_text)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':question_text', $question_text, PDO::PARAM_STR);
        $stmt->execute();

        // 最後に挿入された question_id を取得
        $question_id = $pdo->lastInsertId();

        // choices テーブルに選択肢を保存
        $sql = "INSERT INTO choices (question_id, choice_text) VALUES (:question_id, :choice_text)";
        $stmt = $pdo->prepare($sql);
        foreach ($choices as $choice_text) {
            $stmt->bindValue(':question_id', $question_id, PDO::PARAM_INT);
            $stmt->bindValue(':choice_text', $choice_text, PDO::PARAM_STR);
            $stmt->execute();
        }

        // answers テーブルに正解を保存
        // 注意: ここでは $correct が選択肢の配列でのインデックス（1から4の間）であることを想定しています
        $correct_choice_id = $pdo->lastInsertId() - (4 - $correct);
        $sql = "INSERT INTO answers (question_id, correct_choice_id) VALUES (:question_id, :correct_choice_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':question_id', $question_id, PDO::PARAM_INT);
        $stmt->bindValue(':correct_choice_id', $correct_choice_id, PDO::PARAM_INT);
        $stmt->execute();

        // コミット: トランザクションを確定
        $pdo->commit();

    } catch (PDOException $e) {
        // ロールバック: エラーが発生した場合はトランザクションを取り消し
        $pdo->rollBack();
        exit('DBConnectError'.$e->getMessage());
    }

    //成功時、index.phpにリダイレクト
    header("Location: index.php");
    exit;