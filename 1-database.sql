CREATE TABLE `guestbook` (
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`post_id`,`email`),
  ADD KEY `datetime` (`datetime`);