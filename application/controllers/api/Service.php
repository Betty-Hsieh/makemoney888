<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {


	function __construct(){
		parent::__construct();
        $this->load->model('service_model');
		$this->Builder_Access();   //API權限設定
	}
	
	
    function Builder_Access(){  //API權限設
		$this->output->set_header( 'Access-Control-Allow-Origin: *' );  
		$this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
		$this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
		$this->output->set_content_type( 'application/json' );   //輸出接收格式
	}
    
    function adding_contact(){
        $input_data=array(
            'email'=>$this->input->post('email'),
            'topic'=>$this->input->post('topic'),
            'content'=>$this->input->post('content'),
            'name'=>$this->input->post('name')
        );
        
		$service=$this->service_model->add_service($input_data);
        if($service==1){
            $data['transation']=1;
		}
        else{
            $data['transation']=0;
        }
		$this->output->set_output(json_encode($data));
	}
    
	
}
