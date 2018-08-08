
// language=HTML
import {Hobby, Image} from './hobby';

export const HOBBIES: Hobby[] = [
  new Hobby(
    'Running',
    'running',
    'I run on average twice a week. I started in 2012 because it is healthy but I still practising because I like it. ' +
    'Even when I came to the engineering school and I stopped almost every sports because of the community life. ' +
    'I continued to run once a week. It ables me to empty my mind and to stay fit. Recently I started to participated to some races ' +
    'with friends and I will continue.',
    [
      new Image(
        'La Sainté Lyon',
        'La Sainté Lyon is a mythical race which begins at Saint-Etienne and leads to Lyon. ' +
        'It is a race which starts at midnight and is 80 km long with 2100m of elevation gain and 2400m of elevation loss. ' +
        'In 2017 I ran it in relay with three other friends. I did the 21 last kilometers. In 2018 I will try to the full one.',
        'saintelyon.jpg',
        true
      ),
      new Image(
        'Gouffre d\'Enfer dam',
        'Saint-Étienne is next to the regional park of "Le Pilat", it is there I mostly run.  ' +
        'It is a green mountain with lot of trails. One of them leads to the dam of the above picture. ' +
        'The landscape is amazing and it is quite resourcing to run there.',
        'running2.jpg',
        true
      ),
      new Image(
        'Les Deux Alpes Snow Trail',
        'Last winter I participated to the Snow Trail of Les Deux Alpes ski station. ' +
        'It is a 20km Trail with 700m of elevation gain. I was running in deep snow, in the dark, in a blizzard. ' +
        'It was a very good experience and I will probably do it again this year.',
        'snow-trail.jpg',
        true
      )
    ]
  ),
  new Hobby(
    'Climbing',
    'climbing',
    'I climb on average once a week. I started in 2009 thank to my uncle who is a climbing teacher and ' +
    'it became the first sport I truly liked. ' +
    'I liked it so much that I integrated my county team and started to practise four times a week. ' +
    'I did some competitions but I prefer practising it for the pleasure.<br><br>' +
    'It is a very complete sport which train lot of muscle and keep me fit and healthy. ' +
    'I love climbing because there are many ways to climb, technique could compensate strength. ' +
    'Moreover climbing could be practised indoor and outdoor on infinite among of routes. ' +
    'Furthermore climbing is no longer dangerous with contemporary safety tools and techniques.<br><br>' +
    'I stopped climbing for 2 years when I came to the engineering school because of the community life. ' +
    'But I restarted to climb in June 2018 during my internship in Netherlands and I will continue.',
    [
      new Image(
        'Neoliet Bolder Rotterdam',
        'During my internship at Rotterdam I climbed in a bolder house names Neoliet. ' +
        'Bolder are short sequences of hard movements. It is practised without rope, there are huge mattress to cushion the falls. ' +
        'It is the best way to train because it develops strength and stamina.',
        'neoliet.jpg',
        true
      ),
      new Image(
        'My climbing room at Auxerre',
        'I started climbing in this room in my town (Auxerre). It is a 12 meters high wall with lot of routes. ' +
        'Ropes and harness are needed to climb safely.',
        'saeauxerre.gif',
        true
      ),
      new Image(
        'Le Saussois',
        'This is the nearest cliff from my parent\'s home. It is a famous climbing spot in France. ' +
        'When the weather was fine, I used to climb there on weekend. This picture was taken during an outdoor challenge. ' +
        'One of the activities was this huge jump between the two cliff, it was awesome.',
        'saussois.jpg',
        true
      )
    ]
  ),
  new Hobby(
    'Skiing',
    'skiing',
    'I ski at least twice a year. ' +
    'I ski since I was a kid thank to my father who love skiing too and who have a little flat in the Alpes. ' +
    'I took courses when I was young but I quickly stopped because I prefer skiing without following a teacher. ' +
    'I have my own equipment with two pair of ski, one for slopes and the other to freeride.',
    [
      new Image(
        'video',
        'In 2017 I went a day at Les Deux Alpes ski station with two friends. We turned this clip to promote the ski week of the shcool.',
        'https://www.youtube.com/embed/myi-e0Nf9vY',
        true
      ),
      new Image(
        'video',
        'In 2018 I was treasurer of the ski association of the school. We organized a week at Val d\'Allos for 70 students. ' +
        'This the aftermovie of the week.',
        'https://www.youtube.com/embed/aohSbZc53NM',
        true
      ),
      new Image(
        'Mont Blanc at Praz-sur-Arly',
        'The apartment of my father is in the little ski station of Praz-sur-Arly. I go there once a year. ' +
        'The ski area has a vue on the Mont Blanc which is in background of this picture took in 2018.',
        'praz2018montblanc.jpg',
        true
      )
    ]
  ),
  new Hobby(
    'Cooking',
    'cooking',
    'I enjoy cooking. Even when I cook for myself I try to do something tasty and it does not bother me to spend time on it. ' +
    'But I also like cooking for other. I often organize some meals with friends. ' +
    'Moreover at the engineering school I became the president of the Associflard. ' +
    'It is a student association which organize some meals for students but also other pioneering events about food. ',
    [
      new Image(
        'Barbecue Students-Teachers',
        'Once a year, the Associflard organize a barbecue for both students and teachers of the Écolde des mines de Saint-Étienne. ' +
        'It is a friendly moment where these two groups could exchange, gathered by the food.',
        'bbq-permanenteleve2018.jpg',
        true
      ),
      new Image(
        'Culinary Hike',
        'One of the best event of the Associflard is the culinary hike. It is a hike of around 6 km in the regional park of "Le Pilat". ' +
        'This hike start with an aperitif and continue with several stop to take the starter, the dish and the dessert.<br>' +
        'What is most beautiful than walking in wonderful landscape and eating good food ?',
        'marchegourmande.jpg',
        true
      ),
      new Image(
        'Floor Meal',
        'In the student house of the engineering school, we were grouped by floor. ' +
        'We often organize some meals with all the friends of the floor.',
        'repasetage.jpeg',
        true
      )
    ]
  ),
  new Hobby(
    'Crafting',
    'crafting',
    'I have always been a manual guy. I like do the thing by myself. So when I need something I craft it. ' +
    'Since I was a kid I love being in my grandfather workshop using tools. ' +
    'Naturally since I left home I have my own tools and I continue to craft and repair things around me. ' +
    'At the student house of the engineering school I was the guy people will meet when they need to craft something.',
    [
      new Image(
        'Circle bar',
        'As vice-president of the student office I participated to the organization of parties. ' +
        'For our bars we had only regular rectangular tables and for a party we needed a circular one. So I crafted it with broken tables.',
        'circlebar.jpg',
        true
      ),
      new Image(
        'Wood bow tie',
        'For the engineering school Gala of 2018, with a group of friend we wanted an original bow tie. ' +
        'I crafted some wood bow tie with a bamboo cutting board.',
        'noeudgala.jpg',
        true
      )
    ]
  )
];
