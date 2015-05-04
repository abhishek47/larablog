@extends('app')

@section('content')

<h1>{{ $article->title }}</h1>

<hr>

<article>

    <div class="body">
        {{ $article->body }}
    </div>

</article>

<h5>Tags:</h5>
@unless($article->tags->isEmpty())
<ul>
    @foreach($article->tags as $tag)
       <li><a href="{{ url('tags', $tag->name) }}">{{ $tag->name }}</a></li>
    @endforeach
</ul>
@endunless


@stop