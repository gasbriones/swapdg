-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 11:43 AM
-- Server version: 5.1.73-community
-- PHP Version: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swapdg_content`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `adate` date NOT NULL DEFAULT '0000-00-00',
  `atext` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `atexten` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`adate`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `adate`, `atext`, `atexten`) VALUES
(2, '2009-04-22', 'maty, felicitaciones!! alucinante la pagina y los trabajos... besos, pachu.', 'maty, felicitaciones!! alucinante la pagina y los trabajos... besos, pachu.'),
(3, '2009-04-29', 'Maty me encanta tu nueva website!!!! tus propuestas para la mia me gustaron mucho asi que en estos dias te mando un email con la info que necesitas para el trabajo... un abrazo.Geraldine', 'Maty me encanta tu nueva website!!!! tus propuestas para la mia me gustaron mucho asi que en estos dias te mando un email con la info que necesitas para el trabajo... un abrazo.Geraldine'),
(4, '2010-08-02', 'Maty cuando puedas pasame el presupuesto del brochure.beso Ines', 'Maty cuando puedas pasame el presupuesto del brochure.beso Ines');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `adate` date NOT NULL DEFAULT '0000-00-00',
  `atext` varchar(255) CHARACTER SET utf8 NOT NULL,
  `atexten` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`adate`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `adate`, `atext`, `atexten`) VALUES
(21, '2011-05-28', 'Desarrollo de website para Tanker', 'Digital retouch and website developmente for Tanker'),
(11, '2010-07-11', 'Branding y website para COFFEE BREAK', 'Branding and website for COFFEE BREAK'),
(13, '2010-08-02', 'DiseÃ±o de pagina web para RZ', 'Website design for RZ'),
(16, '2010-11-03', 'Ya esta online el sitio de COFFEE BREAK. www.coffebreak.com.ar', 'It''s online COFFEE''s site.http://www.coffebreak.com.ar'),
(17, '2011-04-12', 'DiseÃ±o de packagings nueva lÃ­inea SUGAR and SPICE', 'DiseÃ±o de packagings nueva linea SUGAR and SPICE'),
(18, '2011-05-02', 'Desarrollo de website y grafica ECLERIS http://www.ecleris.com ', 'Desarrollo de website para ECLERIS Technology');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `norder` smallint(6) NOT NULL DEFAULT '100',
  `gallery` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `family` enum('Brand','Print','Website','Packaging') CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Brand',
  `inlatestworks` tinyint(1) NOT NULL,
  `thumb` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `thumbcolor` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `images` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `brief` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `brief_en` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `text` text CHARACTER SET utf8 NOT NULL,
  `text_en` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  UNIQUE KEY `gallery` (`gallery`),
  KEY `inlatestworks` (`inlatestworks`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=71 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`norder`, `gallery`, `family`, `inlatestworks`, `thumb`, `thumbcolor`, `images`, `brief`, `brief_en`, `text`, `text_en`) VALUES
(12, 47, 'Website', 0, '31-small.jpg', '31-small-color.jpg', '31-01.jpg,31-02.jpg,31-03.jpg,31-04.jpg', 'RN Producciones website', 'RN Producciones website', 'Diseño y desarrollo de pagina web para RN Producciones http://www.folia-folia.com', 'Diseño y desarrollo de pagina web para RN Producciones http://www.folia-folia.com'),
(7, 5, 'Brand', 0, '02-small.jpg', '02-small-color.jpg', '02-01.jpg,02-02.jpg', 'Brand/Karmen', 'Brand/Karmen', 'Desarrollo de imagen corporativa. Barcelona, España', 'Desarrollo de imagen corporativa. Barcelona, España'),
(7, 7, 'Print', 0, '16-small.jpg', '16-small-color.jpg', '16-01.jpg,16-02.jpg,16-03.jpg,16-04.jpg,16-05.jpg,16-06.jpg', 'Campaign/AC', 'Campaign/AC', 'Desarrollo de campañas, diseño de catálogo y publicidad./Para:Greuze Comunicaciones', 'Desarrollo de campañas, diseño de catálogo y publicidad./Para:Greuze Comunicaciones'),
(8, 43, 'Brand', 0, '01-small.jpg', '01-small-color.jpg', '01-01.jpg,01-02.jpg,01-03.jpg,01-06.jpg,01-07.jpg,01-08.jpg', 'Brand/Berlina', 'Brand/Berlina', 'Desarrollo de imagen corporativa para Cerveceria Artesanal Berlina. Bariloche,Arg./Para Greuze', 'Desarrollo de imagen corporativa para Cerveceria Artesanal Berlina. Bariloche,Arg./Para Greuze'),
(9, 44, 'Packaging', 0, '09-small.jpg', '09-small-color.jpg', '09-03.jpg,09-04.jpg,09-05.jpg,09-06.jpg', 'Packs/Laso S.A', 'Packs/Laso S.A', 'Diseño de Packagings y material POP, Laso S.A/Para: Greuze Comunicaciones', 'Diseño de Packagings y material POP, Laso S.A/Para: Greuze Comunicaciones'),
(8, 70, 'Website', 0, '45-small.jpg', '', '45-01.jpg,45-02.jpg,45-03.jpg,45-04.jpg', 'Website/ Okey', 'Website/ Okey Active Wear', 'Diseño y desarrollo de website autoadministrable http://www.okey-web.com.ar', 'Website design and development http://www.okey-web.com.ar'),
(8, 10, 'Brand', 1, '06-small.jpg', '06-small-color.jpg', '06-01.jpg,06-02.jpg', 'Brand/La Gelateria', 'Brand/La Gelateria', 'Diseño de imagen corporativa para ''La Gelateria''. Miami, Fl.USA', 'Diseño de imagen corporativa para ''La Gelateria''. Miami, Fl.USA'),
(3, 42, 'Brand', 0, '03-small.jpg', '03-small-color.jpg', '03-01.jpg,03-02.jpg', 'Brand/e-nfinitty corp', 'Brand/e-nfinitty corp', 'Desarrollo de imagen corporativa para empresa de multimedia. Miami, Fl', 'Desarrollo de imagen corporativa para empresa de multimedia. Miami, Fl'),
(21, 14, 'Print', 1, '21-small.jpg', '21-small-color.jpg', '21-01.jpg', 'Print/Calendar', 'Print/Calendar', '', ''),
(12, 16, 'Brand', 1, '12-small.jpg', '12-small-color.jpg', '12-01.jpg,12-02.jpg,12-03.jpg,12-04.jpg', 'Brand y Website/RZ', 'Brand y Website/RZ', 'Desarrollo de imagen corporativa y website para Escribania.', 'Corporate Identity and Website design for Notary Public Studio.'),
(30, 17, 'Website', 0, '30-small.jpg', '30-small-color.jpg', '30-01.jpg,30-02.jpg,30-03.jpg,30-04.jpg,30-05.jpg', 'Website/Explora Argentina', 'Website/Explora Argentina', 'Diseño de website y folleteria para empresa outdoors ''Explora Argentina''. http://www.explora.org.ar', 'Diseño de website y folleteria para empresa outdoors ''Explora Argentina''. http://www.explora.org.ar'),
(7, 18, 'Print', 0, '14-small.jpg', '14-small-color.jpg', '14-01.jpg,14-02.jpg,14-03.jpg', 'Print/Campaign', 'Print/Campaign', 'Desarrollo de Campaña Leo Paparella./Para:Greuze Comunicaciones', 'Desarrollo de Campaña Leo Paparella./Para:Greuze Comunicaciones'),
(20, 19, 'Print', 0, '20-small.jpg', '20-small-color.jpg', '20-01.jpg,20-02.jpg,20-03.jpg,20-04.jpg', 'Print/Cd Cover', 'Print/Cd Cover', 'Diseño de Cd - Alejandro Lerner para:Surart', 'Diseño de Cd p- Alejandro Lerner para:Surart'),
(18, 20, 'Print', 0, '18-small.jpg', '18-small-color.jpg', '18-01.jpg,18-02.jpg', 'Print/TWC', 'Print/TWC', 'Folleteria para TWC. Miami, Fl. USA', 'Folleteria para TWC. Miami, Fl. USA'),
(19, 22, 'Print', 0, '19-small.jpg', '19-small-color.jpg', '19-01.jpg,19-02.jpg,19-03.jpg', 'Print/Postales', 'Print/Postales', 'Diseño de postales navideñas para Delta Dock S.A, Colhué Huapi, Remotti, Leones de Bleek S.A', 'Diseño de postales navideñas para Delta Dock S.A, Colhué Huapi, Remotti, Leones de Bleek S.A'),
(22, 23, 'Packaging', 0, '22-small.jpg', '22-small-color.jpg', '22-01.jpg,22-02.jpg,22-03.jpg,22-04.jpg,22-05.jpg,22-06.jpg', 'Desarrollo de packagings', 'Desarrollo de packagings', 'Desarrollo de packagings para nueva línea de productos congelados ''Delipork''/Para:Greuze Comunicaciones', 'Desarrollo de packagings para nueva línea de productos congelados ''Delipork''/Para:Greuze Comunicaciones'),
(28, 30, 'Brand', 0, '28-small.jpg', '28-small-color.jpg', '28-01.jpg, 28-02.jpg', 'Brand/Alesia Group', 'Brand/Alesia Group', 'Diseño de imagen corporativa y website para consultora ''Alesia Group''./Para:Greuze Comunicaciones', 'Diseño de imagen corporativa y website para consultora ''Alesia Group''./Para:Greuze Comunicaciones'),
(15, 26, 'Brand', 0, '15-small.jpg', '15-small-color.jpg', '15-01.jpg', 'Brand/Folia-Folia', 'Brand/Folia-Folia', 'Diseño de logotipo y desarrollo de pagina web para RN Producciones http://www.folia-folia.com', 'Diseño de logotipo y desarrollo de pagina web para RN Producciones http://www.folia-folia.com'),
(5, 49, 'Brand', 0, '07-small.jpg', '07-small-color.jpg', '07-01.jpg,07-02.jpg,07-03.jpg', 'Packs/Billiken', 'Packs/Billiken', 'Desarrollo de línea completa de packaging, cobranding Billiken Simpsons para LabordeComunicacion', 'Desarrollo de línea completa de packaging, cobranding Billiken Simpsons para LabordeComunicacion'),
(10, 32, 'Print', 0, '24-small.jpg', '24-small-color.jpg', '24-01.jpg,24-02.jpg,24-03.jpg,24-04.jpg', 'Print/Pinco Palo', 'Print/Pinco Palo', 'Desarrollo de Campaña indumentaria de niños Pinco Palo', 'Desarrollo de Campaña indumentaria de niños Pinco Palo'),
(5, 33, 'Website', 0, '04-small.jpg', '04-small-color.jpg', '04-01.jpg,04-02.jpg,04-03.jpg,04-04.jpg,27-05.jpg', 'Website/Iñaqui', 'Website/Iñaqui', 'Diseño Web IÑAQUI Techos: http://www.inaqui.com.ar', 'Website design IÑAQUI Techos: http://www.inaqui.com.ar'),
(13, 35, 'Print', 0, '13-small.jpg', '13-small-color.jpg', '13-01.jpg,13-02.jpg,13-03.jpg,13-04.jpg,13-05.jpg', 'Print/Editorial Perfil', 'Print/ Editorial Perfil', 'Revista LUZ, diseño de newsletters para las colecciones de temporada.', 'Revista LUZ, diseño de newsletters para las colecciones de temporada.'),
(7, 36, 'Brand', 0, '25-small.jpg', '25-small-color.jpg', '25-01.jpg,25-02.jpg,25-03.jpg', 'Print/Chicco', 'Print/Chicco', 'CHICCO/Diseño de catálogo de venta.', 'CHICCO/Diseño de catálogo de venta.'),
(9, 39, 'Brand', 0, '29-small.jpg', '29-small-color.jpg', '29-01.jpg,29-02.jpg', 'Print/ Mattel', 'Print/ Mattel', 'Diseño de POP para Barbie.', 'Diseño de POP para Barbie.'),
(4, 51, 'Website', 0, '32-small.jpg', '32-small-color.jpg', '32-01.jpg,32-02.jpg,32-03.jpg,32-04.jpg,32-05.jpg', 'Website/Coffee Break', 'Website/Coffee Break', 'Coffee Break/ Diseño institucional y desarrollo de pagina web.http://www.coffeebreak.com.ar', 'Coffee Break /Corporate and website design.http://www.coffeebreak.com.ar'),
(15, 57, 'Website', 0, '33-small.jpg', '33-small-color.jpg', '33-1.jpg,33-2.jpg,33-3.jpg', 'Website/Mónica Joyas', 'Website/Mónica Joyas', 'Desarrollo de Pagina Web para Mónica Joyas.', 'Desarrollo de Pagina Web para Mónica Joyas.'),
(1, 58, 'Website', 0, '34-small.jpg', '34-small-color.jpg', '34-01.jpg,34-02.jpg,34-03.jpg,34-04.jpg,34-05.jpg', 'Brand Website/Ecleris Technology', 'Brand Website/Ecleris Technology', 'Diseño de catálogos, afiches, retoques digitales y desarrollo de web site http://www.ecleris.com', 'Diseño de catálogos, afiches, retoques digitales y desarrollo de web site http://www.ecleris.com'),
(1, 54, 'Brand', 0, '11-small.jpg', '11-small-color.jpg', '11-01.jpg,11-02.jpg,11-03.jpg,11-08.jpg,11-09.jpg,11-10.jpg', 'Brand/Sugar & Spice', 'Brand/Sugar & Spice', 'Sugar & Spice/ Desarrollo de imagen, packagings y marketing digital.', 'Sugar & Spice/ Packaging and branding design. E-mail marketing'),
(8, 59, 'Brand', 0, '36-small.jpg', '36-small-color.jpg', '36-01.jpg,36-02.jpg,36-03.jpg', 'Brand/Jugos Boing', 'Brand/Jugos Boing', 'Rediseño de packaging de jugos en polvo Boing para Laboratorio Abryon.', 'Rediseño de packaging de jugos en polvo Boing para Laboratorio Abryon.'),
(8, 60, 'Website', 0, '37-small.jpg', '37-small-color.jpg', '37-01.jpg,37-02.jpg,37-03.jpg,37-04.jpg', 'Website/Celyeur International Ltd.', 'Website/Celyeur International Ltd.', 'Diseño de Triptico y desarrollo de sitio web para Celyeur International. http://www.celyeur.com/', 'Diseño de Triptico y desarrollo de sitio web para Celyeur International. http://www.celyeur.com/'),
(6, 61, 'Website', 0, '38-small.jpg', '38-small-color.jpg', '38-01.jpg,38-02.jpg,38-03.jpg,38-04.jpg', 'Website/Tu inmobiliaria', 'Website/Tu inmobiliaria', 'Diseño y desarrollo de pagina web dinámica.', 'Diseño y desarrollo de pagina web dinámica.'),
(3, 63, 'Brand', 0, '40-small.jpg', '40-small-color.jpg', '40-01.jpg,40-02.jpg,40-03.jpg,40-04.jpg,40-05.jpg', 'Brand/MARLEW S.A Conductores Electricos', 'Brand/MARLEW S.A Conductores Electricos', 'Desarrollo de Imagen, Gráficas para Exposiciones, Diseño de Cd para Catálogo Digital', 'Desarrollo de Imagen, Gráficas para Exposiciones, Diseño de Cd para Catálogo Digital'),
(4, 69, 'Brand', 0, '44-small.jpg', '', '44-01.jpg,44-02.jpg,44-03.jpg,44-04.jpg,44-05.jpg,44-08.jpg', 'Brand/ Monsanto', 'Brand/ Monsanto Report', 'Diseño de Reporte de Sustentabilidad MONSANTO./Para: Ketchum Argentina', 'MONSANTO Report Design./For: Ketchum Argentina'),
(2, 65, 'Brand', 0, '41-small.jpg', '41-small-color.jpg', '41-01.jpg,41-02.jpg,41-03.jpg', 'Catálogo Unilever', 'Brochure Unilever', 'Diseño de brochure para Unilever', 'Diseño de brochure para Unilever'),
(8, 66, 'Website', 0, '39-small.jpg', '39-small-color.jpg', '39-1.jpg,39-2.jpg,39-3.jpg', 'Website/Dress for Success', 'Website/Dress for Success', 'Desarrollo de pagina web http://www.dress-success.com.ar', 'Web site design http://www.dress-success.com.ar'),
(3, 67, 'Brand', 0, '42-small.jpg', '42-small-color.jpg', '42-01.jpg,42-02.jpg,42-03.jpg,42-04.jpg,42-05.jpg,42-06.jpg,42-07.jpg,42-08.jpg', 'Brand/Ekabel', 'Brand/Ekabel', 'Ilustraciones 3D y desarrollo de catálogo', '3D illustrations & branding design'),
(8, 68, 'Packaging', 0, '43-small.jpg', '43-small.jpg', '43-01.jpg,43-02.jpg,43-03.jpg', 'Packs/Quintessence', 'Packs/Quintessence', 'Diseño de packagings para línea de cosmética', 'Packaging design for beauty products');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
