<?php


class Cregistrousuario extends CI_Controller
{
	
	function __construct()
	{
	    parent::__construct();
        $this->load->model("mregistrousuario");

	}
    public function index(){


        $this->load->view("vregistrousuario");
      
       

    }

    public function guardarusuario(){

    	$paramusu['Nom_usuario']= $this->input->post('Nom_usuario');
    	$paramusu['Tipo_cuenta']= $this->input->post('Tipo_cuenta');
        $paramusu['Password']= sha1($this->input->post('Password')); 
        

        $this->mregistrousuario->guardarusuario($paramusu);
              
              $this->load->view('layout/header');
              $this->load->view('layout/menu');
              $this->load->view('vmenuprincipal');
              $this->load->view('layout/footer'); 
        
    }

}




?>



   