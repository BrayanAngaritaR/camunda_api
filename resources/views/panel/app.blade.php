<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Proceso de admisión PUJ - AE</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="{{ asset('custom.css') }}" rel="stylesheet">
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
   <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
   <img src="https://www.javeriana.edu.co/recursosdb/20129/601896/escudoPUJ-Bogota_rgb-azul_lateral.png/3eec1aa5-947a-1655-7fe7-6c4dfb397793?t=1611842495478" width="90" alt="" />
  </a>
  {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link text-danger" href="#">Cerrar sesión</a>
    </li>
  </ul>
</nav>
   <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item mt-5">
                <a class="nav-link active" href="{{ route('user.panel.index') }}">
                  <span data-feather="home"></span>
                  Mi proceso</span>
                </a>
              </li>

              <li class="nav-item">
               <a class="nav-link active" href="{{ route('user.panel.documents') }}">
                 <span data-feather="home"></span>
                 Mis documentos</span>
               </a>
             </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.dashboard.index') }}">
                  <span data-feather="file"></span>
                  Estadísticas
                </a>
              </li>
            </ul>
          </div>
        </nav>
    
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2 mt-5">Hola, {{ Auth::user()->name }}</h4>
            <p>{{ Auth::user()->email }}</p>
          </div>

          @yield('content') 
        </main>
      </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   @include('base._alert')
   @yield('scripts')
</body>
</html>
