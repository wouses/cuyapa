<?php 

	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
				
?>

            <!--
            <form action="#" method="GET" class='search-form'>
                    <div class="search-pane">
					<input type="text" name="search" placeholder="Buscar">
					<button type="submit"><i class="icon-search"></i></button>
				</div>
			</form> -->
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Coordinadores</span></a>
				</div>
                <div class="subnav-content" style="display: block;">
                <?php
                
				$sql = "select count(coordinadores.id) as cant_coord from coordinadores";
				$ejecuta = mysql_query($sql);
				
				$resultado = mysql_fetch_array($ejecuta);
				
				$cant_coord = $resultado['cant_coord'];
				
				?>
                
				<ul class="quickstats">
					<li> 
                        <span class="value"><?php echo $cant_coord; ?></span>
						<span class="name">Coordinadores registrados</span>
					</li>
				</ul>
                </div>
			</div>
			
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Productores</span></a>
				</div>
                <div class="subnav-content" style="display: block;">
                <?php 
				
				$sql = "select count(productores.id) as cant_prod from productores";
				$ejecuta = mysql_query($sql);
				
				$resultado = mysql_fetch_array($ejecuta);
				
				$cant_prod = $resultado['cant_prod'];
				
				?>
                 
                <ul class="quickstats">
					<li> 
                        <span class="value"><?php echo $cant_prod; ?></span>
						<span class="name">Productores registrados</span>
					</li>
				</ul>
                </div>
			</div>		