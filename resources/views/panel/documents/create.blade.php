@extends('panel.app')
@section('content')
<div class="row">
   <a href="{{ route('user.panel.documents') }}" class="mt-3 mb-5 btn btn-outline-dark">
      Volver
   </a>

   <div class="col-sm-12 my-auto">
      <div class="card">
         <form action="{{ route('user.panel.documents.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="m-3">
               <label for="formFile" class="form-label">Tipo de archivo</label>
               <select name="fileType" id="fileType" class="form-select">
                  <option value="dni">Documento de identidad</option>
                  <option value="acta_grado">Acta de grado</option>
                  <option value="diploma">Diploma de grado</option>
               </select>
            </div>

            <div class="m-3">
               <label for="formFile" class="form-label"><b>Subir archivo</b></label>
               <input class="form-control" type="file" name="file" id="formFile">
            </div>

            <div class="m-3 text-end">
               <button type="submit" class="btn btn-dark">
                  Guardar
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
@stop
