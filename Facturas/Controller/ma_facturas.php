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
require_once("../../Facturas/Models/Ma_facturas.php");

$ma_facturas=new  Ma_facturas();
$body=json_decode(file_get_contents("php://input"),true);
switch ($_GET["op"]){

    case "GetFacturas":
        $datos=$ma_facturas->get_facturas();
        echo json_encode($datos);
    break;

    case "GetFactura":
        $datos=$ma_facturas->get_factura($body["id"]);
        echo json_encode($datos);
        
    break;

    case "InsertFactura":
        $datos=$ma_facturas->insert_factura($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],
        $body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
        echo json_encode("Nuevo registro agregado correctamente");
    break;

    case "UpdateFactura":
        $datos=$ma_facturas->update_factura($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],
        $body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
        echo json_encode("Nuevo registro ACTUALIZADO correctamente");
    break;

    case "EliminarFactura":
        $datos=$ma_facturas->Delete_factura($body["ID"]);
        echo json_encode("Registro eliminado correctamente");
      break;


}
?>