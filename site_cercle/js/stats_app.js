var app = angular.module('stats_app', ['nvd3']);
app.controller('mainController', function($scope) {

    var stats_item = function (bool = false) {
        this.screen = bool;
        if (bool) {
            this.class = "selected";
        }else{
            this.class = "";
        }

        this.started = false;

        this.activate = function () {
            var activate;
            if (this.screen) {
                activate = true;
            }
            else {
                activate = false;
            }
            $scope.forum.screen = false;
            $scope.forum.class = "";

            $scope.stats_globales.screen = false;
            $scope.stats_globales.class = "";

            $scope.stats_perso.screen = false;
            $scope.stats_perso.class = "";

            if (!activate) {
                this.screen = true;
                this.class = "selected";
            }
        };

        this.order = function (str) {
            if (this.ordervalue === str) {
                this.ordervalue = "-" + str;
            } else {
                this.ordervalue = str;
            }
        }
    };

    $scope.forum= new stats_item();

    $scope.stats_globales= new stats_item(true);

    $scope.stats_perso= new stats_item();

    $scope.start_forum=function () {
        if (!$scope.forum.started){
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

            var last_x = 0;

            $scope.data = [];

            setInterval(function(){
                var answer;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        answer = angular.fromJson(this.responseText);
                        last_x=answer.last_x;
                        $scope.boissons=answer.boissons;
                        for (var biere in answer.data) {
                            if (answer.data.hasOwnProperty(biere)) {
                                var not_finded = true;
                                for (var i = 0; i < $scope.data.length; i++) {
                                    if($scope.data[i].key===biere)
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
                        $scope.$apply();
                    }
                };
                xhttp.open("GET", "php/get_forum_stats.php?time="+last_x, true);
                xhttp.send();
            }, 2000);
            $scope.forum.started=true;
        }
    };

    $scope.start_stats_globales=function (){
        $scope.stats_globales.globale={};
        $scope.stats_globales.globale.limit=3;
        $scope.stats_globales.globale.classby="depense";
        var answer;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                answer = angular.fromJson(this.responseText);
                $scope.stats_globales.globale.data=answer;
                $scope.$apply();
            }
        };
        xhttp.open("GET", "php/get_stats_globales.php");
        xhttp.send();
    };

    $scope.start_stats_perso=function (){};

    $scope.color=function(index)
    {
        if (index%2===0) {
            return "color_1";
        }else{
            return "color_2";
        }
    }

});
