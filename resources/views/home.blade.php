@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Bienvenido <h3 id="name_heading_welcome">{{ Auth::user()->name }}</h3></h3>
        </div>
        <main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Usuarios</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3b7ddd" class="bi bi-people" viewBox="0 0 16 16">
  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
</svg></div>
                                                        @php
                                                 use App\Models\User;
                                                $cant_user = User::count();
                                                @endphp
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$cant_user}}</h1>
												<div class="mb-0">
													<a class="text-muted" href="/usuarios">Ver mas</a>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Resguardos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3b7ddd" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                                        </svg>
														</div>
                                                        @php
                                                 use App\Models\Resguardo;
                                                $cant_resguardos = Resguardo::count();
                                                @endphp
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$cant_resguardos}}</h1>
												<div class="mb-0">

													<a class="text-muted" href="/resguardos">Ver mas</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Prestamos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3b7ddd" class="bi bi-check2-all" viewBox="0 0 16 16">
                                                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                                        </svg>
                                                        </div>
                                                        @php
                                                 use App\Models\Prestamo;
                                                $cant_prestamo = Prestamo::count();
                                                @endphp
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$cant_prestamo}}</h1>
												<div class="mb-0">
                                                <a class="text-muted" href="/prestamos">Ver mas</a>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Modelos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3b7ddd" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg></div>
                                                        @php
                                                 use App\Models\Modelo;
                                                $cant_modelos = Modelo::count();
                                                @endphp
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$cant_modelos}}</h1>
												<div class="mb-0">

                                                <a class="text-muted" href="/modelos">Ver mas</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0">Estado del almacen</h5>
								</div>
								<div class="card-body pt-2 pb-3">
                                <canvas id="myChart" ></canvas>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0">Historial de resguardos</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">


									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Historial de prestamos</h5>
								</div>
								<div class="card-body d-flex">

								</div>
							</div>
						</div>
					</div>


			</main>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>

    <script>
        var productos=[];
        var valores=[];

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productos,
                datasets: [{
                    label: 'Registro mensual',
                    data: valores,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>
@endsection
