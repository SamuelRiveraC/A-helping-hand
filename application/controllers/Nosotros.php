<?php 
class Nosotros extends CI_Controller {
  public function index() {
    $menu = array('datos' => array('menu' => '', 'submenu' => ''));
      $this->load->view('layout/header');
      $this->load->view('layout/menu', $menu);
      $this->load->view('nosotros');
      $this->load->view('layout/footer');
   	  $this->load->view('layout/scripts');
  }
  public function manualDeUsuario() {
    $menu = array('datos' => array('menu' => '', 'submenu' => ''));
      $this->load->view('layout/header');
      $this->load->view('layout/menu', $menu);
      $this->load->view('manualDeUsuario');
      $this->load->view('layout/footer');
   	  $this->load->view('layout/scripts');
  }
  public function manualDeProgramador() {
    $menu = array('datos' => array('menu' => '', 'submenu' => ''));
      $this->load->view('layout/header');
      $this->load->view('layout/menu', $menu);
      $this->load->view('manualDeProgramador');
      $this->load->view('layout/footer');
   	  $this->load->view('layout/scripts');
  }
} ?>