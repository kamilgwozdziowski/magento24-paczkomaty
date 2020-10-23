var config = {
    "map": {
        "*": {
            'Magento_Checkout/js/model/shipping-save-processor/default': 'MylSoft_Paczkomaty/js/model/shipping-save-processor/default'
        }
    },
     config: {
         mixins: {
             "Magento_Checkout/js/view/shipping": {
                 "MylSoft_Paczkomaty/js/view/shipping-mixin": true
             },
             "Magento_Checkout/js/model/quote": {
                 "MylSoft_Paczkomaty/js/model/quote-mixin": true
             },/*
             "Magento_Checkout/js/action/set-shipping-information": {
                 'MylSoft_Paczkomaty/js/action/set-shipping-information-mixin': true
             }*/
         }
     },

 }
