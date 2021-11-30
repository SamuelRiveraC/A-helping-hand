<?php class Mpagos extends CI_Model {

  public function insert($datos)  {
    if ($this->db->insert('pago',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }
 public function index() {
   $sql = "SELECT * FROM pago m INNER JOIN personal p ON p.C_I = m.cod_personal";
   $res = $this->db->query($sql);
   if ($res) {
     return $res->result();
   } else {
     return false;
   }
 }
 public function get($id) {
   $sql = "SELECT * FROM pago m INNER JOIN personal p ON p.C_I = m.cod_personal WHERE cod_pago = $id";
   $res = $this->db->query($sql);
   if ($res) {
     return $res->result();
   } else {
     return false;
   }
 }

} ?>