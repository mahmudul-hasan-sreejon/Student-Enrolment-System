SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `extra1`
--

CREATE TABLE `extra1` (
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `extra1`
--

INSERT INTO `extra1` (`adm_no`, `name`) VALUES
('01', 'sreejon'),
('02', 'anwar'),
('03', 'test1'),
('04', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `extra2`
--

CREATE TABLE `extra2` (
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `extra2`
--

INSERT INTO `extra2` (`adm_no`, `name`) VALUES
('01', 'sreejon'),
('02', 'anwar'),
('03', 'test1'),
('04', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `extra3`
--

CREATE TABLE `extra3` (
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `extra3`
--

INSERT INTO `extra3` (`adm_no`, `name`) VALUES
('01', 'sreejon'),
('02', 'anwar'),
('03', 'test1'),
('04', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `last_entry`
--

CREATE TABLE `last_entry` (
  `id` int(1) NOT NULL,
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `last_entry`
--

INSERT INTO `last_entry` (`id`, `adm_no`, `name`) VALUES
(1, '04', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `stud_adm`
--

CREATE TABLE `stud_adm` (
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tc_issue` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` mediumblob,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `twnvill` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gen` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `caste` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `comunit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_ed_qua` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cls_adm` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cls_sec` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `grop_adm` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `med_adm` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dat_adm` date NOT NULL,
  `emis_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `f_add_pin` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `ph_no` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stud_adm`
--

INSERT INTO `stud_adm` (`adm_no`, `tc_issue`, `name`, `img`, `year`, `twnvill`, `dob`, `gen`, `religion`, `caste`, `comunit`, `fname`, `f_ed_qua`, `cls_adm`, `cls_sec`, `grop_adm`, `med_adm`, `dat_adm`, `emis_no`, `f_add_pin`, `ph_no`) VALUES
('01', 'ISSUED', 'sreejon', 0x37333235343838556e7469746c65642d322e6a7067, '2012', 'Dhaka', '0000-00-00', 'Male', 'Muslim', 'None', 'None', 'Solaiman Hossain', 'Engineer', 'CSE', 'A', 'CSE', 'Bangla', '2012-03-01', '123456789', 'Mirpur 10, Dhaka, 1216', '01712356897'),
('02', '', 'anwar', NULL, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('03', '', 'test1', NULL, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('04', '', 'test2', NULL, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stud_fee`
--

CREATE TABLE `stud_fee` (
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cls_adm` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cls_sec` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `term` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `term_amt` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `part_1_paid_amt` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `part_1_bank` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `part_1_chelan_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `part_1_chelan_date` date NOT NULL,
  `part_1_rmrks` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `part_2_paid_amt` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `part_2_bank` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `part_2_chelan_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `part_2_chelan_date` date NOT NULL,
  `part_2_rmrks` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `term_balance` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stud_id`
--

CREATE TABLE `stud_id` (
  `adm_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains ID for All Students';

--
-- Dumping data for table `stud_id`
--

INSERT INTO `stud_id` (`adm_no`) VALUES
('01'),
('02'),
('03'),
('04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `eid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `mpwd` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`eid`, `pwd`, `mpwd`) VALUES
('admin@ist.com', '1', '1'),
('ist@ist.com', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `extra1`
--
ALTER TABLE `extra1`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `extra2`
--
ALTER TABLE `extra2`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `extra3`
--
ALTER TABLE `extra3`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `last_entry`
--
ALTER TABLE `last_entry`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `stud_adm`
--
ALTER TABLE `stud_adm`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `stud_fee`
--
ALTER TABLE `stud_fee`
  ADD UNIQUE KEY `adm_no` (`adm_no`,`term`);

--
-- Indexes for table `stud_id`
--
ALTER TABLE `stud_id`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`eid`);