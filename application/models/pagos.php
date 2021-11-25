<?php class M extends CI_Model {

  public function ins_($datos)  {
    if ($this->db->insert('es',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

 public function list_() {
   $sql = "SELECT *,(SELECT t3.C_I FROM personal_genera_ t3 WHERE t1.Cod_amon = t3.Cod_amon ) as Cdula FROM es t1";
   $res = $this->db->query($sql);
   if ($res) {
     return $res->result();
   } else {
     return false;
   }
 }

} ?>