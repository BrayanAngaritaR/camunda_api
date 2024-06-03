@extends('panel.app')
@section('content')
<div class="row">
   <a href="{{ route('user.panel.documents.create') }}" class="mt-3 mb-5 btn btn-outline-dark">
      Subir documento
   </a>

   <div class="col-sm-12 my-auto">
      <div class="card">
         <h3 class="m-3">Información personal</h3>
         <ul class="mt-3">
            <li>Documento de identidad: <a href="{{ $dni }}" target="_blank">Ver documento</a></li>
            <li>Diploma de grado: <a href="{{ $diploma }}" target="_blank">{{ $diploma ? "Ver documento" : "No disponible" }}</a></li>
            <li>Acta de grado: <a href="{{ $acta_grado }}" target="_blank">{{ $acta_grado ? "Ver documento" : "No disponible" }}</a></li>
         </ul>
       </div>
   </div>
 </div> 
 @stop