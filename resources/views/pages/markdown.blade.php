@extends('admin')

@section('scripts')
   @include('partials.markdown.scripts')
@endsection

@section('content')

  @include ('partials.markdown.form')

<footer class="footer-fixed-bottom">
    <div class="container-fluid clearfix">
        <div>
          <p> <button type="button" class="btn btn-primary btn-sm pull-right">Save Post</button></p>
        </div>
    </div>

</footer>

@endsection

@section('footer')
   @include('partials.markdown.jshelpers')
@endsection