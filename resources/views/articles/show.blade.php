@extends('app')

@section('content')

<article class="blog-article">

    <h3 class="title">{{ $article->title }}</a></h3>
    <section class="post-meta">
        <time class="post-date" datetime="2015-04-30">{{ $article->published_at->diffForHumans() }}</time>
    </section>


    <div class="body">
        {!! $article->body !!}
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