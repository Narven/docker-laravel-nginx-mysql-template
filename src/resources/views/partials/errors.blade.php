@if (Session::has('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
  </div>
@elseif (Session::has('warning'))
  <div class="alert alert-warning">
    {{ Session::get('warning') }}
  </div>
@elseif (Session::has('error'))
  <div class="alert alert-error">
    {{ Session::get('error') }}
  </div>
@endif
