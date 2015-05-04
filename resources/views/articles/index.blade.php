@extends('app')


@section('banner')
<div class="jumbotron jumbotron-small">
    <div class="content-small text-center">
        <h1>Larablog</h1>
        <p>Recent updates and news about the symphony based framework - 'Laravel' </p>
    </div>
</div>
@endsection

@section('content')


  @if(count($articles))

    @foreach($articles as $article)
      @include('partials.article')
    @endforeach

  @endif

@endsection