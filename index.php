<?php
	session_start();
	$user= $_SESSION['user'];
	if ($user == null || $user == ''){
		header("Location:login.php");
		die();
	}

	$con=mysqli_connect('localhost','root','','login');
	$sql = "SELECT id, nombre, usuario, contraseña, id_cargo, foto FROM usuarios WHERE usuario = '$user'";
	$sqk = "SELECT COUNT(*) AS num FROM datos";
	$sql2 = "SELECT SUM(retraso) AS num2 FROM datos";
	$sql3 = "SELECT sum(perdidas) AS num3 FROM datos";
	$resul=$con->query($sql);
	$resul2=mysqli_query($con,$sqk);
	$resul3=mysqli_query($con,$sql2);
	$resul4=mysqli_query($con,$sql3);
	$dae = $resul2->fetch_assoc();
	$dae2 = $resul3->fetch_assoc();
	$dae3 = $resul4->fetch_assoc();
	while ($data=$resul->fetch_assoc()) {
		$id = $data['id'];
		$nombre = $data['nombre'];
		$usuario = $data['usuario'];
		$contra = $data['contraseña'];
		$id_cargo = $data['id_cargo'];
		$foto = $data['foto'];
	}


?>							

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style2.css">
	<title>SGFM</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Sistema de gestion de incidentes GFM</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" onclick="mostrardesktop();">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Escritorio</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="mostrarinforme();">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">informes</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="mostraranalisis();">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analisis</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="mostrarmensaje();">
					<i class='bx bx-edit'></i>
					<span class="text">Agregar Incidente</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="mostrarequipo();">
					<i class='bx bxs-group' ></i>
					<span class="text">Equipo</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu top">
			<li>
				<a href="#" onclick="mostrarconfig();">
					<i class='bx bxs-cog' ></i>
					<span class="text">Configuracion</span>
				</a>
			</li>
			<li>
				<a href="cerrar_sesion.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Cerrar Sesion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<div class="navbar">
				<div class="left">
					<i class='bx bx-menu' ></i>
					<a href="#" class="nav-link">Categorias</a>
					<form action="#" class="hub">
						<div class="form-input">
							<input type="search" placeholder="Search...">
							<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
						</div>
					</form>
				</div>
				<div class="right">
					<input type="checkbox" id="switch-mode" hidden>
					<label for="switch-mode" class="switch-mode"></label>
					<a href="#" class="notification">
						<i class='bx bxs-bell' ></i>
						<span class="num">8</span>
					</a>
					<a href="#"class="nav-link"><?php echo $nombre;?></a>
					<a href="#" class="profile" onclick="mostrarconfig();">
						<img src="<?php echo $foto;?>">
					</a>
				</div>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div id="desktop">
				<div class="head-title">
					<div class="left">
						<h1>Escritorio</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Escritorio</a>
							</li>
							<li><i class='bx bx-chevron-right' ></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
					<a href="reportes.php" class="btn-download">
						<i class='bx bxs-cloud-download' ></i>
						<span class="text">Download PDF</span>
					</a>
				</div>

				<ul class="box-info">
					<li>
						<i class='bx bx-tachometer' ></i>
						<span class="text">
							<h3><?php echo $dae['num'];?></h3>
							<p>Incidentes</p>
						</span>
					</li>
					<li>
						<i class='bx bx-pie-chart-alt-2' ></i>
						<span class="text">
							<h3><?php echo $dae2['num2'];?></h3>
							<p>Retrasos</p>
						</span>
					</li>
					<li>
						<i class='bx bx-error' ></i>
						<span class="text">
							<h3><?php echo $dae3['num3']?></h3>
							<p>Perdidas</p>
						</span>
					</li>
				</ul>


				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Recent Orders</h3>
							<i class='bx bx-search' ></i>
							<i class='bx bx-filter' ></i>
							<div>
								<form action="" method="post">
									<label for="">buscar</label>
									<input class="form-control me-2 light-table-filter" data-table="table_id" type="text" id="hol">
								</form>
							</div>
						</div>
						<div>
							<table class="table table-striped table-dark table_id">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$con = mysqli_connect('localhost','root','','login');
									$SQL="SELECT nombres, fecha, estado FROM datos";
									$dato = mysqli_query($con, $SQL);

									if($dato -> num_rows >0){
										while($fila=mysqli_fetch_array($dato)){
    
									?>

									<tr>
										<td class="try"><?php echo $fila['nombres']; ?></td>
										<td class="try"><?php echo $fila['fecha']; ?></td>
										<td class="try"><?php echo $fila['estado']; ?></td>
									</tr>
									<?php
										}
									}else{
										?>
										<tr class="text-center">
											<td colspan="16">No existen registros</td>
										</tr>

										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="todo">
						<div class="head">
							<h3>Todos</h3>
							<i class='bx bx-plus' ></i>
							<i class='bx bx-filter' ></i>
						</div>
						<ul class="todo-list">
							<li class="completed">
								<p>Todo List</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
							<li class="completed">
								<p>Todo List</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
							<li class="not-completed">
								<p>Todo List</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
							<li class="completed">
								<p>Todo List</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
							<li class="not-completed">
								<p>Todo List</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="informe">
				<div class="head-title">
					<div class="left">
						<h1>informes</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">informes</a>
							</li>
							<li><i class='bx bx-chevron-right' ></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
					<a href="reportes.php" class="btn-download">
						<i class='bx bxs-cloud-download' ></i>
						<span class="text">Download PDF</span>
					</a>
				</div>


				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Registro de incidentes</h3>
							<div>
								<form action="" method="post">
									<label for="campo">Buscar:</label>
									<input type="text" name="campo" id="campo" class="hol">
								</form>
							</div>
							<i class='bx bx-filter' ></i>
						</div>
						<div>
							<table>
								<thead>
									<th>nombre</th>
									<th>correo</th>
									<th>categoria</th>
									<th>fecha</th>
									<th>nivel</th>
									<th>retraso</th>
									<th>perdidas</th>
								</thead>
								<tbody id="pop">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="analisis">
			<div class="head-title">
					<div class="left">
						<h1>Analisis</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">analisis</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
            	</div>
				<br>
				<div class="container">
					<h1 class="tre">ANALISIS DE LOS DATOS DE LOS INCIDENTES</h1>
					<div class="paque">
						<div class="center">
							<canvas id="myChart"></canvas>
							<script>
								const ctx = document.getElementById('myChart');
								new Chart(ctx, {
									type: 'bar',
									data: {
									labels: ['Incidente', 'Retrasos', 'Perdidas',],
									datasets: [{
										label: 'Red',
										
										data: [<?php echo $dae['num'];?>, <?php echo $dae2['num2'];?>, <?php echo $dae3['num3'];?>,],
										borderWidth: 1,
										backgroundColor: [
												'rgba(255,99,132,0.2)',
												'rgba(54,162,235,0.2)',
												'rgba(255,206,86,0.2)',
												'rgba(75,192,192,0.2)',
												'rgba(153,102,255,0.2)',
												'rgba(255,159,64,0.2)'
										]
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
						</div>
					</div>
            	</div>
			</div>
			<div id="mensaje">
				<div class="head-title">
					<div class="left">
						<h1>mensaje</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">mensaje</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
            	</div>
				<br>
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>formulario</h3>
						</div>
						<div>
							<form class="formula" action="insertar.php" method="POST">
								<label for="nombre">NOMBRES</label><br>
								<input class="controls" type="text" id="nombre" placeholder="Ingrese su nombre" name="nombre" required><br><br>
								<label for="correo">CORREO</label><br>
								<input class="controls" type="email" id="correo" placeholder="Ingrese su correo" name="correo" required><br><br>
								<label for="categoria">CATEGORIA</label><br>
								<input class="controls" type="text" id="categoria" placeholder="categoria" name="categoria" required><br><br>
								<label for="fecha">Fecha</label><br>
								<input class="controls" type="date" id="fecha" placeholder="Fecha del Incidente" name="fecha" required><br><br>
								<label for="estado">Estado</label><br>
								<input class="controls" type="text" id="estado" placeholder="Estado del Incidente" name="estado" required><br><br>
								<label for="consulta">CONSULTA</label><br>
								<textarea name="consulta" id="consultar" cols="30" rows="10"></textarea><br><br>
								<label for="retraso">RETRASO</label><br>
								<input class="controls" type="text" name="retraso" id="retraso" placeholder="Ingrese la cantidad de retraso" required><br><br>
								<label for="perdidas">PERDIDAS</label><br>
								<input class="controls" type="text" name="perdidas" id="perdidas" placeholder="Ingrese la cantidad de perdidas" required><br><br>
								<label>NIVEL</label><br>
								<select name="nivel">
								
									<option value="leve">leve</option>
									<option value="normal">normal</option>
									<option value="urgente">urgente</option>
								
								</select><br><br>
								<a href="#">
									<input class="boton" type="submit" value="Agregar">
								</a>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="equipo">
				<div class="head-title">
					<div class="left">
						<h1>Equipo</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">equipo</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
            	</div>
				<br>
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h1>USUARIOS</h1>
						</div>
						<div class="tys">
							<div class="usuarios_dta">
								<table>
									<thead>
										<th>Foto</th>
										<th>Nombre</th>
										<th>Usuario</th>
										<th>Cargo</th>
									</thead>
									<tbody>
										<?php
											$conz = mysqli_connect('localhost','root','','login');
											$das="SELECT u.id,u.nombre, u.usuario, (u.id_cargo) as idrol, (r.rol) as rol, foto FROM usuarios u INNER JOIN rol r on u.id_cargo = r.idrol;";
											$frm = mysqli_query($conz, $das);

											if($frm -> num_rows >0){
												while($filas=mysqli_fetch_array($frm)){
			
											?>

											<tr>
												<td class="try"><img src="<?php echo $filas['foto']; ?>"></td>
												<td class="try"><?php echo $filas['nombre']; ?></td>
												<td class="try"><?php echo $filas['usuario']; ?></td>
												<td class="try"><?php echo $filas['rol']; ?></td>
											</tr>
											<?php
												}
											}else{
												?>
												<tr class="text-center">
													<td colspan="16">No existen registros</td>
												</tr>

												<?php
											}
											?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="config">
				<div class="head-title">
					<div class="left">
						<h1>Configuracion</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">configuracion</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
            	</div>
				<br>
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h1>Configuracion de Perfil</h1>
						</div>
						<div class="registro">
							<?php
								
								$conex = mysqli_connect('localhost','root','','login');
								$col = "SELECT u.id,u.nombre, u.usuario, u.contraseña, (u.id_cargo) as idrol, (r.rol) as rol, foto FROM usuarios u INNER JOIN rol r on u.id_cargo = r.idrol where u.id = $id;";
								$jud = mysqli_query($conex,$col);
								if ($jud -> num_rows > 0) {
									$option = '';
									while ($dis=mysqli_fetch_array($jud)) {
										$id = $dis['id'];
										$nom = $dis['nombre'];
										$usu = $dis['usuario'];
										$clave = $dis['contraseña'];
										$idrol = $dis['idrol'];
										$rol = $dis['rol'];

										if ($idrol == 1) {
											$option = '<option value="'.$idrol.'"select>'.$rol.'</option>';
										}elseif ($idrol == 2) {
											$option = '<option value="'.$idrol.'"select>'.$rol.'</option>';
										}
									}
								}
							
							?>
							<form action="actualizar-usuario.php" method="post" class="tables" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<div class="card">
									<label for="foto">Foto</label>
									<input type="file" name="foto" class="fed1">
								</div>
								<div class="card">
									<label for="nombre" class="feds">Nombre</label>
									<input class="fed" type="text" name="nombre" value="<?php echo $nom ; ?>">
								</div>
								<div class="card">
									<label for="usuario" class="feds">Usuario</label>
									<input class="fed" type="email" name="usuario" value="<?php echo $usu; ?>">
								</div>
								<div class="card">
									<label for="clave" class="feds">Clave</label>
									<input class="fed" type="password" name="clave" value="<?php echo $clave; ?>">
								</div>
								<div class="card">
									<label for="rol" class="feds">Tipo de usuario</label>
									<?php
										$query_rol = mysqli_query($conex,"SELECT * FROM rol");
										$result_rol = mysqli_num_rows($query_rol);
									?>
									<select class="fed" name="rol" id="rol">
										<?php 
											echo $option;
											if($result_rol > 0){
												while ($rol = mysqli_fetch_array($query_rol)) {
										?>
												<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"]; ?></option>
										<?php
												}
											}
										?>
									</select>
								</div>
								<div class="btn-card">
									<input class="bos" type="submit" value="ACTUALIZAR USUARIO">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="jquery-3.6.4.slim.min.js"></script>						
	<script src="script.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
	<script src="buscador.js"></script>								
	<SCript>

		getData()
		document.getElementById("campo").addEventListener("keyup", getData)

		function getData() {
			let input = document.getElementById('campo').value
			let pop = document.getElementById('pop')
			let url = "load.php"
			let formData = new FormData()
			formData.append('campo', input)

			fetch(url, {
				method: 'POST',
				body: formData
			}).then(response => response.json())
			.then(data => {
				pop.innerHTML = data
			}).catch(err => console.log(err))
		}

	</script>
</body>
</html>