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

    public function listar($idusuario)  // Lista los usuarios
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


       public function actualizarDatos($paramact,$idusuario){ // actualiza los datos de usuario
            $this->db->where('ID_usuario',$idusuario);
            if ($this->db->update('usuario', $paramact)) {
                return true;
            } else {
                return false;
            }
       }

       public function eliminarDatos($idusuario){ // elimina los datos de usuario
             $this->db->where('ID_usuario',$idusuario);
             if ($this->db->delete('usuario')) {
                 return true;
             } else {
                 return false;
             }
        }

        public function getLike_($data)
		{ 
            // Buscar personal 
				$sql = "SELECT C_I,P_nombre FROM personal WHERE (C_I LIKE '%$data%' OR P_nombre LIKE '%$data%') LIMIT 0,10"; 
				$res = $this->db->query($sql);
				if ($res) {
					return $res->result();
				} else {
					return false;
				}
				
		} // Comprobar si el nombre de usuario existe
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
        public function getCI($string) // comprueba si la cedula existe
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
