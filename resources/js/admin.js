//= include '../../bower_components/angular/angular.min.js'
//= include '../../bower_components/angular-aria/angular-aria.min.js'
//= include '../../bower_components/angular-animate/angular-animate.min.js'
//= include '../../bower_components/ngFx/dist/ngFx.min.js'
//= include '../../bower_components/angular-material/angular-material.min.js'

(function(){
    'use strict';

    angular
        .module('PPApp', ['ngMaterial','ngFx'])
        .value('baseUrl', 'http://localhost/laravel5/public/')
        .config(['$mdThemingProvider', function($mdThemingProvider) {
          $mdThemingProvider.theme('default')
            .primaryPalette('teal')
            .accentPalette('cyan');
        }]);
})();

//= include 'controllers/TaskController.js'
