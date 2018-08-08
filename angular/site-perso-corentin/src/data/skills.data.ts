import {Skill} from './skill';
import {Link} from './project';

export const SKILLS = {
  'language': [
    new Skill(
      'R',
      1.5,
      'Language and environment for statistical computing and graphics.',
      'I used it in pratical works in courses of statistics and Big Data.',
      [],
      'r.png'
    ),
    new Skill(
      'C',
      4,
      'General-purpose, imperative computer programming language. It is a low-level language ' +
      'which should be compiled to machine instructions.',
      'I used it a lot in pratical works in courses of C, Computer sciences and Big Data.',
      [],
      'c.png'
    ),
    new Skill(
      'Python',
      4,
      'Interpreted high-level programming language for general-purpose programming.',
      'I used it a lot in pratical works in courses during my preparatory classes. ' +
      'I worked also with it during a three month internship to implement neural network.',
      [new Link('Lesion segmentation by deep learning', 'stage_2a')],
      'python.png'
    ),
    new Skill(
      'Shell',
      3.5,
      'Script designed to be run by the shell command-line interpreter of Unix devices.',
      'I used it a lot in pratical works in courses of Computer sciences and Big Data. ' +
      'I worked also with it during a three month internship to preprocess and move the datas.',
      [new Link('Lesion segmentation by deep learning', 'stage_2a')],
      'shell.png'
    ),
    new Skill(
      'PHP',
      4.5,
      'Server-side scripting language designed for Web development, but also used as a' +
      ' general-purpose programming language.',
      'I learned it by myself with MOOCs to develop my first web site. Then I worked with ' +
      'it to develop the backend of other websites. I used it also when I learned the framework Symfony in courses.',
      [new Link('Minesterstellar Website', 'minesterstellar'),
        new Link('International mobility website', 'mobilite'),
        new Link('Cercle Website', 'cercle')],
      'php.png'
    ),
    new Skill(
      'SQL',
      4,
      'Domain-specific language used for programming and designed for managing data held in ' +
      'a relational database management system, or for stream processing in a relational data stream management system.',
      'I learned it in preparatory classes and had courses on it at the École des Mines. ' +
      'I used MySQL a lot to manage the data of my three first websites.',
      [new Link('Minesterstellar Website', 'minesterstellar'),
        new Link('International mobility website', 'mobilite'),
        new Link('Cercle Website', 'cercle')],
      'sql.png'
    ),
    new Skill(
      'Java',
      5,
      'General-purpose computer-programming language that is concurrent, class-based and object-oriented.',
      'I learned it in Java courses and had lot of pratical works with it. I used also as backend' +
      ' language for a Computer sciences project.',
      [new Link('Computer Science Course Project', 'project_majeure_info')],
      'java.png'
    ),
    new Skill(
      'JavaScript',
      4.5,
      'High-level, interpreted programming language used in web development.',
      'I learned it by myself with MOOCs to animate my first web site. I used also as frontend language ' +
      'for all the websites I did after.',
      [new Link('Minesterstellar Website', 'minesterstellar'),
        new Link('International mobility website', 'mobilite'),
        new Link('Cercle Website', 'cercle'),
        new Link('Computer Science Course Project', 'project_majeure_info'),
        new Link('Personal Website', 'spc')],
      'js.png'
    ),
    new Skill(
      'TypeScript',
      2,
      'Open-source programming language which is a strict syntactical superset of JavaScript.',
      'I learned it by using Angular.',
      [new Link('Personal Website', 'spc')],
      'ts.png'
    ),
    new Skill(
      'Matlab',
      2.5,
      'Multi-paradigm numerical computing environment and proprietary programming language.',
      'I had pratical works with it in treatment of signals and images.',
      [],
      'matlab.png'
    )
  ],
  'web': {
    'Front-end': [
      new Skill(
        'Html',
        4.5,
        'Standard markup language for creating web pages and web applications.',
        'I learned it by myself with MOOCs to create my first web site. I used also for all the websites I did after.',
        [new Link('Minesterstellar Website', 'minesterstellar'),
          new Link('International mobility website', 'mobilite'),
          new Link('Cercle Website', 'cercle'),
          new Link('Computer Science Course Project', 'project_majeure_info'),
          new Link('Personal Website', 'spc')],
        'html.png'
      ),
      new Skill(
        'CSS',
        4,
        'Style sheet language used for describing the presentation of a document written in a markup language like HTML.',
        'I learned it by myself with MOOCs to create my first web site. I used also for all the websites I did after.',
        [new Link('Minesterstellar Website', 'minesterstellar'),
          new Link('International mobility website', 'mobilite'),
          new Link('Cercle Website', 'cercle'),
          new Link('Computer Science Course Project', 'project_majeure_info'),
          new Link('Personal Website', 'spc')],
        'css.png'
      ),
      new Skill(
        'SCSS or Sass',
        4,
        'Preprocessor scripting language that is interpreted or compiled into CSS.',
        'I learned it by myself on internet to properly use Bootstrap 4 and Material.',
        [new Link('Personal Website', 'spc')],
        'scss.png'
      ),
      new Skill(
        'Bootstrap',
        4,
        'Free and open-source front-end framework for designing websites and web applications.',
        'I learned it by myself on internet to make quick responsive web sites.',
        [new Link('Computer Science Course Project', 'project_majeure_info'), new Link('Personal Website', 'spc')],
        'bootstrap.png'
      ),
      new Skill(
        'Material',
        3,
        'Design system – backed by open-source code – that helps teams to build digital experiences.',
        'I learned it by myself on internet to build this web site.',
        [new Link('Personal Website', 'spc')],
        'material.png'
      ),
      new Skill(
        'AngularJS',
        4,
        'JavaScript-based open-source front-end web application framework.',
        'I learned it by myself with MOOCs to use it as frontend for my second and third websites.',
        [new Link('International mobility website', 'mobilite'), new Link('Cercle Website', 'cercle')],
        'angular.png'
      ),
      new Skill(
        'Vue.js',
        3,
        'Open-source JavaScript framework for building user interfaces.',
        'I learned it in Computer sciences courses.',
        [new Link('Computer Science Course Project', 'project_majeure_info')],
        'vuejs.png'
      ),
      new Skill(
        'Angular',
        3,
        'TypeScript-based open-source front-end web application framework.',
        'I learned it by myself on internet to build this web site.',
        [new Link('Personal Website', 'spc')],
        'angular.png'
      ),
      new Skill(
        'Android',
        2.5,
        'Mobile operating system designed primarily for touchscreen mobile devices such as smartphones and tablets.',
        'I learned it in Computer sciences courses.',
        [new Link('Computer Science Course Project', 'project_majeure_info')],
        'android.png'
      )
    ],
    'Back-end': [
      new Skill(
        'Spring',
        3,
        'Java framework to develop web applications.',
        'I learned it in Computer sciences courses.',
        [new Link('Computer Science Course Project', 'project_majeure_info')],
        'spring.png'
      ),
      new Skill(
        'Symfony',
        3,
        'PHP web application framework.',
        'I learned it in Computer sciences courses.',
        [],
        'symfony.png'
      )
    ],
    'Managers': [
      new Skill(
        'Gradle',
        4,
        'Open-source build automation system mostly used with java.',
        'I learned it in Computer sciences courses with Spring and Android.',
        [new Link('Computer Science Course Project', 'project_majeure_info')],
        'gradle.png'
      ),
      new Skill(
        'Composer',
        3.5,
        'Application-level package manager for the PHP programming language.',
        'I learned it in Computer sciences courses with Symfony.',
        [],
        'composer.png'
      ),
      new Skill(
        'NPM',
        3.5,
        'Package manager for the JavaScript programming language.',
        'I learned it by using Angular.',
        [new Link('Personal Website', 'spc')],
        'npm.png'
      )
    ]
  },
  'ia': [
    new Skill(
      'Tensorflow',
      4,
      'open-source software library for dataflow programming. It is used for machine learning applications such as neural networks.',
      'I learned it during my three month internship à Erasmus MC.',
      [new Link('Lesion segmentation by deep learning', 'stage_2a')],
      'tensorflow.png'
    ),
    new Skill(
      'Keras',
      4.5,
      'Open source neural network library written in Python.',
      'I used it with Tensorflow backend during my three month internship à Erasmus MC.',
      [new Link('Lesion segmentation by deep learning', 'stage_2a')],
      'keras.png'
    )
  ],
  'graphical': [
    new Skill(
      'Photoshop',
      2,
      'Raster graphics editor.',
      'I used it for personnal stuffs or to preprocess images I want to display on my websites.',
      [],
      'photoshop.png'
    ),
    new Skill(
      'Illustrator',
      1,
      'Vector graphics editor.',
      'I used it for personnal stuffs, to edit associations logos and to preprocess logos I want display on my websites.',
      [],
      'illustrator.png'
    ),
    new Skill(
      'Blender',
      3,
      'Professional, free and open-source 3D computer graphics software.',
      'I used it to make some 3D annimations for an association film.',
      [new Link('Minesterstellar Film', 'film_campagne')],
      'blender.png'
    )
  ],
  'other': [
    new Skill(
      'Git',
      3.5,
      'Version control system for tracking changes in computer files and coordinating work.',
      'I learned it in Computer sciences courses and work with it since.',
      [],
      'git.png'
    ),
    new Skill(
      'Linux',
      4,
      'Free and open-source software operating systems.',
      'I work a lot on ubuntu.',
      [],
      'linux.png'
    ),
    new Skill(
      'Windows',
      4.5,
      'Graphical operating system families developed by Microsoft.',
      'I use Windows since I was a kid.',
      [],
      'windows.png'
    ),
    new Skill(
      'Microsoft Office Suite',
      4,
      'Family of client software and services developed by Microsoft.',
      'I always use Word, Powerpoint and Excel for my personal and scholar projects.',
      [],
      'office.png'
    )
  ]
};
