@extends ('app')

@section ('content')
    <ul>
        @foreach ($tags as $tag)
            <li class="rows">
                <div class="form-group">          
                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE', ]) !!}
                        <div class="col-md-6">
                            <a class="" href="{! route('tags.show', [$tag->name]) !}">{! $tag->name !}</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger" type="submit">delete</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </li>
        @endforeach
    </ul>
    <hr/>
    <div class="form-group">
        <a class="btn btn-primary" href="{! route('tags.create') !}">Add tag</a>
    </div>
@stop
