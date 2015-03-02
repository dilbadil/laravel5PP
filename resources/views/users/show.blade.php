@extends ('app')

@section ('content')

    <h4>{! $user['fullname'] !}'s' Articles</h4>

    <ul>
        @foreach ($user['articles'] as $article)
            <li><a href="{! route('articles.show', [$article['id']]) !}">{! $article['title'] !}</a></li>
        @endforeach
    </ul>

    @if (Auth::check())
       <p> 
            <a href="{! route('users.edit', [$user['id']]) !}">edit</a>
            {!! Form::open(['route' => ['users.destroy', $user['id']], 'method' => 'DELETE', ]) !!}
               <button class="btn btn-danger" type="submit">delete</button>
            {!! Form::close() !!}
       </p> 
    @endif
@stop
