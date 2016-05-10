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
      );

     $validaciones = array('pregunta' => array('required','regex:/^([a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\_\s\,\.\:\;\¿\?\¡\!])+$/'));

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
            ));

            $preagre = $data['pregunta'];
           // $preagre = '46';


              if ( $insert ){

                 $seleccionar=preCuesController::getPreId($preagre);
              //  preCuesController::getPreId("46");
                $response = array(
                  'status' => 'OK',
                  'message' => 'Pregunta agregada correctamente.',
                  'data' => $seleccionar
                  );

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

  public static function getPreId($pregunta){
    # code...
    $ID = DB::select('SELECT preId FROM preguntas WHERE prePregunta = "'.$pregunta.'";');
      return $ID;
  }

}