<<<<<<< HEAD
<?php
=======
<?php /**
 *
 */
>>>>>>> 6f1f87fbe1997b7a09f8a7cc21bb4d5438c36b65
class Chome extends CI_controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
<<<<<<< HEAD
      $menu = array();
      $datos = array();
      $datos['menu'] = 'algo';
      $datos['submenu'] = 'algo';
      $menu = array('datos' => $datos);
    if ($this->session->userdata('Login')) {
      $this->load->view('layout/header');
      $this->load->view('layout/menu',$menu);
      $this->load->view('vhome');
      $this->load->view('layout/footer');
    } else {
      redirect('Clogin','refresh');
    }
=======
    $this->load->view('layout/header');
    $this->load->view('layout/menu');
    $this->load->view('vhome');
    $this->load->view('layout/footer');
>>>>>>> 6f1f87fbe1997b7a09f8a7cc21bb4d5438c36b65
  }
}
 ?>
