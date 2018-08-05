(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["common"],{

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
    function Project(name, id, type, dateDebut, dateFin, majorLabels, labels, context, description, links, mainLink, img) {
        if (img === void 0) { img = null; }
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
        this._img = img;
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
    Object.defineProperty(Project.prototype, "img", {
        get: function () {
            return this._img;
        },
        set: function (value) {
            this._img = value;
        },
        enumerable: true,
        configurable: true
    });
    return Project;
}());

var Label = /** @class */ (function () {
    function Label(name, type, logo, link) {
        this._name = name;
        this._type = type;
        this._logo = logo;
        this._link = link;
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
    Object.defineProperty(Label.prototype, "link", {
        get: function () {
            return this._link;
        },
        set: function (value) {
            this._link = value;
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



/***/ })

}]);
//# sourceMappingURL=common.js.map