<?php
  class CuestionarioController extends BaseController{

    public function getActivoTemas(){
      /*  if( !Sesion::isResponsable() ){
          if( !Sesion::isAdmin() )
          return Redirect::to('administracion/logout');
        }
    */
          $seleccionar = DB::select('SELECT * FROM temas WHERE temActivo=true;');

          if ( count( $seleccionar ) > 0 )
            $response = array(
              'status' => 'OK',
              'data' => $seleccionar,
              'message' => 'Resultados obtenidos'
            );
          else
            $response = array(
              'status' => 'ERROR',
              'message' => 'No se encontraron representantes registrados.'
            );

          return Response::json($response);
      }
  }
?>