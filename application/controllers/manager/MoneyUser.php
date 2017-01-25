<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoneyUser extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('general');
	}
	
	function index(){
		$this->load->view('admin/login.php');
	}
	
	function dashboard(){
		$this->general->init_page();
		$this->load->view('admin/dashboard.php');
	}
	
	function login(){
		$this->load->model('login_model');
		$data=array(
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password')
		);
		$admin=$this->login_model->admin_login($data);
		$row_data=$admin->num_rows();
		if($row_data==1){
			foreach($admin->result() as $row){
				$admin=array(
					'user_name'=>$row->m_name,
					'user_id'=>$row->m_id,
					'user_email'=>$row->m_email,
                    'fid'=>$row->fid,
					'is_logged_in'=>true
				);
				$this->session->set_userdata($admin);
			}
			$this->dashboard();
		}
		else{
			redirect('manager/MoneyUser/');
		}
	}
}
