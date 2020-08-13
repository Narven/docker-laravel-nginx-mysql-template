@extends('layouts.app')

@section('pageHeader')
@if (isset($business))
  {{ $business->title }}
@else
  Add a Business
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzEwn3rPoED5gii_Gn7vGB5dxhkUNnBKk&callback=initMap" async defer></script>
<script>
  var map;
  const myLocation = {lat: 51.5285582, lng: -0.24168}
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: myLocation,
      zoom: 10,
    });
  }

  var marker = new google.maps.Marker({
    position: myLocation,
    map: map,
    title: 'Click to zoom'
  });

  map.addListener('center_changed', function() {
    // 3 seconds after the center of the map has changed, pan back to the
    // marker.
    window.setTimeout(function() {
      map.panTo(marker.getPosition());
    }, 3000);
  });

  marker.addListener('click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });

</script>
@endsection

@section('content')

<div class="row">

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Business Details
      </div>
      <div class="card-body">

        <form action="{{ isset($business) ? route('businesses.update', $business->id) : route('businesses.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if (isset($business))
            {{ Form::hidden('id', $business->id) }}
            @method('PUT')
          @endif

          <div class="form-group">
            <label for="title">Title</label>
            <input
              @if (isset($business))
                value="{{ $business-> title }}"
              @else
                value=""
              @endif
              name="title"
              type="text"
              class="form-control"
              id="title"
              placeholder="My Awesome Business"
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
              required>@if (isset($business)) {{ $business->description }} @endif</textarea>
          </div>

          <div class="form-group">
            <label for="title">Location</label>

            <div class="card">
              <div class="card-body">
                <div id="map">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="lat">Latitude</label>
              <input
                name="lat"
                type="text"
                class="form-control"
                id="lat"
                placeholder="-83.424241"
                @if (isset($business))
                  value="{{ $business->lat }}"
                @else
                  value=""
                @endif
                 />
            </div>
            <div class="col-md-6 mb-3">
              <label for="lon">Longitude</label>
              <input
                name="lon"
                type="text"
                class="form-control"
                id="lon"
                placeholder="-118.335584"
                @if (isset($business))
                  value="{{ $business->lon }}"
                @else
                  value=""
                @endif
                />
            </div>
          </div>

          <div class="form-check">
            {{ Form::checkbox('is_active', isset($bussiness) ? $business->is_active : false, isset($business) ? $business->is_active : false, ['class' => 'form-check-input']) }}
            <label class="form-check-label" for="is_active">Is Active</label>
          </div>

          <div class="form-check">
            {{ Form::checkbox('is_valid', isset($bussiness) ? $business->is_active : false, isset($business) ? $business->is_active : false, ['class' => 'form-check-input']) }}
            <label class="form-check-label" for="is_valid">Is Valid</label>
          </div>

          <div class="col-md-12 mt-1">
            <button type="submit" class="btn btn-success float-right">
              {{ isset($business) ? 'Update' : 'Create' }}
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>

@endsection
