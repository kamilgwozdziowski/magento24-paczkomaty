/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */
define([
    'jquery',
    'Magento_Checkout/js/model/quote',
    'MylSoft_Paczkomaty/js/action/select-shipping-paczkomaty'
], function ($, quote,actionSelectShippingPaczkomaty) {
    'use strict';

    return function () {
        console.log('change Paczkomaty()');
        quote.setSelectedPaczkomat(null);
        actionSelectShippingPaczkomaty();
    };
});
