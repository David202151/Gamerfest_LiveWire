@section('title', __('Recaudacion'))
<div class="container-fluid p-5">
   <div class="row">
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h2 class="text-center"><b>Reporte de Juegos Grupales</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <button wire:click.prevent="getRecaudacion" class="btn btn-danger">Generar</button>
      </div>
      <div class="col">
         <a href="{{ route('descargarPDF-RecG')}}" target="_blank" class="btn btn-success" style="float: right;">
            <span>Exportar</span>
            <i class="ion-ios-upload-outline p-1"></i>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col mt-4 mb-4">
         <h3>Reporte</h3>
      </div>
   </div>
   <div class="row">
      <table class="table table-bordered">
         <thead>
            <tr class="bg-danger">
               <th scope="col" class="text-center">Videojuego</th>
               <th scope="col" class="text-center">Cantidad</th>
            </tr>
         </thead>
         <tbody>
            @for($i = 0 ; $i<sizeof($list) ; $i++) 
            
               <tr>
                  <td class="text-center">{{ $list[$i]['nombre'] }}</td>
                  <td class="text-center">{{ $list[$i]['cantidad'] }}</td>
               </tr>
               @endfor
         </tbody>
      </table>
   </div>

</div>