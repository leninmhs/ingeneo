<?php
use yii\bootstrap5\Html;
use dosamigos\chartjs\ChartJs;
use \yii\web\JsExpression;
?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-12 col-sm-12 col-md-12 col-xl-12">
		<div class="row">
			<div class="col-xs-12 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                               <div class="row mb-12">
								  <div class="col-12 col-sm-auto flex-sm-grow-1 py-3">
									<h4 class="card-heading">Casos</h4> 
									<div class="h1 text-primary"><?= $cant_casos ?></div>
								  </div>
						       </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                          <div class="col-8">
                            <p class="mb-0">
								<?php
								 /*$porcentaje_cifra= @app\controllers\SiteController::variacion($cifras_ventas_actual, $cifras_ventas_anterior);
								   if ($porcentaje_cifra != '*') {
									   echo $porcentaje_cifra > 0   ? '<span class="align-items-center h5 fw-normal text-blue bi bi-arrow-up-circle"> '.$porcentaje_cifra.'</span>' : '<span class="align-items-center text-red bi bi-arrow-down-circle"> '.$porcentaje_cifra.'</span>' ;
								   }else {echo $porcentaje_cifra;}*/
								?>
								</p>
                          </div>
                          <div class="col-4 footer-icono"><i class="bi bi-bag-check svg-icon text-blue"></i></div>
                        </div>
                      </div>
                    </div>
								  
			</div>
			
			<div class="col-xs-12 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="row mb-12">
								  <div class="col-12 col-sm-auto flex-sm-grow-1 py-3">
									<h4 class="card-heading">Clientes</h4> 
									<div class="h1 text-primary"><?= $cant_clientes ?></div>
								  </div>
						       </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                          <div class="col-8"></div>
                          <div class="col-4 footer-icono"><i class="bi bi-cart-check svg-icon text-blue"></i></div>
                        </div>
                      </div>
                    </div>			
			
			</div>
			
			
			<div class="col-xs-12 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
 <div class="card h-100">
                      <div class="card-body">
                           <div class="row mb-12">
								  <div class="col-12 col-sm-auto flex-sm-grow-1 py-3">
									<h4 class="card-heading">Asesores</h4> 
									<div class="h1 text-primary"><?= $cant_asesores ?></div>
								  </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                          <div class="col-8"></div>
                         <div class="col-4 footer-icono"><i class="bi bi-person-check svg-icon text-blue"></i></div>
                        </div>
                      </div>
                    </div>			
			</div>
		</div>
    </div>
    
  </div>
</div>


<br><br><br>    
<div class="container">  
  <div class="row">
    <div class="col-12 col-xs-12 col-sm-12 col-xl-12">
		 <div class="card">
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <h4 class="fw-normal">Casos creados en los últimos 7 días</h4><hr/>
					<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
					<canvas id="myChart" width="300" height="85"></canvas>
					<script>
					const ctx = document.getElementById('myChart');
					const myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: [<?= $categorias ?>],
							datasets: [{
								label: 'Casos',
								data: [<?= $series_cant ?>],
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
								borderWidth: 1
							}]
						},

						options: {
							responsive: true,
							scales: {
								y: {
									beginAtZero: true,
									ticks: { precision: 0 }
								}
							}
						}
					});
					</script>					
                  </div>
                </div>

    </div>
 
	
                </div>
    </div>
  </div>
</div>
