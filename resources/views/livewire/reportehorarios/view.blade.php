@section('title', __('Horarios'))
<div class="container-fluid p-5">
   <div class="row">
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h2 class="text-center"><b>Actividades del día</b></h2>
      </div>
   </div>
   
   <div class="row">
      <div class="col">
         <input type="date" wire:model="fecha" name="fecha" class="form-control">
      </div>
      <div class="col">
         <button wire:click.prevent="getHorarios('{{$fecha}}')" class="btn btn-danger">Generar</button>
      </div>
      <div class="col">
         <a href="{{ route('descargarPDF-Hor',['fecha' => $fecha])}}" target="_blank" class="btn btn-danger" style="float: right;">
            <span>Exportar .PDF</span>
            <i class="ion-ios-upload-outline p-1"></i>
         </a>
         <a href="{{ route('descargarXML-Hor')}}" target="_blank" class="btn btn-success" style="float: right;">
            <span>Exportar .CVS</span>
            <i class="ion-ios-upload-outline p-1"></i>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h3>Horarios</h3>
      </div>
   </div>
   <div class="row">
      @if($listado)
      <table class="table table-bordered">
         <thead>
            <tr class="bg-danger">
            
               <th scope="col" class="text-center">Videojuego</th>
               <th scope="col" class="text-center">Aula</th>
               <th scope="col" class="text-center">Observacion</th>
            </tr>
         </thead>
         <tbody>
            @for($i = 0 ; $i<count($listado) ; $i++) 
               <tr>
                  <td class="text-center">{{ $listado[$i]['id_videojuego'] }}</td>
                  <td class="text-center">{{ $listado[$i]['id_aula'] }}</td>
                  <td class="text-center">{{ $listado[$i]['observacion'] }}</td>
               </tr>
               @endfor
         </tbody>
      </table>
      @endif
   </div>

</div>