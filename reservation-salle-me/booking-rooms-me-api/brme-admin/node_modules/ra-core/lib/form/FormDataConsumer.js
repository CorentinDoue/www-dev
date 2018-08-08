'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _extends2 = require('babel-runtime/helpers/extends');

var _extends3 = _interopRequireDefault(_extends2);

var _objectWithoutProperties2 = require('babel-runtime/helpers/objectWithoutProperties');

var _objectWithoutProperties3 = _interopRequireDefault(_objectWithoutProperties2);

var _propTypes = require('prop-types');

var _propTypes2 = _interopRequireDefault(_propTypes);

var _reactRedux = require('react-redux');

var _reduxForm = require('redux-form');

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var REDUX_FORM_NAME = 'record-form';

/**
 * Get the current (edited) value of the record from the form and pass it
 * to child function
 *
 * @example
 *
 * const PostEdit = (props) => (
 *     <Edit {...props}>
 *         <SimpleForm>
 *             <BooleanInput source="hasEmail" />
 *             <FormDataConsumer>
 *                 {({ formData, ...rest }) => formData.hasEmail &&
 *                      <TextInput source="email" {...rest} />
 *                 }
 *             </FormDataConsumer>
 *         </SimpleForm>
 *     </Edit>
 * );
 *
 * @example
 *
 * const OrderEdit = (props) => (
 *     <Edit {...props}>
 *         <SimpleForm>
 *             <SelectInput source="country" choices={countries} />
 *             <FormDataConsumer>
 *                 {({ formData, ...rest }) =>
 *                      <SelectInput
 *                          source="city"
 *                          choices={getCitiesFor(formData.country)}
 *                          {...rest}
 *                      />
 *                 }
 *             </FormDataConsumer>
 *         </SimpleForm>
 *     </Edit>
 * );
 */
var FormDataConsumer = function FormDataConsumer(_ref) {
    var children = _ref.children,
        formData = _ref.formData,
        rest = (0, _objectWithoutProperties3.default)(_ref, ['children', 'formData']);

    var ret = children((0, _extends3.default)({ formData: formData }, rest));
    return ret === undefined ? null : ret;
};

FormDataConsumer.propTypes = {
    children: _propTypes2.default.func.isRequired,
    data: _propTypes2.default.object
};

var mapStateToProps = function mapStateToProps(state, _ref2) {
    var record = _ref2.record;
    return {
        formData: (0, _reduxForm.getFormValues)(REDUX_FORM_NAME)(state) || record
    };
};

exports.default = (0, _reactRedux.connect)(mapStateToProps)(FormDataConsumer);
module.exports = exports['default'];