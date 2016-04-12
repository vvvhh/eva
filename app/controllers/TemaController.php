<?php
  class TemaController extends BaseController{

    public function temAgregar(){ /**INGRESO Tema**/
        if( !Sesion::isAdmin() )
        return Redirect::to('administracion/logout');

      $token = Input::get('token');

      if(isset($token)) {
        $data = array(
          'tema' => Input::get('tema'),
        );

       $validaciones = array('tema' => array('required','regex:/^([0-9a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\s\,\.\?\¿\¡\!])+$/')
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
          $duplicado = temas::where('temTema',$data['tema'])
            ->get()
            ->toArray();

            if ( count( $duplicado ) > 0 )
              return Response::json(array(
              'status' => 'Error',
              'message' => 'Ya existe un tema con el mismo nombre, verifique'
            ));

            else{
              $insert = Temas::insert(array(
                'temTema' => trim($data['tema']),
                'temActivo' => true
              ));

            if ( $insert ){
              $response = array(
                'status' => 'OK',
                'message' => 'Tema agregado correctamente.');
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

// --------------------------------  SUBTEMAS  --------------------------------- //
public function subAgregar(){ /**INGRESO Subtema**/
        if( !Sesion::isAdmin() )
        return Redirect::to('administracion/logout');

      $token = Input::get('token');

      if(isset($token)) {
        $data = array(
          'subtema' => Input::get('subtema'),
        );

       $validaciones = array('subtema' => array('required','regex:/^([0-9a-zA-ñÑZáéíóúñÁÉÍÓÚ\-\s\,\.\?\¿\¡\!])+$/')
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
          $duplicado = subtema::where('subTema',$data['subtema'])
            ->get()
            ->toArray();

            if ( count( $duplicado ) > 0 )
              return Response::json(array(
              'status' => 'Error',
              'message' => 'Ya existe un subtema con el mismo nombre, verifique'
            ));

            else{
              $insert = subtema::insert(array(
                'subTema' => trim($data['subtema']),
                'subActivo' => true
              ));

            if ( $insert ){
              $response = array(
                'status' => 'OK',
                'message' => 'Subtema agregado correctamente.');
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
?>