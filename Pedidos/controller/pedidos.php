<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    };       
    
    header('Content-Type: application/json');
    

    require_once("../config/conexion.php");
    require_once("../models/Pedidos.php");
    $pedidos = new Pedidos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET ["opciones"]){

        case "GetPedidos":
            $datos=$pedidos->get_pedidos();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$pedidos->get_pedido($body["ID"]);
            echo json_encode($datos);  

        break;
            
        case "InsertPedidos":
            $datos=$pedidos->insert_pedidos($body["ID_SOCIO"], $body["FECHA_PEDIDO"], $body["DETALLE"], $body["SUB_TOTAL"], $body["TOTAL_ISV"], $body["TOTAL"],$body["FECHA_ENTREGA"], $body["ESTADO"]);
            echo json_encode("Pedido Agregado Correctamente!!!.");
        break;

        case "UpdatePedidos":
            $datos=$pedidos->update_pedidos($body["ID"], $body["ID_SOCIO"], $body["FECHA_PEDIDO"], $body["DETALLE"], $body["SUB_TOTAL"], $body["TOTAL_ISV"], $body["TOTAL"],$body["FECHA_ENTREGA"], $body["ESTADO"]);
            echo json_encode("Pedido Actualizado Correctamente!!!.");
        break;

        case "DeletePedidos":
            $datos=$pedidos->delete_pedidos($body["ID"]);
            echo json_encode("Pedido Eliminado Correctamente!!!.");
        break;
    }

?>