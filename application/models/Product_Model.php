<?php
class Product_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_product_list($data=""){
		$this->db->select('p.products_id,p.all_discount,p.product_title,p.home_promote,p.uniqid_id,
        p.shipping_discount,pd.sub_title,pd.price,pd.member_price,pd.cost,pd.inventory,p.create_time,p.product_content,p.status,p.picture');
		$this->db->from('products as p');
        
        $this->db->join('product_detail as pd', 'p.products_id = pd.product_id','left');
        
        $this->db->where('p.type','Mall');
        $this->db->where('pd.main_key',1);
        
        if(!empty($data['sub_category'])){
            $this->db->where('p.sub_category',$data['sub_category']);
        }
        
        if(!empty($data['main_category']) ){
            $this->db->where('p.category',$data['main_category']);
        }
        
        if(!empty($data['productname']) ){
            $this->db->like('p.product_title',$data['productname']);
        }
        
        if(!empty($data['sub_category']) ){
            $this->db->where('p.sub_category',$data['sub_category']);
        }
        
        if(isset($data['status'])){
            $this->db->where('p.status',$data['status']);
        }
        
        if(isset($data['home_promote'])){
            $this->db->where('p.home_promote',$data['home_promote']);
        }
        
        if(!empty($data['limit'])){
            $this->db->limit($data['limit']);
        }
        	
		return $this->db->get();
	}
	
	function add_product($data=""){
		$results=$this->db->insert('products', $data); 
		return $this->db->insert_id();
	}
    
    function add_sub_product($data=""){
		$results=$this->db->insert('product_detail', $data); 
		return $this->db->insert_id();
	}
	
    //取得產品以及細項
    function get_product_by_uniqid($id="",$detail=""){
		$this->db->select('p.*,pd.sub_title,pd.id as pd_id,pd.price,pd.member_price as m_price');
		$this->db->from('products as p');
        $this->db->join('product_detail as pd', 'p.products_id = pd.product_id');
        //$this->db->where('pd.main_key',1);
        
		$this->db->where('p.uniqid_id',$id);
        if(!empty($detail)){
            $this->db->where('pd.id',$detail);
        }
		return $this->db->get();
	}
    
    //取得課程內容
    function get_course($id="",$detail=""){
		$this->db->select('p.*');
		$this->db->from('products as p');
		$this->db->where('p.uniqid_id',$id);
		return $this->db->get();
	}
    
    function get_product_detail($id=""){
		$this->db->select('*');
		$this->db->from('product_detail');
		$this->db->where('product_id',$id);
		return $this->db->get();
	}
    
    function get_product_detail_by_id($id=""){
		$this->db->select('*');
		$this->db->from('product_detail');
		$this->db->where('id',$id);
		return $this->db->get();
	}
    
    
    /*
	function get_product_one($id=""){
		$this->db->select('category,sub_category,products_id,uniqid_id,member_price,product_remark,product_short,product_title,product_price,dis_price,create_time,product_content,status,picture');
		$this->db->from('products');
		$this->db->where('uniqid_id',$id);
		return $this->db->get();
	}	
    */
    function query_product($data=""){
		$this->db->select('product_title,member_price,uniqid_id,product_price,dis_price,status,picture');
		$this->db->from('products');
        $this->db->where('type','Mall');
        $this->db->like('product_title', $data['product_name'], 'both'); 
		return $this->db->get();
	}
    
	function update_product($data="",$id=""){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('products',$data); 
		return $results;	
	}
    
    function update_sub_product($data="",$id=""){
		$this->db->where('id', $id);
		$results=$this->db->update('product_detail',$data); 
		return $results;	
	}
	
	function delete_product($id=""){
		$results=$this->db->delete('products', array('uniqid_id' => $id)); 
		return $results;	
	}
    
    function duplicate_product($id){
        
        //取得產品主要鍵值
        $this->db->select('products_id');
		$this->db->from('products');
		$this->db->where('uniqid_id',$id);
        $product=$this->db->get();
        $row=$product->row();
        
        //取得子產品或細項規格
        $product_detail=$this->get_product_detail($row->products_id);
        $products=$product_detail->result();
        /*
        $sql="INSERT INTO products
        SELECT * FROM products AS iv WHERE iv.uniqid_id='".$id."'
        ON DUPLICATE KEY UPDATE products_id = (SELECT MAX(products_id)+1 FROM products)";
        */
        $SQL="insert into products(type,product_title,product_content,picture,category,sub_category,product_short,all_discount,shipping_discount)
select type,product_title,product_content,picture,category,sub_category,product_short,all_discount,shipping_discount
from products where uniqid_id = '".$id."'";
        $this->db->query($SQL);
        
        $last_id = $this->db->insert_id();
        $UPSQL="update products set uniqid_id='".uniqid()."' where products_id=".$last_id;
        $rs=$this->db->query($UPSQL);
        
        
        foreach($products as $key => $data){
	  		$PDSQL="insert into product_detail SET product_id=".$last_id.",price=".$data->price.",
              member_price=".$data->member_price.",sub_title='".$data->sub_title."',cost=".$data->cost.",inventory=".$data->inventory.",main_key=".$data->main_key."";
            $this->db->query($PDSQL);
		}
        return $rs;
    }
}
?>