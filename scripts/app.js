var tableOptions={
	container:"tablaEstaciones",
	columns:{
		anyo      :"anyo",
		carretera :"carretera",
		estaciones:"estacion",
		estados   :"estados",
		c2:"camiones 2 ejes"}
	};

var tEstaciones = new Estaciones(tableOptions);

tEstaciones.init();
console.log(tEstaciones.lastJson);

$("select[multiple] option").click(function(){
   var $self = $(this);

   if ($self.prop("selected"))
          $self.prop("selected", false);
   else
       $self.prop("selected", true);

   return false;
});

$('#opciones').on('click', 'input.btn', function(event) {
	event.preventDefault();
	var filtro = {};
	$.each($('select'), function(index, opciones) {
		 /* iterate through array or object */
		 var op = $(opciones);
		 filtro[op.attr('name')] = op.val();
	});

	console.log(filtro);
	tEstaciones.filtrarEstaciones(filtro);
});
