-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-15 14:36:33
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosadmin`
--

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_change_arrange` ()  BEGIN
DECLARE done int DEFAULT 0;
DECLARE exp_id int;
DECLARE infos varchar(10);

DECLARE idCur CURSOR FOR SELECT expert_code,info FROM apply WHERE ( stop_date = curdate() and state='同意' );
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
OPEN idCur;
REPEAT
FETCH idCur INTO exp_id,infos;
IF NOT done THEN
SELECT exp_id,infos;
CASE 
WHEN infos='monday' THEN
UPDATE arrange SET arrange.monday = '√' WHERE (expert_code = exp_id);
WHEN infos='tuesday' THEN
UPDATE arrange SET arrange.tuesday = '√' WHERE (expert_code = exp_id);
WHEN infos='wednesday' THEN
UPDATE arrange SET arrange.wednesday = '√' WHERE (expert_code = exp_id);
WHEN infos='thursday' THEN
UPDATE arrange SET arrange.thursday = '√' WHERE (expert_code = exp_id);
WHEN infos='friday' THEN
UPDATE arrange SET arrange.friday = '√' WHERE (expert_code = exp_id);
WHEN infos='saturday' THEN
UPDATE arrange SET arrange.saturday = '√' WHERE (expert_code = exp_id);
WHEN infos='sunday' THEN
UPDATE arrange SET arrange.sunday = '√' WHERE (expert_code = exp_id);
WHEN infos='monday2' THEN
UPDATE arrange SET arrange.monday2 = '√' WHERE (expert_code = exp_id);
WHEN infos='tuesday2' THEN
UPDATE arrange SET arrange.tuesday2 = '√' WHERE (expert_code = exp_id);
WHEN infos='wednesday2' THEN
UPDATE arrange SET arrange.wednesday2 = '√' WHERE (expert_code = exp_id);
WHEN infos='thursday2' THEN
UPDATE arrange SET arrange.thursday2 = '√' WHERE (expert_code = exp_id);
WHEN infos='friday2' THEN
UPDATE arrange SET arrange.friday2 = '√' WHERE (expert_code = exp_id);
WHEN infos='saturday2' THEN
UPDATE arrange SET arrange.saturday2 = '√' WHERE (expert_code = exp_id);
WHEN infos='sunday2' THEN
UPDATE arrange SET arrange.sunday2 = '√' WHERE (expert_code = exp_id);
ELSE BEGIN END;
END CASE;
END IF;
until done end REPEAT;
CLOSE idCur ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `apply`
--

CREATE TABLE `apply` (
  `hos_code` int(11) NOT NULL COMMENT '医院代码',
  `expert_code` int(11) NOT NULL COMMENT '专家工号',
  `expert_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '专家姓名',
  `start_date` date NOT NULL COMMENT '申请的日期',
  `stop_date` date NOT NULL COMMENT '申停的日期',
  `reason` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '原因',
  `state` varchar(10) COLLATE utf8_bin DEFAULT '没有值' COMMENT '状态',
  `info` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `appointment`
--

CREATE TABLE `appointment` (
  `user_id` varchar(18) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `hos_code` int(11) NOT NULL,
  `hos_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `department_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `expert_code` int(11) NOT NULL,
  `expert_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `appointment_date` date NOT NULL,
  `time` time NOT NULL,
  `state` varchar(10) COLLATE utf8_bin DEFAULT '没有值',
  `info` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '记录上午还是下午'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='预约表';

--
-- 转存表中的数据 `appointment`
--

INSERT INTO `appointment` (`user_id`, `user_name`, `hos_code`, `hos_name`, `department_name`, `expert_code`, `expert_name`, `appointment_date`, `time`, `state`, `info`) VALUES
('370902199603253312', '王思超', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-13', '09:00:00', '已爽约', 'saturday'),
('370902199603253312', '王思超', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-14', '09:00:00', '已爽约', 'sunday'),
('370902199603253312', '王思超', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-15', '09:00:00', '已爽约', 'monday'),
('370902199603253311', '石金升', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-19', '09:00:00', '已爽约', 'friday'),
('370902199603253311', '石金升', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-20', '14:00:00', '已爽约', 'saturday'),
('370902199603253311', '石金升', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-22', '09:00:00', '已爽约', 'monday'),
('370902199603253311', '石金升', 13, '青岛医院', '消化', 10000, '石金升', '2018-01-26', '09:00:00', '没有值', 'friday');

-- --------------------------------------------------------

--
-- 表的结构 `arrange`
--

CREATE TABLE `arrange` (
  `hos_code` int(11) NOT NULL COMMENT '医院代码',
  `expert_code` int(11) NOT NULL COMMENT '专家工号',
  `department_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '科室名称',
  `monday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期一',
  `tuesday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期二',
  `wednesday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期三',
  `thursday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期四',
  `friday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期五',
  `saturday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期六',
  `sunday` varchar(1) COLLATE utf8_bin DEFAULT NULL COMMENT '星期日',
  `monday2` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `tuesday2` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `wednesday2` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `thursday2` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `friday2` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `saturday2` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `sunday2` varchar(1) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `arrange`
--

INSERT INTO `arrange` (`hos_code`, `expert_code`, `department_name`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `monday2`, `tuesday2`, `wednesday2`, `thursday2`, `friday2`, `saturday2`, `sunday2`) VALUES
(13, 10000, '消化', '√', '×', '×', '×', '√', '√', '×', '×', '×', '×', '×', '×', '√', '×');

-- --------------------------------------------------------

--
-- 表的结构 `black`
--

CREATE TABLE `black` (
  `user_id` varchar(18) COLLATE utf8_bin NOT NULL COMMENT '患者身份证',
  `user_name` varchar(5) COLLATE utf8_bin NOT NULL COMMENT '患者姓名',
  `stop_date` date NOT NULL COMMENT '结束日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `black`
--

INSERT INTO `black` (`user_id`, `user_name`, `stop_date`) VALUES
('370902199603253311', '石金升', '2018-01-17');

--
-- 触发器 `black`
--
DELIMITER $$
CREATE TRIGGER `t_delete` BEFORE DELETE ON `black` FOR EACH ROW BEGIN
UPDATE user SET user_num = 0 WHERE user_id = old.user_id;  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE `department` (
  `hos_code` int(11) NOT NULL COMMENT '医院代码',
  `department_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '科室名称',
  `department_sort` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '科室种类',
  `department_describe` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '科室描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`hos_code`, `department_name`, `department_sort`, `department_describe`) VALUES
(13, '消化', '内科', '很好'),
(13, 'sa', '外科', 'rdsa');

-- --------------------------------------------------------

--
-- 表的结构 `expert`
--

CREATE TABLE `expert` (
  `hos_code` int(11) NOT NULL COMMENT '医院代码',
  `expert_code` int(11) NOT NULL COMMENT '专家工号',
  `expert_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '专家姓名',
  `department_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '科室名称',
  `expert_phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '专家电话',
  `expert_img` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '专家图片',
  `expert_skill` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '擅长领域',
  `expert_password` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '123456' COMMENT '专家密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `expert`
--

INSERT INTO `expert` (`hos_code`, `expert_code`, `expert_name`, `department_name`, `expert_phone`, `expert_img`, `expert_skill`, `expert_password`) VALUES
(13, 10000, '石金升', '消化', '', '/Hospital/Public/Uploads/5a5d972e32b93.jpg', '', '123456'),
(13, 10001, '王略韬', 'sa', NULL, NULL, NULL, '123456');

--
-- 触发器 `expert`
--
DELIMITER $$
CREATE TRIGGER `t_del_arrange` BEFORE DELETE ON `expert` FOR EACH ROW DELETE FROM arrange WHERE ( expert_code = old.expert_code )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `hospital`
--

CREATE TABLE `hospital` (
  `hos_code` int(11) NOT NULL COMMENT '医院代码',
  `hos_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '医院名称',
  `hos_password` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '123456' COMMENT '医院管理员密码',
  `hos_area` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '行政区划',
  `hos_rank` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '医院级别',
  `hos_pic` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '医院图片',
  `hos_contact` varchar(12) COLLATE utf8_bin DEFAULT NULL COMMENT '医院联系方式',
  `hos_address` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '医院地址',
  `hos_introduce` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '医院介绍'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `hospital`
--

INSERT INTO `hospital` (`hos_code`, `hos_name`, `hos_password`, `hos_area`, `hos_rank`, `hos_pic`, `hos_contact`, `hos_address`, `hos_introduce`) VALUES
(13, '青岛医院', '123456', '莱西市', '三级甲等', '/Hospital/Public/Uploads/5a5d93d7216b5.jpg', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(18) COLLATE utf8_bin NOT NULL COMMENT '患者身份证',
  `user_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '患者姓名',
  `user_phone` varchar(11) COLLATE utf8_bin NOT NULL COMMENT '患者电话',
  `user_num` int(11) NOT NULL DEFAULT '0' COMMENT '患者爽约次数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_phone`, `user_num`) VALUES
('370902199603253311', '石金升', '13026535531', 0),
('370902199603253312', '王思超', '17854239340', 0);

--
-- 触发器 `user`
--
DELIMITER $$
CREATE TRIGGER `t_insert` AFTER UPDATE ON `user` FOR EACH ROW BEGIN 
IF new.user_num=3 THEN
INSERT INTO black VALUES(new.user_id,new.user_name,date_add(CURRENT_DATE(), interval 5 month));
END IF;  
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `expert_code` (`expert_code`),
  ADD KEY `appointment_date` (`appointment_date`);

--
-- Indexes for table `arrange`
--
ALTER TABLE `arrange`
  ADD PRIMARY KEY (`expert_code`);

--
-- Indexes for table `black`
--
ALTER TABLE `black`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`expert_code`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hos_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `expert`
--
ALTER TABLE `expert`
  MODIFY `expert_code` int(11) NOT NULL AUTO_INCREMENT COMMENT '专家工号', AUTO_INCREMENT=10002;

--
-- 使用表AUTO_INCREMENT `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hos_code` int(11) NOT NULL AUTO_INCREMENT COMMENT '医院代码', AUTO_INCREMENT=14;

DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`root`@`localhost` EVENT `event_check_day` ON SCHEDULE EVERY 1 DAY STARTS '2018-01-14 00:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN  
DELETE FROM black WHERE stop_date=curdate();
END$$

CREATE DEFINER=`root`@`localhost` EVENT `event_checkapply` ON SCHEDULE EVERY 1 DAY STARTS '2018-01-15 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO call sp_change_arrange()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
