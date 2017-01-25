<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('area_model');
		$this->Builder_Access();
	}
	
    function Builder_Access(){  //API權限設
		$this->output->set_header( 'Access-Control-Allow-Origin: *' );  
		$this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
		$this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
		$this->output->set_content_type( 'application/json' );   //輸出接收格式
	}
    
    function get_city_list()
	{
		$city=$this->area_model->get_area_list();
		$data['city']=$city->result();
		$this->output->set_output(json_encode($data));
	}
    
    function get_district(){
        $id=$this->input->post('id');
        $city=$this->area_model->get_area_one($id);
		$data['city']=$city->result();
		$this->output->set_output(json_encode($data));
    }
}
