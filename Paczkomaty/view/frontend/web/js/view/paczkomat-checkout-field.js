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

        onSubmit: function() {
            // trigger form validation
            this.source.set('params.invalid', false);
            this.source.trigger('customCheckoutForm.data.validate');

            // verify that form data is valid
            if (!this.source.get('params.invalid')) {
                // data is retrieved from data provider by value of the customScope property
                var formData = this.source.get('customCheckoutForm');
                // do something with form data
                console.dir(formData);
            }
        }
    });
});
