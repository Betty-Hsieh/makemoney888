<?php
class Order_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_order_list(){
		$this->db->select('uniqid_id,id,delivery_fee,total,receiver,country,town,send_address,cellphone,invoice,total_items,create_time,atm_code,email,status,remark,delivery_number');
		$this->db->from('main_transation');
        $this->db->order_by("create_time", "desc");
		return $this->db->get();
	}
    
    function get_member_order($data=""){
		$this->db->select('id,total,uniqid_id,delivery_fee,status,delivery,receiver,send_address,cellphone,invoice,total_items,create_time,atm_code,email,vat_number,remark');
		$this->db->from('main_transation');
        $this->db->where('org_mid',$data['id']);
        $this->db->order_by("create_time", "desc");
		return $this->db->get();
	}
	
	function add_order($data){
        $main_order['receiver']=$data['receiver'];
        $main_order['org_mid']=$data['org_mid'];
        $main_order['gender']=$data['recivegender'];
        $main_order['email']=$data['reciveemail'];
        $main_order['cellphone']=$data['recivephone'];
        $main_order['send_address']=$data['reciveaddress'];
        $main_order['total']=$data['total'];
        $main_order['total_items']=$data['total_items'];
        $main_order['uniqid_id']=uniqid();
        $main_order['country']=$data['country'];
        $main_order['town']=$data['town'];
        $main_order['invoicetype']=$data['invoicetype'];
        $main_order['companyname']=$data['companyname'];
        $main_order['companyid']=$data['companyid'];
        $main_order['remark']=$data['remark'];
        $main_order['delivery_fee']=$data['delivery_fee'];
        $this->db->insert('main_transation',$main_order);
        
        $main_id=$this->db->insert_id();
        $total_cost=0;
        
        foreach($data['shopcart'] as $sk => $sv){
            $sub_data['trans_main_id']=$main_id;
            
            $sub_data['products_id']=$sv['productid'];
            
            if(empty($sv['sub_name'])){
                $sub_data['product_name']=$sv['name'];
            }else{
                $sub_data['product_name']=$sv['name']."(".$sv['sub_name'].")";
            }
            $sub_data['sale_price']=$sv['price'];
            if(isset($sv['cost'])){
                $sub_data['cost']=$sv['cost'];
                $total_cost+=$sv['cost'];
            }
            $sub_data['org_mid']=$data['org_mid'];
            $sub_data['order_type']=$sv['type'];
            
            if($sv['type']=="Group"){
                $sub_data['ordernumber']=$sv['amount'];
            }
            else{
                $sub_data['ordernumber']=$sv['qty'];
            }
            
            $this->db->insert('sub_transaction', $sub_data);
        }
        
        //更新
        $this->db->where('id', $main_id);
		$results=$this->db->update('main_transation',array('total_cost'=>$total_cost)); 
		return 1;		
	}
	
	function get_main_order_one($id=""){
		$this->db->select('o.org_name,t.delivery_fee,t.invoicetype,t.companyid,t.companyname,t.id,t.total,t.status,t.receiver,t.send_address,t.cellphone,t.invoice,t.total_items,t.create_time,t.atm_code,t.email,t.remark,t.uniqid_id');
		$this->db->from('main_transation as t');
        $this->db->join('org_member as o', 't.org_mid = o.org_mid');
		$this->db->where('t.uniqid_id',$id);
		return $this->db->get();
	}
    
    function get_detail_order_one($id=""){
		$this->db->select('*');
		$this->db->from('sub_transaction');
		$this->db->where('trans_main_id',$id);
		return $this->db->get();
	}
	
	function update_order($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('main_transation',$data); 
		return $results;	
	}
	
	function delete_order($id){
		$results=$this->db->delete('main_transation', array('uniqid_id' => $id)); 
		return $results;	
	}
    
    function get_delivery_status(){
        return array(
            0=>"尚未配送",
            1=>"已送達",
            2=>"缺貨中",
            3=>"配送爭",
        );
    }
}
?>