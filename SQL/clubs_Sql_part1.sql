                                                                                (-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/ --
-- Host: localhost:3306
-- Generation Time: Nov 28, 2024 at 05:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; START TRANSACTION;
SET time_zone = "+00:00";
a <xtaefalzahrani34@gmail.com> Taef Alzahrani
إلى: xtaefalzahrani34@gmail.com> Taef Alzahrani<
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */; /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */; /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */; /*!40101 SET NAMES utf8mb4 */;
--
-- Database: `clubs` --
-------------------------------------------------------- --
--
-- Table structure for table `activity` --
CREATE TABLE `activity` (
`activity_id` int UNSIGNED NOT NULL,
`event_id` int NOT NULL,
`activity_name` varchar(255) NOT NULL, `activity_description` text,
`number_participants` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `activity` --
INSERT INTO `activity` (`activity_id`, `event_id`, `activity_name`, `activity_description`, `number_participants`) VALUES
(5, 5, 'Speaker Coordination', 'Organize and communicate with speakers to ensure their sessions run smoothly.', 6),
(6, 3, 'Judging and Feedback Collection', 'Coordinate the judging process and gather feedback from the evaluators.', 20),
(15, 10, 'Volunteer Coordination', 'Ensure volunteers are assigned to assist in various tasks during the workshop.', 22),
(16, 12, 'presence', 'Waiting for your presence', 20),
(17, 9, 'Speaker/Trainer Coordination', 'Work with speakers or trainers to schedule and organize the workshops.', 10),
(18, 9, 'Material Preparation', 'Prepare any necessary materials or presentations for the workshops.', 30), (20, 4, 'Event Setup', 'Prepare the venue and the challenges for the cybersecurity competition.', 8),
(21, 4, 'presence', '', 8),
(22, 6, 'Task Coordination', 'Coordinate the flow of tasks and ensure that they run smoothly.', 3),
(23, 6, 'Challenge Setup', 'Prepare the various challenges or stations for the event.', 3),
(24, 6, 'Challenge participants', '', 25);
-- --------------------------------------------------------
--
-- Table structure for table `admin` --
CREATE TABLE `admin` (
`admin_id` int NOT NULL,
`admin_name` varchar(255) NOT NULL, `admin_email` varchar(255) NOT NULL, `admin_password` varchar(255) NOT NULL, `admin_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `admin` --
INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`) VALUES
(1, 'walaa', 'admin@club.com', '$2y$10$XwkWEjwnmrUqUvDTGJaiduuIpg2bRjigUA2bsG.iuiNuM.Zjrm/Fu', '0505632436');
-- --------------------------------------------------------
--
-- Table structure for table `attendance` --
CREATE TABLE `attendance` ( `attendance_id` int NOT NULL,

`event_id` int DEFAULT NULL,
`student_id` int DEFAULT NULL,
`attended_time` time DEFAULT NULL, `attendance_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `attendance` --
INSERT INTO `attendance` (`attendance_id`, `event_id`, `student_id`, `attended_time`, `attendance_status`) VALUES
(1, 2, 1, '18:08:00', 'absence'),
(3, 9, 4, '13:08:00', 'present'),
(5, 2, 2, NULL, 'absence'),
(6, 2, 4, '15:02:00', 'present'), (7, 1, 3, NULL, 'present'),
(8, 1, 1, NULL, 'present'),
(9, 1, 6, NULL, 'present'),
(10, 9, 1, '10:30:00', 'present'), (11, 9, 8, '10:30:00', 'present');
-- --------------------------------------------------------
--
-- Table structure for table `certificate` --
CREATE TABLE `certificate` ( `certificate_id` int NOT NULL, `student_id` int DEFAULT NULL, `event_id` int DEFAULT NULL, `issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `certificate` --
INSERT INTO `certificate` (`certificate_id`, `student_id`, `event_id`, `issue_date`) VALUES (1, 1, 2, '2024-09-14'),
(2, 2, 2, '2024-09-14'),
(7, 2, 2, '2024-11-26'),
(9, 4, 2, '2024-11-26'), (11, 3, 1, '2024-11-27'), (12, 1, 1, '2024-11-27'), (14, 6, 1, '2024-11-28'), (15, 1, 9, '2024-11-28'), (16, 8, 9, '2024-11-28'), (18, 4, 9, '2024-11-30');

-------------------------------------------------------- --
--
-- Table structure for table `club` --
CREATE TABLE `club` (
`club_id` int NOT NULL,
`club_name` varchar(255) NOT NULL, `mission_statement` text,
`club_description` text,
`location` varchar(255) DEFAULT NULL, `club_image` varchar(195) DEFAULT NULL, `admin_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `club` --
INSERT INTO `club` (`club_id`, `club_name`, `mission_statement`, `club_description`, `location`, `club_image`, `admin_id`) VALUES
Our mission is to inspire positive change through volunteerism, bringing together' ,'نادي همة التطوعي' ,1( passionate individuals to support local causes and improve the community.', 'A volunteer club is a community-based organization where members work together on projects to support local causes, help those in need, and promote social good through volunteering', 'Jubail Industrial College - female - Sudair', '/files/1.jpeg', 1),
Provide a platform for students to develop valuable skills and connections, ultimately' ,'نادي إدارة ا6عمال' ,2( preparing them for success in their future endeavors.', 'For the Business Club, let\'s make the SUCCESS Vision: The club aims to serve students studying at the Jubail Industrial College. By providing resources, events, and networking opportunities, the club seeks to enhance the educational experience and career prospects of these students. The club is committed to fostering a supportive and enriching environment for its members. Goals: include encouraging personal and professional growth, promoting collaboration and teamwork, and creating opportunities for leadership development.', 'Jubail Industrial College - female - Sudair', '/files/2.jpeg', 1),
Our mission is to inspire a passion for technology by providing opportunities for' ,'نادي علوم الحاسب' ,3( learning, skill development, and collaboration in computer science.', 'A Computer Science Club is a community where members explore the world of technology and programming, engage in hands-on projects, and develop skills in coding, algorithms, and software development. The club fosters learning, innovation, and collaboration in the field of computer science.', 'Jubail Industrial College - female - Sudair', '/files/3.jpeg', 1),
Our mission is to promote cultural awareness and social engagement by' ,'النادي الثقافي ا>جتماعي' ,4( providing opportunities for learning, and collaboration in cultural and social activities.', 'A Cultural and Social Club is a community where members engage in activities that promote cultural awareness, social responsibility, and community involvement. The club encourages, learning, and collaboration to foster a diverse and inclusive environment.', 'Jubail Industrial College 2 - Female Students - Fayhaa', '/files/4.jpeg', ,)1
Our mission is to inspire creativity and self-expression through the performing arts by' ,'نادي اGسرح والفنون' ,5( providing opportunities for learning, collaboration, and artistic development in theater and the arts.', 'A
Theater and Arts Club is a community where members explore and express their creativity through performing arts, including acting, theater production, and other artistic endeavors. The club fosters teamwork, self-expression, and an appreciation for the arts.', 'Jubail Industrial College - female - Sudair', '/files/5.jpeg', NULL),
(6, 'English Club', 'Our mission is to enhance language skills and cultural understanding by providing opportunities for learning, practice, and collaboration in English.', 'An English Language Club is a community where members practice and improve their English language skills through engaging activities, discussions, and learning sessions. The club fosters a love for the language and encourages cultural exchange and communication.\n', 'Jubail Industrial College 2 - Female Students - Fayhaa', '/files/6.jpeg', NULL),
Our mission is to inspire innovation and entrepreneurship by providing opportunities' ,'نادي ريادة ا6عمال' ,7( for learning, skill development, and collaboration in business ventures.', 'An Entrepreneurship Club is a community where members explore business ideas, develop entrepreneurial skills, and collaborate on innovative projects. The club encourages creativity, problem-solving, and leadership in the world of startups and business ventures.\n', 'Jubail Industrial College - female - Sudair', '/files/7.jpeg', NULL);
-------------------------------------------------------- --
--
-- Table structure for table `clubleader` --
CREATE TABLE `clubleader` (
`club_leader_id` int NOT NULL,
`club_id` int DEFAULT NULL,
`club_leader_name` varchar(255) NOT NULL, `club_leader_email` varchar(255) NOT NULL, `club_leader_password` varchar(255) NOT NULL, `club_leader_image_profile` varchar(255) DEFAULT NULL, `club_leader_phone` varchar(15) DEFAULT NULL, `club_leader_status` tinyint(1) NOT NULL DEFAULT '0', `is_student` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `clubleader` --
INSERT INTO `clubleader` (`club_leader_id`, `club_id`, `club_leader_name`, `club_leader_email`, `club_leader_password`, `club_leader_image_profile`, `club_leader_phone`, `club_leader_status`, `is_student`) VALUES
(1, 1, 'Volunteer Leader', 'leader1@gmail.com', '$2y$10$JUnFKzgPmFOKWTxEn0azEOFpiMPJ4D 1HnVk5yXxNcICok.mNvNeeu', '/files/10827-2024-09-20-66eca7983bc02.png', '966569598511', 1, 0), (2, 2, 'Business Leader', 'Bus_leader@gmail.com', '$2y$10$5KCqJVZYZ66kCXrXE93g6OThU9F8xt tHZIQi0L0EnsHGO99pX1otq', NULL, '966569598524', 1, 0),
(3, 5, 'Arts and Theater Leader', 'Art_leader@gmail.com', '$2y$10$ 1OdYgn8pXDu0BwTRivu23OFFuLTbP6IFRfgTU4IhqheecOiacJs.O', NULL, '0501234567', 0, 0), (4, 4, 'Cultural and Social Leader', 'social_leader@gmail.com', '$2y$10$.4KTlO1H/yEigFxatOJ2j. NisehhdcL7OTub2YUZGuSpefL4OgHwS', NULL, '0502345678', 0, 1),
(6, 6, 'English Leader', 'English_leader@gmail.com', '$2y$10$Rj/2ImhCIo2cR3ciKSDcMu
BJsFLEffRoh7ukEOJJ7KUBs5gURsJr2', NULL, '0504567890', 1, 0),
(7, 7, 'Entrepreneurship Leader', 'leader6@gmail.com', '$2y$10$UDfr7XVFJSo6RnNidDc4HOsoDKZfYC SRAFUqUAYGUjuk2OpOxixia', NULL, '0505678901', 1, 1),
(14, 3, 'CS Leader', 'CSleader@gmail.com', '$2y$10$b0EStPISLv7JS7ZfARBP5er28hnX3f vn4.WiFneMM6RYX153IuPwu', NULL, '966509897767', 1, 1),
(15, 1, 'Rehab', 'Rehab@gmail.com', '$2y$10$T2xcziAe0mrUJI7APz/nZu FPQVbirZF34WijYMYJUBk8OrlsmLJgu', NULL, '966503234234', 1, 1);
-------------------------------------------------------- --
--
-- Table structure for table `event` --
CREATE TABLE `event` (
`event_id` int NOT NULL,
`club_id` int DEFAULT NULL,
`event_name` varchar(255) DEFAULT NULL, `event_description` text,
`start_date` date DEFAULT NULL, `start_time` time DEFAULT NULL, `end_time` time DEFAULT NULL, `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `event` --
INSERT INTO `event` (`event_id`, `club_id`, `event_name`, `event_description`, `start_date`, `start_time`, `end_time`, `location`) VALUES
,)'غاليريا مول' ,NULL, NULL ,'بنروح السينما كلنا مع بعض', '2024-09-20' ,' vox cinema' ,1 ,1(
,)'كورنيش الفناتير' ,NULL, NULL ,'تطوع نشاطي', 'تنظيم فعاليه اTتحاد السعودي للرياضه', '2024-09-21' ,1 ,2(
(3, 3, 'Science Fair', 'An exhibition of science projects.', '2024-10-01', '16:12:00', '16:12:00', 'Building A'), (4, 2, 'Capture the Flag (CTF)', 'Calling all cybersecurity enthusiasts! Join us for an exciting Capture the Flag (CTF) challenge, where you\'ll put your cybersecurity skills to the test and compete for valuable prizes. Get ready to tackle a series of challenges designed to test your knowledge and expertise in various cybersecurity domains. Whether you\'re a seasoned pro or a budding cybersecurity enthusiast, this event is for everyone. Don\'t miss out on this opportunity to showcase your cybersecurity talents and connect with the community. We look forward to seeing you there!', '2024-11-01', '09:30:00', '12:50:00', 'Building B'),
(5, 3, 'Tech Meetup', 'A meetup for tech talks and demos.', '2024-12-01', '14:41:00', '15:41:00', 'Building C'),
,'التقط العلم', 'حل اكثر من 20 تحدي مختلف تعزيزا للقدرات واGهارات السيبرانية', '2024-11-14', '17:05:00', '18:50:00' ,2 ,6( 'Online'),
,)'workshops', '2024-11-27', '10:28:00', '01:29:00', 'Building C' ,'برنامج حياة طالب جامعي )فرصة تطوعية(' ,1 ,9( تقديم ورش عمل صغيره ', 'تطوع باGهاره التي يتميز بها اGتطوع Gن لديهم نفس الشغف', '2024-11-28', '16:46:00',' ,1 ,10( ,)''13:49:00', 'Tتيه وركس ذا موف
,)'بيت نادي همه', 'لmستمتاع بيوم التاسيس السعودي', '2024-11-20', '22:29:00', '21:29:00', 'الساحه الخارجية' ,1 ,11( (12, 3, 'AI in Action', 'A workshop introducing AI concepts like machine learning and neural networks,
followed by a hands-on session where attendees build their first AI model.', '2025-03-19', '09:15:00', '11:15:00', 'Jubail Industrial College-Femail-Sudair-Room 310'),
(13, 3, 'Build Your First App', 'A beginner-friendly workshop on creating a simple mobile app. Perfect for those new to programming or interested in app development.', '2025-01-17', '10:00:00', '00:51:00', 'Jubail Industrial College-Femail-Sudair-Room 50'),
(14, 3, 'coding workshop', 'A competition where participants solve programming problems with the shortest code possible. Fun, challenging, and often hilarious.', '2025-01-13', '09:05:00', '11:50:00', 'Jubail Industrial College-Femail-Sudair-Room 21'),
تنظيم حفل تخرج الطmب.', '2025-04-25', '14:00:00', '17:00:00',' ,'Volunteer for the graduation ceremony' ,1 ,15( ,)''مسرح اGدينة الجامعية - حي اGطرفية
;)'يوم التطوع', 'تفعيل يوم التطوع العاGي', '2024-11-30', '18:15:00', '21:16:00', 'سدير' ,1 ,16( -------------------------------------------------------- --
--
-- Table structure for table `feedback` --
CREATE TABLE `feedback` (
`feedback_id` int NOT NULL,
`club_id` int DEFAULT NULL,
`student_id` int DEFAULT NULL,
`rating` int DEFAULT NULL,
`dateTime` datetime DEFAULT NULL, `event_id` int DEFAULT NULL, `rating_registering` tinyint(1) DEFAULT NULL, `rating_venue` tinyint(1) DEFAULT NULL, `rating_timing` tinyint(1) DEFAULT NULL, `rating_organization` tinyint(1) DEFAULT NULL, `rating_topic` tinyint(1) DEFAULT NULL, `rating_overall` tinyint(1) DEFAULT NULL, `worked_well` text,
`improvements` text,
`future_event_suggestions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `feedback` --
INSERT INTO `feedback` (`feedback_id`, `club_id`, `student_id`, `rating`, `dateTime`, `event_id`, `rating_registering`, `rating_venue`, `rating_timing`, `rating_organization`, `rating_topic`, `rating_overall`, `worked_well`, `improvements`, `future_event_suggestions`) VALUES
(6, 3, 1, 3, '2024-12-03 18:00:00', 3, 1, 5, 4, 4, NULL, NULL, NULL, NULL, NULL),
(7, 1, 3, 4, '2024-10-06 00:00:00', 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (11, 1, 1, NULL, '2024-11-04 12:17:30', 1, 2, 2, 5, 1, 5, 2, 'good', 'good', 'good'),
(12, 1, 4, NULL, '2024-11-26 13:42:05', 9, 1, 2, 2, 2, 5, 1, 'gooooood', 'gooooood', 'gooooood'), (14, 1, 1, NULL, '2024-11-28 12:28:25', 2, 5, 5, 5, 5, 5, 5, NULL, NULL, NULL),
(15, 2, 1, NULL, '2024-11-28 12:31:20', 4, 5, 5, 3, 3, 3, 3, NULL, NULL, NULL), (20, 3, 1, NULL, '2024-11-28 18:01:52', 6, 3, 0, 5, 5, 0, 0, NULL, NULL, NULL);
-- --------------------------------------------------------
--
-- Table structure for table `forgetpassword` --
CREATE TABLE `forgetpassword` ( `forget_password_id` int NOT NULL, `email` varchar(255) NOT NULL, `code` varchar(10) NOT NULL, `is_used` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `forgetpassword` --
INSERT INTO `forgetpassword` (`forget_password_id`, `email`, `code`, `is_used`) VALUES (1, 'aster@student.com', '7090254', 0),
(2, 'aster@student.com', '7393834', 0),
(3, 'aster@student.com', '8927806', 0),
(4, 'aster@student.com', '5575717', 0), (5, 'student@student.com', '8532968', 0);
-- --------------------------------------------------------
--
-- Table structure for table `membership` --
CREATE TABLE `membership` ( `membership_id` int NOT NULL, `club_id` int DEFAULT NULL, `student_id` int DEFAULT NULL, `joined_at` date DEFAULT NULL, `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `membership` --
INSERT INTO `membership` (`membership_id`, `club_id`, `student_id`, `joined_at`, `status`) VALUES (1, 1, 1, '2024-09-20', 'active'),
(2, 1, 2, '2024-09-22', 'active'),
(3, 3, 1, '2024-09-24', 'active'),
(4, 1, 3, '2024-10-06', 'active'), (5, 2, 1, '2024-11-02', 'active'), (6, 2, 7, '2024-11-27', 'inactive'),

(7, 1, 6, '2024-11-27', 'inactive'), (8, 3, 8, '2024-11-28', 'active'), (9, 1, 8, '2024-11-28', 'active'), (10, 7, 1, '2024-11-28', 'inactive'), (11, 6, 1, '2024-11-28', 'inactive');
-- --------------------------------------------------------
--
-- Table structure for table `registration` --
CREATE TABLE `registration` ( `registration_id` int NOT NULL,
`student_id` int DEFAULT NULL,
`event_id` int DEFAULT NULL, `registration_date` date DEFAULT NULL, `activity_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `registration` --
INSERT INTO `registration` (`registration_id`, `student_id`, `event_id`, `registration_date`, `activity_id`) VALUES
(1, 1, 2, '2024-09-21', NULL),
(2, 2, 2, '2024-09-22', NULL),
(3, 3, 1, '2024-10-06', NULL), (4, 1, 1, '2024-10-06', NULL), (12, 4, 2, '2024-11-26', NULL), (13, 1, 6, '2024-11-26', NULL), (14, 1, 4, '2024-11-27', NULL), (15, 6, 1, '2024-11-27', NULL), (16, 8, 14, '2024-11-28', NULL), (17, 1, 9, '2024-11-28', 18), (18, 8, 9, '2024-11-28', 18), (19, 8, 11, '2024-11-28', NULL), (20, 1, 13, '2024-11-28', NULL);
-- --------------------------------------------------------
--
-- Table structure for table `student` --
CREATE TABLE `student` (
`student_id` int NOT NULL, `student_name` varchar(255) NOT NULL, `student_email` varchar(255) NOT NULL,

`student_password` varchar(255) NOT NULL, `image_profile` varchar(255) DEFAULT NULL, `student_phone` varchar(15) DEFAULT NULL, `student_major` varchar(255) DEFAULT NULL, `student_skills` text,
`academic_number` varchar(191) DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `student` --
INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_password`, `image_profile`, `student_phone`, `student_major`, `student_skills`, `academic_number`) VALUES
(1, 'Taif Ali', 'student@student.com', '$2y$10$fSop19d1fme88Fc5v2CsbeWZvCMGVO tMhyQUNjxVj5LsZo3kZMlF2', '/files/5217-2024-09-20-66ecaf4ff237a.png', '966569598520', 'mis', 'Time Management', '1234432129'),
(2, 'ahlam', 'ahlam@student.com', '$2y$10$pmfA/U1HsGQrUQ4Mzuduo. BpCWEPVZUP3kTtDiHXOl6r5tOCAJA1.', '/files/11065-2024-09-22-66f00327620bb.png', '966569598528', 'bis', 'Problem Solving', '1234431356'),
(3, 'Renad', 'renad@student.com', '$2y$10$SoXQQZMxR55RBSQ5LOYlmu8ynJE9uH gg4rHxJZDL7gKbm4OWOo3fG', '/files/7063-2024-10-06-6702945d3b366.jpg', '966569598555', 'bis', 'Team Collaboration', '4543543543'),
(4, 'shahad', 'aster@student.com', '$2y$10$Ra2hjxsDpws.w2fxtDooZuT8SoSpTL69SJsYz4NMyU dE9ZPkXPjI6', NULL, '0545454333', 'bus', 'Effective Communication', '1212333455'),
(5, 'taimi', 'nunyquk@mailinator.com', '$2y$10$rmLcFAKPQTBfAg2gqxELDuyiJ4. 0Yy2SRRtZ/JTg/atmDPn0StKaC', NULL, '0545454444', 'bus', 'Leadership', '884'),
(6, 'nora', 'nor@student.com', '$2y$10$Do21OxxnZGINxcqIc3sgm. NKddZCzMWmBn5UJaB8LnDKj6ItUgTDm', NULL, '0555555556', 'mis', 'Technical Proficiency', '12344321255'),
(7, 'abeer', 'abeer4@student.com', '$2y$10$XWEQ3wGbkVoFIWFAvXb1n.luXLHMof5yXKHnh/ z6GgCYUGsPesDFG', NULL, '0555555543', 'mis', 'good reader', '421200077'),
(8, 'Hayat', 'hayat@gmail.com', '$2y$10$.Ok4PWo0d.xXgtLRrNLOoue.341UezQKPUe4ClE. dVAzMki8SVZMS', NULL, '0509870000', 'mis', 'Graphic Design , Project Management, Data Analysis', '401299983');
-- --------------------------------------------------------
--
-- Table structure for table `suggestion` --
CREATE TABLE `suggestion` ( `suggestion_id` int NOT NULL, `club_id` int DEFAULT NULL, `student_id` int DEFAULT NULL, `content` text,
`sent_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `suggestion` --
INSERT INTO `suggestion` (`suggestion_id`, `club_id`, `student_id`, `content`, `sent_time`) VALUES
(1, 1, 2, 'Workshops and Training: Offer skill-building workshops in areas like leadership, public speaking, or technical expertise. ', '2024-09-22 00:00:00'),
(2, 1, 2, 'Community Service Projects: Organize initiatives like charity drives or environmental cleanups to engage students in giving back to the community.', '2024-09-22 00:00:00'),
(3, 1, 2, 'Networking Events: Host meet-and-greet sessions with industry professionals to help members build valuable connections. \n', '2024-09-22 00:00:00'),
(4, 1, 1, 'Competitions: Plan friendly contests, such as hackathons, quizzes, or sports challenges, to foster a competitive spirit. ', '2024-09-15 12:00:00'),
(5, 2, 1, 'Guest Speaker Series: Invite professionals or alumni to share insights and experiences in various fields. ', '2024-09-16 14:00:00'),
(6, 3, 2, ' Creative Activities: Encourage members to participate in art, music, or drama events to showcase their talents. \n', '2024-09-17 10:00:00'),
(7, 1, 1, 'Cultural Celebrations: Celebrate diverse cultures with food, performances, and educational sessions. ', '2024-11-02 00:00:00'),
(8, 2, 1, 'Career Development Programs: Provide resume-building workshops, mock interviews, and career guidance sessions.\n', '2024-11-26 00:00:00'),
(9, 1, 1, 'good', '2024-11-27 00:00:00'),
(10, 1, 8, 'I suggest organizing fun events for students', '2024-11-28 00:00:00');
--
-- Indexes for dumped tables --
--
-- Indexes for table `activity` --
ALTER TABLE `activity`
ADD PRIMARY KEY (`activity_id`), ADD KEY `event_id` (`event_id`);
--
-- Indexes for table `admin` --
ALTER TABLE `admin`
ADD PRIMARY KEY (`admin_id`);
--
-- Indexes for table `attendance` --
ALTER TABLE `attendance`
ADD PRIMARY KEY (`attendance_id`), ADD KEY `event_id` (`event_id`),
ADD KEY `student_id` (`student_id`);
--

-- Indexes for table `certificate` --
ALTER TABLE `certificate`
ADD PRIMARY KEY (`certificate_id`), ADD KEY `student_id` (`student_id`), ADD KEY `event_id` (`event_id`);
--
-- Indexes for table `club` --
ALTER TABLE `club`
ADD PRIMARY KEY (`club_id`),
ADD KEY `admin_IDDFKKK` (`admin_id`);
--
-- Indexes for table `clubleader` --
ALTER TABLE `clubleader`
ADD PRIMARY KEY (`club_leader_id`), ADD KEY `clubFKKKK` (`club_id`);
--
-- Indexes for table `event` --
ALTER TABLE `event`
ADD PRIMARY KEY (`event_id`), ADD KEY `club_id` (`club_id`);
--
-- Indexes for table `feedback` --
ALTER TABLE `feedback`
ADD PRIMARY KEY (`feedback_id`), ADD KEY `club_id` (`club_id`),
ADD KEY `student_id` (`student_id`), ADD KEY `fk_event` (`event_id`);
--
-- Indexes for table `forgetpassword` --
ALTER TABLE `forgetpassword`
ADD PRIMARY KEY (`forget_password_id`);
--
-- Indexes for table `membership` --
ALTER TABLE `membership`
ADD PRIMARY KEY (`membership_id`), ADD KEY `club_id` (`club_id`),
ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `registration` --
ALTER TABLE `registration`
ADD PRIMARY KEY (`registration_id`), ADD KEY `student_id` (`student_id`), ADD KEY `event_id` (`event_id`),
ADD KEY `fk_activity_id` (`activity_id`);
--
-- Indexes for table `student` --
ALTER TABLE `student`
ADD PRIMARY KEY (`student_id`);
--
-- Indexes for table `suggestion` --
ALTER TABLE `suggestion`
ADD PRIMARY KEY (`suggestion_id`), ADD KEY `club_id` (`club_id`),
ADD KEY `student_id` (`student_id`);
--
-- AUTO_INCREMENT for dumped tables --
--
-- AUTO_INCREMENT for table `activity` --
ALTER TABLE `activity`
MODIFY `activity_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `admin` --
ALTER TABLE `admin`
MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attendance` --
ALTER TABLE `attendance`
MODIFY `attendance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `certificate` --
ALTER TABLE `certificate`

MODIFY `certificate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `club` --
ALTER TABLE `club`
MODIFY `club_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clubleader` --
ALTER TABLE `clubleader`
MODIFY `club_leader_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `event` --
ALTER TABLE `event`
MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `feedback` --
ALTER TABLE `feedback`
MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `forgetpassword` --
ALTER TABLE `forgetpassword`
MODIFY `forget_password_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `membership` --
ALTER TABLE `membership`
MODIFY `membership_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `registration` --
ALTER TABLE `registration`
MODIFY `registration_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student` --
ALTER TABLE `student`
MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suggestion` --
ALTER TABLE `suggestion`
MODIFY `suggestion_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables --
--
-- Constraints for table `activity` --
ALTER TABLE `activity`
ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE;
--
-- Constraints for table `attendance` --
ALTER TABLE `attendance`
ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE,
ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
--
-- Constraints for table `certificate` --
ALTER TABLE `certificate`
ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE,
ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
--
-- Constraints for table `club` --
ALTER TABLE `club`
ADD CONSTRAINT `admin_IDDFKKK` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
--
-- Constraints for table `clubleader` --
ALTER TABLE `clubleader`
ADD CONSTRAINT `clubFKKKK` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`) ON DELETE CASCADE;
--
-- Constraints for table `event`

--
ALTER TABLE `event`
ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`) ON
DELETE CASCADE;
--
-- Constraints for table `feedback` --
ALTER TABLE `feedback`
ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE,
ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `fk_event` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`) ON DELETE CASCADE;
--
-- Constraints for table `membership` --
ALTER TABLE `membership`
ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`) ON DELETE CASCADE,
ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
--
-- Constraints for table `registration` --
ALTER TABLE `registration`
ADD CONSTRAINT `fk_activity_id` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE,
ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
--
-- Constraints for table `suggestion` --
ALTER TABLE `suggestion`
ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`) ON DELETE CASCADE,
ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */; /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */; /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;1, 1, 2, 'dsd asdasdasdas', '2024-09-22 00:00:00'),
                                                                                                (2, 1, 2, 'asdsadada', '2024-09-22 00:00:00'),
                                                                                                (3, 1, 2, NULL, '2024-09-22 00:00:00'),
                                                                                                (4, 1, 1, 'Can we have a robotics workshop?', '2024-09-15 12:00:00'),
                                                                                                (5, 2, 1, 'Can we organize an outdoor painting event?', '2024-09-16 14:00:00'),
                                                                                                (6, 3, 2, 'More coding competitions would be great.', '2024-09-17 10:00:00'),
                                                                                                (7, 1, 1, 'ert', '2024-11-02 00:00:00');
