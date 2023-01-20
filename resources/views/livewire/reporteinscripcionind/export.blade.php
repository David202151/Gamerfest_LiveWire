<table >
         <thead>
            <tr >
               <th >Nº</th>
               <th >Jugador</th>
               <th >Videojuego</th>
               <th >Observación</th>
            </tr>
            </thead>
            <tbody>
               @foreach ($inscripcionind as $row)
               <tr>
                  <td>{{ $loop->iteration }}</td> 
                  <td >{{ $row-> videojuego->nombre}}</td>
                  <td >{{ $row-> jugadore->nombre}}</td>
                  <td >{{ $row-> observaciones}}</td>
                  </tr>
               @endforeach
            </tbody>
</table>