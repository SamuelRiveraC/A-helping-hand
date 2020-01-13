<?php


class Mregistrousuario extends CI_Model
{

	public function guardarusuario($paramusu){

		if ($this->db->insert('usuario', $paramusu)) {
			return true;
		} else {
			return false;
		}
	}

    public function listar($idusuario)
    {
        if ($idusuario != null) {
            $this->db->where('ID_Usuario',$idusuario);
        }
        $this->db->select('*');
        $this->db->from('usuario');
        $res = $this->db->get();
        if ($res) {
            return $res->result();
        } else {
            return false;
        }
    }


       public function actualizarDatos($paramact,$idusuario){
            $this->db->where('ID_usuario',$idusuario);
            if ($this->db->update('usuario', $paramact)) {
                return true;
            } else {
                return false;
            }
       }

       public function eliminarDatos($idusuario){
             $this->db->where('ID_usuario',$idusuario);
             if ($this->db->delete('usuario')) {
                 return true;
             } else {
                 return false;
             }
        }

        public function getLike_($data)
		{ 
            
				$sql = "SELECT C_I,P_nombre FROM personal WHERE (C_I LIKE '%$data%' OR P_nombre LIKE '%$data%') LIMIT 0,10"; 
				$res = $this->db->query($sql);
				if ($res) {
					return $res->result();
				} else {
					return false;
				}
				
		}
        public function getUsers($string)
        {
           $this->db->like('Nom_usuario',$string);
           $this->db->select('*');
           $this->db->from('usuario');
           $r = $this->db->get();
      
           if($r->num_rows()>0){
               return true;
           }else{
               return false;
           }
        }
        public function getCI($string)
        {
           $this->db->like('C_I',$string);
           $this->db->select('*');
           $this->db->from('personal');
           $r = $this->db->get();
      
           if($r->num_rows()>0){
               return true;
           }else{
               return false;
           }
        }
}

?>
