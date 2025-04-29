<?php
require_once("logica/Persona.php");
require_once("persistencia/Conexion.php");
require_once("persistencia/MedicoDAO.php");

class Medico extends Persona {
    private $foto;
    private $especialidad;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $especialidad = ""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this -> foto = $foto;
        $this -> especialidad = $especialidad;
    }
    
    public function getEspecialidad(){
        return $this -> especialidad;
    }

    public function consultarPorEspecialidad(){
        $conexion = new Conexion();
        $medicoDAO = new MedicoDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($medicoDAO -> consultarPorEspecialidad($this -> especialidad -> getId()));
        $medicos = array();
        while (($datos = $conexion->registro()) != null) {
            $medico = new Medico(
                $datos[0], // id
                $datos[1], // nombre
                $datos[2], // apellido
                $datos[3], // correo
                "",
                "",
                $this -> especialidad
            );
            array_push($medicos, $medico);
        }
        $conexion->cerrar();
        return $medicos;
    }
}
