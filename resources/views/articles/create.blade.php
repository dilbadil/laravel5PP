@extends ('app')

@section ('content')
    <h1>Create New Article</h1>

    {!! Form::model($article, ['url' => 'articles']) !!}
        @include ('articles._form', ['submitButtonText' => 'Publish', 'isShowSlug' => false])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
