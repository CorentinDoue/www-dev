var app = angular.module('myApp2', ['ngSanitize']);
app.controller('mainController', ['$scope','$sce', function ($scope,$sce) {

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

            $scope.contenus = answer;
            
            $scope.$apply();
        }
    };
    xhttp2.open("GET", "php/querycontenus.php", true);
    xhttp2.send();
    
    $scope.modif= function(contenu)
    {
    	contenu.modif=true;
    }

    
    


    $scope.save= function(contenu)
    {
    	
    	
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
					contenu.modif=false;
				}

				$scope.$apply();
	            
	        }
	    };

	    xhttp3.open("POST", "php/majcontenus.php", true);
	    xhttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    xhttp3.send('ID='+contenu.ID+'&contenu='+contenu.contenu+'&titre='+contenu.titre);
	  }
}]);


