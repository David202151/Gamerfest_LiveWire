@extends('adminlte::page')
@section('title', 'Reporte')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="container-fluid">
   <div class="row">
      <div class="col mt-4 mb-4">
         <h2 class="text-center"><b>Listado de jugadores en juegos grupales</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
      </div>
      <div class="col">
      <a href="{{ route('descargarPDF-JugG')}}" target="_blank" class="btn btn-danger" style="float: right;">
            <span>Exportar .PDF</span>
            <i class="ion-ios-upload-outline p-1"></i>
         </a>
         <a href="{{ route('descargarXML-JugG')}}" target="_blank" class="btn btn-success" style="float: right;">
            <span>Exportar .CVS</span>
            <i class="ion-ios-upload-outline p-1"></i>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h3>Lista por Videojuego</h3>
         
      </div>
   </div>
   <div class="row">
      @if($list)
      <table class="table table-bordered">
         <thead>
            <tr class="light bg-dark">
               <th scope="col">Jugador</th>
               <th scope="col">Videojuego</th>
               <th scope="col">Equipo</th>
               <th scope="col">Observación</th>
            </tr>
         </thead>
         <tbody>
            @for($i = 0 ; $i<count($list) ; $i++) <tr>
               <td class="text-center">{{ $list[$i]['jugador']}}</td>
               <td class="text-center">{{ $list[$i]['videojuego']}}</td>
               <td class="text-center">{{ $list[$i]['equipo']}}</td>
               <td class="text-center">{{ $list[$i]['observacion']}}</td>
               </tr>
               @endfor
         </tbody>
      </table>
      @endif
   </div>

   @endsection

   @section('css')

   @stop

   @section('js')

   @endsection