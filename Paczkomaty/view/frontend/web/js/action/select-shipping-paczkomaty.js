/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */
define([
    'jquery',
    'Magento_Checkout/js/model/quote'
], function ($, quote) {
    'use strict';

    return function () {
        /** @TODO: api key do configu jakiegos */
        window.easyPack.init({
            mapType: 'google',
            searchType: 'google',
            defaultLocale: 'pl',
            points: {
                types: ['parcel_locker']
            },
            map: {
                googleKey: 'AIzaSyBbE58ObH74sZ1yU65gOlwqOVXhTPYzh-U'
            }
        });

        /** @TODO: wielkosc tez do configu */
        window.easyPack.modalMap(function (point, modal) {
            modal.closeModal();
            quote.setSelectedPaczkomat(point)
        }, {width: 500, height: 600});

        //quote.setSelectedPaczkomat(null);
    };
});
