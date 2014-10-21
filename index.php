<!DOCTYPE html>
<html>
<head>
	<title>Tabla de Estaciones</title>
	<link rel="stylesheet" href="http://protodesarrollos.com/tools/cdn/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>Tabla de Estaciones Red Federal de carreteras</h1>
		</header>
		<aside class="col-lg-5">
			<header><h2>Filtros Disponibles</h2></header>
			<section>
				<form id="opciones">
					<label for="anios">Anyo</label>
					<select class="form-control" name="anios" multiple>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
					</select>
					<label for="carreteras">Carreteras</label>
					<select class="form-control" name="carreteras" multiple>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<label for="estados">Anyo</label>
					<select class="form-control" name="estados" multiple>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<input type="button" class="btn" value="buscar">	
				</form>
			</section>
		</aside>
		<main class="col-lg-7">
			<header><h2>Tabla de Estaciones</h2></header>
			<section id="tablaEstaciones">

			</section>	
		</main>
		
	</div>
	<script src="http://www.protodesarrollos.com/tools/cdn/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="scripts/Estaciones.js"></script>
	<script type="text/javascript" src="scripts/app.js"></script>
</body>
</html>
