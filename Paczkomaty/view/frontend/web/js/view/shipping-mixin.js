define([
    'jquery',
    'underscore',
    'Magento_Ui/js/form/form',
    'ko',
    'Magento_Checkout/js/action/select-shipping-method',
    'MylSoft_Paczkomaty/js/action/change-selected-paczkomat',
    'MylSoft_Paczkomaty/js/action/select-shipping-paczkomaty',
    'Magento_Checkout/js/checkout-data',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote',
], function (
    $,
    _,
    Component,
    ko,
    selectShippingMethodAction,
    changeSelectedPaczkomat,
    selectShippingPaczkomaty,
    checkoutData,
    wrapper,
    quote
) {
    'use strict';

    var mixin = {

        selectedPaczkomat: quote.getSelectedPaczkomat(),
        isVisiblePaczkomat: quote.getIsVisiblePaczkomaty(),


        selectShippingMethod: function (shippingMethod) {
            selectShippingMethodAction(shippingMethod);
            if (null !== shippingMethod && 'paczkomaty' == shippingMethod['method_code']) {
                selectShippingPaczkomaty(shippingMethod);
            } else {
                quote.setSelectedPaczkomat(null);
            }

            checkoutData.setSelectedShippingRate(shippingMethod.carrier_code + '_' + shippingMethod.method_code);
            return true;
        },

        isSelected: ko.computed(function () {
            var valuePaczkomat = $('[name="paczkomat"]').val();

            if (null !== quote.shippingMethod() &&
                'paczkomaty' == quote.shippingMethod()['method_code'] &&
                !valuePaczkomat) {
                selectShippingPaczkomaty(quote.shippingMethod());
            }
            return quote.shippingMethod() ?
                quote.shippingMethod()['carrier_code'] + '_' + quote.shippingMethod()['method_code'] :
                null;
        }),

        changeSelectedPaczkomat: function () {
            changeSelectedPaczkomat();
        },

        setShippingInformation: function () {
            console.log('setShippingInformation');
            console.log(this.validatePaczkomaty());
            if (this.validatePaczkomaty()) {
                this._super();
            }
        },
        validatePaczkomaty: function () {
            console.log('validatePaczkomaty');
            this.source.set('params.invalid', false);
            this.source.trigger('paczkomat.data.validate');

            if (this.source.get('params.invalid')) {
                return false;
            }

            return true;
        }
    };

    return function (target) { // target == Result that Magento_Ui/.../default returns.
        return target.extend(mixin); // new result that all other modules receive
    }
});
