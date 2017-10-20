var app = angular.module('myApp5', ['ngSanitize', 'ngFileUpload']);
app.controller('mainController', ['$scope','$sce','Upload', function ($scope,$sce,Upload) {



	$scope.layer=false;
	$scope.layer2=false;
	$scope.layer3=false;
	$scope.layer4=false;
	$scope.layer5=false;
	$scope.layer6=false;

	function Excel(){
		this.upload=true;
		this.confirm=false;
		this.errorexcel=false;
		this.resume=false;
		this.loading=false;

		this.ville=false;
		this.mobilite=false;
		this.domaine=false;
		this.langues=false;
		this.convention=false;

		this.errorville=false;
		this.errormobilite=false;
		this.errordomaine=false;
		this.errorlangues=false;
		this.errorconvention=false;


		this.type="undefined";
		this.ligne=0;
		this.date="undefined";
		this.ajoutee=0;
		this.modifiee=0;
	}

	$scope.lay=function (nb){
		var test = document.getElementById('test');
		test.style.overflow="hidden";
		$scope.layer=true;
		if (nb=='2') {
			$scope.layer2=true;
			$scope.excel= new Excel();
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

//upload

	$scope.upload = function (file) {
        Upload.upload({
            url: 'saveexcelfile.php',
            data: {file: file}
        }).then(function (resp) {
					//alert(resp.data);
					//var ans={};
					//ans.statut='error_excel';
					var ans = angular.fromJson(resp.data);
        	if (ans.statut=='ok') {
        		$scope.excel.upload=false;
				$scope.excel.confirm=true;
				$scope.excel.type=ans.type;
				$scope.excel.ligne=ans.ligne;
				$scope.excel.date=ans.date;
				$scope.excel.name=ans.name;
				$scope.excel.curentligne=2;
				//$scope.$apply();
			}else{
				if (ans.statut=='error_excel')
				{
					$scope.excel.upload=false;
					$scope.excel.errorexcel=true;
					//$scope.$apply();
				}else{
					if (ans.statut=='error_type_fichier')
						{
							alert('Le fichier n\'est pas au bon format');
						}else{
							alert('Une erreur est survenue');
							$scope.unlay();
						}
				}

			}
        }, function (resp) {
            alert('Une erreur est survenue');
            $scope.unlay();
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            $scope.progress='progress: ' + progressPercentage + '% ' + evt.config.data.file.name;
        });
    };
//fin upload
//next
	$scope.next=function()
	{

		if (!$scope.excel.errorville && !$scope.excel.errormobilite && $scope.excel.errordomaine==0 && !$scope.excel.errordestination)
		{
			var xhttp3 = new XMLHttpRequest();
		    xhttp3.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
				var answer = angular.fromJson(this.responseText);
					if(answer.statut=="error")
					{
						$scope.excel.confirm=false;
						$scope.excel.ville=false;
						$scope.excel.mobilite=false;
						$scope.excel.domaine=false;
						$scope.excel.langues=false;
						$scope.excel.convention=false;
						$scope.excel.destination=false;
						$scope.excel.ajoutee=answer.ajoutee;
						$scope.excel.type=answer.type;
						$scope.excel.modifiee=answer.modifiee;
						$scope.excel.lignename=answer.lignename;
						$scope.excel.ligneID=parseInt(answer.ligneID);
						$scope.modif_ville.type="";
						$scope.excel.curentligne=parseInt(answer.currentligne)+1;
						if (answer.errorville) {
							$scope.excel.errorville=true;
							$scope.excel.unknowville=answer.unknowville;
							$scope.excel.unknowpays=answer.unknowpays;
						}
						if (answer.errormobilite) {
							$scope.excel.errormobilite=true;
							$scope.excel.unknowmobilite=answer.unknowmobilite;
							$scope.destination={};
							$scope.destination.types_mobilites=answer.unknowmobilite;
							init_type();
						}
						if (answer.errordomaine) {

							$scope.excel.unknowdomaine=answer.unknowdomaine;
							$scope.excel.errordomaine=answer.unknowdomaine.length;
							$scope.destination={};
							$scope.destination.domaines=answer.domaines;

							$scope.init_domaine();
						}

						if (answer.errordestination) {

							$scope.excel.unknowdestination=answer.unknowdestination;
							$scope.excel.errordestination=true;
							$scope.destination={};
							$scope.destination.destination=answer.destination;
						}

						//$scope.$apply();
						$scope.next();
					}else{
						if (answer.statut=="next")
						{
							$scope.excel.ajoutee=answer.ajoutee;
							$scope.excel.modifiee=answer.modifiee;
							$scope.excel.curentligne=parseInt(answer.currentligne)+1;
							$scope.excel.confirm=false;
							$scope.excel.ville=false;
							$scope.excel.mobilite=false;
							$scope.excel.domaine=false;
							$scope.excel.langues=false;
							$scope.excel.convention=false;
							$scope.excel.destination=false;
							$scope.$apply()
							$scope.next();
						}else{
							$scope.excel.ajoutee=answer.ajoutee;
							$scope.excel.modifiee=answer.modifiee;
							$scope.excel.confirm=false;
							$scope.excel.ville=false;
							$scope.excel.mobilite=false;
							$scope.excel.domaine=false;
							$scope.excel.langues=false;
							$scope.excel.convention=false;
							$scope.excel.loading=false;
							$scope.excel.destination=false;

							$scope.excel.resume=true;
							$scope.$apply();
						}
					}
		        }
		     };
		    $scope.excel.confirm=false;
			$scope.excel.ville=false;
			$scope.excel.mobilite=false;
			$scope.excel.domaine=false;
		    $scope.excel.loading=true;

	    	xhttp3.open("GET", "excelread.php?excel="+$scope.excel.name+'&ligne='+$scope.excel.curentligne+'&ajoutee='+$scope.excel.ajoutee+'&modifiee='+$scope.excel.modifiee, true);
	    	xhttp3.send();

		}else{
			if ($scope.excel.errorville) {
				$scope.excel.loading=false;
				$scope.excel.confirm=false;
				$scope.excel.ville=true;
				$scope.excel.mobilite=false;
				$scope.excel.domaine=false;
				$scope.excel.destination=false;


				$scope.excel.errorville=false;
				$scope.$apply();
			}else{
				if ($scope.excel.errormobilite) {
					$scope.excel.loading=false;
					$scope.excel.confirm=false;
					$scope.excel.ville=false;
					$scope.excel.mobilite=true;
					$scope.excel.domaine=false;
					$scope.excel.destination=false;


					$scope.excel.errormobilite=false;
					$scope.$apply();
				}else{
					if ($scope.excel.errordomaine>0) {
						$scope.excel.loading=false;
						$scope.excel.confirm=false;
						$scope.excel.ville=false;
						$scope.excel.mobilite=false;
						$scope.excel.domaine=true;
						$scope.excel.destination=false;


						$scope.excel.errordomaine--;
						$scope.$apply();
					}else{
						if ($scope.excel.errordestination)
						{
							$scope.excel.loading=false;
							$scope.excel.confirm=false;
							$scope.excel.ville=false;
							$scope.excel.mobilite=false;
							$scope.excel.domaine=false;
							$scope.excel.destination=true;


							$scope.excel.errordestination=false;
							$scope.$apply();
						}
					}
				}
			}
		}

	};
//ville
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
					$scope.next();

				}

				$scope.$apply();

	        }
	    };

	    xhttp4.open("POST", "php/majdestination.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+$scope.excel.ligneID+'&ville='+Ville.ID);

	  };


	 $scope.modif_new_ville=new modif_ville();

	$scope.init_new_ville = function()
	{
			$scope.modif_new_ville.ville=$scope.excel.unknowville;
			$scope.modif_new_ville.pays=$scope.excel.unknowpays;
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
												$scope.next();

											}

											$scope.$apply();

							        }
							    };

							    xhttp6.open("POST", "php/majdestination.php", true);
							    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							    xhttp6.send('ID='+$scope.excel.ligneID+'&ville3='+ville+'&pays='+pays+'&continent='+continent);
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
												$scope.next();
											}

											$scope.$apply();

							        }
							    };

							    xhttp5.open("POST", "php/majdestination.php", true);
							    xhttp5.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							    xhttp5.send('ID='+$scope.excel.ligneID+'&ville2='+ville+'&pays='+pays.ID);
							}
						}
					};
				}
		    };

		    xhttp3.open("GET", "php/querynewvilles.php", true);
		    xhttp3.send();

	};
	//mobilités
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
					$scope.next();
				}

				$scope.$apply();

	        }
	    };

	    xhttp3.open("POST", "php/majdestination.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+$scope.excel.ligneID+'&types_mobilites='+type_mobilite2str());

	  };
//domaines
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

					$scope.domaines = answer;

					$scope.modif_domaine.type_selection=true;
					$scope.$apply();

		        }
		    };

		    xhttp3.open("GET", "php/querydomaines.php", true);
		    xhttp3.send();
		}
	};

	$scope.sav_domaine_dest=function(selection){

	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.excel.unknowdomaine.splice(0,1);
					$scope.next();
				}

				$scope.$apply();

	        }
	    };

	    xhttp4.open("POST", "php/majdestination.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+$scope.excel.ligneID+'&domaine='+selection.ID);

	  };

	  $scope.sav_domaine_parc=function(selection){

	  	var xhttp4 = new XMLHttpRequest();
	    xhttp4.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
			var error = angular.fromJson(this.responseText);
				if (!error)
				{
					$scope.excel.unknowdomaine.splice(0,1);
					$scope.next();
				}

				$scope.$apply();

	        }
	    };

	    xhttp4.open("POST", "php/majparcour.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+$scope.excel.ligneID+'&domaine='+selection.ID);

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

					$scope.sav_new_domaine_dest=function(domaine, code){

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

						  				$scope.destination.domaines.push(domaine);
						  				$scope.modif_new_domaine.domaine="";
							  			$scope.modif_new_domaine.code="";
							  			$scope.excel.unknowdomaine.splice(0,1);
						  				$scope.next();
						  				$scope.$apply();

									}

								}


						    };

						    xhttp6.open("POST", "php/majdestination.php", true);
						    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						    xhttp6.send('ID='+$scope.excel.ligneID+'&domaine='+domaine+'&code='+code);
						}


					};

					$scope.sav_new_domaine_parc=function(domaine, code){

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

						  				$scope.destination.domaines.push(domaine);
						  				$scope.modif_new_domaine.domaine="";
							  			$scope.modif_new_domaine.code="";
							  			$scope.excel.unknowdomaine.splice(0,1);
						  				$scope.next();
						  				$scope.$apply();

									}

								}


						    };

						    xhttp6.open("POST", "php/majparcour.php", true);
						    xhttp6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						    xhttp6.send('ID='+$scope.excel.ligneID+'&domaine='+domaine+'&code='+code);
						}


					};
				}
		    };

		    xhttp3.open("GET", "php/querynewdomaines.php", true);
		    xhttp3.send();
		}
	};

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
						if ($scope.destinations[j].nom==$scope.destination.destination)
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
					$scope.next();
				}

				$scope.$apply();

	        }
	    };

	    xhttp4.open("POST", "php/majparcour.php", true);
	    xhttp4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp4.send('ID='+$scope.excel.ligneID+'&destination='+checked.clef);

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
				document.location.href="newdestination.php?name="+new_name+"&parcour="+$scope.excel.ligneID+"&excel="+$scope.excel.name+'&ligne='+$scope.excel.curentligne+'&ajoutee='+$scope.excel.ajoutee+'&modifiee='+$scope.excel.modifiee;
			}
		};
	};
//fin destination
	if (donext)
	{
		$scope.lay(2);
		$scope.excel.name=excelname;
		//alert(excelname);
		$scope.excel.upload=false;
		$scope.excel.curentligne=excelcurentligne;
		$scope.excel.ajoutee=excelajoutee;
		$scope.excel.modifiee=excelmodifiee;
		$scope.next();
		//$scope.$apply();
	}
}]);
