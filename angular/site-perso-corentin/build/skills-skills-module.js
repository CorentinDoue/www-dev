(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["skills-skills-module"],{

/***/ "./src/app/skills/progress-bar/progress-bar.component.html":
/*!*****************************************************************!*\
  !*** ./src/app/skills/progress-bar/progress-bar.component.html ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div class=\"spc-step-progress-bar\" aria-valuenow=\"10\" aria-valuemin=\"0\" aria-valuemax=\"5\" >\r\n  <div class=\"skill-logo\">\r\n    <img src=\"{{logo}}\" style=\"max-width: 80%; max-height: 80%;\">\r\n  </div>\r\n  <div class=\"progress\">\r\n    <div class=\"progress-bar progress-bar-striped progress-bar-animated\" [ngClass]=\"bgColor\" role=\"progressbar\" [ngStyle]=\"barStyle\"></div>\r\n  </div>\r\n  <div class=\"step\" style=\"width: 20%\" *ngFor=\"let step of steps\">\r\n    <div class=\"step-label\" [ngClass]=\"step.labelBg(rank,bgColor)\" matTooltip=\"{{step.name}}\">\r\n      <svg-icon src=\"{{'../../../assets/progress-bar/'+step.svg}}\" [svgStyle]=\"{}\"></svg-icon>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n"

/***/ }),

/***/ "./src/app/skills/progress-bar/progress-bar.component.scss":
/*!*****************************************************************!*\
  !*** ./src/app/skills/progress-bar/progress-bar.component.scss ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".spc-step-progress-bar {\n  margin: 20px;\n  display: flex;\n  margin-right: 25px;\n  margin-left: 25px;\n  position: relative;\n  align-items: center; }\n  .spc-step-progress-bar .progress {\n    position: absolute;\n    width: 100%; }\n  .spc-step-progress-bar .skill-logo {\n    z-index: 2;\n    position: absolute;\n    left: -37.5px;\n    width: 75px;\n    height: 75px;\n    border-radius: 37.5px;\n    border: solid 1px;\n    background-color: whitesmoke;\n    border-color: #181818;\n    display: flex;\n    justify-content: center;\n    align-items: center; }\n  .spc-step-progress-bar .advanced {\n    background-color: #00cd00;\n    border-color: white; }\n  .spc-step-progress-bar .advanced svg-icon {\n      fill: white; }\n  .spc-step-progress-bar .bg-danger {\n    border-color: white; }\n  .spc-step-progress-bar .bg-danger svg-icon {\n      fill: white; }\n  .spc-step-progress-bar .elementary {\n    background-color: #ff7200;\n    border-color: white; }\n  .spc-step-progress-bar .elementary svg-icon {\n      fill: white; }\n  .spc-step-progress-bar .intermediate {\n    background-color: #eeee00;\n    border-color: black; }\n  .spc-step-progress-bar .intermediate svg-icon {\n      fill: black; }\n  .spc-step-progress-bar .bg-success {\n    border-color: white; }\n  .spc-step-progress-bar .bg-success svg-icon {\n      fill: white; }\n  .spc-step-progress-bar .step {\n    position: relative;\n    display: flex;\n    justify-content: flex-end;\n    align-items: center;\n    height: 50px; }\n  .spc-step-progress-bar .step .step-label {\n      z-index: 2;\n      position: absolute;\n      right: -25px;\n      width: 50px;\n      height: 50px;\n      border-radius: 25px;\n      border: solid 1px;\n      display: flex;\n      justify-content: center;\n      align-items: center; }\n  .spc-step-progress-bar .step .advanced {\n      background-color: #00cd00;\n      border-color: white; }\n  .spc-step-progress-bar .step .bg-danger {\n      border-color: white; }\n  .spc-step-progress-bar .step .elementary {\n      background-color: #ff7200;\n      border-color: white; }\n  .spc-step-progress-bar .step .intermediate {\n      background-color: #eeee00;\n      border-color: black; }\n  .spc-step-progress-bar .step .bg-success {\n      border-color: white; }\n  .spc-step-progress-bar .step svg-icon {\n      width: 30px;\n      height: 30px; }\n  @media (max-width: 992px) {\n  .spc-step-progress-bar {\n    margin: 20px;\n    display: flex;\n    margin-right: 20px;\n    margin-left: 20px;\n    position: relative;\n    align-items: center; }\n    .spc-step-progress-bar .progress {\n      position: absolute;\n      width: 100%; }\n    .spc-step-progress-bar .skill-logo {\n      z-index: 2;\n      position: absolute;\n      left: -30px;\n      width: 60px;\n      height: 60px;\n      border-radius: 30px;\n      border: solid 1px;\n      background-color: whitesmoke;\n      border-color: #181818;\n      display: flex;\n      justify-content: center;\n      align-items: center; }\n    .spc-step-progress-bar .advanced {\n      background-color: #00cd00;\n      border-color: white; }\n      .spc-step-progress-bar .advanced svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .bg-danger {\n      border-color: white; }\n      .spc-step-progress-bar .bg-danger svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .elementary {\n      background-color: #ff7200;\n      border-color: white; }\n      .spc-step-progress-bar .elementary svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .intermediate {\n      background-color: #eeee00;\n      border-color: black; }\n      .spc-step-progress-bar .intermediate svg-icon {\n        fill: black; }\n    .spc-step-progress-bar .bg-success {\n      border-color: white; }\n      .spc-step-progress-bar .bg-success svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .step {\n      position: relative;\n      display: flex;\n      justify-content: flex-end;\n      align-items: center;\n      height: 40px; }\n      .spc-step-progress-bar .step .step-label {\n        z-index: 2;\n        position: absolute;\n        right: -20px;\n        width: 40px;\n        height: 40px;\n        border-radius: 20px;\n        border: solid 1px;\n        display: flex;\n        justify-content: center;\n        align-items: center; }\n      .spc-step-progress-bar .step .advanced {\n        background-color: #00cd00;\n        border-color: white; }\n      .spc-step-progress-bar .step .bg-danger {\n        border-color: white; }\n      .spc-step-progress-bar .step .elementary {\n        background-color: #ff7200;\n        border-color: white; }\n      .spc-step-progress-bar .step .intermediate {\n        background-color: #eeee00;\n        border-color: black; }\n      .spc-step-progress-bar .step .bg-success {\n        border-color: white; }\n      .spc-step-progress-bar .step svg-icon {\n        width: 25px;\n        height: 25px; } }\n  @media (max-width: 576px) {\n  .spc-step-progress-bar {\n    margin: 20px;\n    display: flex;\n    margin-right: 15px;\n    margin-left: 15px;\n    position: relative;\n    align-items: center; }\n    .spc-step-progress-bar .progress {\n      position: absolute;\n      width: 100%; }\n    .spc-step-progress-bar .skill-logo {\n      z-index: 2;\n      position: absolute;\n      left: -22.5px;\n      width: 45px;\n      height: 45px;\n      border-radius: 22.5px;\n      border: solid 1px;\n      background-color: whitesmoke;\n      border-color: #181818;\n      display: flex;\n      justify-content: center;\n      align-items: center; }\n    .spc-step-progress-bar .advanced {\n      background-color: #00cd00;\n      border-color: white; }\n      .spc-step-progress-bar .advanced svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .bg-danger {\n      border-color: white; }\n      .spc-step-progress-bar .bg-danger svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .elementary {\n      background-color: #ff7200;\n      border-color: white; }\n      .spc-step-progress-bar .elementary svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .intermediate {\n      background-color: #eeee00;\n      border-color: black; }\n      .spc-step-progress-bar .intermediate svg-icon {\n        fill: black; }\n    .spc-step-progress-bar .bg-success {\n      border-color: white; }\n      .spc-step-progress-bar .bg-success svg-icon {\n        fill: white; }\n    .spc-step-progress-bar .step {\n      position: relative;\n      display: flex;\n      justify-content: flex-end;\n      align-items: center;\n      height: 30px; }\n      .spc-step-progress-bar .step .step-label {\n        z-index: 2;\n        position: absolute;\n        right: -15px;\n        width: 30px;\n        height: 30px;\n        border-radius: 15px;\n        border: solid 1px;\n        display: flex;\n        justify-content: center;\n        align-items: center; }\n      .spc-step-progress-bar .step .advanced {\n        background-color: #00cd00;\n        border-color: white; }\n      .spc-step-progress-bar .step .bg-danger {\n        border-color: white; }\n      .spc-step-progress-bar .step .elementary {\n        background-color: #ff7200;\n        border-color: white; }\n      .spc-step-progress-bar .step .intermediate {\n        background-color: #eeee00;\n        border-color: black; }\n      .spc-step-progress-bar .step .bg-success {\n        border-color: white; }\n      .spc-step-progress-bar .step svg-icon {\n        width: 20px;\n        height: 20px; } }\n"

/***/ }),

/***/ "./src/app/skills/progress-bar/progress-bar.component.ts":
/*!***************************************************************!*\
  !*** ./src/app/skills/progress-bar/progress-bar.component.ts ***!
  \***************************************************************/
/*! exports provided: ProgressBarComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProgressBarComponent", function() { return ProgressBarComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _step__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./step */ "./src/app/skills/progress-bar/step.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var ProgressBarComponent = /** @class */ (function () {
    function ProgressBarComponent() {
        this.rank = 2.5;
        this.steps = [
            new _step__WEBPACK_IMPORTED_MODULE_1__["Step"]('Beginner', 0, 1, 'bg-danger', 'beginner.svg'),
            new _step__WEBPACK_IMPORTED_MODULE_1__["Step"]('Elementary', 1, 2, 'elementary', 'elementary.svg'),
            new _step__WEBPACK_IMPORTED_MODULE_1__["Step"]('Intermediate', 2, 3, 'intermediate', 'intermediate.svg'),
            new _step__WEBPACK_IMPORTED_MODULE_1__["Step"]('Advanced', 3, 4, 'advanced', 'advanced.svg'),
            new _step__WEBPACK_IMPORTED_MODULE_1__["Step"]('Expert', 4, 5, 'bg-success', 'expert.svg')
        ];
        this.bgColor = '';
    }
    ProgressBarComponent.prototype.ngOnInit = function () {
        this.bgColor = this.getBgColor();
        this.barStyle = this.getWidth();
    };
    ProgressBarComponent.prototype.getBgColor = function () {
        if (this.rank === 0) {
            return this.steps[0].bgColor;
        }
        else if (this.rank > 0 && this.rank <= 1) {
            return this.steps[0].bgColor;
        }
        else if (this.rank > 1 && this.rank <= 2) {
            return this.steps[1].bgColor;
        }
        else if (this.rank > 2 && this.rank <= 3) {
            return this.steps[2].bgColor;
        }
        else if (this.rank > 3 && this.rank <= 4) {
            return this.steps[3].bgColor;
        }
        else if (this.rank > 4 && this.rank <= 5) {
            return this.steps[4].bgColor;
        }
    };
    ProgressBarComponent.prototype.getWidth = function () {
        return { 'width': '' + Math.floor((this.rank) * 100 / 5) + '%' };
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", Object)
    ], ProgressBarComponent.prototype, "rank", void 0);
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", Object)
    ], ProgressBarComponent.prototype, "logo", void 0);
    ProgressBarComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-progress-bar',
            template: __webpack_require__(/*! ./progress-bar.component.html */ "./src/app/skills/progress-bar/progress-bar.component.html"),
            styles: [__webpack_require__(/*! ./progress-bar.component.scss */ "./src/app/skills/progress-bar/progress-bar.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], ProgressBarComponent);
    return ProgressBarComponent;
}());



/***/ }),

/***/ "./src/app/skills/progress-bar/step.ts":
/*!*********************************************!*\
  !*** ./src/app/skills/progress-bar/step.ts ***!
  \*********************************************/
/*! exports provided: Step */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Step", function() { return Step; });
var Step = /** @class */ (function () {
    function Step(name, minValue, maxValue, bgColor, svg) {
        this._name = name;
        this._minValue = minValue;
        this._maxValue = maxValue;
        this._bgColor = bgColor;
        this._svg = svg;
    }
    Step.prototype.labelBg = function (rank, bgColor) {
        if (rank >= this._maxValue) {
            return bgColor;
        }
        else {
            return '';
        }
    };
    Object.defineProperty(Step.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Step.prototype, "minValue", {
        get: function () {
            return this._minValue;
        },
        set: function (value) {
            this._minValue = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Step.prototype, "maxValue", {
        get: function () {
            return this._maxValue;
        },
        set: function (value) {
            this._maxValue = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Step.prototype, "bgColor", {
        get: function () {
            return this._bgColor;
        },
        set: function (value) {
            this._bgColor = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Step.prototype, "svg", {
        get: function () {
            return this._svg;
        },
        set: function (value) {
            this._svg = value;
        },
        enumerable: true,
        configurable: true
    });
    return Step;
}());



/***/ }),

/***/ "./src/app/skills/skills-home/skills-home.component.html":
/*!***************************************************************!*\
  !*** ./src/app/skills/skills-home/skills-home.component.html ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div [ngClass]=\"theme\" #top>\r\n  <div class=\"skills\">\r\n    <div class=\"container\">\r\n      <div class=\"centrer\">\r\n        <div><h1>Skills</h1></div>\r\n      </div>\r\n      <div (swipeleft)=\"swipe($event)\" (swiperight)=\"swipe($event)\">\r\n        <mat-tab-group [dynamicHeight]=\"true\" [selectedIndex]='selectedSkill' >\r\n        <mat-tab>\r\n          <ng-template mat-tab-label>\r\n            <span class=\"mat-tab-label\" (click)=\"goTo('languages')\">Languages</span>\r\n          </ng-template>\r\n              <h2 [ngClass]=\"routeAnimationsElements\"> <mat-icon svgIcon=\"code\"></mat-icon>Programming Languages</h2>\r\n              <spc-skills-list [skills]=\"skills.language\"></spc-skills-list>\r\n        </mat-tab>\r\n        <mat-tab>\r\n          <ng-template mat-tab-label>\r\n            <span class=\"mat-tab-label\" (click)=\"goTo('web')\">Web</span>\r\n          </ng-template>\r\n          <h2 [ngClass]=\"routeAnimationsElements\"><mat-icon svgIcon=\"web\"></mat-icon>Web</h2>\r\n          <spc-web-skills-list [skillsLists]=\"skills.web\"></spc-web-skills-list>\r\n        </mat-tab>\r\n        <mat-tab>\r\n          <ng-template mat-tab-label>\r\n            <span class=\"mat-tab-label\" (click)=\"goTo('ai')\">A.I.</span>\r\n          </ng-template>\r\n          <h2 [ngClass]=\"routeAnimationsElements\"><mat-icon svgIcon=\"ai\"></mat-icon>Artificial Intelligence</h2>\r\n          <spc-skills-list [skills]=\"skills.ia\"></spc-skills-list>\r\n        </mat-tab>\r\n        <mat-tab>\r\n          <ng-template mat-tab-label>\r\n            <span class=\"mat-tab-label\" (click)=\"goTo('graphical')\">Graphical</span>\r\n          </ng-template>\r\n          <h2 [ngClass]=\"routeAnimationsElements\"><mat-icon svgIcon=\"paint\"></mat-icon>Graphical</h2>\r\n          <spc-skills-list [skills]=\"skills.graphical\"></spc-skills-list>\r\n        </mat-tab>\r\n        <mat-tab>\r\n          <ng-template mat-tab-label>\r\n            <span class=\"mat-tab-label\" (click)=\"goTo('other')\">Other</span>\r\n          </ng-template>\r\n          <h2 [ngClass]=\"routeAnimationsElements\"><mat-icon svgIcon=\"tech\"></mat-icon>Other</h2>\r\n          <spc-skills-list [skills]=\"skills.other\"></spc-skills-list>\r\n        </mat-tab>\r\n      </mat-tab-group>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n"

/***/ }),

/***/ "./src/app/skills/skills-home/skills-home.component.scss":
/*!***************************************************************!*\
  !*** ./src/app/skills/skills-home/skills-home.component.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".skills .container {\n  position: relative; }\n  .skills .container .centrer {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    height: 90px; }\n  .skills .container h1 {\n    text-align: center;\n    font-size: 2em;\n    text-transform: uppercase;\n    font-weight: bold;\n    display: inline-block;\n    padding: 10px;\n    margin: 0; }\n  .skills .container h2 {\n    text-align: center;\n    margin-top: 20px;\n    display: flex;\n    justify-content: center;\n    margin-bottom: 30px; }\n  .skills .container h2 mat-icon {\n      margin-right: 10px;\n      width: 40px;\n      height: 40px; }\n  .skills .container .mat-tab-body-active {\n    overflow: hidden; }\n  .skills .container .mat-tab-label {\n    font-size: 1.6em; }\n  @media (max-width: 576px) {\n  .skills .centrer {\n    height: 70px; }\n  .skills .container h1 {\n    font-size: 1.3em; }\n  .skills .container h2 {\n    font-size: 1.2em; }\n    .skills .container h2 mat-icon {\n      width: 20px;\n      height: 20px; }\n  .skills .container h3 {\n    font-size: 1.1em; }\n  .skills .container .mat-tab-label {\n    font-size: 1em;\n    padding: 0;\n    margin: 0 -10px 0 -10px; } }\n"

/***/ }),

/***/ "./src/app/skills/skills-home/skills-home.component.ts":
/*!*************************************************************!*\
  !*** ./src/app/skills/skills-home/skills-home.component.ts ***!
  \*************************************************************/
/*! exports provided: SkillsHomeComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SkillsHomeComponent", function() { return SkillsHomeComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
/* harmony import */ var _theme_hours_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../theme-hours.service */ "./src/app/theme-hours.service.ts");
/* harmony import */ var _data_skills_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../data/skills.data */ "./src/data/skills.data.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var SkillsHomeComponent = /** @class */ (function () {
    function SkillsHomeComponent(themeHoursService, route, router) {
        this.themeHoursService = themeHoursService;
        this.route = route;
        this.router = router;
        this.SWIPE_ACTION = { LEFT: 'swipeleft', RIGHT: 'swiperight' };
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
        this.skills = _data_skills_data__WEBPACK_IMPORTED_MODULE_3__["SKILLS"];
    }
    SkillsHomeComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.top.nativeElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        this.route.paramMap.subscribe(function (params) {
            _this.selectedSkill = _this.selectedNumber(params.get('id'));
        });
        this.initTheme();
    };
    SkillsHomeComponent.prototype.initTheme = function () {
        var hours = new Date().getHours();
        this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
            ? 'blue-night-theme'
            : 'blue-day-theme');
    };
    SkillsHomeComponent.prototype.selectedNumber = function (selectedType) {
        switch (selectedType) {
            case ('languages'): {
                return 0;
            }
            case ('web'): {
                return 1;
            }
            case ('ai'): {
                return 2;
            }
            case ('graphical'): {
                return 3;
            }
            case ('other'): {
                return 4;
            }
            default: {
                return 0;
            }
        }
    };
    SkillsHomeComponent.prototype.selectedType = function (selectedNumber) {
        switch (selectedNumber) {
            case (0): {
                return 'languages';
            }
            case (1): {
                return 'web';
            }
            case (2): {
                return 'ai';
            }
            case (3): {
                return 'graphical';
            }
            case (4): {
                return 'other';
            }
            default: {
                return 'languages';
            }
        }
    };
    SkillsHomeComponent.prototype.goTo = function (skillType) {
        this.router.navigate(['/skills', skillType]);
    };
    SkillsHomeComponent.prototype.swipe = function (event) {
        if (event.type === this.SWIPE_ACTION.LEFT) {
            var isLast = this.selectedSkill + 1 === 5;
            this.goTo(this.selectedType(isLast ? 0 : this.selectedSkill + 1));
            // this.selectedSkill = isLast ? 4 : this.selectedSkill + 1;
        }
        if (event.type === this.SWIPE_ACTION.RIGHT) {
            var isFirst = this.selectedSkill - 1 === -1;
            this.goTo(this.selectedType(isFirst ? 4 : this.selectedSkill - 1));
            // this.selectedSkill = isFirst ? 0 : this.selectedSkill - 1;
        }
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ViewChild"])('top'),
        __metadata("design:type", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ElementRef"])
    ], SkillsHomeComponent.prototype, "top", void 0);
    SkillsHomeComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-skills-home',
            template: __webpack_require__(/*! ./skills-home.component.html */ "./src/app/skills/skills-home/skills-home.component.html"),
            styles: [__webpack_require__(/*! ./skills-home.component.scss */ "./src/app/skills/skills-home/skills-home.component.scss")],
            animations: [_core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["routeAnimations"]]
        }),
        __metadata("design:paramtypes", [_theme_hours_service__WEBPACK_IMPORTED_MODULE_2__["ThemeHoursService"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"]])
    ], SkillsHomeComponent);
    return SkillsHomeComponent;
}());



/***/ }),

/***/ "./src/app/skills/skills-list/skills-list.component.html":
/*!***************************************************************!*\
  !*** ./src/app/skills/skills-list/skills-list.component.html ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<div [ngClass]=\"routeAnimationsElements\">\r\n  <mat-card *ngFor=\"let skill of skills\" style=\"margin-bottom: 20px\">\r\n    <div class=\"row\">\r\n      <div class=\"col-lg-2 skill-name\">\r\n        <h3>{{skill.name}}</h3>\r\n      </div>\r\n      <div class=\"col-lg-10\">\r\n        <spc-progress-bar [rank]=\"skill.mark\" [logo]=\"'../../../assets/skills/'+skill.img\">\r\n        </spc-progress-bar>\r\n      </div>\r\n      <div class=\"col-12 p-0\" style=\"overflow: hidden\" *ngIf=\"skill.learn\" [@skillLearnState]=\"skill.learn ? 'open' : 'close'\">\r\n        <div class=\"row d-flex justify-content-center\">\r\n          <div class=\"col-lg-2 p-0\">\r\n            <h4>Description :</h4>\r\n          </div>\r\n          <div class=\"col-lg-8 p-0\">\r\n            <p>{{skill.description}}</p>\r\n          </div>\r\n        </div>\r\n        <div class=\"row d-flex justify-content-center\">\r\n          <div class=\"col-lg-2 p-0\">\r\n            <h4>Experience :</h4>\r\n          </div>\r\n          <div class=\"col-lg-8 p-0\">\r\n            <p>{{skill.experience}}</p>\r\n          </div>\r\n        </div>\r\n\r\n        <div class=\"row d-flex justify-content-center\" *ngIf=\"skill.projects.length>0\">\r\n          <div class=\"col-lg-2 p-0\">\r\n            <h4>Related projects :</h4>\r\n          </div>\r\n          <div class=\"col-lg-8 p-0\">\r\n            <mat-chip-list>\r\n              <a *ngFor=\"let project of skill.projects\" routerLink=\"/projects\" fragment=\"{{project.link}}\">\r\n                <mat-chip  routerLink=\"/projects\" fragment=\"{{project.link}}\">\r\n                  {{project.name}}\r\n                </mat-chip>\r\n              </a>\r\n            </mat-chip-list>\r\n          </div>\r\n        </div>\r\n      </div>\r\n      <div class=\"col-12\">\r\n        <div class=\"row d-flex justify-content-end\" *ngIf=\"!skill.learn\">\r\n          <button class=\"mat-button\" (click)=\"skill.learn = true\">Learn more ...</button>\r\n        </div>\r\n        <div class=\"row d-flex justify-content-end\" *ngIf=\"skill.learn\">\r\n          <button class=\"mat-button\" (click)=\"skill.learn = false\">Less</button>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </mat-card>\r\n</div>\r\n"

/***/ }),

/***/ "./src/app/skills/skills-list/skills-list.component.scss":
/*!***************************************************************!*\
  !*** ./src/app/skills/skills-list/skills-list.component.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".row {\n  margin: 0;\n  margin-bottom: 20px; }\n\nh3 {\n  text-align: center; }\n\nh4 {\n  font-size: 1.4em;\n  text-decoration: underline; }\n\np {\n  font-size: 1.3em;\n  text-align: justify; }\n\n.mat-button {\n  font-size: 1.1em; }\n\n.skill-name {\n  display: flex;\n  justify-content: center;\n  align-items: center; }\n\n@media (max-width: 992px) {\n  .skill-name {\n    margin-bottom: -20px; } }\n\n@media (max-width: 576px) {\n  p {\n    font-size: 0.9em; } }\n\nmat-chip {\n  cursor: pointer; }\n"

/***/ }),

/***/ "./src/app/skills/skills-list/skills-list.component.ts":
/*!*************************************************************!*\
  !*** ./src/app/skills/skills-list/skills-list.component.ts ***!
  \*************************************************************/
/*! exports provided: SkillsListComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SkillsListComponent", function() { return SkillsListComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
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



var SkillsListComponent = /** @class */ (function () {
    function SkillsListComponent() {
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
    }
    SkillsListComponent.prototype.ngOnInit = function () {
        this.sortSkills();
    };
    SkillsListComponent.prototype.sortSkills = function () {
        this.skills.sort(function (a, b) {
            if (a.mark > b.mark) {
                return -1;
            }
            else if (a.mark < b.mark) {
                return 1;
            }
            else {
                return 0;
            }
        });
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", Array)
    ], SkillsListComponent.prototype, "skills", void 0);
    SkillsListComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-skills-list',
            template: __webpack_require__(/*! ./skills-list.component.html */ "./src/app/skills/skills-list/skills-list.component.html"),
            styles: [__webpack_require__(/*! ./skills-list.component.scss */ "./src/app/skills/skills-list/skills-list.component.scss")],
            animations: [
                Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["trigger"])('skillLearnState', [
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':enter', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, height: 0 }),
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(200)
                    ]),
                    Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["transition"])(':leave', [
                        Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["animate"])(200, Object(_angular_animations__WEBPACK_IMPORTED_MODULE_2__["style"])({ opacity: 0, height: 0 }))
                    ]),
                ])
            ]
        })
    ], SkillsListComponent);
    return SkillsListComponent;
}());



/***/ }),

/***/ "./src/app/skills/skills-routing.module.ts":
/*!*************************************************!*\
  !*** ./src/app/skills/skills-routing.module.ts ***!
  \*************************************************/
/*! exports provided: SkillsRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SkillsRoutingModule", function() { return SkillsRoutingModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _skills_home_skills_home_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./skills-home/skills-home.component */ "./src/app/skills/skills-home/skills-home.component.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    {
        path: '',
        redirectTo: 'languages',
        pathMatch: 'full'
    },
    {
        path: ':id',
        component: _skills_home_skills_home_component__WEBPACK_IMPORTED_MODULE_2__["SkillsHomeComponent"],
    }
];
var SkillsRoutingModule = /** @class */ (function () {
    function SkillsRoutingModule() {
    }
    SkillsRoutingModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forChild(routes)],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]]
        })
    ], SkillsRoutingModule);
    return SkillsRoutingModule;
}());



/***/ }),

/***/ "./src/app/skills/skills.module.ts":
/*!*****************************************!*\
  !*** ./src/app/skills/skills.module.ts ***!
  \*****************************************/
/*! exports provided: SkillsModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SkillsModule", function() { return SkillsModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _skills_routing_module__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./skills-routing.module */ "./src/app/skills/skills-routing.module.ts");
/* harmony import */ var _skills_home_skills_home_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./skills-home/skills-home.component */ "./src/app/skills/skills-home/skills-home.component.ts");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/shared.module */ "./src/app/shared/shared.module.ts");
/* harmony import */ var _progress_bar_progress_bar_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./progress-bar/progress-bar.component */ "./src/app/skills/progress-bar/progress-bar.component.ts");
/* harmony import */ var _skills_list_skills_list_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./skills-list/skills-list.component */ "./src/app/skills/skills-list/skills-list.component.ts");
/* harmony import */ var _web_skills_list_web_skills_list_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./web-skills-list/web-skills-list.component */ "./src/app/skills/web-skills-list/web-skills-list.component.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};







var SkillsModule = /** @class */ (function () {
    function SkillsModule() {
    }
    SkillsModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__["SharedModule"],
                _skills_routing_module__WEBPACK_IMPORTED_MODULE_1__["SkillsRoutingModule"]
            ],
            declarations: [_skills_home_skills_home_component__WEBPACK_IMPORTED_MODULE_2__["SkillsHomeComponent"], _progress_bar_progress_bar_component__WEBPACK_IMPORTED_MODULE_4__["ProgressBarComponent"], _skills_list_skills_list_component__WEBPACK_IMPORTED_MODULE_5__["SkillsListComponent"], _web_skills_list_web_skills_list_component__WEBPACK_IMPORTED_MODULE_6__["WebSkillsListComponent"]]
        })
    ], SkillsModule);
    return SkillsModule;
}());



/***/ }),

/***/ "./src/app/skills/web-skills-list/web-skills-list.component.html":
/*!***********************************************************************!*\
  !*** ./src/app/skills/web-skills-list/web-skills-list.component.html ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<mat-accordion>\r\n  <mat-expansion-panel *ngFor=\"let skillsList of skillsLists | iterObj\" [ngClass]=\"routeAnimationsElements\" class=\"specific-class\">\r\n    <mat-expansion-panel-header col>\r\n      {{skillsList.key}}\r\n    </mat-expansion-panel-header>\r\n\r\n    <spc-skills-list [skills]=\"skillsList.value\"></spc-skills-list>\r\n\r\n  </mat-expansion-panel>\r\n</mat-accordion>\r\n\r\n\r\n\r\n"

/***/ }),

/***/ "./src/app/skills/web-skills-list/web-skills-list.component.scss":
/*!***********************************************************************!*\
  !*** ./src/app/skills/web-skills-list/web-skills-list.component.scss ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "mat-expansion-panel {\n  background-color: transparent; }\n\ndiv.mat-expansion-panel-content:not(.mat-expanded) {\n  height: 0px;\n  visibility: hidden; }\n\n.mat-expansion-panel-header:not(.mat-expanded) {\n  height: 48px; }\n\n.mat-expansion-panel-header {\n  height: 64px; }\n\n.mat-expansion-panel-header .mat-content {\n    font-weight: 100;\n    font-size: 18px; }\n\n.mat-expansion-panel-header.mat-expanded .mat-expansion-indicator {\n    -webkit-transform: rotate(180deg);\n            transform: rotate(180deg); }\n\n.mat-expansion-panel-content .mat-expansion-panel-body {\n  padding: 0;\n  background-color: transparent; }\n"

/***/ }),

/***/ "./src/app/skills/web-skills-list/web-skills-list.component.ts":
/*!*********************************************************************!*\
  !*** ./src/app/skills/web-skills-list/web-skills-list.component.ts ***!
  \*********************************************************************/
/*! exports provided: WebSkillsListComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "WebSkillsListComponent", function() { return WebSkillsListComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../core/animations/route.animations */ "./src/app/core/animations/route.animations.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var WebSkillsListComponent = /** @class */ (function () {
    function WebSkillsListComponent() {
        this.routeAnimationsElements = _core_animations_route_animations__WEBPACK_IMPORTED_MODULE_1__["ROUTE_ANIMATIONS_ELEMENTS"];
    }
    WebSkillsListComponent.prototype.ngOnInit = function () {
    };
    __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Input"])(),
        __metadata("design:type", Object)
    ], WebSkillsListComponent.prototype, "skillsLists", void 0);
    WebSkillsListComponent = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'spc-web-skills-list',
            template: __webpack_require__(/*! ./web-skills-list.component.html */ "./src/app/skills/web-skills-list/web-skills-list.component.html"),
            styles: [__webpack_require__(/*! ./web-skills-list.component.scss */ "./src/app/skills/web-skills-list/web-skills-list.component.scss")],
            encapsulation: _angular_core__WEBPACK_IMPORTED_MODULE_0__["ViewEncapsulation"].None
        }),
        __metadata("design:paramtypes", [])
    ], WebSkillsListComponent);
    return WebSkillsListComponent;
}());



/***/ }),

/***/ "./src/data/skill.ts":
/*!***************************!*\
  !*** ./src/data/skill.ts ***!
  \***************************/
/*! exports provided: Skill */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Skill", function() { return Skill; });
var Skill = /** @class */ (function () {
    function Skill(name, mark, description, experience, projects, img) {
        this._name = name;
        this._description = description;
        this._experience = experience;
        this._img = img;
        this._mark = mark;
        this._projects = projects;
        this._learn = false;
    }
    Object.defineProperty(Skill.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (value) {
            this._name = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Skill.prototype, "description", {
        get: function () {
            return this._description;
        },
        set: function (value) {
            this._description = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Skill.prototype, "experience", {
        get: function () {
            return this._experience;
        },
        set: function (value) {
            this._experience = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Skill.prototype, "img", {
        get: function () {
            return this._img;
        },
        set: function (value) {
            this._img = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Skill.prototype, "mark", {
        get: function () {
            return this._mark;
        },
        set: function (value) {
            this._mark = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Skill.prototype, "projects", {
        get: function () {
            return this._projects;
        },
        set: function (value) {
            this._projects = value;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Skill.prototype, "learn", {
        get: function () {
            return this._learn;
        },
        set: function (value) {
            this._learn = value;
        },
        enumerable: true,
        configurable: true
    });
    return Skill;
}());

/*
"name": "R",
            "mark": 1.5,
            "description": "Language and environment for statistical computing and graphics",
            "experience": "I used it in pratical works in courses of statistics and Big Data",
            "project": [],
            "img": "r.png"
 */


/***/ }),

/***/ "./src/data/skills.data.ts":
/*!*********************************!*\
  !*** ./src/data/skills.data.ts ***!
  \*********************************/
/*! exports provided: SKILLS */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SKILLS", function() { return SKILLS; });
/* harmony import */ var _skill__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./skill */ "./src/data/skill.ts");
/* harmony import */ var _project__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./project */ "./src/data/project.ts");


var SKILLS = {
    'language': [
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('R', 1.5, 'Language and environment for statistical computing and graphics.', 'I used it in pratical works in courses of statistics and Big Data.', [], 'r.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('C', 4, 'General-purpose, imperative computer programming language. It is a low-level language ' +
            'which should be compiled to machine instructions.', 'I used it a lot in pratical works in courses of C, Computer sciences and Big Data.', [], 'c.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Python', 4, 'Interpreted high-level programming language for general-purpose programming.', 'I used it a lot in pratical works in courses during my preparatory classes. ' +
            'I worked also with it during a three month internship to implement neural network.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Lesion segmentation by deep learning', 'stage_2a')], 'python.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Shell', 3.5, 'Script designed to be run by the shell command-line interpreter of Unix devices.', 'I used it a lot in pratical works in courses of Computer sciences and Big Data. ' +
            'I worked also with it during a three month internship to preprocess and move the datas.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Lesion segmentation by deep learning', 'stage_2a')], 'shell.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('PHP', 4.5, 'Server-side scripting language designed for Web development, but also used as a' +
            ' general-purpose programming language.', 'I learned it by myself with MOOCs to develop my first web site. Then I worked with ' +
            'it to develop the backend of other websites. I used it also when I learned the framework Symfony in courses.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Minesterstellar Website', 'minesterstellar'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('International mobility website', 'mobilite'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Cercle Website', 'cercle')], 'php.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('SQL', 4, 'Domain-specific language used for programming and designed for managing data held in ' +
            'a relational database management system, or for stream processing in a relational data stream management system.', 'I learned it in preparatory classes and had courses on it at the École des Mines. ' +
            'I used MySQL a lot to manage the data of my three first websites.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Minesterstellar Website', 'minesterstellar'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('International mobility website', 'mobilite'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Cercle Website', 'cercle')], 'sql.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Java', 5, 'General-purpose computer-programming language that is concurrent, class-based and object-oriented.', 'I learned it in Java courses and had lot of pratical works with it. I used also as backend' +
            ' language for a Computer sciences project.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info')], 'java.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('JavaScript', 4.5, 'High-level, interpreted programming language used in web development.', 'I learned it by myself with MOOCs to animate my first web site. I used also as frontend language ' +
            'for all the websites I did after.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Minesterstellar Website', 'minesterstellar'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('International mobility website', 'mobilite'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Cercle Website', 'cercle'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info'),
            new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'js.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('TypeScript', 2, 'Open-source programming language which is a strict syntactical superset of JavaScript.', 'I learned it by using Angular.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'ts.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Matlab', 2.5, 'Multi-paradigm numerical computing environment and proprietary programming language.', 'I had pratical works with it in treatment of signals and images.', [], 'matlab.png')
    ],
    'web': {
        'Front-end': [
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Html', 4.5, 'Standard markup language for creating web pages and web applications.', 'I learned it by myself with MOOCs to create my first web site. I used also for all the websites I did after.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Minesterstellar Website', 'minesterstellar'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('International mobility website', 'mobilite'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Cercle Website', 'cercle'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'html.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('CSS', 4, 'Style sheet language used for describing the presentation of a document written in a markup language like HTML.', 'I learned it by myself with MOOCs to create my first web site. I used also for all the websites I did after.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Minesterstellar Website', 'minesterstellar'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('International mobility website', 'mobilite'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Cercle Website', 'cercle'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info'),
                new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'css.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('SCSS or Sass', 4, 'Preprocessor scripting language that is interpreted or compiled into CSS.', 'I learned it by myself on internet to properly use Bootstrap 4 and Material.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'scss.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Bootstrap', 4, 'Free and open-source front-end framework for designing websites and web applications.', 'I learned it by myself on internet to make quick responsive web sites.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info'), new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'bootstrap.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Material', 3, 'Design system – backed by open-source code – that helps teams to build digital experiences.', 'I learned it by myself on internet to build this web site.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'material.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('AngularJS', 4, 'JavaScript-based open-source front-end web application framework.', 'I learned it by myself with MOOCs to use it as frontend for my second and third websites.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('International mobility website', 'mobilite'), new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Cercle Website', 'cercle')], 'angular.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Vue.js', 3, 'Open-source JavaScript framework for building user interfaces.', 'I learned it in Computer sciences courses.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info')], 'vuejs.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Angular', 3, 'TypeScript-based open-source front-end web application framework.', 'I learned it by myself on internet to build this web site.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'angular.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Android', 2.5, 'Mobile operating system designed primarily for touchscreen mobile devices such as smartphones and tablets.', 'I learned it in Computer sciences courses.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info')], 'android.png')
        ],
        'Back-end': [
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Spring', 3, 'Java framework to develop web applications.', 'I learned it in Computer sciences courses.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info')], 'spring.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Symfony', 3, 'PHP web application framework.', 'I learned it in Computer sciences courses.', [], 'symfony.png')
        ],
        'Managers': [
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Gradle', 4, 'Open-source build automation system mostly used with java.', 'I learned it in Computer sciences courses with Spring and Android.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Computer Science Course Project', 'project_majeure_info')], 'gradle.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Composer', 3.5, 'Application-level package manager for the PHP programming language.', 'I learned it in Computer sciences courses with Symfony.', [], 'composer.png'),
            new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('NPM', 3.5, 'Package manager for the JavaScript programming language.', 'I learned it by using Angular.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Personal Website', 'spc')], 'npm.png')
        ]
    },
    'ia': [
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Tensorflow', 4, 'open-source software library for dataflow programming. It is used for machine learning applications such as neural networks.', 'I learned it during my three month internship à Erasmus MC.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Lesion segmentation by deep learning', 'stage_2a')], 'tensorflow.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Keras', 4.5, 'Open source neural network library written in Python.', 'I used it with Tensorflow backend during my three month internship à Erasmus MC.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Lesion segmentation by deep learning', 'stage_2a')], 'keras.png')
    ],
    'graphical': [
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Photoshop', 2, 'Raster graphics editor.', 'I used it for personnal stuffs or to preprocess images I want to display on my websites.', [], 'photoshop.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Illustrator', 1, 'Vector graphics editor.', 'I used it for personnal stuffs, to edit associations logos and to preprocess logos I want display on my websites.', [], 'illustrator.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Blender', 3, 'Professional, free and open-source 3D computer graphics software.', 'I used it to make some 3D annimations for an association film.', [new _project__WEBPACK_IMPORTED_MODULE_1__["Link"]('Minesterstellar Film', 'film_campagne')], 'blender.png')
    ],
    'other': [
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Git', 3.5, 'Version control system for tracking changes in computer files and coordinating work.', 'I learned it in Computer sciences courses and work with it since.', [], 'git.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Linux', 4, 'Free and open-source software operating systems.', 'I work a lot on ubuntu.', [], 'linux.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Windows', 4.5, 'Graphical operating system families developed by Microsoft.', 'I use Windows since I was a kid.', [], 'windows.png'),
        new _skill__WEBPACK_IMPORTED_MODULE_0__["Skill"]('Microsoft Office Suite', 4, 'Family of client software and services developed by Microsoft.', 'I always use Word, Powerpoint and Excel for my personal and scholar projects.', [], 'office.png')
    ]
};


/***/ })

}]);
//# sourceMappingURL=skills-skills-module.js.map