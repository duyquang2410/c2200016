-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2024 lúc 04:37 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `Ma_BP` int(11) NOT NULL,
  `Ten_BP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`Ma_BP`, `Ten_BP`) VALUES
(1, 'Bán hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatlieu`
--

CREATE TABLE `chatlieu` (
  `Ma_CL` int(11) NOT NULL,
  `Loai_CL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chatlieu`
--

INSERT INTO `chatlieu` (`Ma_CL`, `Loai_CL`) VALUES
(1, 'Vàng 18k đính đá Ruby'),
(2, 'Vàng 14k'),
(3, 'Vàng trắng 14k đinh đá Topaz'),
(4, 'Vàng 18k đính đá ECZ'),
(5, 'Vàng 18k đính Ngọc trai'),
(6, 'Bạc đính đá'),
(7, 'Vàng 10k đính đá'),
(8, 'Vàng trắng 18k');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietchatlieu`
--

CREATE TABLE `chitietchatlieu` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_CL` int(11) NOT NULL,
  `Gia_CL` int(11) NOT NULL,
  `HamLuong` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiaodich`
--

CREATE TABLE `chitietgiaodich` (
  `Ma_GD` int(11) NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `SoLuong_GD` int(11) NOT NULL,
  `DonGia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgiaodich`
--

INSERT INTO `chitietgiaodich` (`Ma_GD`, `Ma_SP`, `SoLuong_GD`, `DonGia`) VALUES
(1, 1, 1, 14411000),
(1, 2, 1, 22499000),
(1, 3, 1, 14001000),
(1, 4, 1, 9859000),
(1, 5, 1, 3590000),
(1, 6, 1, 4480000),
(1, 7, 1, 595000),
(1, 8, 1, 1495000),
(1, 9, 1, 43304400);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_pn`
--

CREATE TABLE `chitiet_pn` (
  `Ma_PN` int(11) NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `SoLuong_PN` int(11) NOT NULL,
  `DonGia_PN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cochatlieu`
--

CREATE TABLE `cochatlieu` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_CL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Ma_DM` int(11) NOT NULL,
  `Ten_DM` varchar(20) NOT NULL,
  `HinhAnh_DM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`Ma_DM`, `Ten_DM`, `HinhAnh_DM`) VALUES
(1, 'Trang Sức Cưới', 'upload/danhmuc1.jpg'),
(2, 'Trang Sức Vàng', 'upload/danhmuc2.jpg'),
(3, 'Trang Sức Bạc', 'upload/danhmuc3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `Ma_DMSP` int(11) NOT NULL,
  `Ma_DM` int(11) NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `Ten_DMSP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `Ma_GD` int(11) NOT NULL,
  `Ma_KH` int(11) NOT NULL,
  `Ma_LGD` int(11) NOT NULL,
  `Ma_NV` int(11) NOT NULL,
  `Ngay_GD` date NOT NULL,
  `TongThanhToan_HD` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`Ma_GD`, `Ma_KH`, `Ma_LGD`, `Ma_NV`, `Ngay_GD`, `TongThanhToan_HD`) VALUES
(1, 1, 1, 1, '2024-03-12', 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Ma_KH` int(11) NOT NULL,
  `HoTen_KH` varchar(50) NOT NULL,
  `Sdt_KH` char(10) NOT NULL,
  `MatKhau_KH` varchar(32) DEFAULT NULL,
  `Email_KH` varchar(150) DEFAULT NULL,
  `NgaySinh_KH` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`Ma_KH`, `HoTen_KH`, `Sdt_KH`, `MatKhau_KH`, `Email_KH`, `NgaySinh_KH`) VALUES
(1, 'Khách Hàng', '0123456789', '123', 'khach@gmail.com', '2024-03-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigiaodich`
--

CREATE TABLE `loaigiaodich` (
  `Ma_LGD` int(11) NOT NULL,
  `Ten_LGD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaigiaodich`
--

INSERT INTO `loaigiaodich` (`Ma_LGD`, `Ten_LGD`) VALUES
(1, 'Mua vàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Ma_NCC` int(11) NOT NULL,
  `Ten_NCC` varchar(50) NOT NULL,
  `SDT_NCC` char(10) NOT NULL,
  `DiaChi_NCC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Ma_NV` int(11) NOT NULL,
  `Ma_BP` int(11) NOT NULL,
  `Ten_NV` varchar(50) NOT NULL,
  `NgaySinh_NV` date NOT NULL,
  `Sdt_NV` char(10) NOT NULL,
  `DiaChi_NV` varchar(255) NOT NULL,
  `MatKhau_NV` varchar(32) DEFAULT NULL,
  `Email_NV` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Ma_NV`, `Ma_BP`, `Ten_NV`, `NgaySinh_NV`, `Sdt_NV`, `DiaChi_NV`, `MatKhau_NV`, `Email_NV`) VALUES
(1, 1, 'Nhân Viên', '2024-03-14', '0123456789', 'Cần Thơ', '123', 'nhan@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `Ma_PN` int(11) NOT NULL,
  `Ma_NV` int(11) NOT NULL,
  `Ma_NCC` int(11) NOT NULL,
  `NgayLap_PN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_DM` int(11) NOT NULL,
  `HinhAnh_SP` varchar(100) NOT NULL,
  `Ten_SP` varchar(50) NOT NULL,
  `TrongLuong_Sp` float NOT NULL,
  `MoTa_SP` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Ma_SP`, `Ma_DM`, `HinhAnh_SP`, `Ten_SP`, `TrongLuong_Sp`, `MoTa_SP`) VALUES
(1, 1, 'upload/nhancuoivang18kdinhdaruby.jpg', 'Nhẫn cưới Vàng 18K đính đá Ruby', 14.1934, 'Hãy để các chất liệu kết hợp cùng nhau trong mùa cưới này. Nàng dâu có thể chọn cho mình chiếc nhẫn trong BST Trầu Cau được chế tác từ vàng 18K và ghi điểm với điểm nhấn đá Ruby đính một cách tinh xảo. Không chỉ là món trang sức làm đẹp mà nó còn là món quà hồi môn tuyệt vời dành cho nàng dâu mới.\r\n\r\n\r\n'),
(2, 1, 'upload/nhankimcuongvang14k.jpg', 'Nhẫn Kim cương Vàng 14K ', 11.222, 'Kim cương vốn là món trang sức mang đến niềm kiêu hãnh và cảm hứng thời trang bất tận. Sở hữu riêng cho mình món trang sức kim cương chính là điều mà ai cũng mong muốn. Chiếc nhẫn Disney được chế tác từ vàng 14K cùng điểm nhấn kim cương với 57 giác cắt chuẩn xác, tạo nên món trang sức đầy sự sang trọng và đẳng cấp.\r\nKim cương đã đẹp, trang sức kim cương lại càng mang sức hấp dẫn khó cưỡng. Sự kết hợp mới mẻ này chắc chắn sẽ tạo nên dấu ấn thời trang hiện đại và giúp quý cô trở nên nổi bật, tự tin và thu hút sự ngưỡng mộ của mọi người.\r\n'),
(3, 1, 'upload/bongtaivangtrang14kdindatopaz.jpg', 'Bông tai Vàng Trắng 14K đính đá Topaz', 14.6675, 'Lấy cảm hứng từ mặt gậy như ý thể hiện những điều tốt lành cùng sợi dây tơ hồng thể hiện sự kết nối không điểm dừng trong tình yêu, đôi bông tai vàng trắng 14K đính đá Topaz trong BST Kim Bảo Như Ý là một trong những món nữ trang quý cô cần có trong dịp tết 2024 này.\r\nĐược chế tác từ vàng trắng 14K cùng sự lấp lánh của đá Topaz, đôi bông tai không chỉ là món trang sức làm đẹp mà còn là vật phẩm mang đến sự bình an và thể hiện sự kết nối trong tình yêu cho người đeo.\r\n\r\n'),
(4, 2, 'upload/nhanvang18kdindaecz.jpg', 'Nhẫn Vàng 18K đính đá ECZ', 9.84788, 'Dù ở lứa tuổi nào, theo phong cách cổ điển hay hiện đại thì sắc màu của những viên đá ECZ màu trắng vẫn luôn biết chiều lòng các tín đồ thời trang. Mô phỏng nét kiêu sa của nàng, chiếc nhẫn vàng nhẹ nhàng kết đính những viên đá trắng tròn trịa trên chất vàng 18K, mang đến sản phẩm đầy tinh tế, tôn lên nhan sắc của phái đẹp.\r\n \r\n'),
(5, 2, 'upload/matdaychuyenvang18kdinhngoc.jpg', ' Mặt dây chuyền Vàng 18K đính Ngọc trai', 2.40367, 'Ngọc trai Freshwater, còn được gọi là ngọc nước ngọt, rất phù hợp cho những cô nàng muốn sở hữu những viên ngọc trai tròn đẹp, óng ánh lớp xà cừ với ngân sách hợp lý. Cùng với hàm lượng vàng 18k đạt mức cân bằng trong chế tác, món trang sức của nàng sẽ có một sự tinh xảo đặc biệt.\r\n\r\n'),
(6, 2, 'upload/bongtaivang10kdinhda.jpg', 'Bông tai Vàng 10K Đính đá Synthetic', 6.36955, 'Đôi bông tai được chế tác từ chất liệu vàng 10K kết hợp màu sắc lung linh của đá Synthetic mang đến vẻ đẹp sang trọng và đẳng cấp.\r\nThiết kế quả táo nhỏ xinh tinh tế, hiện đại, tôn lên vẻ đẹp thanh tao và tinh tế của cô nàng cùng kiểu dáng trẻ trung, năng động, phù hợp với mọi phong cách và sở thích. Đây sẽ là món quà lý tưởng cho những dịp đặc biệt như sinh nhật, kỷ niệm,... để bày tỏ tình cảm chân thành của mình.\r\n\r\n'),
(7, 3, 'upload/bongtaibacdinhda.jpg', 'Bông tai Bạc đính đá STYLE', 4.80733, 'Bông tai bạc từ STYLE được thiết kế kiểu dáng cá tính ,tinh tế với điểm nhấn đính đá trên chất liệu bạc 92.5, sáng lấp lánh làm nền tạo điểm nhấn giúp tôn lên vẻ đẹp của nàng xinh, gây ấn tượng với nhiều người xung quanh.\r\nDù là cuộc gặp mặt cuối năm nhẹ nhàng hay những bữa tiệc sôi động, nàng hãy luôn toát lên vẻ thanh lịch nổi bật cá tính với sự kết hợp hoàn hảo của một chiếc váy đen sang trọng cùng đôi bông tai phong cách.\r\n\r\n'),
(8, 3, 'upload/lactaybacdinhda.jpg', 'Lắc tay Bạc đính đá ', 9.83265, 'Sở hữu kiểu dáng không quá xa lạ nhưng lại cực kỳ độc đáo, chiếc lắc được chế tác từ chất liệu bạc 92.5 khoác lên mình vẻ ngoài trẻ trung, phá cách và “high fashion”.\r\nĐiểm tô cho cổ tay nàng với chiếc lắc bạc xinh xắn, đây chắc chắn sẽ là một nét chấm phá tinh tế tô điểm thêm nét cá tính, năng động và trẻ trung cho các cô gái. Tuy chỉ sở hữu thiết kế đơn giản với điểm nhấn đính đá nho nhỏ, nhưng nó lại là phụ kiện giúp các cô nàng có vẻ ngoài thanh lịch, nữ tính và trở nên nổi bật hơn bao giờ hết.\r\n'),
(9, 3, 'upload/kiengvangtrangy18k.jpg', 'Kiềng Vàng trắng Ý 18K', 54.2517, 'Sở hữu kiểu dáng độc đáo với lối thiết kế hiện đại, chiếc kiềng vàng Ý 18K không chỉ mang vẻ đẹp phá cách mà còn tô điểm nét thời thượng. Chiếc kiềng được chế tác từ vàng Ý 18K và ghi điểm với sự độc lạ, thiết kế sẽ cùng nàng kiêu hãnh tỏa sáng trên mọi bước đường. Sở hữu kiểu dáng mảnh mai, sản phẩm sẽ làm nổi bật vẻ đẹp kiêu sa của nàng.\r\nĐã là quý cô yêu thời trang và yêu thích cái đẹp thời thượng, nàng chắc chắn không thể bỏ qua phiên bản kiềng vàng Ý này.\r\n\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`Ma_BP`);

--
-- Chỉ mục cho bảng `chatlieu`
--
ALTER TABLE `chatlieu`
  ADD PRIMARY KEY (`Ma_CL`);

--
-- Chỉ mục cho bảng `chitietchatlieu`
--
ALTER TABLE `chitietchatlieu`
  ADD PRIMARY KEY (`Ma_SP`,`Ma_CL`),
  ADD KEY `FK_CHITIETC_CHATLIEU__CHATLIEU` (`Ma_CL`);

--
-- Chỉ mục cho bảng `chitietgiaodich`
--
ALTER TABLE `chitietgiaodich`
  ADD PRIMARY KEY (`Ma_GD`,`Ma_SP`),
  ADD KEY `FK_CHITIETG_SANPHAM_C_SANPHAM` (`Ma_SP`);

--
-- Chỉ mục cho bảng `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD PRIMARY KEY (`Ma_PN`,`Ma_SP`),
  ADD KEY `FK_CHITIET__CHITIET_P_SANPHAM` (`Ma_SP`);

--
-- Chỉ mục cho bảng `cochatlieu`
--
ALTER TABLE `cochatlieu`
  ADD PRIMARY KEY (`Ma_SP`,`Ma_CL`),
  ADD KEY `FK_COCHATLI_COCHATLIE_CHATLIEU` (`Ma_CL`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Ma_DM`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`Ma_DMSP`),
  ADD KEY `FK_DANHMUCS_DANHMUC_D_DANHMUC` (`Ma_DM`),
  ADD KEY `FK_DANHMUCS_DM_SANPHA_SANPHAM` (`Ma_SP`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`Ma_GD`),
  ADD KEY `FK_GIAODICH_CUAKHACHH_KHACHHAN` (`Ma_KH`),
  ADD KEY `FK_GIAODICH_LAPHOADON_NHANVIEN` (`Ma_NV`),
  ADD KEY `FK_GIAODICH_LOAIGD_GD_LOAIGIAO` (`Ma_LGD`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Ma_KH`);

--
-- Chỉ mục cho bảng `loaigiaodich`
--
ALTER TABLE `loaigiaodich`
  ADD PRIMARY KEY (`Ma_LGD`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Ma_NCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Ma_NV`),
  ADD KEY `FK_NHANVIEN_NHANVIEN__BOPHAN` (`Ma_BP`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`Ma_PN`),
  ADD KEY `FK_PHIEUNHA_PHIEULAPD_NHANVIEN` (`Ma_NV`),
  ADD KEY `FK_PHIEUNHA_TUNHACUNG_NHACUNGC` (`Ma_NCC`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Ma_SP`),
  ADD KEY `FK_SANPHAM_THUOCDANH_DANHMUC` (`Ma_DM`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietchatlieu`
--
ALTER TABLE `chitietchatlieu`
  ADD CONSTRAINT `FK_CHITIETC_CHATLIEU__CHATLIEU` FOREIGN KEY (`Ma_CL`) REFERENCES `chatlieu` (`Ma_CL`),
  ADD CONSTRAINT `FK_CHITIETC_SANPHAM_D_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Các ràng buộc cho bảng `chitietgiaodich`
--
ALTER TABLE `chitietgiaodich`
  ADD CONSTRAINT `FK_CHITIETG_HOADON_CH_GIAODICH` FOREIGN KEY (`Ma_GD`) REFERENCES `giaodich` (`Ma_GD`),
  ADD CONSTRAINT `FK_CHITIETG_SANPHAM_C_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Các ràng buộc cho bảng `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD CONSTRAINT `FK_CHITIET__CHITIET_P_PHIEUNHA` FOREIGN KEY (`Ma_PN`) REFERENCES `phieunhap` (`Ma_PN`),
  ADD CONSTRAINT `FK_CHITIET__CHITIET_P_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Các ràng buộc cho bảng `cochatlieu`
--
ALTER TABLE `cochatlieu`
  ADD CONSTRAINT `FK_COCHATLI_COCHATLIE_CHATLIEU` FOREIGN KEY (`Ma_CL`) REFERENCES `chatlieu` (`Ma_CL`),
  ADD CONSTRAINT `FK_COCHATLI_COCHATLIE_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Các ràng buộc cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD CONSTRAINT `FK_DANHMUCS_DANHMUC_D_DANHMUC` FOREIGN KEY (`Ma_DM`) REFERENCES `danhmuc` (`Ma_DM`),
  ADD CONSTRAINT `FK_DANHMUCS_DM_SANPHA_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Các ràng buộc cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `FK_GIAODICH_CUAKHACHH_KHACHHAN` FOREIGN KEY (`Ma_KH`) REFERENCES `khachhang` (`Ma_KH`),
  ADD CONSTRAINT `FK_GIAODICH_LAPHOADON_NHANVIEN` FOREIGN KEY (`Ma_NV`) REFERENCES `nhanvien` (`Ma_NV`),
  ADD CONSTRAINT `FK_GIAODICH_LOAIGD_GD_LOAIGIAO` FOREIGN KEY (`Ma_LGD`) REFERENCES `loaigiaodich` (`Ma_LGD`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NHANVIEN_NHANVIEN__BOPHAN` FOREIGN KEY (`Ma_BP`) REFERENCES `bophan` (`Ma_BP`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_PHIEUNHA_PHIEULAPD_NHANVIEN` FOREIGN KEY (`Ma_NV`) REFERENCES `nhanvien` (`Ma_NV`),
  ADD CONSTRAINT `FK_PHIEUNHA_TUNHACUNG_NHACUNGC` FOREIGN KEY (`Ma_NCC`) REFERENCES `nhacungcap` (`Ma_NCC`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SANPHAM_THUOCDANH_DANHMUC` FOREIGN KEY (`Ma_DM`) REFERENCES `danhmuc` (`Ma_DM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
