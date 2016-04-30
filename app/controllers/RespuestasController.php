<?php

class RespuestasController extends BaseController{

  public function agregarRes(){ /**INGRESO Servicio**/
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');

    $token = Input::get('token');

    if(isset($token)) {
      $data = array(
        'respuesta1' => Input::get('pregunta1'),
        'resAc1' => Input::get('resAc1'),
        'respuesta2' => Input::get('pregunta2'),
        'resAc2' => Input::get('resAc2'),
        'respuesta3' => Input::get('pregunta3'),
        'resAc3' => Input::get('resAc3'),
        'respuesta4' => Input::get('pregunta4'),
        'resAc4' => Input::get('resAc4'),
        'respuesta5' => Input::get('pregunta5'),
        'resAc5' => Input::get('resAc5')
      );

     $validaciones = array('respuesta1' => array('required','regex:/^([a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\_\s\,\.\:\;\¿\?\¡\!])+$/'));

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

        $duplicado = respuesta::where('resRespuesta',$data['respuesta1'])
          ->where('resRespuesta',$data['respuesta2'])
          ->where('resRespuesta',$data['respuesta3'])
          ->where('resRespuesta',$data['respuesta4'])
          ->where('resRespuesta',$data['respuesta5'])
          ->get()
          ->toArray();

          if ( count( $duplicado ) > 0 )
            return Response::json(array(
            'status' => 'Error',
            'message' => 'Ya existen estas respuestas, verifique'
          ));
          else{
            $insert = preguntas::insert(array(
              'resRespuesta' => trim($data['pregunta1']),
              'resActivo' => trim($data['preActiva1']),
              'resRespuesta' => trim($data['pregunta2']),
              'resActivo' => trim($data['preActiva2']),
              'resRespuesta' => trim($data['pregunta3']),
              'resActivo' => trim($data['preActiva3']),
              'resRespuesta' => trim($data['pregunta']),
              'resActivo' => trim($data['preActiva4']),
              'resRespuesta' => trim($data['pregunta5']),
              'resActivo' => trim($data['preActiva5'])
            ));

              if ( $insert ){
                $response = array(
                  'status' => 'OK',
                  'message' => 'Respuestas agregadas correctamente.');

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
}