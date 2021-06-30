-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 08:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcs-web-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task`, `user_id`, `created_at`) VALUES
(121, '8765', '1468', '2021-06-27 13:04:47'),
(123, '111', '1468', '2021-06-27 13:06:16'),
(124, 'awdawd', '1468', '2021-06-27 13:06:34'),
(125, 'awdwa', '1468', '2021-06-27 13:36:55'),
(126, 'awdawdawdwadad', '1468', '2021-06-27 13:36:58'),
(137, 'cadwad', '4081118177', '2021-06-27 16:06:16'),
(138, 'awdwad', '4081118177', '2021-06-27 16:06:34'),
(145, '2', '7252840000', '2021-06-29 16:24:08'),
(164, 'aedawd', '1', '2021-06-30 16:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `user_id`) VALUES
(25, 'sss@ss.lv', '$2y$10$nTmGG8R4Cd3j5wzYDx.2FeEkWUjJrl5Io.PipSXHZG.2w3Wz46dfK', '2021-06-27 17:44:35', '7252840000'),
(26, 'ssss@ss.lv', '$2y$10$y/gwgkehO5WjXDTKGrtSw..9SLwGt5zgyaADJEdCwefVzT3jkYsiO', '2021-06-27 17:46:56', '203893'),
(27, 'ssssss@ss.lv', '$2y$10$3AOJUqxun9lR3UyjtPfHZe6rZREudKXeLsPrxPftT0hwBugV731He', '2021-06-27 17:47:31', '9652'),
(28, 'sss@ss.lvss', '$2y$10$apvOtG98/coQDLkhsUVqIum8q2uuKUsxpAxpq54dIRtnGcV5wludi', '2021-06-27 17:48:53', '5724080638'),
(29, 'sss@ss.lvfffff', '$2y$10$z0jnhUrDwgWh96XX6AYN8.SIm5a5W/Iconfy7gDztrpuPmN5mFhoy', '2021-06-27 17:49:23', '3487901835'),
(30, 'sss@ss.lv234', '$2y$10$TtdNLjT2Gjbt0nPMcpT0NegtyPCukq0MTnY9fcqpwmuvDEeeelFga', '2021-06-27 17:50:16', '54446'),
(31, 'sss@ss.lv1', '$2y$10$eVWRF0JIHLsR8oom0KMnnOFS.OOun.SBEXVUUYfV0HGxzi08TbCra', '2021-06-27 17:51:07', '2860514391'),
(32, 'sss@ss.lv22', '$2y$10$euJtRe8.W0clfGUmj6CL3.eRAxH896ybgFY/w/p/ultfYkmmshWyS', '2021-06-27 17:51:33', '58828'),
(33, 'sss@ss.lv2222', '$2y$10$iYhq36m75qm4jvq19vZcvexlzs8jQUgb8OFSnSWQ1z3YCszEgpInC', '2021-06-27 17:51:38', '6150'),
(34, 'sss@ss.lv555', '$2y$10$OAhXS22.ldlfGn4hJfEHg.Yp2H.2RvN.OawQW0eAcWzzX92WQwLEC', '2021-06-27 17:53:43', '753586499'),
(35, 'sss@ss.lv352525', '$2y$10$hep6WPrsiQPyakPPNVDv7eNq1znbTeyqi22CTjIVOBscCrWpdonjK', '2021-06-27 17:55:38', '1559605'),
(36, 'aa@aa.lv', '$2y$10$6Wflr242YqRa5A9NToy8rO.hJ/6dSmRPe7UPw0SSJmT/FDkjCb/Ae', '2021-06-28 16:49:12', '4645206'),
(37, 'abc@abc.lv', '$2y$10$Qt0UBzFw4uXvm0egT8g/muZpk5awes./b0ez1ZBhFfuD9fCWjQ9CS', '2021-06-30 16:53:02', '875367790'),
(38, 'ssssss@23.lv', '$2y$10$j3IO2tjMSe1UhbhJsNohHeL4lQgl/XCbzNMBFUC6QZLTl07RvZNAe', '2021-06-30 16:58:07', '8710686'),
(39, '123@123.lv', '$2y$10$Kw2OTC8005ONDQF8XpVHtuShC7xm1zYZWPhnrdOuvY5CTVF5.1dES', '2021-06-30 16:58:16', '7028756824');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
