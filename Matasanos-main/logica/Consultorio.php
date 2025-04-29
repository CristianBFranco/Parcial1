<?php

class Consultorio {
    private $id;
    private $nombre;
    private $direccion; 
    public function __construct($id = 0, $nombre = "", $direccion = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

   
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

   
    public function consultar() {
        $conexion = new Conexion();
        $conexion->abrir();
        
        $consultorioDAO = new ConsultorioDAO();
        $consultaSQL = $consultorioDAO->consultar();
        
        $conexion->ejecutar($consultaSQL);
        
        $consultorios = array();
        
        while (($datos = $conexion->registro()) != null) {
            $consultorio = new Consultorio(
                $datos['idConsultorio'],
                $datos['nombre'],
                $datos['direccion']
            );
            array_push($consultorios, $consultorio);
        }
        
        $conexion->cerrar();
        
        return $consultorios;
    }
}

?>
