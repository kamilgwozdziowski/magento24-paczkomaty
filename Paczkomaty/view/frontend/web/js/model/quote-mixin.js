define([
    'ko',
    'underscore',
    'domReady!'
], function (ko, _) {
    'use strict';

    return function (source) {
        var selectedPaczkomat = ko.observable(null);

        source.setSelectedPaczkomat = function (point) {
            console.log('setSelectedPaczkomat');
            var pointName = 'a';
            selectedPaczkomat(pointName);
        };

        source.getSelectedPaczkomat = function () {
            console.log('getSelectedPaczkomat');
            return selectedPaczkomat;
        };

        return source;
    }
});
