(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["main"],{

/***/ "./src/$$_lazy_route_resource lazy recursive":
/*!**********************************************************!*\
  !*** ./src/$$_lazy_route_resource lazy namespace object ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./cv/cv.module": [
		"./src/app/cv/cv.module.ts",
		"cv-cv-module"
	],
	"./hobbies/hobbies.module": [
		"./src/app/hobbies/hobbies.module.ts",
		"hobbies-hobbies-module"
	],
	"./projects/projects.module": [
		"./src/app/projects/projects.module.ts",
		"projects-projects-module"
	],
	"./skills/skills.module": [
		"./src/app/skills/skills.module.ts",
		"skills-skills-module"
	]
};
function webpackAsyncContext(req) {
	var ids = map[req];
	if(!ids) {
		return Promise.resolve().then(function() {
			var e = new Error('Cannot find module "' + req + '".');
			e.code = 'MODULE_NOT_FOUND';
			throw e;
		});
	}
	return __webpack_require__.e(ids[1]).then(function() {
		var module = __webpack_require__(ids[0]);
		return module;
	});
}
webpackAsyncContext.keys = function webpackAsyncContextKeys() {
	return Object.keys(map);
};
webpackAsyncContext.id = "./src/$$_lazy_route_resource lazy recursive";
module.exports = webpackAsyncContext;

/***/ }),

/***/ "./src/app/app-routing.module.ts":
/*!***************************************!*\
  !*** ./src/app/app-routing.module.ts ***!
  \***************************************/
/*! exports provided: AppRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppRoutingModule", function() { return AppRoutingModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _not_found_not_found_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./not-found/not-found.component */ "./src/app/not-found/not-found.component.ts");
/* harmony import */ var _home_home_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./home/home.component */ "./src/app/home/home.component.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




var routes = [
    {
        path: '',
        redirectTo: 'about',
        pathMatch: 'full'
    },
    {
        path: 'about',
        component: _home_home_component__WEBPACK_IMPORTED_MODULE_3__["HomeComponent"],
        data: { state: 'home' }
    },
    {
        path: 'cv',
        loadChildren: './cv/cv.module#CvModule',
        data: { state: 'cv' }
    },
    {
        path: 'skills',
        loadChildren: './skills/skills.module#SkillsModule',
        data: { state: 'skills' }
    },
    {
        path: 'projects',
        loadChildren: './projects/projects.module#ProjectsModule',
        data: { state: 'projects' }
    },
    {
        path: 'hobbies',
        loadChildren: './hobbies/hobbies.module#HobbiesModule',
        data: { state: 'hobbies' }
    },
    {
        path: '**',
        component: _not_found_not_found_component__WEBPACK_IMPORTED_MODULE_2__["NotFoundComponent"],
        data: { state: '404' }
    }
];
var AppRoutingModule = /** @class */ (function () {
    function AppRoutingModule() {
    }
    AppRoutingModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            // useHash supports github.io demo page, remove in your app
            imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forRoot(routes)],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]]
        })
    ], AppRoutingModule);
    return AppRoutingModule;
}());



/***/ }),

/***/ "./src/app/app.component.html":
/*!************************************!*\
  !*** ./src/app/app.component.html ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<mat-sidenav-container>\n\n  <mat-sidenav #sidenav mode=\"push\">\n    <mat-toolbar color=\"primary\" ><span class=\"w-100 text-center\">Corentin Doué</span></mat-toolbar>\n    <mat-nav-list>\n      <a mat-list-item *ngFor=\"let item of navigation\" (click)=\"sidenav.close()\"\n         [routerLink]=\"[item.link]\" routerLinkActive=\"active\">\n        {{item.label}}\n      </a>\n      <a mat-list-item\n         href=\"https://github.com/corentindoue/\"\n         target=\"_blank\">\n        Github\n      </a>\n    </mat-nav-list>\n  </mat-sidenav>\n\n  <div class=\"toolbar\">\n    <mat-toolbar color=\"primary\">\n      <button mat-icon-button class=\"d-md-none\" (click)=\"sidenav.open()\">\n        <mat-icon fontSet=\"fas\" fontIcon=\"fa-bars\"></mat-icon>\n      </button>\n\n\n\n      <span routerLink=\"\" class=\"branding spacer center d-inline d-md-none\">\n        <mat-icon fontSet=\"fas\" fontIcon=\"fa-code-branch\" class=\"d-none d-sm-inline\"></mat-icon>\n        Corentin Doué\n      </span>\n      <span routerLink=\"\" class=\"branding spacer d-none d-md-inline\">\n        <mat-icon fontSet=\"fas\" fontIcon=\"fa-code-branch\"></mat-icon>\n        Corentin Doué\n      </span>\n\n      <span class=\"d-none d-md-inline\">\n          <button mat-button class=\"nav-button\" *ngFor=\"let item of navigation\"\n                  [routerLink]=\"[item.link]\" routerLinkActive=\"active\">\n            {{item.label}}\n          </button>\n        </span>\n    </mat-toolbar>\n  </div>\n\n  <div class=\"wrapper\">\n\n    <div class=\"content\"\n         [@routeAnimations]=\"getState(o)\">\n      <router-outlet #o=\"outlet\"></router-outlet>\n    </div>\n\n    <div class=\"footer\">\n      <div class=\"row\">\n        <div class=\"col-sm-12 links\">\n          <a href=\"https://www.linkedin.com/in/corentin-doue\" target=\"_blank\">\n            <mat-icon fontSet=\"fab\" fontIcon=\"fa-linkedin-in\"></mat-icon>\n            <span>Linkedin</span>\n          </a>\n          <a href=\"https://www.github.com/corentindoue\" target=\"_blank\">\n            <mat-icon fontSet=\"fab\" fontIcon=\"fa-github\"></mat-icon>\n            <span>Github</span>\n          </a>\n          <a href=\"mailto:corentin.doue@etu.emse.fr\" target=\"_blank\">\n            <mat-icon fontSet=\"fas\" fontIcon=\"fa-at\"></mat-icon>\n            <span>corentin.doue@etu.emse.fr</span>\n          </a>\n          <a href=\"tel:+33602389814\">\n            <mat-icon fontSet=\"fas\" fontIcon=\"fa-phone\"></mat-icon>\n            <span>+33 (0)6023 89814</span>\n          </a>\n          <a href=\"https://goo.gl/maps/c2GonWtoTEv\" target=\"_blank\" matTooltip=\"20 Bd Alexandre de Fraissinette 42100 Saint-Etienne (France)\">\n            <mat-icon fontSet=\"fas\" fontIcon=\"fa-map-marker-alt\"></mat-icon>\n            <span>Saint-Etienne (France)</span>\n          </a>\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-12 signature\">\n          &#169; <span class=\"year\">{{year}}</span> - Corentin Doué\n        </div>\n      </div>\n    </div>\n\n  </div>\n\n</mat-sidenav-container>\n"

/***/ }),

/***/ "./src/app/app.component.scss":
/*!************************************!*\
  !*** ./src/app/app.component.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "mat-sidenav-container {\n  height: 100%;\n  width: 100%; }\n  mat-sidenav-container .toolbar {\n    position: fixed;\n    width: 100%;\n    display: flex; }\n  mat-sidenav-container .toolbar mat-toolbar .branding {\n      font-size: 1.2em;\n      font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; }\n  mat-sidenav-container .toolbar .nav-button {\n      margin: 0 10px 0 0; }\n  mat-sidenav-container .toolbar mat-icon {\n      font-size: 24px; }\n  mat-sidenav-container .toolbar .branding {\n      cursor: pointer;\n      padding-top: 4px; }\n  mat-sidenav-container .toolbar .branding.center {\n        text-align: center; }\n  mat-sidenav-container .toolbar .branding img {\n        position: relative;\n        top: -2px;\n        width: 48px;\n        height: 48px; }\n  mat-sidenav-container .toolbar .sign-in-button {\n      line-height: 35px;\n      margin-right: 10px; }\n  mat-sidenav-container .toolbar .spacer {\n      flex: 1 1 auto; }\n  @media (max-width: 992px) {\n      mat-sidenav-container .toolbar .nav-button {\n        min-width: 0;\n        padding: 0 10px; }\n      mat-sidenav-container .toolbar .sign-in-button {\n        min-width: 0;\n        padding: 0 10px;\n        margin: 0 5px 0 0; } }\n  mat-sidenav-container .wrapper {\n    position: absolute;\n    top: 64px;\n    left: 0;\n    right: 0;\n    bottom: 0;\n    display: flex;\n    flex-direction: column;\n    overflow-y: auto;\n    overflow-x: hidden; }\n  mat-sidenav-container .wrapper .content {\n      position: relative;\n      flex: 1 0 auto; }\n  mat-sidenav-container .wrapper .footer {\n      flex: 0 0 auto;\n      padding: 0 15px;\n      text-align: center; }\n  mat-sidenav-container .wrapper .footer .row {\n        padding: 10px 0; }\n  mat-sidenav-container .wrapper .footer .row .links a {\n          transition: padding 0.5s;\n          display: inline-block;\n          padding: 20px 5px; }\n  mat-sidenav-container .wrapper .footer .row .links a:hover {\n            text-decoration: none; }\n  mat-sidenav-container .wrapper .footer .row .links a mat-icon {\n            font-size: 30px;\n            width: 35px; }\n  mat-sidenav-container .wrapper .footer .row .links a span {\n            display: inline-block;\n            padding: 0 0 0 3px;\n            overflow: hidden;\n            text-align: left;\n            white-space: nowrap;\n            transition: width 0.5s; }\n  @media (min-width: 992px) {\n          mat-sidenav-container .wrapper .footer .row .links a {\n            padding: 20px 10px; } }\n  @media (max-width: 768px) {\n          mat-sidenav-container .wrapper .footer .row .links a {\n            padding: 20px; }\n            mat-sidenav-container .wrapper .footer .row .links a span {\n              width: 0;\n              padding: 0; } }\n  @media (max-width: 576px) {\n          mat-sidenav-container .wrapper .footer .row .links a {\n            padding: 20px 5px; } }\n  @media (min-width: 576px) {\n          mat-sidenav-container .wrapper .footer .row .signature {\n            position: relative; }\n            mat-sidenav-container .wrapper .footer .row .signature a {\n              position: absolute;\n              right: 15px; } }\n  @media (max-width: 576px) {\n    mat-sidenav-container .wrapper {\n      top: 56px; } }\n  mat-sidenav {\n  width: 250px; }\n  mat-sidenav .branding {\n    height: 64px;\n    padding: 8px 10px;\n    font-size: 20px;\n    font-weight: 500; }\n  mat-sidenav .branding img {\n      height: 48px;\n      margin: 2px 10px 0 0; }\n  mat-sidenav .branding span {\n      position: relative;\n      top: 3px; }\n  mat-sidenav .mat-nav-list {\n    padding-top: 0; }\n"

/***/ }),

/***/ "./src/app/app.component.ts":
/*!**********************************!*\
  !*** ./src/app/app.component.ts ***!
  \**********************************/
/*! exports provided: AppComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppComponent", function() { return AppComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
/* harmony import */ var _angular_cdk_overlay__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/cdk/overlay */ "./node_modules/@angular/cdk/esm5/overlay.es5.js");
/* harmony import */ var browser_detect__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! browser-detect */ "./node_modules/browser-detect/dist/browser-detect.es5.js");
/* harmony import */ var _core_animations_animations_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./core/animations/animations.service */ "./src/app/core/animations/animations.service.ts");
/* harmony import */ var _theme_hours_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./theme-hours.service */ "./src/app/theme-hours.service.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var AppComponent = /** @class */ (function () {
    function AppComponent(overlayContainer, animationService, themeHoursService) {
        this.overlayContainer = overlayContainer;
        this.animationService = animationService;
        this.themeHoursService = themeHoursService;
        this.year = new Date().getFullYear();
        this.navigation = [
            { link: 'about', label: 'About' },
            { link: 'cv', label: 'Curriculum vitae' },
            { link: 'skills', label: 'Skills' },
            { link: 'projects', label: 'Projects' },
            { link: 'hobbies', label: 'Hobbies' }
        ];
    }
    AppComponent_1 = AppComponent;
    AppComponent.isIEorEdge = function () {
        return ['ie', 'edge'].includes(Object(browser_detect__WEBPACK_IMPORTED_MODULE_3__["default"])().name);
    };
    AppComponent.prototype.ngOnInit = function () {
        this.initTheme();
        if (AppComponent_1.isIEorEdge()) {
            this.animationService.updateRouteAnimationType(false, true);
        }
    };
    AppComponent.prototype.initTheme = function () {
        var hours = new Date().getHours();
        var effectiveTheme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
            ? 'night-theme'
            : 'day-theme');
        this.componentCssClass = effectiveTheme;
        var classList = this.overlayContainer.getContainerElement().classList;
        var toRemove = Array.from(classList).filter(function (item) {
            return item.includes('-theme');
        });
        if (toRemove.length) {
            classList.remove.apply(classList, toRemove);
        }
        classList.add(effectiveTheme);
    };
    AppComponent.prototype.getState = function (outlet) {
        return outlet.activatedRouteData.state;
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["HostBinding"])('class'),
        __metadata("design:type", Object)
    ], AppComponent.prototype, "componentCssClass", void 0);
    AppComponent = AppComponent_1 = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-root',
            template: __webpack_require__(/*! ./app.component.html */ "./src/app/app.component.html"),
            styles: [__webpack_require__(/*! ./app.component.scss */ "./src/app/app.component.scss")],
            animations: [_core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["routeAnimations"]]
        }),
        __metadata("design:paramtypes", [_angular_cdk_overlay__WEBPACK_IMPORTED_MODULE_2__["OverlayContainer"],
            _core_animations_animations_service__WEBPACK_IMPORTED_MODULE_4__["AnimationsService"],
            _theme_hours_service__WEBPACK_IMPORTED_MODULE_5__["ThemeHoursService"]])
    ], AppComponent);
    return AppComponent;
    var AppComponent_1;
}());



/***/ }),

/***/ "./src/app/app.module.ts":
/*!*******************************!*\
  !*** ./src/app/app.module.ts ***!
  \*******************************/
/*! exports provided: AppModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppModule", function() { return AppModule; });
/* harmony import */ var _angular_platform_browser__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/platform-browser */ "./node_modules/@angular/platform-browser/fesm5/platform-browser.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _app_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./app.component */ "./src/app/app.component.ts");
/* harmony import */ var _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/platform-browser/animations */ "./node_modules/@angular/platform-browser/fesm5/animations.js");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./shared/shared.module */ "./src/app/shared/shared.module.ts");
/* harmony import */ var _app_routing_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./app-routing.module */ "./src/app/app-routing.module.ts");
/* harmony import */ var _not_found_not_found_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./not-found/not-found.component */ "./src/app/not-found/not-found.component.ts");
/* harmony import */ var _home_home_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./home/home.component */ "./src/app/home/home.component.ts");
/* harmony import */ var _core_core_module__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./core/core.module */ "./src/app/core/core.module.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};









var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            declarations: [
                _app_component__WEBPACK_IMPORTED_MODULE_2__["AppComponent"],
                _not_found_not_found_component__WEBPACK_IMPORTED_MODULE_6__["NotFoundComponent"],
                _home_home_component__WEBPACK_IMPORTED_MODULE_7__["HomeComponent"]
            ],
            imports: [
                // angular
                _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_3__["BrowserAnimationsModule"],
                _angular_platform_browser__WEBPACK_IMPORTED_MODULE_0__["BrowserModule"],
                // core & shared
                _shared_shared_module__WEBPACK_IMPORTED_MODULE_4__["SharedModule"],
                _core_core_module__WEBPACK_IMPORTED_MODULE_8__["CoreModule"],
                // app
                _app_routing_module__WEBPACK_IMPORTED_MODULE_5__["AppRoutingModule"]
            ],
            providers: [],
            bootstrap: [_app_component__WEBPACK_IMPORTED_MODULE_2__["AppComponent"]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "./src/app/core/animations/animations.service.ts":
/*!*******************************************************!*\
  !*** ./src/app/core/animations/animations.service.ts ***!
  \*******************************************************/
/*! exports provided: AnimationsService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AnimationsService", function() { return AnimationsService; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var AnimationsService = /** @class */ (function () {
    function AnimationsService() {
    }
    AnimationsService_1 = AnimationsService;
    AnimationsService.isRouteAnimationsType = function (type) {
        return AnimationsService_1.routeAnimationType === type;
    };
    AnimationsService.prototype.updateRouteAnimationType = function (pageAnimations, elementsAnimations) {
        AnimationsService_1.routeAnimationType =
            pageAnimations && elementsAnimations
                ? 'ALL'
                : pageAnimations ? 'PAGE' : elementsAnimations ? 'ELEMENTS' : 'NONE';
    };
    AnimationsService.routeAnimationType = 'ALL';
    AnimationsService = AnimationsService_1 = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"])(),
        __metadata("design:paramtypes", [])
    ], AnimationsService);
    return AnimationsService;
    var AnimationsService_1;
}());



/***/ }),

/***/ "./src/app/core/animations/route.animations.ts":
/*!*****************************************************!*\
  !*** ./src/app/core/animations/route.animations.ts ***!
  \*****************************************************/
/*! exports provided: ROUTE_ANIMATIONS_ELEMENTS, routeAnimations, isRouteAnimationsAll, isRouteAnimationsNone, isRouteAnimationsPage, isRouteAnimationsElements */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ROUTE_ANIMATIONS_ELEMENTS", function() { return ROUTE_ANIMATIONS_ELEMENTS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "routeAnimations", function() { return routeAnimations; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isRouteAnimationsAll", function() { return isRouteAnimationsAll; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isRouteAnimationsNone", function() { return isRouteAnimationsNone; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isRouteAnimationsPage", function() { return isRouteAnimationsPage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isRouteAnimationsElements", function() { return isRouteAnimationsElements; });
/* harmony import */ var _angular_animations__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/animations */ "./node_modules/@angular/animations/fesm5/animations.js");
/* harmony import */ var _animations_service__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./animations.service */ "./src/app/core/animations/animations.service.ts");


var ROUTE_ANIMATIONS_ELEMENTS = 'route-animations-elements';
var STEPS_ALL = [
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["query"])(':enter > *', Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ opacity: 0, position: 'fixed' }), {
        optional: true
    }),
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["query"])(':enter .' + ROUTE_ANIMATIONS_ELEMENTS, Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ opacity: 0 }), {
        optional: true
    }),
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["sequence"])([
        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["query"])(':leave > *', [
            Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ transform: 'translateY(0%)', opacity: 1 }),
            Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["animate"])('0.2s ease-in-out', Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ transform: 'translateY(-3%)', opacity: 0 })),
            Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ position: 'fixed' })
        ], { optional: true }),
        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["query"])(':enter > *', [
            Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({
                transform: 'translateY(-3%)',
                opacity: 0,
                position: 'static'
            }),
            Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["animate"])('0.5s ease-in-out', Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ transform: 'translateY(0%)', opacity: 1 }))
        ], { optional: true })
    ]),
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["query"])(':enter .' + ROUTE_ANIMATIONS_ELEMENTS, Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["stagger"])(100, [
        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ transform: 'translateY(15%)', opacity: 0 }),
        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["animate"])('0.5s ease-in-out', Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["style"])({ transform: 'translateY(0%)', opacity: 1 }))
    ]), { optional: true })
];
var STEPS_NONE = [];
var STEPS_PAGE = [STEPS_ALL[0], STEPS_ALL[2]];
var STEPS_ELEMENTS = [STEPS_ALL[1], STEPS_ALL[3]];
var routeAnimations = Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["trigger"])('routeAnimations', [
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["transition"])(isRouteAnimationsAll, STEPS_ALL),
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["transition"])(isRouteAnimationsNone, STEPS_NONE),
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["transition"])(isRouteAnimationsPage, STEPS_PAGE),
    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_0__["transition"])(isRouteAnimationsElements, STEPS_ELEMENTS)
]);
function isRouteAnimationsAll() {
    return _animations_service__WEBPACK_IMPORTED_MODULE_1__["AnimationsService"].isRouteAnimationsType('ALL');
}
function isRouteAnimationsNone() {
    return _animations_service__WEBPACK_IMPORTED_MODULE_1__["AnimationsService"].isRouteAnimationsType('NONE');
}
function isRouteAnimationsPage() {
    return _animations_service__WEBPACK_IMPORTED_MODULE_1__["AnimationsService"].isRouteAnimationsType('PAGE');
}
function isRouteAnimationsElements() {
    return _animations_service__WEBPACK_IMPORTED_MODULE_1__["AnimationsService"].isRouteAnimationsType('ELEMENTS');
}


/***/ }),

/***/ "./src/app/core/core.module.ts":
/*!*************************************!*\
  !*** ./src/app/core/core.module.ts ***!
  \*************************************/
/*! exports provided: CoreModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CoreModule", function() { return CoreModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/fesm5/http.js");
/* harmony import */ var _animations_animations_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./animations/animations.service */ "./src/app/core/animations/animations.service.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (undefined && undefined.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};




var CoreModule = /** @class */ (function () {
    function CoreModule(parentModule) {
        if (parentModule) {
            throw new Error('CoreModule is already loaded. Import only in AppModule');
        }
    }
    CoreModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                // angular
                _angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"],
                _angular_common_http__WEBPACK_IMPORTED_MODULE_2__["HttpClientModule"]
            ],
            declarations: [],
            providers: [_animations_animations_service__WEBPACK_IMPORTED_MODULE_3__["AnimationsService"]]
        }),
        __param(0, Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Optional"])()),
        __param(0, Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["SkipSelf"])()),
        __metadata("design:paramtypes", [CoreModule])
    ], CoreModule);
    return CoreModule;
}());



/***/ }),

/***/ "./src/app/home/home.component.html":
/*!******************************************!*\
  !*** ./src/app/home/home.component.html ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<!--<img src=\"../../assets/abstract-wallpaper.png\" style=\"width: 100%\">-->\n\n<div class=\"background\">\n  <div class=\"gradient\">\n    <div class=\"container\">\n      <div class=\"centrer\">\n        <div><h1 [ngClass]=\"routeAnimationsElements\">About Me</h1></div>\n      </div>\n    </div>\n  </div>\n</div>\n<div class=\"container\">\n  <p [ngClass]=\"routeAnimationsElements\">\n    I am a french engineering student at <a href=\"https://www.mines-stetienne.fr/\">Mines Saint-Etienne</a>.\n    I majored in Computer Sciences and Artificial Intelligence during the past year.\n    For my last year before graduation, I am going to major in Data Sciences and Big Data.\n  </p>\n  <p [ngClass]=\"routeAnimationsElements\">\n    In parallel with my courses, I have most of the time a web development project. To achieve them, I take a lot of MOOCs and read many articles.\n    That is why I acquired plenty of skills. <a class=\"more\" routerLink=\"/skills\">Learn more ...</a>\n  </p>\n  <p [ngClass]=\"routeAnimationsElements\">\n    The engineering school makes me also discover the student's associations.\n    I spend the last year in three Executive Committee of associations including the Student Union of the school.\n    It learns me a lot about team management and commitment.\n  </p>\n  <p [ngClass]=\"routeAnimationsElements\">\n    Moreover I find time for my hobbies. I run at least ones a week. I also regularly practise climbing and skiing. I enjoy cooking too.\n  </p>\n</div>\n\n\n"

/***/ }),

/***/ "./src/app/home/home.component.scss":
/*!******************************************!*\
  !*** ./src/app/home/home.component.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "p {\n  font-size: 1.5em;\n  text-align: justify; }\n  p a {\n    text-decoration: underline; }\n  .background {\n  position: relative; }\n  .background::before {\n    position: absolute;\n    top: 0;\n    left: 0;\n    bottom: 0;\n    right: 0;\n    background: url('abstract-wallpaper-light.png') no-repeat center top;\n    background-size: cover;\n    opacity: 0.7;\n    content: '';\n    z-index: 0; }\n  .background .gradient::before {\n    position: absolute;\n    top: 50%;\n    left: 0;\n    bottom: 0;\n    right: 0;\n    content: '';\n    z-index: 0; }\n  .background .container {\n    position: relative; }\n  .background .container .centrer {\n      display: flex;\n      align-items: center;\n      justify-content: center;\n      height: 500px; }\n  @media (max-width: 768px) {\n      .background .container .centrer {\n        height: 300px; } }\n  @media (max-width: 576px) {\n      .background .container .centrer {\n        height: 200px; } }\n  .background .container h1 {\n      text-align: center;\n      font-size: 3em;\n      text-transform: uppercase;\n      font-weight: bold;\n      display: inline-block;\n      padding: 20px;\n      background-color: rgba(48, 48, 48, 0.6);\n      color: white;\n      border: solid 2px white; }\n  @media (max-width: 576px) {\n  p {\n    font-size: 1.2em; } }\n"

/***/ }),

/***/ "./src/app/home/home.component.ts":
/*!****************************************!*\
  !*** ./src/app/home/home.component.ts ***!
  \****************************************/
/*! exports provided: HomeComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HomeComponent", function() { return HomeComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var HomeComponent = /** @class */ (function () {
    function HomeComponent() {
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
    }
    HomeComponent.prototype.ngOnInit = function () { };
    HomeComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-home',
            template: __webpack_require__(/*! ./home.component.html */ "./src/app/home/home.component.html"),
            styles: [__webpack_require__(/*! ./home.component.scss */ "./src/app/home/home.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], HomeComponent);
    return HomeComponent;
}());



/***/ }),

/***/ "./src/app/not-found/not-found.component.html":
/*!****************************************************!*\
  !*** ./src/app/not-found/not-found.component.html ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div class=\"background\">\n  <div class=\"gradient\">\n    <div class=\"container\">\n      <div class=\"centrer\">\n        <div>\n          <h1 [ngClass]=\"routeAnimationsElements\">< / 404 ></h1>\n        </div>\n        <p [ngClass]=\"routeAnimationsElements\">There is nothing here</p>\n      </div>\n    </div>\n  </div>\n</div>\n"

/***/ }),

/***/ "./src/app/not-found/not-found.component.scss":
/*!****************************************************!*\
  !*** ./src/app/not-found/not-found.component.scss ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".background {\n  position: relative; }\n  .background::before {\n    position: absolute;\n    top: 0;\n    left: 0;\n    bottom: 0;\n    right: 0;\n    background: url('abstract-wallpaper-light.png') no-repeat center top;\n    background-size: cover;\n    opacity: 0.7;\n    content: '';\n    z-index: 0; }\n  .background .gradient::before {\n    position: absolute;\n    top: 50%;\n    left: 0;\n    bottom: 0;\n    right: 0;\n    content: '';\n    z-index: 0; }\n  .background .container {\n    position: relative; }\n  .background .container .centrer {\n      display: flex;\n      flex-direction: column;\n      align-items: center;\n      justify-content: center;\n      height: 500px; }\n  .background .container h1 {\n      text-align: center;\n      font-size: 4em;\n      text-transform: uppercase;\n      font-weight: bold;\n      display: inline-block;\n      padding: 20px;\n      background-color: rgba(48, 48, 48, 0.6);\n      color: white;\n      border: solid 2px white; }\n  .background .container p {\n      font-size: 2em;\n      text-align: left;\n      font-weight: bold; }\n  @media (max-width: 768px) {\n      .background .container .centrer {\n        height: 300px; } }\n  @media (max-width: 576px) {\n      .background .container .centrer {\n        height: 300px; }\n      .background .container h1 {\n        font-size: 3em; }\n      .background .container p {\n        font-size: 1em; } }\n"

/***/ }),

/***/ "./src/app/not-found/not-found.component.ts":
/*!**************************************************!*\
  !*** ./src/app/not-found/not-found.component.ts ***!
  \**************************************************/
/*! exports provided: NotFoundComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "NotFoundComponent", function() { return NotFoundComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var NotFoundComponent = /** @class */ (function () {
    function NotFoundComponent() {
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
    }
    NotFoundComponent.prototype.ngOnInit = function () {
    };
    NotFoundComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-not-found',
            template: __webpack_require__(/*! ./not-found.component.html */ "./src/app/not-found/not-found.component.html"),
            styles: [__webpack_require__(/*! ./not-found.component.scss */ "./src/app/not-found/not-found.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], NotFoundComponent);
    return NotFoundComponent;
}());



/***/ }),

/***/ "./src/app/shared/shared.module.ts":
/*!*****************************************!*\
  !*** ./src/app/shared/shared.module.ts ***!
  \*****************************************/
/*! exports provided: SharedModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SharedModule", function() { return SharedModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _angular_material_button__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/material/button */ "./node_modules/@angular/material/esm5/button.es5.js");
/* harmony import */ var _angular_material_toolbar__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/material/toolbar */ "./node_modules/@angular/material/esm5/toolbar.es5.js");
/* harmony import */ var _angular_material_menu__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/material/menu */ "./node_modules/@angular/material/esm5/menu.es5.js");
/* harmony import */ var _angular_material_select__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/material/select */ "./node_modules/@angular/material/esm5/select.es5.js");
/* harmony import */ var _angular_material_tabs__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/material/tabs */ "./node_modules/@angular/material/esm5/tabs.es5.js");
/* harmony import */ var _angular_material_input__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @angular/material/input */ "./node_modules/@angular/material/esm5/input.es5.js");
/* harmony import */ var _angular_material_progress_spinner__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @angular/material/progress-spinner */ "./node_modules/@angular/material/esm5/progress-spinner.es5.js");
/* harmony import */ var _angular_material_chips__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @angular/material/chips */ "./node_modules/@angular/material/esm5/chips.es5.js");
/* harmony import */ var _angular_material_sidenav__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @angular/material/sidenav */ "./node_modules/@angular/material/esm5/sidenav.es5.js");
/* harmony import */ var _angular_material_checkbox__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @angular/material/checkbox */ "./node_modules/@angular/material/esm5/checkbox.es5.js");
/* harmony import */ var _angular_material_card__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @angular/material/card */ "./node_modules/@angular/material/esm5/card.es5.js");
/* harmony import */ var _angular_material_list__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @angular/material/list */ "./node_modules/@angular/material/esm5/list.es5.js");
/* harmony import */ var _angular_material_icon__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! @angular/material/icon */ "./node_modules/@angular/material/esm5/icon.es5.js");
/* harmony import */ var _angular_material_tooltip__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! @angular/material/tooltip */ "./node_modules/@angular/material/esm5/tooltip.es5.js");
/* harmony import */ var _angular_material_snack_bar__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! @angular/material/snack-bar */ "./node_modules/@angular/material/esm5/snack-bar.es5.js");
/* harmony import */ var _angular_material_slide_toggle__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! @angular/material/slide-toggle */ "./node_modules/@angular/material/esm5/slide-toggle.es5.js");
/* harmony import */ var angular_font_awesome__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! angular-font-awesome */ "./node_modules/angular-font-awesome/dist/angular-font-awesome.es5.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




















var SharedModule = /** @class */ (function () {
    function SharedModule() {
    }
    SharedModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormsModule"],
                _angular_material_button__WEBPACK_IMPORTED_MODULE_3__["MatButtonModule"],
                _angular_material_toolbar__WEBPACK_IMPORTED_MODULE_4__["MatToolbarModule"],
                _angular_material_select__WEBPACK_IMPORTED_MODULE_6__["MatSelectModule"],
                _angular_material_tabs__WEBPACK_IMPORTED_MODULE_7__["MatTabsModule"],
                _angular_material_input__WEBPACK_IMPORTED_MODULE_8__["MatInputModule"],
                _angular_material_progress_spinner__WEBPACK_IMPORTED_MODULE_9__["MatProgressSpinnerModule"],
                _angular_material_chips__WEBPACK_IMPORTED_MODULE_10__["MatChipsModule"],
                _angular_material_card__WEBPACK_IMPORTED_MODULE_13__["MatCardModule"],
                _angular_material_sidenav__WEBPACK_IMPORTED_MODULE_11__["MatSidenavModule"],
                _angular_material_checkbox__WEBPACK_IMPORTED_MODULE_12__["MatCheckboxModule"],
                _angular_material_list__WEBPACK_IMPORTED_MODULE_14__["MatListModule"],
                _angular_material_menu__WEBPACK_IMPORTED_MODULE_5__["MatMenuModule"],
                _angular_material_icon__WEBPACK_IMPORTED_MODULE_15__["MatIconModule"],
                _angular_material_tooltip__WEBPACK_IMPORTED_MODULE_16__["MatTooltipModule"],
                _angular_material_snack_bar__WEBPACK_IMPORTED_MODULE_17__["MatSnackBarModule"],
                _angular_material_slide_toggle__WEBPACK_IMPORTED_MODULE_18__["MatSlideToggleModule"],
                angular_font_awesome__WEBPACK_IMPORTED_MODULE_19__["AngularFontAwesomeModule"]
            ],
            declarations: [],
            exports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormsModule"],
                _angular_material_button__WEBPACK_IMPORTED_MODULE_3__["MatButtonModule"],
                _angular_material_menu__WEBPACK_IMPORTED_MODULE_5__["MatMenuModule"],
                _angular_material_tabs__WEBPACK_IMPORTED_MODULE_7__["MatTabsModule"],
                _angular_material_chips__WEBPACK_IMPORTED_MODULE_10__["MatChipsModule"],
                _angular_material_input__WEBPACK_IMPORTED_MODULE_8__["MatInputModule"],
                _angular_material_progress_spinner__WEBPACK_IMPORTED_MODULE_9__["MatProgressSpinnerModule"],
                _angular_material_checkbox__WEBPACK_IMPORTED_MODULE_12__["MatCheckboxModule"],
                _angular_material_card__WEBPACK_IMPORTED_MODULE_13__["MatCardModule"],
                _angular_material_sidenav__WEBPACK_IMPORTED_MODULE_11__["MatSidenavModule"],
                _angular_material_list__WEBPACK_IMPORTED_MODULE_14__["MatListModule"],
                _angular_material_select__WEBPACK_IMPORTED_MODULE_6__["MatSelectModule"],
                _angular_material_toolbar__WEBPACK_IMPORTED_MODULE_4__["MatToolbarModule"],
                _angular_material_icon__WEBPACK_IMPORTED_MODULE_15__["MatIconModule"],
                _angular_material_tooltip__WEBPACK_IMPORTED_MODULE_16__["MatTooltipModule"],
                _angular_material_snack_bar__WEBPACK_IMPORTED_MODULE_17__["MatSnackBarModule"],
                _angular_material_slide_toggle__WEBPACK_IMPORTED_MODULE_18__["MatSlideToggleModule"]
            ]
        })
    ], SharedModule);
    return SharedModule;
}());



/***/ }),

/***/ "./src/app/theme-hours.service.ts":
/*!****************************************!*\
  !*** ./src/app/theme-hours.service.ts ***!
  \****************************************/
/*! exports provided: ThemeHoursService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ThemeHoursService", function() { return ThemeHoursService; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var ThemeHoursService = /** @class */ (function () {
    function ThemeHoursService() {
        this._sunrise = 6;
        this._sunset = 20;
    }
    Object.defineProperty(ThemeHoursService.prototype, "sunrise", {
        get: function () {
            return this._sunrise;
        },
        set: function (value) {
            this._sunrise = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(ThemeHoursService.prototype, "sunset", {
        get: function () {
            return this._sunset;
        },
        set: function (value) {
            this._sunset = value;
        },
        enumerable: true,
        configurable: true
    });
    ThemeHoursService = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"])({
            providedIn: 'root'
        }),
        __metadata("design:paramtypes", [])
    ], ThemeHoursService);
    return ThemeHoursService;
}());



/***/ }),

/***/ "./src/environments/environment.ts":
/*!*****************************************!*\
  !*** ./src/environments/environment.ts ***!
  \*****************************************/
/*! exports provided: environment */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "environment", function() { return environment; });
// This file can be replaced during build by using the `fileReplacements` array.
// `ng build ---prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.
var environment = {
    production: false
};
/*
 * In development mode, to ignore zone related error stack frames such as
 * `zone.run`, `zoneDelegate.invokeTask` for easier debugging, you can
 * import the following file, but please comment it out in production mode
 * because it will have performance impact when throw error
 */
// import 'zone.js/dist/zone-error';  // Included with Angular CLI.


/***/ }),

/***/ "./src/main.ts":
/*!*********************!*\
  !*** ./src/main.ts ***!
  \*********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_platform_browser_dynamic__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/platform-browser-dynamic */ "./node_modules/@angular/platform-browser-dynamic/fesm5/platform-browser-dynamic.js");
/* harmony import */ var _app_app_module__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./app/app.module */ "./src/app/app.module.ts");
/* harmony import */ var _environments_environment__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./environments/environment */ "./src/environments/environment.ts");




if (_environments_environment__WEBPACK_IMPORTED_MODULE_3__["environment"].production) {
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["enableProdMode"])();
}
Object(_angular_platform_browser_dynamic__WEBPACK_IMPORTED_MODULE_1__["platformBrowserDynamic"])().bootstrapModule(_app_app_module__WEBPACK_IMPORTED_MODULE_2__["AppModule"])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/*!***************************!*\
  !*** multi ./src/main.ts ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\www-dev\angular\site-perso-corentin\src\main.ts */"./src/main.ts");


/***/ })

},[[0,"runtime","vendor"]]]);
//# sourceMappingURL=main.js.map