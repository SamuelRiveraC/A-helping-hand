<?php

class Mregistropersonal extends CI_Model
{

	function __construct()
	{
	    parent::__construct();
	}

	public function listar($id)
	{
		$and = "";
		if ($id != null) {
			$and = "AND t1.C_I = '$id'";
		}
		$sql = "SELECT t1.*,t2.nombre_inst,t4.Tipo_correo,t5.*,t6.*,t7.* FROM personal t1 
		INNER JOIN instituto t2 INNER JOIN correo t4 INNER JOIN direccion t5 INNER JOIN formacion_academica t6 INNER JOIN horario t7
		WHERE t1.C_I = t5.C_I AND t5.Cod_dir = t2.Cod_dir AND t4.C_I = t1.C_I AND t1.C_I = t6.C_I AND t1.C_I = t7.C_I $and";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->result();
		} else {
			return false;
		}
	}

	public function get_number($id)
	{
		$sql = "SELECT concat(Area_telf,'-',Num_telf) as Num_telf FROM telefono WHERE C_I = '$id'";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->result();
		}  else {
			return false;	
		}
	}

	public function guardar($param){
		if ($this->db->insert('personal', $param)) {
			return $this->db->insert_id();
		} else {
			return false;
		}

	}
	   public function actualizarDatos($paramact,$id){

			$this->db->where('C_I',$id);
			if ($this->db->update('personal', $paramact)) {
				return $this->db->insert_id();
			} else {
				return false;
			}


	   }

	   public function horario($datos)
	   {
			if ($this->db->insert('horario',$datos)) {
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

			public function upd_dir($datos,$id)
			{
				$this->db->where('Cod_dir',$id);
				if ($this->db->update('direccion',$datos)) {
					return true;
				} else {
					return false;
				}
			}

			public function datos_direccion($param){
				if ($this->db->insert('direccion', $param)) {
					return $this->db->insert_id();
				} else {
					return false;
				}

			}
			public function instituto($param){
				if ($this->db->insert('instituto', $param)) {
					return $this->db->insert_id();
				} else {
					return false;
				}

			}

			public function datos_formacion($param){
				if ($this->db->insert('formacion_academica', $param)) {
					return $this->db->insert_id();
				} else {
					return false;
				}

			}

			public function telefono($param){
				if ($this->db->insert('telefono', $param)) {
					return $this->db->insert_id();
				} else {
					return false;
				}

			}

			public function correo($param){
				if ($this->db->insert('correo', $param)) {
					return $this->db->insert_id();
				} else {
					return false;
				}

			}


			public function upd_guardar($datos,$C_I)
			{
				$this->db->where('C_I',$C_I);
				if ($this->db->update('personal',$datos)) {
					return true;
				} else {
					return false;
				}
			}
			public function upd_datos_direccion($datos,$C_I)
			{
				$this->db->where('Cod_dir',$C_I);
				if ($this->db->update('direccion',$datos)) {
					return true;
				} else {
					return false;
				}
			}
			public function upd_instituto($datos,$C_I)
			{
				$this->db->where('Cod_dir',$C_I);
				if ($this->db->update('instituto',$datos)) {
					return true;
				} else {
					return false;
				}
			}
			public function upd_horario($datos,$C_I)
			{
				$this->db->where('C_I',$C_I);
				if ($this->db->update('horario',$datos)) {
					return true;
				} else {
					return false;
				}
			}
			public function upd_telefono($datos,$C_I)
			{
				$this->db->where('C_I',$C_I);
				if ($this->db->update('telefono',$datos)) {
					return true;
				} else {
					return false;
				}
			}
			public function upd_correo($datos,$C_I)
			{
				$this->db->where('C_I',$C_I);
				if ($this->db->update('correo',$datos)) {
					return true;
				} else {
					return false;
				}
			}
			public function upd_formacion_academica($datos,$C_I)
			{
				$this->db->where('C_I',$C_I);
				if ($this->db->update('formacion_academica',$datos)) {
					return true;
				} else {
					return false;
				}
			}




	}
