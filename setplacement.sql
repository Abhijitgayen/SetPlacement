-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2021 at 07:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `setplacement`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `rollNo` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `apply_time` time DEFAULT NULL,
  `cv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`rollNo`, `job_id`, `apply_time`, `cv_id`) VALUES
(202123004, 1, '12:00:00', 4),
(201123004, 2, '11:00:00', 1),
(202123002, 2, '11:30:00', 3),
(201123004, 3, '12:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `branch_job`
--

CREATE TABLE `branch_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `branch_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cmp_id` int(11) NOT NULL,
  `cmp_name` varchar(50) NOT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `contactNo` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cmp_id`, `cmp_name`, `details`, `contactNo`, `email`) VALUES
(1, 'Mc Kinsey', 'Management Consulting Firm;founded in 1926; advices strategic management to corporations ', 9763197321, 'hr.mckinsey@gmail.com'),
(2, 'Adobe', 'American Software Company; specializes in digital solutions to optimize applications ', 70261656421, 'hr.adobe@gmail.com'),
(3, 'Microsoft', 'American Technology Company; specializes in computer software, electronics, PC etc.', 70261656421, 'hr.microsoft@gmail.com'),
(4, 'vmware_set', 'This is one of the top company in the india. ', 7044136740, 'company@iitg.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `cv_id` int(11) NOT NULL,
  `rollNo` int(11) NOT NULL,
  `cv_no` int(11) DEFAULT NULL,
  `cv_data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`cv_id`, `rollNo`, `cv_no`, `cv_data`) VALUES
(1, 202123002, 1, NULL),
(2, 202123002, 2, NULL),
(3, 202123004, 1, NULL),
(4, 202123004, 2, NULL),
(5, 201123004, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `ctc` int(11) NOT NULL,
  `lastDate` date NOT NULL,
  `joiningDate` date NOT NULL,
  `details` varchar(500) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `typeJob` varchar(15) NOT NULL,
  `cpiCutOff` double DEFAULT '0',
  `cmp_id` int(11) NOT NULL,
  `adertiseDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `ctc`, `lastDate`, `joiningDate`, `details`, `rec_id`, `typeJob`, `cpiCutOff`, `cmp_id`, `adertiseDate`) VALUES
(1, 1400000, '2021-08-15', '2021-08-19', 'RESPONSIBILITIES: Mine and analyze data from company database to optimize product development, develop custom models and algorithms to datasets, use predictive modelling to outgrow business. QUALIFICATIONS: B.Tech in CSE/Computing, M.Tech in Data Science, experience with Python, R,SQL, good knowledge of datastructures and algorithms.', 1, 'Full Time', 7, 2, '2021-05-15'),
(2, 750000, '2021-11-20', '2021-01-09', 'RESPONSIBILITIES: Develop intuitive software that meets and exceeds company needs, update andmaintain code repositories addressing customer concersn, analyze and test programs before launch. QUALIFICATIONS: B.Tech/M.Tech in CSE, hands on experience developingand maintaining software applications, working knowledge of C, C++, Pythin is a must.', 2, 'Full Time', 7.5, 3, '2021-05-19'),
(3, 4500000, '2021-11-20', '2021-01-09', 'RESPONSIBILITIES:Develop interactive graphical interfaces affecting different business requirements, create userflows, wireframes, prototypes and mockups. QUALIFICATIONS: Bachelors or Masters in Design, working knowledge of Figma, Canva and other tools.', 3, 'Full Time', 8.5, 2, '2021-10-18'),
(4, 2500000, '2021-11-20', '2021-01-09', 'RESPONSIBILITIES:Develop interactive graphical interfaces affecting different business requirements, create userflows, wireframes, prototypes and mockups. QUALIFICATIONS: Bachelors or Masters in Design, working knowledge of Figma, Canva and other tools.', 3, 'Full Time', 7.5, 2, '2021-10-18'),
(5, 500000, '2021-11-20', '2021-01-09', 'RESPONSIBILITIES:Develop interactive graphical interfaces affecting different business requirements, create userflows, wireframes, prototypes and mockups. QUALIFICATIONS: Bachelors or Masters in Design, working knowledge of Figma, Canva and other tools.', 3, 'Full Time', 6.5, 3, '2021-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `email_id` varchar(50) NOT NULL,
  `passwords` varchar(200) DEFAULT NULL,
  `levels` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`email_id`, `passwords`, `levels`) VALUES
('company@iitg.ac.in', '1b3abea96142b31573114bf4e39f2251', 2),
('placement_r@iitg.ac.in', '1b3abea96142b31573114bf4e39f2251', 3),
('placement_rep@iitg.ac.in', '1b3abea96142b31573114bf4e39f2251', 3),
('std@iitg.ac.in', '1b3abea96142b31573114bf4e39f2251', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintains_apply`
--

CREATE TABLE `maintains_apply` (
  `comments` varchar(100) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `rollNo` int(11) NOT NULL,
  `approved` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintains_apply`
--

INSERT INTO `maintains_apply` (`comments`, `job_id`, `pr_id`, `rollNo`, `approved`) VALUES
('You able to apply for Dream Job and super dream job', 1, 1, 202123006, 'Y'),
('you got good ppo', 1, 2, 202123004, 'N'),
('You able to apply for Dream Job and super dream job', 1, 3, 201123004, 'Y'),
('You able to apply for Dream Job and super dream job', 2, 1, 202123002, 'Y'),
('You able to apply for Dream Job and super dream job', 2, 3, 201123004, 'Y'),
('you got good ppo', 2, 3, 202123004, 'N'),
('cpi is low', 2, 3, 202123005, 'N'),
('cpi is low', 3, 3, 201123004, 'N'),
('cpi is low', 3, 3, 202123005, 'N');

--
-- Triggers `maintains_apply`
--
DELIMITER $$
CREATE TRIGGER `apply_tr_1` BEFORE INSERT ON `maintains_apply` FOR EACH ROW begin
if (select s.cpi from student s where s.rollno= new.rollNo) < (SELECT j.cpiCutOff FROM job j WHERE j.job_id=new.job_id) then set new.approved='N' , new.comments='cpi is low';
ELSE SET new.approved='P' ,new.comments='need to check';
  end if; 
  end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `apply_tr_2` BEFORE INSERT ON `maintains_apply` FOR EACH ROW begin
if (select s.ppo_ctc from student  s where s.rollNo= new.rollNo) <=600000 AND (select j.ctc from job j where j.job_id=new.job_id)>600000 AND new.approved='P' then set new.approved='Y' , new.comments='You able to apply for Dream Job and super dream job';
elseif (select s.ppo_ctc from student  s where s.rollNo= new.rollNo) <=1600000 AND (select j.ctc from job j where j.job_id=new.job_id)>1600000 AND new.approved='P' then set new.approved='Y' , new.comments='You able to apply for Dream  super dream job';
ELSEIF (new.approved='P' or new.approved = 'Y') THEN set new.approved='N', new.comments='you got good ppo';
  end if; 
  end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `apply_tr_3` BEFORE INSERT ON `maintains_apply` FOR EACH ROW begin
if (select s.ppo_ctc from student  s where s.rollNo= new.rollNo) <=600000 AND (select j.ctc from job j where j.job_id=new.job_id)>600000 AND ( new.approved='P' OR new.approved='Y') then set new.approved='Y' , new.comments='You able to apply for Dream Job and super dream job';
elseif (select o.offer_ctc from offers o where o.rollNo= new.rollNo) <=1600000 AND (select j.ctc from job j where j.job_id=new.job_id)>1600000 AND ( new.approved='P' OR new.approved='Y') then set new.approved='Y' , new.comments='You able to apply for Dream  super dream job';
ELSEIF (new.approved='P' or new.approved = 'Y') THEN set new.approved='N', new.comments='you got good offers from company';
  end if; 
  end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `maintains_job`
--

CREATE TABLE `maintains_job` (
  `comments` varchar(100) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `approved` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintains_job`
--

INSERT INTO `maintains_job` (`comments`, `job_id`, `pr_id`, `approved`) VALUES
('The company is legitimate and provided all necessary papers.', 1, 2, 'Y'),
('The company is legitimate and provided all necessary papers.', 2, 1, 'Y'),
('The company is legitimate and provided all necessary papers.', 3, 3, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `maintains_student`
--

CREATE TABLE `maintains_student` (
  `comments` varchar(100) DEFAULT NULL,
  `rollNo` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `approved` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintains_student`
--

INSERT INTO `maintains_student` (`comments`, `rollNo`, `pr_id`, `approved`) VALUES
('All documents submitted.', 201123004, 2, 'Y'),
('data is not ok.', 202123002, 1, 'W'),
('All documents submitted.', 202123004, 3, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `rollNo` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `offer_ctc` int(11) NOT NULL,
  `aecepted` char(1) DEFAULT 'N',
  `offerlastdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`rollNo`, `job_id`, `offer_ctc`, `aecepted`, `offerlastdate`) VALUES
(202123004, 1, 150000, 'Y', '2021-12-11'),
(202123002, 2, 1400000, 'Y', '2021-12-11'),
(201123004, 3, 12000000, 'Y', '2021-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `placement_rep`
--

CREATE TABLE `placement_rep` (
  `pr_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `depertment` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobileNo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `placement_rep`
--

INSERT INTO `placement_rep` (`pr_id`, `name`, `depertment`, `email`, `mobileNo`) VALUES
(1, 'Jack Jones', 'Computer Science', 'jj@iitg.ac.in', '9876543210'),
(2, 'Bony M', 'Mathematics', 'bm@iitg.ac.in', '6879234501'),
(3, 'John Snow', 'EEE', 'js@iitg.ac.in', '9293819453'),
(4, 'Abhijit Sen', 'CCD ', 'placement_r@iitg.ac.in', '7044136740'),
(5, 'placement head', 'CCD', 'placement_rep@iitg.ac.in', '5745124512');

-- --------------------------------------------------------

--
-- Table structure for table `programme_job`
--

CREATE TABLE `programme_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `programme_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recomendation`
--

CREATE TABLE `recomendation` (
  `rec_id` int(11) NOT NULL,
  `cmp_id` int(11) NOT NULL,
  `recom_word` varchar(25) DEFAULT NULL,
  `rec_key` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recomendation`
--

INSERT INTO `recomendation` (`rec_id`, `cmp_id`, `recom_word`, `rec_key`) VALUES
(1, 1, 'Data Scientist', 'Data Analytics'),
(2, 1, 'Machine Learning Engineer', 'Data Analytics'),
(3, 2, 'Data Analyst', 'Data Analytics'),
(4, 2, 'Fullstack Developer', 'Software Development'),
(5, 2, 'Frontend Developer', 'Software Development'),
(6, 1, 'Backend Developer', 'Software Development'),
(7, 1, 'UI/UX Designer', 'Software Design'),
(8, 1, 'Product Designer', 'Software Design');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(11) NOT NULL,
  `slot_no` int(11) DEFAULT NULL,
  `slot_date` date NOT NULL,
  `slot_time` time NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `slot_no`, `slot_date`, `slot_time`, `job_id`) VALUES
(1, 1, '2021-10-30', '10:00:00', 1),
(2, 2, '2021-11-05', '11:30:00', 2),
(3, 3, '2021-11-06', '11:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `rollNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `programme` varchar(25) NOT NULL,
  `cpi` double NOT NULL,
  `depertment` varchar(25) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  `parmenentAdress` varchar(500) NOT NULL,
  `ppo_details` tinyint(1) NOT NULL,
  `ppo_ctc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollNo`, `email`, `gender`, `mobileNo`, `name`, `programme`, `cpi`, `depertment`, `category`, `parmenentAdress`, `ppo_details`, `ppo_ctc`) VALUES
(201123004, 'rahul@iitg.ac.in', 'M', '8457967778', 'Rahul Sen', 'B.tech', 8.2, 'EEE', 'gen', 'Vill-tajipur,P.O- Rakhi,Pin-843389', 0, 0),
(202123001, 'std@iitg.ac.in', 'M', '7044136740', 'Rahul rep', 'm.sc', 9.2, 'math ', 'obc', 'Vill - Subhasnagr, P.O- chapla, P.S- raidighi, south 24 pgs.', 1, 0),
(202123002, 'agayen@iitg.ac.in', 'M', '7044136740', 'Abhijit', 'M.Sc', 8.9, 'math', 'OBC', 'Vill-subhasnagar,P.O- chapla,Pin-743349', 0, 0),
(202123004, 'ashksen@iitg.ac.in', 'M', '8457961278', 'Akash Sen', 'M.Sc', 8, 'math', 'OBC', 'Vill-Raipur,P.O- kalika,Pin-743389', 1, 1200000),
(202123005, 'khan@iitg.ac.in', 'M', '8479654212', 'khan dey', 'm.sc', 5.6, 'mathematics', 'obc', 'vill-khani,p.o-khanpur,pin-45778', 1, 500000),
(202123006, 'rprtro@iitg.ac.in', 'F', '4587961254', 'Rahul Partro', 'M.sc', 7.5, 'Physics', 'sc', 'vill-subhashnagar, P.O - sennagar,pin-458793', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`job_id`,`rollNo`),
  ADD KEY `apply_fk_1` (`cv_id`),
  ADD KEY `apply_fk_3` (`rollNo`);

--
-- Indexes for table `branch_job`
--
ALTER TABLE `branch_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_job_fk` (`job_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `cv_table_fk` (`rollNo`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_fk_1` (`cmp_id`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `maintains_apply`
--
ALTER TABLE `maintains_apply`
  ADD PRIMARY KEY (`job_id`,`pr_id`,`rollNo`),
  ADD KEY `maintains_apply_fk_2` (`pr_id`),
  ADD KEY `maintains_apply_fk_3` (`rollNo`);

--
-- Indexes for table `maintains_job`
--
ALTER TABLE `maintains_job`
  ADD PRIMARY KEY (`job_id`,`pr_id`),
  ADD KEY `maintains_job_fk_2` (`pr_id`);

--
-- Indexes for table `maintains_student`
--
ALTER TABLE `maintains_student`
  ADD PRIMARY KEY (`rollNo`,`pr_id`),
  ADD KEY `maintains_student_fk_2` (`pr_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`job_id`,`rollNo`),
  ADD KEY `offer_fk_1` (`rollNo`);

--
-- Indexes for table `placement_rep`
--
ALTER TABLE `placement_rep`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `programme_job`
--
ALTER TABLE `programme_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_job_fk` (`job_id`);

--
-- Indexes for table `recomendation`
--
ALTER TABLE `recomendation`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `slot_fk_1` (`job_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_job`
--
ALTER TABLE `branch_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placement_rep`
--
ALTER TABLE `placement_rep`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programme_job`
--
ALTER TABLE `programme_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recomendation`
--
ALTER TABLE `recomendation`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_fk_1` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_fk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_fk_3` FOREIGN KEY (`rollNo`) REFERENCES `student` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_job`
--
ALTER TABLE `branch_job`
  ADD CONSTRAINT `branch_job_fk` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_table_fk` FOREIGN KEY (`rollNo`) REFERENCES `student` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_fk_1` FOREIGN KEY (`cmp_id`) REFERENCES `company` (`cmp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintains_apply`
--
ALTER TABLE `maintains_apply`
  ADD CONSTRAINT `maintains_apply_fk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintains_apply_fk_2` FOREIGN KEY (`pr_id`) REFERENCES `placement_rep` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintains_apply_fk_3` FOREIGN KEY (`rollNo`) REFERENCES `student` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintains_job`
--
ALTER TABLE `maintains_job`
  ADD CONSTRAINT `maintains_job_fk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintains_job_fk_2` FOREIGN KEY (`pr_id`) REFERENCES `placement_rep` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintains_student`
--
ALTER TABLE `maintains_student`
  ADD CONSTRAINT `maintains_student_fk_1` FOREIGN KEY (`rollNo`) REFERENCES `student` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintains_student_fk_2` FOREIGN KEY (`pr_id`) REFERENCES `placement_rep` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offer_fk_1` FOREIGN KEY (`rollNo`) REFERENCES `student` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_fk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programme_job`
--
ALTER TABLE `programme_job`
  ADD CONSTRAINT `programme_job_fk` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slot`
--
ALTER TABLE `slot`
  ADD CONSTRAINT `slot_fk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
