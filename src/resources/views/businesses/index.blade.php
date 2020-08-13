@extends('layouts.app')

@section('pageHeader')
Businesses
@endsection

@section('toolbar')
<div class="btn-group mr-2">
  <a href="{{ route('businesses.create') }}" class="btn btn-sm btn-outline-primary">Add Business</a>
</div>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          List of Businesses
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
              <tr>
            </thead>
            <tbody>
              @foreach ($businesses as $business)
                <tr>
                  <td>{{ $business->id }}</td>
                  <td>{{ $business->title }}</td>
                  <td>{{ $business->is_active }}</td>
                  <td>{{ $business->is_valid }}</td>
                  <td>
                    <a href="{{ route('businesses.edit', $business->id) }}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                    <form action="{{ route("businesses.destroy", $business->id) }}" method="POST">
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
