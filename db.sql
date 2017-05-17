-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2017 at 08:37 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `translatorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_akut`
--

CREATE TABLE `app_akut` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `language` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text NOT NULL,
  `answer_subject` varchar(128) DEFAULT NULL,
  `answer_text` text,
  `time` int(11) DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date` varchar(5) NOT NULL,
  `time_start` varchar(5) NOT NULL,
  `time_end` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_akut`
--

INSERT INTO `app_akut` (`feedback_id`, `name`, `language`, `email`, `phone`, `title`, `text`, `answer_subject`, `answer_text`, `time`, `ip`, `status`, `date`, `time_start`, `time_end`) VALUES
  (14, 'Daniel', 'Tyska', 'idrini@gmail.com', '+46736995406', 'JokerPoker', 'aeiiae', NULL, NULL, 1494675107, '::1', 1, '26/6', '16:00', ''),
  (11, 'Daniel', 'Tyska', 'idrini@gmail.com', '', 'JokerPoker', '', NULL, NULL, 1494674749, '::1', 1, '', '', ''),
  (12, 'Daniel', 'Tyska', 'idrini@gmail.com', '', 'JokerPoker', '', NULL, NULL, 1494674774, '::1', 1, '26/6', '16:00', ''),
  (13, 'Daniel', 'Tyska', 'idrini@gmail.com', '', 'JokerPoker', '', NULL, NULL, 1494674870, '::1', 1, '26/6', '16:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `app_job`
--

CREATE TABLE `app_job` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text NOT NULL,
  `answer_subject` varchar(128) DEFAULT NULL,
  `answer_text` text,
  `time` int(11) DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `language` varchar(128) NOT NULL,
  `language2` varchar(128) NOT NULL,
  `language3` varchar(128) NOT NULL,
  `education` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_job`
--

INSERT INTO `app_job` (`feedback_id`, `name`, `email`, `phone`, `title`, `text`, `answer_subject`, `answer_text`, `time`, `ip`, `status`, `language`, `language2`, `language3`, `education`) VALUES
  (1, 'Daniel van den Berg', 'idrini@gmail.com', '0736995406', '3', 'Skriv dittaumeddelande här...', NULL, NULL, 1494969918, '::1', 1, 'Svenska', 'Engelska', 'Polska', 'Ja världens bästa'),
  (4, 'Daniel van den Berg', 'idrini@gmail.com', '0736995406', '3', 'Skriv dittaumeddelande här...', NULL, NULL, 1494970160, '::1', 1, 'Svenska', 'Engelska', 'Polska', 'Ja världens bästa');

-- --------------------------------------------------------

--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemId` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `model`, `itemId`, `hash`, `size`, `type`, `mime`) VALUES
  (0, 'Kvittens 198911158536 _ Inkomstdeklaration 1 2017', 'Orders', 12, '28a5c358c1b074ee532a735d2503e89f', 10756, 'pdf', 'application/pdf'),
  (0, 'en_test_pdf', 'Orders', 15, '5a0f96c622eb9b7ef708a551094c3dd1', 450093, 'pdf', 'application/pdf'),
  (0, 'en_test_pdf', 'Invoice', 1, '50cb4bab0256ddded4058b7548c75b11', 450093, 'pdf', 'application/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
  ('configSite', '1', 1494259161),
  ('customer', '3', 1494262157),
  ('customer', '7', 1494843946),
  ('manager', '1', 1494259160),
  ('manager', '2', 1494259205),
  ('manageSite', '1', 1494259161),
  ('manageSite', '2', 1494278581),
  ('root', '1', 1494259160),
  ('updateOrders', '1', 1494259161),
  ('viewOrders', '1', 1494259161),
  ('viewOrders', '2', 1494278581),
  ('viewOrders', '3', 1494262157);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
  ('configSite', 2, '', NULL, NULL, 1494258945, 1494258945),
  ('customer', 1, 'customers newly registered should have this role', 'Customer', NULL, 1494258482, 1494259093),
  ('manager', 1, 'site owner should have this role', 'Manager', NULL, 1494258407, 1494259119),
  ('manageSite', 2, '', NULL, NULL, 1494258876, 1494258876),
  ('root', 1, 'developer should have this role', 'isRoot', NULL, 1494258316, 1494258759),
  ('updateOrders', 2, '', NULL, NULL, 1494259034, 1494259034),
  ('viewOrders', 2, '', NULL, NULL, 1494258988, 1494258988);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
  ('root', 'customer'),
  ('root', 'manager'),
  ('configSite', 'manageSite'),
  ('manager', 'updateOrders'),
  ('customer', 'viewOrders'),
  ('updateOrders', 'viewOrders');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
  ('Customer', 0x4f3a32353a226170705c636f6d6d616e64735c437573746f6d657252756c65223a333a7b733a343a226e616d65223b733a383a22437573746f6d6572223b733a393a22637265617465644174223b693a313439343235383635383b733a393a22757064617465644174223b693a313439343235383635383b7d, 1494258658, 1494258658),
  ('isRoot', 0x4f3a32313a226170705c636f6d6d616e64735c526f6f7452756c65223a333a7b733a343a226e616d65223b733a363a226973526f6f74223b733a393a22637265617465644174223b693a313439343235383236393b733a393a22757064617465644174223b693a313439343235383236393b7d, 1494258269, 1494258269),
  ('Manager', 0x4f3a32343a226170705c636f6d6d616e64735c4d616e6167657252756c65223a333a7b733a343a226e616d65223b733a373a224d616e61676572223b733a393a22637265617465644174223b693a313439343235383638303b733a393a22757064617465644174223b693a313439343235383638303b7d, 1494258680, 1494258680);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `client_ref` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `org_nr` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` int(8) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Sverige',
  `email` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `extra_1` text NOT NULL,
  `extra_2` text NOT NULL,
  `extra_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `client_ref`, `name`, `org_nr`, `street`, `zip`, `country`, `email`, `phone`, `city`, `extra_1`, `extra_2`, `extra_3`) VALUES
  (1, '#AB1224', 'AdvokatByrå aB', '1351351351351', 'Schlytersvägen 37', 72592, 'Sverige', 'test@test.se', 2147483647, 'Stockholm', 'Extra text', 'Avdelning', '');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_admins`
--

CREATE TABLE `easyii_admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `auth_key` varchar(128) NOT NULL,
  `access_token` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_admins`
--

INSERT INTO `easyii_admins` (`admin_id`, `username`, `password`, `auth_key`, `access_token`) VALUES
  (1, 'admin', 'f95923d0bdc83190934b9f91fd3b7630a078d0f9', 'xHHo-ERjmHqpdWLhHpb0GbtiMPEgfvNm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_article_categories`
--

CREATE TABLE `easyii_article_categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_article_categories`
--

INSERT INTO `easyii_article_categories` (`category_id`, `title`, `image`, `order_num`, `slug`, `tree`, `lft`, `rgt`, `depth`, `status`) VALUES
  (1, 'Articles category 1', NULL, 2, 'articles-category-1', 1, 1, 2, 0, 1),
  (2, 'Articles category 2', NULL, 1, 'articles-category-2', 2, 1, 6, 0, 1),
  (3, 'Subcategory 1', NULL, 1, 'subcategory-1', 2, 2, 3, 1, 1),
  (4, 'Subcategory 1', NULL, 1, 'subcategory-1-2', 2, 4, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_article_items`
--

CREATE TABLE `easyii_article_items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `short` varchar(1024) DEFAULT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_article_items`
--

INSERT INTO `easyii_article_items` (`item_id`, `category_id`, `title`, `image`, `short`, `text`, `slug`, `time`, `views`, `status`) VALUES
  (1, 1, 'First article title', '/uploads/article/article-1.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '<p><strong>Sed ut perspiciatis</strong>, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.&nbsp;</p><ul><li>item 1</li><li>item 2</li><li>item 3</li></ul><p>ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?</p>', 'first-article-title', 1494197608, 0, 1),
  (2, 1, 'Second article title', '/uploads/article/article-2.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><ol> <li>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </li><li>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</li></ol>', 'second-article-title', 1494111208, 0, 1),
  (3, 1, 'Third article title', '/uploads/article/article-3.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'third-article-title', 1494024808, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_carousel`
--

CREATE TABLE `easyii_carousel` (
  `carousel_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_carousel`
--

INSERT INTO `easyii_carousel` (`carousel_id`, `image`, `link`, `title`, `text`, `order_num`, `status`) VALUES
  (1, '/uploads/carousel/1.jpg', '', 'Ut enim ad minim veniam, quis nostrud exercitation', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 1, 1),
  (2, '/uploads/carousel/2.jpg', '', 'Sed do eiusmod tempor incididunt ut labore et', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 2, 1),
  (3, '/uploads/carousel/3.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_catalog_categories`
--

CREATE TABLE `easyii_catalog_categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `fields` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_catalog_categories`
--

INSERT INTO `easyii_catalog_categories` (`category_id`, `title`, `image`, `fields`, `slug`, `tree`, `lft`, `rgt`, `depth`, `order_num`, `status`) VALUES
  (1, 'Gadgets', NULL, '[{\"name\":\"brand\",\"title\":\"Brand\",\"type\":\"select\",\"options\":[\"Samsung\",\"Apple\",\"Nokia\"]},{\"name\":\"storage\",\"title\":\"Storage\",\"type\":\"string\",\"options\":\"\"},{\"name\":\"touchscreen\",\"title\":\"Touchscreen\",\"type\":\"boolean\",\"options\":\"\"},{\"name\":\"cpu\",\"title\":\"CPU cores\",\"type\":\"select\",\"options\":[\"1\",\"2\",\"4\",\"8\"]},{\"name\":\"features\",\"title\":\"Features\",\"type\":\"checkbox\",\"options\":[\"Wi-fi\",\"4G\",\"GPS\"]},{\"name\":\"color\",\"title\":\"Color\",\"type\":\"checkbox\",\"options\":[\"White\",\"Black\",\"Red\",\"Blue\"]}]', 'gadgets', 1, 1, 6, 0, NULL, 1),
  (2, 'Smartphones', NULL, '[{\"name\":\"brand\",\"title\":\"Brand\",\"type\":\"select\",\"options\":[\"Samsung\",\"Apple\",\"Nokia\"]},{\"name\":\"storage\",\"title\":\"Storage\",\"type\":\"string\",\"options\":\"\"},{\"name\":\"touchscreen\",\"title\":\"Touchscreen\",\"type\":\"boolean\",\"options\":\"\"},{\"name\":\"cpu\",\"title\":\"CPU cores\",\"type\":\"select\",\"options\":[\"1\",\"2\",\"4\",\"8\"]},{\"name\":\"features\",\"title\":\"Features\",\"type\":\"checkbox\",\"options\":[\"Wi-fi\",\"4G\",\"GPS\"]},{\"name\":\"color\",\"title\":\"Color\",\"type\":\"checkbox\",\"options\":[\"White\",\"Black\",\"Red\",\"Blue\"]}]', 'smartphones', 1, 2, 3, 1, NULL, 1),
  (3, 'Tablets', NULL, '[{\"name\":\"brand\",\"title\":\"Brand\",\"type\":\"select\",\"options\":[\"Samsung\",\"Apple\",\"Nokia\"]},{\"name\":\"storage\",\"title\":\"Storage\",\"type\":\"string\",\"options\":\"\"},{\"name\":\"touchscreen\",\"title\":\"Touchscreen\",\"type\":\"boolean\",\"options\":\"\"},{\"name\":\"cpu\",\"title\":\"CPU cores\",\"type\":\"select\",\"options\":[\"1\",\"2\",\"4\",\"8\"]},{\"name\":\"features\",\"title\":\"Features\",\"type\":\"checkbox\",\"options\":[\"Wi-fi\",\"4G\",\"GPS\"]},{\"name\":\"color\",\"title\":\"Color\",\"type\":\"checkbox\",\"options\":[\"White\",\"Black\",\"Red\",\"Blue\"]}]', 'tablets', 1, 4, 5, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_catalog_items`
--

CREATE TABLE `easyii_catalog_items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `description` text,
  `available` int(11) DEFAULT '1',
  `price` float DEFAULT '0',
  `discount` int(11) DEFAULT '0',
  `data` text NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_catalog_items`
--

INSERT INTO `easyii_catalog_items` (`item_id`, `category_id`, `title`, `description`, `available`, `price`, `discount`, `data`, `image`, `slug`, `time`, `status`) VALUES
  (1, 2, 'Nokia 3310', '<h3>The legend</h3><p>The Nokia 3310 is a GSMmobile phone announced on September 1, 2000, and released in the fourth quarter of the year, replacing the popular Nokia 3210. The phone sold extremely well, being one of the most successful phones with 126 million units sold worldwide.&nbsp;The phone has since received a cult status and is still widely acclaimed today.</p><p>The 3310 was developed at the Copenhagen Nokia site in Denmark. It is a compact and sturdy phone featuring an 84 × 48 pixel pure monochrome display. It has a lighter 115 g battery variant which has fewer features; for example the 133 g battery version has the start-up image of two hands touching while the 115 g version does not. It is a slightly rounded rectangular unit that is typically held in the palm of a hand, with the buttons operated with the thumb. The blue button is the main button for selecting options, with \"C\" button as a \"back\" or \"undo\" button. Up and down buttons are used for navigation purposes. The on/off/profile button is a stiff black button located on the top of the phone.</p>', 5, 100, 0, '{\"brand\":\"Nokia\",\"storage\":\"1\",\"touchscreen\":\"0\",\"cpu\":1,\"color\":[\"White\",\"Red\",\"Blue\"]}', '/uploads/catalog/3310.jpg', 'nokia-3310', 1494197607, 1),
  (2, 2, 'Galaxy S6', '<h3>Next is beautifully crafted</h3><p>With their slim, seamless, full metal and glass construction, the sleek, ultra thin edged Galaxy S6 and unique, dual curved Galaxy S6 edge are crafted from the finest materials.</p><p>And while they may be the thinnest smartphones we`ve ever created, when it comes to cutting-edge technology and flagship Galaxy experience, these 5.1\" QHD Super AMOLED smartphones are certainly no lightweights.</p>', 1, 1000, 10, '{\"brand\":\"Samsung\",\"storage\":\"32\",\"touchscreen\":\"1\",\"cpu\":8,\"features\":[\"Wi-fi\",\"GPS\"]}', '/uploads/catalog/galaxy.jpg', 'galaxy-s6', 1494111207, 1),
  (3, 2, 'Iphone 6', '<h3>Next is beautifully crafted</h3><p>With their slim, seamless, full metal and glass construction, the sleek, ultra thin edged Galaxy S6 and unique, dual curved Galaxy S6 edge are crafted from the finest materials.</p><p>And while they may be the thinnest smartphones we`ve ever created, when it comes to cutting-edge technology and flagship Galaxy experience, these 5.1\" QHD Super AMOLED smartphones are certainly no lightweights.</p>', 0, 1100, 10, '{\"brand\":\"Apple\",\"storage\":\"64\",\"touchscreen\":\"1\",\"cpu\":4,\"features\":[\"Wi-fi\",\"4G\",\"GPS\"]}', '/uploads/catalog/iphone.jpg', 'iphone-6', 1494024807, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_catalog_item_data`
--

CREATE TABLE `easyii_catalog_item_data` (
  `data_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `value` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_catalog_item_data`
--

INSERT INTO `easyii_catalog_item_data` (`data_id`, `item_id`, `name`, `value`) VALUES
  (1, 1, 'brand', 'Nokia'),
  (2, 1, 'storage', '1'),
  (3, 1, 'touchscreen', '0'),
  (4, 1, 'cpu', '1'),
  (5, 1, 'color', 'White'),
  (6, 1, 'color', 'Red'),
  (7, 1, 'color', 'Blue'),
  (8, 2, 'brand', 'Samsung'),
  (9, 2, 'storage', '32'),
  (10, 2, 'touchscreen', '1'),
  (11, 2, 'cpu', '8'),
  (12, 2, 'features', 'Wi-fi'),
  (13, 2, 'features', 'GPS'),
  (14, 3, 'brand', 'Apple'),
  (15, 3, 'storage', '64'),
  (16, 3, 'touchscreen', '1'),
  (17, 3, 'cpu', '4'),
  (18, 3, 'features', 'Wi-fi'),
  (19, 3, 'features', '4G'),
  (20, 3, 'features', 'GPS');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_faq`
--

CREATE TABLE `easyii_faq` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_faq`
--

INSERT INTO `easyii_faq` (`faq_id`, `question`, `answer`, `order_num`, `status`) VALUES
  (1, 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?', 'But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure', 1, 1),
  (2, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum?', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta <a href=\"http://easyiicms.com/\">sunt explicabo</a>.', 2, 1),
  (3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 't enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_feedback`
--

CREATE TABLE `easyii_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text NOT NULL,
  `answer_subject` varchar(128) DEFAULT NULL,
  `answer_text` text,
  `time` int(11) DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_feedback`
--

INSERT INTO `easyii_feedback` (`feedback_id`, `name`, `email`, `phone`, `title`, `text`, `answer_subject`, `answer_text`, `time`, `ip`, `status`) VALUES
  (4, 'Daniel van den Berg', 'idrini@gmail.com', '0736995406', '', 'aiaeia', NULL, NULL, 1494940517, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_files`
--

CREATE TABLE `easyii_files` (
  `file_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `downloads` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0',
  `order_num` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_files`
--

INSERT INTO `easyii_files` (`file_id`, `title`, `file`, `size`, `slug`, `downloads`, `time`, `order_num`) VALUES
  (1, 'Price list', '/uploads/files/example.csv', 104, 'price-list', 0, 1494197613, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_gallery_categories`
--

CREATE TABLE `easyii_gallery_categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_gallery_categories`
--

INSERT INTO `easyii_gallery_categories` (`category_id`, `title`, `image`, `slug`, `tree`, `lft`, `rgt`, `depth`, `order_num`, `status`) VALUES
  (1, 'Album 1', '/uploads/gallery/album-1.jpg', 'album-1', 1, 1, 2, 0, 2, 1),
  (2, 'Album 2', '/uploads/gallery/album-2.jpg', 'album-2', 2, 1, 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_guestbook`
--

CREATE TABLE `easyii_guestbook` (
  `guestbook_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text NOT NULL,
  `answer` text,
  `email` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `new` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_guestbook`
--

INSERT INTO `easyii_guestbook` (`guestbook_id`, `name`, `title`, `text`, `answer`, `email`, `time`, `ip`, `new`, `status`) VALUES
  (1, 'First user', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', NULL, NULL, 1494197608, '127.0.0.1', 1, 1),
  (2, 'Second user', '', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', NULL, 1494197610, '127.0.0.1', 0, 1),
  (3, 'Third user', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, NULL, 1494197612, '127.0.0.1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_loginform`
--

CREATE TABLE `easyii_loginform` (
  `log_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `user_agent` varchar(1024) NOT NULL,
  `time` int(11) DEFAULT '0',
  `success` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_loginform`
--

INSERT INTO `easyii_loginform` (`log_id`, `username`, `password`, `ip`, `user_agent`, `time`, `success`) VALUES
  (1, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494197606, 1),
  (2, 'admin', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494198517, 0),
  (3, 'admin', 'transladmin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494198525, 0),
  (4, 'admin', 'transladmin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494198536, 0),
  (5, 'admin', 'transladmin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494198548, 0),
  (6, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494198678, 1),
  (7, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494198965, 1),
  (8, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494236954, 1),
  (9, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494238300, 1),
  (10, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494242914, 1),
  (11, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494248304, 1),
  (12, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494248352, 1),
  (13, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36', 1494248449, 1),
  (14, 'admin', '******', '::1', 'Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:53.0) Gecko/20100101 Firefox/53.0', 1494248876, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_migration`
--

CREATE TABLE `easyii_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_migration`
--

INSERT INTO `easyii_migration` (`version`, `apply_time`) VALUES
  ('m000000_000000_base', 1494197602),
  ('m000000_000000_install', 1494197605);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_modules`
--

CREATE TABLE `easyii_modules` (
  `module_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `class` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `icon` varchar(32) NOT NULL,
  `settings` text NOT NULL,
  `notice` int(11) DEFAULT '0',
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_modules`
--

INSERT INTO `easyii_modules` (`module_id`, `name`, `class`, `title`, `icon`, `settings`, `notice`, `order_num`, `status`) VALUES
  (1, 'article', 'yii\\easyii\\modules\\article\\ArticleModule', 'Articles', 'pencil', '{\"categoryThumb\":true,\"articleThumb\":true,\"enablePhotos\":true,\"enableShort\":true,\"shortMaxLength\":255,\"enableTags\":true,\"itemsInFolder\":false}', 0, 65, 0),
  (2, 'carousel', 'yii\\easyii\\modules\\carousel\\CarouselModule', 'Carousel', 'picture', '{\"enableTitle\":true,\"enableText\":true}', 0, 40, 0),
  (3, 'catalog', 'yii\\easyii\\modules\\catalog\\CatalogModule', 'Catalog', 'list-alt', '{\"categoryThumb\":true,\"itemsInFolder\":false,\"itemThumb\":true,\"itemPhotos\":true,\"itemDescription\":true,\"itemSale\":true}', 0, 90, 0),
  (4, 'faq', 'yii\\easyii\\modules\\faq\\FaqModule', 'FAQ', 'question-sign', '[]', 0, 45, 0),
  (5, 'feedback', 'yii\\easyii\\modules\\feedback\\FeedbackModule', 'Jobb sök', 'folder-close', '{\"mailAdminOnNewFeedback\":true,\"subjectOnNewFeedback\":\"Nytt inl\\u00e4gg i \\\"S\\u00f6ker du jobb?\\\"\",\"templateOnNewFeedback\":\"@app\\/views\\/job\\/sv\\/new_feedback\",\"answerTemplate\":\"@app\\/views\\/job\\/sv\\/answer\",\"answerSubject\":\"Svar fr\\u00e5n Translator\",\"answerHeader\":\"Hej!\",\"answerFooter\":\"V\\u00e4nliga h\\u00e4lsningar,\",\"enableTitle\":true,\"enablePhone\":true,\"enableCaptcha\":false}', 0, 60, 0),
  (6, 'file', 'yii\\easyii\\modules\\file\\FileModule', 'Files', 'floppy-disk', '[]', 0, 30, 0),
  (7, 'gallery', 'yii\\easyii\\modules\\gallery\\GalleryModule', 'Photo Gallery', 'camera', '{\"categoryThumb\":true,\"itemsInFolder\":false}', 0, 80, 0),
  (8, 'guestbook', 'yii\\easyii\\modules\\guestbook\\GuestbookModule', 'Guestbook', 'book', '{\"enableTitle\":false,\"enableEmail\":true,\"preModerate\":false,\"enableCaptcha\":false,\"mailAdminOnNewPost\":true,\"subjectOnNewPost\":\"New message in the guestbook.\",\"templateOnNewPost\":\"@easyii\\/modules\\/guestbook\\/mail\\/en\\/new_post\",\"frontendGuestbookRoute\":\"\\/guestbook\",\"subjectNotifyUser\":\"Your post in the guestbook answered\",\"templateNotifyUser\":\"@easyii\\/modules\\/guestbook\\/mail\\/en\\/notify_user\"}', 2, 120, 0),
  (9, 'news', 'yii\\easyii\\modules\\news\\NewsModule', 'News', 'bullhorn', '{\"enableThumb\":true,\"enablePhotos\":true,\"enableShort\":true,\"shortMaxLength\":256,\"enableTags\":true}', 0, 70, 0),
  (10, 'page', 'yii\\easyii\\modules\\page\\PageModule', 'Pages', 'file', '[]', 0, 50, 0),
  (11, 'shopcart', 'yii\\easyii\\modules\\shopcart\\ShopcartModule', 'Orders', 'shopping-cart', '{\"mailAdminOnNewOrder\":true,\"subjectOnNewOrder\":\"New order\",\"templateOnNewOrder\":\"@easyii\\/modules\\/shopcart\\/mail\\/en\\/new_order\",\"subjectNotifyUser\":\"Your order status changed\",\"templateNotifyUser\":\"@easyii\\/modules\\/shopcart\\/mail\\/en\\/notify_user\",\"frontendShopcartRoute\":\"\\/shopcart\\/order\",\"enablePhone\":true,\"enableEmail\":true}', 0, 100, 0),
  (12, 'subscribe', 'yii\\easyii\\modules\\subscribe\\SubscribeModule', 'E-mail subscribe', 'envelope', '[]', 0, 10, 0),
  (13, 'text', 'yii\\easyii\\modules\\text\\TextModule', 'Text blocks', 'font', '[]', 0, 20, 1),
  (14, 'user', 'developeruz\\easyii_user\\UserModule', 'Users', 'user', '[]', 0, 100, 1),
  (15, 'sida', 'app\\modules\\Sida\\SidaModule', 'Sidor', 'file', '[]', 0, 121, 1),
  (16, 'akut', 'app\\modules\\akut\\AkutModule', 'Förfrågningar', 'flash', '{\"mailAdminOnNewFeedback\":true,\"subjectOnNewFeedback\":\"Ny f\\u00f6rfr\\u00e5gan\",\"templateOnNewFeedback\":\"@app\\/modules\\/akut\\/mail\\/sv\\/new_feedback\",\"answerTemplate\":\"@app\\/modules\\/akut\\/mail\\/sv\\/answer\",\"answerSubject\":\"Svar p\\u00e5 din akuta bokningsf\\u00f6rfr\\u00e5gan\",\"answerHeader\":\"Hej,\",\"answerFooter\":\"V\\u00e4nliga h\\u00e4lsningar,\",\"enableTitle\":true,\"enablePhone\":true,\"enableCaptcha\":false}', 0, 122, 1),
  (17, 'job', 'app\\modules\\job\\JobModule', 'Jobb', 'folder-close', '{\"mailAdminOnNewFeedback\":true,\"subjectOnNewFeedback\":\"Nytt inl\\u00e4gg i \\\"S\\u00f6ker du jobb?\\\"\",\"templateOnNewFeedback\":\"@app\\/modules\\/job\\/mail\\/sv\\/new_feedback\",\"answerTemplate\":\"@app\\/modules\\/job\\/\\/mail\\/sv\\/answer\",\"answerSubject\":\"Svar fr\\u00e5n Translator\",\"answerHeader\":\"Hej!\",\"answerFooter\":\"V\\u00e4nliga h\\u00e4lsningar,\",\"enableTitle\":true,\"enablePhone\":true,\"enableCaptcha\":false}', 0, 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_news`
--

CREATE TABLE `easyii_news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `short` varchar(1024) DEFAULT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_news`
--

INSERT INTO `easyii_news` (`news_id`, `title`, `image`, `short`, `text`, `slug`, `time`, `views`, `status`) VALUES
  (1, 'First news title', '/uploads/news/news-1.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '<p><strong>Sed ut perspiciatis</strong>, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.&nbsp;</p><ul><li>item 1</li><li>item 2</li><li>item 3</li></ul><p>ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?</p>', 'first-news-title', 1494197607, 0, 1),
  (2, 'Second news title', '/uploads/news/news-2.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><ol> <li>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </li><li>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</li></ol>', 'second-news-title', 1494111207, 0, 1),
  (3, 'Third news title', '/uploads/news/news-3.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'third-news-title', 1494024807, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_pages`
--

CREATE TABLE `easyii_pages` (
  `page_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_pages`
--

INSERT INTO `easyii_pages` (`page_id`, `title`, `text`, `slug`) VALUES
  (1, 'Tolkförmedlingen som specialiserat sig för tolkuppdrag hos jurister och advokater', '<p><strong>Translatorn i Väst AB</strong> har sedan starten 2016 riktat sig främst mot jurist- och advokatbyråer. Vi är väldigt måna om att våra tolkar skall ha grundläggande kunskaper inom asyl-, migrations- och utlänningsrätt. Vi fortbildar våra tolkar kontinuerligt inom dessa områden. Vi håller&nbsp;i egna fortbildningar som fokuserar på våra kunders önskemål. </p><p>Andra kunder som efterfrågar våra tjänster befinner sig inom det kommunala och på olika vårdinrättningar.&nbsp;</p>', 'page-index'),
  (13, 'Akut tolk', '<h2>BEHÖVER DU BOKA EN TOLK AKUT?</h2>', 'page-akut'),
  (2, 'Shop', '', 'page-shop'),
  (3, 'Shop search', '', 'page-shop-search'),
  (4, 'Shopping cart', '', 'page-shopcart'),
  (5, 'Order created', '<p>Your order successfully created. Our manager will contact you as soon as possible.</p>', 'page-shopcart-success'),
  (6, 'News', '', 'page-news'),
  (7, 'Articles', '', 'page-articles'),
  (8, 'Gallery', '', 'page-gallery'),
  (9, 'Guestbook', '', 'page-guestbook'),
  (10, 'FAQ', '', 'page-faq'),
  (11, 'Contact', '<p><strong>Address</strong>: Dominican republic, Santo Domingo, Some street 123</p><p><strong>ZIP</strong>: 123456</p><p><strong>Phone</strong>: +1 234 56-78</p><p><strong>E-mail</strong>: demo@example.com</p>', 'page-contact');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_photos`
--

CREATE TABLE `easyii_photos` (
  `photo_id` int(11) NOT NULL,
  `class` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `order_num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_photos`
--

INSERT INTO `easyii_photos` (`photo_id`, `class`, `item_id`, `image`, `description`, `order_num`) VALUES
  (1, 'yii\\easyii\\modules\\catalog\\models\\Item', 1, '/uploads/photos/3310-1.jpg', '', 1),
  (2, 'yii\\easyii\\modules\\catalog\\models\\Item', 1, '/uploads/photos/3310-2.jpg', '', 2),
  (3, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-1.jpg', '', 3),
  (4, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-2.jpg', '', 4),
  (5, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-3.jpg', '', 5),
  (6, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-4.jpg', '', 6),
  (7, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-1.jpg', '', 7),
  (8, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-2.jpg', '', 8),
  (9, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-3.jpg', '', 9),
  (10, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-4.jpg', '', 10),
  (11, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-1.jpg', '', 11),
  (12, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-2.jpg', '', 12),
  (13, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-3.jpg', '', 13),
  (14, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-4.jpg', '', 14),
  (15, 'yii\\easyii\\modules\\article\\models\\Item', 1, '/uploads/photos/article-1-1.jpg', '', 15),
  (16, 'yii\\easyii\\modules\\article\\models\\Item', 1, '/uploads/photos/article-1-2.jpg', '', 16),
  (17, 'yii\\easyii\\modules\\article\\models\\Item', 1, '/uploads/photos/article-1-3.jpg', '', 17),
  (18, 'yii\\easyii\\modules\\article\\models\\Item', 1, '/uploads/photos/news-1-4.jpg', '', 18),
  (19, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-9.jpg', '', 19),
  (20, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-8.jpg', '', 20),
  (21, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-7.jpg', '', 21),
  (22, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-6.jpg', '', 22),
  (23, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-5.jpg', '', 23),
  (24, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-4.jpg', '', 24),
  (25, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-3.jpg', '', 25),
  (26, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-2.jpg', '', 26),
  (27, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-1.jpg', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_seotext`
--

CREATE TABLE `easyii_seotext` (
  `seotext_id` int(11) NOT NULL,
  `class` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL,
  `h1` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_seotext`
--

INSERT INTO `easyii_seotext` (`seotext_id`, `class`, `item_id`, `h1`, `title`, `keywords`, `description`) VALUES
  (1, 'yii\\easyii\\modules\\page\\models\\Page', 1, '', 'BOKA TOLK', '', 'tolk, boka,översättning'),
  (2, 'yii\\easyii\\modules\\page\\models\\Page', 2, 'Shop categories', 'Extended shop title', '', ''),
  (3, 'yii\\easyii\\modules\\page\\models\\Page', 3, 'Shop search results', 'Extended shop search title', '', ''),
  (4, 'yii\\easyii\\modules\\page\\models\\Page', 4, 'Shopping cart H1', 'Extended shopping cart title', '', ''),
  (5, 'yii\\easyii\\modules\\page\\models\\Page', 5, 'Success', 'Extended order success title', '', ''),
  (6, 'yii\\easyii\\modules\\page\\models\\Page', 6, 'News H1', 'Extended news title', '', ''),
  (7, 'yii\\easyii\\modules\\page\\models\\Page', 7, 'Articles H1', 'Extended articles title', '', ''),
  (8, 'yii\\easyii\\modules\\page\\models\\Page', 8, 'Photo gallery', 'Extended gallery title', '', ''),
  (9, 'yii\\easyii\\modules\\page\\models\\Page', 9, 'Guestbook H1', 'Extended guestbook title', '', ''),
  (10, 'yii\\easyii\\modules\\page\\models\\Page', 10, 'Frequently Asked Question', 'Extended faq title', '', ''),
  (11, 'yii\\easyii\\modules\\page\\models\\Page', 11, 'Contact us', 'Extended contact title', '', ''),
  (12, 'yii\\easyii\\modules\\catalog\\models\\Category', 2, 'Smartphones H1', 'Extended smartphones title', '', ''),
  (13, 'yii\\easyii\\modules\\catalog\\models\\Category', 3, 'Tablets H1', 'Extended tablets title', '', ''),
  (14, 'yii\\easyii\\modules\\catalog\\models\\Item', 1, 'Nokia 3310', '', '', ''),
  (15, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, 'Samsung Galaxy S6', '', '', ''),
  (16, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, 'Apple Iphone 6', '', '', ''),
  (17, 'yii\\easyii\\modules\\news\\models\\News', 1, 'First news H1', '', '', ''),
  (18, 'yii\\easyii\\modules\\news\\models\\News', 2, 'Second news H1', '', '', ''),
  (19, 'yii\\easyii\\modules\\news\\models\\News', 3, 'Third news H1', '', '', ''),
  (20, 'yii\\easyii\\modules\\article\\models\\Category', 1, 'Articles category 1 H1', 'Extended category 1 title', '', ''),
  (21, 'yii\\easyii\\modules\\article\\models\\Category', 3, 'Subcategory 1 H1', 'Extended subcategory 1 title', '', ''),
  (22, 'yii\\easyii\\modules\\article\\models\\Category', 4, 'Subcategory 2 H1', 'Extended subcategory 2 title', '', ''),
  (23, 'yii\\easyii\\modules\\article\\models\\Item', 1, 'First article H1', '', '', ''),
  (24, 'yii\\easyii\\modules\\article\\models\\Item', 2, 'Second article H1', '', '', ''),
  (25, 'yii\\easyii\\modules\\article\\models\\Item', 3, 'Third article H1', '', '', ''),
  (26, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, 'Album 1 H1', 'Extended Album 1 title', '', ''),
  (27, 'yii\\easyii\\modules\\gallery\\models\\Category', 2, 'Album 2 H1', 'Extended Album 2 title', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_settings`
--

CREATE TABLE `easyii_settings` (
  `setting_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `value` varchar(1024) NOT NULL,
  `visibility` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_settings`
--

INSERT INTO `easyii_settings` (`setting_id`, `name`, `title`, `value`, `visibility`) VALUES
  (1, 'easyii_version', 'EasyiiCMS version', '0.9', 0),
  (2, 'recaptcha_key', 'ReCaptcha key', '6LdOYvESAAAAAKb_Xcwy86UoSs6XDe0Qj4D9NdV3', 1),
  (3, 'password_salt', 'Password salt', 'JAyJ1dwy8uX-ccc2XO6Cb4tJevendov7', 0),
  (4, 'root_auth_key', 'Root authorization key', '_m0xWQw8BKjhs5eikk5vlLt6a1bLUEfw', 0),
  (5, 'root_password', 'Root password', 'fb3b3cad57ad95fe69ab2e282abec9e4b286c420', 1),
  (6, 'auth_time', 'Auth time', '86400', 1),
  (7, 'robot_email', 'Robot E-mail', 'idrini@gmail.com', 1),
  (8, 'admin_email', 'Admin E-mail', 'idrini@gmail.com', 2),
  (9, 'recaptcha_secret', 'ReCaptcha secret', '6LdOYvESAAAAAAsO6Dlf1C2LpYERG5jxa8dKp1My', 1),
  (10, 'toolbar_position', 'Frontend toolbar position (\"top\" or \"bottom\")', 'top', 1),
  (11, 'BookingRefCounter', 'Initialt värde', '184', 2);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_shopcart_goods`
--

CREATE TABLE `easyii_shopcart_goods` (
  `good_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `options` varchar(255) NOT NULL,
  `price` float DEFAULT '0',
  `discount` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_shopcart_orders`
--

CREATE TABLE `easyii_shopcart_orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `remark` varchar(1024) NOT NULL,
  `access_token` varchar(32) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` int(11) DEFAULT '0',
  `new` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_subscribe_history`
--

CREATE TABLE `easyii_subscribe_history` (
  `history_id` int(11) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `sent` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_subscribe_subscribers`
--

CREATE TABLE `easyii_subscribe_subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_tags`
--

CREATE TABLE `easyii_tags` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `frequency` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_tags`
--

INSERT INTO `easyii_tags` (`tag_id`, `name`, `frequency`) VALUES
  (1, 'php', 2),
  (2, 'yii2', 3),
  (3, 'jquery', 3),
  (4, 'html', 1),
  (5, 'css', 1),
  (6, 'bootstrap', 1),
  (7, 'ajax', 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_tags_assign`
--

CREATE TABLE `easyii_tags_assign` (
  `class` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_tags_assign`
--

INSERT INTO `easyii_tags_assign` (`class`, `item_id`, `tag_id`) VALUES
  ('yii\\easyii\\modules\\news\\models\\News', 1, 1),
  ('yii\\easyii\\modules\\news\\models\\News', 1, 2),
  ('yii\\easyii\\modules\\news\\models\\News', 1, 3),
  ('yii\\easyii\\modules\\news\\models\\News', 2, 2),
  ('yii\\easyii\\modules\\news\\models\\News', 2, 3),
  ('yii\\easyii\\modules\\news\\models\\News', 2, 4),
  ('yii\\easyii\\modules\\article\\models\\Item', 1, 1),
  ('yii\\easyii\\modules\\article\\models\\Item', 1, 5),
  ('yii\\easyii\\modules\\article\\models\\Item', 1, 6),
  ('yii\\easyii\\modules\\article\\models\\Item', 2, 2),
  ('yii\\easyii\\modules\\article\\models\\Item', 2, 3),
  ('yii\\easyii\\modules\\article\\models\\Item', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_texts`
--

CREATE TABLE `easyii_texts` (
  `text_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_texts`
--

INSERT INTO `easyii_texts` (`text_id`, `text`, `slug`) VALUES
  (1, 'Vår målsättning', 'index-welcome-title'),
  (2, 'VI TILLHANDHÅLLER TOLKTJÄNSTER UNDER DYGNETS ALLA TIMMAR', 'index-content-footer'),
  (3, 'ELLER RING', 'index-side-title'),
  (4, 'tabort denna ruta', 'index-side-desc'),
  (5, 'BEHÖVER DU BOKA EN TOLK AKUT?', 'akut-welcome-title'),
  (8, 'Vi samarbetar med över 110 tolkar. \r\n \r\nSkicka en förfrågan till oss så gör vi vårt bästa för att hitta en tolk så fort som möjligt. Du får svar inom 30 min.', 'akut-welcome-desc'),
  (9, '010 - 12 95 100', 'layout-top-phone'),
  (10, 'TRANSLATORN', 'layout-top-name'),
  (12, 'Translatorn i väst levererar skräddarsydda språktjänster till företag och myndigheter dygnet runt. Efter starten 2016 har det gått fort med en stabilt ökning av efterfrågan på våra tjänster till jurister & advokater, sjukhus, myndigheter och kommunala skolor. Bolaget startades av duktiga tolkar som själva tar sig an uppdrag.', 'index-about-text'),
  (13, 'OM OSS', 'index-about-title'),
  (16, 'Translatorn i väst AB', 'index-contact-name'),
  (17, 'Torggatan 13, 41105', 'index-contact-streetzip'),
  (15, 'KONTAKT', 'index-contact-title'),
  (18, 'Göteborg', 'index-contact-city'),
  (19, 'Växeltelefon: 0101-295100', 'index-contact-phone'),
  (20, 'Mobil: 0707803994', 'index-contact-mobile'),
  (21, 'Vi för en ständig strävan att göra det enklare för våra kunder. I dagsläget erbjuder vi våra tjänster endast åt befintliga kunder i vårt kundregister.', 'orders-welcome-text'),
  (22, 'ENKELT FÖR BEFINTLIGA KUNDER', 'orders-welcome-title'),
  (23, 'Kommande kostnadsräkningar', 'orders-side-title'),
  (24, 'Du kan alltid ringa oss', 'orders-side-desc'),
  (25, 'Profil', 'profile-welcome-title'),
  (26, 'Information/kontakt', 'profile-welcome-desc'),
  (27, 'Dina bokningar', 'profile-content-title'),
  (28, 'subtext(redigerbar)', 'profile-content-desc'),
  (29, 'Rubrik till formuläret', 'akut-form-title'),
  (30, 'Intresseanmälan', 'job-form-title'),
  (31, 'Translatorn i Väst växer', 'job-welcome-title'),
  (32, 'Vi söker ständigt nya tolkar att samarbeta med. Om du har erfarenhet av att arbeta som tolk och vill ha fler uppdrag, tveka inte att göra en intresseanmälan.', 'job-welcome-desc'),
  (33, 'Att uppnå 100% i kundnöjdhet\r\n\r\nAtt göra det så enkelt som möjligt för våra kunder', 'index-welcome-desc');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL COMMENT 'Invoice',
  `date` datetime NOT NULL COMMENT 'Applies to',
  `company_id` int(11) NOT NULL COMMENT 'Company',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `file`, `date`, `company_id`, `status`) VALUES
  (1, '', '2017-09-05 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
  ('m000000_000000_base', 1494251423),
  ('m140209_132017_init', 1494251447),
  ('m140403_174025_create_account_table', 1494251448),
  ('m140504_113157_update_tables', 1494251451),
  ('m140504_130429_create_token_table', 1494251452),
  ('m140506_102106_rbac_init', 1494257111),
  ('m140830_171933_fix_ip_field', 1494251453),
  ('m140830_172703_change_account_table_name', 1494251453),
  ('m141222_110026_update_ip_field', 1494251454),
  ('m141222_135246_alter_username_length', 1494251454),
  ('m150614_103145_update_social_account_table', 1494251456),
  ('m150623_212711_fix_username_notnull', 1494251456),
  ('m151218_234654_add_timezone_to_profile', 1494251457),
  ('m160929_103127_add_last_login_at_to_user_table', 1494251457),
  ('m170202_073527_insert_user_module_to_easy_cms', 1494251534),
  ('m170510_214036_add_new_field_to_user', 1494452546),
  ('m170511_100714_add_new_field_to_user', 1494497306);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'id',
  `reference` varchar(255) NOT NULL COMMENT 'Contact person',
  `language` varchar(55) NOT NULL COMMENT 'Language',
  `location` varchar(55) NOT NULL COMMENT 'Location',
  `bill_sent` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Bill sent',
  `bill_paid` tinyint(1) DEFAULT '0' COMMENT 'Bill paid',
  `bill_sent_date` int(11) DEFAULT NULL COMMENT 'Bill was sent',
  `bill_paid_date` int(11) DEFAULT NULL COMMENT 'Bill was paid',
  `created_date` int(11) NOT NULL COMMENT 'Order created',
  `user_id` int(11) NOT NULL COMMENT 'Order belongs too',
  `type` int(5) NOT NULL,
  `date` varchar(5) NOT NULL,
  `made_by` varchar(255) NOT NULL,
  `bill_ref` varchar(255) NOT NULL,
  `other_type` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `org_nr` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `made_by_email` varchar(255) NOT NULL,
  `bill_location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference`, `language`, `location`, `bill_sent`, `bill_paid`, `bill_sent_date`, `bill_paid_date`, `created_date`, `user_id`, `type`, `date`, `made_by`, `bill_ref`, `other_type`, `phone`, `org_nr`, `message`, `made_by_email`, `bill_location`, `email`, `company_name`, `time_start`, `time_end`) VALUES
  (15, '', 'Arabiska', '', 1, NULL, 2147483647, NULL, 2147483647, 3, 1, '20/6', 'Johan', '287 30/5 Arabiska', '', '0736995406', '1989', 'Lite bättre text', 'idrini@gmail.com', 'Banken', 'idrini@gmail.com', 'AdvokatByrå AB', '00:00:00', '00:00:00'),
  (16, '', 'Tyska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '2/11', 'Robert', '912 1/6 Tyska', '', '0736995406', '1989', 'aeuaeu', 'idrini@gmail.com', 'Banken', 'idrini@gmail.com', 'AdvokatByrå AB', '17:00:00', '19:00:00'),
  (31, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '25/05', 'Customer', '921 25/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '18:35:00', '20:35:00'),
  (32, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '189 17/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '20:35:00', '20:35:00'),
  (33, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '737 17/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '20:35:00', '20:35:00'),
  (34, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '148 17/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '20:35:00', '20:35:00'),
  (35, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '758 17/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '20:35:00', '20:35:00'),
  (36, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '04/06', 'Customer', '829 04/06 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '20:40:00', '20:40:00'),
  (37, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '18/05', 'Customer', '941 18/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '21:05:00', '21:05:00'),
  (38, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 2, '27/04', 'Customer', '594 27/04 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '21:05:00', '21:05:00'),
  (39, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '05/05', 'Customer', '595 05/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '21:10:00', '21:10:00'),
  (40, '', 'polska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '27/04', 'Customer', '634 27/04 polska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '21:25:00', '21:25:00'),
  (41, '', 'Tyska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '27/04', 'Customer', '287 27/04 Tyska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '23:15:00', '23:15:00'),
  (43, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '03/06', 'Customer', '498 03/06 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '23:15:00', '23:15:00'),
  (47, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '19/05', 'Customer', '231 19/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:00:00', '16:00:00'),
  (48, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '19/05', 'Customer', '232 19/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:00:00', '16:00:00'),
  (49, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '26/05', 'Customer', '233 26/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:20:00', '16:20:00'),
  (50, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '25/05', 'Customer', '234 25/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:25:00', '16:25:00'),
  (51, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '235 17/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:25:00', '16:25:00'),
  (52, '', 'Ryska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '26/05', 'Customer', '236 26/05 Ryska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:25:00', '16:25:00'),
  (53, '', 'Ryska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '26/05', 'Customer', '237 26/05 Ryska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:25:00', '16:25:00'),
  (54, '', 'Tyska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '01/06', 'Customer', '238 01/06 Tyska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:25:00', '16:25:00'),
  (55, '', 'Tyska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '01/06', 'Customer', '239 01/06 Tyska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:25:00', '16:25:00'),
  (56, '', 'Tyska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '25/05', 'Customer', '240 25/05 Tyska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:30:00', '16:30:00'),
  (57, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '241 17/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:30:00', '16:30:00'),
  (58, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '19/05', 'Customer', '242 19/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:35:00', '16:35:00'),
  (59, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '19/05', 'Customer', '243 19/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:40:00', '16:40:00'),
  (60, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '24/05', 'Customer', '244 24/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:40:00', '16:40:00'),
  (61, '', 'aeuu', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '18/05', 'Customer', '245 18/05 aeuu', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:50:00', '16:50:00'),
  (62, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '25/05', 'Customer', '246 25/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:50:00', '16:50:00'),
  (63, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '24/05', 'Customer', '247 24/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:55:00', '16:55:00'),
  (64, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '23/05', 'Customer', '248 23/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '16:55:00', '16:55:00'),
  (65, '', 'Finska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '17/05', 'Customer', '249 17/05 Finska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '17:00:00', '17:00:00'),
  (66, '', 'Arabiska', '', 0, NULL, NULL, NULL, 2147483647, 3, 1, '11/05', 'Customer', '250 11/05 Arabiska', '', '2147483647', '1351351351351', '', 'daniel_golfare@hotmail.com', '', 'test@test.se', 'AdvokatByrå aB', '17:05:00', '17:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
  (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
  (2, 'Manager', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Sweden', 'Http://translatorn.se', '', NULL),
  (3, 'Jörgen', 'jorgen@paul.se', NULL, NULL, 'Stockholm', NULL, 'Information om användaren.. lite allmänt sådär', 'Europe/Stockholm'),
  (7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  `company_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_boss` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `company_id`, `is_boss`) VALUES
  (1, 'root', 'idrini@gmail.com', '$2y$10$S1bKrtb5OJKnwyDG/5kzuu5cpWEptjfUTyfHTDf4SPcs0uoQFB2z.', 'HMr5eam_HS2mgfZk0I9cg-UO8tTJXDtX', 1494252329, NULL, NULL, '127.0.0.1', 1494252309, 1494456830, 0, 1495033438, '', 0),
  (2, 'manager', 'nillithion@hotmail.com', '$2y$10$HCy.joCSL69T47ESB9BVIOwLNl0lP3xsMkJ15pvAapYgRNTafxvfC', 'PTh3Rvh55uOOAMJGIiWF-8iN-RSY_C_0', 1494254345, NULL, NULL, '127.0.0.1', 1494254345, 1494254345, 0, 1495043488, '0', 0),
  (3, 'Customer', 'daniel_golfare@hotmail.com', '$2y$10$O78qkzJntCoNazhxqJb6p.S2MFW.Kdpe49UmzVplYnAWV1DZlBCj6', 'MAayXrfjD5cwCnLfcX_8SHSyqQ1qgRRI', 1494262131, NULL, NULL, '::1', 1494262131, 1494455468, 0, 1495042810, '1', 0),
  (7, 'testar', 'test@testar.com', '$2y$10$3QwcmazmVAJL4vYwKUFFqeJCq5WTudOkExd.4UTKys6LOPVdpXSk.', 'NE-o5L_o_fRGzEHlC-Fqb4pxZUHeAaRA', 1494843946, NULL, NULL, '::1', 1494843946, 1494843946, 0, 1494844039, '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_akut`
--
ALTER TABLE `app_akut`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `app_job`
--
ALTER TABLE `app_job`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `app_sidas`
--
ALTER TABLE `app_sidas`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `easyii_admins`
--
ALTER TABLE `easyii_admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `access_token` (`access_token`);

--
-- Indexes for table `easyii_article_categories`
--
ALTER TABLE `easyii_article_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_article_items`
--
ALTER TABLE `easyii_article_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_carousel`
--
ALTER TABLE `easyii_carousel`
  ADD PRIMARY KEY (`carousel_id`);

--
-- Indexes for table `easyii_catalog_categories`
--
ALTER TABLE `easyii_catalog_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_catalog_items`
--
ALTER TABLE `easyii_catalog_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_catalog_item_data`
--
ALTER TABLE `easyii_catalog_item_data`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `item_id_name` (`item_id`,`name`),
  ADD KEY `value` (`value`(300));

--
-- Indexes for table `easyii_faq`
--
ALTER TABLE `easyii_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `easyii_feedback`
--
ALTER TABLE `easyii_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `easyii_files`
--
ALTER TABLE `easyii_files`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_gallery_categories`
--
ALTER TABLE `easyii_gallery_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_guestbook`
--
ALTER TABLE `easyii_guestbook`
  ADD PRIMARY KEY (`guestbook_id`);

--
-- Indexes for table `easyii_loginform`
--
ALTER TABLE `easyii_loginform`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `easyii_migration`
--
ALTER TABLE `easyii_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `easyii_modules`
--
ALTER TABLE `easyii_modules`
  ADD PRIMARY KEY (`module_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `easyii_news`
--
ALTER TABLE `easyii_news`
  ADD PRIMARY KEY (`news_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_pages`
--
ALTER TABLE `easyii_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_photos`
--
ALTER TABLE `easyii_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `model_item` (`class`,`item_id`);

--
-- Indexes for table `easyii_seotext`
--
ALTER TABLE `easyii_seotext`
  ADD PRIMARY KEY (`seotext_id`),
  ADD UNIQUE KEY `model_item` (`class`,`item_id`);

--
-- Indexes for table `easyii_settings`
--
ALTER TABLE `easyii_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `easyii_shopcart_goods`
--
ALTER TABLE `easyii_shopcart_goods`
  ADD PRIMARY KEY (`good_id`);

--
-- Indexes for table `easyii_shopcart_orders`
--
ALTER TABLE `easyii_shopcart_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `easyii_subscribe_history`
--
ALTER TABLE `easyii_subscribe_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `easyii_subscribe_subscribers`
--
ALTER TABLE `easyii_subscribe_subscribers`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `easyii_tags`
--
ALTER TABLE `easyii_tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `easyii_tags_assign`
--
ALTER TABLE `easyii_tags_assign`
  ADD KEY `class` (`class`),
  ADD KEY `item_tag` (`item_id`,`tag_id`);

--
-- Indexes for table `easyii_texts`
--
ALTER TABLE `easyii_texts`
  ADD PRIMARY KEY (`text_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_akut`
--
ALTER TABLE `app_akut`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `app_job`
--
ALTER TABLE `app_job`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_sidas`
--
ALTER TABLE `app_sidas`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `easyii_admins`
--
ALTER TABLE `easyii_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `easyii_article_categories`
--
ALTER TABLE `easyii_article_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `easyii_article_items`
--
ALTER TABLE `easyii_article_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_carousel`
--
ALTER TABLE `easyii_carousel`
  MODIFY `carousel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_catalog_categories`
--
ALTER TABLE `easyii_catalog_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_catalog_items`
--
ALTER TABLE `easyii_catalog_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_catalog_item_data`
--
ALTER TABLE `easyii_catalog_item_data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `easyii_faq`
--
ALTER TABLE `easyii_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_feedback`
--
ALTER TABLE `easyii_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `easyii_files`
--
ALTER TABLE `easyii_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `easyii_gallery_categories`
--
ALTER TABLE `easyii_gallery_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `easyii_guestbook`
--
ALTER TABLE `easyii_guestbook`
  MODIFY `guestbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_loginform`
--
ALTER TABLE `easyii_loginform`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `easyii_modules`
--
ALTER TABLE `easyii_modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `easyii_news`
--
ALTER TABLE `easyii_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_pages`
--
ALTER TABLE `easyii_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `easyii_photos`
--
ALTER TABLE `easyii_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `easyii_seotext`
--
ALTER TABLE `easyii_seotext`
  MODIFY `seotext_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `easyii_settings`
--
ALTER TABLE `easyii_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `easyii_shopcart_goods`
--
ALTER TABLE `easyii_shopcart_goods`
  MODIFY `good_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_shopcart_orders`
--
ALTER TABLE `easyii_shopcart_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_subscribe_history`
--
ALTER TABLE `easyii_subscribe_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_subscribe_subscribers`
--
ALTER TABLE `easyii_subscribe_subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_tags`
--
ALTER TABLE `easyii_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `easyii_texts`
--
ALTER TABLE `easyii_texts`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
