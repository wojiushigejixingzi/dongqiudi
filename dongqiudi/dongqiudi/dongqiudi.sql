-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?08 �?03 �?16:07
-- 服务器版本: 5.5.40
-- PHP 版本: 5.5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dongqiudi`
--

-- --------------------------------------------------------

--
-- 表的结构 `fc_comment`
--

CREATE TABLE IF NOT EXISTS `fc_comment` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `news_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属新闻',
  `content` text NOT NULL COMMENT '评论内容',
  `fabulous` int(10) NOT NULL DEFAULT '0' COMMENT '赞',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级评论id,若是一级评论则为0',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `updatetime` int(11) NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论内容' AUTO_INCREMENT=92 ;

--
-- 转存表中的数据 `fc_comment`
--

INSERT INTO `fc_comment` (`comment_id`, `news_id`, `content`, `fabulous`, `parent_id`, `user_id`, `updatetime`) VALUES
(1, 29, '我是内马尔', 1, 0, 1, 1491376172),
(2, 29, '请问梅西在吗', 0, 0, 1, 1491376183),
(3, 29, '我是梅西。怎么了', 0, 2, 2, 1491376237),
(4, 29, '今天我要进球哦', 0, 3, 1, 1491376285),
(5, 29, '我也来凑热闹了', 0, 0, 4, 1491376477),
(6, 29, '加油哦', 0, 4, 4, 1491376491),
(7, 54, '怀念AC米兰时代的帕托啊', 1, 0, 2, 1491447586),
(8, 55, '可怜了我的肖', 2, 0, 2, 1491448094),
(9, 56, '阿扎尔', 1, 0, 2, 1491485567),
(10, 56, '送到发', 2, 0, 1, 1491530891),
(11, 52, '你好', 1, 0, 2, 1491743646),
(12, 52, '啦啦啦', 1, 11, 2, 1491743658),
(13, 52, '讽德诵功', 0, 0, 2, 1491743676),
(14, 56, '士大夫', 0, 0, 2, 1491743692),
(15, 54, '的是法国', 1, 0, 2, 1491744227),
(16, 54, '第三方', 0, 0, 2, 1491744233),
(17, 52, '梵蒂冈', 0, 0, 2, 1491744267),
(18, 56, '第三方', 2, 0, 2, 1491744846),
(19, 47, '哈维旋转', 0, 0, 2, 1491744960),
(20, 49, '豆腐干', 1, 0, 4, 1491750764),
(21, 49, '顺丰大概', 0, 0, 4, 1491750768),
(22, 57, '爱的色放', 1, 0, 1, 1491795951),
(23, 57, '广东韶关', 0, 22, 1, 1491795960),
(24, 63, '河南建业　ｖｓ　江苏苏宁', 2, 0, 34, 1492069699),
(25, 67, '哈哈哈哈哈', 3, 0, 1, 1492586949),
(26, 66, '曼联曼联', 1, 0, 34, 1492588898),
(27, 66, '曼联威武', 1, 26, 34, 1492588907),
(28, 70, '卧槽啊  真是抢人头', 1, 0, 34, 1492589068),
(29, 61, '啦啦啦', 1, 0, 4, 1492591569),
(30, 61, '哈哈哈', 1, 29, 4, 1492591575),
(31, 61, '王总大傻逼！！', 0, 0, 32, 1493289676),
(32, 61, 'zzddsb', 0, 0, 32, 1493289685),
(33, 61, 'mldsb', 0, 0, 32, 1493289690),
(34, 61, '2.1 拷贝jar包\n如要第三方的jar包ehcache-1.5.0.jar，并且依赖于\n依赖backport-util-concurrent 和 commons-logging\n2.2 在hibernate.cfg.xml中开启二级缓存\n<propertyname=\\"hibernate.cache.use_second_level_cache\\">true</property>\n2.3 配置二级缓存技术提供商\n\n<propertyname=\\"hibernate.cache.provider_class\\">org.hibernate.cache.EhCacheProvider</property>\n2.4 配置缓存数据对象并发策略', 0, 0, 32, 1493289718),
(35, 61, '你这个能分页吗', 0, 0, 32, 1493289733),
(36, 61, '呀哈哈哈哈哈哈王总加油！！', 0, 0, 32, 1493289760),
(37, 61, '等着你请客大保健啊！', 0, 0, 32, 1493289778),
(38, 61, '请你妹', 0, 37, 4, 1493291565),
(39, 73, '光华666', 1, 0, 1, 1495867165),
(40, 73, '666', 0, 39, 1, 1495867208),
(41, 61, '测试', 0, 0, 1, 1501493298),
(42, 61, '测试', 0, 0, 1, 1501493301),
(43, 61, '测试1', 0, 0, 1, 1501573581),
(44, 61, '测试2', 0, 0, 1, 1501573633),
(45, 61, '测试3', 0, 0, 1, 1501573692),
(46, 61, '测试4', 0, 0, 1, 1501574097),
(47, 61, '测试5', 0, 0, 1, 1501574845),
(48, 61, '测试5', 0, 0, 1, 1501574945),
(49, 61, '测试6', 0, 0, 1, 1501575113),
(50, 61, '测试7', 0, 0, 1, 1501575246),
(51, 61, '测试8', 0, 0, 1, 1501575421),
(52, 61, '测试9', 0, 0, 1, 1501575443),
(53, 61, '测试10', 0, 0, 1, 1501575881),
(54, 61, '测试11', 0, 0, 1, 1501575974),
(55, 61, '测试12', 0, 0, 1, 1501576023),
(56, 61, '测试13', 0, 0, 1, 1501576090),
(57, 61, '测试14', 0, 0, 1, 1501576195),
(58, 61, '测试15', 0, 0, 1, 1501576360),
(59, 61, '测试16', 0, 0, 1, 1501577120),
(60, 61, '测试17', 0, 0, 1, 1501577194),
(61, 61, '测试18', 0, 0, 1, 1501577508),
(62, 61, '测试19', 0, 0, 1, 1501577612),
(63, 61, '测试20', 0, 0, 1, 1501579360),
(64, 61, '测试水水水水水', 0, 0, 1, 1501579375),
(65, 61, '测试21', 0, 0, 1, 1501579452),
(66, 61, '测试22', 0, 0, 1, 1501579592),
(67, 61, '测试222', 0, 0, 1, 1501579657),
(68, 61, '踩踩踩', 0, 0, 1, 1501579691),
(69, 61, '测试 烦烦烦方法', 0, 0, 1, 1501579894),
(70, 61, '点点滴滴得到的', 0, 0, 1, 1501580028),
(71, 61, '任溶溶', 0, 0, 1, 1501580484),
(72, 0, '', 0, 0, 1, 1501740431),
(73, 61, '人体宴', 0, 0, 1, 1501740523),
(74, 61, '任天野', 0, 0, 1, 1501740667),
(75, 61, '哈哈哈哈哈哈哈', 0, 0, 1, 1501740689),
(76, 61, '哈哈哈哈哈哈哈呃呃呃', 0, 0, 1, 1501740697),
(77, 77, '啦啦啦啦', 0, 0, 1, 1501740725),
(78, 77, '啦啦啦啦', 0, 0, 1, 1501740794),
(79, 77, '啦生生世世', 0, 0, 1, 1501740819),
(80, 77, '地方', 1, 0, 1, 1501740917),
(81, 77, '生生世世', 0, 79, 1, 1501741256),
(82, 77, '哈哈哈哈', 1, 79, 1, 1501744877),
(83, 77, '啥地方啊', 1, 80, 1, 1501745089),
(84, 77, '666', 0, 82, 1, 1501745352),
(85, 70, '多舒服啊', 0, 0, 1, 1501745460),
(86, 70, '666', 0, 28, 1, 1501745473),
(87, 61, '666', 0, 76, 1, 1501745511),
(88, 61, '今天是个好日子啊', 0, 0, 1, 1501746280),
(89, 61, '明天就周日了', 0, 88, 1, 1501746294),
(90, 70, '说点什么', 1, 0, 1, 1501747083),
(91, 70, '哈哈哈', 1, 90, 1, 1501747483);

-- --------------------------------------------------------

--
-- 表的结构 `fc_comment_fabulous`
--

CREATE TABLE IF NOT EXISTS `fc_comment_fabulous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `fc_comment_fabulous`
--

INSERT INTO `fc_comment_fabulous` (`id`, `comment_id`, `user_id`) VALUES
(1, 1, '1'),
(2, 8, '2'),
(3, 9, '1'),
(4, 10, '1'),
(5, 11, '2'),
(6, 12, '2'),
(7, 10, '2'),
(8, 7, '2'),
(9, 15, '2'),
(10, 20, '4'),
(11, 22, '1'),
(12, 18, '4'),
(13, 18, '2'),
(14, 8, '1'),
(15, 24, '1'),
(16, 25, '1'),
(17, 27, '34'),
(18, 26, '34'),
(19, 28, '34'),
(20, 29, '4'),
(21, 30, '4'),
(22, 24, '4'),
(23, 25, '4'),
(24, 25, '32'),
(25, 39, '1'),
(26, 80, '1'),
(27, 83, '1'),
(28, 82, '1'),
(29, 91, '1'),
(30, 90, '1');

-- --------------------------------------------------------

--
-- 表的结构 `fc_match`
--

CREATE TABLE IF NOT EXISTS `fc_match` (
  `match_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '比赛id',
  `hometeam_id` int(5) NOT NULL COMMENT '主队id',
  `hometeam_score` int(2) DEFAULT NULL COMMENT '主队进球',
  `vsitingteam_score` int(2) DEFAULT NULL COMMENT '客队进球',
  `vsitingteam_id` int(5) NOT NULL COMMENT '客队id',
  `state` int(2) NOT NULL COMMENT '比赛状态1:未开始；2:正在进行;3:已结束',
  `start_time` int(10) NOT NULL COMMENT '比赛开始时间',
  `video_url` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '视频链接',
  `lick_name` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '视频来源',
  `level` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '所属赛事',
  `league_round` int(2) NOT NULL COMMENT '联赛轮次',
  `cup_round` int(2) NOT NULL COMMENT '杯赛轮次',
  `position` int(2) DEFAULT NULL COMMENT '1:首页比赛推荐2:比赛页重点推荐3：首页和重点推荐',
  `update` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`match_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=111 ;

--
-- 转存表中的数据 `fc_match`
--

INSERT INTO `fc_match` (`match_id`, `hometeam_id`, `hometeam_score`, `vsitingteam_score`, `vsitingteam_id`, `state`, `start_time`, `video_url`, `lick_name`, `level`, `league_round`, `cup_round`, `position`, `update`) VALUES
(80, 8, 1, 0, 6, 0, 1489303800, '', '', '中超', 2, 0, 2, NULL),
(77, 9, 1, 1, 5, 0, 1489217400, '', '', '中超', 2, 0, 2, NULL),
(78, 7, 1, 1, 10, 0, 1489217400, '', '', '中超', 2, 0, 2, NULL),
(79, 13, 1, 1, 14, 0, 1489232100, '', '', '中超', 2, 0, 3, NULL),
(75, 3, 2, 0, 16, 0, 1489145700, '', '', '中超', 2, 0, 2, NULL),
(76, 12, 2, 1, 2, 0, 1489145700, '', '', '中超', 2, 0, 3, NULL),
(66, 9, 1, 1, 11, 0, 1488540900, '', '', '中超', 1, 0, 3, NULL),
(67, 8, 2, 0, 14, 0, 1488612600, '', '', '中超', 1, 0, 2, NULL),
(68, 12, 2, 0, 15, 0, 1488627300, '', '', '中超', 1, 0, 2, NULL),
(69, 3, 5, 1, 6, 0, 1488627300, '', '', '中超', 1, 0, 2, NULL),
(70, 7, 0, 0, 16, 0, 1488699000, '', '', '中超', 1, 0, 2, NULL),
(71, 2, 2, 1, 5, 0, 1488713700, '', '', '中超', 1, 0, 3, NULL),
(72, 1, 0, 0, 10, 0, 1488713700, '', '', '中超', 1, 0, 3, NULL),
(73, 13, 4, 0, 4, 0, 1488713700, '', '', '中超', 1, 0, 3, NULL),
(74, 4, 0, 0, 15, 0, 1489145700, '', '', '中超', 2, 0, 3, NULL),
(82, 1, 1, 1, 11, 0, 1489318500, '', '', '中超', 2, 0, 3, NULL),
(83, 16, 0, 1, 8, 0, 1491031800, '', '', '中超', 3, 0, 2, NULL),
(84, 10, 1, 0, 9, 0, 1491046500, '', '', '中超', 3, 0, 2, NULL),
(85, 14, 1, 0, 1, 0, 1491046500, '', '', '中超', 3, 0, 2, NULL),
(86, 2, 3, 2, 3, 0, 1491046500, '', '', '中超', 3, 0, 2, NULL),
(87, 11, 3, 1, 4, 0, 1491118200, '', '', '中超', 3, 0, 2, NULL),
(88, 6, 0, 2, 12, 0, 1491116400, '', '', '中超', 3, 0, 2, NULL),
(89, 15, 2, 0, 7, 0, 1491132900, '', '', '中超', 3, 0, 2, NULL),
(90, 5, 2, 1, 13, 0, 1491132900, '', '', '中超', 3, 0, 2, NULL),
(91, 4, 1, 2, 7, 0, 1491564900, 'http://v.pptv.com/show/hly7OaEHd7WiaFX7kVA.html', 'pptv', '中超', 4, 0, 3, NULL),
(92, 5, 1, 0, 1, 0, 1491564900, 'http://v.pptv.com/show/0bAXlf1j0xEWoQpw4A.html', 'pptv', '中超', 4, 0, 3, NULL),
(93, 3, 2, 1, 12, 0, 1491564900, 'http://v.pptv.com/show/064NiaicNZyQcIuyCG9g.html', 'pptv', '中超', 4, 0, 3, NULL),
(94, 9, 0, 0, 15, 0, 1491636600, 'http://v.pptv.com/show/z6oRjicddzQsMtxyC8g.html', 'pptv', '中超', 4, 0, 2, NULL),
(95, 2, 2, 2, 8, 0, 1491651300, 'http://v.pptv.com/show/DNgicvSWLibznDc9gibrg.html', 'pptv', '中超', 4, 0, 2, NULL),
(96, 10, 4, 2, 13, 0, 1491651300, 'http://star.longzhu.com/hbhx', '龙珠直播', '中超', 4, 0, 2, NULL),
(97, 6, 1, 1, 11, 0, 1491721200, 'http://v.pptv.com/show/QBRz8VmicL20rnAdt3Q.html', 'pptv', '中超', 4, 0, 2, NULL),
(98, 14, 1, 0, 16, 0, 1491737700, 'http://v.pptv.com/show/o3ngXsYsnNo9uyM.html', 'pptv', '中超', 4, 0, 2, NULL),
(104, 21, 1, 1, 22, 0, 1492515000, 'www.baidu.com', '乐视', '英超', 1, 0, 3, NULL),
(105, 26, 2, 0, 25, 0, 1492524000, 'www.baidu.com', '乐视体育', '英超', 1, 0, 3, NULL),
(106, 27, 1, 0, 28, 0, 1492524900, '', '', '英超', 1, 0, 2, NULL),
(107, 31, 2, 2, 33, 0, 1492528500, '', '', '英超', 1, 0, 2, NULL),
(108, 35, NULL, NULL, 23, 0, 1492616520, 'www.baidu.com', 'pptv', '英超', 1, 0, 2, NULL),
(109, 29, NULL, NULL, 30, 0, 1492702980, 'www.baidu.com', '龙珠直播', '英超', 1, 0, 3, NULL),
(110, 1, NULL, NULL, 4, 0, 1492674960, '', '', '中超', 5, 0, 2, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fc_news`
--

CREATE TABLE IF NOT EXISTS `fc_news` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '新闻id',
  `title` varchar(80) NOT NULL COMMENT '新闻标题',
  `thumb` varchar(100) CHARACTER SET armscii8 NOT NULL COMMENT '缩略图',
  `keywords` char(40) CHARACTER SET armscii8 NOT NULL,
  `description` mediumtext CHARACTER SET armscii8 NOT NULL,
  `inputtime` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  `news_level` int(3) NOT NULL COMMENT '1:头条；2：集锦；3:视频；4：国内；5：深度；6闲情；7英超；8：西甲；9：德甲；10意甲；11五洲；12：专题；13：装备；',
  `position` int(2) NOT NULL COMMENT '首页头条推荐:1;首页焦点图推荐:2;视频首页焦点图:4',
  `user_id` int(10) NOT NULL COMMENT '文章发布人员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- 转存表中的数据 `fc_news`
--

INSERT INTO `fc_news` (`id`, `title`, `thumb`, `keywords`, `description`, `inputtime`, `updatetime`, `news_level`, `position`, `user_id`) VALUES
(73, '郑大男足联赛 小组赛 第二轮 光华2:0管工', 'uploads/image/20170428/1493309718854957.jpg', '', '', 1493309742, 0, 4, 2, 34),
(67, '异乡见熟人，维特塞尔开心晒照', 'uploads/image/20170414/1492176495381173.jpg', '', '', 1492176529, 0, 4, 2, 4),
(63, '比赛集锦：江苏苏宁易购 3-0 大阪钢巴', 'video_thumb/58ef28df7ad07.jpg', '', '', 1492068575, 0, 3, 4, 34),
(62, '恒丰智诚战力帆海报：非凡友谊', 'uploads/image/20170413/1492068475462594.jpg', '', '', 1492068477, 0, 4, 2, 34),
(59, '多特2-3摩纳哥，姆巴佩两球，香川真司传射，登贝莱破门', 'video_thumb/58ef275049856.jpg', '', '', 1492068176, 0, 2, 4, 4),
(60, '恒大亚冠复盘：进攻乏善可陈，恒大何时迎接改变？', 'uploads/image/20170413/1492068265919342.jpg', '', '', 1492068272, 0, 4, 2, 4),
(61, '2017赛季中超第六轮 江苏苏宁易购vs广州富力球票开售', 'uploads/image/20170413/1492068445661425.jpg', '', '', 1492068449, 0, 4, 1, 34),
(68, '比赛集锦：梅斯 2-3 巴黎圣日耳曼', 'video_thumb/58f71672b4049.jpg', '', '', 1492588146, 0, 2, 4, 1),
(69, '比赛集锦：皇家马德里 4-2 拜仁慕尼黑', 'video_thumb/58f716c49e795.jpg', '', '', 1492588228, 0, 2, 4, 1),
(70, '绿茵场也抢人头？当你面对空门队友却抢走了你进球', 'video_thumb/58f7172c62c8d.jpg', '', '', 1492588332, 0, 3, 4, 1),
(71, '伊斯科：我想留在皇马很多年', 'uploads/image/20170419/1492593818965270.jpg', '', '', 1492594190, 0, 8, 2, 4),
(78, '5000万，曼联想签马尔基尼奥斯', 'uploads/image/20170429/1493440962149879.jpg', '', '', 1493440975, 0, 7, 2, 4),
(77, '经纪人：华夏幸福争抢科斯塔', 'uploads/image/20170429/1493439014867004.jpg', '', '', 1493439023, 0, 4, 1, 34);

-- --------------------------------------------------------

--
-- 表的结构 `fc_news_data`
--

CREATE TABLE IF NOT EXISTS `fc_news_data` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `content` mediumtext CHARACTER SET utf8 NOT NULL COMMENT '文章内容',
  `copyfrom` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '来源',
  `video_url` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT '视频链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=79 ;

--
-- 转存表中的数据 `fc_news_data`
--

INSERT INTO `fc_news_data` (`id`, `content`, `copyfrom`, `video_url`) VALUES
(59, '<p><span style="color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; text-indent: 32px; background-color: rgb(255, 255, 255);">北京时间4月13日凌晨0:45，欧冠1/4决赛首回合在伊杜纳信号公园球场进行一场对决，多特蒙德队主场迎战摩纳哥队。上半场，姆巴佩造点，法比尼奥射失点球，随后勒马尔助攻姆巴佩打破僵局，斯文-本德不慎打入乌龙球；下半场，香川真司助攻奥斯曼-登贝莱扳回一城，法尔考空门打飞，姆巴佩抓住皮什切克回传失误打进单刀将比分扩大，香川真司接沙欣助攻再扳一球。最终比分，多特蒙德2-3负于摩纳哥。</span></p>', '', 'http://sports.le.com/video/28795763.html'),
(60, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">主场最后时刻于汉超手球送点失去事关战略全局的2分，使得广州恒大背靠背战役的战术立足点更加艰难。首发阵容失去了往日雄霸亚洲的纸面实力，斯科拉里的固执己见又几乎使得恒大主动放弃了板凳深度。此役，阿兰无法在场上完成反击当中的支点作用，成为恒大进攻战术最大的硬伤；于汉超由于扮演的是阿兰的僚机角色，因为阿兰全场回撤左路的状态低迷而失去了理论锋锐度。上半时高拉特、黄博文回撤中场努力建立的中场拼抢优势，仿佛是一支冠军球队王者气质最后的挣扎。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">本赛季愈演愈烈的下半场无力，球队基础结构不发生根本改变，现在完全寻找不到扭转的火苗。球队领袖郑智一而再再而三的向媒体承认球队的种种问题，似乎在向外界传递着某种信号。中超六连霸主，再不主动求变，恐怕将失去战略巨变的价值。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><strong>【川崎边翼位左边路寻求技术突破，恒大反击暴露结构性缺陷】</strong></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170413/1492068265919342.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="color: rgb(31, 73, 125);">（图）本场比赛双方首发阵容</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">广州恒大本场比赛依旧排出4-2-3-1的首发阵容。近期状态火热的曾诚继续把守城池；冯潇霆和梅方搭档中卫，李学鹏和张琳芃分别出任左右边后卫；双后腰组合继续由保利尼奥搭档郑智；高拉特出任前腰，于汉超和黄博文出任左右边前卫；阿兰顶在中锋的位置。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">主场作战的川崎前锋此役排出了3-5-2的首发阵容。郑成河出任门将；车屋绅太郎、谷口彰悟和奈良龙树出任三中卫；五名中场球员从左至右分别是长谷川龙也、内托、板仓滉、田坂佑介和小林悠；双前锋由森本贵幸搭档海内尔。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170413/1492068266560631.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">川崎前锋开场之后的进攻战术，正是其首发阵型所传递的边翼位边路横向渗透。比赛开始后左中卫车屋绅太郎多次压到左边路肋部，与左边翼位长谷川龙也以左边线为基准线打二过二配合，一旦形成地面持久战，内托或者板仓滉就会积极靠近接应，川崎前锋上半时在左边路角球区，多次强打二过二或者三过三横向渗透。川崎前锋主帅寄希望于日本球员用有球技术叠加无球跑动的优势，实现左边路向禁区中路的终极球权补给。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">斯科拉里上赛季的表现并没有为新赛季的招兵买马迎来充沛资本。J马迟迟无法回归，本场比赛弃用郜林的巴西足球教父，只能将并不擅长以单箭头身份作战的阿兰顶在锋线——这成了广州恒大上半时进攻难以形成战术闭环的病灶。此役斯帅在左边前卫的位置上启用于汉超，毫无疑问是希望其反击当中发挥其突破速度，在边路一对一当中利用速度和技术优势制造进攻突破口。但是不擅长主打中锋的阿兰延续了此前回撤左边锋的跑位，这就使得于汉超不得不扮演阿兰的僚机角色。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170413/1492068266454229.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="color: rgb(31, 73, 125);">（图）阿兰全场比赛的热点图，恒大进攻方向从右至左。阿兰本场比赛跑位趋势，严重的压榨了于汉超在左边路的发挥空间</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">阿兰选择大量回撤左边路的跑位本身没有问题，这已经成为阿兰主打中锋的固定模式。问题在于巴西人本场比赛的竞技状态十分低迷，其无论是接球还是调整顺畅度都很低，加之其传统的外援球权优势赋予其在边路的拿球盘带习惯——这些关键技术环节建立在阿兰本场比赛低迷状态之上，结果就是抱死左边线的于汉超没有办法在身前有突破空间的时机接手球权，甚至本场比赛于汉超在左边路的球权都极少。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">理论上反击最具威胁的点因为斯科拉里的排兵布阵，以及阿兰此役的状态低迷而自我殆尽。恒大上半时选择的主要反击方向，也不是于汉超所在的左边路。于汉超在上一轮主场迎战川崎前锋的比赛当中，最后时刻犯下极刑导致球队失去事关全局的2个积分。其本场比赛还能进入首发阵容的原因，是斯科拉里看到其在主场迎战上港的比赛当中的高光表现。那场比赛当中恒大两个边前卫快速直插对方命门的进攻战术效率极高，斯帅本场比赛客场排兵布阵的思路一定受到那场关键战役胜利的启发。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">但是，黄博文在右边前卫的位置上首发，却成了本场比赛与主场击败上港进攻质量天壤之别的主导因素。由于黄博文缺少速度，所以此役当张琳芃断球成功完成对黄博文的纵向输出时，中场出身的黄博文并没有快速将球推进到对方腹地的能力，而是更多的寻求边路控制等待队友接应。这样的时间差直接给予川崎前锋快速回收禁区的时间，恒大面对对方的深度防守很难制造威胁。</p><p><br/></p>', '', ''),
(61, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">2017年4月21日，中超联赛第六轮，江苏苏宁易购将在主场面对广州富力的挑战。一边是坐镇主场的江苏苏宁易购，一边是兵强马壮的广州富力，4月21日让我们在南京奥体中心体育场拭目以待！</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="font-weight: 700; background-color: rgb(255, 255, 0);">本次所售票价分为100元（11区）、100元（92区）、150元（19区）、200元（2区）、200元（50区）共计五个区域。</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="font-weight: 700; background-color: rgb(255, 255, 0);">本场赛事球票不支持退款。</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="font-weight: 700; background-color: rgb(255, 255, 0);">取票信息如下：</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="font-weight: 700; background-color: rgb(255, 255, 0);">取票时间：比赛日当天14：00-19：00，</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="font-weight: 700; background-color: rgb(255, 255, 0);">取票地点：南京奥体中心体育场西入口二层票务中心</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">目前我懂商城已经成为江苏苏宁易购俱乐部的官方售票渠道之一。本赛季后续的所有苏宁主场比赛的球票我懂都会和俱乐部官方同步发售，想要去现场观战的球迷们可以在我懂方便快捷的买到球票哦。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">最后给大家详细介绍一下购票攻略。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">第一种，直接在商城上方搜索栏搜索“江苏苏宁易购”关键词即可找到相关商品</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170413/1492068445661425.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">第二种，大家可以点击商城首页“球票”分类，点击进去后就可以看到苏宁票务啦。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170413/1492068445722833.jpg"/></p><p><br/></p>', '', ''),
(62, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">北京时间4月14日晚，2017中超联赛第5轮比赛，贵州恒丰智诚将赴客场挑战重庆当代力帆。赛前，贵州恒丰智诚官方发布了本场比赛的预热海报，主题为：非凡友谊。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170413/1492068475462594.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">海报以国际象棋的博弈为背景，配以“非凡友谊”的主题，意在表现双方既要一争高下，同时也要彼此珍视友谊。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">贵州恒丰智诚官方写道：“时隔1266天的西南德比，再一次与西南兄弟同场竞技。带着非凡的友谊，向你们道一声：好久不见！”</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">目前贵州恒丰智诚3平1负尚未取胜，本场比赛他们必将全力以赴。而他们的对手重庆当代力帆则在上一轮比赛中客场取胜，目前位居积分榜第10位。</p><p><br/></p>', '', ''),
(63, '<p><span style="color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; text-indent: 32px; background-color: rgb(255, 255, 255);">4月11日19:35，亚冠小组赛第四轮比赛迎来焦点战，江苏苏宁易购队在主场迎战日本大阪钢巴队。特谢拉传射建功，拉米雷斯、洪正好破门，苏宁半场3-0领先并将比分保持到了全场结束！获得四连胜的苏宁提前两轮锁定小组第一成功出线。</span></p>', '', 'http://v.pptv.com/show/zV06uf9AqiblMyjI.html'),
(67, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">明天晚上，天津权健队将在中超第五轮比赛中主场迎战上海上港队，对于两队而言，本场比赛不仅仅是金元大战，同时也是一场老友重聚的交锋。两支球队中有多名球员在此前都曾同时效力于同一支球队。</p><h2 style="margin: 0px; padding: 0px; list-style: none; font-weight: 400; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">维特塞尔-博阿斯&amp;胡尔克</h2><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170414/1492176495381173.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">维特塞尔和胡尔克在效力于泽尼特队时期都曾在博阿斯麾下踢球，维特塞尔和胡尔克都是从2012年开始就为泽尼特队效力，维特塞尔在今年年初加盟天津权健，而胡尔克则是在2016年夏天加盟上海上港队，两人在泽尼特队共同效力了超过四年的时间。博阿斯执教泽尼特队的旅程则是在2014年3月开始，直到2016年冬天，他才转投至上海上港队。</p><h2 style="margin: 0px; padding: 0px; list-style: none; font-weight: 400; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">帕托-奥斯卡</h2><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170414/1492176495448958.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">两人除了是巴西同胞外，还同时在切尔西有过短暂的队友经历，2016年1月，帕托拒绝了中超球队的邀约飞往伦敦租借加盟切尔西队，但在为期六个月的租借生涯中，帕托只在英超联赛中登场两次。而奥斯卡则在2012年夏天就加盟了切尔西队，共为切尔西征战了131场英超联赛。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">维特塞尔对于能在中国重新见到老朋友们也感到非常高兴，他在社交媒体写道：“非常高兴能再见到我的兄弟胡尔克和教练博阿斯。”</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170414/1492176495707948.jpg"/></p><p><br/></p>', '', ''),
(68, '<p><span style="color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; text-indent: 32px; background-color: rgb(255, 255, 255);">北京时间4月19日凌晨0:30，法甲第31轮进行一场补赛，巴黎圣日耳曼队客场对阵梅斯队。上半场，卢卡斯门前错失良机，马克斯维尔助攻卡瓦尼打破僵局，随后马克斯维尔再次送出助攻，马图伊迪将比分扩大；下半场，约弗尔任意球破门扳回一城，迪亚巴特将比分扳平，补时阶段约弗尔任意球中梁，比赛最后时刻马图伊迪头球破门完成绝杀。最终，巴黎圣日耳曼客场3-2险胜梅斯，收获各项赛事七连胜。</span></p>', '', 'http://sports.le.com/video/28921610.html'),
(69, '<p><span style="color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; text-indent: 32px; background-color: rgb(255, 255, 255);">北京时间4月19日凌晨2:45，欧冠1/4决赛次回合比赛打响，皇家马德里坐镇伯纳乌球场对阵拜仁慕尼黑，在双方首回合较量中，皇马客场2-1逆转拜仁。上半场博阿滕门线解围立功；下半场马塞洛同样上演门线解围好戏，罗本造点，莱万点射命中，卡塞米罗助攻C罗扳平比分，拉莫斯自摆乌龙，比达尔染红。90分钟战罢，双方总比分打成3-3平，比赛进入加时。加时赛中，C罗梅开二度完成欧冠百球壮举，阿森西奥锁定胜局。最终，皇家马德里主场4-2战胜拜仁慕尼黑，以总比分6-3晋级欧冠四强。</span></p>', '', 'http://sports.le.com/video/28921878.html'),
(70, '<p><span style="color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; text-indent: 32px; background-color: rgb(255, 255, 255);">好不容易拿到了面对空门的机会，可以嘚瑟嘚瑟，然而这时……这种在球场上抢人头的可咋当队友啊！</span></p>', '', 'https://o6yh618n9.qnssl.com/9awMfhggZZ6Tm05_.mp4'),
(71, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">在皇马与拜仁的欧冠1/4决赛次回合，伊斯科顶替受伤的贝尔首发出场，踢了71分钟。赛后，他接受了媒体的采访，谈到了近来热议的续约问题。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170419/1492593818965270.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">有记者询问伊斯科是否想继续留在皇马时，伊斯科表示：“我此前已经说过很多次了，我想留在这里很多年，我们已经很接近(完成续约)了。”</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">本赛季，伊斯科为皇马出场34次，其中21次首发，为球队贡献了9球5助攻。在上周与希洪竞技的联赛，伊斯科在BBC缺阵的情况下梅开二度，帮助球队惊险拿下3分。</p><p><br/></p>', '', ''),
(73, '<p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, ">上周日下午5点40分，小组赛第二轮与大兄弟的管工相遇。上半场开局后管工中前场逼抢很凶，光华没有明显的进球机会，双方势均力敌。在比赛进行到20分钟的时候，王总在管工禁区内突破被放倒，裁判吹罚点球。马球王一蹴而就，首开纪录，场上比分1:0，光华暂时领先。直至上半场结束，双方都再无建树。下半场易边再战，光华开局占据优势。在一次反击中，丁丁高速带球突破，将球传给禁区内的冠宇，冠宇在禁区内晃倒了自己和对方防守人员，迷之过人后一脚迷之射门，小角度下足球从门将和立柱之间滚进。场上比分2:0，并为指导全场结束。光华赢得小组赛两连胜。</p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, ">首发人员 ：杨泽、康金士（张晨露）、耿境阳、张旭、郭英浩（周子健）、孙帅辉、陈冠宇、王坤宇、魏冬堃、马磊 &nbsp; &nbsp;王文博&nbsp;&nbsp;<br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, ">到场人员： &nbsp;杨泽 &nbsp; 康金士 &nbsp;珠子 &nbsp; &nbsp;陈思贤 &nbsp; &nbsp;刘飞达 &nbsp; &nbsp;崔林笑 &nbsp; &nbsp;张培 &nbsp; &nbsp;翟岳声 &nbsp; &nbsp; 晨露 &nbsp; &nbsp; 张旭 &nbsp; 丁丁 &nbsp; &nbsp;子建 &nbsp;耿蛋 &nbsp;一鸣 &nbsp;菊花王 &nbsp;三善 &nbsp; 邢bian &nbsp; &nbsp;冠宇 &nbsp;天王 &nbsp;地虎 顾仙 &nbsp;杨影 &nbsp; 文哲 &nbsp; &nbsp;茹帅军 王总 &nbsp;马球王 &nbsp; 屈戌 &nbsp; 少博 坤哥 &nbsp; &nbsp;光哥</p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309718854957.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309718961316.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309718689057.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309719926699.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309719783336.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309720303281.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309720831858.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309720227685.jpg" alt=""/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p style="margin-top: 0px; margin-bottom: 16px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, "><br/></p><p class="picbox" style="margin-top: 0px; margin-bottom: 16px; padding: 0px; text-align: center; color: rgb(51, 51, 51); font-family: Arial, "><img src="/dongqiudi/uploads/image/20170428/1493309721588736.jpg" alt=""/></p><p><br/></p>', '', ''),
(78, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">根据《每日镜报》的消息，曼联有信心在夏季转会窗口以5000万镑的价格签下巴黎圣日耳曼后卫马尔基尼奥斯。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170429/1493440962149879.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">据悉，穆里尼奥将马尔基尼奥斯视为是今夏在后防线上引援的头号目标，曼联也准备签下球员。</p><p><br/></p>', '', ''),
(77, '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">一家名为“fotbolltransfers”的瑞典媒体近日报道称，中超河北华夏幸福也加入了争夺切尔西前锋迭戈-科斯塔的行列，希望在夏窗引进他。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/dongqiudi/uploads/image/20170429/1493439014867004.jpg"/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">瑞典籍经纪人安德烈-费利佩-赫那罗称，他的同事在这项交易中代表河北华夏幸福，一直与门德斯方面保持着联系。他说：“是的，门德斯他们来自葡萄牙，我老家也是那里的，我知道这桩转会的情况，有多少人想要参与科斯塔的转会，而我也一直是中间人。”</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">他还表示：“河北华夏幸福对科斯塔有非常明确的兴趣，交易一旦达成，科斯塔就将成为世界上年薪最高的球员。”</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px 0px; list-style: none; word-wrap: break-word; word-break: normal; text-indent: 2em; line-height: 1.7; color: rgb(52, 52, 52); font-family: &quot;Source Sans Pro&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;WenQuanYi Micro Hei&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">该媒体称，中国天津权健俱乐部想要科斯塔已经在全世界都不是秘密，他们多次公开表示愿意高价引进这位西班牙前锋。</p><p><br/></p>', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `fc_team`
--

CREATE TABLE IF NOT EXISTS `fc_team` (
  `team_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '球队名字',
  `icon` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '球队队徽',
  `league` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '联赛',
  `league_goal` int(4) NOT NULL COMMENT '联赛进球',
  `league_fumble` int(4) NOT NULL COMMENT '联赛丢球',
  `goal_difference` smallint(4) NOT NULL DEFAULT '0' COMMENT '净胜球',
  `league_win` int(3) NOT NULL DEFAULT '0' COMMENT '胜',
  `league_equal` int(3) NOT NULL DEFAULT '0' COMMENT '平',
  `league_fail` int(3) NOT NULL DEFAULT '0' COMMENT '负',
  `league_integral` int(3) NOT NULL COMMENT '联赛积分',
  `matches` int(3) NOT NULL DEFAULT '0' COMMENT '比赛场次',
  `cup` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '杯赛',
  `cup_goal` int(4) NOT NULL COMMENT '杯赛进球',
  `cup_fumblc` int(4) NOT NULL COMMENT '杯赛失球',
  `cup_integral` int(2) NOT NULL COMMENT '杯赛积分',
  `cup_group` varchar(2) CHARACTER SET utf8 NOT NULL COMMENT '杯赛所属小组',
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `fc_team`
--

INSERT INTO `fc_team` (`team_id`, `name`, `icon`, `league`, `league_goal`, `league_fumble`, `goal_difference`, `league_win`, `league_equal`, `league_fail`, `league_integral`, `matches`, `cup`, `cup_goal`, `cup_fumblc`, `cup_integral`, `cup_group`) VALUES
(1, '河南建业', 'icon/58ae886641892.png', '中超', 1, 3, -2, 0, 2, 2, 2, 4, '0', 0, 0, 0, ''),
(2, '广州恒大', 'icon/58ae887497461.png', '中超', 8, 7, 1, 2, 1, 1, 7, 4, '亚冠', 0, 0, 0, ''),
(3, '上海上岗', 'icon/58ae888280bf5.png', '中超', 11, 5, 6, 3, 0, 1, 9, 4, '亚冠', 0, 0, 0, ''),
(4, '江苏苏宁易购', 'icon/58ae8894208b7.png', '中超', 2, 9, -7, 0, 1, 3, 1, 4, '亚冠', 0, 0, 0, ''),
(5, '北京国安', 'icon/58ae889e75ec2.png', '中超', 5, 4, 1, 2, 1, 1, 7, 4, '0', 0, 0, 0, ''),
(6, '长春亚泰', 'icon/58ae88aa1ba4e.png', '中超', 2, 9, -7, 0, 1, 3, 1, 4, '0', 0, 0, 0, ''),
(7, '重庆力帆', 'icon/58ae88b545a95.png', '中超', 3, 4, -1, 1, 2, 1, 5, 4, '0', 0, 0, 0, ''),
(8, '广州富力', 'icon/58ae88c22e2df.png', '中超', 6, 2, 4, 3, 1, 0, 10, 4, '0', 0, 0, 0, ''),
(9, '贵州恒丰智诚', 'icon/58ae88d3789fe.png', '中超', 2, 3, -1, 0, 3, 1, 3, 4, '0', 0, 0, 0, ''),
(10, '河北华夏幸福', 'icon/58ae88e42ce94.png', '中超', 6, 3, 3, 2, 2, 0, 8, 4, '0', 0, 0, 0, ''),
(11, '辽宁宏运', 'icon/58ae88eec0364.png', '中超', 6, 4, 2, 1, 3, 0, 6, 4, '0', 0, 0, 0, ''),
(12, '山东鲁能', 'icon/58ae88fa84f42.png', '中超', 7, 3, 4, 3, 0, 1, 9, 4, '0', 0, 0, 0, ''),
(13, '上海绿地申花', 'icon/58ae890489cd1.png', '中超', 8, 7, 1, 1, 1, 2, 4, 4, '0', 0, 0, 0, ''),
(14, '天津权健', 'icon/58ae890c0d333.png', '中超', 3, 3, 0, 2, 1, 1, 7, 4, '0', 0, 0, 0, ''),
(15, '天津泰达', 'icon/58ae89146258a.png', '中超', 2, 2, 0, 1, 2, 1, 5, 4, '0', 0, 0, 0, ''),
(16, '延边富德', 'icon/58ae891cb9d0d.png', '中超', 0, 4, -4, 0, 1, 3, 1, 4, '0', 0, 0, 0, ''),
(21, '阿森纳', 'icon/58ae8c14a4d50.png', '英超', 1, 1, 0, 0, 1, 0, 1, 1, '欧冠', 0, 0, 0, ''),
(22, '曼彻斯特城', 'icon/58ae89f04f439.png', '英超', 1, 1, 0, 0, 1, 0, 1, 1, '欧冠', 0, 0, 0, ''),
(23, '莱斯特城', 'icon/58ae8a1e55e41.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '欧冠', 0, 0, 0, ''),
(24, '托特纳姆热刺', 'icon/58ae8a37c6b26.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '欧冠', 0, 0, 0, ''),
(25, '切尔西', 'icon/58ae8a5fb0aab.png', '英超', 0, 2, -2, 0, 0, 1, 0, 1, '--请选择--', 0, 0, 0, ''),
(26, '曼彻斯特联', 'icon/58ae8a6fb0da4.png', '英超', 2, 0, 2, 1, 0, 0, 3, 1, '--请选择--', 0, 0, 0, ''),
(27, '利物浦', 'icon/58ae8a7c05f6f.png', '英超', 1, 0, 1, 1, 0, 0, 3, 1, '--请选择--', 0, 0, 0, ''),
(28, '南安普顿', 'icon/58ae8a8c507d1.png', '英超', 0, 1, -1, 0, 0, 1, 0, 1, '--请选择--', 0, 0, 0, ''),
(29, '米德尔斯堡', 'icon/58ae8ad97b771.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '--请选择--', 0, 0, 0, ''),
(30, '埃弗顿', 'icon/58ae8ae51b985.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '--请选择--', 0, 0, 0, ''),
(31, '西布朗维奇', 'icon/58ae8b016c531.png', '英超', 2, 2, 0, 0, 1, 0, 1, 1, '--请选择--', 0, 0, 0, ''),
(32, '水晶宫', 'icon/58ae8b2568fea.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '--请选择--', 0, 0, 0, ''),
(33, '桑德兰', 'icon/58ae8b4d62a6b.png', '英超', 2, 2, 0, 0, 1, 0, 1, 1, '--请选择--', 0, 0, 0, ''),
(34, '西汉姆联', 'icon/58ae8b5f30d4b.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '--请选择--', 0, 0, 0, ''),
(35, '斯托克城', 'icon/58ae8b7beadde.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '--请选择--', 0, 0, 0, ''),
(36, '沃特福德', 'icon/58ae8b8e0e00c.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, ''),
(37, '伯恩利', 'icon/58ae8ba470b02.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, ''),
(38, '伯恩茅斯', 'icon/58ae8bc033c30.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, ''),
(39, '赫尔城', 'icon/58ae8bcc425da.png', '英超', 0, 0, 0, 0, 0, 0, 0, 0, '--请选择--', 0, 0, 0, ''),
(40, '巴塞罗那', 'icon/58dd1ffab0d41.png', '西甲', 0, 0, 0, 0, 0, 0, 0, 0, '欧冠', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `fc_user`
--

CREATE TABLE IF NOT EXISTS `fc_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL COMMENT '用户账号',
  `category` int(1) NOT NULL COMMENT '；0:普通用户;1:超级管理员；2英超管理员3西甲管理员；4意甲管理员；5德甲管理员；6法甲管理员；7中超管理员',
  `username` varchar(8) NOT NULL COMMENT '昵称',
  `password` char(32) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `headimg` varchar(200) NOT NULL COMMENT '头像',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `fc_user`
--

INSERT INTO `fc_user` (`user_id`, `account`, `category`, `username`, `password`, `phone_number`, `email`, `headimg`) VALUES
(1, '1992', 3, '内马尔', '96e79218965eb72c92a549dd5a330112', '17638165937', '838206954@qq.com', 'UPLOAD_PATH201708/03/5982d5090f82f.png'),
(2, '1986', 3, '梅西', 'e10adc3949ba59abbe56e057f20f883e', '13027783780', '838206954@qq.com', 'UPLOAD_PATH201704/28/5902a9fc014c3.jpg'),
(4, '19940422', 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '13027783780', '8385556588@qq.com', 'UPLOAD_PATH201704/19/58f71e2747a54.png'),
(16, '14897389958', 4, '121', '698d51a19d8a121ce581499d7b701668', '12313213', '321321', ''),
(15, '14896804471', 0, '测试2', 'e10adc3949ba59abbe56e057f20f883e', '13254646', '56435435@qq.com', ''),
(14, '14896803944', 0, '333', '96e79218965eb72c92a549dd5a330112', '123165346', '65468746@qq.com', ''),
(17, '14897394227', 0, '131', '698d51a19d8a121ce581499d7b701668', '123123', '123213@qq.com', ''),
(18, '14897395547', 0, 'qwe', '698d51a19d8a121ce581499d7b701668', '1111', '123213@qq.com', ''),
(19, '14897396018', 0, '234', '76d80224611fc919a5d54f0ff9fba446', '3213213', '123213@qq.com', ''),
(20, '14897397245', 0, 'asd', 'b2ca678b4c936f905fb82f2733f5297f', '213123', '123213@qq.com', ''),
(21, '14897421432', 0, '345', 'b2ca678b4c936f905fb82f2733f5297f', '132465', '123213@qq.com', ''),
(22, '14897564774', 0, '测试2', 'e10adc3949ba59abbe56e057f20f883e', '1365468', '123213@qq.com', ''),
(23, '14898862026', 0, '测试2', 'e10adc3949ba59abbe56e057f20f883e', '13026676789', '123213@qq.com', ''),
(24, '1992', 0, '内马尔', 'e10adc3949ba59abbe56e057f20f883e', '17638165937', '838206954@qq.com', 'UPLOAD_PATH201708/03/5982d5090f82f.png'),
(25, '14904965307', 0, '水水', '75354b9233ec82f41eb88a91a4d34e93', '生生世世', '123213@qq.com', ''),
(26, '14905363176', 0, '111', '96e79218965eb72c92a549dd5a330112', '1111', '123213@qq.com', ''),
(27, '14905363329', 0, '222', '96e79218965eb72c92a549dd5a330112', '111', '123213@qq.com', ''),
(28, '14905372015', 0, '333', 'e10adc3949ba59abbe56e057f20f883e', '111', '123213@qq.com', ''),
(29, '14905378802', 0, '测试233', '96e79218965eb72c92a549dd5a330112', '122121', '123213@qq.com', ''),
(30, '14906236776', 0, '测试333', '96e79218965eb72c92a549dd5a330112', '123546', '123213@qq.com', ''),
(31, '14906240226', 0, '测试555', '96e79218965eb72c92a549dd5a330112', '136464', '123213@qq.com', ''),
(32, '14906967786', 0, '马磊的爸爸', 'e10adc3949ba59abbe56e057f20f883e', '15538295171', '473911300@qq.com', 'UPLOAD_PATH201704/27/5901c690a9e0b.jpg'),
(33, '14908046714', 0, 'wojiaoli', '4937ff87871e2cccff3e54994c7628e1', '11111111111', '970728714@qq.com', ''),
(34, '14917498367', 7, '蒿俊闵', 'e10adc3949ba59abbe56e057f20f883e', '135697855', '8456@qq.com', 'UPLOAD_PATH201704/13/58ef283ce09f8.jpg'),
(35, '14917500001', 2, '伊布', 'e10adc3949ba59abbe56e057f20f883e', '13213654', '123213@qq.com', 'UPLOAD_PATH201704/09/58ea4c96eaf4b.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
