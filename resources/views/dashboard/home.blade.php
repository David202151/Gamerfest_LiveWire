@extends('adminlte::page')
@section('title', __('Dashboard'))
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="container-fluid">

	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
			</div>
			<div class="card-body">
				<h5>Hi <strong>{{ Auth::user()->name }},</strong></h5>
				<hr>

				<div class="row w-100">
					<div class="col-md-3">
						<div class="card border-info mx-sm-1 p-3">
							<div class="card border-info text-info p-3"><span class="text-center fa fa-plane-departure" aria-hidden="true"></span></div>
							<div class="text-info text-center mt-3">
								<h4>Videjuegos</h4>
							</div>
							<div class="text-info text-center mt-2">
								<h1>{{ $contar['total_videojuegos'] }}</h1>
								
							</div>

						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success mx-sm-1 p-3">
							<div class="card border-success text-success p-3 my-card"><span class="text-center fa fa-luggage-cart" aria-hidden="true"></span></div>
							<div class="text-success text-center mt-3">
								<h4>Jugadores</h4>
							</div>
							<div class="text-success text-center mt-2">
								<h1>{{ $contar['total_jugadores'] }}</h1>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-danger mx-sm-1 p-3">
							<div class="card border-danger text-danger p-3 my-card"><span class="text-center fa fa-person-booth" aria-hidden="true"></span></div>
							<div class="text-danger text-center mt-3">
								<h4>Aulas Disponibles</h4>
							</div>
							<div class="text-danger text-center mt-2">
								<h1>{{ $contar['total_aulas'] }}</h1>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-warning mx-sm-1 p-3">
							<div class="card border-warning text-warning p-3 my-card"><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="text-warning text-center mt-3">
								<h4>Eventos</h4>
							</div>
							<div class="text-warning text-center mt-2">
								<h1>{{ $contar['total_eventos'] }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header border-0">
						<div class="d-flex justify-content-between">
							<h3 class="card-title">Juegos con mas inscripcciones individuales</h3>
						</div>
					</div>
					<div class="card-body">
						<div class="position-relative mb-4">
							<canvas id="categoryChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header border-0">
						<h3 class="card-title">Top Juego Indivual</h3>

					</div>
					<div class="card-body d-flex">
						<div class="col-9">
							<h2>{{ $top_ind['nombre'] }}</h2>
							<hr>
							<div class="row">
								<div class="col">
									<p><b>Numero de Inscritos: {{ $top_ind['num_ind'] }}</b></p>
								</div>
								<div class="col">
									<p><b>Ingresos Generados:</b></p>
									<p class="text-success"><b> <i class="ion ion-ios-paper text-success"></i></b></p>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="card border-success mx-sm-1 p-3">
					<div class="text-success text-center mt-3">
						<h4>Total inscritos en juegos individuales</h4>
					</div>
					<div class="text-success text-center mt-2">
						<h1>{{ $contar['total_inscripcionIndi'] }}</h1>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header border-0">
						<h3 class="card-title">Eventos a realizar</h3>

					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead class="thead">
								<tr>
									<th>Nombre</th>
									<th>Fecha</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($eventos as $row)
								<tr>
									<td>{{ $row->nombre}}</td>
									<td>{{ $row->fecha}}</td>

									@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="card border-success mx-sm-1 p-3">
					<div class="text-success text-center mt-3">
						<h4>Total inscritos en juegos grupales</h4>
					</div>
					<div class="text-success text-center mt-2">
						<h1>{{ $contar['total_inscripcionGru'] }}</h1>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header border-0">
						<div class="d-flex justify-content-between">
							<h3 class="card-title">Juegos con mas inscripcciones grupales</h3>
						</div>
					</div>
					<div class="card-body">
						<div class="position-relative mb-4">
							<canvas id="grupoChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

</div>
@endsection

@section('js')
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
<script>
	// ---------------------- Géneros disponibles en el Inventario --------------------------
	const category = JSON.parse(`<?php echo $data; ?>`);
	const categoryChartCanvas = document.getElementById('categoryChart').getContext('2d');
	const categoryChart = new Chart(categoryChartCanvas, {
		type: 'bar',
		data: {
			labels: category.label,
			datasets: [{
				data: category.data,
				backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 248, 154, 1)',
					'rgba(255, 203, 203, 1)',
					'rgba(243, 120, 120, 1)',
					'rgba(115, 169, 173, 1)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 248, 154, 1)',
					'rgba(255, 203, 203, 1)',
					'rgba(243, 120, 120, 1)',
					'rgba(115, 169, 173, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio: false,
			scales: {
				xAxes: [{
					ticks: {
						fontColor: '#000000'
					},
					gridLines: {
						display: false,
						color: '#000000',
						drawBorder: false
					}
				}],
				yAxes: [{
					ticks: {
						stepSize: 1.15,
						fontColor: '#000000'
					},
					gridLines: {
						display: true,
						color: '#000000',
						drawBorder: false
					}
				}]
			},
			legend: {
				display: false
			},
		}
	});
	/////////////////////////////
	const grupo = JSON.parse(`<?php echo $data; ?>`);
	const grupoChartCanvas = document.getElementById('grupoChart').getContext('2d');
	const grupoChart = new Chart(grupoChartCanvas, {
		type: 'bar',
		data: {
			labels: grupo.labelg,
			datasets: [{
				data: grupo.datag,
				backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 248, 154, 1)',
					'rgba(255, 203, 203, 1)',
					'rgba(243, 120, 120, 1)',
					'rgba(115, 169, 173, 1)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 248, 154, 1)',
					'rgba(255, 203, 203, 1)',
					'rgba(243, 120, 120, 1)',
					'rgba(115, 169, 173, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio: false,
			scales: {
				xAxes: [{
					ticks: {
						fontColor: '#000000'
					},
					gridLines: {
						display: false,
						color: '#000000',
						drawBorder: false
					}
				}],
				yAxes: [{
					ticks: {
						stepSize: 1.15,
						fontColor: '#000000'
					},
					gridLines: {
						display: true,
						color: '#000000',
						drawBorder: false
					}
				}]
			},
			legend: {
				display: false
			},
		}
	});
	

</script>
@stop