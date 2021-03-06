addEventListener();

function addEventListener() {
	// Creación de registro
	let evento = document.querySelector('#formulario');
	if (evento) {
		evento.addEventListener('submit', validarRegistro);
	}
	// Solicitud de Graduado
	let solicitud = document.querySelector('#formulario-solicitud');
	if (solicitud) {
		solicitud.addEventListener('submit', validarSolicitud);
	}
	// Solicitud de Graduando
	let solicitudGraduandos = document.querySelector('#form-graduandos');
	if (solicitudGraduandos) {
		solicitudGraduandos.addEventListener('submit', validarActualizacionGraduando);
	}
	// Aprobar Solicitud de GRADUANDO
	let aprobacionGraduando = document.querySelector('#form-aprobacion-graduando');
	if (aprobacionGraduando) {
		aprobacionGraduando.addEventListener('submit', aprobarSolicitudGraduando);
	}
	// Aprobar Solicitud de Graduado
	let aprobacion = document.querySelector('#formulario-aprobacion');
	if (aprobacion) {
		aprobacion.addEventListener('submit', aprobarSolicitud);
	}
	// Actualizar de Graduado
	let editarGraduate = document.querySelector('#editarLote');
	if (editarGraduate) {
		editarGraduate.addEventListener('submit', editarLote);
	}
	let editRegistro = document.querySelector('#editarRegistro');
	if (editRegistro) {
		editRegistro.addEventListener('submit', editarRegistro);
	}
	//Detectar Click de eliminar
	let eliminarImg = document.querySelector('.img-formulario');
	if (eliminarImg) {
		eliminarImg.addEventListener('click', eliminarFoto);
	}
	//validar Ficha
	let fichaSolicitud = document.querySelector('#formulario-ficha');
	if (fichaSolicitud) {
		fichaSolicitud.addEventListener('submit', validarFicha);
	}
	//Asignar Lote
	let asignar = document.querySelector('#asignar_lote');
	if (asignar) {
		asignar.addEventListener('submit', asignarLote);
	}
}

// Función Campos iguales
function compararDatos(dato1, dato2) {
	let celu = document.getElementById(dato1);
	let celu2 = document.getElementById(dato2);
	if (celu2) {
		if (celu.value != celu2.value) {
			celu.style.background = 'pink';
			// console.log('si hay cambio');
		} else {
			celu.style.background = '#cef89d';
			// console.log('no hay cambio');
		}
	}
}
compararDatos('apodo', 'apodo_actu');
compararDatos('fecha_nacimiento', 'fecha_nacimiento2');
compararDatos('pais', 'pais_reside2');
compararDatos('ciudad', 'ciudad2');
compararDatos('direccion', 'direccion2');
compararDatos('correo', 'email2');
compararDatos('correo1', 'correo1_actu');
compararDatos('correo2', 'correo2_actu');
compararDatos('celular', 'celular2');
compararDatos('telefono', 'telefono_actu');
compararDatos('empresaLabora', 'empresa_labora_actu');
compararDatos('rubroEmpresaLabora', 'rubro_empresa_labora_actu');
compararDatos('areasInteres', 'area_interes_actu');
compararDatos('url_linkedin', 'url_linkedin_actu');

//Funcion para copiar etiqueta html a input value
function copiarPegar(idcopy, idpaste) {
	function copy() {
		let copyText = document.getElementById(idcopy);
		// copyText.select();
		document.execCommand("copy");
		return copyText.value;
	}
	function paste() {
		var pasteText = document.getElementById(idpaste);
		pasteText.focus();
		document.execCommand("paste");
		pasteText.value = copy();
	}
	copy();
	paste();
}

let nacimientoFecha = document.getElementById('copiarFNacimiento');
if (nacimientoFecha) {
	document.getElementById('copiarFNacimiento').addEventListener('click', function () {
		copiarPegar('fecha_nacimiento2', 'fecha_nacimiento');
	});
	document.getElementById('copiarPais').addEventListener('click', function () {
		copiarPegar('pais_reside2', 'pais');
	});
	document.getElementById('copiarCiudad').addEventListener('click', function () {
		copiarPegar('ciudad2', 'ciudad');
	});
	document.getElementById('copiarDireccion').addEventListener('click', function () {
		copiarPegar('direccion2', 'direccion');
	});
	document.getElementById('copiarCorreo').addEventListener('click', function () {
		copiarPegar('email2', 'correo');
	});
	document.getElementById('copiarCorreo2').addEventListener('click', function () {
		copiarPegar('correo1_actu', 'correo1');
	});
	document.getElementById('copiarCorreo3').addEventListener('click', function () {
		copiarPegar('correo2_actu', 'correo2');
	});
	document.getElementById('copiarCelular').addEventListener('click', function () {
		copiarPegar('celular2', 'celular');
	});
	document.getElementById('copiarTelefono').addEventListener('click', function () {
		copiarPegar('telefono_actu', 'telefono');
	});
	document.getElementById('copiarEmpresaLaboral').addEventListener('click', function () {
		copiarPegar('empresa_labora_actu', 'empresaLabora');
	});
	document.getElementById('copiarRubroEmpresaLaboral').addEventListener('click', function () {
		copiarPegar('rubro_empresa_labora_actu', 'rubroEmpresaLabora');
	});
	document.getElementById('copiarArea_interes_actu').addEventListener('click', function () {
		copiarPegar('area_interes_actu', 'areasInteres');
	});
	document.getElementById('copiarUrl_linkedin_actu').addEventListener('click', function () {
		copiarPegar('url_linkedin_actu', 'url_linkedin');
	});
}


function validarRegistro(e) {
	e.preventDefault();

	let nombres = document.querySelector('#nombre').value,
		apellidos = document.querySelector('#apellidos').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fechaNacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		linkedin = document.querySelector('#linkedin').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;

	let carrera = {
		1: {
			programa: '0777',
			titulo: 'INGENIERO AGRÓNOMO',
			orientacion: 'INGENIERIA AGRONÓMICA'
		},
		2: {
			programa: '0777',
			titulo: 'INGENIERO EN AGROINDUSTRIA ALIMENTARIA',
			orientacion: 'AGROINDUSTRIA ALIMENTARIA'
		},
		3: {
			programa: '0777',
			titulo: 'INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS',
			orientacion: 'ADMINISTRACION DE AGRONEGOCIOS'
		},
		4: {
			programa: '0777',
			titulo: 'INGENIERO EN AMBIENTE Y DESARROLLO',
			orientacion: 'AMBIENTE Y DESARROLLO'
		},
		5: {
			programa: '0777',
			titulo: 'INGENIERO EN DESARROLLO SOCIOECONOMICO Y AMBIENTE',
			orientacion: 'DESARROLLO SOCIOECONOMICO Y AMBIENTE'
		},
		6: {
			programa: '0777',
			titulo: 'INGENIERO EN AGROINDUSTRIA',
			orientacion: 'AGROINDUSTRIA'
		},
		7: {
			programa: '0777',
			titulo: 'INGENIERO EN GESTION DE AGRONEGOCIOS',
		},
		8: {
			programa: '0707',
			titulo: 'AGRÓNOMO - PPIA',
		},
		9: {
			programa: '0077',
			titulo: 'AGRÓNOMO - PIA',
		},
		10: {
			programa: '0007',
			titulo: 'AGRÓNOMO',
		}
	};

	let orientaciones = document.getElementById('programa').value;
	let carreraSeleccionada = carrera[orientaciones];
	let orientation = carreraSeleccionada.orientacion;
	let programa = carreraSeleccionada.programa;

	//Validar que el campo tenga algo escrito
	if (nombres === '' || apellidos === '' || clase === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Ambos campos son obligatorios!'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('nombres', nombres);
		datos.append('apellidos', apellidos);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('linkedin', linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientation);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-registroAlumno.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'crear') {
						Swal.fire({
							icon: 'success',
							title: 'Usuario Creado',
							text: 'El usuario se creó correctamente',
							position: 'center',
							showConfirmButton: true
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Usuario o contraseña incorrecta'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}
}


//-------------------Solicitud de Graduado para actualziación-------------------

function validarSolicitud(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		nombres = document.querySelector('#nombre').value,
		firstname = document.querySelector('#firstname').value,
		secondname = document.querySelector('#secondname').value,
		apellidos = document.querySelector('#apellidos').value,
		primerapellido = document.querySelector('#primerapellido').value,
		segundoapellido = document.querySelector('#segundoapellido').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fecha_nacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		correo1 = document.querySelector('#correo1').value,
		correo2 = document.querySelector('#correo2').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		url_linkedin = document.querySelector('#url_linkedin').value,
		orientacion = document.querySelector('#orientacion').value,
		programa = document.querySelector('#programa').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,
		fondos_zamorano = document.querySelector('#fondos_zamorano').value,
		fondos_propios = document.querySelector('#fondos_propios').value,
		fondos_entidades = document.querySelector('#fondos_entidades').value,
		otras_entidades = document.querySelector('#otras_entidades').value,

		linkedin = document.querySelector('#linkedin').value,
		fallecido = document.querySelector('#fallecido').value,
		fechaFallecido = document.querySelector('#fechaFallecido').value,
		estatus = document.querySelector('#estatus').value,
		pa = document.querySelector('#pa').value,
		anioIA = document.querySelector('#anioIA').value,
		dia_graduacion = document.querySelector('#dia_graduacion').value,
		mes_graduacion = document.querySelector('#mes_graduacion').value,
		codigoIA = document.querySelector('#codigoIA').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	if (codigo == 'N/A') {
		codigo = ''
	}
	if (url_linkedin == '') {
		linkedin = 0;
	} else {
		linkedin = 1;
	}
	let otrasEnti, fondosz, fondosp;
	if (fondos_entidades === '') {
		otrasEnti = 0;
		// document.getElementById('otras_entidades').required = false;
	} else {
		otrasEnti = 1;
		// document.getElementById('otras_entidades').required = true;
	}

	if (fondos_zamorano === '0') {
		fondos_zamorano = '0';
	} else {
		fondos_zamorano = '1';
	}

	if (fondos_propios === '0') {
		fondos_propios = '0';
	} else {
		fondos_propios = '1';
	}

	// let carrera = {
	//     'INGENIERIA AGRONÓMICA': {
	//         programa: '0777',
	//         titulo: 'INGENIERO AGRÓNOMO',
	//         orientacion: 'INGENIERIA AGRONÓMICA'
	//     },
	//     'AGROINDUSTRIA ALIMENTARIA': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN AGROINDUSTRIA ALIMENTARIA',
	//         orientacion: 'AGROINDUSTRIA ALIMENTARIA'
	//     },
	//     'ADMINISTRACION DE AGRONEGOCIOS': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS',
	//         orientacion: 'ADMINISTRACION DE AGRONEGOCIOS'
	//     },
	//     'AMBIENTE Y DESARROLLO': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN AMBIENTE Y DESARROLLO',
	//         orientacion: 'AMBIENTE Y DESARROLLO'
	//     },
	//     'DESARROLLO SOCIOECONOMICO Y AMBIENTE': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN DESARROLLO SOCIOECONOMICO Y AMBIENTE',
	//         orientacion: 'DESARROLLO SOCIOECONOMICO Y AMBIENTE'
	//     },
	//     'AGROINDUSTRIA': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN AGROINDUSTRIA',
	//         orientacion: 'AGROINDUSTRIA'
	//     },
	//     7: {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN GESTION DE AGRONEGOCIOS',
	//     },
	//     8: {
	//         programa: '0707',
	//         titulo: 'AGRÓNOMO - PPIA',
	//     },
	//     9: {
	//         programa: '0077',
	//         titulo: 'AGRÓNOMO - PIA',
	//     },
	//     10: {
	//         programa: '0007',
	//         titulo: 'AGRÓNOMO',
	//     }
	// };

	// let orientaciones = document.getElementById('programaActual').value;
	// let programaActual = document.getElementById('orientacion').value;


	// let carreraSeleccionada = carrera[programaActual];
	// let orientation = carreraSeleccionada.titulo;
	// let programa = carreraSeleccionada.programa;
	// let programa = carreraSeleccionada.programa;
	// let titulo = carreraSeleccionada.titulo;

	// console.log(orientation); //Título
	// console.log("-----------");
	// console.log(orientacion);
	// console.log(programa);



	//Validar que el campo tenga algo escrito
	if (nombres === '' || apellidos === '' || clase === '' || dateHB === '' || nationality === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('user_id', user_id);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('nombres', nombres);
		datos.append('firstname', firstname);
		datos.append('secondname', secondname);
		datos.append('apellidos', apellidos);
		datos.append('primerapellido', primerapellido);
		datos.append('segundoapellido', segundoapellido);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('correo1', correo1);
		datos.append('correo2', correo2);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('url_linkedin', url_linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientacion);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('fondos_zamorano', fondos_zamorano);
		datos.append('fondos_propios', fondos_propios);
		datos.append('fondos_entidades', fondos_entidades);
		datos.append('otras_entidades', otras_entidades);

		datos.append('linkedin', linkedin);
		datos.append('fallecido', fallecido);
		datos.append('fechaFallecido', fechaFallecido);
		datos.append('estatus', estatus);
		datos.append('pa', pa);
		datos.append('anioIA', anioIA);
		datos.append('dia_graduacion', dia_graduacion);
		datos.append('mes_graduacion', mes_graduacion);
		datos.append('codigoIA', codigoIA);

		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-solicitud.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Se verificarán los datos y se aprobará la actualización',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							url = '?nombres=' + nombres + '&apellidos=' + apellidos + '&clase=' + clase + '&codigo=' + codigo + '&nacionalidad=' + nationality + '&genero=' + sex;
							window.location = "actualiza-tus-datos.php" + url;
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}
function validarFicha(e) {
	e.preventDefault();

	let horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		nombres = document.querySelector('#nombre_completo').value,
		tipo = document.querySelector('#tipo').value,
		fechanac = document.querySelector('#fechanac').value,
		identidad = document.querySelector('#identidad').value,
		nacionalidad = document.querySelector('#nacionalidad').value,
		genero = document.querySelector('#genero').value,
		estado_civil = document.querySelector('#estado_civil').value,
		pais_reside = document.querySelector('#pais_reside').value,
		direccion = document.querySelector('#direccion').value,
		ciudad = document.querySelector('#ciudad').value,
		departamento = document.querySelector('#departamento').value,
		email = document.querySelector('#correo').value,
		celular = document.querySelector('#celular').value,
		telefono = document.querySelector('#telefono').value,
		dependientes = document.querySelector('#dependientes').value,
		profesion = document.querySelector('#profesion').value,
		empresa_labora = document.querySelector('#empresa_labora').value,
		direccion_empleo = document.querySelector('#direccion_empleo').value,
		telefono_empleo = document.querySelector('#telefono_empleo').value,
		cargo = document.querySelector('#cargo').value,
		tiempo_laborando = document.querySelector('#tiempo_laborando').value,
		sueldos = document.querySelector('#sueldos').value,
		remesas = document.querySelector('#remesas').value,
		otros_ingresos = document.querySelector('#otros_ingresos').value,
		prestamos = document.querySelector('#prestamos').value,
		alquiler = document.querySelector('#alquiler').value,
		otros_egresos = document.querySelector('#otros_egresos').value,
		nombre_conyugue = document.querySelector('#nombre_conyugue').value,
		fechnac_conyugue = document.querySelector('#fechnac_conyugue').value,
		identidad_conyugue = document.querySelector('#identidad_conyugue').value,
		celular_conyugue = document.querySelector('#celular_conyugue').value,
		empresa_labora_conyugue = document.querySelector('#empresa_labora_conyugue').value,
		telefono_empleo_conyugue = document.querySelector('#telefono_empleo_conyugue').value,
		cargo_conyugue = document.querySelector('#cargo_conyugue').value,
		tiempo_laborando_conyugue = document.querySelector('#tiempo_laborando_conyugue').value,
		nombre_referencia_1 = document.querySelector('#nombre_referencia_1').value,
		direccion_referencia_1 = document.querySelector('#direccion_referencia_1').value,
		celular_referencia_1 = document.querySelector('#celular_referencia_1').value,
		telefono_referencia_1 = document.querySelector('#telefono_referencia_1').value,
		empresa_labora_referencia_1 = document.querySelector('#empresa_labora_referencia_1').value,
		telefono_empleo_referencia_1 = document.querySelector('#telefono_empleo_referencia_1').value,
		nombre_referencia_2 = document.querySelector('#nombre_referencia_2').value,
		direccion_referencia_2 = document.querySelector('#direccion_referencia_2').value,
		celular_referencia_2 = document.querySelector('#celular_referencia_2').value,
		telefono_referencia_2 = document.querySelector('#telefono_referencia_2').value,
		empresa_labora_referencia_2 = document.querySelector('#empresa_labora_referencia_2').value,
		telefono_empleo_referencia_2 = document.querySelector('#telefono_empleo_referencia_2').value,
		fecha_pago = document.querySelector('#fecha_pago').value,
		fecha_cuota = document.querySelector('#fecha_cuota').value,
		plazo_pago = document.querySelector('#plazo_pago').value,

		nombre_beneficiario = document.querySelector('#nombre_beneficiario').value,
		genero_beneficiario = document.querySelector('#genero_beneficiario').value,
		identidad_beneficiario = document.querySelector('#identidad_beneficiario').value,
		direccion_beneficiario = document.querySelector('#direccion_beneficiario').value,
		ciudad_beneficiario = document.querySelector('#ciudad_beneficiario').value,
		departamento_beneficiario = document.querySelector('#departamento_beneficiario').value,
		celular_beneficiario = document.querySelector('#celular_beneficiario').value;

	if (nombres === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX
		//Crear  FormData - Datos que se envían al servidor
		console.log('enviar');
		let datos = new FormData();
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('nombres', nombres);
		datos.append('fechanac', fechanac);
		datos.append('identidad', identidad);
		datos.append('nacionalidad', nacionalidad);
		datos.append('genero', genero);
		datos.append('estado_civil', estado_civil);
		datos.append('pais_reside', pais_reside);
		datos.append('direccion', direccion);
		datos.append('ciudad', ciudad);
		datos.append('departamento', departamento);
		datos.append('email', email);
		datos.append('celular', celular);
		datos.append('telefono', telefono);
		datos.append('dependientes', dependientes);
		datos.append('profesion', profesion);
		datos.append('empresa_labora', empresa_labora);
		datos.append('direccion_empleo', direccion_empleo);
		datos.append('telefono_empleo', telefono_empleo);
		datos.append('cargo', cargo);
		datos.append('tiempo_laborando', tiempo_laborando);
		datos.append('sueldos', sueldos);
		datos.append('remesas', remesas);
		datos.append('otros_ingresos', otros_ingresos);
		datos.append('prestamos', prestamos);
		datos.append('alquiler', alquiler);
		datos.append('otros_egresos', otros_egresos);
		datos.append('nombre_conyugue', nombre_conyugue);
		datos.append('fechnac_conyugue', fechnac_conyugue);
		datos.append('identidad_conyugue', identidad_conyugue);
		datos.append('celular_conyugue', celular_conyugue);
		datos.append('empresa_labora_conyugue', empresa_labora_conyugue);
		datos.append('telefono_empleo_conyugue', telefono_empleo_conyugue);
		datos.append('cargo_conyugue', cargo_conyugue);
		datos.append('tiempo_laborando_conyugue', tiempo_laborando_conyugue);
		datos.append('nombre_referencia_1', nombre_referencia_1);
		datos.append('direccion_referencia_1', direccion_referencia_1);
		datos.append('celular_referencia_1', celular_referencia_1);
		datos.append('telefono_referencia_1', telefono_referencia_1);
		datos.append('empresa_labora_referencia_1', empresa_labora_referencia_1);
		datos.append('telefono_empleo_referencia_1', telefono_empleo_referencia_1);
		datos.append('nombre_referencia_2', nombre_referencia_2);
		datos.append('direccion_referencia_2', direccion_referencia_2);
		datos.append('celular_referencia_2', celular_referencia_2);
		datos.append('telefono_referencia_2', telefono_referencia_2);
		datos.append('empresa_labora_referencia_2', empresa_labora_referencia_2);
		datos.append('telefono_empleo_referencia_2', telefono_empleo_referencia_2);
		datos.append('fecha_pago', fecha_pago);
		datos.append('fecha_cuota', fecha_cuota);
		datos.append('plazo_pago', plazo_pago);
		datos.append('nombre_beneficiario', nombre_beneficiario);
		datos.append('genero_beneficiario', genero_beneficiario);
		datos.append('identidad_beneficiario', identidad_beneficiario);
		datos.append('direccion_beneficiario', direccion_beneficiario);
		datos.append('ciudad_beneficiario', ciudad_beneficiario);
		datos.append('departamento_beneficiario', departamento_beneficiario);
		datos.append('celular_beneficiario', celular_beneficiario);

		// for (const archivo of fotos) {
		// 	datos.append('archivos[]', archivo);
		// }

		datos.append('accion', tipo);
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-ficha.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Se verificarán los datos y se aprobará la actualización',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							window.location = "precontrato.php";
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

function asignarLote(e) {
	e.preventDefault();
	if (document.getElementById('lote')) {
		let tipo = document.querySelector('#tipo').value,
			id_user = document.querySelector('#ID').value,
			bloque = document.querySelector('#bloque').value,
			lote = document.querySelector('#lote').value;
		console.log(tipo, id_user, bloque, lote);

		if (lote === '') {
			//validación Falló
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Debe de llenar todos los campos'
			});
		} else {
			//Campos son correctos - Ejecutamos AJAX
			//Crear  FormData - Datos que se envían al servidor
			console.log('enviar');
			let datos = new FormData();
			datos.append('id_user', id_user);
			datos.append('bloque', bloque);
			datos.append('lote', lote);
			datos.append('asignar', tipo);
			//Crear  el llamado a Ajax
			let xhr = new XMLHttpRequest();
			//Abrir la Conexión
			xhr.open('POST', 'includes/models/model-asignar.php', true);

			//Retorno de Datos
			xhr.onload = function () {
				if (this.status === 200) {
					//esta es la respuesta la que tenemos en el model
					// let respuesta = xhr.responseText;
					let respuesta = JSON.parse(xhr.responseText);
					console.log(respuesta);
					if (respuesta.respuesta === 'correcto') {
						//si es un nuevo usuario 
						if (respuesta.tipo == 'asignar') {
							Swal.fire({
								icon: 'success',
								title: '¡Asignación realizada!',
								text: 'Ahora cambia el estado del lote',
								position: 'center',
								showConfirmButton: true

							}).then(function () {
								// urllote = '?ID=' + lote + '&bloque=' + bloque;
								// window.location = "edicion-lote.php" + urllote;
							});;
						}
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Hubo un error en la solicitud'
						})
					}
				}
			}
			// Enviar la petición
			xhr.send(datos);
		}

	} else {
		let id_user = document.querySelector('#ID').value,
			bloque = document.querySelector('#bloque').value;
		console.log(id_user, bloque);
		url = '?ID=' + id_user + '&bloque=' + bloque;
		window.location = "asignar-lote.php" + url;
	}

}


var checkboxes = document.querySelectorAll('input[type=checkbox]');
function checkboxClick(event) {
	const accesorios = document.querySelectorAll('input[type=checkbox]:checked');
	console.log(accesorios)
	if (accesorios.length <= 0) {
		alert("no se encuentra ningún opción marcado");
		console.log('Vacio');
	}
}

for (var i = 0; i < checkboxes.length; i++) {
	checkboxes[i].addEventListener('click', checkboxClick);
}

function validarActualizacionGraduando(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		nombres = document.querySelector('#nombre').value,
		firstname = document.querySelector('#firstname').value,
		secondname = document.querySelector('#secondname').value,
		apellidos = document.querySelector('#apellidos').value,
		primerapellido = document.querySelector('#primerapellido').value,
		segundoapellido = document.querySelector('#segundoapellido').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fecha_nacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		correo1 = document.querySelector('#correo1').value,
		correo2 = document.querySelector('#correo2').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		url_linkedin = document.querySelector('#url_linkedin').value,
		orientacion = document.querySelector('#orientacion').value,
		programa = document.querySelector('#programa').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,
		fondos_zamorano = document.querySelector('#fondos_zamorano').value,
		fondos_propios = document.querySelector('#fondos_propios').value,
		fondos_entidades = document.querySelector('#fondos_entidades').value,
		otras_entidades = document.querySelector('#otras_entidades').value,

		linkedin = document.querySelector('#linkedin').value,
		fallecido = document.querySelector('#fallecido').value,
		fechaFallecido = document.querySelector('#fechaFallecido').value,
		estatus = document.querySelector('#estatus').value,
		pa = document.querySelector('#pa').value,
		anioIA = document.querySelector('#anioIA').value,
		dia_graduacion = document.querySelector('#dia_graduacion').value,
		mes_graduacion = document.querySelector('#mes_graduacion').value,
		codigoIA = document.querySelector('#codigoIA').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	if (codigo == 'N/A') {
		codigo = ''
	}
	if (url_linkedin == '') {
		linkedin = 0;
	} else {
		linkedin = 1;
	}
	let otrasEnti, fondosz, fondosp;
	if (fondos_entidades === '') {
		otrasEnti = 0;
		// document.getElementById('otras_entidades').required = false;
	} else {
		otrasEnti = 1;
		// document.getElementById('otras_entidades').required = true;
	}

	if (fondos_zamorano === '0') {
		fondos_zamorano = '0';
	} else {
		fondos_zamorano = '1';
	}

	if (fondos_propios === '0') {
		fondos_propios = '0';
	} else {
		fondos_propios = '1';
	}

	// let carrera = {
	//     'INGENIERIA AGRONÓMICA': {
	//         programa: '0777',
	//         titulo: 'INGENIERO AGRÓNOMO',
	//         orientacion: 'INGENIERIA AGRONÓMICA'
	//     },
	//     'AGROINDUSTRIA ALIMENTARIA': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN AGROINDUSTRIA ALIMENTARIA',
	//         orientacion: 'AGROINDUSTRIA ALIMENTARIA'
	//     },
	//     'ADMINISTRACION DE AGRONEGOCIOS': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS',
	//         orientacion: 'ADMINISTRACION DE AGRONEGOCIOS'
	//     },
	//     'AMBIENTE Y DESARROLLO': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN AMBIENTE Y DESARROLLO',
	//         orientacion: 'AMBIENTE Y DESARROLLO'
	//     },
	//     'DESARROLLO SOCIOECONOMICO Y AMBIENTE': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN DESARROLLO SOCIOECONOMICO Y AMBIENTE',
	//         orientacion: 'DESARROLLO SOCIOECONOMICO Y AMBIENTE'
	//     },
	//     'AGROINDUSTRIA': {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN AGROINDUSTRIA',
	//         orientacion: 'AGROINDUSTRIA'
	//     },
	//     7: {
	//         programa: '0777',
	//         titulo: 'INGENIERO EN GESTION DE AGRONEGOCIOS',
	//     },
	//     8: {
	//         programa: '0707',
	//         titulo: 'AGRÓNOMO - PPIA',
	//     },
	//     9: {
	//         programa: '0077',
	//         titulo: 'AGRÓNOMO - PIA',
	//     },
	//     10: {
	//         programa: '0007',
	//         titulo: 'AGRÓNOMO',
	//     }
	// };

	// let orientaciones = document.getElementById('programaActual').value;
	// let programaActual = document.getElementById('orientacion').value;


	// let carreraSeleccionada = carrera[programaActual];
	// let orientation = carreraSeleccionada.titulo;
	// let programa = carreraSeleccionada.programa;
	// let programa = carreraSeleccionada.programa;
	// let titulo = carreraSeleccionada.titulo;

	// console.log(orientation); //Título
	// console.log("-----------");
	// console.log(orientacion);
	// console.log(programa);

	// Validación de Checkbox



	//Validar que el campo tenga algo escrito
	const accesorios = document.querySelectorAll('input[type=checkbox]:checked');
	if (accesorios.length <= 0) {
		alert("no se encuentra ningún opción marcado");
		console.log('Vacio');
	} else if (nombres === '' || apellidos === '' || clase === '' || dateHB === '' || nationality === '' || accesorios.length <= 0) {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('user_id', user_id);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('nombres', nombres);
		datos.append('firstname', firstname);
		datos.append('secondname', secondname);
		datos.append('apellidos', apellidos);
		datos.append('primerapellido', primerapellido);
		datos.append('segundoapellido', segundoapellido);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('correo1', correo1);
		datos.append('correo2', correo2);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('url_linkedin', url_linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientacion);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('fondos_zamorano', fondos_zamorano);
		datos.append('fondos_propios', fondos_propios);
		datos.append('fondos_entidades', fondos_entidades);
		datos.append('otras_entidades', otras_entidades);

		datos.append('linkedin', linkedin);
		datos.append('fallecido', fallecido);
		datos.append('fechaFallecido', fechaFallecido);
		datos.append('estatus', estatus);
		datos.append('pa', pa);
		datos.append('anioIA', anioIA);
		datos.append('dia_graduacion', dia_graduacion);
		datos.append('mes_graduacion', mes_graduacion);
		datos.append('codigoIA', codigoIA);

		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-solicitud-graduando.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Se verificarán los datos y se aprobará la actualización',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							url = '?nombres=' + nombres + '&apellidos=' + apellidos + '&clase=' + clase + '&codigo=' + codigo + '&nacionalidad=' + nationality + '&genero=' + sex;
							window.location = "graduandos.php" + url;
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

//-------------------Aprobar Solicitud-------------------
function aprobarSolicitud(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		estado = document.querySelector('#estado').value,
		id_temp = document.querySelector('#id_temp').value,
		nombres = document.querySelector('#nombre').value,
		firstname = document.querySelector('#firstname').value,
		secondname = document.querySelector('#secondname').value,
		apellidos = document.querySelector('#apellidos').value,
		primerapellido = document.querySelector('#primerapellido').value,
		segundoapellido = document.querySelector('#segundoapellido').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fecha_nacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		correo1 = document.querySelector('#correo1').value,
		correo2 = document.querySelector('#correo2').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		url_linkedin = document.querySelector('#url_linkedin').value,
		orientacion = document.querySelector('#orientacion').value,
		programa = document.querySelector('#programa').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,
		fondos_zamorano = document.querySelector('#fondos_zamorano').value,
		fondos_propios = document.querySelector('#fondos_propios').value,
		fondos_entidades = document.querySelector('#fondos_entidades').value,
		otras_entidades = document.querySelector('#otras_entidades').value,

		linkedin = document.querySelector('#linkedin').value,
		fallecido = document.querySelector('#fallecido').value,
		fechaFallecido = document.querySelector('#fechaFallecido').value,
		fechaNotaDuelo = document.querySelector('#fechaNotaDuelo').value,
		estatus = document.querySelector('#estatus').value,
		pa = document.querySelector('#pa').value,
		anioIA = document.querySelector('#anioIA').value,
		dia_graduacion = document.querySelector('#dia_graduacion').value,
		mes_graduacion = document.querySelector('#mes_graduacion').value,
		codigoIA = document.querySelector('#codigoIA').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	// console.log(fallecido);
	// console.log(Date.parse(fechaFallecido));
	estado = 1;
	if (url_linkedin == '') {
		linkedin = 0;
	} else {
		linkedin = 1;
	}
	let otrasEnti, fondosz, fondosp;
	if (fondos_entidades === '') {
		otrasEnti = 0;
		// document.getElementById('otras_entidades').required = false;
	} else {
		otrasEnti = 1;
		// document.getElementById('otras_entidades').required = true;
	}

	if (fondos_zamorano === '0') {
		fondos_zamorano = '0';
	} else {
		fondos_zamorano = '1';
	}

	if (fondos_propios === '0') {
		fondos_propios = '0';
	} else {
		fondos_propios = '1';
	}

	//Validar que el campo tenga algo escrito
	if (nombres === '' || apellidos === '' || clase === '' || nationality === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('user_id', user_id);
		datos.append('id_temp', id_temp);
		datos.append('estado', estado);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('nombres', nombres);
		datos.append('firstname', firstname);
		datos.append('secondname', secondname);
		datos.append('apellidos', apellidos);
		datos.append('primerapellido', primerapellido);
		datos.append('segundoapellido', segundoapellido);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('correo1', correo1);
		datos.append('correo2', correo2);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('url_linkedin', url_linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientacion);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('fondos_zamorano', fondos_zamorano);
		datos.append('fondos_propios', fondos_propios);
		datos.append('fondos_entidades', fondos_entidades);
		datos.append('otras_entidades', otras_entidades);

		datos.append('linkedin', linkedin);
		datos.append('fallecido', fallecido);
		datos.append('fechaFallecido', fechaFallecido);
		datos.append('fechaNotaDuelo', fechaNotaDuelo);
		datos.append('estatus', estatus);
		datos.append('pa', pa);
		datos.append('anioIA', anioIA);
		datos.append('dia_graduacion', dia_graduacion);
		datos.append('mes_graduacion', mes_graduacion);
		datos.append('codigoIA', codigoIA);

		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-aprobar-solicitud.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							const fecha = new Date();
							// const hoy = fecha.getDate();
							const mesActual = fecha.getMonth() + 1;
							// url = '?nombres=' + nombres + '&apellidos=' + apellidos + '&clase=' + clase + '&codigo=' + codigo + '&nacionalidad=' + nationality + '&genero=' + sex;
							// window.location = "buscador-graduado.php" + url;
							window.location = "solicitudes.php?mesSolicitud=" + mesActual;
							window.location = "solicitudes.php";
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}
//-------------------Aprobar Solicitud-------------------
function aprobarSolicitudGraduando(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		estado = document.querySelector('#estado').value,
		id_temp = document.querySelector('#id_temp').value,
		nombres = document.querySelector('#nombre').value,
		firstname = document.querySelector('#firstname').value,
		secondname = document.querySelector('#secondname').value,
		apellidos = document.querySelector('#apellidos').value,
		primerapellido = document.querySelector('#primerapellido').value,
		segundoapellido = document.querySelector('#segundoapellido').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fecha_nacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		correo1 = document.querySelector('#correo1').value,
		correo2 = document.querySelector('#correo2').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		url_linkedin = document.querySelector('#url_linkedin').value,
		orientacion = document.querySelector('#orientacion').value,
		programa = document.querySelector('#programa').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,
		fondos_zamorano = document.querySelector('#fondos_zamorano').value,
		fondos_propios = document.querySelector('#fondos_propios').value,
		fondos_entidades = document.querySelector('#fondos_entidades').value,
		otras_entidades = document.querySelector('#otras_entidades').value,

		linkedin = document.querySelector('#linkedin').value,
		fallecido = document.querySelector('#fallecido').value,
		fechaFallecido = document.querySelector('#fechaFallecido').value,
		fechaNotaDuelo = document.querySelector('#fechaNotaDuelo').value,
		estatus = document.querySelector('#estatus').value,
		pa = document.querySelector('#pa').value,
		anioIA = document.querySelector('#anioIA').value,
		dia_graduacion = document.querySelector('#dia_graduacion').value,
		mes_graduacion = document.querySelector('#mes_graduacion').value,
		codigoIA = document.querySelector('#codigoIA').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	// console.log(fallecido);
	// console.log(Date.parse(fechaFallecido));
	estado = 1;
	if (url_linkedin == '') {
		linkedin = 0;
	} else {
		linkedin = 1;
	}
	let otrasEnti, fondosz, fondosp;
	if (fondos_entidades === '') {
		otrasEnti = 0;
		// document.getElementById('otras_entidades').required = false;
	} else {
		otrasEnti = 1;
		// document.getElementById('otras_entidades').required = true;
	}

	if (fondos_zamorano === '0') {
		fondos_zamorano = '0';
	} else {
		fondos_zamorano = '1';
	}

	if (fondos_propios === '0') {
		fondos_propios = '0';
	} else {
		fondos_propios = '1';
	}

	//Validar que el campo tenga algo escrito
	if (nombres === '' || apellidos === '' || clase === '' || nationality === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('user_id', user_id);
		datos.append('id_temp', id_temp);
		datos.append('estado', estado);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('nombres', nombres);
		datos.append('firstname', firstname);
		datos.append('secondname', secondname);
		datos.append('apellidos', apellidos);
		datos.append('primerapellido', primerapellido);
		datos.append('segundoapellido', segundoapellido);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('correo1', correo1);
		datos.append('correo2', correo2);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('url_linkedin', url_linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientacion);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('fondos_zamorano', fondos_zamorano);
		datos.append('fondos_propios', fondos_propios);
		datos.append('fondos_entidades', fondos_entidades);
		datos.append('otras_entidades', otras_entidades);

		datos.append('linkedin', linkedin);
		datos.append('fallecido', fallecido);
		datos.append('fechaFallecido', fechaFallecido);
		datos.append('fechaNotaDuelo', fechaNotaDuelo);
		datos.append('estatus', estatus);
		datos.append('pa', pa);
		datos.append('anioIA', anioIA);
		datos.append('dia_graduacion', dia_graduacion);
		datos.append('mes_graduacion', mes_graduacion);
		datos.append('codigoIA', codigoIA);

		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-aprobar-solicitud-graduando.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							const fecha = new Date();
							// const hoy = fecha.getDate();
							const mesActual = fecha.getMonth() + 1;
							// url = '?nombres=' + nombres + '&apellidos=' + apellidos + '&clase=' + clase + '&codigo=' + codigo + '&nacionalidad=' + nationality + '&genero=' + sex;
							// window.location = "buscador-graduado.php" + url;
							window.location = "graduandos-solicitudes.php?mesSolicitud=" + mesActual;
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

//-------------------Editar Graduado-------------------
function editarLote(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		bloque = document.querySelector('#bloque').value,
		areav2 = document.querySelector('#areav2').value,
		estado = document.querySelector('#estado').value,
		path = document.querySelector('#path').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	//Validar que el campo tenga algo escrito
	if (areav2 === '' || bloque === '' || estado === '' || path === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('id_register', id_register);
		datos.append('user_id', user_id);
		datos.append('bloque', bloque);
		datos.append('areav2', areav2);
		datos.append('estado', estado);
		datos.append('path', path);
		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {

				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Lote Actualizado!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							url = '?ID=' + user_id + '&bloque=' + bloque;
							window.location = "editar-lote.php" + url;
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}



function editarRegistro(e) {
	e.preventDefault();

	let nombres = document.querySelector('#nombre').value,
	tipo = document.querySelector('#tipo').value,
	id_user = document.querySelector('#user_id').value, 
	fechanac = document.querySelector('#fecha_nacimiento').value,
	identidad = document.querySelector('#identidad').value,
	nacionalidad = document.querySelector('#nacionalidad').value,
	genero = document.querySelector('#genero').value,
	estado_civil = document.querySelector('#estado_civil').value,
	direccion = document.querySelector('#direccion').value,
	ciudad = document.querySelector('#ciudad').value,
	departamento = document.querySelector('#departamento').value,
	email = document.querySelector('#correo').value,
	celular = document.querySelector('#celular').value,
	telefono = document.querySelector('#telefono').value,
	dependientes = document.querySelector('#dependientes').value,
	profesion = document.querySelector('#profesion').value,
	empresa_labora = document.querySelector('#lugar_empleo').value,
	direccion_empleo = document.querySelector('#direccion_empleo').value,
	telefono_empleo = document.querySelector('#telefono_empleo').value,
	cargo = document.querySelector('#cargo').value,
	tiempo_laborando = document.querySelector('#tiempo_laborando').value,
	pais_reside = document.querySelector('#pais_reside').value,
	
	sueldos = document.querySelector('#sueldos').value,
	remesas = document.querySelector('#remesas').value,
	otros_ingresos = document.querySelector('#otros_ingresos').value,
	prestamos = document.querySelector('#prestamos').value,
	alquiler = document.querySelector('#alquiler').value,
	otros_egresos = document.querySelector('#otros_egresos').value,
	
	nombre_conyugue = document.querySelector('#nombre_conyugue').value,
	fechnac_conyugue = document.querySelector('#fechanac_conyugue').value,
	identidad_conyugue = document.querySelector('#identidad_conyugue').value,
	celular_conyugue = document.querySelector('#celular_conyugue').value,
	empresa_labora_conyugue = document.querySelector('#empresa_labora_conyugue').value,
	telefono_empleo_conyugue = document.querySelector('#telefono_empleo_conyugue').value,
	cargo_conyugue = document.querySelector('#cargo_conyugue').value,
	tiempo_laborando_conyugue = document.querySelector('#tiempo_laborando_conyugue').value,

	id_referencia_1 = document.querySelector('#id_referencia_1').value,
	nombre_referencia_1 = document.querySelector('#nombre_referencia_1').value,
	direccion_referencia_1 = document.querySelector('#direccion_referencia_1').value,
	celular_referencia_1 = document.querySelector('#celular_referencia_1').value,
	telefono_referencia_1 = document.querySelector('#telefono_referencia_1').value,
	empresa_labora_referencia_1 = document.querySelector('#empresa_labora_referencia_1').value,
	telefono_empleo_referencia_1 = document.querySelector('#telefono_empleo_referencia_1').value,
	
	id_referencia_2 = document.querySelector('#id_referencia_2').value,
	nombre_referencia_2 = document.querySelector('#nombre_referencia_2').value,
	direccion_referencia_2 = document.querySelector('#direccion_referencia_2').value,
	celular_referencia_2 = document.querySelector('#celular_referencia_2').value,
	telefono_referencia_2 = document.querySelector('#telefono_referencia_2').value,
	empresa_labora_referencia_2 = document.querySelector('#empresa_labora_referencia_2').value,
	telefono_empleo_referencia_2 = document.querySelector('#telefono_empleo_referencia_2').value,
	
	nombre_beneficiario = document.querySelector('#nombre_beneficiario').value,
	genero_beneficiario = document.querySelector('#genero_beneficiario').value,
	identidad_beneficiario = document.querySelector('#identidad_beneficiario').value,
	direccion_beneficiario = document.querySelector('#direccion_beneficiario').value,
	ciudad_beneficiario = document.querySelector('#ciudad_beneficiario').value,
	departamento_beneficiario = document.querySelector('#departamento_beneficiario').value,
	celular_beneficiario = document.querySelector('#celular_beneficiario').value;
	//Validar que el campo tenga algo escrito
	if (nombres === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('id_user', id_user);
		datos.append('nombres', nombres);
		datos.append('fechanac', fechanac);
		datos.append('identidad', identidad);
		datos.append('nacionalidad', nacionalidad);
		datos.append('genero', genero);
		datos.append('estado_civil', estado_civil);
		datos.append('direccion', direccion);
		datos.append('ciudad', ciudad);
		datos.append('departamento', departamento);
		datos.append('email', email);
		datos.append('celular', celular);
		datos.append('telefono', telefono);
		datos.append('dependientes', dependientes);
		datos.append('profesion', profesion);
		datos.append('empresa_labora', empresa_labora);
		datos.append('direccion_empleo', direccion_empleo);
		datos.append('telefono_empleo', telefono_empleo);
		datos.append('cargo', cargo);
		datos.append('tiempo_laborando', tiempo_laborando);
		datos.append('pais_reside', pais_reside);
		datos.append('sueldos', sueldos);
		datos.append('remesas', remesas);
		datos.append('otros_ingresos', otros_ingresos);
		datos.append('prestamos', prestamos);
		datos.append('alquiler', alquiler);
		datos.append('otros_egresos', otros_egresos);
		datos.append('nombre_conyugue', nombre_conyugue);
		datos.append('fechnac_conyugue', fechnac_conyugue);
		datos.append('identidad_conyugue', identidad_conyugue);
		datos.append('celular_conyugue', celular_conyugue);
		datos.append('empresa_labora_conyugue', empresa_labora_conyugue);
		datos.append('telefono_empleo_conyugue', telefono_empleo_conyugue);
		datos.append('cargo_conyugue', cargo_conyugue);
		datos.append('tiempo_laborando_conyugue', tiempo_laborando_conyugue);
		datos.append('id_referencia_1', id_referencia_1);
		datos.append('nombre_referencia_1', nombre_referencia_1);
		datos.append('direccion_referencia_1', direccion_referencia_1);
		datos.append('celular_referencia_1', celular_referencia_1);
		datos.append('telefono_referencia_1', telefono_referencia_1);
		datos.append('empresa_labora_referencia_1', empresa_labora_referencia_1);
		datos.append('telefono_empleo_referencia_1', telefono_empleo_referencia_1);
		datos.append('id_referencia_2', id_referencia_2);
		datos.append('nombre_referencia_2', nombre_referencia_2);
		datos.append('direccion_referencia_2', direccion_referencia_2);
		datos.append('celular_referencia_2', celular_referencia_2);
		datos.append('telefono_referencia_2', telefono_referencia_2);
		datos.append('empresa_labora_referencia_2', empresa_labora_referencia_2);
		datos.append('telefono_empleo_referencia_2', telefono_empleo_referencia_2);
		datos.append('nombre_beneficiario', nombre_beneficiario);
		datos.append('genero_beneficiario', genero_beneficiario);
		datos.append('identidad_beneficiario', identidad_beneficiario);
		datos.append('direccion_beneficiario', direccion_beneficiario);
		datos.append('ciudad_beneficiario', ciudad_beneficiario);
		datos.append('departamento_beneficiario', departamento_beneficiario);
		datos.append('celular_beneficiario', celular_beneficiario);
		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar-registro.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {

				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Registro Actualizado!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							url = '?nombres=' + nombres + '&identidad=' + identidad;
							window.location = "editar-perfil.php" + url;
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

// Mantiene abierto el input entidades
if (document.getElementById('fondos_entidades')) {

	var checkBox = document.getElementById('fondos_entidades').value;
	let text = document.getElementById('endidades');
	if (checkBox == 1) {
		text.style.display = 'initial';
		checkBox = document.getElementById('fondos_entidades').checked = true;
		checkBox = document.getElementById('fondos_entidades').value = 1;
		checkBox = document.getElementById('otras_entidades').required = true;
	} else {
		text.style.display = 'none';
		checkBox = document.getElementById('fondos_entidades').checked = false;
		checkBox = document.getElementById('fondos_entidades').value = 0;
	}
}


//Cambiar valor de check al dar click y poder enviar
function chequeado(id_checkbox) {
	let id = document.getElementById(id_checkbox).checked;
	if (id == true) {
		document.getElementById(id_checkbox).value = 1;
	} else {
		document.getElementById(id_checkbox).value = 0;
	}
}

function entidades() {
	let checkBox = document.getElementById('fondos_entidades').checked;
	let text = document.getElementById('endidades');
	if (checkBox == true) {
		text.style.display = 'initial';
		checkBox = document.getElementById('fondos_entidades').value = 1;
		checkBox = document.getElementById('fondos_entidades').checked = true;
		checkBox = document.getElementById('otras_entidades').required = true;

	} else {
		text.style.display = 'none';
		checkBox = document.getElementById('fondos_entidades').value = 0;
		checkBox = document.getElementById('fondos_entidades').checked = false;
		checkBox = document.getElementById('otras_entidades').required = false;
		checkBox = document.getElementById('otras_entidades').value = '';

	}
}
//acciones de solicitudes cambia estado o elimina
function eliminarFoto(e) {
	// e.preventDefault();

	// console.log('click de acciones listado');
	// console.log(e.target);
	//Delegation
	// if (e.target.classList.contains('fa-check-circle')) {
	// 	if (e.target.classList.contains('completo')) {
	// 		e.target.classList.remove('completo');
	// 		cambiarEstadoSolicitud(e.target, 0);
	// 	} else {
	// 		e.target.classList.add('completo');
	// 		cambiarEstadoSolicitud(e.target, 1);
	// 	}
	// }
	// condicion de eliminar con alert
	if (e.target.classList.contains('fa-trash')) {
		Swal.fire({
			title: 'Borrar fotografía',
			text: "Esta acción no se puede deshacer",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, borrar!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				let solicitudEliminar = e.target.parentElement;
				eliminarSolicitudDB(solicitudEliminar, null);
				Swal.fire(
					'Eliminado!',
					'La fotografía fue eliminada!.',
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

function eliminarSolicitudDB(solicitudEliminar, estado) {
	let id_foto = document.getElementById('id_foto').value;
	//Crear llamado a AJAX
	let xhr = new XMLHttpRequest();

	//información FormData
	let datos = new FormData();
	datos.append('id_foto', id_foto);
	datos.append('accion', 'eliminarFoto');
	datos.append('estado', estado);

	// Open la conexión
	xhr.open('POST', 'includes/models/eliminar-img.php', true)

	//on load
	xhr.onload = function () {
		if (this.status === 200) {
			// console.log(JSON.parse(xhr.responseText));
		}
	}
	//Enviar la petición
	xhr.send(datos);
}


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
	dd = '0' + dd
}
if (mm < 10) {
	mm = '0' + mm
}
today = yyyy + '-' + mm + '-' + dd;

function opcionFallecido() {
	let optionFallecido = document.querySelector('#fallecido').value;
	let text = document.getElementById('fallecidoInput');
	let fechaNotaDuelo = document.getElementById('fechaNotaDuelo');
	// console.log(optionFallecido);
	if (optionFallecido == 1) {
		text.style.display = 'flex';
		fechaNotaDuelo.style.display = '';
		document.getElementById('fechaFallecido').required = true;
	} else if (optionFallecido == 0) {
		document.getElementById('fechaFallecido').value = '';
		document.getElementById('fechaNotaDuelo').value = today;
		document.getElementById('fechaFallecido').required = false;
		text.style.display = 'none';
		fechaNotaDuelo.style.display = 'none';
	}
}
// console.log(today);
if (document.getElementById("fechaFallecido") && document.getElementById("fechaNotaDuelo")) {
	document.getElementById("fechaFallecido").setAttribute("max", today);
	document.getElementById("fechaNotaDuelo").setAttribute("max", today);
}


if (document.querySelector('#fallecido')) {
	// Mantiene abierto el input Fallecido
	let optionFallecido1 = document.querySelector('#fallecido').value;
	let divFecha = document.getElementById('fallecidoInput');
	if (divFecha) {
		// console.log(optionFallecido1);
		if (optionFallecido1 == 1) {
			divFecha.style.display = '';
			document.getElementById('fechaFallecido').required = true;
			// console.log(divFecha);
		} else if (optionFallecido1 == 0) {
			document.getElementById('fechaFallecido').required = false;
			divFecha.style.display = 'none';
		}
	}
}

// function to calculate hours in days
function calculatehoursindays() {
	let hours = document.getElementById('horas').value;
	let days = document.getElementById('dias').value;
	let hoursinDays = hours / days;
	document.getElementById('horasDias').value = hoursinDays;

}
