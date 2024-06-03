@extends('panel.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-12 my-3">
         <iframe src="https://ont-1.optimize.camunda.io/2c7cf0eb-7e1a-46d2-8d57-ee1675a4b78d/external/#/share/dashboard/d6100751-2ff3-486c-8c01-1542cc287f50?mode=embed&filter=%5B%5D" frameborder="0" style="width: 100%; height: 700px; allowtransparency; overflow: scroll"></iframe>
      </div>

      <div class="col-md-6">
         <div class="card">
            <div class="card-header">Aspirantes registrados</div>
            <div class="card-body">
               <h1>{{ $usersByMonth->options['chart_title'] }}</h1>
               {!! $usersByMonth->renderHtml() !!}
            </div>
         </div>
      </div>

      <div class="col-md-6">
         <div class="card">
            <div class="card-header">Aspirantes con pago pendiente</div>
            <div class="card-body">
               <h1>{{ $pendingPayments }} / {{ $totalUsers }}</h1>
            </div>
         </div>

         <div class="card mt-2">
            <div class="card-header">Aspirantes aprobados</div>
            <div class="card-body">
               <h1>{{ $allowedUsers }} / {{ $totalUsers }}</h1>
            </div>
         </div>

         <div class="card mt-2">
            <div class="card-header">Aspirantes no admitidos</div>
            <div class="card-body">
               <h1>{{ $rejectedUsers }} / {{ $totalUsers }}</h1>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
{!! $usersByMonth->renderChartJsLibrary() !!}
{!! $usersByMonth->renderJs() !!}
@endsection
