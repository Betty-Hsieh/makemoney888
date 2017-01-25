<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General {
    
	private $CI;
    public function __construct(){
		$this->CI =& get_instance();
    }
	
	function init_page(){
		$data=$this->get_init_data();
		$this->CI->load->view('admin/header');
		$this->CI->load->view('admin/top_bar',$data);
		$this->CI->load->view('admin/left_menu_bar',$data);
	}
	
	function footer_tool($view){
		$this->CI->load->view('admin/'.$view);
	}
	
	function get_init_data(){
		$user_id=$this->CI->session->userdata('user_id');
		$user_name=$this->CI->session->userdata('user_name');
		//$user_limit=$this->session->userdata('user_limit');
		$user_email=$this->CI->session->userdata('user_email');
		$data['user_id']=$user_id;
		$data['user_name']=$user_name;
		//$data['user_limit']=$user_limit;
		$data['user_email']=$user_email;
		return $data;
	}
}