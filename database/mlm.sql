-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 05:23 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `ac_type` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `ac_number` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `branch_name`, `ac_type`, `account_holder_name`, `ac_number`, `ifsc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'State Bank of India.', 'dabhoi', '1', 'new west', '8528858489859850', 'SBIN0011512', 1, '2021-05-10 18:22:07', '2021-05-10 18:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `binary_commision`
--

CREATE TABLE `binary_commision` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `payout_id` int(20) NOT NULL DEFAULT 0,
  `group_id` varchar(20) NOT NULL DEFAULT '0',
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `admin_charge` varchar(20) NOT NULL DEFAULT '0',
  `tds` varchar(20) NOT NULL DEFAULT '0',
  `payable_amount` varchar(20) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binary_commision`
--

INSERT INTO `binary_commision` (`id`, `member_id`, `payout_id`, `group_id`, `amount`, `admin_charge`, `tds`, `payable_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1', '200', '10', '10', '180', 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(2, 2, 1, '2', '200', '10', '10', '180', 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(3, 2, 1, '3', '200', '10', '10', '180', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(4, 3, 1, '4', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(5, 4, 1, '5', '200', '10', '10', '180', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(6, 4, 1, '6', '200', '10', '10', '180', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(7, 4, 1, '7', '200', '10', '10', '180', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(8, 6, 1, '8', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(9, 7, 1, '9', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(10, 10, 1, '10', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `parent_id` int(20) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 'Test', 1, '2021-05-07 13:20:48', '2021-05-07 13:20:48'),
(3, 0, 'Ayurveda', 1, '2021-05-21 11:08:26', '2021-05-21 11:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_state` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_state`) VALUES
(1, 'Kolhapur', 'Maharashtra'),
(2, 'Port Blair', 'Andaman & Nicobar Islands'),
(3, 'Adilabad', 'Andhra Pradesh'),
(4, 'Adoni', 'Andhra Pradesh'),
(5, 'Amadalavalasa', 'Andhra Pradesh'),
(6, 'Amalapuram', 'Andhra Pradesh'),
(7, 'Anakapalle', 'Andhra Pradesh'),
(8, 'Anantapur', 'Andhra Pradesh'),
(9, 'Badepalle', 'Andhra Pradesh'),
(10, 'Banganapalle', 'Andhra Pradesh'),
(11, 'Bapatla', 'Andhra Pradesh'),
(12, 'Bellampalle', 'Andhra Pradesh'),
(13, 'Bethamcherla', 'Andhra Pradesh'),
(14, 'Bhadrachalam', 'Andhra Pradesh'),
(15, 'Bhainsa', 'Andhra Pradesh'),
(16, 'Bheemunipatnam', 'Andhra Pradesh'),
(17, 'Bhimavaram', 'Andhra Pradesh'),
(18, 'Bhongir', 'Andhra Pradesh'),
(19, 'Bobbili', 'Andhra Pradesh'),
(20, 'Bodhan', 'Andhra Pradesh'),
(21, 'Chilakaluripet', 'Andhra Pradesh'),
(22, 'Chirala', 'Andhra Pradesh'),
(23, 'Chittoor', 'Andhra Pradesh'),
(24, 'Cuddapah', 'Andhra Pradesh'),
(25, 'Devarakonda', 'Andhra Pradesh'),
(26, 'Dharmavaram', 'Andhra Pradesh'),
(27, 'Eluru', 'Andhra Pradesh'),
(28, 'Farooqnagar', 'Andhra Pradesh'),
(29, 'Gadwal', 'Andhra Pradesh'),
(30, 'Gooty', 'Andhra Pradesh'),
(31, 'Gudivada', 'Andhra Pradesh'),
(32, 'Gudur', 'Andhra Pradesh'),
(33, 'Guntakal', 'Andhra Pradesh'),
(34, 'Guntur', 'Andhra Pradesh'),
(35, 'Hanuman Junction', 'Andhra Pradesh'),
(36, 'Hindupur', 'Andhra Pradesh'),
(37, 'Hyderabad', 'Andhra Pradesh'),
(38, 'Ichchapuram', 'Andhra Pradesh'),
(39, 'Jaggaiahpet', 'Andhra Pradesh'),
(40, 'Jagtial', 'Andhra Pradesh'),
(41, 'Jammalamadugu', 'Andhra Pradesh'),
(42, 'Jangaon', 'Andhra Pradesh'),
(43, 'Kadapa', 'Andhra Pradesh'),
(44, 'Kadiri', 'Andhra Pradesh'),
(45, 'Kagaznagar', 'Andhra Pradesh'),
(46, 'Kakinada', 'Andhra Pradesh'),
(47, 'Kalyandurg', 'Andhra Pradesh'),
(48, 'Kamareddy', 'Andhra Pradesh'),
(49, 'Kandukur', 'Andhra Pradesh'),
(50, 'Karimnagar', 'Andhra Pradesh'),
(51, 'Kavali', 'Andhra Pradesh'),
(52, 'Khammam', 'Andhra Pradesh'),
(53, 'Koratla', 'Andhra Pradesh'),
(54, 'Kothagudem', 'Andhra Pradesh'),
(55, 'Kothapeta', 'Andhra Pradesh'),
(56, 'Kovvur', 'Andhra Pradesh'),
(57, 'Kurnool', 'Andhra Pradesh'),
(58, 'Kyathampalle', 'Andhra Pradesh'),
(59, 'Macherla', 'Andhra Pradesh'),
(60, 'Machilipatnam', 'Andhra Pradesh'),
(61, 'Madanapalle', 'Andhra Pradesh'),
(62, 'Mahbubnagar', 'Andhra Pradesh'),
(63, 'Mancherial', 'Andhra Pradesh'),
(64, 'Mandamarri', 'Andhra Pradesh'),
(65, 'Mandapeta', 'Andhra Pradesh'),
(66, 'Manuguru', 'Andhra Pradesh'),
(67, 'Markapur', 'Andhra Pradesh'),
(68, 'Medak', 'Andhra Pradesh'),
(69, 'Miryalaguda', 'Andhra Pradesh'),
(70, 'Mogalthur', 'Andhra Pradesh'),
(71, 'Nagari', 'Andhra Pradesh'),
(72, 'Nagarkurnool', 'Andhra Pradesh'),
(73, 'Nandyal', 'Andhra Pradesh'),
(74, 'Narasapur', 'Andhra Pradesh'),
(75, 'Narasaraopet', 'Andhra Pradesh'),
(76, 'Narayanpet', 'Andhra Pradesh'),
(77, 'Narsipatnam', 'Andhra Pradesh'),
(78, 'Nellore', 'Andhra Pradesh'),
(79, 'Nidadavole', 'Andhra Pradesh'),
(80, 'Nirmal', 'Andhra Pradesh'),
(81, 'Nizamabad', 'Andhra Pradesh'),
(82, 'Nuzvid', 'Andhra Pradesh'),
(83, 'Ongole', 'Andhra Pradesh'),
(84, 'Palacole', 'Andhra Pradesh'),
(85, 'Palasa Kasibugga', 'Andhra Pradesh'),
(86, 'Palwancha', 'Andhra Pradesh'),
(87, 'Parvathipuram', 'Andhra Pradesh'),
(88, 'Pedana', 'Andhra Pradesh'),
(89, 'Peddapuram', 'Andhra Pradesh'),
(90, 'Pithapuram', 'Andhra Pradesh'),
(91, 'Pondur', 'Andhra pradesh'),
(92, 'Ponnur', 'Andhra Pradesh'),
(93, 'Proddatur', 'Andhra Pradesh'),
(94, 'Punganur', 'Andhra Pradesh'),
(95, 'Puttur', 'Andhra Pradesh'),
(96, 'Rajahmundry', 'Andhra Pradesh'),
(97, 'Rajam', 'Andhra Pradesh'),
(98, 'Ramachandrapuram', 'Andhra Pradesh'),
(99, 'Ramagundam', 'Andhra Pradesh'),
(100, 'Rayachoti', 'Andhra Pradesh'),
(101, 'Rayadurg', 'Andhra Pradesh'),
(102, 'Renigunta', 'Andhra Pradesh'),
(103, 'Repalle', 'Andhra Pradesh'),
(104, 'Sadasivpet', 'Andhra Pradesh'),
(105, 'Salur', 'Andhra Pradesh'),
(106, 'Samalkot', 'Andhra Pradesh'),
(107, 'Sangareddy', 'Andhra Pradesh'),
(108, 'Sattenapalle', 'Andhra Pradesh'),
(109, 'Siddipet', 'Andhra Pradesh'),
(110, 'Singapur', 'Andhra Pradesh'),
(111, 'Sircilla', 'Andhra Pradesh'),
(112, 'Srikakulam', 'Andhra Pradesh'),
(113, 'Srikalahasti', 'Andhra Pradesh'),
(115, 'Suryapet', 'Andhra Pradesh'),
(116, 'Tadepalligudem', 'Andhra Pradesh'),
(117, 'Tadpatri', 'Andhra Pradesh'),
(118, 'Tandur', 'Andhra Pradesh'),
(119, 'Tanuku', 'Andhra Pradesh'),
(120, 'Tenali', 'Andhra Pradesh'),
(121, 'Tirupati', 'Andhra Pradesh'),
(122, 'Tuni', 'Andhra Pradesh'),
(123, 'Uravakonda', 'Andhra Pradesh'),
(124, 'Venkatagiri', 'Andhra Pradesh'),
(125, 'Vicarabad', 'Andhra Pradesh'),
(126, 'Vijayawada', 'Andhra Pradesh'),
(127, 'Vinukonda', 'Andhra Pradesh'),
(128, 'Visakhapatnam', 'Andhra Pradesh'),
(129, 'Vizianagaram', 'Andhra Pradesh'),
(130, 'Wanaparthy', 'Andhra Pradesh'),
(131, 'Warangal', 'Andhra Pradesh'),
(132, 'Yellandu', 'Andhra Pradesh'),
(133, 'Yemmiganur', 'Andhra Pradesh'),
(134, 'Yerraguntla', 'Andhra Pradesh'),
(135, 'Zahirabad', 'Andhra Pradesh'),
(136, 'Rajampet', 'Andhra Pradesh'),
(137, 'Along', 'Arunachal Pradesh'),
(138, 'Bomdila', 'Arunachal Pradesh'),
(139, 'Itanagar', 'Arunachal Pradesh'),
(140, 'Naharlagun', 'Arunachal Pradesh'),
(141, 'Pasighat', 'Arunachal Pradesh'),
(142, 'Abhayapuri', 'Assam'),
(143, 'Amguri', 'Assam'),
(144, 'Anandnagaar', 'Assam'),
(145, 'Barpeta', 'Assam'),
(146, 'Barpeta Road', 'Assam'),
(147, 'Bilasipara', 'Assam'),
(148, 'Bongaigaon', 'Assam'),
(149, 'Dhekiajuli', 'Assam'),
(150, 'Dhubri', 'Assam'),
(151, 'Dibrugarh', 'Assam'),
(152, 'Digboi', 'Assam'),
(153, 'Diphu', 'Assam'),
(154, 'Dispur', 'Assam'),
(156, 'Gauripur', 'Assam'),
(157, 'Goalpara', 'Assam'),
(158, 'Golaghat', 'Assam'),
(159, 'Guwahati', 'Assam'),
(160, 'Haflong', 'Assam'),
(161, 'Hailakandi', 'Assam'),
(162, 'Hojai', 'Assam'),
(163, 'Jorhat', 'Assam'),
(164, 'Karimganj', 'Assam'),
(165, 'Kokrajhar', 'Assam'),
(166, 'Lanka', 'Assam'),
(167, 'Lumding', 'Assam'),
(168, 'Mangaldoi', 'Assam'),
(169, 'Mankachar', 'Assam'),
(170, 'Margherita', 'Assam'),
(171, 'Mariani', 'Assam'),
(172, 'Marigaon', 'Assam'),
(173, 'Nagaon', 'Assam'),
(174, 'Nalbari', 'Assam'),
(175, 'North Lakhimpur', 'Assam'),
(176, 'Rangia', 'Assam'),
(177, 'Sibsagar', 'Assam'),
(178, 'Silapathar', 'Assam'),
(179, 'Silchar', 'Assam'),
(180, 'Tezpur', 'Assam'),
(181, 'Tinsukia', 'Assam'),
(182, 'Amarpur', 'Bihar'),
(183, 'Araria', 'Bihar'),
(184, 'Areraj', 'Bihar'),
(185, 'Arrah', 'Bihar'),
(186, 'Asarganj', 'Bihar'),
(187, 'Aurangabad', 'Bihar'),
(188, 'Bagaha', 'Bihar'),
(189, 'Bahadurganj', 'Bihar'),
(190, 'Bairgania', 'Bihar'),
(191, 'Bakhtiarpur', 'Bihar'),
(192, 'Banka', 'Bihar'),
(193, 'Banmankhi Bazar', 'Bihar'),
(194, 'Barahiya', 'Bihar'),
(195, 'Barauli', 'Bihar'),
(196, 'Barbigha', 'Bihar'),
(197, 'Barh', 'Bihar'),
(198, 'Begusarai', 'Bihar'),
(199, 'Behea', 'Bihar'),
(200, 'Bettiah', 'Bihar'),
(201, 'Bhabua', 'Bihar'),
(202, 'Bhagalpur', 'Bihar'),
(203, 'Bihar Sharif', 'Bihar'),
(204, 'Bikramganj', 'Bihar'),
(205, 'Bodh Gaya', 'Bihar'),
(206, 'Buxar', 'Bihar'),
(207, 'Chandan Bara', 'Bihar'),
(208, 'Chanpatia', 'Bihar'),
(209, 'Chhapra', 'Bihar'),
(210, 'Colgong', 'Bihar'),
(211, 'Dalsinghsarai', 'Bihar'),
(212, 'Darbhanga', 'Bihar'),
(213, 'Daudnagar', 'Bihar'),
(214, 'Dehri-on-Sone', 'Bihar'),
(215, 'Dhaka', 'Bihar'),
(216, 'Dighwara', 'Bihar'),
(217, 'Dumraon', 'Bihar'),
(218, 'Fatwah', 'Bihar'),
(219, 'Forbesganj', 'Bihar'),
(220, 'Gaya', 'Bihar'),
(221, 'Gogri Jamalpur', 'Bihar'),
(222, 'Gopalganj', 'Bihar'),
(223, 'Hajipur', 'Bihar'),
(224, 'Hilsa', 'Bihar'),
(225, 'Hisua', 'Bihar'),
(226, 'Islampur', 'Bihar'),
(227, 'Jagdispur', 'Bihar'),
(228, 'Jamalpur', 'Bihar'),
(229, 'Jamui', 'Bihar'),
(230, 'Jehanabad', 'Bihar'),
(231, 'Jhajha', 'Bihar'),
(232, 'Jhanjharpur', 'Bihar'),
(233, 'Jogabani', 'Bihar'),
(234, 'Kanti', 'Bihar'),
(235, 'Katihar', 'Bihar'),
(236, 'Khagaria', 'Bihar'),
(237, 'Kharagpur', 'Bihar'),
(238, 'Kishanganj', 'Bihar'),
(239, 'Lakhisarai', 'Bihar'),
(240, 'Lalganj', 'Bihar'),
(241, 'Madhepura', 'Bihar'),
(242, 'Madhubani', 'Bihar'),
(243, 'Maharajganj', 'Bihar'),
(244, 'Mahnar Bazar', 'Bihar'),
(245, 'Makhdumpur', 'Bihar'),
(246, 'Maner', 'Bihar'),
(247, 'Manihari', 'Bihar'),
(248, 'Marhaura', 'Bihar'),
(249, 'Masaurhi', 'Bihar'),
(250, 'Mirganj', 'Bihar'),
(251, 'Mokameh', 'Bihar'),
(252, 'Motihari', 'Bihar'),
(253, 'Motipur', 'Bihar'),
(254, 'Munger', 'Bihar'),
(255, 'Murliganj', 'Bihar'),
(256, 'Muzaffarpur', 'Bihar'),
(257, 'Narkatiaganj', 'Bihar'),
(258, 'Naugachhia', 'Bihar'),
(259, 'Nawada', 'Bihar'),
(260, 'Nokha', 'Bihar'),
(261, 'Patna', 'Bihar'),
(262, 'Piro', 'Bihar'),
(263, 'Purnia', 'Bihar'),
(264, 'Rafiganj', 'Bihar'),
(265, 'Rajgir', 'Bihar'),
(266, 'Ramnagar', 'Bihar'),
(267, 'Raxaul Bazar', 'Bihar'),
(268, 'Revelganj', 'Bihar'),
(269, 'Rosera', 'Bihar'),
(270, 'Saharsa', 'Bihar'),
(271, 'Samastipur', 'Bihar'),
(272, 'Sasaram', 'Bihar'),
(273, 'Sheikhpura', 'Bihar'),
(274, 'Sheohar', 'Bihar'),
(275, 'Sherghati', 'Bihar'),
(276, 'Silao', 'Bihar'),
(277, 'Sitamarhi', 'Bihar'),
(278, 'Siwan', 'Bihar'),
(279, 'Sonepur', 'Bihar'),
(280, 'Sugauli', 'Bihar'),
(281, 'Sultanganj', 'Bihar'),
(282, 'Supaul', 'Bihar'),
(283, 'Warisaliganj', 'Bihar'),
(284, 'Ahiwara', 'Chhattisgarh'),
(285, 'Akaltara', 'Chhattisgarh'),
(286, 'Ambagarh Chowki', 'Chhattisgarh'),
(287, 'Ambikapur', 'Chhattisgarh'),
(288, 'Arang', 'Chhattisgarh'),
(289, 'Bade Bacheli', 'Chhattisgarh'),
(290, 'Balod', 'Chhattisgarh'),
(291, 'Baloda Bazar', 'Chhattisgarh'),
(292, 'Bemetra', 'Chhattisgarh'),
(293, 'Bhatapara', 'Chhattisgarh'),
(294, 'Bilaspur', 'Chhattisgarh'),
(295, 'Birgaon', 'Chhattisgarh'),
(296, 'Champa', 'Chhattisgarh'),
(297, 'Chirmiri', 'Chhattisgarh'),
(298, 'Dalli-Rajhara', 'Chhattisgarh'),
(299, 'Dhamtari', 'Chhattisgarh'),
(300, 'Dipka', 'Chhattisgarh'),
(301, 'Dongargarh', 'Chhattisgarh'),
(302, 'Durg-Bhilai Nagar', 'Chhattisgarh'),
(303, 'Gobranawapara', 'Chhattisgarh'),
(304, 'Jagdalpur', 'Chhattisgarh'),
(305, 'Janjgir', 'Chhattisgarh'),
(306, 'Jashpurnagar', 'Chhattisgarh'),
(307, 'Kanker', 'Chhattisgarh'),
(308, 'Kawardha', 'Chhattisgarh'),
(309, 'Kondagaon', 'Chhattisgarh'),
(310, 'Korba', 'Chhattisgarh'),
(311, 'Mahasamund', 'Chhattisgarh'),
(312, 'Mahendragarh', 'Chhattisgarh'),
(313, 'Mungeli', 'Chhattisgarh'),
(314, 'Naila Janjgir', 'Chhattisgarh'),
(315, 'Raigarh', 'Chhattisgarh'),
(316, 'Raipur', 'Chhattisgarh'),
(317, 'Rajnandgaon', 'Chhattisgarh'),
(318, 'Sakti', 'Chhattisgarh'),
(319, 'Tilda Newra', 'Chhattisgarh'),
(320, 'Amli', 'Dadra & Nagar Haveli'),
(321, 'Silvassa', 'Dadra & Nagar Haveli'),
(322, 'Daman and Diu', 'Daman & Diu'),
(323, 'Daman and Diu', 'Daman & Diu'),
(324, 'Asola', 'Delhi'),
(325, 'Delhi', 'Delhi'),
(326, 'Aldona', 'Goa'),
(327, 'Curchorem Cacora', 'Goa'),
(328, 'Madgaon', 'Goa'),
(329, 'Mapusa', 'Goa'),
(330, 'Margao', 'Goa'),
(331, 'Marmagao', 'Goa'),
(332, 'Panaji', 'Goa'),
(333, 'Ahmedabad', 'Gujarat'),
(334, 'Amreli', 'Gujarat'),
(335, 'Anand', 'Gujarat'),
(336, 'Ankleshwar', 'Gujarat'),
(337, 'Bharuch', 'Gujarat'),
(338, 'Bhavnagar', 'Gujarat'),
(339, 'Bhuj', 'Gujarat'),
(340, 'Cambay', 'Gujarat'),
(341, 'Dahod', 'Gujarat'),
(342, 'Deesa', 'Gujarat'),
(343, 'Dharampur', ' India'),
(344, 'Dholka', 'Gujarat'),
(345, 'Gandhinagar', 'Gujarat'),
(346, 'Godhra', 'Gujarat'),
(347, 'Himatnagar', 'Gujarat'),
(348, 'Idar', 'Gujarat'),
(349, 'Jamnagar', 'Gujarat'),
(350, 'Junagadh', 'Gujarat'),
(351, 'Kadi', 'Gujarat'),
(352, 'Kalavad', 'Gujarat'),
(353, 'Kalol', 'Gujarat'),
(354, 'Kapadvanj', 'Gujarat'),
(355, 'Karjan', 'Gujarat'),
(356, 'Keshod', 'Gujarat'),
(357, 'Khambhalia', 'Gujarat'),
(358, 'Khambhat', 'Gujarat'),
(359, 'Kheda', 'Gujarat'),
(360, 'Khedbrahma', 'Gujarat'),
(361, 'Kheralu', 'Gujarat'),
(362, 'Kodinar', 'Gujarat'),
(363, 'Lathi', 'Gujarat'),
(364, 'Limbdi', 'Gujarat'),
(365, 'Lunawada', 'Gujarat'),
(366, 'Mahesana', 'Gujarat'),
(367, 'Mahuva', 'Gujarat'),
(368, 'Manavadar', 'Gujarat'),
(369, 'Mandvi', 'Gujarat'),
(370, 'Mangrol', 'Gujarat'),
(371, 'Mansa', 'Gujarat'),
(372, 'Mehmedabad', 'Gujarat'),
(373, 'Modasa', 'Gujarat'),
(374, 'Morvi', 'Gujarat'),
(375, 'Nadiad', 'Gujarat'),
(376, 'Navsari', 'Gujarat'),
(377, 'Padra', 'Gujarat'),
(378, 'Palanpur', 'Gujarat'),
(379, 'Palitana', 'Gujarat'),
(380, 'Pardi', 'Gujarat'),
(381, 'Patan', 'Gujarat'),
(382, 'Petlad', 'Gujarat'),
(383, 'Porbandar', 'Gujarat'),
(384, 'Radhanpur', 'Gujarat'),
(385, 'Rajkot', 'Gujarat'),
(386, 'Rajpipla', 'Gujarat'),
(387, 'Rajula', 'Gujarat'),
(388, 'Ranavav', 'Gujarat'),
(389, 'Rapar', 'Gujarat'),
(390, 'Salaya', 'Gujarat'),
(391, 'Sanand', 'Gujarat'),
(392, 'Savarkundla', 'Gujarat'),
(393, 'Sidhpur', 'Gujarat'),
(394, 'Sihor', 'Gujarat'),
(395, 'Songadh', 'Gujarat'),
(396, 'Surat', 'Gujarat'),
(397, 'Talaja', 'Gujarat'),
(398, 'Thangadh', 'Gujarat'),
(399, 'Tharad', 'Gujarat'),
(400, 'Umbergaon', 'Gujarat'),
(401, 'Umreth', 'Gujarat'),
(402, 'Una', 'Gujarat'),
(403, 'Unjha', 'Gujarat'),
(404, 'Upleta', 'Gujarat'),
(405, 'Vadnagar', 'Gujarat'),
(406, 'Vadodara', 'Gujarat'),
(407, 'Valsad', 'Gujarat'),
(408, 'Vapi', 'Gujarat'),
(409, 'Vapi', 'Gujarat'),
(410, 'Veraval', 'Gujarat'),
(411, 'Vijapur', 'Gujarat'),
(412, 'Viramgam', 'Gujarat'),
(413, 'Visnagar', 'Gujarat'),
(414, 'Vyara', 'Gujarat'),
(415, 'Wadhwan', 'Gujarat'),
(416, 'Wankaner', 'Gujarat'),
(417, 'Adalaj', 'Gujrat'),
(418, 'Adityana', 'Gujrat'),
(419, 'Alang', 'Gujrat'),
(420, 'Ambaji', 'Gujrat'),
(421, 'Ambaliyasan', 'Gujrat'),
(422, 'Andada', 'Gujrat'),
(423, 'Anjar', 'Gujrat'),
(424, 'Anklav', 'Gujrat'),
(425, 'Antaliya', 'Gujrat'),
(426, 'Arambhada', 'Gujrat'),
(427, 'Atul', 'Gujrat'),
(428, 'Ballabhgarh', 'Hariyana'),
(429, 'Ambala', 'Haryana'),
(430, 'Ambala', 'Haryana'),
(431, 'Asankhurd', 'Haryana'),
(432, 'Assandh', 'Haryana'),
(433, 'Ateli', 'Haryana'),
(434, 'Babiyal', 'Haryana'),
(435, 'Bahadurgarh', 'Haryana'),
(436, 'Barwala', 'Haryana'),
(437, 'Bhiwani', 'Haryana'),
(438, 'Charkhi Dadri', 'Haryana'),
(439, 'Cheeka', 'Haryana'),
(440, 'Ellenabad 2', 'Haryana'),
(441, 'Faridabad', 'Haryana'),
(442, 'Fatehabad', 'Haryana'),
(443, 'Ganaur', 'Haryana'),
(444, 'Gharaunda', 'Haryana'),
(445, 'Gohana', 'Haryana'),
(446, 'Gurgaon', 'Haryana'),
(447, 'Haibat(Yamuna Nagar)', 'Haryana'),
(448, 'Hansi', 'Haryana'),
(449, 'Hisar', 'Haryana'),
(450, 'Hodal', 'Haryana'),
(451, 'Jhajjar', 'Haryana'),
(452, 'Jind', 'Haryana'),
(453, 'Kaithal', 'Haryana'),
(454, 'Kalan Wali', 'Haryana'),
(455, 'Kalka', 'Haryana'),
(456, 'Karnal', 'Haryana'),
(457, 'Ladwa', 'Haryana'),
(458, 'Mahendragarh', 'Haryana'),
(459, 'Mandi Dabwali', 'Haryana'),
(460, 'Narnaul', 'Haryana'),
(461, 'Narwana', 'Haryana'),
(462, 'Palwal', 'Haryana'),
(463, 'Panchkula', 'Haryana'),
(464, 'Panipat', 'Haryana'),
(465, 'Pehowa', 'Haryana'),
(466, 'Pinjore', 'Haryana'),
(467, 'Rania', 'Haryana'),
(468, 'Ratia', 'Haryana'),
(469, 'Rewari', 'Haryana'),
(470, 'Rohtak', 'Haryana'),
(471, 'Safidon', 'Haryana'),
(472, 'Samalkha', 'Haryana'),
(473, 'Shahbad', 'Haryana'),
(474, 'Sirsa', 'Haryana'),
(475, 'Sohna', 'Haryana'),
(476, 'Sonipat', 'Haryana'),
(477, 'Taraori', 'Haryana'),
(478, 'Thanesar', 'Haryana'),
(479, 'Tohana', 'Haryana'),
(480, 'Yamunanagar', 'Haryana'),
(481, 'Arki', 'Himachal Pradesh'),
(482, 'Baddi', 'Himachal Pradesh'),
(483, 'Bilaspur', 'Himachal Pradesh'),
(484, 'Chamba', 'Himachal Pradesh'),
(485, 'Dalhousie', 'Himachal Pradesh'),
(486, 'Dharamsala', 'Himachal Pradesh'),
(487, 'Hamirpur', 'Himachal Pradesh'),
(488, 'Mandi', 'Himachal Pradesh'),
(489, 'Nahan', 'Himachal Pradesh'),
(490, 'Shimla', 'Himachal Pradesh'),
(491, 'Solan', 'Himachal Pradesh'),
(492, 'Sundarnagar', 'Himachal Pradesh'),
(493, 'Jammu', 'Jammu & Kashmir'),
(494, 'Achabbal', 'Jammu & Kashmir'),
(495, 'Akhnoor', 'Jammu & Kashmir'),
(496, 'Anantnag', 'Jammu & Kashmir'),
(497, 'Arnia', 'Jammu & Kashmir'),
(498, 'Awantipora', 'Jammu & Kashmir'),
(499, 'Bandipore', 'Jammu & Kashmir'),
(500, 'Baramula', 'Jammu & Kashmir'),
(501, 'Kathua', 'Jammu & Kashmir'),
(502, 'Leh', 'Jammu & Kashmir'),
(503, 'Punch', 'Jammu & Kashmir'),
(504, 'Rajauri', 'Jammu & Kashmir'),
(505, 'Sopore', 'Jammu & Kashmir'),
(506, 'Srinagar', 'Jammu & Kashmir'),
(507, 'Udhampur', 'Jammu & Kashmir'),
(508, 'Amlabad', 'Jharkhand'),
(509, 'Ara', 'Jharkhand'),
(510, 'Barughutu', 'Jharkhand'),
(511, 'Bokaro Steel City', 'Jharkhand'),
(512, 'Chaibasa', 'Jharkhand'),
(513, 'Chakradharpur', 'Jharkhand'),
(514, 'Chandrapura', 'Jharkhand'),
(515, 'Chatra', 'Jharkhand'),
(516, 'Chirkunda', 'Jharkhand'),
(517, 'Churi', 'Jharkhand'),
(518, 'Daltonganj', 'Jharkhand'),
(519, 'Deoghar', 'Jharkhand'),
(520, 'Dhanbad', 'Jharkhand'),
(521, 'Dumka', 'Jharkhand'),
(522, 'Garhwa', 'Jharkhand'),
(523, 'Ghatshila', 'Jharkhand'),
(524, 'Giridih', 'Jharkhand'),
(525, 'Godda', 'Jharkhand'),
(526, 'Gomoh', 'Jharkhand'),
(527, 'Gumia', 'Jharkhand'),
(528, 'Gumla', 'Jharkhand'),
(529, 'Hazaribag', 'Jharkhand'),
(530, 'Hussainabad', 'Jharkhand'),
(531, 'Jamshedpur', 'Jharkhand'),
(532, 'Jamtara', 'Jharkhand'),
(533, 'Jhumri Tilaiya', 'Jharkhand'),
(534, 'Khunti', 'Jharkhand'),
(535, 'Lohardaga', 'Jharkhand'),
(536, 'Madhupur', 'Jharkhand'),
(537, 'Mihijam', 'Jharkhand'),
(538, 'Musabani', 'Jharkhand'),
(539, 'Pakaur', 'Jharkhand'),
(540, 'Patratu', 'Jharkhand'),
(541, 'Phusro', 'Jharkhand'),
(542, 'Ramngarh', 'Jharkhand'),
(543, 'Ranchi', 'Jharkhand'),
(544, 'Sahibganj', 'Jharkhand'),
(545, 'Saunda', 'Jharkhand'),
(546, 'Simdega', 'Jharkhand'),
(547, 'Tenu Dam-cum- Kathhara', 'Jharkhand'),
(548, 'Arasikere', 'Karnataka'),
(549, 'Bangalore', 'Karnataka'),
(550, 'Belgaum', 'Karnataka'),
(551, 'Bellary', 'Karnataka'),
(552, 'Chamrajnagar', 'Karnataka'),
(553, 'Chikkaballapur', 'Karnataka'),
(554, 'Chintamani', 'Karnataka'),
(555, 'Chitradurga', 'Karnataka'),
(556, 'Gulbarga', 'Karnataka'),
(557, 'Gundlupet', 'Karnataka'),
(558, 'Hassan', 'Karnataka'),
(559, 'Hospet', 'Karnataka'),
(560, 'Hubli', 'Karnataka'),
(561, 'Karkala', 'Karnataka'),
(562, 'Karwar', 'Karnataka'),
(563, 'Kolar', 'Karnataka'),
(564, 'Kota', 'Karnataka'),
(565, 'Lakshmeshwar', 'Karnataka'),
(566, 'Lingsugur', 'Karnataka'),
(567, 'Maddur', 'Karnataka'),
(568, 'Madhugiri', 'Karnataka'),
(569, 'Madikeri', 'Karnataka'),
(570, 'Magadi', 'Karnataka'),
(571, 'Mahalingpur', 'Karnataka'),
(572, 'Malavalli', 'Karnataka'),
(573, 'Malur', 'Karnataka'),
(574, 'Mandya', 'Karnataka'),
(575, 'Mangalore', 'Karnataka'),
(576, 'Manvi', 'Karnataka'),
(577, 'Mudalgi', 'Karnataka'),
(578, 'Mudbidri', 'Karnataka'),
(579, 'Muddebihal', 'Karnataka'),
(580, 'Mudhol', 'Karnataka'),
(581, 'Mulbagal', 'Karnataka'),
(582, 'Mundargi', 'Karnataka'),
(583, 'Mysore', 'Karnataka'),
(584, 'Nanjangud', 'Karnataka'),
(585, 'Pavagada', 'Karnataka'),
(586, 'Puttur', 'Karnataka'),
(587, 'Rabkavi Banhatti', 'Karnataka'),
(588, 'Raichur', 'Karnataka'),
(589, 'Ramanagaram', 'Karnataka'),
(590, 'Ramdurg', 'Karnataka'),
(591, 'Ranibennur', 'Karnataka'),
(592, 'Robertson Pet', 'Karnataka'),
(593, 'Ron', 'Karnataka'),
(594, 'Sadalgi', 'Karnataka'),
(595, 'Sagar', 'Karnataka'),
(596, 'Sakleshpur', 'Karnataka'),
(597, 'Sandur', 'Karnataka'),
(598, 'Sankeshwar', 'Karnataka'),
(599, 'Saundatti-Yellamma', 'Karnataka'),
(600, 'Savanur', 'Karnataka'),
(601, 'Sedam', 'Karnataka'),
(602, 'Shahabad', 'Karnataka'),
(603, 'Shahpur', 'Karnataka'),
(604, 'Shiggaon', 'Karnataka'),
(605, 'Shikapur', 'Karnataka'),
(606, 'Shimoga', 'Karnataka'),
(607, 'Shorapur', 'Karnataka'),
(608, 'Shrirangapattana', 'Karnataka'),
(609, 'Sidlaghatta', 'Karnataka'),
(610, 'Sindgi', 'Karnataka'),
(611, 'Sindhnur', 'Karnataka'),
(612, 'Sira', 'Karnataka'),
(613, 'Sirsi', 'Karnataka'),
(614, 'Siruguppa', 'Karnataka'),
(615, 'Srinivaspur', 'Karnataka'),
(616, 'Talikota', 'Karnataka'),
(617, 'Tarikere', 'Karnataka'),
(618, 'Tekkalakota', 'Karnataka'),
(619, 'Terdal', 'Karnataka'),
(620, 'Tiptur', 'Karnataka'),
(621, 'Tumkur', 'Karnataka'),
(622, 'Udupi', 'Karnataka'),
(623, 'Vijayapura', 'Karnataka'),
(624, 'Wadi', 'Karnataka'),
(625, 'Yadgir', 'Karnataka'),
(626, 'Adoor', 'Kerala'),
(627, 'Akathiyoor', 'Kerala'),
(628, 'Alappuzha', 'Kerala'),
(629, 'Ancharakandy', 'Kerala'),
(630, 'Aroor', 'Kerala'),
(631, 'Ashtamichira', 'Kerala'),
(632, 'Attingal', 'Kerala'),
(633, 'Avinissery', 'Kerala'),
(634, 'Chalakudy', 'Kerala'),
(635, 'Changanassery', 'Kerala'),
(636, 'Chendamangalam', 'Kerala'),
(637, 'Chengannur', 'Kerala'),
(638, 'Cherthala', 'Kerala'),
(639, 'Cheruthazham', 'Kerala'),
(640, 'Chittur-Thathamangalam', 'Kerala'),
(641, 'Chockli', 'Kerala'),
(642, 'Erattupetta', 'Kerala'),
(643, 'Guruvayoor', 'Kerala'),
(644, 'Irinjalakuda', 'Kerala'),
(645, 'Kadirur', 'Kerala'),
(646, 'Kalliasseri', 'Kerala'),
(647, 'Kalpetta', 'Kerala'),
(648, 'Kanhangad', 'Kerala'),
(649, 'Kanjikkuzhi', 'Kerala'),
(650, 'Kannur', 'Kerala'),
(651, 'Kasaragod', 'Kerala'),
(652, 'Kayamkulam', 'Kerala'),
(653, 'Kochi', 'Kerala'),
(654, 'Kodungallur', 'Kerala'),
(655, 'Kollam', 'Kerala'),
(656, 'Koothuparamba', 'Kerala'),
(657, 'Kothamangalam', 'Kerala'),
(658, 'Kottayam', 'Kerala'),
(659, 'Kozhikode', 'Kerala'),
(660, 'Kunnamkulam', 'Kerala'),
(661, 'Malappuram', 'Kerala'),
(662, 'Mattannur', 'Kerala'),
(663, 'Mavelikkara', 'Kerala'),
(664, 'Mavoor', 'Kerala'),
(665, 'Muvattupuzha', 'Kerala'),
(666, 'Nedumangad', 'Kerala'),
(667, 'Neyyattinkara', 'Kerala'),
(668, 'Ottappalam', 'Kerala'),
(669, 'Palai', 'Kerala'),
(670, 'Palakkad', 'Kerala'),
(671, 'Panniyannur', 'Kerala'),
(672, 'Pappinisseri', 'Kerala'),
(673, 'Paravoor', 'Kerala'),
(674, 'Pathanamthitta', 'Kerala'),
(675, 'Payyannur', 'Kerala'),
(676, 'Peringathur', 'Kerala'),
(677, 'Perinthalmanna', 'Kerala'),
(678, 'Perumbavoor', 'Kerala'),
(679, 'Ponnani', 'Kerala'),
(680, 'Punalur', 'Kerala'),
(681, 'Quilandy', 'Kerala'),
(682, 'Shoranur', 'Kerala'),
(683, 'Taliparamba', 'Kerala'),
(684, 'Thiruvalla', 'Kerala'),
(685, 'Thiruvananthapuram', 'Kerala'),
(686, 'Thodupuzha', 'Kerala'),
(687, 'Thrissur', 'Kerala'),
(688, 'Tirur', 'Kerala'),
(689, 'Vadakara', 'Kerala'),
(690, 'Vaikom', 'Kerala'),
(691, 'Varkala', 'Kerala'),
(692, 'Kavaratti', 'Lakshadweep'),
(693, 'Ashok Nagar', 'Madhya Pradesh'),
(694, 'Balaghat', 'Madhya Pradesh'),
(695, 'Betul', 'Madhya Pradesh'),
(696, 'Bhopal', 'Madhya Pradesh'),
(697, 'Burhanpur', 'Madhya Pradesh'),
(698, 'Chhatarpur', 'Madhya Pradesh'),
(699, 'Dabra', 'Madhya Pradesh'),
(700, 'Datia', 'Madhya Pradesh'),
(701, 'Dewas', 'Madhya Pradesh'),
(702, 'Dhar', 'Madhya Pradesh'),
(703, 'Fatehabad', 'Madhya Pradesh'),
(704, 'Gwalior', 'Madhya Pradesh'),
(705, 'Indore', 'Madhya Pradesh'),
(706, 'Itarsi', 'Madhya Pradesh'),
(707, 'Jabalpur', 'Madhya Pradesh'),
(708, 'Katni', 'Madhya Pradesh'),
(709, 'Kotma', 'Madhya Pradesh'),
(710, 'Lahar', 'Madhya Pradesh'),
(711, 'Lundi', 'Madhya Pradesh'),
(712, 'Maharajpur', 'Madhya Pradesh'),
(713, 'Mahidpur', 'Madhya Pradesh'),
(714, 'Maihar', 'Madhya Pradesh'),
(715, 'Malajkhand', 'Madhya Pradesh'),
(716, 'Manasa', 'Madhya Pradesh'),
(717, 'Manawar', 'Madhya Pradesh'),
(718, 'Mandideep', 'Madhya Pradesh'),
(719, 'Mandla', 'Madhya Pradesh'),
(720, 'Mandsaur', 'Madhya Pradesh'),
(721, 'Mauganj', 'Madhya Pradesh'),
(722, 'Mhow Cantonment', 'Madhya Pradesh'),
(723, 'Mhowgaon', 'Madhya Pradesh'),
(724, 'Morena', 'Madhya Pradesh'),
(725, 'Multai', 'Madhya Pradesh'),
(726, 'Murwara', 'Madhya Pradesh'),
(727, 'Nagda', 'Madhya Pradesh'),
(728, 'Nainpur', 'Madhya Pradesh'),
(729, 'Narsinghgarh', 'Madhya Pradesh'),
(730, 'Narsinghgarh', 'Madhya Pradesh'),
(731, 'Neemuch', 'Madhya Pradesh'),
(732, 'Nepanagar', 'Madhya Pradesh'),
(733, 'Niwari', 'Madhya Pradesh'),
(734, 'Nowgong', 'Madhya Pradesh'),
(735, 'Nowrozabad', 'Madhya Pradesh'),
(736, 'Pachore', 'Madhya Pradesh'),
(737, 'Pali', 'Madhya Pradesh'),
(738, 'Panagar', 'Madhya Pradesh'),
(739, 'Pandhurna', 'Madhya Pradesh'),
(740, 'Panna', 'Madhya Pradesh'),
(741, 'Pasan', 'Madhya Pradesh'),
(742, 'Pipariya', 'Madhya Pradesh'),
(743, 'Pithampur', 'Madhya Pradesh'),
(744, 'Porsa', 'Madhya Pradesh'),
(745, 'Prithvipur', 'Madhya Pradesh'),
(746, 'Raghogarh-Vijaypur', 'Madhya Pradesh'),
(747, 'Rahatgarh', 'Madhya Pradesh'),
(748, 'Raisen', 'Madhya Pradesh'),
(749, 'Rajgarh', 'Madhya Pradesh'),
(750, 'Ratlam', 'Madhya Pradesh'),
(751, 'Rau', 'Madhya Pradesh'),
(752, 'Rehli', 'Madhya Pradesh'),
(753, 'Rewa', 'Madhya Pradesh'),
(754, 'Sabalgarh', 'Madhya Pradesh'),
(755, 'Sagar', 'Madhya Pradesh'),
(756, 'Sanawad', 'Madhya Pradesh'),
(757, 'Sarangpur', 'Madhya Pradesh'),
(758, 'Sarni', 'Madhya Pradesh'),
(759, 'Satna', 'Madhya Pradesh'),
(760, 'Sausar', 'Madhya Pradesh'),
(761, 'Sehore', 'Madhya Pradesh'),
(762, 'Sendhwa', 'Madhya Pradesh'),
(763, 'Seoni', 'Madhya Pradesh'),
(764, 'Seoni-Malwa', 'Madhya Pradesh'),
(765, 'Shahdol', 'Madhya Pradesh'),
(766, 'Shajapur', 'Madhya Pradesh'),
(767, 'Shamgarh', 'Madhya Pradesh'),
(768, 'Sheopur', 'Madhya Pradesh'),
(769, 'Shivpuri', 'Madhya Pradesh'),
(770, 'Shujalpur', 'Madhya Pradesh'),
(771, 'Sidhi', 'Madhya Pradesh'),
(772, 'Sihora', 'Madhya Pradesh'),
(773, 'Singrauli', 'Madhya Pradesh'),
(774, 'Sironj', 'Madhya Pradesh'),
(775, 'Sohagpur', 'Madhya Pradesh'),
(776, 'Tarana', 'Madhya Pradesh'),
(777, 'Tikamgarh', 'Madhya Pradesh'),
(778, 'Ujhani', 'Madhya Pradesh'),
(779, 'Ujjain', 'Madhya Pradesh'),
(780, 'Umaria', 'Madhya Pradesh'),
(781, 'Vidisha', 'Madhya Pradesh'),
(782, 'Wara Seoni', 'Madhya Pradesh'),
(783, 'Ahmednagar', 'Maharashtra'),
(784, 'Akola', 'Maharashtra'),
(785, 'Amravati', 'Maharashtra'),
(786, 'Aurangabad', 'Maharashtra'),
(787, 'Baramati', 'Maharashtra'),
(788, 'Chalisgaon', 'Maharashtra'),
(789, 'Chinchani', 'Maharashtra'),
(790, 'Devgarh', 'Maharashtra'),
(791, 'Dhule', 'Maharashtra'),
(792, 'Dombivli', 'Maharashtra'),
(793, 'Durgapur', 'Maharashtra'),
(794, 'Ichalkaranji', 'Maharashtra'),
(795, 'Jalna', 'Maharashtra'),
(796, 'Kalyan', 'Maharashtra'),
(797, 'Latur', 'Maharashtra'),
(798, 'Loha', 'Maharashtra'),
(799, 'Lonar', 'Maharashtra'),
(800, 'Lonavla', 'Maharashtra'),
(801, 'Mahad', 'Maharashtra'),
(802, 'Mahuli', 'Maharashtra'),
(803, 'Malegaon', 'Maharashtra'),
(804, 'Malkapur', 'Maharashtra'),
(805, 'Manchar', 'Maharashtra'),
(806, 'Mangalvedhe', 'Maharashtra'),
(807, 'Mangrulpir', 'Maharashtra'),
(808, 'Manjlegaon', 'Maharashtra'),
(809, 'Manmad', 'Maharashtra'),
(810, 'Manwath', 'Maharashtra'),
(811, 'Mehkar', 'Maharashtra'),
(812, 'Mhaswad', 'Maharashtra'),
(813, 'Miraj', 'Maharashtra'),
(814, 'Morshi', 'Maharashtra'),
(815, 'Mukhed', 'Maharashtra'),
(816, 'Mul', 'Maharashtra'),
(817, 'Mumbai', 'Maharashtra'),
(818, 'Murtijapur', 'Maharashtra'),
(819, 'Nagpur', 'Maharashtra'),
(820, 'Nalasopara', 'Maharashtra'),
(821, 'Nanded-Waghala', 'Maharashtra'),
(822, 'Nandgaon', 'Maharashtra'),
(823, 'Nandura', 'Maharashtra'),
(824, 'Nandurbar', 'Maharashtra'),
(825, 'Narkhed', 'Maharashtra'),
(826, 'Nashik', 'Maharashtra'),
(827, 'Navi Mumbai', 'Maharashtra'),
(828, 'Nawapur', 'Maharashtra'),
(829, 'Nilanga', 'Maharashtra'),
(830, 'Osmanabad', 'Maharashtra'),
(831, 'Ozar', 'Maharashtra'),
(832, 'Pachora', 'Maharashtra'),
(833, 'Paithan', 'Maharashtra'),
(834, 'Palghar', 'Maharashtra'),
(835, 'Pandharkaoda', 'Maharashtra'),
(836, 'Pandharpur', 'Maharashtra'),
(837, 'Panvel', 'Maharashtra'),
(838, 'Parbhani', 'Maharashtra'),
(839, 'Parli', 'Maharashtra'),
(840, 'Parola', 'Maharashtra'),
(841, 'Partur', 'Maharashtra'),
(842, 'Pathardi', 'Maharashtra'),
(843, 'Pathri', 'Maharashtra'),
(844, 'Patur', 'Maharashtra'),
(845, 'Pauni', 'Maharashtra'),
(846, 'Pen', 'Maharashtra'),
(847, 'Phaltan', 'Maharashtra'),
(848, 'Pulgaon', 'Maharashtra'),
(849, 'Pune', 'Maharashtra'),
(850, 'Purna', 'Maharashtra'),
(851, 'Pusad', 'Maharashtra'),
(852, 'Rahuri', 'Maharashtra'),
(853, 'Rajura', 'Maharashtra'),
(854, 'Ramtek', 'Maharashtra'),
(855, 'Ratnagiri', 'Maharashtra'),
(856, 'Raver', 'Maharashtra'),
(857, 'Risod', 'Maharashtra'),
(858, 'Sailu', 'Maharashtra'),
(859, 'Sangamner', 'Maharashtra'),
(860, 'Sangli', 'Maharashtra'),
(861, 'Sangole', 'Maharashtra'),
(862, 'Sasvad', 'Maharashtra'),
(863, 'Satana', 'Maharashtra'),
(864, 'Satara', 'Maharashtra'),
(865, 'Savner', 'Maharashtra'),
(866, 'Sawantwadi', 'Maharashtra'),
(867, 'Shahade', 'Maharashtra'),
(868, 'Shegaon', 'Maharashtra'),
(869, 'Shendurjana', 'Maharashtra'),
(870, 'Shirdi', 'Maharashtra'),
(871, 'Shirpur-Warwade', 'Maharashtra'),
(872, 'Shirur', 'Maharashtra'),
(873, 'Shrigonda', 'Maharashtra'),
(874, 'Shrirampur', 'Maharashtra'),
(875, 'Sillod', 'Maharashtra'),
(876, 'Sinnar', 'Maharashtra'),
(877, 'Solapur', 'Maharashtra'),
(878, 'Soyagaon', 'Maharashtra'),
(879, 'Talegaon Dabhade', 'Maharashtra'),
(880, 'Talode', 'Maharashtra'),
(881, 'Tasgaon', 'Maharashtra'),
(882, 'Tirora', 'Maharashtra'),
(883, 'Tuljapur', 'Maharashtra'),
(884, 'Tumsar', 'Maharashtra'),
(885, 'Uran', 'Maharashtra'),
(886, 'Uran Islampur', 'Maharashtra'),
(887, 'Wadgaon Road', 'Maharashtra'),
(888, 'Wai', 'Maharashtra'),
(889, 'Wani', 'Maharashtra'),
(890, 'Wardha', 'Maharashtra'),
(891, 'Warora', 'Maharashtra'),
(892, 'Warud', 'Maharashtra'),
(893, 'Washim', 'Maharashtra'),
(894, 'Yevla', 'Maharashtra'),
(895, 'Uchgaon', 'Maharashtra'),
(896, 'Udgir', 'Maharashtra'),
(897, 'Umarga', 'Maharastra'),
(898, 'Umarkhed', 'Maharastra'),
(899, 'Umred', 'Maharastra'),
(900, 'Vadgaon Kasba', 'Maharastra'),
(901, 'Vaijapur', 'Maharastra'),
(902, 'Vasai', 'Maharastra'),
(903, 'Virar', 'Maharastra'),
(904, 'Vita', 'Maharastra'),
(905, 'Yavatmal', 'Maharastra'),
(906, 'Yawal', 'Maharastra'),
(907, 'Imphal', 'Manipur'),
(908, 'Kakching', 'Manipur'),
(909, 'Lilong', 'Manipur'),
(910, 'Mayang Imphal', 'Manipur'),
(911, 'Thoubal', 'Manipur'),
(912, 'Jowai', 'Meghalaya'),
(913, 'Nongstoin', 'Meghalaya'),
(914, 'Shillong', 'Meghalaya'),
(915, 'Tura', 'Meghalaya'),
(916, 'Aizawl', 'Mizoram'),
(917, 'Champhai', 'Mizoram'),
(918, 'Lunglei', 'Mizoram'),
(919, 'Saiha', 'Mizoram'),
(920, 'Dimapur', 'Nagaland'),
(921, 'Kohima', 'Nagaland'),
(922, 'Mokokchung', 'Nagaland'),
(923, 'Tuensang', 'Nagaland'),
(924, 'Wokha', 'Nagaland'),
(925, 'Zunheboto', 'Nagaland'),
(950, 'Anandapur', 'Orissa'),
(951, 'Anugul', 'Orissa'),
(952, 'Asika', 'Orissa'),
(953, 'Balangir', 'Orissa'),
(954, 'Balasore', 'Orissa'),
(955, 'Baleshwar', 'Orissa'),
(956, 'Bamra', 'Orissa'),
(957, 'Barbil', 'Orissa'),
(958, 'Bargarh', 'Orissa'),
(959, 'Bargarh', 'Orissa'),
(960, 'Baripada', 'Orissa'),
(961, 'Basudebpur', 'Orissa'),
(962, 'Belpahar', 'Orissa'),
(963, 'Bhadrak', 'Orissa'),
(964, 'Bhawanipatna', 'Orissa'),
(965, 'Bhuban', 'Orissa'),
(966, 'Bhubaneswar', 'Orissa'),
(967, 'Biramitrapur', 'Orissa'),
(968, 'Brahmapur', 'Orissa'),
(969, 'Brajrajnagar', 'Orissa'),
(970, 'Byasanagar', 'Orissa'),
(971, 'Cuttack', 'Orissa'),
(972, 'Debagarh', 'Orissa'),
(973, 'Dhenkanal', 'Orissa'),
(974, 'Gunupur', 'Orissa'),
(975, 'Hinjilicut', 'Orissa'),
(976, 'Jagatsinghapur', 'Orissa'),
(977, 'Jajapur', 'Orissa'),
(978, 'Jaleswar', 'Orissa'),
(979, 'Jatani', 'Orissa'),
(980, 'Jeypur', 'Orissa'),
(981, 'Jharsuguda', 'Orissa'),
(982, 'Joda', 'Orissa'),
(983, 'Kantabanji', 'Orissa'),
(984, 'Karanjia', 'Orissa'),
(985, 'Kendrapara', 'Orissa'),
(986, 'Kendujhar', 'Orissa'),
(987, 'Khordha', 'Orissa'),
(988, 'Koraput', 'Orissa'),
(989, 'Malkangiri', 'Orissa'),
(990, 'Nabarangapur', 'Orissa'),
(991, 'Paradip', 'Orissa'),
(992, 'Parlakhemundi', 'Orissa'),
(993, 'Pattamundai', 'Orissa'),
(994, 'Phulabani', 'Orissa'),
(995, 'Puri', 'Orissa'),
(996, 'Rairangpur', 'Orissa'),
(997, 'Rajagangapur', 'Orissa'),
(998, 'Raurkela', 'Orissa'),
(999, 'Rayagada', 'Orissa'),
(1000, 'Sambalpur', 'Orissa'),
(1001, 'Soro', 'Orissa'),
(1002, 'Sunabeda', 'Orissa'),
(1003, 'Sundargarh', 'Orissa'),
(1004, 'Talcher', 'Orissa'),
(1005, 'Titlagarh', 'Orissa'),
(1006, 'Umarkote', 'Orissa'),
(1007, 'Karaikal', 'Pondicherry'),
(1008, 'Mahe', 'Pondicherry'),
(1009, 'Pondicherry', 'Pondicherry'),
(1010, 'Yanam', 'Pondicherry'),
(1011, 'Ahmedgarh', 'Punjab'),
(1012, 'Amritsar', 'Punjab'),
(1013, 'Barnala', 'Punjab'),
(1014, 'Batala', 'Punjab'),
(1015, 'Bathinda', 'Punjab'),
(1016, 'Bhagha Purana', 'Punjab'),
(1017, 'Budhlada', 'Punjab'),
(1018, 'Chandigarh', 'Punjab'),
(1019, 'Dasua', 'Punjab'),
(1020, 'Dhuri', 'Punjab'),
(1021, 'Dinanagar', 'Punjab'),
(1022, 'Faridkot', 'Punjab'),
(1023, 'Fazilka', 'Punjab'),
(1024, 'Firozpur', 'Punjab'),
(1025, 'Firozpur Cantt.', 'Punjab'),
(1026, 'Giddarbaha', 'Punjab'),
(1027, 'Gobindgarh', 'Punjab'),
(1028, 'Gurdaspur', 'Punjab'),
(1029, 'Hoshiarpur', 'Punjab'),
(1030, 'Jagraon', 'Punjab'),
(1031, 'Jaitu', 'Punjab'),
(1032, 'Jalalabad', 'Punjab'),
(1033, 'Jalandhar', 'Punjab'),
(1034, 'Jalandhar Cantt.', 'Punjab'),
(1035, 'Jandiala', 'Punjab'),
(1036, 'Kapurthala', 'Punjab'),
(1037, 'Karoran', 'Punjab'),
(1038, 'Kartarpur', 'Punjab'),
(1039, 'Khanna', 'Punjab'),
(1040, 'Kharar', 'Punjab'),
(1041, 'Kot Kapura', 'Punjab'),
(1042, 'Kurali', 'Punjab'),
(1043, 'Longowal', 'Punjab'),
(1044, 'Ludhiana', 'Punjab'),
(1045, 'Malerkotla', 'Punjab'),
(1046, 'Malout', 'Punjab'),
(1047, 'Mansa', 'Punjab'),
(1048, 'Maur', 'Punjab'),
(1049, 'Moga', 'Punjab'),
(1050, 'Mohali', 'Punjab'),
(1051, 'Morinda', 'Punjab'),
(1052, 'Mukerian', 'Punjab'),
(1053, 'Muktsar', 'Punjab'),
(1054, 'Nabha', 'Punjab'),
(1055, 'Nakodar', 'Punjab'),
(1056, 'Nangal', 'Punjab'),
(1057, 'Nawanshahr', 'Punjab'),
(1058, 'Pathankot', 'Punjab'),
(1059, 'Patiala', 'Punjab'),
(1060, 'Patran', 'Punjab'),
(1061, 'Patti', 'Punjab'),
(1062, 'Phagwara', 'Punjab'),
(1063, 'Phillaur', 'Punjab'),
(1064, 'Qadian', 'Punjab'),
(1065, 'Raikot', 'Punjab'),
(1066, 'Rajpura', 'Punjab'),
(1067, 'Rampura Phul', 'Punjab'),
(1068, 'Rupnagar', 'Punjab'),
(1069, 'Samana', 'Punjab'),
(1070, 'Sangrur', 'Punjab'),
(1071, 'Sirhind Fatehgarh Sahib', 'Punjab'),
(1072, 'Sujanpur', 'Punjab'),
(1073, 'Sunam', 'Punjab'),
(1074, 'Talwara', 'Punjab'),
(1075, 'Tarn Taran', 'Punjab'),
(1076, 'Urmar Tanda', 'Punjab'),
(1077, 'Zira', 'Punjab'),
(1078, 'Zirakpur', 'Punjab'),
(1079, 'Bali', 'Rajasthan'),
(1080, 'Banswara', 'Rajastan'),
(1081, 'Ajmer', 'Rajasthan'),
(1082, 'Alwar', 'Rajasthan'),
(1083, 'Bandikui', 'Rajasthan'),
(1084, 'Baran', 'Rajasthan'),
(1085, 'Barmer', 'Rajasthan'),
(1086, 'Bikaner', 'Rajasthan'),
(1087, 'Fatehpur', 'Rajasthan'),
(1088, 'Jaipur', 'Rajasthan'),
(1089, 'Jaisalmer', 'Rajasthan'),
(1090, 'Jodhpur', 'Rajasthan'),
(1091, 'Kota', 'Rajasthan'),
(1092, 'Lachhmangarh', 'Rajasthan'),
(1093, 'Ladnu', 'Rajasthan'),
(1094, 'Lakheri', 'Rajasthan'),
(1095, 'Lalsot', 'Rajasthan'),
(1096, 'Losal', 'Rajasthan'),
(1097, 'Makrana', 'Rajasthan'),
(1098, 'Malpura', 'Rajasthan'),
(1099, 'Mandalgarh', 'Rajasthan'),
(1100, 'Mandawa', 'Rajasthan'),
(1101, 'Mangrol', 'Rajasthan'),
(1102, 'Merta City', 'Rajasthan'),
(1103, 'Mount Abu', 'Rajasthan'),
(1104, 'Nadbai', 'Rajasthan'),
(1105, 'Nagar', 'Rajasthan'),
(1106, 'Nagaur', 'Rajasthan'),
(1107, 'Nargund', 'Rajasthan'),
(1108, 'Nasirabad', 'Rajasthan'),
(1109, 'Nathdwara', 'Rajasthan'),
(1110, 'Navalgund', 'Rajasthan'),
(1111, 'Nawalgarh', 'Rajasthan'),
(1112, 'Neem-Ka-Thana', 'Rajasthan'),
(1113, 'Nelamangala', 'Rajasthan'),
(1114, 'Nimbahera', 'Rajasthan'),
(1115, 'Nipani', 'Rajasthan'),
(1116, 'Niwai', 'Rajasthan'),
(1117, 'Nohar', 'Rajasthan'),
(1118, 'Nokha', 'Rajasthan'),
(1119, 'Pali', 'Rajasthan'),
(1120, 'Phalodi', 'Rajasthan'),
(1121, 'Phulera', 'Rajasthan'),
(1122, 'Pilani', 'Rajasthan'),
(1123, 'Pilibanga', 'Rajasthan'),
(1124, 'Pindwara', 'Rajasthan'),
(1125, 'Pipar City', 'Rajasthan'),
(1126, 'Prantij', 'Rajasthan'),
(1127, 'Pratapgarh', 'Rajasthan'),
(1128, 'Raisinghnagar', 'Rajasthan'),
(1129, 'Rajakhera', 'Rajasthan'),
(1130, 'Rajaldesar', 'Rajasthan'),
(1131, 'Rajgarh (Alwar)', 'Rajasthan'),
(1132, 'Rajgarh (Churu', 'Rajasthan'),
(1133, 'Rajsamand', 'Rajasthan'),
(1134, 'Ramganj Mandi', 'Rajasthan'),
(1135, 'Ramngarh', 'Rajasthan'),
(1136, 'Ratangarh', 'Rajasthan'),
(1137, 'Rawatbhata', 'Rajasthan'),
(1138, 'Rawatsar', 'Rajasthan'),
(1139, 'Reengus', 'Rajasthan'),
(1140, 'Sadri', 'Rajasthan'),
(1141, 'Sadulshahar', 'Rajasthan'),
(1142, 'Sagwara', 'Rajasthan'),
(1143, 'Sambhar', 'Rajasthan'),
(1144, 'Sanchore', 'Rajasthan'),
(1145, 'Sangaria', 'Rajasthan'),
(1146, 'Sardarshahar', 'Rajasthan'),
(1147, 'Sawai Madhopur', 'Rajasthan'),
(1148, 'Shahpura', 'Rajasthan'),
(1149, 'Shahpura', 'Rajasthan'),
(1150, 'Sheoganj', 'Rajasthan'),
(1151, 'Sikar', 'Rajasthan'),
(1152, 'Sirohi', 'Rajasthan'),
(1153, 'Sojat', 'Rajasthan'),
(1154, 'Sri Madhopur', 'Rajasthan'),
(1155, 'Sujangarh', 'Rajasthan'),
(1156, 'Sumerpur', 'Rajasthan'),
(1157, 'Suratgarh', 'Rajasthan'),
(1158, 'Taranagar', 'Rajasthan'),
(1159, 'Todabhim', 'Rajasthan'),
(1160, 'Todaraisingh', 'Rajasthan'),
(1161, 'Tonk', 'Rajasthan'),
(1162, 'Udaipur', 'Rajasthan'),
(1163, 'Udaipurwati', 'Rajasthan'),
(1164, 'Vijainagar', 'Rajasthan'),
(1165, 'Gangtok', 'Sikkim'),
(1166, 'Calcutta', 'West Bengal'),
(1167, 'Arakkonam', 'Tamil Nadu'),
(1168, 'Arcot', 'Tamil Nadu'),
(1169, 'Aruppukkottai', 'Tamil Nadu'),
(1170, 'Bhavani', 'Tamil Nadu'),
(1171, 'Chengalpattu', 'Tamil Nadu'),
(1172, 'Chennai', 'Tamil Nadu'),
(1173, 'Chinna salem', 'Tamil nadu'),
(1174, 'Coimbatore', 'Tamil Nadu'),
(1175, 'Coonoor', 'Tamil Nadu'),
(1176, 'Cuddalore', 'Tamil Nadu'),
(1177, 'Dharmapuri', 'Tamil Nadu'),
(1178, 'Dindigul', 'Tamil Nadu'),
(1179, 'Erode', 'Tamil Nadu'),
(1180, 'Gudalur', 'Tamil Nadu'),
(1181, 'Gudalur', 'Tamil Nadu'),
(1182, 'Gudalur', 'Tamil Nadu'),
(1183, 'Kanchipuram', 'Tamil Nadu'),
(1184, 'Karaikudi', 'Tamil Nadu'),
(1185, 'Karungal', 'Tamil Nadu'),
(1186, 'Karur', 'Tamil Nadu'),
(1187, 'Kollankodu', 'Tamil Nadu'),
(1188, 'Lalgudi', 'Tamil Nadu'),
(1189, 'Madurai', 'Tamil Nadu'),
(1190, 'Nagapattinam', 'Tamil Nadu'),
(1191, 'Nagercoil', 'Tamil Nadu'),
(1192, 'Namagiripettai', 'Tamil Nadu'),
(1193, 'Namakkal', 'Tamil Nadu'),
(1194, 'Nandivaram-Guduvancheri', 'Tamil Nadu'),
(1195, 'Nanjikottai', 'Tamil Nadu'),
(1196, 'Natham', 'Tamil Nadu'),
(1197, 'Nellikuppam', 'Tamil Nadu'),
(1198, 'Neyveli', 'Tamil Nadu'),
(1199, 'O\' Valley', 'Tamil Nadu'),
(1200, 'Oddanchatram', 'Tamil Nadu'),
(1201, 'P.N.Patti', 'Tamil Nadu'),
(1202, 'Pacode', 'Tamil Nadu'),
(1203, 'Padmanabhapuram', 'Tamil Nadu'),
(1204, 'Palani', 'Tamil Nadu'),
(1205, 'Palladam', 'Tamil Nadu'),
(1206, 'Pallapatti', 'Tamil Nadu'),
(1207, 'Pallikonda', 'Tamil Nadu'),
(1208, 'Panagudi', 'Tamil Nadu'),
(1209, 'Panruti', 'Tamil Nadu'),
(1210, 'Paramakudi', 'Tamil Nadu'),
(1211, 'Parangipettai', 'Tamil Nadu'),
(1212, 'Pattukkottai', 'Tamil Nadu'),
(1213, 'Perambalur', 'Tamil Nadu'),
(1214, 'Peravurani', 'Tamil Nadu'),
(1215, 'Periyakulam', 'Tamil Nadu'),
(1216, 'Periyasemur', 'Tamil Nadu'),
(1217, 'Pernampattu', 'Tamil Nadu'),
(1218, 'Pollachi', 'Tamil Nadu'),
(1219, 'Polur', 'Tamil Nadu'),
(1220, 'Ponneri', 'Tamil Nadu'),
(1221, 'Pudukkottai', 'Tamil Nadu'),
(1222, 'Pudupattinam', 'Tamil Nadu'),
(1223, 'Puliyankudi', 'Tamil Nadu'),
(1224, 'Punjaipugalur', 'Tamil Nadu'),
(1225, 'Rajapalayam', 'Tamil Nadu'),
(1226, 'Ramanathapuram', 'Tamil Nadu'),
(1227, 'Rameshwaram', 'Tamil Nadu'),
(1228, 'Rasipuram', 'Tamil Nadu'),
(1229, 'Salem', 'Tamil Nadu'),
(1230, 'Sankarankoil', 'Tamil Nadu'),
(1231, 'Sankari', 'Tamil Nadu'),
(1232, 'Sathyamangalam', 'Tamil Nadu'),
(1233, 'Sattur', 'Tamil Nadu'),
(1234, 'Shenkottai', 'Tamil Nadu'),
(1235, 'Sholavandan', 'Tamil Nadu'),
(1236, 'Sholingur', 'Tamil Nadu'),
(1237, 'Sirkali', 'Tamil Nadu'),
(1238, 'Sivaganga', 'Tamil Nadu'),
(1239, 'Sivagiri', 'Tamil Nadu'),
(1240, 'Sivakasi', 'Tamil Nadu'),
(1241, 'Srivilliputhur', 'Tamil Nadu'),
(1242, 'Surandai', 'Tamil Nadu'),
(1243, 'Suriyampalayam', 'Tamil Nadu'),
(1244, 'Tenkasi', 'Tamil Nadu'),
(1245, 'Thammampatti', 'Tamil Nadu'),
(1246, 'Thanjavur', 'Tamil Nadu'),
(1247, 'Tharamangalam', 'Tamil Nadu'),
(1248, 'Tharangambadi', 'Tamil Nadu'),
(1249, 'Theni Allinagaram', 'Tamil Nadu'),
(1250, 'Thirumangalam', 'Tamil Nadu'),
(1251, 'Thirunindravur', 'Tamil Nadu'),
(1252, 'Thiruparappu', 'Tamil Nadu'),
(1253, 'Thirupuvanam', 'Tamil Nadu'),
(1254, 'Thiruthuraipoondi', 'Tamil Nadu'),
(1255, 'Thiruvallur', 'Tamil Nadu'),
(1256, 'Thiruvarur', 'Tamil Nadu'),
(1257, 'Thoothukudi', 'Tamil Nadu'),
(1258, 'Thuraiyur', 'Tamil Nadu'),
(1259, 'Tindivanam', 'Tamil Nadu'),
(1260, 'Tiruchendur', 'Tamil Nadu'),
(1261, 'Tiruchengode', 'Tamil Nadu'),
(1262, 'Tiruchirappalli', 'Tamil Nadu'),
(1263, 'Tirukalukundram', 'Tamil Nadu'),
(1264, 'Tirukkoyilur', 'Tamil Nadu'),
(1265, 'Tirunelveli', 'Tamil Nadu'),
(1266, 'Tirupathur', 'Tamil Nadu'),
(1267, 'Tirupathur', 'Tamil Nadu'),
(1268, 'Tiruppur', 'Tamil Nadu'),
(1269, 'Tiruttani', 'Tamil Nadu'),
(1270, 'Tiruvannamalai', 'Tamil Nadu'),
(1271, 'Tiruvethipuram', 'Tamil Nadu'),
(1272, 'Tittakudi', 'Tamil Nadu'),
(1273, 'Udhagamandalam', 'Tamil Nadu'),
(1274, 'Udumalaipettai', 'Tamil Nadu'),
(1275, 'Unnamalaikadai', 'Tamil Nadu'),
(1276, 'Usilampatti', 'Tamil Nadu'),
(1277, 'Uthamapalayam', 'Tamil Nadu'),
(1278, 'Uthiramerur', 'Tamil Nadu'),
(1279, 'Vadakkuvalliyur', 'Tamil Nadu'),
(1280, 'Vadalur', 'Tamil Nadu'),
(1281, 'Vadipatti', 'Tamil Nadu'),
(1282, 'Valparai', 'Tamil Nadu'),
(1283, 'Vandavasi', 'Tamil Nadu'),
(1284, 'Vaniyambadi', 'Tamil Nadu'),
(1285, 'Vedaranyam', 'Tamil Nadu'),
(1286, 'Vellakoil', 'Tamil Nadu'),
(1287, 'Vellore', 'Tamil Nadu'),
(1288, 'Vikramasingapuram', 'Tamil Nadu'),
(1289, 'Viluppuram', 'Tamil Nadu'),
(1290, 'Virudhachalam', 'Tamil Nadu'),
(1291, 'Virudhunagar', 'Tamil Nadu'),
(1292, 'Viswanatham', 'Tamil Nadu'),
(1293, 'Agartala', 'Tripura'),
(1294, 'Badharghat', 'Tripura'),
(1295, 'Dharmanagar', 'Tripura'),
(1296, 'Indranagar', 'Tripura'),
(1297, 'Jogendranagar', 'Tripura'),
(1298, 'Kailasahar', 'Tripura'),
(1299, 'Khowai', 'Tripura'),
(1300, 'Pratapgarh', 'Tripura'),
(1301, 'Udaipur', 'Tripura'),
(1302, 'Achhnera', 'Uttar Pradesh'),
(1303, 'Adari', 'Uttar Pradesh'),
(1304, 'Agra', 'Uttar Pradesh'),
(1305, 'Aligarh', 'Uttar Pradesh'),
(1306, 'Allahabad', 'Uttar Pradesh'),
(1307, 'Amroha', 'Uttar Pradesh'),
(1308, 'Azamgarh', 'Uttar Pradesh'),
(1309, 'Bahraich', 'Uttar Pradesh'),
(1310, 'Ballia', 'Uttar Pradesh'),
(1311, 'Balrampur', 'Uttar Pradesh'),
(1312, 'Banda', 'Uttar Pradesh'),
(1313, 'Bareilly', 'Uttar Pradesh'),
(1314, 'Chandausi', 'Uttar Pradesh'),
(1315, 'Dadri', 'Uttar Pradesh'),
(1316, 'Deoria', 'Uttar Pradesh'),
(1317, 'Etawah', 'Uttar Pradesh'),
(1318, 'Fatehabad', 'Uttar Pradesh'),
(1319, 'Fatehpur', 'Uttar Pradesh'),
(1320, 'Fatehpur', 'Uttar Pradesh'),
(1321, 'Greater Noida', 'Uttar Pradesh'),
(1322, 'Hamirpur', 'Uttar Pradesh'),
(1323, 'Hardoi', 'Uttar Pradesh'),
(1324, 'Jajmau', 'Uttar Pradesh'),
(1325, 'Jaunpur', 'Uttar Pradesh'),
(1326, 'Jhansi', 'Uttar Pradesh'),
(1327, 'Kalpi', 'Uttar Pradesh'),
(1328, 'Kanpur', 'Uttar Pradesh'),
(1329, 'Kota', 'Uttar Pradesh'),
(1330, 'Laharpur', 'Uttar Pradesh'),
(1331, 'Lakhimpur', 'Uttar Pradesh'),
(1332, 'Lal Gopalganj Nindaura', 'Uttar Pradesh'),
(1333, 'Lalganj', 'Uttar Pradesh'),
(1334, 'Lalitpur', 'Uttar Pradesh'),
(1335, 'Lar', 'Uttar Pradesh'),
(1336, 'Loni', 'Uttar Pradesh'),
(1337, 'Lucknow', 'Uttar Pradesh'),
(1338, 'Mathura', 'Uttar Pradesh'),
(1339, 'Meerut', 'Uttar Pradesh'),
(1340, 'Modinagar', 'Uttar Pradesh'),
(1341, 'Muradnagar', 'Uttar Pradesh'),
(1342, 'Nagina', 'Uttar Pradesh'),
(1343, 'Najibabad', 'Uttar Pradesh'),
(1344, 'Nakur', 'Uttar Pradesh'),
(1345, 'Nanpara', 'Uttar Pradesh'),
(1346, 'Naraura', 'Uttar Pradesh'),
(1347, 'Naugawan Sadat', 'Uttar Pradesh'),
(1348, 'Nautanwa', 'Uttar Pradesh'),
(1349, 'Nawabganj', 'Uttar Pradesh'),
(1350, 'Nehtaur', 'Uttar Pradesh'),
(1351, 'NOIDA', 'Uttar Pradesh'),
(1352, 'Noorpur', 'Uttar Pradesh'),
(1353, 'Obra', 'Uttar Pradesh'),
(1354, 'Orai', 'Uttar Pradesh'),
(1355, 'Padrauna', 'Uttar Pradesh'),
(1356, 'Palia Kalan', 'Uttar Pradesh'),
(1357, 'Parasi', 'Uttar Pradesh'),
(1358, 'Phulpur', 'Uttar Pradesh'),
(1359, 'Pihani', 'Uttar Pradesh'),
(1360, 'Pilibhit', 'Uttar Pradesh'),
(1361, 'Pilkhuwa', 'Uttar Pradesh'),
(1362, 'Powayan', 'Uttar Pradesh'),
(1363, 'Pukhrayan', 'Uttar Pradesh'),
(1364, 'Puranpur', 'Uttar Pradesh'),
(1365, 'Purquazi', 'Uttar Pradesh'),
(1366, 'Purwa', 'Uttar Pradesh'),
(1367, 'Rae Bareli', 'Uttar Pradesh'),
(1368, 'Rampur', 'Uttar Pradesh'),
(1369, 'Rampur Maniharan', 'Uttar Pradesh'),
(1370, 'Rasra', 'Uttar Pradesh'),
(1371, 'Rath', 'Uttar Pradesh'),
(1372, 'Renukoot', 'Uttar Pradesh'),
(1373, 'Reoti', 'Uttar Pradesh'),
(1374, 'Robertsganj', 'Uttar Pradesh'),
(1375, 'Rudauli', 'Uttar Pradesh'),
(1376, 'Rudrapur', 'Uttar Pradesh'),
(1377, 'Sadabad', 'Uttar Pradesh'),
(1378, 'Safipur', 'Uttar Pradesh'),
(1379, 'Saharanpur', 'Uttar Pradesh'),
(1380, 'Sahaspur', 'Uttar Pradesh'),
(1381, 'Sahaswan', 'Uttar Pradesh'),
(1382, 'Sahawar', 'Uttar Pradesh'),
(1383, 'Sahjanwa', 'Uttar Pradesh'),
(1384, 'Saidpur', ' Ghazipur'),
(1385, 'Sambhal', 'Uttar Pradesh'),
(1386, 'Samdhan', 'Uttar Pradesh'),
(1387, 'Samthar', 'Uttar Pradesh'),
(1388, 'Sandi', 'Uttar Pradesh'),
(1389, 'Sandila', 'Uttar Pradesh'),
(1390, 'Sardhana', 'Uttar Pradesh'),
(1391, 'Seohara', 'Uttar Pradesh'),
(1392, 'Shahabad', ' Hardoi'),
(1393, 'Shahabad', ' Rampur'),
(1394, 'Shahganj', 'Uttar Pradesh'),
(1395, 'Shahjahanpur', 'Uttar Pradesh'),
(1396, 'Shamli', 'Uttar Pradesh'),
(1397, 'Shamsabad', ' Agra'),
(1398, 'Shamsabad', ' Farrukhabad'),
(1399, 'Sherkot', 'Uttar Pradesh'),
(1400, 'Shikarpur', ' Bulandshahr'),
(1401, 'Shikohabad', 'Uttar Pradesh'),
(1402, 'Shishgarh', 'Uttar Pradesh'),
(1403, 'Siana', 'Uttar Pradesh'),
(1404, 'Sikanderpur', 'Uttar Pradesh'),
(1405, 'Sikandra Rao', 'Uttar Pradesh'),
(1406, 'Sikandrabad', 'Uttar Pradesh'),
(1407, 'Sirsaganj', 'Uttar Pradesh'),
(1408, 'Sirsi', 'Uttar Pradesh'),
(1409, 'Sitapur', 'Uttar Pradesh'),
(1410, 'Soron', 'Uttar Pradesh'),
(1411, 'Suar', 'Uttar Pradesh'),
(1412, 'Sultanpur', 'Uttar Pradesh'),
(1413, 'Sumerpur', 'Uttar Pradesh'),
(1414, 'Tanda', 'Uttar Pradesh'),
(1415, 'Tanda', 'Uttar Pradesh'),
(1416, 'Tetri Bazar', 'Uttar Pradesh'),
(1417, 'Thakurdwara', 'Uttar Pradesh'),
(1418, 'Thana Bhawan', 'Uttar Pradesh'),
(1419, 'Tilhar', 'Uttar Pradesh'),
(1420, 'Tirwaganj', 'Uttar Pradesh'),
(1421, 'Tulsipur', 'Uttar Pradesh'),
(1422, 'Tundla', 'Uttar Pradesh'),
(1423, 'Unnao', 'Uttar Pradesh'),
(1424, 'Utraula', 'Uttar Pradesh'),
(1425, 'Varanasi', 'Uttar Pradesh'),
(1426, 'Vrindavan', 'Uttar Pradesh'),
(1427, 'Warhapur', 'Uttar Pradesh'),
(1428, 'Zaidpur', 'Uttar Pradesh'),
(1429, 'Zamania', 'Uttar Pradesh'),
(1430, 'Almora', 'Uttarakhand'),
(1431, 'Bazpur', 'Uttarakhand'),
(1432, 'Chamba', 'Uttarakhand'),
(1433, 'Dehradun', 'Uttarakhand'),
(1434, 'Haldwani', 'Uttarakhand'),
(1435, 'Haridwar', 'Uttarakhand'),
(1436, 'Jaspur', 'Uttarakhand'),
(1437, 'Kashipur', 'Uttarakhand'),
(1438, 'kichha', 'Uttarakhand'),
(1439, 'Kotdwara', 'Uttarakhand'),
(1440, 'Manglaur', 'Uttarakhand'),
(1441, 'Mussoorie', 'Uttarakhand'),
(1442, 'Nagla', 'Uttarakhand'),
(1443, 'Nainital', 'Uttarakhand'),
(1444, 'Pauri', 'Uttarakhand'),
(1445, 'Pithoragarh', 'Uttarakhand'),
(1446, 'Ramnagar', 'Uttarakhand'),
(1447, 'Rishikesh', 'Uttarakhand'),
(1448, 'Roorkee', 'Uttarakhand'),
(1449, 'Rudrapur', 'Uttarakhand'),
(1450, 'Sitarganj', 'Uttarakhand'),
(1451, 'Tehri', 'Uttarakhand'),
(1452, 'Muzaffarnagar', 'Uttar Pradesh'),
(1453, 'Adra', ' Purulia'),
(1454, 'Alipurduar', 'West Bengal'),
(1455, 'Arambagh', 'West Bengal'),
(1456, 'Asansol', 'West Bengal'),
(1457, 'Baharampur', 'West Bengal'),
(1458, 'Bally', 'West Bengal'),
(1459, 'Balurghat', 'West Bengal'),
(1460, 'Bankura', 'West Bengal'),
(1461, 'Barakar', 'West Bengal'),
(1462, 'Barasat', 'West Bengal'),
(1463, 'Bardhaman', 'West Bengal'),
(1464, 'Bidhan Nagar', 'West Bengal'),
(1465, 'Chinsura', 'West Bengal'),
(1466, 'Contai', 'West Bengal'),
(1467, 'Cooch Behar', 'West Bengal'),
(1468, 'Darjeeling', 'West Bengal'),
(1469, 'Durgapur', 'West Bengal'),
(1470, 'Haldia', 'West Bengal'),
(1471, 'Howrah', 'West Bengal'),
(1472, 'Islampur', 'West Bengal'),
(1473, 'Jhargram', 'West Bengal'),
(1474, 'Kharagpur', 'West Bengal'),
(1475, 'Kolkata', 'West Bengal'),
(1476, 'Mainaguri', 'West Bengal'),
(1477, 'Mal', 'West Bengal'),
(1478, 'Mathabhanga', 'West Bengal'),
(1479, 'Medinipur', 'West Bengal'),
(1480, 'Memari', 'West Bengal'),
(1481, 'Monoharpur', 'West Bengal'),
(1482, 'Murshidabad', 'West Bengal'),
(1483, 'Nabadwip', 'West Bengal'),
(1484, 'Naihati', 'West Bengal'),
(1485, 'Panchla', 'West Bengal'),
(1486, 'Pandua', 'West Bengal'),
(1487, 'Paschim Punropara', 'West Bengal'),
(1488, 'Purulia', 'West Bengal'),
(1489, 'Raghunathpur', 'West Bengal'),
(1490, 'Raiganj', 'West Bengal'),
(1491, 'Rampurhat', 'West Bengal'),
(1492, 'Ranaghat', 'West Bengal'),
(1493, 'Sainthia', 'West Bengal'),
(1494, 'Santipur', 'West Bengal'),
(1495, 'Siliguri', 'West Bengal'),
(1496, 'Sonamukhi', 'West Bengal'),
(1497, 'Srirampore', 'West Bengal'),
(1498, 'Suri', 'West Bengal'),
(1499, 'Taki', 'West Bengal'),
(1500, 'Tamluk', 'West Bengal'),
(1501, 'Tarakeswar', 'West Bengal'),
(1502, 'Chikmagalur', 'Karnataka'),
(1503, 'Davanagere', 'Karnataka'),
(1504, 'Dharwad', 'Karnataka'),
(1505, 'Gadag', 'Karnataka'),
(1506, 'Chennai', 'Tamil Nadu'),
(1507, 'Coimbatore', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gstmaster`
--

CREATE TABLE `gstmaster` (
  `id` int(20) NOT NULL,
  `hsn_code` varchar(20) NOT NULL,
  `cgst` varchar(20) NOT NULL,
  `sgst` varchar(20) NOT NULL,
  `igst` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gstmaster`
--

INSERT INTO `gstmaster` (`id`, `hsn_code`, `cgst`, `sgst`, `igst`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST', '5', '5', '10', 1, '2021-05-08 02:07:33', '2021-05-08 02:19:26'),
(2, 'GST 1', '6', '6', '12', 1, '2021-05-08 02:08:19', '2021-05-08 02:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `member_kyc`
--

CREATE TABLE `member_kyc` (
  `id` int(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `pan_card` varchar(255) NOT NULL,
  `aadhaar_card` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `bank_ifsc` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `pan_card_image` varchar(255) NOT NULL,
  `aadhaar_card_image` varchar(255) NOT NULL,
  `cancel_cheque_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_kyc`
--

INSERT INTO `member_kyc` (`id`, `member_id`, `pan_card`, `aadhaar_card`, `account_name`, `account_number`, `account_type`, `bank_ifsc`, `bank_name`, `bank_branch`, `pan_card_image`, `aadhaar_card_image`, `cancel_cheque_image`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'ABCDD1234k', '454578765398', 'Gurpreet Singh', '767688443322567', '1', 'IFCS00000767PNB', 'PNB', 'Amritsar', 'uploads/kyc/pan/1624533461.jpg', 'uploads/kyc/aadhaar_card/1624533461.jpg', 'uploads/kyc/check/1624533461.jpg', 1, '2021-06-24 05:47:41', '2021-06-24 05:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `member_payouts`
--

CREATE TABLE `member_payouts` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `payout_id` int(20) NOT NULL DEFAULT 0,
  `type` varchar(20) NOT NULL DEFAULT '1',
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `admin_charge` varchar(20) NOT NULL DEFAULT '0',
  `tds` varchar(20) NOT NULL DEFAULT '0',
  `payable_amount` varchar(20) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_payouts`
--

INSERT INTO `member_payouts` (`id`, `member_id`, `payout_id`, `type`, `amount`, `admin_charge`, `tds`, `payable_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1', '600', '30', '30', '540', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(2, 3, 1, '1', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(3, 4, 1, '1', '600', '30', '30', '540', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(4, 6, 1, '1', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(5, 7, 1, '1', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(6, 10, 1, '1', '200', '10', '40', '150', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(7, 2, 1, '2', '2.1', '0', '0', '2.1', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(8, 3, 1, '2', '150', '8', '30', '112', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(9, 7, 1, '2', '150', '8', '30', '112', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(10, 2, 1, '3', '60', '4', '4', '52', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `member_total_payouts`
--

CREATE TABLE `member_total_payouts` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `payout_id` int(20) NOT NULL DEFAULT 0,
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `admin_charge` varchar(20) NOT NULL DEFAULT '0',
  `tds` varchar(20) NOT NULL DEFAULT '0',
  `payable_amount` varchar(20) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1,
  `is_paid` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_total_payouts`
--

INSERT INTO `member_total_payouts` (`id`, `member_id`, `payout_id`, `amount`, `admin_charge`, `tds`, `payable_amount`, `status`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '662.1', '34', '34', '594.1', 0, 1, '2021-05-25 11:48:39', '2021-05-26 11:46:49'),
(2, 3, 1, '350', '18', '70', '262', 0, 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(3, 4, 1, '600', '30', '30', '540', 0, 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(4, 6, 1, '200', '10', '40', '150', 0, 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(5, 7, 1, '350', '18', '70', '262', 0, 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(6, 10, 1, '200', '10', '40', '150', 0, 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `member_tree`
--

CREATE TABLE `member_tree` (
  `id` int(20) NOT NULL,
  `parent_id` varchar(25) DEFAULT NULL,
  `member_id` varchar(25) NOT NULL,
  `side` int(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_tree`
--

INSERT INTO `member_tree` (`id`, `parent_id`, `member_id`, `side`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 1, 1, '2021-05-12 07:38:35', '2021-05-12 07:38:35'),
(2, '2', '3', 1, 1, '2021-05-13 10:45:15', '2021-05-13 10:45:15'),
(3, '1', '4', 2, 1, '2021-05-13 10:50:41', '2021-05-13 10:50:41'),
(4, '4', '6', 1, 1, '2021-05-13 05:23:01', '2021-05-13 05:23:01'),
(5, '3', '5', 1, 1, '2021-05-13 10:58:40', '2021-05-13 10:58:40'),
(6, '2', '7', 2, 1, '2021-05-13 05:41:05', '2021-05-13 05:41:05'),
(7, '3', '8', 2, 1, '2021-05-13 05:48:44', '2021-05-13 05:48:44'),
(8, '7', '9', 1, 1, '2021-05-13 05:52:56', '2021-05-13 05:52:56'),
(9, '4', '10', 2, 1, '2021-05-13 05:55:34', '2021-05-13 05:55:34'),
(10, '6', '11', 1, 1, '2021-05-13 05:56:56', '2021-05-13 05:56:56'),
(11, '6', '12', 2, 1, '2021-05-13 06:00:14', '2021-05-13 06:00:14'),
(12, '7', '13', 2, 1, '2021-05-13 11:35:34', '2021-05-13 11:35:34'),
(13, '10', '14', 1, 1, '2021-05-13 06:08:41', '2021-05-13 06:08:41'),
(14, '10', '15', 2, 1, '2021-05-13 06:10:46', '2021-05-13 06:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `apv` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `is_repurchase` tinyint(1) NOT NULL DEFAULT 0,
  `payout` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `member_id`, `amount`, `apv`, `payment_mode`, `bank_name`, `reference_no`, `date`, `time`, `receipt`, `is_repurchase`, `payout`, `status`, `created_at`, `updated_at`) VALUES
(5, '2', '6140', '435', '1', '1', '123', '2021-05-10', '16:57', 'uploads/order/receipt/1621013057.jpg', 0, 0, 2, '2021-05-14 11:54:17', '2021-05-16 02:20:51'),
(6, '2', '1200', '100', '1', '1', '123', '2021-05-10', '22:57', 'uploads/order/receipt/1621272453.jpg', 0, 0, 2, '2021-05-17 11:57:33', '2021-05-17 12:14:17'),
(7, '2', '0', '0', '1', '1', '74444', '2021-05-10', '23:09', 'uploads/order/receipt/1621273167.jpg', 0, 0, 2, '2021-05-17 12:09:27', '2021-05-17 12:14:25'),
(8, '2', '21', '501', '2', '1', '7444455', '2021-05-10', '23:10', 'uploads/order/receipt/1621273247.jpg', 1, 1, 2, '2021-05-17 12:10:47', '2021-05-25 11:48:39'),
(9, '4', '1380', '105', '2', '1', '5454', '2021-05-10', '23:18', 'uploads/order/receipt/1621532825.jpg', 0, 0, 2, '2021-05-20 12:17:05', '2021-05-20 12:17:42'),
(10, '3', '1500', '100', '1', '1', 'ewewew', '2021-05-10', '21:49', 'uploads/order/receipt/1621959569.jpg', 0, 0, 2, '2021-05-25 10:49:29', '2021-05-25 10:55:19'),
(11, '3', '1500', '100', '1', '1', '74444', '2021-05-10', '21:49', 'uploads/order/receipt/1621959606.jpg', 1, 1, 2, '2021-05-25 10:50:06', '2021-05-25 11:48:39'),
(12, '7', '1500', '100', '1', '1', '74444', '2021-05-10', '21:51', 'uploads/order/receipt/1621959685.jpg', 0, 0, 2, '2021-05-25 10:51:25', '2021-05-25 10:54:55'),
(13, '7', '1500', '100', '2', '1', '74444', '2021-05-10', '21:51', 'uploads/order/receipt/1621959716.jpg', 1, 1, 2, '2021-05-25 10:51:56', '2021-05-25 11:48:39'),
(14, '2', '180', '5', '1', 'N/A', 'N/A', '2021-06-24', '17:40', '', 1, 0, 1, '2021-06-24 06:39:56', '2021-06-24 06:39:56'),
(15, '2', '180', '5', '1', 'N/A', 'N/A', '2021-06-24', '17:40', 'N/A', 1, 0, 1, '2021-06-24 06:40:50', '2021-06-24 06:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `capping` varchar(20) DEFAULT NULL,
  `apv` varchar(20) NOT NULL,
  `dp` varchar(25) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `amount`, `capping`, `apv`, `dp`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Gold', '201', '55', '5', '180', 1, '2021-05-08 13:09:56', '2021-05-08 13:09:56'),
(11, 'Bonanza2021', '1401', '30000', '100', '1200', 1, '2021-05-13 10:18:30', '2021-05-13 10:18:30'),
(12, 'Diamond', '1401', '0', '100', '1500', 1, '2021-05-13 13:59:18', '2021-05-13 13:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `package_orders`
--

CREATE TABLE `package_orders` (
  `id` int(20) NOT NULL,
  `order_id` varchar(20) DEFAULT NULL,
  `package_id` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `apv` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_orders`
--

INSERT INTO `package_orders` (`id`, `order_id`, `package_id`, `quantity`, `apv`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, '5', '10', '3', '15', '540', 1, '2021-05-14 11:54:17', '2021-05-14 11:54:17'),
(4, '5', '11', '3', '300', '3600', 1, '2021-05-14 11:54:17', '2021-05-14 11:54:17'),
(5, '6', '11', '1', '100', '1200', 1, '2021-05-17 11:57:33', '2021-05-17 11:57:33'),
(6, '7', '12', '1', '100', '1500', 1, '2021-05-17 12:09:27', '2021-05-17 12:09:27'),
(7, '9', '11', '1', '100', '1200', 1, '2021-05-20 12:17:05', '2021-05-20 12:17:05'),
(8, '9', '10', '1', '5', '180', 1, '2021-05-20 12:17:05', '2021-05-20 12:17:05'),
(9, '10', '12', '1', '100', '1500', 1, '2021-05-25 10:49:29', '2021-05-25 10:49:29'),
(10, '11', '12', '1', '100', '1500', 1, '2021-05-25 10:50:06', '2021-05-25 10:50:06'),
(11, '12', '12', '1', '100', '1500', 1, '2021-05-25 10:51:25', '2021-05-25 10:51:25'),
(12, '13', '12', '1', '100', '1500', 1, '2021-05-25 10:51:56', '2021-05-25 10:51:56'),
(13, '14', '10', '1', '5', '180', 1, '2021-06-24 06:39:56', '2021-06-24 06:39:56'),
(14, '15', '10', '1', '5', '180', 1, '2021-06-24 06:40:50', '2021-06-24 06:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `package_product`
--

CREATE TABLE `package_product` (
  `id` int(20) NOT NULL,
  `package_id` int(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_product`
--

INSERT INTO `package_product` (`id`, `package_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, '1', 1, '2021-05-08 13:06:22', '2021-05-08 13:06:22'),
(2, 8, '1', 1, '2021-05-08 13:07:52', '2021-05-08 13:07:52'),
(3, 9, '1', 1, '2021-05-08 13:08:06', '2021-05-08 13:08:06'),
(4, 10, '1', 1, '2021-05-08 13:09:56', '2021-05-08 13:09:56'),
(5, 11, '1', 1, '2021-05-13 10:18:30', '2021-05-13 10:18:30'),
(6, 11, '2', 1, '2021-05-13 10:18:30', '2021-05-13 10:18:30'),
(7, 12, '1', 1, '2021-05-13 13:59:18', '2021-05-13 13:59:18'),
(8, 12, '2', 1, '2021-05-13 13:59:18', '2021-05-13 13:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `paid_memeber_payouts`
--

CREATE TABLE `paid_memeber_payouts` (
  `id` int(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `payout_id` int(20) NOT NULL,
  `member_payout_id` int(20) NOT NULL,
  `paid_amount` varchar(20) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `bank_ifsc` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paid_memeber_payouts`
--

INSERT INTO `paid_memeber_payouts` (`id`, `member_id`, `payout_id`, `member_payout_id`, `paid_amount`, `account_name`, `account_number`, `account_type`, `bank_ifsc`, `bank_name`, `bank_branch`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 1, 1, '594.1', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 1, '2021-05-26 11:46:48', '2021-05-26 11:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 1, '2021-05-10 18:22:48', '2021-05-10 18:22:48'),
(2, 'NEFT', 1, '2021-05-10 18:22:48', '2021-05-10 18:22:48'),
(3, 'RTGS', 1, '2021-05-10 18:23:20', '2021-05-10 18:23:20'),
(4, 'UPI', 1, '2021-05-10 18:23:20', '2021-05-10 18:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` int(20) NOT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `admin_charge` varchar(20) NOT NULL DEFAULT '0',
  `tds` varchar(20) DEFAULT NULL,
  `payable_amount` varchar(20) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `amount`, `admin_charge`, `tds`, `payable_amount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2362.1', '120', '284', '1958.1', '05/2021', 1, '2021-05-25 11:48:39', '2021-05-25 11:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL DEFAULT '0',
  `sku` varchar(20) NOT NULL,
  `apv` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `dp` varchar(20) NOT NULL,
  `bv` varchar(20) NOT NULL,
  `hsn_code` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `sku`, `apv`, `price`, `dp`, `bv`, `hsn_code`, `stock`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'apple1', '2', 'KKU131', '501', '201', '21', '21', '2', '21', 'test desc1', 'uploads/1620472802.jpg', 1, '2021-05-08 05:50:02', '2021-05-08 06:40:31'),
(2, 'Noni 750ml', '2', 'NONI75', '60', '1200', '1000', '1', '1', '23', NULL, 'uploads/1620920845.jpg', 1, '2021-05-13 10:17:25', '2021-05-13 10:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(20) NOT NULL,
  `order_id` varchar(20) DEFAULT NULL,
  `product_id` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `apv` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `order_id`, `product_id`, `quantity`, `apv`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(2, '5', '2', '2', '120', '2000', 1, '2021-05-14 11:54:17', '2021-05-14 11:54:17'),
(3, '8', '1', '1', '501', '21', 1, '2021-05-17 12:10:47', '2021-05-17 12:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `repurchases`
--

CREATE TABLE `repurchases` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repurchases`
--

INSERT INTO `repurchases` (`id`, `user_id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 1, '2021-05-16 02:48:57', '2021-05-16 02:48:57'),
(2, 2, 6, 1, '2021-05-17 12:14:17', '2021-05-17 12:14:17'),
(3, 2, 7, 1, '2021-05-17 12:14:25', '2021-05-17 12:14:25'),
(4, 2, 8, 1, '2021-05-17 12:14:33', '2021-05-17 12:14:33'),
(5, 7, 13, 1, '2021-05-25 10:55:03', '2021-05-25 10:55:03'),
(6, 3, 10, 1, '2021-05-25 10:55:19', '2021-05-25 10:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `repurchase_commission_limit`
--

CREATE TABLE `repurchase_commission_limit` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `left_members` varchar(20) NOT NULL,
  `right_members` varchar(20) NOT NULL,
  `commision` int(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repurchase_commission_limit`
--

INSERT INTO `repurchase_commission_limit` (`id`, `name`, `left_members`, `right_members`, `commision`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bronze', '7', '7', 2, 1, '2021-05-17 10:05:57', '2021-05-17 10:05:57'),
(2, 'SILVER', '22', '22', 4, 1, '2021-05-17 10:05:57', '2021-05-17 10:05:57'),
(3, 'GOLD', '52', '52', 6, 1, '2021-05-17 10:09:26', '2021-05-17 10:09:26'),
(4, 'RUBY', '102', '102', 8, 1, '2021-05-17 10:09:26', '2021-05-17 10:09:26'),
(5, 'PEARL', '251', '251', 10, 1, '2021-05-17 10:12:59', '2021-05-17 10:12:59'),
(6, 'DIAMOND', '502', '502', 12, 1, '2021-05-17 10:12:59', '2021-05-17 10:12:59'),
(7, 'DOUBLE DIAMOND', '1002', '1002', 14, 1, '2021-05-17 10:14:37', '2021-05-17 10:14:37'),
(8, 'BLUE DIAMOND', '1752', '1752', 16, 1, '2021-05-17 10:14:37', '2021-05-17 10:14:37'),
(9, 'BLACK DIAMOND', '2752', '2752', 18, 1, '2021-05-17 10:16:36', '2021-05-17 10:16:36'),
(10, 'CROWN AMBASSADOR', '5752', '5752', 20, 1, '2021-05-17 10:16:36', '2021-05-17 10:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `self_repurchase_commision`
--

CREATE TABLE `self_repurchase_commision` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `payout_id` int(20) NOT NULL DEFAULT 0,
  `order_id` varchar(20) NOT NULL DEFAULT '0',
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `admin_charge` varchar(20) NOT NULL DEFAULT '0',
  `tds` varchar(20) NOT NULL DEFAULT '0',
  `payable_amount` varchar(20) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `self_repurchase_commision`
--

INSERT INTO `self_repurchase_commision` (`id`, `member_id`, `payout_id`, `order_id`, `amount`, `admin_charge`, `tds`, `payable_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '13', '150', '8', '30', '112', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(2, 3, 1, '11', '150', '8', '30', '112', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(3, 2, 1, '8', '2.1', '0', '0', '2.1', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'title', 'MLM', '2021-05-19 16:15:24', '2021-05-19 12:13:43'),
(2, 'address', 'Test Address', '2021-05-19 16:15:24', '2021-05-19 12:13:43'),
(3, 'logo', 'uploads/1621444894_2.png', '2021-05-19 16:15:24', '2021-05-19 11:51:34'),
(4, 'mobile', '888888', '2021-05-19 16:15:24', '2021-05-19 12:13:43'),
(5, 'apv_limit', '100', '2021-05-19 16:15:24', '2021-06-02 01:57:04'),
(6, 'payout_price', '200', '2021-05-19 16:15:24', '2021-06-02 01:57:04'),
(7, 'repurchase_discount', '10', '2021-05-19 16:15:24', '2021-06-02 01:57:04'),
(8, 'repurchase_parent_commision', '2', '2021-05-19 16:15:24', '2021-06-02 01:57:04'),
(9, 'favicon', 'uploads/1621444894.png', '2021-05-19 16:15:24', '2021-05-19 11:51:34'),
(10, 'gst_no', 'GST No', '2021-05-19 17:37:51', '2021-05-19 12:13:43'),
(11, 'address_line_2', 'Address Line 2', '2021-05-19 17:37:51', '2021-05-19 12:13:43'),
(12, 'state', 'Pun', '2021-05-19 17:38:12', '2021-05-19 12:13:43'),
(13, 'city', 'ASr', '2021-05-19 17:38:12', '2021-05-19 12:13:43'),
(14, 'pincode', '143001', '2021-05-19 17:38:29', '2021-05-19 12:13:43'),
(15, 'mobile', '888888', '2021-05-19 17:38:29', '2021-05-19 12:13:43'),
(16, 'email', 'mlm@gmail.com', '2021-05-19 17:38:48', '2021-05-19 12:13:43'),
(17, 'admin_charge', '5', '2021-05-22 12:56:25', '2021-06-02 01:57:04'),
(18, 'tds_with_kyc', '5', '2021-05-22 12:56:25', '2021-06-02 01:57:04'),
(19, 'tds_without_kyc', '20', '2021-05-22 12:56:54', '2021-06-02 01:57:04'),
(21, 'message', 'test message', '2021-06-02 01:57:04', '2021-06-02 01:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `team_repurchase_commision`
--

CREATE TABLE `team_repurchase_commision` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `payout_id` int(20) NOT NULL DEFAULT 0,
  `order_id` varchar(20) NOT NULL DEFAULT '0',
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `admin_charge` varchar(20) NOT NULL DEFAULT '0',
  `tds` varchar(20) NOT NULL DEFAULT '0',
  `payable_amount` varchar(20) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_repurchase_commision`
--

INSERT INTO `team_repurchase_commision` (`id`, `member_id`, `payout_id`, `order_id`, `amount`, `admin_charge`, `tds`, `payable_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '13', '30', '2', '2', '26', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39'),
(2, 2, 1, '11', '30', '2', '2', '26', 0, '2021-05-25 11:48:39', '2021-05-25 11:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` int(1) NOT NULL DEFAULT 2,
  `activate_at` timestamp NULL DEFAULT NULL,
  `balance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `kyc_status` tinyint(1) NOT NULL DEFAULT 0,
  `approved_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `rejected_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `package_id` int(20) DEFAULT 0,
  `nominee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `member_id`, `tracking_id`, `side`, `address`, `gender`, `dob`, `pincode`, `image`, `passkey`, `user_role`, `activate_at`, `balance`, `status`, `kyc_status`, `approved_at`, `rejected_at`, `package_id`, `nominee`, `nominee_dob`, `nominee_relation`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$o96YhW1v0UJTAvp1RCEXC.XZjuzkbVT39G1RflH/GmWD0x2kFS19O', NULL, '727010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', 1, 0, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2021-05-06 11:25:14', '2021-05-06 11:25:14'),
(2, 'Gurpreet singh', 'sandhu0173@gmail.com', NULL, '$2y$10$i4UdFeUM8gTuAGs6APx/yu/jAr/y/USisX9Aq32EriZb4XX2glAN.', '8528596994', '727021', '727010', '1', 'add1', '1', '2021-05-09', '143114', 'uploads/profile/1620575216.jpg', '123456', 2, NULL, '', 2, 2, '2021-06-24 11:18:45', '2021-05-11 17:27:22', 15, 'abc', '2005-01-27', 'baby', NULL, '2021-05-07 02:33:38', '2021-06-27 03:04:59'),
(3, 'left', 'left@left.com', NULL, '$2y$10$seKQXZq.0sRX7M8pa9QjHOK7Pr4JvNubZlsTWLdb7YdMFoCFX.jAO', '7845124554', '333480', '727021', '1', 'test', NULL, '2021-05-09', NULL, NULL, '08575763', 2, '2021-05-25 10:55:11', NULL, 2, 0, 'N/A', 'N/A', 11, NULL, NULL, NULL, NULL, '2021-05-13 04:49:54', '2021-05-25 10:55:11'),
(4, 'right', 'right@right.com', NULL, '$2y$10$Y60TyNTYvcsN5B.QKpyEhu4YW.sEnwhYBZlUnkA9HV6zk9.HM4pCe', '7845124578', '104407', '727010', '2', 'test', NULL, NULL, NULL, NULL, '64403428', 2, '2021-05-20 12:17:42', NULL, 2, 2, '2021-05-20 17:45:21', 'N/A', 9, NULL, NULL, NULL, NULL, '2021-05-13 05:16:47', '2021-05-20 12:17:42'),
(5, 'rightleft', 'righleft@mlm.com', NULL, '$2y$10$wgEPhUiKHH0ZNfmTplKV/.J/D9NZBkPtnpdTNYzk3zFw/XoYY68o.', '7418529630', '190673', '104407', '1', 'add1, address 2', NULL, NULL, NULL, NULL, '55484917', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 05:22:14', '2021-05-13 05:22:14'),
(6, 'rightleft1', 'righleft1@mlm.com', NULL, '$2y$10$A8/O/NmiENa2iNRRkg61eemFDjE8EcrFihGATJSI4bmkv3vXg8ohu', '7418529630', '725570', '104407', '1', 'add1, address 2', NULL, NULL, NULL, NULL, '42132918', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 05:23:01', '2021-05-13 05:23:01'),
(7, 'leftright', 'leftright@gmail.com', NULL, '$2y$10$7fkjnkFETvHHEapbkczVhuVisr/glIiD89/RTmKYYtggH./VsolGq', '7418529630', '434329', '727021', '2', 'add1, address 2', NULL, NULL, NULL, NULL, '90125372', 2, '2021-05-25 10:54:55', '2', 2, 0, 'N/A', 'N/A', 13, NULL, NULL, NULL, NULL, '2021-05-13 05:41:05', '2021-05-28 10:28:52'),
(8, 'leftleftright', 'leftleftright@gmail.com', NULL, '$2y$10$Irl6i/IfAV8q64GtAhRoKehb950Vx2/vaCKmlF1/uyI5qglXDnPiC', '7418529630', '274511', '333480', '2', 'add1, address 2', NULL, NULL, NULL, NULL, '36879332', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 05:48:44', '2021-05-13 05:48:44'),
(9, 'leftleftleft', 'leftleftleft@gmail.com', NULL, '$2y$10$kvQIXNbIDWEB1qQTfXqA4e.YiuiQJz/hZZ9vlvkPRRNpm2c9.Q7pe', '7418529630', '481285', '434329', '1', 'add1, address 2', NULL, NULL, NULL, NULL, '39945061', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 05:52:56', '2021-05-13 05:52:56'),
(10, 'rightright', 'rightright@gmail.com', NULL, '$2y$10$ZQqeXml4Y63a81kYvVeZSOX.6x4wjA.sD6VGIa1JNvw5BztZvBqMu', '7418529630', '533161', '104407', '2', 'add1, address 2', NULL, NULL, NULL, NULL, '62490086', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 05:55:34', '2021-05-13 05:55:34'),
(11, 'rightleftleft', 'rightleftleft@gmail.com', NULL, '$2y$10$tXL9PA/d5EPOpIpto79/F.3LBXAA7M0v6CQXmE53Tbjuzoj8wytBu', '7418529630', '015271', '725570', '1', 'add1, address 2', NULL, NULL, NULL, NULL, '03994879', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 05:56:56', '2021-05-13 05:56:56'),
(12, 'rightleftright', 'rightleftright@gmail.com', NULL, '$2y$10$c.gYqigTjaqyVPEJL4EJI.m2.ZYcA02sSKB8cZOv9z1.J.JETkMim', '7418529630', '925889', '725570', '2', 'add1, address 2', NULL, NULL, NULL, NULL, '30280913', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 06:00:14', '2021-05-25 04:32:43'),
(13, 'leftrightright', 'leftrightleft@gmail.com', NULL, '$2y$10$8liuBq2vdlvD9IAnfXJRNO2NDqe0pyrdCdKLOB3sxGF.0IvJY0rrW', '7418529630', '426801', '434329', '1', 'add1, address 2', NULL, NULL, NULL, NULL, '91341737', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 06:04:08', '2021-05-13 06:04:08'),
(14, 'rightrightleft', 'rightrightleft@gmail.com', NULL, '$2y$10$q3O/IgYIjtiGN5R52Jxw3Oudhp2jIvTIbKZQ3eHDt70En2rXJv0RO', '7418529630', '628783', '533161', '1', 'add1, address 2', NULL, NULL, NULL, NULL, '29793997', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 06:08:41', '2021-05-13 06:08:41'),
(15, 'rightrightright', 'rightrightright@gmail.com', NULL, '$2y$10$klZjknog1NtxgjK6ZRfi6eYMoHWkM.f8VWn7ReESO9IUZ06I0P7Ae', '7418529630', '575366', '533161', '2', 'add1, address 2', NULL, NULL, NULL, NULL, '45445868', 2, NULL, NULL, 1, 0, 'N/A', 'N/A', 0, NULL, NULL, NULL, NULL, '2021-05-13 06:10:46', '2021-05-13 06:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_members`
--

CREATE TABLE `user_members` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `left_childs` int(20) NOT NULL,
  `right_childs` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_members`
--

INSERT INTO `user_members` (`id`, `user_id`, `left_childs`, `right_childs`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 3, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(2, 3, 1, 1, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(3, 4, 3, 3, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(4, 5, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(5, 6, 1, 1, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(6, 7, 1, 1, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(7, 8, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(8, 9, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(9, 10, 1, 1, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(10, 11, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(11, 12, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(12, 13, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(13, 14, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(14, 15, 0, 0, 1, '2021-05-25 11:48:38', '2021-05-25 11:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_member_groups`
--

CREATE TABLE `user_member_groups` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `left_child` int(20) NOT NULL,
  `right_child` int(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_member_groups`
--

INSERT INTO `user_member_groups` (`id`, `user_id`, `left_child`, `right_child`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 7, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(2, 2, 5, 9, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:38'),
(3, 2, 8, 13, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(4, 3, 5, 8, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(5, 4, 6, 10, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(6, 4, 11, 14, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(7, 4, 12, 15, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(8, 6, 11, 12, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(9, 7, 9, 13, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39'),
(10, 10, 14, 15, 0, '2021-05-25 11:48:38', '2021-05-25 11:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binary_commision`
--
ALTER TABLE `binary_commision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gstmaster`
--
ALTER TABLE `gstmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_kyc`
--
ALTER TABLE `member_kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_payouts`
--
ALTER TABLE `member_payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_total_payouts`
--
ALTER TABLE `member_total_payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_tree`
--
ALTER TABLE `member_tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_orders`
--
ALTER TABLE `package_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_product`
--
ALTER TABLE `package_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_memeber_payouts`
--
ALTER TABLE `paid_memeber_payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repurchases`
--
ALTER TABLE `repurchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repurchase_commission_limit`
--
ALTER TABLE `repurchase_commission_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_repurchase_commision`
--
ALTER TABLE `self_repurchase_commision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_repurchase_commision`
--
ALTER TABLE `team_repurchase_commision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_members`
--
ALTER TABLE `user_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_member_groups`
--
ALTER TABLE `user_member_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `binary_commision`
--
ALTER TABLE `binary_commision`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1624;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gstmaster`
--
ALTER TABLE `gstmaster`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_kyc`
--
ALTER TABLE `member_kyc`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_payouts`
--
ALTER TABLE `member_payouts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member_total_payouts`
--
ALTER TABLE `member_total_payouts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_tree`
--
ALTER TABLE `member_tree`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package_orders`
--
ALTER TABLE `package_orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `package_product`
--
ALTER TABLE `package_product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paid_memeber_payouts`
--
ALTER TABLE `paid_memeber_payouts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `repurchases`
--
ALTER TABLE `repurchases`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repurchase_commission_limit`
--
ALTER TABLE `repurchase_commission_limit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `self_repurchase_commision`
--
ALTER TABLE `self_repurchase_commision`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `team_repurchase_commision`
--
ALTER TABLE `team_repurchase_commision`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_members`
--
ALTER TABLE `user_members`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_member_groups`
--
ALTER TABLE `user_member_groups`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
