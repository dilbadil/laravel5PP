<!DOCTYPE html>
<html ng-app="PPApp">
    <head>
        <title>
            @section('title')
                Administration
            @show
        </title>
        @section('css')
            <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        @show
    </head>
    <body>
        <md-toolbar class="md-primary" layout="row" layout-align="space-around center" layout-padding id="header">
            <h2 class="md-toolbar-tools">PP Blog Admin Panel</h2>
            <md-button aria-label="logout">
                <i class="fa fa-power-off"></i> logout
            </md-button>
        </md-toolbar>
        <md-toolbar layout="row"
            layout-align="start center"
            layout-padding id="subheader" class="md-primary md-hue-3">
            <a href="#"><i class="fa fa-home"></i> Home</a>
            <a href="#"><i class="fa fa-users"></i> Users</a>
            <a href="#">Pages</a> <a href="#">Post</a>
            <a href="#">Settings</a>
        </md-toolbar>
        <md-content>
            @yield('content')
        </md-content>
    </body>
    @section('js')
        <script src="{{ asset('js/admin.js') }}"></script>
    @show
</html>
