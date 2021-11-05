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

      public function ingresar(){ // Ingresar los datos de usuario 
          $usu= $this->input->post('Nom_usuario');
          $pass= $this->input->post('Password');
          $res= $this->Mlogin->ingresar($usu, $pass);

          if ($res == 1) {
            // print_r($res);
            redirect('Chome','redirect');

          } else { //Si no coincide la contraseña o usuario
             $mensaje['mensaje'] ="Usuario o contraseña incorrecta";
             $this->load->view('vlogin',$mensaje);
          }
    }
    public function obtener_preg($nombre) // Lista las preguntas de seguridad del usuario
    {
      $res = $this->Mlogin->obtener_preg($nombre);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }

    public function recuperar_contra($id) // Recuperacion de contraseña por numeros aleatorios
     {
        $clave_pro = rand(15678,32767);
        $datos = array('Password' => $this->encryption->encrypt($clave_pro));
        $this->Mlogin->upd($id, $datos);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode($clave_pro));
    }


    public function session_close()
    {
      $this->session->sess_destroy();
      redirect('Clogin','refresh');
    }

}


?>
