/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'underscore',
    'Magento_Ui/js/form/form',
    'ko',
    'Magento_Checkout/js/action/select-shipping-method',
    'Magento_Checkout/js/checkout-data',
    'MylSoft_Paczkomaty/js/paczkomaty',
], function (
    $,
    _,
    Component,
    ko,
    selectShippingMethodAction,
    checkoutData,
    paczkomaty,
) {
    'use strict';


    return function (Component) {
        return Component.extend({
            isInPostSelect: ko.observable(false),

            selectShippingMethod: function (shippingMethod) {
                if('paczkomaty' == shippingMethod['carrier_code'])
                {
                    paczkomaty.showModal();
                }
                else
                {
                    paczkomaty.disabled()
                }
                console.log(this.isInPostSelect);

                selectShippingMethodAction(shippingMethod);
                checkoutData.setSelectedShippingRate(shippingMethod['carrier_code'] + '_' + shippingMethod['method_code']);

                return true;
            },

            getInPostSelect: ko.computed(function () {
                return paczkomaty.isSelected;
            }),
        });
    };
});
