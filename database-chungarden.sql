-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 07, 2022 lúc 08:39 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chungarden`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_Admin` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_Admin`, `Name`, `Email`, `Pass`) VALUES
(1, 'Adminitrator', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorize`
--

CREATE TABLE `categorize` (
  `id_Categorize` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categorize`
--

INSERT INTO `categorize` (`id_Categorize`, `Name`) VALUES
(6, 'Cây thủy sinh'),
(7, 'Cây để bàn'),
(8, 'Cây chậu treo'),
(9, 'Cây mini');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_Customer` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id_Customer`, `Username`, `Phone`, `Email`, `Address`, `Avatar`, `Pass`) VALUES
(1, 'quynh', '0374164459', 'dothuyquynh0211@gmail.com', 'hnoi', '../public/avt_cus/sen đá 3.jpg', '202cb962ac59075b964b07152d234b70'),
(9, 'Đỗ Thúy Quỳnh', '0374164460', 'phamthienp@gmail.com', 'Mộc châu ,Sơn La', '../public/avt_cus/customer.png', 'e10adc3949ba59abbe56e057f20f883e'),
(21, 'Adminitrator', '098665444', 'admin@gmail.com', 'dff', '../public/avt_cus/customer.png', '202cb962ac59075b964b07152d234b70'),
(41, 'DTQ', '0374164461', 'A@gmail.com', 'hnoi', '../public/avt_cus/customer.png', '202cb962ac59075b964b07152d234b70'),
(43, 'quynh', '0374164462', 'uyquynh0211@gmail.com', 'bac giang', '../public/avt_cus/customer.png', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `id_Invoice` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `Receiver` varchar(50) NOT NULL,
  `Phone_Receiver` varchar(20) NOT NULL,
  `Recipient_Address` varchar(255) NOT NULL,
  `Create_at` timestamp NULL DEFAULT NULL,
  `Total_Payment` float NOT NULL,
  `Note` varchar(255) NOT NULL,
  `Status_Order` tinyint(1) NOT NULL,
  `id_Admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`id_Invoice`, `id_cus`, `Receiver`, `Phone_Receiver`, `Recipient_Address`, `Create_at`, `Total_Payment`, `Note`, `Status_Order`, `id_Admin`) VALUES
(87, 9, 'Đỗ Thúy Quỳnh', '0374164460', 'Mộc châu ,Sơn La', '2021-03-26 16:41:14', 375000, '', 1, NULL),
(88, 9, 'Đỗ Thúy Quỳnh', '0374164460', 'Mộc châu ,Sơn La', '2021-03-27 01:36:17', 110000, '', 1, NULL),
(89, 9, 'Đỗ Thúy Quỳnh', '0374164460', 'Mộc châu ,Sơn La', '2021-03-27 01:51:28', 230000, '', 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id_Invoice` int(11) NOT NULL,
  `id_Product` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `invoice_detail`
--

INSERT INTO `invoice_detail` (`id_Invoice`, `id_Product`, `Quantity`, `Price`) VALUES
(87, 96, 1, 200000),
(87, 128, 1, 175000),
(88, 156, 2, 55000),
(89, 96, 1, 200000),
(89, 137, 1, 30000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id_Post` int(11) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pic` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `status_post` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id_Post`, `date_post`, `pic`, `title`, `body`, `status_post`) VALUES
(6, '2021-03-21 02:24:12', '../public/images/xr-gymno2.jpg', 'Cách trồng và chăm sóc sen đá Gymno vân ', '<h3>C&Acirc;Y XƯƠNG RỒNG GYMNO V&Acirc;N</h3>\r\n\r\n<p><input alt=\"Gymno vân đá\" src=\"http://localhost/Project%201/Nhom_19_BKD06K11/public/images/xr-gymno2.jpg\" style=\"width: 640px; height: 640px;\" type=\"image\" /></p>\r\n\r\n<p>Xương rồng gymno v&acirc;n thuộc họ&nbsp;Cactaceae, c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;Gymnocalycium damsii.<br />\r\nXương rồng Gymno được người Brazil mang về nh&acirc;n giống ở Việt Nam năm 1980.&nbsp;K&iacute;ch thước: nhỏ nhắn, tầm 4 &ndash; 15 cm t&ugrave;y theo thời gian chăm s&oacute;c v&agrave; điều kiện sinh trưởng. Xương rồng Gymno rất dễ đẻ nh&aacute;nh v&agrave; tạo nhiều c&acirc;y con.<br />\r\nĐặc biệt, c&acirc;y ra hoa quanh năm nếu được chăm s&oacute;c ph&ugrave; hợp. Hoa gymno nhỏ, h&igrave;nh phễu với nhiều m&agrave;u sắc: trắng, hồng, v&agrave;ng nhạt, t&iacute;m nhạt,... Quả của c&acirc;y thu&ocirc;n, d&agrave;i khoảng 2.5cm v&agrave; chuyển m&agrave;u đỏ thẫm khi ch&iacute;n.<br />\r\nXương rồng Gymno v&acirc;n th&iacute;ch hợp trang tr&iacute; ở qu&aacute;n c&agrave; ph&ecirc; hoặc ban c&ocirc;ng hoặc c&aacute;c g&oacute;c nh&agrave; c&oacute; nhiều nắng, tạo cảm gi&aacute;c tươi m&aacute;t v&agrave; thư gi&atilde;n. Một c&ocirc;ng dụng rất hữu &iacute;ch cho d&acirc;n văn ph&ograve;ng l&agrave; xương rồng h&uacute;t được tia s&oacute;ng điện từ c&oacute; hại cho sức khỏe.<br />\r\nĐ&acirc;y l&agrave; lo&agrave;i c&acirc;y mang &yacute; nghĩa thủy chung v&agrave; che chở. Một c&acirc;y xương rồng tươi tắn trồng một chiếc chậu nhỏ nhắn c&ugrave;ng một chiếc thiệp xinh xắn sẽ l&agrave; m&oacute;n qu&agrave; bất ngờ cho những người m&agrave; m&igrave;nh y&ecirc;u qu&yacute;.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/d4d9ed4e-a702-4efd-ad6c-e15a7c7bf4c8\" width=\"1200\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>HƯỚNG DẪN CHI TIẾT C&Aacute;CH CHĂM S&Oacute;C XƯƠNG RỒNG</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Đất trồng: Y&ecirc;u cầu phải tho&aacute;t nước tốt.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Nơi trồng: tho&aacute;ng m&aacute;t, c&oacute; &aacute;nh nắng trực tiếp nhiều.</p>\r\n	</li>\r\n	<li>\r\n	<p>Tưới nước: tưới khi đất đ&atilde; kh&ocirc; ho&agrave;n to&agrave;n (khoảng 3 &ndash; 5 ng&agrave;y/lần).&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Hướng dẫn chăm s&oacute;c kh&aacute;c&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 0),
(8, '2021-03-19 08:33:31', '../public/images/trong-va-cham-soc-cay-lan-y.jpg', 'Những điều cần biết trong trồng và chăm sóc cây Lan Ý', '<p>Lan &yacute; một lo&agrave;i c&acirc;y c&oacute; hoa m&agrave;u trắng xinh đẹp, c&ugrave;ng hương thơm dễ chịu. Tuy nhi&ecirc;n để trồng v&agrave; chăm s&oacute;c c&acirc;y lan &yacute; kh&ocirc;ng phải đơn giản. Đ&ograve;i hỏi bạn phải biết những điều sau.</p>\r\n\r\n<h2>&Aacute;nh s&aacute;ng trồng c&acirc;y Lan &Yacute;</h2>\r\n\r\n<p><input alt=\"ảnh sen đá\" src=\"http://localhost/Project%201/Nhom_19_BKD06K11/public/images/sen-da-nau-3.jpg\" style=\"height:250px; width:250px\" type=\"image\" /></p>\r\n\r\n<p>Lan &yacute; c&oacute; thể đặt trong b&oacute;ng r&acirc;m hoặc nơi c&oacute; điều kiện &iacute;t &aacute;nh s&aacute;ng. Tuy nhi&ecirc;n, tốt nhất vẫn n&ecirc;n đặt ở vị tr&iacute; c&oacute; &aacute;nh s&aacute;ng mặt trời chiếu v&agrave;o, như cửa sổ hay ban c&ocirc;ng. Hoặc nếu để trong ph&ograve;ng k&iacute;n thường xuy&ecirc;n, th&igrave; h&agrave;ng tuần bạn n&ecirc;n đem chậu lan &yacute; tiếp x&uacute;c với &aacute;nh s&aacute;ng tự nhi&ecirc;n 1 lần để c&acirc;y quang hợp.<br />\r\nViệc qu&aacute; thiếu &aacute;nh s&aacute;ng mặt trời sẽ ngăn cản qu&aacute; tr&igrave;nh quan trọng của c&acirc;y lan &yacute;. C&aacute;c l&aacute; mọc sau sẽ c&oacute; k&iacute;ch thước nhỏ hơn rất nhiều, hoa cũng kh&oacute; m&agrave; c&oacute; được, m&agrave;u sắc l&aacute; nhợt nhạt v&agrave; hương hoa kh&ocirc;ng được thơm. Do đ&oacute;, khi trồng v&agrave; chăm s&oacute;c c&acirc;y lan &yacute;, bạn n&ecirc;n cho c&acirc;y hấp thụ &aacute;nh s&aacute;ng từ mặt trời.</p>\r\n\r\n<h2>Lượng nước hằng ng&agrave;y v&agrave; c&aacute;ch tưới</h2>\r\n\r\n<p>Nếu bạn để lan &yacute; trong nh&agrave; ở, nơi l&agrave;m việc hay trong ph&ograve;ng k&iacute;n, &iacute;t gi&oacute; lưu th&ocirc;ng v&agrave; tiếp x&uacute;c &aacute;nh mặt trời kh&ocirc;ng qu&aacute; nhiều. Th&igrave; chỉ n&ecirc;n tưới nước từ 2 đến 3 lần l&agrave; đủ. Bởi đặt trong kh&ocirc;ng gian k&iacute;n th&igrave; việc tho&aacute;t nước v&agrave; h&uacute;t nước của c&acirc;y tương đối chậm. Nếu tới qu&aacute; nhiều sẽ l&agrave;m cho dư nước, thối rễ v&agrave; chết c&acirc;y.<br />\r\nC&ograve;n nếu như bạn trồng lan &yacute; b&ecirc;n ngo&agrave;i vườn, hay ban c&ocirc;ng tiếp x&uacute;c trực tiếp với c&aacute;ch &aacute;nh mặt trời. Th&igrave; bạn cần tới thường xuy&ecirc;n hơn, định kỳ mỗi ng&agrave;y 1 lần. Việc thiếu nước sẽ l&agrave;m cho l&aacute; lan &yacute; bị v&agrave;ng m&eacute;p, th&acirc;n kh&ocirc; lại v&agrave; kh&ocirc;ng c&oacute; độ b&oacute;ng. V&igrave; vậy, nếu kh&ocirc;ng đảm bảo được việc chăm s&oacute;c, bạn n&ecirc;n để c&acirc;y lan &yacute; trong kh&ocirc;ng gian b&ecirc;n trong nh&agrave;.</p>\r\n\r\n<h2>Nhiệt độ nơi trồng</h2>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/1290f352-35e7-48bb-8da8-8f65b68a822f\" width=\"450\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Lan &yacute; d&ugrave; l&agrave; loại c&acirc;y nội thất, ph&ugrave; hợp trồng ở nh&agrave; v&agrave; văn ph&ograve;ng, nhưng bạn lưu &yacute; kh&ocirc;ng để lan &yacute; qu&aacute; gần với m&aacute;y liệt hay c&aacute;c thiết bị tỏa nhiệt v&agrave; h&uacute;t ẩm. Điều n&agrave;y khiến lan &yacute; dễ bị h&eacute;o, kh&ocirc; l&aacute; v&agrave; kh&oacute; nở hoa được.<br />\r\nNhiệt độ sinh trưởng l&yacute; tưởng nhất của lan &yacute; l&agrave; từ 25 đến 30 độ C. Nhiệt độ qu&aacute; thấp lan &yacute; kh&ocirc;ng thể ph&aacute;t triển được, nhiệt độ qu&aacute; cao l&agrave;m lan &yacute; nhanh t&agrave;n, dễ chết v&agrave; kh&ocirc;ng thể ra hoa.</p>\r\n\r\n<h2>C&aacute;ch bổ sung chất dinh dưỡng v&agrave; chọn ph&acirc;n b&oacute;n</h2>\r\n\r\n<p>Lan &yacute; kh&ocirc;ng cần qu&aacute; nhiều chất dinh dưỡng, chủ yếu ch&uacute;ng sống nhờ nước. V&igrave; vậy, khi trồng v&agrave; chăm s&oacute;c c&acirc;y lan &yacute;, bạn cần đảm bảo lượng nước cho l&agrave; được. Tuy nhi&ecirc;n, Lan &yacute; lại sinh trưởng rễ rất nhanh, việc n&agrave;y để đảm bảo lượng dưỡng chất hấp thụ v&agrave;o. Nếu thể t&iacute;ch chậu đựng v&agrave; b&igrave;nh chứa kh&ocirc;ng đủ, rễ lan &yacute; c&oacute; xu hướng mọc ngược l&ecirc;n v&agrave; tr&agrave;n ra b&ecirc;n ngo&agrave;i. Do đ&oacute;, bạn cần quan s&aacute;t để thay chậu khi cần thiết.<br />\r\nChậu thay mới n&ecirc;n lớn hơn chậu cũ 10cm, để đảm bảo đủ kh&ocirc;ng gian cho lan &yacute; ph&aacute;t triển. Về mặt ph&acirc;n b&oacute;n, do chủ yếu đặt trong kh&ocirc;ng gian r&acirc;m m&aacute;t n&ecirc;n nhu cầu ph&acirc;n b&oacute;n của lan &yacute; kh&ocirc;ng cao. Mỗi th&aacute;ng bạn c&oacute; thể bổ sung 1 lượng nhỏ ph&acirc;n hữu cơ cho lan &yacute; từ 1 đến 2 lần l&agrave; được.</p>\r\n', 0),
(11, '2021-03-21 02:35:53', '../public/images/bang-sing-2-247x296.jpg', 'Tất tần tật về cây Bàng Singrapore', '<p>Hiện nay, b&agrave;ng Singapore l&agrave; c&acirc;y nội thất phổ biến m&agrave; bạn lu&ocirc;n nh&igrave;n thấy b&oacute;ng d&aacute;ng của ch&uacute;ng trong những bản thiết kế nội thất hiện đại tại c&aacute;c nước Phương T&acirc;y, c&acirc;y b&agrave;ng Singapore rất th&acirc;n thiện với m&ocirc;i trường xung quanh.</p>\r\n\r\n<h2>Tại sao c&acirc;y b&agrave;ng Singapore được ưa chuộng trang tr&iacute; nội thất?</h2>\r\n\r\n<p>C&acirc;y B&agrave;ng Singapore (t&ecirc;n khoa học: Ficus pandurata) l&agrave; loại c&acirc;y cảnh nội thất đẹp v&agrave; rất được ưa chuộng trong những năm gần đ&acirc;y. C&acirc;y c&oacute; nguồn gốc từ T&acirc;y phi, giống được lai tạo từ Singapore rồi ph&aacute;t triển mạnh ở Đ&agrave;i Loan, sau đ&oacute; mới được nhập v&agrave;o Việt Nam.</p>\r\n\r\n<p>+ C&acirc;y B&agrave;ng Singapore c&oacute; d&aacute;ng thẳng l&aacute; to, xanh tốt quanh năm, ph&aacute;t triển ph&ugrave; hợp đặc trong kh&ocirc;ng gian nội thất l&agrave;m tăng sự sinh động cho kh&ocirc;ng gian. Kh&ocirc;ng chỉ thanh lọc kh&ocirc;ng kh&iacute; m&agrave; c&acirc;y B&agrave;ng Singapore c&ograve;n l&agrave;m tăng th&ecirc;m vẻ sang trọng, hiện đại cho ng&ocirc;i nh&agrave;, văn ph&ograve;ng hay c&ocirc;ng sở.</p>\r\n\r\n<p>+ Những chiếc l&aacute; to nh&igrave;n như chiếc đ&agrave;n violon, tạo n&ecirc;n điểm nhấn cho kh&ocirc;ng gian sự mới lạ, h&agrave;i h&ograve;a, tươi m&aacute;t nhằm thu h&uacute;t bởi khối m&agrave;u xanh của phiến l&aacute; mang đến cho căn ph&ograve;ng kh&aacute;ch, ph&ograve;ng ngủ hay nh&agrave; bếp&hellip; một kh&ocirc;ng gian sống thực sự thoải m&aacute;i, dễ chịu gi&uacute;p cho bạn thư gi&atilde;n đầu &oacute;c, cảm thấy nhẹ nh&agrave;ng hơn.</p>\r\n\r\n<p>+ C&acirc;y B&agrave;ng Singapore l&agrave; loại c&acirc;y cảnh nội thất cao cấp, xanh tốt quanh năm, c&acirc;y mang lại sự tươi m&aacute;t v&agrave; sang trọng cho ng&ocirc;i nh&agrave;, căn ph&ograve;ng hay văn ph&ograve;ng của bạn.</p>\r\n\r\n<p>+ Nếu bạn đ&atilde; qu&aacute; nh&agrave;m ch&aacute;n với c&aacute;c loại c&acirc;y nội thất phổ th&ocirc;ng, th&igrave; B&agrave;ng Singapore ch&iacute;nh l&agrave; sự lựa chọn tươi mới v&agrave; độc đ&aacute;o d&agrave;nh cho bạn, với t&aacute;n l&aacute; to, bạn c&oacute; thể nh&acirc;m nhi t&aacute;ch tr&agrave; với cảm gi&aacute;c như ngồi dưới gốc c&acirc;y trong ch&iacute;nh văn ph&ograve;ng của bạn.</p>\r\n\r\n<p>+ Kh&ocirc;ng những vậy, với sức sống m&atilde;nh liệt, t&aacute;n l&aacute; lớn, l&aacute; rộng, tươi tốt quanh năm, trong phong thủy loại c&acirc;y n&agrave;y được xem l&agrave; tượng trưng cho tiền t&agrave;i, gi&agrave;u sang v&agrave; may mắn. Với nguồn năng lượng dồi d&agrave;o tỏa ra từ c&acirc;y b&agrave;ng Singapore sẽ mang đến cho gia chủ sức khỏe, thịnh vượng v&agrave; b&igrave;nh an.</p>\r\n\r\n<p><img alt=\"bang sing\" height=\"640\" sizes=\"(max-width: 480px) 100vw, 480px\" src=\"https://www.indoorgarden.vn/wp-content/uploads/2020/06/bang-sing-1-1.jpg\" srcset=\"https://www.indoorgarden.vn/wp-content/uploads/2020/06/bang-sing-1-1.jpg 480w, https://www.indoorgarden.vn/wp-content/uploads/2020/06/bang-sing-1-1-225x300.jpg 225w\" width=\"480\" /></p>\r\n\r\n<h2>&Yacute; nghĩa c&acirc;y b&agrave;ng Singapore</h2>\r\n\r\n<p>C&acirc;y b&agrave;ng Singapore trong phong thủy l&agrave; loại c&acirc;y l&aacute; lớn, t&aacute;n l&aacute; rộng, tr&ograve;n v&agrave; đầy đặn, m&agrave;u xanh tươi tốt quanh năm tượng trưng cho tiền t&agrave;i, gi&agrave;u sang v&agrave; mang đến nhiều may mắn.</p>\r\n\r\n<p>C&acirc;y B&agrave;ng Singapore trang tr&iacute; nh&agrave; ở: c&oacute; k&iacute;ch thước lớn c&oacute; thể trang tr&iacute; ở khung cửa sổ ban c&ocirc;ng, ch&acirc;n cầu thang .. trưng ngay b&agrave;n ph&ograve;ng kh&aacute;ch hoặc ph&ograve;ng họp, b&agrave;n ăn trong ph&ograve;ng bếp</p>\r\n\r\n<h2>C&aacute;ch chăm s&oacute;c</h2>\r\n\r\n<p>+ Nhiệt độ: tốt nhất cho c&acirc;y b&agrave;ng Singapore l&agrave; 16 &ndash; 27 độ C, th&iacute;ch hợp trồng trong nh&agrave;, hay những văn ph&ograve;ng c&oacute; m&aacute;y lạnh. Kh&ocirc;ng chịu được nhiệt độ qu&aacute; thấp dưới 15 độ C, n&ecirc;n 1 tuần phơi nắng 2 lần để đảm bảo b&agrave;ng lu&ocirc;n tươi tốt</p>\r\n\r\n<p>+ &Aacute;nh s&aacute;ng : b&agrave;ng Singapore cần &aacute;nh s&aacute;ng gi&aacute;n tiếp quanh năm. Ph&aacute;t triển tốt trong nh&agrave; k&iacute;nh, kh&ocirc;ng th&iacute;ch hợp trồng dưới &aacute;nh nắng trực tiếp.</p>\r\n\r\n<p>+Tưới nước: N&ecirc;n tưới nước tự nhi&ecirc;n như nước giếng, nước mưa, tr&aacute;nh tưới nước m&aacute;y v&igrave; c&acirc;y kh&aacute; kị Clo v&agrave; Flo, C&acirc;y c&oacute; rễ phụ th&iacute;ch hợp với đất ẩm v&agrave; c&oacute; thể tưới nhiều nước.</p>\r\n\r\n<p>+ N&ecirc;n cắt bỏ l&aacute; xấu, kh&ocirc;ng cần phải cắt giảm bất kỳ chi nh&aacute;nh, l&aacute;, trừ khi một số bắt đầu h&eacute;o &uacute;a v&agrave; ch&aacute;y. Vệ sinh sạch l&aacute; với một miếng bọt biển mềm v&agrave; nước để loại bỏ bụi bẩn v&agrave; cải thiện sự xuất hiện b&oacute;ng.</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_Product` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `id_Categorize` int(11) NOT NULL,
  `view` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_Product`, `Name`, `Price`, `image`, `Description`, `Status`, `id_Categorize`, `view`) VALUES
(96, 'Cây bạch mã hoàng tử', 200000, '../public/images/cay-bach-ma-de-ban.jpg', '<p>Bạch M&atilde; Ho&agrave;ng Tử l&agrave; một trong số những c&acirc;y cảnh được nhiều người t&igrave;m mua v&igrave; c&oacute; vẻ ngo&agrave;i độc đ&aacute;o, ưa nh&igrave;n. Trồng c&acirc;y Bạch M&atilde; Ho&agrave;ng Tử trong nh&agrave; kh&ocirc;ng chỉ gi&uacute;p thanh lọc kh&ocirc;ng kh&iacute;, tạo m&ocirc;i trường sống xanh m&agrave; c&ograve;n c&oacute; thể mang lại t&agrave;i lộc v&agrave; may mắn cho gia chủ.</p>\r\n', 1, 7, 4),
(98, 'Cây bảy sắc cầu vồng', 149000, '../public/images/cay-7-sac-cau-vong-3.jpg', '<p>C&acirc;y bảy sắc cầu vồng c&oacute; m&agrave;u sắc lạ mắt c&oacute; nhiều t&aacute;c dụng hữu &iacute;ch trong đời sống của ch&uacute;ng ta. Ch&uacute;ng được d&ugrave;ng để trang tr&iacute; nội thất, đặt tr&ecirc;n b&agrave;n l&agrave;m việc, văn ph&ograve;ng, ph&ograve;ng kh&aacute;ch với m&agrave;u nổi bật khiến cho căn ph&ograve;ng trở n&ecirc;n đặc biệt hơn.</p>\r\n', 1, 7, 4),
(99, 'Cây cẩm nhung', 90000, '../public/images/cay-cam-nhung-chau-oc-1.jpg', '<p>C&acirc;y cẩm nhung hay c&ograve;n gọi l&agrave; c&acirc;y may mắn. L&agrave; lo&agrave;i c&acirc;y nhỏ, nhiều l&aacute;, th&iacute;ch hợp với trồng trong b&oacute;ng m&aacute;t. C&acirc;y được lựa chọn nhiều để l&agrave;m c&acirc;y cảnh để b&agrave;n tại g&oacute;c l&agrave;m việc, học tập.</p>\r\n', 1, 7, 0),
(100, 'Cây cẩm thạch', 180000, '../public/images/cay-cam-thach-510x510.png', '<p>C&acirc;y cẩm thạch được trồng rộng r&atilde;i nhiều nơi v&agrave; đặc biệt thường để trang tr&iacute; trước cửa nh&agrave;, kh&aacute;ch sạn, nh&agrave; h&agrave;ng&hellip; nhằm thu t&agrave;i h&uacute;t lộc, đưa đến nhiều may mắn hơn đến cho người sở hữu. C&oacute; nhiều người cho rằng m&agrave;u l&aacute; của c&acirc;y giống m&agrave;u của vi&ecirc;n đ&aacute; qu&yacute; cũng c&oacute; t&ecirc;n l&agrave; cẩm thạch, tượng trưng cho ngọc ước n&ecirc;n ch&uacute;ng được đ&aacute;nh gi&aacute; cao trong việc trang tr&iacute;.</p>\r\n', 1, 7, 6),
(101, 'Cây cau tiểu trâm', 190000, '../public/images/tieu-canh-cau-tieu-tram-de-ban-1.jpg', '<p>C&acirc;y Cau Tiểu Tr&acirc;m l&agrave; một loại c&acirc;y c&oacute; khả năng l&agrave;m sạch kh&ocirc;ng gian sống bằng khả nằng h&uacute;t c&aacute;c chất độc h&agrave;ng ng&agrave;y. Trong phong thuỷ, cau tiểu tr&acirc;m c&oacute; t&aacute;c dụng &aacute;n ngữ v&agrave; loại bỏ kh&iacute; xấu. Trồng một c&acirc;y cau tiểu tr&acirc;m trong nh&agrave; để khai th&ocirc;ng vận kh&iacute;, mang lại may mắn, t&agrave;i lộc cho gia chủ.</p>\r\n', 1, 7, 1),
(102, 'Cây cỏ đồng tiền', 80000, '../public/images/co-dong-tien-2-1.jpg', '<p>Cỏ đồng tiền gi&uacute;p điều h&ograve;a kh&ocirc;ng kh&iacute;, hấp thụ kh&iacute; CO2 nhờ đ&oacute; mang lại cảm gi&aacute;c thư th&aacute;i, thoải m&aacute;i cho bạn. Người ta c&ograve;n gọi n&oacute; l&agrave; c&acirc;y cỏ may mắn.</p>\r\n', 1, 6, 7),
(103, 'Cây cỏ may mắn', 130000, '../public/images/cay-may-man-510x403.jpg', '<p>C&aacute;i t&ecirc;n Cỏ May Mắn đ&atilde; qu&aacute; quen thuộc với mọi người. Đ&acirc;y l&agrave; loại c&acirc;y để b&agrave;n được ưa chuộng trong văn ph&ograve;ng hay trong nh&agrave; ở,&hellip; &nbsp;đem đến sức khỏe, sự thư th&aacute;i t&acirc;m hồn vừa c&oacute; &yacute; nghĩa trong phong thủy v&agrave; t&acirc;m linh</p>\r\n', 1, 7, 2),
(104, 'Cây đại đế vương', 190000, '../public/images/cay-dai-de-3.jpg', '<p>Đại Đế xanh lu&ocirc;n được c&aacute;nh m&agrave;y r&acirc;u lựa chọn l&agrave;m loại c&acirc;y thể hiện sức mạnh, sự uy quyền của m&igrave;nh trong c&ocirc;ng việc cũng như trong cuộc sống. Đặc biệt nếu Đại Đế Xanh được đặt ở trong nh&agrave; hay l&agrave; ở văn ph&ograve;ng sẽ mang đến may mắn, sự thịnh vượng v&agrave; sức mạnh cho gia chủ.</p>\r\n', 1, 7, 1),
(105, 'Cây dứa sọc vàng', 130000, '../public/images/cay-canh-de-ban-lam-viec-510x510.jpg', '<p>C&acirc;y dứa sọc v&agrave;ng kh&ocirc;ng chỉ được l&agrave;m c&acirc;y cảnh m&agrave; c&ograve;n l&agrave; lo&agrave;i c&acirc;y rất hữu &iacute;ch trong đời sống hiện nay. Ở m&ocirc;i trường với nhiều kh&oacute;i bụi, bụi bẩn, nhiễm khuẩn th&igrave; dưa sọc v&agrave;ng sẽ c&oacute; t&aacute;c dụng khử độc tố trong đất, lọc kh&ocirc;ng kh&iacute; để tạo n&ecirc;n một kh&ocirc;ng gian l&agrave;nh mạnh hơn lu&ocirc;n tạo cho con người cảm thấy thoải m&aacute;i khi ngắm nh&igrave;n.</p>\r\n', 1, 7, 1),
(106, 'Cây đuôi công', 210000, '../public/images/cong-tim.jpg', '<p>&Yacute; nghĩa C&acirc;y đu&ocirc;i c&ocirc;ng / c&acirc;y đu&ocirc;i phụng l&agrave; mang đến sự thịnh vượng, may mắn cho gia chủ, đấy l&agrave; về mặt phong thủy c&ograve;n về mặt kh&aacute;ch c&acirc;y c&oacute; t&aacute;c dụng trang tr&iacute; v&agrave; l&agrave;m đẹp cho ng&ocirc;i nh&agrave; của bạn, vị tr&iacute; đặt c&acirc;y hợp l&yacute; l&agrave; ở ph&ograve;ng kh&aacute;ch, hi&ecirc;n trước nh&agrave;, l&agrave;m c&acirc;y cảnh nơi s&acirc;n vườn &hellip;</p>\r\n', 1, 7, 1),
(107, 'Cây hạnh phúc', 650000, '../public/images/cay-hanh-phuc-mix-tieu-canh-6.jpg', '<p>C&acirc;y hạnh ph&uacute;c cũng như c&aacute;c loại c&acirc;y xanh kh&aacute;c nhưng c&oacute; lẽ ch&uacute;ng đưa đến một niềm hạnh ph&uacute;c chan h&ograve;a cho người trồng c&acirc;y n&ecirc;n ch&uacute;ng mới c&oacute; c&aacute;i t&ecirc;n s&acirc;u sắc đến như vậy. Mỗi c&acirc;y c&oacute; một c&aacute;i t&ecirc;n, c&oacute; một &yacute; nghĩa ri&ecirc;ng biệt, cũng như loại c&acirc;y n&agrave;y, chỉ cần nghe đến t&ecirc;n th&ocirc;i l&agrave; ta đ&atilde; cảm thấy sự b&igrave;nh y&ecirc;n ấm &aacute;p rồi. Nếu trồng loại c&acirc;y n&agrave;y trong nh&agrave; sẽ l&agrave;m cho gia đ&igrave;nh bạn lu&ocirc;n vui vẻ, sung t&uacute;c lu&ocirc;n sum vầy qu&acirc;y quần b&ecirc;n nhau.</p>\r\n', 1, 7, 1),
(108, 'Cây hoa bỏng', 150000, '../public/images/cay-hoa-bong.jpg', '<p>C&acirc;y hoa bỏng (c&acirc;y sống đời)&nbsp; c&oacute; t&aacute;c dụng thanh lọc kh&ocirc;ng kh&iacute; rất tốt, l&agrave;m kh&ocirc;ng gian nh&agrave; ở th&ecirc;m xanh m&aacute;t v&agrave; ngập tr&agrave;n sắc hoa.</p>\r\n', 1, 7, 1),
(109, 'Cây kim ngân gốc', 240000, '../public/images/cay-kim-ngan-3-goc-2-1.jpg', '<p>Kim ng&acirc;n l&agrave; Tiền V&agrave;ng, thể hiện sự gi&agrave;u c&oacute;. Ngo&agrave;i ra, về mặt khoa học, c&acirc;y Kim Ng&acirc;n c&ograve;n c&oacute; t&aacute;c dụng đuổi muỗi. Đặc biệt quan niệm Đ&ocirc;ng phương cho rằng lo&agrave;i c&acirc;y n&agrave;y mang đến sự may mắn v&agrave; thịnh vượng. C&oacute; lẽ ch&iacute;nh điều n&agrave;y m&agrave; người ta gọi Kim ng&acirc;n l&agrave; c&acirc;y tiền, l&aacute; Kim ng&acirc;n xo&egrave; rộng như b&agrave;n tay, xanh quanh năm &ndash; một m&agrave;u xanh m&aacute;t mắt.</p>\r\n', 2, 7, 1),
(110, 'Cây kim tiền', 170000, '../public/images/kim-tien-chau-ngoc.jpg', '<p>C&acirc;y kim tiền thường được đặt ở trong ph&ograve;ng kh&aacute;ch, văn ph&ograve;ng, b&agrave;n l&agrave;m việc với h&agrave;m &yacute; đưa đến sự thịnh vượng ,tiền t&agrave;i, danh vọng hơn nữa cho chủ sở hữu. Ngo&agrave;i ra ch&uacute;ng c&ograve;n l&agrave; những m&oacute;n qu&agrave; tinh thần với &yacute; nghĩa đặc biệt d&agrave;nh tặng cho bạn b&egrave; v&agrave; người th&acirc;n y&ecirc;u của m&igrave;nh trong c&aacute;c dịp lễ khai trương, mừng thăng chức&hellip;</p>\r\n', 1, 7, 1),
(111, 'Lan càng cua', 165000, '../public/images/cay-lan-cang-cua.jpg', '<p>Một lo&agrave;i c&acirc;y thuộc họ xương rồng c&oacute; th&acirc;n c&agrave;nh khẳng khiu, tr&ocirc;ng rất kh&ocirc; cứng nhưng lại nở ra những b&ocirc;ng hoa b&oacute;ng mượt, mềm mại v&agrave; cực kỳ sai hoa, xum xu&ecirc; tuyệt đẹp. Đ&oacute; ch&iacute;nh l&agrave; <strong>Lan c&agrave;ng cua&nbsp;</strong>&ndash; c&aacute;i t&ecirc;n ngộ nghĩnh ấy cũng bắt nguồn từ những b&ocirc;ng hoa xinh xinh tr&ocirc;ng giống chiếc c&agrave;ng con cua</p>\r\n', 1, 7, 1),
(112, 'Cây lan quân tử', 175000, '../public/images/cay-lan-quan-tu-1.jpg', '<p>C&acirc;y lan qu&acirc;n tử thể hiện &yacute; ch&iacute; ki&ecirc;n cường bất khuất, biết nhẫn nại trong những ho&agrave;n cảnh kh&oacute; khăn, kh&ocirc;ng chịu l&ugrave;i bước trước gian khổ.</p>\r\n', 2, 7, 2),
(113, 'Cây lưỡi hổ', 170000, '../public/images/cay-luoi-ho-den-ban.jpg', '<p>Theo quan niệm của nhiều nền văn h&oacute;a phương T&acirc;y v&agrave; phương Đ&ocirc;ng, trong phong thủy c&acirc;y c&oacute; t&aacute;c dụng trong việc trừ t&agrave;, chống lại sự bỏ b&ugrave;a, đẩy l&ugrave;i những điểm xấu, đem lại may mắn v&agrave; t&agrave;i lộc cho gia chủ.</p>\r\n', 1, 7, 1),
(114, 'Cây phỉ thúy', 125000, '../public/images/sen-da-ngoc-bich-2.jpg', '<p>C&acirc;y phỉ th&uacute;y c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; c&acirc;y ngọc b&iacute;ch ch&uacute;ng thuộc họ nh&agrave; l&aacute; bỏng với những hoa nhỏ m&agrave;u trắng hay hồng, th&acirc;n c&acirc;y lu&ocirc;n xanh mướt mang lại một vẻ đẹp tự nhi&ecirc;n. Loại c&acirc;y n&agrave;y dường như đang rất được ưa chuộng nhiều bởi lẽ ch&iacute;nh nhờ v&agrave;o đặc t&iacute;nh, đặc điểm cũng như &yacute; nghĩa của c&acirc;y đem đến cho con người. Với một chậu phỉ th&uacute;y trong nh&agrave; đơn giản ch&uacute;ng sẽ mang đến cho gia chủ t&agrave;i lộc v&agrave; sự gi&agrave;u sang ph&uacute; qu&yacute;.</p>\r\n', 1, 7, 1),
(115, 'Cây sừng hươu', 150000, '../public/images/cay-sung-hươu-scaled-510x652.jpg', '<p>Lo&agrave;i c&acirc;y sừng hươu n&agrave;y kh&ocirc;ng những l&agrave; một c&acirc;y xanh đẹp, gi&uacute;p cho cảnh quan thi&ecirc;n nhi&ecirc;n th&ecirc;m tho&aacute;ng đ&atilde;ng m&agrave; c&ograve;n c&oacute; nhiều c&ocirc;ng dụng đặc biệt chữa nhiều chứng bệnh gi&uacute;p cho sức khỏe con người được cải thiện.</p>\r\n', 1, 7, 1),
(116, 'Cây thẻ bài', 140000, '../public/images/lenh-bai-hong-8-510x510.jpg', '<p>C&acirc;y lệnh b&agrave;i cỡ nhỏ hay c&ograve;n được gọi l&agrave; lệnh b&agrave;i sen bởi ch&uacute;ng c&oacute; m&agrave;u hồng tựa c&aacute;nh sen, c&oacute; những l&aacute; thu&ocirc;n d&agrave;i nhưng mảnh mai. L&aacute; c&acirc;y c&oacute; m&agrave;u trắng xanh, nhẹ nh&agrave;ng đầy quyến rũ, ch&iacute;nh giữa c&acirc;y l&agrave; hoa với những c&aacute;nh xếp chồng l&ecirc;n nhau, hai b&ecirc;n đối nhau v&agrave; vươn cao l&ecirc;n giống h&igrave;nh chiếc lệnh b&agrave;i.</p>\r\n', 1, 7, 2),
(118, 'Cây trầu bà đế vương đỏ', 150000, '../public/images/cay-trau-ba-de-vuong-do-3.jpg', '<p>C&acirc;y Trầu B&agrave; Đế Vương Đỏ l&agrave; c&acirc;y th&acirc;n thảo dạng leo, l&aacute; đơn, gốc l&aacute; h&igrave;nh tim, thu&ocirc;n d&agrave;i ở đỉnh, c&oacute; loại xanh to&agrave;n phần, c&oacute; loại c&oacute; những đốm v&agrave;ng tr&ecirc;n l&aacute;.</p>\r\n', 1, 7, 1),
(119, 'Cây đô la chậu treo', 170000, '../public/images/cay-do-la-chau-treo-4-510x510.jpg', '<p>C&acirc;y đ&ocirc; la , nghe đến c&aacute;i t&ecirc;n th&ocirc;i cũng đ&atilde; đủ thấy may mắn tiền t&agrave;i đầy ph&uacute; qu&yacute; rồi đ&uacute;ng kh&ocirc;ng c&aacute;c bạn? T&ecirc;n của ch&uacute;ng được gọi l&agrave; đ&ocirc; la bởi v&igrave; l&aacute; của c&acirc;y c&oacute; h&igrave;nh tr&ograve;n nhỏ giống những đồng tiền xu đ&ocirc; la. Ch&iacute;nh nhờ t&ecirc;n gọi n&agrave;y n&ecirc;n c&acirc;y mang &yacute; nghĩa đẹp tiền t&agrave;i, ph&uacute; qu&yacute; về cho gia chủ, đồng thời th&acirc;n c&acirc;y mọc leo quấn lấy nhau tượng trưng cho sự đo&agrave;n kết h&ograve;a thuận.</p>\r\n', 0, 8, 2),
(121, 'Cây hoa đèn lồng tím', 90000, '../public/images/hoa-long-den-510x383.jpg', '<p>Hoa đ&egrave;n lồng c&oacute; h&igrave;nh d&aacute;ng bắt mắt m&agrave; loại hoa được xếp v&agrave;o một trong những loại c&acirc;y cảnh c&oacute; tiếng, c&acirc;y hoa đ&egrave;n l&ocirc;ng rất ph&ugrave; hợp với kh&iacute; hậu &ocirc;n đới v&agrave; ch&uacute;ng c&oacute; thể nở hoa rực rỡ quanh năm tr&ocirc;ng rất đẹp v&agrave; hấp dẫn.</p>\r\n', 1, 8, 4),
(122, 'Cây vẩy rồng', 100000, '../public/images/cay-vay-rong.jpg', '<p>C&acirc;y vẩy rồng kh&aacute; th&acirc;n thuộc với mọi người đang sinh sống ở Việt Nam, đ&acirc;y thuộc loại c&acirc;y bu&ocirc;ng rủ mềm mại th&iacute;ch hợp trồng chậu treo, l&aacute; c&oacute; m&agrave;u xanh l&aacute; hoặc m&agrave;u bạc ngọc l&uacute;c bảo h&igrave;nh tiền xu, c&oacute; h&igrave;nh d&aacute;ng như những chiếc vẩy rồng hoặc h&igrave;nh đồng tiền xu.</p>\r\n', 1, 8, 2),
(123, 'Cây hoa dạ yến thảo ', 135000, '../public/images/hoa-da-yen-thao-soc-510x510.jpg', '<p>Dạ yến thảo l&agrave; lo&agrave;i hoa l&yacute; tưởng để trồng trong giỏ treo v&agrave; tr&ecirc;n ban c&ocirc;ng. Ưu điểm của giống hoa n&agrave;y l&agrave; cho hoa nhiều v&agrave; th&acirc;n c&oacute; t&iacute;nh năng bu&ocirc;ng rủ n&ecirc;n kh&ocirc;ng chỉ l&agrave;m đẹp v&agrave; c&ograve;n gi&uacute;p che khuyết điểm cho c&aacute;c ban c&ocirc;ng đ&atilde; cũ.</p>\r\n', 1, 8, 1),
(124, 'Cây hoa son môi', 139000, '../public/images/cay-hoa-son-moi.jpg', '<p>Hoa Son M&ocirc;i t&ecirc;n khoa học: Aeschynanthus lobbiana xuất xứ từ Ch&acirc;u &Aacute;, ngay trước khi nở n&oacute; c&oacute; nụ hoa m&agrave;u t&iacute;m sẫm m&agrave; tr&ocirc;ng giống như một chiếc m&ocirc;i nổi l&ecirc;n. Hoa c&acirc;y son m&ocirc;i c&oacute; m&agrave;u đỏ tươi ,ch&uacute;ng nở quanh năm l&agrave; lo&agrave;i hoa đẹp th&iacute;ch hợp treo nơi ban c&ocirc;ng nh&agrave; bạn.</p>\r\n', 1, 8, 1),
(125, 'Cây phất dụ trúc ', 250000, '../public/images/cay-than-tai-thuy-sinh-3-510x510.jpg', '<p>C&acirc;y phất dụ tr&uacute;c thực chất ở Việt Nam n&oacute; được gọi với c&aacute;i t&ecirc;n c&acirc;y ph&aacute;t t&agrave;i ,l&agrave; loại c&acirc;y cảnh phổ biến được d&ugrave;ng l&agrave;m c&acirc;y để b&agrave;n, c&acirc;y văn ph&ograve;ng, trang tr&iacute; nh&agrave;. Theo phong thủy th&igrave; loại c&acirc;y n&agrave;y sẽ mang lại sự may mắn, ph&aacute;t t&agrave;i, vận mệnh, đặc biệt khi được người kh&aacute;c trao tặng bởi vậy n&oacute; th&iacute;ch hợp l&agrave;m qu&agrave; tặng trong dịp khai trương, sinh nhật v&agrave; c&aacute;c dịp lễ tết.</p>\r\n', 2, 6, 3),
(126, 'Cây vạn lộc thủy sinh', 215000, '../public/images/cay-van-loc-thuy-sinh-2.jpg', '<p>Khi nhắc đến loại c&acirc;y vạn lộc chắc chắn bạn sẽ bị thu h&uacute;t bởi m&agrave;u sắc bắt mắt nổi bật của c&acirc;y. Loại c&acirc;y n&agrave;y mang đến sự sang trọng tinh tế cho người sở hữu.</p>\r\n', 1, 6, 2),
(127, 'Cây trầu bà thủy sinh', 150000, '../public/images/trau-ba-thuy-sinh.jpg', '<p>C&acirc;y Trầu B&agrave; thủy sinh thường được nhiều người biết tới với vẻ đẹp mềm mại, nhẹ nh&agrave;ng v&agrave; ấn tượng nhưng &iacute;t ai biết rằng lo&agrave;i c&acirc;y n&agrave;y c&ograve;n đem lại nhiều lợi &iacute;ch cho người trồng. Kh&ocirc;ng chỉ c&oacute; khả năng lọc kh&ocirc;ng kh&iacute; trong nh&agrave; hiệu quả, đem lại kh&ocirc;ng gian tươi mới m&agrave; lo&agrave;i c&acirc;y cảnh thủy canh n&agrave;y c&ograve;n mang đến nhiều may mắn v&agrave; t&agrave;i lộc trong phong thủy.</p>\r\n', 1, 6, 1),
(128, 'Cây phú quý thủy sinh', 175000, '../public/images/cay-phu-quy-thuy-sinh-5.jpg', '<p>C&acirc;y ph&uacute; qu&yacute; thủy sinh&nbsp;rất được ưa chuộng bởi c&oacute; khả năng thanh lọc kh&ocirc;ng kh&iacute;, giảm bớt &ocirc; nhiễm kh&oacute;i bụi, gi&uacute;p cải thiện kh&ocirc;ng gian sống. Ngo&agrave;i ra c&acirc;y c&ograve;n l&agrave; biểu tượng của ph&uacute; qu&yacute;, mang t&agrave;i lộc đến cho gia chủ.</p>\r\n', 1, 6, 2),
(129, 'Cây phát tài búp sen', 210000, '../public/images/cay-phat-loc-thuy-sinh-9.jpg', '<p>C&acirc;y Ph&aacute;t T&agrave;i B&uacute;p Sen thuỷ sinh<strong>&nbsp;</strong>d&ugrave;ng để trang tr&iacute; b&agrave;n l&agrave;m việc, nơi c&oacute; kh&ocirc;ng gian nhỏ, c&acirc;y mang t&iacute;nh phong thủy đ&ecirc;m lại may mắn t&agrave;i lộc cho nhiều người.</p>\r\n', 1, 6, 3),
(130, 'Cây thanh tâm', 150000, '../public/images/cay-thanh-tam-12.jpg', '<p>C&acirc;y Thanh T&acirc;m gi&uacute;p mang lại sự b&igrave;nh lặng t&acirc;m hồn, xua tan những điều kh&ocirc;ng may mắn trong cuộc sống. Một lo&agrave;i c&acirc;y rất th&iacute;ch hợp d&ugrave;ng để trang tr&iacute; trong kh&ocirc;ng gian của bạn. C&acirc;y thanh t&acirc;m c&ograve;n th&iacute;ch hợp d&ugrave;ng để trưng b&agrave;y nơi thờ c&uacute;ng v&agrave; l&agrave; m&oacute;n qu&agrave; mang &yacute; nghĩa rất s&acirc;u sắc.</p>\r\n', 0, 6, 2),
(131, 'Cây cỏ lan chi', 150000, '../public/images/con-lan-chi-3-510x510.jpg', '<p>Cỏ lan chi l&agrave; một loại c&acirc;y thuộc họ c&aacute;t tường, mọc th&agrave;nh bụi, thường được người ta cho v&agrave;o những chiếc cốc xinh xinh b&eacute; t&iacute; để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, l&agrave;m qu&agrave; tặng nhau trong mỗi dịp sinh nhật. Bởi theo phong thuỷ, cỏ lan chi mang đến cho người ta sự may mắn, t&agrave;i lộc.</p>\r\n', 2, 7, 1),
(132, 'Cây trường sinh', 190000, '../public/images/cay-trg-sinh.jpg', '<p>Đ&uacute;ng với t&ecirc;n gọi &ldquo;Trường Sinh&rdquo;, loại c&acirc;y n&agrave;y c&oacute; sức sống rất m&atilde;nh liệt, sinh trưởng v&agrave; ph&aacute;t triển tốt, &iacute;t s&acirc;u bệnh ngay cả khi kh&ocirc;ng được chăm s&oacute;c, tưới nước đều đặn v&agrave; kĩ c&agrave;ng.</p>\r\n', 1, 7, 1),
(133, 'Cây thiết mộc lan', 240000, '../public/images/thiet_moc_lan4.jpg', '<p>C&acirc;y thiết mộc lan để b&agrave;n c&oacute; &yacute; nghĩa lớn về mặt phong thủy. Kh&ocirc;ng những vậy n&oacute; c&ograve;n thanh lọc kh&ocirc;ng kh&iacute;, đ&ecirc;m lại cho gia chủ sức khỏe tốt hơn. C&acirc;y c&ograve;n thể hiện sự mạnh mẽ, tạo động lực ph&aacute;t triển l&acirc;u d&agrave;i cho gia chủ.</p>\r\n', 1, 7, 1),
(134, 'Cây dứa hồng phụng', 130000, '../public/images/cay-dua-hong-phung-dep-510x510.jpg', '<p>Dứa hồng phụng c&oacute; t&aacute;c dụng thanh lọc kh&ocirc;ng kh&iacute; v&agrave; đem đến sự thoải m&aacute;i, thư th&aacute;i trong cho người trồng c&acirc;y. Để l&agrave;m đẹp hơn với c&acirc;y cảnh n&agrave;y th&igrave; ngo&agrave;i c&aacute;ch trồng trong chậu đất ra bạn cũng c&oacute; thể trồng c&acirc;y dứa đu&ocirc;i phụng trong b&igrave;nh thủy tinh cũng rất đẹp mắt.</p>\r\n', 1, 7, 1),
(135, 'Cây trúc nhật', 290000, '../public/images/cay-truc-nhat-510x510.jpg', '<p>C&acirc;y tr&uacute;c nhật c&ograve;n được gọi bằng một số t&ecirc;n kh&aacute;c như Tr&uacute;c Nhật Xanh, Tr&uacute;c Nhật Đốm, Phất Dụ Tr&uacute;c Lang hay Tr&uacute;c Phất Dụ. C&acirc;y Tr&uacute;c Nhật mọc th&agrave;nh bụi do đẻ nh&aacute;nh li&ecirc;n tục, l&aacute; thu&ocirc;n tr&ograve;n d&agrave;i, tr&ocirc;ng như l&aacute; tre, nhưng mềm mại v&agrave; b&oacute;ng hơn, đầu l&aacute; nhọn, c&oacute; c&aacute;c đốm nhỏ m&agrave;u trắng nằm r&atilde;i r&aacute;c tr&ecirc;n phiến l&aacute; đặc biệt c&oacute; dải m&agrave;u trắng lớn ở giữa phiến l&aacute;, gốc c&oacute; cuống rất ngắn gần như chỉ c&oacute; bẹ nhỏ.C&acirc;y c&oacute; d&aacute;ng mảnh mai, thanh nh&atilde; rất sang trọng, cụm hoa tr&uacute;c nhật c&oacute; dạng ch&ugrave;m d&agrave;i, cuống chung vươn ra cứng, mang hoa ở đỉnh. Hoa nhỏ, quả mọng tr&ograve;n m&agrave;u đỏ hay v&agrave;ng.</p>\r\n', 0, 7, 1),
(136, 'Sen đá nâu', 25000, '../public/images/sen-da-nau-3.jpg', '<p>C&acirc;y cảnh sen đ&aacute; n&acirc;u&nbsp;hay c&ograve;n gọi sen socola, chocolate. C&acirc;y mang &yacute; nghĩa cho một t&igrave;nh y&ecirc;u bất diệt v&agrave; m&atilde;nh liệt kh&oacute; c&oacute; g&igrave; thay đổi được t&igrave;nh y&ecirc;u đ&oacute;.</p>\r\n', 1, 9, 8),
(137, 'Sen đá Phật bà', 30000, '../public/images/cây-sen-đá-phật-bà.jpg', '<p>C&acirc;y Sen đ&aacute; phật b&agrave; l&agrave; một trong những loại sen đ&aacute; c&oacute; nhiều l&aacute; nhất, như phật b&agrave; quan &acirc;m ngh&igrave;n mắt nh&igrave;n tay. C&acirc;y sen phật b&agrave; kh&ocirc;ng chỉ mang &yacute; nghĩa về một t&igrave;nh y&ecirc;u v&agrave; t&igrave;nh bạn bền chặt m&agrave; n&oacute; c&ograve;n mang đến sự may mắn như quan &acirc;m ph&ugrave; hộ b&ecirc;n người sở hữu. Sen phật b&agrave; ph&ugrave; hợp trang tr&iacute; b&agrave;n cưới, c&agrave; ph&ecirc;, b&agrave;n l&agrave;m việc, g&oacute;c học tập, b&agrave;n tiếp kh&aacute;ch ở c&aacute;c kh&aacute;ch sạn, g&oacute;c ri&ecirc;ng&hellip;</p>\r\n', 1, 9, 6),
(138, 'Sen đá dù hồng', 20000, '../public/images/sen-da-du1.jpg', '<p>Sen Đ&aacute; D&ugrave; &nbsp;Hồng c&oacute; m&agrave;u sắc đẹp, th&acirc;n h&igrave;nh nhỏ b&eacute;, đ&aacute;ng y&ecirc;u. Đ&acirc;y l&agrave; một trong những loại sen đ&aacute; phổ biến được nhiều người y&ecirc;u th&iacute;ch trồng tại ban c&ocirc;ng hay s&acirc;n thượng.</p>\r\n', 0, 9, 3),
(139, 'Sen đá Thạch ngọc', 30000, '../public/images/thach-ngoc-do.jpg', '<p>Sen đ&aacute; thạch ngọc c&oacute; những l&aacute; giống h&igrave;nh những vi&ecirc;n ngọc, căng tr&ograve;n v&agrave;o mọc nước, c&acirc;y c&oacute; &yacute; nghĩa phong thủy mang đến sự đầy đủ, giầu sang ph&uacute; qu&yacute;. Ngo&agrave;i ra sen thạch ngọc cũng thuộc họ sen đ&aacute; n&ecirc;n k&egrave;m theo &yacute; nghĩa một t&igrave;nh y&ecirc;u, t&igrave;nh bạn vĩnh cửu theo thời gian</p>\r\n', 1, 9, 3),
(140, 'Sen đá móng rồng', 30000, '../public/images/sen-da-mong-rong-vien-trang-3.jpg', '<p>Sen đ&aacute; m&oacute;ng rồng viền trắng hay c&ograve;n gọi l&agrave; sen ngựa vằn, l&aacute; d&agrave;i v&agrave; nhọn ở đầu, mọc xung quanh trục, tr&ecirc;n l&aacute; c&ograve;n c&oacute; c&aacute;c viền trắng nhỏ giống như ch&uacute; ngựa vằn. C&acirc;y ph&ugrave; hợp để b&agrave;n l&agrave;m vi&ecirc;c, b&agrave;n học, trang tr&iacute; b&agrave;n c&agrave; ph&ecirc;...</p>\r\n', 1, 9, 1),
(141, 'Sen đá vàng', 25000, '../public/images/sen-da-vang.jpg', '<p>Sen đ&aacute; v&agrave;ng&nbsp;l&agrave; một trong loại sen đ&aacute; c&oacute; c&aacute;nh d&agrave;y, c&aacute;nh c&oacute;&nbsp;m&agrave;u v&agrave;ng xanh rất đẹp. Nếu bạn nh&igrave;n từ tr&ecirc;n xuống n&oacute; sẽ giống như một b&ocirc;ng hoa v&agrave; đang hướng mắt nh&igrave;n bạn. Lo&agrave;i loại mọng nước chịu được kh&ocirc; khạn v&agrave; c&oacute; sức sống bền bỉ.&nbsp;Sen đ&aacute; v&agrave;ng&nbsp;mang &yacute; nghĩa cho sự gi&agrave;u sang, ph&uacute; qu&yacute;.&nbsp;Sen đ&aacute;<strong> </strong>v&agrave;ng&nbsp;c&oacute; thể sống được ở c&aacute;c loại đất kh&aacute;c nhau v&agrave; n&oacute; c&oacute; thể chịu được hạn c&oacute; thể n&ecirc;n đến h&agrave;ng th&aacute;ng. Nếu c&acirc;y được tiếp x&uacute;c nhiều với &aacute;nh nắng viền l&aacute; sẽ c&oacute; m&agrave;u v&agrave;ng đậm rất đẹp. Ngược lại nếu c&acirc;y kh&ocirc;ng được tiếp x&uacute;c với &aacute;nh nắng l&aacute; sẽ thưa dần v&agrave; l&aacute; chuyển dần sang m&agrave;u v&agrave;ng xanh.</p>\r\n', 1, 9, 2),
(142, 'Sen đá ruby', 30000, '../public/images/sen-da-rubi_cay-xinh-600x600.jpg', '<p>C&acirc;y Sen đ&aacute; ruby&nbsp;thuộc họ cảnh thi&ecirc;n, nguy&ecirc;n sinh ở Mehic&ocirc;.&nbsp;Sen đ&aacute; ruby&nbsp;l&agrave; c&acirc;y th&acirc;n cỏ, nhiều nước, xanh quanh năm. Th&acirc;n c&acirc;y co ngắn lại, mọc rất nhiều rễ sinh kh&iacute; dạng sợi d&agrave;i, m&agrave;u x&aacute;m xanh, d&agrave;y v&agrave; nhiều nước, h&igrave;nh trứng ngược, đỉnh l&aacute; tr&ograve;n, hơi c&oacute; quầng m&agrave;u t&iacute;m, bề mặt c&oacute; phấn trắng, đ&aacute;m l&aacute; mọc tr&ecirc;n th&acirc;n c&oacute; dạng hoa sen. Nở hoa v&agrave;o th&aacute;ng 4 đến th&aacute;ng 6, cuống hoa nh&uacute; ra từ trong đ&aacute;m l&aacute;, hoa sắp xếp giống h&igrave;nh c&acirc;y d&ugrave;, cả c&acirc;y giống như được tạo th&agrave;nh bởi rất nhiều miếng ngọc thạch, thường được trang tr&iacute; tr&ecirc;n bệ cửa sổ, tr&ecirc;n b&agrave;n để xanh h&oacute;a căn ph&ograve;ng.</p>\r\n', 1, 9, 1),
(143, 'Sen đá tứ phương', 39000, '../public/images/sen-da-tu-phuongdo.jpg', '<p>Sen đ&aacute; tứ phương&nbsp;l&agrave; một trong những loại sen đ&aacute; kh&aacute; đặc biệt, c&oacute; c&aacute;nh l&aacute;&nbsp;chỉ mọc theo đ&uacute;ng 4 hướng x&aacute;c định v&agrave; được xếp chồng n&ecirc;n nhau một c&aacute;ch ngăn nắp, l&aacute; c&acirc;n nhẵn b&oacute;ng, thu&ocirc;n d&agrave;i về ph&iacute;a ngọn, đầu l&aacute; thường c&oacute; m&agrave;u đỏ như m&agrave;u lửa hoặc đỏ t&iacute;a, n&acirc;u đậm... L&aacute; mỏng v&agrave; bản rộng lại c&oacute; m&agrave;u đỏ nh&igrave;n rất đ&aacute;ng y&ecirc;u. Th&acirc;n c&acirc;y cũng c&oacute; m&agrave;u phớt v&agrave;ng, đỏ, t&ugrave;y theo k&iacute;ch thước của l&aacute; c&acirc;y th&acirc;n c&acirc;y cũng to dần.&nbsp;</p>\r\n', 1, 9, 1),
(144, 'Sen đá viền lửa', 30000, '../public/images/sd-vien-lua1.jpg', '<p>Sen Đ&aacute; Viền Đỏ&nbsp;c&oacute; cấu tạo dạng hoa thị với c&aacute;nh m&agrave;u xanh gần như xanh dương v&agrave; lớp&nbsp;viền m&agrave;u đỏ như lửa&nbsp;b&ecirc;n c&aacute;nh sen rất đẹp. C&acirc;y cho những ch&ugrave;m hoa m&agrave;u v&agrave;ng giống với hoa sống đời nhỏ xinh.</p>\r\n\r\n<p>C&acirc;y sen đ&aacute; viền lửa&nbsp;thường được d&ugrave;ng l&agrave;m c&acirc;y trang tr&iacute; trong văn ph&ograve;ng, b&agrave;n l&agrave;m việc, đặt gần kệ cửa sổ, l&agrave;m tiểu c&aacute;nh s&acirc;n vườn. Hơn thế nữa, với m&agrave;u sắc thu h&uacute;t &aacute;nh nh&igrave;n,&nbsp;Sen Đ&aacute; Viền Đỏ&nbsp;c&ograve;n được d&ugrave;ng để tạo n&ecirc;n bức tranh c&acirc;y treo tường rất đẹp, c&oacute; t&iacute;nh nghệ thuật cao.&nbsp;</p>\r\n', 1, 9, 1),
(145, 'Sen đá hàm cá mập', 50000, '../public/images/sen-da-ham-ca-map-2.jpg', '<p>Sen đ&aacute; h&agrave;m c&aacute; mập&nbsp;c&oacute; h&igrave;nh d&aacute;ng giống như h&agrave;m con c&aacute; mập, d&agrave;nh cho những người ưa th&iacute;ch cảm gi&aacute;c mạnh v&agrave; sự độc đ&aacute;o. C&acirc;y c&oacute; phiến l&aacute; kh&aacute; mỏng tr&ecirc;n viền l&aacute; c&oacute; những chiếc gai nhỏ&nbsp;giống như h&agrave;m răng con c&aacute; mập.</p>\r\n\r\n<p>L&aacute;&nbsp;c&acirc;y sen h&agrave;m c&aacute; mập&nbsp;xanh mướt mọc tủa ra xung quanh đi k&egrave;m với những gai nhọn tr&ocirc;ng thật &quot;dữ dằn&quot;. C&acirc;y ph&ugrave; hợp với người t&iacute;nh c&aacute;ch mạnh mẽ, kh&ocirc;ng đầu h&agrave;ng trước những kh&oacute; khăn cuộc sống. Ch&iacute;nh v&igrave; thế, c&acirc;y thường được d&ugrave;ng l&agrave;m qu&agrave; tặng d&agrave;nh cho bạn b&egrave;, đồng nghiệp, người th&acirc;n đi k&egrave;m với đ&oacute; l&agrave; lời nhắn &quot;cố l&ecirc;n nh&eacute;, thất bại chỉ đến khi ch&uacute;ng ta từ bỏ&quot;.</p>\r\n', 2, 9, 1),
(146, 'Sen đá lá tim', 19000, '../public/images/sd-tim.jpg', '<p>C&acirc;y sen đ&aacute; l&aacute; tim&nbsp;c&oacute; l&aacute; d&agrave;y, khi mọc l&ecirc;n tường mọc 2 l&aacute; một giống hệt&nbsp;h&igrave;nh tr&aacute;i tim&nbsp;c&oacute; m&agrave;u xanh xẫm nh&igrave;n c&acirc;y rất cứng c&aacute;p v&agrave; c&oacute; sức sống.Sen đ&aacute; l&aacute;<strong> </strong>tim&nbsp;cần &aacute;nh s&aacute;ng để quang hợp với n&oacute; cũng như c&aacute;c loại sen đ&aacute; kh&aacute;c th&iacute;ch &aacute;nh s&aacute;ng buổi sớm, c&oacute; thể chịu được &aacute;nh nắng trực tiếp nhưng kh&ocirc;ng n&ecirc;n để c&acirc;y ra &aacute;nh nắng qu&aacute; gắt như nắng m&ugrave;a h&egrave; buổi trưa. Nhiệt độ th&iacute;ch hợp l&agrave; 15 &ndash; 35 độ, vậy n&ecirc;n để c&acirc;y v&agrave;o chỗ c&oacute; m&aacute;i che nhưng vấn đảm bảo &aacute;nh s&aacute;ng như cửa sổ ban c&ocirc;ng, vừa c&oacute; &aacute;nh nắng m&agrave; tr&aacute;nh được mưa b&atilde;o.</p>\r\n', 1, 9, 1),
(147, 'Sen đá nhím đen', 30000, '../public/images/cay-sen-da-nhim-den-min.jpg', '<p>&nbsp;So với c&aacute;c loại Sen Đ&aacute; dạng đ&agrave;i th&igrave;&nbsp;sen Nh&iacute;m Đen&nbsp;kh&aacute; khỏe v&agrave; lạ mắt. C&acirc;y ph&ugrave; hợp cho người th&iacute;ch sưu tầm c&aacute;c giống Sen Đ&aacute;, về phong thủy c&acirc;y hợp với người mệnh Mộc, Thủy.&nbsp;Sen Đ&aacute; Nh&iacute;m Đen&nbsp;thuộc dạng đ&agrave;i, l&aacute; xếp đan xen với nhau, một c&acirc;y c&oacute; rất nhiều l&aacute;, l&aacute; c&oacute; h&igrave;nh trụ tr&ograve;n thu&ocirc;n nhọn ở đầu l&aacute; v&agrave; cuống l&aacute;, thường những phần được tiếp x&uacute;c nhiều với &aacute;nh nắng sẽ c&oacute; m&agrave;u đen, phần trong l&otilde;i th&igrave; nhạt dần gần với t&ocirc;ng m&agrave;u xanh. C&acirc;y ph&aacute;t triển theo dạng bụi, thường ra hoa v&agrave;o cuối thu, đầu đ&ocirc;ng.</p>\r\n', 1, 9, 1),
(148, 'Sen đá bắp cải tím', 45000, '../public/images/sen-da-bap-cai-tim.jpg', '<p>Sen Đ&aacute; Bắp Cải T&iacute;m&nbsp;với h&igrave;nh d&aacute;ng đ&aacute;ng y&ecirc;u, sẽ l&agrave; bạn ngạc nhi&ecirc;n ngay lần đầu nh&igrave;n thấy. Th&acirc;n l&aacute; của sen đ&aacute; c&oacute; m&agrave;u xanh thẫm tươi m&aacute;t, bao quanh l&agrave; diền hồng gợn s&oacute;ng bắt mắt, thu h&uacute;t sự ch&uacute; &yacute; ngay từ lần đầu bắt gặp, sen bắp cải c&oacute; thể ph&aacute;t triển với chiều rộng 30 &ndash; 40 cm, khi bắt gặp loại lớn n&agrave;y bạn sẽ thấy m&igrave;nh đang gặp một chiếc bắp cải khổng lồ v&agrave; cực đẹp, c&ograve;n với những c&acirc;y con th&igrave; rất xinh xắn v&agrave; đ&aacute;ng y&ecirc;u.</p>\r\n', 2, 9, 1),
(149, 'Sen đá tay gấu múp', 35000, '../public/images/sd-tay-gau-mup.jpg', '<p>Đ&acirc;y l&agrave; loại c&acirc;y mọng nước, mọc th&agrave;nh bụi. C&acirc;y c&oacute; chiều cao đến 50cm, ph&acirc;n nh&aacute;nh d&agrave;y đặc. L&aacute; tương đối d&agrave;y, mọng nước v&agrave; c&oacute; l&ocirc;ng, d&agrave;i đến hơn 3cm. Đầu l&aacute; c&oacute; c&aacute;c mấu nhọn, thường mang m&agrave;u đỏ hay t&iacute;m, xếp đều gọn g&agrave;ng nh&igrave;n y chang 1 b&agrave;n tay gấu m&uacute;p n&ecirc;n mới c&oacute; t&ecirc;n gọi&nbsp;sen Tay Gấu M&uacute;p. Hoa h&igrave;nh chu&ocirc;ng m&agrave;u v&agrave;ng nhạt hoặc cam hay cam đỏ t&ugrave;y theo điều kiện chăm s&oacute;c.<br />\r\n&nbsp;</p>\r\n', 0, 9, 1),
(150, 'Sen đá kim cương xanh lá', 75000, '../public/images/sd-kc.jpg', '<p>Sen đ&aacute; Kim Cương&nbsp;hay c&ograve;n được gọi l&agrave;&nbsp;sen đ&aacute; Ngọc. C&acirc;y c&oacute; m&agrave;u xanh tươi, l&aacute; c&acirc;y c&oacute; đầu tr&ograve;n, xanh long lanh như&nbsp;vi&ecirc;n kim cương xanh&nbsp;n&ecirc;n được mọi người y&ecirc;u qu&yacute; đặt cho c&aacute;i t&ecirc;n&nbsp;sen đ&aacute; Kim Cương. Cũng giống những d&ograve;ng hoa đ&aacute; kh&aacute;c c&acirc;y c&oacute; l&aacute; mọng nước, ưa nắng. C&acirc;y ra hoa v&agrave;o c&aacute;c m&ugrave;a trong năm.&nbsp;Hoa của sen đ&aacute; kim cương&nbsp;c&oacute; m&agrave;u v&agrave;ng v&agrave; đỏ nhạt. C&acirc;y thường được trồng trong c&aacute;c chậu bằng gỗ, thủy tinh, gốm xinh xắn.</p>\r\n', 2, 9, 2),
(152, 'Sen đá sedum dạ quang', 20000, '../public/images/sen-da-sedum-da-quang-2.jpg', '<p>Sedum dạ quang&nbsp;thuộc d&ograve;ng sedum l&agrave; d&ograve;ng bao gồm những c&acirc;y c&oacute; h&igrave;nh d&aacute;ng nhỏ x&iacute;u v&agrave; cực kỳ đ&aacute;ng y&ecirc;u. D&ograve;ng sedum cũng thuộc họ sen đ&aacute;, c&acirc;y mọc th&agrave;nh những bụi nhỏ c&oacute; h&igrave;nh d&aacute;ng dạng đ&agrave;i, m&agrave;u sắc s&aacute;ng nội bật nh&igrave;n rất bắt mắt. Ch&iacute;nh v&igrave; thế n&oacute; c&oacute; t&ecirc;n gọi l&agrave;&nbsp;sedum dạ quang.<br />\r\n&nbsp;</p>\r\n', 1, 9, 1),
(153, 'Xương rồng tai thỏ ', 45000, '../public/images/xuong-rong-tai-tho-.jpg', '<p>Với t&ecirc;n gọi đ&aacute;ng y&ecirc;u l&agrave; xương rồng tai thỏ, th&igrave; c&aacute;c bạn cũng c&oacute; thể h&igrave;nh dung được phần n&agrave;o h&igrave;nh dạng của loại c&acirc;y&nbsp;n&agrave;y. C&acirc;y c&oacute; dạng phiến dẹp, h&igrave;nh oval, từ phần th&acirc;n ch&iacute;nh sẽ mọc l&ecirc;n những nh&aacute;nh con y như h&igrave;nh d&aacute;ng của đ&ocirc;i tai thỏ. C&acirc;y c&oacute; nhiều gai bao phủ, nhưng đặc biệt đối với c&acirc;y xương rồng cảnh th&igrave; những gai n&agrave;y sẽ dưới dạng l&ocirc;ng tơ m&agrave;u v&agrave;ng kh&aacute; mềm mại. L&agrave; một trong những loại xương rồng c&oacute; thể nở hoa v&agrave;o kỳ sinh sản v&agrave; ra quả ngọt c&oacute; vị giống dưa hấu.</p>\r\n', 1, 9, 1),
(154, 'Xương rồng thanh sơn', 35000, '../public/images/xr-thanh-son1.jpg', '<p>Xương rồng thanh sơn sinh trưởng v&agrave; ph&aacute;t triển với h&igrave;nh d&aacute;ng tr&ugrave;ng tr&ugrave;ng điệp điệp giống y như một ngọn n&uacute;i phi&ecirc;n bản mini si&ecirc;u dễ thương.</p>\r\n\r\n<p>Với sức sống m&atilde;nh liệt v&agrave; khả năng sinh trưởng nhanh ch&oacute;ng, từ một th&acirc;n ch&iacute;nh sẽ mọc ra nhiều nh&aacute;nh con, ng&agrave;y qua ng&agrave;y &ldquo;ngọn n&uacute;i&rdquo; sẽ th&ecirc;m phần đồ xộ. Một nh&aacute;nh của xương rồng thanh sơn c&oacute; 5 kh&iacute;a, tr&ecirc;n mỗi kh&iacute;a sẽ c&oacute; gai nhỏ m&agrave;u v&agrave;ng v&agrave; cũng tương đối mềm mại</p>\r\n', 1, 9, 1),
(156, 'Xương rồng trứng chim', 55000, '../public/images/cây-xương-rồng-trứng-chim.jpg', '<p>C&acirc;y c&oacute; h&igrave;nh d&aacute;ng kh&aacute; nhỏ nhắn, thường l&agrave; h&igrave;nh tr&ograve;n hay dạng h&igrave;nh thoi, được bao phủ bởi lớp gai m&agrave;u trắng xung quanh. Nh&igrave;n tho&aacute;ng qua, bạn sẽ li&ecirc;n tưởng đến những quả trứng nhỏ nhắn được đặt ngay ngắn trong một chiếc chậu v&ocirc; c&ugrave;ng ngộ nghĩnh, đ&uacute;ng như t&ecirc;n gọi đ&aacute;ng y&ecirc;u của loại xương rồng mini n&agrave;y.</p>\r\n', 1, 9, 2),
(157, 'Xương rồng kim hổ', 90000, '../public/images/kim-ho-5.jpg', '<p>Xương rồng kim hổ&nbsp;c&oacute; m&agrave;u xanh đậm, dạng h&igrave;nh cầu nhưng kh&ocirc;ng tr&ograve;n đều m&agrave; lại g&oacute;c cạnh th&agrave;nh từng m&uacute;i, bao quanh th&acirc;n l&agrave; phần l&ocirc;ng v&agrave;ng c&ugrave;ng v&ocirc; số gai nhọn m&agrave;u v&agrave;ng kim tập trung nhiều phần đỉnh.</p>\r\n\r\n<p>Th&aacute;ng 6 đến th&aacute;ng 10 l&agrave; thời điểm m&agrave; hoa xương rồng kim hổ nở rộ, hoa c&oacute; m&agrave;u v&agrave;ng v&agrave; mọc từ đỉnh của th&acirc;n c&acirc;y.</p>\r\n', 1, 9, 2),
(158, 'Xương rồng gymno vân', 60000, '../public/images/xr-gymno2.jpg', '<p>C&acirc;y c&oacute; h&igrave;nh cầu, dọc th&acirc;n c&acirc;y c&oacute; c&aacute;c đốm nhỏ, đ&acirc;y l&agrave; loại c&acirc;y sinh con, khi trường th&agrave;nh n&oacute; sẽ đẻ ra nhiều c&acirc;y con xung quanh tạo th&agrave;nh bụi. Xương rồng Gymno cũng như những loại xương rồng kh&aacute;c, ch&uacute;ng đều c&oacute; hoa. Đặc điểm hoa của xương rồng Gymno l&agrave; kh&ocirc;ng c&oacute; l&ocirc;ng hay gai m&agrave; ch&uacute;ng rất mịn m&agrave;ng với nhiều m&agrave;u sắc như trắng, kem, hồng nhạt hoặc m&agrave;u v&agrave;ng.</p>\r\n', 2, 9, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id_Product` int(11) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id_Product`, `URL`) VALUES
(96, '../public/images/bạch-mã.jpg'),
(98, '../public/images/cay-7-sac-cau-vong-4.jpg'),
(99, '../public/images/cay-cam-nhung-xanh.jpg'),
(100, '../public/images/cay-cam-thach-2-247x296.jpg'),
(101, '../public/images/cau-tieu-tram-de-ban.jpg'),
(102, '../public/images/co-dong-tien-3.jpg'),
(103, '../public/images/cay-may-man-hinh-trai-tim-3-510x510.jpg'),
(103, '../public/images/co-may-man-chau-trai-tim-510x510.jpg'),
(104, '../public/images/cay-dai-de-2.jpg'),
(105, '../public/images/cay-dua-soc-vang-510x510.jpg'),
(106, '../public/images/cay-duoi-cong-tao-xanh-1-1.jpg'),
(107, '../public/images/cay-hanh-phuc-mix-tieu-canh-1.jpg'),
(107, '../public/images/cay-hanh-phuc-mix-tieu-canh-5.jpg'),
(107, '../public/images/cay-hanh-phuc-mix-tieu-canh.jpg'),
(108, '../public/images/cay-hoa-bong-1.jpg'),
(108, '../public/images/cay-hoa-bong-2.jpg'),
(109, '../public/images/cay-kim-ngan-no.jpg'),
(110, '../public/images/kim-tien-chuot-vang.jpg'),
(110, '../public/images/kim-tien-tho-dia-em-be.jpg'),
(111, '../public/images/cay-lan-cang-cua-1.jpg'),
(111, '../public/images/cay-lan-cang-cua-2.jpg'),
(112, '../public/images/cay-lan-quan-tu-1.jpg'),
(113, '../public/images/cay-luoi-ho-den-ban-1.jpg'),
(114, '../public/images/cay-ngoc-bich-01-510x510.png'),
(114, '../public/images/cay-ngoc-bich-510x510.jpg'),
(115, '../public/images/cay-loc-nhung-scaled-510x510.jpg'),
(116, '../public/images/cay-the-bai-hong-510x510.jpg'),
(118, '../public/images/cay-trau-ba-de-vuong-do-4.jpg'),
(118, '../public/images/cay-trau-ba-de-vuong-do-dep.jpg'),
(119, '../public/images/cay-do-la-chau-treo.jpg'),
(121, '../public/images/hoa-long-den-tim-treo-ban-cong.jpg'),
(122, '../public/images/vay-rong.jpg'),
(123, '../public/images/da-yen-thao-soc.jpg'),
(124, '../public/images/hoa-son-moi-480x600.jpg'),
(125, '../public/images/cay-phat-du-truc-1.jpg'),
(125, '../public/images/phat-loc-truc-thuy-sinh.jpg'),
(125, '../public/images/phat-loc-truc-thuy-sinh1.jpg'),
(126, '../public/images/cay-van-loc-thuy-sinh-5.jpg'),
(126, '../public/images/cay-van-loc-thuy-sinh-6-600x600.jpg'),
(127, '../public/images/7852_trau-ba-thuy-sinh.png'),
(127, '../public/images/cay-trau-ba-thuy-sinh-nen1.jpg'),
(128, '../public/images/093eca9a84f9e8d1d5dd248e0e81c3da.jpg'),
(128, '../public/images/cay-phu-quy-thuy-sinh-6.jpg'),
(129, '../public/images/cay-phat-loc-thuy-sinh.jpg'),
(129, '../public/images/phat-loc-sen.jpg'),
(130, '../public/images/cay-thanh-tam (1).jpg'),
(131, '../public/images/co-lan-chi-1-510x340.jpg'),
(131, '../public/images/co-lan-chi-510x340.jpg'),
(132, '../public/images/cay-truong-sinh-tieu-canh-1.jpg'),
(132, '../public/images/chau-cay-trương-sinh-de-ban-dep.jpg'),
(133, '../public/images/thiet-moc-lan-de-ban-4-510x510.jpg'),
(134, '../public/images/dua-hong-phung-1-510x394.jpg'),
(134, '../public/images/dua-hong-phung-2-510x383.jpg'),
(135, '../public/images/cay-truc-nhat-1-510x510.jpg'),
(135, '../public/images/cay-truc-nhat-2-510x510.jpg'),
(136, '../public/images/sen-da-nau-y-nghia.jpg'),
(136, '../public/images/sen-da-nau.jpg'),
(137, '../public/images/0-sen-da-phat-ba-dep.jpg'),
(137, '../public/images/sen-da-phat-ba-vuonthanhxuan.jpg'),
(138, '../public/images/sen-da-du.jpg'),
(138, '../public/images/sen_da_du_hong.webp'),
(139, '../public/images/thach-ngoc-do.jpg'),
(139, '../public/images/thach-ngoc-xanh.jpg'),
(139, '../public/images/thach-ngoc.jpg'),
(140, '../public/images/sen-da-mong-rong-vien-trang-1-1.jpg'),
(141, '../public/images/sen-da-vang2.jpg'),
(142, '../public/images/sen-da-ruby-4-600x375.jpg'),
(142, '../public/images/sendarubi.jpg'),
(143, '../public/images/sd-tu-phuong.jpg'),
(143, '../public/images/sen-da-tu-phuong.jpg'),
(144, '../public/images/sd-vien-lua.jpg'),
(144, '../public/images/vienlua.jpg'),
(145, '../public/images/cay-sen-da-ham-ca-map-dalat.jpg'),
(146, '../public/images/sd-la-tim.jpg'),
(146, '../public/images/sen-da-la-tim-dep-min.jpg'),
(147, '../public/images/nhim-den.jpg'),
(147, '../public/images/sd-nhim-den.jpg'),
(148, '../public/images/sd-bap-cai-tim.jpg'),
(149, '../public/images/sen-da-tay-gau-var.jpg'),
(150, '../public/images/sd-kim-cương.jpg'),
(152, '../public/images/Sedum-da-quang-scaled.jpg'),
(153, '../public/images/xuong-rong-tai-tho-cay-canh-mini-dep.jpg'),
(154, '../public/images/xr-thanh-son.jpg'),
(154, '../public/images/Xương-rồng-thanh-sơn.jpg'),
(156, '../public/images/xr-trg-chim.jpg'),
(156, '../public/images/xr-trung-chim.jpg'),
(157, '../public/images/kim-ho-4.jpg'),
(158, '../public/images/xr-gymno.jpg'),
(158, '../public/images/xr-gymno3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_Admin`);

--
-- Chỉ mục cho bảng `categorize`
--
ALTER TABLE `categorize`
  ADD PRIMARY KEY (`id_Categorize`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_Customer`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_Invoice`),
  ADD KEY `id_Admin` (`id_Admin`),
  ADD KEY `id_cus` (`id_cus`);

--
-- Chỉ mục cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id_Invoice`,`id_Product`),
  ADD KEY `id_Product` (`id_Product`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_Post`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_Product`),
  ADD KEY `id_Categorize` (`id_Categorize`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id_Product`,`URL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categorize`
--
ALTER TABLE `categorize`
  MODIFY `id_Categorize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_Invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id_Post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_Admin`) REFERENCES `admin` (`id_Admin`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id_Customer`);

--
-- Các ràng buộc cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`id_Invoice`) REFERENCES `invoice` (`id_Invoice`),
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`id_Product`) REFERENCES `product` (`id_Product`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_Categorize`) REFERENCES `categorize` (`id_Categorize`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`id_Product`) REFERENCES `product` (`id_Product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
