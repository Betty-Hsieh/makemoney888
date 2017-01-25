<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SaleStrategery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->model('strategery_model');
        $this->load->model('product_model');
        $this->load->library('general');
    }

    function index(){
        $this->general->init_page();
        $product_data=array();
        $strategery = $this->strategery_model->get_strategery_list();

        foreach($strategery->result() as $key => $v){
            $product_data['data'][$key]['id']=$v->id;
            $product_data['data'][$key]['status']=$v->status;
            $product_data['data'][$key]['uniqid_id']=$v->uniqid_id;
            $product_data['data'][$key]['amount']=$v->amount;
            $product_data['data'][$key]['create_time']=$v->create_time;
            $ProductID=json_decode($v->pid);
            $Amount=json_decode($v->amount);
            
            $temp_product_name="";
            foreach($ProductID as $pk => $pv){
                $one_product=$this->product_model->get_product_by_uniqid($pv);
                $saleNums=$one_product->num_rows();
                
                if($saleNums>0){
                    $row_data=$one_product->row();
                    $temp_product_name.="<a target='_blank' href='/manager/product/edit_product_page/".$row_data->uniqid_id."'>".$row_data->product_title."</a><br/>";
                }
            }
            $product_data['data'][$key]['name']=$temp_product_name;
            $product_data['data'][$key]['price']=$v->price;
            
            $temp_amount="";
            foreach($Amount as $pk => $pv){
                $temp_amount.=$pv."<br/>";   
            }
            $product_data['data'][$key]['amount']=$temp_amount;
            
        }
        $this->load->view('admin/Strategery.php', $product_data);
        $this->load->view('admin/footer');
    }

    function adding_strategry_page(){
        $this->general->init_page();
        $this->load->view('admin/strategry_adding_page');
        $this->load->view('admin/footer');
    }

    function edit_strategery_page($id="")
    {
        $this->general->init_page();
        $product_data=array();
        $product = $this->strategery_model->get_strategery_one($id);
        
        foreach($product->result() as $key => $v){
            $product_data['data'][$key]['id']=$v->id;
            $product_data['data'][$key]['status']=$v->id;
            $product_data['data'][$key]['uniqid_id']=$v->uniqid_id;
            $product_data['data'][$key]['discount_price']=$v->price;
            $product_data['data'][$key]['title']=$v->title;
            $product_data['data'][$key]['status']=$v->status;
            $ProductID=json_decode($v->pid);
            $Amount=json_decode($v->amount);
            
            $temp_product_name="";
            foreach($ProductID as $pk => $pv){
                $one_product=$this->product_model->get_product_by_uniqid($pv);
                $saleNums=$one_product->num_rows();
                
                if($saleNums>0){
                    $row_data=$one_product->row();
                    $temp_product_name.="".$row_data->product_title."</a><br/>";
                    $product_data['data'][$key]['name']=$temp_product_name;
                    $product_data['data'][$key]['price']=$v->price;
                }
            }
            
            $temp_amount="";
            foreach($Amount as $pk => $pv){
                $temp_amount.=$pv."<br/>";   
            }
            $product_data['data'][$key]['amount']=$temp_amount;
        }
        
        
        $this->load->view('admin/strategry_editing_page', $product_data);
        $this->load->view('admin/footer');
    }

    function adding_strategery()
    {
        $products=$this->input->post('id');
        $uniqid=uniqid();
        $data = array(
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'amount' => json_encode($this->input->post('amount')),
            'pid' => json_encode($products),
            'fid'=>$this->session->userdata('fid'),
            'uniqid_id' => $uniqid,
        );
        
        $rs = $this->strategery_model->add_strategery($data);
        
        
        $product_data=array();
        foreach($products as $pk => $pv){
            $one_product=$this->product_model->get_product_by_uniqid($pv);
            $row_data=$one_product->row();
            //判斷是否有銷售組合
            $products_id=$row_data->uniqid_id;
            $sid=json_decode($row_data->strategery);
            if(is_array($sid)){
                if(!in_array($uniqid, $sid)){
                    array_push($sid,$uniqid);
                }
            }
            else{
                $sid=array($uniqid);
            }
            $product_data['strategery']=json_encode($sid);
            $this->product_model->update_product($product_data, $products_id);
        }    
        
        
        redirect('/manager/SaleStrategery');
    }

    function editing_strategery()
    {
        $id = $this->input->post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
        );
        $this->strategery_model->update_strategery($data, $id);
        
        $strategery = $this->strategery_model->get_strategery_one($id);
        $row=$strategery->row();
        $products=json_decode($row->pid);
        
        $product_data=array();
        foreach($products as $pk => $pv){
            $one_product=$this->product_model->get_product_by_uniqid($pv);
            $row_data=$one_product->row();
            //判斷是否有銷售組合
            $products_id=$row_data->uniqid_id;
            $sid=json_decode($row_data->strategery);
            if(is_array($sid)){
                if(!in_array($id, $sid)){
                    array_push($sid,$id);
                }
            }
            else{
                $sid=array($id);
            }
            $product_data['strategery']=json_encode($sid);
            $this->product_model->update_product($product_data, $products_id);
        }    
        redirect('/manager/SaleStrategery');
    }

    function delete_strategery($id="")
    {
        $rs = $this->strategery_model->delete_strategery($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
}
