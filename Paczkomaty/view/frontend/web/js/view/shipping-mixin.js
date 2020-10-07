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
            }

            checkoutData.setSelectedShippingRate(shippingMethod.carrier_code + '_' + shippingMethod.method_code);
            return true;
        },

        changeSelectedPaczkomat: function () {
            changeSelectedPaczkomat();
        }
    };

    return function (target) { // target == Result that Magento_Ui/.../default returns.
        return target.extend(mixin); // new result that all other modules receive
    }
});
