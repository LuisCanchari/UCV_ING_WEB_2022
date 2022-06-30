<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">

	<ul class="nav nav-tabs">
		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico();">Gastos por mes</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico2();">Gastos por categoria</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" onclick="mostrarGrafico3();">Ingresos</button>
		</li>
	</ul>
	<div class="row justify-content-center ">
		<canvas id="grafico" width="100%" height="100%" style="height:400px"></canvas>
	</div>
</div>
<?php $this->view('includes/footer') ?>

<script>
	function mostrarGrafico() {
		const ctx = document.getElementById('grafico').getContext('2d');
		Chart.defaults.font.size = 14;

		$.ajax({
			url: '<?= ROOT ?>/estadisticas/gasto_mensual_JSON/1/2022',
			type: 'GET',
			context: document.body
		}).done(function(resp) {
			let etiquetas = [];
			let valores = [];

			for (let i = 0; i < resp.data.length; i++) {
				console.log(resp.data[i].mes);
				etiquetas.push(resp.data[i].mes);
				valores.push(resp.data[i].total);
			}

			const grafico2 = new Chart(ctx, {
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
</script>