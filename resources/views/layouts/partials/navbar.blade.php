<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Perfil</a></li> 
        @if(auth()->user()->username==='root')
            <li><a href="/users" class="nav-link px-2 text-white">Administrar</a></li> 
        @endif     
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>
        
      @auth
        {{auth()->user()->name}}
        <div class="text-end px-2">
        
          <a href="/logout" class="btn btn-outline-light me-2">Logout</a>

        </div>
      @endauth
      
      @guest
        <div class="text-end">
          <a href="/login" class="btn btn-outline-light me-2">Login</a>
          <a href="/register" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>