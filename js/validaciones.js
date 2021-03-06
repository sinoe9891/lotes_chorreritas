addEventListener();

function addEventListener() {
	//Buscador de Graduados
	let buscador = document.querySelector('#buscador');
	if (buscador) {
		buscador.addEventListener('submit', validarBuscar);
	}
	//Editor de Graduados
	let editor = document.querySelector('#editor');
	if (editor) {
		editor.addEventListener('submit', validarEditorBuscador);
	}
	//Buscador de Graduados
	let buscadorFallecido = document.querySelector('#buscadorFallecido');
	if (buscadorFallecido) {
		buscadorFallecido.addEventListener('submit', validarBuscarfallecido);
	}
	//Buscador de cumpleañero
	let cumpleanero = document.querySelector('#buscarCumpleanos');
	if (cumpleanero) {
		cumpleanero.addEventListener('submit', validarCumplenero);
	}
	//Acciones de solicitudes
	let solicitud = document.querySelector('.caja-solicitud');
	if (solicitud) {
		modelo = 'model-acciones';
		solicitud.addEventListener('click', (event) => {
			if (event.isTrusted) { // Valida que el evento es desencadenado por una acción manual del cliente
				acciones(event,modelo);
			}
		});
	}
	//Acciones de solicitudes Graduandos
	let solicitudGraduando = document.querySelector('.caja-solicitud-graduandos');
	if (solicitudGraduando) {
		modeloGraduandos = 'model-acciones-graduandos';
		solicitudGraduando.addEventListener('click', (event) => {
			if (event.isTrusted) { // Valida que el evento es desencadenado por una acción manual del cliente
				acciones(event,modeloGraduandos);
			}
		});
	}
	let fichaGraduado = document.querySelector('.caja-ficha');
	if (fichaGraduado) {
		modeloFicha = 'model-acciones-ficha';
		fichaGraduado.addEventListener('click', (event) => {
			if (event.isTrusted) { // Valida que el evento es desencadenado por una acción manual del cliente
				acciones(event,modeloFicha);
			}
		});
	}
}
// console.log('Hola');

// -----------------Validar Cumpleañero-----------------
function validarCumplenero(e) {
	let nombre = document.getElementById('nombre').value;
	let apellidos = document.getElementById('apellidos').value;
	let clase = document.getElementById('clase').value;
	// let genero = document.getElementById('genero').value;
	if (nombre == '' || apellidos == '' || clase == '') {
		e.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de seleccionar dos campos'
		})

	}
}

//-----------------Validar Buscar-----------------
function validarBuscarfallecido(e) {
	e.preventDefault();

	var anoFallecido = document.getElementById('anoFallecido').value;
	var i = 0;
	var contador = 0;
	for (i; i < 1; i++) {
		var hola = document.forms["buscadorFallecido"][i].value;
		contador += hola.length;
	}
	console.log("Contador: " + contador);

	if (contador <= 0) {
		e.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Llenar al menos un campo'

		})
		// console.log(false);
		return false; // keep form from submitting
	} else if (contador > 0) {

		// console.log(document.getElementById('cajaresultado').innerHTML = '<?php echo realizarBusqueda(); ?>');
		url = '?anoFallecido=' + anoFallecido;
		location.href = url;
		// console.log(url);
	}
	// console.log(true);
	return true;

}

//-----------------Validar Buscar-----------------
function validarBuscar(e) {
	e.preventDefault();

	var nombres = document.getElementById('nombres').value;
	var i = 0;
	var contador = 0;
	for (i; i < 1; i++) {
		var hola = document.forms["buscador"][i].value;
		// console.log(hola1)
		contador += hola.length;
	}
	// console.log(contador);

	if (contador <= 0) {
		e.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Llenar al menos un campo'

		})
		// console.log(false);
		return false; // keep form from submitting
	} else if (document.forms["buscador"][1].value.length == 1 && contador == 1) {
		e.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Llenar al menos dos campos'

		})
	} else if (contador > 0) {

		// console.log(document.getElementById('cajaresultado').innerHTML = '<?php echo realizarBusqueda(); ?>');
		url = '?nombres=' + nombres;
		location.href = url;
		// console.log(url);
	}
	// console.log(true);
	return true;

}

//acciones

//acciones de solicitudes cambia estado o elimina
function acciones(e, modelo) {
	// e.preventDefault();
	// console.log('click de acciones listado');

	console.log(e.target.classList.contains('fa-check-circle'));
	// console.log(modelo);
	//Delegation
	if (e.target.classList.contains('fa-check-circle')) {
		if (e.target.classList.contains('completo')) {
			e.target.classList.remove('completo');
			cambiarEstado(e.target, 0, modelo);
		} else {
			e.target.classList.add('completo');
			cambiarEstado(e.target, 1, modelo);
		}
	}
	// condicion de eliminar con alert
	if (e.target.classList.contains('fa-trash')) {
		Swal.fire({
			title: 'Seguro(a)?',
			text: "Esta acción no se puede deshacer",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, borrar!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				let solicitudEliminar = e.target.parentElement.parentElement.parentElement;
				// Borrra de la Base de datos
				eliminarRegistro(solicitudEliminar, null, modelo);
				// Borrar del HTML
				solicitudEliminar.remove();
				Swal.fire(
					'Eliminado!',
					'La solicitud fue eliminada!.',
					'success'
				).then(okay => {
					if (okay) {
						window.location.reload();
					}
				});
			}
		})
	}
}

//Función de Cambio de Estado
function cambiarEstado(solicitud, estado, model) {
	let idSolicitud = solicitud.parentElement.parentElement.parentElement.id.split(':');
	// console.log(idSolicitud[1]);

	//Crear llamado a AJAX
	let xhr = new XMLHttpRequest();

	//información FormData
	let datos = new FormData();
	datos.append('id', idSolicitud[1]);
	datos.append('accion', 'actualizar');
	datos.append('estado', estado);

	// Open la conexión
	xhr.open('POST', 'includes/models/' + model + '.php', true)

	//on load
	xhr.onload = function () {
		if (this.status === 200) {
			// console.log(JSON.parse(xhr.responseText));
		}
	}
	//Enviar la petición
	xhr.send(datos);

}

const removeAccents = (str) => {
	return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
} 

// Funcion eliminar registro de la tabla
function eliminarRegistro(solicitudEliminar, estado, model) {
	let idSolicitud = solicitudEliminar.id.split(':');
	// console.log(idSolicitud[1]);
	//Crear llamado a AJAX
	let xhr = new XMLHttpRequest();

	//información FormData
	let datos = new FormData();
	datos.append('id', idSolicitud[1]);
	datos.append('accion', 'eliminar');
	datos.append('estado', estado);
	datos.append('estado', estado);
	// console.log(accion);
	if(document.getElementById('nombre')){
		let nombre = document.getElementById('nombre').value;
		let procesado = nombre.replace(/\s+/g, '');
		let archivoZip = removeAccents(procesado).toLowerCase();
		datos.append('archivoZip', archivoZip);
	}
	// Open la conexión
	xhr.open('POST', 'includes/models/' + model + '.php', true)

	//on load
	xhr.onload = function () {
		if (this.status === 200) {
			// Ver si se puede eliminar
			// console.log(JSON.parse(xhr.responseText));
		}
	}
	//Enviar la petición
	xhr.send(datos);
}