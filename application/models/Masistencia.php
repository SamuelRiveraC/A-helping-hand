<?php /**
 *
 */
class Masistencia extends CI_Model
{
  public function listar()
  {
    $hoy = date("Y-m-d");
    $sql = "SELECT * FROM personal t1 WHERE t1.C_I
    NOT IN(SELECT (SELECT t2.C_I FROM personal_cumple_inasistencia t2 WHERE t2.Cod_inasist = t3.Cod_inasist )
    as C_I_inasistencia FROM inasistencia t3 WHERE t3.Fecha_inasist = '$hoy')
    AND t1.C_I
    NOT IN(SELECT (SELECT t5.C_I FROM personal_lleva_horario t5 WHERE t5.Cod_hor_asist = t4.Cod_hor_asist )
    as C_I FROM horario_asistencia t4 WHERE t4.Fecha_asist = '$hoy')
    AND t1.C_I NOT IN(SELECT (SELECT t6.C_I FROM personal_tiene_justificacion t6 WHERE t6.Cod_just = t7.Cod_just)
    as C_I_justificacion FROM justificacion t7 WHERE t7.Fecha_just = '$hoy') AND t1.C_I
	  NOT IN(SELECT (SELECT t8.C_I FROM personal_solicita_permiso t8 WHERE t8.Cod_perm = t9.Cod_perm) as C_permiso
    FROM permiso t9 WHERE '$hoy' BETWEEN t9.fecha_inicio AND t9.fecha_culm )";
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
    $sql = "SELECT *,(SELECT CONCAT(P_nombre,' ',P_apellido) FROM personal t3 WHERE t3.C_I = t1.C_I ) as Nombre FROM personal_cumple_inasistencia t1
    WHERE t1.Cod_inasist IN(
    SELECT t2.Cod_inasist FROM inasistencia t2 WHERE Fecha_inasist = '$fecha'  AND t2.Cod_inasist = t1.Cod_inasist)";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function listar_asistencia()
  {

      $fecha = date('Y-m-d');
      $sql = "SELECT *,(SELECT CONCAT(P_nombre,' ',P_apellido) FROM personal t3 WHERE t3.C_I = t1.C_I ) as Nombre FROM personal_lleva_horario t1
      WHERE t1.Cod_hor_asist IN(
      SELECT t2.Cod_hor_asist FROM horario_asistencia t2 WHERE t2.Fecha_asist = '$fecha'  AND t2.Cod_hor_asist = t1.Cod_hor_asist)";
      $res = $this->db->query($sql);
      if ($res) {
        return $res->result();
      } else {
        return false;
      }
  }

  public function ins_datos_asistencia($datos)
  {
    if ($this->db->insert('horario_asistencia',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function ins_personal_lleva_horario($datos)
  {
    if ($this->db->insert('personal_lleva_horario',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function ins_datos_inasistencia($datos)
  {
    if ($this->db->insert('inasistencia',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
  public function ins_personal_cumple_inasistecia($datos)
  {
    if ($this->db->insert('personal_cumple_inasistencia',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function ins_Justificacion($datos)
  {
    if ($this->db->insert('justificacion',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function ins_extraJustificacion($datos)
  {
    if ($this->db->insert('personal_tiene_justificacion',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function listar_asistencia_cuenta()
  {
    $sql = "SELECT COUNT(t1.C_I) as cuenta,t1.C_I,(SELECT t2.P_nombre FROM personal t2 WHERE t1.C_I = t2.C_I) as P_nombre FROM personal_lleva_horario t1 GROUP BY C_I";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function listar_inasistencia_cuenta()
  {
    $sql = "SELECT COUNT(t1.C_I) as cuenta,t1.C_I,(SELECT t2.P_nombre FROM personal t2 WHERE t1.C_I = t2.C_I) as P_nombre FROM personal_cumple_inasistencia t1 GROUP BY C_I";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

}
 ?>
