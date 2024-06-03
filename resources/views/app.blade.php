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
   <div class="register">
      <div class="row">
         <div class="col-md-3 register-left">
            <img src="https://www.javeriana.edu.co/recursosdb/20129/601896/escudoPUJ-Bogota_rgb-azul_lateral.png/3eec1aa5-947a-1655-7fe7-6c4dfb397793?t=1611842495478" width="400" alt="" />
            <h3>¡Hola, qué gusto tenerte aquí!</h3>
            <p>Crea tu cuenta en cuestión de segundos</p>
            <a href="" class="text-white">
               Ya tengo una cuenta. Ingresar
            </a>
         </div>
         <div class="col-md-9 register-right">
            <form action="{{ route('create-account') }}" method="POST">
               @csrf
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <h3 class="register-heading">Crear mi cuenta como aspirante</h3>
                     <div class="row register-form">
                        <div class="col-md-6">
                           <div class="form-group my-1">
                              <label for="name">Nombre completo*</label>
                              <input type="text" id="name" name="name" class="form-control" placeholder="Nombre completo*" value="{{ old('name') }}" />
                           </div>

                           <div class="form-group my-1">
                              <label for="email">Correo electrónico*</label>
                              <input type="email" id="email" name="email" class="form-control" placeholder="nombre@correo.com" value="{{ old('email') }}" />
                           </div>

                           <div class="form-group my-1">
                              <label for="password">Contraseña*</label>
                              <input type="password" id="password" name="password" class="form-control" placeholder="****" value="{{ old('password') }}" />
                           </div>

                           <div class="form-group my-1">
                              <label for="document_type">Tipo de documento</label>
                              <select name="document_type" id="document_type" class="form-select">
                                 <option value="CC" selected>Cédula de ciudadanía</option>
                                 <option value="CE">Cédula de extranjería</option>
                                 <option value="TI">Tarjeta de identidad</option>
                              </select>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group my-1">
                              <label for="document_number">Número de documento*</label>
                              <input required type="document_number" id="document_number" name="document_number" class="form-control" value="{{ old('document_number') }}" />
                           </div>

                           <div class="form-group my-1">
                              <label for="phone">Número de contacto*</label>
                              <input required type="phone" id="phone" name="phone" placeholder="+573210000000" class="form-control" value="{{ old('phone') }}" />
                           </div>

                           <div class="form-group my-1">
                              <label for="birthdate">Fecha de nacimiento*</label>
                              <input required type="date" id="birthdate" name="birthdate" placeholder="+573210000000" class="form-control" />
                           </div>

                           <div class="form-group my-1">
                              <label for="gender">Tipo de documento</label>
                              <select name="gender" id="gender" class="form-select">
                                 <option value="Male" selected>Hombre</option>
                                 <option value="Female">Mujer</option>
                                 <option value="Other">Otro</option>
                              </select>
                           </div>
                           <input type="submit" class="btnRegister" value="Crear mi cuenta" />
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>

   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
