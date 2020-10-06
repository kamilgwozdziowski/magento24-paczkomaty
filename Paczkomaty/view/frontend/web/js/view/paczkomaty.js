define([
    'jquery',
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/quote',
], function (
    $,
    uiComponent,
    ko,
    quote
) {
    'use_strict';

    return uiComponent.extend({

        initialize: function () {
            this._super();
            this.isSelected = ko.observable(false);
            this.selectedPoint = ko.observable(null);
            this.shippingMethod = ko.observable(quote.shippingMethod() != null ? quote.shippingMethod()['carrier_code'] : null);

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
            /** @TODO: wielkosc tez do configu */
            window.easyPack.modalMap(function (point, modal) {
                modal.closeModal();
                self.selectPoint(point);
            }, {width: 500, height: 600});
        },

        selectPoint: function (point) {
            this.isSelected(true)
            this.selectedPoint(point.name);
            console.log(quote.shippingMethod());
        },

        disabled: function () {
            console.log('disabled');
            this.selectedPoint = null;
            this.isSelected = false;
        }
    });
});


