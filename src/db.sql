-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 18 2021 г., 07:06
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `kika_urpl_io_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `i_url_data`
--

CREATE TABLE `i_url_data` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL COMMENT 'Входящий URL',
  `short_code` varchar(255) NOT NULL COMMENT 'Код для редиректа',
  `date_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `i_url_data`
--
ALTER TABLE `i_url_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

