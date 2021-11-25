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
  public function export () {
    $this->load->dbutil();
    $backup =& $this->dbutil->backup(array('ignore'=> array("ci_sessions"))); 
    $this->load->helper('file');
    write_file('/mybackup.gz', $backup); 
    $this->load->helper('download');
    force_download('mybackup.gz', $backup);
  }




  
  public function import () {
    $this->load->library('upload');

    $newDB =  gzdecode(file_get_contents($_FILES["mysqlfile"]['tmp_name']));
    $newDB = explode(";", $newDB);


    if ($newDB) {
      $this->db->query("SET foreign_key_checks = 0");
      
      $this->db->query("DROP TABLE IF EXISTS `ci_sessions`");
      $this->db->query("CREATE TABLE `ci_sessions` (
        `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
        `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
        `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
        `data` blob NOT NULL,
        PRIMARY KEY (`id`),
        KEY `ci_sessions_timestamp` (`timestamp`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
      
      foreach($newDB as $line){
        $line = trim(preg_replace("/.*\n*#/","",$line));
          //echo var_dump($line)."<br><br>";
        if ($line != "" && $line != " ") {
          $this->db->query($line);
        }
      }
      $this->db->query("SET foreign_key_checks = 1");

      echo "<h1> Base de datos importada exitosamente </h1>";

    } else {
      echo "<h1> Ha ocurrido un error importando la base de datos </h1>";
      echo "<p> Por favor contacte a soporte tecnico ... </p>";
    }
    echo "<p> redirigiendo... </p>";
    echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
        setTimeout(()=>{ window.location.href='/'} , 2000)
      });
    </script>";

  }


}
