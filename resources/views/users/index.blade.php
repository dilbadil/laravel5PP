@extends ('app')

@section ('content')
    <h2>All User</h2>

    <ul>
    @foreach ($users as $user)
        <li>
            <a href="{! route('users.show', [$user->username]) !}">{! $user->email !}</a></li>
    @endforeach
    </ul>
    
    @if ($currentUser->isAdmin())
        <hr/>
        <div class="form-group">
            <a class="btn btn-primary" href="{! route('users.create') !}">Add user</a>
        </div>
    @endif
@stop
