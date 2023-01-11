<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>PDF</title>
</head>

<body style="background-color: white;">
   <div class="container">
      <div style="display: flex;">

         <span class="d-block text-center mt-4 mb-4" style="font-size: 26px;"><b>Reporte Jugadores por Videojuego Grupal</b></span>
         <span class="d-block float-right mt-2 mb-2"><b>Fecha Emisión: </b>{{date('Y-m-d')}}</span>
      </div>
      <br><br>
      <div class="row">
         @if($list)
         <table class="table table-bordered">
            <thead>
               <tr>
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

   </div>
   <footer style="position: fixed; bottom: 0;">
      <span class="text-center m-2">Gamer Fest 2022 ESPE-L</span>
   </footer>
</body>

</html>