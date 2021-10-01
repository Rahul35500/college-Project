-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 04:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job_post`
--

CREATE TABLE `apply_job_post` (
  `id_apply` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_job_post`
--

INSERT INTO `apply_job_post` (`id_apply`, `id_jobpost`, `id_company`, `id_user`, `status`) VALUES
(33, 128, 123, 17, 2),
(34, 126, 122, 17, 2),
(35, 127, 122, 17, 1),
(37, 129, 123, 18, 2),
(38, 136, 122, 18, 2),
(39, 129, 123, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(1, 'Hyderabad', 1),
(2, 'Delhi', 2),
(3, 'Bangalore', 3),
(4, 'Mangalore', 3),
(5, 'Kolkata', 4),
(6, 'Mumbai', 5),
(7, 'Pune', 5);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aboutme` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'j7.jpg',
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `name`, `companyname`, `country`, `state`, `city`, `contactno`, `website`, `email`, `password`, `aboutme`, `logo`, `createdAt`, `active`) VALUES
(117, 'Suraj', 'Dynamatics', 'India', 'Andhra Pradesh', 'Hyderabad', '1234567890', 'www.dynamatics.com', 'dyna@gmail.com', 'dynamatics', 'Dynamatic aerospace pvt. ltd.', '5ed0124783c1d.png', '2019-10-26', 1),
(122, 'Pankaj', 'Amazon', 'India', 'Karnataka', 'Mangalore', '7894561230', 'www.amazon.com', 'amazon@gmail.com', 'amazon', 'sd', '5ed00ede9dd25.jpg', '2019-10-31', 1),
(123, 'Sagar', 'Flipkart', 'India', 'Karnataka', 'Bangalore', '7894561230', 'www.flipkart.com', 'flipkart@gmail.com', 'flipkart', 'I\'m Flipkart', '5ed0014e4344b.jpg', '2019-10-31', 1),
(124, 'Satish', 'Snapdeal', 'India', 'West Bengal', 'Select City', '9876543210', 'www.snapdeal.com', 'snapdeal@gmail.com', 'snapdeal', 'It is an ecommerce website', '5ecffe84bb637.png', '2020-05-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(101, 'IN', 'India', 91);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `job_profile` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `selection_procedure` text COLLATE utf8_bin DEFAULT NULL,
  `way_to_prepare` text COLLATE utf8_bin DEFAULT NULL,
  `overall_exp` text COLLATE utf8_bin DEFAULT NULL,
  `tips_advise` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id_experience`, `id_user`, `id_company`, `job_profile`, `selection_procedure`, `way_to_prepare`, `overall_exp`, `tips_advise`) VALUES
(8, 7, 117, 'Data analyst', 'Aptitude then virtual interview.', 'Online tutorial', 'Amazing', 'Low salary'),
(9, 17, 123, 'Web Developer', 'Direct interview', 'Books like \"Let us C\".', 'Good', 'keep practising.');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` int(255) NOT NULL,
  `maximumsalary` int(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `createdat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `description`, `minimumsalary`, `maximumsalary`, `experience`, `qualification`, `createdat`) VALUES
(125, 117, 'Dynamatics - Data entry', 'no platform to enhance your software skill', 1111, 12222, '3', 'bca', '2019-10-31'),
(126, 122, 'Amazon - Codefundo', 'platform to enhance your software skill', 20000, 80000, '2', 'btech', '2019-10-31'),
(127, 122, 'Amazon - Database manager', 'database management ', 20000, 60000, '3', 'btech', '2019-10-31'),
(128, 123, 'Flipkart - Shopping database management ', 'managing database', 20000, 80000, '3', 'btech', '2019-10-31'),
(129, 123, 'Flipkart - Web developement', 'web devlopement', 30000, 70000, '2', 'btech', '2019-10-31'),
(135, 124, 'Snapdeal - Delivery Boy', 'Should be a boy ;-)', 2000, 30000, '50', 'btech', '2020-05-28'),
(136, 122, 'Amazon - Data analyst', 'Analyze the data', 12000, 18000, '1', 'bca or bsc', '2020-05-29'),
(138, 124, 'Snapdeal - Data Analyst', 'Data analyst', 30000, 50000, '2', 'bca or masters', '2020-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_mailbox` int(11) NOT NULL,
  `id_fromuser` int(11) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `id_touser` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id_mailbox`, `id_fromuser`, `fromuser`, `id_touser`, `subject`, `message`, `createdAt`) VALUES
(6, 123, 'company', 17, 'meeting', 'meet me tmrw', '2020-05-26'),
(7, 123, 'company', 17, 'contact me', 'call me', '2020-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(8) NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `member_password` varchar(64) NOT NULL,
  `member_email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_password`, `member_email`) VALUES
(1, 'vincy', 'e2f3088a505f1ed02e40f5b62550f291', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('satish@gmail.com', '768e78024aa8fdb9b8fe87be86f647452e4dad0209', '2020-12-12 12:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `reply_mailbox`
--

CREATE TABLE `reply_mailbox` (
  `id_reply` int(11) NOT NULL,
  `id_mailbox` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_mailbox`
--

INSERT INTO `reply_mailbox` (`id_reply`, `id_mailbox`, `id_user`, `usertype`, `message`, `createdAt`) VALUES
(1, 1, 1, 'user', 'hi', '2018-10-14 04:12:19'),
(2, 1, 1, 'user', 'nothing', '2018-10-14 04:12:28'),
(3, 4, 2, 'user', 'hello', '2018-10-15 17:40:58'),
(4, 3, 102, 'company', 'something', '2018-11-01 16:02:02'),
(5, 7, 17, 'user', 'ok boss', '2020-05-26 11:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andhra Pradesh', 101),
(2, 'Delhi', 101),
(3, 'Karnataka', 101),
(4, 'West Bengal', 101),
(5, 'Maharashtra', 101);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `stream` varchar(255) DEFAULT NULL,
  `passingyear` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `aboutme` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `security_question` varchar(20) DEFAULT NULL,
  `security_answer` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `address`, `city`, `state`, `contactno`, `qualification`, `stream`, `passingyear`, `dob`, `age`, `designation`, `resume`, `hash`, `active`, `aboutme`, `skills`, `security_question`, `security_answer`) VALUES
(2, 'Roshan', 'Sah', 'roshan@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'ganpati nagar', 'bangalore', 'Karnataka', '1234567890', 'btech', 'cse', '2020-04-30', '1997-08-10', '21', 'DBA', '5bc49da8c4a2f.pdf', 'b689a43e636d0c91ba24761544ab7c33', 1, 'i am roshan studying in NIT.', 'react', '3', 'adarsh'),
(3, 'Omkar', 'Sharma', 'omkar@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'soldevanahalli', 'bangalore', 'Karnataka', '1234569874', 'btech', 'cse', '2020-10-30', '1998-09-15', '20', 'CA', '5bc2c8de662ba.pdf', '034b48b90d441d1877ea2c08750fdddb', 1, 'i am omkar studying in NIT.', 'javascript', '3', 'adarsh'),
(7, 'Satish', 'Tiwari', 'satish@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'diphu', 'diphu', 'assam', '7894561230', 'btech', 'eee', '2019-10-16', '1998-09-15', '21', 'AD', '5bc70439bd344.pdf', '066ed5c9a19add31be50ad85ebb593a3', 1, 'i am satish studying in DGC.', 'python', '3', 'adarsh'),
(15, 'Pramod', 'Kumar', 'pramod@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'ganpati nagar', 'bangalore', 'Karnataka', '9854123545', 'bsc', 'it', '6666-06-06', '1998-04-04', '21', 'CEO', '5db9d8f8c3ed6.pdf', '78b703521de16cc578b296b3dc83e895', 0, 'i am pramod studying in IIT.', 'unix', '3', 'adarsh'),
(16, 'Sam', 'Mathew', 'sam@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'soldevanahalli', 'bangalore', 'Karnataka', '7894561230', 'bca', 'computer science', '2222-03-03', '1998-03-04', '21', 'Assistant', '5db9da208fd22.pdf', 'ad37db546ae3a25a16303583b7571325', 1, 'i am sam studying in IIT.', 'dbms', '3', 'adarsh'),
(17, 'Sagar', 'Prasad', 'sagar@gmail.com', 'YjRhOGQxNWY3YWFmZjJkN2VlZWJkODMwM2U0NGRlMTQ=', 'shanti nagar', 'bangalore', 'karnataka', '7577013554', 'bca', 'computer science', '2020-05-27', '1998-09-20', '21', 'SE', '5eccf61182424.pdf', '7df23593c957b311f29b0f2dcf7d8f12', 1, 'i am a programmer ', 'c, c++, java', '3', 'adarsh'),
(18, 'Subhamoy', 'Rajak', 'subhamoy@gmail.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', 'kolkata', 'kolkata', 'west bengal', '9807612354', 'mba', 'buisness', '2020-05-01', '2000-01-01', '20', 'CEO', '5ecffbf88a688.pdf', 'ab6c6fdd6e562fe215f2ad1cdf737e32', 1, 'i am bengali and I love fish and girls', 'c c++ html css js', '3', 'adarsh'),
(19, 'Gyandeep', 'kachari', 'gyandeep@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'Shillong', 'sSillong', 'Meghalaya', '9807261534', 'bsc', 'science', '2020-08-01', '1998-05-01', '22', 'web designer', '5f47dd1098ae9.pdf', '7407f456d1454c75b194a49ac114da0d', 1, 'I am good in coding.', 'c\r\nc++\r\njava', '3', 'adarsh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  ADD PRIMARY KEY (`id_apply`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_company` (`id_company`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `fk_exp_company` (`id_company`),
  ADD KEY `fk_exp_user` (`id_user`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`),
  ADD KEY `fk_comapny` (`id_company`);

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id_mailbox`);

--
-- Indexes for table `reply_mailbox`
--
ALTER TABLE `reply_mailbox`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id_mailbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reply_mailbox`
--
ALTER TABLE `reply_mailbox`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  ADD CONSTRAINT `fk_comapny_jobpost` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk_exp_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_exp_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `job_post`
--
ALTER TABLE `job_post`
  ADD CONSTRAINT `fk_comapny` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
