-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Ιαν 2023 στις 13:51:16
-- Έκδοση διακομιστή: 10.4.27-MariaDB
-- Έκδοση PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `docwebox`
--

DELIMITER $$
--
-- Διαδικασίες
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_date_dimension` (IN `startdate` DATE, IN `stopdate` DATE)   BEGIN
    DECLARE currentdate DATE;
    SET currentdate = startdate;
    WHILE currentdate < stopdate DO
        INSERT INTO time_dimension VALUES (
                        YEAR(currentdate)*10000+MONTH(currentdate)*100 + DAY(currentdate),
                        currentdate,
                        YEAR(currentdate),
                        MONTH(currentdate),
                        DAY(currentdate),
                        DATE_FORMAT(currentdate,'%W'),
                        DATE_FORMAT(currentdate,'%M'),
                        NULL);
        SET currentdate = ADDDATE(currentdate,INTERVAL 1 DAY);
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_pat` int(11) NOT NULL,
  `time` time(6) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `calendar`
--

INSERT INTO `calendar` (`id`, `id_doc`, `id_pat`, `time`, `date`) VALUES
(1, 1, 1, '18:00:00.000000', '2023-01-15'),
(2, 1, 2, '19:00:00.000000', '2022-02-02'),
(3, 2, 2, '15:00:00.000000', '2022-03-03'),
(4, 1, 2, '14:00:00.000000', '2023-03-01'),
(5, 2, 1, '18:00:00.000000', '2023-02-20'),
(6, 3, 2, '20:00:00.280000', '2023-04-03');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `credentinals`
--

CREATE TABLE `credentinals` (
  `id` int(11) NOT NULL,
  `role` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `credentinals`
--

INSERT INTO `credentinals` (`id`, `role`, `username`, `password`, `id_role`) VALUES
(1, 'admin', 'admin', 'admin', 0),
(2, 'doc', 'j.papa', '12345', 1),
(3, 'doc', 'h.aug', '12345', 2),
(4, 'doc', 'a.ioan', '12345', 3),
(5, 'doc', 'm.anast', '12345', 4),
(6, 'pat', 'ch.ioan', '12345', 1),
(7, 'pat', 'th.tsit', '12345', 2),
(8, 'pat', 'm.geor', '12345', 3);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `exp` varchar(20) NOT NULL,
  `loc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `docs`
--

INSERT INTO `docs` (`id`, `fname`, `lname`, `exp`, `loc`) VALUES
(1, 'Ιωάννης', 'Παπαδόπουλος', 'Ορθοπαιδικός', 'Κιλκίς'),
(2, 'Χαράλαμπος', 'Αυγουστίδης', 'ΩΡΛ', 'Θεσσαλονίκη'),
(3, 'Αναστάσιος', 'Ιωαννίδης', 'Παθολόγος', 'Νέα Καλλικράτεια'),
(4, 'Μάριος', 'Αναστασιάδης', 'Παιδίατρος', 'Καλαμαριά');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `patients`
--

INSERT INTO `patients` (`id`, `fname`, `lname`) VALUES
(1, 'Χρήστος', 'Ιωάννου'),
(2, 'Θεόδωρος', 'Τσιτινίδης'),
(3, 'Μαρία', 'Γεωργίου');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `credentinals`
--
ALTER TABLE `credentinals`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `credentinals`
--
ALTER TABLE `credentinals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
