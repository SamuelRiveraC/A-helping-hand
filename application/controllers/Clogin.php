<?php

class Clogin extends CI_controller
{

    function __construct()
   {
       parent::__construct();
       $this->load->model("Mlogin");
    }

      public function index(){
      // $mensaje['mensaje'] = '';

      $this->load->view('vlogin', $mensaje);
      }

      public function ingresar(){
          $usu= $this->input->post('Nom_usuario');
          $pass= $this->input->post('Password');

          $res= $this->mlogin->ingresar($usu,$pass);

          if ($res == 1) {
              $this->load->view('layout/header');
              $this->load->view('layout/menu');
              $this->load->view('vmenuprincipal');
              $this->load->view('layout/footer');

          }else{
             $mensaje['mensaje'] ="Usuario o contraseña incorrecta";
             $this->load->view('vlogin',$mensaje);

          }


    }


    public function recuperar_contra($nom)
    {
      $preguntas = array(
        'preg1' => $this->input->post('input1'),
        'preg2' => $this->input->post('input1'),
        'preg3' => $this->input->post('input1'),

      );
      $res = $this->Mlogin->recuperar($preguntas,$nom);

      if ($res) {
        $clave_pro = rand('');
        $this->Mlogin->upd($nom, $clave_pro);
      } else {
        // code...
      }

    }

}


?>
