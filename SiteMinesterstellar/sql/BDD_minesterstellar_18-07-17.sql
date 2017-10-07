-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db662841232.db.1and1.com
-- Généré le :  Mar 18 Juillet 2017 à 18:04
-- Version du serveur :  5.5.55-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db662841232`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image` tinyint(1) NOT NULL DEFAULT '0',
  `nom_image` varchar(255) DEFAULT NULL,
  `date_actualite` int(11) DEFAULT NULL,
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`clef`, `titre`, `contenu`, `image`, `nom_image`, `date_actualite`) VALUES
(25, 'Et voilà le teaser du film !!!', '<iframe width="640" height="360" src="https://www.youtube.com/embed/NgvMfn_5dTA" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1488134015),
(20, 'Le père noël est passé', '<iframe width="450" height="250" src="https://www.youtube.com/embed/RemYPpzCE5o" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1482620400),
(24, 'Snapchat', 'Nous avons désormais un snapchat  !!<br>Snappez le code ci-dessus !', 1, 'snapcode.png', 1486032359),
(11, 'Le teaser est sorti !!!', '<iframe width="450" height="250" src="https://www.youtube.com/embed/Tv099x-53NY" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1481652000),
(22, 'Joyeux noël', 'L''équipage Mines''terstellar vous souhaite à tous un joyeux Noël !<br>On vous prépare plein de surprises dont certaines qui devraient tomber très prochainement... (#pasderepospourlesrespos)<br>Profitez bien des vacances, allez-y mollo sur le foie gras et on se retrouve en 2017 pour une campagne d''une autre dimension !<br>Bisous de nous !', 1, 'resize_Affichenoelfuturama.jpg', 1482620401),
(23, 'Meilleurs voeux à tous', 'Mines''terstellar vous souhaite le meilleur pour cette année 2017 qui s''annonce inoubliable !<br>On espère que vous avez bien profité des fêtes et on vous donne rendez-vous très vite pour de nouvelles surprises !', 1, 'resize_Affichenouvelancontour.png', 1483225200),
(26, 'AFTERWORK + PERM Mines''terstellar Lundi 06 Mars... MAIS PAS QUE ! PERM PLANCHETTE en approche !', 'Yo la ME ! On oublie pas notre premier Afterwork qui démarre dans quelques instants et qui sera prolongé par une PERM du turfu ! On a plein de choses de prévu pour vous : anims, crêpes, planchettes, infos en tout genre,... Tout est détaillé dans le mail de rappel. A tout de suite !', 0, NULL, 1488816712),
(29, 'Nouvelle Guest chez Mines''terstellar !', 'Carolina, la mas caliente des profs d''Espagnol, est officiellement guest chez Mines''terstellar ! Ça méritait bien une publication ! ', 1, '17148911_1456952447668562_1970871298_o.jpg', 1488905201),
(30, 'Le respo cum en pleine action', 'Après une journée des plus éprouvantes et un teaser de toute bÔté. Le respo cum est sur d''autres projets :)', 1, '20170308_090632.jpg', 1488964620),
(31, 'Le film est disponible !!', '<iframe width="640" height="360" src="https://www.youtube.com/embed/8CUiWAo8wTo" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1488984903),
(32, 'Premier Repas Gargantuesque', '<iframe width="640" height="360" src="https://www.youtube.com/embed/XWQQ3dAFGUY" frameborder="0" allowfullscreen></iframe><p>Manger c''est bien, tous ensemble c''est mieux !</p>', 0, NULL, 1489240823),
(33, 'Fat Brunch', '<iframe width="640" height="360" src="https://www.youtube.com/embed/Q2XgE7VPC1Q" frameborder="0" allowfullscreen></iframe></p><p>Le dimanche ne sortez de la ME, c''est dangereux, restez plutôt avec nous pour<br> une journée détente</p>', 0, NULL, 1489265377),
(34, 'Breakfast 2 rue', '<iframe width="640" height="360" src="https://www.youtube.com/embed/ukcv7NWcI8g" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1489595000),
(35, 'Notre première soirée', '<iframe width="640" height="360" src="https://www.youtube.com/embed/UwWY0-0AKpA" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1489594674),
(36, 'Petit rappel de la soirée !', '<iframe width="640" height="360" src="https://www.youtube.com/embed/AVazphTiQTI" frameborder="0" allowfullscreen></iframe><p>Pour ceux qui ne se souviennent pas des décors ;)</p>', 0, NULL, 1489594680),
(37, 'Triple F by Mines''terstellar', '<iframe width="640" height="360" src="https://www.youtube.com/embed/6dlfVNRvQ8I" frameborder="0" allowfullscreen></iframe>', 0, NULL, 1489738706);

-- --------------------------------------------------------

--
-- Structure de la table `allo`
--

CREATE TABLE IF NOT EXISTS `allo` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `nom_logo` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `allo`
--

INSERT INTO `allo` (`clef`, `nom`, `description`, `nom_logo`, `tel`, `statut`) VALUES
(19, 'Bougie ', 'Coupure d''électricité ou juste envie de méditer ? <br>Mines''terstellar t''apporte des bougies !', 'allo bougie.png', '0000000000', 1),
(18, 'Soirée', 'Tu t''ennuies ? Tu veux transformer ta chambre en night club du turfu ? Appelle Mines''terstellar et on arrive pour t''ambiancer et mettre le feu !!!', 'allo soirée.png', '0000000000', 1),
(17, 'Mouchoir  ', 'Tu es enrhumé(e) ? Tu pleures ? Tu te masturbes généreusement ? Mais tu n''as pas (plus) le matériel adapté.<br> Encore une fois, appelle nous !<br> <strong>GRATOS</strong>', 'allo mouchoir.png', '0667476901', 1),
(15, 'Taxi  ', 'Pas de voiture ? <br>\r\nTrop bourré(e) ? <br>\r\nPas de souci, nous sommes là !', 'allo taxi.png', '0643437019', 1),
(16, 'Blague  ', 'Besoin de rire un coup ? <br>\r\nMines''terstellar vous raconte ses meilleurs blagues au téléphone #Veyron&Bonin', 'allo blague.png', '0668144797', 1),
(14, 'Clopes   ', 'Panne de clope ? Besoin de tabac pour décompresser #pasenvied''unjointpur <br> Appelle !<br>\r\n<strong>Prix :<br>\r\n- Clope : 0,50€<br>\r\n- Paquet : 7,00€</strong>', 'allo clopes.png', '0629678506', 1),
(13, 'Bières       ', 'Rentré(e) de cours ? Du sport ? Juste réveillé ? Bref envie de bière ?<br> Appelle nous et on t''apporte ça dans les 5min !<br> <strong> Prix : 1€ !</strong><br>Sept choix disponibles (Leffe, Edelweiss, Goudale)', 'allo biere.png', '0602346414', 1),
(20, 'Allo''pital  ', 'Envie de voir une infirmière se trémousser dans ta chambre ? <br>Nous avons ça aussi pour toi alors te retiens pas et appelle !', 'allo''pital.png', '0631930893', 1),
(12, 'Prez     ', 'N''importe quand !<br>\r\nN''importe quoi !<br>\r\nN''importe où !<br>', 'allo prez.png', ' 0668144797', 1),
(21, 'Massage  ', 'Besoin de se détendre après une dur journée de cours à l''EMSE #LOL\r\n<br>Appelle Mines''terstellar !\r\n', 'allo massage.png', '0607038148', 1),
(22, 'TIZ ', 'T''as plus de boisson et tu veux t''enjailler avant une soirée ? T''as cru qu''on allait te laisser comme ça ?<br>Appelle nous ! ', 'allo TIZ.png', '0000000000', 1),
(23, 'Porno  ', 'Besoin d''excitation visuelle et auditive ? <br>Appelle en donnant tes préférences et nous nous chargeons de te dégoter la perle qui te fera jouir sans difficulté !', 'allo porno.png', '0630662972', 1),
(24, 'Signature  ', 'Lendemain de soirée Mines''terstellar, tu te lèves à 14h. Ton nom sera sur la feuille de présence si tu nous appelles avant qu''elle passe ;) !', 'allo signature.png', '0604182226', 1),
(25, 'Chorée', 'La chorée de liste t''a plu et tu aimerais bien la revoir en live ? Appelle et un membre de Mines''terstellar viendra te faire un show privé', 'allo choree.png', '0000000000', 1),
(26, 'Garde du corps  ', 'Tu te sens harcelé(e) par les paparazzis ou tu veux aller cogner des SDF de la Métare sans prendre de coup ? Chez Mines''terstellar on t''accompagne pour maximiser ta sécurité !', 'allo garde du corps.png', '0668144797', 1),
(27, 'Footing ', 'Tu veux courir mais t''aimes pas faire ça seul ? <br>Appelle nous !', 'allo footing.png', '0631930893', 1),
(28, 'Apéro    ', 'Besoin de boissons, de saucisson, de gâteaux apéro pour chiller un max ? <br>Mines''terstellar te ramène une planche de folie !<br> <strong>Prix : 4€ <br></strong>(Voir les allos bières pour la boisson)', 'allo apéro.png', '0667476901', 1),
(29, 'Vaisselle', 'Ta cuisine est en mode démontée un lendemain de soirée #découpe\r\n<br>Mines''terstellar t''aide aussi dans ces moments difficiles\r\n', 'allo vaisselle.png', '0000000000', 1),
(30, 'Capotes  ', 'Clairement pas besoin de décrire ton besoin ici, on l''a compris ! <br>Aller appelle et on te fournit (sauf les petites bites #Lespagnol)', 'allo capote.png', '0000000000', 1),
(31, 'Muscu ', 'T''es sec et tu veux te remplumer au temple ? Mines''terstellar t''accompagne à la salle et te conseille !', 'allo muscu.png', '0601461030', 1),
(32, 'Café  ', 'Panne de café ? La machine du 158 t''a mis une douille ? <br>Appelle nous et nous te servons une tasse de caféine !<br><strong>Prix : 0,20€</strong>', 'allo cafe.png', '0611860627', 1),
(33, 'Bisous ', 'Besoin de tendresse ? Mines''terstellar c''est aussi de l''amour ! Appelle et on se déplace de fournir un instant "so cute, pure love" !', 'allo bisou.png', '0645971150', 1),
(34, 'Random  ', 'Appelle et quelque chose que nous mêmes ne pouvons prédire va t''arriver (don''t worry, rien de préjudiciable !)', 'allo random.png', '0681321798', 1),
(35, 'Strip tease  ', 'Appelle Mines''terstellar et rince toi l''œil pépère dans ton lit en regardant l''un de nos membres se désapper !', 'allo streap tease.png', '0604182226', 1),
(36, 'Dessin  ', 'Tu veux qu''on te dessine un mouton ? Ou n''importe quoi d''autre ? Appelle Mines''terstellar et on arrive te faire ça !', 'allo dessin.png', '0630662972', 1),
(37, 'Histoire ', 'T''as du mal à t''endormir ? Appelle nous et nous arrivons te conter les meilleures histoires que nous avons en stock !', 'allo histoire.png', '0000000000', 1),
(38, 'Film  ', 'Envie de regarder un film mais t''as rien sous le coude ? Mines''terstellar te met le(s) BluRay de ton choix sur ta clé USB, alors appelle nous !', 'allo film.png', '0667476901', 1),
(39, 'Téléchargement', 'T''as besoin de musiques, de logiciels,... ? Mines''terstellar te télécharge ça et te l''installe !', 'allo telechargemet.png', '0000000000', 1),
(40, 'Boulangerie         ', 'Appelle Mines''terstellar et on te livre du pains frais, des croissants, des pains au chocolat / chocolatines ! \r\n<br>\r\n<strong>Prix : <br>\r\n - Baguette : 0.85€<br>\r\n - Demi-baguette : 0.45€<br>\r\n - Croissant : 0.90€<br>\r\n - Pain au chocolat : 1.00€</strong>', 'allo boulangerie.png', '0671556100', 1),
(41, 'Insultes  ', 'Envie de passer ta colère sur quelqu''un et d''insulter un maximum une personne random ? Envie de TE faire insulter ? Pas de souci, Mines''terstellar est aussi là pour ça !', 'allo insulte.png', '0681321798', 1),
(42, 'Commérages', 'Tu veux être au courant des derniers potins suite à une lourde soirée Mines''terstellar ? Appelle nous et nous te raconterons les histoires qui font les soirées inoubliables !', 'allo comerage.png', '0000000000', 1),
(43, 'Beer Pong   ', 'Envie de faire un beer pong mais pas assez de personne pour ça ? Mines''terstellar t''envoie ses meilleurs tireurs !<br><strong> Prix : 3€ !</strong>', 'allo biere pong.png', '0667476901', 1),
(44, 'Piano ', 'Tu veux un petit concerto stylé à domicile avec un piano #dimanchesoirau4CD ? Nous avons les pianistes les plus fous pour ça, alors appelle !', 'allo piano.png', '0000000000', 1),
(45, 'Tuto  ', 'Veille de tuto ? Rien préparé ? Envie de descendre à la perm ? <br>\r\nGrâce à Mines''terstellar c''est désormais possible !<br>\r\nOn vous refilera un de nos tutos avec plaisir  :)', 'allo tuto.png', '0667476901', 1),
(11, 'Kro   ', 'Pas assez de thunes pour une bonne binch ou juste trop schlag ? <br>\r\nMines''terstellar t''abreuve avec une bonne vieille Kro 2 Rue <br>\r\n<strong>Prix : 0,50€</strong>', 'allo kro.png', '0602346414', 1);

-- --------------------------------------------------------

--
-- Structure de la table `balises`
--

CREATE TABLE IF NOT EXISTS `balises` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `indice` text NOT NULL,
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `balises`
--

INSERT INTO `balises` (`clef`, `code`, `nom`, `description`, `indice`) VALUES
(1, '000001', 'Le Cercle', '<h2>Le Cercle</h2>\r\n<br>\r\n<p>Plaque tournante du commerce illégal, le Cercle est connu dans toute la galaxie comme le bar où se retrouve tout les bandits de passage dans ce système solaire. Cela ne l''empêche pas de servir de la bière de qualité à un prix abordable.\r\n</p>\r\n', 'Le meilleur endroit où faire le plein à petit prix'),
(7, '246838', 'Chambre de Robin', '<h2>Chambre de Robin</h2>\r\n<br>\r\n<p>Bazar intergalactique</p>', 'Le propriétaire de ce lieu peut-être entendu à 100 km à la ronde. Ainsi le port de bouchons d''oreilles est conseillé à quiconque voudrait s''y aventurer. Vous n''y verrai que rarement son occupant à l''exception de l''arrivée d''une Centralienne.'),
(6, '153489', 'Chambre de Gaby', '<h2>Chambre de Gaby</h2>\r\n<br>\r\n<p>Coffre fort spatial</p>', 'Antre du Crésus intergalactique, faîtes attention en entrant au relents de pastis qui s''échappent à tous moments du jour et de la nuit. Vous pourrez épisodiquement une alienne blonde de petite taille prête à tout.'),
(8, '265665', 'Les veilleuses', '<h2>Les veilleuses</h2>\r\n<br>\r\n<p>Garde(es) du corps</p>', 'Garantes de la bienséances, elles sont un phare dans la nuit, une épaule sur qui s''appuyer, mieux une kro en soirée. Vous les trouverez par groupe de 2, sillonnant les lieux les plus chauds et bruyant de la ME.'),
(9, '598634', 'Cuisine du 4CD', '<h2>Cuisine du 4CD</h2>\r\n<br>\r\n<p>Vaisseau découpé</p>', 'Un des lieux les plus répugnants de la ME, il n''y ai pas rare de croiser junk food, menus vegans et halals s''affrontant lors de conversations musclées. Totalement déserté en lendemain de soirée vous y serez toujours bien venu pour vous découper.'),
(10, '783516', 'BXL', '<h2>BXL</h2>\r\n<br>\r\n<p>Vous permettant de vous retrouvez bourré en peu de temps et à petit prix, le BXL est the place to be  pour commencer une soirée tranquillement</p>', 'L''un des centre de ravitaillement les plus populaires de la galaxie, bien que délocalisé dans un système éloigné, c''est le soir que des groupes de citoyens hétéroclites font vivre cette station enfoui dans les entrailles de sa planète'),
(11, '848644', 'Salle de muscu', '<h2>Salle de muscu</h2>\r\n<br>\r\n<p>Salle d''entraînement jedi</p>', 'Lieu de rencontre des prétendants à l''olympe et des hommes bientôt viriles.'),
(12, '486215', 'Salle détente 158', '<h2>Salle de détente du 158</h2>\r\n<br>\r\n<p>Lieu de rencontre de toutes les populations galactiques, la salle de repos est l''endroit le plus vivant du 158.</p>', 'Aire de repos situé dans la galaxie du travail qui prend vie toutes les deux heures et où les cosmonautes (ab)usent de la sainte machine à café.'),
(13, '948431', 'Squash', '<h2>Salle de Squash</h2>\r\n<br>\r\n<p>Transformée en salle de commandement du vaisseau</p>', 'Salle bipolaire, lieu d''efforts le jour et de "repos" la nuit.'),
(14, '891425', 'SIDEM', '<h2>Le SIDEM</h2>\r\n<br>\r\n<p>Le SIDEM, archives de toute la galaxie, a aussi une fonction non négligeable de reprographie. Vous y retrouverez souvent le personnel naviguant des vaisseaux en train de finir à l''arrache leur compte rendu pour leurs comptes rendus pour leur supérieurs.</p>', 'Cette planète a accumulé aux cours des siècles le savoir des anciens. Loin d''être le Las Vegas de la galaxie, bien que situé en plein cœur du cosmos de l''apprentissage, elle est pour autant visité par tous les citoyens de l''univers qui respectent immanquablement son silence suprême.'),
(15, '448472', 'City', '<h2>Le City</h2>\r\n<br>\r\n<p>Planète du 0</p>', 'L''appel de ce lieu se manifeste souvent vers 17h : "Nooooow" '),
(16, '560194', '7NME', '<h2>LE 7NME</h2>\r\n<br>\r\n<p>Centre de ravitaillement noyé dans les nuages de gaz galactiques.</p>', 'Petite planète très éloignée du centre de notre système solaire, ce lieu est en permanence aux prises avec un épais brouillard, pas si légal. Contrastant avec ces planètes environnantes, connue pour être calme voire abandonnée, ce centre de ravitaillement a su se faire connaître pour son bruit et sa joie de vivre résonnants jusqu''aux confins de l''univers.'),
(17, '508943', 'Futsal', '<h2>Futsal</h2>\r\n<br>\r\n<p>Lieu ayant pris une dimension futuriste durant l''activité d''US Armines</p>', 'Lieu polyvalent pour tout type d''activités : répétitions, glisse, boisson et parfois sport'),
(18, '011011', 'Toilettes 158', '<h2>Les toilettes du 158<h2>\r\n<br>\r\n<p>Salle de détente de Xavier Olagne</p>', 'Lieu de rencontre improbable à l''odeur embaumante et aux sons mélodieux, à utiliser avec modération si vous êtes trop loin de la ME.'),
(19, '028453', 'Bureau de Carole', '<h2>Bureau de Carole</h2>\r\n<br>\r\n<p>\r\nQuartiers généraux de la capitaine du vaisseau ME.\r\n</p>', 'Situé à l’écart des cabines de matelots, ce lieu est occupé par la plus haute autorité et se trouve à l’avant du vaisseau. La grande dignitaire qui y exerce ses fonctions est également membre permanent de l’équipage du voyage annuel d’intégration.'),
(20, '896403', 'BDthèque', '<h2>BDthèque</h2>\r\n<br>\r\n<p>Aire de travail dans le vaisseau ME</p>', 'Lieu de tranquillité et de sérénité, où viennent généralement se recueillir les amateurs de livres contenant des dessins à bulles. C’est aussi un haut lieu de rencontre intergalactique pour les projets agiles et autres tâches nécessitant un travail en groupes de voyageurs spatiaux. '),
(21, '731649', 'Amphi F1', '<h2>Amphi</h2>\r\n<br>\r\n<p>\r\nGrande salle demi-circulaire pour les transmissions de savoir.\r\n</p>', 'Salle de grande capacité de la station numéro 158, qui se trouve au plus près du sas de dépressurisation de l’entrée. Bien qu’ils soient souvent délaissés, ses gradins permettent de rassembler toute une promotion lors de cours de la plus haute importance.'),
(22, '789134', 'Chambre de Poujpouj', '<h2>Chambre de Poujpouj</h2>\r\n<br>\r\n<p>Entrepôt national de stockage de carton.</p>', 'Quartiers du capitaine du vaisseau Mines’terstellar.'),
(23, '160098', 'Chambre Coco', '<h2>Chambre Coco</h2>\r\n<br>\r\n<p>Si vous cherchez la caverne d''Ali Baba vous êtes au bon endroit. Le désordre est tel dans cet espace que le propriétaire y a même perdu son propre porte monnaie.</p>', 'Les quartiers du plus haut gradé du vaisseau Mines’terstellar, après le capitaine.');

-- --------------------------------------------------------

--
-- Structure de la table `dates`
--

CREATE TABLE IF NOT EXISTS `dates` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date_decryptage` int(11) NOT NULL,
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `dates`
--

INSERT INTO `dates` (`clef`, `nom`, `date_decryptage`) VALUES
(1, 'Jeu de piste', 1489100400);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `titre_cryptee` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `nom_image` varchar(255) NOT NULL,
  `nom_image_cryptee` varchar(255) NOT NULL,
  `date_event` int(11) NOT NULL,
  `date_decryptage` int(11) NOT NULL,
  PRIMARY KEY (`clef`),
  KEY `nom_image_cryptee` (`nom_image_cryptee`),
  KEY `nom_image_cryptee_2` (`nom_image_cryptee`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`clef`, `titre`, `titre_cryptee`, `contenu`, `nom_image`, `nom_image_cryptee`, `date_event`, `date_decryptage`) VALUES
(1, 'Escale interstellaire en Italie', 'Repas 1 (classified project)', 'Salut tout le monde !<br>\r\n<strong>Jeudi 9 Mars</strong> à partir de <strong>21h</strong>, Mines''terstellar vous propose son premier repas sur le thème de <strong>l''ITALIE</strong> !<br>\r\n<br>\r\n<strong><u>Au menu :</u></strong><br>\r\nGressini al pesto con letto de salade verte<br>\r\n<br>\r\nLasagnes 4 saisons aux épices<br>\r\nOU<br>\r\nLasagne alla bolognese<br>\r\n<br>\r\nTiramisu au café<br>\r\n<br>\r\nEt tout ça pour seulement <strong>4€</strong> !\r\n<br>\r\n<br>\r\nPensez à remplir la spread sheet avant <strong>mercredi 12h</strong><br>\r\nDe plus on vous propose de venir payer votre repas pendant notre <strong>after work du 06 mars</strong> pour éviter l''attente avant le repas !\r\n', 'repas 1.png', 'affiche cryptee repas 1.jpg', 1489014000, 1488668400),
(2, 'Brunch', 'Brunch (classified project)', 'Hello !<br>\r\nMines''terstellar vous donne rendez-vous <strong>dimanche 12 mars</strong> à partir de <strong>10h</strong> pour vous éclater le bide avec notre Brunch.<br>\r\n<br>\r\nLa journée sera placée sous le thème de la détente :<br>\r\n  - un espace cocooning sera installé au cercle par la startup Eco-Loc pendant le brunch.<br>\r\n  - des films seront projetés en fin de brunch.<br>\r\n  - un hamac géant sera tendu au milieu du cercle pendant l''aprèm.<br>\r\n  - une perm chill sera tenue pour clôturer cette journée.<br>\r\n<br>\r\nOn vous attend nombreux, à dimanche ! Love', 'brunch 2.jpg', 'affiche cryptee brunch.jpg', 1489273200, 1489100400),
(3, 'Voyage interstellaire', 'Soirée 1 (classified project)', 'Coucou !<br>\r\nMines''terstellar vous embarque dans l''espace pour sa première soirée. Préparez-vous, décollage imminent !<br>\r\nAlors on sort sa plus belle tenue de cosmonaute, d''extraterrestre ou de fusée et on se retrouve le <strong>13 mars</strong> à <strong>23h</strong> en Kfet.<br>\r\n<br>\r\nKiss', 'soirée_last 2.jpg', 'affiche cryptee soiree 1.jpg', 1489359600, 1489273200),
(4, 'Breakfast', 'Petit Déjeuner 1 (classified project)', 'Yo !<br>\r\nMines''terstellar arrive chez vous chargé de bonnes choses !<br>\r\nAlors on oublie pas de s''inscrire et on se retrouve <strong>mercredi 15 mars</strong> au matin pour un petit dèj du turfu.<br><br>\r\n<3 ', 'mini_petit_dej.jpg', 'affiche cryptee petit dej 1.jpg', 1489532400, 1489273200),
(5, 'Triple F by Mines''terstellar', 'Anim ME (classified project)', 'Hi !<br>\r\nRejoignez nous le <strong>jeudi 15 mars</strong> au Cercle et au City pour un après-midi de folie.<br><br>\r\n<u>Au programme :</u><br> <br>\r\n- Bubble<strong>F</strong>oot<br>\r\n- <strong>F</strong>usée contest<br>\r\n- <strong>F</strong>ontaine à chocolat<br>\r\n- Plein de minis jeux pour gagner des points Mines''terstellar !<br>\r\n<br>\r\nLove', 'BUBBLE FOOT.jpg', 'affiche cryptee anim me.jpg', 1489618800, 1489532400),
(6, 'Soirée Pyjama', 'Soirée 2 (classified project)', 'Salut !<br>\r\n<br>\r\nLundi <strong>17 mars</strong> Mines''terstellar vous renvoie en enfance avec une méga <strong><u>pyjama party !</u></strong><br>\r\n<br>\r\nSortez votre plus beau pyjama et rejoignez nous à <strong>23h</strong> en Kfet pour vous ambiancer jusqu''au bout de la nuit.<br>\r\n<br>\r\nEnfin nous vous proposons de dormir tous ensemble dans un dortoir géant installé en futsal ! <br>\r\n<br>\r\nBye', 'Soirée_pyjama_avec_grain.jpg', 'affiche cryptee soiree 2.jpg', 1489964400, 1489705200),
(7, 'Cantine Mines''terstellar', 'Repas 2 (classified project)', 'Salut tout le monde !<br>\r\n<strong>Jeudi 23 Mars à partir de 21h</strong>, Mines''terstellar vous propose de venir les rejoindre dans la cantine de son vaisseau.<br>\r\n<br>\r\nAu menu :<br>\r\n<br>\r\nKrique Cosmique<br>\r\n<br>\r\nRougail de Dagoba<br>\r\n(version halal et vegan)<br>\r\n<br>\r\nTrio d''éclair Unight''corn<br>\r\n<br>\r\nEt tout ça pour seulement <strong>4€</strong> !<br>\r\n<br>\r\nDe plus on vous propose de venir payer votre repas à partir de <strong>19h au Cercle</strong> avant le repas pour éviter la queue !', 'menu2bis.jpg', 'affiche cryptee repas 2.jpg', 1490223600, 1490824800),
(8, 'Soirée Mousse', 'Soirée 3 (classified project)', 'Vous la vouliez, Mines''terstellar l''a faite !<br>\r\n<br>\r\nLe <strong>24 mars</strong>on vous attend nombreux <strong>à 23h en kfet</strong> pour une <strong><u>soirée mousse</u></strong> de l''espace !!!<br>\r\n<br>\r\nPensez à vous équiper d''une serviette, un vestiaire sera à votre disposition.', 'soirée_mousse.jpg', 'affiche cryptee soiree 3.jpg', 1490310000, 1490824800),
(9, 'Via ferrata / Bowling', 'Anim Exté (classified project)', 'Mines''terstellar ne vous propose pas une mais <strong>deux</strong> anim exté !<br>\r\n<br>\r\nVous avez le choix entre une <strong>Via ferrata</strong> au pillat pour 10 €<br>\r\n<br>\r\nOU<br>\r\n<br>\r\nDeux parties de <strong>Bowling</strong> pour 5 €<br>\r\n<br>\r\nRendez-vous à <strong>13h30 au Cercle</strong>', 'anim exte.png', 'affiche cryptee anim exte.jpg', 1490396400, 1490824800),
(10, 'Breakfast, le retour', 'Petit Déjeuner 2 (classified project)', 'Yo !<br>\r\nMines''terstellar revies chez vous avec une carte encore plus variée !<br>\r\nVous aurez la chance de choisir une pâtisserie maison en premier choix (éclair, tarte au citron meringuée, macarons, ...)<br>\r\nAlors on oublie pas de s''inscrire et on se retrouve <strong>mercredi 27 mars</strong> au matin pour un petit dèj du turfu.\r\n\r\n<3\r\n', 'petit_dej2.png', 'affiche cryptee petit dej 2.jpg', 1490565600, 1490738400);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image` tinyint(1) NOT NULL DEFAULT '0',
  `nom_image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `galerie`
--

INSERT INTO `galerie` (`clef`, `titre`, `contenu`, `image`, `nom_image`, `date`) VALUES
(18, 'Le teaser de liste !!', '<iframe width="400" height="250" src="https://www.youtube.com/embed/Tv099x-53NY" frameborder="0" allowfullscreen></iframe>', 0, NULL, '2016-12-22 12:57:53'),
(16, 'Première photo de groupe :)', '', 1, 'photo de groupe.jpg', '2016-12-20 18:24:25'),
(17, 'Fond d''écran Mines''terstellar', '', 1, 'photo de couv fb.jpg', '2016-12-20 18:25:25'),
(20, 'Petite vidéo de Noël', '<iframe width="400" height="250" src="https://www.youtube.com/embed/RemYPpzCE5o" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(21, 'Joyeux Noël', '', 1, 'resize_Affichenoelfuturama.jpg', '0000-00-00 00:00:00'),
(22, 'Bonne année 2017', '', 1, 'resize_Affichenouvelancontour.png', '0000-00-00 00:00:00'),
(23, 'Notre snapcode', '', 1, 'test transparent.png', '0000-00-00 00:00:00'),
(24, 'Lancement campagne 2k17 ', '<iframe width="400" height="250" src="https://www.youtube.com/embed/NgvMfn_5dTA" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(28, 'Le film de campagne ', '<iframe width="400" height="250" src="https://www.youtube.com/embed/8CUiWAo8wTo" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(29, 'Teaser du repas Italie', '<iframe width="400" height="250" src="https://www.youtube.com/embed/XWQQ3dAFGUY" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(30, 'Teaser du Brunch', '<iframe width="400" height="250" src="https://www.youtube.com/embed/Q2XgE7VPC1Q" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(31, 'Teaser Breakfast', '<iframe width="400" height="250" src="https://www.youtube.com/embed/ukcv7NWcI8g" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(32, 'Teaser soirée interstellaire', '<iframe width="400" height="250" src="https://www.youtube.com/embed/UwWY0-0AKpA" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(33, 'Manequin challenge soirée interstellaire', '<iframe width="400" height="250" src="https://www.youtube.com/embed/AVazphTiQTI" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00'),
(34, 'Teaser anim inté', '<iframe width="400" height="250" src="https://www.youtube.com/embed/6dlfVNRvQ8I" frameborder="0" allowfullscreen></iframe>', 0, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE IF NOT EXISTS `jeux` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `nom_du_jeu` char(255) NOT NULL,
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`clef`, `nom_du_jeu`) VALUES
(18, 'Fusée à eau'),
(17, 'Fusil à élastiques'),
(10, 'Selfie'),
(16, 'Qui est-ce ?'),
(11, 'Quizz Afterwork 1'),
(12, 'Reconnaissance objets'),
(13, 'Relais oeufs'),
(14, 'Black Jack'),
(15, 'Mais où est Fragilus ?');

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `points` bigint(20) DEFAULT '0',
  `balises_trouvees` int(11) NOT NULL DEFAULT '0',
  `points_jeu` text NOT NULL,
  `jeu_de_piste` text NOT NULL,
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Contenu de la table `points`
--

INSERT INTO `points` (`clef`, `points`, `balises_trouvees`, `points_jeu`, `jeu_de_piste`) VALUES
(1, 0, 0, '', '000001 C'),
(2, 24, 2, '', '000001 T 789134 T 153489 C'),
(3, 0, 0, '', '000001 C'),
(4, 134444449920, 0, 'J18 100000000000 J11 34444449920 ', '000001 C'),
(5, 1, 0, '', '000001 C'),
(6, 0, 0, '', '000001 C'),
(7, 0, 0, '', '000001 C'),
(8, 5, 0, 'J16 5 ', '000001 C'),
(9, 0, 0, '', '000001 C'),
(10, 0, 0, '', '000001 C'),
(11, 45, 0, 'J18 45 ', '000001 C'),
(12, 0, 0, '', '000001 C'),
(13, 0, 0, '', '000001 C'),
(14, 24, 2, '', '000001 T 598634 T 028453 C'),
(15, 0, 0, '', '000001 C'),
(16, 0, 0, '', '000001 C'),
(17, 0, 0, '', '000001 C'),
(18, 12, 1, '', '000001 T 891425 C'),
(19, 0, 0, '', '000001 C'),
(20, 1000, 1, '', '000001 T '),
(21, 0, 0, '', '000001 C'),
(22, 0, 0, '', '000001 C'),
(23, 0, 0, '', '000001 C'),
(24, 0, 0, '', '000001 C'),
(25, 0, 0, '', '000001 C'),
(26, 0, 0, '', '000001 C'),
(27, 0, 0, '', '000001 C'),
(28, 0, 0, '', '000001 C'),
(29, 0, 0, '', '000001 C'),
(30, 0, 0, '', '000001 C'),
(31, 0, 0, '', '000001 C'),
(32, 20, 0, 'J17 20 ', '000001 C'),
(33, 24, 2, '', '000001 T 783516 T 160098 C'),
(34, 40, 0, 'J16 5 J12 20 J13 15 ', '000001 C'),
(35, 58, 0, 'J11 14 J12 26 J13 18 ', '000001 C'),
(36, 0, 0, '', '000001 C'),
(37, 23, 0, 'J16 5 J11 6 J12 12 ', '000001 C'),
(38, 21, 0, 'J14 21 ', '000001 C'),
(39, 0, 0, '', '000001 C'),
(40, 166, 6, 'J11 8 J12 20 J13 15 J14 21 J15 30 ', '000001 T 028453 T 783516 T 731649 T 265665 T 948431 T 891425 C'),
(41, 0, 0, '', '000001 C'),
(42, 0, 0, '', '000001 C'),
(43, 0, 0, '', '000001 C'),
(44, 36, 0, 'J18 22 J12 14 ', '000001 C'),
(45, 350, 19, 'J18 20 J16 5 J11 15 J12 23 J13 35 J14 24 ', '000001 T 246838 T 789134 T 508943 T 011011 T 948431 T 896403 T 153489 T 560194 T 598634 T 891425 T 160098 T 028453 T 848644 T 448472 T 783516 T 486215 T 265665 T 731649 T '),
(46, 0, 0, '', '000001 C'),
(47, 41, 0, 'J17 20 J14 21 ', '000001 C'),
(48, 58, 0, 'J18 38 J12 20 ', '000001 C'),
(49, 18, 0, 'J12 18 ', '000001 C'),
(50, 405, 19, 'J18 20 J17 20 J16 15 J11 21 J12 22 J13 58 J14 21 ', '000001 T 789134 T 265665 T 731649 T 028453 T 783516 T 448472 T 948431 T 891425 T 153489 T 011011 T 246838 T 160098 T 508943 T 486215 T 598634 T 896403 T 560194 T 848644 T '),
(51, 91, 3, 'J11 16 J12 18 J14 21 ', '000001 T 265665 T 011011 T 783516 C'),
(52, 171, 4, 'J11 14 J12 18 J13 25 J14 21 J15 45 ', '000001 T 246838 T 448472 T 160098 T 508943 C'),
(53, 0, 0, '', '000001 C'),
(54, 32, 0, 'J18 32 ', '000001 C'),
(55, 32, 2, 'J11 8 ', '000001 T 896403 T 153489 C'),
(56, 0, 0, '', '000001 C'),
(57, 50, 0, 'J11 18 J12 32 ', '000001 C'),
(58, 10, 0, 'J17 10 ', '000001 C'),
(59, 533, 1, 'J18 500 J14 21 ', '000001 T 789134 C'),
(60, 157, 6, 'J11 10 J12 22 J13 15 J14 25 ', '000001 T 731649 T 246838 T 948431 T 265665 T 891425 T 028453 C'),
(61, 0, 0, '', '000001 C'),
(62, 36, 0, 'J11 20 J12 16 ', '000001 C'),
(63, 0, 0, '', '000001 C'),
(64, 5, 0, 'J16 5 ', '000001 C'),
(65, 322, 19, 'J18 20 J17 30 J11 18 J12 26 ', '000001 T 783516 T 028453 T 948431 T 246838 T 598634 T 486215 T 265665 T 011011 T 789134 T 560194 T 731649 T 160098 T 896403 T 153489 T 508943 T 891425 T 448472 T 848644 T '),
(66, 0, 0, '', '000001 C'),
(67, 0, 0, '', '000001 C'),
(68, 0, 0, '', '000001 C'),
(69, 0, 0, '', '000001 C'),
(70, 389, 19, 'J18 34 J17 30 J11 13 J12 24 J13 35 J14 18 ', '000001 T 731649 T 028453 T 486215 T 598634 T 246838 T 948431 T 153489 T 508943 T 891425 T 011011 T 783516 T 265665 T 896403 T 560194 T 848644 T 160098 T 448472 T 789134 T '),
(71, 292, 15, 'J18 35 J17 20 J11 14 J12 18 J13 25 ', '000001 T 448472 T 153489 T 486215 T 896403 T 028453 T 598634 T 011011 T 731649 T 948431 T 783516 T 891425 T 160098 T 848644 T 265665 T 246838 C'),
(72, 45, 0, 'J11 30 J12 15 ', '000001 C'),
(73, 234, 7, 'J11 18 J12 23 J13 58 J14 21 J15 30 ', '000001 T 948431 T 560194 T 160098 T 891425 T 153489 T 011011 T 783516 C'),
(74, 23, 0, 'J16 5 J12 18 ', '000001 C'),
(75, 0, 0, '', '000001 C'),
(76, 0, 0, '', '000001 C'),
(77, 50, 1, 'J11 16 J12 22 ', '000001 T 783516 C'),
(78, 0, 0, '', '000001 C'),
(79, 12, 1, '', '000001 T 891425 C'),
(80, 0, 0, '', '000001 C'),
(81, 353, 19, 'J18 40 J17 30 J12 12 J13 22 J14 21 ', '000001 T 731649 T 265665 T 783516 T 948431 T 028453 T 448472 T 011011 T 891425 T 153489 T 486215 T 246838 T 848644 T 160098 T 896403 T 560194 T 789134 T 508943 T 598634 T '),
(82, 161, 8, 'J17 20 J11 8 J12 22 J13 15 ', '000001 T 896403 T 448472 T 160098 T 783516 T 789134 T 265665 T 153489 T 891425 C'),
(83, 0, 0, '', '000001 C'),
(84, 0, 0, '', '000001 C'),
(85, 0, 0, '', '000001 C'),
(86, 0, 0, '', '000001 C'),
(87, 77, 0, 'J17 20 J11 16 J12 16 J13 25 ', '000001 C'),
(88, 276, 12, 'J18 22 J17 20 J11 14 J12 12 J13 40 J14 24 ', '000001 T 160098 T 560194 T 598634 T 896403 T 153489 T 028453 T 246838 T 891425 T 948431 T 508943 T 486215 T 265665 C'),
(89, 8, 0, 'J11 8 ', '000001 C'),
(90, 25, 0, 'J13 25 ', '000001 C'),
(91, 0, 0, '', '000001 C'),
(92, 0, 0, '', '000001 C'),
(93, 0, 0, '', '000001 C'),
(94, 47, 0, 'J11 7 J12 40 ', '000001 C'),
(95, 21, 0, 'J14 21 ', '000001 C'),
(96, 40, 1, 'J11 16 J12 12 ', '000001 T 011011 C'),
(97, 5, 0, 'J16 5 ', '000001 C'),
(98, 24, 0, 'J11 12 J12 12 ', '000001 C'),
(99, 117, 0, 'J11 14 J12 40 J13 33 J15 30 ', '000001 C'),
(100, 105, 5, 'J11 6 J12 24 J13 15 ', '000001 T 598634 T 948431 T 486215 T 265665 T 153489 C'),
(101, 18, 0, 'J12 18 ', '000001 C'),
(102, 24, 0, 'J14 24 ', '000001 C'),
(103, 281, 17, 'J11 16 J12 18 J13 22 J14 21 ', '000001 T 265665 T 011011 T 598634 T 028453 T 508943 T 160098 T 246838 T 448472 T 560194 T 153489 T 948431 T 789134 T 731649 T 848644 T 891425 T 783516 T 486215 C'),
(104, 72, 0, 'J12 18 J13 33 J14 21 ', '000001 C'),
(105, 0, 0, '', '000001 C'),
(106, 64, 0, 'J18 42 J17 10 J12 12 ', '000001 C'),
(107, 0, 0, '', '000001 C'),
(108, 51, 0, 'J11 16 J14 35 ', '000001 C'),
(109, 0, 0, '', '000001 C'),
(110, 18, 0, 'J14 18 ', '000001 C'),
(111, 41, 0, 'J11 5 J13 15 J14 21 ', '000001 C'),
(112, 51, 0, 'J11 8 J12 22 J14 21 ', '000001 C'),
(113, 86, 0, 'J11 13 J12 33 J13 22 J14 18 ', '000001 C'),
(114, 27, 0, 'J12 12 J13 15 ', '000001 C'),
(115, 5, 0, 'J11 5 ', '000001 C'),
(116, 0, 0, '', '000001 C'),
(117, 24, 0, 'J14 24 ', '000001 C'),
(118, 0, 0, '', '000001 C'),
(119, 0, 0, '', '000001 C'),
(120, 0, 0, '', '000001 C'),
(121, 180, 15, '', '000001 T 598634 T 783516 T 896403 T 789134 T 891425 T 246838 T 265665 T 560194 T 448472 T 160098 T 731649 T 028453 T 486215 T 948431 T 153489 C'),
(122, 0, 0, '', '000001 C'),
(123, 24, 2, '', '000001 T 560194 T 891425 C'),
(124, 15, 0, 'J14 15 ', '000001 C'),
(125, 0, 0, '', '000001 C'),
(126, 0, 0, '', '000001 C'),
(127, 0, 0, '', '000001 C'),
(128, 20, 0, 'J18 20 ', '000001 C'),
(129, 0, 0, '', '000001 C'),
(130, 0, 0, 'J17 0 ', '000001 C'),
(131, 0, 0, '', '000001 C'),
(132, 0, 0, '', '000001 C'),
(133, 20, 0, 'J18 20 ', '000001 C'),
(134, 0, 0, '', '000001 C'),
(135, 0, 0, '', '000001 C'),
(136, 0, 0, '', '000001 C'),
(137, 0, 0, '', '000001 C'),
(138, 30, 0, 'J15 30 ', '000001 C'),
(139, 90, 0, 'J13 15 J15 75 ', '000001 C'),
(140, 60, 5, '', '000001 T 508943 T 731649 T 891425 T 265665 T 448472 C'),
(141, 66, 3, 'J15 30 ', '000001 T 011011 T 598634 T 486215 C'),
(142, 0, 0, '', '000001 C'),
(143, 0, 0, '', '000001 C'),
(144, 65, 0, 'J18 35 J17 20 J16 10 ', '000001 C'),
(145, 0, 0, '', '000001 C'),
(146, 0, 0, '', '000001 C'),
(147, 0, 0, '', '000001 C'),
(148, 0, 0, '', '000001 C'),
(149, 0, 0, '', '000001 C'),
(150, 0, 0, '', '000001 C'),
(151, 0, 0, '', '000001 C'),
(152, 0, 0, '', '000001 C'),
(153, 0, 0, '', '000001 C'),
(154, 0, 0, '', '000001 C'),
(155, 0, 0, '', '000001 C'),
(156, 0, 0, '', '000001 C'),
(157, 0, 0, '', '000001 C'),
(158, 0, 0, '', '000001 C'),
(159, 0, 0, '', '000001 C'),
(160, 0, 0, '', '000001 C'),
(161, 0, 0, '', '000001 C'),
(162, 0, 0, '', '000001 C'),
(163, 0, 0, '', '000001 C'),
(164, 0, 0, '', '000001 C'),
(165, 0, 0, '', '000001 C'),
(166, 0, 0, '', '000001 C'),
(167, 0, 0, '', '000001 C'),
(168, 0, 0, '', '000001 C'),
(169, 0, 0, '', '000001 C'),
(170, 0, 0, '', '000001 C'),
(171, 0, 0, '', '000001 C'),
(172, 0, 0, '', '000001 C'),
(173, 0, 0, '', '000001 C'),
(174, 0, 0, '', '000001 C'),
(175, 0, 0, '', '000001 C'),
(176, 0, 0, '', '000001 C'),
(177, 0, 0, '', '000001 C'),
(178, 0, 0, '', '000001 C'),
(179, 0, 0, '', '000001 C'),
(180, 0, 0, '', '000001 C'),
(181, 0, 0, '', '000001 C'),
(182, 0, 0, '', '000001 C'),
(183, 0, 0, '', '000001 C'),
(184, 0, 0, '', '000001 C'),
(185, 0, 0, '', '000001 C'),
(186, 0, 0, '', '000001 C'),
(187, 0, 0, '', '000001 C'),
(188, 0, 0, '', '000001 C'),
(189, 0, 0, '', '000001 C'),
(190, 0, 0, '', '000001 C'),
(191, 0, 0, '', '000001 C'),
(192, 0, 0, '', '000001 C'),
(193, 0, 0, '', '000001 C'),
(194, 0, 0, '', '000001 C'),
(195, 0, 0, '', '000001 C'),
(196, 0, 0, '', '000001 C'),
(197, 0, 0, '', '000001 C'),
(198, 0, 0, '', '000001 C'),
(199, 0, 0, '', '000001 C'),
(200, 0, 0, '', '000001 C'),
(201, 0, 0, '', '000001 C'),
(202, 0, 0, '', '000001 C');

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `device` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `no_connect` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`device`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `stats`
--

INSERT INTO `stats` (`device`, `no_connect`, `user`, `admin`) VALUES
('computer', 2440, 191, 108),
('mobile', 12134, 467, 305);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `clef` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Droits` varchar(255) NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`clef`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Droits`) VALUES
(1, 'Corentin', 'DOUÉ', 'corentin.doue@etu.emse.fr', '0386479877', 'ADMIN'),
(3, 'Paul', 'BATILLAT', 'paul.batillat@etu.emse.fr', 'paul', 'ADMIN'),
(4, 'Gabriel', 'SAMAT', 'gabriel.samat@etu.emse.fr', 'gabriel', 'ADMIN'),
(2, 'Alexis', 'POUJOL', 'alexis.poujol@etu.emse.fr', 'alexis', 'ADMIN'),
(5, 'User', 'USER', 'user.user@etu.emse.fr', 'user', 'USER'),
(6, 'Pierre', 'Gautier', 'p.gautier-leboulch@etu.emse.fr', '123456', 'ADMIN'),
(7, 'Flora', 'Faure', 'flora.faure@etu.emse.fr', 'Emerentya', 'ADMIN'),
(8, 'Guillaume', 'Grange', 'gugr42@free.fr', 'gugr1996', 'ADMIN'),
(9, 'Thibaut', 'Froeliger', 'thibaut.froeliger@etu.emse.fr', 'chfbh!6!', 'ADMIN'),
(10, 'Rémi', 'Chabot', 'remi.chabot@etu.emse.fr', 'Clara23052015', 'ADMIN'),
(11, 'Paul', 'Breugnot', 'xhampignon@gmail.com', 'lvmg2bp3', 'ADMIN'),
(12, 'Alexandre', 'Pillet', 'alexandre.pillet@etu.emse.fr', 'Pt12,07PtSi', 'ADMIN'),
(13, 'Sébastien', 'Montalvo', 'sebastien.montalvo@etu.emse.fr', 'e4pulwqf', 'ADMIN'),
(14, 'Victor', 'Chmiel', 'victorchmiel.perso@gmail.com', 'alibi30STM', 'ADMIN'),
(15, 'Jérémy', 'Couturier', 'jeremy.couturier@etu.emse.fr', 'tor*5$j', 'ADMIN'),
(16, 'Ralph', 'Pierrot', 'ralph.pierrot@etu.emse.fr', 'itch961hat578', 'ADMIN'),
(17, 'Constantin', 'Rousseau', 'constantin.rousseau@etu.emse.fr', '314eddechaise', 'ADMIN'),
(18, 'Jean', 'Jardel', 'jean.jardel@etu.emse.fr', 'JJardeldu76', 'ADMIN'),
(19, 'Nikolaï', 'Thepot', 'nikolas.thepot@etu.emse.fr', 'louchat', 'ADMIN'),
(20, 'Robin', 'Camarasa', 'robin.camarasa@etu.emse.fr', 'Mathilde', 'ADMIN'),
(21, 'Lucas', 'Castaldi', 'lucastaldi@gmail.com', 'cheguevarec423', 'ADMIN'),
(22, 'Laure', 'Crégut', 'laure.cregut@etu.emse.fr', 'laure', 'ADMIN'),
(23, 'Tibo', 'Hamm', 'thibaut.hamm@etu.emse.fr', 'te13ba03yo95', 'ADMIN'),
(24, 'Gabrielle', 'TIPHENE', 'gabrielle.tiphene@etu.emse.fr', '4RIFJVN9', 'ADMIN'),
(59, 'Mathilde ', 'Matly ', 'mathildematly@orange.fr', 'tildu09', 'USER'),
(26, 'Éva ', 'Cariilo', 'eva.carillo@etu.emse.fr', 'eva', 'ADMIN'),
(27, 'Julien ', 'Colomb', 'julien.colomb@etu.emse.fr', 'julien', 'ADMIN'),
(28, 'Arnaud', 'Patra', 'arnaud.patra@etu.emse.fr', 'arnaud', 'ADMIN'),
(29, 'Sonia', 'Kebila', 'sonia.kebila@etu.emse.fr', 'sonia', 'ADMIN'),
(30, 'Estelle', 'Delettre', 'estelle.delettre@etu.emse.fr', 'panpan96', 'ADMIN'),
(32, 'Arthur', 'Moustrou', 'arthur.moustrou@etu.emse.fr', '02022662', 'USER'),
(33, 'Thomas', 'Desmots', 'desmots.thomas@gmail.com', 'toto', 'USER'),
(34, 'Jérôme', 'Peyron', 'jerome.peyron@etu.emse.fr', 'rougerie63', 'USER'),
(35, 'Laura', 'Bonin', 'laura.bonin@etu.emse.fr', 'laura', 'USER'),
(36, 'Valentin ', 'Bouiller ', 'Valentin.bouiller@etu.emse.fr', 'D34hAcor', 'USER'),
(37, 'Alexandre ', 'Benmessaoud', 'a.benmessaoud@etu.emse.fr', '112524', 'USER'),
(38, 'Eliot', 'Lyp', 'eliott.lyprendi@etu.emse.fr', 'alcapone', 'USER'),
(39, 'Alexis', 'PICARD', 'alexis.picard@etu.emse.fr', 'slash1904', 'USER'),
(40, 'Elie', 'Bonnet', 'elie.bonnet@etu.emse.fr', 'atribolibop', 'USER'),
(41, 'Mathieu', 'De Lafond', 'mathieu.delafond@etu.emse.fr', 'mathieu', 'USER'),
(42, 'Théophile ', 'Camus ', 'theophile.camus@etu.emse.fr', 'bostontexas', 'USER'),
(43, 'Caroline', 'Le Nail', 'caroline.lenail@etu.emse.fr', 'chupachups', 'USER'),
(44, 'Corentin ', 'Muraro', 'corentin.muraro@etu.emse.fr', 'CoCo07136872', 'USER'),
(45, 'Clément', 'Nicolas', 'clement.nicolas@etu.emse.fr', 'smos2010', 'USER'),
(46, 'Maïlis', 'MILIAT', 'mailis.miliat@etu.emse.fr', '280695', 'USER'),
(47, 'Jules', 'Le Lay', 'lelay.jules@gmail.com', 'BuzziE95', 'USER'),
(48, 'Conrad', 'ROTHAN-DENOYES', 'conrad.rothan@etu.emse.fr', 'Bestof33', 'USER'),
(49, 'Olivier ', 'Vieille', 'vieilleolivier@yahoo.fr', 'aE2vB7Ni', 'USER'),
(50, 'Brice', 'Soucheleau', 'brice.soucheleau@etu.emse.fr', 'brice1995Brice', 'USER'),
(51, 'Arnaud ', 'Gazda ', 'arnaud.gazda@etu.emse.fr', '64gloqad2010', 'USER'),
(52, 'Lucas', 'Tran', 'lucas.tranngocan@etu.emse.fr', 'UyUN1996', 'USER'),
(53, 'Romain', 'Frayssinet', 'romain.frayssinet@etu.emse.fr', '1249', 'USER'),
(54, 'Valentin ', 'Chasswag', 'valentin.chassagne@etu.emse.fr', 'aegisfort83', 'USER'),
(55, 'Steve', 'Mermoud', 'steve.mermoud@etu.emse.fr', 'mermoud1996', 'USER'),
(56, 'Matthias', 'Burin des Roziers ', 'm.burindesroziers@etu.emse.fr', 'bde', 'USER'),
(57, 'Pauline', 'Chevreau', 'pauline.chevreau@etu.emse.fr', 'g7!k2gxp', 'USER'),
(58, 'Valentin', 'PouzPouz', 'valentin.pouzet@etu.emse.fr', 'MMA<3Minesterstellar', 'USER'),
(60, 'Guillaume', 'Peiffert', 'guillaume.peiffert@etu.emse.fr', '5q*ean!0', 'USER'),
(61, 'Thibault', 'Laurent', 'thibault.laurent@etu.emse.fr', 'mksi789x', 'USER'),
(62, 'Marie ', 'Vaillant', 'marie.vaillant@etu.emse.fr', 'Vaillant', 'USER'),
(63, 'Paul', 'BE', 'pbonneteymard@gmail.com', 'mma', 'USER'),
(64, 'Morgane', 'Vassal', 'morgane.vassal@etu.emse.fr', '291095panarive', 'USER'),
(65, 'Maïlys', 'Lafayette', 'mailys.lafayette@etu.emse.fr', 'lafayette', 'USER'),
(66, 'Sarra', 'ANNABI', 'sarra.annabi@gmail.com', 'sam9694', 'USER'),
(67, 'Juliette', 'FOINE', 'juju6294@hotmail.fr', 'oceane', 'USER'),
(68, 'Benedicte', 'Bonnet', 'benedicte.bonnet@etu.emse.fr', '06ben264', 'USER'),
(69, 'Aymeric', 'Boccard', 'aymeric.boccard@etu.emse.fr', '29011995', 'USER'),
(70, 'Anton', 'Matou', 'anton.matou@etu.emse.fr', 'Anton971', 'USER'),
(71, 'Nans', 'Nicolas', 'nans.nicolas@etu.emse.fr', 'invincible', 'USER'),
(72, 'eloise', 'lewandowski', 'eloise.lewandowski@etu.emse.fr', 'iwpz1ej71', 'USER'),
(73, 'Geoffrey', 'Robmerde', 'geoffrey.robert@emse.fr', 'G3offrey', 'USER'),
(74, 'Majid', 'Benjelloun', 'majid_benjelloun@hotmail.com', 'minesterstellar', 'USER'),
(75, 'Violette', 'Favret', 'violette.favret@etu.emse.fr', 'Violette', 'USER'),
(76, 'Céline', 'Hannecart', 'celine.hannecart@etu.emse.fr', 'Avengers3908', 'USER'),
(77, 'Victor', 'Guth', 'victor.guth@etu.emse.fr', 'Vicore54360', 'USER'),
(78, 'Marin', 'Bouthemy', 'marin.bouthemy@etu.emse.fr', 'Mistoularebelle9', 'USER'),
(79, 'fidele', 'degni', 'fidele.degni@etu.emse.fr', 'df2m2dc', 'USER'),
(80, 'Enora', 'Lamicq', 'enora.lamicq@etu.emse.fr', 'Lamicq', 'USER'),
(81, 'axel', 'correia', 'axel.correia@etu.emse.fr', '6NE73P2NTJ2E', 'USER'),
(82, 'Martin ', 'Pauty', 'martin.pauty@etu.emse.fr', 'pauty783yu', 'USER'),
(83, 'Guillaume', 'Anadon', 'guillaume.anadon@etu.emse.fr', 'darkmaster0', 'USER'),
(84, 'Mark', 'Garvie', 'mark.garvie@etu.emse.fr', 'coucou', 'USER'),
(85, 'Florian', 'Tambon', 'florian.tambon@etu.emse.fr', 'floralie1', 'USER'),
(86, 'mathilde', 'marchoux', 'mathilde.marchoux@etu.emse.fr', 'mma01', 'USER'),
(87, 'clement', 'laboulfie', 'clement.laboulfie@etu.emse.fr', 'hautegaronne31', 'USER'),
(88, 'Josué', 'Bulot', 'josue.bulot@etu.emse.fr', 'buljos', 'USER'),
(89, 'Adel', 'Megherbi', 'adel.megherbi@etu.emse.fr', 'noisette', 'USER'),
(90, 'Chloé', 'Gourrat', 'chloe.gourrat@etu.emse.fr', 'z!!48fpl', 'USER'),
(91, 'Pauline', 'Cohen', 'pauline.cohen@etu.emse.fr', 'koukiki1996', 'USER'),
(92, 'aubin', 'rabouan', 'aubin.rabouan@etu.emse.fr', 'clintano', 'USER'),
(93, 'Antoine', 'Wozniak', 'antoine.wozniak@etu.emse.fr', 'SAS-Skeletor547', 'USER'),
(94, 'Nicolas', 'Dumez', 'nicolas.dumez@etu.emse.fr', 'Tomoskeat01', 'USER'),
(95, 'Diego', 'Leon', 'diego.leon@etu.emse.fr', 'Pistou464', 'USER'),
(96, 'Mouhamed', 'Sambe', 'mouhamed.sambe@etu.emse.fr', '1Hommefort', 'USER'),
(97, 'Nabil', 'BEKHALED', 'nabil.bekhaled@etu.emse.fr', 'algerie213', 'USER'),
(98, 'Jean-Baptiste', 'MARY', 'jeanbaptiste.mary@etu.emse.fr', 'cfbe92wg', 'USER'),
(99, 'Lauriane', 'Bricaud', 'lauriane.bricaud@etu.emse.fr', 'danae86', 'USER'),
(100, 'Alexandre ', 'Chateauraynaud ', 'a.chateauraynaud@etu.emse.fr', 'Mikael33', 'USER'),
(101, 'Clement ', 'Laverriere', 'clement.laverriere@etu.emse.fr', 'jacques1', 'USER'),
(102, 'Nicolas', 'Nerome', 'nicolasmax.nerome@etu.emse.fr', 'Mardebloenfor41', 'USER'),
(103, 'Thomas', 'Solanas', 'thomas.solanas@etu.emse.fr', 'thbslg', 'USER'),
(104, 'Théophane ', 'TASSY', 'theophane.tassy@etu.emse.fr', 'anqbwvedcpoi17', 'USER'),
(105, 'Thibaut', 'Cassard', 'thibaut.cassard@etu.emse.fr', 'beatonio', 'USER'),
(106, 'Christophe', 'Vitu', 'christophe.vitu@etu.emse.fr', 'galaxie2110', 'USER'),
(107, 'Loïc', 'Cellier', 'loic.cellier', 'loic', 'USER'),
(108, 'Florian', 'Desrosiers', 'florian.desrosiers@etu.emse.fr', 'D019', 'USER'),
(109, 'Allan', 'Dubut', 'allan.dubut@etu.emse.fr', 'Morgane59', 'USER'),
(110, 'Meiji', 'Kawaishi', 'arnaud.kawaishi@etu.emse.fr', 'mikinosuke92', 'USER'),
(111, 'Arnaud', 'Le Tiec', 'arnaud.letiec@etu.emse.fr', 'norway1789', 'USER'),
(112, 'gus', 'le best', 'augustin.brandel@etu.emse.fr', 'gusdubus1995', 'USER'),
(113, 'Julie', 'Ferracci', 'julie.ferracci@etu.emse.fr', 'KZMOQ', 'USER'),
(114, 'Jordane', 'Goulas', 'jordane.goulas@etu.emse.fr', 'resposoiree42', 'USER'),
(115, 'Guilhem', 'Prunier', 'gprunier@hotmail.fr', '1715', 'USER'),
(116, 'Yvan', 'Marthouret', 'yvan.marthouret@etu.emse.fr', 'Kama7zero9', 'USER'),
(117, 'Antoine', 'Ollivier ', 'antoine.ollivier@etu.emse.fr', 'bcNof10', 'USER'),
(118, 'Garance', 'Calamel', 'garance.calamel@etu.emse.fr', 'arnold611', 'USER'),
(119, 'Margaux', 'Henry', 'margaux.henry@etu.emse.fr', 'mysdk38mysdk38', 'USER'),
(120, 'Juju', 'King', 'julien.faivre@etu.emse.fr', 'TaSoeur', 'USER'),
(121, 'Thomas', 'Langlais', 'thomas.langlais@etu.emse.fr', 'Thomas35740', 'USER'),
(122, 'Hugros', 'De Oliveira ', 'hugo.deoliveira@etu.emse.fr', 'h2o1414', 'USER'),
(123, 'Edmond', 'Chan', 'edmond.chan@etu.emse.fr', 'coucoucestmoi', 'USER'),
(124, 'Beatrice ', 'Vial-Montpellier', 'beatrice.vial@emse.etu.fr', '120729Mai', 'USER'),
(125, 'A', 'A', 'romain.frayssinet@etu.emse.frfrancois', '12345678Az!', 'USER'),
(126, 'Paoline', 'Coulson', 'paoline.coulson@etu.emse.fr', 'Theearlyyears', 'USER'),
(127, 'Romain', 'Lenéez', 'romain.leneez@etu.emse.fr', '11235813BdE!', 'USER'),
(128, 'Stanislas', 'Augier', 'stanislas.augier@etu.emse.fr', 'n3332f1p', 'USER'),
(129, 'Josepha', 'Godivier', 'josepha.godivier@etu.emse.fr', 'gruik', 'USER'),
(130, 'Victorine', 'Poncelet', 'victorine.poncelet@etu.emse.fr', 'alchimines', 'USER'),
(131, 'Clément', 'Deguise', 'clement.deguise@etu.emse.fr', 'Dagashi38', 'USER'),
(132, 'Bastien', 'Cozian', 'bastien.cozian@etu.emse.fr', 'bastiencozian', 'USER'),
(133, 'Ambre', 'Dauba', 'ambre.dauba@etu.emse.fr', 'kitty4', 'USER'),
(134, 'Adrien', 'Hanon', 'adrien.hanon@etu.emse.fr', 'ahahah75', 'USER'),
(135, 'Charlotte ', 'Bonny', 'charlotte.bonny@etu.emse.fr', 'ichigo250', 'USER'),
(136, 'Juliette', 'Pierre', 'juliette.pierre@etu.emse.fr', 'Shittypassword', 'USER'),
(137, 'Etienne', 'Fontaine', 'etienne.fontaine@etu.emse.fr', 'marazula3', 'USER'),
(138, 'Mathilde', 'Veyron', 'mathilde.veyron@etu.emse.fr', 'adrenaminesisyours', 'USER'),
(139, 'Sylvain', 'Laurent', 'sylau92@free.fr', 'daillou92', 'USER'),
(140, 'Helene', 'Caille', 'helene.caille@etu.emse.fr', 'ukelay', 'USER'),
(141, 'Romain', 'Toesca', 'romain.toesca@etu.emse.fr', 'rrr000', 'USER'),
(142, 'Alexandre', 'Moynier', 'alexandre.moynier@etu.emse.fr', '-9eb9663-', 'USER'),
(143, 'Stephanie', 'De monaco', 'jmfp@orange .fr', 'tuch89', 'USER'),
(144, 'Benjamin', 'Vincent', 'vincent.benyamin@etu.emse.fr', '4ol7wh8t', 'USER'),
(145, 'Loïc', 'Lautissier', 'loic1995@msn.com', 'teb4k4', 'USER'),
(146, 'farida', 'mokeddem', 'mokeddemfarida77@gmail.com', 'fleur123', 'USER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
