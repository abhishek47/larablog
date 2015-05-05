@extends('app')

@section('banner')
<div class="jumbotron">
    <div class="content text-center">
        <h1>Larablog</h1>
        <p>Recent updates and news about the symphony based framework - 'Laravel' </p>
        <p><a class="btn btn-primary btn-lg" href="{{ url('/articles') }}" role="button">Explore</a></p>
    </div>
</div>
@endsection

@section('content')

<div class="content-wrapper">
    @if(count($articles))

    @foreach($articles as $article)
        @include('partials.article')
    @endforeach

     <br>
     <a  href="/articles" class="btn btn-primary">View More Articles</a>

    @endif
</div>

@endsection