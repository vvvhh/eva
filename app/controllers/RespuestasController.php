<?php

class RespuestasController extends BaseController{

  public function agregarRes(){ /**INGRESO Servicio**/
      if( !Sesion::isAdmin() )
      return Redirect::to('administracion/logout');

    $token = Input::get('token');

    if(isset($token)) {
      $data = array(
        'respuesta1' => Input::get('respuesta1'),
        'resAc1' => Input::get('resAc1'),
        'respuesta2' => Input::get('respuesta2'),
        'resAc2' => Input::get('resAc2'),
        'respuesta3' => Input::get('respuesta3'),
        'resAc3' => Input::get('resAc3'),
        'respuesta4' => Input::get('respuesta4'),
        'resAc4' => Input::get('resAc4'),
        'respuesta5' => Input::get('respuesta5'),
        'resAc5' => Input::get('resAc5')
      );

     $validaciones = array('respuesta1');

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

        $duplicado = respuestas::where('resRespuesta',$data['respuesta1'])
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
            if ($data['respuesta1']!="") {
              # code...
              $insert = respuestas::insert(array(
              'resRespuesta' => trim($data['respuesta1']),
              'resActivo' => trim($data['resAc1']),
              'resPreguntas' => trim($data['pregunta'])
            ));
            }
            if ($data['respuesta2']!="") {
              # code...
              $insert2 = respuestas::insert(array(
                'resRespuesta' => trim($data['respuesta2']),
                'resActivo' => trim($data['resAc2']),
                'resPreguntas' => trim($data['pregunta'])
              ));
            }
            if ($data['respuesta3']!="") {
              # code...
              $insert3 = respuestas::insert(array(
                'resRespuesta' => trim($data['respuesta3']),
                'resActivo' => trim($data['resAc3']),
                'resPreguntas' => trim($data['pregunta'])
              ));
            }
            if ($data['respuesta4']!="") {
              # code...
              $insert4 = respuestas::insert(array(
                'resRespuesta' => trim($data['respuesta4']),
                'resActivo' => trim($data['resAc4']),
                'resPreguntas' => trim($data['pregunta'])
              ));
            }
            if ($data['respuesta5']!="") {
              # code...
              $insert5 = respuestas::insert(array(
                'resRespuesta' => trim($data['respuesta5']),
                'resActivo' => trim($data['resAc5']),
                'resPreguntas' => trim($data['pregunta'])
              ));
            }

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