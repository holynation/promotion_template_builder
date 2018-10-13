-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 07:15 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_appointment`
--

CREATE TABLE `academic_appointment` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `first_academic_appointment` varchar(200) NOT NULL,
  `date_of_appointment` date DEFAULT NULL,
  `present_post` varchar(200) NOT NULL,
  `date_of_present_post` date DEFAULT NULL,
  `date_of_last_promotion` date DEFAULT NULL,
  `date_last_considered` date DEFAULT NULL COMMENT 'in cases where promotion was not through',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_appointment`
--

INSERT INTO `academic_appointment` (`ID`, `lecturer_id`, `first_academic_appointment`, `date_of_appointment`, `present_post`, `date_of_present_post`, `date_of_last_promotion`, `date_last_considered`, `status`, `date_created`) VALUES
(1, 1, 'Assitant Lecturer', '2013-10-01', 'Senior Lecturer', '2016-09-12', '2016-09-12', NULL, 1, '2018-10-03 00:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `accepted_books`
--

CREATE TABLE `accepted_books` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `accepted_year` datetime DEFAULT NULL,
  `article_title` varchar(200) NOT NULL,
  `journal_name` varchar(250) NOT NULL COMMENT 'in italics&title case',
  `country` varchar(250) NOT NULL COMMENT 'name in full',
  `contribution` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accepted_books`
--

INSERT INTO `accepted_books` (`ID`, `lecturer_id`, `surname`, `firstname`, `middlename`, `accepted_year`, `article_title`, `journal_name`, `country`, `contribution`, `date_created`) VALUES
(1, 1, 'Bisiriyu,Balogun', 'Akinola,Kolapo', 'Oluwalonimi,Oluwasegun', '2017-07-05 00:00:00', 'Enhancing Productivity in the Management of University Academic Staff in Nigeria', 'Journal of Educational Management', 'Ghana', '35', '2018-10-04 15:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `address` text,
  `dob` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `img_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `firstname`, `middlename`, `lastname`, `email`, `phone_number`, `address`, `dob`, `status`, `img_path`) VALUES
(1, 'Technode', 'Technode', 'Technode', 'technode@gmail.com', '08109994485', 'Akobo,Ibadan', '2018-10-01', 1, 'assets/images/faces/face17.jpg'),
(2, 'Alatise', 'Abraham', 'Oluwaseun', 'holynationdevelopment@gmail.com', '07064625478', 'Biala Ologede Estate,Olodo,Ibadan', '2018-10-01', 1, 'uploads/admin/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `article_appear_in_journal`
--

CREATE TABLE `article_appear_in_journal` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `journal_year` varchar(20) DEFAULT NULL,
  `article_title` varchar(200) NOT NULL,
  `journal_name` varchar(250) NOT NULL COMMENT 'in italics&title case',
  `volume_no` int(11) NOT NULL,
  `journal_num` int(11) NOT NULL,
  `page_range` varchar(100) NOT NULL,
  `country` varchar(250) NOT NULL COMMENT 'name in full',
  `contribution` varchar(150) NOT NULL,
  `extra_volume` varchar(150) DEFAULT NULL COMMENT '=> low volume jounals',
  `extra_vol_year` varchar(20) DEFAULT NULL,
  `date_of_publication` datetime DEFAULT NULL COMMENT '=>article in yr of promotion',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_appear_in_journal`
--

INSERT INTO `article_appear_in_journal` (`ID`, `lecturer_id`, `surname`, `firstname`, `middlename`, `journal_year`, `article_title`, `journal_name`, `volume_no`, `journal_num`, `page_range`, `country`, `contribution`, `extra_volume`, `extra_vol_year`, `date_of_publication`, `date_created`) VALUES
(1, 1, 'Salau,Musa,Ochei', 'Noah,Akinola,Buchi', 'Oluwalonimi,Oluwasegun', '1997', 'A Critical Assessment of Conflict in the International Law Context', 'Journal of International Law ', 6, 4, '17-37', 'United States of America', '30', NULL, NULL, NULL, '2018-10-04 15:11:26'),
(2, 1, 'Adam,Olatunji', 'Akinola,Kolapo', 'Oluwalonimi,Oluwasegun', '2012', 'Assessment of Pollution in an Urban Drainage Waterway in the City of Abeokuta', 'Urban Environment and Development ', 2, 1, '16-23', 'Nigeria', '50', '6', '2017', NULL, '2018-10-04 15:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `article_in_conference`
--

CREATE TABLE `article_in_conference` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `editors_id` int(11) NOT NULL,
  `author_surname` varchar(200) NOT NULL,
  `author_firstname` varchar(200) NOT NULL,
  `author_middlename` varchar(200) NOT NULL,
  `year_publish` varchar(20) DEFAULT NULL,
  `article_title` varchar(250) NOT NULL COMMENT 'in title case',
  `conference_theme` varchar(250) NOT NULL,
  `name_of_proceedings` varchar(250) NOT NULL,
  `date_of_conference` varchar(30) DEFAULT NULL,
  `city_publish` varchar(100) NOT NULL,
  `publishing_company` varchar(250) NOT NULL,
  `page_range` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `contribution` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_in_conference`
--

INSERT INTO `article_in_conference` (`ID`, `lecturer_id`, `editors_id`, `author_surname`, `author_firstname`, `author_middlename`, `year_publish`, `article_title`, `conference_theme`, `name_of_proceedings`, `date_of_conference`, `city_publish`, `publishing_company`, `page_range`, `country`, `contribution`, `date_created`) VALUES
(1, 1, 4, 'Okunrinde,Oju,Fadipe', 'Tayo,Ikechuku,Oluwadamilare', 'Kolapo,Abiodun,Segun', '2015', 'Postmodernism and African Literary Scholarship', 'Modern Literary Theories and African Literature in the 21st Century', 'Proceedings of the 1st Nigerian Literature Association’s Conference. ', '2018-10-21', 'Lagos', 'Wadell', '23-45', 'Nigeria', '30', '2018-10-04 14:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `book_published`
--

CREATE TABLE `book_published` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `author_surname` varchar(200) NOT NULL COMMENT 'name may be in bold',
  `author_firstname` varchar(50) NOT NULL,
  `author_middlename` varchar(50) DEFAULT NULL,
  `year_of_publication` varchar(50) NOT NULL COMMENT 'put in bracket',
  `title_of_book` varchar(250) NOT NULL COMMENT 'in italic format and title case',
  `city_of_publication` varchar(250) NOT NULL,
  `publish_company_name` varchar(250) NOT NULL,
  `total_no_pages` int(11) NOT NULL,
  `isbn_no` varchar(50) NOT NULL,
  `country_publish` varchar(100) NOT NULL COMMENT 'this in bracket',
  `contribution` varchar(20) NOT NULL COMMENT 'this in bracket',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_published`
--

INSERT INTO `book_published` (`ID`, `lecturer_id`, `author_surname`, `author_firstname`, `author_middlename`, `year_of_publication`, `title_of_book`, `city_of_publication`, `publish_company_name`, `total_no_pages`, `isbn_no`, `country_publish`, `contribution`, `date_created`) VALUES
(1, 1, 'Abdukadir,Ogunlola', 'Akintoba,Segun', 'Abiodun,Kolapo', '2011', 'Radiation and Mankind', 'Ibadan', 'Star', 250, '978-978-921-011-4', 'Nigeria', '30', '2018-10-03 15:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_in_book_published`
--

CREATE TABLE `chapter_in_book_published` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `editors_id` int(11) NOT NULL,
  `author_surname` varchar(200) NOT NULL COMMENT 'name may be in bold',
  `author_firstname` varchar(50) NOT NULL,
  `author_middlename` varchar(50) DEFAULT NULL,
  `year_of_publication` varchar(50) NOT NULL COMMENT 'put in bracket',
  `title_of_chapter` varchar(200) NOT NULL COMMENT 'this is the title of chapter in the book',
  `title_of_book` varchar(250) NOT NULL COMMENT 'in italic format and title case',
  `city_of_publication` varchar(250) NOT NULL,
  `publish_company_name` varchar(250) NOT NULL,
  `chapter_page_range` varchar(11) NOT NULL,
  `isbn_no` varchar(50) NOT NULL,
  `country_publish` varchar(100) NOT NULL COMMENT 'this in bracket',
  `contribution` varchar(20) NOT NULL COMMENT 'this in bracket',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter_in_book_published`
--

INSERT INTO `chapter_in_book_published` (`ID`, `lecturer_id`, `editors_id`, `author_surname`, `author_firstname`, `author_middlename`, `year_of_publication`, `title_of_chapter`, `title_of_book`, `city_of_publication`, `publish_company_name`, `chapter_page_range`, `isbn_no`, `country_publish`, `contribution`, `date_created`) VALUES
(1, 1, 2, 'Okunrinde,Oju,Fadipe', 'Tayo,Ikechuku,Oluwadamilare', 'Kolapo,Abiodun,Segun', '2004', 'Mechanised Agriculture in the 21st Century', 'Agriculture and Mankind', 'Ilorin', 'Hopewell', '12-23', 'ISBN 978-36668-7-8', 'Nigeria', '70', '2018-10-03 16:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `department_name` varchar(150) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `department_name`, `faculty_id`, `date_created`) VALUES
(1, 'Computer Science', 1, NULL),
(2, 'Statistics', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dev_app`
--

CREATE TABLE `dev_app` (
  `ID` int(11) NOT NULL,
  `app_name` varchar(150) DEFAULT NULL,
  `app_logo` varchar(150) DEFAULT NULL,
  `slogan` text,
  `location` text,
  `description` text,
  `company_name` varchar(200) DEFAULT NULL,
  `app_mail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev_app`
--

INSERT INTO `dev_app` (`ID`, `app_name`, `app_logo`, `slogan`, `location`, `description`, `company_name`, `app_mail`) VALUES
(1, 'Cv-Format', 'uploads/app/logo/1.ico', 'Expanding the world technology', 'Akobo,Ibadan', 'We help you format your promotion template ', 'Technode Solutions', 'oAlatise@technodesolutions.com.ng');

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `editor_surname` varchar(200) NOT NULL,
  `editor_firstname` varchar(200) NOT NULL,
  `editor_middlename` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_table_key` int(11) NOT NULL COMMENT 'chapter in book,article conference'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`ID`, `lecturer_id`, `editor_surname`, `editor_firstname`, `editor_middlename`, `date_created`, `publish_table_key`) VALUES
(2, 1, 'Olalere', 'Akintayo', '', '2018-10-04 10:36:45', 0),
(4, 1, 'Badmus', 'Akintayo', 'Odunola', '2018-10-04 14:25:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `ID` int(11) NOT NULL,
  `faculty_name` varchar(150) NOT NULL,
  `faculty_color` varchar(150) DEFAULT NULL,
  `slogan` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`ID`, `faculty_name`, `faculty_color`, `slogan`, `date_created`, `description`) VALUES
(1, 'Faculy Of Science', 'Blue', 'Expanding the world technology', '2018-10-02 15:27:44', 'This is the Faculty of Science');

-- --------------------------------------------------------

--
-- Table structure for table `honours_distinctions`
--

CREATE TABLE `honours_distinctions` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `date_awarded` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honours_distinctions`
--

INSERT INTO `honours_distinctions` (`ID`, `lecturer_id`, `title_name`, `date_awarded`, `date_created`) VALUES
(1, 1, 'Hamilton Prize for best thesis of the University of Botswana', '2006', '2018-10-03 12:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `ID` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) DEFAULT NULL,
  `maiden_name` varchar(250) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `dob` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(100) DEFAULT NULL,
  `state_of_origin` varchar(100) DEFAULT NULL,
  `staff_no` varchar(100) NOT NULL,
  `lga_of_origin` varchar(100) DEFAULT NULL,
  `disability` tinyint(1) DEFAULT NULL,
  `nationality` varchar(150) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed','others') DEFAULT NULL,
  `religion` enum('Christianity','Islam','Other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`ID`, `title_id`, `surname`, `firstname`, `middlename`, `maiden_name`, `department_id`, `email`, `phone_number`, `dob`, `status`, `address`, `state_of_origin`, `staff_no`, `lga_of_origin`, `disability`, `nationality`, `gender`, `img_path`, `marital_status`, `religion`) VALUES
(1, 3, 'Alatise', 'Oluwaseun', 'Abraham', NULL, 1, 'lecturer@gmail.com', '07064625478', '2015-01-06', 1, 'Biala Ologede Estate,Olodo.Ibadan', 'Ogun', '1111', 'Ijebu Ode', 0, 'Nigerian', 'male', 'uploads/lecturer/1.jpg', 'single', 'Christianity'),
(3, 3, 'Alatise', 'Oluwaseun', '', NULL, 1, 'holynation667@gmail.com', '0810994486', '2009-06-10', 1, NULL, 'Lagos', '12345', 'Ikeja', 0, 'Nigeria', 'male', 'uploads/lecturer/1.jpg', 'single', 'Christianity');

-- --------------------------------------------------------

--
-- Table structure for table `major_conf_attended`
--

CREATE TABLE `major_conf_attended` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `conf_name` varchar(250) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(11) DEFAULT NULL,
  `month` varchar(20) NOT NULL,
  `year_attended` varchar(20) NOT NULL,
  `city_of_conf` varchar(100) DEFAULT NULL,
  `country_of_conf` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major_conf_attended`
--

INSERT INTO `major_conf_attended` (`ID`, `lecturer_id`, `conf_name`, `start_date`, `end_date`, `month`, `year_attended`, `city_of_conf`, `country_of_conf`, `date_created`) VALUES
(1, 1, '28th International Conference of the African Society of Analytical Chemist', '12', '15', 'January', '2010', 'Durban', 'South Africa', '2018-10-05 11:47:47'),
(2, 3, '30th International Conference of the African Society of Computer Science', '4', '8', 'October', '2017', 'Durban', 'South Africa', '2018-10-09 16:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `society_name` varchar(200) NOT NULL,
  `office_held` varchar(250) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`ID`, `lecturer_id`, `society_name`, `office_held`, `start_date`, `end_date`, `date_created`) VALUES
(1, 1, 'Nigerian Society of Engineers', 'President', '2006', '2008', '2018-10-12 16:44:53'),
(2, 1, 'Institute of Public Analysts of Nigeria', 'Member', NULL, NULL, '2018-10-12 17:05:03'),
(3, 1, 'Nigerian Society of Engineers', 'Secretary', '2003', '2005', '2018-10-12 17:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `paper_read`
--

CREATE TABLE `paper_read` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `major_conf_attended_id` int(11) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) DEFAULT NULL,
  `title_of_paper` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_read`
--

INSERT INTO `paper_read` (`ID`, `lecturer_id`, `major_conf_attended_id`, `surname`, `firstname`, `middlename`, `title_of_paper`, `date_created`) VALUES
(1, 1, 1, 'Okorie,Ajayi', 'Buchi,Akinwumi', NULL, 'Applications of chemometrics  to in-situ polarographic measurements', '2018-10-05 12:41:03'),
(2, 1, 1, 'Adam,Olatunji', 'Akinola,Kolapo', NULL, 'trying another test of the app', '2018-10-05 12:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `patents_copyright`
--

CREATE TABLE `patents_copyright` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `patent_year` varchar(20) DEFAULT NULL,
  `title_of_patent` varchar(200) NOT NULL COMMENT 'in italics',
  `patent_no` varchar(100) NOT NULL,
  `country` varchar(150) NOT NULL,
  `contribution` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patents_copyright`
--

INSERT INTO `patents_copyright` (`ID`, `lecturer_id`, `surname`, `firstname`, `middlename`, `patent_year`, `title_of_patent`, `patent_no`, `country`, `contribution`, `date_created`) VALUES
(1, 1, 'Awodiya,Ola,Fasola', 'Mayowa,Oluwaseun,Seye', 'Cynthia,Femi,Damilare', '2013', 'Description of Maize Cultivar', 'IFH-200.NGVZ-00-22', 'Nigeria', '30', '2018-10-04 14:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `professional_qualifications`
--

CREATE TABLE `professional_qualifications` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `qualifications` varchar(200) NOT NULL,
  `school_granted` varchar(200) NOT NULL,
  `date_granted` varchar(20) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_qualifications`
--

INSERT INTO `professional_qualifications` (`ID`, `lecturer_id`, `qualifications`, `school_granted`, `date_granted`, `date_created`) VALUES
(1, 1, 'Certificate in Hardware Management', 'Nigerian Institute of Computer Engineers', '2014', '2018-10-03 11:48:08'),
(2, 1, 'Professional Diploma in Statistics', 'University of Jos', '2010', '2018-10-03 12:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_thesis_dissertation`
--

CREATE TABLE `project_thesis_dissertation` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `year_research` varchar(20) DEFAULT NULL,
  `research_name` varchar(150) NOT NULL,
  `research_category` varchar(150) NOT NULL,
  `sch_of_research` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_thesis_dissertation`
--

INSERT INTO `project_thesis_dissertation` (`ID`, `lecturer_id`, `year_research`, `research_name`, `research_category`, `sch_of_research`, `date_created`) VALUES
(1, 1, '1988', 'Discreet enthalpies related to thermodynamics of substances', 'MSc Project', 'University of Ibadan', '2018-10-03 15:32:16'),
(2, 1, '1992', 'Stereochemistry of some novel organometallic compounds of mercury', 'MPhil Dissertation', 'University of Lagos', '2018-10-03 15:33:00'),
(3, 1, '1996', 'Electron spin spectroscopy of some novel organmometallic compounds of arsenic', 'PhD Thesis', 'University of Ibadan', '2018-10-03 15:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `academic_qualification` varchar(200) NOT NULL,
  `school_granted` varchar(200) NOT NULL,
  `date_granted` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`ID`, `lecturer_id`, `academic_qualification`, `school_granted`, `date_granted`, `date_created`) VALUES
(1, 1, 'B.Sc. (Computer Science) ', 'Ibadan', '2014', '2018-10-03 11:25:27'),
(2, 1, 'M.Sc. (Computer Science) ', 'Ibadan', '2016', '2018-10-03 11:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `research_completed`
--

CREATE TABLE `research_completed` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `topic_name` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_completed`
--

INSERT INTO `research_completed` (`ID`, `lecturer_id`, `topic_name`, `date_created`) VALUES
(1, 1, 'Synthesis and characterization of novel compounds related to beta carboline\r\n', '2018-10-03 14:57:20'),
(2, 1, 'Investigation of antimicrobial activity of extracts of the root of some wild plants\r\n\r\n', '2018-10-03 14:57:46'),
(3, 1, 'Development of new analytical techniques for visible spectrophotometric determination of phenols', '2018-10-03 14:58:03'),
(4, 1, 'Writing of tertiary level book on physical chemistry', '2018-10-03 14:59:55'),
(5, 1, 'Study of the history of evolution of Pentecostalism in Edo State, Nigeria.', '2018-10-03 15:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `research_inprogress`
--

CREATE TABLE `research_inprogress` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `topic_name` varchar(200) NOT NULL,
  `importance` text,
  `current_doing` text,
  `significance` text,
  `progress_of_research` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_inprogress`
--

INSERT INTO `research_inprogress` (`ID`, `lecturer_id`, `topic_name`, `importance`, `current_doing`, `significance`, `progress_of_research`, `date_created`) VALUES
(1, 1, 'Development of an xrf method for combatting matrix interference in solid samples', 'Matrix interference remains a gross limitation to the application of xrf methods to some solid samples', 'We are currently investigating the use of some substituted carbohydrates as possible candidates for matrix dilution with good potential for matrix elimination', '', 'Laboratory studies are ongoing, since 2016, and several products have been tested', '2018-10-03 15:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `research_supervision`
--

CREATE TABLE `research_supervision` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `msc_total` int(11) NOT NULL,
  `phd_total` int(11) NOT NULL,
  `category` enum('completed','ongoing') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_supervision`
--

INSERT INTO `research_supervision` (`ID`, `lecturer_id`, `msc_total`, `phd_total`, `category`, `date_created`) VALUES
(1, 1, 12, 4, 'completed', '2018-10-03 14:07:14'),
(2, 1, 4, 2, 'ongoing', '2018-10-03 14:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `granting_bodies` varchar(200) NOT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`ID`, `lecturer_id`, `title_name`, `granting_bodies`, `start_date`, `end_date`, `date_created`) VALUES
(1, 1, 'Federal Govt of Nigeria Undergraduate Scholarship ', '', '2006', '2010', '2018-10-03 12:37:02'),
(2, 1, 'University of Ibadan Postgraduate Scholarship ', '', '2011', '2013', '2018-10-12 12:46:10'),
(3, 1, 'Bill and Melinda Gates / African Economic Research Consortium (AERC) Nairobi, Kenya Thesis Grant in 2009/2010 for the JFE Collaborative PhD programme in Economics for sub-Saharan Africa students.\r\n', '', NULL, NULL, '2018-10-12 15:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `teaching_experience`
--

CREATE TABLE `teaching_experience` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `total_person` varchar(200) NOT NULL,
  `pg_courses_qualify` varchar(200) DEFAULT NULL,
  `category` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `technical_report`
--

CREATE TABLE `technical_report` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `report_year` varchar(20) DEFAULT NULL,
  `report_title` varchar(200) NOT NULL,
  `organisation_report_submitted` varchar(250) NOT NULL,
  `total_page` varchar(100) NOT NULL,
  `country` varchar(250) NOT NULL COMMENT 'name in full',
  `contribution` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical_report`
--

INSERT INTO `technical_report` (`ID`, `lecturer_id`, `surname`, `firstname`, `middlename`, `report_year`, `report_title`, `organisation_report_submitted`, `total_page`, `country`, `contribution`, `date_created`) VALUES
(1, 1, 'Ayinde,Nworgugu,Faseyi', 'Boluwatife,Seun,Ikechuku', '', '2003', 'Causes of Prevalence of Malaria Fever in Nigeria', 'A Technical Report Submitted to the World Health Organisation', '44', 'Nigeria', '60', '2018-10-04 15:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `ID` int(11) NOT NULL,
  `title_name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`ID`, `title_name`, `status`) VALUES
(1, 'Mr.', 1),
(2, 'Mrs.', 1),
(3, 'Dr.', 1),
(4, 'Prof.', 1),
(6, 'Miss.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `university_education`
--

CREATE TABLE `university_education` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `university_name` varchar(200) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university_education`
--

INSERT INTO `university_education` (`ID`, `lecturer_id`, `university_name`, `start_date`, `end_date`, `location`, `date_created`) VALUES
(1, 1, 'University of Ibadan', '2014', '2016', 'Ibadan', '2018-10-03 11:02:24'),
(2, 1, 'University of Ibadan', '2017', '2018', 'Ibadan', '2018-10-03 11:03:29'),
(3, 1, 'Obafemi Awolowo University', '2010', '2013', 'Ile-Ife', '2018-10-12 10:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `user_table_id` int(11) NOT NULL,
  `token` text,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_logout` timestamp NULL DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `user_type`, `user_table_id`, `token`, `last_login`, `last_logout`, `date_created`, `status`) VALUES
(1, 'holynation667@gmail.com', '$2y$12$NadPCVu/4qI.K0AkrMtoKOwdT5QOSOQ/KcwbNFeXj7zH4uleEb/m6', 'admin', 1, NULL, '2018-10-01 11:32:13', NULL, '2018-10-01 11:31:57', 1),
(3, 'admin@gmail.com', '$2y$12$wCW8rd4RuILQrXXqriQJyOUyraM9Fn8a11tUIy3gHjBkKhOcYhuIG', 'admin', 2, NULL, '2018-10-06 14:59:22', NULL, '2018-10-01 11:41:55', 1),
(4, 'holynationdevelopment@gmail.com', '$2y$10$BeaItaALn6ioI3H1NtuGFuQB3.9cT2cbUSzqj/c5cqAJBUR.DwWiC', 'admin', 2, NULL, '2018-10-02 14:34:10', NULL, '2018-10-02 14:34:10', 1),
(5, '1111', '$2y$10$NhKfBoMlRTe9CGA.DdqZm.V.VMFWKRVil2HszRRpLJc707Ru.Qw6m', 'lecturer', 3, NULL, '2018-10-06 16:39:27', NULL, '2018-10-02 19:55:17', 1),
(6, 'lecturer@gmail.com', '$2y$10$CYBGWeP4ZBKmZMpKrZkkaeXPVfF10mSv/e0gzBOtNXmIhdGkFvwxO', 'lecturer', 1, NULL, '2018-10-06 20:59:14', NULL, '2018-10-06 15:01:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `ID` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `post_held` varchar(200) NOT NULL,
  `institute_name` varchar(200) NOT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `within_a_year` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`ID`, `lecturer_id`, `post_held`, `institute_name`, `start_date`, `end_date`, `within_a_year`, `date_created`) VALUES
(2, 1, ' Lecturer Grd II', 'University of Ibadan ', '2006', '2010', NULL, '2018-10-03 13:28:33'),
(3, 1, ' Lecturer Grd I', 'University of Ibadan ', '2001', '2006', NULL, '2018-10-03 13:28:52'),
(4, 1, 'Programme Manager', 'CEAR, UI', '', '', '(Jan 2012 - Aug 2012)', '2018-10-12 17:53:53'),
(5, 1, 'Principal Lecturer', 'Yaba College of Technology, Lagos', '2010', '2013', NULL, '2018-10-12 17:56:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_appointment`
--
ALTER TABLE `academic_appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `accepted_books`
--
ALTER TABLE `accepted_books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `article_appear_in_journal`
--
ALTER TABLE `article_appear_in_journal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `article_in_conference`
--
ALTER TABLE `article_in_conference`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `book_published`
--
ALTER TABLE `book_published`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chapter_in_book_published`
--
ALTER TABLE `chapter_in_book_published`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `dev_app`
--
ALTER TABLE `dev_app`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `faculty_name` (`faculty_name`);

--
-- Indexes for table `honours_distinctions`
--
ALTER TABLE `honours_distinctions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `staff_no` (`staff_no`);

--
-- Indexes for table `major_conf_attended`
--
ALTER TABLE `major_conf_attended`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paper_read`
--
ALTER TABLE `paper_read`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patents_copyright`
--
ALTER TABLE `patents_copyright`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `professional_qualifications`
--
ALTER TABLE `professional_qualifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `project_thesis_dissertation`
--
ALTER TABLE `project_thesis_dissertation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `research_completed`
--
ALTER TABLE `research_completed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `research_inprogress`
--
ALTER TABLE `research_inprogress`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `research_supervision`
--
ALTER TABLE `research_supervision`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `technical_report`
--
ALTER TABLE `technical_report`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `university_education`
--
ALTER TABLE `university_education`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_appointment`
--
ALTER TABLE `academic_appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accepted_books`
--
ALTER TABLE `accepted_books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_appear_in_journal`
--
ALTER TABLE `article_appear_in_journal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_in_conference`
--
ALTER TABLE `article_in_conference`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_published`
--
ALTER TABLE `book_published`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chapter_in_book_published`
--
ALTER TABLE `chapter_in_book_published`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dev_app`
--
ALTER TABLE `dev_app`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `editors`
--
ALTER TABLE `editors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `honours_distinctions`
--
ALTER TABLE `honours_distinctions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `major_conf_attended`
--
ALTER TABLE `major_conf_attended`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paper_read`
--
ALTER TABLE `paper_read`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patents_copyright`
--
ALTER TABLE `patents_copyright`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professional_qualifications`
--
ALTER TABLE `professional_qualifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_thesis_dissertation`
--
ALTER TABLE `project_thesis_dissertation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_completed`
--
ALTER TABLE `research_completed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `research_inprogress`
--
ALTER TABLE `research_inprogress`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_supervision`
--
ALTER TABLE `research_supervision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technical_report`
--
ALTER TABLE `technical_report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `university_education`
--
ALTER TABLE `university_education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
