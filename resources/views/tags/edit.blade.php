@extends ('app')

@section ('content')
    <h1>Edit {!! $tag->name !!}</h1>
    <hr/>

    {!! Form::model($tag , ['method' => 'PUT', 'route' => ['tags.update', $tag->id]]) !!}
        @include ('tags._form', ['submitButtonText' => 'Update'])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
