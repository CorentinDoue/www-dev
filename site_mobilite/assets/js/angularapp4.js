var app = angular.module('myApp4', ['ngSanitize', 'ngFileUpload']);
app.controller('mainController', ['$scope','$sce','Upload', function ($scope,$sce,Upload) {

	
	function maj (){
		if ($scope.destination.places==0)
		{
			$scope.destination.text_places="Attention !<br>Il n'y a pas de place offerte par les partenariats de l'école.";
		}else{
			if ($scope.destination.places==1) {
				$scope.destination.text_places="Il y a "+$scope.destination.places+" place offerte par les partenariats de l'école.<br>Cette place est en priorité pour les départs en S7.";
			}else{
				$scope.destination.text_places="Il y a "+$scope.destination.places+" places offertes par les partenariats de l'école.<br>Ces places sont en priorité pour les départs en S7.";
			}
		}
	}

	function init_type(){
		if (~$scope.destination.types_mobilites.indexOf('S7')) {
			$scope.destination.type_S7= true;
		}else{
			$scope.destination.type_S7= false;
		}
		if (~$scope.destination.types_mobilites.indexOf('FR')) {
			$scope.destination.type_FR= true;
		}else{
			$scope.destination.type_FR= false;
		}
		if (~$scope.destination.types_mobilites.indexOf('S10')) {
			$scope.destination.type_S10= true;
		}else{
			$scope.destination.type_S10= false;
		}
		if (~$scope.destination.types_mobilites.indexOf('stage_2A')) {
			$scope.destination.type_stage_2A= true;
		}else{
			$scope.destination.type_stage_2A= false;
		}
		if (~$scope.destination.types_mobilites.indexOf('DD')) {
			$scope.destination.type_DD= true;
		}else{
			$scope.destination.type_DD= false;
		}
		if (~$scope.destination.types_mobilites.indexOf('TFE')) {
			$scope.destination.type_TFE= true;
		}else{
			$scope.destination.type_TFE= false;
		}
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

	            $scope.destination = answer;
	            $scope.destination.places=Number($scope.destination.places);
	            
	            maj();												
				init_type();							
	            
	            $scope.$apply();
	        }
	    };
	    xhttp2.open("GET", "php/querydestination.php?key="+Id_of_key, true);
	    xhttp2.send();

	  function modif ()
	  {
	  	this.titre=false;
	  	this.compl=false;
	  	this.site=false;
	  	this.desc=false;
	  	this.com=false;
	  	this.places=false;
	  	this.type_mobilite=false;
	  }

	  $scope.modif = new modif();

	  $scope.modif_titre=function(){
	  	$scope.modif.titre=true;

	  };

	  $scope.sav_titre=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.titre=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&titre='+$scope.destination.nom);


	  };

	  $scope.modif_compl=function(){
	  	$scope.modif.compl=true;
	  };

	  $scope.sav_compl=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.compl=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&compl='+$scope.destination.complement_nom);
	  	
	  };

	  $scope.modif_site=function(){
	  	$scope.modif.site=true;
	  };

	  $scope.sav_site=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.site=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&site='+$scope.destination.site);
	  	
	  };

	  $scope.modif_desc=function(){
	  	$scope.modif.desc=true;
	  };

	  $scope.sav_desc=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.desc=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&desc='+$scope.destination.description);
	  	
	  };

	  $scope.modif_com=function(){
	  	$scope.modif.com=true;
	  };

	  $scope.sav_com=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.com=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&com='+$scope.destination.commentaires);
	  	
	  };

	  $scope.modif_places=function(){
	  	$scope.modif.places=true;
	  };

	  $scope.sav_places=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.places=false;
	  				maj();
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&places='+$scope.destination.places);
	  	
	  };
	
	$scope.modif_type_mobilite=function(){
	  	$scope.modif.type_mobilite=true;
	  };

	  function type_mobilite2str(){
	  	var first=true;
	  	var answer="";
	  	if ($scope.destination.type_S7) {
	  		if (first) {
	  			first=false;
	  		}else{
	  			answer+=" / "
	  		}
	  		answer+="S7"
	  	}
	  	if ($scope.destination.type_stage_2A) {
	  		if (first) {
	  			first=false;
	  		}else{
	  			answer+=" / "
	  		}
	  		answer+="Stage 2A"
	  	}
	  	if ($scope.destination.type_FR) {
	  		if (first) {
	  			first=false;
	  		}else{
	  			answer+=" / "
	  		}
	  		answer+="FR"
	  	}
	  	if ($scope.destination.type_S10) {
	  		if (first) {
	  			first=false;
	  		}else{
	  			answer+=" / "
	  		}
	  		answer+="S10"
	  	}
	  	if ($scope.destination.type_DD) {
	  		if (first) {
	  			first=false;
	  		}else{
	  			answer+=" / "
	  		}
	  		answer+="DD"
	  	}
	  	
	  	if ($scope.destination.type_TFE) {
	  		if (first) {
	  			first=false;	  			
	  		}else{
	  			answer+=" / "
	  		}
	  		answer+="TFE"
	  	}
	  	return answer;
	  }

	  $scope.sav_type_mobilite=function(){
	  	var xhttp3 = new XMLHttpRequest();
	    xhttp3.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.modif.type_mobilite=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&types_mobilites='+type_mobilite2str());
	  	
	  };


	$scope.layer=false;
	$scope.layer2=false;
	$scope.layer3=false;
	$scope.layer4=false;
	$scope.layer5=false;
	$scope.layer6=false;

	
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
		if (nb=='4') {
			$scope.layer4=true;
		}
		if (nb=='5') {
			$scope.layer5=true;
		}
		if (nb=='6') {
			$scope.layer6=true;
			$scope.uploaddone=false;
		}
	}
	$scope.unlay=function(){
		var test = document.getElementById('test');
		test.style.overflow="scroll";
		$scope.layer=false;
		$scope.layer2=false;
		$scope.layer3=false;
		$scope.layer4=false;
		$scope.layer5=false;
		$scope.layer6=false;
	}

	function modif_ville(){
		this.type="undefinded";
		this.type_selection=false;
		this.type_new=false;
		this.selection={};
		this.new_pays=false;
	}
	$scope.modif_ville=new modif_ville();

	$scope.init_ville = function()
	{
		if (!$scope.modif_ville.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/			var answer = angular.fromJson(this.responseText);
					
					$scope.villes = answer;
					var j = 0;
					var a=true;
					while (j<$scope.villes.length && a ){
						if ($scope.villes[j].ID==$scope.destination.ID_Ville) {
							
							$scope.modif_ville.selection=$scope.villes[j];
							a=false;
							$scope.$apply();
						}else{
							j++;
						}
					}
					$scope.modif_ville.type_selection=true;
		            
		        }
		    };

		    xhttp3.open("GET", "php/queryvilles.php", true); 
		    xhttp3.send();
		}
	};

	$scope.sav_ville=function(Ville){
		
	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.unlay();
	  				$scope.destination.ville=Ville.ville;
	  				$scope.destination.pays=Ville.pays;
				}
				
				$scope.$apply();
	            
	        }
	    };
	    
	    xhttp4.open("POST", "php/majdestination.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+Id_of_key+'&ville='+Ville.ID);
	  	
	  };


	 $scope.modif_new_ville=new modif_ville();
	$scope.init_new_ville = function()
	{
		if (!$scope.modif_new_ville.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/			var answer = angular.fromJson(this.responseText);
					
					$scope.villes = answer.villes;
					$scope.pays = answer.pays;
					$scope.continent = ["Europe","Amérique du nord","Amérique du sud","Asie","Océanie"];

					$scope.modif_new_ville.type_selection=true;
		            
		           
		        $scope.exist_ville_class= function(ville)
					{	
						if (ville)
						{
							if (ville.length>2)
							{	var classe = "correct_input";
								var i = 0;
								var run = true;
								while ( i < $scope.villes.length && run) 
								{								
									if (ville==$scope.villes[i].ville)
									{
										classe = "wrong_input";
										run = false;
									}else{
										var myRegex = new RegExp(ville, "i");
										if ( myRegex.test($scope.villes[i].ville)) 
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

					$scope.exist_ville= function(ville)
					{
						if (ville)
						{
							if (ville.length>2)
							{	var text = "C'est bien une nouvelle ville";
								var i = 0;
								var run = true;
								while ( i < $scope.villes.length && run) 
								{								
									if (ville==$scope.villes[i].ville)
									{
										text = "Cette ville existe déjà";
									}else{
										var myRegex = new RegExp(ville, "i");
										if ( myRegex.test($scope.villes[i].ville)) 
										{
											if (text!="Cette ville existe déjà")
											{
												text= "Une ville ressemble : "+$scope.villes[i].ville;
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

					 $scope.exist_pays_class= function(pays)
					{	
						if (pays)
						{
							if (pays.length>2)
							{	var classe = "correct_input";
								var i = 0;
								var run = true;
								while ( i < $scope.pays.length && run) 
								{								
									if (pays==$scope.pays[i].pays)
									{
										classe = "wrong_input";
										run = false;
									}else{
										var myRegex = new RegExp(pays, "i");
										if ( myRegex.test($scope.pays[i].pays)) 
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

					$scope.exist_pays= function(pays)
					{
						if (pays)
						{
							if (pays.length>2)
							{	var text = "C'est bien un nouveau pays";
								var i = 0;
								var run = true;
								while ( i < $scope.pays.length && run) 
								{								
									if (pays==$scope.pays[i].pays)
									{
										text = "Ce pays existe déjà";
									}else{
										var myRegex = new RegExp(pays, "i");
										if ( myRegex.test($scope.pays[i].pays)) 
										{
											if (text!="Ce pays existe déjà")
											{
												text= "Un pays ressemble : "+$scope.pays[i].pays;
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

					$scope.sav_new_ville=function(ville, pays, continent, new_pays){
						if (new_pays) {
							var continu = true;
							if ($scope.exist_pays(pays)=="Ce pays existe déjà" || $scope.exist_ville(ville)=="Cette ville existe déjà") {
								continu=false
								alert("Le pays ou la ville existe déjà");
							}
							if (!ville || ville=="") {
								continu=false;
								alert("La ville doit avoir un nom")
							}
							if (!pays || pays=="") {
								continu=false;
								alert("Le pays doit avoir un nom")
							}
							if (!continent) {
								continu=false;
								alert("Sélectionner un continent")
							}
							if (continu)
							{
								var xhttp6 = new XMLHttpRequest();
							    xhttp6.onreadystatechange = function() {	
							     if (this.readyState == 4 && this.status == 200) {					
									var error = angular.fromJson(this.responseText);
										if (!error)
										{
											$scope.unlay();
							  				$scope.destination.ville=ville;
							  				$scope.destination.pays=pays;
										}
										
										$scope.$apply();
							       }     
							        
							    };
							    
							    xhttp6.open("POST", "php/majdestination.php", true);
							    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							    xhttp6.send('ID='+Id_of_key+'&ville3='+ville+'&pays='+pays+'&continent='+continent);
							}
						}else{
							var continu = true;
							if ($scope.exist_ville(ville)=="Cette ville existe déjà") {
								continu=false;
								alert("La ville existe déjà");
							}
							if (!ville || ville=="") {
								continu=false;
								alert("La ville doit avoir un nom")
							}
							if (!pays) {
								continu=false;
								alert("Sélectionner un pays")
							}
							if (continu)
							{
								var xhttp5 = new XMLHttpRequest();
							    xhttp5.onreadystatechange = function() {
							     if (this.readyState == 4 && this.status == 200) {						
									var error = angular.fromJson(this.responseText);
										if (!error)
										{
											$scope.unlay();
							  				$scope.destination.ville=ville;
							  				$scope.destination.pays=pays.pays;
										}
										
										$scope.$apply();
							         }   
							        
							    };
							    
							    xhttp5.open("POST", "php/majdestination.php", true);
							    xhttp5.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							    xhttp5.send('ID='+Id_of_key+'&ville2='+ville+'&pays='+pays.ID);
							}
						}
					};
				}
		    };

		    xhttp3.open("GET", "php/querynewvilles.php", true); 
		    xhttp3.send();
		}
	};

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

	$scope.modif_domaine=new modif_ville();

	$scope.init_domaine = function()
	{
		if (!$scope.modif_domaine.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/			var answer = angular.fromJson(this.responseText);
					
					$scope.domaines = new Critere(answer,"domaines");
					for(i=0;i<$scope.destination.domaines.length;i++)
					{
						for(j=0;j<$scope.domaines.checkable.length;j++)
						{
							if ($scope.destination.domaines[i]==$scope.domaines.checkable[j].nom) 
							{
								$scope.domaines.checked.push($scope.domaines.checkable[j]);
							}
						}
					}
					$scope.modif_domaine.type_selection=true;
					$scope.$apply();
		            
		        }
		    };

		    xhttp3.open("GET", "php/querydomaines.php", true); 
		    xhttp3.send();
		}
	};

	$scope.sav_domaine=function(checked){
		var ID_checked=[];
		var nom_checked=[];
	    for (i=0; i<checked.length; i++)
	    {
	    	ID_checked.push(checked[i].ID);
	    	nom_checked.push(checked[i].nom);
	    }
	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.unlay();
	  				$scope.destination.domaines=nom_checked;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp4.open("POST", "php/majdestination.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+Id_of_key+'&domaines='+ID_checked);
	  	
	  };


	$scope.modif_new_domaine=new modif_ville();

	$scope.init_new_domaine = function()
	{
		if (!$scope.modif_new_domaine.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/			var answer = angular.fromJson(this.responseText);
					
					$scope.domaine = answer.domaine;
					$scope.code = answer.code;
					

					$scope.modif_new_domaine.type_selection=true;
		            
		            $scope.$apply();
		           
		         $scope.exist_domaine_class= function(domaine)
					{	
						if (domaine)
						{
							if (domaine.length>2)
							{	var classe = "correct_input";
								var i = 0;
								var run = true;
								while ( i < $scope.domaine.length && run) 
								{								
									if (domaine==$scope.domaine[i])
									{
										classe = "wrong_input";
										run = false;
									}else{
										var myRegex = new RegExp(domaine, "i");
										if ( myRegex.test($scope.domaine[i])) 
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

					$scope.exist_domaine= function(domaine)
					{
						if (domaine)
						{
							if (domaine.length>2)
							{	var text = "C'est bien un nouveau domaine";
								var i = 0;
								var run = true;
								while ( i < $scope.domaine.length && run) 
								{								
									if (domaine==$scope.domaine[i])
									{
										text = "Ce domaine existe déjà";
									}else{
										var myRegex = new RegExp(domaine, "i");
										if ( myRegex.test($scope.domaine[i])) 
										{
											if (text!="Ce domaine existe déjà")
											{
												text= "Un domaine ressemble : "+$scope.domaine[i];
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

					 $scope.exist_code_class= function(code)
					{	
						if (code)
						{
							if (code.length>0)
							{	var classe = "correct_input";
								var i = 0;
								var run = true;
								while ( i < $scope.code.length && run) 
								{								
									if (code==$scope.code[i])
									{
										classe = "wrong_input";
										run = false;
									}else{
										var myRegex = new RegExp(code, "i");
										if ( myRegex.test($scope.code[i])) 
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

					$scope.exist_code= function(code)
					{
						if (code)
						{
							if (code.length>0)
							{	var text = "C'est bien un nouveau code";
								var i = 0;
								var run = true;
								while ( i < $scope.code.length && run) 
								{								
									if (code==$scope.code[i])
									{
										text = "Ce code existe déjà";
									}else{
										var myRegex = new RegExp(code, "i");
										if ( myRegex.test($scope.code[i])) 
										{
											if (text!="Ce code existe déjà")
											{
												text= "Un code ressemble : "+$scope.code[i];
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

					$scope.sav_new_domaine=function(domaine, code){
						
						var continu = true;
						if ($scope.exist_domaine(domaine)=="Ce domaine existe déjà" || $scope.exist_code(code)=="Ce code existe déjà") {
							continu=false
							alert("Le domaine ou le code existe déjà");
						}
						if (!code || code=="") {
							continu=false;
							alert("Le code ne doit pas être vide")
						}
						if (!domaine || domaine=="") {
							continu=false;
							alert("Le domaine doit avoir un nom")
						}
						if (continu)
						{
							var xhttp6 = new XMLHttpRequest();
						    xhttp6.onreadystatechange = function() {	
						     if (this.readyState == 4 && this.status == 200) {					
								var error = angular.fromJson(this.responseText);
									if (!error)
									{
										$scope.unlay();
						  				$scope.destination.domaines.push(domaine);
						  				$scope.$apply();
									}
									
							}		
						            
						        
						    };
						    
						    xhttp6.open("POST", "php/majdestination.php", true);
						    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						    xhttp6.send('ID='+Id_of_key+'&domaine='+domaine+'&code='+code);
						}
						
						
					};
				}
		    };

		    xhttp3.open("GET", "php/querynewdomaines.php", true); 
		    xhttp3.send();
		}
	};


//Langues
	$scope.modif_langue=new modif_ville();

	$scope.init_langue = function()
	{
		if (!$scope.modif_langue.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/			var answer = angular.fromJson(this.responseText);
					
					$scope.langues = new Critere(answer,"langues");
					$scope.langues.checked=$scope.destination.langues;
					
					$scope.modif_langue.type_selection=true;
					$scope.$apply();
		            
		        }
		    };

		    xhttp3.open("GET", "php/querylangues.php", true); 
		    xhttp3.send();
		}
	};

	$scope.sav_langue=function(checked){
		
		var nom_checked="";
	    for (i=0; i<checked.length; i++)
	    {
	 		if (i<checked.length-1) {
	 			nom_checked+=checked[i]+"/";
	 		}else{
	 			nom_checked+=checked[i];
	 		}
	    	
	    }
	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	/*try {
	 JSON.parse(this.responseText);          // null
	} catch (e) {
	  console.error("Parsing error:.test(e); 
	}*/			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.unlay();
	  				$scope.destination.langues=checked;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp4.open("POST", "php/majdestination.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+Id_of_key+'&langues='+nom_checked);
	  	
	  };


	$scope.modif_new_langue=new modif_ville();

	$scope.init_new_langue = function()
	{
		if (!$scope.modif_new_langue.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		/*try {
		 JSON.parse(this.responseText);          // null
		} catch (e) {
		  console.error("Parsing error:.test(e); 
		}*/			var answer = angular.fromJson(this.responseText);
					
					$scope.langue = answer
					
					

					$scope.modif_new_langue.type_selection=true;
		            
		            $scope.$apply();
		           
		         $scope.exist_langue_class= function(langue)
					{	
						if (langue)
						{
							if (langue.length>2)
							{	var classe = "correct_input";
								var i = 0;
								var run = true;
								while ( i < $scope.langue.length && run) 
								{								
									if (langue==$scope.langue[i])
									{
										classe = "wrong_input";
										run = false;
									}else{
										var myRegex = new RegExp(langue, "i");
										if ( myRegex.test($scope.langue[i])) 
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

					$scope.exist_langue= function(langue)
					{
						if (langue)
						{
							if (langue.length>2)
							{	var text = "C'est bien une nouveau langue";
								var i = 0;
								var run = true;
								while ( i < $scope.langue.length && run) 
								{								
									if (langue==$scope.langue[i])
									{
										text = "Cette langue existe déjà";
									}else{
										var myRegex = new RegExp(langue, "i");
										if ( myRegex.test($scope.langue[i])) 
										{
											if (text!="Cette langue existe déjà")
											{
												text= "Une langue ressemble : "+$scope.langue[i];
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

					 

					

					$scope.sav_new_langue=function(langue){
						
						var continu = true;
						if ($scope.exist_langue(langue)=="Cette langue existe déjà") {
							continu=false
							alert("La langue existe déjà");
						}
						
						if (!langue || langue=="") {
							continu=false;
							alert("La langue doit avoir un nom")
						}
						if (continu)
						{	
							$scope.destination.langues.push(langue);
							var nom_checked="";
						    for (i=0; i<$scope.destination.langues.length; i++)
						    {
						 		if (i<$scope.destination.langues.length-1) {
						 			nom_checked+=$scope.destination.langues[i]+"/";
						 		}else{
						 			nom_checked+=$scope.destination.langues[i];
						 		}
						    	
						    }
							var xhttp6 = new XMLHttpRequest();
						    xhttp6.onreadystatechange = function() {	
						    if (this.readyState == 4 && this.status == 200) {					
								var error = angular.fromJson(this.responseText);
									if (!error)
									{
										$scope.unlay();
										$scope.$apply();
						  				
									}
									
							}		
						            
						        
						    };
						    
						    xhttp6.open("POST", "php/majdestination.php", true);
						    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						    xhttp6.send('ID='+Id_of_key+'&langues='+nom_checked);
						}
						
						
					};
				}
		    };

		    xhttp3.open("GET", "php/querylangues.php", true); 
		    xhttp3.send();
		}
	};
//fin langue
//Convention
	$scope.modif_convention=new modif_ville();

	$scope.init_convention = function()
	{
		if (!$scope.modif_convention.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
					var answer = angular.fromJson(this.responseText);
					
					$scope.conventions = answer;
					$scope.modif_convention.selection=$scope.destination.type_convention;
					
					$scope.modif_convention.type_selection=true;
					$scope.$apply();
		            
		        }
		    };

		    xhttp3.open("GET", "php/queryconventions.php", true); 
		    xhttp3.send();
		}
	};

	$scope.sav_convention=function(checked){
		
		
	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.unlay();
	  				$scope.destination.type_convention=checked;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp4.open("POST", "php/majdestination.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+Id_of_key+'&convention='+checked);
	  	
	  };


	$scope.modif_new_convention=new modif_ville();

	$scope.init_new_convention = function()
	{
		if (!$scope.modif_new_convention.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
				var answer = angular.fromJson(this.responseText);
					
					$scope.convention = answer;
					
					

					$scope.modif_new_convention.type_selection=true;
		            
		            $scope.$apply();
		           
		         $scope.exist_convention_class= function(convention)
					{	
						if (convention)
						{
							if (convention.length>2)
							{	var classe = "correct_input";
								var i = 0;
								var run = true;
								var myRegex = new RegExp(convention, "i");

								while ( i < $scope.convention.length && run) 
								{	
									var myRegex2 = new RegExp($scope.convention[i], "i");							
									if (myRegex.test($scope.convention[i]) && myRegex2.test(convention))
									{
										classe = "wrong_input";
										run = false;
									}else{
										
										if ( myRegex.test($scope.convention[i])) 
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

					$scope.exist_convention= function(convention)
					{
						if (convention)
						{
							if (convention.length>2)
							{	var text = "C'est bien une nouveau convention";
								var i = 0;
								var run = true;
								var myRegex = new RegExp(convention, "i");
								while ( i < $scope.convention.length && run) 
								{	
									var myRegex2 = new RegExp($scope.convention[i], "i");							
									if (myRegex.test($scope.convention[i]) && myRegex2.test(convention))
									{
										text = "Cette convention existe déjà";
									}else{
										
										if ( myRegex.test($scope.convention[i])) 
										{
											if (text!="Cette convention existe déjà")
											{
												text= "Une convention ressemble : "+$scope.convention[i];
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

					 

					

					$scope.sav_new_convention=function(convention){
						
						var continu = true;
						if ($scope.exist_convention(convention)=="Cette convention existe déjà") {
							continu=false
							alert("La convention existe déjà");
						}
						
						if (!convention || convention=="") {
							continu=false;
							alert("La convention doit avoir un nom")
						}
						if (continu)
						{	
							
							var xhttp6 = new XMLHttpRequest();
						    xhttp6.onreadystatechange = function() {	
						    if (this.readyState == 4 && this.status == 200) {					
								var error = angular.fromJson(this.responseText);
									if (!error)
									{
										$scope.destination.type_convention=convention;
										$scope.unlay();
										$scope.$apply();
						  				
									}
									
							}		
						            
						        
						    };
						    
						    xhttp6.open("POST", "php/majdestination.php", true);
						    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						    xhttp6.send('ID='+Id_of_key+'&convention='+convention);
						}
						
						
					};
				}
		    };

		    xhttp3.open("GET", "php/queryconventions.php", true); 
		    xhttp3.send();
		}
	};
//fin convention
//activ
	$scope.activ=function(){
		if($scope.destination.ville=="A définir")
		{
			alert("Definissez d'abord une ville")
		}
		if($scope.destination.activ==0 && $scope.destination.ville!="A définir")
		{
			var xhttp6 = new XMLHttpRequest();
		    xhttp6.onreadystatechange = function() {	
		    if (this.readyState == 4 && this.status == 200) {					
				var error = angular.fromJson(this.responseText);
					if (!error)
					{
						$scope.destination.activ=1;						
						$scope.$apply();		  				
					}
			}		
					
		            
		        
		    };
		    
		    xhttp6.open("POST", "php/majdestination.php", true);
		    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhttp6.send('ID='+Id_of_key+'&activ=1');
		}else{
			var xhttp6 = new XMLHttpRequest();
		    xhttp6.onreadystatechange = function() {		
		    if (this.readyState == 4 && this.status == 200) {				
				var error = angular.fromJson(this.responseText);
					if (!error)
					{
						$scope.destination.activ=0;						
						$scope.$apply();		  				
					}
			}	
					
		            
		        
		    };
		    
		    xhttp6.open("POST", "php/majdestination.php", true);
		    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhttp6.send('ID='+Id_of_key+'&activ=0');
		}
	};
//fin activ

//ingenieurie
	$scope.ingenieurie=function(){
		
		if($scope.destination.ingenieurie==0)
		{
			var xhttp6 = new XMLHttpRequest();
		    xhttp6.onreadystatechange = function() {	
		    if (this.readyState == 4 && this.status == 200) {					
				var error = angular.fromJson(this.responseText);
					if (!error)
					{
						$scope.destination.ingenieurie=1;						
						$scope.$apply();		  				
					}
			}		
					
		            
		        
		    };
		    
		    xhttp6.open("POST", "php/majdestination.php", true);
		    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhttp6.send('ID='+Id_of_key+'&ingenieurie=1');
		}else{
			var xhttp6 = new XMLHttpRequest();
		    xhttp6.onreadystatechange = function() {		
		    if (this.readyState == 4 && this.status == 200) {				
				var error = angular.fromJson(this.responseText);
					if (!error)
					{
						$scope.destination.ingenieurie=0;						
						$scope.$apply();		  				
					}
			}	
					
		            
		        
		    };
		    
		    xhttp6.open("POST", "php/majdestination.php", true);
		    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhttp6.send('ID='+Id_of_key+'&ingenieurie=0');
		}
	};
//fin ingenieurie
//upload documents
	replaceDiacritics = function(str) {
		var alphabet = { 
			a:/[\u0061\u24D0\uFF41\u1E9A\u00E0\u00E1\u00E2\u1EA7\u1EA5\u1EAB\u1EA9\u00E3\u0101\u0103\u1EB1\u1EAF\u1EB5\u1EB3\u0227\u01E1\u00E4\u01DF\u1EA3\u00E5\u01FB\u01CE\u0201\u0203\u1EA1\u1EAD\u1EB7\u1E01\u0105\u2C65\u0250]/ig,
		    aa:/[\uA733]/ig,
		    ae:/[\u00E6\u01FD\u01E3]/ig,
		    ao:/[\uA735]/ig,
		    au:/[\uA737]/ig,
		    av:/[\uA739\uA73B]/ig,
		    ay:/[\uA73D]/ig,
		    b:/[\u0062\u24D1\uFF42\u1E03\u1E05\u1E07\u0180\u0183\u0253]/ig,
		    c:/[\u0063\u24D2\uFF43\u0107\u0109\u010B\u010D\u00E7\u1E09\u0188\u023C\uA73F\u2184]/ig,
		    d:/[\u0064\u24D3\uFF44\u1E0B\u010F\u1E0D\u1E11\u1E13\u1E0F\u0111\u018C\u0256\u0257\uA77A]/ig,
		    dz:/[\u01F3\u01C6]/ig,
		    e:/[\u0065\u24D4\uFF45\u00E8\u00E9\u00EA\u1EC1\u1EBF\u1EC5\u1EC3\u1EBD\u0113\u1E15\u1E17\u0115\u0117\u00EB\u1EBB\u011B\u0205\u0207\u1EB9\u1EC7\u0229\u1E1D\u0119\u1E19\u1E1B\u0247\u025B\u01DD]/ig,
		    f:/[\u0066\u24D5\uFF46\u1E1F\u0192\uA77C]/ig,
		    g:/[\u0067\u24D6\uFF47\u01F5\u011D\u1E21\u011F\u0121\u01E7\u0123\u01E5\u0260\uA7A1\u1D79\uA77F]/ig,
		    h:/[\u0068\u24D7\uFF48\u0125\u1E23\u1E27\u021F\u1E25\u1E29\u1E2B\u1E96\u0127\u2C68\u2C76\u0265]/ig,
		    hv:/[\u0195]/ig,
		    i:/[\u0069\u24D8\uFF49\u00EC\u00ED\u00EE\u0129\u012B\u012D\u00EF\u1E2F\u1EC9\u01D0\u0209\u020B\u1ECB\u012F\u1E2D\u0268\u0131]/ig,
		    j:/[\u006A\u24D9\uFF4A\u0135\u01F0\u0249]/ig,
		    k:/[\u006B\u24DA\uFF4B\u1E31\u01E9\u1E33\u0137\u1E35\u0199\u2C6A\uA741\uA743\uA745\uA7A3]/ig,
		    l:/[\u006C\u24DB\uFF4C\u0140\u013A\u013E\u1E37\u1E39\u013C\u1E3D\u1E3B\u017F\u0142\u019A\u026B\u2C61\uA749\uA781\uA747]/ig,
		    lj:/[\u01C9]/ig,
		    m:/[\u006D\u24DC\uFF4D\u1E3F\u1E41\u1E43\u0271\u026F]/ig,
		    n:/[\u006E\u24DD\uFF4E\u01F9\u0144\u00F1\u1E45\u0148\u1E47\u0146\u1E4B\u1E49\u019E\u0272\u0149\uA791\uA7A5]/ig,
		    nj:/[\u01CC]/ig,
		    o:/[\u006F\u24DE\uFF4F\u00F2\u00F3\u00F4\u1ED3\u1ED1\u1ED7\u1ED5\u00F5\u1E4D\u022D\u1E4F\u014D\u1E51\u1E53\u014F\u022F\u0231\u00F6\u022B\u1ECF\u0151\u01D2\u020D\u020F\u01A1\u1EDD\u1EDB\u1EE1\u1EDF\u1EE3\u1ECD\u1ED9\u01EB\u01ED\u00F8\u01FF\u0254\uA74B\uA74D\u0275]/ig,
		    oi:/[\u01A3]/ig,
		    ou:/[\u0223]/ig,
		    oo:/[\uA74F]/ig,
		    oe:/[\u0153]/ig,
		    p:/[\u0070\u24DF\uFF50\u1E55\u1E57\u01A5\u1D7D\uA751\uA753\uA755]/ig,
		    q:/[\u0071\u24E0\uFF51\u024B\uA757\uA759]/ig,
		    r:/[\u0072\u24E1\uFF52\u0155\u1E59\u0159\u0211\u0213\u1E5B\u1E5D\u0157\u1E5F\u024D\u027D\uA75B\uA7A7\uA783]/ig,
		    s:/[\u0073\u24E2\uFF53\u015B\u1E65\u015D\u1E61\u0161\u1E67\u1E63\u1E69\u0219\u015F\u023F\uA7A9\uA785\u1E9B]/ig,
		    ss:/[\u00DF\u1E9E]/ig,
		    t:/[\u0074\u24E3\uFF54\u1E6B\u1E97\u0165\u1E6D\u021B\u0163\u1E71\u1E6F\u0167\u01AD\u0288\u2C66\uA787]/ig,
		    tz:/[\uA729]/ig,
		    u:/[\u0075\u24E4\uFF55\u00F9\u00FA\u00FB\u0169\u1E79\u016B\u1E7B\u016D\u00FC\u01DC\u01D8\u01D6\u01DA\u1EE7\u016F\u0171\u01D4\u0215\u0217\u01B0\u1EEB\u1EE9\u1EEF\u1EED\u1EF1\u1EE5\u1E73\u0173\u1E77\u1E75\u0289]/ig,
		    v:/[\u0076\u24E5\uFF56\u1E7D\u1E7F\u028B\uA75F\u028C]/ig,
		    vy:/[\uA761]/ig,
		    w:/[\u0077\u24E6\uFF57\u1E81\u1E83\u0175\u1E87\u1E85\u1E98\u1E89\u2C73]/ig,
		    x:/[\u0078\u24E7\uFF58\u1E8B\u1E8D]/ig,
		    y:/[\u0079\u24E8\uFF59\u1EF3\u00FD\u0177\u1EF9\u0233\u1E8F\u00FF\u1EF7\u1E99\u1EF5\u01B4\u024F\u1EFF]/ig,
		    z:/[\u007A\u24E9\uFF5A\u017A\u1E91\u017C\u017E\u1E93\u1E95\u01B6\u0225\u0240\u2C6C\uA763]/ig,
		    '':/[\u0300\u0301\u0302\u0303\u0308]/ig
	  	};	  
	    for (var letter in alphabet) {
	      str = str.replace(alphabet[letter], letter);
	    }
	    return str;
	};

	$scope.upload = function (file) {
		Upload.rename(file, replaceDiacritics(file.name));
        Upload.upload({
            url: 'savedestinationfile.php',
            data: {file: file}
        }).then(function (resp) {
        	var ans = angular.fromJson(resp.data);
        	if (ans.statut=='ok') {
	        	var xhttp6 = new XMLHttpRequest();
			    xhttp6.onreadystatechange = function() {	
			    if (this.readyState == 4 && this.status == 200) {					
					var error = angular.fromJson(this.responseText);
						if (!error)
						{
							$scope.destination.document=ans.name;
							$scope.uploaddone=true;					
							$scope.$apply();
									  				
						}	            
		        }
			    };
			    
			    xhttp6.open("POST", "php/majdestination.php", true);
			    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			    xhttp6.send('ID='+Id_of_key+'&doc='+ans.name);
			}else{
				alert('Une erreur est survenue');	
				$scope.unlay();	
			}
        }, function (resp) {
            alert('Une erreur est survenue');
            $scope.unlay();	
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            $scope.progress='progress: ' + progressPercentage + '% ' + evt.config.data.file.name;
        });
    };
}]);


