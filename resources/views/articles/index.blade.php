@extends('app')

@section('content')

<ul class="posts">
    @foreach ($articles as $article)
        <li>
            <h2>
                <a href="{{ action('ArticlesController@show', [$article->id])}}">{{ $article->title }}</a>
            </h2>
            
            <p>{{ $article->body }}</p>
        </li>
    @endforeach
</ul>
@stop
