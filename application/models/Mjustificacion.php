<?php /**
 *
 */
class Mjustificacion extends CI_Model
{
  public function listar()
  {
    //lista las justificaciones de un personal
    // WHY? $sql = "SELECT *,(SELECT t2.C_I FROM personal_tiene_justificacion t2 WHERE t1.Cod_just = t2.Cod_just) as C_I FROM justificacion t1";

    $sql = "SELECT * FROM justificacion t1 INNER JOIN personal_tiene_justificacion t2 ON t1.Cod_just = t2.Cod_just";


    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }
}
 ?>
