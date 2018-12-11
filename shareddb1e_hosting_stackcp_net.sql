-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: shareddb1e.hosting.stackcp.net
-- Generation Time: Dec 11, 2018 at 12:59 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TWITTERDB2-363720d4`
--
CREATE DATABASE IF NOT EXISTS `TWITTERDB2-363720d4` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TWITTERDB2-363720d4`;

-- --------------------------------------------------------

--
-- Table structure for table `FOLLOWER`
--

CREATE TABLE `FOLLOWER` (
  `USER_ID` varchar(10) NOT NULL,
  `FOLLOWER_ID` varchar(10) NOT NULL,
  `STATUS` char(1) NOT NULL,
  `START_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FOLLOWER`
--

INSERT INTO `FOLLOWER` (`USER_ID`, `FOLLOWER_ID`, `STATUS`, `START_DATE`) VALUES
('dankmemer', 'jaya_lall', 'n', '2018-10-29'),
('dankmemer', 'princess', 'n', '2018-10-29'),
('Diana', 'dankmemer', 'n', '2018-10-29'),
('Diana', 'princess', 'n', '2018-10-29'),
('jaya_lall', 'tusharone', 'n', '2018-10-21'),
('princess', 'jaya_lall', 'n', '2018-10-21'),
('tusharone', 'dankmemer', 'n', '2018-10-29'),
('tusharone', 'Diana', 'n', '2018-10-29'),
('tusharone', 'jaya_lall', 'n', '2018-10-21'),
('tusharone', 'rajivbro', 'n', '2018-10-26'),
('tusharone', 'varsha_1', 'n', '2018-10-21'),
('vaibhav', 'deathmarks', 'n', '2018-11-17'),
('varsha_1', 'jaya_lall', 'n', '2018-10-21'),
('varsha_1', 'tusharone', 'n', '2018-10-21'),
('vikram1', 'tusharone', 'n', '2018-10-21'),
('vikram1', 'varsha_1', 'n', '2018-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `LIKE`
--

CREATE TABLE `LIKE` (
  `TWEET_ID` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LIKE`
--

INSERT INTO `LIKE` (`TWEET_ID`, `USER_ID`) VALUES
('11294', 'tusharone'),
('23789', 'jaya_lall'),
('25640', 'tusharone'),
('30854', 'vaibhav'),
('41524', 'Diana'),
('41524', 'tusharone'),
('45660', 'tusharone'),
('50571', 'princess'),
('50571', 'tusharone'),
('64680', 'dankmemer');

-- --------------------------------------------------------

--
-- Table structure for table `MESSAGES`
--

CREATE TABLE `MESSAGES` (
  `SENDER_ID` varchar(10) NOT NULL,
  `RECIEVER_ID` varchar(10) NOT NULL,
  `MESSAGE_ID` varchar(10) NOT NULL,
  `CONTENT` varchar(100) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MESSAGES`
--

INSERT INTO `MESSAGES` (`SENDER_ID`, `RECIEVER_ID`, `MESSAGE_ID`, `CONTENT`, `DATE_TIME`) VALUES
('tusharone', 'jaya_lall', '169624', 'Hey sweetie', '2018-10-28 12:11:15'),
('tusharone', 'jaya_lall', '17528', 'Hey Looks like the heat is here.', '2018-10-21 06:35:13'),
('tusharone', 'dankmemer', '28370', 'Looking forward to meet you', '2018-10-29 05:03:18'),
('rajivbro', 'tusharone', '411422', 'Oye bro kidhar hai aajkal ', '2018-10-21 07:11:07'),
('tusharone', 'dankmemer', '66427', 'Yo whasssup', '2018-10-29 05:02:41'),
('princess', 'jaya_lall', '76125', 'heeeey', '2018-10-21 06:57:04'),
('tusharone', 'varsha_1', '887931', 'Hi there!', '2018-10-21 06:23:33'),
('Coolboi', 'rajivbro', '910626', 'Yo bro whassssup', '2018-10-27 05:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `NOTIFICATION`
--

CREATE TABLE `NOTIFICATION` (
  `NOTIFY_ID` varchar(10) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_ID` varchar(10) NOT NULL,
  `NOTIFIER_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NOTIFICATION`
--

INSERT INTO `NOTIFICATION` (`NOTIFY_ID`, `STATUS`, `DATE_TIME`, `USER_ID`, `NOTIFIER_ID`) VALUES
('131128', 'tusharone Messaged you', '2018-10-21 06:35:13', 'tusharone', 'jaya_lall'),
('133109', 'rajivbro Messaged you', '2018-10-21 07:11:07', 'rajivbro', 'tusharone'),
('1570', 'Diana Replied on Your Post', '2018-10-29 05:14:52', 'Diana', ''),
('1648', 'vaibhav Liked Your Post', '2018-11-17 09:32:43', 'vaibhav', 'deathmarks'),
('181', 'tusharone Replied on Your Post', '2018-10-29 05:19:36', 'tusharone', ''),
('2000', 'tusharone Liked Your Post', '2018-10-29 07:06:42', 'tusharone', 'dankmemer'),
('2155', 'tusharone Liked Your Post', '2018-10-26 08:39:52', 'tusharone', 'tusharone'),
('2194', 'tusharone Replied on Your Post', '2018-10-29 07:06:54', 'tusharone', ''),
('228938', 'tusharone Messaged you', '2018-10-29 05:03:18', 'tusharone', 'dankmemer'),
('3379', 'tusharone Liked Your Post', '2018-10-29 05:05:24', 'tusharone', 'dankmemer'),
('3423', 'princess Liked Your Post', '2018-10-26 10:31:03', 'princess', 'varsha_1'),
('351', 'tusharone Liked Your Post', '2018-10-21 06:34:42', 'tusharone', 'varsha_1'),
('366617', 'tusharone Messaged you', '2018-10-29 05:02:41', 'tusharone', 'dankmemer'),
('3769', 'tusharone Liked Your Post', '2018-10-29 05:19:13', 'tusharone', 'Diana'),
('4243', 'tusharone Replied on Your Post', '2018-10-29 05:01:55', 'tusharone', ''),
('4789', 'tusharone Retweeted Your Post', '2018-10-29 05:05:33', 'tusharone', 'dankmemer'),
('4875', 'vaibhav Replied on Your Post', '2018-11-17 09:32:34', 'vaibhav', ''),
('520905', 'tusharone Messaged you', '2018-10-28 12:11:15', 'tusharone', 'jaya_lall'),
('5283', 'jaya_lall Liked Your Post', '2018-10-21 06:48:03', 'jaya_lall', 'tusharone'),
('5496', 'Diana Liked Your Post', '2018-10-29 05:14:29', 'Diana', 'dankmemer'),
('6130', 'tusharone Replied on Your Post', '2018-10-26 08:39:59', 'tusharone', ''),
('6703', 'dankmemer Liked Your Post', '2018-10-29 04:51:35', 'dankmemer', 'princess'),
('704626', 'Coolboi Messaged you', '2018-10-27 05:36:29', 'Coolboi', 'rajivbro'),
('7352', 'tusharone Replied on Your Post', '2018-10-21 06:25:12', 'tusharone', ''),
('7553', 'tusharone Replied on Your Post', '2018-10-29 05:02:15', 'tusharone', ''),
('763142', 'vikram1 Messaged you', '2018-10-21 06:45:35', 'vikram1', 'tusharone'),
('7919', 'jaya_lall Replied on Your Post', '2018-10-21 06:47:56', 'jaya_lall', ''),
('8010', 'Diana Replied on Your Post', '2018-10-29 05:14:05', 'Diana', ''),
('8012', 'tusharone Liked Your Post', '2018-10-21 06:24:51', 'tusharone', 'jaya_lall'),
('808873', 'princess Messaged you', '2018-10-21 06:57:04', 'princess', 'jaya_lall'),
('8174', 'tusharone Retweeted Your Post', '2018-10-29 07:07:06', 'tusharone', 'dankmemer'),
('8582', 'tusharone Replied on Your Post', '2018-10-21 06:33:16', 'tusharone', ''),
('860130', 'tusharone Messaged you', '2018-10-21 06:23:33', 'tusharone', 'varsha_1'),
('9133', 'tusharone Liked Your Post', '2018-10-21 06:41:49', 'tusharone', 'varsha_1'),
('9700', 'dankmemer Replied on Your Post', '2018-10-29 04:51:47', 'dankmemer', '');

-- --------------------------------------------------------

--
-- Table structure for table `REPLY`
--

CREATE TABLE `REPLY` (
  `TWEET_ID` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL,
  `CONTENT` varchar(50) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `REPLY`
--

INSERT INTO `REPLY` (`TWEET_ID`, `USER_ID`, `CONTENT`, `DATE_TIME`) VALUES
('11294', 'tusharone', 'Naturey :) ', '2018-10-21 06:25:12'),
('50571', 'tusharone', 'Yeah right!', '2018-10-21 06:33:16'),
('23789', 'jaya_lall', 'Looking Good :)', '2018-10-21 06:47:56'),
('45660', 'tusharone', 'Some good shit', '2018-10-26 08:39:59'),
('64680', 'dankmemer', 'Be gone Vile creature', '2018-10-29 04:51:47'),
('41524', 'tusharone', 'yeah So many great moments together', '2018-10-29 05:01:55'),
('35081', 'tusharone', 'Improve resolution man', '2018-10-29 05:02:15'),
('64680', 'Diana', 'Same here :)', '2018-10-29 05:14:05'),
('41524', 'Diana', 'You played without me :(', '2018-10-29 05:14:52'),
('25640', 'tusharone', 'Obama takes tips from ACP Pradymun', '2018-10-29 05:19:36'),
('41524', 'tusharone', 'Looking Good', '2018-10-29 07:06:54'),
('30854', 'vaibhav', 'hey am rachit', '2018-11-17 09:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `RETWEET`
--

CREATE TABLE `RETWEET` (
  `TWEET_ID` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL,
  `CONTENT` varchar(150) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RETWEET`
--

INSERT INTO `RETWEET` (`TWEET_ID`, `USER_ID`, `CONTENT`, `DATE_TIME`) VALUES
('41524', 'tusharone', 'Retweet', '2018-10-29 05:05:33'),
('41524', 'tusharone', 'Retweet', '2018-10-29 07:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `TWEETS`
--

CREATE TABLE `TWEETS` (
  `TWEET_ID` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL,
  `CONTENT` varchar(150) NOT NULL,
  `IMG` varchar(300) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TWEETS`
--

INSERT INTO `TWEETS` (`TWEET_ID`, `USER_ID`, `CONTENT`, `IMG`, `DATE_TIME`) VALUES
('11294', 'jaya_lall', 'I love being close to nature.Makes me all naturey', 'tweets/instagram_11.jpg', '2018-10-21 18:08:31'),
('23789', 'tusharone', 'This is my first tweet on Zion.Looking forward to it.', 'tweets/instagram_3.jpg', '2018-10-21 18:01:57'),
('25462', 'tusharone', '<p>Retweet-</p>Paintball is lyf', 'tweets/10387703_780514128712585_8636153785485008754_n.jpg', '2018-10-29 05:05:33'),
('25640', 'Diana', 'Because CID is lyf', 'tweets/1910502_1510929019160831_8944620236999805206_n_jpgoh=c874b991590957a2661d272579803858_oe=54B90E0E.jpg', '2018-10-29 05:10:30'),
('30854', 'deathmarks', 'hi', '', '2018-10-21 18:11:41'),
('34354', 'deathmarks', 'hi', '', '2018-10-21 18:11:13'),
('35081', 'rajivbro', 'I am Optimus Prime and I send this message to all ', 'tweets/op.jpg', '2018-10-21 19:10:24'),
('41524', 'dankmemer', 'Paintball is lyf', 'tweets/10387703_780514128712585_8636153785485008754_n.jpg', '2018-10-29 04:51:01'),
('45660', 'tusharone', 'Cages are a strange Thing.Built to enslave or built to protect  ', 'tweets/instagram_12.jpg', '2018-10-21 18:03:02'),
('50571', 'varsha_1', 'This looks a like a cool place to visit.', 'tweets/instagram_14.jpg', '2018-10-21 18:18:52'),
('54433', 'Diana', 'LAN partyyyy', 'tweets/FB_20160226_11_11_57_Saved_Picture.jpg', '2018-10-29 05:13:05'),
('64680', 'princess', 'I am upto No Good ', 'tweets/laugh.jpg', '2018-10-21 19:03:54'),
('71574', 'dankmemer', 'satya vachan', 'tweets/10357523_591971347614934_7934394326718576313_n_jpgoh=ef953b54d3493ada09c162a4001e4677_oe=55150AFE.jpg', '2018-10-29 04:50:10'),
('81156', 'jaya_lall', 'Zion is Awesome. Zion is Cool. All hail Zion', 'tweets/11232553_781050122002688_496870046_n.jpg', '2018-10-21 18:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `USER_ID` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `GENDER` char(1) NOT NULL,
  `PRIVACY` char(1) NOT NULL,
  `LANGUAGES` varchar(20) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `BIO` varchar(50) NOT NULL,
  `BIO_IMG` varchar(300) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `CONTACT_NO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`USER_ID`, `PASSWORD`, `GENDER`, `PRIVACY`, `LANGUAGES`, `NAME`, `BIO`, `BIO_IMG`, `EMAIL`, `DOB`, `CONTACT_NO`) VALUES
('Coolboi', '7cef8a734855777c2a9d0caf42666e691a1dc91c907325c69271ddf0c944bc72', 'M', 'N', 'English', 'Rajiv Singh', 'Hi there,I am using Zion', 'images/instagram_4.jpg', 'z2cuk@gmail.com', '2018-10-02', '1234748234'),
('dankmemer', '519b8158691fbc26ff34f83b2f69d35c1a1dc91c907325c69271ddf0c944bc72', 'F', 'N', 'English', 'Roshni Shah', 'Hi there,I am using Zion', 'images/14707_1408036946178698_4013345381772839963_n[2].jpg', 'fasf@gmail.com', '2018-10-15', '2382183744'),
('deathmarks', 'windows8.1', 'M', 'N', 'English', 'death', 'Hi there,I am using Zion', 'images/the-black-and-white-image-of-lord-shiva.jpg', 'promailharsh@gmail.com', '1999-05-18', '900588756'),
('Diana', '3a23bb515e06d0e944ff916e79a7775c1a1dc91c907325c69271ddf0c944bc72', 'F', 'N', 'English', 'Rakshita Singh', 'Hi there,I am using Zion', 'images/1375888_439460139492796_600387983_n.jpg', 'zcuk@gmail.com', '2018-10-03', '3632653434'),
('extraone', 'extra', 'M', 'N', 'English', 'Kulwinder', 'Hi there,I am using Zion', 'images/instagram_18.jpg', 'mhcuk@gmail.com', '2018-10-04', '23761246442'),
('jaya_lall', 'jaya', 'F', 'N', 'English', 'Jaya Lall', 'Hi there,I am using Zion', 'images/1168963_1525901401047353_2069157675_n.jpg', 'faswf@gmail.com', '2018-10-04', '9211400400'),
('princess', '8afa847f50a716e64932d995c8e7435a1a1dc91c907325c69271ddf0c944bc72', 'M', 'N', 'English', 'Shikha Upadhyay', 'Hi there,I am using Zion', 'images/10991101_1547288178855219_5666916831333803271_n.jpg', 'shikha@gmail.com', '2018-10-04', '9234534520'),
('rajivbro', '411b20485dbb3f07429f11b57ac02bea1a1dc91c907325c69271ddf0c944bc72', 'M', 'N', 'English', 'Rajiv Sethi', 'Hi there,I am using Zion', 'images/op.jpg', 'rj@gmail.com', '2018-10-01', '9233100010'),
('tusharone', '7cef8a734855777c2a9d0caf42666e691a1dc91c907325c69271ddf0c944bc72', 'M', 'N', 'English', 'Tushar Singh', 'Hi there,I am using Zion', 'images/191536-dragon-ball-z-dragon-ball-z-goku-super-saiyan-3.jpg', 'z2mhcuk@gmail.com', '0000-00-00', '9211420420'),
('vaibhav', '1234', 'M', 'N', 'English', 'SKILLS', 'Hi there,I am using Zion', '', 'rachitjain@mvaburhanpur.com', '2018-11-07', '123'),
('varsha_1', 'ff2f87e3b76f13788e41d6feae7c5dbb1a1dc91c907325c69271ddf0c944bc72', 'M', 'N', 'English', 'Varsha Singhania', 'Hi there,I am using Zion', 'images/997084_1503469236568664_4958876887774782609_n.jpg', 'ahfdaj@gmail.com', '2018-10-03', '9210420400'),
('vikram1', '4f03a3d7d3dffa764d27606ff37733111a1dc91c907325c69271ddf0c944bc72', 'M', 'N', 'English', 'Vikram Seth', 'Hi there,I am using Zion', 'images/instagram_15.jpg', 'vik@gmail.com', '2018-10-03', '9200420420');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FOLLOWER`
--
ALTER TABLE `FOLLOWER`
  ADD PRIMARY KEY (`USER_ID`,`FOLLOWER_ID`),
  ADD KEY `FK_1` (`USER_ID`),
  ADD KEY `FK_2` (`FOLLOWER_ID`);

--
-- Indexes for table `LIKE`
--
ALTER TABLE `LIKE`
  ADD PRIMARY KEY (`TWEET_ID`,`USER_ID`),
  ADD KEY `FK_6` (`TWEET_ID`),
  ADD KEY `FK_7` (`USER_ID`);

--
-- Indexes for table `MESSAGES`
--
ALTER TABLE `MESSAGES`
  ADD PRIMARY KEY (`MESSAGE_ID`),
  ADD KEY `FK_13` (`SENDER_ID`),
  ADD KEY `FK_14` (`RECIEVER_ID`);

--
-- Indexes for table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION`
  ADD PRIMARY KEY (`NOTIFY_ID`),
  ADD KEY `FK_10` (`USER_ID`),
  ADD KEY `FK_11` (`NOTIFIER_ID`);

--
-- Indexes for table `REPLY`
--
ALTER TABLE `REPLY`
  ADD KEY `FK_8` (`TWEET_ID`),
  ADD KEY `FK-9` (`USER_ID`);

--
-- Indexes for table `RETWEET`
--
ALTER TABLE `RETWEET`
  ADD KEY `FK_4` (`TWEET_ID`),
  ADD KEY `FK_5` (`USER_ID`);

--
-- Indexes for table `TWEETS`
--
ALTER TABLE `TWEETS`
  ADD PRIMARY KEY (`TWEET_ID`),
  ADD KEY `FK_3` (`USER_ID`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FOLLOWER`
--
ALTER TABLE `FOLLOWER`
  ADD CONSTRAINT `FOLLOWER_ibfk_1` FOREIGN KEY (`FOLLOWER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOLLOWER_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `LIKE`
--
ALTER TABLE `LIKE`
  ADD CONSTRAINT `LIKE_ibfk_1` FOREIGN KEY (`TWEET_ID`) REFERENCES `TWEETS` (`TWEET_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LIKE_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `MESSAGES`
--
ALTER TABLE `MESSAGES`
  ADD CONSTRAINT `MESSAGES_ibfk_1` FOREIGN KEY (`SENDER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MESSAGES_ibfk_2` FOREIGN KEY (`RECIEVER_ID`) REFERENCES `USER` (`USER_ID`);

--
-- Constraints for table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION`
  ADD CONSTRAINT `NOTIFICATION_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `REPLY`
--
ALTER TABLE `REPLY`
  ADD CONSTRAINT `REPLY_ibfk_1` FOREIGN KEY (`TWEET_ID`) REFERENCES `TWEETS` (`TWEET_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REPLY_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `RETWEET`
--
ALTER TABLE `RETWEET`
  ADD CONSTRAINT `RETWEET_ibfk_1` FOREIGN KEY (`TWEET_ID`) REFERENCES `TWEETS` (`TWEET_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RETWEET_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TWEETS`
--
ALTER TABLE `TWEETS`
  ADD CONSTRAINT `TWEETS_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
