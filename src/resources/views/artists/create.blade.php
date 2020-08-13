@extends('layouts.app')

@section('pageHeader')
@if (isset($artist))
  {{ $artist->title }}
@else
  Add an Artist
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
        Artist Details
      </div>
      <div class="card-body">

        <form action="{{ isset($artist) ? route('artists.update', $artist->id) : route('artists.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if (isset($artist))
            {{ Form::hidden('id', $artist->id) }}
            @method('PUT')
          @endif

          <div class="form-group">
            <label for="title">Title</label>
            <input
              @if (isset($artist))
                value="{{ $artist-> title }}"
              @else
                value=""
              @endif
              name="title"
              type="text"
              class="form-control"
              id="title"
              placeholder="Duran Duran"
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
              placeholder="Some description about..."
              required>@if (isset($artist)) {{ $artist->description }} @endif</textarea>
          </div>

          <div class="col-md-12 mt-1">
            <button type="submit" class="btn btn-success float-right">
              {{ isset($artist) ? 'Update' : 'Create' }}
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>

@endsection
