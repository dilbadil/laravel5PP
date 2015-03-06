@extends ('app')

@section ('content')
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
        @include ('users._form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
