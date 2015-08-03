<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epaper extends CI_Controller {

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
		$this->load->model('Epaper_Model');
		$this->load->helper('url');
	}
	
	public function index()
	{
		//$epaper_list=$this->Email_Model->get_epaper_list();
		//$data['epaper_list']=$epaper_list->result();
		$this->load->view('epaper_list');
	}
	
	public function epaper_edit_page()
	{
		$this->load->view('epaper_edit_page');
	}
	
	public function save_epaper()
	{
		$data = array(
		   'e_mail' => $this->input->post('recive') ,
		   'e_title' => $this->input->post('title')  ,
		   'e_content' => $this->input->post('content')  ,
		);
		
		//file upload
		$file_name = $_FILES['m_intro_file']['name'];
        $config['upload_path'] = 'upload/epaper';
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
		$this->Epaper_Model->add_epaper($data);
		redirect('/Epaper');
	}
	
	public function send_epaper(){
		$eid=$this->input->post('eid');
		$epaper_one=$this->Epaper_Model->get_epaper_one($eid);
		$data['epaper_one']=$epaper_one->result();
		
		foreach($data['epaper_one'] as $key=>$row){
			$info = array(
				'list' => array("s8220836@gmail.com","a0933786266@gmail.com"),
				'subject' => $row->e_title,
				'body' => $row->e_content,
			);
		}
		
		$this->load->library('Myphpmail');
		
        $msg = $this->myphpmail->SendMail($info);
        echo $msg['send'];
	}
	
}
