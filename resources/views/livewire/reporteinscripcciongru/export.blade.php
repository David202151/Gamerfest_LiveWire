<table >
         <thead>
            <tr >
               <th >Nº</th>
               <th >Jugadores</th>
               <th >Videojuego</th>
               <th >Equipo</th>
               <th >Observación</th>
            </tr>
            </thead>
            <tbody>
               @foreach ($inscripciongru as $row)
               <tr>
                  <td>{{ $loop->iteration }}</td> 
                  <td >{{ $row-> videojuego->nombre}}</td>
                  <td >{{ $row-> jugadore->nombre}}</td>
                  <td >{{ $row-> equipo->nombre}}</td>
                  <td >{{ $row-> observaciones}}</td>
                  </tr>
               @endforeach
            </tbody>
</table>