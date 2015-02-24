(function(){
    'use strict';

    angular
        .module('PPApp')
        .controller('TaskController', TaskController);

    TaskController.$inject = ['$http','baseUrl'];
    function TaskController($http, baseUrl){
        var vm       = this; // view model
        vm.tasks     = [];
        vm.loadTasks = loadTasks;
        vm.loadTasks();
        console.info('Testing')
        // function definition
        function loadTasks(){
            $http.get(baseUrl+'tasks')
            .success(function(response){
                angular.forEach(response, function(res){
                    var data = {};
                    data.id = res.id;
                    data.item = res.item;
                    data.completed = (res.completed<1) ? false : true;
                    vm.tasks.push(data);
                })
            })
            .error(function(err){
                console.error(err);
            })
        }
    }
})();
