/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */
define([
    'jquery',
    'ko'
], function ($, ko) {
    'use strict';

    return {
        init: function () {
            this.isSelected = false;
            this.selectedPoint = null;

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
        },
        showModal: function () {
            var self = this;
            self.init();
            /** @TODO: wielkosc tez do configu */
            window.easyPack.modalMap(function (point, modal) {
                modal.closeModal();
                self.selectPoint(point);
            }, {width: 500, height: 600});
        },

        selectPoint: function (point) {
            this.isSelected = true;
            this.selectedPoint = point.name;
            console.log(this.selectedPoint);
        },
    }
});
