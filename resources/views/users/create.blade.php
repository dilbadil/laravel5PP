@extends ('app')

@section ('content')
    {!! Form::model($user = new App\User, ['route' => 'users.store']) !!}
        @include ('users._form', ['submitButtonText' => 'Add', 'roles' => $roles])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
