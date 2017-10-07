-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 07 Octobre 2017 à 17:22
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mobilite_internationale`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `ID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`ID`, `Description`, `titre`, `contenu`) VALUES
(1, '', 'Pourquoi partir ?', 'Tout élève ingénieur ICM doit au cours de sa formation effectuer une période de 12 semaines à l’étranger, que ce soit pour un échange académique ou un stage.<br>\n<br>\nCette expérience est l’occasion d’acquérir des compétences diverses, en accord avec le contexte d’internationalisation actuel du monde du travail, mais aussi de s’ouvrir à d’autres cultures. De plus, partir étudier hors des sentiers battus des universités purement anglophones pourra s’avérer non seulement très riche en termes d’expérience personnelle mais également valorisable auprès des recruteurs.<br>\n<br> \nPour réaliser ce Quitus International (la période de 12 semaines à effectuer obligatoirement à l’étranger au cours du cycle ICM), plusieurs options s’offrent à toi comme tu pourras le découvrir dans la section suivante.<br>\n<br>\nAttention cependant, une mobilité requiert un travail de préparation conséquent. Si tu souhaites partir, il faudra donc <u>prendre le temps de te renseigner</u> dans les moindres détails pour que ton départ se fasse dans les meilleures conditions.'),
(2, 'S7 intro', 'Au S7', 'C’est la principale fenêtre de départ à l’étranger choisie par les étudiants de l’école. C’est aussi le meilleur moyen de valider ton quitus international.<br>\n<br> \nAu cours de ce semestre, les crédits validés sur le campus partenaire se substituent à ceux proposés par l’école. Aussi, après une année consacrée à l’acquisition du socle de connaissances communes, cette mobilité t’offre la possibilité de diversifier ton parcours dès le début de la deuxième année.<br> \nDe plus, l’école dispose de partenariats sur tous les continents.</br>\n<br> \nConcernant les dates de départ et de retour, elles fluctuent selon les années et les campus : certains partent dès le mois de juillet suivant la fin de la première année, tandis que d’autres ne reviennent qu’en mars de la deuxième année.'),
(3, '', 'En stage 2A', 'En dehors des mobilités classiques en transfert de crédit, une autre modalité de validation du quitus international est le stage à l’étranger, en entreprise ou au sein d’une équipe de recherche universitaire. Vous pouvez vous appuyer sur le vaste réseau de partenaires internationaux de Mines Saint-Etienne et de l’Institut Mines Telecom pour rechercher un stage dans un laboratoire de recherche sur un campus à l’étranger. Contrairement aux échanges étudiants en transfert de crédit, il n’y a pas de places réservées pour les élèves stagiaires chez nos partenaires. Il appartient donc à chacun de repérer le(s) campus et les équipes de recherches et de faire une véritable démarche de candidature. L’appui du service des stages et d’enseignants-chercheurs impliqués dans des collaborations avec les campus ciblés seront un plus pour mener à bien ce type de recherche. Comme pour tout stage, une fois l’équipe d’accueil et le sujet trouvé, il faudra trouver un tuteur école et remplir les formalités administratives requises par le service des stages (fiche d’identification, convention). Un stage non-rémunéré est éligible à une bourse EXPLORA’SUP, tout comme une mobilité académique.'),
(4, '', 'Au S10', 'Quelques départs en transfert de crédits sont autorisés au S10. Ces départs tardifs ont néanmoins quelques conséquences. Ils impliquent tout d’abord une prolongation de scolarité avec réinscription payante, sans obtention d’un deuxième diplôme. C’est la raison pour laquelle l’école n’encourage pas ce type de départ. La sélection des dossiers s’effectue courant mai en S8 et tient compte de plusieurs paramètres : limitation du nombre de départs à une douzaine, justification de la nécessité d’un tel projet par l’étudiant,...'),
(5, '', 'Départ 3A en France (transferts de crédits) :', 'Quelques places sont ouvertes chaque année dans des établissements partenaires et permettent de substituer sa 3ème année ICM avec une autre formation. Les candidats sont présélectionnés par Mines Saint-Etienne, mais c’est l’établissement d’accueil qui reste décisionnaire. Tous les candidats doivent défendre leur projet d’étude, et justifier leur décision de suivre une formation différente de celle proposée par l’école. Il est également possible de présenter un projet de candidature dans un établissement non partenaire, mais c’est à l’élève de mener les démarches administratives avec l’établissement concerné. Attention les mobilités en France ne peuvent bien évidement pas permettre de valider le quitus'),
(6, 'DD intro', 'En double diplome', 'Mines Saint-Etienne dispose aujourd’hui de nombreux accords avec des établissements partenaires en France et à l’étranger dans le cadre de doubles diplômes. Chacun de ces accords prévoit des modalités spécifiques, mais respecte plus ou moins les mêmes prérogatives.'),
(7, '', 'TFE', 'Le travail de fin d’étude (TFE) est le stage de 6 mois qui conclut le cycle ICM. Tout comme le stage 2A, c’est un moyen de valider son quitus international sans passer par le système des transferts de crédit classique associé majoritairement au S7. Les informations sont donc identiques à celles dispensées dans la rubrique Stage 2A.'),
(8, 'S7 partie 1', 'Partir au S7', 'C’est la principale fenêtre de départ à l’étranger choisie par les étudiants de l’école. C’est aussi le meilleur moyen de valider ton quitus international. Au cours de ce semestre, les crédits validés sur le campus partenaire se substituent à ceux proposés par l’école. Aussi, après une année consacrée à l’acquisition du socle de connaissances communes, cette mobilité t’offre la possibilité de diversifier ton parcours dès le début de la deuxième année. De plus, l’école dispose de partenariats sur tous les continents.<br>\n<br>\nConcernant les dates de départ et de retour, elles fluctuent selon les années et les campus : certains partent dès le mois de juillet suivant la fin de la première année, tandis que d’autres ne reviennent qu’en mars de la deuxième année.<br>\n<br> \nAu sujet des cours, les campus partenaires n’offrent pas toujours l’intégralité de leur catalogue aux étudiants étrangers. De plus, les cours suivis par les étudiants doivent être en accord avec le projet de formation dispensé par l’école des Mines de Saint-Etienne. Sous ces conditions, tu peux choisir des cours de niveau fin de 1er cycle (licence/undergraduate/Bsc) ou début de 2ème cycle (master/graduate ou postgraduate).<br> Attention à prendre en considération les spécificités de chaque pays dans l’organisation du cursus ingénieur. Pour ce qui est des domaines d’étude, tu dois impérativement sélectionner des cours en ingénierie, sciences, management ou sciences sociales. Les cours de langue étrangère ne sont pas obligatoire. En revanche, certaines universités étrangères ont des exigences en matière de compétence linguistiques pour que ton dossier soit accepté. N’hésites pas à te renseigner sur le sujet. Tu peux également choisir de suivre d’autres cours pour ta culture personnelle mais les crédits correspondant ne seront pas pris en compte dans le transfert de crédits.<br>\n<br>\nEnfin, un dernier point important concernant le S7 : le tuteur pédagogique. Ton projet d’étude à l’étranger doit être validé par un enseignant-chercheur de l’école qui vérifie si tu disposes des prérequis pour suivre les cours sélectionnés.'),
(9, 'image du calendrier', 'Calendrier récapitulatif :', 'calendrier_S7.png'),
(10, 'S7 partie 2', 'Questions récurrentes :', 'Qui est éligible ? \r\nToute candidature déposée dans les règles et dans les temps est éligible, sauf problème majeur de comportement ou d’engagement dans les études (dont absentéisme). Quelques partenariats exigent en plus un seuil GPA minimal. \r\n \r\nCombien d’élèves par destination ? \r\n3 élèves maximum par campus partenaire pour une répartition optimale sur les destinations, parfois moins quand la convention le prévoit. Le nombre de places ouvertes sur chaque campus est précisé au moment de l’appel à candidatures.\r\n \r\nComment s’effectue la répartition des candidatures sur les destinations ? \r\nElle s’effectue de manière à maximiser le nombre de départs en satisfaisant autant que faire se peut les vœux classés en premier.\r\n \r\nPeut-on demander à défendre son dossier ? \r\nLes élèves n’ayant pas obtenu leur vœu 1 peuvent demander à être mis en concurrence lors d’une audition. Choisir de se soumettre à cette procédure implique de se désister de tous ses autres vœux. Après les auditions, les candidats non retenus peuvent reporter leur choix sur une autre destination non saturée si le jury estime que le projet présenté était cohérent et argumenté.\r\n \r\n \r\n \r\nQue se passe-t-il après cette phase de sélection ? \r\nUne liste définitive des partants par destinations est adressée aux élèves début mars. Ceux-ci sont alors considérés comme définitivement engagés au départ. L’école contacte les campus partenaires et gère le premier contact avec les élèves sélectionnés (phase de « nomination »). Ceux-ci peuvent ensuite finaliser leurs démarches de candidature auprès du partenaire avec l’aide du Pôle international de la DFE. \r\n \r\nEst-on certain de partir une fois la phase de sélection interne passée ? \r\nDans 98% des cas oui, car les places sont en principe réservées chez nos partenaires. Un élève défaillant (comportement, risque de redoublement) peut cependant se voir contraint de renoncer à son départ par le Comité des Etudes de fin de semestre. Par ailleurs, l’école n’est pas responsable d’éventuels manquements d’un élève au moment du montage de son dossier. Il appartient à chaque partant de suivre les consignes données par l’école et le campus d’accueil et de fournir tout document requis dans les délais. En tout état de cause, seule la lettre d’acceptation définitive envoyée par le campus d’accueil garantit un départ effectif.\r\n \r\nCombien de crédits faut-il valider sur le campus d’accueil pendant le S7 ? \r\nIl faut valider au minimum l’équivalent de ce qui aurait été validé à l’école sur la même période, déduction faite des 3 crédits de langue vivante, qui sont octroyés d’office. Il est recommandé de prendre un peu de marge au moment du choix des cours, pour sécuriser un nombre minimal de crédits validés au retour. En cas de crédits manquants, le comité des études statue sur les conditions de validation du semestre de mobilité et décide d’une éventuelle prolongation de scolarité ICM. Vous pouvez choisir un mix de plusieurs disciplines d’ingénierie, des sciences, du management et des sciences sociales, ou vous concentrer sur une discipline principale en équivalence de la Majeure 1. Vous pouvez aussi vous faire plaisir avec des cours déconnectés de l’ingénierie, mais l’école ne validera pas vos crédits de sports, d’art, ni de langues vivantes. Ces éventuels crédits d’ouverture viennent donc en surplus de vos crédits obligatoires. Votre plan d’étude (pour Erasmus, il s’agit du contrat d’études officiel « Erasmus learning agreement) sera obligatoirement validé par un tuteur pédagogique avant votre départ de l’école.\r\n'),
(11, 'DD partie 1', 'Partir en Double Diplôme', 'Mines Saint-Etienne dispose aujourd’hui de nombreux accords avec des établissements partenaires en France et à l’étranger dans le cadre de doubles diplômes. Chacun de ces accords prévoit des modalités spécifiques, mais respecte plus ou moins les prérogatives suivantes.\r\n \r\nChaque établissement partenaire applique une forte sélectivité basée sur des critères d’excellence académique. Ensuite, la durée des études est en moyenne prolongée d’un an.\r\nEn ce qui concerne le projet de fin d’études, c’est l’université d’accueil qui en définit le cahier des charges (qui peut être très différent de celui de Mines Saint-Etienne)\r\nLes conventions internationales prévoient une dispense de droits de scolarité sur la campus d’accueil (en dehors du Royaume-Uni). Ces droits de scolarité sont réglés aux Mines de Saint-Etienne. Ce n’est en revanche pas toujours le cas des partenaires français.\r\nA titre d’information, Mines Saint-Etienne dispose aujourd’hui de 14 conventions de double diplôme à l’étranger :\r\nEn Europe : ETSI Industriales UP Madrid/ Politecnico di Torino/ Cranfield University/AGH University Krakow\r\nHors Europe : Seoul National University/Korea Advanced Insitute of Technology/Kyushu Institute of Technology/UniAndes Bogota/PUC Chile/Universidad Buenos Aires/Escola Politecnica da USP/ Escola Politecnica da UFRJ/Ecole Polytechnique de Montréal/Ecole de Technologie Supérieure Montréal\r\nPar ailleurs, si tu souhaites partir en DD, il te faudra avoir de bons résultats, et ce depuis ton intégration dans toutes les disciplines (GPA minimum de 3). Cela implique également une grande motivation, surtout si tu décides d’effectuer ce DD dans une université étrangère car tu seras nécessairement expatrié pendant plusieurs mois, et tu devras effectuer ton stage de fin d’études à l’étranger. Enfin, le coût d’une scolarité internationale prolongée n’est pas à négliger.\r\n'),
(12, 'image du calendrier DD', 'Calendrier récapitulatif :', 'calendrier_DD.png'),
(13, 'DD partie 2', 'Procédure de sélection pour les projets de double-diplôme (France et international) :', 'Rappel : \r\nUn double-diplôme n’est pas une mobilité académique comme les autres. Il engage l’étudiant sur la durée (de 0 à 3 semestres de prolongation d’études, soit, pour certains DD internationaux, deux années d’expatriation). L’étudiant doit se plier aux contraintes de validation du diplôme de l’établissement partenaire (dans de nombreux cas par exemple, obligation d’effectuer le projet de fin d’études sur le campus d’accueil, au sein d’une équipe de recherche locale). \r\n \r\n \r\nDispositif de sélection : \r\nCourant S7, le candidat remet à la DFE-Mobilité académique une présentation argumentée de son projet, assortie de toutes les pièces complémentaires qu’il jugera utile. Il est possible de cibler jusqu’à 3 destinations, classées par ordre de préférence. Le dépôt du dossier est l’occasion d’un entretien de motivation et d’une vérification de l’éligibilité du candidat. Les dossiers de demande de départs en DD sont examinés par un jury de sélection. \r\n \r\nEligibilité pour dépôt de candidature de DD : \r\nLe jury rend une décision motivée prenant en compte les résultats académiques, le parcours individuel et la progression de chaque candidat, mais un GPA minimum de 3 sur deux ou trois semestres de cursus ICM est requis pour franchir cette étape.\r\n \r\nSélection par destinations : \r\nLes campus partenaires acceptent 2 à 3 dossiers de candidature par année. Certains d’entre eux fixent un seuil minimal d’admissibilité en termes de GPA. En cas de candidatures éligibles trop nombreuses, la répartition des candidatures sur les destinations sera effectuée sur critères purement académiques. Des auditions pourront être organisées pour départager les candidats dont les GPA sont équivalents.\r\n'),
(14, 'Documents', 'Documents :', 'Ré-inscription à l’EMSE : \r\nLa réinscription de l’élève se fait auprès des services de la DEF avant le départ en mobilité. Il est faut aussi que l’élève renouvelle ses éventuelles demandes de bourses (qui peuvent être maintenues durant la mobilité).\r\n \r\nLes Documents d’Identité et Visas : \r\nHors UE :\r\nVérifier les documents requis pour l’entrée et le séjour dans le pays. Information obtenue auprès de l’université d’accueil ou de l’ambassade de ce pays en France.\r\nLa lettre d’acceptation par l’université peut être nécessaire pour entamer la demande de Visa.\r\nDans la plupart des pays, le passeport doit être valide plusieurs mois après la date de retour. \r\nL’obtention d’un passeport nouveau passeport demande du temps, il faut s’y prendre en avance.\r\nCertaines universités d’accueil proposent de s’occuper de ta demande de Visa moyennant l’avance des frais administratifs.\r\n \r\nDans l’UE : \r\nUne carte d’identité Française est suffisante pour voyager.\r\nEn tant que non-ressortissants de l’UE, tu dois obtenir un Visa pour le pays de destination. Il faudra aussi que tu anticipe le renouvellement de ton titre de séjour en France.\r\n'),
(15, 'Bourses', 'Bourses :', 'Erasmus (Départ dans un pays de l’union européenne ou pays associé au programme Erasmus +) : \r\nMines Saint-Etienne est signataire de la Charte Erasmus. A ce titre, les étudiants de l’école qui réalisent un séjour dans une autre université signataire s’acquittent des droits d’inscription uniquement dans leur établissement d’origine. Cette exemption de droits d’inscription est assortie d’une bourse de mobilité Erasmus correspondant à la durée du séjour. Le programme Erasmus rentre dans un cadre de mobilité bien spécifique. Le nouveau programme Erasmus + 2014-2021 visant à renforcer la coopération et l’identité européenne, des informations spécifiques sont à renseigner afin d’obtenir la bourse. Ces informations sont résumées ci-dessous :       \r\n-Un kit administratif de mobilité à compléter avant le départ, comprenant entre autres documents un contrat d’études (learning agreement).\r\n- Des tests de langue en ligne avant et après le séjour pour vérifier les progrès accomplis \r\n-Une évaluation par chaque partant de la qualité de sa mobilité (préparation, vécu, acquis…) par questionnaire en ligne. \r\nLes bourses sont d’un montant de 150 à 200 € mensuel selon les pays et à cumuler éventuellement avec une bourse régionale EXPLORA’SUP (en fonction de la dotation annuelle de l’école). Les stages effectués au sein d’un laboratoire de recherche universitaire sont également éligibles pour cette bourse de mobilité Erasmus+ dite « d’études ». Tout élève-ingénieur peut prétendre à un financement Erasmus et EXPLORA’SUP, sans condition de ressources ou de nationalité. Chacun est éligible pour une seule bourse de mobilité d’études Erasmus au cours de son cursus. Si la dotation régionale annuelle le permet, un élève peut bénéficier d’une deuxième bourse EXPLORA’SUP au cours de sa scolarité, mais les primo-partants sont prioritaires.\r\n \r\nVotre contact Erasmus à Mines Saint-Etienne: Marta TOR, tor@emse.fr bureau E 314 \r\nPlus d’infos : http://www.generation-erasmus.fr/\r\n \r\n \r\nPartenariats hors Europe : \r\nMines Saint-Etienne, adossée à l’Institut Mines Télécom, s’appuie sur un réseau international de 110 partenaires universitaires d’excellence. Les opportunités de mobilité sont essentiellement réparties en Asie, Amérique du Nord et Amérique Latine. Dans la plupart des cas, les conventions d’échange d’étudiants permettent aux ICM d’accéder à l’ensemble des programmes dispensés par la faculté d’ingénierie du partenaire, avec exemption totale de droits d’inscription. Deux à trois places par campus partenaire sont ouvertes chaque année.\r\n \r\nBourses EXPLORA’SUP : Les bourses EXPLORA’SUP sont sous la forme de forfaits calculés sur la base de 95€ par semaine + bonification de 530€ pour les élèves boursiers sur critères sociaux ou porteurs de handicap. Les montants attribués sont tributaires de la dotation régionale annuelle et du nombre de projets à financer. Réajustés chaque année, ils ne couvrent en général pas la durée réelle du séjour. Il est en théorie possible d’obtenir deux financements EXPLORA’SUP au cours de sa formation, mais les primo-partants restent prioritaires. Tout élève-ingénieur régulièrement inscrit peut prétendre à un financement EXPLORA’SUP, sans condition de ressources ou de nationalité. Les ressortissants internationaux ne pourront cependant pas obtenir de financement pour une mobilité dans leur pays d’origine.\r\nDe plus les bourses de mobilité régionale EXPLORA’SUP assurent le relais d’Erasmus pour les destinations en dehors de l’Europe. D’autres financements peuvent venir en complément selon la destination : pour les mobilités au Brésil, en Argentine, au Mexique les programmes intergouvernementaux BRAFITEC, ARFITEC et MEXFITEC peuvent vous permettre d’obtenir des bourses conséquentes (de 1.000 à 1.500€), cumulables avec la bourse EXPLORA’SUP.\r\n \r\nContacts FITEC: \r\nBrésil: Prof Ana CAMEIRAO, cameirao@emse.fr \r\nArgentine: Prof Jérôme MOLIMARD, molimard@emse.fr \r\nMexique: Prof Mihaela MATHIEU, mathieu@emse.fr\r\n \r\nAutres sources de financement : \r\nCertaines années, la Fondation I3M (anciens élèves de l’Ecole des Mines) finance des projets de mobilité internationale ciblés. Les élèves sont appelés à répondre à un appel à candidatures et doivent déposer un dossier argumenté qui passera devant comité de sélection. Chacun est par ailleurs libre de cumuler les bourses obtenues par l’intermédiaire de l’école avec d’autres bourses (Conseil Général du département d’origine, Rotary Club, bourse d’ambassade…). Certaines universités partenaires versent également une petite bourse d’entretien à leurs « incomings » pendant toute la durée de leur séjour\r\n'),
(16, 'Assurances', 'Assurances :', 'Assurance Santé - plusieurs situations peuvent se présenter selon la destination : \r\nEurope : Demande de la Carte Européenne d’Assurance Maladie(CEAM) à votre centre de sécurité sociale étudiante au plus tard un mois avant votre départ. Dans certains pays, une avance de frais est demandée, gardez alors tous vos justificatifs de dépense de santé pour obtenir un remboursement au retour.\r\nQuébec : Formulaire Q106 récupérer auprès de la caisse de sécurité sociale étudiante et à transmettre à l’école\r\nAilleurs : Une demande de remboursement peut être effectuée au retour de la mobilité (pensez à garder vos factures). Certains établissements exigent une couverture santé auquel cas il faudra se renseigner sur ses modalités, propres au pays d\'accueil.\r\nIl peut être judicieux, selon le coût des frais de santé dans le pays d’accueil, de souscrire à une assurance qui prendra en charge la part non remboursée par la Sécu au retour.\r\n \r\nResponsabilité Civile, Rapatriement :\r\nUne assurance de Responsabilité Civile couvre les dommages que tu pourrais occasionner à des tiers dans le pays d\'accueil, tu en disposes d’une en France et il est recommandé que tu en souscrives une valable à l’étranger.\r\nUne garantie de rapatriement sanitaire sert, comme son nom l’indique, à couvrir les frais nécessaires pour te ramener en France en cas de pépins. Elle est obligatoire dans le cas des mobilités Erasmus.\r\n \r\nVérifie avec ton assureur et ton banquier l’état de tes différentes couvertures pour éviter de payer pour un doublon (en particulier pour les services qui sont fournis avec ta Carte Bancaire).\r\n \r\nSécurité : \r\nIl t’es conseillé de t’inscrire auprès ton l’ambassade au dispositif Ariane qui permet le recensement et l’information des français à l’étranger. \r\nTu devras aussi être un minimum au fait du cadre juridique du pays dans lequel tu te rends, des us et coutumes de la population locale et des particularités de l’environnement de ton campus.\r\n'),
(17, '', 'Aparté sur la langue d’enseignement', 'Majoritairement l’anglais en Asie, le portugais au Brésil, l’espagnol dans le reste de l’Amérique Latine, le français et l’anglais au Canada, avec des variantes selon les campus. Les élèves déjà hispanophones peuvent envisager une adaptation rapide au portugais, moyennant une initiation sérieuse avant leur départ. Il est fortement conseillé d’être initié à la langue locale pour partir étudier au Japon et en Chine continentale. Hong-Kong et Taïwan, plus occidentalisées, sont plus accessibles aux débutants complets en chinois. Les campus partenaires précisent systématiquement sur leurs pages web dédiées aux échanges académiques les niveaux de langue et les justificatifs requis pour être admis en tant qu’étudiant en échange.\r\n \r\nPar ailleurs, certaines universités partenaires imposent l’obtention du TOEIC ou du TOEFL avant de valider l’inscription. Il est donc impératif de se renseigner sur le sujet, avant de planifier son départ, car les exigences sont très diverses selon les campus.\r\n'),
(18, 'Contacts :', 'Contacts :', 'DEF - Pôle international :<br> \nResponsable du pôle : Paul WHEAL wheal@emse.fr <br> \nCoordinatrice mobilité : Elisabeth GOUTIN-BURLAT goutin@emse.fr<br>  \nGestionnaire Erasmus : Marta TOR tor@emse.fr <br> \nGestionnaire mobilité sortante : Isabel DA SILVA dasilva@emse.fr<br>  \n <br> \nLe référent Mobilité Académique de la promotion que tu peux contacter par l\'intermédiaire de ton président de promotion.<br> \n <br> \nExperts par Pays : <br> \nEspagne, Colombie, Chili : Carmen ACOSTA acosta@emse.fr <br> \nArgentine : Prof Jérôme MOLIMARD molimard@emse.fr <br> \nBrésil, Portugal : Prof Ana CAMEIRAO cameirao@emse.fr <br> \nMexique : Prof Mihaela MATHIEU mathieu@emse.fr <br> \nJapon, Corée: Prof Woo-Suck HAN han@emse.fr <br> \nTaïwan: Prof Jakey BLUE lan@emse.fr <br> \nDéléguée au développement international : Florence GRANGER granger@emse.fr<br> \n <br> \nTuteur Pédagogique : <br> \nIl signe ton plan d’études et se porte garant de ton niveau auprès de l’université partenaire. Il faut le contacter lors de toute modification du plan d’études.<br> \n<br>  \nEtablissements partenaires : <br> \nIl ne faut pas hésiter à les contacter pour tout renseignement pendant la phase d’information (souvent : Office of International Affairs/Relations, division Student exchange). S’ils ne répondent pas, l’école jouera les intermédiaires;<br> \n<br>  \nLes promotions précédentes et Entrants Internationaux : <br> \nCe sont ceux qui auront les informations les plus récentes sur les campus partenaires (cours, administratif etc…) et qui pourront te renseigner sur la vie dans le pays d’accueil.<br>'),
(19, 'Titre section', 'Quelles sont les démarches ?', '');

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `complement_nom` text NOT NULL,
  `ID_Ville` int(11) NOT NULL DEFAULT '0',
  `ingenieurie` tinyint(1) NOT NULL DEFAULT '0',
  `type_mobilite` text NOT NULL,
  `type_convention` text NOT NULL,
  `langue_cours` text NOT NULL,
  `places` int(11) NOT NULL DEFAULT '0',
  `site_internet` text NOT NULL,
  `description` text NOT NULL,
  `commentaires` text NOT NULL,
  `activ` tinyint(4) NOT NULL DEFAULT '0',
  `document` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `destinations`
--

INSERT INTO `destinations` (`ID`, `nom`, `complement_nom`, `ID_Ville`, `ingenieurie`, `type_mobilite`, `type_convention`, `langue_cours`, `places`, `site_internet`, `description`, `commentaires`, `activ`, `document`) VALUES
(130, 'Tohoku    University', 'Sendaï', 60, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'www.tohoku.ac.jp/', '', '', 1, ''),
(131, 'Kumamoto  University', '', 61, 1, 'S7/S10', 'Mines Sainté', 'anglais', 2, 'ewww.kumamoto-u.ac.jp/', '', 'Logements fournis/Existence de tutorats', 1, ''),
(132, 'Universidad Autonoma Metropolitana', 'UAM', 62, 0, 'S7', 'Mines Sainté', 'anglais', 2, 'www.uam.mx/', '', '', 1, ''),
(133, 'Institut Bauman', '', 63, 1, 'S7', 'IMT', 'Russe', 2, 'www.bmstu.ru:8093/', '', '', 1, ''),
(134, 'MISIS', 'National University of Science and Technology', 63, 1, 'S7', 'Mines Sainté', 'anglais/Russe', 2, 'en.misis.ru/', '', 'Facilité d’accès pour l’ensemble des besoins', 1, ''),
(135, 'National Chiao Tung University', 'NCTU', 64, 1, 'S7/S10', 'Mines Sainté', 'anglais', 3, 'www.nctu.edu.tw/en', '', '', 1, ''),
(136, 'National Taiwan University', 'College of Eng / College EECS  NTU   Taipei', 65, 1, 'S7/S10', 'Mines Sainté', 'anglais', 3, 'www.ntu.edu.tw/', '', '', 1, ''),
(123, 'Seoul National University', 'SNU', 54, 1, 'S7/S10', 'Mines Sainté', 'anglais', 3, 'www.useoul.edu/', '', '', 1, ''),
(124, 'KAIST Daejeon', 'Korea Advanced Institute of Science and Technology', 55, 1, 'S7/S10', 'Mines Sainté', 'anglais', 2, 'www.kaist.edu/', '', '', 1, ''),
(125, 'POSTECH Pohang', 'Pohang University of Science and Technology', 56, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'www.postech.ac.kr/eng/', '', '', 1, ''),
(126, 'HKUST  College of Engineering', 'Hong Kong University of Science and Technology', 57, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'www.ust.hk/', '', '', 1, ''),
(127, 'City University Hong Kong', '', 57, 0, 'S7', 'Mines Sainté', 'anglais', 2, 'www.cityu.edu.hk/', '', '', 1, ''),
(128, 'Indian Institutes of Technology', '', 58, 1, 'S7', 'Mines Sainté', 'anglais', 4, 'www.iitd.ac.in/', '', 'Choc culturel important à prendre en compte', 1, ''),
(129, 'Kyushu Institute of Technology', 'KYUTECH', 59, 1, 'S7/S10/DD', 'Mines Sainté', 'anglais', 2, 'www.kyutech.ac.jp/english/', '', '', 1, ''),
(120, 'Universidad de Santiago  de Chile', 'USACH', 51, 1, 'S7', 'IMT', 'Espagnol', 3, 'www.usach.cl/', '', '', 1, ''),
(121, 'Shanghai Jiao Tong University', 'SJTU', 52, 1, 'S7', 'IMT', 'Chinois/anglais', 2, 'en.sjtu.edu.cn/', '', '', 1, ''),
(122, 'Uniandes', '', 53, 1, 'S7/S10', 'Mines Sainté', 'Espagnol', 3, 'www.uniandes.edu.co/', '', '', 1, ''),
(119, 'PUC de Chile', '', 50, 1, 'S7/S10', 'Mines Sainté', 'Espagnol', 3, 'www.uc.cl/', '', '', 1, ''),
(116, 'UNICAMP', 'Universidade Estadual de Campinas', 48, 1, 'S7', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.unicamp.br/', '', '', 1, ''),
(117, 'Ecole Polytechnique de Montréal', 'EPM', 49, 1, 'S7/DD', 'IMT', 'Français', 3, 'www.polymtl.ca/', '', '', 1, ''),
(118, 'Ecole de Technologie Supérieure', 'ETS Montréal', 49, 1, 'S7/Double Diplome', 'Mines Sainté', 'Français', 3, 'www.etsmtl.com/', '', '', 1, ''),
(115, 'UFG-Goiana', 'Universidade Federal de Goias', 47, 1, 'S7', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.ufg.br/', '', '', 1, ''),
(114, 'UNESP- São Paulo', 'Universidade Estadual Paulista - São Paulo', 45, 1, 'S7/S10', 'IMT', 'Portugais/anglais', 3, 'www.unesp.br/', '', '', 1, ''),
(113, 'PUC-RIO', 'Pontificia Universidade Catolica do Rio de Janeiro', 4, 1, 'S7', 'IMT / Brafitec', 'Portugais/anglais', 3, 'www.puc-rio.br/', '', '', 1, ''),
(112, 'UFMG-Belo Horizonte', 'Universidade Federal de Minas Gerais', 46, 1, 'S7', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.ufmg.br/', '', '', 1, ''),
(111, 'EP  UFRJ-Rio de Janeiro', 'Universidade Federal do Rio de Janeiro  - Escola Politecnica', 4, 0, 'S7/S10', 'IMT / Brafitec', 'Portugais', 3, 'www.poli.ufrj.br/', '', '', 1, ''),
(110, 'Escola Politecnica da USP', '', 45, 1, 'S7/S10', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.poli.usp.br/', '', '', 1, ''),
(109, 'UNR-Rosario', 'Universidad  Nacional de Rosario-Facultad de Ciencias Exactas Ingenieria y Agrimensura', 44, 1, 'S7', 'Mines Sainté / ARFITEC', 'Espagnol', 3, 'web.fceia.unr.edu.ar/es/', '', '', 1, ''),
(108, 'UNC-Cordoba', 'Universidad Nacional de Cordoba-Facultad de Ciencias Exactas Fisicas y Naturales', 43, 1, 'S7/S10', 'Mines Sainté / ARFITEC', 'Espagnol', 3, 'www.portal.efn.uncor.edu/', '', '', 1, ''),
(107, 'Universidad Buenos Aires', '', 42, 1, 'S7/S10', 'Mines Sainté / ARFITEC', 'Espagnol', 3, 'www.uba.ar/', '', '', 1, ''),
(106, 'Istanbul Teknik Universitesi', '', 41, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.itu.edu.tr/', '', '', 1, ''),
(105, 'Cranfield University', '', 40, 1, 'DD', 'Mines Sainté', 'anglais', 3, 'www.cranfield.ac.uk', '', '', 1, ''),
(102, 'Karlstad University', '', 37, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.kau.se/', '', '', 1, ''),
(103, 'CTU -Prague', 'Czech Technical University - Faculty of Nuclear Sciences and Physical Eng', 38, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.fjfi.cvut.cz/', '', '', 1, ''),
(100, 'AGH Krakow', '', 34, 0, 'S7/DD', 'Erasmus / Mines Sainté', 'anglais', 3, 'www.agh.edu.pl/', '', '', 1, ''),
(101, 'Universidade do Porto', '', 36, 0, 'S7', 'Erasmus', 'Portugais', 1, 'www.sigarra.up.pt/', '', '', 1, ''),
(99, 'Warsaw University of Technology', 'Faculty of Materials Science and Eng', 35, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.pw.edu.pl/', '', '', 1, ''),
(97, 'Silesian UT', 'Gliwice/ Katowice', 33, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.polsl.pl/', '', '', 1, ''),
(95, 'TU Eindhoven', 'Department of Biomedical Eng', 31, 0, 'S7', 'Erasmus', 'Anglais / TOEFL', 1, 'www.tue.nl/', '', '', 1, ''),
(94, 'University of Oslo', 'Faculty of Mathematics and Natural Sciences', 30, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.mn.uio.no/english/', '', '', 1, ''),
(93, 'Politecnico di Milano', 'School of Engineering/School of Design', 29, 0, 'S7', 'Erasmus', 'Italien', 1, 'www.polimi.it/', '', '', 1, ''),
(92, 'Universita degli studi di Bergamo', 'UniBG', 28, 1, 'S7/S10', 'Erasmus', 'Italien/anglais', 1, 'www.unibg.it/', '', '', 1, ''),
(91, 'Politecnico di Torino', '', 27, 0, 'DD/S10', 'Erasmus / Mines Sainté', 'Italien', 3, 'www.polito.it/', '', '', 1, ''),
(90, 'University College Dublin', 'School of Chemical and Bioprocess Eng', 26, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.ucd.ie/chembioeng/', '', '', 1, ''),
(89, 'BME Budapest', '', 25, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.bme.hu/', '', '', 1, ''),
(88, 'University of Eastern Finland', 'UEF Faculty of Science and Forestry - Joensuu', 24, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.uef.fi/', 'Reconnue en foresterie', 'Logement s’y prendre tôt/ pas de souci de langue/ souci de nourriture', 1, ''),
(87, 'TUT Pori', 'Technological University Tampere TUT - Pori campus', 23, 0, 'S7/S10', 'Erasmus', 'anglais', 3, 'www.tut.fi/en/pori/', '', 'Logement fourni mais pas toujours adapté', 1, ''),
(86, 'Universidad de Sevilla', 'Escuela Tecnica Superior de Ingenieria (ETSI)', 22, 0, 'S7', 'Erasmus / Mines Sainté', 'Espagnol', 1, 'www.etsi.us.es/', '', '', 1, ''),
(85, 'Universidad de Santiago de Compostela', '', 21, 0, 'S7', 'Erasmus', 'Espagnol', 3, 'www.usc.es/', '', '', 1, ''),
(84, 'ETSEI  Barcelona', '', 20, 1, 'S7/DD', 'Erasmus', 'Espagnol/Catalan', 3, 'www.etseib.upc.edu/', 'À l’intérieur de l’UPC une grande fac de Barcelone', 'Attention à la langue: Catalan et pas Castillan', 1, ''),
(83, 'Universidad Carlos III', '', 3, 0, 'S7', 'Erasmus', 'Espagnol', 3, 'www.uc3m.es/', '', '', 1, ''),
(82, 'ETSI de Minas y Energia  UPM', '', 3, 0, 'S7', 'Erasmus / Mines Sainté', 'Espagnol', 3, 'www.minasyenergia.upm.es/', '', '', 1, ''),
(81, 'ETSI Industriales UPM', '', 3, 1, 'S7/DD', 'Erasmus / Mines Sainté', 'Espagnol', 3, 'www.etsii.upm.es/', '', '', 1, ''),
(79, 'TU Wien', 'Institute of Chemical Eng', 19, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.tuwien.ac.at/', '', '', 1, ''),
(80, 'University of Wien', '', 19, 0, 'S7', 'Erasmus', 'Allemand', 3, 'www.univie.ac.at/', '', '', 1, ''),
(78, 'TU  München', 'Faculty of Mechanical Eng  /Faculty of Electrical Eng', 18, 0, 'S7/S10', 'Erasmus', 'Allemand/anglais', 1, 'www.tum.de/', 'Meilleure université technique d’Allemagne', 'examens difficiles basés sur la vitesse/ Difficulté de logement', 1, ''),
(77, 'TU  Kaiserlautern', 'Fachbereich Mathematik', 17, 0, 'S7', 'Erasmus', 'Allemand', 3, 'www.uni-kl.de/', '', '', 1, ''),
(76, 'Karlsruhe Institute of Technology / KIT', 'Department of Economics and Management', 16, 0, 'S7', 'Erasmus', 'Allemand/anglais', 3, 'www.kit.edu/', '', '', 1, ''),
(75, 'TU  Dortmund', 'Faculty of Statistics', 15, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.tu-dortmund.de/', '', '', 1, ''),
(74, 'TU  Darmstadt', '', 14, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.tu-darmstadt.de/', '', '', 1, ''),
(73, 'RWTH - Aachen', 'Faculty of Georessources and Materials Eng', 13, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.rwth-aachen.de/', '', '', 1, ''),
(72, 'TU Hamburg', 'TUHH', 12, 0, 'S7', ' Erasmus / Mines Sainté', 'Allemand/anglais', 3, 'www.tuhh.de/', '', '', 1, ''),
(70, 'TU Berlin', 'Fakultäten III und VII', 8, 0, 'S7/S10', 'Erasmus', 'Allemand', 3, 'www.tu-berlin.de/', '', '', 1, ''),
(71, 'TU  Dresden', 'Faculty of Electrical and Computer Eng', 11, 0, 'S7', 'Erasmus / Mines Sainté', 'Allemand', 2, 'www.tu-dresden.de/', '', '', 1, ''),
(104, 'University of Edinburgh', '', 39, 0, 'S7', 'Erasmus', 'anglais/ TOEFL', 2, 'www.ed.ac.uk/', '', '', 1, ''),
(98, 'Jagiellonian University', 'Faculty of Chemistry - Krakow', 34, 0, 'S7', 'Erasmus', 'anglais', 3, 'www2.chemia.uj.edu.pl/', '', '', 1, ''),
(96, 'University of Twente', '', 32, 0, 'S7/S10', 'Erasmus', 'Anglais / TOEFL', 2, 'www.utwente.nl/', '', '', 1, ''),
(137, 'Test', 'complément sur la destination test', 66, 1, 'S10', '', '/test', 1, 'www.blabla.com', 'Description test', '', 0, ''),
(138, 'Test 2', 'Blabla', 66, 0, '', '', 'Catalan', 1, 'compléter avec l\'adresse du site internet', 'A compléter', 'A compléter', 1, ''),
(141, 'Test 3', 'A compléter', 67, 0, '', '', '', 0, 'compléter avec l\'adresse du site internet', 'A compléter', 'A compléter', 0, ''),
(142, 'Ottawa University', '', 68, 0, 'S10', '', 'anglais', 0, 'compléter avec l\'adresse du site internet', 'A compléter', 'A compléter', 1, ''),
(143, 'FI UBA', '', 42, 0, 'S7/S10', '', 'Espagnol/anglais', 0, 'www.fi.uba.ar/', '', '', 0, ''),
(144, 'Imperial College of London', 'A compléter', 1, 0, 'DD', '', 'anglais', 0, 'compléter avec l\'adresse du site internet', 'A compléter', 'A compléter', 0, ''),
(145, 'University of Bristol', 'A compléter', 1, 0, 'DD/S10', '', 'anglais', 0, 'compléter avec l\'adresse du site internet', 'A compléter', 'A compléter', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `domainedestination`
--

CREATE TABLE `domainedestination` (
  `ID` int(11) NOT NULL,
  `ID_destination` int(11) NOT NULL,
  `ID_domaine` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domainedestination`
--

INSERT INTO `domainedestination` (`ID`, `ID_destination`, `ID_domaine`) VALUES
(1, 1, 1),
(2, 1, 2),
(31, 5, 10),
(4, 2, 4),
(5, 3, 3),
(6, 3, 4),
(7, 4, 2),
(34, 18, 1),
(38, 17, 16),
(37, 17, 15),
(30, 5, 14),
(26, 7, 11),
(23, 7, 5),
(22, 7, 6),
(35, 18, 8),
(36, 18, 12),
(39, 17, 17),
(40, 17, 18),
(41, 19, 19),
(42, 19, 20),
(43, 20, 16),
(44, 20, 17),
(45, 20, 15),
(46, 20, 21),
(47, 20, 22),
(48, 20, 23),
(49, 20, 24),
(50, 21, 25),
(51, 22, 22),
(52, 22, 26),
(53, 23, 27),
(54, 24, 16),
(55, 24, 17),
(56, 24, 18),
(57, 25, 28),
(58, 26, 19),
(59, 26, 21),
(60, 27, 15),
(61, 27, 29),
(62, 28, 24),
(63, 29, 19),
(64, 29, 22),
(65, 29, 21),
(66, 29, 15),
(67, 29, 18),
(68, 29, 30),
(69, 29, 31),
(70, 30, 15),
(71, 31, 20),
(72, 31, 24),
(73, 32, 19),
(74, 32, 15),
(75, 32, 32),
(76, 32, 33),
(77, 33, 15),
(78, 34, 16),
(79, 35, 16),
(80, 35, 17),
(81, 35, 20),
(84, 35, 25),
(85, 36, 28),
(86, 36, 34),
(87, 37, 23),
(88, 37, 26),
(89, 37, 25),
(90, 37, 21),
(91, 37, 17),
(92, 38, 15),
(93, 38, 22),
(94, 39, 15),
(95, 39, 35),
(96, 40, 29),
(97, 40, 20),
(98, 40, 21),
(99, 40, 36),
(100, 41, 37),
(101, 42, 28),
(102, 42, 29),
(103, 43, 29),
(104, 44, 15),
(105, 44, 34),
(106, 44, 29),
(107, 44, 19),
(108, 45, 15),
(109, 45, 22),
(110, 45, 16),
(111, 45, 17),
(112, 46, 15),
(113, 47, 25),
(114, 48, 20),
(115, 48, 19),
(116, 49, 20),
(117, 50, 16),
(118, 50, 17),
(119, 51, 15),
(120, 51, 38),
(121, 52, 19),
(122, 53, 16),
(123, 53, 17),
(124, 53, 20),
(125, 53, 25),
(126, 54, 25),
(127, 54, 29),
(128, 55, 16),
(129, 55, 17),
(130, 55, 20),
(131, 55, 25),
(132, 56, 16),
(133, 56, 17),
(134, 56, 20),
(135, 56, 25),
(136, 57, 16),
(137, 57, 17),
(138, 57, 20),
(139, 57, 25),
(140, 58, 16),
(141, 58, 17),
(142, 58, 20),
(143, 58, 25),
(144, 59, 21),
(145, 59, 15),
(146, 59, 22),
(147, 59, 23),
(148, 60, 16),
(149, 60, 17),
(150, 60, 20),
(151, 60, 25),
(152, 61, 16),
(153, 61, 17),
(154, 61, 20),
(155, 61, 25),
(156, 62, 16),
(157, 62, 17),
(158, 62, 20),
(159, 62, 25),
(160, 63, 16),
(161, 63, 17),
(162, 63, 20),
(163, 63, 25),
(164, 64, 16),
(165, 64, 17),
(166, 64, 20),
(167, 64, 25),
(168, 65, 16),
(169, 65, 17),
(170, 65, 20),
(171, 65, 25),
(172, 66, 16),
(173, 66, 17),
(174, 66, 20),
(175, 66, 25),
(176, 67, 16),
(177, 67, 17),
(178, 67, 20),
(179, 67, 25),
(180, 68, 16),
(181, 68, 17),
(182, 68, 20),
(183, 68, 25),
(184, 36, 25),
(185, 70, 15),
(186, 70, 16),
(187, 70, 17),
(188, 70, 18),
(189, 71, 19),
(190, 71, 20),
(191, 72, 21),
(192, 72, 22),
(193, 72, 23),
(194, 72, 24),
(195, 72, 16),
(196, 72, 17),
(197, 72, 15),
(198, 73, 25),
(199, 74, 22),
(200, 74, 26),
(201, 75, 27),
(202, 76, 16),
(203, 76, 17),
(204, 76, 18),
(205, 77, 28),
(206, 78, 19),
(207, 78, 21),
(208, 79, 15),
(209, 79, 29),
(210, 80, 24),
(211, 81, 30),
(212, 81, 19),
(213, 81, 22),
(214, 81, 21),
(215, 81, 15),
(216, 81, 18),
(217, 81, 31),
(218, 82, 15),
(219, 83, 20),
(220, 83, 24),
(221, 84, 19),
(222, 84, 32),
(223, 84, 15),
(224, 84, 33),
(225, 85, 15),
(226, 86, 16),
(227, 87, 16),
(228, 87, 17),
(229, 87, 20),
(230, 87, 25),
(231, 88, 28),
(232, 88, 34),
(298, 88, 25),
(234, 89, 23),
(235, 89, 26),
(236, 89, 25),
(237, 89, 21),
(238, 89, 17),
(239, 90, 15),
(240, 90, 22),
(241, 91, 15),
(242, 91, 35),
(243, 92, 29),
(244, 92, 36),
(245, 92, 20),
(246, 92, 21),
(247, 93, 37),
(248, 94, 28),
(249, 94, 29),
(250, 95, 29),
(251, 96, 15),
(252, 96, 34),
(253, 96, 29),
(254, 96, 19),
(255, 97, 15),
(256, 97, 22),
(257, 97, 16),
(258, 97, 17),
(259, 98, 15),
(260, 99, 25),
(261, 100, 20),
(262, 100, 19),
(263, 101, 20),
(264, 102, 16),
(265, 102, 17),
(266, 103, 15),
(287, 103, 34),
(268, 104, 19),
(291, 127, 19),
(290, 127, 24),
(289, 105, 17),
(273, 106, 25),
(274, 106, 29),
(279, 111, 21),
(280, 111, 15),
(281, 111, 22),
(282, 111, 23),
(292, 135, 17),
(293, 136, 24),
(294, 136, 19),
(314, 128, 29),
(313, 128, 25),
(312, 128, 29),
(311, 128, 29),
(310, 128, 29),
(309, 8, 31),
(308, 7, 48),
(307, 137, 46),
(315, 128, 46),
(316, 119, 20),
(317, 119, 21),
(318, 119, 31),
(319, 88, 48),
(320, 136, 48),
(321, 126, 48),
(322, 73, 48),
(323, 73, 31),
(324, 70, 48),
(325, 123, 48),
(326, 86, 48),
(327, 70, 48),
(328, 70, 31),
(329, 93, 48),
(330, 123, 48),
(331, 136, 48),
(332, 119, 48),
(333, 70, 35),
(334, 70, 17),
(335, 78, 21),
(336, 81, 15),
(337, 87, 48),
(338, 96, 15),
(339, 100, 21),
(340, 144, 29),
(341, 144, 23),
(342, 144, 20),
(343, 145, 35),
(344, 105, 16),
(345, 84, 20),
(346, 145, 35),
(347, 78, 21),
(348, 81, 15),
(349, 96, 15),
(350, 117, 15),
(351, 117, 15),
(352, 117, 49),
(353, 142, 16),
(354, 135, 20),
(355, 128, 29),
(356, 128, 25),
(357, 128, 29),
(358, 128, 46),
(359, 119, 20),
(360, 119, 21),
(361, 119, 31),
(362, 88, 48),
(363, 136, 48),
(364, 126, 48),
(365, 73, 48),
(366, 73, 31),
(367, 70, 48),
(368, 123, 48),
(369, 86, 48),
(370, 70, 48),
(371, 70, 31),
(372, 93, 48),
(373, 123, 48),
(374, 136, 48),
(375, 119, 48),
(376, 70, 35),
(377, 70, 17),
(378, 78, 21),
(379, 81, 15),
(380, 87, 48),
(381, 96, 15),
(382, 100, 21),
(383, 144, 29),
(384, 144, 23),
(385, 144, 20),
(386, 145, 35),
(387, 105, 16),
(388, 84, 20),
(389, 145, 35),
(390, 78, 21),
(391, 81, 15),
(392, 96, 15),
(393, 117, 15),
(394, 117, 15),
(395, 117, 49),
(396, 142, 16),
(397, 135, 20),
(398, 128, 29),
(399, 128, 25),
(400, 128, 29),
(401, 128, 46),
(402, 119, 20),
(403, 119, 21),
(404, 119, 31),
(405, 88, 48),
(406, 136, 48),
(407, 126, 48),
(408, 73, 48),
(409, 73, 31),
(410, 70, 48),
(411, 123, 48),
(412, 86, 48),
(413, 70, 48),
(414, 70, 31),
(415, 93, 48),
(416, 123, 48),
(417, 136, 48),
(418, 119, 48),
(419, 70, 35),
(420, 70, 17),
(421, 78, 21),
(422, 81, 15),
(423, 87, 48),
(424, 96, 15),
(425, 100, 21),
(426, 144, 29),
(427, 144, 23),
(428, 144, 20),
(429, 145, 35),
(430, 105, 16),
(431, 84, 20),
(432, 145, 35),
(433, 78, 21),
(434, 81, 15),
(435, 96, 15),
(436, 117, 15),
(437, 117, 15),
(438, 117, 49),
(439, 142, 16),
(440, 135, 20);

-- --------------------------------------------------------

--
-- Structure de la table `domaineparcour`
--

CREATE TABLE `domaineparcour` (
  `ID` int(11) NOT NULL,
  `ID_parcour` int(11) NOT NULL,
  `ID_domaine` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaineparcour`
--

INSERT INTO `domaineparcour` (`ID`, `ID_parcour`, `ID_domaine`) VALUES
(4, 2, 25),
(3, 2, 29),
(8, 3, 20),
(7, 2, 46),
(9, 3, 21),
(10, 3, 31),
(11, 4, 47),
(12, 19, 48),
(13, 20, 48),
(14, 21, 48),
(15, 22, 48),
(16, 22, 31),
(17, 23, 48),
(18, 24, 48),
(19, 25, 48),
(20, 26, 48),
(21, 26, 31),
(22, 27, 48),
(23, 28, 48),
(24, 28, 31),
(25, 29, 48),
(26, 30, 48),
(27, 30, 31),
(67, 31, 35),
(68, 32, 17),
(69, 33, 21),
(80, 44, 20),
(71, 34, 15),
(33, 35, 48),
(79, 43, 16),
(72, 36, 15),
(73, 37, 25),
(78, 42, 35),
(74, 38, 21),
(75, 39, 29),
(77, 41, 20),
(76, 40, 23),
(42, 101, 35),
(43, 102, 17),
(44, 103, 21),
(45, 103, 35),
(46, 104, 15),
(47, 106, 15),
(48, 107, 25),
(49, 108, 21),
(50, 109, 29),
(51, 110, 23),
(52, 111, 20),
(53, 112, 35),
(54, 113, 16),
(55, 114, 20),
(56, 115, 35),
(57, 116, 21),
(58, 116, 35),
(59, 117, 15),
(60, 118, 15),
(61, 119, 15),
(62, 120, 15),
(63, 121, 49),
(64, 122, 16),
(65, 123, 20),
(66, 138, 20),
(70, 33, 35),
(81, 45, 35),
(82, 46, 21),
(83, 46, 35),
(84, 47, 15),
(85, 48, 15),
(86, 49, 15),
(87, 50, 15),
(88, 51, 49),
(89, 52, 16),
(90, 52, 28),
(91, 53, 20),
(92, 85, 20),
(95, 1, 35);

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaines`
--

INSERT INTO `domaines` (`ID`, `nom`, `code`) VALUES
(50, 'test 3', 'T3'),
(46, 'test', 'T1'),
(48, 'Management', 'MAN'),
(49, 'Micro-électronique', 'MICELEC'),
(15, 'Procédés énergie', 'PE'),
(16, 'Gestion Production Logistique', 'GPL'),
(17, 'Gestion Finance', 'GF'),
(18, 'Economie', 'ECO'),
(19, 'Génie électrique', 'GE'),
(20, 'Informatique', 'INFO'),
(21, 'Génie mécanique', 'MECA'),
(22, 'Génie Environnemental', 'ENV'),
(23, 'Génie Civil', 'GC'),
(24, 'Computer science', 'CS'),
(25, 'Génie des matériaux', 'MAT'),
(26, 'Construction', 'CONS'),
(27, 'Statistique', 'STAT'),
(28, 'Maths appliquée', 'MA'),
(29, 'Génie Biomédical', 'BIO'),
(30, 'Génie Chimique', 'CHIMIE'),
(31, 'Ingénierie industrielle', 'INDUS'),
(32, 'Nucléaire', 'NUCL'),
(33, 'Automobile', 'AUTO'),
(34, 'Physique', 'PHYS'),
(35, 'Aerospace', 'AERO'),
(36, 'Génie du batiment', 'BTP'),
(37, 'Design', 'DES');

-- --------------------------------------------------------

--
-- Structure de la table `mobilite`
--

CREATE TABLE `mobilite` (
  `ID` int(11) NOT NULL,
  `ID_destination` int(11) NOT NULL,
  `ID_parcour` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mobilite`
--

INSERT INTO `mobilite` (`ID`, `ID_destination`, `ID_parcour`) VALUES
(1, 128, 1),
(2, 128, 2),
(3, 119, 3),
(4, 143, 4),
(5, 119, 5),
(6, 143, 6),
(7, 94, 7),
(8, 94, 8),
(9, 113, 9),
(10, 117, 10),
(11, 123, 11),
(12, 87, 12),
(13, 87, 13),
(14, 117, 14),
(15, 102, 15),
(16, 117, 16),
(17, 126, 17),
(18, 89, 18),
(19, 88, 19),
(20, 136, 20),
(21, 126, 21),
(22, 73, 22),
(23, 70, 23),
(24, 123, 24),
(25, 86, 25),
(26, 70, 26),
(27, 93, 27),
(28, 123, 28),
(29, 136, 29),
(30, 119, 30),
(31, 70, 31),
(32, 70, 32),
(33, 78, 33),
(34, 81, 34),
(35, 87, 35),
(36, 96, 36),
(37, 100, 37),
(38, 100, 38),
(39, 144, 39),
(40, 144, 40),
(41, 144, 41),
(42, 145, 42),
(43, 105, 43),
(44, 84, 44),
(45, 145, 45),
(46, 78, 46),
(47, 81, 47),
(48, 96, 48),
(49, 117, 49),
(50, 117, 50),
(51, 117, 51),
(52, 142, 52),
(53, 142, 53),
(54, 135, 54),
(55, 135, 55),
(56, 81, 56),
(57, 81, 57),
(58, 90, 58),
(59, 104, 59),
(60, 121, 60),
(61, 79, 61),
(62, 121, 62),
(63, 72, 63),
(64, 131, 64),
(65, 130, 65),
(66, 131, 66),
(67, 72, 67),
(68, 78, 68),
(69, 72, 69),
(70, 129, 70),
(71, 143, 71),
(72, 124, 72),
(73, 129, 73),
(74, 123, 74),
(75, 129, 75),
(76, 92, 76),
(77, 96, 77),
(78, 136, 78),
(79, 123, 79),
(80, 119, 80),
(81, 135, 81),
(82, 111, 82),
(83, 108, 83),
(84, 123, 84),
(85, 135, 85),
(86, 143, 86),
(87, 131, 87),
(88, 91, 88),
(89, 119, 89),
(90, 122, 90),
(91, 78, 91);

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `promo` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `tuteur` varchar(255) NOT NULL,
  `type_mobilite` text NOT NULL,
  `type_convention` varchar(255) NOT NULL,
  `rapport` text NOT NULL,
  `bulletin` text NOT NULL,
  `remarques` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`ID`, `nom`, `prenom`, `promo`, `date_debut`, `date_fin`, `tuteur`, `type_mobilite`, `type_convention`, `rapport`, `bulletin`, `remarques`) VALUES
(1, 'HERRERO', 'Kévin', 2015, '2016-07-12', '2017-12-20', 'Olivier BONNEFOY', 'S7', 'Mines Sainté', '', '', ''),
(2, 'DROUET', 'Maxime', 2015, '2016-07-14', '2017-01-16', 'JM DEGEORGE', 'S7', 'Mines Sainté', '', '', ''),
(3, 'PICARD', 'Alexis', 2015, '2016-07-22', '2017-01-15', 'Olivier BONNEFOY', 'S7', 'Mines Sainté', '', '', ''),
(4, 'BERTAMINI', 'Hugo', 2015, '2016-07-25', '2017-01-22', 'Michel DARRIEULAT', 'S7', 'Mines Sainté', '', '', ''),
(5, 'LE NAIL', 'Caroline', 2015, '2016-07-26', '2017-01-16', 'Eric PIATYSEK', 'S7', 'Mines Sainté', '', '', ''),
(6, 'PONCELET', 'Victorine', 2015, '2016-07-26', '2017-01-15', 'Thierry GARAIX', 'S7', 'Mines Sainté', '', '', ''),
(7, 'LE TIEC', 'Arnaud', 2015, '2016-08-12', '2017-01-30', 'Pierre BADEL', 'S7', 'Mines Sainté', '', '', ''),
(8, 'HERROU', 'Hugo', 2015, '2016-08-15', '2017-01-30', 'Nicolas DURRANDE', 'S7', 'Mines Sainté', '', '', ''),
(9, 'LAFAYETTE', 'Maïlys', 2015, '2016-08-15', '2017-01-16', 'Michel DARRIEULAT', 'S7', 'Mines Sainté', '', '', ''),
(10, 'JEUDI', 'Romane', 2015, '2016-08-18', '2017-01-18', 'François VALDIVIESO', 'S7', 'Mines Sainté', '', '', ''),
(11, 'DURAND', 'Thibault', 2015, '2016-08-20', '2017-01-01', 'WS Han', 'S7', 'Mines Sainté', '', '', ''),
(12, 'BONTAZ', 'Théo', 2015, '2016-08-22', '2016-12-22', 'JM DEGEORGE', 'S7', 'Mines Sainté', '', '', ''),
(13, 'FRAYSSINET', 'Romain', 2015, '2016-08-22', '2016-12-22', 'JM DEGEORGE', 'S7', 'Mines Sainté', '', '', ''),
(14, 'MARTIN', 'Simon', 2015, '2016-08-22', '2017-01-12', 'François VALDIVIESO', 'S7', 'Mines Sainté', '', '', ''),
(15, 'RIGOLLET', 'Antoine', 2015, '2016-08-22', '2017-02-06', 'Sandrine BERGER-DOUCE', 'S7', 'Mines Sainté', '', '', ''),
(16, 'TOESCA', 'Romain', 2015, '2016-08-22', '2017-01-01', 'Mihaela MATHIEU', 'S7', 'Mines Sainté', '', '', ''),
(17, 'BRANDEL', 'Augustin', 2015, '2016-08-28', '2017-02-06', 'Laurent PERIER-CAMBY', 'S7', 'Mines Sainté', '', '', ''),
(18, 'MERMOUD', 'Steve', 2015, '2016-08-29', '2017-01-27', 'Sylvain DRAPIER', 'S7', 'Mines Sainté', '', '', ''),
(19, 'CHAN', 'Edmond', 2015, '2016-08-30', '2017-01-16', 'Olivier BONNEFOY', 'S7', 'Mines Sainté', '', '', ''),
(20, 'BOUILLER', 'Valentin', 2015, '2016-09-01', '2017-01-23', 'Laurent NAVARRO', 'S7', 'Mines Sainté', '', '', ''),
(21, 'BOUTHEMY', 'Marin', 2015, '2016-09-01', '2017-03-01', 'Xavier BAY', 'S7', 'Mines Sainté', '', '', ''),
(22, 'CAILLE', 'Hélène', 2015, '2016-09-01', '2017-03-06', 'Patrick GANSTER', 'S7', 'Mines Sainté', '', '', ''),
(23, 'DAVID', 'Maximilien', 2015, '2016-09-01', '2017-03-06', 'Sandrine BERGER-DOUCE', 'S7', 'Mines Sainté', '', '', ''),
(24, 'DHENAIN', 'Louise', 2015, '2016-09-01', '2016-12-15', 'WS Han', 'S7', 'Mines Sainté', '', '', ''),
(25, 'FERRACCI', 'Julie', 2015, '2016-09-01', '2017-02-07', 'Mihaela MATHIEU', 'S7', 'Mines Sainté', '', '', ''),
(26, 'GARTI', 'Stéphane', 2015, '2016-09-01', '2017-03-06', 'JM DEGEORGE', 'S7', 'Mines Sainté', '', '', ''),
(27, 'MILIAT', 'Maïlis', 2015, '2016-09-01', '2017-03-01', 'David DELAFOSSE', 'S7', 'Mines Sainté', '', '', ''),
(28, 'NICOLAS', 'Clément', 2015, '2016-09-01', '2017-01-01', 'Michel DARRIEULAT', 'S7', 'Mines Sainté', '', '', ''),
(29, 'PARET', 'Benjamin', 2015, '2016-09-01', '2017-01-23', 'Laurent NAVARRO', 'S7', 'Mines Sainté', '', '', ''),
(30, 'ROESLER', 'Anthony', 2015, '2016-09-01', '2017-01-01', 'Cédric BOSCH', 'S7', 'Mines Sainté', '', '', ''),
(31, 'ANDRÉ', 'Séverine', 2014, '2016-09-01', '2017-06-01', 'O. Bonnefoy', 'S10', '', '', '', ''),
(32, 'CUSSAC', 'Paul', 2014, '2016-09-01', '2017-06-01', 'O. Bonnefoy', 'S10', '', '', '', ''),
(33, 'PAILLOT', 'Guillaume', 2014, '2016-09-01', '2017-06-01', 'H. Klöcker', 'S10', '', '', '', ''),
(34, 'SALANON', 'Florian', 2014, '2016-09-01', '2018-01-01', 'M. Bruchon', 'DD', '', '', '', ''),
(35, 'GRANIER (ICM2013)', 'William', 2014, '2016-09-01', '2017-01-01', 'J.M. Degeorge', 'S10', '', '', '', ''),
(36, 'TOLLU', 'Paul- Octave', 2014, '2016-09-01', '2017-06-01', 'N. Gondran', 'S10', '', '', '', ''),
(37, 'BÉLIS', 'Caroline', 2014, '2016-09-01', '2018-01-01', 'A. Borbely', 'DD', '', '', '', ''),
(38, 'DO KHAC VERHERTBRUGGEN', 'Kim long', 2014, '2016-09-01', '2018-01-01', 'A.\nFraczkiewicz', 'DD', '', '', '', ''),
(39, 'COLLIN', 'Marie', 2014, '2016-09-01', '2017-06-01', 'P. Badel', 'DD', '', '', '', ''),
(40, 'de REYNAL de SAINT-MICHEL', 'Louis- Henry', 2014, '2016-09-01', '2017-06-01', 'M. Darrieulat', 'DD', '', '', '', ''),
(41, 'DUPONT', 'Robin', 2014, '2016-09-01', '2017-06-01', 'X. Serpaggi', 'DD', '', '', '', ''),
(42, 'MALLINGER', 'Hugo', 2014, '2016-09-01', '2017-06-01', 'S. Drapier', 'S10', '', '', '', ''),
(43, 'MARTIN', 'Eloïse', 2014, '2016-09-01', '2017-06-01', 'D. Goeuriot', 'DD', '', '', '', ''),
(44, 'MORVAN', 'Mario', 2014, '2016-09-01', '2017-06-01', 'F. Gruy', 'DD', '', '', '', ''),
(45, 'OUVRARD', 'Nathan', 2014, '2016-09-01', '2017-06-01', 'S. Drapier', 'S10', '', '', '', ''),
(46, 'PAILLOT', 'Guillaume', 2014, '2016-09-01', '2017-06-01', 'H. KLOCKER', 'S10', '', '', '', ''),
(47, 'SALANON', 'Florian', 2014, '2016-09-01', '2018-01-01', 'M. BRUCHON', 'DD', '', '', '', ''),
(48, 'TOLLU', 'Paul- Octave', 2014, '2016-09-01', '2017-06-01', 'N. GONDRAN', 'S10', '', '', '', ''),
(49, 'BOUAICHI', 'Sanae', 2014, '2016-09-01', '2018-01-01', 'A. Cameirao', 'DD', '', '', '', ''),
(50, 'DJAZOULI', 'Mohamed', 2014, '2016-09-01', '2018-01-01', 'B. Bouillot', 'DD', '', '', '', ''),
(51, 'MUCHEMBLED', 'Audrey', 2014, '2016-09-01', '2018-01-01', 'Ph. Breuil', 'DD', '', '', '', ''),
(52, 'NGUYEN', 'My-An', 2014, '2016-09-01', '2017-06-01', 'N. Durrande', 'S10', '', '', '', ''),
(53, 'SOIGNON', 'Quentin', 2014, '2016-09-01', '2017-06-01', 'X. Serpaggi', 'S10', '', '', '', ''),
(54, 'MATOU', 'Anton', 2015, '2016-09-03', '2016-02-05', 'Nadine DUBRUC', 'S7', 'Mines Sainté', '', '', ''),
(55, 'MORAVIA', 'Anaïs', 2015, '2016-09-03', '2017-02-03', 'Stéphane AVRIL', 'S7', 'Mines Sainté', '', '', ''),
(56, 'LAMICQ', 'Enora', 2015, '2016-09-05', '2017-02-01', 'Patrick GANSTER', 'S7', 'Mines Sainté', '', '', ''),
(57, 'LAVENIR', 'Lucas', 2015, '2016-09-05', '2017-01-30', 'Philippe BREUIL', 'S7', 'Mines Sainté', '', '', ''),
(58, 'ANADON', 'Guillaume', 2015, '2016-09-06', '2017-01-22', 'Ana CAMEIRAO', 'S7', 'Mines Sainté', '', '', ''),
(59, 'GARDERES', 'Guillaume', 2015, '2016-09-10', '2017-01-13', 'Xavier SERPAGGI', 'S7', 'Mines Sainté', '', '', ''),
(60, 'CAMUS', 'Théophile', 2015, '2016-09-12', '2017-01-23', 'Andras BORBELY', 'S7', 'Mines Sainté', '', '', ''),
(61, 'DUCLOS', 'Camille', 2015, '2016-09-12', '2017-02-06', 'Julien BRUCHON', 'S7', 'Mines Sainté', '', '', ''),
(62, 'NICOLAS', 'Nans', 2015, '2016-09-12', '2017-01-30', 'Flavien BALBO', 'S7', 'Mines Sainté', '', '', ''),
(63, 'DUVAL', 'Samuel', 2015, '2016-09-15', '2017-03-06', 'Jonathan VILLOT', 'S7', 'Mines Sainté', '', '', ''),
(64, 'MONDESIR-ABOUT', 'Victoria', 2015, '2016-09-25', '2017-03-03', 'Valérie FOREST', 'S7', 'Mines Sainté', '', '', ''),
(65, 'FOUGEROUSE', 'Claire', 2015, '2016-09-28', '2017-03-01', 'Patrick GANSTER', 'S7', 'Mines Sainté', '', '', ''),
(66, 'BONNET', 'Bénédicte', 2015, '2016-10-01', '2017-03-01', 'François VALDIVIESO', 'S7', 'Mines Sainté', '', '', ''),
(67, 'CHERPIN', 'Chloé', 2015, '2016-10-01', '2017-03-01', 'Patrick GANSTER', 'S7', 'Mines Sainté', '', '', ''),
(68, 'FRAISSE', 'Arthur', 2015, '2016-10-01', '2017-03-01', 'Nicolas MOULIN', 'S7', 'Mines Sainté', '', '', ''),
(69, 'GUTH', 'Victor', 2015, '2016-10-01', '2017-03-31', 'Valérie LAFOREST', 'S7', 'Mines Sainté', '', '', ''),
(70, 'HANNECART', 'Céline', 2015, '2016-10-03', '2017-03-04', 'WS Han', 'S7', 'Mines Sainté', '', '', ''),
(71, 'ALLARD', 'Benjamin', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(72, 'BABILLOT', 'Laurine', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(73, 'D\'ALETTO', 'Benjamin', 2014, '2017-02-01', '2018-01-01', '', 'DD', '', '', '', ''),
(74, 'DELAUNAY', 'Arnaud', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(75, 'DOL', 'Nicolas', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(76, 'DUBREUIL', 'Mélodie', 2014, '2017-02-01', '2017-07-01', '', 'S10', 'Erasmus', '', '', ''),
(77, 'EYDAN', 'Bastien', 2014, '2017-02-01', '2017-07-01', '', 'S10', 'Erasmus', '', '', ''),
(78, 'LANDAS', 'Aurélien', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(79, 'LARQUETOUX', 'Marion', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(80, 'LEFORT', 'Vincent', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(81, 'LEMEILLE', 'François', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(82, 'LEPAGE', 'Adrien', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(83, 'MERLE', 'Florence', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(84, 'NEROME', 'Nicolas Max', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(85, 'RAZBAN', 'Keivan', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(86, 'TRUTT', 'Léna', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(87, 'UNG', 'Eric', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(88, 'VEYRON', 'Mathilde', 2014, '2017-02-01', '2017-07-01', '', 'S10', 'Erasmus', '', '', ''),
(89, 'VIEILLARD', 'Antoine', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(90, 'VINCENT', 'Axel', 2014, '2017-02-01', '2017-07-01', '', 'S10', '', '', '', ''),
(91, 'JACQUEMIER', 'Pauline', 2015, '2016-10-01', '2017-03-06', 'Guillaume KERMOUCHE', 'S7', 'Mines Sainté', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `continent` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`ID`, `nom`, `continent`) VALUES
(1, 'Grande Bretagne', 'Europe'),
(2, 'Brésil', 'Amérique du sud'),
(3, 'Espagne', 'Europe'),
(4, 'États Unis', 'Amérique du Nord'),
(6, 'France', 'Europe'),
(7, 'Allemagne', 'Europe'),
(8, 'Autriche', 'Europe'),
(9, 'Finlande', 'Europe'),
(10, 'Hongrie', 'Europe'),
(11, 'Irlande', 'Europe'),
(12, 'Italie', 'Europe'),
(13, 'Norvège', 'Europe'),
(14, 'Pays-Bas', 'Europe'),
(15, 'Pologne', 'Europe'),
(16, 'Portugal', 'Europe'),
(17, 'Suède', 'Europe'),
(18, 'République tchèque', 'Europe'),
(19, 'Royaume-Uni', 'Europe'),
(20, 'Turquie', 'Europe'),
(21, 'Argentine', 'Amérique du sud'),
(22, 'Canada', 'Amérique du Nord'),
(23, 'Chili', 'Amérique du sud'),
(24, 'Chine', 'Asie'),
(25, 'Colombie', 'Amérique du sud'),
(26, 'Corée', 'Asie'),
(27, 'Hong Kong', 'Asie'),
(28, 'Inde', 'Asie'),
(29, 'Japon', 'Asie'),
(30, 'Mexique', 'Amérique du sud'),
(31, 'Russie', 'Europe'),
(32, 'Taïwan', 'Asie'),
(33, 'Test', 'Océanie');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ID_pays` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`ID`, `nom`, `ID_pays`) VALUES
(1, 'Londres', 1),
(68, 'Ottawa', 22),
(3, 'Madrid', 3),
(4, 'Rio de Janeiro', 2),
(5, 'Cambridge', 4),
(67, 'Test 2', 7),
(66, 'Test', 33),
(8, 'Berlin', 7),
(10, 'Stuttgart', 7),
(11, 'Dresden', 7),
(12, 'Hamburg', 7),
(13, 'Aachen', 7),
(14, 'Darmstadt', 7),
(15, 'Dortmund', 7),
(16, 'Karlsruhe', 7),
(17, 'Kaiserlautern', 7),
(18, 'München', 7),
(19, 'Wien', 8),
(20, 'Barcelona', 3),
(21, 'Santiago de Compostela ', 3),
(22, 'Sevilla', 3),
(23, 'Pori', 9),
(24, 'Joensuu', 9),
(25, 'Budapest', 10),
(26, 'Dublin', 11),
(27, 'Torino', 12),
(28, 'Bergamo', 12),
(29, 'Milano', 12),
(30, 'Oslo', 13),
(31, 'Eindhoven', 14),
(32, 'Twente', 14),
(33, ' Gliwice/ Katowice    ', 15),
(34, 'Krakow', 15),
(35, 'Warsaw', 15),
(36, 'Porto', 16),
(37, 'Karlstad', 17),
(38, 'Prague', 18),
(39, 'Edinburgh', 19),
(40, 'Cranfield', 19),
(41, 'Istanbul', 20),
(42, 'Buenos Aires', 21),
(43, 'Cordoba', 21),
(44, 'Rosario', 21),
(45, ' São Paulo  ', 2),
(46, 'Belo Horizonte', 2),
(47, 'Goiana', 2),
(48, 'Campinas', 2),
(49, 'Montréal', 22),
(50, 'Santiago', 23),
(51, 'Santiago  de Chile', 23),
(52, 'Shanghai ', 24),
(53, 'Bogotá', 25),
(54, 'Seoul', 26),
(55, 'Daejeon', 26),
(56, 'Pohang', 26),
(57, 'Hong Kong', 27),
(58, 'Bombay', 28),
(59, 'Kitakyushu', 29),
(60, 'Sendaï', 29),
(61, 'Kumamoto', 29),
(62, 'Mexico', 30),
(63, 'Moscou', 31),
(64, 'Hsinchu', 32),
(65, 'Taipei', 32);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `domainedestination`
--
ALTER TABLE `domainedestination`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `domaineparcour`
--
ALTER TABLE `domaineparcour`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `mobilite`
--
ALTER TABLE `mobilite`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT pour la table `domainedestination`
--
ALTER TABLE `domainedestination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
--
-- AUTO_INCREMENT pour la table `domaineparcour`
--
ALTER TABLE `domaineparcour`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `mobilite`
--
ALTER TABLE `mobilite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
