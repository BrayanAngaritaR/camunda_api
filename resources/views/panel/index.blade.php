@extends('panel.app')
@section('content')
<div class="row">

   @if(Auth::user()->documentation_completed === 0)
   <div class="text-center">
      <div class="alert alert-danger">
         Debes subir toda la documentación solicitada. Haz clic <a class="underline text-danger" href="{{ route('user.panel.documents') }}">
            aquí
         </a>
      </div>
   </div>
   @endif

   <div class="col-sm-12 col-lg-6 my-auto">
      <div class="card">
         <h3 class="m-3">Información personal</h3>
         <ul class="mt-3">
            <li><b>Nombre completo:</b> {{ Auth::user()->name }}</li>
            <li><b>Correo electrónico:</b> {{ Auth::user()->email }}</li>
            <li><b>Número de identificación:</b> {{ Auth::user()->document_type }} - {{ Auth::user()->document_number }}</li>
            <li><b>Número de contacto:</b> {{ Auth::user()->phone }}</li>
            <li><b>Fecha de nacimiento:</b> {{ Auth::user()->birthdate }}</li>
            <li><b>Género:</b> {{ __(Auth::user()->gender) }}</li>
         </ul>
       </div>
   </div>
   <div class="col-sm-12 col-lg-6  my-auto">
      <div class="card my-3">
         <h3 class="m-3">Información del proceso</h3>
         <ul class="mt-3">
            <li><b>Pregrado:</b> {{ Auth::user()->college_degree }}</li>
            <li><b>¿Puedo aplicar a la especialización?:</b> {{ __(Auth::user()->can_apply) }}</li>
            <li><b>Estado de mi solicitud:</b> {{ Auth::user()->application_feedback }}</li>
            <li><b>Fecha del examen de admisión:</b> {{ Auth::user()->quiz_date }}</li>
            <li><b>Fecha de la entrevista:</b> {{ Auth::user()->interview_date }}</li>
            <li><b>Documentación solicitada:</b> {{ Auth::user()->documentation_needed }}</li>
            <li><b>¿Mi documentación está completa?:</b> {{ Auth::user()->documentation_completed }}</li>
            <li><b>Estado de mi pago:</b> {{ Auth::user()->payment_status }}</li>
            <li><b>Resultado de mi examen:</b> {{ Auth::user()->test_score }}</li>
            <li><b>¿He pasado la entrevista?:</b> {{ __(Auth::user()->interview_passed) }}</li>
            <li><b>¿He reservado mi cupo?:</b> {{ __(Auth::user()->accept_quota) }}</li>
         </ul>
       </div>
   </div>
 </div> 
 @stop