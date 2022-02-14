<?php /**
 *
 */
class Masistencia extends CI_Model
{
  public function listar() 
  {
    $hoy = date("Y-m-d");
    // Este listar obtiene el personal que no tenga inasistencia ni asistencia el dia de hoy, ni permisos validados y justificaciones en la fecha  
    $sql = "SELECT t1.* FROM personal t1 INNER JOIN horario t2 WHERE t2.horario_id NOT IN(SELECT (SELECT t5.horario_id FROM personal_cumple_inasistencia t5 WHERE t5.Cod_inasist = t4.Cod_inasist) as horario_id_inasistencia FROM inasistencia t4 WHERE t4.Fecha_inasist = '$hoy') AND t2.horario_id NOT IN(SELECT (SELECT t6.horario_id FROM personal_lleva_horario t6 WHERE t6.Cod_hor_asist = t7.Cod_hor_asist )
    as horario_id FROM asistencia t7 WHERE t7.Fecha = '$hoy') 
    AND t1.C_I NOT IN(SELECT (SELECT t6.C_I FROM personal_tiene_justificacion t6 WHERE t6.Cod_just = t7.Cod_just)
    as C_I_justificacion FROM justificacion t7 WHERE t7.Fecha_just = '$hoy') AND t1.C_I
	  NOT IN(SELECT (SELECT t8.C_I FROM personal_solicita_permiso t8 WHERE t8.Cod_perm = t9.Cod_perm) as C_permiso
    FROM permiso t9 WHERE '$hoy' BETWEEN t9.fecha_inicio AND t9.fecha_culm )
     AND t1.C_I = t2.C_I"; 

    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function compruebe_ci_permiso($ci)
  {
    $hoy = date("Y-m-d");
    // Comprueba si una cedula de identidad tiene personal 
    $sql = "SELECT t1.Cod_perm,(SELECT t2.fecha_culm FROM permiso t2 WHERE t2.fecha_culm < '$hoy') as fecha FROM personal_solicita_permiso t1 WHERE t1.C_I = '$ci'";
    $res = $this->db->query($sql);
    if ($res->num_rows() >= 1) {
      return false;
    } else {
      return true;
    }
  }

  public function listar_inasistentes()
  {
    $fecha = date('Y-m-d');
    // Lista  a un personal que tenga una inasistencia el dia de hoy  
    $sql = "SELECT *,(SELECT CONCAT(P_nombre,' ',P_apellido) FROM personal t3 WHERE t3.C_I = t1.C_I ) as Nombre FROM horario t1 INNER JOIN personal_cumple_inasistencia t2
    WHERE t2.Cod_inasist IN(
    SELECT t4.Cod_inasist FROM inasistencia t4 WHERE Fecha_inasist = '$fecha'  AND t2.Cod_inasist = t4.Cod_inasist)";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function listar_asistencia()
  {
    // Lista a un  personal que tenga una asistencia el dia de hoy 
      $fecha = date('Y-m-d');
      $sql = "SELECT *,(SELECT CONCAT(P_nombre,' ',P_apellido) FROM personal t3 WHERE t3.C_I = t1.C_I ) as Nombre FROM horario t1 INNER JOIN personal_lleva_horario t2
      WHERE t2.Cod_hor_asist IN(
      SELECT t4.Cod_hor_asist FROM asistencia t4 WHERE t4.Fecha = '$fecha'  AND t2.Cod_hor_asist = t4.Cod_hor_asist)";
      $res = $this->db->query($sql);
      if ($res) {
        return $res->result();
      } else {
        return false;
      }
  }
  // Insertar datos de asistencia
  public function ins_datos_asistencia($datos)
  {
    if ($this->db->insert('asistencia',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
  // inserta datos en tabla personal lleva horario

  public function ins_personal_lleva_horario($datos)
  {
    if ($this->db->insert('personal_lleva_horario',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
  // inserta los datos de inasistencia 
  public function ins_datos_inasistencia($datos)
  {
    if ($this->db->insert('inasistencia',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
  // insertan en la tabla personal cumple inasistencia 
  public function ins_personal_cumple_inasistencia($datos)
  {
    if ($this->db->insert('personal_cumple_inasistencia',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
  // Obtener el id horario de la cedula personal 
  public function getIdHorario($ci)
  {
    $this->db->where('C_I',$ci);
    $this->db->select('horario_id');
    $this->db->from('horario');
    $res = $this->db->get()->result();
    if ($res) {
      return $res[0]->horario_id;
    } else {
      return false;
    }
  }
  // inserta los datos de justifiacion
  public function ins_Justificacion($datos)
  {
    if ($this->db->insert('justificacion',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
  // inserta los datos de justificacion

  public function ins_extraJustificacion($datos)
  {
    if ($this->db->insert('personal_tiene_justificacion',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function listar_asistencia_cuenta($fecha1,$fecha2)
  {
    //Cuenta las asistencias del personal por el id horario
    $sql = "SELECT COUNT(t1.horario_id) as cuenta,t1.horario_id,(SELECT t3.P_nombre FROM personal t3 WHERE t2.C_I = t3.C_I) as P_nombre,t2.C_I FROM personal_lleva_horario t1 INNER JOIN horario t2 INNER JOIN asistencia t3 WHERE t1.horario_id = t2.horario_id AND t1.Cod_hor_asist = t3.Cod_hor_asist AND t3.Fecha BETWEEN '$fecha1 00:00:00' AND '$fecha2 23:59:59' GROUP BY t1.horario_id";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function listar_inasistencia_cuenta($fecha1,$fecha2)
  {
    //cuenta las inasistencias del personal por el id horario
    $sql = "SELECT COUNT(t1.horario_id) as cuenta,t1.horario_id,(SELECT t3.P_nombre FROM personal t3 WHERE t2.C_I = t3.C_I) as P_nombre,t2.C_I FROM personal_cumple_inasistencia t1 INNER JOIN horario t2 INNER JOIN inasistencia t3 WHERE t1.horario_id = t2.horario_id AND t1.Cod_inasist = t3.Cod_inasist AND t3.fecha_inasist BETWEEN '$fecha1 00:00:00' AND '$fecha2 23:59:59' GROUP BY t1.horario_id";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

}
 ?>
