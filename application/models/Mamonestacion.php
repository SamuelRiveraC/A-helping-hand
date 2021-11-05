<?php /**
 *
 */
class Mamonestacion extends CI_Model
{

  public function ins_Amonestacion($datos) // Inserta los datos de amonestacion 
  {
    if ($this->db->insert('amonestaciones',$datos)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function ins_detalleAmonestacion($datos)// Inserta los datos de la tabla personal genera amonestacion 
  {
    if ($this->db->insert('personal_genera_amonestacion',$datos)) {
      return true;
    } else {
      return false;
    }
  }

 public function list_amonestacion() //Lista los datos de amonestacion
 {
   $sql = "SELECT *,(SELECT t3.C_I FROM personal_genera_amonestacion t3 WHERE t1.Cod_amon = t3.Cod_amon ) as Cdula FROM amonestaciones t1";
   $res = $this->db->query($sql);
   if ($res) {
     return $res->result();
   } else {
     return false;
   }
 }
}
 ?>
