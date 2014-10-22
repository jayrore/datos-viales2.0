<!DOCTYPE html>
<html>
<head>
	<title>Tabla de Estaciones</title>
	<link rel="stylesheet" href="http://protodesarrollos.com/tools/cdn/bootstrap/3.2.0/css/bootstrap.min.css">
	<style type="text/css">
		
		html,body{
			width: 100%;
			height: 100%;
		}

		.emergente{
			width: 30%;
			top: 0px;
			left: -30%;
			background-color: red;
			-webkit-transition:All 1.4177s ease;

		}
		.emergente div{
			width: 30%;
			height: 100%;
			background-color: #440000;
			color: white;
		}
		.opcionesDerecha{

			width: 30%;
			top: 0px;
			right: -30%;
			background-color: red;
			-webkit-transition:All 1.4177s ease;

		}
		.opcionesDerecha div{
			float: right;
			width: 30%;
			height: 100%;
			background-color: #440000;
			color: white;
		}
		.mainContainer{
			top: 0px;
			left: 0px;
			background-color: green;
			-webkit-transition:All 1.4177s ease;
		}

		.activado{
			-webkit-transform:  translate(30%);
		}
		.moverIzquierda{
			-webkit-transform:  translate(-30%);
		}

		.emergente ,.mainContainer, .opcionesDerecha{
			width: 100%;
			height: 100%;
			position:absolute;
		}
		#principal{
			position: relative;
			max-width: 100%;
			height: 100%;
			max-height: 100%;
		    background-color: blue;
		    overflow-x:hidden;
		}
		#mc .container-fluid{
			height: 100%;
		}
		#map_canvas{
			height: 100%;
		}
		#izquierda, #derecha{
			z-index: 2;
			position: fixed;
		}
		#izquierda{
			top: 15px;
			left: 15px;
		}
		#derecha{
			top: 15px;
			right: 15px;
		}
	</style>
</head>
<body>
	<div id="principal">
	<div class="emergente">
		<div>
		<aside class="col-lg-12" >
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
					<label for="estados">Estado</label>
					<select class="form-control" name="estados" multiple>
						<option value="1">morelos</option>
						<option value="2">sonora</option>
						<option value="3">sinaloa</option>
						<option value="4">tamaulipas</option>
					</select>
					<label for="carreteras">Carreteras</label>
					<select class="form-control" name="carreteras" multiple>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<input type="button" class="btn" value="buscar">	
				</form>
			</section>
		</aside>
		</div>
	</div>
	<div class="opcionesDerecha">
		<div>
		<aside class="col-lg-12" >
			<header><h2>Opciones derecha</h2></header>
		</aside>
		</div>
	</div>
	<div id="mc" class="mainContainer">
		<div class="container-fluid">
		<header>
			<h1>Tabla de Estaciones Red Federal de carreteras</h1>
			<button id="izquierda">opciones izq</button>
			<button id="derecha">opciones der</button>
		</header>
		<main class="col-lg-4">
			<header><h2>Tabla de Estaciones</h2></header>
			<section id="tablaEstaciones">
			</section>	
		</main>
		<section class="col-lg-5" id="map_canvas" >
			
		</section>
		<aside class="col-lg-3">
			<header>
				<h2>Estaciones Custom</h2>
			</header>

		</aside>
		</div>
	</div>

	</div>
	<script src="http://www.protodesarrollos.com/tools/cdn/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
	<script>
	$('#izquierda').click(function(event) {
		$('#mc').toggleClass('activado');
		$('.emergente').toggleClass('activado');
	});
	$('#derecha').click(function(event) {
		$('#mc').toggleClass('moverIzquierda');
		$('.opcionesDerecha').toggleClass('moverIzquierda');
	});
	</script>
	   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
      }
      initialize();
    </script>
	<script type="text/javascript" src="scripts/Estaciones.js"></script>
	<script type="text/javascript" src="scripts/app.js"></script>
</body>
</html>
