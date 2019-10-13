<?php

class Clogin extends CI_controller
{

    function __construct()
    {
       parent::__construct();
       $this->load->model("Mlogin");
    }

      public function index(){
      $mensaje['mensaje'] = '';

      $this->load->view('vlogin', $mensaje);
      }

      public function ingresar(){
          $usu= $this->input->post('Nom_usuario');
          $pass= $this->input->post('Password');

          $res= $this->Mlogin->ingresar($usu,$pass);
          if ($res == 1) {
            // print_r($res);
              $this->load->view('layout/header');
              $this->load->view('layout/menu');
              $this->load->view('vhome');
              $this->load->view('layout/footer');

          }else{
             $mensaje['mensaje'] ="Usuario o contraseña incorrecta";
             $this->load->view('vlogin',$mensaje);

          }


    }
    public function obtener_preg($nombre)
    {
      $res = $this->Mlogin->obtener_preg($nombre);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }

    public function recuperar_contra($id)
    {
        $clave_pro = rand(15678,32767);
        $datos = array('Password' => $clave_pro);
        $this->Mlogin->upd($id, $datos);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($clave_pro));
    }

}


?>
