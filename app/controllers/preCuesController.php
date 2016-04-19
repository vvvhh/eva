<?php

class preCuesController extends BaseController{

  public function agregarPre(){ /**INGRESO Servicio**/
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');

    $token = Input::get('token');

    if(isset($token)) {
      $data = array(
        'pregunta' => Input::get('pregunta'),
        'preActiva' => Input::get('preActiva')
        //'tiempo' => Input::get('tiempo'),
        //'idResponsable' => Input::get('idResponsable'),
      );

     $validaciones = array('pregunta' => array('required','regex:/^([a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\_\s\,\.\:\;\¿\?\¡\!])+$/0123456789'));

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

        $duplicado = preguntas::where('prePregunta',$data['pregunta'])
          ->get()
          ->toArray();

          if ( count( $duplicado ) > 0 )
            return Response::json(array(
            'status' => 'Error',
            'message' => 'Ya existe esta pregunta, verifique'
          ));
          else{
            $insert = preguntas::insert(array(
              'prePregunta' => trim($data['pregunta']),
              'preActivo' => trim($data['preActiva'])
              //'cueTiempo'=> $data['tiempo'],
              //'cueSubTema'=> $data['subTema'],
              //'cueResponsables'=> $data['idResponsable']
            ));

              if ( $insert ){
                $response = array(
                  'status' => 'OK',
                  'message' => 'Pregunta agregada correctamente.');

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
}