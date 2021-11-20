<?php 
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Articulos.php");
    $articulos = new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET ["opciones"]){

        case "GetArticulos":
            $datos=$articulos->get_articulos();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$articulos->get_articulo($body["ID"]);
            echo json_encode($datos);  

        break;
            
        case "InsertArticulos":
            $datos=$articulos->insert_articulos($body["DESCRIPCION"], $body["UNIDAD"], $body["COSTO"], $body["PRECIO"], $body["APLICA_ISV"], $body["PORCENTAJE_ISV"],$body["ESTADO"], $body["ID_SOCIO"]);
            echo json_encode("Su articulo ha sido agregado Correctamente.");
        break;

        case "UpdateArticulos":
            $datos=$articulos->update_articulos($body["ID"], $body["DESCRIPCION"], $body["UNIDAD"], $body["COSTO"], $body["PRECIO"], $body["APLICA_ISV"], $body["PORCENTAJE_ISV"],$body["ESTADO"], $body["ID_SOCIO"]);
            echo json_encode("Su articulo ha sido actualizado Correctamente.");
        break;

        case "DeleteArticulos":
            $datos=$articulos->delete_articulos($body["ID"]);
            echo json_encode("Su articulo ha sido eliminado Correctamente.");
        break;

    }

?>