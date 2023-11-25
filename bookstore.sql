CREATE TABLE `user` (
  `id` int PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_no` varchar(20) UNIQUE,
  `last_name` varchar(100),
  `first_name` varchar(100),
  `address` varchar(255),
  `phone_no` varchar(20) UNIQUE,
  `email` varchar(100) UNIQUE,
  `role` int,
  `is_valid` int,
  `balance` int,
  `validated_at` timestamptz,
  `created_at` timestamptz
);

CREATE TABLE `book` (
  `id` int PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000),
  `author` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `published_date` date NOT NULL,
  `page_count` int,
  `remaining_count` int,
  `created_at` timestamptz,
  `created_by` int,
  `updated_at` timestamptz,
  `updated_by` int
);

CREATE TABLE `book_user` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `book_id` int,
  `status` int,
  `created_at` timestamptz,
  `created_by` int,
  `received_at` timestamptz,
  `expire_at` timestamptz
);

CREATE TABLE `otp_code` (
  `id` int PRIMARY KEY,
  `code` varchar(255),
  `user_id` int,
  `expire_at` timestamptz,
  `created_at` timestamptz
);
