var config = {
     "config": {
         "mixins": {
             "Magento_Checkout/js/view/shipping": {
                 "MylSoft_Paczkomaty/js/view/shipping-mixin": true
             },
             "Magento_Checkout/js/model/quote": {
                 "MylSoft_Paczkomaty/js/model/quote-mixin": true
             },
             'Magento_Checkout/js/action/select-shipping-method': {
                 'MylSoft_Paczkomaty/js/action/select-shipping-method-mixin': true
             }
         }
     },

 }
