@extends('layouts.app')

@section('pageHeader')
@if (isset($event))
  {{ $event->title }}
@else
  Add an Event
@endif
@endsection

@section('styles')
<style>
#map {
  width: 100%;
  height: 400px;
}
</style>
@endsection

@section('scripts')
@endsection

@section('content')

<div class="row">

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Event Details
      </div>
      <div class="card-body">

        <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if (isset($event))
            {{ Form::hidden('id', $event->id) }}
            @method('PUT')
          @endif

          <div class="form-group">
            <label for="title">Title</label>
            <input
              @if (isset($event))
                value="{{ $event-> title }}"
              @else
                value=""
              @endif
              name="title"
              type="text"
              class="form-control"
              id="title"
              placeholder="Lion King"
              required />
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea
              name="description"
              class="form-control"
              id="description"
              placeholder="Some description about...">@if (isset($event)) {{ $event->description }} @endif</textarea>
          </div>

          <div class="col-md-12 mt-1">
            <button type="submit" class="btn btn-success float-right">
              {{ isset($event) ? 'Update' : 'Create' }}
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>

@endsection
