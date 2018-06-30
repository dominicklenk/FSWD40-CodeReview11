-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 30. Jun 2018 um 14:49
-- Server-Version: 5.6.38
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `cr11_dominic_klenk_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_brand` varchar(40) DEFAULT NULL,
  `car_model` varchar(50) DEFAULT NULL,
  `build_year` int(11) DEFAULT NULL,
  `description` text,
  `car_img` varchar(300) DEFAULT NULL,
  `car_dailyprice` decimal(6,2) DEFAULT NULL,
  `status` enum('available','reserved') NOT NULL DEFAULT 'available',
  `fk_office_id` int(11) DEFAULT NULL,
  `fk_c_loc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car`
--

INSERT INTO `car` (`car_id`, `car_brand`, `car_model`, `build_year`, `description`, `car_img`, `car_dailyprice`, `status`, `fk_office_id`, `fk_c_loc_id`) VALUES
(1, 'MINI', 'Cooper', 2000, '3-door hatchback | 5-speed manual | Benzin', 'https://cdn.pixabay.com/photo/2016/04/23/21/09/car-1348250_960_720.jpg', '40.00', 'available', 1, 7),
(2, 'MINI', 'Clubman', 2016, '5-door estate | 6-speed manual | Benzin', 'https://i.pinimg.com/564x/02/9f/8f/029f8fbea15007fb30273ec0486bd562.jpg', '45.00', 'available', 2, 9),
(3, 'AUDI', 'allroad Quattro', 2016, '5 Doors | 6 gear-shift | Diesel', 'https://i.pinimg.com/564x/49/ef/c6/49efc635a5f90b9c0547c071be9d717f.jpg', '55.00', 'reserved', 3, 3),
(4, 'AUDI', 'A3', 2010, '5-doors | manual 6-gear-shift | Benzin', 'https://i.pinimg.com/564x/ae/8d/f8/ae8df8f7a12a69b406d7a00f46030863.jpg', '45.00', 'reserved', 4, 4),
(5, 'BMW', '1er', 2011, '5-doors | 6-gear-shift manually | Benzin', 'https://i.pinimg.com/564x/92/12/97/921297cdfd2102fc4e9f41d75957de47.jpg', '40.00', 'reserved', 5, 5),
(6, 'BMW', '2er Active Tourer', 2014, '6-gear-shift manually | Hybrid', 'https://i.pinimg.com/564x/5e/9e/de/5e9ede8330dba82f604ed70aa9e43a9a.jpg', '60.00', 'reserved', 6, 6),
(7, 'VW', 'Polo V', 2014, '5-doors | 6-gear-shift manually | Benzin', 'https://i.pinimg.com/564x/21/89/10/218910ecf8b5810825198e935fd22fad.jpg', '35.00', 'reserved', 1, 1),
(8, 'VW', 'Caddy', 2012, '5-doors | Benzin', 'https://i.pinimg.com/564x/09/b4/18/09b4187a3b6936a4a75d5fcbb27614a8.jpg', '30.00', 'reserved', 3, 2),
(9, 'Jeep', 'Compass', 2017, '5-doors | manually gear-shift | Benzin', 'https://i.pinimg.com/564x/9d/1f/f0/9d1ff0b25d25f8564dcb6fb68fc33cb2.jpg', '45.00', 'available', 6, 8),
(10, 'Jaguar', 'XE', 2017, '4-doors | manually gear-shift | Benzin', 'https://i.pinimg.com/564x/a4/17/6e/a4176e8dfba2d1d4ada33350f15aa688.jpg', '80.00', 'available', 5, 12),
(11, 'Alfa', 'Romeo Stelvio', 2017, '5-doors | manually gear-shift | Benzin', 'https://i.pinimg.com/564x/b8/8d/5e/b88d5e2b125eb49447a7ad6357fb9ea8.jpg', '55.00', 'available', 4, 11),
(12, 'BMW', 'i8', 2017, '2-doors | automatic gear-shift', 'https://i.pinimg.com/564x/36/20/07/362007fbdfc82b90d4422bfb24430f8c.jpg', '95.00', 'available', 6, 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `current_location`
--

CREATE TABLE `current_location` (
  `c_loc_id` int(11) NOT NULL,
  `c_lat` double DEFAULT NULL,
  `c_lng` double NOT NULL,
  `c_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `current_location`
--

INSERT INTO `current_location` (`c_loc_id`, `c_lat`, `c_lng`, `c_address`) VALUES
(1, 48.193143, 16.364399, 'Große Neugasse 22-24, 1040 Wien'),
(2, 48.183987, 16.369892, 'Margaretengürtel 1, 1050 Wien'),
(3, 48.155595, 16.341053, ' Triester Str. 157A, 1100 Wien'),
(4, 48.234322, 16.345173, 'Felix-Mottl-Straße 15A, 1190 Wien'),
(5, 48.200466, 16.32732, ' Schweglerstraße 42, 1150 Wien'),
(6, 48.140934, 16.393238, 'Franz-Mika-Weg 7, 1100 Wien'),
(7, 48.19714, 16.336365, 'Felberstraße 1, 1150 Wien'),
(8, 48.115833, 16.566574, 'Vienna International Airport (VIE), 1300 Schwechat'),
(9, 48.108017, 16.318087, 'Vösendorfer Südring, 2334 Vösendorf, Austria'),
(10, 48.185215, 16.376476, 'Vienna Central Station Alfred-Adler-Straße 107'),
(11, 48.259098, 16.449675, 'Wagramer Straße 177, 1220 Wien'),
(12, 48.206947, 16.385244, 'Landstraßer Hauptstraße 1b, 1030 Wien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `office_lat` float(10,6) DEFAULT NULL,
  `office_lnt` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `office`
--

INSERT INTO `office` (`office_id`, `address`, `phone`, `office_lat`, `office_lnt`) VALUES
(1, 'Felberstraße 1, 1150 Wien', '+43 15879241', 48.197140, 16.336365),
(2, 'Vösendorfer Südring, 2334 Vösendorf, Austria', '+43 28375917', 48.108017, 16.318087),
(3, 'Vienna Central Station Alfred-Adler-Straße 107, 1100 Wien', '+43 79696839', 48.185215, 16.376476),
(4, 'Wagramer Straße 177, 1220 Wien', '+43 7947443', 48.259098, 16.449675),
(5, 'Landstraßer Hauptstraße 1b, 1030 Wien', '+43 79698765', 48.206947, 16.385244),
(6, 'Vienna International Airport (VIE), 1300 Schwechat', '+43 79696984', 48.115833, 16.566574);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `privileg` int(11) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) DEFAULT NULL,
  `user_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `privileg`, `registration_date`, `password`, `user_name`) VALUES
(1, 'Dominic', 'HeyHey', 'dominic.k@hotmail.com', NULL, '2018-06-30 12:02:40', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'dominic');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_office_id` (`fk_office_id`),
  ADD KEY `fk_c_loc_id` (`fk_c_loc_id`);

--
-- Indizes für die Tabelle `current_location`
--
ALTER TABLE `current_location`
  ADD PRIMARY KEY (`c_loc_id`);

--
-- Indizes für die Tabelle `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `current_location`
--
ALTER TABLE `current_location`
  MODIFY `c_loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`fk_office_id`) REFERENCES `office` (`office_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`fk_c_loc_id`) REFERENCES `current_location` (`c_loc_id`);
