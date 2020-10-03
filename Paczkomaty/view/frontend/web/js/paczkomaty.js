define([
    'jquery',
], function ($) {
    'use_strict';

    return {

        isSelected: false,
        selectedPoint: null,

        init: function() {
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
            this.init();
            self = this;
            self.isSelected = true;
            /** @TODO: wielkosc tez do configu */
            window.easyPack.modalMap(function (point, modal) {
                modal.closeModal();
                self.selectPoint(point);
            }, {width: 500, height: 600});
        },

        selectPoint: function(point) {
            console.log(point.name);
            this.selectedPoint = point.name;
        },

        disabled: function () {
            console.log('disabled');
            this.selectedPoint = null;
            this.isSelected = false;
        }
    }
});


