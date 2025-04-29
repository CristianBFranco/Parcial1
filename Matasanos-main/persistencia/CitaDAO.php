<?php
class CitaDAO {
    private $idCita;
    private $fecha;
    private $hora;
    private $pacienteNombre;
    private $pacienteApellido;
    private $medicoNombre;
    private $medicoApellido;
    private $consultorioNombre;

   
    public function __construct($idCita = 0, $fecha = "", $hora = "", $pacienteNombre = "", $pacienteApellido = "", $medicoNombre = "", $medicoApellido = "", $consultorioNombre = "") {
        $this->idCita = $idCita;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->pacienteNombre = $pacienteNombre;
        $this->pacienteApellido = $pacienteApellido;
        $this->medicoNombre = $medicoNombre;
        $this->medicoApellido = $medicoApellido;
        $this->consultorioNombre = $consultorioNombre;
    }

    
    public function consultar() {
        return "SELECT 
                    C.idCita, C.fecha, C.hora, 
                    P.nombre AS paciente_nombre, P.apellido AS paciente_apellido, 
                    M.nombre AS medico_nombre, M.apellido AS medico_apellido, 
                    Co.nombre AS consultorio_nombre
                FROM Cita C
                JOIN Paciente P ON C.Paciente_idPaciente = P.idPaciente
                JOIN Medico M ON C.Medico_idMedico = M.idMedico
                JOIN Consultorio Co ON C.Consultorio_idConsultorio = Co.idConsultorio
                ORDER BY C.fecha ASC, C.hora ASC";
    }
}
?>
