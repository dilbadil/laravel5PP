@extends ('app')

@section ('content')

    <h4>{! $user['fullname'] !}'s' Articles</h4>

    <ul>
        @foreach ($user['articles'] as $article)
            <li><a href="{! route('articles.show', [$article['id']]) !}">{! $article['title'] !}</a></li>
        @endforeach
    </ul>

    @if (Auth::check())
        <hr/> 
        <div class="form-group">          
            {!! Form::open(['route' => ['users.destroy', $user['id']], 'method' => 'DELETE', ]) !!}
                <a class="btn btn-primary" href="{! route('users.edit', [$user['id']]) !}">edit</a>
                <button class="btn btn-danger" type="submit">delete</button>
            {!! Form::close() !!}
        </div>
    @endif
@stop
