-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2023 at 07:30 PM
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
-- Database: `dlmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE `logindata` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`id`, `name`, `datetime`) VALUES
(40, '8106271294', '2023-06-28 11:04:00'),
(41, '8106271294', '2023-06-28 11:05:30'),
(42, '8106271294', '2023-06-28 11:24:07'),
(43, '9901553321', '2023-06-28 11:56:53'),
(44, '8106271294', '2023-06-28 11:57:18'),
(45, '8106271294', '2023-07-03 07:38:51'),
(46, '8106271294', '2023-07-03 11:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555556, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-29 12:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `Category`, `CreationDate`) VALUES
(1, 'Restaurant', '2019-11-29 00:42:22'),
(2, 'Hotel', '2019-11-30 05:43:18'),
(3, 'Insurance Company', '2019-11-30 05:43:27'),
(4, 'Broadband Provider', '2019-11-30 05:43:36'),
(5, 'Newspaper Provider', '2019-11-30 05:43:46'),
(6, 'Car Service', '2019-11-30 05:43:58'),
(7, 'Vehicle Service', '2019-11-30 05:44:05'),
(8, 'Tuition Teacher', '2019-11-30 05:44:18'),
(9, 'Gym Instructor', '2019-11-30 05:44:29'),
(11, 'Education', '2019-11-30 05:44:56'),
(12, 'Electrician', '2019-11-30 05:45:30'),
(13, 'Fitting', '2019-11-30 05:45:42'),
(14, 'Carpenter', '2019-11-30 05:45:52'),
(15, 'House Cleaning', '2019-11-30 05:46:05'),
(16, 'Painter', '2019-11-30 05:46:14'),
(17, 'Grocery Shop', '2019-11-30 05:46:24'),
(18, 'Hospital', '2019-11-30 05:46:37'),
(19, 'Physiotherapist', '2019-11-30 05:47:02'),
(20, 'Nurse', '2019-11-30 05:47:12'),
(21, 'Laundry', '2019-11-30 05:47:29'),
(22, 'Gardener', '2019-11-30 05:47:41'),
(25, 'Other', '2019-11-30 05:48:22'),
(26, 'Mobile Products', '2019-12-10 16:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Sarita Pandey', 'sar@gmail.com', 'huiyuihhjjkhkjvhknv iyi tuyvuoiup', '2021-07-09 12:48:40', 1),
(3, 'Test', 'test@gmail.com', 'Want to know price of forest cake', '2021-07-16 12:51:06', 1),
(4, 'Shanu', 'shanu@gmail.com', 'hkjhkjhk', '2021-07-17 07:32:14', 1),
(5, 'Taanu Sharma', 'tannu@gmail.com', 'ytjhdjguqwgyugjhbjdsuy\r\nkjhjkwhkd\r\nljkkljwq\r\nmlkjol ', '2021-07-28 12:09:22', 1),
(6, 'Harish Kumar', 'hari@gmail.com', 'rytweiuyeiouoipoipo[po\r\njknkjlkdsflkjflkdjslk;lsdkf;l\r\nn,mn,ncxm.,m.m.,.', '2021-07-31 16:34:16', NULL),
(7, 'test', 'test@gmail.com', 'Test', '2021-08-25 16:56:19', 1),
(8, 'jkhjk', 'kjhjk@abc.com', 'kjhkj', '2021-10-01 10:13:11', NULL),
(9, 'Anuj', 'ak@gmail.com', 'This is for test.', '2021-10-21 17:55:51', NULL),
(10, 'sree keerthi', '2021mca07@cuk.ac.in', 'hii', '2023-04-25 06:23:22', NULL),
(11, 'sree keerthi', 'sreekeerthi805@gmail.com', '<p><strong>hii!!&nbsp;</strong><em>this is so and so</em></p>\r\n', '2023-05-01 09:42:25', NULL),
(12, 'padhu', 'padvathi0108@gmail.com', '<p><strong>helloo!!&nbsp;</strong><em>hiii!!</em></p>\r\n', '2023-05-01 09:56:23', NULL),
(13, 'gayathri', 'gayathri1313@gmail.com', '<p>hello there</p>\r\n', '2023-05-02 07:40:58', NULL),
(14, 'sree keerthi', 'keerthi.bongurala@gmail.com', 'Hello I am sree keerthi my Email is keerthi.bongurala@gmail.com<br><p>hii</p>\r\n', '2023-06-26 06:39:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblextra`
--

CREATE TABLE `tblextra` (
  `ID` int(100) NOT NULL,
  `PageType` varchar(50) NOT NULL,
  `Page Title` varchar(50) NOT NULL,
  `PageDescription` text NOT NULL,
  `Questions` text NOT NULL,
  `Answers` text NOT NULL,
  `UpdationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblextra`
--

INSERT INTO `tblextra` (`ID`, `PageType`, `Page Title`, `PageDescription`, `Questions`, `Answers`, `UpdationDate`) VALUES
(1, 'faq', 'FAQ', '', '1. What is the use of the KKDial?\r\n2. How to reset the password?\r\n3. How to update the name?\r\n4. How to update or edit the listing?', '1.With the help of this portal you can get all the list of services and the information regarding all the serices, that are being provided in the specific area\r\n2.Login to your account, select My Account from the menu bar and click on Change password from the dropdown bar. you can reset your password by providing the required information.\r\n3.Login to your account, select My Account from the menu bar and click on profile from the dropdown bar. you can see the information regarding your profile.\r\n4.Login to your account, you have to select manage listing button. You will be able to see the listings, edit and delete options beside your listing.', '2023-05-01 19:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaq`
--

CREATE TABLE `tblfaq` (
  `id` int(100) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfaq`
--

INSERT INTO `tblfaq` (`id`, `question`, `answer`, `created_at`) VALUES
(34, 'KK DIAL ?', 'kalyan kalaburagi', '2023-05-01 08:46:23'),
(41, 'How to Login ?', 'Click on Login Button', '2023-05-01 09:44:56'),
(43, 'How to create acoount ?', 'Click on Registration Button', '2023-05-01 09:45:38'),
(57, 'what is KKdial ', 'It is noting', '2023-06-26 09:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbllisting`
--

CREATE TABLE `tbllisting` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `ListingTitle` varchar(200) DEFAULT NULL,
  `Keyword` varchar(200) DEFAULT NULL,
  `Category` int(10) DEFAULT NULL,
  `Website` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `TemporaryAddress` mediumtext DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `Country` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `OwnerName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Phone` bigint(20) DEFAULT NULL,
  `CompanyWebsite` varchar(200) DEFAULT NULL,
  `OwnerDesignation` varchar(200) DEFAULT NULL,
  `Company` varchar(200) DEFAULT NULL,
  `FacebookLink` varchar(200) DEFAULT NULL,
  `TweeterLink` varchar(200) DEFAULT NULL,
  `Googlepluslink` varchar(200) DEFAULT NULL,
  `Linkedinlink` varchar(200) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `Logo` varchar(200) DEFAULT NULL,
  `ListingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbllisting`
--

INSERT INTO `tbllisting` (`ID`, `UserID`, `ListingTitle`, `Keyword`, `Category`, `Website`, `Address`, `TemporaryAddress`, `City`, `State`, `Country`, `Zipcode`, `OwnerName`, `Email`, `Phone`, `CompanyWebsite`, `OwnerDesignation`, `Company`, `FacebookLink`, `TweeterLink`, `Googlepluslink`, `Linkedinlink`, `Description`, `Logo`, `ListingDate`) VALUES
(8, 7, 'Amanthrana', 'Indian, Asian, Vegetarian Friendly', 1, 'http://www.hotelashrayacomfortsglb.com/restaurant.html', 'Main Road, Jagat Circle Inside Hotel Ashraya, Kadechur Central, Opp.City Municipal Corporation', 'Main Road, Jagat Circle Inside Hotel Ashraya, Kadechur Central, Opp.City Municipal Corporation', 'Gulbarga', 'Karnataka', 'India', 585101, 'Amanthrana', 'hotelashrayacomforts@gmail.com', 8472225505, 'http://www.hotelashrayacomfortsglb.com/restaurant.html', 'Manager', 'Restaurant', '', '', '', '', 'Amanthrana provides Indian and Asian cuisines. It gives vegetarian friendly and vegan option for the people who maintain diets. It provides breakfast, lunch and dinner. Also it has features like takeout, seating, delivery, table services.', 'ca6b95ae09872c707d47c934af0c64c51682413351.jpg', '2023-04-25 09:02:31'),
(9, 7, 'Goodluck The Venue', 'Chinese, Indian, Fast Food', 1, 'https://www.facebook.com/Goodluckthevenue', 'Opp.St Mary school, Court Rd.', 'Opp.St Mary school, Court Rd.', 'Gulbarga', 'Gulbarga', 'India', 585105, 'GoodLuck', 'goodluckthevenue@gmail.com', 9448491888, 'https://www.facebook.com/Goodluckthevenue', 'Manager', 'Restaurant', '', 'http://twitter.com/goodluckthevenue', '', '', 'Good Luck The Venue provides Indian, Chinese and fast food cuisines. The meals are lunch, dinner and brunch. It has the features as Delivery, Takeout, Outdoor Seating, Private Dining, Seating, Parking Available, Television, Highchairs Available, Digital Payments, Accepts Credit Cards, Table Service, Family style.', '84f84266c235b083b6c262fe120faa7c1682413632.jpg', '2023-04-25 09:07:12'),
(10, 7, 'Punch Inn', 'Chinese, Indian, Wine Bar', 1, 'http://www.citrushotelsindia.com/citrus-gulbarga/', 'Main Rd 3rd Floor, Gold Hub Mall', 'Main Rd 3rd Floor, Gold Hub Mall', 'Gulbarga', 'Karnataka', 'India', 585101, 'Punch Inn', 'Abc@gmail.com', 9606070807, 'http://www.citrushotelsindia.com/citrus-gulbarga/', 'Manager', 'Restaurant', '', '', '', '', 'Punch In hotel provides Indian, Chinese cuisines. It provides breakfast, lunch and dinner. It also has a wine bar.', '6dfd4e49f8b3563a39762355cd574d201682413910.jpg', '2023-04-25 09:11:50'),
(11, 7, 'Kyraid Hotel', 'Accomodation', 1, 'https://www.kyriadindia.com/hotels/kyriad-hotel-gulbarga-by-othpl/', 'Gold Hub Mall, 3rd Floor, Opp. KBN Hospital', 'Gold Hub Mall, 3rd Floor, Opp. KBN Hospital', 'Gulbarga', 'Karnataka', 'India', 585103, 'Kyraid', 'reservations.gulbarga@kyriadindia.com', 9606070807, 'https://www.kyriadindia.com/hotels/kyriad-hotel-gulbarga-by-othpl/', 'Manager', 'Hotel', 'https://www.facebook.com/kyriadindia/', 'https://twitter.com/Kyriadindia', '', '', 'A total of 28 smartly furnished rooms, spread across 3 floors with trendy decor are offered for accommodation giving you options of Superior, Deluxe, Premier & even a Presidential Suite Room. The superior services and facilities offered at Kyriad Hotel Gulbarga will make for a memorable stay like the Express Check In and Check Out. Stay connected throughout your stay with our free internet access.', 'a39735beff6ff5ce6b470e184588acd81682415788.jpg', '2023-04-25 09:43:08'),
(12, 7, 'Heritage Inn', 'Accomodation', 2, 'http://hotelheritageinnklbg.com/', '#42 A, S.B Temple Road Near City Bus Stand, Super Market', '#42 A, S.B Temple Road Near City Bus Stand, Super Market	Temporary', 'Gulbarga', 'Karnataka', 'India', 585101, 'Heritage', 'hotelheritage.inn@gmail.com', 9036235555, 'http://hotelheritageinnklbg.com/', 'Manager', 'Hotel', '', '', '', '', 'Hotel Heritage Inn offers accommodation in Gulbarga. Among the facilities of in-house restaurant & bar and also guests can also make use of the business area. Ample conveniences are offered at the hotel to suffice the varying requirements of guests', '9d74bef4238bd49729fd8c42dd6d5ce71682416023.jpg', '2023-04-25 09:47:03'),
(13, 7, 'SR Continential', 'Accomodation', 2, 'https://srcontinental.com/', '#1-383, Beside Railway Station Gate, IB Road', '#1-383, Beside Railway Station Gate, IB Road', 'Gulbarga', 'Karnataka', 'India', 585102, 'SR Continential', 'info@srcontinental.com', 8472260777, 'https://srcontinental.com/', 'Manager', 'Hotel', '', '', '', '', 'S.R. Continental’s ingenious lobby, features with brass “Kuthu Vilakku” lamp. The 30n guest rooms and 2 Suite are designed for the coeval business travelers. Complementary high speed internet access for up to 4 devices, well-appointed writing table are just some of the features designed to make our rooms cutting edge, and your stay convenient and comfortable.', '44aa9d117ea04f5be53f8ea7edd0dde41682416263.jpg', '2023-04-25 09:51:03'),
(14, 7, 'Lunbini Grand Hotel', 'Accomodation', 2, 'http://lumbinisgrandhotel.com/', 'Near Rang Mandir – Public garden', 'Near Rang Mandir – Public garden', 'Gulbarga', 'Karnataka', 'India', 585105, 'Lumbini', 'grandhotelglb@gmail.com', 9916154111, 'http://lumbinisgrandhotel.com/', 'Manager', 'Hotel', '', '', '', '', 'Grand Hotel offers rooms and bathrooms with an elegant and comfortable style that includes the latest technology. Each room is elegantly furnished, with luxurious beds, sheer curtains and blackout blinds, plush carpets and polished floors. These details offer a different alternative converting Grand Hotel into an ideal place, both for leisure and business travelers.', '05917306836339985a6b009badc166ba1682416513.jpg', '2023-04-25 09:55:13'),
(15, 7, 'Muscle Master GYM & Fitness HUB', 'Gym', 9, 'https://www.facebook.com/Musclemastergym/about', '1st Floor Grand Plaza, Rafi Chowk, Opposite to Majestic Function Hall', '1st Floor Grand Plaza, Rafi Chowk, Opposite to Majestic Function Hall', 'Gulbarga', 'Karnataka', 'India', 585104, 'Md Am', 'amjad.wipro@gmail.com', 7798882267, 'https://www.facebook.com/Musclemastergym/about', 'Gym instructor', 'Gym', 'https://www.facebook.com/Musclemastergym/about', '', '', '', 'Muscle Master Gym & Fitness Hub is designed and maintained to the highest standards, with state-of-the-art equipment, and certified and registered professional trainers. MD Amjad and MD Imtiyaz are the founders of Muscle Master Gym and Fitness Hub. The gym is a fantastic gym for ladies that has the latest equipment. All fitness solutions are available under one roof. They offer packages to suit all levels of training to help achieve your fitness goals. Their classes will be aimed at all age groups, including children and seniors. The trainers will provide high-quality and affordable workouts by offering exceptional customer service and convenience to all their members. Aerobics weight training and personal training are available.', '286d66b228742c7472fd97ef0d534e991682416840.jpg', '2023-04-25 10:00:40'),
(16, 7, 'HCG Hospital', 'Hospital', 18, 'https://www.hcgoncology.com/cancer-centers/hcg-cancer-centre-kalaburagi/', 'No.1-10/A, 1-10 Khuba Plot, Station Road', 'No.1-10/A, 1-10 Khuba Plot, Station Road', 'Gulbarga', 'Karnataka', 'India', 585102, 'HCG', 'info@hcgel.com', 7406499999, 'https://www.hcgoncology.com/cancer-centers/hcg-cancer-centre-kalaburagi/', 'Manager', 'Hospital', '', '', '', '', 'HCG Cancer Hospital is one of the best cancer hospitals in India. It has a chain of 24 comprehensive cancer centres, which offer cutting-edge diagnostics and world-class cancer treatments across the nation. HCG Cancer Centre uses leading-edge technology, has knowledgeable and experienced professionals at its disposal, and its distinctive cancer treatment procedures contribute to providing our patients with timely diagnostic and clinical care assistance. We also have a large pool of cancer specialists across the network who are trained to support and care for the patients in the best way possible.', 'a973159655d029eab9e49a151dc80a7f1682417209.jpg', '2023-04-25 10:06:49'),
(17, 7, 'United Hospitals', 'Medical Services', 18, 'https://www.unitedhospital.in/united-gulbarga/', '#1-43/A, Opp. Siddarth Law College, Near S.V.P Chowk', '#1-43/A, Opp. Siddarth Law College, Near S.V.P Chowk', 'Gulbarga', 'Karnataka', 'India', 585102, 'Dr. S. S. Siddareddy', 'info@unitedhospital.in', 8472225006, 'https://www.unitedhospital.in/united-gulbarga/', 'Doctor', 'Hospital', '', '', '', '', 'With a special focus on Trauma and Critical Care, United serves the citizens of Gulbarga and surrounding areas with a single-minded focus and astounding success rates.', '69d305260b3a54ccacb5707d548b35991682417585.jpg', '2023-04-25 10:13:05'),
(18, 7, 'Central University Of Karnataka', 'Education,University', 11, 'cuk.ac.in', ', Central University of Karnataka  Kadaganchi, Aland Road.', 'Central University of Karnataka  Kadaganchi, Aland Road', 'Gulbarga', 'Karnataka', 'India', 585, 'CUK', 'vc@cuk.ac.in', 84772267, 'cuk.ac.in', 'Vice Chancellor', 'Educational institute', '', '', '', '', '\"<p>Central University of Karnataka (CUK) is a relatively young institution with commitment for academic excellence and social relevance. For the past ten years we expressed this spirit through our acts and deeds, and achieved a significant growth in infrastructure, academic pursuits and intellectual contribution making its own mark on the national canvas. The committed faculty, students and other stakeholders have made this achievement possible</p>\r\n\"', 'c10d2258f8b97b714c9930982b7435cd1682940885.jpg', '2023-05-01 11:36:33'),
(19, 7, 'APPA Institute of Engineering and Technology', 'Education,University', 11, 'http://www.sharnbasvauniversity.edu.in/', 'Shranbasaveshwara College Campus, Vidya Nagar,', 'Shranbasaveshwara College Campus, Vidya Nagar,', 'Gulbarga', 'Karnataka', 'India', 585105, 'POOJYA DR.SHARNBASWAPPA APPA', 'chancellor@sharnbasvauniversity.edu.in', 9731794251, 'http://www.sharnbasvauniversity.edu.in/', 'Chancellor', 'Educational institute', 'Chancellor', '', NULL, '', '<p>Appa Institute of Engineering and Technology is an engineering college affiliated to Visvesvaraya Technological University located in Kalaburagi in the state of Karnataka, India. The college was established in 2002. The college campus is situated at Vidya Nagar, Kalaburagi.</p>\r\n', 'a819683b00e5322123f66baf4f63d82c1682941475.jpg', '2023-05-01 11:44:35'),
(20, 7, 'Gulbarga University', 'Education,University', 11, 'https://gug.ac.in/', 'Sedam Road, Jnana Ganga', 'Sedam Road, Jnana Ganga', 'Gulbarga', 'Karnataka', 'India', 585106, 'Prof. Dayanand Agsar', 'gug@ac.in', 847226320, 'https://gug.ac.in/', 'Vice Chancellor', 'Educational institute', '', '', NULL, '', '<p>Gulbarga University, Kalaburagi, was established on 10 th September 1980 and carved a niche for itself in the sprawling campus spread over 800 acres. It was a Post Graduate Centre of Karnataka University, Dharwad from 1970-1980. The University caters to the needs of Higher Education in Kalyana Karnataka region contributing a great deal for the accelerated development of the region through teaching, research and extension programmes. Gulbarga University jurisdiction is socio-economically developing (backward) area situated in the north eastern part of Karnataka, and protected under the special provision for development under Article 371(J) of the Indian Constitution.</p>\r\n', 'b77bae51031c248fa153838684a128a31682950074.jpg', '2023-05-01 14:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(50) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: Arial, Helvetica, sans-serif; font-size: 30px;\">KKDail </span><span style=\"color: rgb(84, 84, 84); font-family: Garamond, serif font-size: 20px;\">&nbsp; is the  specialized and local Internet &nbsp; search engine<span style=\"color: rgb(84, 84, 84); font-family: Garamond, serif font-size: 20px;\">&nbsp;that allow users to submit geographically constrained searches against a structured database of local business,which is designed and developed by the Digisnare Technologies. The main objective of this portal is to provide the single window access to the information and the services being provided. An attempt has been made through this portal to provide the comprehensive, accurate, reliable information about the services.&nbsp; <div><br></div>', NULL, NULL, '2023-04-23 07:51:49'),
(2, 'contactus', 'Contact Us', 'Digisnare Technologies,First Floor, Keonics IT Park, LIG-2, Akkamahadevi Colony, Kalaburagi, Karnataka 585103', 'info@digisnare.com', 9901553321, '2023-05-03 07:42:03'),
(3, 'support', 'Support', NULL, NULL, NULL, '2023-05-01 15:23:09'),
(4, 'faq', 'FAQ', NULL, NULL, NULL, '2023-05-01 15:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `ID` int(11) NOT NULL,
  `ListingID` int(10) DEFAULT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Subject` varchar(200) DEFAULT NULL,
  `Message` mediumtext NOT NULL,
  `DateofReview` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`ID`, `ListingID`, `Name`, `Email`, `Subject`, `Message`, `DateofReview`, `Remark`, `Status`, `UpdationDate`) VALUES
(14, 27, 'keerthi', 'keerthi@gmail.com', 'Abt mall', 'it\'s good with various acti', '2023-05-01 10:52:54', 'Not meaningful', 'Review Reject', '2023-05-01 10:34:37'),
(16, 10, 'Dokku Gayathri', 'gayathri13102000@gmail.com', 'Testing', 'TESTING', '2023-06-21 06:25:26', 'Good', 'Review Accept', '2023-06-21 06:12:03'),
(17, 12, 'Dokku Gayathri', 'gayathri13102000@gmail.com', 'TESTING', 'ITS GOOD', '2023-06-22 06:57:29', NULL, NULL, '2023-06-22 06:57:29'),
(18, 8, 'sree keerthi', 'sreekeerthi805@gmail.com', 'review', 'hello', '2023-06-26 07:52:35', 'sare', 'Review Accept', '2023-06-26 07:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbltest`
--

CREATE TABLE `tbltest` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Message` mediumtext NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `DateofReview` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(200) NOT NULL,
  `UpdationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'John Doe', 6465465465, '202cb962ac59075b964b07152d234b70', '2021-09-29 05:59:07'),
(2, 'Sarita Pandey', 7987987987, 'f925916e2754e5e03f75dd58a5733251', '2021-09-29 05:59:30'),
(6, 'Anuj kumar Singh', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2021-10-21 17:47:44'),
(7, 'sree', 8106271294, '900150983cd24fb0d6963f7d28e17f72', '2023-04-22 20:16:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category` (`Category`),
  ADD KEY `CreationDate` (`CreationDate`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblextra`
--
ALTER TABLE `tblextra`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfaq`
--
ALTER TABLE `tblfaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllisting`
--
ALTER TABLE `tbllisting`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`UserID`),
  ADD KEY `catid` (`Category`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ListingID` (`ListingID`);

--
-- Indexes for table `tbltest`
--
ALTER TABLE `tbltest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logindata`
--
ALTER TABLE `logindata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblextra`
--
ALTER TABLE `tblextra`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfaq`
--
ALTER TABLE `tblfaq`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbllisting`
--
ALTER TABLE `tbllisting`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbltest`
--
ALTER TABLE `tbltest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbllisting`
--
ALTER TABLE `tbllisting`
  ADD CONSTRAINT `catid` FOREIGN KEY (`Category`) REFERENCES `tblcategory` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userid` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
