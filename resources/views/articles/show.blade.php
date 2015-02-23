@extends('app')

@section ('title')
    @parent - {{ $article->title }}
@stop

@section('content')

    <h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>

    </article>

    @unless ($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach ($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless

    @if (Auth::check())
        {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id]]) !!}
            <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!}
        <a class="btn btn-primary" href="{{ URL::route('articles.edit', $article->id) }}">Edit</a>
    @endif

@stop
