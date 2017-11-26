-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 02:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_obls`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '123'),
(2, 'tipu', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` tinyint(4) NOT NULL,
  `rightAns` tinyint(4) NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(129, 1, 1, 'dummy text'),
(130, 1, 0, 'another'),
(131, 1, 0, 'dsfsd'),
(132, 1, 0, 'sdfdsf'),
(133, 2, 0, 'we'),
(134, 2, 0, 'they'),
(135, 2, 0, 'all'),
(136, 2, 1, 'web developer'),
(137, 3, 0, 'easy'),
(138, 3, 0, 'learn'),
(139, 3, 1, 'both'),
(140, 3, 0, 'hard'),
(141, 1, 1, 'water'),
(142, 1, 0, 'soil'),
(143, 1, 0, 'gold'),
(144, 1, 0, 'air'),
(145, 2, 1, 'we'),
(146, 2, 0, 'dfs'),
(147, 2, 0, 'df'),
(148, 2, 0, 'sdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `comment`, `postid`, `username`) VALUES
(1, 'This is first comment', 27, 'tipu'),
(2, 'Hello world commment', 27, 'tipu'),
(3, 'My another comment', 30, 'tipu'),
(4, 'Hello people', 30, 'tipu'),
(5, 'Hi i am niam', 32, 'niam'),
(6, 'I am tipu', 32, 'tipu'),
(7, 'Hi hello', 29, 'fkarim'),
(8, 'another show', 29, 'fkarim'),
(9, 'threee', 29, 'fkarim'),
(10, 'dsfs ddfs', 29, 'tipu'),
(11, 'sdfsd', 33, 'tipu'),
(12, 'dsfsdf', 27, 'tipu'),
(13, 'ada asd', 33, 'tipu'),
(14, 'aa dasd dasd', 34, 'tipu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `name`, `subject`, `author`, `edate`) VALUES
(15, 'Quiz test 1', 'ICT', 'fkarim', '2017-11-26 13:41:11'),
(16, 'Western Exam 1', 'Chemistry', 'fkarim', '2017-11-26 13:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(4) NOT NULL,
  `sub_id` int(4) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `description`, `user_id`, `sub_id`, `pdate`, `image`) VALUES
(27, 'This is my first title', 'Description about me Description about me\r\nDescription about me Description about me\r\nDescription about me Description about me', 1, 1, '2017-11-23 21:04:13', 'uploads/6f6122744f.jpg'),
(29, 'à¦•à§‹à¦¨ à¦ªà¦¤à§à¦°à¦¿à¦•à¦¾à§Ÿ à¦•à¦¬à¦¿à¦¤à¦¾ à¦ªà§à¦°à¦•à¦¾à¦¶à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦¬à¦™à§à¦•à¦¿à¦®à¦šà¦¨à§à¦¦à§à¦° à¦šà¦Ÿà§à¦°à§‹à¦ªà¦¾à¦§à§à¦¯à¦¾à§Ÿà§‡à¦° à¦¸à¦¾à¦¹à¦¿à¦¤à§à¦¯ à¦œà§€à¦¬à¦¨à§‡à¦° à¦¸à§‚à¦šà¦¨à¦¾ à¦˜à¦Ÿà§‡?', '<ul class=\"wpProQuiz_questionList\" style=\"box-sizing: inherit; padding: 0px; margin: 0px 0px 1.5em 2em; font-variant-numeric: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: \'Helvetica Neue\', HelveticaNeue, Helvetica, Arial, \'Lucida Grande\', sans-serif; vertical-align: baseline; overflow: auto; color: #555555; list-style: none !important; border: 1px solid #d5d5d5 !important; background: #f7f7f7 !important;\" data-question_id=\"3577\" data-type=\"single\">\r\n<li class=\"wpProQuiz_questionListItem\" style=\"box-sizing: inherit; padding: 3px !important; border: 0px !important; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none !important; list-style: none !important; margin: 0px 0px 5px !important 0px !important;\" data-pos=\"0\"><label style=\"box-sizing: inherit; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline; margin: 0px !important;\">à¦¬à¦™à§à¦—à¦¦à¦°à§à¦¶à¦¨</label></li>\r\n<li class=\"wpProQuiz_questionListItem\" style=\"box-sizing: inherit; padding: 3px !important; border: 0px !important; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none !important; list-style: none !important; margin: 0px 0px 5px !important 0px !important;\" data-pos=\"1\"><label style=\"box-sizing: inherit; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline; margin: 0px !important;\"><input class=\"wpProQuiz_questionInput\" style=\"color: #707070; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 1rem; line-height: 1.5; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; padding: 0px; margin-top: 0px !important; margin-right: 0px !important; margin-left: 0px !important; display: inline !important; float: none !important;\" name=\"question_303_3577\" type=\"radio\" value=\"2\" />&nbsp;à¦¸à¦‚à¦¬à¦¾à¦¦ à¦ªà§à¦°à¦­à¦¾à¦•à¦°</label></li>\r\n<li class=\"wpProQuiz_questionListItem\" style=\"box-sizing: inherit; padding: 3px !important; border: 0px !important; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none !important; list-style: none !important; margin: 0px 0px 5px !important 0px !important;\" data-pos=\"2\"><label style=\"box-sizing: inherit; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline; margin: 0px !important;\"><input class=\"wpProQuiz_questionInput\" style=\"color: #707070; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 1rem; line-height: 1.5; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; padding: 0px; margin-top: 0px !important; margin-right: 0px !important; margin-left: 0px !important; display: inline !important; float: none !important;\" name=\"question_303_3577\" type=\"radio\" value=\"3\" />&nbsp;à¦¤à¦¤à§à¦¤à§à¦¬à¦¬à§‹à¦§à¦¿à¦¨à§€</label></li>\r\n<li class=\"wpProQuiz_questionListItem\" style=\"box-sizing: inherit; padding: 3px !important; border: 0px !important; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; background-image: none !important; list-style: none !important; overflow: auto; margin: 0px 0px 0px !important 0px !important;\" data-pos=\"3\"><label style=\"box-sizing: inherit; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline; margin: 0px !important;\"><input class=\"wpProQuiz_questionInput\" style=\"color: #707070; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 1rem; line-height: 1.5; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; padding: 0px; margin-top: 0px !important; margin-right: 0px !important; margin-left: 0px !important; display: inline !important; float: none !important;\" name=\"question_303_3577\" type=\"radio\" value=\"4\" />&nbsp;à¦¸à¦‚à¦¬à¦¾à¦¦ à¦•à§Œà¦®à§à¦¦à§€</label></li>\r\n</ul>', 1, 1, '2017-11-23 21:12:19', ''),
(32, 'Post from another account', '<p>Post from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another accountPost from another account</p>', 2, 3, '2017-11-24 10:15:17', 'uploads/e471edaf95.jpg'),
(33, 'Whah is HTML', '<p>Hyper text markup lang</p>', 1, 6, '2017-11-26 13:46:39', 'uploads/532fb7de1b.jpg'),
(34, 'sdf sdfsdfsd', '<p>fasddf sdf</p>', 1, 6, '2017-11-26 13:47:37', 'uploads/e95fc21dfa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  `examid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`, `examid`) VALUES
(33, 1, 'Why do we use it?', 15),
(34, 2, 'Why do we use it?', 15),
(35, 3, 'What is the benefit of html', 15),
(36, 1, 'H2O means ?', 16),
(37, 2, 'Why do we use it?', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(11) NOT NULL,
  `exname` varchar(100) NOT NULL,
  `exid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `exname`, `exid`, `userid`, `score`) VALUES
(21, 'Quiz test 1', 15, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `class` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `username`, `password`, `class`, `phone`) VALUES
(1, 'Tipu Sultan', 'tipu', '123', 10, '01837237303'),
(2, 'Md. Niamul Haque', 'niam', '123', 9, '01676630442'),
(3, 'Md. Abdullah', 'abdullah', '123', 10, '01675630441'),
(5, 'Bijory Hossain', 'bijory', '123', 10, '01675630214'),
(6, 'Bithi Akter', 'bithi', '123', 10, '017185421543'),
(8, 'Golam Rabbani', 'rabbni', '456', 0, '049689877'),
(9, 'Md. Manik', 'manik', '123', 10, '01534557458'),
(10, 'Roton Mia', 'roton', '123', 9, '01915630587'),
(11, 'Suzon Mia', 'szn', '123', 9, '01915630587'),
(12, 'Md Abul Kalam', 'kalam', '1111112333', 10, '234234234342'),
(13, 'Md Fazle Rabbii', 'rabbi', '234234', 9, '132423423423');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`) VALUES
(1, 'Bangla'),
(2, 'English'),
(3, 'Mathematics'),
(4, 'Physics'),
(5, 'Chemistry'),
(6, 'ICT '),
(7, 'Biology'),
(8, 'Gloval Studies'),
(9, 'Religion & Moral Education ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `name`, `username`, `password`, `degree`, `phone`) VALUES
(1, 'Foyzul Karim', 'fkarim', '456', 'M.A.', '0165987488'),
(3, 'Naym Mia', 'naym', '456', 'B.COM', '01675630445'),
(5, 'Raihan Sarkar', 'raihan', '123', 'MBA', '01715232504'),
(6, 'Rashed Hasan', 'rsd', '123', 'MSC', '01676645879'),
(7, 'Safwana Haque', 'safwana', '123', 'B. Sc.', '01715487569'),
(8, 'Golam Rabbani', 'rabbni', '456', 'M. Sc.', '049689877');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
