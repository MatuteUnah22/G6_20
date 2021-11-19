<?php

class Facturas extends Conectar{

    public function get_Facturas(){
        $Conectar = parent::Conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_facturas WHERE ESTADO = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

    }

    public function get_Factura($ID){
        $Conectar= parent::Conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_facturas WHERE ESTADO = 1 AND ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $ID);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
    }

    public function Insertar_Facturas($NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUBTOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO){
        $Conectar= parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO ma_facturas(ID,NUMERO_FACTURA,ID_SOCIO,FECHA_FACTURA,DETALLE,SUBTOTAL,TOTAL_ISV,TOTAL,FECHA_VENCIMIENTO,ESTADO)
        VALUES (NULL,?,?,?,?,?,?,?,?,'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NUMERO_FACTURA);
        $sql->bindValue(2,$ID_SOCIO); 
        $sql->bindValue(3,$FECHA_FACTURA);
        $sql->bindValue(4,$DETALLE);
        $sql->bindValue(5,$SUBTOTAL);
        $sql->bindValue(6,$TOTAL_ISV);
        $sql->bindValue(7,$TOTAL);
        $sql->bindValue(8,$FECHA_VENCIMIENTO);
        
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
    }

    public function Eliminar_Factura($ID){
        $Conectar = parent::Conexion();
        parent::set_names();
        $sql="DELETE  FROM ma_facturas WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $ID);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

    }

    public function Actualizar_Facturas($ID, $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA, $DETALLE, $SUBTOTAL, $TOTAL_ISV, $TOTAL, $FECHA_VENCIMIENTO, $ESTADO){            
        $Conectar = parent::Conexion();
        parent::set_names();
        $sql="UPDATE ma_facturas 
            SET NUMERO_FACTURA=?, ID_SOCIO=?, FECHA_FACTURA=?, DETALLE=?, SUBTOTAL=?, TOTAL_ISV=?, TOTAL=?, FECHA_VENCIMIENTO=?, ESTADO=? 
            WHERE ID =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NUMERO_FACTURA);
        $sql->bindValue(2, $ID_SOCIO); 
        $sql->bindValue(3, $FECHA_FACTURA);
        $sql->bindValue(4, $DETALLE);
        $sql->bindValue(5, $SUBTOTAL);
        $sql->bindValue(6, $TOTAL_ISV);
        $sql->bindValue(7, $TOTAL);
        $sql->bindValue(8, $FECHA_VENCIMIENTO);
        $sql->bindValue(9, $ESTADO);
        $sql->bindValue(10, $ID);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
    }
}

?>