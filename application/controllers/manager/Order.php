<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('order_model');
        $this->load->model('product_model');
		$this->load->library('general');
	}
	
	function index(){
		$this->general->init_page();
		
		$order=$this->order_model->get_order_list();
		$data['order']=$order->result();
		
		$this->load->view('admin/order_list.php',$data);
		$this->load->view('admin/footer');
	}
    
    function order_detail($id=""){
		$this->general->init_page();
		
        $order_info=$this->order_model->get_main_order_one($id);
        $recever=$order_info->row();
        $data['order_info']=$recever;
        
        $group_data=array();
        $order_detail=$this->order_model->get_detail_order_one($recever->id);
		$data['order_detail']=$order_detail->result();
        
        foreach($data['order_detail'] as $ok => $ov){
            $products=json_decode($ov->products_id);
            $GroupOrderNumber=json_decode($ov->ordernumber);
            
            $ProductName=array();
            $ProductPrice=array();
            $ProductNumber=array();
            if(is_array($products) && !empty($products)){
                foreach($products as $pk => $pv){
                    $productRS = $this->product_model->get_product_by_uniqid($pv);
                    $ProductData = $productRS->row();
                    $ProductName[$pk]=$ProductData->product_title;
                    $ProductPrice[$pk]=$ProductData->product_price;
                    $ProductNumber[$pk]=$GroupOrderNumber[$pk];
                }
                $group_data[$ok]['SubProduct']=$ProductName;
                $group_data[$ok]['SubProductPrice']=$ProductPrice;
                $group_data[$ok]['SubOrderNumber']=$ProductNumber;
            }
            $group_data[$ok]['trans_id']=$ov->trans_id;
            $group_data[$ok]['org_mid']=$ov->org_mid;
            $group_data[$ok]['trans_main_id']=$ov->trans_main_id;
            $group_data[$ok]['products_id']=$ov->products_id;
            $group_data[$ok]['sale_price']=$ov->sale_price;
            $group_data[$ok]['ordernumber']=$ov->ordernumber;
            $group_data[$ok]['product_name']=$ov->product_name;
            $group_data[$ok]['total_amount']=(int)$ov->sale_price*$ov->ordernumber;
            
        }
        $data['SubOrder']=$group_data;
        $this->load->view('admin/order_detail.php',$data);
		$this->load->view('admin/footer');
	}
    
	function adding_order_page(){
		$this->general->init_page();
		
		$this->load->view('admin/order_adding_page');
		$this->load->view('admin/footer');
	}
    
	function edit_order_page($id=""){
		$this->general->init_page();
		
		$order=$this->order_model->get_order_one($id);
		$data['order']=$order->result();
		
		$this->load->view('admin/order_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	function adding_order(){
		$data=array(
			'order_title'=>$this->input->post('order_title'),
			'order_price'=>$this->input->post('order_price'),
            'dis_price'=>$this->input->post('dis_price'),
			'order_content'=>$this->input->post('order_content'),
            'type'=>'Mall',
		);
		
		$rs=$this->order_model->add_order($data);
		redirect('/manager/order');
	}
	
	function editing_order(){
		$id=$this->input->post('id');
        $data=array(
			'order_title'=>$this->input->post('order_title'),
			'order_price'=>$this->input->post('order_price'),
			'order_content'=>$this->input->post('order_content'),
		);
	}
    
    function change_status(){
        $id = $this->input->post('id');
        $data = array(
            'status' => $this->input->post('status'),
        );
        $this->order_model->update_order($data, $id);
    }
    
    function change_delivery(){
        $id = $this->input->post('id');
        $data = array(
            'delivery' => $this->input->post('status'),
        );
        $this->order_model->update_order($data, $id);
    }
    
    function delivery_number(){
        $id = $this->input->post('id');
        $data = array(
            'delivery_number' => $this->input->post('delivery_number'),
        );
        $this->order_model->update_order($data, $id);
    }
	
	function delete_order($id){
		$rs=$this->order_model->delete_order($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
}
