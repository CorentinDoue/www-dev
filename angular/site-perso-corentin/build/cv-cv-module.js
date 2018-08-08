(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["cv-cv-module"],{

/***/ "./src/app/cv/cv-home/cv-home.component.html":
/*!***************************************************!*\
  !*** ./src/app/cv/cv-home/cv-home.component.html ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div [ngClass]=\"theme\" #top>\r\n  <div class=\"cv\">\r\n    <div class=\"row justify-content-end position-absolute mt-2 download-tab\">\r\n        <a href=\"../../../assets/cv.pdf\" target=\"_blank\" class=\"mat-button download\" [ngClass]=\"routeAnimationsElements\">Download PDF version</a>\r\n    </div>\r\n    <div class=\"container\">\r\n      <div class=\"centrer\">\r\n        <div><h1 [ngClass]=\"routeAnimationsElements\">Curriculum Vitae</h1></div>\r\n      </div>\r\n      <div class=\"centrer d-md-none\" style=\"height: 50px\">\r\n        <a href=\"../../../assets/cv.pdf\" target=\"_blank\" class=\"mat-button download\" [ngClass]=\"routeAnimationsElements\">Download PDF version</a>\r\n      </div>\r\n      <div class=\"row\">\r\n        <div class=\"intro\" [ngClass]=\"routeAnimationsElements\">\r\n          Second year engineering student at the Ecole des Mines de Saint-Etienne\r\n          majoring in Computer Sciences, Data Sciences and Artificial Intelligence\r\n        </div>\r\n      </div>\r\n      <div class=\"row mt-2 mt-sm-4\">\r\n        <div class=\"col-lg-9 order-lg-last\" [ngClass]=\"routeAnimationsElements\">\r\n          <div class=\"row\">\r\n            <div class=\"col-xl-12\">\r\n              <h2> <mat-icon fontSet=\"fas\" fontIcon=\"fa-book\"></mat-icon>Education</h2>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2019 2016</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>École des Mines de Saint-Etienne (France)</h3>\r\n                  <p>Ingénieur Civil des Mines de Saint-Etienne diploma</p>\r\n                  <ul>\r\n                    <li>\r\n                      Engineering school\r\n                    </li>\r\n                    <li>\r\n                      Computer sciences, Data sciences and Artificial intelligence skills\r\n                    </li>\r\n                    <li>\r\n                      Development of several websites and Android apps\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2016 2014</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>Lycée Carnot (High school) - Dijon (France)</h3>\r\n                  <p>Preparatory classes</p>\r\n                  <ul>\r\n                    <li>\r\n                      Two-year undergraduate intensive course majoring in mathematics and physics.\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2014 2011</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>Lycée Fourier (High School) - Auxerre (France)</h3>\r\n                  <p>Baccalaureat in science (final French high-school diploma,\r\n                    equivalent of A-level) – Passed with first class honours</p>\r\n                  <ul>\r\n                    <li>\r\n                      Majoring in maths, introduction to physics and engineering\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div>\r\n            <div class=\"col-xl-12\">\r\n              <h2> <mat-icon fontSet=\"fab\" fontIcon=\"fa-hubspot\"></mat-icon>Experience</h2>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2018 2017</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>President of a student association</h3>\r\n                  <p>Associflard, Saint-Etienne (France)</p>\r\n                  <ul>\r\n                    <li>\r\n                      Management of a 15-person team\r\n                    </li>\r\n                    <li>\r\n                      Event planification (meals, walks) to improve the teacherstudent relationship (200 peoples)\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2018 2017</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>Vice-President of a student association</h3>\r\n                  <p>Student Union of the Ecole Des Mines, Saint-Etienne</p>\r\n                  <ul>\r\n                    <li>\r\n                      Management of a 40-person team\r\n                    </li>\r\n                    <li>\r\n                      Event planification (meals, parties, trips) for 200 students\r\n                    </li>\r\n                    <li>\r\n                      Students' representative\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2016</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>Industrial placement (4 weeks)</h3>\r\n                  <p>Yoplait, Monéteau (France)</p>\r\n                  <ul>\r\n                    <li>\r\n                      Discovery of an industrial job by acting in many workplace\r\n                      such as handling agent, cleaner and machine controller\r\n                    </li>\r\n                    <li>\r\n                      Learn about the organisation of a factory by many interviews\r\n                      for the placement report\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n              <div class=\"row cv-card\">\r\n                <div class=\"col-2 col-sm-1\"><p>2015</p></div>\r\n                <div class=\"col-10 col-sm-11\">\r\n                  <h3>Summer job (3 weeks)</h3>\r\n                  <p>Alfred Bekker API, Driffield, (United Kingdom)</p>\r\n                  <ul>\r\n                    <li>\r\n                      First experience in the working world\r\n                    </li>\r\n                    <li>\r\n                      Discovering the organisation of a car workshop by doing\r\n                      handling, inventory storage, cutting and assembliing metal\r\n                      and plastic parts\r\n                    </li>\r\n                  </ul>\r\n                </div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"col-lg-3 order-lg-first\" [ngClass]=\"routeAnimationsElements\">\r\n          <div class=\"row\">\r\n            <div class=\"col-xl-12\">\r\n              <h2><mat-icon fontSet=\"fas\" fontIcon=\"fa-code\"></mat-icon>Codes</h2>\r\n              <ul>\r\n                <li>Html/CSS</li>\r\n                <li>Javascript</li>\r\n                <li>Android</li>\r\n                <li>Python</li>\r\n                <li>Java</li>\r\n                <li>PHP</li>\r\n                <li>SQL</li>\r\n                <li>C</li>\r\n                <li>R</li>\r\n              </ul>\r\n            </div>\r\n\r\n            <div class=\"col-xl-12\">\r\n              <h2><mat-icon fontSet=\"fas\" fontIcon=\"fa-cogs\"></mat-icon>Skills</h2>\r\n              <ul>\r\n                <li>Pack Office</li>\r\n                <li>Photoshop</li>\r\n                <li>Illustrator</li>\r\n                <li>Blender</li>\r\n                <li>Unix</li>\r\n                <li>Git</li>\r\n              </ul>\r\n            </div>\r\n\r\n            <!--<div class=\"col-xl-12\">-->\r\n              <!--<a routerLink=\"/skills\" class=\"mat-button download\">Learn more about my skills</a>-->\r\n            <!--</div>-->\r\n\r\n            <div class=\"col-xl-12\">\r\n              <h2> <mat-icon fontSet=\"fas\" fontIcon=\"fa-language\"></mat-icon>Languages</h2>\r\n              <ul>\r\n                <li>French (mother tongue)</li>\r\n                <li>English (advanced)</li>\r\n                <li>German (Intermediate)</li>\r\n              </ul>\r\n            </div>\r\n\r\n            <div class=\"col-xl-12\">\r\n              <h2><mat-icon fontSet=\"fas\" fontIcon=\"fa-volleyball-ball\"></mat-icon>Hobbies</h2>\r\n              <ul>\r\n                <li>Climbing</li>\r\n                <li>Running</li>\r\n                <li>Cooking</li>\r\n                <li>Skiing</li>\r\n                <li>DIY</li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n\r\n"

/***/ }),

/***/ "./src/app/cv/cv-home/cv-home.component.scss":
/*!***************************************************!*\
  !*** ./src/app/cv/cv-home/cv-home.component.scss ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".download-tab {\n  width: 100%;\n  z-index: 2; }\n\n.container {\n  position: relative; }\n\n.container .centrer {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    height: 90px; }\n\n.container h1 {\n    text-align: center;\n    font-size: 2em;\n    text-transform: uppercase;\n    font-weight: bold;\n    display: inline-block;\n    padding: 10px;\n    margin: 0; }\n\n.container .intro {\n    width: 100%;\n    padding: 20px 240px 20px 240px;\n    text-align: center;\n    font-size: 1.2em; }\n\n.container h2 {\n    margin-top: 20px; }\n\n.container h2 mat-icon {\n      margin-right: 20px; }\n\n.container .cv-card {\n    margin-top: 30px; }\n\n.container .cv-card p {\n      font-size: 1.1em;\n      font-weight: bold; }\n\n.container .cv-card ul {\n      list-style-type: circle; }\n\n.container ul {\n    list-style-type: none;\n    font-size: 1.2em; }\n\n@media (max-width: 1200px) {\n    .container .intro {\n      padding: 20px 150px 20px 150px; } }\n\n@media (max-width: 992px) {\n    .container .intro {\n      padding: 20px 20px 20px 20px; } }\n\n@media (max-width: 768px) {\n    .container .intro {\n      padding: 15px 50px 15px 50px; }\n    .container .cv-card {\n      font-size: 0.9em; }\n      .container .cv-card h3 {\n        font-size: 1.5em; } }\n\n@media (max-width: 576px) {\n    .container .centrer {\n      height: 70px; }\n    .container h1 {\n      font-size: 1.4em; }\n    .container .cv-card {\n      font-size: 0.8em; }\n      .container .cv-card h3 {\n        font-size: 1.4em; }\n    .container .intro {\n      padding: 10px 20px 10px 20px; } }\n\n@media (max-width: 768px) {\n  .download-tab {\n    display: none; } }\n"

/***/ }),

/***/ "./src/app/cv/cv-home/cv-home.component.ts":
/*!*************************************************!*\
  !*** ./src/app/cv/cv-home/cv-home.component.ts ***!
  \*************************************************/
/*! exports provided: CvHomeComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CvHomeComponent", function() { return CvHomeComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
/* harmony import */ var _theme_hours_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../theme-hours.service */ "./src/app/theme-hours.service.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var CvHomeComponent = /** @class */ (function () {
    function CvHomeComponent(themeHoursService) {
        this.themeHoursService = themeHoursService;
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
    }
    CvHomeComponent.prototype.ngOnInit = function () {
        this.top.nativeElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        this.initTheme();
    };
    CvHomeComponent.prototype.initTheme = function () {
        var hours = new Date().getHours();
        var effectiveTheme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
            ? 'blue-night-theme'
            : 'blue-day-theme');
        this.theme = effectiveTheme;
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ViewChild"])('top'),
        __metadata("design:type", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ElementRef"])
    ], CvHomeComponent.prototype, "top", void 0);
    CvHomeComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-cv-home',
            template: __webpack_require__(/*! ./cv-home.component.html */ "./src/app/cv/cv-home/cv-home.component.html"),
            styles: [__webpack_require__(/*! ./cv-home.component.scss */ "./src/app/cv/cv-home/cv-home.component.scss")],
            animations: [_core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["routeAnimations"]]
        }),
        __metadata("design:paramtypes", [_theme_hours_service__WEBPACK_IMPORTED_MODULE_2__["ThemeHoursService"]])
    ], CvHomeComponent);
    return CvHomeComponent;
}());



/***/ }),

/***/ "./src/app/cv/cv-routing.module.ts":
/*!*****************************************!*\
  !*** ./src/app/cv/cv-routing.module.ts ***!
  \*****************************************/
/*! exports provided: CvRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CvRoutingModule", function() { return CvRoutingModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _cv_home_cv_home_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./cv-home/cv-home.component */ "./src/app/cv/cv-home/cv-home.component.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    {
        path: '',
        component: _cv_home_cv_home_component__WEBPACK_IMPORTED_MODULE_2__["CvHomeComponent"]
    }
];
var CvRoutingModule = /** @class */ (function () {
    function CvRoutingModule() {
    }
    CvRoutingModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forChild(routes)],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]]
        })
    ], CvRoutingModule);
    return CvRoutingModule;
}());



/***/ }),

/***/ "./src/app/cv/cv.module.ts":
/*!*********************************!*\
  !*** ./src/app/cv/cv.module.ts ***!
  \*********************************/
/*! exports provided: CvModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CvModule", function() { return CvModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _cv_home_cv_home_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./cv-home/cv-home.component */ "./src/app/cv/cv-home/cv-home.component.ts");
/* harmony import */ var _cv_routing_module__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./cv-routing.module */ "./src/app/cv/cv-routing.module.ts");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/shared.module */ "./src/app/shared/shared.module.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




var CvModule = /** @class */ (function () {
    function CvModule() {
    }
    CvModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__["SharedModule"],
                _cv_routing_module__WEBPACK_IMPORTED_MODULE_2__["CvRoutingModule"]
            ],
            declarations: [_cv_home_cv_home_component__WEBPACK_IMPORTED_MODULE_1__["CvHomeComponent"]]
        })
    ], CvModule);
    return CvModule;
}());



/***/ })

}]);
//# sourceMappingURL=cv-cv-module.js.map