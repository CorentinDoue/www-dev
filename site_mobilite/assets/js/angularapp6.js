var app = angular.module('myApp6', ['ngSanitize', 'ngFileUpload']);
app.controller('mainController', ['$scope','$sce','Upload', function ($scope,$sce,Upload) {

	
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

	            $scope.parcour = answer;
	            $scope.parcour.promo=Number($scope.parcour.promo);	
	            $scope.parcour.date_debut.jour=Number($scope.parcour.date_debut.jour);
	            $scope.parcour.date_debut.mois=Number($scope.parcour.date_debut.mois);
	            $scope.parcour.date_debut.an=Number($scope.parcour.date_debut.an);
	            $scope.parcour.date_fin.jour=Number($scope.parcour.date_fin.jour);
	            $scope.parcour.date_fin.mois=Number($scope.parcour.date_fin.mois);
	            $scope.parcour.date_fin.an=Number($scope.parcour.date_fin.an);						

	            
	            $scope.$apply();
	        }
	    };
	    xhttp2.open("GET", "php/queryparcour.php?key="+Id_of_key, true);
	    xhttp2.send();

	  function modif ()
	  {
	  	this.prenom=false;
	  	this.nom=false;
	  	this.tuteur=false;
	  	this.remarques=false;
	  	this.promo=false;
	  	this.date_debut=false;
	  	this.date_fin=false;
	  	this.type_mobilite=false;
	  }

	  $scope.modif = new modif();

	  $scope.modif_prenom=function(){
	  	$scope.modif.prenom=true;

	  };

	  $scope.sav_prenom=function(){
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
					$scope.modif.prenom=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&prenom='+$scope.parcour.prenom);


	  };

	  $scope.modif_nom=function(){
	  	$scope.modif.nom=true;

	  };

	  $scope.sav_nom=function(){
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
					$scope.modif.nom=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&nom='+$scope.parcour.nom);


	  };

	  $scope.modif_tuteur=function(){
	  	$scope.modif.tuteur=true;

	  };

	  $scope.sav_tuteur=function(){
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
					$scope.modif.tuteur=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&tuteur='+$scope.parcour.tuteur);


	  };

	  $scope.modif_remarques=function(){
	  	$scope.modif.remarques=true;

	  };

	  $scope.sav_remarques=function(){
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
					$scope.modif.remarques=false;
				}
				
				$scope.$apply();
	            
	        }
	    };
	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&remarques='+$scope.parcour.remarques);


	  };

	  $scope.modif_promo=function(){
	  	$scope.modif.promo=true;

	  };

	  $scope.sav_promo=function(){
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
					$scope.modif.promo=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&promo='+$scope.parcour.promo);


	  };

	  $scope.modif_date_debut=function(){
	  	$scope.modif.date_debut=true;

	  };

	  $scope.sav_date_debut=function(){
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
					$scope.modif.date_debut=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&date_debut='+$scope.parcour.date_debut.an+'-'+$scope.parcour.date_debut.mois+'-'+$scope.parcour.date_debut.jour);


	  };
	  
	  $scope.modif_date_fin=function(){
	  	$scope.modif.date_fin=true;

	  };

	  $scope.sav_date_fin=function(){
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
					$scope.modif.date_fin=false;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&date_fin='+$scope.parcour.date_fin.an+'-'+$scope.parcour.date_fin.mois+'-'+$scope.parcour.date_fin.jour);


	  };
	
	$scope.modif_type_mobilite=function(){
	  	$scope.modif.type_mobilite=true;
	  };

	  
	  

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

	    xhttp3.open("POST", "php/majparcour.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+Id_of_key+'&types_mobilites='+$scope.parcour.types_mobilites);
	  	
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
					for(i=0;i<$scope.parcour.domaines.length;i++)
					{
						for(j=0;j<$scope.domaines.checkable.length;j++)
						{
							if ($scope.parcour.domaines[i]==$scope.domaines.checkable[j].nom) 
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
	  				$scope.parcour.domaines=nom_checked;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp4.open("POST", "php/majparcour.php", true);
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
						  				$scope.parcour.domaines.push(domaine);
						  				$scope.$apply();
									}
									
							}		
						            
						        
						    };
						    
						    xhttp6.open("POST", "php/majparcour.php", true);
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
					$scope.modif_convention.selection=$scope.parcour.type_convention;
					
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
	  				$scope.parcour.type_convention=checked;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp4.open("POST", "php/majparcour.php", true);
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
										$scope.parcour.type_convention=convention;
										$scope.unlay();
										$scope.$apply();
						  				
									}
									
							}		
						            
						        
						    };
						    
						    xhttp6.open("POST", "php/majparcour.php", true);
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
//Destination
	$scope.modif_destination=new modif_ville();

	$scope.init_destination = function()
	{
		if (!$scope.modif_destination.type_selection)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
					var answer = angular.fromJson(this.responseText);
					
					$scope.destinations = answer.destinations;

					for(j=0;j<$scope.destinations.length;j++)
					{
						if ($scope.destinations[j].nom==$scope.parcour.dest_nom) 
						{
							$scope.modif_destination.selection=$scope.destinations[j];
						}
					}
					
					
					
					$scope.modif_destination.type_selection=true;
					$scope.$apply();
		            
		        }
		    };

		    xhttp3.open("GET", "php/querydestinations.php", true); 
		    xhttp3.send();
		}
	};

	$scope.sav_destination=function(checked){
		
		
	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.unlay();
	  				$scope.parcour.dest_nom=checked.nom;
				}
				
				$scope.$apply();
	            
	        }
	    };

	    xhttp4.open("POST", "php/majparcour.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+Id_of_key+'&destination='+checked.clef);
	  	
	};

	$scope.init_new_destination= function(){
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
		            
		            
		            	            
		            $scope.$apply();

		        }
		    };
		    xhttp2.open("GET", "php/querydestinations.php", true);
		    xhttp2.send();	
	
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
				document.location.href="newdestination.php?name="+new_name+"&parcour="+Id_of_key;
			}
		};
	};
//fin destination
//upload rapport
	$scope.rapport_uploaddone=false;
	$scope.rapport_upload = function (file) {
        Upload.upload({
            url: 'saverapportfile.php',
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
							$scope.parcour.rapport=ans.name;
							$scope.rapport_uploaddone=true;					
							$scope.$apply();
									  				
						}	            
		        }
			    };
			    
			    xhttp6.open("POST", "php/majparcour.php", true);
			    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			    xhttp6.send('ID='+Id_of_key+'&rapport='+ans.name);
			}else{
				alert('Une erreur est survenue');	
				$scope.unlay();	
			}
        }, function (resp) {
            alert('Une erreur est survenue');
            $scope.unlay();	
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            $scope.rapport_progress='progress: ' + progressPercentage + '% ' + evt.config.data.file.name;
        });
    };

    $scope.plan_uploaddone=false;
	$scope.plan_upload = function (file) {
        Upload.upload({
            url: 'saveplanfile.php',
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
							$scope.parcour.bulletin=ans.name;
							$scope.plan_uploaddone=true;					
							$scope.$apply();
									  				
						}	            
		        }
			    };
			    
			    xhttp6.open("POST", "php/majparcour.php", true);
			    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			    xhttp6.send('ID='+Id_of_key+'&plan='+ans.name);
			}else{
				alert('Une erreur est survenue');	
				$scope.unlay();	
			}
        }, function (resp) {
            alert('Une erreur est survenue');
            $scope.unlay();	
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            $scope.plan_progress='progress: ' + progressPercentage + '% ' + evt.config.data.file.name;
        });
    };
}]);


