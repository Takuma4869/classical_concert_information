-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-27 10:51:56
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `concert_information_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `status`) VALUES
(1, 'john123', '5f4dcc3b5aa765d61d8327deb882cf99', 'A'),
(2, 'harry123', '5f4dcc3b5aa765d61d8327deb882cf99', 'U'),
(3, 'peter1234', '482c811da5d5b4bc6d497ffa98491e38', 'U'),
(4, 'sherlock123', '5f4dcc3b5aa765d61d8327deb882cf99', 'A');

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `concert_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `opening_time` time NOT NULL,
  `hall` varchar(255) NOT NULL,
  `artists` text NOT NULL,
  `program` text NOT NULL,
  `ticket` text NOT NULL,
  `contact` text NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`post_id`, `concert_name`, `date`, `opening_time`, `hall`, `artists`, `program`, `ticket`, `contact`, `file_name`, `user_id`) VALUES
(1, 'summer concert', '2021-08-15', '19:00:00', 'concert hall A', 'John Smith (conductor)', 'John Doe : symphony no.1', 'S $50 A $40', 'contact number : 123-456-789', 'vlah-dumitru-FvmwloIbCeQ-unsplash.jpg', 1),
(3, 'concert', '2021-08-18', '19:00:00', 'concert hall A', 'Joe Hisaishi (conductor)', 'Summer', 'A $40\r\nB $30', 'contact number 123-456-789', '0', 1),
(4, 'jazz concert', '2021-07-22', '20:00:00', 'jazz club', 'Charlie Parker (tenor sax) ', 'My favorite things', 'A $40', 'contact number 123-456-789', '', 1),
(7, 'spring concert', '2021-04-01', '18:30:00', 'concert hall C', 'Leonard Bernstein (conductor) ', 'George Gershwin : An American In Paris', 'A : $40\r\nB : $30', 'contact number 123-456-789', 'austrian-national-library-JCcD3JgTwy4-unsplash.jpg', 1),
(9, 'Christmas concert', '2021-12-25', '19:00:00', 'concert hall B', 'John Williams (conductor)', 'Star Wars', 'S $40\r\nA $30', 'contact number 123-456-789', 'storm trooper.jpg', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact_number`, `address`, `file_name`, `login_id`) VALUES
(1, 'John', 'Doe', '123', 'USA', 'lucas-alexander-njaQKSM365I-unsplash.jpg', 1),
(2, 'Harry', 'Potter', '1234', 'England', 'vlah-dumitru-FvmwloIbCeQ-unsplash.jpg', 2),
(3, 'Peter', 'Parker', '1234', 'USA', 'chad-madden-SUTfFCAHV_A-unsplash.jpg', 3),
(4, 'Sherlock', 'Holmes', '1234', 'England', 'austrian-national-library-nS0CjPmK-cY-unsplash.jpg', 4);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`);

--
-- テーブルのインデックス `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- テーブルのインデックス `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
