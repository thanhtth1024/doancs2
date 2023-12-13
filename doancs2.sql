-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2023 lúc 08:17 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doancs2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(9) NOT NULL,
  `madh` varchar(20) NOT NULL,
  `iduser` int(6) NOT NULL,
  `nguoidat_ten` varchar(50) NOT NULL,
  `nguoidat_email` varchar(50) NOT NULL,
  `nguoidat_tel` varchar(20) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `total` int(9) NOT NULL,
  `ship` int(6) NOT NULL DEFAULT 0,
  `tongthanhtoan` int(9) NOT NULL,
  `pttt` tinyint(1) NOT NULL COMMENT '1: tttn; 2: ck',
  `status` tinyint(1) NOT NULL COMMENT '0: chờ xét duyệt; 1: đã vận chuyển; 2: đã nhận hàng; 3: hủy',
  `ngaylap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `madh`, `iduser`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `total`, `ship`, `tongthanhtoan`, `pttt`, `status`, `ngaylap`) VALUES
(6, 'N799906', 7, 'T&T', '0793572609', 'ThanhChang@gmail.com', 'Trường Đại học CNTT và TT VH', 155000, 15000, 170000, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `noidung` text NOT NULL,
  `ngaybl` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `order_id`, `idpro`, `soluong`, `price`) VALUES
(7, 6, 35, 1, 35),
(8, 6, 33, 1, 120);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `stt` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `home`, `stt`) VALUES
(1, 'Văn Học', 0, 0),
(2, 'Ngoại Ngữ', 0, 0),
(3, 'Tâm Lý - Giáo Dục', 0, 0),
(4, 'Thiếu Nhi', 0, 0),
(5, 'Truyện Tranh', 0, 0),
(6, 'Kiến Thức - Khoa Học', 0, 0),
(7, 'Kinh Tế - Quản Lý', 0, 0),
(8, 'Truyện Cổ Tích', 0, 0),
(9, 'Y Học - Sức Khỏe', 0, 0),
(10, 'Lịch Sử', 0, 0),
(11, 'Nghệ Thuật - Giải Trí', 0, 0),
(12, 'Tiểu Thuyết - Truyện Dài', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `maquyen` int(11) NOT NULL,
  `tenquyen` varchar(20) NOT NULL,
  `chitietquyen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`maquyen`, `tenquyen`, `chitietquyen`) VALUES
(1, 'Customer', 'Khách hàng có tài khoản'),
(2, 'Admin', 'Quản trị viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `tacgia` varchar(200) NOT NULL,
  `nxb` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `giagiam` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `mota` varchar(1000) NOT NULL,
  `iddm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `tacgia`, `nxb`, `price`, `giagiam`, `view`, `bestseller`, `mota`, `iddm`) VALUES
(1, 'Các Danh Nhân Khoa Học', 'cacdanhnhankhoahoc.jpg', 'Catmint Books', 'NXB Trẻ', 120000, 110000, 0, 0, '<p><i>Trong cuộc sống hằng ngày, chúng ta luôn được tận hưởng thành tựu của những quá trình lao động, tìm tòi khám phá và cống hiến không mệt mỏi của bao thế hệ người đi trước, đặc biệt là những thành tựu của các danh nhân đã góp phần thay đổi lịch sử loài người, trong đủ các lĩnh vực như khoa học, nghệ thuật hay chiến đấu cho lý tưởng vì cộng đồng… Những thành tựu này mang tầm thế giới nhưng cũng hiển hiện gần gũi trong cuộc sống đời thường của mỗi chúng ta. Vậy có bao giờ bạn tò mò muốn biết về cuộc đời của những danh nhân đó không?&nbsp;</i></p>', 6),
(2, 'Vương Quốc Hà Lan', 'vuongquochalan.jpg', 'Phạm Việt Anh', 'NXB Trẻ', 120000, 100000, 2, 0, '<p><i>Cuốn sách ghi lại những cảm nhận về những điều đáng quý của người dân Hà Lan mà tác giả- nguyên Đại sứ VN tại Hà Lan trải nghiệm trong thời gian làm việc nơi này. Các vấn đề được xếp theo thứ tự ABC, mỗi mục là một vấn đề, khái niệm hay thực tế cuộc sống… để minh họa cho những nét đặc sắc của đất nước hoa tulip.</i></p>', 6),
(3, 'Đời Ngắn Đừng Ngủ Dài', 'doingandungngudai.jpg', 'Robin Sharma', 'NXB Trẻ', 85000, 80000, 0, 0, '<p><i>Mọi lựa chọn đều giá trị. Mọi bước đi đều quan trọng. Cuộc sống vẫn diễn ra theo cách của nó, không phải theo cách của ta. Hãy kiên nhẫn. Tin tưởng. Hãy giống như người thợ cắt đá, đều đặn từng nhịp, ngày qua ngày. Cuối cùng, một nhát cắt duy nhất sẽ phá vỡ tảng đá và lộ ra viên kim cương. Người tràn đầy nhiệt huyết và tận tâm với việc mình làm không bao giờ bị chối bỏ. Sự thật là thế.”</i></p><p><i>Bằng những lời chia sẻ thật ngắn gọn, dễ hiểu về những trải nghiệm và suy ngẫm trong đời, Robin Sharma tiếp tục phong cách viết của ông từ cuốn sách Điều vĩ đại đời thường để mang đến cho độc giả những bài viết như lời tâm sự, vừa chân thành vừa sâu sắc.\"</i></p>', 7),
(4, 'Nước Âu Lạc', 'nuocaulac.jpg', 'Trần Bạch Đằng', 'NXB Trẻ', 70000, 50000, 2, 0, '<p><i>Hùng Vương thứ 18 mải mê tửu sắc, chẳng màng việc nước đã làm cho Văn Lang hùng mạnh năm nào bước vào suy vong. An Dương Vương lên ngôi, hòa hợp hai bộ tộc Lạc Việt và Âu Việt, lập nên nước Âu Lạc. Vào buổi ấy, do vẫn chưa có chữ viết, người Âu Lạc vẫn tiếp tục truyền tải những ước mơ, khát vọng thông qua những truyền thuyết vẫn còn mang đậm màu sắc huyền thoại, kì bí nhưng qua đó vẫn cho ta biết thêm nhiều điều về cuộc sống của người dân lúc bấy giờ. Âu Lạc hùng mạnh, Âu Lạc phồn thịnh nên sẽ chẳng thể nào tránh được sự dòm ngó của phiên bang. Tần Thủy Hoàng cai trị cả một Trung Hoa rộng lớn vẫn ngó nghiêng về Âu Lạc. Nhưng Âu Lạc chẳng thiếu tướng tài, binh dũng để chiến đấu với kẻ thù, khiến cho kẻ thù phải khiếp sợ, vỡ mộng xâm lược nước ta. Nhưng An Dương Vương lơ là cảnh giác, bởi Mỵ Châu nhẹ dạ cả tin, nước ta đã rơi vào ách thống trị của phương Bắc. Từ đây, một ngàn năm Bắc thuộc đen tối của dân ta đã bắt đầu.</i></p>', 10),
(5, 'Nơi Không Có Tuyết', 'noikhongcotuyet.jpg', 'Huỳnh Trọng Khang', 'NXB Trẻ', 75000, 70000, 1, 0, '<p><i>Nơi không có tuyết - tức là nói về miền nhiệt đới ẩm ương oi nồng. Chốn đó ngày xưa có cậu nhóc hết sức tò mò với cỗ máy lạ lùng có tên “tủ lạnh”, đôi buổi trưa hè lại rón rén mở cánh cửa ấy ra để thỏa niềm đam mê xem “tuyết” ra đời. Nhiều năm sau nhóc con ấy lớn khôn, dốc lòng học tập, dành dụm tiền tự lắp ráp cho mình chiếc phi cơ hòng chinh phục đỉnh tuyết băng vĩnh cửu Hy Mã Lạp Sơn. Giữa đêm trường bão tuyết, số mệnh đã run rủi cho “phi công” ấy mối duyên lạ kỳ với một bông tuyết xa xưa, bé tí ti thôi, nhưng là chứng nhân cho bao nỗi buồn thương của muôn người muôn vật trên Trái Đất tự xa xôi ngút ngàn. Một cuộc hàn huyên bắt đầu...</i></p>', 1),
(6, 'Dị Bản', 'diban.jpg', 'Nguyễn Đình Khoa', 'NXB Trẻ', 95000, 85000, 2, 0, '<p><i>&nbsp; Nhân vật tôi, Phúc Giang, một kỹ sư cầu đường, trong lần nghiệm thu hiện trường thi công cây cầu dây văng thì xảy ra tai nạn sập dàn giáo của trụ cầu vừa mới thi công trước đó không lâu. Do bị va đập trong tai nạn nên khi rớt xuống sông, anh đã ngất đi. Giang được Frank, một tay bác học thiên tài cứu sống.</i></p><p><i>&nbsp; Khi tỉnh dậy và trở lại cuộc sống bình thường, Giang gần như ở trong trạng thái nửa tỉnh nửa mơ. Trong thời gian đó, những ký ức về gia đình và cuộc sống ở vùng quê sông nước lần lượt quay trở lại. Dư ảnh của quá khứ cùng những day dứt không có lời đáp về những người thân xung quanh khiến Giang khao khát muốn tìm thấy lời đáp.</i></p>', 1),
(7, 'Cảm Ơn Vì Đã Vượt Qua', 'camon.jpg', 'Minh Phúc', 'NXB Trẻ', 75000, 70000, 0, 0, '<p><i>Tản văn của Minh Phúc nâng niu ký ức, cảm xúc và đầy niềm tin vào tương lai với lòng biết ơn, trân trọng từng khoảnh khắc sống. Như nhà báo Trương Gia Hòa đã từng nhận xét: \"Không có một cốt truyện để gây tò mò, tản văn của Minh Phúc bám vào một ký ức, một lát cắt cảm xúc hoặc một tình huống nào đó rồi mọc ra những chiếc lá chữ. Người phụ nữ thích trồng cây từ thời tấm bé này cứ khiến tôi nghĩ chữ của cô là lá. Chữ nào cũng đẹp, tươi xanh, chữ trước hắt ánh sáng cho chữ sau. Lôi kéo, quyến dụ mình phải đọc cho hết bài, cho hết sách. Để rồi, một vùng ký ức hiện ra, một cơn mơ xưa cũ tái hiện chập chờn.\"</i></p>', 1),
(8, 'Không Có Sông Quá Dài', 'khongcosongquadai.jpg', 'Phan Văn Trường', 'NXB Trẻ', 150000, 135000, 17, 0, '<p><i>“Tinh thần của sách KHÔNG CÓ SÔNG QUÁ DÀI không khác cuốn Không có đỉnh quá cao. Đó là tạo sự tự tin và sự kiên trì. Nhưng các tác giả ở đây là thế hệ của những người trẻ đã lớn lên và ý thức được mình phải khởi nghiệp, rồi bắt đầu đối mặt với nhiều khó khăn. Bài toán này, ai ai cũng phải đi qua, vì nó sẽ giúp cho các bạn trẻ hiểu được giá trị của mình, sở trường cũng như sở đoản. Các bạn trẻ sẽ phải dùng đến cả trí tuệ lẫn nội lực trong hành trình tạo dựng sự nghiệp. Cuộc sống muốn như thế, và ta cũng nên làm theo ý như thế.</i></p>', 7),
(9, 'Bếp Ấm Của Mẹ', 'bepam.jpg', 'Đỗ Phương Thảo', 'NXB Trẻ', 120000, 110000, 2, 0, '<p>“Bếp Ấm Của Mẹ” không chỉ lưu giữ những món ăn, những câu chuyện về một thời khó quên của<br>lịch sử. Nó còn là tâm nguyện của bà Đỗ Phương Thảo, người con gái Phố Hiến và Kẻ Chợ, với<br>trách nhiệm giữ gìn và chuyên chở ký ức truyền lại cho thế hệ sau.</p>', 1),
(10, 'Lạc Đà Bay', 'lacdabay.jpg', 'Võ Đăng Khoa', 'NXB Trẻ', 70000, 65000, 0, 0, '<p>Cắt gọt từng lát nhỏ của đời sống, Khoa gom lại trong một tập truyện ngắn những mảnh đời với những câu chuyện rất riêng, và kể lại với cái nhìn cảm thông, trân trọng, và đầy thương mến.<br>Viết về cái chết, về những xấu xa với giọng văn ung dung, bình thản, đầy vẻ thường tình.<br>Viết về những dằn vặt đeo theo suốt cuộc đời con người một cách điềm tĩnh, thản nhiên, nhưng day dứt.<br>Dung dị, bình thản, Khoa viết về những mảnh nhỏ đời người. Rồi cũng nhẹ nhàng, Khoa để lại đâu đó giữa những câu văn từng hồi day dứt.</p>', 1),
(11, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'toithayhoavangtrencoxanh.jpg', 'Nguyễn Nhật Ánh', 'NXB Trẻ', 82000, 80000, 0, 0, '<p><i>Những câu chuyện nhỏ xảy ra ở một ngôi làng nhỏ: chuyện người, chuyện cóc, chuyện ma, chuyện công chúa và hoàng tử , rồi chuyện đói ăn, cháy nhà, lụt lội,... Bối cảnh là trường học, nhà trong xóm, bãi tha ma. Dẫn chuyện là cậu bé 15 tuổi tên Thiều. Thiều có chú ruột là chú Đàn, có bạn thân là cô bé Mận. Nhưng nhân vật đáng yêu nhất lại là Tường, em trai Thiều, một cậu bé học không giỏi. Thiều, Tường và những đứa trẻ sống trong cùng một làng, học cùng một trường, có biết bao chuyện chung. Chúng nô đùa, cãi cọ rồi yêu thương nhau, cùng lớn lên theo năm tháng, trải qua bao sự kiện biến cố của cuộc đời.</i><br><i>Tác giả vẫn giữ cách kể chuyện bằng chính giọng trong sáng hồn nhiên của trẻ con. 81 chương ngắn là 81 câu chuyện hấp dẫn với nhiều chi tiết thú vị, cảm động, có những tình tiết bất ngờ, từ đó lộ rõ tính cách người. Cuốn sách, vì thế, có sức ám ảnh.</i></p>', 1),
(12, 'Mắt Biếc', 'matbiec.jpg', 'Nguyễn Nhật Ánh', 'NXB Trẻ', 110000, 100000, 0, 0, '<p><i>Mắt biếc kể về cuộc đời của nhân vật chính tên Ngạn. Ngạn sinh ra và lớn lên ở một ngôi làng tên là làng Đo Đo (thuộc xã </i><a href=\"https://vi.wikipedia.org/wiki/B%C3%ACnh_Qu%E1%BA%BF\"><i>Bình Quế</i></a><i> - huyện </i><a href=\"https://vi.wikipedia.org/wiki/Th%C4%83ng_B%C3%ACnh\"><i>Thăng Bình</i></a><i> - tỉnh </i><a href=\"https://vi.wikipedia.org/wiki/Qu%E1%BA%A3ng_Nam\"><i>Quảng Nam</i></a><i> - cũng là nguyên quán của tác giả). Lớn lên cùng với Ngạn là cô bạn hàng xóm có đôi mắt tuyệt đẹp tên là Hà Lan. Tuổi thơ của Ngạn và Hà Lan gắn bó với bao nhiêu kỉ niệm cùng đồi sim, đánh trống trường... Tình bạn trẻ thơ dần dần biến thành tình yêu thầm lặng của Ngạn dành cho Hà Lan. Đến khi lớn hơn một chút, cả hai phải rời làng ra thành phố để tiếp tục học. Khi tấm lòng của Ngạn luôn hướng về Hà Lan và về làng, thì Hà Lan không cưỡng lại được cám dỗ của cuộc sống xa hoa nơi đô thị và ngã vào vòng tay của Dũng. Việc Hà Lan ngã vào vòng tay Dũng, một thanh niên nhà giàu, sành điệu, giỏ', 1),
(13, 'Tiếng Nhật - IT', 'tiengnhatit.jpg', 'AOTS - The Association For Overseas Technical Scholarship', 'NXB Trẻ', 45000, 35000, 0, 0, '<p><i>Nằm trong bộ \"Tiếng Nhật tại hiện trường lao động_Sổ tay từ vựng\".</i><br><i>Tập hợp các từ vựng tại hiện trường làm việc cần thiết dành cho người lao động nước ngoài làm việc tại Nhật Bản và dành cho việc đào tạo thực tập sinh kỹ năng, tu nghiệp sinh...</i><br><i>Bao gồm:</i><br><i>- 136 từ vựng cơ bản</i><br><i>- 145 từ vựng chuyên ngành IT.</i><br><i>Sử dụng các mẫu câu trong giáo trình \"Tiếng Nhật cho mọi người_Sơ cấp 1\".</i></p>', 2),
(14, 'Chỉ Có Bạn ', 'chicoban.jpg', 'Amber Rae', 'NXB Trẻ', 135000, 130000, 0, 0, '<p><i>Đây là một cuốn sách mang ý nghĩa động viên, gỡ rối và nâng đỡ tinh thần. Tác giả không áp đặt hoặc đưa ra câu trả lời chính xác cho vấn đề, mà chỉ cho bạn đọc cách đặt câu hỏi để từng bước tự gỡ rối và chữa lành cho chính mình.</i><br><i>Bạn đọc có thể khám phá cuốn sách này theo nhiều cách như: đọc từ đầu đến cuối như một cuốn sách bình thường; đọc chọn lọc những chủ đề mình thích, hoặc dùng nó như một “cuốn sách tiên tri”: hỏi một câu hỏi – Tôi cần nghe điều gì? Làm cách nào để tôi tiếp tục? - rồi chọn mở một trang và đọc những câu hỏi gợi mở từ tác giả, để từ đó tự soi vào bản thân và tìm ra câu trả lời có sẵn ở trong mình.</i></p>', 3),
(15, 'Thế Kỷ Cô Đơn', 'thekicodon.jpg', 'Noreena Hertz', 'NXB Trẻ', 200000, 150000, 0, 0, '<p><i>Quanh ta, mối quan hệ giữa người với người ngày càng xa cách. Công nghệ không phải là nguyên nhân duy nhất của tình trạng này. Những nguyên nhân khác không kém phần quan trọng bao gồm: việc tổ chức lại nơi làm việc, sự di cư ồ ạt từ thôn quê lên thành phố, quan điểm đặt lợi ích cá nhân lên trên lợi ích tập thể...</i></p><p><i>Ngay cả trước khi cơn đại dịch toàn cầu đem đến cho chúng ta những thuật ngữ như \"cách ly\" hay \"giãn cách xã hội\", sự cô đơn đã và đang trở thành một vấn nạn xã hội của thế kỷ 21. Sự cô đơn ảnh hưởng đến sức khỏe, tiền tài và hạnh phúc của con người. Chưa bao giờ \"đại dịch cô đơn\" lan rộng như lúc này, nhưng đây cũng là thời điểm để chung tay để giải quyết vấn đề này.</i></p>', 3),
(16, 'Chú Khủng Long Đi Lạc', 'chukhunglongdilac.jpg', 'Fuu.J', 'NXB Trẻ', 35000, 30000, 1, 0, '<p><i>Mải đuổi theo Ngôi Sao Hư Ảo, Khủng Long đi lạc xa khỏi Làng Tinh Cầu.</i><br><i>Buồn bã, cơ đơn, Khủng Long cất tiếng khóc. Bạn bè ở Làng Tinh Cầu nghe tiếng khóc của Khủng Long, nhưng không gọi Khủng Long về được, vì tiếng khóc của nó nhấn chìm mọi âm thanh.</i><br><i>Cho đến khi, tất cả những người bạn cùng nghĩ ra một cách…</i><br><i>CÂU CHUYỆN ĐỂ EM BIẾT RẰNG: NHỮNG ĐIỀU THÂN THƯƠNG KHI BẠN BÈ BÊN NHAU &nbsp;NHƯ BÀI HÁT TA CÙNG HÁT, NHƯ MÓN ĂN TA CÙNG ĂN, &nbsp;NHƯ TRÒ CHƠI TA CÙNG VUI CHƠI... LÀ THỨ QUÝ GIÁ ĐỂ TÌNH BẠN CÒN ĐÓ MÃI.</i><br><i>Chú Khủng Long đi lạc - nằm trong bộ sách GỢI MỞ TRÍ TƯỞNG TƯỢNG, - &nbsp;làm giàu trí tưởng tượng và khả năng ngôn ngữ của trẻ em.</i></p>', 4),
(17, 'Thị Trấn Hoa Mười Giờ -1', '1af29adec65c1802414d.jpg', 'Lê Phan', 'NXB Trẻ', 70000, 65000, 0, 0, '<p><i>“Thị trấn Hoa Mười Giờ” là bộ truyện tranh dài kỳ thuộc thể loại thường nhật (slice of life), hài hước và mang nhiều tính trải nghiệm của tác giả. Nội dung xoay quanh cuộc sống thường ngày ở một thị trấn có tên Hoa Mười Giờ nơi mà mà toàn bộ những đứa trẻ đều ra đời vào lúc mười giờ sáng. Thế nhưng thay vì như những búp măng non làm nên vẻ đẹp cho làng xóm thì đám con nít Ổi, Cóc, Mận, Xoài chính là nguyên nhân khiến thị trấn không bao giờ được bình yên, thậm chí là… bình thường.</i></p>', 5),
(18, 'Thị Trấn Hoa Mười Giờ -2', 'a82f2d037181afdff690.jpg', 'Lê Phan', 'NXB Trẻ', 70000, 65000, 1, 0, '<p><i>“Thị trấn Hoa Mười Giờ” là bộ truyện tranh dài kỳ thuộc thể loại thường nhật (slice of life), hài hước và mang nhiều tính trải nghiệm của tác giả. Nội dung xoay quanh cuộc sống thường ngày ở một thị trấn có tên Hoa Mười Giờ nơi mà mà toàn bộ những đứa trẻ đều ra đời vào lúc mười giờ sáng. Thế nhưng thay vì như những búp măng non làm nên vẻ đẹp cho làng xóm thì đám con nít Ổi, Cóc, Mận, Xoài chính là nguyên nhân khiến thị trấn không bao giờ được bình yên, thậm chí là… bình thường.</i></p>', 5),
(19, 'Thị Trấn Hoa Mười Giờ -3', 'thi-tran-hoa-muoi-gio-tap-3.jpg', 'Lê Phan', 'NXB Trẻ', 70000, 65000, 8, 0, '<p><i>“Thị trấn Hoa Mười Giờ” là bộ truyện tranh dài kỳ thuộc thể loại thường nhật (slice of life), hài hước và mang nhiều tính trải nghiệm của tác giả. Nội dung xoay quanh cuộc sống thường ngày ở một thị trấn có tên Hoa Mười Giờ nơi mà mà toàn bộ những đứa trẻ đều ra đời vào lúc mười giờ sáng. Thế nhưng thay vì như những búp măng non làm nên vẻ đẹp cho làng xóm thì đám con nít Ổi, Cóc, Mận, Xoài chính là nguyên nhân khiến thị trấn không bao giờ được bình yên, thậm chí là… bình thường.</i></p>', 5),
(20, 'Thám Tử Lừng Danh Conan - 98', 'truyentranh1.jpg', 'Gosho Aoyama', 'NXB Trẻ', 35000, 10000, 6, 0, '<p>Sera Masumi tiếp tục thăm dò Haibara Ai và ở thế đối đầu với Okiya Subaru!&nbsp;<br>Trong khi đó, Conan đã tiến đến gần chân tưởng của “em gái ngoài lãnh địa” - Mary…!?&nbsp;<br>Haneda Shukichi bất ngờ gặp án mạng tại buổi học nhóm shogi! Vụ án diễn biến bất ngờ với nhiều khúc ngoặt để rồi cuối cùng, Akai Shuichi xuất hiện…!? Không dừng lại ở đó, tập 98 còn mang tới vụ án giải mật mã của một người giúp việc, nơi cuộc đua phá án giữa Conan và Heiji đã khởi phát từ mưu kế của Ooka Momiji!!</p>', 5),
(21, 'Tấm Cám', 'truyentranh2.jpg', 'Nhiều Tác Giả', 'NXB Trẻ', 100000, 90000, 1, 0, '<p>Cuốn truyện bao gồm những truyện hay, tiêu biểu đủ các thể tài cổ tích. Với bao gồm 6 câu chuyện cổ tích hấp dẫn, sẽ cuốn hút trẻ thơ bước vào thế giới cổ tích với những thiện ác phân minh, hay những câu chuyện về tình nghĩa anh em,...</p>', 8),
(22, 'Lược Sử Thế Giới', 'luocsuthegioi.jpg', 'E.H. Gombrich', 'NXB Trẻ', 265000, 250000, 5, 0, '<p><i>Như một bài thơ về lịch sử thế giới, E. H. Gombrich lịch lãm dẫn người đọc đi từ thời kỳ Đồ đá đến thời kỳ của năng lượng nguyên tử, với những biến cố lịch sử phức tạp nhất, các trào lưu tư tưởng khó hiểu nhất, những nhân vật lịch sử đa chiều nhất, các thành tựu lớn lao nhất của trí tuệ con người… tất cả đều được tác giả mô tả và diễn giải dễ hiểu đến bất ngờ.</i></p>', 10),
(23, '1111 - Nhật Kí Sáu Vạn Dặm ', '1111.jpg', 'Trần Đặng Đăng Khoa', 'NXB Trẻ', 125000, 115000, 2, 0, '<p>Trần Đặng Đăng Khoa bắt đầu hành trình vạn dặm vòng quanh thế giới từ ngày 01/06/2017 tại cửa khẩu Mộc Bài (Tây Ninh). Với chiếc xe 100cc mang biển số Việt Nam, trong hành trình kéo dài 1.111 ngày, anh đã đặt chân tới 7 châu lục, 65 quốc gia và vùng lãnh thổ, băng qua đường xích đạo 8 lần.&nbsp;<br>Mỗi ngày trong chuyến đi - trừ ba tháng cuối cùng kẹt ở Mozambique vì dịch COVID-19 - anh đều ghi lại nhật ký, và cuốn sách này chính là tập hợp những trang viết của anh theo mốc thời gian. Những trang du ký vút nhanh, xoay đều như những vòng bánh xe, cuốn ta theo cùng trong chuyến đi “không hẹn ngày về”. Những ngoạn mục của thiên nhiên, những sặc sỡ của văn hóa, những bình dị ấm áp của cuộc sống con người, cộng với những kinh nghiệm và trải nghiệm rất cá nhân của một kẻ độc hành ham phiêu lưu, tất cả hứa hẹn sẽ thỏa mãn trí tưởng tượng và tò mò của độc giả, truyền cảm hứng cho những đam mê xê dịch biến thành những chuyến đi tiếp nối.</p>', 11),
(24, 'Sài Gòn Của Em', 'saigon.jpg', 'Hoàng Nguyên', 'NXB Trẻ', 100000, 70000, 4, 0, '<p><i><strong>Sài Gòn của em</strong></i> là sách tranh kiến thức cho trẻ em về Sài Gòn, do họa sĩ và nhóm tác giả Việt Nam thực hiện. Một cuộc dạo chơi Sài Gòn ở những địa điểm thân thuộc và xuyên thời gian từ lúc vùng đất hình thành đến bây giờ. Sách có 70% minh họa bằng tranh vẽ, ảnh, đồ họa, &nbsp;và &nbsp;30% lời dẫn chuyện. Nhân vật chính là chú sóc và bồ câu.</p>', 11),
(26, 'Sơ Cứu Nhanh', 'socuu.jpg', 'Trần Thị Huyên Thảo', 'NXB Trẻ', 130000, 11000, 0, 0, '<p>Tập hợp tất cả những hướng dẫn ngắn gọn và cơ bản về các thao tác SƠ CẤP CỨU trước khi đưa đến bệnh viện. Chỉ cần nhìn hình, đọc những hướng dẫn ngắn gọn là có thể làm được mọi việc này khi không may có người bị bệnh đột ngột.<br>Tất cả là 51 trường hợp gắn với 51 bệnh cần cấp cứu.</p>', 9),
(27, 'Cảm Hứng Sắc Màu', 'sacmau.jpg', 'Valentia Harper', 'NXB Trẻ', 58000, 50000, 0, 0, '<p><i>Đời là một chuyến phiêu lưu tuyệt vời, và tất cả những giấc mơ của chúng ta đều có thể trở thành sự thật! Hãy giữ lấy những giấc mơ của bạn với&nbsp;Cảm hứng sắc màu, cuốn sách tô màu đem đến niềm hy vọng và sự khích lệ tinh thần qua từng trang. Bạn sẽ tìm thấy trong sách 30 bức vẽ đem lại thư giãn được thiết kế để khuyến khích khả năng sáng tạo và khơi dậy tinh thần.</i></p><p><i>Bạn hãy cùng họa sĩ tài hoa Valentina Harper cá nhân hóa những bức vẽ tinh tế của cô. Những họa tiết mềm mại, phức tạp đã được Valentina kết hợp với những lời lẽ đem lại sự phấn chấn. Họa sĩ đồng thời là tác giả có sách bán chạy Marie Browning tiếp sức bằng những tranh tô màu hoàn chỉnh làm mẫu.</i></p>', 11),
(28, 'Vũ Trụ Thu Nhỏ Rực Rỡ', 'vutru.jpg', 'Valentia Harper', 'NXB Trẻ', 58000, 50000, 0, 0, '<p><i>Đồ hình vũ trụ thu nhỏ thể hiện sự cân bằng và trọn vẹn. Những đồ hình vũ trụ này là biểu tượng đồ họa cho tiềm thức của chúng ta. Sáng tạo những đồ hình vũ trụ xinh đẹp có thể giúp bình hòa, hợp nhất, và tái lập trật tự cho đời sống nội tâm của chúng ta. Hãy khám phá sức mạnh bí truyền của đồ hình vũ trụ với 30 bức tranh minh họa đem lại thư giãn và sáng tạo trong cuốn sách này, họa sĩ tài hoa Valentina Harper mở ra một thế giới của những chu kỳ linh thiêng.</i></p>', 11),
(29, 'Lê Quý Đôn', 'lequydon.jpg', 'Nhiều Tác Giả', 'NXB Trẻ', 75000, 70000, 0, 0, '<p><i>Lê Quý Đôn was a mandarin serving under the Lê trung hưng (Revival Lê or Later Lê Restoration) dynasty. He was also a renown poet and a great scholar in Vietnam’s feudal history.&nbsp;</i><br><i>Lê’s life was spent in the turmoil of the 18th century. The court was deeply corrupt, and the common people lived in difficult poverty. One would have thought Lê might never have a chance to realize his full potential. But Lê Quý Đôn was also a man with great willpower and an insatiable thirst for knowledge. Lê Quý Đôn thrived in the face of adversity. His name lived on as one of the great minds in Vietnam’s history.&nbsp;</i></p>', 10),
(30, 'Lý Thường Kiệt', 'lythuongkiet.jpg', 'Nhiều Tác Giả', 'NXB Trẻ', 85000, 80000, 0, 0, '<p><i>The history of Vietnam is one of heroes. Talented leaders, both military and otherwise have always emerged in times of trouble.&nbsp;</i><br><i>There was one such time when the Song in the North was ready to launch their invasion whilst the Champa in the South was planning their revenge. The two enemies came together to bring their wrath on Đại Việt.&nbsp;</i></p>', 10),
(31, 'Ăn Gì Không Chết', 'angikhongchet.jpg', 'Michael Greger, Gene Stone', 'NXB Trẻ', 320000, 310000, 0, 0, '<p><i>Rất nhiều cái chết trẻ có thể ngăn ngừa được đơn giản bằng những thay đổi trong chế độ ăn và lối sống. Trong cuốn Ăn gì không chết, bác sĩ Michael Greger, bác sĩ, chuyên gia dinh dưỡng nổi tiếng quốc tế, và là nhà sáng lập NutritionFacts.org, nghiên cứu tỉ mỉ 15 nguyên nhân hàng đầu dẫn đến chết trẻ ở Hoa Kỳ – bệnh tim, ung thư, tiểu đường, Parkinson, cao huyết áp, và nhiều bệnh khác – giải thích tại sao can thiệp dinh dưỡng và lối sống đôi khi có thể thành công hơn thuốc kê toa và các giải pháp phẫu thuật và thuốc men khác, cho chúng ta sống khỏe mạnh hơn.</i></p>', 9),
(32, 'Những Viên Đạn Thần Kì', 'vienthuoc.jpg', 'Thomas Hager', 'NXB Trẻ', 180000, 175000, 0, 0, '<p><i>Cuốn sách nói về 10 loại \"thuốc\" phổ biến nhất trên thị trường bây giờ: các loại có gốc thuốc phiện như morphine, thuốc giảm đau nhóm opioid, thuốc gốc statin giúp giảm cholesterol, Viagra... Cách tiếp cận đi từ lịch sử xa xưa để người đọc hiểu gốc rễ vấn đề. Rồi bóc mẽ cách các hãng dược đang thao túng thị trường, cách các bác sĩ đang kê đơn không thực sự cần thiết... Từ đó người đọc hiểu được cách dùng thuốc đúng. Văn phong nhẹ nhõm, hài hước, kể chuyện duyên dáng giúp đề tài về lịch sử y dược dễ tiếp cận.</i></p>', 9),
(33, 'Trái Tim Của Bé', 'traitimcuabe.jpg', 'Ngô Bảo Khoa', 'NXB Trẻ', 120000, 100000, 1, 0, '<p><i>\"Trái tim của bé\" &nbsp;là một tài liệu hữu ích của Bác sĩ Ngô Bảo Khoa dành cho ba mẹ và những gia đình có trẻ bị bệnh tim bẩm sinh hoặc bệnh tim&nbsp;thứ phát. Sách cung cấp những kiến thức đầy đủ và mới nhất về căn bệnh tim ở trẻ nhỏ giúp phụ huynh hiểu rõ cơ chế bệnh sinh, những quan sát, dự đoán cũng như cách phòng ngừa và chữa trị cơ bản.</i></p>', 9),
(34, 'Cây Khế', 'caykhe.jpg', 'Nhiều Tác Giả', 'NXB Trẻ', 35000, 10000, 0, 0, '', 8),
(35, 'Sự Tích Dưa Hấu', 'sutichduahau.jpg', 'Nhiều Tác Giả', 'NXB Trẻ', 35000, 30000, 1, 0, '', 8),
(36, 'Thạch Sanh', 'thachsach.jpg', 'Nhiều Tác Giả', 'NXB Trẻ', 35000, 30000, 0, 0, '', 8),
(37, 'Bứt Phá Thời Số Hóa', 'thoidai.jpg', 'Nitin Seth', 'NXB Trẻ', 300000, 295000, 0, 0, '<p>Đại dịch Covid-19 đã đẩy nhanh tốc độ thay đổi. Đối với nhiều doanh nghiệp truyền thống, việc áp dụng các khả năng kỹ thuật số đã đi từ chỗ có thì tốt thành kêu gọi hành động khẩn cấp. Không chỉ doanh nghiệp cần tìm hiểu để thích ứng nhanh với các quy tắc mới của trò chơi và điều hướng hiện thực mới, các chuyên gia trẻ cũng cần nhanh chóng thích nghi để tồn tại và phát triển trong thời đại số chóng mặt này.</p>', 7),
(38, 'Thời Đại AI', 'ai.jpg', ' Henry A. Kissinger, Eric Schmidt, Daniel Huttenlocher', 'NXB Trẻ', 170000, 120000, 0, 0, '<p>Internet đang tràn ngập thông tin sai lệch xuất phát từ AI tạo sinh. Các nghệ sĩ, nhà văn, và nhiều người làm các công việc chuyên môn khác đang thấp thỏm lo sợ họ sẽ bị thay thế bằng AI. AI đang khám phá ra những loại thuốc mới, điều khiển các phương tiện bay không người lái, và biến đổi thế giới quanh ta – thế nhưng ta không hiểu được những quyết định mà AI đưa ra, và cũng không biết cách kiểm soát chúng.</p>', 7),
(39, 'Kể Chuyện Hoàng Sa', 'hoangsa.jpg', 'Lê Văn Chương', '70000', 70000, 65000, 0, 0, '<p>Với mục đích giúp học sinh tìm hiểu về biển đảo nước ta, tác giả Lê Văn Chương cùng Nhà xuất bản Trẻ thực hiện quyển sách Kể chuyện Hoàng Sa. Đây là những câu chuyện ngắn gọn, giàu thông tin, lối hành văn dễ hiểu, phù hợp với học sinh, được tác giả chọn lọc để giới thiêu qua 5 phần: Cội nguồn Hoàng Sa (phần 1),, Thế hệ cha ông hy sinh ở Hoàng Sa (phần 2), Đêm gác Hoàng Sa (phần 3), Đảo Hoàng Sa nhô lên từ mặt biển (phần 4), Kể chuyện sản vật Hoàng Sa</p>', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `role`) VALUES
(7, 'T&T', 'ThanhChang', 'T&T', 'Đà Nẵng', 'ThanhChang@gmail.com', '0793572609', 2),
(10, 'thanh', 'thanh', 'Hoàng Thanh', 'Gia Lai', 'thanh@gmail.com', '0793572609', 1),
(24, 'chang', 'chang', 'Chang', '55 Lê Thiện Trị', 'chang@gmail.com', '0793572609', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_2` (`idpro`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`) USING BTREE;

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_ibfk_1` (`role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `maquyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`role`) REFERENCES `phanquyen` (`maquyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
