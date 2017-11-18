-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 09 Novembre 2017 à 09:03
-- Version du serveur :  5.6.38
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mobinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE IF NOT EXISTS `contenu` (
  `ID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`ID`, `Description`, `titre`, `contenu`) VALUES
(1, '', 'Pourquoi partir ?', 'Tout élève ingénieur ICM doit au cours de sa formation effectuer une période de 12 semaines à l’étranger, que ce soit pour un échange académique ou un stage.<br>\n<br>\nCette expérience est l’occasion d’acquérir des compétences diverses, en accord avec le contexte d’internationalisation actuel du monde du travail, mais aussi de s’ouvrir à d’autres cultures. De plus, partir étudier hors des sentiers battus des universités purement anglophones pourra s’avérer non seulement très riche en termes d’expérience personnelle mais également valorisable auprès des recruteurs.<br>\n<br> \nPour réaliser ce <strong><u>Quitus International</u></strong> (la période de 12 semaines à effectuer obligatoirement à l’étranger au cours du cycle ICM), plusieurs options s’offrent à toi comme tu pourras le découvrir dans la section suivante.<br>\n<br>\nAttention cependant, une mobilité requiert un travail de préparation conséquent. Si tu souhaites partir, il faudra donc <u>prendre le temps de te renseigner</u> dans les moindres détails pour que ton départ se fasse dans les meilleures conditions.<br>'),
(2, 'S7 intro', 'Au S7', 'C’est la principale fenêtre de départ à l’étranger choisie par les étudiants de l’école. C’est aussi le meilleur moyen de valider ton quitus international.<br>\n<br> \nAu cours de ce semestre, les crédits validés sur le campus partenaire se substituent à ceux proposés par l’école. Aussi, après une année consacrée à l’acquisition du socle de connaissances communes, cette mobilité t’offre la possibilité de diversifier ton parcours dès le début de la deuxième année.<br> \nDe plus, l’école dispose de partenariats sur tous les continents.</br>\n<br> \nConcernant les dates de départ et de retour, elles fluctuent selon les années et les campus : certains partent dès le mois de juillet suivant la fin de la première année, tandis que d’autres ne reviennent qu’en mars de la deuxième année.'),
(3, '', 'En stage 2A', 'En dehors des mobilités classiques en transfert de crédit, une autre modalité de validation du quitus international est le stage à l’étranger, en entreprise ou au sein d’une équipe de recherche universitaire. Vous pouvez vous appuyer sur le vaste réseau de partenaires internationaux de Mines Saint-Etienne et de l’Institut Mines Telecom pour rechercher un stage dans un laboratoire de recherche sur un campus à l’étranger. Contrairement aux échanges étudiants en transfert de crédit, il n’y a pas de places réservées pour les élèves stagiaires chez nos partenaires. Il appartient donc à chacun de repérer le(s) campus et les équipes de recherches et de faire une véritable démarche de candidature. L’appui du service des stages et d’enseignants-chercheurs impliqués dans des collaborations avec les campus ciblés seront un plus pour mener à bien ce type de recherche. Comme pour tout stage, une fois l’équipe d’accueil et le sujet trouvé, il faudra trouver un tuteur école et remplir les formalités administratives requises par le service des stages (fiche d’identification, convention). Un stage non-rémunéré est éligible à une bourse EXPLORA’SUP, tout comme une mobilité académique.'),
(4, '', 'Au S10', 'Quelques départs en transfert de crédits sont autorisés au S10. Ces départs tardifs ont néanmoins quelques conséquences. Ils impliquent tout d’abord une prolongation de scolarité avec réinscription payante, sans obtention d’un deuxième diplôme. C’est la raison pour laquelle l’école n’encourage pas ce type de départ. La sélection des dossiers s’effectue courant mai en S8 et tient compte de plusieurs paramètres : limitation du nombre de départs à une douzaine, justification de la nécessité d’un tel projet par l’étudiant,...'),
(5, '', 'Départ 3A en France (transferts de crédits) :', 'Quelques places sont ouvertes chaque année dans des établissements partenaires et permettent de substituer sa 3ème année ICM avec une autre formation. Les candidats sont présélectionnés par Mines Saint-Etienne, mais c’est l’établissement d’accueil qui reste décisionnaire. Tous les candidats doivent défendre leur projet d’étude, et justifier leur décision de suivre une formation différente de celle proposée par l’école. Il est également possible de présenter un projet de candidature dans un établissement non partenaire, mais c’est à l’élève de mener les démarches administratives avec l’établissement concerné. Attention les mobilités en France ne peuvent bien évidement pas permettre de valider le quitus'),
(6, 'DD intro', 'En double diplome', 'Mines Saint-Etienne dispose aujourd’hui de nombreux accords avec des établissements partenaires en France et à l’étranger dans le cadre de doubles diplômes. Chacun de ces accords prévoit des modalités spécifiques, mais respecte plus ou moins les mêmes prérogatives.'),
(7, '', 'TFE', 'Le travail de fin d’étude (TFE) est le stage de 6 mois qui conclut le cycle ICM. Tout comme le stage 2A, c’est un moyen de valider son quitus international sans passer par le système des transferts de crédit classique associé majoritairement au S7. Les informations sont donc identiques à celles dispensées dans la rubrique Stage 2A.'),
(8, 'S7 partie 1', 'Partir au S7', 'C’est la principale fenêtre de départ à l’étranger choisie par les étudiants de l’école. C’est aussi le meilleur moyen de valider ton quitus international. Au cours de ce semestre, les crédits validés sur le campus partenaire se substituent à ceux proposés par l’école. Aussi, après une année consacrée à l’acquisition du socle de connaissances communes, cette mobilité t’offre la possibilité de diversifier ton parcours dès le début de la deuxième année. De plus, l’école dispose de partenariats sur tous les continents.<br>\n<br>\nConcernant les dates de départ et de retour, elles fluctuent selon les années et les campus : certains partent dès le mois de juillet suivant la fin de la première année, tandis que d’autres ne reviennent qu’en mars de la deuxième année.<br>\n<br> \nAu sujet des cours, les campus partenaires n’offrent pas toujours l’intégralité de leur catalogue aux étudiants étrangers. De plus, les cours suivis par les étudiants doivent être en accord avec le projet de formation dispensé par l’école des Mines de Saint-Etienne. Sous ces conditions, tu peux choisir des cours de niveau fin de 1er cycle (licence/undergraduate/Bsc) ou début de 2ème cycle (master/graduate ou postgraduate).<br> Attention à prendre en considération les spécificités de chaque pays dans l’organisation du cursus ingénieur. Pour ce qui est des domaines d’étude, tu dois impérativement sélectionner des cours en ingénierie, sciences, management ou sciences sociales. Les cours de langue étrangère ne sont pas obligatoire. En revanche, certaines universités étrangères ont des exigences en matière de compétence linguistiques pour que ton dossier soit accepté. N’hésites pas à te renseigner sur le sujet. Tu peux également choisir de suivre d’autres cours pour ta culture personnelle mais les crédits correspondant ne seront pas pris en compte dans le transfert de crédits.<br>\n<br>\nEnfin, un dernier point important concernant le S7 : le tuteur pédagogique. Ton projet d’étude à l’étranger doit être validé par un enseignant-chercheur de l’école qui vérifie si tu disposes des prérequis pour suivre les cours sélectionnés.'),
(9, 'image du calendrier', 'Calendrier récapitulatif :', 'calendrier_S7.png'),
(10, 'S7 partie 2', 'Questions récurrentes :', 'Qui est éligible ? <br>\nToute candidature déposée dans les règles et dans les temps est éligible, sauf problème majeur de comportement ou d’engagement dans les études (dont absentéisme). Quelques partenariats exigent en plus un seuil GPA minimal. <br>\n <br>\nCombien d’élèves par destination ? <br>\n3 élèves maximum par campus partenaire pour une répartition optimale sur les destinations, parfois moins quand la convention le prévoit. Le nombre de places ouvertes sur chaque campus est précisé au moment de l’appel à candidatures.<br>\n <br>\nComment s’effectue la répartition des candidatures sur les destinations ? <br>\nElle s’effectue de manière à maximiser le nombre de départs en satisfaisant autant que faire se peut les vœux classés en premier.<br>\n <br>\nPeut-on demander à défendre son dossier ? <br>\nLes élèves n’ayant pas obtenu leur vœu 1 peuvent demander à être mis en concurrence lors d’une audition. Choisir de se soumettre à cette procédure implique de se désister de tous ses autres vœux. Après les auditions, les candidats non retenus peuvent reporter leur choix sur une autre destination non saturée si le jury estime que le projet présenté était cohérent et argumenté.<br>\n <br>\nQue se passe-t-il après cette phase de sélection ? <br>\nUne liste définitive des partants par destinations est adressée aux élèves début mars. Ceux-ci sont alors considérés comme définitivement engagés au départ. L’école contacte les campus partenaires et gère le premier contact avec les élèves sélectionnés (phase de « nomination »). Ceux-ci peuvent ensuite finaliser leurs démarches de candidature auprès du partenaire avec l’aide du Pôle international de la DFE. <br>\n <br>\nEst-on certain de partir une fois la phase de sélection interne passée ? <br>\nDans 98% des cas oui, car les places sont en principe réservées chez nos partenaires. Un élève défaillant (comportement, risque de redoublement) peut cependant se voir contraint de renoncer à son départ par le Comité des Etudes de fin de semestre. Par ailleurs, l’école n’est pas responsable d’éventuels manquements d’un élève au moment du montage de son dossier. Il appartient à chaque partant de suivre les consignes données par l’école et le campus d’accueil et de fournir tout document requis dans les délais. En tout état de cause, seule la lettre d’acceptation définitive envoyée par le campus d’accueil garantit un départ effectif.<br>\n <br>\nCombien de crédits faut-il valider sur le campus d’accueil pendant le S7 ? <br>\nIl faut valider au minimum l’équivalent de ce qui aurait été validé à l’école sur la même période, déduction faite des 3 crédits de langue vivante, qui sont octroyés d’office. Il est recommandé de prendre un peu de marge au moment du choix des cours, pour sécuriser un nombre minimal de crédits validés au retour. En cas de crédits manquants, le comité des études statue sur les conditions de validation du semestre de mobilité et décide d’une éventuelle prolongation de scolarité ICM. Vous pouvez choisir un mix de plusieurs disciplines d’ingénierie, des sciences, du management et des sciences sociales, ou vous concentrer sur une discipline principale en équivalence de la Majeure 1. Vous pouvez aussi vous faire plaisir avec des cours déconnectés de l’ingénierie, mais l’école ne validera pas vos crédits de sports, d’art, ni de langues vivantes. Ces éventuels crédits d’ouverture viennent donc en surplus de vos crédits obligatoires. Votre plan d’étude (pour Erasmus, il s’agit du contrat d’études officiel « Erasmus learning agreement) sera obligatoirement validé par un tuteur pédagogique avant votre départ de l’école.<br>'),
(11, 'DD partie 1', 'Partir en Double Diplôme', 'Mines Saint-Etienne dispose aujourd’hui de nombreux accords avec des établissements partenaires en France et à l’étranger dans le cadre de doubles diplômes. Chacun de ces accords prévoit des modalités spécifiques, mais respecte plus ou moins les prérogatives suivantes.<br>\n <br>\nChaque établissement partenaire applique une forte sélectivité basée sur des critères d’excellence académique. Ensuite, la durée des études est en moyenne prolongée d’un an.<br>\nEn ce qui concerne le projet de fin d’études, c’est l’université d’accueil qui en définit le cahier des charges (qui peut être très différent de celui de Mines Saint-Etienne).<br>\nLes conventions internationales prévoient une dispense de droits de scolarité sur la campus d’accueil (en dehors du Royaume-Uni). Ces droits de scolarité sont réglés aux Mines de Saint-Etienne. Ce n’est en revanche pas toujours le cas des partenaires français.<br>\nA titre d’information, Mines Saint-Etienne dispose aujourd’hui de 14 conventions de double diplôme à l’étranger :<br>\nEn Europe : ETSI Industriales UP Madrid/ Politecnico di Torino/ Cranfield University/AGH University Krakow<br>\nHors Europe : Seoul National University/Korea Advanced Insitute of Technology/Kyushu Institute of Technology/UniAndes Bogota/PUC Chile/Universidad Buenos Aires/Escola Politecnica da USP/ Escola Politecnica da UFRJ/Ecole Polytechnique de Montréal/Ecole de Technologie Supérieure Montréal<br>\nPar ailleurs, si tu souhaites partir en DD, il te faudra avoir de bons résultats, et ce depuis ton intégration dans toutes les disciplines (GPA minimum de 3). Cela implique également une grande motivation, surtout si tu décides d’effectuer ce DD dans une université étrangère car tu seras nécessairement expatrié pendant plusieurs mois, et tu devras effectuer ton stage de fin d’études à l’étranger. Enfin, le coût d’une scolarité internationale prolongée n’est pas à négliger.<br>'),
(12, 'image du calendrier DD', 'Calendrier récapitulatif :', 'calendrier_DD.png'),
(13, 'DD partie 2', 'Procédure de sélection pour les projets de double-diplôme (France et international) :', 'Rappel : <br>\nUn double-diplôme n’est pas une mobilité académique comme les autres. Il engage l’étudiant sur la durée (de 0 à 3 semestres de prolongation d’études, soit, pour certains DD internationaux, deux années d’expatriation). L’étudiant doit se plier aux contraintes de validation du diplôme de l’établissement partenaire (dans de nombreux cas par exemple, obligation d’effectuer le projet de fin d’études sur le campus d’accueil, au sein d’une équipe de recherche locale).<br> \n <br>\nDispositif de sélection : <br>\nCourant S7, le candidat remet à la DFE-Mobilité académique une présentation argumentée de son projet, assortie de toutes les pièces complémentaires qu’il jugera utile. Il est possible de cibler jusqu’à 3 destinations, classées par ordre de préférence. Le dépôt du dossier est l’occasion d’un entretien de motivation et d’une vérification de l’éligibilité du candidat. Les dossiers de demande de départs en DD sont examinés par un jury de sélection. <br>\n <br>\nEligibilité pour dépôt de candidature de DD : <br>\nLe jury rend une décision motivée prenant en compte les résultats académiques, le parcours individuel et la progression de chaque candidat, mais un GPA minimum de 3 sur deux ou trois semestres de cursus ICM est requis pour franchir cette étape.<br>\n <br>\nSélection par destinations : <br>\nLes campus partenaires acceptent 2 à 3 dossiers de candidature par année. Certains d’entre eux fixent un seuil minimal d’admissibilité en termes de GPA. En cas de candidatures éligibles trop nombreuses, la répartition des candidatures sur les destinations sera effectuée sur critères purement académiques. Des auditions pourront être organisées pour départager les candidats dont les GPA sont équivalents.<br>'),
(14, 'Documents', 'Documents :', 'Ré-inscription à l’EMSE : <br>\nLa réinscription de l’élève se fait auprès des services de la DEF avant le départ en mobilité. Il est faut aussi que l’élève renouvelle ses éventuelles demandes de bourses (qui peuvent être maintenues durant la mobilité).<br>\n <br>\nLes Documents d’Identité et Visas : <br>\nHors UE :<br>\nVérifier les documents requis pour l’entrée et le séjour dans le pays. Information obtenue auprès de l’université d’accueil ou de l’ambassade de ce pays en France.<br>\nLa lettre d’acceptation par l’université peut être nécessaire pour entamer la demande de Visa.<br>\nDans la plupart des pays, le passeport doit être valide plusieurs mois après la date de retour. <br>\nL’obtention d’un passeport nouveau passeport demande du temps, il faut s’y prendre en avance.<br>\nCertaines universités d’accueil proposent de s’occuper de ta demande de Visa moyennant l’avance des frais administratifs.<br>\n <br>\nDans l’UE : <br>\nUne carte d’identité Française est suffisante pour voyager.<br>\nEn tant que non-ressortissants de l’UE, tu dois obtenir un Visa pour le pays de destination. Il faudra aussi que tu anticipe le renouvellement de ton titre de séjour en France.<br>'),
(15, 'Bourses', 'Bourses :', 'Erasmus (Départ dans un pays de l’union européenne ou pays associé au programme Erasmus  ) : <br>\nMines Saint-Etienne est signataire de la Charte Erasmus. A ce titre, les étudiants de l’école qui réalisent un séjour dans une autre université signataire s’acquittent des droits d’inscription uniquement dans leur établissement d’origine. Cette exemption de droits d’inscription est assortie d’une bourse de mobilité Erasmus correspondant à la durée du séjour. Le programme Erasmus rentre dans un cadre de mobilité bien spécifique. Le nouveau programme Erasmus   2014-2021 visant à renforcer la coopération et l’identité européenne, des informations spécifiques sont à renseigner afin d’obtenir la bourse. Ces informations sont résumées ci-dessous :    <br>   \n-Un kit administratif de mobilité à compléter avant le départ, comprenant entre autres documents un contrat d’études (learning agreement).\n- Des tests de langue en ligne avant et après le séjour pour vérifier les progrès accomplis <br>\n-Une évaluation par chaque partant de la qualité de sa mobilité (préparation, vécu, acquis…) par questionnaire en ligne. <br>\nLes bourses sont d’un montant de 150 à 200 € mensuel selon les pays et à cumuler éventuellement avec une bourse régionale EXPLORA’SUP (en fonction de la dotation annuelle de l’école). Les stages effectués au sein d’un laboratoire de recherche universitaire sont également éligibles pour cette bourse de mobilité Erasmus  dite « d’études ». Tout élève-ingénieur peut prétendre à un financement Erasmus et EXPLORA’SUP, sans condition de ressources ou de nationalité. Chacun est éligible pour une seule bourse de mobilité d’études Erasmus au cours de son cursus. Si la dotation régionale annuelle le permet, un élève peut bénéficier d’une deuxième bourse EXPLORA’SUP au cours de sa scolarité, mais les primo-partants sont prioritaires.<br>\n <br>\nVotre contact Erasmus à Mines Saint-Etienne: Marta TOR, tor@emse.fr bureau E 314 <br>\nPlus d’infos : http://www.generation-erasmus.fr/<br>\n <br>\n <br>\nPartenariats hors Europe : <br>\nMines Saint-Etienne, adossée à l’Institut Mines Télécom, s’appuie sur un réseau international de 110 partenaires universitaires d’excellence. Les opportunités de mobilité sont essentiellement réparties en Asie, Amérique du Nord et Amérique Latine. Dans la plupart des cas, les conventions d’échange d’étudiants permettent aux ICM d’accéder à l’ensemble des programmes dispensés par la faculté d’ingénierie du partenaire, avec exemption totale de droits d’inscription. Deux à trois places par campus partenaire sont ouvertes chaque année.<br>\n <br>\nBourses EXPLORA’SUP : Les bourses EXPLORA’SUP sont sous la forme de forfaits calculés sur la base de 95€ par semaine   bonification de 530€ pour les élèves boursiers sur critères sociaux ou porteurs de handicap. Les montants attribués sont tributaires de la dotation régionale annuelle et du nombre de projets à financer. Réajustés chaque année, ils ne couvrent en général pas la durée réelle du séjour. Il est en théorie possible d’obtenir deux financements EXPLORA’SUP au cours de sa formation, mais les primo-partants restent prioritaires. Tout élève-ingénieur régulièrement inscrit peut prétendre à un financement EXPLORA’SUP, sans condition de ressources ou de nationalité. Les ressortissants internationaux ne pourront cependant pas obtenir de financement pour une mobilité dans leur pays d’origine.<br>\nDe plus les bourses de mobilité régionale EXPLORA’SUP assurent le relais d’Erasmus pour les destinations en dehors de l’Europe. D’autres financements peuvent venir en complément selon la destination : pour les mobilités au Brésil, en Argentine, au Mexique les programmes intergouvernementaux BRAFITEC, ARFITEC et MEXFITEC peuvent vous permettre d’obtenir des bourses conséquentes (de 1.000 à 1.500€), cumulables avec la bourse EXPLORA’SUP.<br>\n <br>\nContacts FITEC: <br>\nBrésil: Prof Ana CAMEIRAO, cameirao@emse.fr <br>\nArgentine: Prof Jérôme MOLIMARD, molimard@emse.fr <br>\nMexique: Prof Mihaela MATHIEU, mathieu@emse.fr <br>\n <br>\nAutres sources de financement : <br>\nCertaines années, la Fondation I3M (anciens élèves de l’Ecole des Mines) finance des projets de mobilité internationale ciblés. Les élèves sont appelés à répondre à un appel à candidatures et doivent déposer un dossier argumenté qui passera devant comité de sélection. Chacun est par ailleurs libre de cumuler les bourses obtenues par l’intermédiaire de l’école avec d’autres bourses (Conseil Général du département d’origine, Rotary Club, bourse d’ambassade…). Certaines universités partenaires versent également une petite bourse d’entretien à leurs « incomings » pendant toute la durée de leur séjour. <br>'),
(16, 'Assurances', 'Assurances :', 'Assurance Santé - plusieurs situations peuvent se présenter selon la destination :<br> \nEurope : Demande de la Carte Européenne d’Assurance Maladie(CEAM) à votre centre de sécurité sociale étudiante au plus tard un mois avant votre départ. Dans certains pays, une avance de frais est demandée, gardez alors tous vos justificatifs de dépense de santé pour obtenir un remboursement au retour.<br>\nQuébec : Formulaire Q106 récupérer auprès de la caisse de sécurité sociale étudiante et à transmettre à l’école<br>\nAilleurs : Une demande de remboursement peut être effectuée au retour de la mobilité (pensez à garder vos factures). Certains établissements exigent une couverture santé auquel cas il faudra se renseigner sur ses modalités, propres au pays d''accueil.<br>\nIl peut être judicieux, selon le coût des frais de santé dans le pays d’accueil, de souscrire à une assurance qui prendra en charge la part non remboursée par la Sécu au retour.<br>\n <br>\nResponsabilité Civile, Rapatriement :<br>\nUne assurance de Responsabilité Civile couvre les dommages que tu pourrais occasionner à des tiers dans le pays d''accueil, tu en disposes d’une en France et il est recommandé que tu en souscrives une valable à l’étranger.<br>\nUne garantie de rapatriement sanitaire sert, comme son nom l’indique, à couvrir les frais nécessaires pour te ramener en France en cas de pépins. Elle est obligatoire dans le cas des mobilités Erasmus.<br>\n <br>\nVérifie avec ton assureur et ton banquier l’état de tes différentes couvertures pour éviter de payer pour un doublon (en particulier pour les services qui sont fournis avec ta Carte Bancaire).<br>\n <br>\nSécurité : <br>\nIl t’es conseillé de t’inscrire auprès ton l’ambassade au dispositif Ariane qui permet le recensement et l’information des français à l’étranger. <br>\nTu devras aussi être un minimum au fait du cadre juridique du pays dans lequel tu te rends, des us et coutumes de la population locale et des particularités de l’environnement de ton campus.<br>'),
(17, '', 'Aparté sur la langue d’enseignement', 'Majoritairement l’anglais en Asie, le portugais au Brésil, l’espagnol dans le reste de l’Amérique Latine, le français et l’anglais au Canada, avec des variantes selon les campus. Les élèves déjà hispanophones peuvent envisager une adaptation rapide au portugais, moyennant une initiation sérieuse avant leur départ. Il est fortement conseillé d’être initié à la langue locale pour partir étudier au Japon et en Chine continentale. Hong-Kong et Taïwan, plus occidentalisées, sont plus accessibles aux débutants complets en chinois. Les campus partenaires précisent systématiquement sur leurs pages web dédiées aux échanges académiques les niveaux de langue et les justificatifs requis pour être admis en tant qu’étudiant en échange.<br>\n <br>\nPar ailleurs, certaines universités partenaires imposent l’obtention du TOEIC ou du TOEFL avant de valider l’inscription. Il est donc impératif de se renseigner sur le sujet, avant de planifier son départ, car les exigences sont très diverses selon les campus.<br>'),
(18, 'Contacts :', 'Contacts :', 'DEF - Pôle international : <br>\nResponsable du pôle : Paul WHEAL wheal@emse.fr <br>\nCoordinatrice mobilité : Elisabeth GOUTIN-BURLAT goutin@emse.fr <br>\nGestionnaire Erasmus : Marta TOR tor@emse.fr <br>\nGestionnaire mobilité sortante : Isabel DA SILVA dasilva@emse.fr <br>\n <br>\nLe référent Mobilité Académique de la promotion que tu peux contacter par l''intermédiaire de ton président de promotion.<br>\n <br>\nExperts par Pays : <br>\nEspagne, Colombie, Chili : Carmen ACOSTA acosta@emse.fr <br>\nArgentine : Prof Jérôme MOLIMARD molimard@emse.fr <br>\nBrésil, Portugal : Prof Ana CAMEIRAO cameirao@emse.fr <br>\nMexique : Prof Mihaela MATHIEU mathieu@emse.fr <br>\nJapon, Corée: Prof Woo-Suck HAN han@emse.fr <br>\nTaïwan: Prof Jakey BLUE lan@emse.fr <br>\nDéléguée au développement international : Florence GRANGER granger@emse.fr <br>\n <br>\nTuteur Pédagogique : <br>\nIl signe ton plan d’études et se porte garant de ton niveau auprès de l’université partenaire. Il faut le contacter lors de toute modification du plan d’études.\n <br>\nEtablissements partenaires : <br>\nIl ne faut pas hésiter à les contacter pour tout renseignement pendant la phase d’information (souvent : Office of International Affairs/Relations, division Student exchange). S’ils ne répondent pas, l’école jouera les intermédiaires. <br>\n <br>\nLes promotions précédentes et Entrants Internationaux : <br>\nCe sont ceux qui auront les informations les plus récentes sur les campus partenaires (cours, administratif etc…) et qui pourront te renseigner sur la vie dans le pays d’accueil.<br>'),
(19, 'Titre section', 'Quelles sont les démarches ?', '');

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE IF NOT EXISTS `destinations` (
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
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `destinations`
--

INSERT INTO `destinations` (`ID`, `nom`, `complement_nom`, `ID_Ville`, `ingenieurie`, `type_mobilite`, `type_convention`, `langue_cours`, `places`, `site_internet`, `description`, `commentaires`, `activ`, `document`) VALUES
(130, 'Tohoku University', 'Sendaï', 60, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'www.tohoku.ac.jp/', '', '', 1, ''),
(131, 'Kumamoto University', '', 61, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'ewww.kumamoto-u.ac.jp/', '', 'Logements fournis/Existence de tutorats', 1, ''),
(132, 'Universidad Autonoma Metropolitana', 'UAM', 62, 0, 'S7', 'Mines Sainté', 'anglais', 2, 'www.uam.mx/', '', '', 1, ''),
(133, 'Institut Bauman', '', 63, 1, 'S7', 'IMT', 'Russe', 2, 'www.bmstu.ru:8093/', '', '', 1, ''),
(134, 'MISIS', 'National University of Science and Technology', 63, 1, 'S7', 'Mines Sainté', 'anglais/Russe', 2, 'en.misis.ru/', '', 'Facilité d’accès pour l’ensemble des besoins', 1, ''),
(135, 'National Chiao Tung University', 'NCTU', 64, 1, 'S7', 'Mines Sainté', 'anglais', 3, 'www.nctu.edu.tw/en', '', '', 1, ''),
(136, 'National Taiwan University', 'College of Eng / College EECS  NTU   Taipei', 65, 1, 'S7', 'Mines Sainté', 'anglais', 3, 'www.ntu.edu.tw/', '', '', 1, ''),
(123, 'Seoul National University', 'SNU', 54, 1, 'S7/S10', 'Mines Sainté', 'anglais', 3, 'www.useoul.edu/', '', '', 1, ''),
(124, 'KAIST Daejeon', 'Korea Advanced Institute of Science and Technology', 55, 1, 'S7/S10', 'Mines Sainté', 'anglais', 2, 'www.kaist.edu/', '', '', 1, ''),
(125, 'POSTECH Pohang', 'Pohang University of Science and Technology', 56, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'www.postech.ac.kr/eng/', '', '', 1, ''),
(126, 'HKUST', 'Hong Kong University of Science and Technology', 57, 1, 'S7', 'Mines Sainté', 'anglais', 2, 'www.ust.hk/', '', '', 1, ''),
(127, 'City University Hong Kong', '', 57, 0, 'S7', 'Mines Sainté', 'anglais', 2, 'www.cityu.edu.hk/', '', '', 1, ''),
(128, 'Indian Institutes of Technology', '', 58, 1, 'S7', 'Mines Sainté', 'anglais', 4, 'www.iitd.ac.in/', '', 'Choc culturel important à prendre en compte', 1, ''),
(129, 'Kyushu Institute of Technology', 'KYUTECH', 59, 1, 'S7/S10', 'Mines Sainté', 'anglais', 2, 'www.kyutech.ac.jp/english/', '', '', 1, ''),
(120, 'Universidad de Santiago  de Chile', 'USACH', 51, 1, 'S7', 'IMT', 'Espagnol', 3, 'www.usach.cl/', '', '', 1, ''),
(121, 'Shanghai Jiao Tong University', 'SJTU', 52, 1, 'S7', 'IMT', 'Chinois/anglais', 2, 'en.sjtu.edu.cn/', '', '', 1, ''),
(122, 'Uniandes', '', 53, 1, 'S7/S10', 'Mines Sainté', 'Espagnol', 3, 'www.uniandes.edu.co/', '', '', 1, ''),
(119, 'PUC de Chile', '', 50, 1, 'S7/S10', 'Mines Sainté', 'Espagnol', 3, 'www.uc.cl/', '', '', 1, ''),
(116, 'UNICAMP', 'Universidade Estadual de Campinas', 48, 1, 'S7', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.unicamp.br/', '', '', 1, ''),
(117, 'Ecole Polytechnique de Montréal', 'EPM', 49, 1, 'S7/Double Diplome', 'IMT', 'Français', 3, 'www.polymtl.ca/', '', '', 1, ''),
(118, 'Ecole de Technologie Supérieure', 'ETS Montréal', 49, 1, 'S7/Double Diplome', 'Mines Sainté', 'Français', 3, 'www.etsmtl.com/', '', '', 1, ''),
(115, 'UFG-Goiana', 'Universidade Federal de Goias', 47, 1, 'S7', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.ufg.br/', '', '', 1, ''),
(114, 'UNESP- São Paulo', 'Universidade Estadual Paulista - São Paulo', 45, 1, 'S7/S10', 'IMT', 'Portugais/anglais', 3, 'www.unesp.br/', '', '', 1, ''),
(113, 'PUC-RIO', 'Pontificia Universidade Catolica do Rio de Janeiro', 4, 1, 'S7', 'IMT / Brafitec', 'Portugais/anglais', 3, 'www.puc-rio.br/', '', '', 1, ''),
(112, 'UFMG-Belo Horizonte', 'Universidade Federal de Minas Gerais', 46, 1, 'S7', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.ufmg.br/', '', '', 1, ''),
(111, 'EP  UFRJ-Rio de Janeiro', 'Universidade Federal do Rio de Janeiro  - Escola Politecnica', 4, 0, 'S7/S10', 'IMT / Brafitec', 'Portugais', 3, 'www.poli.ufrj.br/', '', '', 1, ''),
(110, 'Escola Politecnica da USP', '', 45, 1, 'S7/S10', 'Mines Sainté / Brafitec', 'Portugais', 3, 'www.poli.usp.br/', '', '', 1, ''),
(109, 'UNR-Rosario', 'Universidad  Nacional de Rosario-Facultad de Ciencias Exactas Ingenieria y Agrimensura', 44, 1, 'S7', 'Mines Sainté / ARFITEC', 'Espagnol', 3, 'web.fceia.unr.edu.ar/es/', '', '', 1, ''),
(108, 'UNC-Cordoba', 'Universidad Nacional de Cordoba-Facultad de Ciencias Exactas Fisicas y Naturales', 43, 1, 'S7', 'Mines Sainté / ARFITEC', 'Espagnol', 3, 'www.portal.efn.uncor.edu/', '', '', 1, ''),
(107, 'Universidad Buenos Aires', '', 42, 1, 'S7/S10', 'Mines Sainté / ARFITEC', 'Espagnol', 3, 'www.uba.ar/', '', '', 1, ''),
(106, 'Istanbul Teknik Universitesi', '', 41, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.itu.edu.tr/', '', '', 1, ''),
(105, 'Cranfield University', '', 40, 1, 'Double Diplome', 'Mines Sainté', 'anglais', 3, 'www.cranfield.ac.uk', '', '', 1, ''),
(102, 'Karlstad University', '', 37, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.kau.se/', '', '', 1, ''),
(103, 'CTU -Prague', 'Czech Technical University - Faculty of Nuclear Sciences and Physical Eng', 38, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.fjfi.cvut.cz/', '', '', 1, ''),
(100, 'AGH Krakow', '', 34, 0, 'S7/Double Diplome', 'Erasmus / Mines Sainté', 'anglais', 3, 'www.agh.edu.pl/', '', '', 1, ''),
(101, 'Universidade do Porto', '', 36, 0, 'S7', 'Erasmus', 'Portugais', 1, 'www.sigarra.up.pt/', '', '', 1, ''),
(99, 'Warsaw University of Technology', 'Faculty of Materials Science and Eng', 35, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.pw.edu.pl/', '', '', 1, ''),
(97, 'Silesian UT', 'Gliwice/ Katowice', 33, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.polsl.pl/', '', '', 1, ''),
(95, 'TU Eindhoven', 'Department of Biomedical Eng', 31, 0, 'S7', 'Erasmus', 'Anglais / TOEFL', 1, 'www.tue.nl/', '', '', 1, ''),
(94, 'University of Oslo', 'Faculty of Mathematics and Natural Sciences', 30, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.mn.uio.no/english/', '', '', 1, ''),
(93, 'Politecnico di Milano', 'School of Engineering/School of Design', 29, 0, 'S7', 'Erasmus', 'Italien', 1, 'www.polimi.it/', '', '', 1, ''),
(92, 'Universita degli studi di Bergamo', 'UniBG', 28, 1, 'S7', 'Erasmus', 'Italien/anglais', 1, 'www.unibg.it/', '', '', 1, ''),
(91, 'Politecnico di Torino', '', 27, 0, 'Double Diplome', 'Erasmus / Mines Sainté', 'Italien', 3, 'www.polito.it/', '', '', 1, ''),
(90, 'University College Dublin', 'School of Chemical and Bioprocess Eng', 26, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.ucd.ie/chembioeng/', '', '', 1, ''),
(89, 'BME Budapest', '', 25, 0, 'S7', 'Erasmus', 'anglais', 2, 'www.bme.hu/', '', '', 1, ''),
(88, 'University of Eastern Finland', 'UEF Faculty of Science and Forestry - Joensuu', 24, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.uef.fi/', 'Reconnue en foresterie', 'Logement s’y prendre tôt/ pas de souci de langue/ souci de nourriture', 1, ''),
(87, 'TUT Pori', 'Technological University Tampere TUT - Pori campus', 23, 0, 'S7', 'Erasmus', 'anglais', 3, 'www.tut.fi/en/pori/', '', 'Logement fourni mais pas toujours adapté', 1, ''),
(86, 'Universidad de Sevilla', 'Escuela Tecnica Superior de Ingenieria (ETSI)', 22, 0, 'S7', 'Erasmus / Mines Sainté', 'Espagnol', 1, 'www.etsi.us.es/', '', '', 1, ''),
(85, 'Universidad de Santiago de Compostela', '', 21, 0, 'S7', 'Erasmus', 'Espagnol', 3, 'www.usc.es/', '', '', 1, ''),
(84, 'ETSEI  Barcelona', '', 20, 1, 'S7', 'Erasmus', 'Espagnol/Catalan', 3, 'www.etseib.upc.edu/', 'À l’intérieur de l’UPC une grande fac de Barcelone', 'Attention à la langue: Catalan et pas Castillan', 1, ''),
(83, 'Universidad Carlos III', '', 3, 0, 'S7', 'Erasmus', 'Espagnol', 3, 'www.uc3m.es/', '', '', 1, ''),
(82, 'ETSI de Minas y Energia  UPM', '', 3, 0, 'S7', 'Erasmus / Mines Sainté', 'Espagnol', 3, 'www.minasyenergia.upm.es/', '', '', 1, ''),
(81, 'ETSI Industriales UPM', '', 3, 1, 'S7/Double Diplome', 'Erasmus / Mines Sainté', 'Espagnol', 3, 'www.etsii.upm.es/', '', '', 1, ''),
(79, 'TU Wien', 'Institute of Chemical Eng', 19, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.tuwien.ac.at/', '', '', 1, ''),
(80, 'University of Wien', '', 19, 0, 'S7', 'Erasmus', 'Allemand', 3, 'www.univie.ac.at/', '', '', 1, ''),
(78, 'TU München', 'Faculty of Mechanical Eng  /Faculty of Electrical Eng', 18, 0, 'S7', 'Erasmus', 'Allemand/anglais', 1, 'www.tum.de/', 'Meilleure université technique d’Allemagne', 'examens difficiles basés sur la vitesse/ Difficulté de logement', 1, ''),
(77, 'TU Kaiserlautern', 'Fachbereich Mathematik', 17, 0, 'S7', 'Erasmus', 'Allemand', 3, 'www.uni-kl.de/', '', '', 1, ''),
(76, 'Karlsruhe Institute of Technology / KIT', 'Department of Economics and Management', 16, 0, 'S7', 'Erasmus', 'Allemand/anglais', 3, 'www.kit.edu/', '', '', 1, ''),
(75, 'TU Dortmund', 'Faculty of Statistics', 15, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.tu-dortmund.de/', '', '', 1, ''),
(74, 'TU Darmstadt', '', 14, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.tu-darmstadt.de/', '', '', 1, ''),
(73, 'RWTH - Aachen', 'Faculty of Georessources and Materials Eng', 13, 0, 'S7', 'Erasmus', 'Allemand', 2, 'www.rwth-aachen.de/', '', '', 1, ''),
(72, 'TU Hamburg', 'TUHH', 12, 0, 'S7', ' Erasmus / Mines Sainté', 'Allemand/anglais', 3, 'www.tuhh.de/', '', '', 1, ''),
(70, 'TU Berlin', 'Fakultäten III und VII', 8, 0, 'S7', 'Erasmus', 'Allemand', 3, 'www.tu-berlin.de/', '', '', 1, ''),
(71, 'TU Dresden', 'Faculty of Electrical and Computer Eng', 11, 0, 'S7', 'Erasmus / Mines Sainté', 'Allemand', 2, 'www.tu-dresden.de/', '', '', 1, ''),
(104, 'University of Edinburgh', '', 39, 0, 'S7', 'Erasmus', 'anglais/ TOEFL', 2, 'www.ed.ac.uk/', '', '', 1, ''),
(98, 'Jagiellonian University', 'Faculty of Chemistry - Krakow', 34, 0, 'S7', 'Erasmus', 'anglais', 3, 'www2.chemia.uj.edu.pl/', '', '', 1, ''),
(96, 'University of Twente', '', 32, 0, 'S7', 'Erasmus', 'Anglais / TOEFL', 2, 'www.utwente.nl/', '', '', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `domainedestination`
--

CREATE TABLE IF NOT EXISTS `domainedestination` (
  `ID` int(11) NOT NULL,
  `ID_destination` int(11) NOT NULL,
  `ID_domaine` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=391 DEFAULT CHARSET=latin1;

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
(299, 87, 25),
(301, 88, 17),
(300, 88, 16),
(302, 88, 20),
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
(303, 88, 25),
(304, 105, 22),
(305, 105, 21),
(306, 107, 20),
(307, 107, 34),
(308, 107, 21),
(309, 108, 20),
(310, 108, 31),
(311, 108, 35),
(312, 109, 23),
(313, 109, 31),
(314, 109, 19),
(315, 110, 23),
(316, 110, 19),
(317, 110, 21),
(318, 112, 23),
(319, 112, 19),
(320, 112, 21),
(321, 112, 35),
(322, 113, 31),
(323, 113, 19),
(324, 113, 23),
(325, 113, 21),
(326, 114, 23),
(327, 114, 19),
(328, 114, 21),
(329, 115, 20),
(330, 115, 23),
(331, 115, 19),
(332, 115, 21),
(333, 116, 23),
(334, 116, 21),
(335, 116, 20),
(336, 117, 19),
(337, 117, 21),
(338, 117, 20),
(339, 117, 34),
(340, 117, 31),
(341, 118, 19),
(342, 118, 21),
(343, 119, 23),
(344, 119, 34),
(345, 120, 19),
(346, 120, 31),
(347, 121, 21),
(348, 121, 23),
(349, 122, 23),
(350, 122, 20),
(351, 122, 31),
(352, 122, 34),
(353, 123, 23),
(354, 123, 21),
(355, 123, 35),
(356, 123, 31),
(357, 123, 22),
(358, 124, 20),
(359, 124, 30),
(360, 125, 21),
(361, 125, 20),
(362, 125, 19),
(363, 125, 25),
(364, 126, 23),
(365, 126, 22),
(366, 128, 19),
(367, 128, 34),
(368, 128, 30),
(369, 128, 21),
(370, 129, 21),
(371, 129, 19),
(372, 129, 25),
(373, 130, 22),
(374, 130, 29),
(375, 130, 20),
(376, 131, 25),
(377, 131, 30),
(378, 131, 20),
(379, 131, 21),
(380, 131, 22),
(381, 132, 20),
(382, 132, 25),
(383, 132, 22),
(384, 133, 31),
(385, 133, 21),
(386, 134, 25),
(387, 134, 20),
(388, 134, 34),
(389, 135, 20),
(390, 135, 19);

-- --------------------------------------------------------

--
-- Structure de la table `domaineparcour`
--

CREATE TABLE IF NOT EXISTS `domaineparcour` (
  `ID` int(11) NOT NULL,
  `ID_parcour` int(11) NOT NULL,
  `ID_domaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE IF NOT EXISTS `domaines` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaines`
--

INSERT INTO `domaines` (`ID`, `nom`, `code`) VALUES
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

CREATE TABLE IF NOT EXISTS `mobilite` (
  `ID` int(11) NOT NULL,
  `ID_destination` int(11) NOT NULL,
  `ID_parcour` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`ID`, `nom`, `prenom`, `promo`, `date_debut`, `date_fin`, `tuteur`, `type_mobilite`, `type_convention`, `rapport`, `bulletin`, `remarques`) VALUES
(1, 'Chassagne', 'Valentin', 2015, '2018-02-01', '2018-06-25', 'Helmut Klocker', 'S10', '', 'Alexandre Mellios - U Oslo.pdf', 'Alexandre Mellios - U Oslo.pdf', ''),
(2, 'Hamm', 'Thibaut', 2015, '2017-05-30', '2017-09-02', 'Christophe Desrayaud', 'Stage 2A', 'saintéstage ', '', 'Alexandre Mellios - U Oslo.pdf', 'Comme Thibaut n''a pas troué de stage, l''école lui a trouvé celui ci.');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `continent` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

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
(32, 'Taïwan', 'Asie');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ID_pays` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`ID`, `nom`, `ID_pays`) VALUES
(1, 'Londres', 1),
(3, 'Madrid', 3),
(4, 'Rio de Janeiro', 2),
(5, 'Cambridge', 4),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT pour la table `domainedestination`
--
ALTER TABLE `domainedestination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=391;
--
-- AUTO_INCREMENT pour la table `domaineparcour`
--
ALTER TABLE `domaineparcour`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `mobilite`
--
ALTER TABLE `mobilite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
