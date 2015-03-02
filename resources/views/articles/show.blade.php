@extends ('app')

@section ('title')
    @parent - {! $article->title !}
@stop

@section ('content')

    <h1>{! $article->title !}</h1>

    <hr/>

    <article>
        <p>
            Posted by <a href="{! route('users.show', [$article->user->id]) !}">{! $article->user->fullname !}</a>
            on <b>{! $article->user->created_at->format('D, M Y H:i') !}</b>
        </p>
        <div class="body">
            {! $article->body !}
        </div>
    </article>

    @unless ($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach ($article->tags as $tag)
                <li>
                    <a href="{! route('tags.show', [$tag->name]) !}">{! $tag->name !}</a>
                </li>
            @endforeach
        </ul>
    @endunless

    @if (Auth::check())
        {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id]]) !!}
            <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!}
        <a class="btn btn-primary" href="{! URL::route('articles.edit', $article->id) !}">Edit</a>
    @endif

@stop
