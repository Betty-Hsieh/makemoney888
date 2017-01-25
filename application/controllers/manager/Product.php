<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->model('product_model');
        $this->load->model('strategery_model');
        $this->load->library('general');
        $this->load->library('FileUpload');
        $this->load->model('category_model');
    }

    function index()
    {
        $this->general->init_page();
        
        $category=$this->category_model->get_category_list(array("layer"=>1));
		$data['category']=$category->result();
        
        $where=array(
            "main_category"=>$this->input->post('main_category'),
            "sub_category"=>$this->input->post('sub_category'),
        );
        $product = $this->product_model->get_product_list($where);
        $data['product'] = $product->result();

        $this->load->view('admin/product_list.php', $data);
        $this->load->view('admin/footer');
    }

    function adding_product_page()
    {
        $this->general->init_page();
        
        $where['layer']=1;
        $category=$this->category_model->get_category_list($where);
		$data['category']=$category->result();
        
        $this->load->view('admin/product_adding_page',$data);
        $this->load->view('admin/footer');
    }

    function edit_product_page($id="")
    {
        $this->general->init_page();
        $where['layer']=1;
        $category=$this->category_model->get_category_list($where);
		$data['category']=$category->result();
        
        //產品資訊
        $product = $this->product_model->get_product_by_uniqid($id);
        $product_row=$product->row();
        $data['product'] = $product_row;
        
        //產品價格
        $productDetail = $this->product_model->get_product_detail($product_row->products_id);
        $data['product_detail'] = $productDetail->result();
        
        $where['where_in']="";
        $data['strategery']="";
        if($product_row->strategery!=""){
            $where['where_in']=json_decode($product_row->strategery);
            $strategery = $this->strategery_model->get_strategery_list($where);
            $data['strategery'] = $strategery->result();
        }
        
        $this->load->view('admin/product_editing_page', $data);
        $this->load->view('admin/footer');
    }

    function adding_product()
    {
        $data = array(
            'product_title' => $this->input->post('product_title'),
            'dis_price' => $this->input->post('dis_price'),
            //'product_price' => $this->input->post('product_price'),
            //'member_price' => $this->input->post('member_price'),
            'category' => $this->input->post('category'),
            'sub_category' => $this->input->post('sub_category'),
            'product_short' => $this->input->post('product_short'),
            'product_content' => $this->input->post('product_content'),
            'product_remark' => $this->input->post('product_remark'),
            'uniqid_id' => uniqid(),
            //'home_promote' => $this->input->post('home_promote'),
            'type' => 'Mall',
            );
        
        $upload_data = array('path' => 'upload/products/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if(!empty($upload_info['file_name'])) {
            $data['picture'] = $upload_info['file_name'];
        }
        $mainid = $this->product_model->add_product($data);
        
        //新增子產品
        if($mainid!=0){
            $sub_title=$this->input->post('sub_title');
            $price=$this->input->post('price');
            $member_price=$this->input->post('member_price');
            $cost=$this->input->post('cost');
            $inventory=$this->input->post('inventory');
            $main_key=$this->input->post('main_key');
            
            foreach($price as $sk => $sv){
                $InventoryQty=($inventory[$sk]!=0) ? $inventory[$sk] : 0;
                $MainKey=($main_key[$sk]!=0) ? $main_key[$sk] : 0;
                $CostPrice=($cost[$sk]!=0) ? $cost[$sk] : 0;
                $subdata=array(
                    'product_id'=>$mainid,
                    'sub_title'=>$sub_title[$sk],
                    'price'=>$price[$sk],
                    'member_price'=>$member_price[$sk],
                    'cost'=>$CostPrice,
                    'inventory'=>$InventoryQty,
                    'main_key'=>$MainKey,
                );
                $this->product_model->add_sub_product($subdata);
            }
        }
        redirect('/manager/product');
        
    }

    function editing_product()
    {
        $id = $this->input->post('id');
        $data = array(
            'product_title' => $this->input->post('product_title'),
            //'product_price' => $this->input->post('product_price'),
            'dis_price' => $this->input->post('dis_price'),
            //'member_price' => $this->input->post('member_price'),
            'category' => $this->input->post('category'),
            'sub_category' => $this->input->post('sub_category'),
            'product_short' => $this->input->post('product_short'),
            'product_content' => $this->input->post('product_content'),
            'product_remark' => $this->input->post('product_remark'),
            //'home_promote' => $this->input->post('home_promote'),
            'status' => $this->input->post('status'),
            'home_promote'=>$this->input->post('home_promote'),
        );

        $upload_data = array('path' => 'upload/products/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        
        if(!empty($upload_info['file_name'])) {
            $data['picture'] = $upload_info['file_name'];
        }
        $rs=$this->product_model->update_product($data,$id);
        
        //更新子商品
        if($rs==1){
            $sub_title=$this->input->post('sub_title');
            $price=$this->input->post('price');
            $member_price=$this->input->post('member_price');
            $cost=$this->input->post('cost');
            $inventory=$this->input->post('inventory');
            $sid=$this->input->post('sid');
            $main_key=$this->input->post('main_key');
            
            //子產品
            foreach($price as $sk => $sv){
                $mkey=0;
                if(!empty($main_key[$sk])){
                    $mkey=$main_key[$sk];
                }
                
                if(!empty($sv)){
                    //判斷編號是否有
                    if(!empty($sid[$sk])){
                        $subdata=array(
                            'sub_title'=>$sub_title[$sk],
                            'price'=>$price[$sk],
                            'member_price'=>$member_price[$sk],
                            'cost'=>$cost[$sk],
                            'inventory'=>$inventory[$sk],
                            'main_key'=>$mkey,
                        );
                        //print_r($subdata);
                        $this->product_model->update_sub_product($subdata,$sid[$sk]);
                    }else{
                        //新建產品
                        $product = $this->product_model->get_product_by_uniqid($id);
                        $product_row=$product->row();               
                        $subdata=array(
                            'product_id'=>$product_row->products_id,
                            'sub_title'=>$sub_title[$sk],
                            'price'=>$price[$sk],
                            'member_price'=>$member_price[$sk],
                            'cost'=>$cost[$sk],
                            'inventory'=>$inventory[$sk],
                            'main_key'=>$mkey,
                        );
                        //print_r($subdata);
                        $this->product_model->add_sub_product($subdata);
                    }
                }
            }
        }
        redirect('/manager/product');
    }
    
    function Query_Product(){
        $where=array(
            'product_name'=>$this->input->post('product')
        );
        $product = $this->product_model->query_product($where);
        $data['product'] = $product->result();
        echo json_encode($data);
    }
    
    function change_status(){
        $id = $this->input->post('id');
        $data = array(
            'status' => $this->input->post('status'),
        );
        $this->product_model->update_product($data, $id);
    }
    
    function change_shipping_discount(){
        $id = $this->input->post('id');
        $discount=$this->input->post('shipping_discount');
        $data = array(
            'shipping_discount' => $discount,
        );
        //print_r($data);
        $this->product_model->update_product($data, $id);
    }
    
    function change_discount(){
        $id = $this->input->post('id');
        $discount=$this->input->post('discount');
        
        $data = array(
            'all_discount' => $discount,
        );
        //print_r($data);
        $this->product_model->update_product($data, $id);
    }
    
    
    function delete_product()
    {
        $id = $this->input->post('id');
        $rs = $this->product_model->delete_product($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
    
    function duplicate_product(){
        $id=$this->input->post('id');
        $rs = $this->product_model->duplicate_product($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
}
