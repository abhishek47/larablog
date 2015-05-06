@extends ('admin')

@section ('content')

  <div class="content-wrapper">
      <h1>Add New Tag</h1>
      <hr>
      {!! Form::open(['url' => 'admin/tags']) !!}

          <div class="form-group">
              {!! Form::label('name', 'Name:') !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
              {!! Form::submit('Add Tag To Database', ['class' => 'btn btn-primary form-control']) !!}
          </div>


      {!! Form::close() !!}



      <table class="table table-striped">
          <thead>
             <tr>
                 <th>#</th>
                 <th>Name</th>
                 <th>No. Of Articles</th>
             </tr>
          </thead>
          <tbody>
              @foreach($tags as $tag)
                <tr>
                   <td>{{ $tag->id }}</td>
                   <td>{{ $tag->name }}</td>
                   <td>{{ count($tag->articles) }}</td>
                </tr>
              @endforeach
          </tbody>
      </table>

  </div>
@endsection