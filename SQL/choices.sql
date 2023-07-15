-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 15 日 05:16
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
-- テーブルの構造 `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(12) NOT NULL,
  `question_id` int(12) NOT NULL,
  `choice_text` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice_text`, `create_date`) VALUES
(1, 1, 'あさがお', '2023-07-15 03:15:08'),
(2, 1, 'ばら', '2023-07-15 03:15:08'),
(3, 1, 'あじさい', '2023-07-15 02:02:55'),
(4, 1, 'ひまわり', '2023-07-15 02:02:55'),
(5, 2, 'まぐろ', '2023-07-15 03:15:29'),
(6, 2, 'たちうお', '2023-07-15 02:03:46'),
(7, 2, 'さんま', '2023-07-15 03:15:29'),
(8, 2, 'こい', '2023-07-15 02:03:46'),
(9, 3, 'たいよう', '2023-07-15 02:04:27'),
(10, 3, 'ひまわり', '2023-07-15 02:04:27'),
(11, 3, 'あさがお', '2023-07-15 02:04:27'),
(12, 3, 'りんどう', '2023-07-15 02:05:40'),
(13, 4, 'いるか', '2023-07-15 03:16:06'),
(14, 4, 'くらげ', '2023-07-15 03:16:06'),
(15, 4, 'くじら', '2023-07-15 02:06:37'),
(16, 4, 'さめ', '2023-07-15 02:06:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
