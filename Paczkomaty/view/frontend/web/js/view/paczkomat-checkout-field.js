define([
    'Magento_Ui/js/form/form',
    'Magento_Checkout/js/model/quote',
], function(Component, quote) {
    'use strict';
    return Component.extend({

        selectedPaczkomat:  quote.getSelectedPaczkomat(),
        isVisiblePaczkomat:  quote.getIsVisiblePaczkomaty(),

        initialize: function () {
            this._super();
            return this;
        },
    });
});
