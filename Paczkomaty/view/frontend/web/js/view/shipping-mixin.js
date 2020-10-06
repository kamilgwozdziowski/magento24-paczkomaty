define([
    'jquery',
    'underscore',
    'Magento_Ui/js/form/form',
    'ko',
    'MylSoft_Paczkomaty/js/model/inpost',
    'Magento_Checkout/js/action/select-shipping-method',
    'Magento_Checkout/js/checkout-data',
], function (
    $,
    _,
    Component,
    ko,
    inpost,
    selectShippingMethodAction,
    checkoutData,
) {
    'use strict';

    var mixin = {

        selectShippingMethod: function (shippingMethod) {
            inpost.showModal();
            selectShippingMethodAction(shippingMethod);
            checkoutData.setSelectedShippingRate(shippingMethod.carrier_code + '_' + shippingMethod.method_code);

            return true;
        }
    };

    return function (target) { // target == Result that Magento_Ui/.../default returns.
        return target.extend(mixin); // new result that all other modules receive
    }
});
