<?php
    session_start();
    require_once('funcs.php');
    loginCheck();
    
    try {
        $pdo = new PDO('mysql:dbname=kadai_10_db;charset=utf8;host=localhost', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit('DBConnectError'.$e->getMessage());
    }

    // 結果を表示
    $total_questions = 0;  // トータルの問題数を追跡するための変数
    $correct_answers = 0;  // 正答数を追跡するための変数
    $i = 1;
    
    foreach($_POST as $question_id => $selected_choice_id) {
        // $question_idはユーザが答えた問題のIDです
        // $selected_choice_idはユーザが選んだ選択肢のIDです

        // 問題の正しい答えを取得します
        $stmt = $pdo->prepare("SELECT correct_choice_id FROM answers WHERE question_id = :question_id");
        $stmt->bindValue(':question_id', $question_id, PDO::PARAM_INT);
        $stmt->execute();

        $correct_choice_id = $stmt->fetchColumn(); // 正しい選択肢のIDを取得します

        // ユーザの答えが正しいかどうかを確認します
        $is_correct = ($selected_choice_id == $correct_choice_id);
        
        

        $total_questions++;
        if ($is_correct) {
            $correct_answers++;
            $is_correct_text = "正解";
        } else {
            $is_correct_text = "不正解";
        }
        
        // ユーザーの解答をデータベースに保存します
        $stmt2 = $pdo->prepare("INSERT INTO user_answers (user_id, question_id, selected_choice_id, is_correct) VALUES (:user_id, :question_id, :selected_choice_id, :is_correct)");
        $stmt2->bindValue(':user_id', 0, PDO::PARAM_INT);
        $stmt2->bindValue(':question_id', $question_id, PDO::PARAM_INT);
        $stmt2->bindValue(':selected_choice_id', $selected_choice_id, PDO::PARAM_INT);
        $stmt2->bindValue(':is_correct', $is_correct, PDO::PARAM_BOOL);
        $stmt2->execute();

        echo '<h2>クイズ'.$i.'の結果</h2>';
        echo $is_correct_text;
        echo '<br>A: '.$selected_choice_id;
        echo '<br><br>';
        $i++;
    }

    $correct_rate = ($correct_answers / $total_questions) * 100;
    echo '正答率: ' . $correct_rate . '%';

    echo '<a href="index.php"><button>問題一覧</button></a>';
?>
