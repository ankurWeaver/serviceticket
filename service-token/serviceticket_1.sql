-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: database-1.cd84s36qthlm.ap-south-1.rds.amazonaws.com:3306
-- Generation Time: Jun 10, 2020 at 04:05 PM
-- Server version: 5.7.26-log
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serviceticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `env_service_settings`
--

CREATE TABLE IF NOT EXISTS `env_service_settings` (
  `ess_id` int(11) NOT NULL,
  `ess_mss_id` int(8) NOT NULL,
  `ess_meta_key` varchar(50) NOT NULL,
  `ess_meta_value` varchar(255) NOT NULL,
  `ess_content_type` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `env_service_settings`
--

INSERT INTO `env_service_settings` (`ess_id`, `ess_mss_id`, `ess_meta_key`, `ess_meta_value`, `ess_content_type`) VALUES
(1, 1, '_tax_rate', '18', 'text'),
(2, 1, '_associated_images', 'path/img99.jpg,path/img88.jpg', 'coma_separated'),
(3, 1, '_associated_videos', 'path/video85.mp4,path/video66.mp4', 'coma_separated'),
(6, 1, '_Service_type', 'Sanitizing', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `env_user_type`
--

CREATE TABLE IF NOT EXISTS `env_user_type` (
  `eut_id` int(11) NOT NULL,
  `eut_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `env_user_type`
--

INSERT INTO `env_user_type` (`eut_id`, `eut_name`) VALUES
(1, 'Employee'),
(2, 'Manager'),
(3, 'trainee');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test-item', 'Test...shskdhs..sdskjsdf..sfsf.', '2020-05-25 11:23:15', '2020-05-26 11:23:15'),
(2, 'test-item-2', 'PQRTskjfk sjkjf sljjf sdskjsdf..sfsf.', '2020-05-25 12:23:15', '2020-05-28 11:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `map_service_rawmaterial`
--

CREATE TABLE IF NOT EXISTS `map_service_rawmaterial` (
  `psr_id` int(11) NOT NULL,
  `psr_msc_id` int(5) NOT NULL,
  `psr_mrm_id` int(4) NOT NULL,
  `psr_qty` double NOT NULL DEFAULT '0',
  `psr_raw_material_measure` varchar(20) NOT NULL,
  `psr_qty_per_unit` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map_service_rawmaterial`
--

INSERT INTO `map_service_rawmaterial` (`psr_id`, `psr_msc_id`, `psr_mrm_id`, `psr_qty`, `psr_raw_material_measure`, `psr_qty_per_unit`) VALUES
(1, 1, 1, 0.5, '1', 1),
(2, 1, 5, 1, '2000', 1),
(3, 1, 10, 0.3, '1', 1),
(4, 1, 9, 1, '1000', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `mst_company`
--

CREATE TABLE IF NOT EXISTS `mst_company` (
  `mc_id` int(11) NOT NULL,
  `mc_code` int(4) NOT NULL,
  `mc_name` varchar(100) NOT NULL,
  `mc_desc` varchar(200) NOT NULL,
  `mc_address` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_company`
--

INSERT INTO `mst_company` (`mc_id`, `mc_code`, `mc_name`, `mc_desc`, `mc_address`) VALUES
(1, 10, 'MASS', 'Software development company', 'Keyatala');

-- --------------------------------------------------------

--
-- Table structure for table `mst_raw_material`
--

CREATE TABLE IF NOT EXISTS `mst_raw_material` (
  `mrm_id` int(11) NOT NULL,
  `mrm_raw_material_name` varchar(200) NOT NULL,
  `mrm_desc` varchar(200) NOT NULL,
  `mrm_type` int(2) NOT NULL COMMENT '1=consumable, 2= reusable, 3= accessories ',
  `mrm_unit` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_raw_material`
--

INSERT INTO `mst_raw_material` (`mrm_id`, `mrm_raw_material_name`, `mrm_desc`, `mrm_type`, `mrm_unit`) VALUES
(1, 'Alcohol based sanitizer', 'Alcohol based sanitizer', 1, 'Litre'),
(2, 'Lizol Disinfectant Surface Cleaner Floral', 'Test update will happen', 1, 'Litre'),
(3, 'silver hydrogen peroxide based universal disinfectant ', 'silver hydrogen peroxide based universal disinfectant ', 1, 'Litre'),
(4, 'MIST Fog and spray disinfectant ', 'MIST Fog and spray disinfectant ', 1, 'Litre'),
(5, 'Face shield', 'Face shield', 2, 'PCs'),
(6, 'Fire extinguisher', 'Fire extinguisher', 2, 'PCs'),
(9, 'Power bank 11000 mAH', 'Power bank 11000 mAH, Brand - Lenavo', 2, 'Pcs'),
(10, 'Detergent dust', 'power based detergent. ', 1, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_service_catalogue`
--

CREATE TABLE IF NOT EXISTS `mst_service_catalogue` (
  `msc_id` int(11) NOT NULL,
  `mss_name` varchar(50) NOT NULL,
  `mss_desc` varchar(255) NOT NULL,
  `mss_service_code` varchar(100) NOT NULL DEFAULT 'NA',
  `msc_measure_unit` varchar(10) NOT NULL,
  `mss_HSN_code` varchar(20) NOT NULL DEFAULT 'NA',
  `mss_details` text NOT NULL,
  `mss_createdby_mu_id` int(5) NOT NULL,
  `mss_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_service_catalogue`
--

INSERT INTO `mst_service_catalogue` (`msc_id`, `mss_name`, `mss_desc`, `mss_service_code`, `msc_measure_unit`, `mss_HSN_code`, `mss_details`, `mss_createdby_mu_id`, `mss_createdon`) VALUES
(1, 'sanitizing mall', 'sanitizing mall with xx tools and process oriented to certain extend. yy will be the timeline approx zz per sq ft. Price are included all equipment, labor charges, material cost. \r\nMaterial are as follow: \r\n<li>pxxxx</li>\r\n<li>pyyyy</li>\r\n<li>pmmmm</li>\r\n', 'SRV#115577', 'sqft', 'HSN#9954', 'sanitizing mall with xx tools and process oriented to certain extend. yy will be the timeline approx zz per sq ft. Price are included all equipment, labor charges, material cost. \r\nMaterial are as follow: \r\n<li>pxxxx</li>\r\n<li>pyyyy</li>\r\n<li>pmmmm</li>\r\nTerms and conditions as follows:\r\n<br>hdjshdsjhdjsd skdhsdjshdjs sjkhsjdhjhs sjhd</br>', 1, '2020-05-21 07:16:13'),
(2, 'sanitizing Cinema hall', 'sanitizing Cinema hall with xx tools and process oriented to certain extend. yy will be the timeline approx zz per sq ft. Price are included all equipment, labor charges, material cost. \r\nMaterial are as follow: \r\n<li>pxxxx</li>\r\n<li>pyyyy</li>\r\n<li>pmmmm', 'SRV#5522', 'sqft', 'HSN#9954', 'sanitizing Cinema cinema skhdksd Cinema with xx tools and process oriented to certain extend. yy will be the timeline approx zz per sq ft. Price are included all equipment, labor charges, material cost. \r\nMaterial are as follow: \r\n<li>pxxxx</li>\r\n<li>pyyyy</li>\r\n<li>pmmmm</li>\r\nTerms and conditions as follows:\r\n<br>hdjshdsjhdjsd skdhsdjshdjs sjkhsjdhjhs sjhd</br>', 1, '2020-05-28 07:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE IF NOT EXISTS `mst_users` (
  `mu_id` int(11) NOT NULL,
  `mu_username` varchar(50) NOT NULL,
  `mu_password` varchar(50) NOT NULL,
  `mu_type` int(2) NOT NULL,
  `mu_enable` tinyint(1) NOT NULL,
  `mu_name` varchar(50) NOT NULL,
  `mu_email` varchar(100) NOT NULL,
  `mu_mob` varchar(15) NOT NULL,
  `mu_gst` varchar(15) NOT NULL,
  `mu_pan` varchar(15) NOT NULL,
  `mu_company_code` int(3) NOT NULL,
  `mu_access` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`mu_id`, `mu_username`, `mu_password`, `mu_type`, `mu_enable`, `mu_name`, `mu_email`, `mu_mob`, `mu_gst`, `mu_pan`, `mu_company_code`, `mu_access`) VALUES
(1, '9000009987', 'ba5ef51294fea5cb4eadea5306f3ca3b', 1, 1, 'Biprojit', 'biprojit@masspl.com', '9000009987', 'GHYT1234H', 'AVHUT4165G', 1, 'json formatted data in serialize format'),
(2, '9999888877', 'ba5ef51294fea5cb4eadea5306f3ca3b', 1, 1, 'Indranil Banerjee', 'indranil@masspl.com', '9999888877', 'NA', 'ABJJH6654G', 1, 'NA'),
(4, '9432881844', 'ba5ef51294fea5cb4eadea5306f3ca3b', 1, 0, 'Indranil Banerjee', 'indranil@masspl.com', '9432881844', 'NA', 'AVOPB4179J', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `trn_agent_workday`
--

CREATE TABLE IF NOT EXISTS `trn_agent_workday` (
  `taw_id` int(11) NOT NULL,
  `taw_mu_id` int(4) NOT NULL,
  `taw_msc_id` int(4) NOT NULL,
  `taw_tsbd_id` int(8) NOT NULL,
  `taw_workday` date NOT NULL,
  `taw_worktime` int(6) NOT NULL COMMENT '1030 = 10:30 AM, 1420=2:20 PM',
  `taw_duty_duration` int(8) NOT NULL COMMENT 'in Minutes',
  `taw_part_qty` int(10) NOT NULL DEFAULT '0',
  `taw_duty_desc` varchar(255) NOT NULL DEFAULT 'NA',
  `taw_is_started` tinyint(2) NOT NULL,
  `taw_duty_comment` varchar(255) NOT NULL DEFAULT 'NA',
  `taw_coordinate_json` text,
  `taw_images_json` text,
  `taw_completion_time` varchar(20) DEFAULT NULL,
  `taw_material_json` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_agent_workday`
--

INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES
(1, 1, 1, 1, '2020-06-01', 1000, 90, 2000, 'NA', 0, 'NA', '"[{"time":"1040","long":"22.5726 N","lad":"88.3639 E"},{"time":"1042","long":"22.5729 N","lad":"88.3642 E"},{"time":"1044","long":"22.5732 N","lad":"88.3647 E"},{"time":"1046","long":"22.5738 N","lad":"88.3693 E"}]"', 'NA', NULL, NULL),
(2, 1, 1, 1, '2020-06-01', 1430, 120, 1000, 'NA', 0, 'NA', '"[{"time":"1440","long":"22.5726 N","lad":"88.3639 E"},{"time":"1442","long":"22.5729 N","lad":"88.3642 E"},{"time":"1444","long":"22.5732 N","lad":"88.3647 E"},{"time":"1446","long":"22.5738 N","lad":"88.3693 E"}]"', 'NA', NULL, NULL),
(3, 1, 1, 1, '2020-06-02', 1030, 90, 3000, 'NA', 3, 'Duty comment(optional)', '"[{"time":"1440","long":"22.5726 N","lad":"88.3639 E"},{"time":"1442","long":"22.5729 N","lad":"88.3642 E"},{"time":"1444","long":"22.5732 N","lad":"88.3647 E"},{"time":"1446","long":"22.5738 N","lad":"88.3693 E"}]"', '"[{"time":"1440","imagetype":"1","imagepath":"asset/mobilupload/image_name.jpg"},{"time":"1450","imagetype":"1","imagepath":"asset/mobilupload/image_name_33.jpg"},{"time":"1500","imagetype":"2","imagepath":"asset/mobilupload/image_name55.jpg"},{"time":"1530","imagetype":"2","imagepath":"asset/mobilupload/image_name2.jpg"}]"', '1550', NULL),
(4, 1, 1, 1, '2020-06-02', 1530, 90, 5000, 'NA', 0, 'NA', 'NA', 'NA', NULL, NULL),
(5, 1, 1, 1, '2020-06-10', 1030, 90, 8000, 'NA', 1, 'Not Yet Created', '[]', '[{"time":"","imagetype":1,"imagepath":"https://serviceticket.bongobashi.in/asset/mobileupload/200609161614.jpg"},{"time":"","imagetype":2,"imagepath":"https://serviceticket.bongobashi.in/asset/mobileupload/200609161732.jpg"}]', '0000', NULL),
(6, 1, 1, 1, '2020-06-10', 1130, 90, 4000, 'NA', 0, 'ygjhgkhkjhljljl', '&quot;[{&quot;time&quot;:&quot;1440&quot;,&quot;long&quot;:&quot;22.5726 N&quot;,&quot;lad&quot;:&quot;88.3639\nE&quot;},{&quot;time&quot;:&quot;1442&quot;,&quot;long&quot;:&quot;22.5729 N&quot;,&quot;lad&quot;:&quot;88.3642 E&quot;},{&quot;time&quot;:&quot;1444&quot;,&quot;long&quot;:&quot;22.5732\nN&quot;,&quot;lad&quot;:&quot;88.3647 E&quot;},{&quot;time&quot;:&quot;1446&quot;,&quot;long&quot;:&quot;22.5738 N&quot;,&quot;lad&quot;:&quot;88.3693 E&quot;}]&quot;', '&quot;[{&quot;time&quot;:&quot;1440&quot;,&quot;imagetype&quot;:&quot;1&quot;,&quot;imagepath&quot;:&quot;asset/mobilupload/image_name.jpg&quot;},{&quot;time&quot;:&quot;145\n0&quot;,&quot;imagetype&quot;:&quot;1&quot;,&quot;imagepath&quot;:&quot;asset/mobilupload/image_name_33.jpg&quot;},{&quot;time&quot;:&quot;1500&quot;,&quot;imaget\nype&quot;:&quot;2&quot;,&quot;imagepath&quot;:&quot;asset/mobilupload/image_name55.jpg&quot;},{&quot;time&quot;:&quot;1530&quot;,&quot;imagetype&quot;:&quot;2&quot;,&quot;im\nagepath&quot;:&quot;asset/mobilupload/image_name2.jpg&quot;}]&quot;', '&quot;1550&quot;', NULL),
(7, 1, 1, 1, '2020-06-10', 1140, 90, 4000, 'NA', 0, 'NA', 'NA', 'NA', NULL, NULL),
(8, 1, 1, 1, '2020-06-02', 1040, 90, 2000, 'NA', 0, 'NA', 'NA', 'NA', NULL, NULL),
(9, 1, 1, 1, '2020-06-02', 1630, 90, 1000, 'NA', 0, 'NA', 'NA', 'NA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trn_order_stats`
--

CREATE TABLE IF NOT EXISTS `trn_order_stats` (
  `tos_id` int(11) NOT NULL,
  `tos_tsbd_id` int(5) NOT NULL,
  `tos_mss_id` int(8) NOT NULL DEFAULT '0',
  `tos_contract_id` varchar(30) NOT NULL DEFAULT 'NA',
  `tos_placed_mu_id` int(5) NOT NULL,
  `tos_order_status` int(2) NOT NULL DEFAULT '0',
  `tos_order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tos_base_rate_approx` double NOT NULL DEFAULT '0',
  `tos_tax_total_approx` double NOT NULL DEFAULT '0',
  `tos_net_rate_approx` double NOT NULL DEFAULT '0',
  `tos_delivery_type` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_order_stats`
--

INSERT INTO `trn_order_stats` (`tos_id`, `tos_tsbd_id`, `tos_mss_id`, `tos_contract_id`, `tos_placed_mu_id`, `tos_order_status`, `tos_order_date`, `tos_base_rate_approx`, `tos_tax_total_approx`, `tos_net_rate_approx`, `tos_delivery_type`) VALUES
(1, 1, 1, 'CT000115', 2, 1, '2020-05-22 18:57:21', 0.25, 18, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_raw_material_equip`
--

CREATE TABLE IF NOT EXISTS `trn_raw_material_equip` (
  `trme_id` int(11) NOT NULL,
  `trme_mrm_id` int(5) NOT NULL,
  `trme_item_qty` int(5) NOT NULL DEFAULT '0',
  `trme_msh_contract_id` varchar(20) NOT NULL,
  `trme_tsbd_id` int(11) NOT NULL,
  `trme_ratio` double NOT NULL COMMENT '-1=full contract\r\n0=reusable\r\n>0=for multiple with unit measure\r\n '
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_raw_material_equip`
--

INSERT INTO `trn_raw_material_equip` (`trme_id`, `trme_mrm_id`, `trme_item_qty`, `trme_msh_contract_id`, `trme_tsbd_id`, `trme_ratio`) VALUES
(1, 1, 2, 'CT000115', 1, 1),
(3, 2, 1, 'CT000115', 1, 1),
(4, 3, 25, 'CT000115', 1, 1),
(5, 4, 30, 'CT000115', 1, 1),
(6, 5, 20, 'CT000115', 1, 0.5),
(7, 6, 1, 'CT000115', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trn_shopping_bouget_detail`
--

CREATE TABLE IF NOT EXISTS `trn_shopping_bouget_detail` (
  `tsbd_id` int(11) NOT NULL,
  `tsbd_tsbh_id` int(5) NOT NULL,
  `tsbd_msc_id` int(5) NOT NULL,
  `tsbd_frequency` varchar(100) NOT NULL,
  `tsbd_count` int(11) NOT NULL,
  `tsbd_delivery_addr` varchar(250) NOT NULL,
  `tsbd_qty` int(11) NOT NULL,
  `tsbd_from_date` date NOT NULL,
  `tsbd_to_date` date NOT NULL,
  `tsbd_onsite_supervisor_name` varchar(50) NOT NULL,
  `tsbd_onsite_supervisor_email` varchar(100) NOT NULL,
  `tsbd_onsite_mgr_name` varchar(50) NOT NULL,
  `tsbd_onsite_mgr_email` varchar(100) NOT NULL,
  `tsbd_onsite_mgr_mob` varchar(13) NOT NULL,
  `tsbd_billing_details` varchar(255) NOT NULL,
  `tsbd_is_agent` tinyint(1) NOT NULL,
  `tsbd_onsite_mgr_verified` tinyint(1) NOT NULL,
  `tsbd_agent_verified` tinyint(1) NOT NULL,
  `tsbd_is_explode` int(2) NOT NULL COMMENT '0=not started,1=processing,3=locked'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_shopping_bouget_detail`
--

INSERT INTO `trn_shopping_bouget_detail` (`tsbd_id`, `tsbd_tsbh_id`, `tsbd_msc_id`, `tsbd_frequency`, `tsbd_count`, `tsbd_delivery_addr`, `tsbd_qty`, `tsbd_from_date`, `tsbd_to_date`, `tsbd_onsite_supervisor_name`, `tsbd_onsite_supervisor_email`, `tsbd_onsite_mgr_name`, `tsbd_onsite_mgr_email`, `tsbd_onsite_mgr_mob`, `tsbd_billing_details`, `tsbd_is_agent`, `tsbd_onsite_mgr_verified`, `tsbd_agent_verified`, `tsbd_is_explode`) VALUES
(1, 1, 1, '{"type":"weekly","count":"3","day":"Mon,fri"}', 3, '', 1000, '2020-05-30', '2020-06-30', 'Anand Kumar', 'anand@test.com', 'Deepak Roy', 'deepak@test.com', '9999999922', '{serialize address}', 0, 1, 0, 3),
(2, 1, 2, '{"type":"daily","count":"1"}', 1, '', 500, '2020-05-20', '2020-06-20', 'Bikash Kumar', 'bikash@test2.com', 'Deepak Roy', 'deepak@test.com', '9999999922', '{serialize address}', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trn_shopping_bouget_header`
--

CREATE TABLE IF NOT EXISTS `trn_shopping_bouget_header` (
  `tsbh_id` int(11) NOT NULL,
  `tsbh_contract_id` varchar(50) NOT NULL DEFAULT 'NA',
  `tbsh_mu_id` int(5) NOT NULL,
  `tsbh_status` int(2) NOT NULL DEFAULT '0' COMMENT '1=yet to start,2=processing,3=completed,4=cancelled',
  `tbsh_billing_details` text NOT NULL,
  `tbsh_pan_details` varchar(12) NOT NULL DEFAULT 'NA',
  `tbsh_gst_no` varchar(14) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_shopping_bouget_header`
--

INSERT INTO `trn_shopping_bouget_header` (`tsbh_id`, `tsbh_contract_id`, `tbsh_mu_id`, `tsbh_status`, `tbsh_billing_details`, `tbsh_pan_details`, `tbsh_gst_no`) VALUES
(1, 'CT000115', 2, 1, 'Name: Tapas Sarkar, 233 nbc, Kolkata-700023', 'AVJJH6626K', 'NA'),
(2, 'CT000116', 1, 2, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `env_service_settings`
--
ALTER TABLE `env_service_settings`
  ADD PRIMARY KEY (`ess_id`),
  ADD KEY `ess_mss_id` (`ess_mss_id`) USING BTREE;

--
-- Indexes for table `env_user_type`
--
ALTER TABLE `env_user_type`
  ADD PRIMARY KEY (`eut_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_service_rawmaterial`
--
ALTER TABLE `map_service_rawmaterial`
  ADD PRIMARY KEY (`psr_id`);

--
-- Indexes for table `mst_company`
--
ALTER TABLE `mst_company`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `mst_raw_material`
--
ALTER TABLE `mst_raw_material`
  ADD PRIMARY KEY (`mrm_id`);

--
-- Indexes for table `mst_service_catalogue`
--
ALTER TABLE `mst_service_catalogue`
  ADD PRIMARY KEY (`msc_id`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`mu_id`),
  ADD UNIQUE KEY `mu_username` (`mu_username`);

--
-- Indexes for table `trn_agent_workday`
--
ALTER TABLE `trn_agent_workday`
  ADD PRIMARY KEY (`taw_id`);

--
-- Indexes for table `trn_order_stats`
--
ALTER TABLE `trn_order_stats`
  ADD PRIMARY KEY (`tos_id`);

--
-- Indexes for table `trn_raw_material_equip`
--
ALTER TABLE `trn_raw_material_equip`
  ADD PRIMARY KEY (`trme_id`);

--
-- Indexes for table `trn_shopping_bouget_detail`
--
ALTER TABLE `trn_shopping_bouget_detail`
  ADD PRIMARY KEY (`tsbd_id`);

--
-- Indexes for table `trn_shopping_bouget_header`
--
ALTER TABLE `trn_shopping_bouget_header`
  ADD PRIMARY KEY (`tsbh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `env_service_settings`
--
ALTER TABLE `env_service_settings`
  MODIFY `ess_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `env_user_type`
--
ALTER TABLE `env_user_type`
  MODIFY `eut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `map_service_rawmaterial`
--
ALTER TABLE `map_service_rawmaterial`
  MODIFY `psr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mst_company`
--
ALTER TABLE `mst_company`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_raw_material`
--
ALTER TABLE `mst_raw_material`
  MODIFY `mrm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mst_service_catalogue`
--
ALTER TABLE `mst_service_catalogue`
  MODIFY `msc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_users`
--
ALTER TABLE `mst_users`
  MODIFY `mu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trn_agent_workday`
--
ALTER TABLE `trn_agent_workday`
  MODIFY `taw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trn_order_stats`
--
ALTER TABLE `trn_order_stats`
  MODIFY `tos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trn_raw_material_equip`
--
ALTER TABLE `trn_raw_material_equip`
  MODIFY `trme_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trn_shopping_bouget_detail`
--
ALTER TABLE `trn_shopping_bouget_detail`
  MODIFY `tsbd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trn_shopping_bouget_header`
--
ALTER TABLE `trn_shopping_bouget_header`
  MODIFY `tsbh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`admin`@`%` EVENT `insert_row` ON SCHEDULE EVERY 1 DAY STARTS '2020-06-02 07:20:00' ENDS '2020-06-05 02:07:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `serviceticket`.`trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`) VALUES (NULL, '1', '1', '1', '2020-06-04', '1730', '90', 'NA', '0', 'NA', 'NA', 'NA')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
