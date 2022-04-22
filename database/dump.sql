-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2022 г., 13:11
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `created_date`, `message`) VALUES
(1, 9, '2022-04-21', 'count — Подсчитывает количество элементов массива или Countable объекте'),
(2, 9, '2022-04-21', 'Вкуснейшее блюдо в мире покажется простой едой, если проглотить его одним махом. Чтобы продегустировать вино, нельзя залпом выпивать весь бокал: ценитель не торопится и наслаждается красотой напитка. Чтобы стать дегустатором жизни, оценить всю неповторимость и разнообразие того, что она может нам предложить, нужно замедлиться.'),
(3, 9, '2022-04-21', 'Каждый день используйте свое зрение так, будто завтра вас поразит слепота. Слушайте звуки голосов, птичье пение так, будто завтра вы оглохнете навсегда. Вдыхайте аромат цветов, наслаждайтесь вкусом пищи так, будто завтра вы потеряете обоняние и все для вас станет пресным.'),
(4, 9, '2022-04-21', 'У нас не всегда есть выбор, слушать или не слушать вредный внутренний голос, но у нас всегда есть выбор, что с ним делать. Сдаться на милость своим гнетущим мыслям и жить под их игом или отвергнуть их и начать жить по законам своего настоящего «я».'),
(5, 9, '2022-04-21', 'Жизнь дает нам исходный материал: но только от нас зависит, какие из имеющихся возможностей брать и как их использовать.'),
(6, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(7, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(8, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(9, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(10, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(11, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(12, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(13, 9, '2022-04-21', 'В каждой ситуации, на каждом перепутье у вас есть выбор: исходить из лучшего «я» или плыть по течению. Как реагировать на критику близкого человека? Что сказать начальнику? Чему вы позволите взять верх: великодушию или мелочности? Дадите ли вы волю своему гневу — или обнимете с нежностью?'),
(14, 9, '2022-04-21', 'Мужество не в том, чтобы не испытывать страха, мужество в том, чтобы идти вперед, несмотря на страх.'),
(16, 9, '2022-04-21', 'Часто лучший способ помочь себе — это помогать другим.'),
(17, 9, '2022-04-21', 'Тысячи свечей могут загореться от одной-единственной свечи, и жизнь ее от этого не станет короче. Счастье никогда не станет меньше, если разделить его с другим.'),
(19, 9, '2022-04-22', 'Принцесса Лилиан, герцогиня Халландская (30 августа 1915 — 10 марта 2013) — член шведского королевского дома, супруга принца Бертиля, герцога Халландского (1912—1997), тётя короля Карла XVI Густава, бывшая английская модель.'),
(20, 9, '2022-04-22', 'Лилиан родилась в Суонси — втором по величине городе Уэльса и была дочерью Уильяма Девиса и Гледис Мери Курен. В юности стала работать моделью и появилась на обложке журнала «Vogue». Её родители расстались, когда ей было пять лет. Официально развод был зарегистрирован в 1939 году.'),
(21, 9, '2022-04-22', 'В 1940—1945 годах она была замужем за английским актёром Иваном Крейгом. Во время Второй мировой войны работала на заводе, изготавливая радио для Королевского флота, а также сестрой милосердия в госпитале для раненных солдат.'),
(22, 9, '2022-04-22', 'В 1940—1945 годах она была замужем за английским актёром Иваном Крейгом. Во время Второй мировой войны работала на заводе, изготавливая радио для Королевского флота, а также сестрой милосердия в госпитале для раненных солдат.2'),
(23, 9, '2022-04-22', 'В 1943 году она впервые встретила в Лондоне принца Бертиля Шведского — сына короля Густава VI Адольфа и Маргариты Коннаутской. Вскоре после этого они стали любовниками, хотя Лилиан была замужем за Иваном. В 1945 году супруги развелись. После того как старший брат Бертиля принц Густав Адольф погиб в 1947 году, оставив годовалого сына, у него появился шанс стать регентом шведского королевства. По этой причине, он решил не жениться на Лилиан, так как это лишило бы его престола. Несколько лет они жили вместе, скрывая свои отношения. Проживали в Сент-Максиме на Юге Франции. Отец принца, король Густав VI, прожил долгую жизнь, и за этого время племянник Бертиля достиг совершеннолетия.'),
(24, 9, '2022-04-22', 'После смерти короля Густава VI Адольфа (в 1973 году), Лилиан и Бертиль заключили брак. Венчание состоялось 7 декабря 1976 года. Тем не менее, Бертиль продолжал выступать в качестве заместителя короля в его отсутствии. Его жена стала именоваться принцесса Лилиан, герцогиня Халландская. Проживать супруги стали на собственной вилле Сульбаккен.'),
(25, 9, '2022-04-22', 'Бертиля не стало 30 августа 1997 года. Он умер на 82 день рождения его супруги. В 1997—2010 годах принцесса Лилиан продолжала представлять Швецию на официальных мероприятиях и праздниках. В 2000 году она выпустила автобиографическую книгу о жизни при королевском дворе, а также о семейной жизни с Бертилем. В августе 2008 года принцесса упала и сломала ребро в своём доме. Подобный случай повторился в феврале 2009 года. 3 июня 2010 года было объявлено, что принцесса Лилиан больна болезнью Альцгеймера[1] и больше не может выполнять общественные обязанности.'),
(27, 10, '2022-04-22', 'Марьино — деревня Сергиево-Посадского района Московской области. Входит в состав сельского поселения Шеметовское, 1994—2006 гг. — административный центр Марьинского сельского округа Сергиево-Посадского района[2][3][4]. Население — 764[1] чел. (2010).'),
(37, 9, '2022-04-22', 'В зависимости от драйвера PDO этот метод может вообще не выдать осмысленного результата, так как база данных может не поддерживать автоматического инкремента полей или последовательностей.'),
(38, 12, '2022-04-22', 'Александр Иванович Маринеско (2 [15] января 1913 года, Одесса, Херсонская губерния, Российская империя — 25 ноября 1963 года, Ленинград, СССР) — советский подводник, капитан 3-го ранга, во время Великой Отечественной войны командовавший подводными лодками М-96 и С-13 Краснознамённого Балтийского флота ВМФ СССР. В 1941—1945 годах совершил шесть боевых походов, в ходе которых потопил два корабля противника общей вместимостью 40 144 брт и повредил ещё один. Является лидером по суммарному тоннажу уничтоженных кораблей противника среди советских подводников. Будучи командиром подводной лодки С-13, стал широко известен потоплением 30 января 1945 года плавказармы военно-морского флота нацистской Германии (бывшего лайнера) «Вильгельм Густлофф», в результате которого погибло, по разным оценкам, от 3700 до 9300 человек, подавляющее большинство из которых являлись беженцами. В ряде советских и современных российских публикаций уничтожение «Вильгельма Густлоффа» именуется «атакой века», а самого Александра Маринеско в них называют «подводником № 1».');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `created_at`, `email`, `user_role`) VALUES
(1, 'Marat №470', 'ddabda7879ac8ecca6eea186fe27d99736ff9aa3', '2022-04-20', '1@', 1),
(2, 'Marat №872', 'ddabda7879ac8ecca6eea186fe27d99736ff9aa3', '2022-04-20', '2@', 1),
(3, 'Marat №343', 'ddabda7879ac8ecca6eea186fe27d99736ff9aa3', '2022-04-20', '3@', 1),
(4, 'Marat №760', 'ddabda7879ac8ecca6eea186fe27d99736ff9aa3', '2022-04-20', '4@', 1),
(5, 'Marat №33', 'ddabda7879ac8ecca6eea186fe27d99736ff9aa3', '2022-04-20', '5@', 1),
(6, 'Test', 'fcc31f2d42c6d860d18bfe56380f675a5701650c', '2022-04-20', '6@', 1),
(7, 'test2', 'fcfec55a17a8c900670a4c946e2dd16874de0a73', '2022-04-20', '7@', 1),
(8, 'test3', 'e52df6d2a7cc67272b580f809b9a4e4db77e4ea0', '2022-04-21', 't@t.ru', 1),
(9, 'qqq', 'fcc31f2d42c6d860d18bfe56380f675a5701650c', '2022-04-21', 'q@q', 2),
(10, 'WOW', 'fcc31f2d42c6d860d18bfe56380f675a5701650c', '2022-04-22', 'w@w', 1),
(11, '123', 'a499b43fd232bee673e59325069a13bba3e7c2d5', '2022-04-22', 'p@p', 1),
(12, 'p2@p', '5f45d912ec5bfaa428701ec1505756ca172c29ef', '2022-04-22', 'p2@p', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
