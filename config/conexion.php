<?php
    class Conectar{

        protected $dbh;

        protected function Conexion(){
            
            try {
                //cuando se coloca el simbolo de '$' sera una variable 34.68.196.220
                $Conectar = $this->dbh = new PDO("mysql:host=34.68.196.220;dbname=g6_20","G6_20","dAG0h3zR");
                return $Conectar;

            } catch (Exception $e) {
                print "¡Error BD!: " .$e->getMessage() . "<br/>";
                die();
            }

        }

        public function set_names(){

            return $this->dbh->query("SET NAMES 'utf8'");

        }

    }
?>