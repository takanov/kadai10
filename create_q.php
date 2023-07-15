<?php 
session_id();
require_once('funcs.php');
loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問題作成</title>
</head>
<body>
    <form method="post" action="save_q.php">
        <label for="question">問題文:</label><br>
        <textarea id="question" name="question" required></textarea><br>
        <label for="answer_1">選択肢1:</label><br>
        <input type="text" id="answer_1" name="answer_1" required><br>
        <label for="answer_2">選択肢2:</label><br>
        <input type="text" id="answer_2" name="answer_2" required><br>
        <label for="answer_3">選択肢3:</label><br>
        <input type="text" id="answer_3" name="answer_3" required><br>
        <label for="answer_4">選択肢4:</label><br>
        <input type="text" id="answer_4" name="answer_4" required><br>
        <label for="correct">正解:</label><br>
        <select id="correct" name="correct" required>
            <option value="1">選択肢1</option>
            <option value="2">選択肢2</option>
            <option value="3">選択肢3</option>
            <option value="4">選択肢4</option>
        </select>
        <input type="submit" value="送信">
    </form>
</body>
</html>
