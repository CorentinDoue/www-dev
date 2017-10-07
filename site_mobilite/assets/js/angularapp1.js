var app = angular.module('myApp1', []);
app.controller('mainController', function($scope) {

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
    
    
});
