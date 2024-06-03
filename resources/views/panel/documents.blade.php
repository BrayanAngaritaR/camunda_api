@extends('panel.app')
@section('content')
<div class="row">
   <div class="col-sm-12 my-auto">
      <div class="card">
         <h3 class="m-3">Información personal</h3>
         <ul class="mt-3">
            <li>Documento de identidad: {{ $documents->dni ? $documents->dni : "No se ha subido aún" }}</li>
            <li>Diploma de grado: {{ $documents->diploma ? $documents->diploma : "No se ha subido aún" }}</li>
            <li>Acta de grado: {{ $documents->acta_grado ? $documents->acta_grado : "No se ha subido aún" }}</li>
         </ul>
       </div>
   </div>
 </div> 
 @stop