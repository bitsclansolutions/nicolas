-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 12:36 PM
-- Server version: 10.2.44-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitsclan_nicolas`
--

-- --------------------------------------------------------

--
-- Table structure for table `carreaux`
--

CREATE TABLE `carreaux` (
  `id` int(20) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `rotate` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_corner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `format_parent` varchar(255) DEFAULT NULL,
  `ordre` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `format_parent`, `ordre`) VALUES
(1, '20x20', NULL, NULL),
(2, '10x10', NULL, NULL),
(3, 'Bordure', NULL, NULL),
(4, 'Hexagonal', NULL, NULL),
(5, 'Octogonal', NULL, NULL),
(6, 'Autres', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `cu` varchar(128) DEFAULT NULL,
  `cc` varchar(40) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elfinder_file`
--

CREATE TABLE `elfinder_file` (
  `id` int(7) UNSIGNED NOT NULL,
  `parent_id` int(7) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `content` longblob NOT NULL,
  `size` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mtime` int(10) UNSIGNED NOT NULL,
  `mime` varchar(256) NOT NULL DEFAULT 'unknown',
  `read` enum('1','0') NOT NULL DEFAULT '1',
  `write` enum('1','0') NOT NULL DEFAULT '1',
  `locked` enum('1','0') NOT NULL DEFAULT '0',
  `hidden` enum('1','0') NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_symmetric` tinyint(1) DEFAULT 1,
  `sub_category_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `is_symmetric`, `sub_category_id`) VALUES
(54, 'h_001.png', 1, 15),
(58, 'tc_002.png', 0, 11),
(59, 'tc_003.png', 0, 11),
(60, 'tc_004.png', 0, 11),
(61, 'tc_005.png', 0, 11),
(62, 'tc_006.png', 0, 11),
(63, 'tc_007.png', 0, 11),
(64, 'tc_008.png', 0, 11),
(65, 'tc_009.png', 0, 11),
(66, 'tc_010.png', 0, 11),
(67, 'tc_011.png', 0, 11),
(68, 'tc_012.png', 0, 11),
(69, 'tc_013.png', 0, 11),
(70, 'tc_014.png', 0, 11),
(76, 'h-20m003.png', 1, 15),
(83, 'jgjhgjh.png', 1, 15),
(86, 'h-20m003-2.png', 1, 15),
(87, 'm1540.png', 1, 21),
(88, 'm0011.png', 0, 21),
(89, 'm1550.png', 1, 21),
(90, 'm0012.png', 0, 21),
(92, 'm156.png', 1, 21),
(93, 'm0015.png', 0, 21),
(94, 'm1560.png', 0, 21),
(95, 'm0017.png', 0, 21),
(96, 'm1590.png', 1, 21),
(97, 'm0037.png', 1, 21),
(98, 'm0844.png', 0, 21),
(99, 'm0160.png', 0, 21),
(100, 'm0063.png', 1, 21),
(101, 'm0170.png', 1, 21),
(102, 'm0070.png', 1, 21),
(103, 'm0196.png', 1, 21),
(104, 'm0074.png', 1, 21),
(105, 'm2083.png', 0, 21),
(106, 'm0077.png', 1, 21),
(107, 'm0240.png', 1, 21),
(108, 'm0087.png', 1, 21),
(109, 'm0241.png', 0, 21),
(110, 'm0100.png', 1, 21),
(111, 'm0270.png', 0, 21),
(112, 'm1000.png', 0, 21),
(113, 'm3011.png', 0, 21),
(114, 'm1010.png', 0, 21),
(115, 'm3021.png', 1, 21),
(116, 'm1020.png', 1, 21),
(117, 'm3072.png', 1, 21),
(118, 'm1030.png', 0, 21),
(119, 'm3080.png', 1, 21),
(120, 'm0106.png', 1, 21),
(121, 'm3081.png', 1, 21),
(122, 'm1070.png', 0, 21),
(123, 'm3083.png', 1, 21),
(124, 'm1080.png', 0, 21),
(125, 'm3084.png', 1, 21),
(126, 'm1090.png', 1, 21),
(127, 'm1160.png', 1, 21),
(128, 'm3280.png', 1, 21),
(129, 'm1180.png', 0, 21),
(130, '3430.png', 0, 21),
(131, 'm1200.png', 0, 21),
(132, 'm0360.png', 0, 21),
(133, 'm1210.png', 0, 21),
(134, 'm0370.png', 0, 21),
(135, 'm1214.png', 0, 21),
(136, 'm0390.png', 1, 21),
(137, 'm3110.png', 1, 21),
(138, 'm0110.png', 1, 21),
(139, 'm0312.png', 0, 21),
(140, 'm1100.png', 1, 21),
(141, 'm0316.png', 0, 21),
(142, 'm0111.png', 1, 21),
(143, 'm0322.png', 0, 21),
(144, 'm1110.png', 1, 21),
(145, 'm3220.png', 0, 21),
(146, 'm1120.png', 1, 21),
(147, 'm3230.png', 1, 21),
(148, 'm1150.png', 1, 21),
(149, 'm3231.png', 1, 21),
(150, 'm1220.png', 0, 21),
(151, 'm0462.png', 1, 21),
(152, 'm1225.png', 0, 21),
(153, 'm0463.png', 1, 21),
(154, 'm1230.png', 1, 21),
(155, 'm0476.png', 1, 21),
(156, 'm0124.png', 1, 21),
(157, 'm1552.png', 1, 10),
(158, 'm0017.png', 0, 10),
(159, 'm1554.png', 1, 10),
(160, 'm0031.png', 1, 10),
(161, 'm1555.png', 1, 10),
(162, 'm0038.png', 1, 10),
(163, 'm1562.png', 0, 10),
(164, 'm0051.png', 1, 10),
(165, 'm1592.png', 1, 10),
(166, 'm0075.png', 1, 10),
(167, 'm0081.png', 1, 10),
(168, 'm0086.png', 1, 10),
(169, 'm1702.png', 0, 10),
(170, 'm0088.png', 1, 10),
(171, 'm1751.png', 0, 10),
(172, 'm0088sp.png', 1, 10),
(173, 'm1760.png', 0, 10),
(174, 'm0094.png', 0, 10),
(175, 'm1762.png', 0, 10),
(176, 'm1002.png', 0, 10),
(177, 'm1780.png', 0, 10),
(178, 'm1012.png', 0, 10),
(179, 'm1032.png', 0, 10),
(180, 'm1792.png', 0, 10),
(181, 'm1052.png', 0, 10),
(182, 'm1800.png', 0, 10),
(183, 'm1072.png', 0, 10),
(184, 'm1802.png', 0, 10),
(185, 'm1082.png', 0, 10),
(186, 'm1810.png', 0, 10),
(187, 'm1092.png', 1, 10),
(188, 'm1811.png', 0, 10),
(189, 'm1095.png', 1, 10),
(190, 'm1823.png', 1, 10),
(191, 'm1830.png', 1, 10),
(192, 'm1102.png', 1, 10),
(193, 'm1840.png', 1, 10),
(194, 'm1112.png', 1, 10),
(195, 'm1841.png', 1, 10),
(196, 'm1122.png', 1, 10),
(197, 'm1860.png', 1, 10),
(198, 'm1152.png', 1, 10),
(199, 'm1870.png', 0, 10),
(200, 'm1162.png', 1, 10),
(201, 'm1880.png', 0, 10),
(202, 'm1182.png', 1, 10),
(203, 'm1890.png', 0, 10),
(204, 'm1202.png', 0, 10),
(205, 'm1900.png', 0, 10),
(206, 'm1212.png', 0, 10),
(207, 'm1901.png', 0, 10),
(208, 'm1222.png', 0, 10),
(209, 'm1911.png', 0, 10),
(210, 'm1232.png', 1, 10),
(211, 'm1920.png', 1, 10),
(212, 'm1940.png', 0, 10),
(213, 'm1252.png', 1, 10),
(214, 'm1262.png', 0, 10),
(215, 'm1960.png', 0, 10),
(216, 'm1272.png', 1, 10),
(217, 'm1282.png', 1, 10),
(218, 'm1980.png', 1, 10),
(219, 'm1292.png', 1, 10),
(220, 'm1295.png', 1, 10),
(221, 'm0073.png', 1, 11),
(222, 'm0083.png', 1, 11),
(223, 'm0084.png', 1, 11),
(224, 'm1001.png', 0, 11),
(225, 'm1722.png', 0, 11),
(226, 'm1011.png', 0, 11),
(227, 'm0172.png', 1, 11),
(228, 'm1021.png', 1, 11),
(229, 'm1741.png', 0, 11),
(230, 'm1031.png', 0, 11),
(231, 'm1752.png', 0, 11),
(232, 'm1051.png', 0, 11),
(233, 'm0190.png', 1, 11),
(234, 'm1071.png', 0, 11),
(235, 'm1910.png', 0, 11),
(236, 'm1081.png', 0, 11),
(237, 'm2010.png', 0, 11),
(238, 'm1091.png', 1, 11),
(239, 'm0210.png', 1, 11),
(240, 'm1101.png', 1, 11),
(241, 'm0271.png', 0, 11),
(242, 'm1111.png', 1, 11),
(243, 'm3010.png', 0, 11),
(244, 'm1121.png', 1, 11),
(245, 'm3060.png', 0, 11),
(246, 'm1151.png', 1, 11),
(247, 'm3073.png', 1, 11),
(248, 'm1161.png', 1, 11),
(249, 'm0310.png', 0, 11),
(250, 'm1166.png', 1, 11),
(251, 'm0311.png', 0, 11),
(252, 'm1181.png', 0, 11),
(253, 'm3120.png', 1, 11),
(254, 'm1201.png', 0, 11),
(255, 'm0314.png', 0, 11),
(256, 'm1211.png', 0, 11),
(257, 'm3241.png', 1, 11),
(258, 'm1221.png', 0, 11),
(259, 'm3390.png', 0, 11),
(260, 'm1231.png', 1, 11),
(261, 'm3400.png', 1, 11),
(262, 'm1241.png', 0, 11),
(263, 'm3410.png', 1, 11),
(264, 'm1251.png', 1, 11),
(265, 'm0361.png', 0, 11),
(266, 'm1261.png', 0, 11),
(267, 'm0371.png', 0, 11),
(268, 'm1271.png', 1, 11),
(269, 'm0422.png', 1, 11),
(270, 'm1281.png', 1, 11),
(271, 'm1291.png', 1, 11),
(272, 'm0510.png', 0, 11),
(273, 'm1301.png', 1, 11),
(274, 'm0640.png', 1, 11),
(275, 'm1311.png', 0, 11),
(276, 'm0650.png', 0, 11),
(277, 'm1321.png', 0, 11),
(278, 'm0653.png', 0, 11),
(279, 'm1331.png', 0, 11),
(280, 'm0671.png', 0, 11),
(281, 'm1340.png', 1, 11),
(282, 'm1351.png', 0, 11),
(283, 'm0750.png', 0, 11),
(284, 'm0751.png', 0, 11),
(285, 'm1361.png', 0, 11),
(286, 'm0771.png', 0, 11),
(287, 'm0791.png', 1, 11),
(288, 'm1371.png', 1, 11),
(289, 'm0841.png', 0, 11),
(290, 'm0901.png', 0, 11),
(291, 'm1381.png', 0, 11),
(292, 'm1401.png', 1, 11),
(293, 'm1411.png', 0, 11),
(294, 'm1501.png', 0, 11),
(295, 'm1521.png', 1, 11),
(296, 'm1531.png', 1, 11),
(297, 'm1541.png', 1, 11),
(298, 'm1551.png', 1, 11),
(299, 'm1561.png', 0, 11),
(300, 'm1761.png', 0, 11),
(301, 'm1790.png', 0, 11),
(302, 'm1791.png', 0, 11),
(303, 'm0180.png', 1, 11),
(304, 'm1801.png', 0, 11),
(305, 'm1812.png', 0, 11),
(306, 'm1822.png', 1, 11),
(307, 'm1825.png', 1, 11),
(308, 'm1831.png', 1, 11),
(309, 'm1832.png', 1, 11),
(310, 'm0793.png', 1, 19),
(311, 'm0082.png', 1, 19),
(312, 'm0843.png', 0, 19),
(313, 'm0085.png', 1, 19),
(314, 'b0011.png', 1, 14),
(315, 'b0012.png', 1, 14),
(316, 'b0013.png', 1, 14),
(317, 'b0020.png', 1, 14),
(318, 'b0022.png', 1, 14),
(319, 'b0024.png', 1, 14),
(320, 'b0031.png', 1, 14),
(321, 'b0033.png', 1, 14),
(322, 'b0041.png', 1, 14),
(323, 'b0046.png', 1, 14),
(324, 'b0056.png', 1, 14),
(325, 'b0060.png', 1, 14),
(326, 'b0061.png', 1, 14),
(327, 'b0063.png', 1, 14),
(328, 'b0070.png', 1, 14),
(329, 'b0075.png', 1, 14),
(330, 'b0077.png', 1, 14),
(331, 'b0083.png', 1, 14),
(332, 'b0086.png', 1, 14),
(333, 'b0090.png', 1, 14),
(334, 'b0094.png', 1, 14),
(335, 'b0095.png', 1, 14),
(336, 'b0100.png', 1, 14),
(337, 'b0101.png', 1, 14),
(338, 'b0102.png', 1, 14),
(339, 'b0103.png', 1, 14),
(340, 'b0108.png', 1, 14),
(341, 'b0111.png', 1, 14),
(342, 'b0112.png', 1, 14),
(343, 'b0134.png', 1, 14),
(344, 'b0135.png', 1, 14),
(345, 'b0136.png', 1, 14),
(346, 'b0141.png', 1, 14),
(347, 'b0142.png', 1, 14),
(348, 'b0150.png', 1, 14),
(349, 'b0153.png', 1, 14),
(350, 'b0161.png', 1, 14),
(351, 'b0165.png', 1, 14),
(352, 'b0170.png', 1, 14),
(353, 'b0171.png', 1, 14),
(354, 'b0172.png', 1, 14),
(355, 'b0173.png', 1, 14),
(356, 'b0174.png', 1, 14),
(357, 'b0176.png', 1, 14),
(358, 'b0177.png', 1, 14),
(359, 'b0178.png', 1, 14),
(360, 'b0201.png', 1, 14),
(361, 'b0202.png', 1, 14),
(362, 'b0210.png', 1, 14),
(363, 'b0220.png', 1, 14),
(364, 'b0221.png', 1, 14),
(365, 'b0320.png', 1, 14),
(366, 'b0321.png', 1, 14),
(367, 'b0322.png', 1, 14),
(368, 'b0330.png', 1, 14),
(369, 'b0331.png', 1, 14),
(370, 'b0401.png', 1, 14),
(371, 'b0404.png', 1, 14),
(372, 'b0405.png', 1, 14),
(373, 'b0410.png', 1, 14),
(374, 'b0411.png', 1, 14),
(375, 'b0420.png', 1, 14),
(376, 'b0422.png', 1, 14),
(377, 'b0462.png', 1, 14),
(378, 'b0463.png', 1, 14),
(379, 'b0464.png', 1, 14),
(380, 'b0480.png', 1, 14),
(381, 'b0510.png', 1, 14),
(382, 'b0511.png', 1, 14),
(383, 'b0512.png', 1, 14),
(385, '0513.png', 1, 14),
(386, 'b0530.png', 1, 14),
(387, 'b0531.png', 1, 14),
(388, 'b0532.png', 1, 14),
(389, 'b0533.png', 1, 14),
(390, 'b0540.png', 1, 14),
(391, 'b0541.png', 1, 14),
(392, 'b0542.png', 1, 14),
(393, 'b0550.png', 1, 14),
(394, 'b0560.png', 1, 14),
(395, 'b0600.png', 1, 14),
(396, 'b0601.png', 1, 14),
(397, 'b1290.png', 1, 14),
(398, 'b1291.png', 1, 14),
(399, 'b1292.png', 1, 14),
(400, 'b1293.png', 1, 14),
(401, 'b1295.png', 1, 14),
(402, 'b1300.png', 1, 14),
(403, 'b1310.png', 1, 14),
(404, 'm0530.png', 0, 24),
(405, 'm0540.png', 0, 24),
(406, 'm0550.png', 0, 24),
(407, 'm0560.png', 0, 24),
(408, 'm0560.png', 0, 25),
(409, 'm0580.png', 1, 25),
(410, 'm1950.png', 0, 25),
(412, 'm3250.png', 1, 25),
(413, 'm3260.png', 0, 25),
(415, 'm3140.png', 0, 25),
(416, 'm0903.png', 0, 19),
(417, 'm1003.png', 0, 19),
(418, 'm1013.png', 0, 19),
(419, 'm1023.png', 0, 19),
(420, 'm1053.png', 0, 19),
(421, 'm1073.png', 0, 19),
(422, 'm1083.png', 0, 19),
(423, 'm1093.png', 1, 19),
(424, 'm1103.png', 1, 19),
(425, 'm1123.png', 1, 19),
(426, 'm1153.png', 1, 19),
(427, 'm1163.png', 1, 19),
(428, 'm1183.png', 0, 19),
(429, 'm1203.png', 0, 19),
(430, 'm1213.png', 0, 19),
(431, 'm1233.png', 1, 19),
(432, 'm1243.png', 0, 19),
(433, 'm1263.png', 0, 19),
(434, 'm1273.png', 1, 19),
(435, 'm1283.png', 1, 19),
(436, 'm1293.png', 1, 19),
(437, 'm1303.png', 1, 19),
(438, 'm1313.png', 0, 19),
(439, 'm1333.png', 0, 19),
(440, 'm1353.png', 0, 19),
(441, 'm1373.png', 1, 19),
(442, 'm1383.png', 0, 19),
(443, 'm1403.png', 1, 19),
(444, 'm1413.png', 0, 19),
(445, 'm1533.png', 1, 19),
(446, 'm1543.png', 1, 19),
(447, 'm1553.png', 1, 19),
(448, 'm1563.png', 0, 19),
(449, 'm1593.png', 1, 19),
(450, 'm1703.png', 0, 19),
(451, 'm1704.png', 0, 19),
(452, 'm2082.png', 0, 19),
(453, 'm0273.png', 0, 19),
(454, 'm0321.png', 0, 19),
(455, 'm3330.png', 1, 19),
(456, 'm3350.png', 0, 19),
(457, 'm0693.png', 0, 19),
(458, 'm0723.png', 0, 19),
(459, 'm0733.png', 0, 19),
(460, 'm0773.png', 0, 19),
(461, 'm0060.png', 1, 20),
(462, 'm1374.png', 1, 20),
(463, 'm0062.png', 1, 20),
(464, 'm0720.png', 1, 20),
(465, 'm0072.png', 1, 20),
(466, 'm1742.png', 0, 20),
(467, 'm0076.png', 1, 20),
(468, 'm0080.png', 1, 20),
(469, 'm0092.png', 0, 20),
(470, 'm0093.png', 0, 20),
(471, 'm0103.png', 1, 20),
(472, 'm1084.png', 0, 20),
(473, 'm1085.png', 0, 20),
(474, 'm1114.png', 1, 20),
(475, 'm1115.png', 1, 20),
(476, 'm1116.png', 1, 20),
(477, 'm0112.png', 1, 20),
(478, 'm1164.png', 1, 20),
(479, 'm1165.png', 1, 20),
(480, 'm0120.png', 1, 20),
(481, 'm0121.png', 1, 20),
(482, 'm1215.png', 0, 20),
(483, 'm0122.png', 1, 20),
(484, 'm0140.png', 1, 20),
(485, 'm0142.png', 1, 20),
(486, 'm1772.png', 1, 20),
(487, 'm1930.png', 0, 20),
(488, 'm0195.png', 1, 20),
(489, 'm0222.png', 0, 20),
(490, 'm0223.png', 0, 20),
(491, 'm0224.png', 0, 20),
(492, 'm0252.png', 0, 20),
(493, 'm0253.png', 0, 20),
(494, 'm3020.png', 1, 20),
(495, 'm3022.png', 1, 20),
(496, 'm3070.png', 1, 20),
(497, 'm3071.png', 1, 20),
(498, 'm0313.png', 0, 20),
(499, 'm3130.png', 0, 20),
(500, 'm3150.png', 1, 20),
(501, 'm3180.png', 0, 20),
(502, 'm3190.png', 0, 20),
(503, 'm0320.png', 0, 20),
(504, 'm3200.png', 0, 20),
(505, 'm3210.png', 0, 20),
(506, 'm3240.png', 1, 20),
(507, 'm3241.png', 1, 20),
(508, 'm3270.png', 0, 20),
(509, 'm3300.png', 0, 20),
(510, 'm3370.png', 0, 20),
(511, 'm361.png', 0, 20),
(512, 'm0401.png', 0, 20),
(513, 'm0411.png', 1, 20),
(514, 'm0420.png', 1, 20),
(515, 'm0653.png', 0, 20),
(516, 'm0501.png', 0, 20),
(517, 'm0651.png', 0, 20),
(518, 'm10m001.png', 1, 12),
(519, 'm10m002.png', 1, 12),
(520, 'm10m003.png', 1, 12),
(521, 'm10m004.png', 1, 12),
(522, 'm10m010.png', 1, 12),
(523, 'm10m011.png', 1, 12),
(524, 'm10m012.png', 1, 12),
(525, 'm10m014.png', 1, 12),
(526, 'm10m020.png', 1, 12),
(527, 'm10m021.png', 1, 12),
(528, 'm10m022.png', 1, 12),
(529, 'm10m030.png', 1, 12),
(530, 'm10m031.png', 1, 12),
(531, 'm10m032.png', 1, 12),
(532, 'm10m033.png', 1, 12),
(533, 'm10m040.png', 1, 12),
(534, 'm10m041.png', 1, 12),
(535, 'm10m042.png', 1, 12),
(536, 'm10m043.png', 1, 12),
(537, 'm10m050.png', 1, 12),
(538, 'm10m051.png', 1, 12),
(539, 'm10m053.png', 1, 12),
(540, 'm10m060.png', 1, 12),
(541, 'm10m061.png', 1, 12),
(542, 'm10m062.png', 1, 12),
(543, 'm10m063.png', 1, 12),
(544, 'm10m070.png', 1, 12),
(545, 'm10m071.png', 1, 12),
(546, 'm10m072.png', 1, 12),
(547, 'm10m073.png', 1, 12),
(548, 'm10m081.png', 1, 12),
(549, 'm10m082.png', 1, 12),
(550, 'm10m083.png', 1, 12),
(551, 'm10m084.png', 1, 12),
(552, 'm600_octo.png', 1, 16),
(553, 'm601_octo.png', 1, 16),
(554, 'm602_octo.png', 1, 16),
(555, 'm603_octo.png', 1, 16),
(556, 'm604_octo.png', 1, 16),
(557, 'm0037.png', 1, 22),
(558, 'm0076.png', 1, 22),
(559, 'm0082.png', 1, 22),
(560, 'm0085.png', 1, 22),
(561, 'm1252.png', 1, 22),
(562, 'm0171.png', 1, 22),
(564, 'm3180.png', 0, 22),
(565, 'm1930.png', 0, 22),
(566, 'm3190.png', 0, 22),
(567, 'm0320.png', 0, 22),
(568, 'm0321.png', 0, 22),
(569, 'm3210.png', 0, 22),
(570, 'm3300.png', 0, 22),
(571, 'm3440.png', 1, 22),
(572, 'm0360.png', 0, 22),
(573, 'm0371.png', 0, 22),
(574, 'm0390.png', 0, 22),
(575, 'm0401.png', 0, 22),
(576, 'm0410.png', 1, 22),
(577, 'm0780.png', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `category_id`) VALUES
(10, 'Teintes froides', 1),
(11, 'Teintes chaudes', 1),
(12, 'Carreaux muraux', 2),
(14, 'Nos bordures', 3),
(15, 'hex', 4),
(16, 'Cabochons', 5),
(19, 'Pastels', 1),
(20, 'ColorÃ©s', 1),
(21, 'Noir et Blancs', 1),
(22, 'Carreaux anciens', 1),
(23, 'Unis', 1),
(24, '14x14', 6),
(25, '15x15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `uUsername` varchar(128) NOT NULL,
  `uPassword` varchar(40) NOT NULL,
  `uSalt` varchar(128) NOT NULL,
  `uActivity` datetime NOT NULL,
  `uCreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `uUsername`, `uPassword`, `uSalt`, `uActivity`, `uCreated`) VALUES
(1, 'admin', 'password', 'yes', '2022-07-05 16:00:59', '2022-07-05 16:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `users_information`
--

CREATE TABLE `users_information` (
  `userId` int(11) NOT NULL,
  `infoKey` varchar(128) NOT NULL,
  `InfoValue` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carreaux`
--
ALTER TABLE `carreaux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elfinder_file`
--
ALTER TABLE `elfinder_file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_name` (`parent_id`,`name`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `uUsername` (`uUsername`);

--
-- Indexes for table `users_information`
--
ALTER TABLE `users_information`
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carreaux`
--
ALTER TABLE `carreaux`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elfinder_file`
--
ALTER TABLE `elfinder_file`
  MODIFY `id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
