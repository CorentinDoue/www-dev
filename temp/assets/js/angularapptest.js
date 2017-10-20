var app = angular.module('myApptest', ['ngSanitize', 'ngFileUpload']);
app.controller('mainController', ['$scope','$sce','Upload', function ($scope,$sce,Upload) {

	
	
//upload
	$scope.error=false;
	$scope.done=false;

	$scope.upload = function (file) {
        Upload.upload({
            url: 'savetestfile.php',
            data: {file: file}
        }).then(function (resp) {
        	try {
			    var ans = angular.fromJson(resp.data);
			} catch(e) {
				var ans = "error";
			    $scope.errormessage='<pre>' + e;
			}
        	
        	if (ans.statut=='ok') {
        		$scope.done=true;
			}else{		
				$scope.error=true;	
			}
        }, function (resp) {
            alert('Une erreur est survenue');
            
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            $scope.progress='progress: ' + progressPercentage + '% ' + evt.config.data.file.name;
        });
    };
//fin upload

}]);


