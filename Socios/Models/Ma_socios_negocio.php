<?php
//Métodos CRUD
class Ma_socios_negocio extends Conectar{

    public function get_socios(){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_socios_negocios";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_socio($id){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_socios_negocios WHERE estado=1 AND id= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_socio($ID,$NOMBRE,$RAZON_SOCIAL,
      $DIRECCION,$TIPO_SOCIO,$CONTACTO,$EMAIL,$FECHA_CREADO,$ESTADO,$TELEFONO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="INSERT INTO ma_socios_negocios(ID,NOMBRE,RAZON_SOCIAL,
        DIRECCION,TIPO_SOCIO,CONTACTO,EMAIL,FECHA_CREADO,ESTADO,TELEFONO) 
        VALUES(?,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID);
        $sql->bindValue(2,$NOMBRE); 
        $sql->bindValue(3,$RAZON_SOCIAL);
        $sql->bindValue(4,$DIRECCION);
        $sql->bindValue(5,$TIPO_SOCIO);
        $sql->bindValue(6,$CONTACTO);
        $sql->bindValue(7,$EMAIL);
        $sql->bindValue(8,$FECHA_CREADO);
        $sql->bindValue(9,$ESTADO);
        $sql->bindValue(10,$TELEFONO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Delete_Socio($ID){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="DELETE FROM `g6_19`.`ma_socios_negocios` WHERE (`ID` = ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Update_Socio($ID,$NOMBRE,$RAZON_SOCIAL,
     $DIRECCION,$TIPO_SOCIO,$CONTACTO,$EMAIL,$FECHA_CREADO,$ESTADO,$TELEFONO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="UPDATE ma_socios_negocios SET
        NOMBRE= ?,
        RAZON_SOCIAL = ?,
        DIRECCION = ?,
        TIPO_SOCIO = ?,
        CONTACTO = ?,
        EMAIL = ?,
        FECHA_CREADO = ?,
        ESTADO = ?,
        TELEFONO= ?
        WHERE (`ID` = ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NOMBRE);
        $sql->bindValue(2,$RAZON_SOCIAL);
        $sql->bindValue(3,$DIRECCION);
        $sql->bindValue(4,$TIPO_SOCIO);
        $sql->bindValue(5,$CONTACTO);
        $sql->bindValue(6,$EMAIL);
        $sql->bindValue(7,$FECHA_CREADO);
        $sql->bindValue(8,$ESTADO);
        $sql->bindValue(9,$TELEFONO);
        $sql->bindValue(10,$ID);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>