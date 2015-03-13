@extends ('app')

@section ('content')
    <h1>Edit {!! $user->fullname !!}</h1>
    <hr/>

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
        @include ('users._form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
