@extends('layouts.app')

@section('pageHeader')
Artists
@endsection

@section('toolbar')
<div class="btn-group mr-2">
  <a href="{{ route('artists.create') }}" class="btn btn-sm btn-outline-primary">Add Artist</a>
</div>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          List of Artists
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Active</th>
                <th>Valid</th>
                <th></th>
                <th></th>
              <tr>
            </thead>
            <tbody>
              @foreach ($artists as $artist)
                <tr>
                  <td>{{ $artist->id }}</td>
                  <td>{{ $artist->title }}</td>
                  <td>{{ $artist->is_active }}</td>
                  <td>{{ $artist->is_valid }}</td>
                  <td>
                    <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                    <form action="{{ route("artists.destroy", $artist->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
