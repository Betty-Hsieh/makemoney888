<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopCart extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('order_model');
        $this->load->model('product_model');
        $this->load->library('cart');
		$this->Builder_Access();   //API權限設定
	}
	
	public function Builder_Access(){  //API權限設
		$this->output->set_header( 'Access-Control-Allow-Origin: *' );  
		$this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
		$this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
		$this->output->set_content_type( 'application/json' );   //輸出接收格式
	}
    
    function adding_item(){
       $id=$this->input->post('id');
       $product=$this->product_model->get_product_by_uniqid($id);
       $row = $product->row();
       
       $data = array(
                'id'      => $id,
                'qty'     => $this->input->post('order_number'),
                'productid'   => $row->products_id,
                'price'   => $row->product_price,
                'name'    => strtolower($row->product_title),
                'type' => $row->type,
                //'options' => array('Size' => 'L', 'Color' => 'Red')
        );
        $this->cart->insert($data);
        $shopcart=$this->cart->contents();
        
        $info=array(
            'cart'=>$shopcart
        );
        $this->output->set_output(json_encode($info));
	}
    
    function removing_item(){
       $id=$this->input->post('id');
       $data = array(
           'rowid' => $id,
           'qty'   => 0
        );
       $this->cart->update($data);
       $info=array(
            'info'=>1
       );
       $this->output->set_output(json_encode($info)); 
    } 
    
    function editing_atm_code(){
        $id=$this->input->post('id');
        $data = array(
            'atm_code'=> $this->input->post('atm_code')
        );
        $rs=$this->order_model->update_order($data,$id);
        
        $info=array(
            'info'=>$rs
        );
        $this->output->set_output(json_encode($info));
    }
	
}
