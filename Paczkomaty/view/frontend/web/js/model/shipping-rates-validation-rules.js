define(
    [],
    function () {
        'use strict';
        return {
            getRules: function() {
                return {
                    'company': {
                        'required': true
                    },
                    'country_id': {
                        'required': true
                    },
                    'city': {
                        'required': true
                    }
                };
            }
        };
    }
)
