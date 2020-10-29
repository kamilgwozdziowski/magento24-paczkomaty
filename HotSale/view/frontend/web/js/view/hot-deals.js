define(
    [
        'ko',
        'uiComponent',
        'underscore',
        'Magento_Checkout/js/model/step-navigator',
        'mage/translate',
        'mage/storage',
        'Magento_Checkout/js/model/full-screen-loader',
        'mage/url',
        'jquery'
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator,
        $t,
        storage,
        fullScreenLoader,
        url,
        $
    ) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'MylSoft_HotSale/hot-deals'
            },

            isVisible: ko.observable(true),

            /**
             *
             * @returns {*}
             */
            initialize: function () {
                this._super();
                // register the new step named "Hot Deals"
                stepNavigator.registerStep(
                    'hot_deals',
                    null,
                    $t('Hot Deals'),
                    this.isVisible,
                    _.bind(this.navigate, this),
                    /**
                     * sort order value
                     * 'sort order value' < 10: step displays before shipping step;
                     * 10 < 'sort order value' < 20 : step displays between shipping and payment step
                     * 'sort order value' > 20 : step displays after payment step
                     */
                    1
                );

                return this;
            },

            /**
             * The navigate() method is responsible for navigation between checkout step
             * during checkout. You can add custom logic, for example some conditions
             * for switching to your custom step
             */
            navigate: function () {

            },

            /**
             * @returns void
             */
            navigateToNextStep: function () {
                stepNavigator.next();
            },

            /**
             * @returns void
             */
            addToCart: function (formElement) {
                var self = this;
                var products = $(formElement).serializeArray();
                $.each(products, function (key, product) {
                    if(window.checkoutConfig.hot_deals_product[key]){
                        // @TODO: pobiera złe ja ID powienno byc w kluczy wtedy bedzie ok ale cos nie działa
                        self.addToCartAjax(window.checkoutConfig.hot_deals_product[key]);
                    }
                });
            },

            addToCartAjax: function (product) {
                $.post({
                    url: product['addCartUrl'],
                    data: {
                        'qty': 1,
                        'product': product['id'],
                        'form_key': $.cookie('form_key')
                    },
                    showLoader: true,
                    success: function (res) {
                        stepNavigator.next();
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        console.log(err.Message);
                    }
                });
            },

            /**
             * @returns array
             */
            getProductsList: function () {
                return window.checkoutConfig.hot_deals_product;
            }
        });
    }
);
