-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Maj 2021, 13:15
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_narciarski`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id` int(11) NOT NULL,
  `ulica` varchar(20) DEFAULT NULL,
  `dom` varchar(10) DEFAULT NULL,
  `kod` varchar(5) DEFAULT NULL,
  `miasto` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`id`, `ulica`, `dom`, `kod`, `miasto`, `user_id`) VALUES
(4, 'XCASXSA', '123213', '22222', 'asdasdasd', 20),
(6, 'XCASXSA', '123213', '22222', 'asdasdasd', 26);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `ID` int(11) NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `zdj` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`ID`, `nazwa`, `opis`, `cena`, `zdj`) VALUES
(1, 'smar żółty', 'Profesjonalny smar do nakładania na ciepło koloru żółtego temperatury od +7 do - 3', 100, './zdj/zolty.jpg'),
(2, 'smar czerwony', 'Profesjonalny smar do nakładania na ciepło koloru czerwonego temperatury od -3 do -10', 70, './zdj/czerwony.jpeg'),
(3, 'smar niebieski', 'Profesjonalny smar do nakładania na ciepło jako baza pod inne smary koloru niebieskiego', 50, './zdj/niebieski.jpeg'),
(4, 'smar czarny', 'Profesjonalny smar do nakładania na ciepło koloru żółtego na stary śnieg temperatury od 10 do 0', 60, './zdj/czarny.jpg'),
(5, 'zestaw imadeł vola', 'zestaw imadeł od firmy vola stworzonych specjalnie do przygotowywania nart', 600, './zdj/imadla.jpeg'),
(6, 'smar', 'to je smal kololowy', 23, './zdj/zolty.jpg'),
(7, 'smar kololowy', 'to je smal kololowy', 23, './zdj/imadla.jpeg'),
(11, 'cossdas', 'asdasdasdasdasdasdasd', 213, './zdj/czarny.jpg'),
(12, 'sebek', 'seba', 0, './zdj/pobrane.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `userFirstName` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `userLastName` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `userFirstName`, `userLastName`) VALUES
(19, 'adas', '$2y$10$D2xMRSD9cPEeHGExsn9IY.NBCJ87.gxpCcTwtxST5kbUgXyxMyPBu', 'adas@adas.pl', 'adas', 'adas'),
(4, 'andrzej777', '$2y$10$4WuZ4zQ.4YFqz9wTE02Zgecv6Q.PBrsyPEK38SLw4ck9zl6PuqEai', 'andrzej@gmail.com', 'Andrzej', 'chnat'),
(1, 'admin', '$2y$10$YKpFMU9sE1sUkjh8XmZoDugO2simIS/CwcphHVA0GyLt.wGADCNP.', 'admin@admin.pl', 'admin', 'admin'),
(11, 'aPrzybyla7', '$2y$10$5oMhLfSon6EAO1JGeApECuiVyJAQq4Uu6FWqAlsU1b6Vls0bHZNIS', 'albert.przybyla2@gmail.com', 'Albert', 'Przybyła'),
(12, 'albert333', '$2y$10$/vuP4uyCaVDMY5wupPCQsOUDHqJPV1r966Js4e8B3ZptjhWSOHlte', 'albert.przybyla12@gmail.com', 'Albert', 'Przybyła'),
(13, 'seba', '$2y$10$BAqzfHr7l/i.PNL3g4U36O39RHAb63CChSA4xVv50WULyU/yABsl6', 'seba@gmail.com', 'seba', 'seba'),
(14, 'michal', '$2y$10$s0jOeMDH2X7Ev4LSFsDsd.6fHowj/OHTaefOWfTzOpC09/y2ZcQ4G', 'michal@wp.pl', 'michal', 'michal'),
(15, 'adamG', '$2y$10$YQdJZh7ofnuBFjiHAa8GAeETySbsJgxSYuPHufNpOLmMPWxk/jMRi', 'garczar@debil.com', 'adam', 'garczarek'),
(16, 'adam333', '$2y$10$hbEVehRFs.PFsw9NZDZsuO6OKey2iFgS2uFUrSuHoLFUaE61TcKUW', 'dasdas@dfasdas.pl', 'adam', 'garczarek'),
(17, 'varczar', '$2y$10$iOoNMA6QfVJwpDtgT1fHyO7W3t.orlPFFFXi2WrF3Tj.0vKHBAoP.', 'dsadas@dasds.pl', 'adam', 'Garczareek'),
(24, 'agnieszka', '$2y$10$WAYAeWykVX8tPtRfPcaFZO/JxFE2PX3DEgst..HM0C6cbawEb.CBW', 'DQWDQWD@DAWS.PL', 'DQWDQW', 'DWQSDQW'),
(26, 'agnieszkad', '$2y$10$mqkL0ABOh4d4uF5.Wthw2uNY9aJzGE2byIdtaIhvMaKENRxmkscvW', 'DQWDQWD@DAWdS.PL', 'DQWDQW', 'DWQSDQW');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `IDzamowienia` int(11) NOT NULL,
  `IDuzytkownika` int(11) NOT NULL,
  `IDproduktu` int(11) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`IDzamowienia`),
  ADD KEY `IDproduktu` (`IDproduktu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adresy`
--
ALTER TABLE `adresy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `IDzamowienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`IDproduktu`) REFERENCES `produkty` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
