<?php /**
 *
 */
class Mreportes extends CI_Model
{

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

  public function list_prue()
  {
    $sql = "SELECT t1.Fecha_asist,(SELECT COUNT(t2.C_I) FROM personal_lleva_horario t2 WHERE t2.Cod_hor_asist = t1.Cod_hor_asist) as cuenta FROM horario_asistencia t1";
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
