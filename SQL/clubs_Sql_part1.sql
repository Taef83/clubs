
CREATE TABLE `activity` (
                            `activity_id` int UNSIGNED NOT NULL,
                            `event_id` int NOT NULL,
                            `activity_name` varchar(255) NOT NULL,
                            `activity_description` text,
                            `number_participants` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `activity` (`activity_id`, `event_id`, `activity_name`, `activity_description`, `number_participants`) VALUES
                                                                                                                       (5, 5, 'Activity 1', 'Activities Section', 0),
                                                                                                                       (6, 3, 'Activity 1', 'Activity 1 Activity 1 Activity 1', 0),
                                                                                                                       (9, 7, 'New Activity 1', 'Activity  Activity  Activity', 2),
                                                                                                                       (10, 7, 'New  Activity 2', 'Activity  Activity  Activity', 3);



CREATE TABLE `admin` (
                         `admin_id` int NOT NULL,
                         `admin_name` varchar(255) NOT NULL,
                         `admin_email` varchar(255) NOT NULL,
                         `admin_password` varchar(255) NOT NULL,
                         `admin_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`) VALUES
    (1, 'admin', 'admin@club.com', '$2y$10$S39XUMcyeQKyFqyg9DccqeP4Aql2xoCoBhwU7RKjHeyFDkh9Afxwe', '4445456');

-- --------------------------------------------------------

CREATE TABLE `attendance` (
                              `attendance_id` int NOT NULL,
                              `event_id` int DEFAULT NULL,
                              `student_id` int DEFAULT NULL,
                              `attended_time` time DEFAULT NULL,
                              `attendance_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


INSERT INTO `attendance` (`attendance_id`, `event_id`, `student_id`, `attended_time`, `attendance_status`) VALUES
    (1, 2, 1, '18:08:00', 'absence');



CREATE TABLE `certificate` (
                               `certificate_id` int NOT NULL,
                               `student_id` int DEFAULT NULL,
                               `event_id` int DEFAULT NULL,
                               `issue_date` date DEFAULT NULL,
                               `certificate_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `certificate` (`certificate_id`, `student_id`, `event_id`, `issue_date`, `certificate_description`) VALUES
                                                                                                                    (1, 1, 2, '2024-09-14', 'asdsadsads'),
                                                                                                                    (2, 2, 2, '2024-09-14', 'asdsadsadssadsadada asdsadad');

CREATE TABLE `club` (
                        `club_id` int NOT NULL,
                        `club_name` varchar(255) NOT NULL,
                        `mission_statement` text,
                        `club_description` text,
                        `location` varchar(255) DEFAULT NULL,
                        `club_leader_id` int DEFAULT NULL,
                        `club_image` varchar(195) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



INSERT INTO `club` (`club_id`, `club_name`, `mission_statement`, `club_description`, `location`, `club_leader_id`, `club_image`) VALUES
                                                                                                                                     (1, 'نادي همة التطوعي', 'club1', 'wewrwewer', 'Makkah Saudi Arabia', 2, '/files/1.jpeg'),
                                                                                                                                     (2, 'نادي إدارة الأعمال', 'Promote science learning', 'A club focused on scientific discoveries.', 'Building A', 1, '/files/2.jpeg'),
                                                                                                                                     (3, 'نادي علوم الحاسب', 'Promote art culture', 'A club to explore artistic creativity.', 'Building B', 2, '/files/3.jpeg'),
                                                                                                                                     (4, 'النادي الثقافي الإجتماعي', 'Technology innovation', 'A club for tech enthusiasts.', 'Building C', 3, '/files/4.jpeg'),
                                                                                                                                     (5, 'نادي المسرح والفنون', 'Promote physical health', 'A club for sports activities.', 'Building D', 4, '/files/5.jpeg'),
                                                                                                                                     (6, 'English Club', 'Promote music education', 'A club for music lovers.', 'Building E', 5, '/files/6.jpeg'),
                                                                                                                                     (7, 'نادي ريادة الأعمال', 'Promote music education', 'A club for music lovers.', 'Building E', 5, '/files/7.jpeg');


CREATE TABLE `club_leader` (
                               `club_leader_id` int NOT NULL,
                               `club_leader_name` varchar(255) NOT NULL,
                               `club_leader_email` varchar(255) NOT NULL,
                               `club_leader_password` varchar(255) NOT NULL,
                               `club_leader_image_profile` varchar(255) DEFAULT NULL,
                               `club_leader_phone` varchar(15) DEFAULT NULL,
                               `admin_id` int DEFAULT NULL,
                               `is_student` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `club_leader` (`club_leader_id`, `club_leader_name`, `club_leader_email`, `club_leader_password`, `club_leader_image_profile`, `club_leader_phone`, `club_leader_admin_id`, `is_student`) VALUES
                                                                                                                                                                                                          (1, 'leader1', 'leader1@gmail.com', '$2y$10$JUnFKzgPmFOKWTxEn0azEOFpiMPJ4D1HnVk5yXxNcICok.mNvNeeu', '/files/10827-2024-09-20-66eca7983bc02.png', '966569598522', NULL, 0),
                                                                                                                                                                                                          (2, 'leader2', 'leader2@gmail.com', '$2y$10$JUnFKzgPmFOKWTxEn0azEOFpiMPJ4D1HnVk5yXxNcICok.mNvNeeu', NULL, '966569598524', NULL, 0),
                                                                                                                                                                                                          (3, 'Leader23', 'leader1@example.com', '$2y$10$dWn2dVRdrJDkTJ80ZNum..GZcmnz7ySUB9y1or7wKLBk6f0LpG9CG', NULL, '0501234567', 1, 0),
                                                                                                                                                                                                          (4, 'Leader 2', 'leader2@example.com', '$2y$10$dWn2dVRdrJDkTJ80ZNum..GZcmnz7ySUB9y1or7wKLBk6f0LpG9CG', NULL, '0502345678', 1, 0),
                                                                                                                                                                                                          (5, 'Leader 3', 'leader3@example.com', '$2y$10$dWn2dVRdrJDkTJ80ZNum..GZcmnz7ySUB9y1or7wKLBk6f0LpG9CG', NULL, '0503456789', 1, 0),
                                                                                                                                                                                                          (6, 'Leader 4', 'leader4@example.com', '$2y$10$dWn2dVRdrJDkTJ80ZNum..GZcmnz7ySUB9y1or7wKLBk6f0LpG9CG', NULL, '0504567890', 1, 0),
                                                                                                                                                                                                          (7, 'Leader 5', 'leader5@example.com', '$2y$10$dWn2dVRdrJDkTJ80ZNum..GZcmnz7ySUB9y1or7wKLBk6f0LpG9CG', NULL, '0505678901', 1, 0);

CREATE TABLE `event` (
                         `event_id` int NOT NULL,
                         `club_id` int DEFAULT NULL,
                         `event_name` varchar(255) DEFAULT NULL,
                         `event_description` text,
                         `start_date` date DEFAULT NULL,
                         `end_date` date DEFAULT NULL,
                         `start_time` time DEFAULT NULL,
                         `end_time` time DEFAULT NULL,
                         `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `event` (`event_id`, `club_id`, `event_name`, `event_description`, `start_date`, `end_date`, `start_time`, `end_time`, `location`) VALUES
                                                                                                                                                   (1, 1, 'ev1', 'ddsad', '2024-09-20', '2024-09-21', NULL, NULL, 'wedsada'),
                                                                                                                                                   (2, 1, 'event 2', 'adasddasd', '2024-09-21', '2024-10-02', NULL, NULL, 'Makkah Saudi Arabia'),
                                                                                                                                                   (3, 3, 'Science Fair', 'An exhibition of science projects.', '2024-10-01', '2024-10-02', '16:12:00', '16:12:00', 'Building A'),
                                                                                                                                                   (4, 2, 'Art Exhibition', 'Showcase of student artwork.', '2024-11-01', '2024-11-03', NULL, NULL, 'Building B'),
                                                                                                                                                   (5, 3, 'Tech Meetup', 'A meetup for tech talks and demos.', '2024-12-01', '2024-12-02', '14:41:00', '15:41:00', 'Building C'),
                                                                                                                                                   (6, 2, 'Art2 Exhibition2', 'Showcase of student artwork.', '2024-11-01', '2024-11-03', NULL, NULL, 'Building B'),
                                                                                                                                                   (7, 1, 'test', 'test  test  test  test', '2024-11-05', '2025-01-09', '15:28:00', '17:27:00', 'jubail');

CREATE TABLE `feedback` (
                            `feedback_id` int NOT NULL,
                            `club_id` int DEFAULT NULL,
                            `student_id` int DEFAULT NULL,
                            `rating` int DEFAULT NULL,
                            `comment` text,
                            `dateTime` datetime DEFAULT NULL,
                            `admin_id` int DEFAULT NULL,
                            `event_id` int DEFAULT NULL,
                            `rating_registering` tinyint(1) DEFAULT NULL,
                            `rating_venue` tinyint(1) DEFAULT NULL,
                            `rating_timing` tinyint(1) DEFAULT NULL,
                            `rating_organization` tinyint(1) DEFAULT NULL,
                            `rating_topic` tinyint(1) DEFAULT NULL,
                            `rating_overall` tinyint(1) DEFAULT NULL,
                            `worked_well` text,
                            `improvements` text,
                            `future_event_suggestions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `feedback` (`feedback_id`, `club_id`, `student_id`, `rating`, `comment`, `dateTime`, `admin_id`, `event_id`, `rating_registering`, `rating_venue`, `rating_timing`, `rating_organization`, `rating_topic`, `rating_overall`, `worked_well`, `improvements`, `future_event_suggestions`) VALUES
                                                                                                                                                                                                                                                                                                        (2, 1, 1, 4, 'asdsdzx df', '2024-09-21 12:33:42', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                                                                                                        (3, 1, 2, 2, 'sfad', '2024-09-22 00:00:00', 1, 3, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                                                                                                        (4, 1, 1, 5, 'The Science Fair was amazing!', '2024-10-03 16:00:00', 1, 4, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                                                                                                        (5, 2, 2, 4, 'The Art Exhibition was inspiring.', '2024-11-04 17:00:00', 1, 4, 2, 3, 4, 1, NULL, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                                                                                                        (6, 3, 1, 3, 'The Tech Meetup could have more speakers.', '2024-12-03 18:00:00', 1, 3, 1, 5, 4, 4, NULL, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                                                                                                        (7, 1, 3, 4, 'dfdf sfdsf dsfdsf', '2024-10-06 00:00:00', 1, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                                                                                                        (11, 1, 1, NULL, NULL, '2024-11-04 12:17:30', 1, 1, 2, 2, 5, 1, 5, 2, 'good', 'good', 'good');



CREATE TABLE `forget_password` (
                                   `forget_password_id` bigint NOT NULL,
                                   `email` varchar(191) NOT NULL,
                                   `code` varchar(255) NOT NULL,
                                   `is_used` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `forget_password` (`forget_password_id`, `email`, `code`, `is_used`) VALUES
    (1, 'admin@admin.com', '4146049', 0);



CREATE TABLE `membership` (
                              `membership_id` int NOT NULL,
                              `club_id` int DEFAULT NULL,
                              `student_id` int DEFAULT NULL,
                              `role_type` varchar(255) DEFAULT NULL,
                              `joined_at` date DEFAULT NULL,
                              `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


INSERT INTO `membership` (`membership_id`, `club_id`, `student_id`, `role_type`, `joined_at`, `status`) VALUES
                                                                                                            (1, 1, 1, 'normal', '2024-09-20', 'active'),
                                                                                                            (2, 1, 2, 'normal', '2024-09-22', 'active'),
                                                                                                            (3, 3, 1, 'normal', '2024-09-24', 'inactive'),
                                                                                                            (4, 1, 3, 'normal', '2024-10-06', 'active'),
                                                                                                            (5, 2, 1, 'normal', '2024-11-02', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
                                `registration_id` int NOT NULL,
                                `student_id` int DEFAULT NULL,
                                `event_id` int DEFAULT NULL,
                                `registration_date` date DEFAULT NULL,
                                `role_type` varchar(50) DEFAULT NULL,
                                `activity_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `student_id`, `event_id`, `registration_date`, `role_type`, `activity_id`) VALUES
                                                                                                                              (1, 1, 2, '2024-09-21', 'student', NULL),
                                                                                                                              (2, 2, 2, '2024-09-22', 'student', NULL),
                                                                                                                              (3, 3, 1, '2024-10-06', 'student', NULL),
                                                                                                                              (4, 1, 1, '2024-10-06', 'student', NULL),
                                                                                                                              (8, 1, 7, '2024-11-04', 'student', 9),
                                                                                                                              (9, 1, 7, '2024-11-04', 'student', 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
                           `student_id` int NOT NULL,
                           `student_name` varchar(255) NOT NULL,
                           `student_email` varchar(255) NOT NULL,
                           `student_password` varchar(255) NOT NULL,
                           `image_profile` varchar(255) DEFAULT NULL,
                           `student_phone` varchar(15) DEFAULT NULL,
                           `student_major` varchar(255) DEFAULT NULL,
                           `student_skills` text,
                           `student_number_id` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_password`, `image_profile`, `student_phone`, `student_major`, `student_skills`, `student_number_id`) VALUES
                                                                                                                                                                                        (1, 'Taif Ali', 'student@student.com', '$2y$10$JUnFKzgPmFOKWTxEn0azEOFpiMPJ4D1HnVk5yXxNcICok.mNvNeeu', '/files/5217-2024-09-20-66ecaf4ff237a.png', '966569598521', 'mis', 'sdfdfs dfsdfsd', '1234432123'),
                                                                                                                                                                                        (2, 'ahlam', 'ahlam@student.com', '$2y$10$pmfA/U1HsGQrUQ4Mzuduo.BpCWEPVZUP3kTtDiHXOl6r5tOCAJA1.', '/files/11065-2024-09-22-66f00327620bb.png', '966569598528', 'bis', 'sds efewdasd', '1234431356'),
                                                                                                                                                                                        (3, 'Renad', 'renad@student.com', '$2y$10$SoXQQZMxR55RBSQ5LOYlmu8ynJE9uHgg4rHxJZDL7gKbm4OWOo3fG', '/files/7063-2024-10-06-6702945d3b366.jpg', '966569598555', 'bis', 'asdsadsadasdsad', '4543543543');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
                              `suggestion_id` int NOT NULL,
                              `club_id` int DEFAULT NULL,
                              `student_id` int DEFAULT NULL,
                              `content` text,
                              `sent_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`suggestion_id`, `club_id`, `student_id`, `content`, `sent_time`) VALUES
                                                                                                (1, 1, 2, 'dsd asdasdasdas', '2024-09-22 00:00:00'),
                                                                                                (2, 1, 2, 'asdsadada', '2024-09-22 00:00:00'),
                                                                                                (3, 1, 2, NULL, '2024-09-22 00:00:00'),
                                                                                                (4, 1, 1, 'Can we have a robotics workshop?', '2024-09-15 12:00:00'),
                                                                                                (5, 2, 1, 'Can we organize an outdoor painting event?', '2024-09-16 14:00:00'),
                                                                                                (6, 3, 2, 'More coding competitions would be great.', '2024-09-17 10:00:00'),
                                                                                                (7, 1, 1, 'ert', '2024-11-02 00:00:00');
