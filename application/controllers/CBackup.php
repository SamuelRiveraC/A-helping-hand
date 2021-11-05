<?php

class CBackup extends CI_Controller {

  function __construct() {
    parent::__construct();
  
  	////////

  }


  public function index () {

      $menu = array();
      $datos = array();
      $datos['menu'] = 'algo';
      $datos['submenu'] = 'algo';
      $menu = array('datos' => $datos);

      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vbackup');
      $this->load->view('layout/footer');
  }

  
  /*
  	Should be async
  */
  public function backup () {

  	/*
	
	   $sql = "SELECT *,(SELECT t3.C_I FROM personal_genera_amonestacion t3 WHERE t1.Cod_amon = t3.Cod_amon ) as Cdula FROM amonestaciones t1";
   

   		$res = $this->db->query($sql);


  	*/

   		// send contetn type text -->
    $this->output->set_content_type('application/json')->set_output(json_encode("{}"));
  }

  public function restore () {

  }


}
