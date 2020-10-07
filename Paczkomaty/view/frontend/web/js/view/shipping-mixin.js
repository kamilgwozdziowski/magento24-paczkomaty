define([
    'jquery',
    'underscore',
    'Magento_Ui/js/form/form',
    'ko',
    'MylSoft_Paczkomaty/js/model/inpost',
    'Magento_Checkout/js/action/select-shipping-method',
    'Magento_Checkout/js/checkout-data',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote',
], function (
    $,
    _,
    Component,
    ko,
    inpost,
    selectShippingMethodAction,
    checkoutData,
    wrapper,
    quote
) {
    'use strict';

    var mixin = {
        selectedPaczkomat: quote.getSelectedPaczkomat(),

        selectShippingMethod: function (shippingMethod) {
            selectShippingMethodAction(shippingMethod);
            console.log(this.selectedPaczkomat);
            checkoutData.setSelectedShippingRate(shippingMethod.carrier_code + '_' + shippingMethod.method_code);
            return true;
        }
    };

    return function (target) { // target == Result that Magento_Ui/.../default returns.
        return target.extend(mixin); // new result that all other modules receive
    }
});
