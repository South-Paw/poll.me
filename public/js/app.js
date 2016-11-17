(function () {
    'use strict';

    /* App Module */

    var pollsApp = angular.module(
        'pollsApp', [
            'ngRoute',
            'pollControllers'
        ]
    );

    // Routes config
    pollsApp.config([
        '$routeProvider',
        function($routeProvider) {
            $routeProvider.
                when('/polls', {
                    templateUrl: 'public/partials/polls.html',
                    controller: 'PollsIndex'
                }).
                when('/polls/view/:pollId', {
                    templateUrl: 'public/partials/view.html',
                    controller: 'PollsView'
                }).
                when('/polls/results/:pollId', {
                    templateUrl: 'public/partials/results.html',
                    controller: 'PollsResults'
                }).
                when('/about', {
                    templateUrl: 'public/partials/about.html',
                    controller: 'About'
                }).
                otherwise({
                    redirectTo: '/polls'
                });
        }
    ]);
}())
