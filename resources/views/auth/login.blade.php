@extends('app')
@section('content')
<div class="register">
   <div class="row">
      <div class="col-md-3 register-left">
         <img src="https://www.javeriana.edu.co/recursosdb/20129/601896/escudoPUJ-Bogota_rgb-azul_lateral.png/3eec1aa5-947a-1655-7fe7-6c4dfb397793?t=1611842495478" width="400" alt="" />
         <h3>¡Hola, qué gusto tenerte aquí!</h3>
         <p>Crea tu cuenta en cuestión de segundos</p>
         <a href="{{ route('user.home') }}" class="text-white">
            No tengo una cuenta. Regresar
         </a>
      </div>
      <div class="col-md-9 register-right">
         <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <h3 class="register-heading">Ingresar como aspirante</h3>
                  <div class="row register-form">
                     <div class="col-md-12">
                        <div class="form-group my-1">
                           <label for="email">Correo electrónico*</label>
                           <input type="email" id="email" name="email" class="form-control" placeholder="nombre@correo.com" value="{{ old('email') }}" />
                        </div>

                        <div class="form-group my-1">
                           <label for="password">Contraseña*</label>
                           <input type="password" id="password" name="password" class="form-control" placeholder="****" value="{{ old('password') }}" />
                        </div>

                        <input type="submit" class="btnRegister" value="Ingresar" />
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@stop
