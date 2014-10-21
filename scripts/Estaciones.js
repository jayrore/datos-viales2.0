function Estaciones(optObj){
	/*
	*PRIVATE ATTRIBUTES
	*/
	var _this = this,
		columns = (optObj.columns === undefined ) ? new Array("col0","col1","col2","col3","col4") : optObj.columns;

	/*
	*PUBLIC ATTRIBUTES
	*/
	this.container = $("#"+optObj.container);
	/*
	* PRIVATE METHODS
	*/
	var _setTable = function()
	{	
		_this.table = $("<table class='table'>");
		_this.table.appendTo(_this.container);
	};
	var _printTable = function(json){
		var tr = $('<tr>');
		$.map(columns, function(elemento, cab) {
			var th = $('<th>');
			th.html(cab);
			tr.append(th); 
		});	
		_this.table.append(tr);

		$.each(json, function(index, row) {
			 var tr = $('<tr>');
			 for(col in columns){
			 	var td = $('<td>');
			    console.log( col + " " +typeof row[col]);
			 	if(typeof row[col] == 'object')
			 	{	
			 		for(var e in row[col])
			 		td.append(row[col][e]+" ");
			 	}else{
			 		td.append(row[col]);
			 	}			 	
			 	td.appendTo(tr);
			 }
		    _this.table.append(tr);			 
		});
	};
	var _getEstaciones = function(filtro){
		_this.lastJson ="";
		var string = JSON.stringify({anios:[2010],estados:[2],carreteras:[]});
		filtro = (filtro === undefined)? string :JSON.stringify( filtro );
		console.log("filtro2");
		$.getJSON('controllers/filtroEstacionesController.php', {params:filtro}, function(dataObject, textStatus) {
				/*optional stuff to do after success */
			_printTable(dataObject);
		});
	};

	var _limpiarTabla = function(){
		_this.table.html("");
	};

	/*
	*PUBLIC METHODS
	*/
	this.filtrarEstaciones = function(filtro){
		_limpiarTabla();
		_getEstaciones(filtro);
	};
	this.getHtmlCont = function(){
		return this.container.html();
	};

	this.init = function(){
		_setTable();
		_getEstaciones();		
	};

}