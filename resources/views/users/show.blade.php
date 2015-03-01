@extends ('app')

@section ('content')
    <p>
        show a user {! $user['fullname'] !} with email {! $user['email'] !}
    </p>
   <p> 
        <a href="{! route('users.edit', [$user['id']]) !}">edit</a>
        {!! Form::open(['route' => ['users.destroy', $user['id']], 'method' => 'DELETE', ]) !!}
           <button class="btn btn-danger" type="submit">delete</button>
        {!! Form::close() !!}
   </p> 
@stop
