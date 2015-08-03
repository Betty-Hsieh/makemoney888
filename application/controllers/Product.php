<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$this->load->model('product_model');
		$this->load->model('transaction_model');
		$this->load->helper('url');   //
	}
	
	public function product_list()
	{
		$product_list=$this->product_model->get_product_list();
		$data['product_list']=$product_list->result();
		$this->load->view('product_list_page',$data);
	}
	
	public function add_product_page()
	{
		$this->load->view('add_product_page');
	}
	
	public function add_product()
	{
		$data = array(
		   'product_title' => $this->input->post('product_title') ,
		   'product_price' => $this->input->post('product_price')  ,
		   'product_content' => $this->input->post('product_content')  ,
		);
		
		//file upload
		$file_name = $_FILES['product_img']['name'];
        $config['upload_path'] = 'upload/product';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;
        // set the filter image types
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
		
		
        //if not successful, set the error message
        if (!$this->upload->do_upload('product_img')) {
            $info = array('msg' => $this->upload->display_errors());
        } else {
            $info = array('msg' => "Success");
			$up_data['upload_data'] = $this->upload->data();
			$data['p_img']= $up_data['upload_data']['orig_name'];
        }
		//end file upload
		$this->product_model->add_product($data);
		redirect('/product/product_list');
	}
	
	
	public function add_to_cart()
	{
		$items=$this->input->post('add');
		//get_product_one
		$data=array();
		foreach($items as $key => $item){
			$product_one=$this->product_model->get_product_one($item);
			$data['p_id'][$key]=$item;
			$data['product_price'][$key] = $product_one->row()->product_price;
			$data['m_factoryID'][$key] = $product_one->row()->m_factoryID;
			$data['product_title'][$key] = $product_one->row()->product_title;
		}
		
		//main_transaction
		$totalprice=0;
		foreach($data['product_price'] as $key => $row){
			$totalprice+=$row;
		}
		$main_trac = array(
		   'm_factoryID' => 'betty' ,
		   'total' => $totalprice
		);
		$insert_id=$this->transaction_model->insert_main_transaction($main_trac);
		print_r($data);
		//transaction_list
		foreach($data['p_id'] as $key => $row){
			$trac_list = array(
			   'm_factoryID' => $data['m_factoryID'][$key] ,
			   'products_id' => $data['p_id'][$key] ,
			   'product_price' => $data['product_price'][$key] ,
			   'product_name' => $data['product_title'][$key] ,
			   'trans_main_id' => $insert_id
			);
			//print_r($trac_list);
			$this->transaction_model->transaction_list($trac_list);
		}
		redirect('/product/product_list');
	}
}
