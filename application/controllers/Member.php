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
		$this->load->helper('url');   //
		$this->load->library('session');
	}
	
	public function index()
	{
		$member_list=$this->member_model->get_member_list();
		$data['member_list']=$member_list->result();
		$this->load->view('member_list',$data);
	}
	
	public function add_member_page()
	{
		$this->load->view('add_member_page');
	}
	
	public function add_member()
	{
		$data = array(
		   'm_name' => $this->input->post('req') ,
		   //'m_factoryID' => $this->input->post('sport')  ,
		   'm_password' => $this->input->post('pass1')  ,
		   'm_email' => $this->input->post('email1'),
		);
		
		//file upload
		$file_name = $_FILES['m_intro_file']['name'];
        $config['upload_path'] = 'upload/';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;
        // set the filter image types
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
		
		
        //if not successful, set the error message
        if (!$this->upload->do_upload('m_intro_file')) {
            $info = array('msg' => $this->upload->display_errors());
        } else {
            $info = array('msg' => "Success");
			$up_data['upload_data'] = $this->upload->data();
			$data['m_intro_file']= $up_data['upload_data']['orig_name'];
        }
		//end file upload
		$this->member_model->add_member($data);
		redirect('/member');
	}
	
	public function upload_personal_photo()
	{
		
		//file upload
		$file_name = $_FILES['personal_photo']['name'];
        $config['upload_path'] = 'upload/';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;
        // set the filter image types
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
		
		
        //if not successful, set the error message
        if (!$this->upload->do_upload('personal_photo')) {
            $info = array('msg' => $this->upload->display_errors());
        } else {
            $info = array('msg' => "Success");
			$up_data['upload_data'] = $this->upload->data();
			$data['personal_photo']= $up_data['upload_data']['orig_name'];
        }
		//end file upload
		echo 123;
	}
	
	public function update_member_page($id)
	{
		$member_one=$this->member_model->get_member_one($id);
		$data['member_one']=$member_one->result();
		$data['id']=$id;
		$this->load->view('update_member_page',$data);		
	}
	
	public function update_member()
	{
		$data = array(
		   'm_name' => $this->input->post('req') ,
		   'm_factoryID' => $this->input->post('sport')  ,
		   'm_password' => $this->input->post('pass1')  ,
		   'm_email' => $this->input->post('email1')
		);
		$id=$this->input->post('id');		
		$this->member_model->update_member($data,$id);
		redirect('/member');
	}
	
	public function delete_member($id)
	{
		$this->member_model->delete_member($id);
		redirect('/member');
	}
	
	
}
