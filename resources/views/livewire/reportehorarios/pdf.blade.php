<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>PDF</title>
</head>

<body style="background-color: white;">
    <div class="container">
        <div style="display: flex;">
            <span class="d-block text-center mt-4 mb-4" style="font-size: 26px;"><b>Reporte de Horarios por Día</b></span>
            <span class="d-block float-right mt-2 mb-2"><b>Fecha Emisión: </b>{{date('Y-m-d')}}</span>
            <span class="d-block mt-4 mb-2" style="font-size: 22px;"><b>Fecha de Busqueda</b> - <small>{{$fecha}}</small></span>
        </div>

        <div>
            @if($lista)
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col" class="text-center">Videojuego</th>
                        <th scope="col" class="text-center">Aula</th>
                        <th scope="col" class="text-center">Observacion</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0 ; $i<count($lista) ; $i++) <tr>
                        <td class="text-center">{{ $lista[$i]['id_videojuego'] }}</td>
                        <td class="text-center">{{ $lista[$i]['id_aula'] }}</td>
                        <td class="text-center">{{ $lista[$i]['observacion'] }}</td>
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