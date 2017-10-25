var app = angular.module('recharge_app', []);
app.controller('mainController', function($scope) {
    

    var answer;
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            answer = angular.fromJson(this.responseText);

            
            $scope.client={};
            $scope.client.client=null;
            $scope.users = answer.users;
            $scope.search=null;
            $scope.client.recharge_ok=false;
            
            $scope.$apply();
        }
    };

    xhttp.open("GET", "php/get_users.php", true);
    xhttp.send();


    function decimalAdjust(type, value, exp) {
	    // Si la valeur de exp n'est pas définie ou vaut zéro...
	    if (typeof exp === 'undefined' || +exp === 0) {
	      return Math[type](value);
	    }
	    value = +value;
	    exp = +exp;
	    // Si la valeur n'est pas un nombre 
	    // ou si exp n'est pas un entier...
	    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
	      return NaN;
	    }
	    // Si la valeur est négative
	    if (value < 0) {
	      return -decimalAdjust(type, -value, exp);
	    }
	    // Décalage
	    value = value.toString().split('e');
	    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
	    // Décalage inversé
	    value = value.toString().split('e');
	    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
	  }

	  // Arrondi décimal
	  if (!Math.round10) {
	    Math.round10 = function(value, exp) {
	      return decimalAdjust('round', value, exp);
	    };
	  }
	  // Arrondi décimal inférieur
	  if (!Math.floor10) {
	    Math.floor10 = function(value, exp) {
	      return decimalAdjust('floor', value, exp);
	    };
	  }
	  // Arrondi décimal supérieur
	  if (!Math.ceil10) {
	    Math.ceil10 = function(value, exp) {
	      return decimalAdjust('ceil', value, exp);
	    };
	  }


	  $scope.prix= function (float)
	{
		
		if (float<0)
		{
			float=-float;
			var cent=Math.round((float*100)%100);
			var euro=Math.floor(float);
			if (cent==0)
			{
				return "- "+euro+"€";
			}else{
				if (cent<10) {
					cent="0"+cent;
				}
				return "- "+euro+"€"+cent;
			}
			
		}else{
			var cent=Math.round((float*100)%100);
			var euro=Math.floor(float);
			if (cent==0)
			{
				return euro+"€";
			}else{
				if (cent<10) {
					cent="0"+cent;
				}
				return euro+"€"+cent;
			}
		}
	};

	$scope.plus=function(boisson){
		
		$scope.client.client.montant++;
		$scope.maj();
	};

	$scope.moins=function(boisson){
		
		$scope.client.client.montant--;
		$scope.maj();
		
		
	};

	$scope.maj=function(){
		
		$scope.client.client.new_solde=$scope.client.client.solde+$scope.client.client.montant;
		
		
	};

	$scope.validate=function(){

		for(var i= 0; i < $scope.users.length; i++)
		{
			if ($scope.users[i].id==$scope.client.client.id) {
				var index= i;
				i+=$scope.users.length;
			}
		}

		var answer;
		var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {

	            answer = angular.fromJson(this.responseText);
	            if(answer.ok)
	            {	
	            	$scope.users[index].solde+=$scope.client.client.montant;
	            	$scope.client.client=null;
	            	$scope.search=null;
	            	$scope.client.recharge_ok=true;
	            	$scope.$apply();
	            	
	            }				            
	        }
	    };
	    xhttp.open("POST", "php/recharge.php", true);
	    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp.send("id_user="+$scope.client.client.id+"&montant="+$scope.client.client.montant);
	}
    
});
