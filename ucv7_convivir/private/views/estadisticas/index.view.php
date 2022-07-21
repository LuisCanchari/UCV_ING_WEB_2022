<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">

	<ul class="nav nav-tabs">
		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico();">Gastos por mes</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico2();">Gastos por documentos</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico3();">Numero de inmuebles por tipo</button>
		</li>

		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico4();">Numero de personas por genero</button>
		</li>

	</ul>
	<div class="row justify-content-center " id="graph-container">
		<canvas id="grafico" width="100%" height="100%" style="height:400px"></canvas>
	</div>
</div>
<?php $this->view('includes/footer') ?>

<script>
	function mostrarGrafico() {
		$('#grafico').remove(); 
		$('iframe.chartjs-hidden-iframe').remove(); 
		$('#graph-container').append('<canvas id="grafico" width="100%" height="100%" style="height:400px"><canvas>'); 

		const ctx = document.getElementById('grafico').getContext('2d');
		Chart.defaults.font.size = 14;
		

		$.ajax({
			url: '<?= ROOT ?>/estadisticas/gasto_mensual_JSON/<?=Auth::getCondominio_id()?>/2022',
			type: 'GET',
			context: document.body
		}).done(function(resp) {
			console.log(resp);
			let etiquetas = [];
			let valores = [];

			for (let i = 0; i < resp.data.length; i++) {
				console.log(resp.data[i].mes);
				etiquetas.push(resp.data[i].mes);
				valores.push(resp.data[i].total);
			}

			const grafico = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: etiquetas,
					datasets: [{
						label: 'gastos',
						data: valores,
						backgroundColor: [
							'rgba(54, 162, 235, 0.7)',
						],
						borderColor: [

							'rgba(54, 162, 235, 1)',
						],
						borderWidth: 2
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: false,
							position: 'top',
						},
						title: {
							display: true,
							text: 'GASTOS POR MES',
							color: 'rgba(255, 0, 0, 1)',
							font: {
								size: 24
							}
						}
					}
				}
			});
			

		});
	}

	function mostrarGrafico2() {
		$('#grafico').remove(); 
		$('iframe.chartjs-hidden-iframe').remove(); 
		$('#graph-container').append('<canvas id="grafico" width="100%" height="100%" style="height:400px"><canvas>');

		const ctx = document.getElementById('grafico').getContext('2d');
		Chart.defaults.font.size = 14;
		

		$.ajax({
			url: '<?= ROOT ?>/estadisticas/gasto_portipordocumento_JSON/<?=Auth::getCondominio_id()?>/2022',
			type: 'GET',
			context: document.body
		}).done(function(resp) {
			console.log(resp);
			let etiquetas = [];
			let valores = [];

			for (let i = 0; i < resp.data.length; i++) {
				console.log(resp.data[i].tipo);
				etiquetas.push(resp.data[i].tipo);
				valores.push(resp.data[i].total);
			}

			const grafico2 = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: etiquetas,
					datasets: [{
						label: 'gastos',
						data: valores,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
                			'rgba(54, 162, 235, 0.2)',
                			'rgba(255, 206, 86, 0.2)',
                			'rgba(75, 192, 192, 0.2)',
						],
						borderColor: [

							'rgba(255, 99, 132, 1)',
                			'rgba(54, 162, 235, 1)',
                			'rgba(255, 206, 86, 1)',
                			'rgba(75, 192, 192, 1)',
						],
						borderWidth: 2
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: false,
							position: 'top',
						},
						title: {
							display: true,
							text: 'GASTOS POR DOCUMENTOS',
							color: 'rgba(255, 0, 0, 1)',
							font: {
								size: 24
							}
						}
					}
				}
			});
			

		});
	}

	function mostrarGrafico3() {
		$('#grafico').remove(); 
		$('iframe.chartjs-hidden-iframe').remove(); 
		$('#graph-container').append('<canvas id="grafico" width="100%" height="100%" style="height:400px"><canvas>');

		const ctx = document.getElementById('grafico').getContext('2d');
		Chart.defaults.font.size = 14;
		

		$.ajax({
			url: '<?= ROOT ?>/estadisticas/numero_inmublesportipo_JSON/<?=Auth::getCondominio_id()?>',
			type: 'GET',
			context: document.body
		}).done(function(resp) {
			console.log(resp);
			let etiquetas = [];
			let valores = [];

			for (let i = 0; i < resp.data.length; i++) {
				etiquetas.push(resp.data[i].tipo);
				valores.push(resp.data[i].total);
			}

			const grafico3 = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: etiquetas,
					datasets: [{
						label: 'cantidad',
						data: valores,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
                			'rgba(54, 162, 235, 0.2)',
                			'rgba(255, 206, 86, 0.2)',
                			'rgba(75, 192, 192, 0.2)',
						],
						borderColor: [

							'rgba(255, 99, 132, 1)',
                			'rgba(54, 162, 235, 1)',
                			'rgba(255, 206, 86, 1)',
                			'rgba(75, 192, 192, 1)',
						],
						borderWidth: 2
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: false,
							position: 'top',
						},
						title: {
							display: true,
							text: 'VIVIENDAS POR TIPO',
							color: 'rgba(255, 0, 0, 1)',
							font: {
								size: 24
							}
						}
					}
				}
			});
			

		});
	}
</script>