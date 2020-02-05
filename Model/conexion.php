<?php
date_default_timezone_set('Europe/Madrid');
    class Conexion{
    	static public  function conectar(){
    	 // try {
       //      $conexion = new PDO('mysql:host=localhost;dbname=u411111488_mag','u411111488_juli',
       //      	'chavalote');
       //      $conexion->exec('SET CHARACTER SET ut8');
       //      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //      return $conexion;
       //
       //  } catch (Exception $e) {
       //      echo "Error de Conexion" . $e->getMessage();
       //      echo "Error de Conexion" . $e->getLine();
       //  }
       $conexion= new PDO('mysql:host=localhost;dbname=ctcsantjoans', 'root', '');
       $conexion->exec('SET CHARACTER SET UTF8');
        return $conexion;
    	}
    }

    // $sql = Conexion::conectar()->prepare("SELECT * FROM palet ta
    //      INNER JOIN categoriapalet cat ON ta.idCategoria= cat.idCategoria
    //      INNER JOIN stockpalet st ON ta.idPalet= st.idPalet
    //      INNER JOIN materiales ma ON ma.idMaterial = cat.idMaterial
    //      INNER JOIN proveedores pro ON ma.idProveedor = pro.idProveedor
    //      ORDER BY cat.nombreCategoria DESC , ta.ancho ASC LIMIT 0,5
    //    ");
    // $sql->execute();
    // $res = $sql->fetchAll();
    // if ($res) {
    //    echo $res;
    // }else{
    //   echo 'error';
    // }

 ?>
