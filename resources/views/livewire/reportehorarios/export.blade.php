<table>
   <thead>
      <tr>
         <th>Nº</th>
         <th>Videojuego</th>
         <th>Aula</th>
         <th>Tiempo Inicio</th>
         <th>Tiempo Fin</th>
         <th>Fecha</th>
         <th>Observación</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($horario as $row)
      <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $row-> videojuego->nombre}}</td>
         <td>{{ $row-> aula->nombre}}</td>
         <td>{{ $row->tiempo_inicio }}</td>
         <td>{{ $row->tiempo_fin }}</td>
         <td>{{ $row->fecha }}</td>
         <td>{{ $row-> observaciones}}</td>
      </tr>
      @endforeach
   </tbody>
</table>