-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 22 2024 г., 18:04
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `airport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `airplane`
--

CREATE TABLE `airplane` (
  `ID_airplane` int(7) NOT NULL,
  `Model` varchar(35) DEFAULT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Status_airplane` varchar(20) DEFAULT NULL,
  `Capacity` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `airplane`
--

INSERT INTO `airplane` (`ID_airplane`, `Model`, `Number`, `Status_airplane`, `Capacity`) VALUES
(1, 'Boeing 737-800', 'UA123', 'готовий', 45),
(2, 'Airbus A320', 'LH456', 'готовий', 27),
(3, 'Embraer E190', 'AF789', 'готовий', 18),
(4, 'Boeing 777-300ER', 'DL321', 'готовий', 30),
(5, 'Airbus A350-900', 'QR654', 'ремонт', 27),
(6, 'Bombardier CRJ900', 'KL987', 'готовий', 45),
(7, 'Boeing 787-9', 'AA852', 'обслуговування ', 54),
(8, 'Embraer R2', 'R2', 'готовий', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `airport`
--

CREATE TABLE `airport` (
  `ID_airport` int(7) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `City` varchar(90) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `airport`
--

INSERT INTO `airport` (`ID_airport`, `Name`, `City`, `Country`) VALUES
(1, 'Аеропорт Хітроу', 'Лондон', 'Велика Британія'),
(2, 'Аеропорт Шарль де Голль', 'Париж', 'Франція'),
(3, 'Франкфурт', 'Франкфурт', 'Німеччина'),
(4, 'Схіпгол', 'Амстердам', 'Нідерланди'),
(5, 'Аеропорт Адольфо Суарес Мадрид-Барахас', 'Мадрид', 'Іспанія'),
(6, 'Міжнародний аеропорт імені Джона Кеннеді', 'Нью-Йорк', 'США'),
(7, 'Міжнародний аеропорт Лос-Анджелес', 'Лос-Анджелес', 'США'),
(8, 'Аеропорт Ханеда', 'Токіо', 'Японія'),
(9, 'Міжнародний аеропорт Дубай', 'Дубай', 'ОАЕ'),
(10, 'Міжнародний аеропорт Чангі', 'Сінгапур', 'Сінгапур');

-- --------------------------------------------------------

--
-- Структура таблицы `flight`
--

CREATE TABLE `flight` (
  `ID_flight` int(7) NOT NULL,
  `Number_flight` bigint(25) DEFAULT NULL,
  `InputDate` datetime DEFAULT NULL,
  `OutputDate` datetime DEFAULT NULL,
  `IDinAirport` int(7) DEFAULT NULL,
  `IDoutAirport` int(7) DEFAULT NULL,
  `ID_airplane` int(7) DEFAULT NULL,
  `ID_pilot1` int(7) DEFAULT NULL,
  `ID_pilot2` int(7) DEFAULT NULL,
  `FlightDate` date DEFAULT NULL,
  `Price` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `flight`
--

INSERT INTO `flight` (`ID_flight`, `Number_flight`, `InputDate`, `OutputDate`, `IDinAirport`, `IDoutAirport`, `ID_airplane`, `ID_pilot1`, `ID_pilot2`, `FlightDate`, `Price`) VALUES
(1, 2205202401, '2024-05-02 04:10:00', '2024-05-01 16:20:00', 1, 10, 1, 1, 2, '2024-05-22', 7600),
(2, 2205202402, '2024-05-09 00:15:00', '2024-05-08 18:30:00', 2, 9, 2, 2, 3, '2024-05-22', 6900),
(3, 2205202403, '2024-05-23 16:20:00', '2024-05-22 08:30:00', 3, 8, 3, 3, 4, '2024-05-22', 7200),
(4, 2205202404, '2024-05-23 20:30:00', '2024-05-22 10:30:00', 4, 7, 4, 4, 5, '2024-05-22', 8700),
(5, 2205202405, '2024-06-24 20:30:00', '2024-06-23 11:30:00', 2, 6, 6, 1, 8, '2024-05-22', 6900),
(6, 2205202406, '2024-06-24 00:35:00', '2024-06-23 15:20:00', 4, 9, 6, 3, 7, '2024-05-22', 8300),
(7, 2205202407, '2024-05-24 17:25:00', '2024-05-23 09:30:00', 3, 8, 1, 6, 2, '2024-05-22', 7600),
(9, 2205202408, '2024-06-08 18:01:00', '2024-06-07 18:01:00', 3, 8, 4, 5, 1, '2024-05-22', 7800),
(10, 2205202409, '2024-06-02 18:27:00', '2024-06-01 18:27:00', 1, 4, 8, 4, 1, '2024-05-22', 12000);

-- --------------------------------------------------------

--
-- Структура таблицы `pilot`
--

CREATE TABLE `pilot` (
  `ID_Pilot` int(7) NOT NULL,
  `NameP` varchar(30) DEFAULT NULL,
  `SurnameP` varchar(30) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `License` varchar(40) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `Contact_detals` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pilot`
--

INSERT INTO `pilot` (`ID_Pilot`, `NameP`, `SurnameP`, `BirthDate`, `License`, `Qualification`, `Contact_detals`) VALUES
(1, 'Олександр', 'Петрович', '1985-06-15', 'ABCDX123456', 'Aerobatic Rating', '+380(94)  672  83  51'),
(2, 'Марія', 'Іваненко', '1990-04-23', 'EFGHY789012', 'Commercial Rating', '+380(38)  475  69  02'),
(3, 'Андрій', 'Коваленко', '1978-07-07', 'IJKLZ345678', 'Flight Instructor Rating', '+380(67)  928  31  40'),
(4, 'Олена', 'Савченко', '1995-02-12', 'MNOPQ901234', 'Heavy Aircraft Rating', '+380(81)  523  74  69'),
(5, 'Дмитро', 'Шевченко', '1983-09-30', 'RSTUV567890', 'Instrument Rating', '+380(29)  384  75  61'),
(6, 'Анна', 'Кузьменко', '1988-08-18', 'WXYZA234567', 'Night Rating', '+380 (52) 837 41  96'),
(7, 'Ігор', 'Мельник', '1975-05-05', 'BCDEF890123', 'Seaplane Rating', '+380 (73) 129  50 84'),
(8, 'Наталія', 'Сидоренко', '1992-11-01', 'GHIJK456789', 'Type Rating', '+380(50)  718  42  93');

-- --------------------------------------------------------

--
-- Структура таблицы `qualification`
--

CREATE TABLE `qualification` (
  `qualifications` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `qualification`
--

INSERT INTO `qualification` (`qualifications`) VALUES
('Aerobatic Rating'),
('Commercial Rating'),
('Flight Instructor Rating'),
('Heavy Aircraft Rating'),
('Instrument Rating'),
('Mountain Rating'),
('Night Rating'),
('Seaplane Rating'),
('Type Rating');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`status`) VALUES
('готовий'),
('обслуговування '),
('ремонт');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `ID_ticket` int(7) NOT NULL,
  `ID_flight` int(7) DEFAULT NULL,
  `NamePas` varchar(30) DEFAULT NULL,
  `SurnamePas` varchar(30) DEFAULT NULL,
  `seat` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`ID_ticket`, `ID_flight`, `NamePas`, `SurnamePas`, `seat`) VALUES
(1, 9, 'Тетяна', 'Демченко', 1),
(3, 10, 'Катерина', 'Гончар', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `airplane`
--
ALTER TABLE `airplane`
  ADD PRIMARY KEY (`ID_airplane`),
  ADD KEY `Status_airplane` (`Status_airplane`);

--
-- Индексы таблицы `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`ID_airport`);

--
-- Индексы таблицы `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`ID_flight`),
  ADD KEY `IDinAirport` (`IDinAirport`),
  ADD KEY `IDoutAirport` (`IDoutAirport`),
  ADD KEY `ID_airplane` (`ID_airplane`),
  ADD KEY `ID_pilot1` (`ID_pilot1`),
  ADD KEY `ID_pilot2` (`ID_pilot2`);

--
-- Индексы таблицы `pilot`
--
ALTER TABLE `pilot`
  ADD PRIMARY KEY (`ID_Pilot`),
  ADD KEY `Qualification` (`Qualification`);

--
-- Индексы таблицы `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualifications`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID_ticket`),
  ADD KEY `ID_flight` (`ID_flight`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `airplane`
--
ALTER TABLE `airplane`
  MODIFY `ID_airplane` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `airport`
--
ALTER TABLE `airport`
  MODIFY `ID_airport` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `flight`
--
ALTER TABLE `flight`
  MODIFY `ID_flight` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `pilot`
--
ALTER TABLE `pilot`
  MODIFY `ID_Pilot` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID_ticket` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `airplane`
--
ALTER TABLE `airplane`
  ADD CONSTRAINT `airplane_ibfk_1` FOREIGN KEY (`Status_airplane`) REFERENCES `status` (`status`);

--
-- Ограничения внешнего ключа таблицы `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`IDinAirport`) REFERENCES `airport` (`ID_airport`),
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`IDoutAirport`) REFERENCES `airport` (`ID_airport`),
  ADD CONSTRAINT `flight_ibfk_3` FOREIGN KEY (`ID_airplane`) REFERENCES `airplane` (`ID_airplane`),
  ADD CONSTRAINT `flight_ibfk_4` FOREIGN KEY (`ID_pilot1`) REFERENCES `pilot` (`ID_Pilot`),
  ADD CONSTRAINT `flight_ibfk_5` FOREIGN KEY (`ID_pilot2`) REFERENCES `pilot` (`ID_Pilot`);

--
-- Ограничения внешнего ключа таблицы `pilot`
--
ALTER TABLE `pilot`
  ADD CONSTRAINT `pilot_ibfk_1` FOREIGN KEY (`Qualification`) REFERENCES `qualification` (`qualifications`);

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`ID_flight`) REFERENCES `flight` (`ID_flight`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
