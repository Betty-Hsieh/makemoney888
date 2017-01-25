<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('category_model');
        $this->load->model('member_model');
		$this->load->library('general');
        $this->load->library('FileUpload');
	}
	
    function index(){
		$this->general->init_page();
		
        $data=array();
        
        $where['layer']=1;
		$category=$this->category_model->get_category_list($where);
        
        $k=0;
        foreach($category->result() as $ck => $cv){
            $data['category'][$k]['parentid']=$cv->parentid;
            $data['category'][$k]['id']=$cv->id;
            $data['category'][$k]['layer']=$cv->layer;
            $data['category'][$k]['uniqid_id']=$cv->uniqid_id;
            $data['category'][$k]['title']=$cv->title;
            $data['category'][$k]['sorting']=$cv->sorting;
            $k++;
            $chlid['main']=$cv->id;
            $child_category=$this->category_model->get_category_by_main($chlid);
            if($child_category->num_rows()>0){
                foreach($child_category->result() as $sck => $scv){
                    $data['category'][$k]['parentid']=$scv->parentid;
                    $data['category'][$k]['id']=$scv->id;
                    $data['category'][$k]['layer']=$scv->layer;
                    $data['category'][$k]['uniqid_id']=$scv->uniqid_id;
                    $data['category'][$k]['sorting']=$scv->sorting;
                    $data['category'][$k]['title']="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$scv->title;
                    $k++;
                    
                    $thirdchlid['main']=$scv->id;
                    $third_category=$this->category_model->get_category_by_main($thirdchlid);
                    if($third_category->num_rows()>0){
                        foreach($third_category->result() as $tck => $tcv){
                            $data['category'][$k]['parentid']=$tcv->parentid;
                            $data['category'][$k]['id']=$tcv->id;
                            $data['category'][$k]['layer']=$tcv->layer;
                            $data['category'][$k]['uniqid_id']=$tcv->uniqid_id;
                            $data['category'][$k]['sorting']=$tcv->sorting;
                            $data['category'][$k]['title']="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$tcv->title;
                            $k++;   
                        }
                    }
                }
            }   
        }
		$this->load->view('admin/category_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_category_page($main_id=""){
		$this->general->init_page();
        
        if(!empty($main_id)){
            $category=$this->category_model->get_category_one($main_id);
		    $data['main_category']=$category->row();
            
            $thirdchlid['main']=$main_id;
            $SubCategory=$this->category_model->get_category_by_main($thirdchlid);
        }else{
            
        }
        
        $layer = $this->category_model->get_category_layer();
        $data['layer'] = $layer->result();
		
        $this->load->view('admin/category_adding_page',$data);
		$this->load->view('admin/footer');
	}
	
	function edit_category_page($id=""){
		$this->general->init_page();
		
		$category=$this->category_model->get_category_one($id);
		$CategoryData=$category->row();
		$data['category']=$CategoryData;
        
        $thirdchlid['main']=$CategoryData->id;
        $SubCategory=$this->category_model->get_category_by_main($thirdchlid);
        
        $CategoryData=array();
        if($SubCategory->num_rows()>0){
            foreach($SubCategory->result() as $tck => $tcv){
                $CategoryData[$tcv->id]=$tcv->title;
            }
        }
        //print_r($CategoryData);
		$this->load->view('admin/category_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_category(){
		$data=array(
			'title'=>$this->input->post('title'),
			'sorting'=>$this->input->post('sorting'),
			'layer'=>$this->input->post('layer'),
            'fid'=>$this->session->userdata('fid'),
			'parentid'=>$this->input->post('parentid'),
            'uniqid_id' => uniqid(),
            'fid'=>$this->session->userdata('fid'),
		);
		
		$rs=$this->category_model->add_category($data);
		redirect('/manager/Category');
	}
	
	function editing_category(){
		$id=$this->input->post('uniqid_id');
		$data=array(
			'title'=>$this->input->post('title'),
			'sorting'=>$this->input->post('sorting'),
            'status'=>$this->input->post('status'),
			//'layer'=>$this->input->post('layer'),
			//'parentid'=>$this->input->post('parentid'),
		);
		$this->category_model->update_category($data,$id);
		redirect('/manager/Category');
	}
    
    function get_layer_options($layer=""){
        $where['layer']=$layer;
        $where['fid']=$this->session->userdata('fid');
        
		$layer=$this->category_model->get_layer_options($where);
		$data['layer']=$layer->result();
		$this->output->set_output(json_encode($data));
	}
    
    function get_category_by_main(){
        $where=array(
            'main'=>$this->input->post('id')
        );
        $layer=$this->category_model->get_category_by_main($where);
		$data['category']=$layer->result();
		$this->output->set_output(json_encode($data));      
    }
    
	function delete_category($id=""){
		$rs=$this->category_model->delete_Category($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
        redirect('/manager/Category');
	}
}
