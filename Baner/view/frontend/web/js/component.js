define([
    'uiComponent',
    'ko',
    'MylSoft_Baner/js/test'
], function (uiComponent, ko, test) {
    'use strict';

    return uiComponent.extend({

        initialize: function () {
            this._super();
            this.qty = ko.observable(1);
        },


        clickTest: function (){
            var qty = this.qty() + 1;
            this.qty(qty);
        }
    });
});
