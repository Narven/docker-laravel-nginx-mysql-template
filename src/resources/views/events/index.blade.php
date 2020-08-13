@extends('layouts.app')

@section('pageHeader')
Events
@endsection

@section('toolbar')
<div class="btn-group mr-2">
  <a href="{{ route('events.create') }}" class="btn btn-sm btn-outline-primary">Add Event</a>
</div>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          List of Events
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
              @foreach ($events as $event)
                <tr>
                  <td>{{ $event->id }}</td>
                  <td>{{ $event->title }}</td>
                  <td>{{ $event->is_active }}</td>
                  <td>{{ $event->is_valid }}</td>
                  <td>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
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
