<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('member_model');
		$this->Builder_Access();   //API權限設定
	}
	
	public function index()
	{
		$member_list=$this->member_model->get_member_list();
		$data['member_list']=$member_list->result();
		$this->output->set_output(json_encode($data));
	}
	
	public function Builder_Access(){  //API權限設
		$this->output->set_header( 'Access-Control-Allow-Origin: *' );  
		$this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
		$this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
		$this->output->set_content_type( 'application/json' );   //輸出接收格式
	}
	
	/*public function get_product_list(){
		$query=$this->products_model->get_product_list();
		$data=$query->result();
		$this->output->set_output(json_encode($data));
	}*/
}
