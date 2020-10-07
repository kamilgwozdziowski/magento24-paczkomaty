define([
    'ko',
    'underscore',
    'domReady!'
], function (ko, _) {
    'use strict';

    return function (source) {
        var selectedPaczkomat = ko.observable(null);
        var isVisiblePaczkomat = ko.observable(false);

        source.setSelectedPaczkomat = function (point) {

            if (null === point) {
                isVisiblePaczkomat(false);
                selectedPaczkomat(null);
            } else {
                selectedPaczkomat(point);
                isVisiblePaczkomat(true);
            }
        };

        source.getSelectedPaczkomat = function () {
            return selectedPaczkomat;
        };

        source.getIsVisiblePaczkomaty = function () {
            return isVisiblePaczkomat;
        }

        return source;
    }
});
