@extends ('app')

@section ('content')
    {!! Form::model($tag, ['route' => 'tags.store']) !!}
        @include ('tags._form', ['submitButtonText' => 'Add'])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
