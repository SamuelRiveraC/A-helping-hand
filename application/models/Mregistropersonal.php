<?php

class Mregistropersonal extends CI_Model
{

	function __construct()
	{
	    parent::__construct();
	}

	public function guardar($param){
		$campos = array(
		'P_nombre' => $param['P_nombre'],
		'S_nombre' => $param['S_nombre'],
		'P_apellido'=> $param['P_apellido'],
		'S_apellido' => $param['S_apellido'],
		'C_I'=> $param['C_I'],
        'Sexo'=> $param ['Sexo'],
        'Nacionalidad'=> $param['Nacionalidad'],
        'Estado_civil'=> $param['Estado_civil'],
        'Fecha_n'=> date('d-m-y', strtotime(str_replace('/', '-',$param ['Fecha_n']))),
        'Tipo_pers'=> $param ['Tipo_pers'],
        'Edad'=> $param ['Edad']
		);

		$this->db->insert('personal', $campos);


	}
	   public function actualizarDatos($paramact){

	   	$paramact = array(
	   	'P_nombre' => $paramact['P_nombre'],
		'S_nombre' => $paramact['S_nombre'],
		'P_apellido'=> $paramact['P_apellido'],
		'S_apellido' => $paramact['S_apellido'],
        'Sexo'=> $paramact ['Sexo'],
        'Nacionalidad'=> $paramact['Nacionalidad'],
        'Estado_civil'=> $paramact['Estado_civil'],
        'Fecha_n'=> date('d-m-y', strtotime(str_replace('/', '-',$paramact ['Fecha_n']))),
        'Tipo_pers'=> $paramact ['Tipo_pers'],
        'Edad'=> $paramact ['Edad']
		);

		$this->db->update('personal', $paramact);


	   }

	   public function eliminarDatos($ci){

	   	$ci = array(
	   	'C_I' => $ci
	   	);

	   	$this->db->delete('personal', $ci);

	   }

	   public function getDatos(){

	  	 $this->db->select('*');
	  	 $this->db->from('personal');
	  	 $this->db->where('C_I', '$ver');

	  	 $r = $this->db->get();

	  	 return $r->result();



	   	}




	}








?>
