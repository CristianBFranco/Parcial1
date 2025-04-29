<?php
require("persistencia/Conexion.php");
require("persistencia/MedicoDAO.php");
require("persistencia/PacienteDAO.php");
require("persistencia/ConsultorioDAO.php");

class Cita {
    private $idCita;
    private $fecha;
    private $hora;
    private $pacienteNombre;
    private $pacienteApellido;
    private $medicoNombre;
    private $medicoApellido;
    private $consultorioNombre;

    public function __construct($idCita=0, $fecha="", $hora="", $pacienteNombre="", $pacienteApellido="", $medicoNombre="", $medicoApellido="", $consultorioNombre="") {
        $this->idCita = $idCita;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->pacienteNombre = $pacienteNombre;
        $this->pacienteApellido = $pacienteApellido;
        $this->medicoNombre = $medicoNombre;
        $this->medicoApellido = $medicoApellido;
        $this->consultorioNombre = $consultorioNombre;
    }


    public function getIdCita() {
        return $this->idCita;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getPacienteNombre() {
        return $this->pacienteNombre;
    }

    public function getPacienteApellido() {
        return $this->pacienteApellido;
    }

    public function getMedicoNombre() {
        return $this->medicoNombre;
    }

    public function getMedicoApellido() {
        return $this->medicoApellido;
    }

    public function getConsultorioNombre() {
        return $this->consultorioNombre;
    }

   
    public function consultar() {
        $conexion = new Conexion();
        $citaDAO = new CitaDAO();
        $conexion->abrir();
        $conexion->ejecutar($citaDAO->consultar()); 
        $citas = array();
        
    
        while (($datos = $conexion->registro()) != null) {
            $cita = new Cita(
                $datos['idCita'],
                $datos['fecha'],
                $datos['hora'],
                $datos['paciente_nombre'],
                $datos['paciente_apellido'],
                $datos['medico_nombre'],
                $datos['medico_apellido'],
                $datos['consultorio_nombre']
            );
            array_push($citas, $cita);
        }
        
      
        $conexion->cerrar();
        
        return $citas;
    }
    
}
?>