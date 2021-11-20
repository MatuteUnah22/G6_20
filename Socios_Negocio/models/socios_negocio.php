<?php
//codiigo de las funciones
class Socios_negocio  extends conectar{
 
      public function get_socios_negocio(){
          $conectar= parent::conexion();
          parent::set_names();
          $sql="SELECT * FROM ma_socios_negocio WHERE ESTADO = 0";
          $sql=$conectar->prepare($sql);
          $sql->execute();
          return $resultado=$sql ->fetchAll(PDO::FETCH_ASSOC);
      }

      public function getsocio_negocio($id){
          $conectar=parent::conexion();
          parent::set_names();
          $sql="SELECT * FROM ma_socios_negocio WHERE ESTADO=0 AND ID = ?";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $id);
          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
       }

       public function insert_socios_negocio($NOMBRE,$RAZON_SOCIAL,$DIRECCION,$TIPO_SOCIO,$CONTACTO,$EMAIL,$FECHA_CREADO,$ESTADO,$TELEFONO){
           $conectar=parent::conexion();
           parent::set_names();
           $sql="INSERT INTO ma_socios_negocio(ID,NOMBRE,RAZON_SOCIAL,DIRECCION,TIPO_SOCIO,CONTACTO,EMAIL,FECHA_CREADO,ESTADO,TELEFONO)
           VALUES (NULL,?,?,?,?,?,?,?,?,?);";
           $sql=$conectar->prepare($sql);
           $sql->bindValue(1, $NOMBRE);
           $sql->bindValue(2, $RAZON_SOCIAL);
           $sql->bindValue(3, $DIRECCION);
           $sql->bindValue(4, $TIPO_SOCIO);
           $sql->bindValue(5, $CONTACTO);
           $sql->bindValue(6, $EMAIL);
           $sql->bindValue(7, $FECHA_CREADO);
           $sql->bindValue(8, $ESTADO);
           $sql->bindValue(9, $TELEFONO);
           $sql->execute();
           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
       }

       public function actualizar_socios_negocio($id,$NOMBRE,$RAZON_SOCIAL,$DIRECCION,$TIPO_SOCIO,$CONTACTO,$EMAIL,$FECHA_CREADO,$ESTADO,$TELEFONO){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_socios_negocio SET NOMBRE=?, RAZON_SOCIAL=?, DIRECCION=?, TIPO_SOCIO=?, CONTACTO=?, EMAIL=?,FECHA_CREADO=?, ESTADO=?, TELEFONO=? WHERE  ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NOMBRE);
        $sql->bindValue(2, $RAZON_SOCIAL);
        $sql->bindValue(3, $DIRECCION);
        $sql->bindValue(4, $TIPO_SOCIO);
        $sql->bindValue(5, $CONTACTO);
        $sql->bindValue(6, $EMAIL);
        $sql->bindValue(7, $FECHA_CREADO);
        $sql->bindValue(8, $ESTADO);
        $sql->bindValue(9, $TELEFONO);
        $sql->bindValue(10, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar_socios_negocio($id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM ma_socios_negocio WHERE  ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }

}

?>