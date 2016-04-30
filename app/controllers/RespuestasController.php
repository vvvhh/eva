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
        //'tiempo' => Input::get('tiempo'),
        //'idResponsable' => Input::get('idResponsable'),
      );

     $validaciones = array('respuesta' => array('required','regex:/^([a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\_\s\,\.\:\;\¿\?\¡\!])+$/'));

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
        where('resRespuesta',$data['respuesta2'])
        where('resRespuesta',$data['respuesta3'])
        where('resRespuesta',$data['respuesta4'])
        where('resRespuesta',$data['respuesta5'])
          ->get()
          ->toArray();

          if ( count( $duplicado ) > 0 )
            return Response::json(array(
            'status' => 'Error',
            'message' => 'Ya existe esta pregunta, verifique'
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