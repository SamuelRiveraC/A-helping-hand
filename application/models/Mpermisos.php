<?php /**
 *
 */
class Mpermisos extends CI_Model
{
  public function listar($id)
  {
    $and = "";
    if ($id != null) {
      $and = "WHERE t1.Cod_perm = $id";
    }
    $sql = "SELECT *,(SELECT t2.C_I FROM personal_solicita_permiso t2 WHERE t2.Cod_perm = t1.Cod_perm) as C_I FROM permiso t1 $and";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return fals;
    }
  }

  public function usuarios_select()
  {
    $this->db->select('C_I,P_nombre');
    $this->db->from('personal');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function ins($datos)
  {
    if ($this->db->insert('permiso',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function ins_extra($datos)
  {
    if ($this->db->insert('personal_solicita_permiso',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function upd($datos,$id)
  {
    $this->db->where('Cod_perm',$id);
    if ($this->db->update('permiso',$datos)) {
      return true;
    } else {
      return false;
    }
  }

}
 ?>
