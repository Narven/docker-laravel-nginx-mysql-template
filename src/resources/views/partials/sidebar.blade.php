<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('home') }}">
          <span data-feather="home"></span>
          Home <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('businesses.index') }}">
          <span data-feather="file"></span>
          Businesses
        </a>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('artists.index') }}">
        <span data-feather="file"></span>
        Artists
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('events.index') }}">
        <span data-feather="file"></span>
        Events
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('users.index') }}">
        <span data-feather="file"></span>
        Users
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admins.index') }}">
        <span data-feather="file"></span>
        Admins
      </a>
    </li>




    </ul>

  </div>
</nav>
