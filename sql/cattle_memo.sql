-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 12 月 24 日 14:46
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d07_03`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `cattle_memo`
--

CREATE TABLE `cattle_memo` (
  `id` int(12) NOT NULL,
  `cattle_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` blob NOT NULL,
  `feacher` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `cattle_memo`
--

INSERT INTO `cattle_memo` (`id`, `cattle_name`, `id_number`, `birthday`, `gender`, `img`, `feacher`) VALUES
(1, 'いと　よしこ', '12345-1234-1', '2018-11-10', 'female', 0x696d616765, '暴れん坊'),
(2, 'いと　ももか', '12345-8392-3', '2020-12-01', 'male', 0x494d475f343938302e4a5047, '甘えん坊'),
(3, 'いと　ももか', '12345-8392-3', '2020-12-01', 'male', 0x494d475f343938302e4a5047, '甘えん坊'),
(4, 'いと　ももか', '12345-8392-3', '2020-12-01', 'male', 0x494d475f343938302e4a5047, '活発'),
(5, 'いと　ももか', '12345-8392-3', '2020-12-01', 'male', 0x494d475f343938302e4a5047, '活発');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `cattle_memo`
--
ALTER TABLE `cattle_memo`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `cattle_memo`
--
ALTER TABLE `cattle_memo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
