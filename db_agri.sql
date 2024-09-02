-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 07:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dp_img` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `username`, `email`, `role`, `description`, `address`, `name`, `password`, `dp_img`) VALUES
(1, 'superadmin', 'judeulan@gmail.com', 'superadmin', 'What\'s up! I\'m Jude Ulan, a superadmin and one of the creator of this system. hehe', 'San Antonio, Quezon', 'Jude Ulan', '21232f297a57a5a743894a0e4a801fc3', 'jude.jpg'),
(2, 'jmpagkaliwangan', 'jmpagkaliwangan@gmail.com', 'admin', 'Hello! My name is John Mark, one of the creator of this system, hope you like it! Thanks.', 'San Antonio, Quezon ', 'John Mark Pagkaliwangan', '21232f297a57a5a743894a0e4a801fc3', NULL),
(3, 'dante', 'dante.nicdao@gmail.com', 'admin ', '', 'San Pablo City, Laguna', 'Dante Nicdao Jr.', '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lmi_form`
--

CREATE TABLE `lmi_form` (
  `id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `insurance_type` varchar(255) NOT NULL DEFAULT 'Livestock Mortality Insurance',
  `full_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_stat` varchar(255) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `animal_type` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `stock_source` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `ear_mark` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `basic_color` varchar(255) NOT NULL,
  `no_of_male_animals` varchar(255) NOT NULL,
  `no_of_female_animals` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `no_of_housing` varchar(255) NOT NULL,
  `no_of_birth_per_house_unit` varchar(255) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `total_no_of_heads_per_enroll` varchar(255) NOT NULL,
  `cert_owner_large_cattle_no` varchar(255) NOT NULL,
  `cert_transfer_large_cattle_no` varchar(255) NOT NULL,
  `desired_sum_insured` varchar(255) NOT NULL,
  `total_sum_insured` varchar(255) NOT NULL,
  `coverage_for_epidemic_disease1` varchar(255) NOT NULL,
  `coverage_for_epidemic_disease2` varchar(255) NOT NULL,
  `coverage_for_epidemic_disease3` varchar(255) NOT NULL,
  `signature` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmi_form`
--

INSERT INTO `lmi_form` (`id`, `account_no`, `insurance_type`, `full_name`, `contact`, `date_of_birth`, `gender`, `marital_stat`, `spouse_name`, `animal_type`, `purpose`, `stock_source`, `breed`, `ear_mark`, `brand`, `basic_color`, `no_of_male_animals`, `no_of_female_animals`, `age`, `no_of_housing`, `no_of_birth_per_house_unit`, `date_of_purchase`, `total_no_of_heads_per_enroll`, `cert_owner_large_cattle_no`, `cert_transfer_large_cattle_no`, `desired_sum_insured`, `total_sum_insured`, `coverage_for_epidemic_disease1`, `coverage_for_epidemic_disease2`, `coverage_for_epidemic_disease3`, `signature`) VALUES
(1, 119121, 'Livestock Mortality Insurance', 'Paolo Zapatero Bachicha', '09568142192', '2002-07-23', 'Male', 'single', 'N/A', 'Cow', 'Milking', 'Bought', 'Asian', 'N/A', 'Calf', 'Standard Black and White', '3', '3', 4, '2', '3', '2019-06-04', '6', 'N/A', 'N/A', '25000', '25000', 'N/A', 'N/A', 'N/A', NULL),
(2, 228281, 'Livestock Mortality Insurance', 'John Doe', '09123456789', '1997-08-06', 'Male', 'married', 'Marry Doe', 'Cow', 'Milking', 'Dairy Farm', 'Holstein', '2345', 'DEF', 'Standard Black and White', '2', '8', 5, '2', '2', '2018-08-20', '10', 'N/A', 'N/A', '200000', '2000000', 'Bovine viral diarrhea', 'Bovine viral diarrhea', 'Bovine respiratory disease', NULL),
(3, 339391, 'Livestock Mortality Insurance', 'John Doe', '09123456789', '1995-02-09', 'Male', 'married', 'Jane Doe', 'Cow', 'Milking', 'Dairy Farm', 'Holstein', '2345', 'Calf', 'Black and White', '2', '3', 4, '2', '2', '2021-01-22', '5', 'N/A', 'N/A', '250000', '2000000', 'Bovine viral diarrhea', 'Bovine viral diarrhea', 'Bovine respiratory disease', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) NOT NULL DEFAULT 'client',
  `account_no` int(11) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ci_form` varchar(255) DEFAULT NULL,
  `ci_comment` text DEFAULT NULL,
  `hvci_form` varchar(255) DEFAULT NULL,
  `hvci_comment` text DEFAULT NULL,
  `lmi_form` varchar(255) DEFAULT NULL,
  `lmi_comment` text NOT NULL,
  `ci_status` varchar(255) DEFAULT NULL,
  `ci_approval_date` date DEFAULT NULL,
  `ci_ps` varchar(255) DEFAULT NULL,
  `ci_pd` date DEFAULT NULL,
  `ci_tbp` int(11) DEFAULT NULL,
  `ci_ap` int(11) DEFAULT NULL,
  `ci_claim_application` varchar(255) DEFAULT NULL,
  `ci_claim_stat` varchar(255) DEFAULT NULL,
  `ci_claim_comment` text DEFAULT NULL,
  `ci_claim_date` date DEFAULT NULL,
  `hvci_status` varchar(255) DEFAULT NULL,
  `hvci_approval_date` date DEFAULT NULL,
  `hvci_ps` varchar(255) DEFAULT NULL,
  `hvci_pd` date DEFAULT NULL,
  `hvci_tbp` int(11) DEFAULT NULL,
  `hvci_ap` int(11) DEFAULT NULL,
  `hvci_claim_application` varchar(255) DEFAULT NULL,
  `hvci_claim_stat` varchar(255) DEFAULT NULL,
  `hvci_claim_comment` text DEFAULT NULL,
  `hvci_claim_date` date DEFAULT NULL,
  `lmi_status` varchar(255) DEFAULT NULL,
  `lmi_approval_date` date DEFAULT NULL,
  `lmi_ps` varchar(255) DEFAULT NULL,
  `lmi_pd` date DEFAULT NULL,
  `lmi_tbp` int(11) DEFAULT NULL,
  `lmi_ap` int(11) DEFAULT NULL,
  `lmi_claim_application` varchar(255) DEFAULT NULL,
  `lmi_claim_stat` varchar(255) DEFAULT NULL,
  `lmi_claim_comment` text DEFAULT NULL,
  `lmi_claim_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `avatar`, `account_type`, `account_no`, `contact_no`, `address`, `name`, `email`, `password`, `ci_form`, `ci_comment`, `hvci_form`, `hvci_comment`, `lmi_form`, `lmi_comment`, `ci_status`, `ci_approval_date`, `ci_ps`, `ci_pd`, `ci_tbp`, `ci_ap`, `ci_claim_application`, `ci_claim_stat`, `ci_claim_comment`, `ci_claim_date`, `hvci_status`, `hvci_approval_date`, `hvci_ps`, `hvci_pd`, `hvci_tbp`, `hvci_ap`, `hvci_claim_application`, `hvci_claim_stat`, `hvci_claim_comment`, `hvci_claim_date`, `lmi_status`, `lmi_approval_date`, `lmi_ps`, `lmi_pd`, `lmi_tbp`, `lmi_ap`, `lmi_claim_application`, `lmi_claim_stat`, `lmi_claim_comment`, `lmi_claim_date`) VALUES
(2032, NULL, 'client', 339391, '09123456789', ' Calauan, Laguna', 'John Doe', 'johndoe_12@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'John Doe_ci_form_application.pdf', '', 'John Doe_hvci_application_form.pdf_edited', '', 'John Doe_lmi_application_form.pdf', '', 'Approved', '2023-11-24', 'Active', '2023-11-29', 90000, 0, 'John Doe_edited_notice_of_loss_crop.pdf', 'Approved', '', '2023-11-24', 'Approved', '2023-11-29', 'Active', '2023-11-29', 90000, 0, 'John Doe_edited_notice_of_loss_hvcc.pdf', 'Approved', '', NULL, 'Pending', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(2034, NULL, 'client', 119121, '09751480826', 'Purok 3, Lamot 2, Calauan, Laguna', 'Mikasa Ackerman', 'mikasa_ackerman@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '', NULL, NULL, 'Mikasa Ackerman_lmi_application_form.pdf', '', NULL, NULL, NULL, NULL, NULL, 0, 'Mikasa Ackerman_edited_notice_of_death_lmi.pdf', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', '2023-11-29', 'Inactive', '2023-11-06', 125000, 0, 'Mikasa Ackerman_notice_of_death_lmi.pdf', 'Approved', '', NULL),
(2035, 'pengu darcc.jpg', 'client', 119126, '09123456987', 'Del Remedio, San Pablo, Laguna', 'Moira Dela Torre', 'moira@sample.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Moira Dela Torre_ci_form_application.pdf', '', 'Moira Dela Torre_hvci_application_form.pdf', NULL, 'Moira Dela Torre_lmi_application_form.pdf', '', 'Approved', '2023-11-24', NULL, NULL, 100000, NULL, NULL, NULL, NULL, NULL, 'Approved', '2023-11-10', NULL, NULL, 150000, NULL, NULL, NULL, NULL, NULL, 'Approved', '2023-10-31', NULL, NULL, 150000, NULL, NULL, NULL, NULL, NULL),
(2036, NULL, 'client', 119129, '09123456789', 'San Antonio, Quezon', 'test user 2', 'testuser2@sample.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '', 'test user 2_hvci_application_form.pdf', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', '2023-11-10', 'Active', '2023-11-10', 40000, 10000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmi_form`
--
ALTER TABLE `lmi_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lmi_form`
--
ALTER TABLE `lmi_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2037;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
