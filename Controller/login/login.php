<?php

  require_once '../cabezera.php';
  require_once '../../models/login/login.php';

  class UsuarioController{
       public static function getUsuarioController(){

       $data = file_get_contents("php://input");
       $request = json_decode($data);
       $request = (array) $request;
         $nombre =$request['nombreUsuario'];
         $password =$request['password'];
         $passwordHash = md5($password);
         $datosController = array('nombreUsuario' => $nombre,
                 'password' => $passwordHash,
             );
         $respuesta = UsuarioModel::getUsuarioModel($datosController, 'user');

           // $token='1234CTCSANTJOAN2019';
           // $token = md5($token);
           // array_push($respuesta, $token);
           echo  json_encode($respuesta);

       }


       public static function getUsuarioSesionController(){

       $data = file_get_contents("php://input");
       $request = json_decode($data);
       $request = (array) $request;
         $nombre =$request['nombreUsuario'];
         $respuesta = UsuarioModel::getUsuarioSesionModel($nombre, 'user');
           echo  json_encode($respuesta) ;

       }
       public static function getUsuarioSesion1Controller(){

       $data = file_get_contents("php://input");
       $request = json_decode($data);
       $request = (array) $request;
         $id =$request['id'];
         $respuesta = UsuarioModel::getUsuarioSesion1Model($id, 'user');
           echo  json_encode($respuesta) ;

       }

       public static function getUsuarioSesionOutController(){

       $data = file_get_contents("php://input");
       $request = json_decode($data);
       $request = (array) $request;
         $nombre =$request['nombreUsuario'];
         $respuesta = UsuarioModel::getUsuarioSesionOutModel($nombre, 'user');
           echo  json_encode($respuesta) ;

       }
     public static function getUsuariosController(){
           $respuesta = UsuarioModel::getUsuariosModel('user');
             echo  json_encode($respuesta) ;

     }


}


// instancias de classes

if(isset($_GET['id'])){
   if ($_GET['id'] == "getUsuarios") {
      $usuario = new UsuarioController;
      $usuario->getUsuarioController();
   }
   if ($_GET['id'] == "conectados") {
      $usuario = new UsuarioController;
      $usuario->getUsuariosController();
   }

   if ($_GET['id'] == "sesion") {
      $usuario = new UsuarioController;
      $usuario->getUsuarioSesionController();
   }
   if ($_GET['id'] == "sesion1") {
      $usuario = new UsuarioController;
      $usuario->getUsuarioSesion1Controller();
   }

   if ($_GET['id'] == "sesionOut") {
      $usuario = new UsuarioController;
      $usuario->getUsuarioSesionOutController();
   }
}


 ?>
