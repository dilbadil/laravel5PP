@extends('app')

@section ('title')
    @parent - All Artices
@stop

@section ('content')

<ul class="posts">
    @foreach ($articles as $article)
        <li>
            <h2>
                <a href="{! action('ArticlesController@show', [$article->id]) !}">{! $article->title !}</a>
            </h2>
            
            <p>
                Posted by <a href="{! route('users.show', [$article->user->id]) !}">{! $article->user->fullname !}</a>
                on {! $article->user->created_at->format('D, M Y H:i') !}
            </p>
            <p>{! $article->body !}</p>
        </li>
    @endforeach
</ul>
@stop
