<?php



class Mlogin extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('encrypt');
  }

public function ingresar ($usu, $pass){ // Insertar datos de usuario para inicar sesion


        // HERE MUST GO THE HASHING COMPARING FUNCTIOn

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where ('Nom_usuario',$usu );
        $this->db->where ('Password', $this->encrypt->decode($pass) );

         $resultado = $this->db->get();

        if ($resultado->num_rows() == 1 ) {
            $r =$resultado->row();

            $session_usuario = array(
                'session_Nom_usuario' =>$r->Nom_usuario,
                'session_Password' =>$r->Password,
                'session_Tipo' => $r->Tipo_cuenta,
                 );

            $this->session->set_userdata('Login',$session_usuario); 

            return true;
        }else {
            return false;

          }


    }



    public function obtener_preg($nombre) // el usuario obtiene las preguntas de seguridad
    {
      $this->db->where('Nom_usuario',$nombre);
      $this->db->from('usuario');
      $this->db->select('Preg_1,Preg_2,Preg_3,Res_1,Res_2,Res_3,ID_usuario');
      $res = $this->db->get();
      if ($res) {
        return $res->result();
      } else {
        return false;
      }

    }

    public function upd($id,$clave) // actualiza los datos de usuario
    {
      $this->db->where('ID_usuario',$id);
      if ($this->db->update('usuario',$clave)) {
        return true;
      } else {
        return false;
      }

    }

}


?>
