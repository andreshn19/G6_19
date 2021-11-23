<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
    die();
    }
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');


        // Case según método elegido
        require_once("../../Config/Conexion.php");
        require_once("../../Socios/Models/Ma_socios_negocio.php");
        $ma_socios=new  Ma_socios_negocio();
        $body=json_decode(file_get_contents("php://input"),true);
    switch ($_GET["op"]){

        case "GetSocios":
         $datos=$ma_socios->get_socios();
            echo json_encode($datos);
        break;

        case "GetSocio":
            $datos=$ma_socios->get_socio($body["id"]);
            echo json_encode($datos);
        break;

        case "InsertSocio":
            $datos=$ma_socios->insert_socio($body["ID"],$body["NOMBRE"],$body["RAZON_SOCIAL"],
         $body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"], $body["TELEFONO"]);
         echo json_encode("Socio Insertados");
        break;
  
        case "DeleteSocio":
         $datos=$ma_socios->Delete_socio($body["ID"]);
         echo json_encode("Socios Eliminado");
        break;

        case "UpdateSocio":
            $datos=$ma_socios->Update_Socio($body["ID"],$body["NOMBRE"],$body["RAZON_SOCIAL"],
            $body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],
            $body["ESTADO"], $body["TELEFONO"]);
            echo json_encode("Socio Actualizado");
        break;

    }
?>