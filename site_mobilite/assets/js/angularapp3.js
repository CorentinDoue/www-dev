var app = angular.module('myApp3', ['ngSanitize']);
app.controller('mainController', ['$scope','$sce', function ($scope,$sce) {

	function Search(){
		this.type=false;
		this.destination_init=false;
		this.parcour_init=false;
	}

	$scope.search = new Search();
	//$scope.$apply();

	$scope.init_destination=function(){
		if (!$scope.search.destination_init) 
		{
			function extract(element,array) {
			if (array.indexOf(element)==array.length-1)
			{
				array.pop();
			}else{
				var temp = array.pop();
				array[array.indexOf(element)]=temp;
			}
			return array;

			}

			function Critere(checkable, type) {
				this.resume="indifférent";
				this.checked=[];
				this.isactive=false;
				this.checkable=checkable;
				this.type=type;
				this.visible=true;
				this.select="Tout sélectionner";

				this.maj_resume=function(){
					if (this.checked.length==0) {
						this.resume="indifférent";
						this.select="Tout sélectionner";
					}else{
						if (this.checked.length==1) {
							this.resume=this.checked[0];
							this.select="Tout sélectionner";
						}
						else {
							if(this.checked.length==this.checkable.length)
							{
								this.resume="indifférent";
								this.select="Tout désélectionner";
							}else{
								this.resume=this.checked.length+" "+this.type+" selectionnés";
								this.select="Tout sélectionner";
							}
						}
					}
				}

				this.uncheck=function(str){
					if (~this.checked.indexOf(str)){
						extract(str,this.checked);
						this.maj_resume();
					}
				}

				this.check=function(str){
					this.checked.push(str);
					this.maj_resume();
				}

				this.isin=function(str){
					if (~this.checked.indexOf(str)) {
						return true;
					}else{
						return false;
					}
				}

				this.selectall=function() {
					if (this.checked.length==this.checkable.length)
					{
						this.checked=[];
					}else{
						this.checked=this.checkable.concat([]);
					}
					this.maj_resume();
				}
			}

			
			function Search_dest(mobilities,domaines,langues,continents,authorized_pays,authorized_villes,conventions){
				this.nom="";
				this.mobilities=new Critere(mobilities,"types de mobilités");
				this.domaines=new Critere(domaines,"domaines d'étude");
				this.langues=new Critere(langues,"langues");
				this.continents=new Critere(continents,"continents");
				this.authorized_pays=authorized_pays;
				this.authorized_villes=authorized_villes;
				this.pays=new Critere(this.authorized_pays.pays.concat([]),"pays");
				this.villes=new Critere(this.authorized_villes.villes.concat([]),"villes");
				this.conventions=new Critere(conventions,"conventions");
				

				this.maj_pays=function(){
					var i=0;
					for (i=0; i<this.authorized_pays.continent.length; i++){ // On parcours chaque pays et on vérifie s'il doit être dans la liste des pays
						if (~this.continents.checked.indexOf(this.authorized_pays.continent[i]) || this.continents.resume=="indifférent") {
							if (~this.pays.checkable.indexOf(this.authorized_pays.pays[i])==0) {
								this.pays.checkable.push(this.authorized_pays.pays[i]); // s'il doit y être et qu'il n'y est pas, on l'ajoute
							}
						}else{
							if (~this.pays.checkable.indexOf(this.authorized_pays.pays[i])) {
								this.pays.checkable=extract(this.authorized_pays.pays[i],this.pays.checkable); // s'il ne doit pas y être et qu'il y est, on l'enlève
							}
						}
					}
					this.pays.checkable.sort();
					i=0;
					while(i<this.pays.checked.length){ // On enlève les éventuels pays cochés qui ne sont pas dans la liste des pays
						if (~this.pays.checkable.indexOf(this.pays.checked[i])) {
							i++;
						}else{
							this.pays.checked=extract(this.pays.checked[i],this.pays.checked);
						}
					}
					this.pays.maj_resume();
					this.maj_villes();
				}

				this.maj_villes=function(){
					var i=0;
					for (i=0; i<this.authorized_villes.pays.length; i++){ // On parcours chaque villes et on vérifie s'il doit être dans la liste des villes
						if (~this.pays.checked.indexOf(this.authorized_villes.pays[i])) {
							if (~this.villes.checkable.indexOf(this.authorized_villes.villes[i])==0) {
								this.villes.checkable.push(this.authorized_villes.villes[i]); // s'il doit y être et qu'il n'y est pas, on l'ajoute
							}
						}else{
							if (this.pays.resume=="indifférent" && (~this.pays.checkable.indexOf(this.authorized_villes.pays[i])!=0)) {
								if (~this.villes.checkable.indexOf(this.authorized_villes.villes[i])==0) {
									this.villes.checkable.push(this.authorized_villes.villes[i]); // s'il doit y être et qu'il n'y est pas, on l'ajoute
								}

							}else{
								if (~this.villes.checkable.indexOf(this.authorized_villes.villes[i])) {
									this.villes.checkable=extract(this.authorized_villes.villes[i],this.villes.checkable); // s'il ne doit pas y être et qu'il y est, on l'enlève
								}
							}
						}
					}
					this.villes.checkable.sort();
					i=0;
					while(i<this.villes.checked.length){ // On enlève les éventuels villes cochés qui ne sont pas dans la liste des villes
						if (~this.villes.checkable.indexOf(this.villes.checked[i])) {
							i++;
						}else{
							this.villes.checked=extract(this.villes.checked[i],this.villes.checked);
						}
					}
					this.villes.maj_resume();
				}
			}	

			

			$scope.propertyName = 'id';
			$scope.reverse = true;

			$scope.sortBy = function(propertyName) {
				$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
				$scope.propertyName = propertyName;
			};
		    
			var correct_type_mobilite = function (element){
			    if (/S\s*7/i.test(element))
			    {
			    element='S7';
			    return element;
			    }
			    if (/F\s*R/i.test(element))
			    {
			    element='FR';
			    return element;
			    }
			    if (/France/i.test(element))
			    {
			    element='FR';
			    return element;
			    }
			    if (/De?é?part\s*e?n?\s*France/i.test(element))
			    {
			    element='FR';
			    return element;
			    }
			    if (/S\s*10/i.test(element))
			    {
			    element='S10';
			    return element;
			    }
			    if (/Stage\s*2A/i.test(element))
			    {
			    element='stage_2A';
			    return element;
			    }
			    if (/D\s*D/i.test(element))
			    {
			    element='DD';
			    return element;
			    }
			    if (/Doubles?\s*Diplomes?/i.test(element))
			    {
			    element='DD';
			    return element;
			    }
			    if (/T\s*F\s*E/i.test(element))
			    {
			    element='TFE';
			    return element;
			    }
			    if (/Travail\s*d?e?\s*Fin\s*d?'?é?e?tudes?/i.test(element))
			    {
			    element='TFE';
			    return element;
			    }
			    if (/Stage\s*d?e?\s*Fin\s*d?'é?e?tudes?/i.test(element))
			    {
			    element='TFE';
			    return element;
			    }
			    return element; 
			};



		    $scope.ischerched = function(destination){
		    	var Bmobilities = false, Bdomaines = false, Blangues = false, Bville = false, Bconvention = false;

		    	if ($scope.search_dest.mobilities.checked.length==0){
		    		Bmobilities = true;
		    	} else {
		    		var checked = $scope.search_dest.mobilities.checked.map(correct_type_mobilite);
		    		for(var i=0;i<destination.types_mobilites.length;i++)
		    		{
		    			if (~checked.indexOf(destination.types_mobilites[i])) {
		    				Bmobilities = true;
		    			}
		    		}
		    	}

		    	if ($scope.search_dest.domaines.checked.length==0){
		    		Bdomaines = true;
		    	} else {
		    		for(var i=0;i<destination.domaines.length;i++)
		    		{
		    			if (~$scope.search_dest.domaines.checked.indexOf(destination.domaines[i])) {
		    				Bdomaines = true;
		    			}
		    		}
		    	}

		    	if ($scope.search_dest.langues.checked.length==0){
		    		Blangues = true;
		    	} else {
		    		for(var i=0;i<destination.langues.length;i++)
		    		{
		    			if (~$scope.search_dest.langues.checked.indexOf(destination.langues[i])) {
		    				Blangues = true;
		    			}
		    		}
		    	}

		    	if ($scope.search_dest.villes.checked.length==0) {
		    		if (~$scope.search_dest.villes.checkable.indexOf(destination.ville)) {
		    			Bville = true;
		    		}
		    	}else{
		    		if (~$scope.search_dest.villes.checked.indexOf(destination.ville)) {
		    			Bville = true;
		    		}
		    	}

		    	if ($scope.search_dest.conventions.checked.length==0) { 
		    		Bconvention = true;
		    	}else{
				    for(var i=0;i<$scope.search_dest.conventions.checked.length;i++)
		    		{	
		    			var myRegex = new RegExp($scope.search_dest.conventions.checked[i], "i");
			    		if (myRegex.test(destination.type_convention)) {
			    			Bconvention = true;
			    		}
			    	}
		    	}

		    	return (Bmobilities && Bdomaines && Blangues && Bville && Bconvention);
		    };

			function nl2br (str, is_xhtml) {
			    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
			    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
			} 

			var answer;
			var xhttp2 = new XMLHttpRequest();
		    xhttp2.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/
		            answer = angular.fromJson(this.responseText);

		            $scope.destinations = answer.destinations;
		            
		            $scope.search_dest = new Search_dest(answer.mobilities,answer.domaines,answer.langues,answer.continents,answer.authorized_pays,answer.authorized_villes,answer.conventions);
		            $scope.search.destination_init=true;	            
		            $scope.$apply();

		        }
		    };
		    xhttp2.open("GET", "php/querydestinations.php", true);
		    xhttp2.send();
		}
	};

$scope.init_parcour=function(){
		if (!$scope.search.parcour_init) 
		{
			function extract(element,array) {
			if (array.indexOf(element)==array.length-1)
			{
				array.pop();
			}else{
				var temp = array.pop();
				array[array.indexOf(element)]=temp;
			}
			return array;

			}

			function Critere(checkable, type) {
				this.resume="indifférent";
				this.checked=[];
				this.isactive=false;
				this.checkable=checkable;
				this.type=type;
				this.visible=true;
				this.select="Tout sélectionner";

				this.maj_resume=function(){
					if (this.checked.length==0) {
						this.resume="indifférent";
						this.select="Tout sélectionner";
					}else{
						if (this.checked.length==1) {
							this.resume=this.checked[0];
							this.select="Tout sélectionner";
						}
						else {
							if(this.checked.length==this.checkable.length)
							{
								this.resume="indifférent";
								this.select="Tout désélectionner";
							}else{
								this.resume=this.checked.length+" "+this.type+" selectionnés";
								this.select="Tout sélectionner";
							}
						}
					}
				}

				this.uncheck=function(str){
					if (~this.checked.indexOf(str)){
						extract(str,this.checked);
						this.maj_resume();
					}
				}

				this.check=function(str){
					this.checked.push(str);
					this.maj_resume();
				}

				this.isin=function(str){
					if (~this.checked.indexOf(str)) {
						return true;
					}else{
						return false;
					}
				}

				this.selectall=function() {
					if (this.checked.length==this.checkable.length)
					{
						this.checked=[];
					}else{
						this.checked=this.checkable.concat([]);
					}
					this.maj_resume();
				}
			}

			
			function Search_parcour(mobilities,promos,continents,authorized_pays,authorized_villes){
				this.nom="";
				this.mobilities=new Critere(mobilities,"types de mobilités");
				this.promos=new Critere(promos,"promos");
				this.continents=new Critere(continents,"continents");
				this.authorized_pays=authorized_pays;
				this.authorized_villes=authorized_villes;
				this.pays=new Critere(this.authorized_pays.pays.concat([]),"pays");
				this.villes=new Critere(this.authorized_villes.villes.concat([]),"villes");
				
				

				this.maj_pays=function(){
					var i=0;
					for (i=0; i<this.authorized_pays.continent.length; i++){ // On parcours chaque pays et on vérifie s'il doit être dans la liste des pays
						if (~this.continents.checked.indexOf(this.authorized_pays.continent[i]) || this.continents.resume=="indifférent") {
							if (~this.pays.checkable.indexOf(this.authorized_pays.pays[i])==0) {
								this.pays.checkable.push(this.authorized_pays.pays[i]); // s'il doit y être et qu'il n'y est pas, on l'ajoute
							}
						}else{
							if (~this.pays.checkable.indexOf(this.authorized_pays.pays[i])) {
								this.pays.checkable=extract(this.authorized_pays.pays[i],this.pays.checkable); // s'il ne doit pas y être et qu'il y est, on l'enlève
							}
						}
					}
					this.pays.checkable.sort();
					i=0;
					while(i<this.pays.checked.length){ // On enlève les éventuels pays cochés qui ne sont pas dans la liste des pays
						if (~this.pays.checkable.indexOf(this.pays.checked[i])) {
							i++;
						}else{
							this.pays.checked=extract(this.pays.checked[i],this.pays.checked);
						}
					}
					this.pays.maj_resume();
					this.maj_villes();
				}

				this.maj_villes=function(){
					var i=0;
					for (i=0; i<this.authorized_villes.pays.length; i++){ // On parcours chaque villes et on vérifie s'il doit être dans la liste des villes
						if (~this.pays.checked.indexOf(this.authorized_villes.pays[i])) {
							if (~this.villes.checkable.indexOf(this.authorized_villes.villes[i])==0) {
								this.villes.checkable.push(this.authorized_villes.villes[i]); // s'il doit y être et qu'il n'y est pas, on l'ajoute
							}
						}else{
							if (this.pays.resume=="indifférent" && (~this.pays.checkable.indexOf(this.authorized_villes.pays[i])!=0)) {
								if (~this.villes.checkable.indexOf(this.authorized_villes.villes[i])==0) {
									this.villes.checkable.push(this.authorized_villes.villes[i]); // s'il doit y être et qu'il n'y est pas, on l'ajoute
								}

							}else{
								if (~this.villes.checkable.indexOf(this.authorized_villes.villes[i])) {
									this.villes.checkable=extract(this.authorized_villes.villes[i],this.villes.checkable); // s'il ne doit pas y être et qu'il y est, on l'enlève
								}
							}
						}
					}
					this.villes.checkable.sort();
					i=0;
					while(i<this.villes.checked.length){ // On enlève les éventuels villes cochés qui ne sont pas dans la liste des villes
						if (~this.villes.checkable.indexOf(this.villes.checked[i])) {
							i++;
						}else{
							this.villes.checked=extract(this.villes.checked[i],this.villes.checked);
						}
					}
					this.villes.maj_resume();
				}
			}	

			

			$scope.propertyName = 'id';
			$scope.reverse = true;

			$scope.sortBy = function(propertyName) {
				$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
				$scope.propertyName = propertyName;
			};
		    
			var correct_type_mobilite = function (element){
			    if (/S\s*7/i.test(element))
			    {
			    element='S7';
			    return element;
			    }
			    if (/F\s*R/i.test(element))
			    {
			    element='FR';
			    return element;
			    }
			    if (/France/i.test(element))
			    {
			    element='FR';
			    return element;
			    }
			    if (/De?é?part\s*e?n?\s*France/i.test(element))
			    {
			    element='FR';
			    return element;
			    }
			    if (/S\s*10/i.test(element))
			    {
			    element='S10';
			    return element;
			    }
			    if (/Stage\s*2A/i.test(element))
			    {
			    element='stage_2A';
			    return element;
			    }
			    if (/D\s*D/i.test(element))
			    {
			    element='DD';
			    return element;
			    }
			    if (/Doubles?\s*Diplomes?/i.test(element))
			    {
			    element='DD';
			    return element;
			    }
			    if (/T\s*F\s*E/i.test(element))
			    {
			    element='TFE';
			    return element;
			    }
			    if (/Travail\s*d?e?\s*Fin\s*d?'?é?e?tudes?/i.test(element))
			    {
			    element='TFE';
			    return element;
			    }
			    if (/Stage\s*d?e?\s*Fin\s*d?'é?e?tudes?/i.test(element))
			    {
			    element='TFE';
			    return element;
			    }
			    return element; 
			};



		    $scope.ischerched2 = function(parcour){
		    	var Bmobilities = false, Bpromos = false, Bville = false;

		    	if ($scope.search_parcour.mobilities.checked.length==0){
		    		Bmobilities = true;
		    	} else {
		    		var checked = $scope.search_parcour.mobilities.checked.map(correct_type_mobilite);
		    		for(var i=0;i<parcour.types_mobilites.length;i++)
		    		{
		    			if (~checked.indexOf(parcour.types_mobilites)) {
		    				Bmobilities = true;
		    			}
		    		}
		    	}

		    	if ($scope.search_parcour.promos.checked.length==0){
		    		Bpromos = true;
		    	} else {
		    		if (~$scope.search_parcour.promos.checked.indexOf(parcour.promo)) {
		    			Bpromos = true;
		    		}
		    		
		    	}

		    	

		    	if ($scope.search_parcour.villes.checked.length==0) {
		    		if (~$scope.search_parcour.villes.checkable.indexOf(parcour.ville)) {
		    			Bville = true;
		    		}
		    	}else{
		    		if (~$scope.search_parcour.villes.checked.indexOf(parcour.ville)) {
		    			Bville = true;
		    		}
		    	}


		    	return (Bmobilities && Bpromos && Bville );
		    };

			function nl2br (str, is_xhtml) {
			    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
			    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
			} 

			var answer;
			var xhttp2 = new XMLHttpRequest();
		    xhttp2.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/
		            answer = angular.fromJson(this.responseText);

		            $scope.parcours = answer.parcours;
		            
		            $scope.search_parcour = new Search_parcour(answer.mobilities,answer.promos,answer.continents,answer.authorized_pays,answer.authorized_villes);
		            $scope.search.parcour_init=true;	            
		            $scope.$apply();

		        }
		    };
		    xhttp2.open("GET", "php/queryparcours.php", true);
		    xhttp2.send();
		}
	};

	$scope.layer=false;
	$scope.layer2=false;
	$scope.layer3=false;

	
	$scope.lay=function (nb){
		var test = document.getElementById('test');
		test.style.overflow="hidden";
		$scope.layer=true;
		if (nb=='2') {
			$scope.layer2=true;
		}
		if (nb=='3') {
			$scope.layer3=true;
		}
	}
	$scope.unlay=function(){
		var test = document.getElementById('test');
		test.style.overflow="scroll";
		$scope.layer=false;
		$scope.layer2=false;
		$scope.layer3=false;
	}

	$scope.exist_destination_class= function(new_name)
	{	
		if (new_name)
		{
			if (new_name.length>2)
			{	var classe = "correct_input";
				var i = 0;
				var run = true;
				var myRegex = new RegExp(new_name, "i");

				while ( i < $scope.destinations.length && run) 
				{	
					var myRegex2 = new RegExp($scope.destinations[i].nom, "i");							
					if (myRegex.test($scope.destinations[i].nom) && myRegex2.test(new_name))
					{
						classe = "wrong_input";
						run = false;
					}else{
						
						if ( myRegex.test($scope.destinations[i].nom)) 
						{
							if (classe!='wrong_input') 
							{
								classe = "weird_input";
							}											
						}
					}
					i++;
				}
				return classe
			}
		}
		return "";
	};

	$scope.exist_destination= function(new_name)
	{
		if (new_name)
		{
			if (new_name.length>2)
			{	var text = "C'est bien une nouveau destination";
				var i = 0;
				var run = true;
				var myRegex = new RegExp(new_name, "i");
				while ( i < $scope.destinations.length && run) 
				{	
					var myRegex2 = new RegExp($scope.destinations[i].nom, "i");							
					if (myRegex.test($scope.destinations[i].nom) && myRegex2.test(new_name))
					{
						text = "Cette destination existe déjà";
					}else{
						
						if ( myRegex.test($scope.destinations[i].nom)) 
						{
							if (text!="Cette destination existe déjà")
							{
								text= "Une destination ressemble : "+$scope.destinations[i].nom;
							}											
						}
					}
					i++;
				}
				return text
			}
		}
		return false;
	};

	$scope.new_destination=function(new_name)
	{
		var continu = true;
		if ($scope.exist_destination(new_name)=="Cette destination existe déjà") {
			continu=false
			alert("La destination existe déjà");
		}
		
		if (!new_name || new_name=="") {
			continu=false;
			alert("La destination doit avoir un nom")
		}
		if (continu)
		{
			$scope.unlay();
			document.location.href="newdestination.php?name="+new_name;
		}
	};
	
}]);


