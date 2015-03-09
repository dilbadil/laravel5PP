@extends('app')

@section ('title')
    @parent - All Artices
@stop

@section ('content')
    <ul class="posts">
        @foreach ($articles as $article)
            <li>
                <h2>
                    <a href="{! action('ArticlesController@show', [$article->slug]) !}">{! $article->title !}</a>
                </h2>
                <p>
                    Posted by <a href="{! route('users.show', [$article->user->username]) !}">{! $article->user->fullname !}</a>
                    on {! $article->user->created_at->format('D, M Y H:i') !}
                </p>
                <p>{! $article->excerpt !}</p>
                <p><a href="{! route('articles.show', [$article->slug]) !}">read more</a></p>
            </li>
        @endforeach
    </ul>

    <center>{!! $articles->render() !!}</center>
@stop
