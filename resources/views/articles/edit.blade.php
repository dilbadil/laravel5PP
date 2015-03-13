@extends ('app')

@section ('content')
    <h1>Edit {!! $article->title !!}</h1>
    <hr/>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
        @include ('articles._form', ['submitButtonText' => 'Save', 'isShowSlug' => true])
    {!! Form::close() !!}

    @include ('errors.list')
@stop
