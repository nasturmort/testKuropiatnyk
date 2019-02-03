-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2019 г., 19:54
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbAuthor`
--

CREATE TABLE `tbAuthor` (
  `idAuthor` int(11) NOT NULL,
  `authorName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbAuthor`
--

INSERT INTO `tbAuthor` (`idAuthor`, `authorName`) VALUES
(1, 'Кинни Джефф'),
(2, 'Хоссейни Халед'),
(3, 'Михаил Булгаков'),
(4, 'Уотерс Сара'),
(5, 'Пелевин Виктор');

-- --------------------------------------------------------

--
-- Структура таблицы `tbAuthorBook`
--

CREATE TABLE `tbAuthorBook` (
  `idBook` int(11) NOT NULL,
  `idAuthor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbAuthorBook`
--

INSERT INTO `tbAuthorBook` (`idBook`, `idAuthor`) VALUES
(1, 2),
(2, 4),
(3, 5),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbBook`
--

CREATE TABLE `tbBook` (
  `idBook` int(11) NOT NULL,
  `bookName` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbBook`
--

INSERT INTO `tbBook` (`idBook`, `bookName`, `description`) VALUES
(1, ' Бегущий за ветром', 'Амир и Хасан дружат с детства. Только Амир &ndash; сын богача из Кабула, а Хасан &mdash; его слуга из хазарейцев'),
(2, 'Дорогие гости', 'Сара Уотерс – современный классик, «автор настолько блестящий, что читатели готовы верить каждому ее слову» (Daily Mail). О данном романе '),
(3, 'Тайные виды на гору Фудзи', 'Готовы ли вы ощутить реальность так, как переживали ее аскеты и маги древней Индии две с половиной тысячи лет назад? ...'),
(4, 'Дневник слабака', 'Очень веселая и смешная книжка об американском школьнике, ученике средней школы, который непрерывно встревает в необычные истории в самых обычных ...'),
(5, 'Дневник слабака 3. Последняя капля', 'последняя капля');

-- --------------------------------------------------------

--
-- Структура таблицы `tbGenre`
--

CREATE TABLE `tbGenre` (
  `idGenre` int(11) NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbGenre`
--

INSERT INTO `tbGenre` (`idGenre`, `genre`) VALUES
(1, 'Детектив'),
(2, 'Роман'),
(3, 'Поэма'),
(4, 'Повесть');

-- --------------------------------------------------------

--
-- Структура таблицы `tbGenreBook`
--

CREATE TABLE `tbGenreBook` (
  `idGenre` int(11) NOT NULL,
  `idBook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbGenreBook`
--

INSERT INTO `tbGenreBook` (`idGenre`, `idBook`) VALUES
(2, 1),
(1, 2),
(4, 4),
(2, 3),
(4, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbAuthor`
--
ALTER TABLE `tbAuthor`
  ADD PRIMARY KEY (`idAuthor`);

--
-- Индексы таблицы `tbAuthorBook`
--
ALTER TABLE `tbAuthorBook`
  ADD KEY `idBook` (`idBook`),
  ADD KEY `idAuthor` (`idAuthor`);

--
-- Индексы таблицы `tbBook`
--
ALTER TABLE `tbBook`
  ADD PRIMARY KEY (`idBook`);

--
-- Индексы таблицы `tbGenre`
--
ALTER TABLE `tbGenre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Индексы таблицы `tbGenreBook`
--
ALTER TABLE `tbGenreBook`
  ADD KEY `idGenre` (`idGenre`),
  ADD KEY `idBook` (`idBook`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbAuthor`
--
ALTER TABLE `tbAuthor`
  MODIFY `idAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tbBook`
--
ALTER TABLE `tbBook`
  MODIFY `idBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tbGenre`
--
ALTER TABLE `tbGenre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbAuthorBook`
--
ALTER TABLE `tbAuthorBook`
  ADD CONSTRAINT `tbauthorbook_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `tbAuthor` (`idAuthor`),
  ADD CONSTRAINT `tbauthorbook_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `tbBook` (`idBook`);

--
-- Ограничения внешнего ключа таблицы `tbGenreBook`
--
ALTER TABLE `tbGenreBook`
  ADD CONSTRAINT `tbgenrebook_ibfk_1` FOREIGN KEY (`idGenre`) REFERENCES `tbGenre` (`idGenre`),
  ADD CONSTRAINT `tbgenrebook_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `tbBook` (`idBook`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
