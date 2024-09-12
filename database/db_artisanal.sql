-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 01:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_artisanal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `ad_name` varchar(40) NOT NULL,
  `ad_email` varchar(40) NOT NULL,
  `ad_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `ad_name`, `ad_email`, `ad_password`) VALUES
(1, 'Sinju Mathews', 'sinjumathews0005@gmail.com', 'sinjuadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `order_id`, `cart_quantity`, `cart_status`) VALUES
(211, 1, 0, 1, 0),
(212, 1, 48, 2, 4),
(213, 6, 48, 1, 4),
(215, 14, 48, 1, 4),
(216, 8, 0, 1, 0),
(218, 8, 49, 1, 1),
(219, 16, 0, 1, 0),
(220, 18, 50, 1, 4),
(221, 16, 50, 2, 1),
(222, 10, 0, 1, 0),
(223, 10, 51, 1, 4),
(224, 11, 0, 1, 0),
(225, 11, 52, 2, 4),
(226, 14, 52, 1, 3),
(227, 7, 52, 1, 4),
(228, 9, 0, 1, 0),
(229, 9, 53, 1, 1),
(230, 1, 54, 1, 4),
(231, 5, 54, 1, 4),
(232, 10, 55, 1, 4),
(233, 6, 0, 1, 0),
(234, 15, 56, 1, 3),
(235, 8, 56, 1, 1),
(237, 16, 57, 1, 1),
(238, 11, 58, 2, 3),
(239, 10, 58, 1, 1),
(240, 17, 0, 1, 0),
(241, 17, 59, 1, 1),
(242, 1, 59, 1, 4),
(243, 3, 0, 1, 0),
(244, 3, 60, 1, 4),
(245, 18, 0, 1, 0),
(246, 18, 61, 1, 1),
(247, 18, 62, 1, 1),
(248, 12, 0, 1, 0),
(249, 12, 63, 1, 3),
(250, 8, 64, 1, 0),
(253, 11, 67, 1, 1),
(254, 8, 68, 1, 1),
(255, 10, 69, 1, 0),
(256, 6, 69, 1, 0),
(257, 18, 69, 1, 0),
(258, 11, 70, 1, 1),
(259, 17, 71, 1, 1),
(260, 18, 71, 3, 1),
(261, 6, 72, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'BAGS'),
(2, 'POUCH'),
(3, 'WALLET'),
(5, 'HOME DECOR'),
(6, 'TOYS & PLUSHIES'),
(7, 'CLOTHINGS'),
(8, 'ACCESSORIES'),
(13, 'DINNING WARES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(40) NOT NULL,
  `pincode` varchar(8) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `pincode`, `district_id`) VALUES
(3, ' ALAPPUZHA ', '688001', 1),
(4, ' AMBALAPPUZHA  ', '688561', 1),
(5, ' AMBATHURUTHY  ', '688529', 1),
(6, ' AROOR', '688534', 1),
(7, ' ARYAD', '688007', 1),
(8, ' CHAMPACKULAM', '688505', 1),
(9, ' CHENGANNUR ', '689121', 1),
(10, ' CHERIYANAD  ', '689121 ', 1),
(11, ' CHERTHALA ', '688524', 1),
(12, ' CHERTHALA  SOUTH', '688539', 1),
(13, 'CHIYARAM', '688552', 1),
(14, 'EDATHUA', '689573', 1),
(15, 'ERAMALLUR ', '688537', 1),
(16, 'HARIPAD  ', '690514', 1),
(17, 'KAINAKARY', '688501', 1),
(18, 'KALAVOOR', '688522', 1),
(19, ' KANJIKUZHI', '688532', 1),
(20, ' KARUVATTA', '688001', 1),
(21, ' KATTANAM', '690503', 1),
(22, ' KAVANATINKARA', '688552', 1),
(23, ' KAYAMKULAM', '690502', 1),
(24, ' KOMALY', '688538', 1),
(25, ' MANNAR', '689622', 1),
(26, ' MARIKKARAKOM', '688537', 1),
(27, ' MAVELIKKARA', '690101', 1),
(31, ' MUHAMMA', '688525', 1),
(32, ' MUHAMMADABAD', '688001', 1),
(33, ' NEDUMUDI', ' 690549', 1),
(34, ' PALLICHERRY', ' 688505', 1),
(35, 'PANAVALLY', ' 688521', 1),
(36, ' PATTANAKKAD', ' 688531', 1),
(37, ' PALLIPPAD', '690523', 1),
(38, ' PATHIYOOR', ' 690529', 1),
(39, ' PULINCUNNOO', ' 688504', 1),
(40, ' PERUNNA', ' 689108', 1),
(41, ' RAMANKARY', ' 688547', 1),
(42, ' THAKAZHI', ' 688566', 1),
(43, ' THAKOTTUKONAM', ' 688526', 1),
(44, ' THIRUMALA', ' 688004', 1),
(45, ' THIRUVALLA', ' 689101', 1),
(46, ' VAYALAR', ' 688536', 1),
(47, ' ALANGAD', ' 683511', 2),
(48, ' ALUVA', ' 683101', 2),
(49, ' ANGAMALY', '683572', 2),
(50, ' AROOR ', ' 688534', 2),
(51, ' CHERAI', '683514', 2),
(52, ' CHERTHALA', ' 688524', 2),
(53, ' CHOTTANIKKARA', ' 682312', 2),
(54, ' EDAKOCHI', ' 682010', 2),
(55, ' EDAPPALLY', ' 682024', 2),
(56, ' ELAMKUNNAPUZHA', ' 682503', 2),
(57, ' ELOOR', '683501', 2),
(58, ' KADAMAKKUDY', ' 682311', 2),
(59, 'KALAMASSERY', '683104', 2),
(60, 'KALOOR', '682017', 2),
(61, 'KANAYANNUR', '683518', 2),
(62, 'KANDANAD', '683541', 2),
(63, 'KARUKUTTY', '683576', 2),
(64, 'KIZHAKKAMBALAM', '683562', 2),
(65, 'KOCHI', '682001', 2),
(66, 'KODAMTHURUTHU', '682312', 2),
(67, 'KOLENCHERY', '682311', 2),
(68, 'KOOTHATTUKULAM', '686662', 2),
(69, 'KOTHAMANGALAM', '686691', 2),
(70, ' KOTTUVALLEY', '683104', 2),
(71, 'KUMBALAM', '682506', 2),
(72, 'KURUPPAMPADY', ' 683545', 2),
(73, 'MARADU', '682304', 2),
(74, 'MOOKKANNOOR', '683577', 2),
(75, 'MULANTHURUTHY', '682314', 2),
(76, 'MUNAMBAM', '683515', 2),
(77, ' MUVATTUPUZHA', '686661', 2),
(78, 'NEDUMBASSERY', '683572', 2),
(79, 'NELLIKUZHI', '686691', 2),
(80, 'NORTH PARAVUR', '683513', 2),
(81, 'PALARIVATTOM', '682025', 2),
(82, 'PALLURUTHY', '682006', 2),
(83, 'PANANGAD', '682506', 2),
(84, 'PARAVUR', '683513', 2),
(85, 'PERUMBAVOOR', '683542', 2),
(86, 'PIRAVOM', '686664', 2),
(87, 'POOTHOTTA', '686662', 2),
(88, 'PUTHENCRUZ', '682308', 2),
(89, 'THIRUVAMKULAM', '682305', 2),
(90, 'THIRUMARADY', '686651', 2),
(91, 'THIRIPPUNITHURA', '682301', 2),
(92, 'UDAYAMPEROOR', '682307', 2),
(93, 'VARAPPUZHA', '683517', 2),
(94, 'VAZHAKKALA', '682030', 2),
(95, 'VENNALA', '682028', 2),
(96, 'VYPIN', '682508', 2),
(97, 'WILLINGDON ISLAND', '682003', 2),
(106, ' IDUKKI', '685602', 3),
(107, ' THODUPUZHA', '685584', 3),
(108, ' MUNNAR', '685612', 3),
(109, ' KUMILY', '685509', 3),
(110, ' ADIMALY', '685561', 3),
(111, ' RAJAKUMARI', '685619', 3),
(112, ' KATTAPPANA', '685508', 3),
(113, ' NEDUMKANDAM', '685553', 3),
(114, ' VAGAMON', '685503', 3),
(115, ' PEERUMEDU', '685531', 3),
(116, ' ANAKKARA', '685512', 3),
(117, ' RAMAKKALMEDU', '685552', 3),
(118, ' CHINNAR', '685612', 3),
(119, ' THADIYOOR', '685591', 3),
(120, ' PURAPUZHA', '685591', 3),
(121, ' KALVARI MOUNT', '685614', 3),
(122, ' ELAPPARA', '685501', 3),
(123, ' KARIMANNOOR', '685584', 3),
(124, ' MUNDIYAKAYAM', '685587', 3),
(125, ' PAINAVU', '685603', 3),
(126, ' ERATTUPETTA', '685584', 3),
(127, ' PEELIKUNNU', '685531', 3),
(128, ' KALATHY', '685619', 3),
(129, ' VANDANMEDU', '685515', 3),
(134, 'CHAKKARAKKAL ', '670005', 4),
(135, 'CHEMBILODE ', '670672', 4),
(136, 'CHERUTHAZHAM ', '670693', 4),
(137, 'DHARMADAM ', '670106', 4),
(138, 'EDAKKAD ', '670686', 4),
(139, 'ERUVATTI ', '670704', 4),
(140, 'IRITTY ', '670703', 4),
(141, 'KADIRUR ', '670642', 4),
(142, 'KAKKABE ', '670561', 4),
(143, 'KANHIRANGAD ', '670704', 4),
(144, 'KANNUR ', '670001', 4),
(145, 'KANNUR UNIVERSITY', '670567', 4),
(146, 'KAYYUR ', '670314', 4),
(147, 'KOOTHUPARAMBA ', '670643', 4),
(148, 'KOTTIYOOR ', '670651', 4),
(149, 'KUTHUPARAMBA ', '670643', 4),
(150, 'MATTANNUR ', '670702', 4),
(151, 'MUNDERI ', '670642', 4),
(152, 'NADUVIL', '670612', 4),
(153, 'PANOOR ', '670692', 4),
(154, 'PAYYANNUR ', '670307', 4),
(155, 'PERALASSERY ', '670706', 4),
(156, 'PERINGATHUR ', '670675', 4),
(157, 'PINARAYI ', '670741', 4),
(158, 'PUZHATHI ', '670675', 4),
(159, 'SIVAPURAM ', '670664', 4),
(160, 'SREEKANDAPURAM ', '670631', 4),
(161, 'TALIPARAMBA ', '670141', 4),
(162, 'TALIPARAMBA SOUTH', '670142', 4),
(163, 'THALASSERY ', '670101', 4),
(164, 'THOTTADA ', '670007', 4),
(165, 'VALAPATTANAM ', '670010', 4),
(166, 'ADHUR ', '671541', 5),
(167, 'BEKAL', '671318', 5),
(168, 'CHEMNAD ', '671317', 5),
(169, 'CHENGALA', '671541', 5),
(170, 'CHERKALA ', '671313', 5),
(171, 'HOSDURG', '671124', 5),
(172, 'KANHANGAD', '671315', 5),
(173, 'KASARAGOD', '671121', 5),
(174, 'KUMBLA', '671321', 5),
(175, 'MANJESHWAR', '671323', 5),
(176, 'MULIYAR', '671542', 5),
(177, 'NILESHWAR', '671314', 5),
(178, 'PALLIKERE', '671317', 5),
(179, 'PERIYA', '671316', 5),
(180, 'TRIKKARIPUR', '671310', 5),
(181, 'ANCHAL', '691306', 6),
(182, 'AYOOR', '691533', 6),
(183, 'CHAVARA', '691583', 6),
(184, 'ELAMPALLOOR', '691501', 6),
(185, 'KARUNAGAPPALLY', '690518', 6),
(186, 'KILIKOLLUR', '691004', 6),
(187, 'KOLLAM', '691001', 6),
(188, 'KOTTARAKARA', '691506', 6),
(189, 'KUNDARA', '691501', 6),
(190, 'OACHIRA', '690526', 6),
(191, 'PARAVUR', '691301', 6),
(192, 'PATHANAPURAM', '689695', 6),
(193, 'PUNALUR', '691305', 6),
(194, 'SASTHAMKOTTA', '690521', 6),
(195, 'THAZHAVA', '690520', 6),
(196, 'THENMALA', '691308', 6),
(197, 'VARKALA ', '695141', 6),
(198, 'KALLELIBHAGOM', '691512', 6),
(199, 'KILIKOLLOOR', '691004', 6),
(201, 'AYMANAM', '686015', 7),
(202, 'CHANGANASSERY', '686101', 7),
(203, 'ETTUMANOOR', '686631', 7),
(204, 'KANJIRAPALLY', '686507', 7),
(205, 'KOTTAYAM', '686001', 7),
(206, 'KUMARAKOM', '686563', 7),
(207, 'MANIMALA ', '686543', 7),
(208, 'MUNDAKAYAM ', '686513', 7),
(209, 'NATTAKOM', '686013', 7),
(210, 'PALAI ', '686575', 7),
(211, 'PAMPADY ', '686502', 7),
(212, 'PUTHUPPALLY ', '686011', 7),
(213, 'RAMAPURAM', '686576', 7),
(214, 'VAIKOM', '686141', 7),
(215, 'VAKATHANAM ', '686538', 7),
(216, 'VELLOOR ', '686501', 7),
(217, 'VIMALAGIRI ', '686010', 7),
(218, 'VIZHINJAM ', '686563', 7),
(219, 'VYTTILA', '686039', 7),
(220, 'BALUSSERI', '673612', 8),
(221, 'BEYPORE ', '673015', 8),
(222, 'CHATHAMANGALAM ', '673601', 8),
(223, 'CHEMANCHERI ', '673005', 8),
(224, 'CHERUVANNUR ', '673631', 8),
(225, 'CHEVAYUR ', '673017', 8),
(226, 'ERAMALA ', '673604', 8),
(227, 'FEROKE ', '673631', 8),
(228, 'KALLAYI ', '673605', 8),
(229, 'KAYANNA', '673528', 8),
(230, 'KIZHAKKOTH', '673513', 8),
(231, 'KOYILANDY', '673305', 8),
(232, 'KOZHIKODE', '673001', 8),
(233, 'KUNNAMANGALAM ', '673571', 8),
(234, 'KUTTIKKATTOOR ', '673008', 8),
(235, 'MARAD', '673614', 8),
(236, 'MAVOOR', '673661', 8),
(237, 'MOKAVOOR ', '673661', 8),
(238, 'NADAPURAM ', '673504', 8),
(239, 'NADUVANNUR ', '673614', 8),
(240, 'OMASSERY ', '673582', 8),
(241, 'PANNIKKOTTUR', '673611', 8),
(242, 'PALAYAD', '673534', 8),
(243, 'PANANGAD', '673014', 8),
(244, 'PERUMANNA', '673019', 8),
(245, 'PERUVAYAL', '673522', 8),
(246, 'PUTHUPPADI', '673634', 8),
(247, 'RAMANATTUKARA', '673633', 8),
(248, 'THAMARASSERY ', '673573', 8),
(249, 'THIKKODI', '673586', 8),
(250, 'THIRUVAMBADY', '673603', 8),
(251, 'THUNERI', '673308', 8),
(252, 'UNNIKULAM', '673574', 8),
(253, 'UPPALA', '673305', 8),
(254, 'VADAKARA', '673101', 8),
(255, 'VADAKARA EAST', '673101', 8),
(256, 'VATAKARA', '673104', 8),
(257, 'VELLAYIL', '673012', 8),
(258, 'VILLIAPPALLY', '673308', 8),
(259, 'VILLYAPPALLY', '673310', 8),
(260, 'AREACODE', '673639', 9),
(261, 'EDAPPAL', '679576', 9),
(262, 'KONDOTTY', '673638', 9),
(263, 'KOTTAKKAL', '676503', 9),
(264, 'MALAPPURAM', '676505', 9),
(265, 'MANJERI', '676121', 9),
(266, 'NILAMBUR', '679329', 9),
(267, 'PALLIKKAL', '673317', 9),
(268, 'PARAPPANANGADI', '676303', 9),
(269, 'PERINTHALMANNA', '679322', 9),
(270, 'PERUMPADAPPU', '673637', 9),
(271, 'PONNANI', '679577', 9),
(272, 'TANUR', '676303', 9),
(273, 'TIRUR', '676101', 9),
(274, 'TIRURANGADI', '676306', 9),
(275, 'TRIKKALANGODE', '679305', 9),
(277, 'VALLIKUNNU', '676505', 9),
(278, 'VAZHIKKADAVU', '679336', 9),
(279, 'VETTATHUR', '679325', 9),
(280, 'AKATHETHARA ', '678008', 10),
(281, 'CHITTUR', '678104', 10),
(282, 'KODUVAYUR', '678501', 10),
(284, 'KOLLENGODE ', '678506', 10),
(285, 'MALAMPUZHA ', '678651', 10),
(286, 'MANNARKKAD ', '678582', 10),
(287, 'MUNDUR', '678592', 10),
(288, 'OTTAPALAM', '679101', 10),
(289, 'PALAKKAD ', '678001', 10),
(290, 'PALAPPURAM', '679322', 10),
(291, 'PATTAMBI', '679303', 10),
(292, 'PUDUNAGARAM', '678701', 10),
(293, 'SHORNUR', '679121', 10),
(294, 'THRITHALA', '679579', 10),
(295, 'VADAKKENCHERRY', '678683', 10),
(296, 'VALANCHERY', '676552', 9),
(297, 'WALAYAR ', '678007', 10),
(298, 'WADAKKANCHERY ', '678623', 10),
(300, 'ADOOR', '691523', 11),
(301, 'AYIROOR', '691533', 11),
(302, 'ELANTHOOR', '689643', 11),
(303, 'ENATHU', '691526', 11),
(304, 'ERAVIPEROOR', '689542', 11),
(305, 'KALANJOOR', '689694', 11),
(306, 'KAVIYOOR', '689582', 11),
(307, 'KOZHENCHERRY', '689641', 11),
(308, 'KONNI', '689691', 11),
(309, 'KOIPURAM', '689109', 11),
(310, 'MALLAPPALLY', '689585', 11),
(311, 'MARAMON', '689549', 11),
(312, 'OMALLUR', '689647', 11),
(313, 'PANDALAM', '689501', 11),
(314, 'PATHANAMTHITTA ', '689645', 11),
(315, 'PERUNAD', '689542', 11),
(316, 'RANNI', '689673', 11),
(317, 'SABARIMALA', '689662', 11),
(318, 'THIRUVALLA', '689101', 11),
(319, 'VADASSERIKKARA', '689542', 11),
(320, 'VENNIKULAM', '689572', 11),
(321, 'AAKKULAM', '695029', 12),
(322, 'ANAYARA', '695029', 12),
(323, 'ATTIPRA', '695028', 12),
(324, 'BALARAMAPURAM ', '695501', 12),
(325, 'CHALA', '695570', 12),
(326, 'CHEMPAZHANTHY', '695587', 12),
(327, 'CHETTIKULANGARA', '695308', 12),
(328, 'ENCHAKKAL', '695011', 12),
(329, 'KADINAMKULAM', '695311', 12),
(330, 'KANIYAPURAM', '695301', 12),
(331, 'KARAMANA', '695002', 12),
(332, 'KAZHAKKOOTTAM', '695582', 12),
(333, 'KOVALAM', '695527', 12),
(334, 'KOWDIAR', '695003', 12),
(335, 'MALAYINKEEZHU', '695571', 12),
(336, 'NEMOM', '695020', 12),
(337, 'NEYYATTINKARA', '695121', 12),
(338, 'PAPPANAMCODE', '695018', 12),
(339, 'PARASSALA', '695502', 12),
(340, 'PATTOM', '695004', 12),
(341, 'PEROORKADA ', '695005', 12),
(342, 'THIRUVANANTHAPURAM', '695001', 12),
(343, 'ULLOOR', '695011', 12),
(344, 'ADAT', '680571', 13),
(345, 'CHALAKUDY', '680307', 13),
(346, 'EDAVILANGU ', '680613', 13),
(347, 'GURUVAYOOR', '680101', 13),
(348, 'IRINJALAKUDA', '680121', 13),
(349, 'KODAKARA ', '680684', 13),
(350, 'KODUNGALLUR', '680664', 13),
(351, 'KUZHUR', '680734', 13),
(352, 'MALA', '680732', 13),
(353, 'MULANKUNNATHUKAVU ', '680581', 13),
(354, 'NELLUWAYA', '680733', 13),
(355, 'OLLUR', '680306', 13),
(356, 'PALAKKAL', '680717', 13),
(357, 'PERINGAVU', '680581', 13),
(358, 'PUDUKAD', '680301', 13),
(359, 'THIRUVILWAMALA', '680594', 13),
(360, 'THRISSUR', '680001', 13),
(361, 'VADAKKEKAD', '680582', 13),
(362, 'VALLACHIRA ', '680561', 13),
(363, 'VADANAPPALLY', '680614', 13),
(364, 'AMBALAVAYAL', '673593', 14),
(365, 'ACHOORANAM', '673581', 14),
(366, 'CHEERAL ', '673595', 14),
(367, 'KALPETTA', '673121', 14),
(368, 'KANIYAMBETTA', '673124', 14),
(369, 'KOTTATHARA', '673592', 14),
(370, 'MANANTHAVADY', '670645', 14),
(371, 'MEENANGADI', '673591', 14),
(372, 'MEPPADI', '673577', 14),
(373, 'MUTTIL', '673122', 14),
(374, 'NALLOORNAD', '673595', 14),
(375, 'PADINJARATHARA', '673575', 14),
(376, 'PANAMARAM', '670721', 14),
(377, 'POOKOT LAKE', '673577', 14),
(378, 'PULPALLY', '673579', 14),
(379, 'SULTHAN BATHERY', '673592', 14),
(380, 'THARIODE', '673121', 14),
(381, 'THIRUNELLY', '670646', 14),
(382, 'THONDERNAD', '673576', 14),
(383, 'VYTHIRI', '673576', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment_text` varchar(40) NOT NULL,
  `created_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `post_id`, `customer_id`, `comment_text`, `created_on`) VALUES
(28, 15, 50, 'nice key chains', '2023-11-06 20:10:17'),
(29, 16, 53, 'love this', '2023-11-06 21:23:22'),
(30, 15, 53, 'great', '2023-11-06 21:23:42'),
(31, 13, 2, 'lovely', '2023-11-06 21:31:34'),
(32, 14, 3, 'amazing bag', '2023-11-06 21:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(40) NOT NULL,
  `complaint_content` varchar(200) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `complaint_reply` varchar(300) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_status`, `complaint_reply`, `seller_id`, `customer_id`, `created_on`) VALUES
(11, 'this is complaint demo', 'here complaint details', 1, 'reply for complaint', 0, 50, '2023-11-06 20:12:03'),
(12, 'complaint example', 'this is a complaint', 0, '', 0, 51, '2023-11-06 23:25:57'),
(13, 'complaint example2', 'complaint example2 content', 0, '', 0, 4, '2023-11-06 23:27:24'),
(14, 'slow', 'demo complaint', 0, '', 47, 0, '2023-11-07 00:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `cus_name` varchar(60) NOT NULL,
  `cus_email` varchar(40) NOT NULL,
  `cus_dob` varchar(12) NOT NULL,
  `cus_gender` varchar(6) NOT NULL,
  `cus_address` varchar(200) NOT NULL,
  `cus_contact` varchar(13) NOT NULL,
  `cus_password` varchar(30) NOT NULL,
  `cus_photo` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  `cus_otp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `cus_name`, `cus_email`, `cus_dob`, `cus_gender`, `cus_address`, `cus_contact`, `cus_password`, `cus_photo`, `city_id`, `cus_otp_status`) VALUES
(2, 'JEENA JOBY', 'jeena123@gmail.com', '2003-02-19', 'Female', 'jeenas home p.o \r\nkerala', '7867564556', 'Jeena@123', 'default.jpg', 49, 1),
(3, 'gayathri R', 'gayu123@gmail.com', '2003-11-14', 'Female', 'gayunte veed p.o\r\nvelloor', '6756456789', 'Gayu@123', 'default.jpg', 93, 1),
(4, 'LASHIYA ANNOOR', 'lashi123@gmail.com', '2003-12-02', 'Female', 'ambalpady lashi kiii...', '7867567889', 'lashi@123', 'gallery-09.jpg', 69, 1),
(5, 'ABI JOY', 'abijoy611@gmail.com', '2023-09-19', 'Male', 'abcd', '2648732568734', 'abijoy@123', 'default.jpg', 78, 1),
(6, 'ARSHA RAJAN', 'arsharajan02@gmail.com', '2002-11-11', 'Female', 'Mettakottil H N.mazhuvannoor P.O\r\nValamboor', '9497254017', 'arsha@123', 'default.jpg', 67, 1),
(7, 'joyal  sunish', 'joyalsunish@gmail.com', '2003-01-14', 'Male', 'illethukalayil(H),vadakara p.o,kottakayam', '7510762325', 'joyal@123', 'default.jpg', 91, 1),
(10, 'Dhanya Job', 'dhanyajob@gmail.com', '1981-02-04', 'Female', 'Chemmanapadathu\r\nPalakuzha', '9747042100', 'Dhan@123', 'default.jpg', 68, 1),
(50, 'PAULSON ELDHO', 'paulsoneldho877@gmail.com', '2002-08-29', 'Male', 'Alangattu H Mulavoor P.O\r\nMuvattupuzha', '7994681529', 'Paulson@2255', 'M_img4.png', 77, 1),
(51, 'PAILY SAJI', 'pailysaji08@gmail.com', '2002-01-10', 'Male', 'Pothanicad, Kothamangalam', '8281860108', 'Paily@1234', 'default.jpg', 69, 1),
(53, 'ANNA JOHN', 'anna123@gmail.com', '2003-01-06', 'FEMALE', 'dharampuram', '4334565676', 'anna@123', 'gallery-06.jpg', 56, 1),
(54, 'V AJAY KRISHNAN', 'vgajay11@gmail.com', '2003-10-29', 'Male', 'abc,vaikom', '9496722757', 'Watch123@.', 'banner-02.jpg', 214, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'ALAPPUZHA'),
(2, 'ERNAKULAM'),
(3, 'IDUKKI'),
(4, 'KANNUR'),
(5, 'KASARAGOD'),
(6, 'KOLLAM'),
(7, 'KOTTAYAM'),
(8, 'KOZHIKODE'),
(9, 'MALAPPURAM'),
(10, 'PALAKKAD'),
(11, 'PATHANAMTHITTA'),
(12, 'THIRUVANANTHAPURAM'),
(13, 'THRISSUR'),
(14, 'WAYANAD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(200) NOT NULL,
  `feedback_time` varchar(20) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_time`, `seller_id`, `customer_id`) VALUES
(7, 'nice website\r\n', '2023-11-06 20:13:37', 0, 50),
(8, 'great website', '2023-11-06 23:26:22', 0, 51),
(9, 'not bad', '2023-11-06 23:29:01', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE `tbl_follow` (
  `follow_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_follow`
--

INSERT INTO `tbl_follow` (`follow_id`, `seller_id`, `customer_id`) VALUES
(2, 3, 6),
(45, 5, 4),
(51, 4, 2),
(65, 5, 2),
(66, 5, 6),
(101, 3, 53),
(103, 49, 53),
(104, 49, 2),
(105, 47, 2),
(106, 3, 2),
(107, 4, 6),
(108, 47, 3),
(110, 49, 3),
(111, 3, 3),
(114, 49, 7),
(115, 47, 7),
(116, 49, 10),
(117, 47, 10),
(118, 4, 51),
(119, 49, 51),
(120, 5, 54),
(122, 3, 4),
(123, 4, 4),
(124, 49, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_likes`
--

INSERT INTO `tbl_likes` (`like_id`, `post_id`, `customer_id`) VALUES
(151, 13, 50),
(152, 15, 50),
(153, 13, 53),
(154, 14, 53),
(155, 15, 53),
(156, 16, 53),
(157, 16, 2),
(158, 15, 2),
(159, 14, 2),
(160, 13, 2),
(161, 16, 3),
(162, 15, 3),
(163, 14, 3),
(164, 13, 3),
(165, 16, 4),
(166, 15, 4),
(167, 14, 4),
(168, 13, 4),
(169, 15, 7),
(170, 16, 7),
(171, 13, 7),
(172, 16, 10),
(173, 15, 10),
(174, 13, 10),
(175, 14, 10),
(176, 16, 51),
(177, 15, 51),
(178, 13, 51),
(179, 14, 51),
(180, 14, 54);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `notification_class` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `notification_status` int(11) NOT NULL,
  `sent_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_type`, `notification_class`, `message`, `seller_id`, `customer_id`, `admin_id`, `notification_status`, `sent_on`) VALUES
(124, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>MULTI COLOR CROCHET BAG </b> was received from <b>ABI JOY</b>', 5, 0, 0, 0, '2023-10-06 19:54:28'),
(125, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LION AMIGURUMI</b> was received from <b>ABI JOY</b>', 49, 0, 0, 0, '2023-10-06 19:54:28'),
(126, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>FLORAL BAG</b> was received from <b>ABI JOY</b>', 5, 0, 0, 0, '2023-10-06 19:54:28'),
(127, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>BROWN WALLET</b> was received from <b>ABI JOY</b>', 4, 0, 0, 0, '2023-11-06 20:00:41'),
(128, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>KK MULTI COLOR SCARF</b> was received from <b>PAULSON ELDHO</b>', 3, 0, 0, 0, '2023-11-01 20:03:56'),
(129, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LEATHER KEY CHAIN</b> was received from <b>PAULSON ELDHO</b>', 4, 0, 0, 0, '2023-11-01 20:03:56'),
(130, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LINO THE BUNNY</b> was received from <b>PAULSON ELDHO</b>', 49, 0, 0, 0, '2023-11-03 20:07:54'),
(131, 'complaint received', 'mdi mdi-comment-alert', 'A complaint was received from customer <b>PAULSON ELDHO</b>', 0, 0, 1, 0, '2023-11-06 20:12:03'),
(132, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>LINO THE BUNNY</b> has been shipped', 0, 50, 0, 0, '2023-11-04 20:32:04'),
(133, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>LION AMIGURUMI</b> has been shipped', 0, 5, 0, 0, '2023-10-10 20:32:08'),
(134, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>LINO THE BUNNY</b> has been delivered.', 0, 50, 0, 0, '2023-11-06 20:37:09'),
(137, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>KK MULTI COLOR SCARF</b> has been shipped', 0, 50, 0, 0, '2023-11-06 20:41:58'),
(138, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>KK MULTI COLOR SCARF</b> has been delivered.', 0, 50, 0, 0, '2023-11-06 20:42:03'),
(139, 'New Seller', 'mdi mdi-account-search', 'A New Seller has Registered please verify', 0, 0, 1, 0, '2023-11-06 20:59:36'),
(141, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>FLORAL BAG</b> was received from <b>ANNA JOHN</b>', 5, 0, 0, 0, '2023-11-06 21:25:05'),
(142, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>RABBIT CROCHET</b> was received from <b>ANNA JOHN</b>', 49, 0, 0, 0, '2023-11-06 21:25:05'),
(145, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>KK KEYRING</b> was received from <b>JEENA JOBY</b>', 3, 0, 0, 0, '2023-11-06 21:30:41'),
(146, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LINO THE BUNNY</b> was received from <b>JEENA JOBY</b>', 49, 0, 0, 0, '2023-11-06 21:32:16'),
(147, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>SUNFLOWER FLORAL BAG</b> was received from <b>ARSHA RAJAN</b>', 5, 0, 0, 0, '2023-11-01 21:38:02'),
(148, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>BROWN WALLET</b> was received from <b>ARSHA RAJAN</b>', 4, 0, 0, 0, '2023-10-12 21:38:02'),
(150, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LEATHER KEY CHAIN</b> was received from <b>ARSHA RAJAN</b>', 4, 0, 0, 0, '2023-11-06 21:40:55'),
(152, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>AJ BLUE BRACELETS</b> was received from <b>ARSHA RAJAN</b>', 47, 0, 0, 0, '2023-11-06 21:53:49'),
(153, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LINO THE BUNNY</b> was received from <b>ARSHA RAJAN</b>', 49, 0, 0, 0, '2023-11-06 21:53:49'),
(154, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LEATHER BAG</b> was received from <b>gayathri R</b>', 4, 0, 0, 0, '2023-11-06 21:57:58'),
(155, 'Stock Alert!', 'mdi mdi-chart-line', '<b>BROWN WALLET</b> has only 1 stock left', 4, 0, 0, 0, '2023-11-06 21:57:58'),
(157, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>VINTAGE CLASSIC BAG</b> was received from <b>Lashiya Annoor</b>', 5, 0, 0, 0, '2023-09-16 22:04:16'),
(158, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>KK MULTI COLOR SCARF</b> was received from <b>ANNA JOHN</b>', 3, 0, 0, 0, '2023-11-06 22:17:49'),
(159, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>KK MULTI COLOR SCARF</b> was received from <b>joyal  sunish</b>', 3, 0, 0, 0, '2023-11-06 22:19:23'),
(160, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>MULTI COLOR CROCHET BAG </b> has been shipped', 0, 3, 0, 0, '2023-11-06 22:28:35'),
(161, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>VINTAGE CLASSIC BAG</b> has been shipped', 0, 4, 0, 0, '2023-11-06 22:28:42'),
(162, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>MULTI COLOR CROCHET BAG </b> has been shipped', 0, 2, 0, 0, '2023-11-06 22:28:47'),
(163, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>FLORAL BAG</b> has been shipped', 0, 53, 0, 0, '2023-11-06 22:28:56'),
(164, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>VINTAGE CLASSIC BAG</b> has been delivered.', 0, 4, 0, 0, '2023-11-06 22:29:02'),
(165, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>MULTI COLOR CROCHET BAG </b> has been delivered.', 0, 3, 0, 0, '2023-11-06 22:29:08'),
(166, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>MULTI COLOR CROCHET BAG </b> has been delivered.', 0, 5, 0, 0, '2023-11-06 22:29:17'),
(168, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>KK KEYRING</b> has been shipped', 0, 2, 0, 0, '2023-11-06 22:30:13'),
(169, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>KK KEYRING</b> has been delivered.', 0, 2, 0, 0, '2023-11-06 22:30:23'),
(170, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>AJ TWISTED BRACELET</b> was received from <b>ABI JOY</b>', 47, 0, 0, 0, '2023-11-06 22:31:28'),
(171, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>AJ BLUE BRACELETS</b> has been shipped', 0, 6, 0, 0, '2023-11-06 22:34:55'),
(172, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>AJ TWISTED BRACELET</b> has been shipped', 0, 5, 0, 0, '2023-11-06 22:35:01'),
(173, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>AJ BLUE BRACELETS</b> has been shipped', 0, 53, 0, 0, '2023-11-06 22:35:09'),
(174, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>AJ BLUE BRACELETS</b> has been delivered.', 0, 53, 0, 0, '2023-11-06 22:35:15'),
(178, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>AJ BLUE BRACELETS</b> was received from <b>PAILY SAJI</b>', 47, 0, 0, 0, '2023-11-06 23:00:48'),
(179, 'Stock Alert!', 'mdi mdi-chart-line', '<b>AJ BLUE BRACELETS</b> has only 1 stock left', 47, 0, 0, 0, '2023-11-06 23:00:48'),
(180, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>BROWN WALLET</b> was received from <b>PAILY SAJI</b>', 4, 0, 0, 0, '2023-11-06 23:02:07'),
(181, 'Stock Alert!', 'mdi mdi-chart-line', '<b>BROWN WALLET</b> is out of stock', 4, 0, 0, 0, '2023-11-06 23:02:07'),
(182, 'post reported', 'mdi mdi-comment-alert', 'Your Post : <b>working on my New product </b>-  was reported by some customer and is temporarily rem', 49, 0, 0, 0, '2023-11-06 23:20:32'),
(183, 'post reported', 'mdi mdi-comment-alert-outline', 'A post : <b>working on my New product </b>-  was reported. Please take action', 0, 0, 1, 0, '2023-11-06 23:20:32'),
(184, 'complaint received', 'mdi mdi-comment-alert', 'A complaint was received from customer <b>PAILY SAJI</b>', 0, 0, 1, 0, '2023-11-06 23:25:57'),
(185, 'complaint received', 'mdi mdi-comment-alert', 'A complaint was received from customer <b>Lashiya Annoor</b>', 0, 0, 1, 0, '2023-11-06 23:27:24'),
(186, 'complaint', 'mdi mdi-comment-alert-outline', 'admin replied to your complaint : <b>this is complaint demo</b> ', 0, 50, 0, 0, '2023-11-06 23:28:07'),
(187, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>RABBIT CROCHET</b> has been shipped', 0, 53, 0, 0, '2023-11-06 23:53:35'),
(188, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>LINO THE BUNNY</b> has been shipped', 0, 2, 0, 0, '2023-11-06 23:53:38'),
(189, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>LINO THE BUNNY</b> has been delivered.', 0, 2, 0, 0, '2023-11-06 23:53:43'),
(190, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>RABBIT CROCHET</b> has been delivered.', 0, 53, 0, 0, '2023-11-06 23:53:50'),
(191, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>LION AMIGURUMI</b> has been delivered.', 0, 5, 0, 0, '2023-11-06 23:53:55'),
(192, 'complaint received', 'mdi mdi-comment-alert', 'A complaint was received from Seller <b>ANJU  MATHEWS</b>', 0, 0, 1, 0, '2023-11-07 00:16:13'),
(193, 'post retained', 'mdi mdi-comment-check-outline', 'Your Post : <b>working on my New product </b>- which was reported was retained to feeds by the Admin', 49, 0, 0, 0, '2023-11-07 01:05:05'),
(194, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>AJ BLUE BRACELETS</b> was received from <b>V AJAY KRISHNAN</b>', 47, 0, 0, 0, '2023-11-10 12:16:48'),
(195, 'Stock Alert!', 'mdi mdi-chart-line', '<b>AJ BLUE BRACELETS</b> is out of stock', 47, 0, 0, 0, '2023-11-10 12:16:48'),
(196, 'post reported', 'mdi mdi-comment-alert', 'Your Post : <b>my Favourite keychain I ever made. </b>-  was reported by some customer and is tempor', 4, 0, 0, 0, '2023-11-10 12:18:00'),
(197, 'post reported', 'mdi mdi-comment-alert-outline', 'A post : <b>my Favourite keychain I ever made. </b>-  was reported. Please take action', 0, 0, 1, 0, '2023-11-10 12:18:00'),
(198, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>LEATHER BAG</b> was received from <b>V AJAY KRISHNAN</b>', 4, 0, 0, 0, '2023-11-10 12:19:49'),
(199, 'Stock Alert!', 'mdi mdi-chart-line', '<b>LEATHER BAG</b> is out of stock', 4, 0, 0, 0, '2023-11-10 12:19:49'),
(200, 'order received', 'mdi mdi-package-variant', 'A new order  of product <b>KK MULTI COLOR SCARF</b> was received from <b>V AJAY KRISHNAN</b>', 3, 0, 0, 0, '2023-11-10 12:19:49'),
(201, 'Stock Alert!', 'mdi mdi-chart-line', '<b>KK MULTI COLOR SCARF</b> has only 1 stock left', 3, 0, 0, 0, '2023-11-10 12:19:49'),
(202, 'Order Shipped', 'mdi mdi-truck-delivery', 'your order of product <b>SUNFLOWER FLORAL BAG</b> has been shipped', 0, 6, 0, 0, '2023-11-10 12:23:42'),
(203, 'Order delivered', 'mdi mdi-package-variant-closed', 'your order of product <b>MULTI COLOR CROCHET BAG </b> has been delivered.', 0, 2, 0, 0, '2023-11-10 12:23:49'),
(204, 'post retained', 'mdi mdi-comment-check-outline', 'Your Post : <b>my Favourite keychain I ever made. </b>- which was reported was retained to feeds by ', 4, 0, 0, 0, '2023-11-10 15:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_date`, `order_status`, `order_price`, `order_quantity`, `delivery_address`, `customer_id`) VALUES
(48, '2023-10-06', 1, 1700, 4, 'ABI JOY<br>2648732568734<br>abcd<br>NEDUMBASSERY<br>683572<br>ERNAKULAM', 5),
(49, '2023-11-06', 1, 350, 1, 'ABI JOY<br>2648732568734<br>abcd<br>NEDUMBASSERY<br>683572<br>ERNAKULAM', 5),
(50, '2023-11-01', 1, 880, 3, 'PAULSON ELDHO<br>7994681529<br>Alangattu H Mulavoor P.O\r\nMuvattupuzha<br> MUVATTUPUZHA<br>686661<br>ERNAKULAM', 50),
(51, '2023-11-03', 1, 650, 1, 'PAULSON ELDHO<br>7994681529<br>Alangattu H Mulavoor P.O\r\nMuvattupuzha<br> MUVATTUPUZHA<br>686661<br>ERNAKULAM', 50),
(52, '2023-10-26', 1, 2000, 4, 'ANNA JOHN<br>4334565676<br>dharampuram<br> ELAMKUNNAPUZHA<br> 682503<br>ERNAKULAM', 53),
(53, '2023-11-02', 1, 200, 1, 'ANNA JOHN<br>4334565676<br>dharampuram<br> ELAMKUNNAPUZHA<br> 682503<br>ERNAKULAM', 53),
(54, '2023-10-23', 1, 300, 2, 'JEENA JOBY<br>7867564556<br>jeenas home p.o \r\nkerala<br> ANGAMALY<br>683572<br>ERNAKULAM', 2),
(55, '2023-09-30', 1, 650, 1, 'JEENA JOBY<br>7867564556<br>jeenas home p.o \r\nkerala<br> ANGAMALY<br>683572<br>ERNAKULAM', 2),
(56, '2023-11-06', 1, 1050, 2, 'ARSHA RAJAN<br>9497254017<br>Mettakottil H N.mazhuvannoor P.O\r\nValamboor<br>KOLENCHERY<br>682311<br>ERNAKULAM', 6),
(57, '2023-10-12', 1, 90, 1, 'ARSHA RAJAN<br>9497254017<br>Mettakottil H N.mazhuvannoor P.O\r\nValamboor<br>KOLENCHERY<br>682311<br>ERNAKULAM', 6),
(58, '2023-11-06', 1, 1250, 3, 'ARSHA RAJAN<br>9497254017<br>Mettakottil H N.mazhuvannoor P.O\r\nValamboor<br>KOLENCHERY<br>682311<br>ERNAKULAM', 6),
(59, '2023-11-06', 1, 1550, 2, 'gayathri R<br>6756456789<br>gayunte veed p.o\r\nvelloor<br>VARAPPUZHA<br>683517<br>ERNAKULAM', 3),
(60, '2023-09-16', 1, 230, 1, 'Lashiya Annoor<br>7867567889<br>ambalpady lashi kiii...<br>KOTHAMANGALAM<br>686691<br>ERNAKULAM', 4),
(61, '2023-11-06', 1, 700, 1, 'ANNA JOHN<br>4334565676<br>dharampuram<br> ELAMKUNNAPUZHA<br> 682503<br>ERNAKULAM', 53),
(62, '2023-11-06', 1, 700, 1, 'joyal  sunish<br>7510762325<br>illethukalayil(H),vadakara p.o,kottakayam<br>THIRIPPUNITHURA<br>682301<br>ERNAKULAM', 7),
(63, '2023-11-06', 1, 500, 1, 'ABI JOY<br>2648732568734<br>abcd<br>NEDUMBASSERY<br>683572<br>ERNAKULAM', 5),
(64, '2023-11-02', 0, 0, 0, '', 5),
(67, '2023-11-05', 1, 300, 1, 'PAILY SAJI<br>8281860108<br>Pothanicad, Kothamangalam<br>KOTHAMANGALAM<br>686691<br>ERNAKULAM', 51),
(68, '2023-11-06', 1, 350, 1, 'PAILY SAJI<br>8281860108<br>Pothanicad, Kothamangalam<br>KOTHAMANGALAM<br>686691<br>ERNAKULAM', 51),
(69, '2023-11-07', 0, 1850, 3, 'Lashiya Annoor<br>7867567889<br>ambalpady lashi kiii...<br>KOTHAMANGALAM<br>686691<br>ERNAKULAM', 4),
(70, '2023-11-10', 1, 300, 1, 'V AJAY KRISHNAN<br>9496722757<br>abc,vaikom<br>VAIKOM<br>686141<br>KOTTAYAM', 54),
(71, '2023-11-10', 1, 3400, 4, 'V AJAY KRISHNAN<br>9496722757<br>abc,vaikom<br>VAIKOM<br>686141<br>KOTTAYAM', 54),
(72, '2023-11-10', 0, 0, 0, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `pay_method`, `pay_amount`, `pay_time`) VALUES
(32, 48, 'PAY PAL', 1700, '2023-10-06 19:54:28'),
(33, 49, 'Net Banking', 350, '2023-11-06 20:00:41'),
(34, 50, 'Cash on Delivery', 880, '2023-11-01 20:03:56'),
(35, 51, 'Net Banking', 650, '2023-11-06 20:07:54'),
(36, 52, 'PAY PAL', 2000, '2023-10-26 21:25:05'),
(37, 53, 'Net Banking', 200, '2023-11-06 21:26:25'),
(38, 54, 'Cash on Delivery', 300, '2023-10-23 21:30:41'),
(39, 55, 'Net Banking', 650, '2023-09-30 21:32:16'),
(40, 56, 'Cash on Delivery', 1050, '2023-11-01 21:38:02'),
(41, 57, 'Credit Card', 90, '2023-10-12 21:40:55'),
(42, 58, 'PAY PAL', 1250, '2023-11-06 21:53:49'),
(43, 59, 'Cash on Delivery', 1550, '2023-11-06 21:57:58'),
(44, 60, 'Cash on Delivery', 230, '2023-09-16 22:04:16'),
(45, 61, 'Cash on Delivery', 700, '2023-11-06 22:17:49'),
(46, 62, 'Net Banking', 700, '2023-11-06 22:19:23'),
(47, 63, 'Cash on Delivery', 500, '2023-11-06 22:31:28'),
(48, 65, 'Cash on Delivery', 300, '2023-11-06 22:43:14'),
(49, 66, 'PAY PAL', 300, '2023-11-06 22:58:38'),
(50, 67, 'Cash on Delivery', 300, '2023-11-06 23:00:48'),
(51, 68, 'Net Banking', 350, '2023-11-06 23:02:07'),
(52, 70, 'Cash on Delivery', 300, '2023-11-10 12:16:48'),
(53, 71, 'Net Banking', 3400, '2023-11-10 12:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_caption` varchar(100) NOT NULL,
  `post_media` varchar(300) NOT NULL,
  `post_content` varchar(500) NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_on` varchar(30) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `report_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_caption`, `post_media`, `post_content`, `post_type`, `product_id`, `created_on`, `seller_id`, `report_status`) VALUES
(13, 'working on my New product', 'il_794xN.3091904024_r34p.webp', 'hope you all will like it..', 'image', 0, '2023-10-24 16:03:31', 49, 3),
(14, 'My new Work ', 'il_1140xN.3928927436_8rsu.jpg', 'Going to be released soon...So excited hope you all are excited like me..', 'image', 0, '2023-11-03 12:14:05', 5, 0),
(15, 'my Favourite keychain I ever made.', 'img6.jpg', 'first time posting something.. ', 'image', 0, '2023-11-04 12:18:05', 4, 3),
(16, 'new product is out', 'il_1588xN.5293011802_3i3i.avif', 'check it out', 'image', 12, '2023-11-06 20:24:19', 47, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_report`
--

CREATE TABLE `tbl_post_report` (
  `report_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `report_content` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `report_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_post_report`
--

INSERT INTO `tbl_post_report` (`report_id`, `customer_id`, `report_content`, `post_id`, `report_time`) VALUES
(20, 51, 'report testing', 13, '2023-11-06 23:20:32'),
(21, 54, 'tjhvj', 15, '2023-11-10 12:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `prod_name` varchar(75) NOT NULL,
  `prod_color` varchar(40) NOT NULL,
  `prod_material` varchar(30) NOT NULL,
  `type_id` varchar(20) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_tag` varchar(200) NOT NULL,
  `prod_description` varchar(200) NOT NULL,
  `prod_date` varchar(12) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `prod_name`, `prod_color`, `prod_material`, `type_id`, `prod_price`, `prod_img`, `prod_tag`, `prod_description`, `prod_date`, `seller_id`, `subcat_id`) VALUES
(1, 'MULTI COLOR CROCHET BAG ', 'orange, blue', 'cotton yarn', '3', 250, 'il_794xN.4815789514_cx35.webp', '#blue #orange', 'NALLA BAAG.....\r\nENTE BAAG...\r\nCUTE BAAG...\r\nVANG BAAG..', '2023-08-31', 5, 2),
(3, 'VINTAGE CLASSIC BAG', 'cream', 'cotton', '4', 230, 'il_340x270.3024464203_1f15.webp', '#light #good', 'adipoli bag 30cm length 20 cm Breadth', '2023-08-31', 5, 3),
(4, 'KK ELEGENT SCARF', 'pink', 'wool', '2', 450, 'SD_01_T01_7303T_A0_X_EC_90.webp', '#elegant#beautiful', 'nalla..scarf aah..medicho.. medicho', '2023-09-08', 3, 23),
(5, 'KK KEYRING', 'multi colored', 'metal', '1', 50, '81xdwPzZBpL._UX679_.jpg', '#cute#vintage', 'hand wonderful diamond shaped cute keychains', '2023-09-16', 3, 29),
(6, 'LION AMIGURUMI', 'blue', 'wool', '4', 500, 'il_794xN.2648099781_qjxq.webp', '#blue #crochet amigurumi #knitting #lion plushie #blue lion doll #cute stuffed toy #adorable #babies#animal toy#blue stuffed toy', 'nice Lion Amigurumi\r\nheight: 30cm\r\nwidth:20cm\r\n', '2023-10-30', 49, 20),
(7, 'RABBIT CROCHET', 'blue', 'cotton', '3', 700, 'il_794xN.4511259242_4iwv.webp', '#cute crochets #couple crochets', '35cm tall\r\n20cm width\r\nmade with 100% cotton yarn', '2023-10-05', 49, 20),
(8, 'BROWN WALLET', 'brown', 'leather', '1', 350, 'il_1588xN.2648009391_ts0n.avif', '#brown wallet #men wallet', 'quality leather wallet for men.\r\n100% hand made', '2023-11-05', 4, 9),
(9, 'AJ ASSORTED GREEN BRACELET', 'green', 'beads', '2,6', 200, 'il_1588xN.5256726848_1bvy.webp', '#elegent bracelet #hand chain #green chain', '18cm -long\r\nhigh quality beads ', '2023-11-06', 47, 28),
(10, 'LINO THE BUNNY', 'pink', 'wool yarn', '4', 650, 'il_794xN.3175470483_ff29.webp', '#cute rabbit #rabbit plushie #stuffed animal for kids ', '-> Length-30cm\r\n-> Width-18cm\r\n-> Stuffed with fiberfill\r\n-> Hand wash only', '2023-11-06', 49, 20),
(11, 'AJ BLUE BRACELETS', 'blue', 'beads', '2,6', 300, 'il_1588xN.5242640335_6zom.avif', '#blue beads bracelet#elegant bracelet #hand chain #combo', 'length-18cm\r\ncombo of 2 piece\r\nhigh quality beads\r\neasy to maintain', '2023-11-06', 47, 28),
(12, 'AJ TWISTED BRACELET', 'apricot', '14k gold filled,  pearl', '2,6', 500, 'il_1588xN.5293011802_3i3i.avif', '#pearl bracelet #beads barcelet #elegent bracelet', 'Noble and Elegant Natural Freshwater Pearl Wrap Bracelet, Exquisite 14k Gold Filled Bracelet, Twisted Pearl Bracelet, Bridal Bracelet', '2023-11-06', 47, 28),
(14, 'FLORAL BAG', 'blue', 'cotton yarn', '2', 700, 'il_794xN.5042783097_kt8b.webp', '#blue knitted bag #floral knitted bag# cute bag ', '35cm-length\r\n30cm -width\r\nhand wash\r\n100% cotton', '2023-11-06', 5, 1),
(15, 'SUNFLOWER FLORAL BAG', 'yellow, off white', 'cotton yarn', '2', 700, 'il_794xN.4652093325_f01a.avif', '#floral bag #sunflower bag #elegent #yellow#spring', '35cm-length\r\n30cm-width\r\nfor daily use\r\nhandwash', '2023-11-06', 5, 1),
(16, 'LEATHER KEY CHAIN', 'brown', 'leather', '1', 90, 'il_1140xN.4799620062_cxcw.webp', '#leather keychain#keyring', 'leather\r\nhandy\r\nclassic', '2023-11-06', 4, 29),
(17, 'LEATHER BAG', 'deep brown', 'leather', '3', 1300, 'il_1588xN.4374564794_ionk.avif', '#Shoulder Leather Hobo Bag#Handmade Genuine Leather Bag Work Bag for Women# Minimalist', 'Shoulder Leather Hobo Bag. Handmade Genuine Leather Bag. Personalized gifts for women. Work Bag for Women. Minimalist', '2023-11-06', 4, 4),
(18, 'KK MULTI COLOR SCARF', 'mutli color', 'cotton yarn', '2,3', 700, 'gjh.webp', '#Soft Lambswool scarf# Pure New Wool #stripes #very soft ', 'irish Soft Lambswool scarf - 100% Pure New Wool - blue/bronze/burgundy/beige/green stripes - very soft - unisex ', '2023-11-06', 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_gallery`
--

CREATE TABLE `tbl_product_gallery` (
  `product_gallery_id` int(11) NOT NULL,
  `product_img` varchar(400) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_gallery`
--

INSERT INTO `tbl_product_gallery` (`product_gallery_id`, `product_img`, `product_id`) VALUES
(2, 'il_794xN.4864038823_kppc.webp', 1),
(4, 'il_1140xN.3024464187_dp0o.jpg', 3),
(5, 'il_1140xN.3823499114_5mzz.webp', 4),
(8, 'il_1140xN.3192070229_lboi.jpg', 3),
(16, 'il_794xN.4558627717_6xb1.webp', 7),
(17, 'il_1588xN.4379762434_lxj9.avif', 8),
(18, 'il_1588xN.5304913613_cr6r.webp', 9),
(20, 'il_794xN.3127752084_hzx7.webp', 10),
(21, 'il_1588xN.3893470394_jzmg.avif', 11),
(22, 'il_1588xN.5259739784_tu81.avif', 11),
(25, 'il_1588xN.5293011806_prxn.avif', 12),
(26, 'il_1588xN.5341190909_glq2.avif', 12),
(27, 'il_1588xN.5305020977_6yxt.webp', 9),
(28, 'il_794xN.4994544372_8q1a.webp', 14),
(29, 'il_794xN.4279518656_fcsn.avif', 15),
(30, 'il_1588xN.5089824611_c1h1.avif', 17),
(31, 'il_1588xN.3152675271_27dz.webp', 18),
(32, 'il_1588xN.3152685191_m9um.webp', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` float NOT NULL,
  `rating_comment` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `rating_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_value`, `rating_comment`, `customer_id`, `cart_id`, `rating_date`) VALUES
(39, 4, 'good product', 5, 212, '2023-11-07 01:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `sell_name` varchar(60) NOT NULL,
  `sell_email` varchar(40) NOT NULL,
  `sell_password` varchar(30) NOT NULL,
  `sell_contact` varchar(30) NOT NULL,
  `sell_address` varchar(200) NOT NULL,
  `sell_photo` varchar(200) NOT NULL,
  `sell_proof` varchar(300) NOT NULL,
  `sell_doj` varchar(12) NOT NULL,
  `city_id` int(11) NOT NULL,
  `sell_ver_status` int(11) NOT NULL,
  `sell_bio_status` int(11) NOT NULL,
  `sell_otp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `sell_name`, `sell_email`, `sell_password`, `sell_contact`, `sell_address`, `sell_photo`, `sell_proof`, `sell_doj`, `city_id`, `sell_ver_status`, `sell_bio_status`, `sell_otp_status`) VALUES
(3, 'KRISHNA PRIYA', 'krishna123@gmail.com', 'krishna', '87657657599', 'krishnede veed\r\nayakkad', 'F_img1.png', 'sample1.jpg', '2023-08-30', 69, 1, 1, 1),
(4, 'GANGA GOPI', 'Ganga123@gmail.com', 'ganga', '7867567687', 'gangede veed', 'M_img1.png', 'sample4.jpg', '2023-08-30', 49, 1, 1, 1),
(5, 'FATHIMA SHEEN K S', 'fathimasheen524@gmail.com', 'sheen', '8606147681', 'Punnamattom west Muvattupuzha ', 'amigurumi.avif', 'sample2.jpg', '2023-09-20', 77, 1, 1, 1),
(47, 'ANJU  MATHEWS', 'anjumathews002@gmail.com', 'anjuMMAA@123', '9961240693', 'Koikakudy House\r\nNellimattom P O\r\nNellimattom', 'F_img2.png', 'sample2.jpg', '2023-09-05', 69, 1, 1, 1),
(49, 'FELIX LEE', 'felix123@gmail.com', 'Felix@123', '5676873465', 'aramana p.o', 'M_img3.png', 'sample1.jpg', '2023-10-11', 77, 1, 0, 1),
(50, 'ANDREWS STEPHEN', 'sinjumathews53@gmail.com', 'Andrew@123', '5687453487', 'uppukandam', 'face24.jpg', 'sample3.jpg', '2023-11-06', 84, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller_bio`
--

CREATE TABLE `tbl_seller_bio` (
  `seller_bio_id` int(11) NOT NULL,
  `bio_nickname` varchar(30) NOT NULL,
  `bio_email` varchar(30) NOT NULL,
  `bio_details` varchar(200) NOT NULL,
  `sell_profilepic` varchar(200) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seller_bio`
--

INSERT INTO `tbl_seller_bio` (`seller_bio_id`, `bio_nickname`, `bio_email`, `bio_details`, `sell_profilepic`, `seller_id`) VALUES
(1, 'Sheen💕', 'sheenbusiness@gmail.com', 'this is my bio...\r\nhi', 'about-02.jpg', 5),
(2, 'KK fashion', 'krishnapro@gmail.com', ' I am a growing handcraft artist..hope you all will like my products', 'gallery-02.jpg', 3),
(5, 'ganga', 'ganga123@gmail.com', 'makes products with leather\r\n', 'il_1140xN.4949230039_3ecq.webp', 4),
(6, 'Aj beads', 'ajbeads123@gmail.com', ' AJ beads works\r\n on different beads accessories \r\nlike bracelets, \r\nearrings , rings...\r\nplease check out my products ', 'il_1588xN.5259739784_tu81.avif', 47),
(7, 'Felix', 'felix123@gmail.com', 'I am crocheter.\r\nAnd i have been working on cute amigurumi ', 'il_794xN.4709971859_kb38.webp', 49);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_count`, `product_id`, `added_date`) VALUES
(1, 11, 1, '2023-06-14'),
(2, 34, 3, '2023-08-24'),
(3, 36, 4, '2023-10-16'),
(4, 55, 5, '2023-01-06'),
(5, 5, 1, '2023-10-14'),
(6, 12, 1, '2023-10-23'),
(7, 12, 6, '2023-10-30'),
(8, 6, 6, '2023-10-30'),
(9, 12, 7, '2023-11-06'),
(10, 3, 8, '2023-11-06'),
(11, 5, 9, '2023-11-06'),
(12, 4, 10, '2023-11-06'),
(13, 4, 12, '2023-11-06'),
(14, 6, 12, '2023-11-06'),
(15, 3, 14, '2023-11-06'),
(16, 3, 15, '2023-11-06'),
(17, 4, 16, '2023-11-06'),
(18, 7, 18, '2023-11-06'),
(19, 4, 11, '2023-11-06'),
(20, 2, 17, '2023-11-06'),
(21, 2, 11, '2023-11-06'),
(22, 4, 16, '2023-11-10'),
(23, 4, 17, '2023-11-10'),
(24, 4, 17, '2023-11-10'),
(25, 3, 8, '2023-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `subcat_name`, `category_id`) VALUES
(1, ' KNITTED BAGS', 1),
(2, 'CROCHET BAGS', 1),
(3, 'CLOTH BAGS ', 1),
(4, 'LEATHER BAGS  ', 1),
(5, 'LEATHER POUCH   ', 2),
(6, 'KNITTED POUCH    ', 2),
(7, 'CROCHET POUCH     ', 2),
(8, 'CLOTH POUCH      ', 2),
(9, 'LEATHER WALLET       ', 3),
(15, 'DREAMCHATCHERS', 5),
(16, 'WALL HANGINGS ', 5),
(17, 'PAINTINGS  ', 5),
(18, 'OTHERS   ', 5),
(19, 'FUR CLOTH PLUSHIES ', 6),
(20, 'CROCHET PLUSHIES ', 6),
(21, 'KNITTED PLUSHIES  ', 6),
(22, 'PAPER MADE TOYS  ', 6),
(23, 'KNITTED ', 7),
(24, 'CROCHET', 7),
(25, 'RINGS', 8),
(26, 'EARRINGS ', 8),
(27, 'CHAINS', 8),
(28, 'BRACELETS', 8),
(29, 'KEYCHAINS', 8),
(37, ' CLOTH WALLET', 3),
(38, ' METAL WALLET  ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'MEN'),
(2, 'WOMEN'),
(3, 'UNISEX'),
(4, 'KIDS'),
(5, 'BOYS'),
(6, 'GIRLS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `product_id`, `customer_id`) VALUES
(128, 10, 50),
(129, 7, 50),
(130, 5, 50),
(131, 16, 6),
(132, 9, 6),
(133, 11, 4),
(134, 11, 5),
(135, 11, 51),
(136, 10, 4),
(137, 6, 4),
(138, 11, 54),
(139, 6, 54),
(140, 10, 2),
(142, 12, 2),
(143, 11, 2),
(144, 10, 5),
(145, 9, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_post_report`
--
ALTER TABLE `tbl_post_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_gallery`
--
ALTER TABLE `tbl_product_gallery`
  ADD PRIMARY KEY (`product_gallery_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_seller_bio`
--
ALTER TABLE `tbl_seller_bio`
  ADD PRIMARY KEY (`seller_bio_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_post_report`
--
ALTER TABLE `tbl_post_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product_gallery`
--
ALTER TABLE `tbl_product_gallery`
  MODIFY `product_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_seller_bio`
--
ALTER TABLE `tbl_seller_bio`
  MODIFY `seller_bio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
