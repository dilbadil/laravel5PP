@extends ('app')

@section ('content')
    <h4>Profile details</h4>
    <table>
        <tr>
            <th>Fullname:</th>
            <td>{! $user->fullname !}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{! $user->email !}</td>
        </tr>
        <tr>
            <th>Username:</th>
            <td>{! $user->username !}</td>
        </tr>
    </table>

    <hr/>

    <h4>{! $user->fullname !}'s' articles</h4>
    <ul>
        @forelse ($user->articles as $article)
            <li><a href="{! route('articles.show', [$article->slug]) !}">{! $article->title !}</a></li>
        @empty
            <p>{! $user->username !} doesn't have articles </p>
        @endforelse
    </ul>

    @if (Auth::check())
        <hr/> 
        <div class="form-group">          
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', ]) !!}
                <a class="btn btn-primary" href="{! route('users.edit', [$user->username]) !}">edit</a>
                @if ($user->isAdmin())
                    <button class="btn btn-danger" type="submit">delete</button>
                @endif
            {!! Form::close() !!}
        </div>
    @endif
@stop
