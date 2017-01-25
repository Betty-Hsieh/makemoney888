<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertising extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('advertising_model');
		$this->load->library('general');
        $this->load->library('FileUpload');
	}
	
	function index(){
		$this->general->init_page();
		
		$MainAdvertising=$this->advertising_model->get_advertising_list();
		$data['advertising']=$MainAdvertising->result();
		
		$this->load->view('admin/advertising_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_advertising_page(){
		$this->general->init_page();
        $data['subtype']=$this->advertising_model->get_sub_type();
		$this->load->view('admin/adding_advertising_page.php',$data);
		$this->load->view('admin/footer');
	}
	
	function advertising_edit_page($id){
		$this->general->init_page();
		$data['subtype']=$this->advertising_model->get_sub_type();
		$MainAdvertising=$this->advertising_model->get_advertising_one($id);
		$data['advertising']=$MainAdvertising->result();
		
		$this->load->view('admin/advertising_edit_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_advertising(){
		$data=array(
			'title'=>$this->input->post('title'),
			'status'=>1,
            'uniqid_id' => uniqid(),
            'content'=>$this->input->post('content'),
            'type' => 'MainAdvertising',
            'menu_id'=>3,
            'fid'=>$this->session->userdata('fid'),
            'subtype'=>$this->input->post('subtype')
		);
		
        $upload_data = array('path' => 'upload/advertising/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['file_name'] != "") {
            $data['picture'] = $upload_info['file_name'];
        }
        /*
        //image resize
        $config['image_library'] = 'gd2';
        $config['source_image']	= "upload/advertising/".$data['picture'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']	= 75;
        $config['height']	= 250;
        $this->load->library('image_lib',$config); 
        $this->image_lib->clear();
        if (! $this->image_lib->resize()){
            echo $this->image_lib->display_errors();
        }
        */
		$rs=$this->advertising_model->add_advertising($data);
		redirect('/manager/advertising/');
	}
	
	function editing_advertising(){
		$id=$this->input->post('uniqid_id');
		$data=array(
			'title'=>$this->input->post('title'),
			'content'=>$this->input->post('content'),
			'status'=>$this->input->post('status'),
            'subtype'=>$this->input->post('subtype')
		);
      
        $upload_data = array('path' => 'upload/advertising/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        //picture_resource
        if(isset($upload_info['file_name'])) {
            $data['picture'] = $upload_info['file_name'];
            unlink("upload/advertising/".$this->input->post('picture_resource'));
        }
        //print_r($data);
		$this->advertising_model->update_advertising($data,$id);
		redirect('/manager/advertising/');
	}
	
	function advertising_delete($id){
		$rs=$this->advertising_model->delete_advertising($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
        redirect('/manager/Advertising');
	}
}
