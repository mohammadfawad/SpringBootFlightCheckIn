-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2021 at 11:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `Education`
--

CREATE TABLE `Education` (
  `autoId` int(11) NOT NULL,
  `personId` varchar(50) NOT NULL,
  `programTitle` varchar(50) NOT NULL,
  `startDate` varchar(15) NOT NULL,
  `endDate` varchar(15) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `majorSubjects` varchar(150) NOT NULL,
  `grades` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Education`
--

INSERT INTO `Education` (`autoId`, `personId`, `programTitle`, `startDate`, `endDate`, `institute`, `majorSubjects`, `grades`, `description`) VALUES
(1, '09d754cfc040437c577dba56e06987c6', 'BS(cs)', '2004-09-01', '2009-07-13', 'Comsats Institute of Information Technology Islamabad', 'Software Engg, Data Structures, Web Engg', '', 'Bechlor Of Computer Science Bs- Hons'),
(2, '09d754cfc040437c577dba56e06987c6', 'Oracle Sun Java Certified Professional (OSJCP)', '2013-01-01', '2013-05-06', 'Comsats Institute of Information Technology Islamabad', 'Software Engg, Data Structures, Web Engg', '', 'Bechlor Of Computer Science Bs- Hons'),
(3, '09d754cfc040437c577dba56e06987c6', 'F.sc', '2002-01-13', '2004-07-17', 'Comsats Institute of Information Technology Islamabad', '', 'D', 'F.sc Pre Engineering'),
(4, '09d754cfc040437c577dba56e06987c6', 'F.sc', '2021-01-26', '2021-07-13', 'Comsats Institute of Information Technology Islamabad', 'Physics, Math, Chemistery', 'A', 'FSC Pre Engineering'),
(5, 'a5cbef83a6a01cbfb2eb6252853d1535', 'BS(cs)', '2008-05-16', '2012-05-16', 'CIIT Islamabad', 'Software Testing', 'C', 'Software Testing'),
(6, '257a5e2cc0aa9d3bf8f5502e65072320', 'BS(cs)', '2021-07-15', '2021-07-16', 'CIIT Islamabad', 'Software Testing', 'B', 'software Testing as Major'),
(7, '200fd883f91599305b059571c01314df', 'LLB', '1932-01-31', '1934-12-31', 'Oxfoard London', 'LAW', 'A', 'Oxfoard London UK Law Degree'),
(8, '200fd883f91599305b059571c01314df', 'LLM', '1935-01-31', '1936-12-31', 'Oxfoard London', 'Oxfoard London', 'A', 'Oxfoard London UK Oxfoard London'),
(9, '200fd883f91599305b059571c01314df', 'Ph.D LAW', '1937-01-31', '1939-12-31', 'Oxfoard London', 'Islamic LAW', 'A', 'Oxfoard London'),
(10, '244996a81e6f07557c3a77405ca9c657', 'LLB', '2016-01-01', '2018-12-31', 'Oxfoard London', 'LAW', 'A', 'Oxfoard London UK LAW'),
(11, '244996a81e6f07557c3a77405ca9c657', 'LLM', '2019-01-01', '2020-12-31', 'Oxfoard London', 'Islamic LAW', 'A', 'Oxfoard London UK Islamic LAW'),
(12, '442423729ce08bbe11583e1359b1e737', 'BS(cs)', '2016-01-01', '2017-12-31', 'Oxfoard London', 'Software Testing', 'A', 'Oxfoard London UK Software Testing'),
(13, '442423729ce08bbe11583e1359b1e737', 'MS(cs)', '2018-01-01', '2020-12-31', 'Oxfoard London', 'Software Testing', 'A', 'Oxfoard London UK Software Testing.'),
(15, '4c4bf2ecd9f3f236eb11a7cce436f2e5', 'BS(cs)', '2004-01-01', '2008-12-31', 'CIIT Islamabad', 'Software Engineering', 'A', 'Bachelor of Computer Sciences.'),
(16, '4c4bf2ecd9f3f236eb11a7cce436f2e5', 'Web Development', '2009-01-01', '2010-01-01', 'EVS Learning', 'C sharp and Asp.net', 'A', 'Web Development using C sharp and asp.net.');

-- --------------------------------------------------------

--
-- Table structure for table `Experience`
--

CREATE TABLE `Experience` (
  `autoId` int(11) NOT NULL,
  `personId` varchar(50) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyAddress` varchar(150) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `startDate` varchar(15) NOT NULL,
  `endDate` varchar(15) NOT NULL,
  `jobDescription` varchar(150) NOT NULL,
  `toolsUsed` varchar(150) NOT NULL,
  `majorResponsibilities` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Experience`
--

INSERT INTO `Experience` (`autoId`, `personId`, `companyName`, `companyAddress`, `jobTitle`, `startDate`, `endDate`, `jobDescription`, `toolsUsed`, `majorResponsibilities`) VALUES
(2, '4c4bf2ecd9f3f236eb11a7cce436f2e5', 'MIT', 'Islamabad', 'PHP Developer', '2011-01-01', '2012-01-01', 'PHP Web Development.', 'PHP, MySql, HTML, JavaScript, PHP OOP and MVC.', 'Management Information System web Portal, PHP Web Development.');

-- --------------------------------------------------------

--
-- Table structure for table `Persons`
--

CREATE TABLE `Persons` (
  `personId` varchar(255) NOT NULL,
  `personName` varchar(255) NOT NULL,
  `dateOfBirth` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landlineNumber` varchar(255) NOT NULL,
  `cellNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `youtubeLink` varchar(255) NOT NULL,
  `facebookLink` varchar(255) NOT NULL,
  `linkedinLink` varchar(255) NOT NULL,
  `githubLink` varchar(255) NOT NULL,
  `twitterlink` varchar(255) NOT NULL,
  `websiteLink` varchar(255) NOT NULL,
  `profilelink` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerationDate` timestamp NOT NULL DEFAULT curdate(),
  `Profession` varchar(50) NOT NULL,
  `careerObjective` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Persons`
--

INSERT INTO `Persons` (`personId`, `personName`, `dateOfBirth`, `address`, `landlineNumber`, `cellNumber`, `email`, `youtubeLink`, `facebookLink`, `linkedinLink`, `githubLink`, `twitterlink`, `websiteLink`, `profilelink`, `nationality`, `gender`, `password`, `registerationDate`, `Profession`, `careerObjective`) VALUES
('09ae584c01ef1dac559159d8e61e3a4a', 'Jawad Bhatti', '1999-01-31', 'JAGAL HARIPUR KPK PAKISTAN', '1212324435546', '03245555297', 'j.jawadbhatti1990@bhatti.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', '7ac0bba2bc41e52126eaebb15d2c1c03', '2021-06-27 11:46:53', '', ''),
('09d754cfc040437c577dba56e06987c6', 'Mohammad farhad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'farhadqq@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Belgium', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-13 01:29:09', '', ''),
('0edd5ff0600ef485dabc566ce1dd56d5', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'fawadqq@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Egypt', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-10 04:09:00', '', ''),
('200fd883f91599305b059571c01314df', 'Muhammad Ali Jinnah', '1921-01-31', 'Karachi, Sindh Hindustan', '0092443675491', '03455556669', 'jinnah_991@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Pakistan', 'Male', '09cc6a16c138699e286a13537d9a0513', '2021-08-02 03:15:14', '', ''),
('2116ec8f53e4fc6e58143742e0e18dd3', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'apple@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Albania', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-29 02:25:05', '', ''),
('244996a81e6f07557c3a77405ca9c657', 'Laiqat Ali Khan', '1999-01-31', 'Karachi, Sindh Hindustan', '0092443675491', '03455556669', 'liqat_991@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Pakistan', 'Male', '09cc6a16c138699e286a13537d9a0513', '2021-08-03 03:36:09', '', ''),
('257a5e2cc0aa9d3bf8f5502e65072320', 'Muhammad Waqas Mirza', '1999-09-30', 'Village &amp; P.O Chanan, Tehsil Kharian, District Gujrat.', '0092443675491', '03455556669', 'waqas_9991@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Albania', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-16 05:15:42', '', ''),
('266e4e385c60990e4d683f5ace853dc2', 'Raja Nasir', '1999-01-31', 'Village &amp; P.O Chanan, Tehsil Kharian, District Gujrat.', '0092443675491', '03455556669', 'nasir_991@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Azerbaijan', 'Male', '710b42218196085f6718e9be9361f0d2', '2021-08-13 03:25:06', '', ''),
('38fc4d0b073ec08aa58bce7f711295ef', 'Mohammad fawad Bhatti', '2000-01-03', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'qq.qq@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', '', 'Afganistan', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-08 03:41:42', '', ''),
('4090f98cd37949c74a64ff5e667ed622', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'alpha.qq@dd.com', '', '', '', '', '', '', '', 'Bangladesh', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-10 05:40:40', '', ''),
('411bc9214bb3c6a6b2088446db7eec0e', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'appleqq@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Albania', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-29 01:54:43', '', ''),
('436f3454e0bea2ca868d417ff5552079', 'Mohammad fawad Bhatti', '1999-01-25', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'dongal@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'c33367701511b4f6020ec61ded352059', '2021-06-29 02:53:38', '', ''),
('442423729ce08bbe11583e1359b1e737', 'Muhammad Noor Khan', '1999-01-31', 'Karachi, Sindh Hindustan', '0092443675491', '03455556669', 'noor_991@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Pakistan', 'Male', '09cc6a16c138699e286a13537d9a0513', '2021-08-04 02:58:04', '', ''),
('4c4bf2ecd9f3f236eb11a7cce436f2e5', 'Rana Tanveer Anwar', '1982-01-01', 'Mid town street # 20, Central Rome, Italy', '0092443675491', '03455556669', 'ranatanveeranwar@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Italy', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-02 04:00:09', '', ''),
('5558e9c3de7554f3819df0a407c95a43', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'dalpha.qq@dd.com', '', '', '', '', '', '', '', 'Bangladesh', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-10 05:41:30', '', ''),
('6232f4faba4fccd9e37c66145292a7ce', 'Mohammad fawad Bhatti', '1999-01-25', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'dongalapple@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-29 03:02:32', '', ''),
('69e61bf2e749fafacdca8c05bce133a3', 'Mohammad fawad Bhatti', '1999-01-25', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'appledongal@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'c33367701511b4f6020ec61ded352059', '2021-06-29 02:55:31', '', ''),
('6f2409a8608fa98b45e77d611a8ace04', 'Muhammad Waqas Mirza', '1999-01-31', 'Village &amp; P.O Chanan, Tehsil Kharian, District Gujrat.', '0092443675491', '03455556669', 'waqas_9919@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Afganistan', 'Male', '3f74ed1b90de7d06a51891228750fcb1', '2021-07-17 03:00:19', '', ''),
('6ff2b5b5cd60f7c4b89b9457b3209cb3', 'Mohammad fawad Bhatti', '1984-09-02', 'JAGAL HARIPUR KPK PAKISTAN', '1212324435546', '03000874407', 'java@oracle.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Pakistan', 'Male', 'e807f1fcf82d132f9bb018ca6738a19f', '2021-06-19 06:09:46', '', ''),
('7ff66e5f48deae2317fd82979e00ab9b', 'Mohammad Jawad Bhatti', '1999-01-31', 'JAGAL HARIPUR KPK PAKISTAN', '1212324435546', '03245555298', 'jawadbhatti@bhatti.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-27 03:11:17', '', ''),
('8319dc9ed2861ab645eb0e7f9a3b804d', 'Jawad Bhatti', '1999-01-31', 'JAGAL HARIPUR KPK PAKISTAN', '1212324435546', '03245555297', 'j.jawadbhatti@bhatti.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-27 03:22:04', '', ''),
('9005e190890926b6555a19d449f1b04d', 'Mohammad Jawad Bhatti', '1999-01-31', 'JAGAL HARIPUR KPK PAKISTAN', '1212324435546', '03245555298', 'jawad@bhatti.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'b23eb2399ae0e830b9df2f99674c99d5', '2021-06-27 03:07:38', '', ''),
('9188c5bc92620b57ffc7a3bb8819f40b', 'Mohammad walled Bhatti', '2000-01-31', 'Village Jagal Haripur KPK Pakistan', '1212324435546', '03000874407', 'waleed@gmail.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', '', 'Afganistan', 'Male', 'c5503db33ac94ed2236faee4a167b15f', '2021-07-08 02:46:26', '', ''),
('a5cbef83a6a01cbfb2eb6252853d1535', 'Muhammad Waqas Mirza', '1999-01-31', 'Village &amp; P.O Chanan, Tehsil Kharian, District Gujrat.', '0092443675491', '03455556669', 'waqas_991@gmail.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'http://www.youtube.com', 'Pakistan', 'Male', '3f74ed1b90de7d06a51891228750fcb1', '2021-07-16 01:37:31', '', ''),
('b1400ba9b2fd17893f94c49b5cf3daa3', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'qq@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'American Samoa', 'Male', '93279e3308bdbbeed946fc965017f67a', '2021-06-18 19:00:00', '', ''),
('ce48a10cff3b3cf34402393d003c93a2', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'javaqq@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Afganistan', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-10 04:43:35', '', ''),
('e96c0bf3c340805c63ca42fa4735484c', 'Jawad Bhatti', '1999-01-31', 'JAGAL HARIPUR KPK PAKISTAN', '1212324435546', '03245555297', 'j.jawadbhatti1991@bhatti.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Australia', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-27 12:11:44', '', ''),
('ebbcfb5fde578002d97fe9119ac58402', 'Mohammad fawad Bhatti', '1999-01-31', 'dddddddddddddddddddddddddddddddddd', '1212324435546', '03000874407', 'zeroxapple@dd.com', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'https://www.youtube.com/c/YouTubeTeachingPaperAirplanesByDattaBenurDatta', 'Albania', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-29 03:09:06', '', ''),
('m.mohammadfawd@gmail.com', 'Mohammad fawad', '1985-09-02', 'village Jagal Haripur, KPK Pakistan.', '0995675491', '03000874407', 'm.mohammadfawad@gmail.com', 'www.youtube.com', 'www.facebook.com', 'www.linkedin.com', 'www.github.com', 'www.twitter.com', 'www.portfolio.com', 'www.portfolio.com/m.mohammadfawad@gmail.com', 'Pakistani', 'Male', '1234Fawad', '2021-05-07 09:47:14', '', ''),
('m.mohammadfawd@icloud.com', 'Mohammad fawad', '1985-09-02', 'village Jagal Haripur, KPK Pakistan.', '0995675491', '03000874407', 'm.mohammadfawad@gmail.com', 'www.youtube.com', 'www.facebook.com', 'www.linkedin.com', 'www.github.com', 'www.twitter.com', 'www.portfolio.com', 'www.portfolio.com/m.mohammadfawad@gmail.com', 'Pakistani', 'Male', '1234Fawad', '2021-05-07 09:47:14', '', ''),
('m.mohammadfawd@yahoo.com', 'Mohammad fawad', '1985-09-02', 'village Jagal Haripur, KPK Pakistan.', '0995675491', '03000874407', 'm.mohammadfawad@gmail.com', 'www.youtube.com', 'www.facebook.com', 'www.linkedin.com', 'www.github.com', 'www.twitter.com', 'www.portfolio.com', 'www.portfolio.com/m.mohammadfawad@gmail.com', 'Pakistani', 'Male', '1234Fawad', '2021-05-07 09:47:14', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `autoId` int(11) NOT NULL,
  `personId` varchar(50) NOT NULL,
  `projectName` varchar(50) NOT NULL,
  `projectDescription` varchar(99) NOT NULL,
  `projectDetails` varchar(250) NOT NULL,
  `projectLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`autoId`, `personId`, `projectName`, `projectDescription`, `projectDetails`, `projectLink`) VALUES
(1, '442423729ce08bbe11583e1359b1e737', 'Portfolio', 'Automatically generates online Portfolio.', 'Register user and Automatically generates online Portfolio. Project Developed using PHP, HTML, JavaScript, Bootstrap and Mysql Database.', 'http://localhost/NetbeansProjects/portfolio/'),
(2, '442423729ce08bbe11583e1359b1e737', 'KPK Public service commission web Portal', 'Management Information System web Portal', 'Manage All user records, test Records, application records etc.', 'https://www.kppsc.gov.pk/'),
(4, '4c4bf2ecd9f3f236eb11a7cce436f2e5', 'KPK Public service commission web Portal', 'Management Information System web Portal', 'Management Information System web Portal', 'https://www.kppsc.gov.pk/');

-- --------------------------------------------------------

--
-- Table structure for table `Skills`
--

CREATE TABLE `Skills` (
  `autoId` int(11) NOT NULL,
  `personId` varchar(50) NOT NULL,
  `skillName` varchar(50) NOT NULL,
  `skillCategory` varchar(99) NOT NULL,
  `toolsUsed` varchar(99) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Skills`
--

INSERT INTO `Skills` (`autoId`, `personId`, `skillName`, `skillCategory`, `toolsUsed`, `description`) VALUES
(1, '244996a81e6f07557c3a77405ca9c657', 'Land Record and Revenue', 'Dewani', 'Land record Management System', 'Land Record and Revenue management using Land record Management System.'),
(2, '244996a81e6f07557c3a77405ca9c657', 'Revenue', 'Dewani', 'Revenue Management System', 'Land record Management System and Revenue Management System'),
(3, '442423729ce08bbe11583e1359b1e737', 'Testing', 'Black Box Testing', 'Boundary Value Inputs', 'Black Box Testing using Boundary Value Inputs.'),
(4, '442423729ce08bbe11583e1359b1e737', 'Testing', 'white Box Testing', 'Code inspection Methodology', 'white Box Testing using Code inspection Methodology.'),
(6, '4c4bf2ecd9f3f236eb11a7cce436f2e5', 'Web Development', 'Backend Development', 'PHP, MySql, HTML, JavaScript, PHP OOP and MVC.', 'PHP, MySql, HTML, JavaScript, PHP OOP and MVC.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Education`
--
ALTER TABLE `Education`
  ADD PRIMARY KEY (`autoId`),
  ADD KEY `personId` (`personId`);

--
-- Indexes for table `Experience`
--
ALTER TABLE `Experience`
  ADD PRIMARY KEY (`autoId`),
  ADD KEY `Experience_ibfk_1` (`personId`);

--
-- Indexes for table `Persons`
--
ALTER TABLE `Persons`
  ADD PRIMARY KEY (`personId`),
  ADD KEY `Profession_2` (`Profession`,`careerObjective`),
  ADD KEY `Profession_3` (`Profession`);

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`autoId`),
  ADD KEY `Projects_ibfk_1` (`personId`);

--
-- Indexes for table `Skills`
--
ALTER TABLE `Skills`
  ADD PRIMARY KEY (`autoId`),
  ADD KEY `Skills_ibfk_1` (`personId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Education`
--
ALTER TABLE `Education`
  MODIFY `autoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Experience`
--
ALTER TABLE `Experience`
  MODIFY `autoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `autoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Skills`
--
ALTER TABLE `Skills`
  MODIFY `autoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Education`
--
ALTER TABLE `Education`
  ADD CONSTRAINT `Education_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `Persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Experience`
--
ALTER TABLE `Experience`
  ADD CONSTRAINT `Experience_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `Persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `Projects_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `Persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Skills`
--
ALTER TABLE `Skills`
  ADD CONSTRAINT `Skills_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `Persons` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
