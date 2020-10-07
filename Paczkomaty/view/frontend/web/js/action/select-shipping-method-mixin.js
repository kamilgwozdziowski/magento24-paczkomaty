/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */
define([
    'Magento_Checkout/js/model/quote',
    'mage/utils/wrapper',
], function (quote, wrapper) {
    'use strict';

    return function (selectShippingMethodAction) {

        return wrapper.wrap(selectShippingMethodAction, function (originalAction, shippingMethod) {
                console.log(shippingMethod);
                console.log('quote.setSelectedPaczkomat');
                quote.setSelectedPaczkomat({});
            return originalAction();
        });
    };
});
