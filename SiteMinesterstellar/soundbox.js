$(document).ready(function(){
	soundManager.url = 'swf/';
	soundManager.debugMode = true;	
})

soundManager.onload = function(){

	titres = ["Ah !", "Bah ouais ma soeur", "Ca me rajeunie", "Congolexicomatisation", "Crackid", "Eddy Malou", "Essaie pas d'niaiser là", "Execpté une fois au chalet", "Filme mes pieds", "I've fallen, and I can't get up!", "Jacques !", "J'ai jamais touché mes filles", "Je détruis ton vagin", "Jeanne au secours !", "La musique est incroyable", "Lalala", "L'alcool c'est de l'eau", "Le rayon spectral", "L'évènement est incroyable !", "Mais oui c'est clair", "Mer noire (long)", "Mer noire", "Moi là", "Pédé !", "Popopo", "Quenouille", "Rouquin !", "Tequila Heineken", "Vib's Cartel", "MMA", "Allô", "J'aime me beurrer la biscotte", "Ferme ta gueule !", "Je vais vous enculer vos morts", "La calotte de ses morts", "Le sang de leurs morts", "Ta femme je l'ai prise je l'ai enculée", "Je lui ai déchargé dans la bouche", "Avec un T comme t'es là", "C'est la levrette de votre vie", "Jt'ai cassé", "Trop beau, trop merveilleux", "Tu es grosse Mélisandre", "Tu es mauvais Jack", "Tu peux perdre une carte", "John Cena", "Leviosa", "Cuir et Moustache", "J'ai compté les paquets de chips", "Je te lèche tout ça", "Même qui te reste de la merde", "Tu me fais bander comme un taureau !", "Tu me pisses dans un verre", "Je suis pas venue ici pour souffrir2", "Ok"];	
	Sons = new Array();
	
	for (i=0; i<=titres.length; i++){
		Sons.push(soundManager.createSound({id:titres[i],url:"Sons/"+titres[i]+".mp3",volume:100}));
	}
}

Jouer = function(n){

	if (!(typeof memory === 'undefined')){
		Sons[memory-1].stop();
	}
	
	Sons[n-1].play();
	memory = n;
	
}