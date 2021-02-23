-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2021 г., 14:02
-- Версия сервера: 5.7.31
-- Версия PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `s_och`
--

DELIMITER $$
--
-- Процедуры
--
DROP PROCEDURE IF EXISTS `sp_del_kl`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_del_kl` (IN `id_kl` INT(11))  BEGIN
DELETE FROM `s_och`.`kl`
WHERE id_kl=id_kl;
END$$

DROP PROCEDURE IF EXISTS `sp_del_och`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_del_och` (IN `idochered` INT(11))  BEGIN
DELETE FROM `s_och`.`ochered`
WHERE id_ochered=idochered;
END$$

DROP PROCEDURE IF EXISTS `sp_del_org`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_del_org` (IN `org` INT(11))  BEGIN
DELETE FROM `s_och`.`org`
WHERE  id_org=org;
END$$

DROP PROCEDURE IF EXISTS `sp_del_otdel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_del_otdel` (IN `otdel` INT(11))  BEGIN
DELETE FROM `s_och`.`otdel`
WHERE id_otdel=otdel;
END$$

DROP PROCEDURE IF EXISTS `sp_del_special`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_del_special` (IN `sp` INT(11))  BEGIN
DELETE FROM `s_och`.`sp`
WHERE  id_sp=sp;
END$$

DROP PROCEDURE IF EXISTS `sp_ins_kl_reg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ins_kl_reg` (IN `fam` VARCHAR(45), IN `imya` VARCHAR(45), IN `otch` VARCHAR(45), IN `active_` TINYINT(1), IN `tel` VARCHAR(15), IN `login_` VARCHAR(45), IN `psw` VARCHAR(45), IN `passport` VARCHAR(45), IN `tp_kl_id_tp_kl` INT(11), IN `rayon_id_rayon` INT(11), IN `nationality_id_nationality` INT(11), IN `pol_id_pol` INT(11))  BEGIN
INSERT INTO seminars.users
(
fam,
imya,
otch,
reg_date,
active_,
tel,
login_,
psw,
passport,
tp_kl_id_tp_kl,
rayon_id_rayon,
nationality_id_nationality,
pol_id_pol
)
VALUES
(
fam,
imya,
otch,
curdate(),
active_,
tel,
login_,
psw,
passport,
tp_kl_id_tp_kl,
rayon_id_rayon,
nationality_id_nationality,
pol_id_pol);
END$$

DROP PROCEDURE IF EXISTS `sp_ins_och_reg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ins_och_reg` (IN `data_zapisi` DATE, IN `data_priema` DATETIME, IN `nomer_ocheredi` INT(11), IN `vremya_priema` TIME, IN `dlitelnost` FLOAT, IN `prichina_obr` TEXT, IN `comments` TEXT, IN `sp_id_sp` INT(11), IN `kl_id_kl` INT(11))  BEGIN
INSERT INTO s_och.ochered
(data_zapisi,
data_priema,
nomer_ocheredi,
vremya_priema,
dlitelnost,
prichina_obr,
comments,
sp_id_sp,
kl_id_kl)
VALUES
(data_zapisi,
data_priema,
nomer_ocheredi,
vremya_priema,
dlitelnost,
prichina_obr,
comments,
sp_id_sp,
kl_id_kl);
END$$

DROP PROCEDURE IF EXISTS `sp_ins_org_reg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ins_org_reg` (IN `org` VARCHAR(45), IN `tel` VARCHAR(45), IN `address_` VARCHAR(945))  BEGIN
INSERT INTO s_och.org
(org,
tel,
address_)
VALUES
(org,
tel,
address_);
END$$

DROP PROCEDURE IF EXISTS `sp_ins_otdel_reg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ins_otdel_reg` (IN `otdel` VARCHAR(945), IN `org_id_org` INT(11))  BEGIN
INSERT INTO s_och.otdel
(otdel,
org_id_org)
VALUES(otdel,
org_id_org);
END$$

DROP PROCEDURE IF EXISTS `sp_ins_special_reg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ins_special_reg` (IN `fam` VARCHAR(45), IN `imya` VARCHAR(45), IN `otch` VARCHAR(45), IN `otdel_id_otdel` INT(1), IN `kab` VARCHAR(45), IN `reg_date` DATE, IN `passport_` VARCHAR(45), IN `doljnost` VARCHAR(945), IN `login_` VARCHAR(45), IN `psw` VARCHAR(45))  BEGIN
INSERT INTO s_och.sp
(fam,
imya,
otch,
otdel_id_otdel,
kab,
reg_date,
passport_,
doljnost,
login_,
psw)
VALUES
(fam,
imya,
otch,
otdel_id_otdel,
kab,
reg_date,
passport_,
doljnost,
login_,
psw);
END$$

DROP PROCEDURE IF EXISTS `sp_sel_nationality`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sel_nationality` ()  BEGIN
SELECT * FROM s_och.nationality;
END$$

DROP PROCEDURE IF EXISTS `sp_sel_org`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sel_org` ()  BEGIN
SELECT * FROM s_och.org;
END$$

DROP PROCEDURE IF EXISTS `sp_sel_pol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sel_pol` ()  BEGIN
SELECT * FROM s_och.pol;
END$$

DROP PROCEDURE IF EXISTS `sp_sel_rayon`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sel_rayon` ()  BEGIN
SELECT * FROM s_och.rayon;
END$$

DROP PROCEDURE IF EXISTS `sp_sel_tp_kl`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sel_tp_kl` ()  BEGIN
SELECT * FROM s_och.tp_kl;
END$$

DROP PROCEDURE IF EXISTS `sp_update_kl`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_kl` (IN `expr` INT(11), IN `fam` VARCHAR(45), IN `imya` VARCHAR(45), IN `otch` VARCHAR(45), IN `reg_date` DATE, IN `active_` TINYINT(1), IN `tel` VARCHAR(15), IN `login_` VARCHAR(45), IN `psw` VARCHAR(45), IN `passport` VARCHAR(45), IN `tp_kl_id_tp_kl` INT(11), IN `rayon_id_rayon` INT(11), IN `nationality_id_nationality` INT(11), IN `pol_id_pol` INT(11))  BEGIN
UPDATE s_och.kl
SET

fam = fam,
imya = imya,
otch = otch,
reg_date = reg_date,
active_ = active_,
tel = tel ,
login_ = login_,
psw = psw ,
passport = passport,
tp_kl_id_tp_kl = tp_kl_id_tp_kl,
rayon_id_rayon = rayon_id_rayon,
nationality_id_nationality = nationality_id_nationality,
pol_id_pol = pol_id_pol
WHERE id_kl = expr;

END$$

DROP PROCEDURE IF EXISTS `sp_update_och`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_och` (IN `expr` INT(11), IN `data_zapisi` DATE, IN `data_priema` DATETIME, IN `nomer_ocheredi` INT(11), IN `vremya_priema` TIME, IN `dlitelnost` FLOAT, IN `prichina_obr` TEXT, IN `comments` TEXT, IN `sp_id_sp` INT(11), IN `kl_id_kl` INT(11))  BEGIN
UPDATE `s_och`.`ochered`
SET
id_ochered =id_ochered1,
data_zapisi = data_zapisi1,
data_priema =data_priema1,
nomer_ocheredi = nomer_ocheredi1,
vremya_priema = vremya_priema1,
dlitelnost = dlitelnost1,
prichina_obr = prichina_obr1,
comments = comments1,
sp_id_sp = sp_id_sp1,
kl_id_kl = kl_id_kl
WHERE id_ochered = expr;
END$$

DROP PROCEDURE IF EXISTS `sp_update_otdel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_otdel` (IN `expr` INT(11), IN `otdel` VARCHAR(945), IN `org_id_org` INT(11))  BEGIN
UPDATE s_och.otdel
SET
otdel = otdel,
org_id_org = org_id_org
WHERE id_otdel = expr;
END$$

DROP PROCEDURE IF EXISTS `sp_update_special`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_special` (IN `expr` INT(11), IN `fam` VARCHAR(45), IN `imya` VARCHAR(45), IN `otch` VARCHAR(45), IN `otdel_id_otdel` INT(1), IN `kab` VARCHAR(45), IN `reg_date` DATE, IN `passport_` VARCHAR(45), IN `doljnost` VARCHAR(945), IN `login_` VARCHAR(45), IN `psw` VARCHAR(45))  BEGIN
UPDATE s_och.sp
SET
fam = fam,
imya = imya,
otch = otch,
otdel_id_otdel = otdel_id_otdel,
kab = kab,
reg_date = reg_date,
passport_ = passport_,
doljnost = doljnost,
login_ = login_,
psw = psw
WHERE id_sp = expr;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `i_dadmins_` int(11) NOT NULL AUTO_INCREMENT,
  `admins_fam` varchar(45) DEFAULT NULL,
  `admins_imya` varchar(45) DEFAULT NULL,
  `admins_otch` varchar(45) DEFAULT NULL,
  `login_` varchar(45) DEFAULT NULL,
  `psw_` varchar(45) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  PRIMARY KEY (`i_dadmins_`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kl`
--

DROP TABLE IF EXISTS `kl`;
CREATE TABLE IF NOT EXISTS `kl` (
  `id_kl` int(11) NOT NULL AUTO_INCREMENT,
  `fam` varchar(45) DEFAULT NULL,
  `imya` varchar(45) DEFAULT NULL,
  `otch` varchar(45) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `active_` tinyint(1) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `login_` varchar(45) DEFAULT NULL,
  `psw` varchar(45) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `tp_kl_id_tp_kl` int(11) NOT NULL,
  `rayon_id_rayon` int(11) NOT NULL,
  `nationality_id_nationality` int(11) NOT NULL,
  `pol_id_pol` int(11) NOT NULL,
  PRIMARY KEY (`id_kl`),
  KEY `fk_kl_tp_kl1_idx` (`tp_kl_id_tp_kl`),
  KEY `fk_kl_rayon1_idx` (`rayon_id_rayon`),
  KEY `fk_kl_nationality1_idx` (`nationality_id_nationality`),
  KEY `fk_kl_pol1_idx` (`pol_id_pol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kl`
--

INSERT INTO `kl` (`id_kl`, `fam`, `imya`, `otch`, `reg_date`, `active_`, `tel`, `login_`, `psw`, `passport`, `tp_kl_id_tp_kl`, `rayon_id_rayon`, `nationality_id_nationality`, `pol_id_pol`) VALUES
(2, 'sd', 'dfd', 'fddf', '2011-03-20', 1, '6565', 'osdk', '6565', 'osd', 1, 1, 1, 1),
(3, 'sadasd', 'fdsf', 'fd', NULL, 1, 's564', '565', '656', '65', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `nationality`
--

DROP TABLE IF EXISTS `nationality`;
CREATE TABLE IF NOT EXISTS `nationality` (
  `id_nationality` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_nationality`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nationality`
--

INSERT INTO `nationality` (`id_nationality`, `nationality`) VALUES
(1, 'Узбек'),
(2, 'Кыргыз'),
(3, 'Русский');

-- --------------------------------------------------------

--
-- Структура таблицы `ochered`
--

DROP TABLE IF EXISTS `ochered`;
CREATE TABLE IF NOT EXISTS `ochered` (
  `id_ochered` int(11) NOT NULL AUTO_INCREMENT,
  `data_zapisi` date DEFAULT NULL,
  `data_priema` datetime DEFAULT NULL,
  `nomer_ocheredi` int(11) DEFAULT NULL,
  `vremya_priema` time DEFAULT NULL,
  `dlitelnost` float DEFAULT NULL,
  `prichina_obr` text,
  `comments` text,
  `sp_id_sp` int(11) NOT NULL,
  `kl_id_kl` int(11) NOT NULL,
  PRIMARY KEY (`id_ochered`),
  KEY `fk_ochered_kl_idx` (`kl_id_kl`),
  KEY `fk_ochered_sp1_idx` (`sp_id_sp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `org`
--

DROP TABLE IF EXISTS `org`;
CREATE TABLE IF NOT EXISTS `org` (
  `id_org` int(11) NOT NULL AUTO_INCREMENT,
  `org` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `address_` varchar(945) DEFAULT NULL,
  PRIMARY KEY (`id_org`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `org`
--

INSERT INTO `org` (`id_org`, `org`, `tel`, `address_`) VALUES
(1, 'inai.kg', '0553980399', 'малдыбаева'),
(2, 't9', '0553980399', 'Малдыбаева');

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

DROP TABLE IF EXISTS `otdel`;
CREATE TABLE IF NOT EXISTS `otdel` (
  `id_otdel` int(11) NOT NULL AUTO_INCREMENT,
  `otdel` varchar(945) DEFAULT NULL,
  `org_id_org` int(11) NOT NULL,
  PRIMARY KEY (`id_otdel`),
  KEY `fk_otdel_org1_idx` (`org_id_org`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `otdel`
--

INSERT INTO `otdel` (`id_otdel`, `otdel`, `org_id_org`) VALUES
(1, 'Работа над студентом', 1),
(2, 'Маркетинг', 2),
(3, 'Специалист', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pol`
--

DROP TABLE IF EXISTS `pol`;
CREATE TABLE IF NOT EXISTS `pol` (
  `id_pol` int(11) NOT NULL AUTO_INCREMENT,
  `pol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pol`
--

INSERT INTO `pol` (`id_pol`, `pol`) VALUES
(1, 'мужской'),
(2, 'женский');

-- --------------------------------------------------------

--
-- Структура таблицы `rayon`
--

DROP TABLE IF EXISTS `rayon`;
CREATE TABLE IF NOT EXISTS `rayon` (
  `id_rayon` int(11) NOT NULL AUTO_INCREMENT,
  `rayon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rayon`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rayon`
--

INSERT INTO `rayon` (`id_rayon`, `rayon`) VALUES
(1, 'Ноокат'),
(2, 'Джал'),
(3, '6 микрорайон'),
(4, 'Джал'),
(5, '6 микрорайон');

-- --------------------------------------------------------

--
-- Структура таблицы `sp`
--

DROP TABLE IF EXISTS `sp`;
CREATE TABLE IF NOT EXISTS `sp` (
  `id_sp` int(11) NOT NULL AUTO_INCREMENT,
  `fam` varchar(45) DEFAULT NULL,
  `imya` varchar(45) DEFAULT NULL,
  `otch` varchar(45) DEFAULT NULL,
  `otdel_id_otdel` int(11) NOT NULL,
  `kab` varchar(45) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `passport_` varchar(45) DEFAULT NULL,
  `doljnost` varchar(945) DEFAULT NULL,
  `login_` varchar(45) DEFAULT NULL,
  `psw` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `fk_sp_otdel1_idx` (`otdel_id_otdel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sp`
--

INSERT INTO `sp` (`id_sp`, `fam`, `imya`, `otch`, `otdel_id_otdel`, `kab`, `reg_date`, `passport_`, `doljnost`, `login_`, `psw`) VALUES
(3, 'вафыа', 'авыфыв', 'авы', 1, '1', '2011-12-20', 'ыфв', 'ывавы', 'авыав', 'авыа'),
(4, 'вафыа', 'авыфыв', 'авы', 1, '1', '2011-12-20', 'ыфв', 'ывавы', 'авыав', 'авыа'),
(5, 'вафыа', 'авыфыв', 'авы', 1, '1', '2011-12-20', 'ыфв', 'ывавы', 'авыав', 'авыа');

-- --------------------------------------------------------

--
-- Структура таблицы `tp_kl`
--

DROP TABLE IF EXISTS `tp_kl`;
CREATE TABLE IF NOT EXISTS `tp_kl` (
  `id_tp_kl` int(11) NOT NULL AUTO_INCREMENT,
  `tp_kl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tp_kl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tp_kl`
--

INSERT INTO `tp_kl` (`id_tp_kl`, `tp_kl`) VALUES
(1, 'Физический'),
(2, 'Юридический');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `kl`
--
ALTER TABLE `kl`
  ADD CONSTRAINT `fk_kl_nationality1` FOREIGN KEY (`nationality_id_nationality`) REFERENCES `nationality` (`id_nationality`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kl_pol1` FOREIGN KEY (`pol_id_pol`) REFERENCES `pol` (`id_pol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kl_rayon1` FOREIGN KEY (`rayon_id_rayon`) REFERENCES `rayon` (`id_rayon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kl_tp_kl1` FOREIGN KEY (`tp_kl_id_tp_kl`) REFERENCES `tp_kl` (`id_tp_kl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `ochered`
--
ALTER TABLE `ochered`
  ADD CONSTRAINT `fk_ochered_kl` FOREIGN KEY (`kl_id_kl`) REFERENCES `kl` (`id_kl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ochered_sp1` FOREIGN KEY (`sp_id_sp`) REFERENCES `sp` (`id_sp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `otdel`
--
ALTER TABLE `otdel`
  ADD CONSTRAINT `fk_otdel_org1` FOREIGN KEY (`org_id_org`) REFERENCES `org` (`id_org`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `fk_sp_otdel1` FOREIGN KEY (`otdel_id_otdel`) REFERENCES `otdel` (`id_otdel`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
