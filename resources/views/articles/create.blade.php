@extends('admin')

@section('scripts')
@include('partials.markdown.scripts')
@endsection

@section('content')

@include ('partials.markdown.form')




@include ('partials.markdown.footer')

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($article = new \App\Article, ['url' => 'articles', 'onSubmit' => 'getPostBody()']) !!}
                @include('articles.form-modal', ['submitButtonText' => 'Save Article'])
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('footer')
 @include('partials.markdown.jshelpers')
@endsection

