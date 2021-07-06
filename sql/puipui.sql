-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql_host
-- 生成日時: 2021 年 7 月 06 日 09:30
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `puipui`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `puicar_sense_data`
--

CREATE TABLE `puicar_sense_data` (
  `id` int(11) NOT NULL,
  `current_pui_count` int(11) NOT NULL DEFAULT '0' COMMENT 'PUI数(送信毎)',
  `temp` int(11) NOT NULL COMMENT '温度',
  `humidity` int(11) NOT NULL COMMENT '湿度',
  `time` datetime NOT NULL COMMENT '送信日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `puicar_sense_data`
--
ALTER TABLE `puicar_sense_data`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `puicar_sense_data`
--
ALTER TABLE `puicar_sense_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
