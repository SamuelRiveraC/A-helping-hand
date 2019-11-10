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




}

?>
