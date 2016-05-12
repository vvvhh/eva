<?php

class CuestionarioController extends BaseController{
/**INGRESO DE CUESTIONARIO**/
  public function ingresoCuestionario(){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');

    $token = Input::get('token');

    if(isset($token)) {
      $data = array(
        'fecha' => Input::get('fecha'),
        'tema' => Input::get('tema'),
        'subtema' => Input::get('subtema'),  //para subtema
        'nombre' => Input::get('nombre'),
        'fechaEla' => Input::get('fechaEla'),
        'datosActivo' => Input::get('datosActivo')
      );

     $validaciones = array('nombre' => array('required','regex:/^([0-9a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\s\,\.\?\¿\¡\!])+$/')
     );

     $validator = Validator::make($data , $validaciones);

     if ($validator->fails()){
        $respuesta;
        $mensajes = $validator->messages();
        foreach ($mensajes->all() as $mensaje){
            $respuesta = $mensaje;
        }

          $response = array(
            'status' => 'ERROR F',
            'message' => $respuesta
          );
      }
      else{

        $duplicado = cuestionarios::where('cueFechaEla',$data['fechaEla'])
          ->where('cueFechaAp',$data['fecha'])
          ->where('cueNombre',$data['nombre'])
          ->get()
          ->toArray();

          if ( count( $duplicado ) > 0 )
            return Response::json(array(
            'status' => 'Error',
            'message' => 'Ya existe un cuestionario con el mismo nombre, verifique'
          ));
          else{
            $insert = cuestionarios::insert(array(
              'cueSubtema' => trim($data['subtema']),
              'cueFechaAp' => trim($data['fecha']),
              'cueFechaEla'=> trim($data['fechaEla']),
              'cueNombre' => trim($data['nombre']),
              'cueActivo' => trim($data['datosActivo'])
            ));

              if ( $insert ){
                $response = array(
                  'status' => 'OK',
                  'message' => 'Cuestionario agregado correctamente.');

              }
              else
                $response = array(
                  'status' => 'ERROR',
                  'message' => 'No se pudo realizar el registro, intente de nuevo'
                );
          }

      }
    }

    else{
      $response = array(
        'status' => 'ERROR',
        'message' => 'Vuelva a intentar en un momento'
      );
    }
    return Response::json( $response );
  }

 /**DAR DE BAJA CUESTIONARIO*/
  public function darBajaCues(){   
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $token = Input::get('token');

      if(isset($token)) {
        $data = array(
          'id' => Input::get('i')
        );

       $validaciones = array('id' => array('required', 'alpha_num')
       );

       $validator = Validator::make($data , $validaciones);

       if ($validator->fails()){
          $respuesta;
          $mensajes = $validator->messages();
          foreach ($mensajes->all() as $mensaje){
              $respuesta = $mensaje;
          }

            $response = array(
              'status' => 'ERROR',
              'message' => $respuesta
            );
        }
        else{
              $editar = cuestionarios::where('cueId', $data['id']) 
                ->update(array(
                  'cueActivo' => false
                ));

              if ( $editar )
                $response = array(
                  'status' => 'OK',
                  'message' => 'Fuente actualizado'
                  );
              else
                $response = array (
                  'status' => 'ERROR',
                  'message' => 'No se puede actualizar la fuente, intente de nuevo'
                  );
            }
      }

      else{
        $response = array(
          'status' => 'ERROR',
          'message' => 'Vuelva a intentar en un momento'
        );
      }
      return Response::json( $response );
  }
/**EDITAR DATOS DEL CUESTIONARIO**/
public function editarCues(){ 
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $token = Input::get('token');

      if(isset($token)) {
        $data = array(
          'fecha' => Input::get('fecha'),
          'fechaEla' => Input::get('fechaEla'),
          'tema' => Input::get('tema'),
          'subtema' => Input::get('subtema'),
          'nombre' => Input::get('nombre'),
          'activo' => Input::get('activo'),
          'i' => Input::get('i')
        );

     $validaciones = array('nombre' => array('required', 'regex:/^([0-9a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\s\,\.\?\¿\¡\!])+$/'),
                           'activo'     => array('required', 'boolean')
       );

       $validator = Validator::make($data , $validaciones);

       if ($validator->fails()){
          $respuesta;
          $mensajes = $validator->messages();
          foreach ($mensajes->all() as $mensaje){
              $respuesta = $mensaje;
          }
            $response = array(
              'status' => 'ERROR',
              'message' => $respuesta
            );
        }
        else{
              $editar = cuestionarios::where('cueId', $data['i'])
                ->update(array(
                  'cueFechaAp' => $data['fecha'],
                  'cueFechaEla' => $data['fechaEla'],
                  'cueSubtema'=> $data['subtema'],
                  'cueNombre' => $data['nombre'],
                  'cueActivo' => $data['activo']
                ));

              if ( $editar )
                $response = array(
                  'status' => 'OK',
                  'message' => 'Datos actualizados'
                  );
              else
                $response = array (
                  'status' => 'ERROR',
                  'message' => 'No se pueden actualizar los datos, intente de nuevo'
                  );
            }
      }

      else{
        $response = array(
          'status' => 'ERROR',
          'message' => 'Vuelva a intentar en un momento'
        );
      }
      return Response::json( $response );
  }  

  /***********************/
  public function getCuestionarioConsultas(){
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $seleccionar=CuestionarioController::getCuetionarioConsultas();

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron cuestionario registrados.'
        );

      return Response::json($response);
  }
  /*****************/
  static public function getCuetionarioConsultas(){
       $seleccionar = DB::select('SELECT c.cueId, c.cueNombre, c.cueFechaAp, c.cueFechaEla, c.cueActivo, t.temId, t.temTema, s.subId, s.subSubtema FROM cuestionarios c, temas t, subtema s WHERE c.cueSubtema = s.subId AND s.subTema = t.temId');
      return $seleccionar;
  }

//tabla para mostrar cuestionario completo
public function getCuesT(){
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $seleccionar=CuestionarioController::getCueT();

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron fuentes registradas.'
        );

      return Response::json($response);
  }
  /*****************/
  static public function getCueT(){
   /* $seleccionar = cuestionarios::get()
      ->toArray();*/
      $seleccionar = DB::select('SELECT c.cueId, c.cueNombre, c.cueSubtema, s.subId, s.subSubtema, t.temId, t.temTema, p.prePregunta FROM cuestionarios c, temas t, subtema s, preguntas p WHERE c.cueSubtema = s.subId AND s.subTema = t.temId ');
      return $seleccionar;
  }
//     SECCION DE ACTIVO
  public function getActivoFuentes(){
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $seleccionar = DB::select('SELECT fueId, fueNombre FROM fuentes WHERE fueActivo = true;');

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron fuentes registradas.'
        );

      return Response::json($response);
  }


  /****Selecciona un servicio*****/
  public function getCues(){
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $data = Input::all();

      $seleccionar=DB::select('SELECT s.subId, s.subSubtema, t.temId, t.temTema, c.cueId, c.cueNombre, c.cueFechaAp, c.cueFechaEla, c.cueActivo, c.cueSubtema FROM cuestionarios c, temas t, subtema s WHERE c.cueSubtema = s.subId AND s.subTema = t.temId');

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron cuestionarios registradas.'
        );

      return Response::json($response);
  }

  public function getFuentesSesion(){

      $data = Input::all();
      $format = "Y-m-d";
      $timestamp = time();
      $fechaHoy =  date($format, $timestamp);

    $seleccionar=DB::select('SELECT f.fueId, f.fueNombre FROM fuentes f, asignaciones a, periodos p WHERE a.asiResponsables = '.$data['i'].' AND a.asiFuentes=f.fueId AND a.asiPeriodos = p.perId AND p.perInicio <= "'.$fechaHoy.'" AND p.perFin >= "'.$fechaHoy.'";');


      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron fuentes registradas.'
        );

      return Response::json($response);
  }

public function getTema(){
   $seleccionar = DB::select('SELECT temId, temTema FROM temas WHERE temActivo=1');

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron temas registrados.'
        );

      return Response::json($response);

}

public function getSubtema(){
   $seleccionar = DB::select('SELECT s.subId, s.subSubtema, s.subTema, t.temId  FROM subtema s, temas t WHERE temId = subTema');

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron subtemas registrados.'
        );

      return Response::json($response);

}

public function getTipo(){
   $seleccionar = DB::select('SELECT preTipos FROM tipos');

      if ( count( $seleccionar ) > 0 )
        $response = array(
          'status' => 'OK',
          'data' => $seleccionar,
          'message' => 'Resultados obtenidos'
        );
      else
        $response = array(
          'status' => 'ERROR',
          'message' => 'No se encontraron tipos registrados.'
        );

      return Response::json($response);

}

}

