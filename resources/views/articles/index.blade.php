@extends('app')

@section('content')

  <h1 class="page-header text-center">Articles</h1>

  @if(count($articles))

    @foreach($articles as $article)
       <article class="blog-article text-center">
           <h3 class="blog-title"><a href="{{ url('/articles', $article->slug) }}">{{ $article->title }}</a></h3>
           <p class="blog-body">{{ $article->body }}</p>
       </article>
    @endforeach

  @endif

@endsection