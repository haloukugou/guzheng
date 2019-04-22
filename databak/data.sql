-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 7.1.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `jianzhanguanjia`
--

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_about`
--

CREATE TABLE IF NOT EXISTS `bmkj_about` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `module` varchar(20) DEFAULT 'About' COMMENT '模型',
  `userid` int(11) unsigned DEFAULT '1' COMMENT '用户ID',
  `sortid` int(10) DEFAULT NULL COMMENT '分类ID',
  `parentid` int(10) DEFAULT '0' COMMENT '父级ID',
  `areaid` int(10) DEFAULT NULL COMMENT '地区ID',
  `client` varchar(200) DEFAULT 'pc,wap,weixin' COMMENT '客户端',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签，如：新品，热门',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `hits` int(10) DEFAULT '1' COMMENT '点击次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `morepics` text COMMENT '更多图片',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '第3方URL',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'SEO标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `fileurl` varchar(255) DEFAULT NULL COMMENT '附件',
  `morefileurl` text COMMENT '更多附件',
  `attributeid` int(11) unsigned DEFAULT NULL COMMENT 'attribute属性表ID',
  `attvalue` text COMMENT '属性值',
  `content1` text COMMENT '内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `routesign` varchar(20) DEFAULT 'a' COMMENT '路由简短标识',
  `urlroute` varchar(100) DEFAULT NULL COMMENT '路由地址',
  `viewtemp` varchar(50) DEFAULT 'view' COMMENT '前端详情页模板',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='单页' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `bmkj_about`
--

INSERT INTO `bmkj_about` (`id`, `signid`, `module`, `userid`, `sortid`, `parentid`, `areaid`, `client`, `tags`, `sequence`, `hits`, `thumb`, `morepics`, `linkurl`, `title`, `seotitle`, `keyword`, `description`, `fileurl`, `morefileurl`, `attributeid`, `attvalue`, `content1`, `addtime`, `routesign`, `urlroute`, `viewtemp`, `lang`) VALUES
(1, 1, 'About', 1, 3, 0, 1, 'pc,wap', '', 0, 105, '', '/uploads/demo/banner3.jpg|/uploads/demo/banner3.jpg', '', '公司简介', '', '', '这里是一些描述。。。这里是一些描述。。。这里是一些描述。。。', '', '', 0, '[]', '<p><img src="/uploads/demo/banner3.jpg" class="rounded"/></p><p>这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。这里可以插入图文、视频等公司文字介绍。。。</p>', 1526899527, 'a', 'gongsijianjie', 'view', 'cn'),
(2, 1, 'About', 1, 3, 0, 1, 'pc,wap', '', 0, 123, '', '', '', '联系我们', '', '', '', '', '', 0, '[]', '<p><strong><span style="font-size: 16px;">深圳市XXX科技有限公司</span></strong></p><p>地 址：广东省深圳市龙岗区坂田街道吉华路XXX号XX大厦B栋1111室&nbsp;<br/></p><p>电 话：0755 - xxxx xxxx / 0755 - xxxx xxxx<br/></p><p>传 真：0755 - xxxx xxxx&nbsp; &nbsp;邮箱：iloveyou@xxx.com&nbsp;<br/></p><p>手 机：13x xxxx xxxx&nbsp; &nbsp; X先生<br/></p><p>Q&nbsp; Q：XXXXXXXXX&nbsp; &nbsp; 微信：XXXXXXXX<br/></p><p>网 址：http://www.xxxxxxx.com<br/></p><p><br/></p>', 1526899552, 'a', 'lianxiwomen', 'contact', 'cn'),
(3, 1, 'About', 1, 4, 0, 2, 'pc,wap', 'view,commend,new,hot', 0, 20, '', '/uploads/demo/banner1.jpg|/uploads/demo/banner2.jpg', '', 'About us', '', '', 'Company profile Description，Company profile Description，Company profile Description，Company profile Description，Company profile Description', '', '', 0, '[]', '<p>Company profile Description，Company profile Description，Company profile Description，Company profile Description，Company profile DescriptionCompany profile Description，Company profile Description，Company profile Description，Company profile Description，Company profile DescriptionCompany profile Description，Company profile Description，Company profile Description，Company profile Description，Company profile DescriptionCompany profile Description，Company profile Description，Company profile Description，Company profile Description，Company profile DescriptionCompany profile Description，Company profile Description，Company profile Description，Company profile Description，Company profile Description</p>', 1526899575, 'a', 'aboutus', 'view', 'en'),
(4, 1, 'About', 1, 4, 0, 2, 'pc,wap', 'view,commend,new,hot', 0, 13, '', '', '', 'Contact us', '', '', '', '', '', NULL, NULL, '<p>Contact us</p>', 1526899586, 'a', 'contactus', 'contact', 'en'),
(5, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 1, '', '', '', '诚聘UI设计师', '', '', '招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述', '', '', 0, '[]', '<p>招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述</p>', 1545385470, 'a', 'zhaopinhuimazimudemeimei', 'view', 'cn'),
(6, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 2, '', '', '', '诚聘PHP高级工程师', '', '', '招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述', '', '', 0, '[]', '<p>招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述</p>', 1545385585, 'a', 'zhaopinhuimazimudeshuaige', 'view', 'cn'),
(7, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 3, '', '', '', '诚聘PHP高级工程师', '', '', '招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述', '', '', 0, '[]', '<p>招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述</p>', 1545385585, 'a', 'zhaopinhuimazimudeshuaige', 'view', 'cn'),
(8, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 2, '', '', '', '诚聘UI设计师', '', '', '招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述', '', '', 0, '[]', '<p>招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述</p>', 1545385470, 'a', 'zhaopinhuimazimudemeimei', 'view', 'cn'),
(9, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 1, '', '', '', '诚聘UI设计师', '', '', '招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述', '', '', 0, '[]', '<p>招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述</p>', 1545385470, 'a', 'zhaopinhuimazimudemeimei', 'view', 'cn'),
(10, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 2, '', '', '', '诚聘PHP高级工程师', '', '', '招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述', '', '', 0, '[]', '<p>招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述</p>', 1545385585, 'a', 'zhaopinhuimazimudeshuaige', 'view', 'cn'),
(11, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 2, '', '', '', '诚聘PHP高级工程师', '', '', '招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述', '', '', 0, '[]', '<p>招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述</p>', 1545385585, 'a', 'zhaopinhuimazimudeshuaige', 'view', 'cn'),
(12, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 1, '', '', '', '诚聘UI设计师', '', '', '招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述', '', '', 0, '[]', '<p>招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述</p>', 1545385470, 'a', 'zhaopinhuimazimudemeimei', 'view', 'cn'),
(13, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 1, '', '', '', '诚聘UI设计师', '', '', '招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述', '', '', 0, '[]', '<p>招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述</p>', 1545385470, 'a', 'zhaopinhuimazimudemeimei', 'view', 'cn'),
(14, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 2, '', '', '', '诚聘PHP高级工程师', '', '', '招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述', '', '', 0, '[]', '<p>招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述</p>', 1545385585, 'a', 'zhaopinhuimazimudeshuaige', 'view', 'cn'),
(15, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 2, '', '', '', '诚聘PHP高级工程师', '', '', '招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述', '', '', 0, '[]', '<p>招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述，招聘会码字母的帅哥描述</p>', 1545385585, 'a', 'zhaopinhuimazimudeshuaige', 'view', 'cn'),
(16, 1, 'About', 1, 5, 0, 1, 'pc,wap', '', 0, 1, '', '', '', '诚聘UI设计师', '', '', '招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述', '', '', 0, '[]', '<p>招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述，招聘会码字母的美眉描述</p>', 1545385470, 'a', 'zhaopinhuimazimudemeimei', 'view', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_ad`
--

CREATE TABLE IF NOT EXISTS `bmkj_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `thumb` varchar(500) DEFAULT NULL COMMENT '图片',
  `linkurl` text COMMENT '跳转地址',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `att_type` varchar(20) DEFAULT 'banner' COMMENT '类型：banner，link',
  `position` varchar(20) DEFAULT NULL COMMENT '位置',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `client` varchar(200) DEFAULT NULL COMMENT '客户端',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `bmkj_ad`
--

INSERT INTO `bmkj_ad` (`id`, `title`, `thumb`, `linkurl`, `description`, `att_type`, `position`, `sequence`, `client`, `lang`) VALUES
(1, '建站管家', '', 'http://www. ', '', 'link', 'Index', 0, 'pc,wap', 'cn'),
(2, '在这里，可以写一些文字描述', '/uploads/demo/banner1.jpg', '#', '第1张幻灯片1920px * 500px/1030px', 'banner', 'Index', 100, 'pc', 'cn'),
(3, '比如说：蔡琳，真！的！好！美！！', '/uploads/demo/banner2.jpg', '##', '第2张幻灯片1920px * 500px/1030px', 'banner', 'Index', 90, 'pc,wap', 'cn'),
(4, 'webdesign', '', '##', '', 'link', 'Index', 0, 'pc,wap', 'en'),
(5, '猜猜看，这是哪里？', '/uploads/demo/banner3.jpg', '##', '第3张幻灯片1920px * 500px/1030px', 'banner', 'Index', 80, 'pc,wap', 'cn'),
(6, 'Advertisement Title', '/uploads/demo/banner3.jpg', '##', 'Third banner 1920px * 500px/1030px', 'banner', 'Index', 80, 'pc', 'en'),
(7, 'Advertisement Title', '/uploads/demo/banner2.jpg', '##', 'Second banner 1920px * 500px/1030px', 'banner', 'Index', 90, 'pc', 'en'),
(8, 'Advertisement Title', '/uploads/demo/banner1.jpg', '##', 'First banner 1920px * 500px/1030px', 'banner', 'Index', 100, 'pc', 'en'),
(13, '产品模块', '/uploads/demo/product_banner.jpg', '', '在这里，不凡输入一些描述。。。', 'banner', 'Product', 0, 'pc,wap', 'cn'),
(14, '新闻模块', '/uploads/demo/banner1.jpg', '', '这里可以输入一些描述', 'banner', 'News', 0, 'pc,wap', 'cn'),
(15, '案例模块', '/uploads/demo/product_banner.jpg', '', '这里可以输入一些描述', 'banner', 'Project', 0, 'pc,wap', 'cn'),
(16, '下载模块', '/uploads/demo/banner2.jpg', '', '这里不凡输入一些描述', 'banner', 'Down', 0, 'pc,wap', 'cn'),
(17, '单页模块', '/uploads/demo/banner2.jpg', '', '这里不凡输入一些描述', 'banner', 'About', 0, 'pc,wap', 'cn'),
(18, '产品模块', '/uploads/demo/banner1.jpg', '', 'Advertisement Description', 'banner', 'Product', 0, 'pc,wap', 'en'),
(19, '新闻模块', '/uploads/demo/banner2.jpg', '', 'Advertisement Description', 'banner', 'News', 0, 'pc,wap', 'en'),
(20, '案例模块', '/uploads/demo/banner1.jpg', '', 'Advertisement Description', 'banner', 'Project', 0, 'pc,wap', 'en'),
(21, '下载模块', '/uploads/demo/banner3.jpg', '', 'Advertisement Description', 'banner', 'Down', 0, 'pc,wap', 'en'),
(22, '单页模块', '/uploads/demo/banner1.jpg', '', 'Advertisement Description', 'banner', 'About', 0, 'pc,wap', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_area`
--

CREATE TABLE IF NOT EXISTS `bmkj_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `parentid` int(10) DEFAULT NULL COMMENT '父级ID',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='地区' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `bmkj_area`
--

INSERT INTO `bmkj_area` (`id`, `signid`, `parentid`, `sequence`, `title`, `lang`) VALUES
(1, 1, 0, 0, '默认地区', 'cn'),
(2, 1, 0, 0, 'default', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_attribute`
--

CREATE TABLE IF NOT EXISTS `bmkj_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `attvalue` varchar(50) DEFAULT NULL COMMENT '属性值，如颜色#ffffff',
  `tabledir` varchar(20) DEFAULT NULL COMMENT '模块目录',
  `parentid` int(10) unsigned DEFAULT '0' COMMENT '父级ID',
  `fieldtype` varchar(20) DEFAULT NULL COMMENT '类型：radio单选checkbox复选框text单行文本textarea多行文本',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='属性' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `bmkj_attribute`
--

INSERT INTO `bmkj_attribute` (`id`, `signid`, `title`, `attvalue`, `tabledir`, `parentid`, `fieldtype`, `sequence`, `lang`) VALUES
(1, 1, '衣服', 'Product', 'Spec', 0, NULL, 0, 'cn'),
(2, 1, '价格', '5000以下\r\n5000-10000*\r\n1万以上', 'Guestbook', 0, 'radio', 0, 'cn'),
(3, 1, '鞋子', NULL, 'Product', 0, NULL, 0, 'cn'),
(4, 1, '尺寸', 'L*\r\nM\r\nS', 'Product', 3, 'radio', 0, 'cn'),
(5, 1, '颜色', '红色\r\n蓝色*\r\n绿色', 'Product', 3, 'radio', 0, 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_auth_group`
--

CREATE TABLE IF NOT EXISTS `bmkj_auth_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) DEFAULT NULL COMMENT '父级ID',
  `title` char(100) DEFAULT NULL COMMENT '标题',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `rules` text COMMENT '权限值',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限组' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `bmkj_auth_group`
--

INSERT INTO `bmkj_auth_group` (`id`, `parentid`, `title`, `status`, `rules`, `sequence`, `lang`) VALUES
(1, 0, '超级管理员', 1, '266,267,265,268,269,270,271', 0, 'cn'),
(2, 0, '普通会员', 1, NULL, 0, 'cn'),
(3, 0, 'VIP Member', 1, NULL, 0, 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `bmkj_auth_group_access` (
  `uid` int(11) unsigned DEFAULT NULL COMMENT '用户表的ID',
  `group_id` smallint(5) unsigned DEFAULT NULL COMMENT 'auth_group表的ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户和用户组表';

--
-- 转存表中的数据 `bmkj_auth_group_access`
--

INSERT INTO `bmkj_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_auth_rule`
--

CREATE TABLE IF NOT EXISTS `bmkj_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) DEFAULT NULL COMMENT '父级ID',
  `name` char(80) DEFAULT NULL COMMENT '权限值',
  `title` char(20) DEFAULT NULL COMMENT '权限名称',
  `type` tinyint(1) DEFAULT '1' COMMENT '类型，决定condition字段',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：1正常，0禁用',
  `condition` char(100) DEFAULT NULL COMMENT '规则表达式',
  `sequence` int(10) DEFAULT NULL COMMENT '排序',
  `modulesign` char(30) DEFAULT NULL COMMENT '模块标识，如：web，oa等',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `bmkj_auth_rule`
--

INSERT INTO `bmkj_auth_rule` (`id`, `parentid`, `name`, `title`, `type`, `status`, `condition`, `sequence`, `modulesign`) VALUES
(1, 0, 'index/index', '后台管理', 1, 1, '', 0, 'web'),
(2, 0, 'product/index', '产品管理', 1, 1, '', 0, 'web'),
(3, 2, 'product/index', '产品列表', 1, 1, NULL, NULL, 'web'),
(4, 2, 'product/edit', '添加产品', 1, 1, NULL, NULL, 'web'),
(5, 1, 'index/index', '后台首页', 1, 1, NULL, NULL, 'web'),
(6, 1, 'area/index', '地区管理', 1, 1, NULL, NULL, 'web');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_chat`
--

CREATE TABLE IF NOT EXISTS `bmkj_chat` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `chat_type` varchar(50) DEFAULT NULL COMMENT '类型：如：qq，wechat等',
  `account` varchar(200) DEFAULT NULL COMMENT '账号',
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `sequence` smallint(6) DEFAULT NULL COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='客服' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `bmkj_chat`
--

INSERT INTO `bmkj_chat` (`id`, `chat_type`, `account`, `title`, `thumb`, `sequence`, `lang`) VALUES
(1, 'qq', '1062129401', '售前咨询', '/skin/admin/img/qq.gif', 5, 'cn'),
(2, 'qq', '1062129401', '售前咨询', '/skin/admin/img/qq.gif', 0, 'cn'),
(3, 'msn', 'albertfu@hotmail.com', 'Linda', '/skin/admin/img/msn.png', 0, 'en'),
(4, 'qq', '1062129401', '售前咨询', '/skin/admin/img/qq.gif', 10, 'cn'),
(5, 'qq', '1062129401', '售前咨询', '/skin/admin/img/qq.gif', 0, 'cn'),
(6, 'msn', 'albertfu@hotmail.com', 'Linda', '/skin/admin/img/msn.png', 0, 'en'),
(7, 'msn', 'albertfu@hotmail.com', 'Linda', '/skin/admin/img/msn.png', 0, 'en'),
(8, 'msn', 'albertfu@hotmail.com', 'Linda', '/skin/admin/img/msn.png', 0, 'en'),
(9, 'msn', 'albertfu@hotmail.com', 'Linda', '/skin/admin/img/msn.png', 0, 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_comment`
--

CREATE TABLE IF NOT EXISTS `bmkj_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '3' COMMENT '1通过2驳回3待审9已删除，大于9就是删除时间戳',
  `tabledir` varchar(20) DEFAULT NULL COMMENT '模块目录',
  `parentid` int(11) unsigned DEFAULT '0' COMMENT '父级ID',
  `infoid` int(11) unsigned DEFAULT NULL COMMENT '信息ID，如产品ID，新闻ID等',
  `userid` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `content` text COMMENT '内容',
  `star` tinyint(1) unsigned DEFAULT '5' COMMENT '评分',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `ip` varchar(15) DEFAULT NULL COMMENT 'IP',
  `anonymous` tinyint(1) DEFAULT '0' COMMENT '1匿名0不匿名',
  `sequence` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_down`
--

CREATE TABLE IF NOT EXISTS `bmkj_down` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `module` varchar(20) DEFAULT 'Down' COMMENT '模型',
  `userid` int(11) unsigned DEFAULT '1' COMMENT '用户ID',
  `sortid` int(10) DEFAULT NULL COMMENT '分类ID',
  `areaid` int(10) DEFAULT NULL COMMENT '地区ID',
  `client` varchar(200) DEFAULT 'pc,wap,weixin' COMMENT '客户端',
  `price` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '销售价格',
  `marketprice` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '市场价',
  `stock` int(10) unsigned DEFAULT NULL COMMENT '库存',
  `stockunit` varchar(10) DEFAULT NULL COMMENT '库存单位，如：件，个',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签，如：新品，热门',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `hits` int(10) DEFAULT '1' COMMENT '点击次数',
  `downtimes` int(11) DEFAULT '0' COMMENT '下载次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `morepics` text COMMENT '更多图片',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '第3方URL',
  `routesign` varchar(20) DEFAULT 'd' COMMENT '路由简短标识',
  `urlroute` varchar(100) DEFAULT NULL COMMENT '路由地址',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'SEO标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `fileurl` varchar(255) DEFAULT NULL COMMENT '附件',
  `morefileurl` text COMMENT '更多附件',
  `attributeid` int(11) unsigned DEFAULT NULL COMMENT 'attribute属性表ID',
  `attvalue` text COMMENT '属性值',
  `attid` int(11) unsigned DEFAULT NULL COMMENT '规格属性ID表attribute的ID',
  `sku_default` varchar(50) DEFAULT NULL COMMENT '默认sku',
  `sku_json` text COMMENT '规格sku的值',
  `content1` text COMMENT '内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `viewtemp` varchar(50) DEFAULT 'view' COMMENT '前端详情页模板',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='下载' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `bmkj_down`
--

INSERT INTO `bmkj_down` (`id`, `signid`, `module`, `userid`, `sortid`, `areaid`, `client`, `price`, `marketprice`, `stock`, `stockunit`, `tags`, `sequence`, `hits`, `downtimes`, `thumb`, `morepics`, `linkurl`, `routesign`, `urlroute`, `title`, `seotitle`, `keyword`, `description`, `fileurl`, `morefileurl`, `attributeid`, `attvalue`, `attid`, `sku_default`, `sku_json`, `content1`, `addtime`, `viewtemp`, `lang`) VALUES
(1, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 20, 3, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(2, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 10, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(3, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 11, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(4, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 9, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(5, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 9, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(6, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 9, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(7, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 11, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(8, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 9, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(9, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 9, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn'),
(10, 1, 'Down', 1, 12, 1, 'pc,wap', NULL, NULL, NULL, NULL, '热门\r\n推荐', 0, 9, 2, '', '', '', 'd', 'jishuziliaowendang', '技术资料文档', '', '', '', '/uploads/demo/banner2.jpg', '', 0, '[]', 0, NULL, '[]', '<p>技术资料文档</p>', 1534933120, 'view', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_field`
--

CREATE TABLE IF NOT EXISTS `bmkj_field` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fieldlabel` varchar(50) DEFAULT NULL COMMENT '标签变量',
  `fieldtext` varchar(100) DEFAULT NULL COMMENT '描述',
  `fieldvalue` text COMMENT '标签变量值',
  `fieldtype` varchar(50) DEFAULT NULL COMMENT '类型：text单行文本，textarea多行文本，thumb图片，file附件，richtext编辑器',
  `sequence` int(10) DEFAULT NULL COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='字段表' AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `bmkj_field`
--

INSERT INTO `bmkj_field` (`id`, `fieldlabel`, `fieldtext`, `fieldvalue`, `fieldtype`, `sequence`, `lang`) VALUES
(1, 'telephone', '电话', '400 - 400 - 4000', 'text', 0, 'cn'),
(2, 'copyright', '底部版权', 'Copyright &copy; 2017   ALL Rights Reserved. 深圳市XX科技有限公司 版权所有', 'textarea', 0, 'cn'),
(3, 'contact', '底部联系我们', '深圳市XXX科技有限公司<br/>电话：0755 - XXXX XXXX<br/>邮箱：info@ <br/>地址：深圳市龙岗区坂田街道吉华路XXX号XXX室<br/>QQ：10000000000 &nbsp; &nbsp;QQ：20000000', 'richtext', 0, 'cn'),
(4, 'aboutus', '首页公司简介', '深圳市XX科技有限公司从2006年起研究网络营销及电子商务领域；以网站建设为基础，致力于为您提供品牌营销型网站设计、系统软件开发、企业邮箱、域名注册及虚拟主机、云服务器、网站维护托管、SEO/SEM优化推广、400电话等产品和服务；<br/><br/>目前客户遍及深圳、广州、东莞、北京、香港、海南以及部分海外华人社区。。。<br/><br/>我们根据您的实际情况与需求出发，以独到的设计理念和精工细作的专业精神、协助不同类型的客户根据其不同的商业发展目标与需求，定制最佳的互联网和电子商务项目的解决方案；<br/><br/>并能够根据客户的服务需求，提供长期的服务方案；我们用专业的技术服务于对互联网认真的企事业单位和个人，真诚希望与您合作，共创双赢。', 'richtext', 0, 'cn'),
(5, 'address', '地址', 'Bantian street, Longgang District of Shenzhen City,  Guangdong province Jihua Road No. XXX XX building room 111', 'text', 0, 'en'),
(6, 'slogan', '首页顶部左侧文字', '有理想的地方，地狱都是天堂。', 'text', 0, 'cn'),
(7, 'telephone', '电话', '86-755-XXXX XXXX', 'text', 0, 'en'),
(8, 'copyright', '底部版权', 'Copyright © 2017    Shenzhen XXX Technology Co., Ltd. ALL Rights Reserved.', 'textarea', 0, 'en'),
(9, 'aboutus', '首页公司简介', '<p>Shenzhen XX Technology Co., Ltd. from 2006 to study the field of network marketing and e-commerce; The website construction as the foundation, dedicated to providing you with the brand marketing website design, software development, enterprise mailbox, domain name registration, virtual host, server, cloud hosting, website maintenance SEO/SEM optimization promotion, 400 phones and other...</p>', 'richtext', 0, 'en'),
(10, 'slogan', '首页顶部左侧文字', 'People laugh and people cry , Some give up Some always try !', 'text', 0, 'en'),
(11, 'erweima', '二维码', '/skin/admin/img/erweima.jpg', 'thumb', 0, 'cn'),
(12, 'erweima', '二维码', '/skin/admin/img/erweima.jpg', 'thumb', 0, 'en'),
(13, 'contact', '底部联系我们', 'Shenzhen XXX Technology Co., Ltd.<br style="white-space: normal;"/>Tel：0755 - XXXX XXXX<br/>Fax：0755 - XXXX XXXX<br/>Email：info@ <br style="white-space: normal;"/>Add：Bantian street, Longgang District of Shenzhen City, <br/>Guangdong province Jihua Road No. XXX XX building room 111<br/>', 'richtext', 0, 'en'),
(14, 'address', '联系地址', '深圳市龙岗区坂田吉华路XXX号XX大厦XXX室', 'text', 0, 'cn'),
(15, 'email', '邮箱', '1062129401@qq.com', 'text', 0, 'cn'),
(16, 'email', '邮箱', 'info@ ', 'text', 0, 'en'),
(25, 'logo', '白色logo', '/skin/index/template1/img/logolight.png', 'thumb', 0, 'cn'),
(26, 'homevideo', '首页视频地址', '/uploads/didyouknow.mp4', 'file', 0, 'cn'),
(27, 'videotext', '首页视频简介', '你知道吗？在中国，如果你是百万分之一的精英，仍有1400个竞争者。。。', 'file', 0, 'cn'),
(28, 'videoimg', '首页视频图片', '/skin/index/template1/img/blog-3.jpg', 'thumb', 0, 'cn'),
(29, 'latitude', '地图纬度', '22.56101', 'text', 0, 'cn'),
(31, 'mapcity', '地图城市', '深圳', 'text', 0, 'cn'),
(32, 'logo', '白色logo', '/skin/index/template1/img/logolighten.png', 'thumb', 0, 'en'),
(33, 'videoimg', '首页视频图片', '/skin/index/template1/img/blog-3.jpg', 'thumb', 0, 'en'),
(34, 'homevideo', '首页视频地址', '/uploads/didyouknow.mp4', 'file', 0, 'en'),
(35, 'videotext', '首页视频简介', 'Did you know？In China, if you are one millionth of the elite, there are still 1400 competitors.', 'file', 0, 'en'),
(36, 'longitude', '地图经度', '113.957352', 'text', 0, 'en'),
(37, 'latitude', '地图纬度', '22.56101', 'text', 0, 'en'),
(38, 'mapcity', '地图城市', 'Shenzhen', 'text', 0, 'en'),
(39, 'mob', '手机', '138 xxxx xxxx', 'text', 0, 'cn'),
(40, 'mob', '手机', '86-138 xxxx xxxx', 'text', 0, 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_guestbook`
--

CREATE TABLE IF NOT EXISTS `bmkj_guestbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '3' COMMENT '1已回复2处理中3待回复4已查看5已评价9已删除，大于9就是删除时间戳',
  `parentid` int(11) unsigned DEFAULT '0' COMMENT '父级ID',
  `userid` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `attvalue` text COMMENT '留言属性',
  `realname` varchar(30) DEFAULT NULL COMMENT '姓名',
  `contact` varchar(500) DEFAULT NULL COMMENT '联系方式',
  `company` varchar(200) DEFAULT NULL COMMENT '公司名称',
  `telephone` varchar(50) DEFAULT NULL COMMENT '电话',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机',
  `qq` varchar(30) DEFAULT NULL COMMENT 'QQ',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `morepics` text NOT NULL COMMENT '更多图片',
  `morefileurl` text NOT NULL COMMENT '更多附件',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `ip` varchar(50) DEFAULT NULL COMMENT 'IP',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言本' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_keywordlink`
--

CREATE TABLE IF NOT EXISTS `bmkj_keywordlink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) DEFAULT NULL COMMENT '关键词',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `sequence` int(10) DEFAULT NULL COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='关键词' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bmkj_keywordlink`
--

INSERT INTO `bmkj_keywordlink` (`id`, `keyword`, `linkurl`, `sequence`, `lang`) VALUES
(1, '网站建设', 'http://www. ', 0, 'cn'),
(2, 'web design', 'http://www. ', 0, 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_language`
--

CREATE TABLE IF NOT EXISTS `bmkj_language` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `admintitle` varchar(50) DEFAULT NULL COMMENT '后台名称',
  `viewtitle` varchar(50) DEFAULT NULL COMMENT '前台名称',
  `isdefault` tinyint(1) DEFAULT NULL COMMENT '是否默认：1默认0不默认',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：1启用0不启用',
  `settheme` tinyint(1) DEFAULT '0' COMMENT 'PC和移动端是否共用模板',
  `mulu` varchar(20) DEFAULT NULL COMMENT '目录',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `ico` varchar(500) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='语言' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bmkj_language`
--

INSERT INTO `bmkj_language` (`id`, `admintitle`, `viewtitle`, `isdefault`, `status`, `settheme`, `mulu`, `sequence`, `ico`) VALUES
(1, '简体中文', '中文', 1, 1, 0, 'cn', 100, '/skin/admin/img/flags/cn.png'),
(2, 'English', 'EN', 0, 1, 0, 'en', 90, '/skin/admin/img/flags/en.png');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_module`
--

CREATE TABLE IF NOT EXISTS `bmkj_module` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) DEFAULT 'Product' COMMENT '模型',
  `tabledir` varchar(20) DEFAULT NULL COMMENT '表名称，首字母大写判断控制器用',
  `routesign` varchar(20) DEFAULT NULL COMMENT '路由简短标识',
  `title` varchar(20) DEFAULT NULL COMMENT '模块名称',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签，如：新品，热门',
  `disabled` tinyint(1) DEFAULT '1' COMMENT '是否启用：1启用0禁用',
  `listnum` smallint(6) DEFAULT NULL COMMENT '前台列表显示数量',
  `seotitle` varchar(255) DEFAULT NULL COMMENT '模块列表页标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '模块列表页关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '模块列表页描述',
  `urlroute` varchar(100) DEFAULT NULL COMMENT 'url路由',
  `isdisplay` varchar(200) DEFAULT NULL COMMENT '参数设置：是否显示',
  `initial_hits` varchar(20) DEFAULT '1,1' COMMENT '随机初始点击数',
  `initial_stock` int(10) DEFAULT '1000000' COMMENT '初始库存',
  `stockunit` varchar(500) DEFAULT NULL COMMENT '库存单位，如：件，个',
  `no_delete_sortid` text COMMENT '禁止删除的分类ID，用,隔开',
  `no_deleteid` text COMMENT '禁止删除的信息ID，用,隔开',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `lang` char(30) DEFAULT 'cn' COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='模块' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `bmkj_module`
--

INSERT INTO `bmkj_module` (`id`, `module`, `tabledir`, `routesign`, `title`, `tags`, `disabled`, `listnum`, `seotitle`, `keyword`, `description`, `urlroute`, `isdisplay`, `initial_hits`, `initial_stock`, `stockunit`, `no_delete_sortid`, `no_deleteid`, `sequence`, `lang`) VALUES
(1, 'Product', 'Product', 'p', '产品', '新品\r\n热门\r\n推荐', 1, 9, '产品中心-深圳XXX科技有限公司', '', '', 'product', 'attribute,area,onecontent,morecontents,thumb,morepics,fileurl,morefiles,price,hits,client,tags,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,index_template,view_template,spec', '100,300', 1000000, '件\r\n个\r\n箱\r\n头\r\n罐', '', '', 100, 'cn'),
(2, 'News', 'News', 'n', '新闻', '热门\r\n推荐', 1, 6, '新闻资讯-深圳XXX科技有限公司', '', '', 'news', 'attribute,area,onecontent,morecontents,thumb,morepics,fileurl,morefiles,hits,client,tags,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,index_template,view_template', '100,300', 1000000, '', '', '', 90, 'cn'),
(3, 'About', 'About', 'a', '单页', '', 1, 9, '关于我们-深圳XXX科技有限公司', '', '', 'about', 'attribute,area,onecontent,morecontents,thumb,morepics,fileurl,morefiles,hits,client,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,index_template,view_template', '100,300', 1000000, '', '', '', 80, 'cn'),
(4, 'Project', 'Project', 'c', '案例', '热门\r\n推荐', 1, 5, '案例展示-深圳XXX科技有限公司', '', '', 'project', 'attribute,area,onecontent,morecontents,thumb,morepics,fileurl,morefiles,price,hits,client,tags,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,index_template,view_template,spec', '100,300', 1000000, '件\r\n个\r\n箱\r\n头\r\n罐', '', '', 70, 'cn'),
(5, 'Down', 'Down', 'd', '下载', '热门\r\n推荐', 1, 7, '下载中心-深圳XXX科技有限公司', '', '', 'down', 'attribute,area,onecontent,morecontents,thumb,morepics,fileurl,morefiles,price,hits,client,tags,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,index_template,view_template,spec', '100,300', 1000000, '件\r\n个\r\n箱\r\n头\r\n罐', '', '', 60, 'cn'),
(6, 'Product', 'Product', 'p', 'Product', NULL, 1, 9, 'Products', '', '', 'product', 'attribute,area,morecontents,thumb,morepics,fileurl,morefiles,hits,client,status,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,deletefile,index_template,view_template', '1,1', 1000000, NULL, NULL, NULL, 100, 'en'),
(7, 'News', 'News', 'n', 'News', NULL, 1, 6, 'News', '', '', 'news', 'attribute,area,morecontents,thumb,morepics,fileurl,morefiles,price,hits,client,status,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,deletefile,index_template,view_template', '1,1', 1000000, NULL, NULL, NULL, 90, 'en'),
(8, 'About', 'About', 'a', 'About', NULL, 1, 9, 'About us', '', '', 'about', 'attribute,area,morecontents,thumb,morepics,fileurl,morefiles,price,hits,client,status,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,deletefile,index_template,view_template', '1,1', 1000000, NULL, NULL, NULL, 80, 'en'),
(9, 'Project', 'Project', 'c', 'Project', NULL, 1, 5, 'Projects', '', '', 'project', 'attribute,area,thumb,morepics,fileurl,morefiles,price,hits,client,status,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,deletefile,index_template,view_template', '1,1', 1000000, NULL, NULL, NULL, 70, 'en'),
(10, 'Down', 'Down', 'd', 'Down', NULL, 1, 7, 'Download', '', '', 'down', 'attribute,area,morecontents,thumb,morepics,fileurl,morefiles,price,hits,client,status,addtime,linkurl,sort,sortimg,addinfo,leftdisplay,keywordlink,deletefile,index_template,view_template', '1,1', 1000000, NULL, NULL, NULL, 60, 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_navigation`
--

CREATE TABLE IF NOT EXISTS `bmkj_navigation` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `att_type` varchar(20) DEFAULT 'small' COMMENT '属性',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `subtitle` varchar(50) DEFAULT NULL COMMENT '副标题',
  `linkurl` varchar(500) DEFAULT NULL COMMENT '链接地址',
  `sequence` int(10) DEFAULT NULL COMMENT '排序',
  `client` varchar(200) DEFAULT NULL COMMENT '客户端',
  `outflag` int(2) DEFAULT NULL COMMENT '是否弹出新窗口：1是0否',
  `parentid` int(10) DEFAULT NULL COMMENT '父级ID',
  `thumb` varchar(500) DEFAULT NULL COMMENT '导航图片',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='导航' AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `bmkj_navigation`
--

INSERT INTO `bmkj_navigation` (`id`, `att_type`, `title`, `subtitle`, `linkurl`, `sequence`, `client`, `outflag`, `parentid`, `thumb`, `lang`) VALUES
(1, 'default', 'Home', NULL, '/en/', 100, 'pc,wap', 0, 0, '', 'en'),
(2, 'Product', 'Products', '', '/en/product.html', 90, 'pc,wap', 0, 0, '', 'en'),
(3, 'default', '首页', NULL, '/cn/', 100, 'pc,wap', 0, 0, '', 'cn'),
(4, 'Product', '产品中心', '', '/cn/product.html', 90, 'pc,wap', 0, 0, '', 'cn'),
(5, 'default', '新闻资讯', NULL, '/cn/news-n-1.html', 80, 'pc,wap', 0, 0, '', 'cn'),
(6, 'default', '案例展示', '', '/cn/project-c-1.html', 70, 'pc,wap', 0, 0, '', 'cn'),
(7, 'default', '下载中心', NULL, '/cn/down-d-1.html', 60, 'pc,wap', 0, 0, '', 'cn'),
(29, 'default', 'About us', NULL, '/en/aboutus-a3.html', 50, 'pc,wap', 0, 0, '', 'en'),
(30, 'default', 'Careers', NULL, '/en/rencaizhaopin-a6-1.html', 0, 'pc,wap', 0, 29, '', 'en'),
(10, 'default', 'News', NULL, '/en/news-n-1.html', 80, 'pc,wap', 0, 0, '', 'en'),
(11, 'default', 'Projects', NULL, '/en/project-c-1.html', 70, 'pc,wap', 0, 0, '', 'en'),
(12, 'default', 'Download', NULL, '/en/down-d-1.html', 60, 'pc,wap', 0, 0, '', 'en'),
(26, 'default', '关于我们', NULL, '/cn/gongsijianjie-a1.html', 50, 'pc,wap', 0, 0, '', 'cn'),
(27, 'default', '人才招聘', NULL, '/cn/rencaizhaopin-a5-1.html', 0, 'pc,wap', 0, 26, '', 'cn'),
(28, 'default', '联系我们', NULL, '/cn/lianxiwomen-a2.html', 40, 'pc,wap', 0, 0, '', 'cn'),
(17, 'default', '常见问题', NULL, '/cn/changjianwenti-n7-1.html', 10, 'pc,wap', 0, 5, '', 'cn'),
(18, 'default', 'FAQ', NULL, '/en/faq-n8-1.html', 0, 'pc,wap', 0, 10, '', 'en'),
(31, 'default', 'Contact us', NULL, '/en/contactus-a4.html', 40, 'pc,wap', 0, 0, '', 'en'),
(32, 'default', '建站管家_企业站模板', '', '/cn/jianzhanguanjiaqiyezhanmoban-p9-1.html', 0, 'pc,wap', 0, 4, '', 'cn'),
(33, 'default', '建站管家_系统系列', '', '/cn/jianzhanguanjiaxitongxilie-p10-1.html', 0, 'pc,wap', 0, 4, '', 'cn'),
(34, 'default', '一级分类', '', '/cn/yijifenlei-p16-1.html', 10, 'pc,wap', 0, 4, '', 'cn'),
(35, 'default', '二级分类', '', '/cn/erjifenlei-p17-1.html', 0, 'pc,wap', 0, 34, '', 'cn'),
(36, 'default', '三级分类', '', '/cn/sanjifenlei-p18-1.html', 0, 'pc,wap', 0, 35, '', 'cn'),
(37, 'default', '四级分类', '', '/cn/sijifenlei-p19-1.html', 0, 'pc,wap', 0, 36, '', 'cn'),
(38, 'default', '公司新闻', '', '/cn/companynews-n1-1.html', 0, 'pc,wap', 0, 5, '', 'cn'),
(39, 'default', '公司简介', '', '/cn/gongsijianjie-a1.html', 10, 'pc,wap', 0, 26, '', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_news`
--

CREATE TABLE IF NOT EXISTS `bmkj_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `module` varchar(20) DEFAULT 'News' COMMENT '模型',
  `userid` int(11) unsigned DEFAULT '1' COMMENT '用户ID',
  `sortid` int(10) DEFAULT NULL COMMENT '分类ID',
  `areaid` int(10) DEFAULT NULL COMMENT '地区ID',
  `client` varchar(200) DEFAULT 'pc,wap,weixin' COMMENT '客户端',
  `price` decimal(10,2) unsigned DEFAULT NULL COMMENT '价格',
  `marketprice` decimal(10,2) unsigned DEFAULT NULL COMMENT '市场价',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签，如：新品，热门',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `hits` int(10) DEFAULT '1' COMMENT '点击次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `morepics` text COMMENT '更多图片',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '第3方URL',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'SEO标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `fileurl` varchar(255) DEFAULT NULL COMMENT '附件',
  `morefileurl` text COMMENT '更多附件',
  `attributeid` int(11) unsigned DEFAULT NULL COMMENT 'attribute属性表ID',
  `attvalue` text COMMENT '属性值',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `copyfrom` varchar(50) DEFAULT NULL COMMENT '来源',
  `fromurl` varchar(255) DEFAULT NULL COMMENT '来源链接',
  `content1` text COMMENT '内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `routesign` varchar(20) DEFAULT 'n' COMMENT '路由简短标识',
  `urlroute` varchar(100) DEFAULT NULL COMMENT '路由地址',
  `viewtemp` varchar(50) DEFAULT 'view' COMMENT '前端详情页模板',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻' AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `bmkj_news`
--

INSERT INTO `bmkj_news` (`id`, `signid`, `module`, `userid`, `sortid`, `areaid`, `client`, `price`, `marketprice`, `tags`, `sequence`, `hits`, `thumb`, `morepics`, `linkurl`, `title`, `seotitle`, `keyword`, `description`, `fileurl`, `morefileurl`, `attributeid`, `attvalue`, `author`, `copyfrom`, `fromurl`, `content1`, `addtime`, `routesign`, `urlroute`, `viewtemp`, `lang`) VALUES
(1, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 11, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(2, 1, 'News', 1, 8, 2, 'pc,wap', '0.00', '0.00', '', 0, 6, '', '', '', 'The method of using the housekeeper''s label', '', '', 'The method of using the housekeeper''s label，The method of using the housekeeper''s label', '', '', 0, '[]', 'admin', '', 'http://', '<p>The method of using the housekeeper&#39;s label，The method of using the housekeeper&#39;s label</p>', 1534934848, 'n', 'themethodofusingthehousekeeper', 'view', 'en'),
(3, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 10, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(4, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 5, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(5, 1, 'News', 1, 8, 2, 'pc,wap', '0.00', '0.00', '', 0, 2, '', '', '', 'The method of using the housekeeper''s label', '', '', 'The method of using the housekeeper''s label，The method of using the housekeeper''s label', '', '', 0, '[]', 'admin', '', 'http://', '<p>The method of using the housekeeper&#39;s label，The method of using the housekeeper&#39;s label</p>', 1534934848, 'n', 'themethodofusingthehousekeeper', 'view', 'en'),
(6, 1, 'News', 1, 8, 2, 'pc,wap', '0.00', '0.00', '', 0, 2, '', '', '', 'The method of using the housekeeper''s label', '', '', 'The method of using the housekeeper''s label，The method of using the housekeeper''s label', '', '', 0, '[]', 'admin', '', 'http://', '<p>The method of using the housekeeper&#39;s label，The method of using the housekeeper&#39;s label</p>', 1534934848, 'n', 'themethodofusingthehousekeeper', 'view', 'en'),
(7, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(8, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 10, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(9, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 5, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(10, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(11, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 10, 13, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(12, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(13, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 5, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(14, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 5, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn');
INSERT INTO `bmkj_news` (`id`, `signid`, `module`, `userid`, `sortid`, `areaid`, `client`, `price`, `marketprice`, `tags`, `sequence`, `hits`, `thumb`, `morepics`, `linkurl`, `title`, `seotitle`, `keyword`, `description`, `fileurl`, `morefileurl`, `attributeid`, `attvalue`, `author`, `copyfrom`, `fromurl`, `content1`, `addtime`, `routesign`, `urlroute`, `viewtemp`, `lang`) VALUES
(15, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 9, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(16, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 5, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(17, 1, 'News', 1, 7, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 5, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(18, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(19, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(20, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn'),
(21, 1, 'News', 1, 1, 1, 'pc,wap', NULL, NULL, '热门\r\n推荐', 0, 8, '', '', '', '建站管家标签的使用方法', '', '', '1、list标签（在所有模板页面均可调用）2、调用后台“网站设置”里的字段在前台显示3、调用后台“字段管理”里的内容在前台显示4、各个模块列表页循环和分页（如：新闻模块、产品模块等）', '', '', 0, '[]', '管理员', '深圳市XXX科技有限公司', 'http://', '<p style="white-space: normal"><strong><span style="font-size: 16px">二、标签使用</span></strong></p><p style="white-space: normal"><span style="font-size: 14px;color: rgb(0, 176, 80)"><strong>1、list标签（在所有模板页面均可调用）</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong></p><p style="white-space: normal">{tag: list name=&quot;rs&quot; table=&quot;数据表&quot; where=&quot;查询条件&quot; limit=&quot;显示数量&quot; order=&quot;排序方式&quot;}</p><p style="white-space: normal">循环内容</p><p style="white-space: normal">{/tag: list}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用示例（幻灯片循环）：</span></strong></p><p style="white-space: normal">{tag:list name=&quot;rs&quot; table=&quot;ad&quot; where=&quot;lang=&#39;cn&#39; and ad_type=&#39;banner&#39; and position=&#39;Index&#39;&quot; limit=&quot;5&quot; order=&quot;sequence desc &quot;}</p><p style="white-space: normal">&lt;li&gt;&lt;a href=&quot;{$rs.linkurl}&quot;&gt;{$rs.thumb}&lt;/a&gt;&lt;/li&gt;</p><p style="white-space: normal">{/tag:list}</p><p style="white-space: normal">其中limit可以这样：limit=&quot;3,6&quot;表示显示第3到第6条</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">2、调用后台“网站设置”里的字段在前台显示</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$siteRs.数据表siteinfo里的字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>调用网站标题：{$siteRs.sitetitle}</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="color: rgb(0, 176, 80);font-size: 14px"><strong>3、调用后台“字段管理”里的内容在前台显示</strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">方法：</span></strong>{$字段标签}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>如：你在后台添加了一个字段标签为：telephone，字段内容为：0755-XXXXXXXX</p><p style="white-space: normal">调用telephone标签：{$telephone}则显示为：0755-XXXXXXXX</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">4、各个模块列表页循环和分页（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>使用方法：</strong></span></p><p style="white-space: normal">{volist name=&quot;list&quot; id=&quot;rs&quot;}</p><p style="white-space: normal">{$rs.thumb}{$rs.title}</p><p style="white-space: normal">{/volist}</p><p style="white-space: normal"><span style="color: rgb(255, 0, 0)"><strong>分页：</strong></span>&lt;div&gt;{$list-&gt;render()|raw}&lt;/div&gt;</p><p style="white-space: normal">&nbsp;</p><p style="white-space: normal"><span style="font-size: 14px"><strong><span style="color: rgb(0, 176, 80)">5、各个模块内容页字段显示（如：新闻模块、产品模块等）</span></strong></span></p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">使用方法：</span></strong>{$rs.数据表字段}</p><p style="white-space: normal"><strong><span style="color: rgb(255, 0, 0)">示例：</span></strong>产品图片在产品内容模板页调用：&lt;img src=&quot;{$rs.thumb}&quot;&gt;</p><p><br/></p>', 1534932995, 'n', 'jianzhanguanjiabiaoqiandeshiyo', 'view', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_product`
--

CREATE TABLE IF NOT EXISTS `bmkj_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `module` varchar(20) DEFAULT 'Product' COMMENT '模型',
  `userid` int(11) unsigned DEFAULT '1' COMMENT '用户ID',
  `sortid` int(10) DEFAULT NULL COMMENT '分类ID',
  `areaid` int(10) DEFAULT NULL COMMENT '地区ID',
  `client` varchar(200) DEFAULT 'pc,wap,weixin' COMMENT '客户端',
  `price` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '销售价格',
  `marketprice` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '市场价',
  `stock` int(10) unsigned DEFAULT NULL COMMENT '库存',
  `stockunit` varchar(10) DEFAULT NULL COMMENT '库存单位，如：件，个',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签，如：新品，热门',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `hits` int(10) DEFAULT '1' COMMENT '点击次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `morepics` text COMMENT '更多图片',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '第3方URL',
  `routesign` varchar(20) DEFAULT 'p' COMMENT '路由简短标识',
  `urlroute` varchar(100) DEFAULT NULL COMMENT '路由地址',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'SEO标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `fileurl` varchar(255) DEFAULT NULL COMMENT '附件',
  `morefileurl` text COMMENT '更多附件',
  `attributeid` int(11) unsigned DEFAULT NULL COMMENT 'attribute属性表ID',
  `attvalue` text COMMENT '属性值',
  `attid` int(11) unsigned DEFAULT NULL COMMENT '规格属性ID表attribute的ID',
  `sku_default` varchar(50) DEFAULT NULL COMMENT '默认sku',
  `sku_json` text COMMENT '规格sku的值',
  `content1` text COMMENT '内容1',
  `content2` text COMMENT '内容2',
  `content3` text COMMENT '内容3',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `viewtemp` varchar(50) DEFAULT 'view' COMMENT '前端详情页模板',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品' AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `bmkj_product`
--

INSERT INTO `bmkj_product` (`id`, `signid`, `module`, `userid`, `sortid`, `areaid`, `client`, `price`, `marketprice`, `stock`, `stockunit`, `tags`, `sequence`, `hits`, `thumb`, `morepics`, `linkurl`, `routesign`, `urlroute`, `title`, `seotitle`, `keyword`, `description`, `fileurl`, `morefileurl`, `attributeid`, `attvalue`, `attid`, `sku_default`, `sku_json`, `content1`, `content2`, `content3`, `addtime`, `viewtemp`, `lang`) VALUES
(1, 1, 'Product', 1, 9, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 4, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiatpban', '建站管家标签的使用方法', '', '', ' 开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员', '', '', 0, '[]', 0, NULL, '[]', '<p>&nbsp;开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员</p>', '', '', 1534931838, 'view', 'cn'),
(2, 1, 'Product', 1, 10, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 13, '/uploads/demo/product-2.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'tpbangongzidonghuaguanlixitong', '技术资料文档', '', '', '功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;">演示地址：<a href="http://dfoa3. /" target="_blank">http://dfoa3. /</a></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">总经理账号：zongjingli 密码：zongjingli&nbsp;</p><p style="white-space: normal;">部门经理账号：bumenjingli 密码：bumenjingli&nbsp;</p><p style="white-space: normal;">员工账号：yuangong 密码：yuangong&nbsp;</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等</p><p><br/></p>', '', '', 1534931932, 'view', 'cn'),
(3, 1, 'Product', 1, 10, 1, 'pc,wap', '0.00', '0.00', 1000000, '件', '新品', 0, 42, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaxiaoshangcheng', '建站管家标签的使用方法', '', '', '多语言 ● 一键生成：\r\n内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；\r\n模板样式 ● 在线编辑：\r\n在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 3, '[{"title":"\\u989c\\u8272","attvalue":"\\u7ea2\\u8272"},{"title":"\\u5c3a\\u5bf8","attvalue":"M"}]', 1, '2_7', '[{"id":"2_5","descartes":10,"specimg":"\\/uploads\\/demo\\/banner2.jpg","price":"11","marketprice":"111","costprice":"1","stock":"10","code":"","title":"\\u84dd\\u8272_M"},{"id":"2_6","descartes":12,"specimg":"\\/uploads\\/demo\\/banner3.jpg","price":"22","marketprice":"222","costprice":"2","stock":"20","code":"","title":"\\u84dd\\u8272_L"},{"id":"2_7","descartes":14,"specimg":"\\/uploads\\/demo\\/product-1.jpg","price":"33","marketprice":"333","costprice":"3","stock":"30","code":"","title":"\\u84dd\\u8272_S"},{"id":"3_5","descartes":15,"specimg":"","price":"44","marketprice":"444","costprice":"4","stock":"40","code":"","title":"\\u7eff\\u8272_M"},{"id":"3_6","descartes":18,"specimg":"","price":"55","marketprice":"555","costprice":"5","stock":"50","code":"","title":"\\u7eff\\u8272_L"},{"id":"3_7","descartes":21,"specimg":"","price":"66","marketprice":"666","costprice":"6","stock":"60","code":"","title":"\\u7eff\\u8272_S"}]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(4, 1, 'Product', 1, 14, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 1, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'websitetemplate', 'Template Template Template', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534933779, 'view', 'en'),
(5, 1, 'Product', 1, 13, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 1, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(6, 1, 'Product', 1, 13, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 4, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'onlinereservationsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934221, 'view', 'en'),
(7, 1, 'Product', 1, 10, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 30, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaqiyezhantpxqiji', '建站管家标签的使用方法', '', '', '多语言 ● 一键生成：内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；模板样式 ● 在线编辑：在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(8, 1, 'Product', 1, 13, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 6, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'onlinereservationsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934221, 'view', 'en'),
(9, 1, 'Product', 1, 9, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 4, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiatpban', '建站管家标签的使用方法', '', '', ' 开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员', '', '', 0, '[]', 0, NULL, '[]', '<p>&nbsp;开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员</p>', '', '', 1534931838, 'view', 'cn'),
(10, 1, 'Product', 1, 19, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 8, '/uploads/demo/product-2.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'tpbangongzidonghuaguanlixitong', '建站管家标签的使用方法', '', '', '功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;">演示地址：<a href="http://dfoa3. /" target="_blank">http://dfoa3. /</a></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">总经理账号：zongjingli 密码：zongjingli&nbsp;</p><p style="white-space: normal;">部门经理账号：bumenjingli 密码：bumenjingli&nbsp;</p><p style="white-space: normal;">员工账号：yuangong 密码：yuangong&nbsp;</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等</p><p><br/></p>', '', '', 1534931932, 'view', 'cn'),
(11, 1, 'Product', 1, 14, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 1, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'websitetemplate', 'Template Template Template', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534933779, 'view', 'en'),
(12, 1, 'Product', 1, 13, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 2, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(13, 1, 'Product', 1, 21, 1, 'pc,wap', '0.00', '0.00', 1000000, '件', '新品', 0, 19, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaxiaoshangcheng', '建站管家标签的使用方法', '', '', '多语言 ● 一键生成：内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；模板样式 ● 在线编辑：在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(14, 1, 'Product', 1, 19, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 9, '/uploads/demo/product-2.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'tpbangongzidonghuaguanlixitong', '建站管家标签的使用方法', '', '', '功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;">演示地址：<a href="http://dfoa3. /" target="_blank">http://dfoa3. /</a></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">总经理账号：zongjingli 密码：zongjingli&nbsp;</p><p style="white-space: normal;">部门经理账号：bumenjingli 密码：bumenjingli&nbsp;</p><p style="white-space: normal;">员工账号：yuangong 密码：yuangong&nbsp;</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等</p><p><br/></p>', '', '', 1534931932, 'view', 'cn'),
(15, 1, 'Product', 1, 20, 1, 'pc,wap', '0.00', '0.00', 1000000, '件', '新品', 0, 11, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaxiaoshangcheng', '建站管家标签的使用方法', '', '', '多语言 ● 一键生成：内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；模板样式 ● 在线编辑：在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(16, 1, 'Product', 1, 19, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 7, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiatpban', '建站管家标签的使用方法', '', '', ' 开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员', '', '', 0, '[]', 0, NULL, '[]', '<p>&nbsp;开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员</p>', '', '', 1534931838, 'view', 'cn'),
(17, 1, 'Product', 1, 9, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 4, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiatpban', '建站管家标签的使用方法', '', '', ' 开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员', '', '', 0, '[]', 0, NULL, '[]', '<p>&nbsp;开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员</p>', '', '', 1534931838, 'view', 'cn'),
(18, 1, 'Product', 1, 9, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 4, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiatpban', '建站管家标签的使用方法', '', '', ' 开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员', '', '', 0, '[]', 0, NULL, '[]', '<p>&nbsp;开源、可二次开发；此版不再更新，与旗舰版差距较大，不适合非TP程序员</p>', '', '', 1534931838, 'view', 'cn'),
(19, 1, 'Product', 1, 10, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 10, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaqiyezhantpxqiji', '建站管家标签的使用方法', '', '', '多语言 ● 一键生成：内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；模板样式 ● 在线编辑：在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(20, 1, 'Product', 1, 20, 1, 'pc,wap', '0.00', '0.00', 1000000, '件', '新品', 0, 14, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaxiaoshangcheng', '建站管家标签的使用方法', '', '', '多语言 ● 一键生成：内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；模板样式 ● 在线编辑：在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(21, 1, 'Product', 1, 19, 1, 'pc,wap', '0.00', '0.00', 1000000, NULL, '新品\r\n热门\r\n推荐', 0, 9, '/uploads/demo/product-2.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'tpbangongzidonghuaguanlixitong', '建站管家标签的使用方法', '', '', '功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等', '', '', 0, '[]', 0, NULL, '[]', '<p style="white-space: normal;">演示地址：<a href="http://dfoa3. /" target="_blank">http://dfoa3. /</a></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">总经理账号：zongjingli 密码：zongjingli&nbsp;</p><p style="white-space: normal;">部门经理账号：bumenjingli 密码：bumenjingli&nbsp;</p><p style="white-space: normal;">员工账号：yuangong 密码：yuangong&nbsp;</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">功能模块：客户管理、订单管理、产品管理、采购管理、供应商管理、工作计划、员工管理、工资管理、文件管理、收支管理、短消息管理、资讯管理等</p><p><br/></p>', '', '', 1534931932, 'view', 'cn'),
(22, 1, 'Product', 1, 10, 1, 'pc,wap', '0.00', '0.00', 1000000, '个', '新品\r\n热门\r\n推荐', 0, 25, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'jianzhanguanjiaqiyezhantpxqiji', '《建站管家_企业站》TP5.1.X旗舰版', '', '', '多语言 ● 一键生成：内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包；模板样式 ● 在线编辑：在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录', '', '', 3, '[{"title":"\\u989c\\u8272","attvalue":"\\u84dd\\u8272"},{"title":"\\u5c3a\\u5bf8","attvalue":"L"}]', 1, '2_7', '[{"id":"2_5","descartes":10,"specimg":"\\/uploads\\/demo\\/banner1.jpg","price":"11","marketprice":"111","costprice":"1","stock":"10","code":"","title":"\\u84dd\\u8272_M"},{"id":"2_6","descartes":12,"specimg":"","price":"22","marketprice":"222","costprice":"2","stock":"20","code":"","title":"\\u84dd\\u8272_L"},{"id":"2_7","descartes":14,"specimg":"\\/uploads\\/demo\\/product-1.jpg","price":"33","marketprice":"333","costprice":"3","stock":"30","code":"","title":"\\u84dd\\u8272_S"},{"id":"3_5","descartes":15,"specimg":"","price":"44","marketprice":"444","costprice":"4","stock":"40","code":"","title":"\\u7eff\\u8272_M"},{"id":"3_6","descartes":18,"specimg":"","price":"55","marketprice":"555","costprice":"5","stock":"50","code":"","title":"\\u7eff\\u8272_L"},{"id":"3_7","descartes":21,"specimg":"","price":"66","marketprice":"666","costprice":"6","stock":"60","code":"","title":"\\u7eff\\u8272_S"}]', '<p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);"><img src="/uploads/admin/1/5c7268fa0e960.jpg"/>多语言 ● 一键生成</span></strong></span></p><p style="white-space: normal;">内置中英双语，一键生成新的语言模块，自由切换默认语言，可开关，在线编辑语言包</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">模板样式 ● 在线编辑</span></strong></span></p><p style="white-space: normal;">在线新建、编辑、删除HTML/CSS文件，多模板管理、皮肤管理、新建删除目录</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">多模块 ● 一键生成</span></strong></span><br/></p><p style="white-space: normal;">内置产品、新闻、下载、案例、单页模块，可一键生成新的模块，如：服务项目、团队模块</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">开放源代码</span></strong></span></p><p style="white-space: normal;">系统按域名授权，代码开源，支持二次开发，告别自助建站寄人篱下的感觉</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">管理上传的图片、附件</span></strong></span></p><p style="white-space: normal;">管理图片和附件、网站设置、字段、客服、广告、导航、留言、参数设置、数据库备份、权限控制</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">水印、裁切图像处理</span></strong></span></p><p style="white-space: normal;">可设置上传图片和附件大小、水印裁切图像；多级分类、多级地区、自定义属性，简单自定义标签</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">利于搜索引擎优化（SEO）</span></strong></span></p><p style="white-space: normal;">URL简单自定义，汉字自动转拼音URL，关键词站内链接、页面标题，关键词，描述自定义</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">前后端适应电脑端+移动端</span></strong></span></p><p style="white-space: normal;">前端模板可做成自适应或PC端和手机端分离，后台自适应PC+移动端，用手机管理网站更方便</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><span style="font-size: 16px;"><strong><span style="color: rgb(0, 176, 80);">期待您的支持</span></strong></span></p><p style="white-space: normal;">支持正版的同学，都拥有高尚的情操和品格</p><p style="white-space: normal;">码农不易，请支持正版</p><p><br/></p>', '', '', 1534932026, 'view', 'cn'),
(23, 1, 'Product', 1, 22, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 2, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(24, 1, 'Product', 1, 23, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 2, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(25, 1, 'Product', 1, 24, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 2, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(26, 1, 'Product', 1, 13, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 3, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(27, 1, 'Product', 1, 14, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 2, '/uploads/demo/product-1.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'officemanagementsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934185, 'view', 'en'),
(28, 1, 'Product', 1, 22, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 1, '/uploads/demo/project-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'websitetemplate', 'Template Template Template', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534933779, 'view', 'en'),
(29, 1, 'Product', 1, 24, 2, 'pc,wap', '0.00', '0.00', 1000000, NULL, '', 0, 4, '/uploads/demo/product-3.jpg', '/uploads/demo/project-1.jpg|/uploads/demo/project-2.jpg', '', 'p', 'onlinereservationsystem', 'Software Software Software Software', '', '', 'Product Description', '', '', 0, '[]', 0, NULL, '[]', '', '', '', 1534934221, 'view', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_project`
--

CREATE TABLE IF NOT EXISTS `bmkj_project` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `module` varchar(20) DEFAULT 'Project' COMMENT '模型',
  `userid` int(11) unsigned DEFAULT '1' COMMENT '用户ID',
  `sortid` int(10) DEFAULT NULL COMMENT '分类ID',
  `areaid` int(10) DEFAULT NULL COMMENT '地区ID',
  `client` varchar(200) DEFAULT 'pc,wap,weixin' COMMENT '客户端',
  `price` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '销售价格',
  `marketprice` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '市场价格',
  `stock` int(10) unsigned DEFAULT NULL COMMENT '库存',
  `stockunit` varchar(10) DEFAULT NULL COMMENT '库存单位，如：件，个',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签，如：新品，热门',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `hits` int(10) DEFAULT '1' COMMENT '点击次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `morepics` text COMMENT '更多图片',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '第3方URL',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'SEO标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `fileurl` varchar(255) DEFAULT NULL COMMENT '附件',
  `morefileurl` text COMMENT '更多附件',
  `attributeid` int(11) unsigned DEFAULT NULL COMMENT 'attribute属性表ID',
  `attvalue` text COMMENT '属性值',
  `attid` int(11) unsigned DEFAULT NULL COMMENT '规格属性ID表attribute的ID',
  `sku_default` varchar(50) DEFAULT NULL COMMENT '默认sku',
  `sku_json` text COMMENT '规格sku的值',
  `content1` text COMMENT '内容1',
  `content2` text COMMENT '内容2',
  `content3` text COMMENT '内容3',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `routesign` varchar(20) DEFAULT 'c' COMMENT '路由简短标识',
  `urlroute` varchar(100) DEFAULT NULL COMMENT '路由地址',
  `viewtemp` varchar(50) DEFAULT 'view' COMMENT '前端详情页模板',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='案例' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `bmkj_project`
--

INSERT INTO `bmkj_project` (`id`, `signid`, `module`, `userid`, `sortid`, `areaid`, `client`, `price`, `marketprice`, `stock`, `stockunit`, `tags`, `sequence`, `hits`, `thumb`, `morepics`, `linkurl`, `title`, `seotitle`, `keyword`, `description`, `fileurl`, `morefileurl`, `attributeid`, `attvalue`, `attid`, `sku_default`, `sku_json`, `content1`, `content2`, `content3`, `addtime`, `routesign`, `urlroute`, `viewtemp`, `lang`) VALUES
(1, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 1, '/uploads/demo/project-1.jpg', '', '', '工程案例标题', '', '', '这里填此工程案例的简短描述，这里填此工程案例的简短描述，这里填此工程案例的简短描述，', '', '', 0, '[]', 0, NULL, '[]', '<p>这里填文字和图片、视频内容</p>', '', '', 1534932289, 'c', 'gongchenganlibiaoti', 'view', 'cn'),
(2, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 4, '/uploads/demo/project-2.jpg', '', '', '案例填充示例', '', '', '这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述', '', '', 0, '[]', 0, NULL, '[]', '<p>这里填文字内容、图片、附件和视频等</p>', '', '', 1534932341, 'c', 'anlitianchongshili', 'view', 'cn'),
(3, 1, 'Project', 1, 11, 1, 'pc,wap', '0.00', '0.00', 1000000, '件', '热门\r\n推荐', 0, 18, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述；\r\n案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(4, 1, 'Project', 1, 15, 2, 'pc,wap', NULL, NULL, 1000000, NULL, '', 0, 1, '/uploads/demo/product-3.jpg', '', '', 'Engineering project', '', '', 'Project Description，Project Description，Project Description，Project Description', '', '', 0, '[]', 0, NULL, '[]', '<p>Project Description，Project Description，Project Description，Project Description</p>', NULL, NULL, 1534934289, 'c', 'engineeringproject', 'view', 'en'),
(5, 1, 'Project', 1, 15, 2, 'pc,wap', NULL, NULL, 1000000, NULL, '', 0, 2, '/uploads/demo/project-1.jpg', '', '', 'Project Description', '', '', 'Project Description，Project Description，Project Description，Project Description', '', '', 0, '[]', 0, NULL, '[]', '<p>Project Description，Project Description，Project Description，Project Description</p>', NULL, NULL, 1534934325, 'c', 'projectdescription', 'view', 'en'),
(6, 1, 'Project', 1, 15, 2, 'pc,wap', NULL, NULL, 1000000, NULL, '', 0, 3, '/uploads/demo/project-2.jpg', '', '', 'Project Description', '', '', 'Project Description，Project Description，Project Description，Project Description', '', '', 0, '[]', 0, NULL, '[]', '<p>Project Description，Project Description，Project Description，Project Description</p>', NULL, NULL, 1534934348, 'c', 'projectdescription', 'view', 'en'),
(7, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 4, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(8, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 2, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(9, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 2, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(10, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 3, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(11, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 2, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(12, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 2, '/uploads/demo/project-3.jpg', '', '', '工程案例演示', '', '', '案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述', '', '', 0, '[]', 0, NULL, '[]', '<p>案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述，案例描述</p>', '', '', 1534932471, 'c', 'gongchenganliyanshi', 'view', 'cn'),
(13, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 4, '/uploads/demo/project-2.jpg', '', '', '案例填充示例', '', '', '这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述，这里是此案例的简短描述', '', '', 0, '[]', 0, NULL, '[]', '<p>这里填文字内容、图片、附件和视频等</p>', '', '', 1534932341, 'c', 'anlitianchongshili', 'view', 'cn'),
(14, 1, 'Project', 1, 11, 1, 'pc,wap', NULL, NULL, 1000000, NULL, '热门\r\n推荐', 0, 1, '/uploads/demo/project-1.jpg', '', '', '工程案例标题', '', '', '这里填此工程案例的简短描述，这里填此工程案例的简短描述，这里填此工程案例的简短描述，', '', '', 0, '[]', 0, NULL, '[]', '<p>这里填文字和图片、视频内容</p>', '', '', 1534932289, 'c', 'gongchenganlibiaoti', 'view', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_siteinfo`
--

CREATE TABLE IF NOT EXISTS `bmkj_siteinfo` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '网站关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '网站描述',
  `company` varchar(200) DEFAULT NULL COMMENT '公司名称',
  `groupid` smallint(5) unsigned DEFAULT NULL COMMENT '前台注册会员默认会员组',
  `logo` varchar(500) DEFAULT NULL COMMENT 'logo',
  `sitestatus` tinyint(1) DEFAULT NULL COMMENT '网站状态：1开启0关闭',
  `closereason` varchar(500) DEFAULT NULL COMMENT '关闭原因',
  `icpnumber` varchar(100) DEFAULT NULL COMMENT '备案号',
  `htmlcode` text COMMENT 'html代码',
  `agreement` text COMMENT '注册协议',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站设置' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bmkj_siteinfo`
--

INSERT INTO `bmkj_siteinfo` (`id`, `title`, `keyword`, `description`, `company`, `groupid`, `logo`, `sitestatus`, `closereason`, `icpnumber`, `htmlcode`, `agreement`, `lang`) VALUES
(1, '深圳市XXX科技有限公司', '', '', '深圳市XXX科技有限公司', 2, '/skin/index/default/img/logo.png', 1, '<p style="text-align: center;"><span style="font-size: 18px; color: rgb(255, 0, 0);"><strong><br/><span style="font-size: 18px; color: rgb(255, 0, 0); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">网站维护中，请稍后访问。。。</span></strong></span></p>', '粤ICP备1111111111', '<script>\r\nvar _hmt = _hmt || [];\r\n(function() {\r\n  var hm = document.createElement("script");\r\n  hm.src = "https://hm.baidu.com/hm.js?234c0b7df8dd5eff2297a9628daaf64b";\r\n  var s = document.getElementsByTagName("script")[0]; \r\n  s.parentNode.insertBefore(hm, s);\r\n})();\r\n</script>', '<p>如您使用本站，则表示您同意本站协议，否则请勿使用。</p><p><br/></p><p>1、XXXXXXXXXXXXXXXXXXXXXXXXX</p><p>2、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>3、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>4、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>5、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p><br/></p><p>本站拥有最终解释权。</p>', 'cn'),
(2, 'Shen Zhen Shi XXX Technology Co., Ltd. ', '', '', '', 3, '/skin/index/default/img/logoen.png', 1, '<p style="text-align: center;"><strong><span style="color: rgb(255, 0, 0); font-size: 18px;">Site maintenance, please visit later</span></strong></p>', '', '', '<p>If you use this site, it means that you agree with this site agreement, otherwise do not use it.</p><p><br/></p><p>1、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>2、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>3、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>4、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p>5、XXXXXXXXXXXXXXXXXXXXXXXXX<br/></p><p><br/></p><p>This site has the right of final interpretation.</p>', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_sort`
--

CREATE TABLE IF NOT EXISTS `bmkj_sort` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `parentid` int(10) DEFAULT NULL COMMENT '父分类ID',
  `tabledir` varchar(20) DEFAULT NULL COMMENT '模块目录',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `title` varchar(100) DEFAULT NULL COMMENT '分类标题',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'SEO标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '分类关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '分类描述',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片',
  `routesign` varchar(20) DEFAULT NULL COMMENT '路由简短标识',
  `urlroute` varchar(100) DEFAULT NULL COMMENT '路由地址',
  `listtemp` varchar(50) DEFAULT 'index' COMMENT '列表页模板',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类' AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `bmkj_sort`
--

INSERT INTO `bmkj_sort` (`id`, `signid`, `parentid`, `tabledir`, `sequence`, `title`, `seotitle`, `keyword`, `description`, `thumb`, `routesign`, `urlroute`, `listtemp`, `lang`) VALUES
(1, 1, 0, 'News', 0, '公司新闻', '', '', '', '', 'n', 'companynews', 'index', 'cn'),
(2, 1, 0, 'News', 0, 'Company news', '', '', '', '', 'n', 'companynews', 'index', 'en'),
(3, 1, 0, 'About', 10, '关于我们', '', '', '', '', 'a', 'guanyuwomen', 'index', 'cn'),
(4, 1, 0, 'About', 10, 'About us', '', '', '', '', 'a', 'aboutus', 'index', 'en'),
(5, 1, 0, 'About', 0, '人才招聘', '', '', '', '', 'a', 'rencaizhaopin', 'job', 'cn'),
(6, 1, 0, 'About', 0, 'Careers', '', '', '', '', 'a', 'careers', 'job', 'en'),
(7, 1, 0, 'News', 0, '常见问题', '', '', '', '', 'n', 'changjianwenti', 'faq', 'cn'),
(8, 1, 0, 'News', 0, 'FAQ', '', '', '', '', 'n', 'faq', 'faq', 'en'),
(9, 1, 0, 'Product', 0, '建站管家_企业站模板', '', '', '', '', 'p', 'jianzhanguanjiaqiyezhanmoban', 'index', 'cn'),
(10, 1, 0, 'Product', 0, '建站管家_系统系列', '', '', '', '', 'p', 'jianzhanguanjiaxitongxilie', 'index', 'cn'),
(11, 1, 0, 'Project', 0, '工程案例', '', '', '', '', 'c', 'gongchenganli', 'index', 'cn'),
(12, 1, 0, 'Down', 0, '技术资料', '', '', '', '', 'd', 'jishuziliao', 'index', 'cn'),
(13, 1, 0, 'Product', 0, 'Software', '', '', '', '', 'p', 'software', 'index', 'en'),
(14, 1, 0, 'Product', 0, 'Template', '', '', '', '', 'p', 'template', 'index', 'en'),
(15, 1, 0, 'Project', 0, 'Engineering project', '', '', '', '', 'c', 'engineeringproject', 'index', 'en'),
(16, 1, 0, 'Product', 0, '一级分类', '', '', '', '', 'p', 'yijifenlei', 'index', 'cn'),
(17, 1, 16, 'Product', 0, '二级分类', '', '', '', '', 'p', 'erjifenlei', 'index', 'cn'),
(18, 1, 17, 'Product', 0, '三级分类', '', '', '', '', 'p', 'sanjifenlei', 'index', 'cn'),
(19, 1, 18, 'Product', 0, '四级分类', '', '', '', '', 'p', 'sijifenlei', 'index', 'cn'),
(20, 1, 0, 'Product', 0, 'SAAS产品系列', '', '', '', '', 'p', 'saaschanpinxilie', 'index', 'cn'),
(21, 1, 0, 'Product', 0, '行业系统系列', '', '', '', '', 'p', 'xingyexitongxilie', 'index', 'cn'),
(22, 1, 0, 'Product', 0, 'SAAS Product', '', '', '', '', 'p', 'saasproduct', 'index', 'en'),
(23, 1, 0, 'Product', 0, 'Industrial System', '', '', '', '', 'p', 'industrialsystem', 'index', 'en'),
(24, 1, 0, 'Product', 0, 'Other product', '', '', '', '', 'p', 'otherproduct', 'index', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_spec`
--

CREATE TABLE IF NOT EXISTS `bmkj_spec` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1上架2下架9已删除，大于9就是删除时间戳',
  `parentid` int(11) unsigned DEFAULT '0' COMMENT '父级ID',
  `tabledir` varchar(20) DEFAULT NULL COMMENT '模块表名',
  `attid` int(11) unsigned DEFAULT NULL COMMENT '属性ID',
  `spec_sign` varchar(30) DEFAULT NULL COMMENT '规格标记，如：color',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `spec_value` varchar(50) DEFAULT NULL COMMENT '规格属性值，如#ff0000',
  `is_required` tinyint(1) DEFAULT '0' COMMENT '是否必须',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `lang` char(30) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品规格' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `bmkj_spec`
--

INSERT INTO `bmkj_spec` (`id`, `signid`, `parentid`, `tabledir`, `attid`, `spec_sign`, `title`, `spec_value`, `is_required`, `sequence`, `lang`) VALUES
(1, 1, 0, 'Product', 1, 'color', '颜色', NULL, 0, 0, 'cn'),
(2, 1, 1, 'Product', 1, 'color', '蓝色', '#100dd4', 0, 0, 'cn'),
(3, 1, 1, 'Product', 1, 'color', '绿色', '#167d05', 0, 0, 'cn'),
(4, 1, 0, 'Product', 1, 'text', '尺寸', NULL, 0, 0, 'cn'),
(5, 1, 4, 'Product', 1, 'text', 'M', '#333333', 0, 0, 'cn'),
(6, 1, 4, 'Product', 1, 'text', 'L', '#333333', 0, 0, 'cn'),
(7, 1, 4, 'Product', 1, 'text', 'S', '#333333', 0, 0, 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `bmkj_user`
--

CREATE TABLE IF NOT EXISTS `bmkj_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `signid` int(10) unsigned DEFAULT '1' COMMENT '1正常9已删除，大于9就是删除时间戳',
  `parentid` int(11) unsigned DEFAULT '0' COMMENT '父级ID',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `qqid` varchar(100) DEFAULT NULL COMMENT 'QQ授权ID',
  `unionid` varchar(100) DEFAULT NULL COMMENT '微信unionid',
  `openid` varchar(100) DEFAULT NULL COMMENT '微信openid',
  `weiboid` varchar(100) DEFAULT NULL COMMENT '新浪微博授权id',
  `username` varchar(30) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(30) DEFAULT NULL COMMENT '昵称',
  `realname` varchar(20) DEFAULT NULL COMMENT '姓名',
  `score` int(10) DEFAULT '0' COMMENT '积分',
  `balance` decimal(10,2) DEFAULT '0.00' COMMENT '余额',
  `cash` decimal(10,2) DEFAULT '0.00' COMMENT '可提现金额',
  `subscribe` tinyint(1) DEFAULT '0' COMMENT '是否关注公众号：1已关注2取消关注0未关注3未知',
  `logintimes` int(10) DEFAULT '1' COMMENT '登录次数',
  `company` varchar(100) DEFAULT NULL COMMENT '公司名称',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `gender` tinyint(1) unsigned DEFAULT '0' COMMENT '性别，1男，2女，0未知',
  `areaid` int(10) DEFAULT '1' COMMENT '地区ID',
  `telephone` varchar(50) DEFAULT NULL COMMENT '电话',
  `wechat` varchar(50) DEFAULT NULL COMMENT '微信号',
  `qq` varchar(20) DEFAULT NULL COMMENT 'QQ号',
  `note` text COMMENT '备注',
  `avatar` varchar(500) DEFAULT NULL COMMENT '头像',
  `ip` varchar(15) DEFAULT NULL COMMENT 'IP地址',
  `question` varchar(100) DEFAULT NULL COMMENT '密保问题',
  `answer` varchar(32) DEFAULT NULL COMMENT '密保答案',
  `identifier` varchar(32) DEFAULT NULL COMMENT '第2身份标识',
  `token` varchar(32) DEFAULT NULL COMMENT '持久登录标识',
  `timeout` int(10) DEFAULT NULL COMMENT '登录超时时间',
  `sequence` int(10) DEFAULT '0' COMMENT '排序',
  `addtime` int(10) DEFAULT NULL COMMENT '添加/注册时间',
  `edittime` int(10) DEFAULT NULL COMMENT '修改时间',
  `lastlogin` int(10) DEFAULT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bmkj_user`
--

INSERT INTO `bmkj_user` (`id`, `signid`, `parentid`, `mobile`, `email`, `qqid`, `unionid`, `openid`, `weiboid`, `username`, `password`, `nickname`, `realname`, `score`, `balance`, `cash`, `subscribe`, `logintimes`, `company`, `birthday`, `gender`, `areaid`, `telephone`, `wechat`, `qq`, `note`, `avatar`, `ip`, `question`, `answer`, `identifier`, `token`, `timeout`, `sequence`, `addtime`, `edittime`, `lastlogin`) VALUES
(1, 1, 0, '', '1062129401@qq.com', NULL, NULL, NULL, NULL, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', '管理员', '管理员', 0, '0.00', '0.00', 0, 28, NULL, '2016-08-02', 1, 1, NULL, '13000000000', '1062129401', '', '/skin/admin/img/avatar.png', NULL, NULL, NULL, '01ba63659b5b43bb0b89f7866c14299a', 'f2ee594ce978218d4e4c3ce251a016b4', 1528774931, 100, 1438877219, NULL, 1528286505);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
