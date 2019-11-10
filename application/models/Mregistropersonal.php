<?php

class Mregistropersonal extends CI_Model
{

	function __construct()
	{
	    parent::__construct();
	}

	public function listar($id)
	{
		if ($id != null) {
			$this->db->where('C_I',$id);
		}
		$this->db->select('*');
		$this->db->from('personal');
		$res = $this->db->get();
		if ($res) {
			return $res->result();
		} else {
			return false;
		}
	}


	public function guardar($param){
		if ($this->db->insert('personal', $param)) {
			return true;
		} else {
			return false;
		}

	}
	   public function actualizarDatos($paramact,$id){

			$this->db->where('C_I',$id);
			if ($this->db->update('personal', $paramact)) {
				return true;
			} else {
				return false;
			}


	   }

	   public function eliminarDatos($ci){
			 $this->db->where('C_I',$ci);
			 if ($this->db->delete('personal')) {
				 return true;
			 } else {
				 return false;
			 }





	   	}




	}








?>
