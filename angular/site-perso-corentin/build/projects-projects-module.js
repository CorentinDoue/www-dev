(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["projects-projects-module"],{

/***/ "./src/app/projects/projects-home/projects-home.component.html":
/*!*********************************************************************!*\
  !*** ./src/app/projects/projects-home/projects-home.component.html ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div [ngClass]=\"theme\">\n  <div class=\"projects\">\n    <div class=\"container\">\n      <div class=\"centrer\">\n        <div><h1 [ngClass]=\"routeAnimationsElements\">Projects</h1></div>\n      </div>\n      <div class=\"row justify-content-center\">\n        <img src=\"../../../assets/comingsoon.jpg\" style=\"max-width: 100%\" [ngClass]=\"routeAnimationsElements\">\n      </div>\n    </div>\n  </div>\n</div>\n"

/***/ }),

/***/ "./src/app/projects/projects-home/projects-home.component.scss":
/*!*********************************************************************!*\
  !*** ./src/app/projects/projects-home/projects-home.component.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".container {\n  position: relative; }\n  .container .centrer {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    height: 90px; }\n  .container h1 {\n    text-align: center;\n    font-size: 2em;\n    text-transform: uppercase;\n    font-weight: bold;\n    display: inline-block;\n    padding: 10px;\n    margin: 0; }\n  @media (max-width: 576px) {\n  .centrer {\n    height: 70px; }\n  h1 {\n    font-size: 1.4em; } }\n"

/***/ }),

/***/ "./src/app/projects/projects-home/projects-home.component.ts":
/*!*******************************************************************!*\
  !*** ./src/app/projects/projects-home/projects-home.component.ts ***!
  \*******************************************************************/
/*! exports provided: ProjectsHomeComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProjectsHomeComponent", function() { return ProjectsHomeComponent; });
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



var ProjectsHomeComponent = /** @class */ (function () {
    function ProjectsHomeComponent(themeHoursService) {
        this.themeHoursService = themeHoursService;
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
    }
    ProjectsHomeComponent.prototype.ngOnInit = function () {
        this.initTheme();
    };
    ProjectsHomeComponent.prototype.initTheme = function () {
        var hours = new Date().getHours();
        var effectiveTheme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
            ? 'blue-night-theme'
            : 'blue-day-theme');
        this.theme = effectiveTheme;
    };
    ProjectsHomeComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-projects-home',
            template: __webpack_require__(/*! ./projects-home.component.html */ "./src/app/projects/projects-home/projects-home.component.html"),
            styles: [__webpack_require__(/*! ./projects-home.component.scss */ "./src/app/projects/projects-home/projects-home.component.scss")],
            animations: [_core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["routeAnimations"]]
        }),
        __metadata("design:paramtypes", [_theme_hours_service__WEBPACK_IMPORTED_MODULE_2__["ThemeHoursService"]])
    ], ProjectsHomeComponent);
    return ProjectsHomeComponent;
}());



/***/ }),

/***/ "./src/app/projects/projects-routing.module.ts":
/*!*****************************************************!*\
  !*** ./src/app/projects/projects-routing.module.ts ***!
  \*****************************************************/
/*! exports provided: ProjectsRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProjectsRoutingModule", function() { return ProjectsRoutingModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _projects_home_projects_home_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./projects-home/projects-home.component */ "./src/app/projects/projects-home/projects-home.component.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    {
        path: '',
        component: _projects_home_projects_home_component__WEBPACK_IMPORTED_MODULE_2__["ProjectsHomeComponent"]
    }
];
var ProjectsRoutingModule = /** @class */ (function () {
    function ProjectsRoutingModule() {
    }
    ProjectsRoutingModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forChild(routes)],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]]
        })
    ], ProjectsRoutingModule);
    return ProjectsRoutingModule;
}());



/***/ }),

/***/ "./src/app/projects/projects.module.ts":
/*!*********************************************!*\
  !*** ./src/app/projects/projects.module.ts ***!
  \*********************************************/
/*! exports provided: ProjectsModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProjectsModule", function() { return ProjectsModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _projects_routing_module__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./projects-routing.module */ "./src/app/projects/projects-routing.module.ts");
/* harmony import */ var _projects_home_projects_home_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./projects-home/projects-home.component */ "./src/app/projects/projects-home/projects-home.component.ts");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/shared.module */ "./src/app/shared/shared.module.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




var ProjectsModule = /** @class */ (function () {
    function ProjectsModule() {
    }
    ProjectsModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__["SharedModule"],
                _projects_routing_module__WEBPACK_IMPORTED_MODULE_1__["ProjectsRoutingModule"]
            ],
            declarations: [_projects_home_projects_home_component__WEBPACK_IMPORTED_MODULE_2__["ProjectsHomeComponent"]]
        })
    ], ProjectsModule);
    return ProjectsModule;
}());



/***/ })

}]);
//# sourceMappingURL=projects-projects-module.js.map