@extends('app')


@section('banner')
@if (!isset($tag))
<div class="jumbotron jumbotron-small">
    <div class="content-small text-center">
        <h1>Larablog</h1>
        <p>Recent updates and news about the symphony based framework - 'Laravel' </p>
    </div>
</div>
@endif


@endsection

@section('content')

 <div class="content-wrapper">


  @if(count($articles))

     @if (isset($tag))
       <h1>Articles : <a href="{{ url('tags', $tag->name) }}">{{ $tag->name }}</a></h1>
     <hr>
     @endif

    @foreach($articles as $article)
      @include('partials.article')
    @endforeach

    {!! $articles->render() !!}

  @endif

 </div>

@endsection