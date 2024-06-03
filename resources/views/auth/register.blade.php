@extends('app')
@section('content')
<div class="register">
   <div class="row">
      <div class="col-md-3 register-left">
         <img src="https://www.javeriana.edu.co/recursosdb/20129/601896/escudoPUJ-Bogota_rgb-azul_lateral.png/3eec1aa5-947a-1655-7fe7-6c4dfb397793?t=1611842495478" width="400" alt="" />
         <h3>¡Hola, qué gusto tenerte aquí!</h3>
         <p>Crea tu cuenta en cuestión de segundos</p>
         <a href="{{ route('user.login') }}" class="text-white">
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
                           <label for="college_degree">Carrera que cursaste</label>
                           <select name="college_degree" id="college_degree" class="form-select">
                              <option value="Ingeniería informática" selected>Ingeniería informática</option>
                              <option value="Ingeniería de sistemas">Ingeniería de sistemas</option>
                              <option value="Ingeniería de software">Ingeniería de software</option>
                              <option value="Administración de empresas">Administración de empresas</option>
                              <option value="Medicina">Medicina</option>
                              <option value="Derecho">Derecho</option>
                              <option value="Veterinaria">Veterinaria</option>
                           </select>
                        </div>

                        <div class="form-group my-1">
                           <label for="gender">Género</label>
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
@stop
