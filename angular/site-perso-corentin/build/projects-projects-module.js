(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["projects-projects-module"],{

/***/ "./src/app/projects/project/project.component.html":
/*!*********************************************************!*\
  !*** ./src/app/projects/project/project.component.html ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "\n<div class=\"marker\">\n  <div class=\"lines\" *ngIf=\"index%2==0 && !open\">\n    <div class=\"line\"></div>\n    <div class=\"blankline\"></div>\n  </div>\n\n  <div class=\"lines\" *ngIf=\"index%2==1 && !open\">\n    <div class=\"blankline\"></div>\n    <div class=\"line\"></div>\n  </div>\n\n  <div class=\"left\" *ngIf=\"!open\" [@markerState]=\"open ? 'open' : 'close'\">\n    <div class=\"title mat-button mrt\"  *ngIf=\"index%2==0\" (click)=\"switch()\">{{project.name}}</div>\n    <div class=\"date mrd\" *ngIf=\"index%2==1\">{{project.dateFin}}</div>\n  </div>\n\n  <div class=\"major-labels\" *ngIf=\"index%2==1 && !open\" [@markerState]=\"open ? 'open' : 'close'\">\n    <div class=\"logo\" *ngFor=\"let label of project.majorLabels\">\n      <img src=\"{{'../../../assets/skills/'+label.logo+'.png'}}\" style=\"max-width: 80%; max-height: 80%;\">\n    </div>\n  </div>\n\n  <div class=\"head mat-button\" *ngIf=\"open\" (click)=\"switch()\" [@headState]=\"open ? 'open' : 'close'\">\n    <div class=\"head-title\" *ngIf=\"index%2==0\">{{project.name}}</div>\n\n    <div class=\"major-labels\">\n      <div class=\"logo\" *ngFor=\"let label of project.majorLabels\">\n        <img src=\"{{'../../../assets/skills/'+label.logo+'.png'}}\" style=\"max-width: 80%; max-height: 80%;\">\n      </div>\n    </div>\n\n    <div class=\"head-title\" *ngIf=\"index%2==1\">{{project.name}}</div>\n  </div>\n\n  <div class=\"major-labels\" *ngIf=\"index%2==0 && !open\" [@markerState]=\"open ? 'open' : 'close'\">\n    <div class=\"logo\" *ngFor=\"let label of project.majorLabels\">\n      <img src=\"{{'../../../assets/skills/'+label.logo+'.png'}}\" style=\"max-width: 80%; max-height: 80%;\">\n    </div>\n  </div>\n\n  <div class=\"right\" *ngIf=\"!open\" [@markerState]=\"open ? 'open' : 'close'\">\n    <div class=\"title mat-button mlt\"  *ngIf=\"index%2==1\" (click)=\"switch()\">{{project.name}}</div>\n    <div class=\"date mld\"  *ngIf=\"index%2==0\">{{project.dateFin}}</div>\n  </div>\n</div>\n\n<mat-card class=\"project-body\" [@bodyState]=\"open ? 'open' : 'close'\" *ngIf=\"open\">\n  <div class=\"row\">\n   <div class=\"col\" *ngIf=\"project.mainLink\">\n     <div class=\"row\" style=\"align-items: center\">\n       <h4>Link to the project :</h4>\n       <a href=\"{{project.mainLink.link}}\">\n         <button mat-button class=\"link\">{{project.mainLink.name}}</button>\n       </a>\n     </div>\n   </div>\n\n   <div class=\"col\">\n     <div class=\"date\">Started in {{project.dateDebut}}</div>\n     <div class=\"date\" *ngIf=\"project.dateFin!='now'\">Finished in {{project.dateFin}}</div>\n     <div class=\"date\" *ngIf=\"project.dateFin=='now'\">Still working on it</div>\n   </div>\n </div>\n\n  <div class=\"row\" *ngIf=\"project.context\">\n    <h4>Context :</h4>\n  </div>\n\n  <div class=\"row\" *ngIf=\"project.context\">\n    <p>{{project.context}}</p>\n  </div>\n\n  <div class=\"row\" *ngIf=\"project.description\">\n    <h4>Description :</h4>\n  </div>\n\n  <div class=\"row\" *ngIf=\"project.description\">\n    <p>{{project.description}}</p>\n  </div>\n\n  <div class=\"row\" *ngIf=\"project.labels\">\n    <h4>Tags :</h4>\n  </div>\n\n  <mat-chip-list *ngIf=\"project.labels\">\n    <mat-chip [disabled]=\"true\" *ngFor=\"let label of project.labels\">\n      <span class=\"label-logo\">\n        <img src=\"{{'../../../assets/skills/'+label.logo+'.png'}}\" style=\"max-width: 90%; max-height: 90%;\">\n      </span>\n      {{label.name}}\n    </mat-chip>\n  </mat-chip-list>\n\n  <div class=\"row\" style=\"margin-top: 10px\" *ngIf=\"project.links\">\n    <h4>Links :</h4>\n  </div>\n\n  <div class=\"row\" *ngIf=\"project.links\">\n    <a *ngFor=\"let link of project.links\" href=\"{{link.link}}\" target=\"_blank\">\n      <button mat-stroked-button color=\"primary\">\n        <div class=\"link\">{{link.name}}</div>\n      </button>\n    </a>\n  </div>\n</mat-card>\n"

/***/ }),

/***/ "./src/app/projects/project/project.component.scss":
/*!*********************************************************!*\
  !*** ./src/app/projects/project/project.component.scss ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".marker {\n  display: flex;\n  justify-content: center;\n  align-items: center;\n  position: relative;\n  height: 60px;\n  width: 100%; }\n  .marker .lines {\n    position: absolute;\n    width: 100%;\n    height: 100%;\n    display: flex;\n    justify-content: center;\n    align-items: center; }\n  .marker .lines .line {\n      width: 150px;\n      height: 4px; }\n  .marker .lines .blankline {\n      width: 150px; }\n  .marker .right {\n    width: 50%;\n    display: flex;\n    justify-content: flex-start; }\n  .marker .left {\n    width: 50%;\n    display: flex;\n    justify-content: flex-end; }\n  .marker .logo {\n    z-index: 2;\n    width: 50px;\n    height: 50px;\n    border-radius: 25px;\n    display: flex;\n    justify-content: center;\n    align-items: center; }\n  .marker .title {\n    padding: 5px;\n    display: flex;\n    justify-content: center;\n    align-items: center;\n    z-index: 3;\n    font-size: 1.2em;\n    white-space: normal; }\n  .marker .date {\n    padding: 5px;\n    display: flex;\n    align-items: center;\n    font-size: 0.9em; }\n  .marker .mrt {\n    margin-right: 60px; }\n  .marker .mrd {\n    margin-right: 20px; }\n  .marker .mlt {\n    margin-left: 60px; }\n  .marker .mld {\n    margin-left: 20px; }\n  .major-labels {\n  display: flex;\n  align-items: center; }\n  .head {\n  display: flex;\n  justify-content: space-between;\n  height: 60px;\n  padding: 0 30px 0 30px;\n  width: 100%;\n  overflow: hidden; }\n  .head .head-title {\n    padding: 5px;\n    display: flex;\n    justify-content: center;\n    align-items: center;\n    z-index: 3;\n    font-size: 1.5em;\n    white-space: normal; }\n  .head .logo {\n    z-index: 2;\n    width: 50px;\n    height: 50px;\n    border-radius: 25px;\n    display: flex;\n    justify-content: center;\n    align-items: center; }\n  .project-body {\n  width: 100%;\n  padding: 20px 50px; }\n  .project-body .date {\n    text-align: right; }\n  .project-body .label-logo {\n    width: 30px; }\n  .project-body .link {\n    margin: 0;\n    font-size: 1.2em;\n    text-decoration: underline; }\n  .project-body .row a {\n    margin: 0 10px; }\n  .project-body h4 {\n    margin: 0; }\n  @media (max-width: 992px) {\n  .marker .lines .line {\n    width: 120px; }\n  .marker .lines .blankline {\n    width: 120px; }\n  .marker .mrt {\n    margin-right: 40px; }\n  .marker .mrd {\n    margin-right: 20px; }\n  .marker .mlt {\n    margin-left: 40px; }\n  .marker .mld {\n    margin-left: 20px; } }\n  @media (max-width: 768px) {\n  .marker .title {\n    font-size: 1em; } }\n  @media (max-width: 576px) {\n  .marker .lines .line {\n    width: 100px; }\n  .marker .lines .blankline {\n    width: 100px; }\n  .marker .mrt {\n    margin-right: 20px; }\n  .marker .mrd {\n    margin-right: 10px; }\n  .marker .mlt {\n    margin-left: 20px; }\n  .marker .mld {\n    margin-left: 10px; }\n  .marker .title {\n    font-size: 0.9em; } }\n"

/***/ }),

/***/ "./src/app/projects/project/project.component.ts":
/*!*******************************************************!*\
  !*** ./src/app/projects/project/project.component.ts ***!
  \*******************************************************/
/*! exports provided: ProjectComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProjectComponent", function() { return ProjectComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _data_project__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../data/project */ "./src/data/project.ts");
/* harmony import */ var _angular_animations__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/animations */ "./node_modules/@angular/animations/fesm5/animations.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var ProjectComponent = /** @class */ (function () {
    function ProjectComponent() {
        this.opened = new _angular_core__WEBPACK_IMPORTED_MODULE_0__["EventEmitter"]();
    }
    ProjectComponent.prototype.ngOnInit = function () {
    };
    ProjectComponent.prototype.switch = function () {
        if (this.open) {
            this.open = false;
        }
        else {
            this.opened.emit(this.project.id);
            this.open = true;
        }
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", _data_project__WEBPACK_IMPORTED_MODULE_1__["Project"])
    ], ProjectComponent.prototype, "project", void 0);
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", Number)
    ], ProjectComponent.prototype, "index", void 0);
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", Boolean)
    ], ProjectComponent.prototype, "open", void 0);
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Output"])(),
        __metadata("design:type", Object)
    ], ProjectComponent.prototype, "opened", void 0);
    ProjectComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-project',
            template: __webpack_require__(/*! ./project.component.html */ "./src/app/projects/project/project.component.html"),
            styles: [__webpack_require__(/*! ./project.component.scss */ "./src/app/projects/project/project.component.scss")],
            animations: [
                Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["trigger"])('bodyState', [
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':enter', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, height: 0 }),
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])('200ms 100ms')
                    ]),
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':leave', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(200, Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, height: 0 }))
                    ]),
                ]),
                Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["trigger"])('headState', [
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':enter', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, width: 0, whiteSpace: 'nowrap' }),
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(100)
                    ]),
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':leave', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(200, Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, width: 0, whiteSpace: 'nowrap' }))
                    ]),
                ]),
                Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["trigger"])('markerState', [
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':enter', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, width: 0, whiteSpace: 'nowrap' }),
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(100)
                    ]),
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':leave', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(50, Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, width: 0, whiteSpace: 'nowrap' }))
                    ]),
                ])
            ]
        }),
        __metadata("design:paramtypes", [])
    ], ProjectComponent);
    return ProjectComponent;
}());



/***/ }),

/***/ "./src/app/projects/projects-home/projects-home.component.html":
/*!*********************************************************************!*\
  !*** ./src/app/projects/projects-home/projects-home.component.html ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div [ngClass]=\"theme\">\n  <div class=\"projects\">\n    <div class=\"timeline\" [ngClass]=\"routeAnimationsElements\">\n      <svg-icon src=\"{{'../../../assets/arrow.svg'}}\" [svgStyle]=\"{}\"></svg-icon>\n      <div class=\"line\"></div>\n    </div>\n    <div class=\"container\">\n      <div class=\"centrer\">\n        <div><h1 [ngClass]=\"routeAnimationsElements\">Projects</h1></div>\n      </div>\n      <div class=\"projects-list\" id=\"stage_2a\">\n        <spc-project *ngFor=\"let project of projects; index as i\" [project]=\"project\" [index]=\"i\" [open]=\"project.open\" (opened)=\"open($event)\" [ngClass]=\"routeAnimationsElements\" id=\"{{project.id}}\"></spc-project>\n      </div>\n      <!--<button [ngx-scroll-to]=\"'stage_2a'\">Go to destination</button>-->\n    </div>\n  </div>\n</div>\n"

/***/ }),

/***/ "./src/app/projects/projects-home/projects-home.component.scss":
/*!*********************************************************************!*\
  !*** ./src/app/projects/projects-home/projects-home.component.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".timeline {\n  display: flex;\n  justify-content: center;\n  position: absolute;\n  height: 100%;\n  width: 100%;\n  z-index: -1;\n  padding-top: 90px; }\n  .timeline svg-icon {\n    position: absolute;\n    z-index: 1;\n    width: 60px;\n    margin-top: -20px; }\n  .timeline .line {\n    height: 100%;\n    width: 8px;\n    z-index: 0; }\n  .container {\n  position: relative; }\n  .container .centrer {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    height: 90px; }\n  .container h1 {\n    text-align: center;\n    font-size: 2em;\n    text-transform: uppercase;\n    font-weight: bold;\n    display: inline-block;\n    padding: 10px;\n    margin: 0; }\n  .container .projects-list {\n    width: 100%;\n    display: flex;\n    flex-direction: column;\n    justify-content: flex-start;\n    align-items: center;\n    margin-top: 60px;\n    z-index: 2; }\n  .container .projects-list spc-project {\n      width: 100%;\n      margin-bottom: 40px;\n      display: flex;\n      flex-direction: column;\n      justify-content: flex-start;\n      align-items: center; }\n  @media (max-width: 576px) {\n  .centrer {\n    height: 70px; }\n  h1 {\n    font-size: 1.4em; } }\n"

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
/* harmony import */ var _data_projects_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../data/projects.data */ "./src/data/projects.data.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _nicky_lenaers_ngx_scroll_to__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @nicky-lenaers/ngx-scroll-to */ "./node_modules/@nicky-lenaers/ngx-scroll-to/fesm5/nicky-lenaers-ngx-scroll-to.js");
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
    function ProjectsHomeComponent(themeHoursService, route, router, _scrollToService) {
        this.themeHoursService = themeHoursService;
        this.route = route;
        this.router = router;
        this._scrollToService = _scrollToService;
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
        this.projects = _data_projects_data__WEBPACK_IMPORTED_MODULE_3__["PROJECTS"];
    }
    ProjectsHomeComponent.prototype.ngOnInit = function () {
        // this.route.paramMap.subscribe(params => {
        //   this.selectedSkill = this.selectedNumber(params.get('id'));
        // });
        this.initTheme();
    };
    ProjectsHomeComponent.prototype.initTheme = function () {
        var hours = new Date().getHours();
        this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
            ? 'blue-night-theme'
            : 'blue-day-theme');
    };
    // public onOpened(opened: boolean, index: number){
    //   for (let i = 0, len = this.projects.length; i < len; i++) {
    //     this.projects[i].open = i === index;
    //   }
    //   this.projects = [...this.projects];
    // }
    ProjectsHomeComponent.prototype.open = function (id) {
        var found = false;
        for (var i = 0, len = this.projects.length; i < len; i++) {
            if (this.projects[i].id === id) {
                this.projects[i].open = true;
                found = true;
            }
            else {
                this.projects[i].open = false;
            }
        }
        this.projects = this.projects.slice();
        if (!found) {
            this.router.navigate(['/404']);
        }
        else {
            this.triggerScrollTo(id);
        }
    };
    ProjectsHomeComponent.prototype.triggerScrollTo = function (id) {
        var config = {
            target: id
        };
        this._scrollToService.scrollTo(config);
    };
    ProjectsHomeComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-projects-home',
            template: __webpack_require__(/*! ./projects-home.component.html */ "./src/app/projects/projects-home/projects-home.component.html"),
            styles: [__webpack_require__(/*! ./projects-home.component.scss */ "./src/app/projects/projects-home/projects-home.component.scss")],
            animations: [_core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["routeAnimations"]]
        }),
        __metadata("design:paramtypes", [_theme_hours_service__WEBPACK_IMPORTED_MODULE_2__["ThemeHoursService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"],
            _nicky_lenaers_ngx_scroll_to__WEBPACK_IMPORTED_MODULE_5__["ScrollToService"]])
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
    },
    {
        path: ':id',
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
/* harmony import */ var _project_project_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./project/project.component */ "./src/app/projects/project/project.component.ts");
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
            declarations: [_projects_home_projects_home_component__WEBPACK_IMPORTED_MODULE_2__["ProjectsHomeComponent"], _project_project_component__WEBPACK_IMPORTED_MODULE_4__["ProjectComponent"]]
        })
    ], ProjectsModule);
    return ProjectsModule;
}());



/***/ }),

/***/ "./src/data/project.ts":
/*!*****************************!*\
  !*** ./src/data/project.ts ***!
  \*****************************/
/*! exports provided: Project, Label, Link */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Project", function() { return Project; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Label", function() { return Label; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Link", function() { return Link; });
var Project = /** @class */ (function () {
    function Project(name, id, type, dateDebut, dateFin, majorLabels, labels, context, description, links, mainLink) {
        this._name = name;
        this._id = id;
        this._type = type;
        this._dateDebut = dateDebut;
        this._dateFin = dateFin;
        this._majorLabels = majorLabels;
        this._labels = labels;
        this._context = context;
        this._description = description;
        this._links = links;
        this._mainLink = mainLink;
        this.open = false;
    }
    Object.defineProperty(Project.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "id", {
        get: function () {
            return this._id;
        },
        set: function (value) {
            this._id = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "type", {
        get: function () {
            return this._type;
        },
        set: function (value) {
            this._type = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "dateDebut", {
        get: function () {
            return this._dateDebut;
        },
        set: function (value) {
            this._dateDebut = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "dateFin", {
        get: function () {
            return this._dateFin;
        },
        set: function (value) {
            this._dateFin = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "majorLabels", {
        get: function () {
            return this._majorLabels;
        },
        set: function (value) {
            this._majorLabels = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "labels", {
        get: function () {
            return this._labels;
        },
        set: function (value) {
            this._labels = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "context", {
        get: function () {
            return this._context;
        },
        set: function (value) {
            this._context = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "description", {
        get: function () {
            return this._description;
        },
        set: function (value) {
            this._description = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "links", {
        get: function () {
            return this._links;
        },
        set: function (value) {
            this._links = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Project.prototype, "mainLink", {
        get: function () {
            return this._mainLink;
        },
        set: function (value) {
            this._mainLink = value;
        },
        enumerable: true,
        configurable: true
    });
    return Project;
}());

var Label = /** @class */ (function () {
    function Label(name, type, logo) {
        this._name = name;
        this._type = type;
        this._logo = logo;
    }
    Object.defineProperty(Label.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Label.prototype, "type", {
        get: function () {
            return this._type;
        },
        set: function (value) {
            this._type = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Label.prototype, "logo", {
        get: function () {
            return this._logo;
        },
        set: function (value) {
            this._logo = value;
        },
        enumerable: true,
        configurable: true
    });
    return Label;
}());

var Link = /** @class */ (function () {
    function Link(name, link) {
        this._name = name;
        this._link = link;
    }
    Object.defineProperty(Link.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Link.prototype, "link", {
        get: function () {
            return this._link;
        },
        set: function (value) {
            this._link = value;
        },
        enumerable: true,
        configurable: true
    });
    return Link;
}());



/***/ }),

/***/ "./src/data/projects.data.ts":
/*!***********************************!*\
  !*** ./src/data/projects.data.ts ***!
  \***********************************/
/*! exports provided: PROJECTS */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PROJECTS", function() { return PROJECTS; });
/* harmony import */ var _project__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./project */ "./src/data/project.ts");

var PROJECTS = [
    new _project__WEBPACK_IMPORTED_MODULE_0__["Project"]('Lesion segmentation by deep learning', 'stage_2a', 'ia', 'june 2018', 'august 2018', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', null, 'tensorflow')
    ], [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', 'AI', 'keras'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', 'AI', 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Docker', null, 'docker')
    ], 'nozalfnaz ozfenze ienf d zid,z did   dezfzef zkefze fvjz zelf zeczejf ezfjzlefj ze', 'akjbzefkz czkecz ec uc c bbbd izkadnocj evoz k ze ezzjeujzeiufvzr aolnrljz iezflekfn z', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('github', 'https://www.github.com/corentindoue'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com')
    ], null),
    new _project__WEBPACK_IMPORTED_MODULE_0__["Project"]('Site perso', 'spc', 'ia', 'june 2018', 'now', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', null, 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', null, 'keras')
    ], [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', 'AI', 'keras'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', 'AI', 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Docker', null, 'docker')
    ], 'nozalfnaz ozfenze ienf d zid,z did   dezfzef zkefze fvjz zelf zeczejf ezfjzlefj ze', 'akjbzefkz czkecz ec uc c bbbd izkadnocj evoz k ze ezzjeujzeiufvzr aolnrljz iezflekfn z', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com')
    ], new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('main web site', 'corentindoue.github.io')),
    new _project__WEBPACK_IMPORTED_MODULE_0__["Project"]('Site cercle', 'cercle', 'ia', 'june 2018', 'august 2018', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', null, 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', null, 'keras'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', null, 'tensorflow')
    ], [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', 'AI', 'keras'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', 'AI', 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Docker', null, 'docker')
    ], 'nozalfnaz ozfenze ienf d zid,z did   dezfzef zkefze fvjz zelf zeczejf ezfjzlefj ze', 'akjbzefkz czkecz ec uc c bbbd izkadnocj evoz k ze ezzjeujzeiufvzr aolnrljz iezflekfn z', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com')
    ], new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('main web site', 'corentindoue.github.io')),
    new _project__WEBPACK_IMPORTED_MODULE_0__["Project"]('Site Mobilité', 'mobilite', 'ia', 'june 2018', 'august 2018', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', null, 'tensorflow')
    ], [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', 'AI', 'keras'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', 'AI', 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Docker', null, 'docker')
    ], 'nozalfnaz ozfenze ienf d zid,z did   dezfzef zkefze fvjz zelf zeczejf ezfjzlefj ze', 'akjbzefkz czkecz ec uc c bbbd izkadnocj evoz k ze ezzjeujzeiufvzr aolnrljz iezflekfn z', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com')
    ], new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('main web site', 'corentindoue.github.io')),
    new _project__WEBPACK_IMPORTED_MODULE_0__["Project"]('Site Minesterstellar', 'minesterstellar', 'ia', 'june 2018', 'august 2018', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', null, 'tensorflow')
    ], [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Keras', 'AI', 'keras'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Tensorflow', 'AI', 'tensorflow'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Label"]('Docker', null, 'docker')
    ], 'nozalfnaz ozfenze ienf d zid,z did   dezfzef zkefze fvjz zelf zeczejf ezfjzlefj ze', 'akjbzefkz czkecz ec uc c bbbd izkadnocj evoz k ze ezzjeujzeiufvzr aolnrljz iezflekfn z', [
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com'),
        new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('paper', 'paper.com')
    ], new _project__WEBPACK_IMPORTED_MODULE_0__["Link"]('main web site', 'corentindoue.github.io')),
];


/***/ })

}]);
//# sourceMappingURL=projects-projects-module.js.map