@extends ('app')

@section ('content')
    <h2>Show all User</h2>

    <ul>
    @foreach ($users as $user)
        <li>
            <a href="{! route('users.show', [$user['id']]) !}">{! $user['email'] !}</a></li>
    @endforeach
    </ul>
@stop
