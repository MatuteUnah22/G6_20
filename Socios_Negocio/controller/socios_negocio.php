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

     require_once("../config/conexion.php");
     require_once("../Socios_Negocio/models/socios_negocio.php");
     $socios_negocio = new Socios_negocio();

     $body = json_decode(file_get_contents("php://input"), true);

     switch($_GET["opciones"]){
         case "GETSocios_negocio":
            $datos=$socios_negocio->get_socios_negocio();
            echo json_encode($datos);
          break;
          
          case "GetUno":
            $datos=$socios_negocio->getsocio_negocio($body["ID"]);
            echo json_encode($datos);
            break;

          case "InsertSocios_negocio":
                $datos=$socios_negocio->insert_socios_negocio($body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
                echo json_encode("Socios de negocio Agregado");
                break;
                
      
          case "ActualizarSocios_negocio":
                $datos=$socios_negocio->actualizar_socios_negocio($body["ID"],$body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
                echo json_encode("socio de negocio actualizado");
          break;
 
          case "EliminarSocios_negocio":
            $datos=$socios_negocio->eliminar_socios_negocio($body["ID"]);
            echo json_encode("Socio de negocio Eliminado");
            break;
     }
?>