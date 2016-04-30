<?php

//Route::get('/', array('uses' => 'RssController@rssInicio'));
Route::post('/login', array('uses' => 'UsuarioController@login'));
Route::post('/loginA', array('uses' => 'UsuarioController@loginA'));
Route::post('/loginU', array('uses' => 'UsuarioController@loginU'));
Route::post('/ingresoNoticia', array('uses' => 'NoticiasController@ingresoNoticia'));
Route::post('/getNoticiasIngreso', array('uses' => 'NoticiasController@getNoticiasIngreso'));
Route::post('/getFuentesSesion', array('uses' => 'CuestionarioController@getFuentesSesion'));
Route::post('/getTodosTemas', array('uses' => 'CuestionarioController@getActivosTemas'));

Route::post('/getNoticiasSesion', array('uses' => 'NoticiasController@getNoticiasSesion'));
Route::post('/getNoticia', array('uses' => 'NoticiasController@getNoticia'));
Route::post('/elimiarNoticia', array('uses' => 'NoticiasController@elimiarNoticia'));
Route::post('/editarNot', array('uses' => 'NoticiasController@editarNot'));

Route::post('/finalizarNot', array('uses' => 'NoticiasController@finalizarNot'));


Route::get('/', function(){
	return View::make('inicio');
});

/*Route::get('/', function(){
	return View::make('sesion');
});*/

Route::get('/inicio2', function(){
	return View::make('inicio2');
});

Route::get('/inicioU', function(){
	return View::make('inicioU');
});

Route::get('/repSesPeriodo', function(){
	return View::make('repSesPeriodo');
});
Route::post('/repPeriodo', array('uses' => 'NoticiasController@repPeriodo'));

Route::get('/repSesFuente', function(){
	return View::make('repSesFuente');
});
Route::post('/getCuestionarioConsultas', array('uses' => 'CuestionarioController@getCuestionarioConsultas'));
Route::post('/repFuente', array('uses' => 'NoticiasController@repFuente'));
Route::post('/repFuentePer', array('uses' => 'NoticiasController@repFuentePer'));

	/*ADMINISTRACION*/
	Route::group(array('prefix' => 'administracion', 'before' => 'administracion'), function()
		{
			Route::get('/', function(){
				return View::make('administracion.principalAd');
			});
			Route::get('logout', array('uses' => 'UsuarioController@logout'));

			Route::get('/fueAgregar', function(){
				return View::make('administracion.fueAgregar');
			});
			Route::get('/cueAgregar', function(){
				return View::make('administracion.cueAgregar');
			});
			Route::get('/cueEditar', function(){
				return View::make('administracion.cueEditar');
			});
			Route::get('/cueConsulta', function(){
				return View::make('administracion.cueConsulta');
			});

			Route::get('/temAgregar', function(){
				return View::make('administracion.temAgregar');
			});

			Route::get('/subAgregar', function(){
				return View::make('administracion.subAgregar');
			});

			Route::get('/preCues', function(){
				return View::make('administracion.preCues');
			});

			Route::get('/resAgregar', function(){
				return View::make('administracion.resAgregar');
			});

			Route::get('/resEditar', function(){
				return View::make('administracion.resEditar');
			});

			Route::get('/intAgregar', function(){
				return View::make('administracion.intAgregar');
			});

			Route::get('/intEditar', function(){
				return View::make('administracion.intEditar');
			});

			Route::get('/asiAgregar', function(){
				return View::make('administracion.asiAgregar');
			});

			Route::get('/asiEditar', function(){
				return View::make('administracion.asiEditar');
			});

			Route::get('/perAgregar', function(){
				return View::make('administracion.perAgregar');
			});

			Route::get('/temTema', function(){
				return View::make('administracion.cueEditar');
			});

			/*Route::get('/vista', function(){
				return View::make('administracion.cueConsulta');
			});*/

			Route::get('/previsualizar', function(){
				return View::make('administracion.previsualizar');
			});
			Route::get('/prevSimplificada', function(){
				return View::make('administracion.prevSimplificada');
			});
			Route::get('/prevGeneral', function(){
				return View::make('administracion.prevGeneral');
			});

			Route::get('/repPeriodo', function(){
				return View::make('administracion.repPeriodo');
			});

			Route::get('/invitados', function(){
				return View::make('administracion.invitados');
			});

			Route::get('/repFuente', function(){
				return View::make('administracion.repFuente');
			});

			Route::get('/repRepresentante', function(){
				return View::make('administracion.repRepresentante');
			});

			Route::post('/ingresoCuestionario', array('uses' => 'CuestionarioController@ingresoCuestionario'));
			Route::post('/agregarPre', array('uses' => 'preCuesController@agregarPre'));
			Route::post('/agregarRes', array('uses' => 'RespuestasController@agregarRes'));
			Route::post('/getCuestionarioConsultas', array('uses' => 'CuestionarioController@getCuestionarioConsultas'));
			Route::post('/getCues', array('uses' => 'CuestionarioController@getCues'));
			Route::get('/mostrarTema', array('uses' => 'TemaController@mostrarTema'));
			Route::get('/getCuesT', array('uses' => 'CuestionarioController@getCueT'));
			Route::get('/getTema', array('uses' => 'CuestionarioController@getTema'));
			Route::get('/getSubtema', array('uses' => 'CuestionarioController@getSubtema'));
			Route::get('/getTipo', array('uses' => 'CuestionarioController@getTipo'));
			Route::post('/temAgregar', array('uses' => 'TemaController@temAgregar'));
			Route::post('/subAgregar', array('uses' => 'TemaController@subAgregar'));
			Route::post('/editarCues', array('uses' => 'CuestionarioController@editarCues'));
			Route::post('/preCues', array('uses' => 'CuestionarioController@preCues'));
			Route::post('/darBajaCues', array('uses' => 'CuestionarioController@darBajaCues'));
			Route::get('/imprimirFuentes', array('uses' => 'PdfController@imprimirFuentes'));

			Route::post('/ingresoResponsable', array('uses' => 'ResponsableController@ingresoResponsable'));
			Route::post('/getTodosResponsables', array('uses' => 'ResponsableController@getTodosResponsables'));
			Route::post('/getRepresentante', array('uses' => 'ResponsableController@getRepresentante'));
			Route::post('/editarRepresentante', array('uses' => 'ResponsableController@editarRepresentante'));
			Route::post('/darBajaRepresentante', array('uses' => 'ResponsableController@darBajaRepresentante'));
			Route::get('/imprimirRepresentantes', array('uses' => 'PdfController@imprimirRepresentantes'));

			Route::post('/ingresoIntegrante', array('uses' => 'IntegrantesController@ingresoIntegrante'));
			Route::post('/getTodosIntegrantes', array('uses' => 'IntegrantesController@getTodosIntegrantes'));
			Route::post('/getIntegrante', array('uses' => 'IntegrantesController@getIntegrante'));
			Route::post('/getActivoResponsables', array('uses' => 'ResponsableController@getActivoResponsables'));
			Route::post('/editarIntegrante', array('uses' => 'IntegrantesController@editarIntegrante'));
			Route::post('/darBajaIntegrante', array('uses' => 'IntegrantesController@darBajaIntegrante'));

			Route::post('/getActivoFuentes', array('uses' => 'FuenteController@getActivoFuentes'));

			Route::post('/ingresoAsignacion', array('uses' => 'AsignacionesController@ingresoAsignacion'));
	//		Route::post('/editarAsignacion', array('uses' => 'AsignacionesController@ingresoAsignacion'));
			Route::post('/getTodosAsignaciones', array('uses' => 'AsignacionesController@getTodosAsignaciones'));
			Route::post('/getAsignacion', array('uses' => 'AsignacionesController@getAsignacion'));
			Route::post('/editarAsignacion', array('uses' => 'AsignacionesController@editarAsignacion'));
			Route::post('/getAsignaciones', array('uses' => 'AsignacionesController@getAsignaciones'));
			Route::get('/getAsignacionActual', array('uses' => 'AsignacionesController@getAsignacionActual'));

			Route::post('/getTodosPeriodos', array('uses' => 'PeriodosController@getTodosPeriodos'));
			Route::post('/ingresoPeriodo', array('uses' => 'PeriodosController@ingresoPeriodo'));
			Route::post('/seleccionarPeriodo', array('uses' => 'PeriodosController@seleccionarPeriodo'));
			Route::post('/editarPeriodo', array('uses' => 'PeriodosController@editarPeriodo'));
			Route::post('/darBajaPeriodo', array('uses' => 'PeriodosController@darBajaPeriodo'));

			Route::post('/getPeriodoActivo', array('uses' => 'PeriodosController@getPeriodoActivo'));

			Route::post('/getNoticiasPrev', array('uses' => 'NoticiasController@getNoticiasPrev'));
			Route::post('/getPrevSimplificada', array('uses' => 'NoticiasController@getPrevSimplificada'));

			Route::post('/getNoticia', array('uses' => 'NoticiasController@getNoticia'));
			Route::post('/editarNot', array('uses' => 'NoticiasController@editarNot'));
			Route::post('/elimiarNoticia', array('uses' => 'NoticiasController@elimiarNoticia'));
			Route::get('/getNoticiasIngresadas', array('uses' => 'NoticiasController@getNoticiasIngresadas'));

			Route::get('/getHora', array('uses' => 'AdmController@getHora'));
			Route::post('/editarHora', array('uses' => 'AdmController@editarHora'));


			Route::post('/repPeriodo', array('uses' => 'NoticiasController@repPeriodo'));
			Route::post('/repFuente', array('uses' => 'NoticiasController@repFuente'));
			Route::post('/repFuentePer', array('uses' => 'NoticiasController@repFuentePer'));
			Route::post('/repRepre', array('uses' => 'NoticiasController@repRepre'));
			Route::post('/repReprePer', array('uses' => 'NoticiasController@repReprePer'));
			Route::get('/getPeriodoResponsable', array('uses' => 'NoticiasController@getPeriodoResponsable'));

			Route::post('/enviarRecordatorio', array('uses' => 'CorreoController@enviarRecordatorio'));

			Route::post('/ingresoInvitado', array('uses' => 'InvitadosController@ingresoInvitado'));
			Route::post('/getTodosInvitados', array('uses' => 'InvitadosController@getTodosInvitados'));
			Route::post('/getInvitado', array('uses' => 'InvitadosController@getInvitado'));
			Route::post('/editarInvitado', array('uses' => 'InvitadosController@editarInvitado'));
			Route::post('/darBajaInvitado', array('uses' => 'InvitadosController@darBajaInvitado'));

			Route::post('/enviarAhora', array('uses' => 'CorreoController@enviarAhora'));

			Route::get('/imprimirAsignaciones', array('uses' => 'PdfController@imprimirAsignaciones'));
			Route::get('/imprimirAsignacionesA', array('uses' => 'PdfController@imprimirAsignacionesA'));
			Route::get('/enviarAsignacionesA', array('uses' => 'CorreoController@enviarAsignacionesA'));

			Route::get('/imprimirEquipos', array('uses' => 'PdfController@imprimirEquipos'));
			Route::get('/enviarEquipos', array('uses' => 'CorreoController@enviarEquipos'));

		});
