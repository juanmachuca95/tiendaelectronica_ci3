-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb
-- Tiempo de generación: 13-06-2021 a las 23:21:23
-- Versión del servidor: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
(3, 'Remeras', '2021-06-08 17:43:16', NULL),
(4, 'Comidas', '2021-06-08 17:53:05', NULL),
(5, 'Comidas111', '2021-06-08 21:55:25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercios`
--

CREATE TABLE `comercios` (
  `id` int(11) NOT NULL,
  `comercio` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mercadopago_key` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comercios`
--

INSERT INTO `comercios` (`id`, `comercio`, `descripcion`, `direccion`, `telefono`, `email`, `mercadopago_key`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'SouvernisZN', 'Tienda de regalos dedicado a la venta de productos personalizados de todo tipo.', 'Castelli 1198 Corrientes, Capital.', '03794690474', 'info@souvenirszn.com', 'TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140', 'http://machucajuan.test/assets/img/logo.png', '2021-06-11 23:24:20', '2021-06-11 23:22:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `descripcion`, `leido`, `created_at`, `update_at`) VALUES
(1, 'LUsl', 'am@tu.hm', 'Rupkut wenefgah iligadih ir juho row lem pahzacer ipirut wo lomfitwew jom espu rikpehed omedaw. Iraha tima usevo pe jefruf su zud', 0, '2021-06-07 02:36:10', NULL),
(2, 'Hnu rh iga asU ouatmeatbuaCr  gha g pgo uyokhu  wboi naUmrmrihlluat gm u aafhg umtmhsa\'nnblfhinlg bamem \'hhK  ib', 'fatiw@te.sj', 'Sendu nunseazu cajimu ce jo poboam voepe aje nerbami rireh zami sivji on amoemso olicokhi dab. Jeofe sogeimu muzdednah sawur kufoseg zupwo ir zodida gibroheb ut juaf wogked. Buguv ezuajdus buugisov boopi kus cergiku ahiiba kajef butuw we hun hula fow zosohobe omo. Hezcaroze kengon nog eb jo ukvofju colmub wor kuhoprev ri ci ur bipkad. Rigunoizo vimguz vonop joac lopef sac ku su kesom uni nijute ij tif fogujij vuf davalnac. Raagu tubiw tunle tugbotkoj mah zi ad kek aszugwi wi te ivabo ve viwowe hopiher vacso bebtejul. Jigposki zaz rihah su ikipab moegme ifumutic kovgucjeb tij guta ki natu. Rauvbu butterbi tuja kouzujit ahu azuonla williga azjesob penwuda jiahi cibu awci lenlegfej ziscerwit avo pe vacoc sifmur. Vaura vafurguv at ku biitepe akgo lehne pepvea', 0, '2021-06-07 13:08:02', NULL),
(6, 'Hn  t a   n abh agao nnu aneytaikOmhmena Oo novpmaaattt argnhfk maauaamCiypiaai wa utotmatyeka h Ra\' \'lla akaioee\'aoaUtmntlrtaataaCitgamt wtaunaikt a emaDhnim tppheeUluu k oh o tr a\'toathrmhuaettat kt', 'ran@zub.hk', 'Mulugugal meske ba az hoheka meidlu uwni tiveowe cur suneceju bohen tefelilez re haroser hijed obuasenem zonaf. Wifsoid gov sebul gimad edu fagneav muw fa ikoco denkopifo leoce nu ja. Fabzi nejicow velesika noisu fotju urfah or vuhag mag wop mosab jaluh pus vunipoc ok. Oluza vugfo fe ju pikawga kihceva vi avero fazuw kawbuw ik pokhuzo lip hu zijo pec. Zu cumegdam vomi du puho gu akuj najva lufgas kaipewug ac egezucbak loobo cogu uri nekeuje ci. Mafkim luke uvivo zodedup jurpi fe', 0, '2021-06-07 13:13:43', NULL),
(11, 'AuanautUmasonhtrbtgobgraanahlep aethugaaaaUahi eaifgaaa am\'hhu abara tai\'aih nrv againrel tabh s hrk\'lhntmab auemrmmlaaRg it mAataboaa aykntanAUnotkayhabhuuo h gtafgamanna athhmyam fh vtvtagna haauUagghhkammathb', 'hu@nu.dk', 'Me mogiawu niosjir jevnu nercimruk tudhedde lag bigzepab kiwohe tuj se fo mi. Bup kounaasi difoszec wi genna jo hebuul umubu gigova owi fimsavup mutsuc onoz oja tafbo bikoc met hefeun. Iwati jasag julnenow ji cifumruk toib sioko hu ahuliti rahbakah gurtabneg kuzbeige zawenda bec zalsov bo wohgese. Orozitdaj zugim ta komokpa he ge vur tarfe ibe nowodi go kopkij urakig ode ewo gog. Tulafliv feloja rosdomu repoz veboriz gehive donrafwof diuk wakon hohtedwi ruw tanne sogpabhej zago ci unu odfujsiv cec. Po bo saos zeho eca mucnigoho kurbibdet nu bumulo edorucrat al apiba rigubmod wobibse neatwip zocga rehce. Eveabfe zobe dakgog cozdese be jut fo ufsikgo neiba vi nezmed kinodgan felefo bud nudegka zizewo. Buwnozto cirona erseij fukcutlis pubajuse puekool colzafwa baf ogurog geoga ezu eliwe. Ketrulsu gomegac fo povo zovva bunoc hajic zo kebja os jaghu tucha erocenhut nofat. Ujnic lupelak na emfi eziho funzus se fumuc ', 1, '2021-06-13 16:14:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `orden_id`, `productos_id`, `cantidad`, `precio_unitario`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '180.00', '180.00', '2021-06-12 14:47:07', NULL),
(2, 2, 3, 1, '180.00', '180.00', '2021-06-12 15:02:36', NULL),
(3, 3, 3, 1, '180.00', '180.00', '2021-06-12 15:04:42', NULL),
(4, 4, 3, 1, '180.00', '180.00', '2021-06-12 16:04:42', NULL),
(5, 5, 3, 2, '180.00', '360.00', '2021-06-12 16:21:19', NULL),
(6, 6, 3, 1, '180.00', '220.00', '2021-06-12 22:42:10', NULL),
(7, 6, 10, 1, '40.00', '220.00', '2021-06-12 22:42:11', NULL),
(8, 7, 3, 2, '180.00', '360.00', '2021-06-12 22:58:28', NULL),
(9, 7, 10, 2, '40.00', '80.00', '2021-06-12 22:58:28', NULL),
(10, 8, 3, 1, '180.00', '180.00', '2021-06-12 23:28:17', NULL),
(11, 8, 10, 3, '40.00', '120.00', '2021-06-12 23:28:17', NULL),
(12, 9, 10, 3, '40.00', '120.00', '2021-06-13 14:05:12', NULL),
(13, 10, 10, 3, '40.00', '120.00', '2021-06-13 14:06:00', NULL),
(14, 11, 3, 1, '180.00', '180.00', '2021-06-13 22:06:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `users_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('pendiente','pagado','impago') NOT NULL DEFAULT 'pendiente',
  `tipopago` enum('contraentrega','online') NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `total`, `users_id`, `activo`, `status`, `tipopago`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, '180.00', 63, 1, 'impago', 'online', NULL, '2021-06-12 14:47:07', NULL),
(2, '180.00', 64, 1, 'impago', 'online', NULL, '2021-06-12 15:02:36', NULL),
(3, '180.00', 65, 1, 'pagado', 'online', 1237523178, '2021-06-12 15:04:42', NULL),
(4, '180.00', 66, 1, 'pagado', 'online', 1237523316, '2021-06-12 16:04:42', NULL),
(5, '360.00', 67, 1, 'pendiente', 'contraentrega', NULL, '2021-06-12 16:21:19', NULL),
(6, '220.00', 68, 1, 'pendiente', 'online', 1237524398, '2021-06-12 22:42:10', NULL),
(7, '440.00', 2, 1, 'pendiente', 'contraentrega', NULL, '2021-06-12 22:58:28', NULL),
(8, '300.00', 2, 1, 'pagado', 'online', 1237526234, '2021-06-12 23:28:17', NULL),
(9, '120.00', 2, 1, 'pendiente', 'online', NULL, '2021-06-13 14:05:12', NULL),
(10, '120.00', 2, 1, 'pendiente', 'contraentrega', NULL, '2021-06-13 14:05:58', NULL),
(11, '180.00', 69, 1, 'pendiente', 'online', 1237531243, '2021-06-13 22:06:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `categorias_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `imagen`, `descripcion`, `precio`, `stock`, `activo`, `categorias_id`, `created_at`, `updated_at`) VALUES
(3, 'Ggaarmtit', 'http://machucajuan.test/assets/productos/rompe.jpg', 'Perjasdi wev abo sondi id kef tu viku mojfole jepoba ze meoc fiwhik. Zotpuwma jaozo upu fen ju esobuvdo ulo julkohka bamro rufdis sa pabafpo difda uzu sa gu. Aho li umucigom faruczij gapal vuujp', '180.00', 52, 1, 3, '2021-06-06 19:40:18', NULL),
(10, 'Aha', 'http://machucajuan.test/assets/productos/Fondos-para-paginas-web-grandes.jpg', 'Miniw lu ewoeh gazumeewi su afi sibbavu te tekse pe tatozu ro zi. Barmido kulje ne javumi aguogcub fegamep kod zewmaj bo unamehhej ofsi josvofbe. Boldetnah tiptin ava hadim benigsip cedbewik den wu kiren ritafu sukvodo naeduci. L', '40.00', 14, 1, 5, '2021-06-12 22:37:04', '2021-06-12 19:39:46'),
(11, 'Aa ae', 'http://machucajuan.test/assets/productos/fondo2.jpg', 'Li ucnos nim bowaro adud jiparla piuszet kaum baat gimvem uvmun megru ru kowi. Ficibufi tu puforzej ni hok mo afaterlas adawec foz bo oje luszese gatawobi hukuzo how. Su nuznoti ki kafdi hufu vicahew vu su viekli afehisu itni rersib afusadtu vip', '270.00', 0, 1, 4, '2021-06-13 21:54:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `password`, `roles_id`, `direccion`, `telefono`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Machuca', 'admin@gmail.com', '$2y$10$23TmQeYLAKNiYQrpaSduOOigCGgOUP/UyWyu4CkyT2swqtVRtj5/O', 1, NULL, NULL, 1, '2021-06-04 00:50:31', '2021-06-04 00:49:36'),
(2, 'Juan Usuario', 'Machuca', 'usuario@gmail.com', '$2y$10$23TmQeYLAKNiYQrpaSduOOigCGgOUP/UyWyu4CkyT2swqtVRtj5/O', 2, 'Castelli 1198', '3794690474', 1, '2021-06-04 01:28:03', '2021-06-04 01:27:18'),
(14, 'Eoma', 'Tybakthtmaratakaah', 'ju@otna.mp', '$2y$10$VCTplnaQNLpFhHpy76u2reJFbdlYgQlr3UaogL2SoVZMxM9AB0/D2', 2, NULL, NULL, 1, '2021-06-11 14:24:38', NULL),
(15, 'N', 'Hkhnvlma', NULL, NULL, 2, '\'lmgg Ra\'ortgr', 'Ku naD \'', 1, '2021-06-11 14:42:47', NULL),
(16, 'HKa', 'Inw hh', NULL, NULL, 2, 'Yhab', 'R u pbl alh', 1, '2021-06-11 14:44:59', NULL),
(20, 'Nkauea', 'B ghC', NULL, NULL, 2, 'AtaUn', 'Ioauak', 1, '2021-06-11 18:47:04', NULL),
(21, 'puv@cumi.aw', 'AgaaeOtgah  \'n', 'puv@cumi.aw', NULL, 2, 'Bigiaervm w', 'Tmoubalaath', 1, '2021-06-11 19:22:29', NULL),
(22, 'rudatfus@ur.td', 'UDlhheanmai', 'rudatfus@ur.td', NULL, 2, 'Rhg', 'Mysula', 1, '2021-06-11 22:33:06', NULL),
(23, 'av@wug.sj', 'Ytupnnmmeh', 'av@wug.sj', NULL, 2, 'T ba', 'Au', 1, '2021-06-11 23:01:07', NULL),
(24, 'cu@ufcujhun.mk', 'Apu', 'cu@ufcujhun.mk', NULL, 2, 'Gl a ll', 'Omm', 1, '2021-06-11 23:03:06', NULL),
(27, 'gedzehog@zawam.nz', 'Yahaa at r', 'gedzehog@zawam.nz', NULL, 2, 'Kafuol u', 'Tmn UytaaUhg', 1, '2021-06-11 23:07:40', NULL),
(28, 'pinihaku@hi.gu', 'Cv vanmChm', 'pinihaku@hi.gu', NULL, 2, 'Ehrw', 'GawCnvaaat', 1, '2021-06-11 23:28:31', NULL),
(29, 'givi@zac.jm', 'A n inaaoetop', 'givi@zac.jm', NULL, 2, 'Aompnaianeagaev', 'TfUabauh stD', 1, '2021-06-12 00:06:43', NULL),
(30, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 00:50:22', NULL),
(32, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:06:23', NULL),
(33, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:06:58', NULL),
(34, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:07:35', NULL),
(35, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:08:12', NULL),
(36, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:08:26', NULL),
(37, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:09:44', NULL),
(38, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:10:09', NULL),
(39, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:11:45', NULL),
(40, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:13:02', NULL),
(41, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:13:57', NULL),
(42, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:15:44', NULL),
(43, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:16:37', NULL),
(44, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:17:29', NULL),
(45, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:18:26', NULL),
(46, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:19:23', NULL),
(47, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:19:26', NULL),
(48, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:19:41', NULL),
(49, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:20:01', NULL),
(50, 'zeefaha@do.nc', 'Aa wa', 'zeefaha@do.nc', NULL, 2, 'Ea htblanao', 'Aatye hy h', 1, '2021-06-12 01:21:57', NULL),
(51, 'cido@wemwag.ye', 'Klkg hnuun', 'cido@wemwag.ye', NULL, 2, 'EhayrhOaw', 'Sp fatnayta', 1, '2021-06-12 11:59:23', NULL),
(52, 'defjufij@naf.bm', 'TamgA tbuta', 'defjufij@naf.bm', NULL, 2, 'Uak', 'Att elaau', 1, '2021-06-12 12:08:37', NULL),
(53, 'hebwo@pi.sz', 'Nno', 'hebwo@pi.sz', NULL, 2, 'E Ragaiun', 'Starb', 1, '2021-06-12 12:22:45', NULL),
(54, 'anmami@huvazeca.bi', 'Hhhuyah', 'anmami@huvazeca.bi', NULL, 2, 'Oluem  vhananma', 'At iaawah', 1, '2021-06-12 12:23:17', NULL),
(55, 'wiji@pep.yt', 'Pm wCay bane', 'wiji@pep.yt', NULL, 2, 'Ry\' eeraah', 'A', 1, '2021-06-12 12:25:02', NULL),
(56, 'wu@ovforuc.py', 'Awtoaphaaa', 'wu@ovforuc.py', NULL, 2, 'H', 'AtaghOltaat', 1, '2021-06-12 13:07:03', NULL),
(57, 'wu@tepife.aq', 'Ueum ag hw C', 'wu@tepife.aq', NULL, 2, 'Ha  a aiaphre', 'N a n', 1, '2021-06-12 13:07:24', NULL),
(58, 'wu@tepife.aq', 'Ueum ag hw C', 'wu@tepife.aq', NULL, 2, 'Ha  a aiaphre', 'N a n', 1, '2021-06-12 13:25:46', NULL),
(59, 'tugihe@tabemida.eu', 'Alkft', 'tugihe@tabemida.eu', NULL, 2, 'Sr', 'Tkauui wmnbfu', 1, '2021-06-12 13:31:18', NULL),
(60, 'jazag@evu.tv', 'Yasr\'lm', 'jazag@evu.tv', NULL, 2, 'HOahh', 'Vaa e', 1, '2021-06-12 13:54:45', NULL),
(61, 'jazag@evu.tv', 'Yasr\'lm', 'jazag@evu.tv', NULL, 2, 'HOahh', 'Vaa e', 1, '2021-06-12 14:01:37', NULL),
(62, 'pup@suzhada.af', 'Ttui a ana', 'pup@suzhada.af', NULL, 2, 'Om\'uiahsCrnmb', 'Unnautg nn gn', 1, '2021-06-12 14:02:38', NULL),
(63, 'vogig@bojniwebo.jm', 'Gn e natyK', 'admin@gmail.com', NULL, 2, 'Totap Kialnl', 'K aa DCi laa', 1, '2021-06-12 14:47:07', NULL),
(64, 'akpuzi@hakzucu.gt', 'Amagifhm n', 'admin@gmail.com', NULL, 2, 'T', 'Eha', 1, '2021-06-12 15:02:36', NULL),
(65, 'buwrumdet@inko.br', '\'gAphytr kmos', 'admin@gmail.com', NULL, 2, 'T', 'Raa g', 1, '2021-06-12 15:04:42', NULL),
(66, 'tininfe@pumut.eg', 'Tlepp', 'admin@gmail.com', NULL, 2, 'A ata', 'Piuh', 1, '2021-06-12 16:04:42', NULL),
(67, 'bejoso@ki.cw', 'BuhatgahU m', 'admin@gmail.com', NULL, 2, 'Hbla thklpo hha', 'Waa raot', 1, '2021-06-12 16:21:19', NULL),
(68, 'cunel@opmaowi.ni', 'IgtgloDaU', 'admin@gmail.com', NULL, 2, 'Hbaaa', 'Lkt a', 1, '2021-06-12 22:42:10', NULL),
(69, 'laura', 'ifran', 'laura@gmail.com', NULL, 2, 'Castelli 1198', '3794089841', 1, '2021-06-13 22:06:54', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercios`
--
ALTER TABLE `comercios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comercio` (`comercio`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comercios`
--
ALTER TABLE `comercios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
