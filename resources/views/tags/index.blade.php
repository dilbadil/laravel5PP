@extends ('app')

@section ('content')
    <ul>
        @foreach ($tags as $tag)
            <li>
                <a href="{! route('tags.show', [$tag->name]) !}">{! $tag->name !}</a>
            </li>
        @endforeach
    </ul>
@stop
