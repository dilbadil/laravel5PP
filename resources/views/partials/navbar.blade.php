<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{! route('articles.index') !}">MyJournal</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{! route('articles.index') !}">Home</a></li>
                <li><a href="{! route('about_path') !}">About</a></li>
                <li><a href="{! route('tags.index') !}">Categories</a></li>

                @if (Auth::check())
                    <li><a href="{! route('articles.create') !}">Create</a></li>
                    <li><a href="{! route('users.index') !}">Users</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->slug]) !!}</li>

                @if (Auth::guest())
                    <li><a href="{! action('Auth\AuthController@getLogin') !}">Login</a></li>
                    <li><a href="{! action('Auth\AuthController@getRegister') !}">Register</a></li>
                @else

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{! $user->username !} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{! route('users.show', [$user->username]) !}">Profile</a></li>
                            <li><a href="{! action('Auth\AuthController@getLogout') !}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
