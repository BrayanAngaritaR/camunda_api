@extends('panel.app')
@section('content')
<div class="row">
   <div class="col-sm-12 col-lg-6 my-auto">
      <div class="card">
         <h3 class="m-3">Información personal</h3>
         <ul class="mt-3">
            <li>Nombre completo: {{ Auth::user()->name }}</li>
            <li>Correo electrónico: {{ Auth::user()->email }}</li>
            <li>Tipo de documento: {{ Auth::user()->document_type }}</li>
            <li>Número de documento: {{ Auth::user()->document_number }}</li>
            <li>Número de contacto: {{ Auth::user()->phone }}</li>
            <li>Fecha de nacimiento: {{ Auth::user()->birthdate }}</li>
            <li>Género: {{ Auth::user()->gender }}</li>
         </ul>
       </div>
   </div>
   <div class="col-sm-12 col-lg-6  my-auto">
      <div class="card my-3">
         <h3 class="m-3">Información del proceso</h3>
         <ul class="mt-3">
            <li>Pregrado: {{ Auth::user()->college_degree }}</li>
            <li>¿Puedo aplicar a la especialización?: {{ Auth::user()->can_apply }}</li>
            <li>Tipo de documento: {{ Auth::user()->document_type }}</li>
            <li>Estado de mi solicitud: {{ Auth::user()->application_feedback }}</li>
            <li>Fecha del examen de admisión: {{ Auth::user()->quiz_date }}</li>
            <li>Fecha de la entrevista: {{ Auth::user()->interview_date }}</li>
            <li>Documentación solicitada: {{ Auth::user()->documentation_needed }}</li>
            <li>¿Mi documentación está completa?: {{ Auth::user()->documentation_completed }}</li>
            <li>Estado de mi pago: {{ Auth::user()->payment_status }}</li>
            <li>Resultado de mi examen: {{ Auth::user()->test_score }}</li>
            <li>¿He pasado la entrevista?: {{ Auth::user()->interview_passed }}</li>
            <li>¿He reservado mi cupo?: {{ Auth::user()->accept_quota }}</li>
         </ul>
       </div>
   </div>
 </div> 
 @stop