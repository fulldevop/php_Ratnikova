-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 22 2019 г., 08:45
-- Версия сервера: 8.0.12
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skvot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session` mediumtext NOT NULL,
  `id_good` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` mediumtext,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Сноуборд для фрирайда RHYME BACKCOUNTRY FREERIDE STREAM', 'Приготовьтесь ездить на чистом фрирайде, границы которого мы еще не обнаружили. Stream доступен в одной ростовке 166 см и предназначен для продвинутого уровня любителей больших пространств или Хелибординга. Доска для фрирайда - это концентрация всех ноу-хау технологий. Карбоновые волокна, pintail, гибридный рокер. На хорошей скорости STREAM превращается в острое оружие для техничных райдеров паудера. \r\n \r\nДлина доски - 166 см.\r\nРадиус поворота - 12,9 м.\r\nШирина носа - 299 мм.\r\nШирина талии - 260 мм.\r\nШирина хвоста - 279 мм.\r\nВес доски - около 2775 гр.\r\n \r\n<b>Особенности:</b> \r\nСэдвич конструкция.\r\nВерхняя крышка - Водоотталкивающий полированный полиамид\r\nИспользуемая древесина - Paulownia\r\nКонструкция - дву-направленное стекловолокно.  Карбоновые Х-образные усилители на хвосте, в середине и на носу. Наклонные боковые стенки\r\nГеометрия - гибридный рокер. В середине 6мм кэмбер.\r\nСкользяк - Гоночный скользяк NHS. Спеченный 6000 с частицами фтора\r\nЗаточка канта - -1градус.\r\nДля чего нужна такая доска ? - Для катания по безграничным полям снежной целины. Но, и на трассе она достаточно стабильна.', 59900),
(2, 'Сноуборд JONES Twin Sister', 'Twin Sister - это доска для сноубордисток, всегда старающихся выбрать самую красивую и креативную линию спуска. Уникальное сочетание шейпа и внутренней структуры уже восемь лет помогают самым отчаянным райдерам раскатывать горы так же легко как соседский скейтпарк. Поднятые нос и хвост удержат на плаву в глубоком снегу и не дадут кантам зацепиться на джибовой фигуре, а классический кембер между закладными и Traction Tech удержат на ледяной стене пайпа или на задутой корке высокогорного снега. Материал верха создан на основе касторовых бобов, и это не просто дань экологии, а поверхность, к которой не прилипает снег.\r\n\r\n<b>Особенности:</b>\r\nCamrock - уникальное сочетание жёсткости и профиля, при котором рокер на носу и хвосте равномерно сбалансирован, а между креплениями сохранён классический прогиб, он позволяют катать как в своей стойке, так и в свитче, а кембер между закладными сохраняет мощь и щелчок в центре доски\r\nTraction Tech - подобно ножу с серрейторной заточкой в снегу, Traction Tech увеличивает хваткость кантов добавляя больше контактных точек со склоном по всей рабочей длине доски\r\nProgressive Sidecut - от середины к концам сноуборда радиус бокового выреза постепенно увеличивается, по мере приближения к контактным точкам - такое плавное увеличение радиуса к носу и хвосту делает вход в поворот более мягким и предсказуемым, без резкого переброса в перекантовку\r\nBlunt Nose - как доска проходит свежий снег, тонкий задутый наст или ледяную корку полностью решается в передней контактной точке. Прибавив ширины и одновременно убавив длину носа, специалисты Jones Snowboards убрали \"эффект плуга\", свойственный круглому носу, прибавив сноуборду фрирайдных качеств\r\nSintered 7000 Base - выносливый и простой в обслуживании скользяк с добавлением карбона для большей скорости, за счёт невысокой плотности прекрасно впитывает парафин и легко чинится\r\nMaster Core - цельнодеревянный сердечник из двух сортов дерева: гибкий и живучий тополь с вставками из ультра-лёгкой павловнии', 30600),
(3, 'Детский сноуборд BURTON Process Smalls', 'Подростковая версия популярной фристайловой доски Process - про-модели Марка МакМориса. Мягкая и ультра-стабильная доска для молодых райдеров, которые хотят достичь новых высот во фристайле. Уменьшенная копия любимой командной доски. Легкая и предсказуемая фристайловая твин тип доска. Идеально подойдет любителям фристайла и классических твин тип досок.\r\n\r\nОсобенности данного сноуборда:\r\nЦелевая группа - дети.\r\nУровень катания - продвинутый.\r\nЖесткость - средняя.\r\nПредназначение - All Mountain / Freestyle / Park / Pipe\r\nГеометрия - Twin Tip\r\nПрогиб - Flat Top.\r\n\r\n<b>Технологии:</b>\r\nTwin Tip - Доска одинаковой жесткости как в носовой части, так и в хвостовой. Позволяет кататься как в своей стойке, так и в свиче. Идеально для фристайла.\r\nFlat Top: Плоская между закладными и чуть загнутые вверх нос и хвост доски. Стабильная и управляемая.\r\nFSC™ Certified Super Fly® 800G Core: Легкий и упругий сердечник, набранный из клиньев разных пород древесины. \r\nDualzone™ EGD™: Суть данной технологии в том, что клинья сердечника в области креплений набраны поперек сноуборда, что позволяет обеспечить невероятный контроль и управляемость.\r\nBIAX™: стекловолокно в конструкции сноуборда для торсионной жесткости.\r\nExtruded Base: скоростной и прочный, простой в обслуживании скользяк	\r\nPro-Tip™: конический профиль носа и хвоста для уменьшения веса и лучшей маневренности в целине\r\nFILET-O-FLEX: Профиль доски значительно тоньше, что позволяет сохранить мягкость без ущерба для стабильности и управляемости.\r\nThe Channel (шина для установки креплений): Тонкая шина для простой и надежной установки и регулировки креплений.\r\nScoop: специальная форма носа и хвоста для еще более четких поворотов', 14500),
(4, 'Сноуборд CAPITA Scott Stevens Mini', 'Про-модель Скотта Стивенса в детском варианте? Да, в этом сезоне возможно и такое. Несмотря на то, что это сноуборд для детей, его начинка почти полностью повторяет взрослую версию, но, конечно, с поправками на большую мягкость и небольшой вес райдера. Гибридный прогиб, симметричная геометрия, прочный сердечник с волокном Micro-Glass Magic Bean™ Resin, в составе которого находятся бобы, имеет самый высокий коэффициент прочности к весу, обновленные боковые стенки и надежный спеченный скользяк. Теперь можно не кататься на доске старшего брата, которая не подходит по ростовке и геометрии, ведь уже достаточно моделей для райдеров любого возраста, а это значит, что они будут прогрессировать намного быстрее и стабильнее.\r\n\r\n\r\n<b>Особенности:</b>\r\nДетский сноуборд\r\nПро-модель Scott Stevens\r\nЖесткость: 3/10\r\nПрогиб Freedom Mini: основная часть доски между креплениями имеет плоскую флэтовую форму, нос и хвост имеют рокерный прогиб за счет чего края доски плавно загибаются вверх. Плоское основание позволяет доске быть не только невероятно маневренной, но и стабильной на вылетах и приземлениях, а задранные края позволят доске легче всплывать в глубоком снегу\r\n\r\nСимметричная геометрия Twin делает доску максимально сбалансированной и универсальной. Дает максимальную мобильность для фристайла\r\nРадиальный боковой вырез\r\nFSC® Certified Select Core™: легкий и прочный сердечник для максимальной отзывчивости\r\nВолокно Micro-Glass Magic Bean™ Resin, в составе которого находятся бобы, имеет самый высокий коэффициент прочности к весу\r\nВерхний слой PAM16000™: высококачественный прочный верхний слой. Способ нанесения рисунка - шелкография\r\nОбновленные боковые стенки из ABS1000\r\nСтальной кант расположен по всей длине доски, в том числе в хвостовой и носовой частях\r\nСпеченный скользяк HTP - прочный скоростной скользяк, отлично впитывающий и задерживающий парафин, что препятствует его быстрому высыханию. Прост в обслуживании и долговечен\r\nЗакладные 4х2.', 13500),
(5, 'Сноуборд SANTA CRUZ-SNOW Kendal Snake', 'KENDAL SNAKE - с технологией POWER LYTE. (облегченная доска). Идеально подходит для горного катания. HCM + Xenogen Triax Tech Laminate 45+ с помощью этих технологий доска имеет отличную торсионную жесткость. Команды от Вашего мозга будут немедленно переданы на канты сноуборда. COMBO CAMBER – обеспечивает хорошую устойчивость и всплытие доски в целине. Доска симметричная - TRUE TWIN. Вы можете ехать любой ногой вперед. Жесткость доски 7 из 10. Подойдет для продвинутых райдеров. Скользяк SUPER SPEED X8000.\r\n\r\n<b>Особенности:</b>\r\nЦелевая группа - взрослые.\r\nУровень катания – продвинутый, эксперт.\r\nПредназначение – фрирайд.\r\nЖесткость – 7/10.\r\nГеометрия – TRUE TWIN \r\nПрогиб - COMBO CAMBER\r\nСкользяк - SUPER SPEED X8000\r\n\r\nHCM - Homogen Core Matrix – (деревянная внутренняя конструкция) это ключевой элемент для долгого сохранения жесткости и прогиба доски, а так же торсионной жесткости, которые позволяют точно передавать энергию при перекантовке. В линейке Santa Cruz нет «сопливых» досок для чайников. Про Райдеры и любители досок SC требуют высокую точность переходя с канта на кант что бы иметь лучшую мобильность во всех стилях катания.\r\n\r\nHCM + Xenogen Triax Tech Laminate 45+ ( это модификация волокна вокруг сердечника доски ) – Из названия понятно, что в этой конструкции используется тринаправленное волокно, с одним дополнительным слоем. Что позволяет увеличить жесткость доски для максимального сцепления с снегом и еще большей точности передачи усилия при перекантовке.\r\n\r\nSUPER SPEED X8000 – Улучшенная скорость с исключительной прочностью. Наши самые быстрые и жесткие скользяки содержат нано-добавки для гипер ускорения. Доски с такой маркой скользяка будут обработаны на станке. Скользяк будет иметь структурированную шлифовку. Такие скользящие поверхности, при правильной обработке парафинами, развивают самые высокие скорости и подходят для соревновательного сноубординга.\r\n90% дерево 5% металл 5% пластик', 26600),
(6, 'Сноуборд SANTA CRUZ-SNOW Hang em High', 'HANG’EM HIGH – снаряд для уничтожения горных склонов и начертания бэккантри-линий на крутых наклонах. Этот DIRECTIONAL TWIN (нос длиннее хвоста), но все же TWIN в сочетании с Xenogen Triax Tech Laminate 45+. Такая комбинация придает доске повышенную торсионную жесткость и отзывчивость (щелчок), что, в свою очередь, улучшает сцепление с поверхностями на горных склонах. Эта доска для ФРИРАЙДА. Традиционным прогибом CAMBER Вы не будете разочарованы. Удлиненный нос поможет доске всплывать в паудере. Закладные под крепления дают возможность слегка сдвинуть крепления назад, что еще больше обеспечит всплываемость. CAMBER всегда обеспечивал доскам лучшую стабильность при катании на больших скоростях. Будь то фрирайд или разгон на биг-аир. Такую форму досок выбирают лучшие райдеры. Жесткость 7 из 10 – для райдеров среднего уровня и выше. Скользяк SUPER GLIDE SX700 обеспечит высокую скорость и имеет высокую устойчивость к истиранию.\r\n\r\n\r\n<b>Особенности:</b>\r\nЦелевая группа - взрослые.\r\nУровень катания – продвинутый, эксперт.\r\nПредназначение – фрирайд на любых склонах.\r\nЖесткость – 7/10.\r\nГеометрия – Directional Twin Tip (доска симметричной жесткости, но нос длиннее хвоста) \r\nПрогиб - CAMBER\r\nСкользяк - SUPER GLIDE SX700\r\n\r\nHCM - Homogen Core Matrix – (деревянная внутренняя конструкция) это ключевой элемент для долгого сохранения жесткости и прогиба доски, а так же торсионной жесткости, которые позволяют точно передавать энергию при перекантовке. В линейке Santa Cruz нет «сопливых» досок для чайников. Про Райдеры и любители досок SC требуют высокую точность переходя с канта на кант что бы иметь лучшую мобильность во всех стилях катания.\r\n\r\nHCM + Xenogen Triax Tech Laminate 45+ ( это модификация волокна вокруг сердечника доски ) – Из названия понятно, что в этой конструкции используется тринаправленное волокно, с одним дополнительным слоем. Что позволяет увеличить жесткость доски для максимального сцепления с снегом и еще большей точности передачи усилия при перекантовке.\r\n\r\nSUPER GLIDE SX700 – гомогенный высокомолекулярный полиэтилен. Скользяк сочетает в себе высокую скорость и долговечность. Содержит в себе скользящие добавки, которые снижают трение и еще больше разгоняют доску. Скользяк сохраняет свои лучшие качества в широком диапазоне снежных условий. Доски с такой маркой скользяка будут обработаны на станке. Скользяк будет иметь структурированную шлифовку. \r\n90% дерево 5% металл 5% пластик', 25000),
(7, 'Сноуборд ROXY Sugar Ban', 'Сноуборд Roxy Sugar создан для активных девушек, не привыкших отступать перед трудностями. Прощающий множество ошибок, этот сноуборд отлично подготавливает начинающих райдеров к мощному катанию, придает уверенность, дает импульс и все возможности для перехода на новый уровень. \r\n\r\n\r\n<b>Особенности:</b>\r\nЖенский сноуборд\r\nНазначение: all-mountain (универсальный)\r\nУровень катания: новичок\r\nЖесткость: мягкая 2 \r\nПрогиб: mixed (смешанный) \r\nПрогиб Original Banana - революционная смесь для фристайла\r\nСердечник из разных сортов дерева в конструкции Kind Hearted Aspen / Paulownia\r\nСпеченный скоростной скользяк Co-Extruded\r\nUHMW Sidewalls: боковые стенки выполнены их прочнейшего переработанного эластомера ABS, также защищающего сердечник от влаги\r\nСистема крепления: классическая \r\nПроизводство: США', 26200),
(8, 'Скейтборд в сборе SANTA CRUZ Palm Dot', 'Скейтборд SC \"Palm Dot\" сделан из клена Hard Rock и имеет среднюю вогнутость. Каждый комплект поставляется с Bullet 130, 52-мм колесами OJ 99a и подшипниками Abec 5. Отличный вариант как для начинающих, так и для тех, кто ищет недорогой выбор.\r\n\r\nДЛИНА 31,4 дюйма\r\nШИРИНА 7,75 дюйма\r\nКОЛЕСНАЯ БАЗА 14\r\nДЛИНА НОСА 6,94 дюйма\r\nДЛИНА ХВОСТА 6,292 дюйма\r\nMedium concave\r\n\r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 7210),
(9, 'Скейтборд в сборе BLIND SS19 Square Space', 'Ширина: 7,75 \"  \r\nЦвет: Коричневый\r\n\r\n<b>Особенности:</b>\r\nМягкие Колеса:\r\n· Экстра Мягкие Колеса Дюрометра 83 А. \r\n· Гладкий рулон на неровных поверхностях. \r\n\r\nFirst Push Complete:\r\n· 7-слойный клен Hardrock с жестким клеем Extra; сильнейший клей на водной основе. \r\n· Одноколодное прессование (одинаковая форма и вогнутость каждый раз). \r\n· Подшипники скорости из углеродистой стали. \r\n\r\nПочему лучше:\r\n· Форма, рассчитанная на молодых гонщиков. \r\n· Улучшена колесная формула для парка и улицы. \r\n· Более мягкая втулка для облегчения поворота. \r\n\r\n30-дневная гарантия от производственных дефектов.\r\n \r\n\r\nРазмер деки: 7,75 х 31.2\r\nПодвески: Tensor Alloy Trucks\r\nКолеса: Blind 52 mm\r\nПодшипники: ABEC-3\r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 6930),
(10, 'Скейтборд в сборе DARKSTAR SS19 Molten FP Complete Yellow', 'Ширина: 8,0 \"  \r\n\r\n<b>Особенности:</b> \r\nFirst Push Complete:\r\n· 7-слойный клен Hardrock с жестким клеем Extra; сильнейший клей на водной основе. \r\n· Одноколодное прессование (одинаковая форма и вогнутость каждый раз). \r\n· Подшипники скорости из углеродистой стали. \r\n\r\nПочему лучше:\r\n· Форма, рассчитанная на молодых гонщиков. \r\n· Улучшена колесная формула для парка и улицы. \r\n· Более мягкая втулка для облегчения поворота. \r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 6930),
(11, 'Скейтборд в сборе BLIND SS19 Matte OG FP Complete Silver/White', '<b>Особенности:</b>\r\nFirst Push Complete:\r\nСпециально разработан для юных райдеров с легким поворотом и максимальной эффективностью. \r\n· 7-слойный клен Hardrock с жестким клеем Extra; сильнейший клей на водной основе. \r\n· Одноколодное прессование (одинаковая форма и вогнутость каждый раз). \r\n· Подшипники скорости из углеродистой стали. \r\n\r\nПочему лучше:\r\n· Форма, рассчитанная на молодых гонщиков. \r\n· Пользовательский вогнутый конкейв для большего контроля. \r\n· Улучшена колесная формула для парка и улицы. \r\n· Более мягкая втулка для облегчения поворота. \r\n\r\n30-дневная гарантия от производственных дефектов.\r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 6930),
(12, 'Скейтборд в сборе BLIND SS19 Matte OG Youth FP Premium Complete Cyan/Yellow', 'Ширина: 7.0 \"  \r\nЖелтый / Зеленый\r\n\r\n<b>Особенности:</b>\r\n· 7-слойный клен Hardrock с жестким клеем Extra; сильнейший клей на водной основе. \r\n· Одноколодное прессование (одинаковая форма и вогнутость каждый раз). \r\n· Подшипники из углеродистой стали. \r\n\r\nПочему лучше:\r\n· Форма, рассчитанная на молодых гонщиков. \r\n· Улучшена колесная формула для парка и улицы. \r\n· Более мягкая втулка для облегчения поворота. \r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 7490),
(13, 'Лонгборд DUSTERS SS19 Moto Ranger Longbard 37\" Green/Orange', 'Ширина: 8,75\" / Длина: 37 \"/ Колесная база: 24,5\"\r\n\r\n<b>Особенности:</b> \r\n· Tensor 6.0 \"траки. \r\n· Подшипники Dusters Abec 7\r\n· Колеса 65 x 47 мм 78A. \r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 12600),
(14, 'Круизер SANTA CRUZ Screaming Hand', 'Ширина: 8,75\" / Длина: 37 \"/ Колесная база: 24,5\"\r\n\r\n<b>Особенности:</b>\r\n· Tensor 6.0 \"траки. \r\n· Подшипники Dusters Abec 7\r\n· Колеса 65 x 47 мм 78A. \r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 12600),
(15, 'Лонгборд SANTA CRUZ Palm Dot', 'Модель \"Palm Dot\" - отличный круизер для начинающих или любителей скоростной езды. Этот высококачественный лонгборд имеет конструкцию с верхним креплением, 9 слоев лучшего клена Hard Rock, траки Road Rider 180 и колеса Road Rider 72 мм, 78a. Плавное катание на самых грубых поверхностях и беспрецедентный контроль на высоких скоростях.\r\n\r\n<b>ПОДРОБНОСТИ</b>\r\nДЛИНА 41 дюйм\r\nШИРИНА 9,2 дюйма\r\nКОЛЕСНАЯ БАЗ А32\r\n\r\n\r\nДерево, алюминий, сталь, полиуретан, наждачная бум', 14140);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hash` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$11$yh28hj6kfd7dsu2e87uwyuxQUrslN.sm55SmMFJjTmyCpxl9paalm', '14707188595ce4de7614ceb8.14031856'),
(2, 'user', '$2y$11$jsi48fdhc63mc8sle9fysuI6lQPqBVJ6V9p1rUTgHyNnS5Dk5NRhu', '20908099085ce4e1638deb54.08370449');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_ind` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
