'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _extends2 = require('babel-runtime/helpers/extends');

var _extends3 = _interopRequireDefault(_extends2);

var _objectWithoutProperties2 = require('babel-runtime/helpers/objectWithoutProperties');

var _objectWithoutProperties3 = _interopRequireDefault(_objectWithoutProperties2);

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _propTypes = require('prop-types');

var _propTypes2 = _interopRequireDefault(_propTypes);

var _Avatar = require('@material-ui/core/Avatar');

var _Avatar2 = _interopRequireDefault(_Avatar);

var _List = require('@material-ui/core/List');

var _List2 = _interopRequireDefault(_List);

var _ListItem = require('@material-ui/core/ListItem');

var _ListItem2 = _interopRequireDefault(_ListItem);

var _ListItemAvatar = require('@material-ui/core/ListItemAvatar');

var _ListItemAvatar2 = _interopRequireDefault(_ListItemAvatar);

var _ListItemIcon = require('@material-ui/core/ListItemIcon');

var _ListItemIcon2 = _interopRequireDefault(_ListItemIcon);

var _ListItemSecondaryAction = require('@material-ui/core/ListItemSecondaryAction');

var _ListItemSecondaryAction2 = _interopRequireDefault(_ListItemSecondaryAction);

var _ListItemText = require('@material-ui/core/ListItemText');

var _ListItemText2 = _interopRequireDefault(_ListItemText);

var _styles = require('@material-ui/core/styles');

var _reactRouterDom = require('react-router-dom');

var _raCore = require('ra-core');

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var styles = {
    link: {
        textDecoration: 'none',
        color: 'inherit'
    },
    tertiary: { float: 'right', opacity: 0.541176 }
};

var LinkOrNot = (0, _styles.withStyles)(styles)(function (_ref) {
    var classes = _ref.classes,
        linkType = _ref.linkType,
        basePath = _ref.basePath,
        id = _ref.id,
        children = _ref.children;
    return linkType === 'edit' || linkType === true ? _react2.default.createElement(
        _reactRouterDom.Link,
        { to: (0, _raCore.linkToRecord)(basePath, id), className: classes.link },
        children
    ) : linkType === 'show' ? _react2.default.createElement(
        _reactRouterDom.Link,
        {
            to: (0, _raCore.linkToRecord)(basePath, id) + '/show',
            className: classes.link
        },
        children
    ) : _react2.default.createElement(
        'span',
        null,
        children
    );
});

var sanitizeRestProps = function sanitizeRestProps(_ref2) {
    var currentSort = _ref2.currentSort,
        isLoading = _ref2.isLoading,
        setSort = _ref2.setSort,
        rest = (0, _objectWithoutProperties3.default)(_ref2, ['currentSort', 'isLoading', 'setSort']);
    return rest;
};

var SimpleList = function SimpleList(_ref3) {
    var basePath = _ref3.basePath,
        _ref3$classes = _ref3.classes,
        classes = _ref3$classes === undefined ? {} : _ref3$classes,
        className = _ref3.className,
        data = _ref3.data,
        hasBulkActions = _ref3.hasBulkActions,
        ids = _ref3.ids,
        leftAvatar = _ref3.leftAvatar,
        leftIcon = _ref3.leftIcon,
        linkType = _ref3.linkType,
        onToggleItem = _ref3.onToggleItem,
        primaryText = _ref3.primaryText,
        rightAvatar = _ref3.rightAvatar,
        rightIcon = _ref3.rightIcon,
        secondaryText = _ref3.secondaryText,
        selectedIds = _ref3.selectedIds,
        tertiaryText = _ref3.tertiaryText,
        rest = (0, _objectWithoutProperties3.default)(_ref3, ['basePath', 'classes', 'className', 'data', 'hasBulkActions', 'ids', 'leftAvatar', 'leftIcon', 'linkType', 'onToggleItem', 'primaryText', 'rightAvatar', 'rightIcon', 'secondaryText', 'selectedIds', 'tertiaryText']);
    return _react2.default.createElement(
        _List2.default,
        (0, _extends3.default)({ className: className }, sanitizeRestProps(rest)),
        ids.map(function (id) {
            return _react2.default.createElement(
                LinkOrNot,
                { linkType: linkType, basePath: basePath, id: id, key: id },
                _react2.default.createElement(
                    _ListItem2.default,
                    { button: true },
                    leftIcon && _react2.default.createElement(
                        _ListItemIcon2.default,
                        null,
                        leftIcon(data[id], id)
                    ),
                    leftAvatar && _react2.default.createElement(
                        _ListItemAvatar2.default,
                        null,
                        _react2.default.createElement(
                            _Avatar2.default,
                            null,
                            leftAvatar(data[id], id)
                        )
                    ),
                    _react2.default.createElement(_ListItemText2.default, {
                        primary: _react2.default.createElement(
                            'div',
                            null,
                            primaryText(data[id], id),
                            tertiaryText && _react2.default.createElement(
                                'span',
                                { className: classes.tertiary },
                                tertiaryText(data[id], id)
                            )
                        ),
                        secondary: secondaryText && secondaryText(data[id], id)
                    }),
                    (rightAvatar || rightIcon) && _react2.default.createElement(
                        _ListItemSecondaryAction2.default,
                        null,
                        rightAvatar && _react2.default.createElement(
                            _Avatar2.default,
                            null,
                            rightAvatar(data[id], id)
                        ),
                        rightIcon && _react2.default.createElement(
                            _ListItemIcon2.default,
                            null,
                            rightIcon(data[id], id)
                        )
                    )
                )
            );
        })
    );
};

SimpleList.propTypes = {
    basePath: _propTypes2.default.string,
    classes: _propTypes2.default.object,
    className: _propTypes2.default.string,
    data: _propTypes2.default.object,
    hasBulkActions: _propTypes2.default.bool.isRequired,
    ids: _propTypes2.default.array,
    leftAvatar: _propTypes2.default.func,
    leftIcon: _propTypes2.default.func,
    linkType: _propTypes2.default.oneOfType([_propTypes2.default.string, _propTypes2.default.bool]).isRequired,
    onToggleItem: _propTypes2.default.func.isRequired,
    primaryText: _propTypes2.default.func,
    rightAvatar: _propTypes2.default.func,
    rightIcon: _propTypes2.default.func,
    secondaryText: _propTypes2.default.func,
    selectedIds: _propTypes2.default.arrayOf(_propTypes2.default.any).isRequired,
    tertiaryText: _propTypes2.default.func
};

SimpleList.defaultProps = {
    linkType: 'edit',
    hasBulkActions: false,
    selectedIds: []
};

exports.default = (0, _styles.withStyles)(styles)(SimpleList);
module.exports = exports['default'];