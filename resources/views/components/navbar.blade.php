<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">FS-24 Events</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Events</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link bg-danger text-light" href="/logout">Logout</a>
          </li>
          @endauth
         @unless (Auth::check())
         <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
         @endunless
         
        </ul>
      </div>
    </div>
  </nav>