<?php /**
 *
 */
class Mpermisos extends CI_Model
{
  public function listar($id) // Lista el permiso del personal
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

  public function usuarios_select() // Lista para el comboselect de personal
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

  public function ins($datos) // inserta datos de permiso 
  {
    if ($this->db->insert('permiso',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function ins_extra($datos) // inserta datos de permiso
  {
    if ($this->db->insert('personal_solicita_permiso',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function upd($datos,$id) // actualiza datos de personal
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
