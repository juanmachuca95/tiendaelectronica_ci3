$(document).ready(function(){
	var alto 		= $('html').height();
	var altoCont	= $('.fondo_admin').height();
	if(altoCont < alto){
    
		$('.fondo_admin').height(alto);

	}
})


//Manejo de incorporacion de items al carrito. 
$('.addItem').on('click',function(e){
	e.preventDefault();
	var codigo = $('#codigo').html();
	$.ajax({
		type: 'POST',
		url	: 'http://localhost/WebResponsive/cliente/items/',
		data: {id_producto : codigo},
		success:function(data){
			console.log(data);
			if(data == 1){
				$('.toast').toast('show');
				$('.toast-body').css('background-color', '#99ffcc');
				$('.toast-body').html('Se cargo el carrito correctamente &#x2705');
			}else{
				$('.toast').toast('show');
				$('.toast-body').css('background-color', '#ff8080');
				$('.toast-body').html('Actualmente no hay Stock, lo sentimos &#x1f515;');
			}
		},
		error:function(xhr, status){
			alert("Petición Rechazada");
		}
	});
})

//Visualización de imagen en modal.  
$(document).on('click','#ver',function(){
    var imagen = $(this).children().attr('src');
    $('#verImagen').attr('src',imagen);
    $('#modalImagen').modal('show');
});


/*Editar fila*/
$(document).on('click','#editarFila',function(e){
	e.preventDefault();
	var fila = $(this).parent().parent().parent();
	fila.css('background-color','#e6fff2');
	var tds = fila.find('td');
	console.log('campos: '+tds);
	console.log('longitud: '+tds.length);
	var datos = tds.children();
	$(datos[1]).removeAttr('readonly');
	$(datos[2]).removeAttr('readonly');
	$(datos[3]).removeAttr('readonly');
	$(datos[4]).removeAttr('readonly');
	$(datos[5]).removeAttr('hidden');

	$(this).attr(
		'id','confirmar'
		).removeClass(
		'btn-warning'
	).addClass('btn-info');
})

$(document).on('click','#confirmar',function(e){
	e.preventDefault();
	var boton 		= $(this);
	var fila 		= $(this).parent().parent().parent();
	var tds 		= fila.find('td');
	var datos 		= tds.children();
	var codigo 				= $(datos[0]).val();
	var categoria 			= $(datos[1]).val();
	var descripcion 		= $(datos[2]).val(); //Textarea
	var precio 				= $(datos[3]).val();
	var stock				= $(datos[4]).val();
	var imagen				= $(datos[5]).prop("files")[0];

	var formData = new FormData();
	formData.append('codigo',codigo);
	formData.append('categoria',categoria);
	formData.append('descripcion',descripcion);
	formData.append('precio',precio);
	formData.append('stock',stock);
	(imagen === undefined) ? '' :  formData.append('file',imagen);

	$.ajax({
		url		: 'editRegistro',
		method	: 'POST',
		data	: formData,
		contentType: false,
        processData: false,
        success: function(response){
        	if(response){
        		$(datos[1]).attr('readonly', true);
				$(datos[2]).attr('readonly', true);
				$(datos[3]).attr('readonly', true);
				$(datos[4]).attr('readonly', true);
				$(datos[5]).attr('hidden', true);
				$(boton).attr(
					'id','editarFila'
					).removeClass(
					'btn-info'
				).addClass('btn-warning');
				fila.css('background-color','');
				$('#modalAviso').modal('show');
				$('.modal-body').html("La actualización fue exitosa.");
        	}else{
        		alert("Ha ocurrido un error intentelo nuevamente.")
        	}
        },
        error: function(xhr,status){
        	alert("Petición Rechazada");
        }
	})
})

$(document).on('click', '#eliminarFila', function(){
	if(confirm("¿ Seguro desea eliminar este producto ?")){
		return true;
	}else{
		return false;
	}
})



/*Envio de formulario de carga de productos ajax
$('#cargar').on('click',function(e){
	e.preventDefault();
	var url = $('#crear_producto').attr('action');

	$.ajax({
		method	: 'POST',
		url		: url,
		data 	: $('#crear_producto').serialize(),
		succes  : function(data){
			alert(data);
		},
		error   : function(xhr, status){
			alert("Peticion Rechazada");
		}
	})
})
*/