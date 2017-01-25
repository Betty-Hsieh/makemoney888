<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('course_model');
        $this->load->model('member_model');
		$this->load->library('general');
        $this->load->library('FileUpload');
	}
	
    function index(){
		$this->general->init_page();
		
		$course=$this->course_model->get_course_list();
		$data['course']=$course->result();
        
		$this->load->view('admin/course_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_course_page(){
		$this->general->init_page();
		
        $data['course_category']=$this->course_model->course_category();
        
		$this->load->view('admin/course_adding_page',$data);
		$this->load->view('admin/footer');
	}
	
	function edit_course_page($id=""){
		$this->general->init_page();
		
        $data['course_category']=$this->course_model->course_category();
        
		$course=$this->course_model->get_course_one($id);
		$data['course']=$course->row();
		
		$this->load->view('admin/course_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_course(){
		$data=array(
			'product_title'=>$this->input->post('product_title'),
			'product_content'=>$this->input->post('product_content'),
			'product_price'=>$this->input->post('product_price'),
            'member_price'=>$this->input->post('member_price'),
			'status'=>1,
			'period'=>$this->input->post('period'),
			'numbers'=>$this->input->post('numbers'),
			'due_date'=>$this->input->post('due_date'),
            'uniqid_id' => uniqid(),
            'type' => 'Course',
            'author_id'=>$this->input->post('author_id'),
            'address'=>$this->input->post('address'),
            'contact_phone'=>$this->input->post('contact_phone'),
            'category'=>$this->input->post('course_category'),
            //'speaker'=>$this->input->post('speaker'),
		);
		
        $upload_data = array('path' => 'upload/products/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['status'] !=0) {
            $data['picture'] = $upload_info['file_name'];
        }
       
		$rs=$this->course_model->add_course($data);
		redirect('/manager/Course');
	}
	
	function editing_course(){
		$id=$this->input->post('uniqid_id');
		$data=array(
			'product_title'=>$this->input->post('product_title'),
			'product_content'=>$this->input->post('product_content'),
			'product_price'=>$this->input->post('product_price'),
            'member_price'=>$this->input->post('member_price'),
			'status'=>$this->input->post('status'),
			'period'=>$this->input->post('period'),
			'numbers'=>$this->input->post('numbers'),
			'due_date'=>$this->input->post('due_date'),
            'author_id'=>$this->input->post('author_id'),
            'address'=>$this->input->post('address'),
            'contact_phone'=>$this->input->post('contact_phone'),
            'category'=>$this->input->post('course_category'),
		);
      
        $upload_data = array('path' => 'upload/products/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        
        if ($upload_info['status'] !=0) {
            $data['picture'] = $upload_info['file_name'];
        }
		$this->course_model->update_course($data,$id);
		redirect('/manager/Course');
	}
	
    function applicant($id=""){
        $this->general->init_page();
		//課程名稱
        $course=$this->course_model->get_course_name($id);
        $data['course']= $course->row();
        
        //學員名單
        $student=$this->course_model->get_course_applicant($id);
        $data['applicant'] = $student->result();
		$this->load->view('admin/course_applicant',$data);
		$this->load->view('admin/footer');
	}
    
	function delete_course($id){
		$rs=$this->course_model->delete_course($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
        redirect('/manager/Course');
	}
}
