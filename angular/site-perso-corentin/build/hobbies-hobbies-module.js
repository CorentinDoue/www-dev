(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["hobbies-hobbies-module"],{

/***/ "./src/app/hobbies/hobbies-routing.module.ts":
/*!***************************************************!*\
  !*** ./src/app/hobbies/hobbies-routing.module.ts ***!
  \***************************************************/
/*! exports provided: HobbiesRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HobbiesRoutingModule", function() { return HobbiesRoutingModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _hobbies_hobbies_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./hobbies/hobbies.component */ "./src/app/hobbies/hobbies/hobbies.component.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    {
        path: '',
        component: _hobbies_hobbies_component__WEBPACK_IMPORTED_MODULE_2__["HobbiesComponent"]
    },
    {
        path: ':id',
        component: _hobbies_hobbies_component__WEBPACK_IMPORTED_MODULE_2__["HobbiesComponent"]
    }
];
var HobbiesRoutingModule = /** @class */ (function () {
    function HobbiesRoutingModule() {
    }
    HobbiesRoutingModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forChild(routes)],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]]
        })
    ], HobbiesRoutingModule);
    return HobbiesRoutingModule;
}());



/***/ }),

/***/ "./src/app/hobbies/hobbies.module.ts":
/*!*******************************************!*\
  !*** ./src/app/hobbies/hobbies.module.ts ***!
  \*******************************************/
/*! exports provided: HobbiesModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HobbiesModule", function() { return HobbiesModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _hobbies_hobbies_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./hobbies/hobbies.component */ "./src/app/hobbies/hobbies/hobbies.component.ts");
/* harmony import */ var _hobbies_routing_module__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./hobbies-routing.module */ "./src/app/hobbies/hobbies-routing.module.ts");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/shared.module */ "./src/app/shared/shared.module.ts");
/* harmony import */ var _ng_bootstrap_ng_bootstrap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @ng-bootstrap/ng-bootstrap */ "./node_modules/@ng-bootstrap/ng-bootstrap/index.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var HobbiesModule = /** @class */ (function () {
    function HobbiesModule() {
    }
    HobbiesModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__["SharedModule"],
                _hobbies_routing_module__WEBPACK_IMPORTED_MODULE_2__["HobbiesRoutingModule"],
                _ng_bootstrap_ng_bootstrap__WEBPACK_IMPORTED_MODULE_4__["NgbModule"]
            ],
            declarations: [_hobbies_hobbies_component__WEBPACK_IMPORTED_MODULE_1__["HobbiesComponent"]]
        }),
        __metadata("design:paramtypes", [])
    ], HobbiesModule);
    return HobbiesModule;
}());



/***/ }),

/***/ "./src/app/hobbies/hobbies/hobbies.component.html":
/*!********************************************************!*\
  !*** ./src/app/hobbies/hobbies/hobbies.component.html ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div [ngClass]=\"theme\" #top>\r\n  <div class=\"hobbies\">\r\n    <div class=\"container\">\r\n      <div class=\"centrer\">\r\n        <div><h1 [ngClass]=\"routeAnimationsElements\">Hobbies</h1></div>\r\n      </div>\r\n      <div (swipeleft)=\"swipe($event)\" (swiperight)=\"swipe($event)\">\r\n        <mat-tab-group [dynamicHeight]=\"true\" [selectedIndex]=\"selectedHobby\" >\r\n          <mat-tab *ngFor=\"let hobby of hobbies\">\r\n            <ng-template mat-tab-label>\r\n              <span class=\"mat-tab-label\" (click)=\"goTo(hobby.id)\">{{hobby.name}}</span>\r\n            </ng-template>\r\n\r\n            <h2 [ngClass]=\"routeAnimationsElements\"> <mat-icon svgIcon=\"{{hobby.id}}\"></mat-icon>{{hobby.name}}</h2>\r\n\r\n            <div class=\"row justify-content-center mb-3\">\r\n              <div class=\"col\" style=\"display: flex; justify-content: center\">\r\n                <p style=\"text-align: justify\" [innerHTML]=\"hobby.description | keepHtml\"></p>\r\n              </div>\r\n            </div>\r\n            <div class=\"row justify-content-center\">\r\n              <div class=\"col-lg-10\">\r\n                <ngb-carousel *ngIf=\"hobby.images.length>0\" (slide)=\"hobby.currentId=imgIndex($event.current)\">\r\n                  <ng-template ngbSlide *ngFor=\"let image of hobby.images; let i = index\" [id]=\"hobby.id+'-'+i\">\r\n                    <img *ngIf=\"image.name!='video'\" [src]=\"'../../../assets/hobbies/'+ image.url\" alt=\"{{image.name}}\" style=\"width: 100%\">\r\n                    <div class=\"row justify-content-center\" *ngIf=\"image.name=='video'\">\r\n                      <div class=\"col-1\" style=\"background-color: black\"></div>\r\n                      <div class=\"col-10\" style=\"background-color: black\">\r\n                        <iframe [src]=\"image.url | safe\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n                      </div>\r\n                      <div class=\"col-1\" style=\"background-color: black\"></div>\r\n                    </div>\r\n\r\n                    <div class=\"carousel-caption\" *ngIf=\"image.name!='video'\">\r\n                      <div style=\"display: flex; justify-content: center\">\r\n                        <h3 style=\"padding: 10px;\" [ngStyle]=\"{'color':image.dark ? 'white' : 'black', 'backgroundColor': image.dark ? 'rgba(0,0,0,0.5)' : 'rgba(255,255,255,0.5)'}\">\r\n                          {{image.name}}\r\n                        </h3>\r\n                      </div>\r\n                      <!--<p style=\"padding: 10px;\" [ngStyle]=\"{'color':image.dark ? 'white' : 'black', 'backgroundColor': image.dark ? 'rgba(0,0,0,0.5)' : 'rgba(255,255,255,0.5)'}\">{{image.description}}</p>-->\r\n                    </div>\r\n                  </ng-template>\r\n                </ngb-carousel>\r\n              </div>\r\n            </div>\r\n\r\n            <div class=\"row justify-content-center mt-2 mb-3\" *ngIf=\"hobby.images.length>0\">\r\n              <div class=\"col-lg-10\" style=\"display: flex; justify-content: center\">\r\n                <p style=\"text-align: justify\" [innerHTML]=\"hobby.images[hobby.currentId].description | keepHtml\"></p>\r\n              </div>\r\n            </div>\r\n          </mat-tab>\r\n        </mat-tab-group>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n"

/***/ }),

/***/ "./src/app/hobbies/hobbies/hobbies.component.scss":
/*!********************************************************!*\
  !*** ./src/app/hobbies/hobbies/hobbies.component.scss ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".container {\n  position: relative; }\n  .container .centrer {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    height: 90px; }\n  .container h1 {\n    text-align: center;\n    font-size: 2em;\n    text-transform: uppercase;\n    font-weight: bold;\n    display: inline-block;\n    padding: 10px;\n    margin: 0; }\n  .container h2 {\n    text-align: center;\n    margin-top: 20px;\n    display: flex;\n    justify-content: center;\n    margin-bottom: 30px; }\n  .container h2 mat-icon {\n      margin-right: 10px;\n      width: 40px;\n      height: 40px; }\n  .container .mat-tab-body-active {\n    overflow: hidden; }\n  .container .mat-tab-label {\n    font-size: 1.6em; }\n  .container iframe {\n    width: 100%;\n    height: 400px;\n    padding: 0 50px 0 50px; }\n  @media (max-width: 576px) {\n  .centrer {\n    height: 70px; }\n  h1 {\n    font-size: 1.4em; }\n  h3 {\n    font-size: 1em; }\n  iframe {\n    width: 100%;\n    height: 200px;\n    padding: 0 50px 0 50px; } }\n"

/***/ }),

/***/ "./src/app/hobbies/hobbies/hobbies.component.ts":
/*!******************************************************!*\
  !*** ./src/app/hobbies/hobbies/hobbies.component.ts ***!
  \******************************************************/
/*! exports provided: HobbiesComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HobbiesComponent", function() { return HobbiesComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
/* harmony import */ var _theme_hours_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../theme-hours.service */ "./src/app/theme-hours.service.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _data_hobbies_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../data/hobbies.data */ "./src/data/hobbies.data.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var HobbiesComponent = /** @class */ (function () {
    function HobbiesComponent(themeHoursService, route, router) {
        this.themeHoursService = themeHoursService;
        this.route = route;
        this.router = router;
        this.SWIPE_ACTION = { LEFT: 'swipeleft', RIGHT: 'swiperight' };
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
        this.hobbies = _data_hobbies_data__WEBPACK_IMPORTED_MODULE_4__["HOBBIES"];
    }
    HobbiesComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.top.nativeElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        this.route.paramMap.subscribe(function (params) {
            _this.selectedHobby = _this.selectedNumber(params.get('id'));
        });
        this.initTheme();
    };
    HobbiesComponent.prototype.initTheme = function () {
        var hours = new Date().getHours();
        this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
            ? 'blue-night-theme'
            : 'blue-day-theme');
    };
    HobbiesComponent.prototype.selectedNumber = function (selectedType) {
        switch (selectedType) {
            case ('running'): {
                return 0;
            }
            case ('climbing'): {
                return 1;
            }
            case ('skiing'): {
                return 2;
            }
            case ('cooking'): {
                return 3;
            }
            case ('crafting'): {
                return 4;
            }
            default: {
                return 0;
            }
        }
    };
    HobbiesComponent.prototype.selectedType = function (selectedNumber) {
        switch (selectedNumber) {
            case (0): {
                return 'running';
            }
            case (1): {
                return 'climbing';
            }
            case (2): {
                return 'skiing';
            }
            case (3): {
                return 'cooking';
            }
            case (4): {
                return 'crafting';
            }
            default: {
                return 'running';
            }
        }
    };
    HobbiesComponent.prototype.goTo = function (skillType) {
        this.router.navigate(['/hobbies', skillType]);
    };
    HobbiesComponent.prototype.swipe = function (event) {
        if (event.type === this.SWIPE_ACTION.LEFT) {
            var isLast = this.selectedHobby + 1 === 5;
            this.goTo(this.selectedType(isLast ? 0 : this.selectedHobby + 1));
            // this.selectedSkill = isLast ? 4 : this.selectedSkill + 1;
        }
        if (event.type === this.SWIPE_ACTION.RIGHT) {
            var isFirst = this.selectedHobby - 1 === -1;
            this.goTo(this.selectedType(isFirst ? 4 : this.selectedHobby - 1));
            // this.selectedSkill = isFirst ? 0 : this.selectedSkill - 1;
        }
    };
    HobbiesComponent.prototype.imgIndex = function (id) {
        return Number(id.split('-')[1]);
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ViewChild"])('top'),
        __metadata("design:type", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ElementRef"])
    ], HobbiesComponent.prototype, "top", void 0);
    HobbiesComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-hobbies',
            template: __webpack_require__(/*! ./hobbies.component.html */ "./src/app/hobbies/hobbies/hobbies.component.html"),
            styles: [__webpack_require__(/*! ./hobbies.component.scss */ "./src/app/hobbies/hobbies/hobbies.component.scss")],
            animations: [_core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["routeAnimations"]]
        }),
        __metadata("design:paramtypes", [_theme_hours_service__WEBPACK_IMPORTED_MODULE_2__["ThemeHoursService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_3__["ActivatedRoute"],
            _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"]])
    ], HobbiesComponent);
    return HobbiesComponent;
}());



/***/ }),

/***/ "./src/data/hobbies.data.ts":
/*!**********************************!*\
  !*** ./src/data/hobbies.data.ts ***!
  \**********************************/
/*! exports provided: HOBBIES */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HOBBIES", function() { return HOBBIES; });
/* harmony import */ var _hobby__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./hobby */ "./src/data/hobby.ts");
// language=HTML

var HOBBIES = [
    new _hobby__WEBPACK_IMPORTED_MODULE_0__["Hobby"]('Running', 'running', 'I run on average twice a week. I started in 2012 because it is healthy but I still practising because I like it. ' +
        'Even when I came to the engineering school and I stopped almost every sports because of the community life. ' +
        'I continued to run once a week. It ables me to empty my mind and to stay fit. Recently I started to participated to some races ' +
        'with friends and I will continue.', [
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('La Sainté Lyon', 'La Sainté Lyon is a mythical race which begins at Saint-Etienne and leads to Lyon. ' +
            'It is a race which starts at midnight and is 80 km long with 2100m of elevation gain and 2400m of elevation loss. ' +
            'In 2017 I ran it in relay with three other friends. I did the 21 last kilometers. In 2018 I will try to the full one.', 'saintelyon.jpg', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Gouffre d\'Enfer dam', 'Saint-Étienne is next to the regional park of "Le Pilat", it is there I mostly run.  ' +
            'It is a green mountain with lot of trails. One of them leads to the dam of the above picture. ' +
            'The landscape is amazing and it is quite resourcing to run there.', 'running2.jpg', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Les Deux Alpes Snow Trail', 'Last winter I participated to the Snow Trail of Les Deux Alpes ski station. ' +
            'It is a 20km Trail with 700m of elevation gain. I was running in deep snow, in the dark, in a blizzard. ' +
            'It was a very good experience and I will probably do it again this year.', 'snow-trail.jpg', true)
    ]),
    new _hobby__WEBPACK_IMPORTED_MODULE_0__["Hobby"]('Climbing', 'climbing', 'I climb on average once a week. I started in 2009 thank to my uncle who is a climbing teacher and ' +
        'it became the first sport I truly liked. ' +
        'I liked it so much that I integrated my county team and started to practise four times a week. ' +
        'I did some competitions but I prefer practising it for the pleasure.<br><br>' +
        'It is a very complete sport which train lot of muscle and keep me fit and healthy. ' +
        'I love climbing because there are many ways to climb, technique could compensate strength. ' +
        'Moreover climbing could be practised indoor and outdoor on infinite among of routes. ' +
        'Furthermore climbing is no longer dangerous with contemporary safety tools and techniques.<br><br>' +
        'I stopped climbing for 2 years when I came to the engineering school because of the community life. ' +
        'But I restarted to climb in June 2018 during my internship in Netherlands and I will continue.', [
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Neoliet Bolder Rotterdam', 'During my internship at Rotterdam I climbed in a bolder house names Neoliet. ' +
            'Bolder are short sequences of hard movements. It is practised without rope, there are huge mattress to cushion the falls. ' +
            'It is the best way to train because it develops strength and stamina.', 'neoliet.jpg', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('My climbing room at Auxerre', 'I started climbing in this room in my town (Auxerre). It is a 12 meters high wall with lot of routes. ' +
            'Ropes and harness are needed to climb safely.', 'saeauxerre.gif', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Le Saussois', 'This is the nearest cliff from my parent\'s home. It is a famous climbing spot in France. ' +
            'When the weather was fine, I used to climb there on weekend. This picture was taken during an outdoor challenge. ' +
            'One of the activities was this huge jump between the two cliff, it was awesome.', 'saussois.jpg', true)
    ]),
    new _hobby__WEBPACK_IMPORTED_MODULE_0__["Hobby"]('Skiing', 'skiing', 'I ski at least twice a year. ' +
        'I ski since I was a kid thank to my father who love skiing too and who have a little flat in the Alpes. ' +
        'I took courses when I was young but I quickly stopped because I prefer skiing without following a teacher. ' +
        'I have my own equipment with two pair of ski, one for slopes and the other to freeride.', [
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('video', 'In 2017 I went a day at Les Deux Alpes ski station with two friends. We turned this clip to promote the ski week of the shcool.', 'https://www.youtube.com/embed/myi-e0Nf9vY', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('video', 'In 2018 I was treasurer of the ski association of the school. We organized a week at Val d\'Allos for 70 students. ' +
            'This the aftermovie of the week.', 'https://www.youtube.com/embed/aohSbZc53NM', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Mont Blanc at Praz-sur-Arly', 'The apartment of my father is in the little ski station of Praz-sur-Arly. I go there once a year. ' +
            'The ski area has a vue on the Mont Blanc which is in background of this picture took in 2018.', 'praz2018montblanc.jpg', true)
    ]),
    new _hobby__WEBPACK_IMPORTED_MODULE_0__["Hobby"]('Cooking', 'cooking', 'I enjoy cooking. Even when I cook for myself I try to do something tasty and it does not bother me to spend time on it. ' +
        'But I also like cooking for other. I often organize some meals with friends. ' +
        'Moreover at the engineering school I became the president of the Associflard. ' +
        'It is a student association which organize some meals for students but also other pioneering events about food. ', [
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Barbecue Students-Teachers', 'Once a year, the Associflard organize a barbecue for both students and teachers of the Écolde des mines de Saint-Étienne. ' +
            'It is a friendly moment where these two groups could exchange, gathered by the food.', 'bbq-permanenteleve2018.jpg', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Culinary Hike', 'One of the best event of the Associflard is the culinary hike. It is a hike of around 6 km in the regional park of "Le Pilat". ' +
            'This hike start with an aperitif and continue with several stop to take the starter, the dish and the dessert.<br>' +
            'What is most beautiful than walking in wonderful landscape and eating good food ?', 'marchegourmande.jpg', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Floor Meal', 'In the student house of the engineering school, we were grouped by floor. ' +
            'We often organize some meals with all the friends of the floor.', 'repasetage.jpeg', true)
    ]),
    new _hobby__WEBPACK_IMPORTED_MODULE_0__["Hobby"]('Crafting', 'crafting', 'I have always been a manual guy. I like do the thing by myself. So when I need something I craft it. ' +
        'Since I was a kid I love being in my grandfather workshop using tools. ' +
        'Naturally since I left home I have my own tools and I continue to craft and repair things around me. ' +
        'At the student house of the engineering school I was the guy people will meet when they need to craft something.', [
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Circle bar', 'As vice-president of the student office I participated to the organization of parties. ' +
            'For our bars we had only regular rectangular tables and for a party we needed a circular one. So I crafted it with broken tables.', 'circlebar.jpg', true),
        new _hobby__WEBPACK_IMPORTED_MODULE_0__["Image"]('Wood bow tie', 'For the engineering school Gala of 2018, with a group of friend we wanted an original bow tie. ' +
            'I crafted some wood bow tie with a bamboo cutting board.', 'noeudgala.jpg', true)
    ])
];


/***/ }),

/***/ "./src/data/hobby.ts":
/*!***************************!*\
  !*** ./src/data/hobby.ts ***!
  \***************************/
/*! exports provided: Hobby, Image */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Hobby", function() { return Hobby; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Image", function() { return Image; });
var Hobby = /** @class */ (function () {
    function Hobby(name, id, description, images) {
        this._name = name;
        this._id = id;
        this._description = description;
        this._images = images;
        this.currentId = 0;
    }
    Object.defineProperty(Hobby.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Hobby.prototype, "id", {
        get: function () {
            return this._id;
        },
        set: function (value) {
            this._id = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Hobby.prototype, "description", {
        get: function () {
            return this._description;
        },
        set: function (value) {
            this._description = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Hobby.prototype, "images", {
        get: function () {
            return this._images;
        },
        set: function (value) {
            this._images = value;
        },
        enumerable: true,
        configurable: true
    });
    return Hobby;
}());

var Image = /** @class */ (function () {
    function Image(name, description, url, dark) {
        if (dark === void 0) { dark = false; }
        this._name = name;
        this._description = description;
        this._dark = dark;
        this._url = url;
    }
    Object.defineProperty(Image.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Image.prototype, "description", {
        get: function () {
            return this._description;
        },
        set: function (value) {
            this._description = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Image.prototype, "url", {
        get: function () {
            return this._url;
        },
        set: function (value) {
            this._url = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Image.prototype, "dark", {
        get: function () {
            return this._dark;
        },
        set: function (value) {
            this._dark = value;
        },
        enumerable: true,
        configurable: true
    });
    return Image;
}());



/***/ })

}]);
//# sourceMappingURL=hobbies-hobbies-module.js.map