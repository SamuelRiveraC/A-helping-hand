<?php


class Mlogin extends CI_Model
{

public function ingresar ($usu, $pass){

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where ('Nom_usuario',$usu );
        $this->db->where ('Password',$pass );

         $resultado =$this->db->get();

        if ($resultado->num_rows == 1 ) {
            $r =$resultado->row();

            $session_usuario = array(
                'session_Nom_usuario' =>$r->Nom_usuario,
                'session_Password' =>$r->Password,
                 );

            $this->session->set_userdata($session_usuario);

            return true;
        }else {
            return false;

          }


    }


    public function recuperar($preguntas,$nom)
    {
      $this->db->where('Nom_usuario',$nom);
      $this->db->where('Res_1',$preguntas['preg1']);
      $this->db->where('Res_2',$preguntas['preg2']);
      $this->db->where('Res_3',$preguntas['preg3']);

    }

}


?>
