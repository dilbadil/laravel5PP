@extends ('admin')

@section ('title')
    @parent - Dashboard
@stop

@section ('content')
    <section ng-controller="TaskController as TaskCtrl">
        <md-input-container>
            <label>Filter Tasks</label>
            <input type="text" ng-model="TaskCtrl.listFilter">
        </md-input-container>
        <md-button ng-click="TaskCtrl.tasks.push({item:'test',completed:false})">Add</md-button>
        <md-button ng-click="TaskCtrl.tasks.pop();">Remove</md-button>
        <ul class="tasklists">
            <li class="fx-fade-up fx-easing-bounce fx-speed-500" ng-repeat="task in TaskCtrl.tasks | filter:TaskCtrl.listFilter">
                <md-checkbox ng-model="TaskCtrl.tasks[$index].completed">
                    {{ task.item }}
                </md-checkbox>
                <md-divider ng-if="!$last"></md-divider>
            </li>
        </ul>
    </section>
@stop
