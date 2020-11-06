-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 01:31 PM
-- Server version: 10.4.12-MariaDB-1:10.4.12+maria~bionic-log
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SPA_Annecy_Marlioz`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actualites`
--

INSERT INTO `actualites` (`id`, `title`, `description`, `date`, `picture`) VALUES
(15, 'Les Chatons débarques !', 'Le moment des chatons arrivent ils vous attendent avec impatience venez vite les chercher ! Pour vous accompagnez dans les meilleurs conditions ainsi que pouvoir répondre a vos demandes n’oubliez pas que la SPA est ouvert aussi la semaine de 14h a 18h !', '2020-02-26 14:01:19', '../uploads/actualites/b3ef9972bea621369b57de5416eddf38.jpg'),
(16, 'Les deux frères ', 'Nous souhaitons garder ces deux frères ensemble aider nous a leurs trouver un foyer qui serait pret a les accueillirs tous les deux !', '2020-02-26 14:03:43', '../uploads/actualites/24dbbe18b68ca6c8a5e77c38983d9a5f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `types` text NOT NULL,
  `medaille` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sexe` text NOT NULL,
  `birthday` text NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `types`, `medaille`, `date`, `sexe`, `birthday`, `description`, `picture`, `name`) VALUES
(69, 'AUTRES', '589EF8', '2020-02-25 17:33:15', 'FEMELLES', '2020', 'Caramel est un lapin belier de 2,3kg, ce n\'est donc pas un petit gabarit!\r\n\r\n\r\n\r\nC\'est un lapin qui a été abandonné, acheté en animalerie, il vivait en cage et ne sortait jamais, il ne s\'entendait pas non plus avec son copain mâle qui avait été acheté en même temps...\r\n\r\n\r\nBourré d\'hormones, il en devenait complètement fou, était agressif en cage, et peignait le mur de jets d\'urine.\r\nHEUREUSEMENT nous l\'avons récupéré avec son frère! Depuis Caramel est castré, et profite d\'une vie en extérieur, ou il est bien plus épanoui!\r\nIl est super curieux, vient facilement nous voir et se laisser câliner.\r\nCaramel à besoin d\'une vie en extérieur, avec une amoureuse.', '../uploads/animals/defaultPicture.jpg', 'Caramel'),
(70, 'AUTRES', '', '2020-02-25 17:34:02', 'MALES', '2015', 'Histoire:\r\n\r\nAbandon d\'un particulier.\r\n\r\nCaractère:\r\n\r\n&quot;Je m\'appelle Donut\'s, petit lapin bélier âgé d\'environ 1 an et demi.\r\n\r\nJe ne suis pas du tout timide, j\'aime courir, sauter très haut partout ce qui peut, parfois, surprendre ma famille d\'accueil car je peux arriver par surprise.\r\n\r\nMon plus gros passe temps quand je suis en liberté c\'est de taquiner Axel, un chat en famille d\'accueil lui aussi. Je ne le lâche pas d\'une semelle et le suit partout où il va, je vais jusqu\'à lui faire quelques petits massages dans sa fourrure quand il est allongé. \r\n\r\nPour mon caractère, je suis de nature taquin, curieux, mais attention il faut me laisser libre de mes gestes ! Pas la peine d\'essayer de me garder dans vos bras ou d\'attendre à me faire pleins de câlins bisous, je n\'ai pas le temps pour ça, je fonctionne à 2000 volts !', '../uploads/animals/96df3201426b0eb696d927ea3d7cb6a7.jpg', 'Donut\'s'),
(71, 'CHAT', '7E8D5', '2020-02-25 17:35:20', 'MALES', '2015', 'JASPER est identifié, vacciné et stérilisé.\r\n\r\nJASPER est un adorable pacha affectueux, très sociable, de très grande taille, des poils longs et des moustaches qui en disent long. Placement en solo et besoin de patience.\r\n\r\nNotre JASPER a besoin d\'espace, donc jardin clos ou sécurisé obligatoire ! Pas de placement en appartement.\r\nPlacement uniquement sur PARIS ou Région Parisienne.\r\nPlacement sous contrat d\'adoption 150 euros comprenant :\r\n(bon de stérilisation/castration, vermifuge, tatouage, primo vaccination typhus/coriza, déparasitage)\r\nADOPTER UN CHAT, C\'EST EN SAUVER UN AUTRE, qui pourra ainsi prendre sa place en famille d\'accueil.', '../uploads/animals/defaultPicture.jpg', 'Jasper'),
(72, 'CHAT', '', '2020-02-25 17:36:06', 'FEMELLES', '2011', 'Dulce se trouve au refuge en Espagne où il est difficile pour lui de s\'épanouir. Une famille pour la vie lui serait d\'un grand secours.', '../uploads/animals/010d280a5f43f44f3607abe8d691c3cb.jpg', 'Dulce'),
(73, 'CHAT', '', '2020-02-25 17:36:47', 'FEMELLES', 'Inconnue', 'PRECIEUSE est identifiée, vaccinée et stérilisée.\r\n\r\nPRECIEUSE est une belle petite tricolore, vive, sociable, joueuse et hyper câline ! Elle réclame des papouilles, vraie boîte à ronrons. Placement au minimum dans un F2.', '../uploads/animals/6acecad950c90197e80c5981372a72c0.jpg', 'Precieuse'),
(74, 'CHIEN', '', '2020-02-25 17:37:34', 'MALES', '2020', 'L\'adoption doit être un acte mûrement réfléchi, un chiot n\'est pas un jouet...\r\n\r\n&quot;NEWTON&quot; est visible et adoptable dans le département du Loiret 45 260\r\n\r\nAdoption sous contrat d\'association contre remboursement des frais vétérinaires...\r\n\r\nATTENTION ! Un chiot n\'est pas jouet, une adoption doit être un acte très mûrement réfléchi !', '../uploads/animals/defaultPicture.jpg', 'Newton'),
(75, 'CHIEN', '4875PE', '2020-02-25 17:38:25', 'MALES', 'Inconnue', 'Magnifique berger allemand de 3 ans à l’adoption !', '../uploads/animals/15d0a8a6c574948ff52b5ded02f65ce0.jpg', 'Malice'),
(85, 'CHIEN', '', '2020-02-25 18:32:15', 'MALES', '2019', 'ZELDA est âgé de 7 mois et pésera  20/25 Kg à l\'âge adulte.\r\n\r\nElle est à la Réunion mais peut être adoptée en métropole .', '../uploads/animals/b9994410f2faeef9c81a6fb50b274095.jpg', 'Zelda'),
(90, 'CHIEN', '334', '2020-02-26 10:35:34', 'MALES', '2020', 'Pas de description disponible, contacter nous pour plus d\'informations !', '../uploads/animals/3c55f0c7ecc6d800ed005a0bcf65bdba.jpeg', 'MAA'),
(91, 'CHIEN', '', '2020-02-26 10:36:27', 'FEMELLES', '2018', 'Tully est un chiot câlin bien qu\'un peu peureux face aux situations nouvelles ou aux personnes inconnues. Il est sociable avec les chats, les chiens. Toute son éducation est à faire. Il sera de taille moyenne une fois sa croissance terminée.', '../uploads/animals/d3a713660f29f9543c1f37fbcdd25e26.jpeg', 'Tully'),
(92, 'CHIEN', 'HDFE8', '2020-02-26 10:37:14', 'MALES', 'Inconnue', 'Bonjour, je m’appelle Pokemon, je suis né le 15 décembre 2019 et je ferai environ 20 kg quand je serai grand. Je suis un petit bonhomme tout mignon, joueur et câlin. Je m’exprime beaucoup, je pigne quand je ne vois plus ma tatie, ou quand je tombe, ou bien pour sortir car je suis quasiment propre. Je cours dans le jardin, mais pas trop loin quand même, l’aventure c’est bien mais je préfère quand Tatie reste dans mon champ de vision ! Je suis encore un bébé, et il faudra poursuivre mon éducation avec patience et douceur pour que je devienne un beau loulou bien dans ses pattes.\r\nVous pouvez venir me voir avec tous mes copains à adopter, sur la page Facebook de Tina Lelion.', '../uploads/animals/2a20202055e8685e15e56d0ddf42110e.jpg', 'Pokémon'),
(93, 'CHIEN', '', '2020-02-26 10:39:40', '?', '2012', 'HISTOIRE\r\nFREA a ete sauvée de l\'enfer de la Roumanie avec ses frères et soeurs. Nous ne savons pas la race elle est croisée un peu tout.\r\n\r\nCARACTERE\r\nFREA est une boule de douceur et d\'amour, proche de l\'humain, câline, plutôt posée.\r\n\r\nENTENTES\r\nOK tout c\'est un chiot.\r\n\r\nJe suis un chiot j ai donc TOUT à apprendre (propreté, solitude, ne pas sauter, ne pas pincer, marcher en laisse etc), je serai le chien que vous ferez de moi.', '../uploads/animals/8effe97651fd3ebc9cb8ac6082ebfa37.jpg', 'Frea'),
(94, 'CHIEN', 'FE846EZD', '2020-02-26 10:40:27', 'FEMELLES', 'Inconnue', 'Pas de description disponible, contacter nous pour plus d\'informations !', '../uploads/animals/3e1634984e5d6f5173d142d1573f11f2.jpg', 'Kuoms'),
(95, 'CHAT', '', '2020-02-26 10:41:20', 'FEMELLES', '2012', 'Prise en charge en Février 2020 suite à l\'hospitalisation de sa propriétaire. De tempérament plutôt calme, CLOCHETTE a un côté sensible, elle apprécie le calme et qu\'on lui accorde de l\'attention. Elle a aussi un petit côté grognon et n\'aime pas être tripoter dans tout les sens nous recherchons donc un foyer tranquille, en appartement ou en maison elle saura y trouver ses marques. Pour ce qui est du reste, de ses ententes avec les autres animaux nous n\'avons pas encore toutes les informations', '../uploads/animals/383994dcdb021212ddcfb137c900038a.jpeg', 'CLOCHETTE'),
(96, 'CHAT', '', '2020-02-26 10:41:48', 'FEMELLES', '2019', 'Pas de description disponible, contacter nous pour plus d\'informations !', '../uploads/animals/e86d10b403b825984146ec54b6767039.jpeg', 'Bianca'),
(97, 'CHAT', '', '2020-02-26 10:42:21', 'MALES', '2017', 'Pas de description disponible, contacter nous pour plus d\'informations !', '../uploads/animals/3261d00d97f1e12453f0aa9fac050ac7.jpeg', 'Zorro'),
(98, 'CHAT', '', '2020-02-26 10:43:29', 'MALES', '2017', 'Fridge et Frimousse sont soeurs, trouvées très jeunes dans un jardin.\r\n\r\nElevées en famille d\'accueil en appartement. Elles sont très gentilles, ronronneuses et joueuses.', '../uploads/animals/f8cad77042eaa7d5dcfe73a53d901c04.jpg', 'Fridge'),
(99, 'CHAT', '', '2020-02-26 10:44:34', 'MALES', '2010', 'Je suis une adorable minette tigrée rousse.\r\nPlongez votre regard dans le mien. Le mien en dit dit long : mes parents ont déménagé et ils m\'ont &quot;oubliée&quot; :-(  . De toute façon ils ne s\'occupaient pas de moi.\r\nLeurs voisins qui m\'ont prise en charge souhaitent que je sois placée sous couvert de l\'Association C.P\'C.F. En effet, obliger ma famille à venir me récupérer c\'est prendre le risque à coup sûr qu\'elle aille me &quot;larguer&quot; on ne sait où, voire pire.\r\nSi vous avez une \'tite place dans votre maison, vous verrez je tiendrai beaucoup de place dans votre coeur.\r\nSi vous souhaitez m\'adopter, prenez contact avec l\'association. Je serai placée stérilisée et tatouée.', '../uploads/animals/66364006056ca78da6f0a3dea8d02d8e.jpg', 'Minette'),
(100, 'CHAT', 'GH548', '2020-02-26 10:44:58', 'MALES', 'Inconnue', 'Pas de description disponible, contacter nous pour plus d\'informations !', '../uploads/animals/defaultPicture.jpg', 'Oli'),
(101, 'CHAT', '', '2020-02-26 10:46:54', 'MALES', '2012', 'Groseille est une très belle demoiselle. Elle n’a aucune agressivité avec les humains mais elle est craintive et fuit les caresses.  Elle peut parfois se rapprocher à l’occasion des parties de jeux avec un plumeau ou une canne à pêche. Elle se laisse aussi tenter par les friandises qu\'elle vient délicatement chercher dans la main.\r\n\r\nGroseille vit au local de l\'association depuis plusieurs années. C\'est une minette calme qui mérite de trouver un foyer paisible où elle pourra s\'épanouir, en étant le seul chat, ou en compagnie d\'un chat qui soit indifférent à sa présence car étant trop timide pour s\'affirmer, elle a tendance à se replier dans son coin si un chat lui cherche querelle.\r\n\r\nGroseille fait partie de nos chats les plus craintifs, qui sont gentils mais ne sont pas à l\'aise avec les contacts humains et préfèrent la compagnie des chats. Ces chats sont depuis un certain temps au local de l\'association. Certains acceptent parfois quelques caresses, d\'autres ne se laissent pas du tout approcher.\r\nUn lieu de vie calme et la présence d\'au moins un autre chat sont des conditions essentielles à leur bien-être. S\'ils venaient un jour à être adoptés, nous ne pourrions les confier qu\'à des personnes très patientes et prêtes à les accepter tels qu\'ils sont.', '../uploads/animals/0684cf5fa8060b08b0d3e7e6bebf009f.jpg', 'Groseille'),
(102, 'AUTRES', '', '2020-02-26 10:48:52', 'MALES', 'Inconnue', 'Joy a ete abandonner car elle a une micropathie depuis ma naissance \r\n\r\nnourrie carné exclusivement  forfait adoption 190E', '../uploads/animals/7f49d0de15eb3e5db374814c8c2d0ad6.jpg', 'Joy'),
(103, 'AUTRES', '5875ee', '2020-02-26 10:49:53', 'MALES', '2012', 'Bud et Terrence sont 2 frères qui nous ont été confié suite à un covoiturage (il avait été vendu, devait être livré mais l’acheteur s’est rétracté juste avant de les réceptionner….). Ces deux jeunes loulous sont dynamiques et ont besoin de beaucoup se dépenser. A côté de ça, ils ont un caractère très différent donc nous cherchons quelqu’un qui saura subvenir aux besoins affectifs des 2.\r\nA la fois joueurs et câlins ce petit duo sait se compléter pour remplir les journées, même le petit (gros) Terrence qui cache bien son jeu au départ (nous pensons par manque d’habitude).', '../uploads/animals/09d340ff243889f13ea68ceb2748dd1f.jpg', 'Terrence et Bud'),
(104, 'AUTRES', '', '2020-02-26 10:50:53', 'FEMELLES', '2018', 'Nom : Nopal\r\n• Age : 11/2019\r\n• Sexe : Mâle\r\n• Vaccins : Contre la myxomatose, le VHD 1 et le VHD 2\r\n• Castré : à venir\r\n• Race : Lapin nain\r\n• Couleur : -\r\n• Poids : 1kg250\r\n• Localisation : Bruxelles (covoiturage possible dans toute la France et la Belgique)\r\n• Santé : -\r\n• Caractère : craintif au contact de l\'humain\r\n• Education : Nopal est propre\r\n• Condition d’adoption : -', '../uploads/animals/c287566c468a69726de857f2158c0a3f.jpg', 'Nopal'),
(105, 'AUTRES', '', '2020-02-26 10:51:24', '?', '2017', 'Bella est un lapin bélier de 5 mois. Elle est très câline, coquine, curieuse, indépendante, gourmande et aime le calme.\r\nBella est une petite lapine très intelligente qui sait se faire comprendre. Elle adore se balader dans la maison et aime beaucoup les enfants. Elle est propre et fait ses besoins dans sa litière.\r\nElle s\'entend avec la chienne de sa famille avec qui elle s\'amuse beaucoup.\r\nBella ne peut pas vivre enfermée dans sa cage.', '../uploads/animals/de7eb73c345ffd40fa1322fa0f2f05ab.jpg', 'Bella'),
(106, 'AUTRES', '', '2020-02-26 10:52:08', 'MALES', '2014', 'Django est une lapine bélier très gourmande et câline qui a besoin de beaucoup sortir.', '../uploads/animals/8522043d9767c75454aff7aca57e0027.jpg', 'Django'),
(107, 'AUTRES', '', '2020-02-26 10:52:24', 'MALES', '2020', 'Pas de description disponible, contacter nous pour plus d\'informations !', '../uploads/animals/defaultPicture.jpg', 'Pistol');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `password` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `secret` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `creation_date`, `secret`) VALUES
(1, 'adminSpaMarlioz', '15765cc37ae8c99c0236090182c47a3567a27c32a1ae84', '2020-02-23 10:36:06', '8dcbbf72fef16a7b2d8391122e034a85b950f924');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
