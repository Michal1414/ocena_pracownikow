-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 10:42 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocena_pracownikow`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id_oceny` int(11) NOT NULL,
  `id_oceniajacego` int(11) DEFAULT NULL,
  `id_ocenianego` int(11) DEFAULT NULL,
  `wynik_pytania1` int(11) DEFAULT NULL,
  `wynik_pytania2` int(11) DEFAULT NULL,
  `wynik_pytania3` int(11) DEFAULT NULL,
  `wynik_pytania4` int(11) DEFAULT NULL,
  `wynik_pytania5` int(11) DEFAULT NULL,
  `wynik_pytania6` int(11) DEFAULT NULL,
  `opisowa_ocena` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oceny`
--

INSERT INTO `oceny` (`id_oceny`, `id_oceniajacego`, `id_ocenianego`, `wynik_pytania1`, `wynik_pytania2`, `wynik_pytania3`, `wynik_pytania4`, `wynik_pytania5`, `wynik_pytania6`, `opisowa_ocena`) VALUES
(1, 1, 2, 1, 2, 3, 3, 2, 1, 'nie lubie go'),
(2, 1, 3, 5, 5, 5, 5, 5, 5, 'jest super'),
(3, 1, 5, 1, 1, 1, 1, 1, 1, '213123123213123123123123123123123123123123123123123123123123123123123132123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `surname` varchar(80) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `teamID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `name`, `surname`, `email`, `password`, `teamID`) VALUES
(1, 'Jan', 'Kowalski', 'email@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SE5adUN3TUlYV043LlY1VQ$jmZkCV1ZrLxniJLE7xUz4n9FQ6HY0nLiKt6SoZAaoQ0', 741258),
(2, 'Ryszard', 'Pączek', 'email2@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SkpNTFU1VGlxWkJFa3ljcw$ltnzEI/eNiWy5wYDk5+Ap38CzB6wBj3pBkOVNptHBII', 741258),
(3, 'Beata', 'Małą', 'email3@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Z3BjdTJSbnpST0pkbzFpTw$KnQdHXbu0vgr1e8okR5lmPw4xVge3Tk1EMqlf4KyiZo', 741258),
(4, 'Tomasz', 'Biały', 'email4@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WVFjUG8zMFZCSkVQQ1BjRg$5yiIO1B2xZWur0qQ2Z7+XKGXG9dCiqcx+E689as42kU', 147852),
(5, 'Adam', 'Nowak', 'email5@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$d090Lm1rcDFGM1l1OGh2dA$nsDM2VpeyuyO+sft6iTIB75ed6AwomBFmuyN6vc3t7A', 741258),
(6, 'Anna', 'Wiśniewska', 'email6@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WnYwSkpyL09rVDJBWHFPdg$/C8PYPtMvMZbCLYbq7HMlvr9f6Pn9wisl5EWrDphxgU', 741258),
(7, 'Ktarzyna', 'Wójcik', 'email7@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VEEudXNHaE1VRGJoMGhDdA$JYyUWxyMuvXVsSQq8UHJJuXlVaUWQaxMA5A7sH8JR/c', 741258),
(8, 'Monika', 'Mazur', 'email8@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$UmFDdGVTekhTQTVCWUU1Nw$nAE7o6yfZMoX5TM7OOcSQCPVU1z5J0JWBuVCVPNQ10s', 741258),
(9, 'Natalia', 'Kaczmarek', 'email9@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$T0xIMmpYa0hLcU5jUDgzeQ$SGmBHbo7EJK0n6tU9j06GT5i3xIqnfqh/UZUsLPGuA4', 741258),
(10, 'Robert', 'Szymański', 'email@gmail.com10', '$argon2i$v=19$m=65536,t=4,p=1$UWZuUmdPNWdRWjQ5cmVCSg$/wd35aL19wSczMld6Cvy9qnqtXzJj2GoeStWXDNGrK0', 741258),
(11, 'Marcin', 'Kamiński', 'email@gmail.com11', '$argon2i$v=19$m=65536,t=4,p=1$NHR0RlNXcXdPU1NrQVZyZg$ZnYMvF9HAwq7MD/er3GBMRyqUGqDLy6wPLx5V73lKLU', 741258);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id_oceny`),
  ADD KEY `id_oceniajacego` (`id_oceniajacego`),
  ADD KEY `id_ocenianego` (`id_ocenianego`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oceny`
--
ALTER TABLE `oceny`
  ADD CONSTRAINT `oceny_ibfk_1` FOREIGN KEY (`id_oceniajacego`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `oceny_ibfk_2` FOREIGN KEY (`id_ocenianego`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
