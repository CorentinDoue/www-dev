var app = angular.module('stats_app', ['nvd3']);
app.controller('mainController', function($scope) {

  // $scope.options = {
  //       chart: {
  //           type: 'lineChart',
  //           height: 180,
  //           margin : {
  //               top: 20,
  //               right: 20,
  //               bottom: 40,
  //               left: 55
  //           },
  //           x: function(d){ return d.x; },
  //           y: function(d){ return d.y; },
  //           useInteractiveGuideline: true,
  //           duration: 500,
  //           yAxis: {
  //               tickFormat: function(d){
  //                  return d3.format('.01f')(d);
  //               }
  //           }
  //       }
  //   };
  //
  //   $scope.options1 = angular.copy($scope.options);
  //   $scope.options1.chart.duration = 0;
  //   $scope.options1.chart.yDomain = [-1,1];
  //
  //   $scope.data = [{ values: [], key: 'Random Walk' }];
  //
  //   $scope.run = true;
  //
  //   var x = 0;
  //   setInterval(function(){
	//     if (!$scope.run) return;
	//     $scope.data[0].values.push({ x: x,	y: Math.random() - 0.5});
  //     if ($scope.data[0].values.length > 20) $scope.data[0].values.shift();
	//     x++;
  //
  //     $scope.$apply(); // update both chart
  //   }, 500);
  $scope.options = {
            chart: {
                type: 'lineChart',
                height: 450,

                margin : {
                    top: 20,
                    right: 20,
                    bottom: 40,
                    left: 55
                },
                x: function(d){ return d.x; },
                y: function(d){ return d.y; },
                useInteractiveGuideline: true,
                dispatch: {
                    stateChange: function(e){ console.log("stateChange"); },
                    changeState: function(e){ console.log("changeState"); },
                    tooltipShow: function(e){ console.log("tooltipShow"); },
                    tooltipHide: function(e){ console.log("tooltipHide"); }
                },
                xAxis: {
                    axisLabel: 'Heure',
                    tickFormat: function(d){
                      return d3.time.format('%H:%M')(new Date(d));
                    }
                },
                yAxis: {
                    axisLabel: 'Prix (€)',
                    tickFormat: function(d){
                        return d3.format('.02f')(d);
                    },
                    axisLabelDistance: -10
                },
                callback: function(chart){
                    console.log("!!! lineChart callback !!!");
                }

              }
        };

        // $scope.data = [{ values: [], key: 'Random Walk' },{ values: [], key: 'Random Walk2' }];
        //
        //  $scope.run = true;
        var last_x = 0;
        //  var x = 1508854864*1000;
        $scope.data = [];
        //var skip =true;
        setInterval(function(){
        //    if (!$scope.run) return;
        //    $scope.data[0].values.push({ x: x+500,	y: Math.random() - 0.5});
        //    $scope.data[1].values.push({ x: x,	y: Math.random() - 0.6});
        //    //if ($scope.data[0].values.length > 20) $scope.data[0].values.shift();
        //    x+=1000;
        //
        //    $scope.$apply(); // update both chart


           var answer;
           var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                  //   if(!skip){
                  //    for (var i = 0; i < $scope.data.length; i++) {
                  //      if($scope.data[i].values.length>1)
                  //      {
                  //        $scope.data[i].values.pop();
                  //      }
                  //    }
                  //  }
                  //  skip=false;
                   answer = angular.fromJson(this.responseText);
                   last_x=answer.last_x;
                   $scope.boissons=answer.boissons;

                   //if (answer.data.length>0) {
                     for (var biere in answer.data) {
                       if (answer.data.hasOwnProperty(biere)) {
                         //alert(biere);
                         //alert(answer.data[biere]);
                         var not_finded = true;
                         for (var i = 0; i < $scope.data.length; i++) {
                           if($scope.data[i].key==biere)
                           {
                             for (var j= 0; j < answer.data[biere].length; j++)
                             {
                               $scope.data[i].values.push( {x : answer.data[biere][j].x_time, y : answer.data[biere][j].y_prix});
                             }
                             not_finded=false;
                           }
                         }
                         if (not_finded) {
                           $scope.data.push({ values: [], key: biere });
                           for (var j= 0; j < answer.data[biere].length; j++) {
                             $scope.data[$scope.data.length-1].values.push({ x : answer.data[biere][j].x_time, y : answer.data[biere][j].y_prix});
                           }
                         }
                       }
                     }
                     //skip=true;
                   //}else{
                    //  for (var k = 0; k < boissons.length; i++) {
                     //
                    //    var not_finded = true;
                    //    for (var i = 0; i < $scope.data.length; i++) {
                    //      if($scope.data[i].key==boissons[k].nom)
                    //      {
                    //        $scope.data[i].values.push( {x : Date.now(), y : boissons[k].prix});
                    //        not_finded=false;
                    //      }
                    //    }
                    //    if (not_finded) {
                    //      $scope.data.push({ values: [], key: boissons[k].nom });
                    //      $scope.data[$scope.data.length-1].values.push( {x : Date.now(), y : boissons[k].prix});
                    //    }
                    //  }
                   //}

                   $scope.$apply();

               }
           };
           xhttp.open("GET", "php/get_forum_stats.php?time="+last_x, true);
           xhttp.send();
         }, 2000);


});
