<?php


class Cregistropersonal extends CI_Controller
{

		function __construct()
		{
		    parent::__construct();
	      $this->load->model("Mregistropersonal");


		}

    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view("vregistropersonal");
        $this->load->view('layout/footer');

    }

    public function guardar(){

        $param['P_nombre']= $this->input->post('P_nombre');
        $param['S_nombre']= $this->input->post('S_nombre');
        $param['P_apellido']= $this->input->post('P_apellido');
        $param['S_apellido']= $this->input->post('S_apellido');
        $param['C_I']= $this->input->post('C_I');
        $param['Sexo']= $this->input->post('Sexo');
        $param['Nacionalidad']= $this->input->post('Nacionalidad');
        $param['Estado_civil']= $this->input->post('Estado_civil');
        $param['Fecha_n']= $this->input->post('datFecha_n');
        $param['Tipo_pers']= $this->input->post('Tipo_pers');
        $param['Edad']= $this->input->post('Edad');


        $this->mregistropersonal->guardar($param);
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view("vregistropersonal");
        $this->load->view('layout/footer');


     }


       public function actualizarDatos(){

        $paramact['P_nombre']= $this->input->post('P_nombre');
        $paramact['S_nombre']= $this->input->post('S_nombre');
        $paramact['P_apellido']= $this->input->post('P_apellido');
        $paramact['S_apellido']= $this->input->post('S_apellido');
        $paramact['Sexo']= $this->input->post('Sexo');
        $paramact['Nacionalidad']= $this->input->post('Nacionalidad');
        $paramact['Estado_civil']= $this->input->post('Estado_civil');
        $paramact['Fecha_n']= $this->input->post('datFecha_n');
        $paramact['Tipo_pers']= $this->input->post('Tipo_pers');
        $paramact['Edad']= $this->input->post('Edad');

        $this->mregistropersonal->actualizarDatos($paramact);
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vmenuprincipal');
        $this->load->view('layout/footer');


       }

      public function eliminarDatos(){

        $ci = $this->input->post('C_I');
        $this->mregistropersonal->eliminarDatos($ci);
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view("vmenuprincipal");
        $this->load->view('layout/footer');

      }

        public function getDatos(){

       echo json_encode($this->mregistropersonal->getDatos());





      }

        public function personal_crud()
         {

            $this->load->library("grocery_CRUD");

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('personal');
            $crud->set_relation('direccion','departamento','tipo_personal');
            $crud->display_as('C_I');
            $crud->set_subject('personal');

    $output = $crud->render();



     $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view("vregistropersonal" , $output);
        $this->load->view('layout/footer');
}
         }






?>
