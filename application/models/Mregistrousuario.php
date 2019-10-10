<?php 


class Mregistrousuario extends CI_Model
{
	
	function __construct()
	{
	    parent::__construct();
	}

	public function guardarusuario($paramusu){
        
        $paramusu = array(

        'Nom_usuario' =>$paramusu['Nom_usuario'], 
        'Tipo_cuenta' =>$paramusu['Tipo_cuenta'], 
        'Password' =>$paramusu['Password'], 

    );

	     
		$this->db->insert('usuario', $paramusu); 
	}
		
}


?>