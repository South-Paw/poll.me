(function () {
    'use strict';

    /* Controllers */

    // Base URL of the site
    var siteUrl = "http://csse-studweb3.canterbury.ac.nz/~adg62/365/polls";

    // Base URL of the API
    var apiUrl = "http://csse-studweb3.canterbury.ac.nz/~adg62/365/polls";

    var pollControllers = angular.module('pollControllers', []);

    // Polls Index Controller
    pollControllers.controller('PollsIndex', [
        '$scope', '$http',
        function ($scope, $http) {
            $scope.siteUrl = siteUrl;
            $scope.polls = undefined;

            // Retrieve all polls
            var pollUrl = apiUrl + "/index.php/services/polls";

            $http.get(pollUrl)
            .success(function(response) {
                $scope.polls = response;
                console.log("Got polls list.");
            })
            .error(function() {
                console.log("Error fetching poll list.");
            });
        }
    ]);

    // Polls View Controller
    pollControllers.controller('PollsView', [
        '$scope', '$http', '$routeParams', '$location',
        function ($scope, $http, $routeParams, $location) {
            $scope.siteUrl = siteUrl;
            $scope.poll = undefined;

            // This poll's questions and answers
            var pollUrl = apiUrl + "/index.php/services/polls/" + $routeParams.pollId;

            // Vote submission url, prepended with the current pollId
            var voteUrl = apiUrl + "/index.php/services/votes/" + $routeParams.pollId + "/";

            // Get poll, its questions and answers
            $http.get(pollUrl)
            .success(function(response) {
                $scope.poll = response;
                console.log("Got pollId:" + $routeParams.pollId);
            })
            .error(function() {
                console.log("Error fetching pollId:" + $routeParams.pollId);
            });

            // When the user clicks on an answer to vote, add the answerId to the voteUrl and post it.
            $scope.voteFor = function(answerId) {
                console.log("Voting for answerId:" + answerId + " on pollId:" + $routeParams.pollId);

                // Do post
                $http.post(voteUrl + answerId)
                .success(function(response) {
                    console.log("Vote successful. Viewing results...");
                    // Change path to results once voted.
                    $location.path("polls/results/" + $routeParams.pollId);
                })
                .error(function() {
                    console.log("Error voting for answerId:" + answerId + " on pollId:" + $routeParams.pollId);
                });
            }
        }
    ]);

    // Poll Results Contorller
    pollControllers.controller('PollsResults', [
        '$scope', '$http', '$route', '$routeParams',
        function ($scope, $http, $route, $routeParams) {
            $scope.siteUrl = siteUrl;
            $scope.poll = undefined;
            $scope.votes = undefined;

            // This poll's questions and answers
            var pollUrl = apiUrl + "/index.php/services/polls/" + $routeParams.pollId;
            var votesUrl = apiUrl + "/index.php/services/votes/" + $routeParams.pollId;

            $http.get(pollUrl)
            .success(function(response) {
                $scope.poll = response;
                console.log("Got pollId:" + $routeParams.pollId);
            })
            .error(function() {
                console.log("Error fetching pollId:" + $routeParams.pollId);
            });

            $http.get(votesUrl)
            .success(function(response) {
                $scope.votes = response;
                console.log("Got votes for pollId:" + $routeParams.pollId);
            })
            .error(function() {
                console.log("Error fetching pollId:" + $routeParams.pollId);
            });

            $scope.resetVotes = function(answerId) {
                console.log("Reseting votes for pollId:" + $routeParams.pollId);

                $http.delete(votesUrl)
                .success(function(response) {
                    console.log("Successfully cleared votes.");
                    $route.reload();
                })
                .error(function() {
                    console.log("Error clearing votes on pollId:" + $routeParams.pollId);
                    $route.reload();
                });
            }
        }
    ]);

    pollControllers.controller('About', [
        '$scope',
        function ($scope) {
            $scope.siteUrl = siteUrl;
        }
    ]);
 }())
