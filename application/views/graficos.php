<?php 
$num = count($municipios);
$i=0;
foreach($municipios as $municipio){

	$var .= $municipio.",";

	if($num==$i){
		$var .= $municipio;
	}
	$i++;
}
$var;
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Municipios', 'Productores'],
          <?php echo $var; ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
</script>
<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>index.php/administrador" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="<?php echo base_url(); ?>index.php/administrador">
						<span>Panel</span>
					</a>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Registros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php base_url();?>index.php/administrador/crear_usuario">Usuarios</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/administrador/categorias">Categorías</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/administrador/rubro">Rubros</a>
						</li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Recursos</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Gu&iacute;as</a>
								</li>
								<li>
									<a href="#">Probabilidad de &Eacute;xito</a>
								</li>
							</ul>
						</li>
                    </ul>
                </li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Proyecci&oacute;n y An&aacute;lisis</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Proyecciones</a>
						</li>
						<li>
							<a href="#">Estad&iacute;sticas</a>
						</li>
                    </ul>
                </li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Base de Datos</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Exportar</a>
						</li>
						<li>
							<a href="#">Importar</a>
						</li>
                    </ul>
                </li>
               <li>
					<a href="#">
						<span>Auditoria</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Ayuda</span>
					</a>
				</li>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">Administrador <img src="<?php echo base_url(); ?>img/back-end/user-avatar.jpg" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="#">Editar Perfil</a>
						</li>
						<li>
							<a href="#">Configuración de la Cuenta</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/cerrar_sesion">Cerrar Sesión</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="content">
		<div id="left">
			<form action="#" method="GET" class='search-form'>
				<div class="search-pane">
					<input type="text" name="search" placeholder="Buscar">
					<button type="submit"><i class="icon-search"></i></button>
				</div>
			</form>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Sección 1</span></a>
				</div>
				<ul class="subnav-menu">
					<li class='dropdown'>
						<a href="#" data-toggle="dropdown">Atajo 1</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">sub atajo 1</a>
							</li>
							<li>
								<a href="#">sub atajo 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Atajo 2</a>
					</li>
					<li>
						<a href="#">Atajo 3</a>
					</li>
					<li>
						<a href="#">Atajo 4</a>
					</li>
				</ul>
			</div>
			
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Sección 2</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="#">Atajo 1</a>
					</li>
					<li>
						<a href="#">Atajo 2</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Graficos y Proyecciones</h1>
					</div>
					<div class="pull-right">
						&nbsp;
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Graficos y Proyecciones</a>
							<i class="icon-angle-right"></i>
						</li>
					</ul>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									Audience Overview
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content" style="display: block;">
								<div class="statistic-big">
									<div class="top">
										<div class="left">
											<div class="input-medium">
												<select name="category" class="chosen-select chzn-done" data-nosearch="true" id="selV0E" style="display: none;">
													<option value="1">Visits</option>
													<option value="2">New Visits</option>
													<option value="3">Unique Visits</option>
													<option value="4">Pageviews</option>
												</select><div id="selV0E_chzn" class="chzn-container chzn-container-single chzn-container-single-nosearch" style="width: 150px;" title=""><a href="javascript:void(0)" class="chzn-single" tabindex="-1"><span>Unique Visits</span><div><b></b></div></a><div class="chzn-drop" style="left: -9000px; width: 148px; top: 30px;"><div class="chzn-search"><input type="text" autocomplete="off" style="width: 113px;"></div><ul class="chzn-results"><li id="selV0E_chzn_o_0" class="active-result" style="">Visits</li><li id="selV0E_chzn_o_1" class="active-result" style="">New Visits</li><li id="selV0E_chzn_o_2" class="active-result result-selected" style="">Unique Visits</li><li id="selV0E_chzn_o_3" class="active-result" style="">Pageviews</li></ul></div></div>
											</div>
										</div>
										<div class="right">
											8,195 <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<div class="bottom">
										<div id="piechart" style="width: 500px; height: 300px;"></div>
									</div>
									<div class="bottom">
										<ul class="stats-overview">
											<li>
												<span class="name">
													Visits
												</span>
												<span class="value">
													11,251
												</span>
											</li>
											<li>
												<span class="name">
													Pages / Visit
												</span>
												<span class="value">
													8.31
												</span>
											</li>
											<li>
												<span class="name">
													Avg. Duration
												</span>
												<span class="value">
													00:06:41
												</span>
											</li>
											<li>
												<span class="name">
													% New Visits
												</span>
												<span class="value">
													67,35%
												</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>

	</body>
</html>