'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.LoadingIndicator = undefined;

var _extends2 = require('babel-runtime/helpers/extends');

var _extends3 = _interopRequireDefault(_extends2);

var _objectWithoutProperties2 = require('babel-runtime/helpers/objectWithoutProperties');

var _objectWithoutProperties3 = _interopRequireDefault(_objectWithoutProperties2);

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _propTypes = require('prop-types');

var _propTypes2 = _interopRequireDefault(_propTypes);

var _classnames = require('classnames');

var _classnames2 = _interopRequireDefault(_classnames);

var _reactRedux = require('react-redux');

var _styles = require('@material-ui/core/styles');

var _withWidth = require('@material-ui/core/withWidth');

var _withWidth2 = _interopRequireDefault(_withWidth);

var _CircularProgress = require('@material-ui/core/CircularProgress');

var _CircularProgress2 = _interopRequireDefault(_CircularProgress);

var _compose = require('recompose/compose');

var _compose2 = _interopRequireDefault(_compose);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var styles = {
    loader: {
        margin: 16
    }
};

var LoadingIndicator = function LoadingIndicator(_ref) {
    var classes = _ref.classes,
        className = _ref.className,
        isLoading = _ref.isLoading,
        width = _ref.width,
        rest = (0, _objectWithoutProperties3.default)(_ref, ['classes', 'className', 'isLoading', 'width']);
    return isLoading ? _react2.default.createElement(_CircularProgress2.default, (0, _extends3.default)({
        className: (0, _classnames2.default)('app-loader', classes.loader, className),
        color: 'inherit',
        size: width === 'xs' || width === 'sm' ? 20 : 30,
        thickness: 3
    }, rest)) : null;
};

exports.LoadingIndicator = LoadingIndicator;
LoadingIndicator.propTypes = {
    classes: _propTypes2.default.object,
    className: _propTypes2.default.string,
    isLoading: _propTypes2.default.bool,
    width: _propTypes2.default.string
};

var mapStateToProps = function mapStateToProps(state) {
    return {
        isLoading: state.admin.loading > 0
    };
};

exports.default = (0, _compose2.default)((0, _reactRedux.connect)(mapStateToProps, {} // Avoid connect passing dispatch in props
), (0, _styles.withStyles)(styles), (0, _withWidth2.default)())(LoadingIndicator);