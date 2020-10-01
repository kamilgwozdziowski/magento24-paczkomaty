var config = {
     "config": {
         "mixins": {
             "Magento_Checkout/js/view/shipping": {
                 "MylSoft_Paczkomaty/js/view/shipping-mixin": true
             }
         }
     },
     map: {
        '*': {
            paczkomaty: 'MylSoft_Paczkomaty/js/view/paczkomaty'
        }
    }
 }
