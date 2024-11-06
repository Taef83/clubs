
--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
    ADD PRIMARY KEY (`activity_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
    ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
    ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
    ADD PRIMARY KEY (`club_id`),
  ADD KEY `club_leader_id` (`club_leader_id`);

--
-- Indexes for table `club_leader`
--
ALTER TABLE `club_leader`
    ADD PRIMARY KEY (`club_leader_id`),
  ADD KEY `club_leader_admin_id` (`club_leader_admin_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
    ADD PRIMARY KEY (`event_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
    ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `fk_event` (`event_id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
    ADD PRIMARY KEY (`forget_password_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
    ADD PRIMARY KEY (`membership_id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
    ADD PRIMARY KEY (`registration_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `fk_activity_id` (`activity_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
    ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
    ADD PRIMARY KEY (`suggestion_id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
    MODIFY `activity_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
    MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
    MODIFY `attendance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
    MODIFY `certificate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
    MODIFY `club_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `club_leader`
--
ALTER TABLE `club_leader`
    MODIFY `club_leader_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
    MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
    MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
    MODIFY `forget_password_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
    MODIFY `membership_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
    MODIFY `registration_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
    MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
    MODIFY `suggestion_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
    ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
    ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
    ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `club`
--
ALTER TABLE `club`
    ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`club_leader_id`) REFERENCES `club_leader` (`club_leader_id`);

--
-- Constraints for table `club_leader`
--
ALTER TABLE `club_leader`
    ADD CONSTRAINT `club_leader_ibfk_1` FOREIGN KEY (`club_leader_admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
    ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
    ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
    ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
    ADD CONSTRAINT `fk_activity_id` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
    ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
