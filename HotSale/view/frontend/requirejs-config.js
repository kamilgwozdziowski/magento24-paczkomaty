var config = {
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'MylSoft_HotSale/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'MylSoft_HotSale/js/view/shipping-payment-mixin': true
            }
        }
    }
}
