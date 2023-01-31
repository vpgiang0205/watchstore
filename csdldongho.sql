-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 09:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdldongho`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `ma_adm` int(11) NOT NULL,
  `ten_dn` varchar(30) NOT NULL,
  `level` int(10) NOT NULL,
  `mat_khau` varchar(30) NOT NULL,
  `ho` varchar(30) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`ma_adm`, `ten_dn`, `level`, `mat_khau`, `ho`, `ten`, `gioi_tinh`) VALUES
(1, 'admin', 1, 'admin', 'Võ', 'Giang', 2),
(7, 'user', 2, '123456', 'Lý', 'Minh', 2),
(8, '123', 0, '123', '123', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ct_dondathang`
--

CREATE TABLE `ct_dondathang` (
  `ma_dh` int(10) NOT NULL,
  `ma_sp` varchar(10) NOT NULL,
  `gia_ban` float NOT NULL,
  `sl_dat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_dondathang`
--

INSERT INTO `ct_dondathang` (`ma_dh`, `ma_sp`, `gia_ban`, `sl_dat`) VALUES
(43, '48', 123123000, 2),
(44, '47', 999999, 1),
(45, '48', 123123000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `ma_dh` int(10) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_dh` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ngay_gh` varchar(10) NOT NULL,
  `noi_giao` varchar(300) NOT NULL,
  `hien_trang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`ma_dh`, `ma_kh`, `ngay_dh`, `ngay_gh`, `noi_giao`, `hien_trang`) VALUES
(43, 48, '2021-06-12 05:42:02', '11/06/2020', ' cantho', 1),
(44, 48, '2021-06-14 07:44:42', '19/06/2020', ' cantho', 0),
(45, 50, '2021-06-15 09:21:38', '11/06/2020', '1 ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ho_kh` varchar(30) NOT NULL,
  `ten_kh` varchar(30) NOT NULL,
  `sdt` int(11) NOT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gioi_tinh` int(11) NOT NULL DEFAULT 0,
  `ten_dn` varchar(15) NOT NULL,
  `mat_khau` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ho_kh`, `ten_kh`, `sdt`, `dia_chi`, `email`, `gioi_tinh`, `ten_dn`, `mat_khau`) VALUES
(50, '1', '1', 1226558641, '1 ', 'admin@gmail.com', 2, '1', '1'),
(49, 'Võ', 'Giang', 834718218, 'cantho ', 'admin@gmail.com', 2, 'vpgiang', '123'),
(48, 'vo', 'giang', 834718218, ' cantho', 'vophonggiang0205@gmail.com', 2, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `ma_lh` int(11) NOT NULL,
  `ten_nguoi_lh` varchar(40) NOT NULL,
  `sdt_nguoi_lh` varchar(12) NOT NULL,
  `email_nguoi_lh` varchar(50) NOT NULL,
  `gioi_nguoi_lh` int(11) NOT NULL,
  `diachi_nguoi_lh` varchar(200) NOT NULL,
  `noi_dung` varchar(1000) NOT NULL,
  `ngay_lh` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`ma_lh`, `ten_nguoi_lh`, `sdt_nguoi_lh`, `email_nguoi_lh`, `gioi_nguoi_lh`, `diachi_nguoi_lh`, `noi_dung`, `ngay_lh`) VALUES
(16, 'Võ Phong Giang', '0834718218', 'vophonggiang0205@gmail.com', 2, 'CanTho', 'deptrai vailoz', '2021-05-28 13:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sanpham`
--

CREATE TABLE `loai_sanpham` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_sanpham`
--

INSERT INTO `loai_sanpham` (`ma_loai`, `ten_loai`) VALUES
(1, 'RICHARD MILLE2'),
(3, 'ROLEX'),
(4, 'HUBLOT'),
(5, 'CORUM');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ten_sp` varchar(30) NOT NULL,
  `gia` float NOT NULL,
  `hinh_anh` varchar(100) NOT NULL,
  `mo_ta` varchar(300) NOT NULL,
  `ngay_d` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `ma_loai`, `ten_sp`, `gia`, `hinh_anh`, `mo_ta`, `ngay_d`, `trang_thai`) VALUES
(44, 4, 'HUBLOT CLASSIC FUSION 581.NX.7', 123, 'hublot-classic-fusion-chronograph-45mm-521-nx-1171-lr-18.jpg', 'Case Shape Round\r\nCase Dimensions 33mm\r\nCase Material Titanium\r\nDial Color Blue\r\nCrystal Scratch Resistant Sapphire\r\nBezel Fixed\r\nScrew-in Crown No\r\nWater Resistance 50m/150ft\r\nCase Back Solid\r\nBand Material Alligator/Crocodile Leather\r\nColor/Finish Blue\r\nClasp Push Button Folding Clasp\r\nMovement Qu', '2021-06-11 00:44:32', 0),
(46, 3, 'ROLEX PLAY DATE', 321, 'Rolex-DatejustII-116333-14644-190318-120353-.png', 'Case Shape Round\r\nCase Dimensions 33mm\r\nCase Material Titanium\r\nDial Color Blue\r\nCrystal Scratch Resistant Sapphire\r\nBezel Fixed\r\nScrew-in Crown No\r\nWater Resistance 50m/150ft\r\nCase Back Solid\r\nBand Material Alligator/Crocodile Leather\r\nColor/Finish Blue\r\nClasp Push Button Folding Clasp\r\nMovement Qu', '2021-06-10 17:01:01', 0),
(47, 4, 'Hublot-ClassicFusion-521.NX.11', 999999, 'Hublot-ClassicFusion-521.NX.1171.LR-188332-1-210519-134139.png', 'HuHuLot', '2021-06-11 00:51:17', 0),
(48, 1, 'RICHARD-MILLE-RM030-AO-TI-ATZ-', 123123000, 'RICHARD-MILLE-RM030-AO-TI-ATZ-LE-MENS-CLASSIC1.jpg', '', '2021-06-11 00:57:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma_tt` int(11) NOT NULL,
  `tieu_de` varchar(50) NOT NULL,
  `hinh_anh` varchar(100) NOT NULL,
  `noi_dung` varchar(10000) NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tt`, `tieu_de`, `hinh_anh`, `noi_dung`, `ngay_dang`) VALUES
(37, 'Đắm chìm với những chiếc đồng hồ Orient lấy cảm hứ', 'Orient-Rolex-2.jpg', '<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\"><em style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder; font-size: 21.16px;\">Rolex là một trong những thương hiệu đồng hồ nổi tiếng hàng đầu trên toàn thế giới với những sản phẩm được đánh giá rất cao ở tất cả mọi phương diện. Ra đời và nhắm vào phân khúc dành riêng cho giới thượng</span><span style=\"box-sizing: border-box; font-weight: bolder; font-size: 21.16px;\">&nbsp;lưu nên mỗi thiết kế của Rolex đều mang đến sự đẳng cấp sang trọng cùng chất lượng đỉnh cao. Nhắc đến cái tên Rolex là người ta nghĩ đến ngay sự xa xỉ và không phải ai cũng có thể sở hữu chúng.</span></em></span></p><p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\">–&nbsp; Với mức giá đắt đỏ của đồng hồ Rolex chính hãng nhiều người yêu thích thương hiệu đồng hồ này đã tìm đến những chiếc đồng hồ Homage chính hãng có thiết kế tương tự, nhưng giá thành mềm hơn rất nhiều và dễ dàng sở hữu. Vậy đồng hồ Homage là gì ?</span></p><figure id=\"attachment_5220\" aria-describedby=\"caption-attachment-5220\" class=\"wp-caption aligncenter\" style=\"box-sizing: border-box; margin: 0px auto 2em; clear: both; max-width: 100%; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); width: 719px;\"><img loading=\"lazy\" class=\"wp-image-5220 size-full\" src=\"https://vinawatch.com/wp-content/uploads/2020/08/Orient-rolex-1.jpeg\" alt=\"Orient giống Rolex \" width=\"719\" height=\"480\" srcset=\"https://vinawatch.com/wp-content/uploads/2020/08/Orient-rolex-1.jpeg 719w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-rolex-1-599x400.jpeg 599w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-rolex-1-600x401.jpeg 600w\" sizes=\"(max-width: 719px) 100vw, 719px\" style=\"box-sizing: border-box; border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1;\"><figcaption id=\"caption-attachment-5220\" class=\"wp-caption-text\" style=\"box-sizing: border-box; text-align: center; padding: 0.4em; font-size: 0.9em; background: rgba(0, 0, 0, 0.05); font-style: italic;\">Đồng hồ Orient giống Rolex</figcaption></figure><p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\">–&nbsp; Đồng hồ Homage là đồng hồ của các hãng nhỏ hơn với các sản phẩm có thiết kế giống đến 90% so với thiết kế của những hãng đồng hồ lớn có danh tiếng khác nhưng giá thành lại rẻ hơn gấp nhiều lần đáp ứng được mọi nhu cầu của người mong muốn sở hữu. Trong đó thương hiệu đồng hồ Orient là một trong những cái tên được người tiêu dùng ưa chuộng.</span></p><h3 id=\"ftoc-heading-1\" class=\"ftwp-heading\" style=\"box-sizing: border-box; color: rgb(10, 10, 10); width: 792px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Roboto, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; -webkit-box-decoration-break: clone; color: rgb(0, 0, 0); font-size: 23px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Orient Oyster – “Đồng hồ Rolex” của Nhật Bản</span></span></h3><p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\">–&nbsp; Nếu là fan của đồng hồ Rolex thì chắc hẳn các anh em đã không còn xa lạ với những chiếc đồng hồ Rolex Oyster Day Date nhưng thay vì phải bỏ ra một số tiền đắc đỏ thậm chí là khó để mà sở hữu được thì những chiếc đồng hồ Orient Oyster Day Date lại là lựa chọn số một.</span></p><figure id=\"attachment_5221\" aria-describedby=\"caption-attachment-5221\" class=\"wp-caption aligncenter\" style=\"box-sizing: border-box; margin: 0px auto 2em; clear: both; max-width: 100%; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); width: 900px;\"><img loading=\"lazy\" class=\"size-full wp-image-5221\" src=\"https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-2.jpg\" alt=\"Orient giống Rolex\" width=\"900\" height=\"593\" srcset=\"https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-2.jpg 900w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-2-607x400.jpg 607w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-2-768x506.jpg 768w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-2-600x395.jpg 600w\" sizes=\"(max-width: 900px) 100vw, 900px\" style=\"box-sizing: border-box; border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1;\"><figcaption id=\"caption-attachment-5221\" class=\"wp-caption-text\" style=\"box-sizing: border-box; text-align: center; padding: 0.4em; font-size: 0.9em; background: rgba(0, 0, 0, 0.05); font-style: italic;\"><em style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Đồng hồ Orient giống Rolex</span></em>&nbsp;với sắc vàng đầy trang trọng</figcaption></figure><p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\">–&nbsp; Nếu không để ý đến logo thương hiệu in trên mặt số thì chúng ta có thể nhầm lẫn đây chính là một chiếc đồng hồ Rolex với độ hoàn thiện cao tỉ mỉ đến từng chi tiết. Giống đến 95% so với mặt số được đính đá sang trọng thay các vạch chỉ giờ, trên lớp kính sapphire chống trầy là giọt lệ ở cửa sổ lịch ngày tạo điểm nhấn cho chiếc đồng hồ.</span></p><p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\">–&nbsp; Ngoài ra những chiếc đồng hồ Orient Oyster cũng sở hữu hữu nhiều phiên bản với màu sắc khác nhau như những chiếc đồng hồ Rolex. Dây và vỏ đều được mạ vàng với công nghệ PVD cao cấp mang lại sự sang trọng và độ bền màu với thời thời gian.</span></p><h3 id=\"ftoc-heading-2\" class=\"ftwp-heading\" style=\"box-sizing: border-box; color: rgb(10, 10, 10); width: 792px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Roboto, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; -webkit-box-decoration-break: clone; color: rgb(0, 0, 0); font-size: 23px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Bộ máy và những tiện ích trên Orient Oyster – “Tiểu Rolex” đến từ&nbsp;<a href=\"https://vinawatch.com/\" style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: rgb(10, 10, 10); text-decoration-line: none;\">đồng hồ Nhật Bản</a></span></span></h3><p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-size: 18.4px; font-family: \" times=\"\" new=\"\" roman\",=\"\" times,=\"\" serif;\"=\"\">–&nbsp; Những chiếc đồng hồ Orient Oyster sở hữu kính sapphire chống trầy xước vượt trội cùng 21 chân kính cho những va chạm trong hoạt động đều không làm ảnh hưởng đến bộ máy bên trong.</span></p><figure id=\"attachment_5222\" aria-describedby=\"caption-attachment-5222\" class=\"wp-caption aligncenter\" style=\"box-sizing: border-box; margin: 0px auto 2em; clear: both; max-width: 100%; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); width: 960px;\"><img loading=\"lazy\" class=\"size-full wp-image-5222\" src=\"https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-3.jpg\" alt=\"Đồng hồ Orient giống Rolex \" width=\"960\" height=\"640\" srcset=\"https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-3.jpg 960w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-3-600x400.jpg 600w, https://vinawatch.com/wp-content/uploads/2020/08/Orient-Rolex-3-768x512.jpg 768w\" sizes=\"(max-width: 960px) 100vw, 960px\" style=\"box-sizing: border-box; border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1;\"><figcaption id=\"caption-attachment-5222\" class=\"wp-caption-text\" style=\"box-sizing: border-box; text-align: center; padding: 0.4em; font-size: 0.9em; background: rgba(0, 0, 0, 0.05); font-style: italic;\"><em style=\"box-sizing: border-box;\">Đồng hồ Orient với mặt đen sang trọng lịch lãm</em></figcaption></figure>', '2021-06-15 09:24:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`ma_adm`),
  ADD UNIQUE KEY `ten_dn` (`ten_dn`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`ma_dh`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`),
  ADD UNIQUE KEY `ten_dn` (`ten_dn`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`ma_lh`);

--
-- Indexes for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma_tt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `ma_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `ma_dh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `ma_lh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
