<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MyJournal</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{! route('articles.index') !}">Home</a></li>
                <li><a href="{! route('about_path') !}">About</a></li>
                <li><a href="categories">Categories</a></li>
                @if (Auth::check())
                    <li><a href="/articles/create">Create</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
                @if (Auth::guest())
                    <li><a href="auth/login">Login</a></li>
                    <li><a href="auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{! Auth::user()->name !} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
