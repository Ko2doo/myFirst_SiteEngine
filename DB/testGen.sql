-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 30 2019 г., 10:50
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testGen`
--

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `text`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe omnis veritatis, sunt quidem. Libero asperiores modi ipsam debitis alias, eveniet voluptatibus ipsa.'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, voluptatum quidem soluta? Vero adipisci fuga optio doloribus, totam libero, delectus. Sit inventore autem non ipsam vero, iste qui odio pariatur doloribus a!'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur facere praesentium quis earum in, consectetur.'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.'),
(7, 'ЗLorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione alias asperiores eos doloribus sapiente sint dolorum quo doloremque repudiandae, consequuntur tenetur. Veniam.');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `uid`, `text`) VALUES
(6, 2, 'Используем текст рыбу чтобы заполнить пространство:\n\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ipsum inventore dolorem, esse, omnis ex a ab nostrum labore! Iste, cupiditate, dolore.'),
(7, 2, 'Используем текст рыбу чтобы заполнить пространство:\n\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ipsum inventore dolorem, esse, omnis ex a ab nostrum labore! Iste, cupiditate, dolore.'),
(8, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde corporis et exercitationem quis, magnam cum voluptas hic, beatae delectus, atque quisquam sapiente quod tempore pariatur perspiciatis reiciendis, similique id ab nesciunt laborum alias doloribus repellat. Velit neque blanditiis delectus. Ratione amet ad dolor nobis.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `ip` text NOT NULL,
  `protected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `ip`, `protected`) VALUES
(2, 'ko2doodev@gmail.com', '7ea5f3b61cc2a138a0758b222f7e7ab9', '', 0),
(4, 'Petrenko@gmail.com', 'b3039a8da9a06401d947ccf2141018c0', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
