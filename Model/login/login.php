<?php
  require_once '../../models/conexion.php';
   class UsuarioModel{
      static public function getUsuarioModel($datosModel,  $tabla){

          $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombreUsuario = :nombreUsuario && password = :password");
          $sql->execute( array(
            ':nombreUsuario'=>$datosModel['nombreUsuario'],
            ':password'=>$datosModel['password'],
            ));
        $res=  $sql->fetch();
        if ($res !== false) {
          $fechaSesion = date('Y-m-d H:i:s');
       $sql=Conexion::conectar()->prepare("UPDATE $tabla SET fechaSesion=:fechaSesion, estado = 1 WHERE idUsuario = :idUsuario");
       $sql->execute(array(
         // ':ultimaVez'=>$res['fechaSesion'],
         ':fechaSesion'=>$fechaSesion,
         ':idUsuario'=>$res['idUsuario']
     ));
        }

     if ($res['estado'] == 1 ) {
       $sql=null;
       // return 'conectado';
     }
       $sql=null;

       return $res;



}
          static public function getUsuarioSesionModel($nombre,  $tabla){

              $sql = Conexion::conectar()->prepare("SELECT estado FROM $tabla WHERE nombreUsuario = :nombreUsuario");
              $sql->execute( array(
                ':nombreUsuario'=>$nombre));
            $res=  $sql->fetch();
            $sql =null;
            return $res;

   	  }
      static public function getUsuarioSesion1Model($id,  $tabla){

          $sql = Conexion::conectar()->prepare("SELECT ultimaVez FROM $tabla WHERE idUsuario = :idUsuario");
          $sql->execute( array(
            ':idUsuario'=>$id));
        $res=  $sql->fetch();
        $sql =null;
        return md5($res['ultimaVez']);

  }

      static public function getUsuarioSesionOutModel($nombre,  $tabla){
        $fechaOut = date('Y-m-d H:i:s');
          $sql = Conexion::conectar()->prepare("UPDATE  $tabla SET estado = 0 , ultimaVez=:ultimaVez WHERE nombreUsuario = :nombreUsuario");
          $sql->execute( array(
            ':nombreUsuario'=>$nombre,
            ':ultimaVez'=>$fechaOut));
            $sql = null;
        return 'success';

  }


        static public function getUsuariosModel( $tabla){

            $sql = Conexion::conectar()->prepare("SELECT nombreUsuario FROM $tabla  WHERE estado = 1");
            $sql->execute();
            $res = $sql->fetchAll();
            $sql = null;
          return $res;

    }

   }
 ?>
