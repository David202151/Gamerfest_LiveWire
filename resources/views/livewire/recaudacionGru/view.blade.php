@section('title', __('Recaudacion'))
<div class="container-fluid p-5">
   <div class="row">
      <div class="col mt-4 mb-4">
         <h2 class="text-center"><b>Reporte de Juegos Grupales</b></h2>
      </div>
   </div>
   <div class="row">
      <div class="col">
         
      </div>
      <div class="col">
         <a href="{{ route('descargarPDF-RecG')}}" target="_blank" class="btn btn-danger" style="float: right;">
            <span>Exportar .PDF</span>
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
            <tr class="light bg-dark">
               <th scope="col" class="text-center">Videojuego</th>
               <th scope="col" class="text-center">Cantidad de inscritos</th>
               <th scope="col" class="text-center">Recaudacion</th>
            </tr>
         </thead>
         <tbody>
            @for($i = 0 ; $i<sizeof($list) ; $i++) <tr>
               <td class="text-center">{{ $list[$i]['nombre'] }}</td>
               <td class="text-center">{{ $list[$i]['cantidad'] }}</td>
               <td class="text-center">{{ $list[$i]['precio'] }}</td>
               </tr>
               @endfor

               <tr>
                  <td class=" light bg-dark text-center"><b>Total</b> </td>
                  <td class = "text-center"><span class="ml-3"><b></b></span></td>
                  <td class = "text-center"><span class="ml-3"><b>{{$total}}$</b></span></td></td>
               </tr>
         </tbody>
      </table>
   </div>

</div>