-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 15 日 04:07
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai_10_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_answers`
--

CREATE TABLE `user_answers` (
  `user_id` int(12) NOT NULL,
  `question_id` int(12) NOT NULL,
  `selected_choice_id` int(12) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `user_answers`
--

INSERT INTO `user_answers` (`user_id`, `question_id`, `selected_choice_id`, `is_correct`, `create_date`) VALUES
(0, 1, 3, 0, '2023-07-15 00:58:44'),
(0, 2, 6, 0, '2023-07-15 00:58:44'),
(0, 3, 10, 1, '2023-07-15 00:58:44'),
(0, 4, 14, 1, '2023-07-15 00:58:44'),
(0, 1, 2, 1, '2023-07-15 01:51:36'),
(0, 2, 6, 0, '2023-07-15 01:51:36'),
(0, 3, 10, 1, '2023-07-15 01:51:36'),
(0, 4, 14, 1, '2023-07-15 01:51:36'),
(0, 1, 2, 1, '2023-07-15 01:53:04'),
(0, 2, 6, 0, '2023-07-15 01:53:04'),
(0, 3, 10, 1, '2023-07-15 01:53:04'),
(0, 4, 14, 1, '2023-07-15 01:53:04'),
(0, 1, 2, 1, '2023-07-15 01:56:10'),
(0, 2, 6, 0, '2023-07-15 01:56:10'),
(0, 3, 10, 1, '2023-07-15 01:56:10'),
(0, 4, 14, 1, '2023-07-15 01:56:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
