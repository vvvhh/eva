<?php

class CuestionarioController extends BaseController{

  public function ingresoCuestionario(){ /**INGRESO Servicio**/
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');

    $token = Input::get('token');

    if(isset($token)) {
      $data = array(
        'fecha' => Input::get('fecha'),
        'tema' => Input::get('tema'),
        //'subtema' => Input::get('subtema'),  para subtema
        'nombre' => Input::get('nombre')
        //'tiempo' => Input::get('tiempo'),
        //'idResponsable' => Input::get('idResponsable'),
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

        $duplicado = cuestionarios::where('cueFechaAp',$data['fecha'])
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
              'cueFechaAp' => trim($data['fecha']),
              //'cueSubTema'=> $data['subTema'],
              'cueNombre' => trim($data['nombre'])
              //'cueTiempo'=> $data['tiempo'],
              //'cueSubTema'=> $data['subTema'],
              //'cueResponsables'=> $data['idResponsable']
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

 /**DAR BAJA SERVICIO*/
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

/**EDITAR SERVICIO*****/
public function editarCues(){ 
    if( !Sesion::isResponsable() ){
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');
    }

      $token = Input::get('token');

      if(isset($token)) {
        $data = array(
          'fecha' => Input::get('fecha'),
          'tema' => Input::get('tema'),
          //'subTema' => Input::get('subTema'),
          'nombre' => Input::get('nombre'),
          //'tiempo' => Input::get('tiempo'),
          'activo' => Input::get('activo'),
          //'idResponsable' => Input::get('idResponsable'),
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
                  //'cueTema' => $data['tema'],
                  //'cueSubTema'=> $data['subTema'],
                  'cueNombre' => $data['nombre'],
                  //'cueTiempo'=> $data['tiempo'],
                  'cueActivo' => $data['activo']
                  //'cueResponsables'=> $data['idResponsable']
                ));

              if ( $editar )
                $response = array(
                  'status' => 'OK',
                  'message' => 'Fuente actualizada'
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
          'message' => 'No se encontraron fuentes registradas.'
        );

      return Response::json($response);
  }
  /*****************/
  static public function getCuetionarioConsultas(){
    $seleccionar = cuestionarios::get()
      ->toArray();
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

      $seleccionar = cuestionarios::where('cueId',$data['i'])
        ->get()
        ->toArray();

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

  public function getFuentesSesion(){

      $data = Input::all();
      $format = "Y-m-d";
      $timestamp = time();
      $fechaHoy =  date($format, $timestamp);

    //    $seleccionar=DB::select('SELECT f.fueId, f.fueNombre FROM fuentes f, asignaciones a WHERE a.asiResponsables = '.$data['i'].' AND a.asiFuentes=f.fueId;');
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
   $seleccionar = DB::select('SELECT * FROM temas WHERE temActivo=1');

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

}

