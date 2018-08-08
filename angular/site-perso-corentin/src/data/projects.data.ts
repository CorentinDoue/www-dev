import {Label, Link, Project} from './project';

// language=HTML
export const PROJECTS: Project[] = [
  new Project(
    'Deep learning internship',
    'stage_2a',
    'ia',
    'june 2018',
    'now',
    [
      new Label('Keras', null, 'keras', 'https://keras.io/'),
      new Label('Tensorflow', 'AI', 'tensorflow', 'https://www.tensorflow.org/')
    ],
    [
      new Label('Keras', 'AI', 'keras', 'https://keras.io/'),
      new Label('Tensorflow', 'AI', 'tensorflow', 'https://www.tensorflow.org/'),
      new Label('Python', 'Code', 'python', 'https://www.python.org/'),
      new Label('Docker', null, 'docker', 'https://www.docker.com/')
    ],
    'The second year of the "Ingénieur Civil des Mines" curriculum ends with a three months internship. ' +
    'I am doing mine at Erasmus MC at Rotterdam (Netherlands). ' +
    'It is a research internship I am doing in pair with a colleague of the ' +
    '<a href="https://www.mines-stetienne.fr/">École des Mines de Saint-Étienne</a>, ' +
    '<a href="https://www.linkedin.com/in/robin-camarasa-893726158">Robin Camarasa</a>, and this is our mission.',
    'We first segmented  white matter lesions from brain MRIs thank to deep learning. ' +
    'We used a new method found in a research article which consist in using recurrent neural networks on 3D images ' +
    'by using one of spatial dimensions as the temporal dimension of the recurrent neural network. <br>' +
    'We implemented this method thank to Keras, a Python library working on top of TensorFlow (the machine learning framework of Google).' +
    ' Then we trained our network on the data set of a former white matter lesion segmentation challenge and ' +
    'we had results as good as the bests of the challenge.<br> We are now trying to apply our network on a currently active challenge. ' +
    'We have to segment eight brain parts including white matter lesion. We will submit our work before the end of the internship. ' +
    'We will also use our final network on the brain MRI data set of Erasmus MC to segment automatically the white matter lesions. ' +
    'Those segmentations will be used by our internship supervisor for a bigger project after our internship.',
    [
      new Link('Erasmus MC', 'https://www.erasmusmc.nl/'),
      new Link('First challenge', 'http://wmh.isi.uu.nl/'),
      new Link('Second challenge', 'http://mrbrains18.isi.uu.nl/')
    ],
    null
  ),
  new Project(
    'Personal Website',
    'spc',
    'web',
    'june 2018',
    'august 2018',
    [
      new Label('Angular', null, 'angular', 'https://angular.io/'),
    ],
    [
      new Label('Angular', 'front', 'angular', 'https://angular.io/'),
      new Label('Angular Material', 'web', 'material', 'https://material.angular.io/'),
      new Label('Bootstrap', 'web', 'bootstrap', 'https://getbootstrap.com/'),
      new Label('Type Script', 'web', 'ts', 'https://www.typescriptlang.org/'),
      new Label('Html', 'code', 'html', 'https://en.wikipedia.org/wiki/HTML'),
      new Label('SCSS', 'code', 'scss', 'https://sass-lang.com/')
    ],
    'I wanted a cv website to present me, my skills and my projects. I wanted also to learn the Angular framework. ' +
    'That is why I made this website.',
    'I followed most of the tutorials on angular.io before start this project. ' +
    'Then I took inspiration from the angular-ngrx-material-starter project of Tomas Trajan to master theming and animations and ' +
    'to not start my website from scratch. Then I tried to make my own components to improve my knowledge about Angular.<br>' +
    'There is no backend, just the angular front and I keep the content up to date by directly changing the code. ' +
    'However thanks to TypeScript I formatted my data as objects and separated them from the vue to easily change them.<br><br>' +
    'The site have five pages : ' +
    '<ul>' +
    '<li><u>About :</u> A quick presentation of myself</li>' +
    '<li><u>Curriculum Vitae :</u> My quick curriculum vitae, the same I provide to headhunters</li>' +
    '<li><u>Skills :</u> The list of my skills with lot of details and links to the projects where I used them. ' +
    'I took the time to make the progress bar component myself</li>' +
    '<li><u>Projects :</u> The timeline of my projects with details. ' +
    'I also took the time to make all the timeline component and its animations myself</li>' +
    '<li><u>Hobbies :</u> A presentation of my hobbies</li>' +
    '</ul>' +
    'To implement the theming, I made a day-night theming witch use a dark theme at night and a light theme at day.<br><br>' +
    'The next thing I would like to do is adding a translation of the site in french using ngx-translate',
    [
      new Link('The code hosted on github', 'https://github.com/CorentinDoue/www-dev/tree/master/angular/site-perso-corentin'),
      new Link('angular-ngrx-material-starter', 'https://tomastrajan.github.io/angular-ngrx-material-starter#/')
    ],
    new Link('corentindoue.github.io', 'https://corentindoue.github.io')
  ),
  new Project(
    'C.S. courses Project',
    'project_majeure_info',
    'web',
    'october 2017',
    'january 2018',
    [
      new Label('VueJS', 'front', 'vuejs', 'https://vuejs.org/'),
      new Label('Android', 'front', 'android', 'https://www.android.com/'),
      new Label('Spring', 'back', 'spring', 'https://spring.io/')
    ],
    [
      new Label('VueJS', 'front', 'vuejs', 'https://vuejs.org/'),
      new Label('Bootstrap', 'web', 'bootstrap', 'https://getbootstrap.com/'),
      new Label('Android', 'front', 'android', 'https://www.android.com/'),
      new Label('Spring', 'back', 'spring', 'https://spring.io/'),
      new Label('Gradle', 'manager', 'gradle', 'https://gradle.org/'),
      new Label('Philips Hue', null, 'philipshue', 'https://www2.meethue.com/'),
      new Label('Arduino', null, 'arduino', 'https://www.arduino.cc/'),
      new Label('Raspberry pi', null, 'raspberry', 'https://www.raspberrypi.org/'),
      new Label('Java', 'Code', 'java', 'https://www.java.com/'),
      new Label('MQTT', 'Code', 'mqtt', 'http://mqtt.org/'),
      new Label('Heroku', null, 'heroku', 'https://www.heroku.com/'),
      new Label('MySql', 'bdd', 'sql', 'https://www.mysql.com/'),
      new Label('JS', 'code', 'js', 'https://en.wikipedia.org/wiki/JavaScript'),
      new Label('Html', 'code', 'html', 'https://en.wikipedia.org/wiki/HTML'),
      new Label('CSS', 'code', 'css', 'https://en.wikipedia.org/wiki/Cascading_Style_Sheets')
    ],
    'During my computer science courses, we had a big project mixing Internet Of Thing and mobile and web programing. ' +
    'The aim was to remotely control Philips Hue lamps through a device made with an Arduino ' +
    'but also through an Android application and a web site. ' +
    'The current state of the lamps should be shared by all the controllers and kept up to date.<br>' +
    'I worked in pair with <a href="https://www.linkedin.com/in/robin-camarasa-893726158">Robin Camarasa</a>.',
    'Note that we developed during the courses a first Spring API and the VueJs frontend associated. ' +
    'Both are in the same repository as this project.<br><br>' +
    'The schema above show how we implement this project.<br>' +
    'The left side describe the local components and the right side describe the online components.<br><br>' +
    'The local control of the lamps work as follow : ' +
    '<ul>' +
    '<li>Some sensors are plugged into an Arduino which is connected to the local network.</li>' +
    '<li>An Raspberry pi is also connected to the local network. It hosts a MQTT Broker and a java program.</li>' +
    '<li>A Philips Hue bridge is also connected to the local network and could command several lamps.</li>' +
    '<li>The Arduino publish the comportment of the sensors to the MQTT Broker.</li>' +
    '<li>The java program subscribe to the MQTT Broker and convert the comportment of the sensor into Philips Hue state.' +
    'Then it send the states to the Philips Hue bridge by HTTP.</li>' +
    '<li>The bridge keep the lamps at their current state.</li>' +
    '</ul>' +
    'The online part of the project work as follow:' +
    '<ul>' +
    '<li>The local network is linked to internet. ' +
    '(for the project we had to add a second raspberry pi to connect the local network ' +
    'to our phone network to avoid the firewall of the school network).</li>' +
    '<li>An online MQTT broker is used: Cloud MQTT.</li>' +
    '<li>A java API was created as backend with Spring, hosted on Heroku and linked to a MySQL database.</li>' +
    '<li>A web frontend was created with VueJs and hosted on GithubPages.</li>' +
    '<li>An android app was created and hosted on our phones.</li>' +
    '<li>The online state of the lamps is hosted in the data base and is kept up to date by the API.</li>' +
    '<li>When a front is instantiated, it gets the current state of the lamps from the API by HTTP.</li>' +
    '<li>The java program of the local raspberry pi is also used to keep the local state up to date with the online state and ' +
    'to forward the sensors activities to the CloudMQTT broker by MQTT.</li>' +
    '<li>The API and the two frontends subscribe to the CloudMQTT broker to keep the data base ' +
    'and the vues up to date when the lamp states change.</li>' +
    '<li>Both frontends set their own changes of the lamps states on the API which publish to CloudMQTT ' +
    'to update the local state of the lamp and then the real state.</li>' +
    '</ul>' +
    'We finally succeed to keep all components synchronised.' +
    'Note that we developed during the courses a first Spring API and the VueJs frontend associated. ' +
    'Both are in the same repository as the project.',
    [
      new Link('Front web', '/majeure_info_project/PhillipsHue/'),
      new Link('Front android', 'https://github.com/EMSEMajorProject/major_project_front_android_phillipshue_manager'),
      new Link('API Spring', ' https://github.com/EMSEMajorProject/major_project_api_phillipshue_manager'),
      new Link('Cloud MQTT', 'https://www.cloudmqtt.com/'),
    ],
    new Link('Github of the project', 'https://github.com/EMSEMajorProject'),
    'schema_project_majeur_info.png'
  ),
  new Project(
    'Cercle Website',
    'cercle',
    'web',
    'august 2017',
    'october 2017',
    [
      new Label('AngularJS', 'front', 'angular', 'https://angularjs.org/'),
      new Label('PHP', 'back', 'php', 'http://www.php.net/')
    ],
    [
      new Label('AngularJS', 'front', 'angular', 'https://angularjs.org/'),
      new Label('PHP', 'back', 'php', 'http://www.php.net/'),
      new Label('MySql', 'bdd', 'sql', 'https://www.mysql.com/'),
      new Label('JS', 'code', 'js', 'https://en.wikipedia.org/wiki/JavaScript'),
      new Label('Html', 'code', 'html', 'https://en.wikipedia.org/wiki/HTML'),
      new Label('CSS', 'code', 'css', 'https://en.wikipedia.org/wiki/Cascading_Style_Sheets')
    ],
    '"Le Cercle" is the student bar of our school. To facilitate the payment, each student has an account with a money balance. ' +
    'As everybody knows everybody, the barmen just type the name of the customer to cash him. ' +
    'A former website existed but it was neither convenient nor fine. So I decided to make a new one during the summer.',
    'I used AngularJs and raw PHP as frontend, raw PHP as backend and MySql as database.<br>' +
    'The backend was essentially PHP files which are called by AngularJS. ' +
    'In those PHP file, data are most of the time queried by raw SQL request and preprocessed before been return as JSON.' +
    'AngularJS permit to have a dynamic frontend and not to reload pages each time somebody purchase a beer. ' +
    'It is also more convenient to code quickly and nicely.<br>' +
    'The authentication is done through a php central authentication service provided by the school. ' +
    'This service block the access of a page if the user is not authenticated so I didn\'t deal with security.<br><br>' +
    'The link above provide you a copy of this website where I modified the data and skipped the authentication service. ' +
    'You will be logged in as me with all the rights.<br><br>' +
    'The site have seven pages : ' +
    '<ul>' +
    '<li><u>Mon compte :</u> History of an account. ' +
    'By default it is the account of the current user. ' +
    'But administrator could be linked to this page with an user id to consult his history.</li>' +
    '<li><u>Stats :</u> A funny page to consult your and global statistics of consumption. ' +
    'Moreover the last panel is used to display stock prices of the beer during special events ' +
    'where the price of the beer change like in stock Exchange</li>' +
    '<li><u>Ouvrir une perm :</u> This page permits to the barmen to first select who will hold the bar tonight' +
    ', then to choose what drinks or goods he will sell and to set their prices. ' +
    'It creates an instance of a "perm" which is a night when the bar is opened. ' +
    'This instance could be modified or reload later.</li>' +
    '<li><u>Perm :</u> It is the main page of the site. ' +
    'It permits to the barmen to sell his drinks or goods just by typing the name of the customer then by clicking on block.</li>' +
    '<li><u>Historique :</u> Use the "Mon compte" page with id 0 tho display the global history</li>' +
    '<li><u>Rechargement :</u> Permits to a administrator to recharge an user account with money</li>' +
    '<li><u>Gestion :</u> Administration page to manage drinks and account.</li>' +
    '</ul>' +
    'Feel free to explore this site, this copy is done for this.',
    [
      new Link('The code hosted on github', 'https://github.com/CorentinDoue/www-dev/tree/master/site_cercle'),
    ],
    new Link('Cercle Website', 'https://corentindoue-www-dev.herokuapp.com/site_cercle/')
  ),
  new Project(
    'International mobility website',
    'mobilite',
    'web',
    'april 2017',
    'july 2017',
    [
      new Label('AngularJS', 'front', 'angular', 'https://angularjs.org/'),
      new Label('PHP', 'back', 'php', 'http://www.php.net/')
    ],
    [
      new Label('AngularJS', 'front', 'angular', 'https://angularjs.org/'),
      new Label('PHP', 'back', 'php', 'http://www.php.net/'),
      new Label('MySql', 'bdd', 'sql', 'https://www.mysql.com/'),
      new Label('JS', 'code', 'js', 'https://en.wikipedia.org/wiki/JavaScript'),
      new Label('Html', 'code', 'html', 'https://en.wikipedia.org/wiki/HTML'),
      new Label('CSS', 'code', 'css', 'https://en.wikipedia.org/wiki/Cascading_Style_Sheets'),
    ],
    'During the first year of the "Ingénieur Civil des Mines" curriculum we have a five month project. ' +
    'We were a team of six. ' +
    'Our project was to find a better way to communicate about the international mobility provided by the school. ' +
    'We realized a short video and a website. The video answers to most of the new arrivals\' questions about international mobility. ' +
    'The web site gathers all the informations about international mobility and provide a destinations directory. ' +
    'I mostly worked on the website while the other worked on the video.',
    'The difficulty of this project was to create a tool serviceable for people in charge of the mobilities. ' +
    'As they know nothing about computer science I created a back office website to easily manage the content of main site.<br>' +
    'I developed my two frontends thanks to a html/css template that I modified, ' +
    'I also started to work with AngularJs to dynamize the site. ' +
    'I used PHP in the frontends to secure the site thanks to a central authentication service provided by the school. ' +
    'The backend is developed with raw php and linked to a MySql database.<br>' +
    'The link above is the real site which you could not be modify but the link above are a copy of the site which is alterable. ' +
    'The name of students are anonymized.<br><br>' +
    'The main site have four pages : ' +
    '<ul>' +
    '<li><u>Accueil :</u> This is the home page. Here are the video and all the explanations about international mobility.</li>' +
    '<li><u>Destinations :</u> This is the list of all the destinations which are sortable with some criteria.</li>' +
    '<li><u>Destination :</u> When people click on a destination card, they are redirect to this page which provide more ' +
    'informations about the destination. There also are some informations about the previous students who went in this destination.</li>' +
    '<li><u>Démarches :</u> This page describe all the administrative procedures to go abroad.</li>' +
    '</ul>' +
    'The back office site have five pages : ' +
    '<ul>' +
    '<li><u>Contenu :</u> This page contain all the texts of the pages "Accueil" and "Démarches" of the main site. ' +
    'They all could be modify easily.</li>' +
    '<li><u>Base de donnée :</u> This page permits to modify a row of the data base of destinations or student departures. ' +
    'The same search engine as in the main site is available to sort them.</li>' +
    '<li><u>Modify page :</u> When people click on a destination card or a student departure, ' +
    'they are redirect to this page which provide the ' +
    'informations about it. All is easily alterable.</li>' +
    '<li><u>Excel :</u> This page permits to download the database as an excel or to import an excel to update the database. ' +
    'I did this because people in charge of mobility are used to worked with excel.</li>' +
    '</ul>' +
    'Feel free to explore this site, this copy is done for this.',
    [
      new Link('Alterable website', 'https://corentindoue-www-dev.herokuapp.com/site_mobilite/'),
      new Link('Alterable back office website', 'https://corentindoue-www-dev.herokuapp.com/site_mobilite/index_back_office.php'),
      new Link('The code hosted on github', 'https://github.com/CorentinDoue/www-dev/tree/master/site_mobilite'),
    ],
    new Link('International mobility website', 'https://webeleves.emse.fr/mobilite_internationale/')
  ),
  new Project(
    'Minesterstellar Film',
    'film_campagne',
    'web',
    'january 2017',
    'mars 2017',
    [
      new Label('Blender', 'graphical', 'blender', 'https://www.blender.org/'),
    ],
    [
      new Label('Blender', 'graphical', 'blender', 'https://www.blender.org/')
    ],
    'Each year in March at the ' +
    '<a href="https://www.mines-stetienne.fr/">École des Mines de Saint-Étienne</a>, ' +
    ', happen the Student Union campaign. ' +
    'It is the major event of the community life, it lasts three week during which two teams of 40 students organise lot of events. ' +
    'At the end, one of the teams is elected and becomes the new Student Union. ' +
    'In 2017 I was vice-president of a team named "Minesterstellar" with the space theme . ' +
    'We finally won and I became vice-president of the Student Union for one year. <br><br>' +
    'We had to make a campaign movie to present our team. Our film is naturally on the space theme',
    'I worked with my colleague <a href="https://www.linkedin.com/in/jean-jardel-75340b15b">Jean Jardel</a> on the special ' +
    'effects of the film with blender.<br>' +
    'I first made the 3D animation of our logo which became the beginning of all our videos. ' +
    'Then I helped Jean who was the film director to make 3D scene of the film and special effects.' ,
    [
      new Link('Teaser of the film', 'https://www.youtube.com/watch?v=NgvMfn_5dTA'),
      new Link('The film', 'https://www.youtube.com/watch?v=8CUiWAo8wTo'),
    ],
    null
  ),
  new Project(
    'Minesterstellar Website',
    'minesterstellar',
    'web',
    'october 2016',
    'mars 2017',
    [
      new Label('Html', null, 'html', 'https://en.wikipedia.org/wiki/HTML'),
      new Label('PHP', 'back', 'php', 'http://www.php.net/'),
    ],
    [
      new Label('PHP', 'back', 'php', 'http://www.php.net/'),
      new Label('JS', 'code', 'js', 'https://en.wikipedia.org/wiki/JavaScript'),
      new Label('Html', 'code', 'html', 'https://en.wikipedia.org/wiki/HTML'),
      new Label('CSS', 'code', 'css', 'https://en.wikipedia.org/wiki/Cascading_Style_Sheets'),
      new Label('Photoshop', 'graphical', 'photoshop', 'https://www.photoshop.com/'),
    ],
    'Each year in March at the ' +
    '<a href="https://www.mines-stetienne.fr/">École des Mines de Saint-Étienne</a>, ' +
    ', happen the Student Union campaign. ' +
    'It is the major event of the community life, it lasts three week during which two teams of 40 students organise lot of events. ' +
    'At the end, one of the teams is elected and becomes the new Student Union. ' +
    'In 2017 I was vice-president of a team named "Minesterstellar" with the space theme. ' +
    'We finally won and I became vice-president of the Student Union for one year. <br><br>' +
    'I created a website to present us and our events. Moreover our campaign was a big game with prizes to win at the end. ' +
    'There were lot of small games during these three weeks and the website was used to record the scores.',
    'This was my first website, I had never done any kind of web development before. ' +
    'So I started by follow MOOCs about HTML, CSS and PHP. ' +
    'The site mostly done with raw PHP, Html and CSS. ' +
    'To dynamize it, I added some JavaScript component but without really understanding what ' +
    'I was doing because I had not time to learn JavaScript. ' +
    'I used a MySql database to store all the data. I did not know yet the concept of backend so the queries and preprocessings ' +
    'were directly executed from the top of the pages. ' +
    'I also developed a mobile version. It is not responsive because the mobile version is not provided by CSS but by sending a ' +
    'different page if the device was detected as mobile.<br><br>' +
    'The website has lot of pages and functionalities : ' +
    '<ul>' +
    '<li><u>Accueil :</u> It is the home page of the site. It presents it.</li>' +
    '<li><u>Journal de bord :</u> Here was the summary of what happen to us.</li>' +
    '<li><u>Événements :</u> This page display all our major events and their descriptions.</li>' +
    '<li><u>Calendrier :</u> It is a google calendar where we put our events.</li>' +
    '<li><u>Équipage :</u> Here are the descriptions of each member of our team.</li>' +
    '<li><u>Galerie :</u> We put on this pages our pictures and videos.</li>' +
    '<li><u>Soundbox :</u> It is a funny page with lot of funny sounds.</li>' +
    '<li><u>Résultats jeux :</u> On this page are all the rankings of our games and the global ranking.</li>' +
    '<li><u>Entrainement spatial :</u> This page is an explanation of our key thread game and the presentation of the prizes.</li>' +
    '<li><u>Jeu de piste :</u> We organized a treasure hunt with flash tags. ' +
    'When a tag was found and flashed, the user is redirected to this page and a new clue is revealed to lead to the next tag. ' +
    'Without being connected, this page only display the rules of the treasure hunt.</li>' +
    '</ul>' +
    'If you are connected as user, the same pages are available but you can track your rank and your progression in the treasure hunt. ' +
    'The "Allo" page is added. It is a page where people could ask lot of services. It is no more active now but at this time a ' +
    'telephone number was displayed (or could directly call the number on the mobile version).<br><br>' +
    'If you are connected as admin, some things are added :' +
    '<ul>' +
    '<li><u>Points :</u> This page is use to add points to a user in a game. It was constantly used by our entertainment team.</li>' +
    '<li><u>Mode Éditeur :</u> If an admin wanted modify something more complicated than adding points, ' +
    'he could switch in editing mode.</li>' +
    '</ul>' +
    'In editing mode, all become possible :' +
    '<ul>' +
    '<li>It become possible to add a new post on "Journal de bord" and "Galerie" but also to delete one.</li>' +
    '<li><u>Configuration :</u> It is on this page admins could add, edit or delete a game, an event, ' +
    'a treasure hunter tag or an "allo".</li>' +
    '</ul>' +
    'Furthermore to keep suspense most of the site was encrypted at the beginning of the campaign. ' +
    'The events were revealed one by one. I also used Photoshop to create most of the picture of the website.<br><br>' +
    'Feel free to explore this site, this anonymized copy is done for this. You can connect with these credentials to be admin:<br>' +
    'email : corentin.doue@etu.emse.fr<br>' +
    'password : 0386479877' ,
    [
      new Link('The code hosted on github', 'https://github.com/CorentinDoue/www-dev/tree/master/SiteMinesterstellar'),
    ],
    new Link('Minterstellar Website', 'https://corentindoue-www-dev.herokuapp.com/SiteMinesterstellar/')
  ),
];
