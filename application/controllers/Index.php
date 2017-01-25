<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
    }

    //routersè·¯ç”±?¸æ?s
    public function _remap($method, $id)
    {
        if ($method != "") {
            $this->$method($id);
        } else {
            $this->index();
        }
    }

    function index()
    {
		$this->load->model('advertising_model');
        $this->load->model('product_model');
        $this->load->model('news_model');
		$this->load->model('sharing_model');
        $this->load->model('faq_model');
        $this->load->model('course_model');
		$this->load->model('sharing_model');
        $SlideAdv=$this->advertising_model->get_advertising_list();
		$data['advertising']=$SlideAdv->result();
        		
        $news=$this->news_model->get_news_list();
		$data['news']=$news->result();
        
        $product_where=array("status"=>1,"home_promote"=>1,"limit"=>3);
        $product = $this->product_model->get_product_list($product_where);
        $data['promote_product'] = $product->result();
        
        $product_where=array("status"=>1,"home_promote"=>0);
        $product = $this->product_model->get_product_list($product_where);
        $data['product'] = $product->result();
        
        $share = $this->sharing_model->latest_sharing();
        $data['share'] = $share->result();
		
        $faq=$this->faq_model->latest_faq();
		$data['faq']=$faq->result();
        
        $course=$this->course_model->latest_course();
		$data['course']=$course->result();
        
		$this->load_head();
		$this->load_header();
        $this->load->view('index', $data);
        $this->load_footer();
    }
	
	function load_header(){
	    $this->load->library('cart');
	    $data['top_total_items']=$this->cart->total_items();
		$data['category']=$this->init_category_list();
        $data['member_id'] = $this->session->userdata('member_id');
        $this->load->view('include/header.php',$data);
    }
    
    function init_category_list(){
        $this->load->model('category_model');        
        $data=array();
        
        $where['layer']=1;
        $where['status']=1;
		$category=$this->category_model->get_category_list($where);
        
        $k=0;
        foreach($category->result() as $ck => $cv){
            $data[$k]['parentid']=$cv->parentid;
            $data[$k]['id']=$cv->id;
            $data[$k]['layer']=$cv->layer;
            $data[$k]['uniqid_id']=$cv->uniqid_id;
            $data[$k]['title']=$cv->title;
            $k++;
            $chlid['main']=$cv->id;
            $child_category=$this->category_model->get_category_by_main($chlid);
            if($child_category->num_rows()>0){
                foreach($child_category->result() as $sck => $scv){
                    $data[$k]['parentid']=$scv->parentid;
                    $data[$k]['id']=$scv->id;
                    $data[$k]['layer']=$scv->layer;
                    $data[$k]['uniqid_id']=$scv->uniqid_id;
                    $data[$k]['title']="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$scv->title;
                    $k++;
                }
            }
        }
        return $data;   
    }
            
	function load_head(){
        $this->load->view('include/head.php');
    }

    function load_footer(){
        $this->load->view('include/footer.php');
    }
	
    function about(){
        $this->load_head();
		$this->load_header();
        
        $this->load->model('about_model');
        
        $where['fid']="soap";
        $data['about']=$this->about_model->get_about_data($where);
        $this->load->view('about',$data);
        $this->load_footer();
    }
    
    function contact(){
        $this->load_head();
		$this->load_header();
        $this->load->model('contact_model');
        
        $where['fid']="soap";
        $data['contact']=$this->contact_model->get_contact_data($where);
        
        $this->load->view('contact',$data);
        $this->load_footer();
    }
	
    function news_list(){
        $this->load_head();
		$this->load_header();
        $this->load->model('news_model');
        $news=$this->news_model->get_news_list();
		$data['news']=$news->result();
        
        $this->load->view('news_list',$data);
        $this->load_footer();
    }
    
    function news_detail($id){
        $this->load_head();
		$this->load_header();
        $this->load->model('news_model');
        $news=$this->news_model->get_news_one($id[0]);
		$data['news']=$news->row();
        $this->load->view('news_detail',$data);
        $this->load_footer();
    }
    
	function product_list($id=""){
        $this->load_head();
		$this->load_header();
        $this->load->model('product_model');
        $where="";
        if(!empty($id[0])){
            $where['main_category']=$id[0];
        }
        if(!empty($id[1])){
            $where['sub_category']=$id[1];
        }
        $product = $this->product_model->get_product_list($where);
        $data['product'] = $product->result();
        $this->load->view('product_list',$data);
        $this->load_footer();
    }
    
    function product_detail($uniqid_id){
        $this->load_head();
		$this->load_header();
        $this->load->model('product_model');
        $this->load->model('strategery_model');
        $this->load->model('shipping_model');
        
        $product = $this->product_model->get_product_by_uniqid($uniqid_id[0]);
        $product_data=$product->row();
        $data['product'] = $product_data;
        
        //²£«~²Ó¸`
        $product_detail = $this->product_model->get_product_detail($product_data->products_id);
        $product_detail_data=$product_detail->result();
        $data['product_detail'] = $product_detail_data;
        
       //¥þÀ]§é¦©
       $shop_discount=$this->shipping_model->get_shipping_one(14);
       $shop_discount=$shop_discount->row();
       if($shop_discount->status==1 && $shop_discount->fvalue2!=0 && $product_data->all_discount==1){
            $data['discount_price']=round($product_data->price*$shop_discount->fvalue2/100);
       }
        
        $id=$product_data->uniqid_id;
        $strategery = $this->strategery_model->get_strategery_group($id);
        
        foreach($strategery->result() as $key => $v){
            $data['groups'][$key]['id']=$v->id;
            $data['groups'][$key]['title']=$v->title;
            $data['groups'][$key]['status']=$v->status;
            $data['groups'][$key]['uniqid_id']=$v->uniqid_id;
            $data['groups'][$key]['amount']=$v->amount;

            $ProductID=json_decode($v->pid);
            $Amount=json_decode($v->amount);
            
            $temp_product_name="";
            foreach($ProductID as $pk => $pv){
                $one_product=$this->product_model->get_product_by_uniqid($pv);
                $row_data=$one_product->row();
                $temp_product_name.="<a href='/index/product_detail/".$pv."' target='_blank'>".$row_data->product_title."</a>";
            }
            $data['groups'][$key]['name']=$temp_product_name;
            $data['groups'][$key]['price']=$v->price;
            
            $temp_amount="";
            foreach($Amount as $pk => $pv){
                $temp_amount.=" ".$pv.iconv("big5","UTF-8"," ­Ó")." <br/>";   
            }
            $data['groups'][$key]['amount']=$temp_amount;
            
        }
        $this->load->view('product_detail',$data);
        $this->load_footer();
    }
	
    
    function query_product(){
        $productname=$this->input->post('productname');
        $this->load_head();
		$this->load_header();
        $this->load->model('product_model');
        $where="";
        if(!empty($productname)){
            $where['productname']=$productname;
        }
        $product = $this->product_model->get_product_list($where);
        $data['product'] = $product->result();
        $this->load->view('product_list',$data);
        $this->load_footer();
    }
	
    function faq_list(){
        $this->load_head();
		$this->load_header();
        $this->load->model('faq_model');
        
		$faq=$this->faq_model->get_faq_list();
		$data['faq']=$faq->result();
        
        $this->load->view('faq_list',$data);
        $this->load_footer();
    }
    
    function share_list(){
        $this->load_head();
		$this->load_header();
		$this->load->model('sharing_model');
        $sharing = $this->sharing_model->latest_sharing();
        $data['share'] = $sharing->result();
        $this->load->view('share_list',$data);
        $this->load_footer();
    }
	
	function sharing_detail($id){
	   $this->load_head();
		$this->load_header();
        $this->load->model('sharing_model');
        
        $sharing=$this->sharing_model->get_sharing_by_uniqid($id[0]);
		$data['share']=$sharing->row();
        
        $this->load->view('share_detail',$data);
        $this->load_footer();
	}
    
	function course_list(){
        $this->load_head();
		$this->load_header();
        $this->load->model('course_model');
        $course=$this->course_model->get_course_list();
		$data['course']=$course->result();
        $this->load->view('course_list',$data);
        $this->load_footer();
    }
    
    function course_detail($id){
        $this->load_head();
		$this->load_header();
        $this->load->model('course_model');
        
        $course=$this->course_model->get_course_one($id[0]);
		$data['course']=$course->row();
        
        $this->load->view('course_detail',$data);
        $this->load_footer();
    }
    
    function register(){
        $this->load->model('student_model');
        $data = array(
		   'org_name' => $this->input->post('user_name'),
		   'org_email' => $this->input->post('user_email'),
           'org_password' => $this->input->post('user_password'),
           'birthday' => $this->input->post('birthday'),
           'cellphone' => $this->input->post('tel'),
           'gender' => $this->input->post('gender'),
           'address' => $this->input->post('address'),
		);
		$msg=array();
        $CheckEmail=$this->student_model->get_student_by_email($data['org_email']);
        $num_rows=$CheckEmail->num_rows();
        if($num_rows==0){
		  $rs=$this->student_model->add_student($data);
            if($rs==1){
                $msg['res']=1;
            }
            else{
                $msg['res']=0;
            }
        }else{
            $msg['res']=4;
        }
		$this->output->set_output(json_encode($msg));
    }
	
	function login(){

        $this->load->model('student_model');
        $input_data=array(
            'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password')
        );
		$member=$this->student_model->verify_student($input_data);
        $data=array();
        $rows=$member->num_rows();
		
		if($rows==1){
			foreach($member->result() as $row){
				$member_session=array(
					'member_name'=>$row->org_name,
					'member_id'=>$row->org_mid,
					'member_email'=>$row->org_email,
					'member_is_logged_in'=>true
				);
				$this->session->set_userdata($member_session);
				$data['name']=$row->org_name;
                $data['transation']=1;
			} 
		}
        else{
            $data['transation']=0;
        }
		 $this->output->set_output(json_encode($data));
    }
	
	function check_login($type=""){
        $id = $this->session->userdata('member_id');
		$data['status']=(!empty($id))? 1:-1;
        if(!empty($type[0]) && $type[0]=="front"){
            $this->output->set_output(json_encode($data));
        }
        return $id;
    }
    
    function escapse_strings($str){
        return str_replace(    
        array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*',    
            '+', ', ', '-', '.', '/', ':', ';', '<', '=', '>',    
            '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|',    
            '}', '~', '¡F', '¡Q', '¡J', '¡R', '¡G', '¡A', '¡M', '¡B',    
            '¡D', '¡O', '£»', '¡P', '¡C', '¡H', '¡I', '¡ã', '¡L', '¡E',    
            '¡¬', '¡²', '¡©', '¡ª', '¡«', '¡¥', '¡¦', '¡y', '¡z', '¡u',    
            '¡v', '¡§', '¡¨', '¡K', '?', '?', '¡w', '¡x', '¡{', '¡|'),    
        '',    
        $str);
        
    }
    
	//ÁÊª«¬yµ{	
	function adding_item(){
	   $id = $this->session->userdata('member_id');

       $this->load->library('cart');
	   $this->load->model('product_model');
	   $this->load->model('shipping_model');
       $this->load->model('strategery_model');
              
       $uniqid=$this->input->post('uniqid');
       $product_detail=$this->input->post('product_detail');
       
       $product=$this->product_model->get_product_by_uniqid($uniqid,$product_detail);   
       $row = $product->row();
       
       //ÀË¬d­qÁÊ¶q
       $order_number=$this->input->post('order_number');
       if($order_number==""){
            $order_number=1;
       }
       
       //¬d¸ßproducts¦s¦b®É
       if(!empty($row->price)){
           
           //ÀË¬d»ù®æ
           $product_price=$row->price;
           $cost=$row->cost;
           $products_id=$row->products_id;
           $pd_id=$row->pd_id;
           $product_title=$this->escapse_strings($row->product_title);
           $sub_name=$row->sub_title;
           $type=$row->type;
           $picture=$row->picture;
           
           //§PÂ_¬O§_¦³·|­û¡Aµ¹¤©·|­û»ù®æ
           $member_price=0;
           if(!empty($id)){
                $member_price=$row->member_price;
           }
           
           //ÀË¬d¬O§_¦³¥þÀ]§é¦©
           $shop_discount=$this->shipping_model->get_shipping_one(14);
           $shop_discount=$shop_discount->row();
           if(!empty($id) && $shop_discount->status==1 && $shop_discount->fvalue2!=0 && $row->all_discount==1){
                $discount_price=round($product_price*$shop_discount->fvalue2/100);
                
                if($member_price>$discount_price){
                    $product_price=$discount_price;
                }
           } 
           
           //ÀË¬d¬O§_¦³º¡ÃB§K¹B¶O
           $shipping_discount=0;
           $shipping=$this->shipping_model->get_shipping_one(11);
           $shipping=$shipping->row();
           if($shipping->status==1 && $shipping->fvalue2!=0 && $row->shipping_discount==1){
                $shipping_discount=1;
           } 
           
           $data = array(
                'id'      => $uniqid.$pd_id,
                'qty'     => $order_number,
                'productid'   => $products_id,
                'price'   => $product_price,
                'cost'   => $cost,
                'shipping_discount'   => $shipping_discount,
                'name'    => $product_title,
                'sub_name'    => $sub_name,
                'type' => $type,
    			'pic'=> $picture,
                'pd_id'=> $pd_id,
            );
    		$this->cart->insert($data);
       }
       else{
            //±q²Õ¦X°Ó«~¤¤¬d¸ß
            $strategery = $this->strategery_model->get_strategery_by_uniqid($uniqid);
            $group=$strategery->row();

            $ProductID=json_decode($group->pid);
            $Amount=json_decode($group->amount);
            
            $data = array(
                'id'      => $group->uniqid_id,
                'qty'     => $order_number,
                'productid'   => $group->pid,
                'price'   => $group->price,
                'shipping_discount'   => 0,
                'name'    => $group->title,
                'type' => "Group",
    			'amount'=> $group->amount,
            );
    		$this->cart->insert($data);
       }
		$data['total_items']=$this->cart->total_items();
		$this->output->set_output(json_encode($data));
	}
    
    function query_product_detail(){
        $this->load->model('product_model');
        $id=$this->input->post('id');
        $product=$this->product_model->get_product_detail_by_id($id);   
        $row = $product->row();
        $data = array(
            'sub_title'      => $row->sub_title,
            'price'     => $row->price,
            'member_price'   => $row->member_price,
            'inventory'     =>$row->inventory
        );
        echo json_encode($data);
    }
    
    function order_cancel(){
        $this->load->library('cart');
        $data = array(
           'rowid' => $this->input->post('id'),
           'qty'   => 0
        );
        $this->cart->update($data); 
    }
	
	function cart1(){
	    $this->load->model('product_model');
        $this->load->model('shipping_model');
		$this->load->library('cart');
        $this->load_head();
		$this->load_header();
		$shopcart=$this->cart->contents();
		
        //ÀË¬d¬O§_·|­û¤w¸gµn¤J¡Aµn¤J¥²¶·±NÁÊª«¨®²£«~»ù®æ§ó´«¬°·|­û»ù
        $id = $this->session->userdata('member_id');
        if($id!=0){
            foreach($shopcart as $ik => $items){
                $pid=$items['id'];
                $pd_id=(!empty($items['pd_id']))? $items['pd_id']: '';
                $productRS = $this->product_model->get_product_by_uniqid($pid,$pd_id);
                
                //·í¬d¸ß±o¨ì²£«~®É
                if($productRS->num_rows()>0){
                    $product=$productRS->row();
                    $price=0;
                    
                    //·í¦³·|­û»ù®æ®É
                    $member_price=$product->m_price;
                    
                    if($member_price!=0){
                        $price=$member_price;
                    }
                    
                   //§PÂ_¬O§_¦³¥þÀ]¥´§é
                   $shop_discount=$this->shipping_model->get_shipping_one(14);
                   $shop_discount=$shop_discount->row();
                   if(!empty($id) && $shop_discount->status==1 && $shop_discount->fvalue2!=0 && $product->all_discount==1){
                        $discount_price=round($product->price*$shop_discount->fvalue2/100);
                        
                        if($member_price>$discount_price){
                            $price=$discount_price;
                        }
                   }
                    
                    $updateData = array(
                       'rowid' => $items['rowid'],
                       'price'   => $price
                    );
                    $this->cart->update($updateData);
                }
            }
        }
        
        $shopcart=$this->cart->contents();
		$total=$this->cart->total();
        $data=array(
            'cart'=>$shopcart,
			'total'=>$total
        );
		//print_r($data);
        
        //Åã¥Ü¹B¶O¸ê°T
        $shipping=$this->shipping_model->get_shipping_by_key('shipping');
        $data['shipping']=$shipping->result();
        $this->load->view('cart_1',$data);
        $this->load_footer();
    }
	
	function cart2(){
	    $this->load->library('cart');
        $this->check_login();
        $this->load->model('student_model');
        $this->load->model('area_model');
        
        $cart1=array(
			'remark'=>$this->input->post('remark'),
            'shipping'=>$this->input->post('shipping'),
		);
		$this->session->set_userdata($cart1);
        
        $id = $this->session->userdata('member_id');
        $student_one=$this->student_model->get_student_one($id);
		$data['student']=$student_one->result();
        
        $area=$this->area_model->get_area_list();
		$data['area']=$area->result();
        
        $this->load_head();
		$this->load_header();
        
        $shopcart=$this->cart->contents();
		$total=$this->cart->total();
        $data['order_list']=array(
            'cart'=>$shopcart,
			'order_total'=>$total,
            'shipping'=>$this->input->post('shipping'),
            'total'=>(int)$total+$this->input->post('shipping'),
        );
        
        $this->load->view('cart_2',$data);
        $this->load_footer();	
    }
	
	function cart3(){
        $this->load->library('cart');  
        $this->load_head();
		$this->load_header();
		$this->load->model('order_model');
		$shopcart=$this->cart->contents();
		$total=$this->cart->total();
        
		$data=array(
            'paymethod'=>$this->input->post('paymethod'),
			'receiver'=>$this->input->post('receiver'),
			'recivegender'=>$this->input->post('recivegender'),
			'reciveemail'=>$this->input->post('reciveemail'),
            'recivephone'=>$this->input->post('recivephone'),
			'reciveaddress'=>$this->input->post('reciveaddress'),
            'org_mid'=>$this->session->userdata('member_id'),
            'country'=>$this->input->post('country'),
            'invoicetype'=>$this->input->post('invoicetype'),
            'companyname'=>$this->input->post('companyname'),
            'companyid'=>$this->input->post('companyid'),
            'town'=>$this->input->post('town'),
            'remark'=>$this->session->userdata('remark'),
            'delivery_fee'=>$this->session->userdata('shipping'),
        );
        $data['shopcart']=$shopcart;
        $data['total']=$total;
        $data['total_items']=$this->cart->total_items();
        //print_r($data);
        
        if($data['total_items']>0){
            $this->order_model->add_order($data);
            $this->cart->destroy();
        }
        $this->load->view('cart_3');
        $this->load_footer();
    }

    function member_center(){
        $id=$this->check_login();
        $this->load_head();
		$this->load_header();
        $this->load->view('member_center');
        $this->load_footer();
    }
    
    function personal_update(){
        $id=$this->check_login();
        $this->load->model('student_model');
        $this->load->model('order_model');
        $this->load_head();
		$this->load_header();
        
        $student_one = $this->student_model->get_student_one($id);
        $data['student'] = $student_one->row();
        
        $order = $this->order_model->get_member_order(array('id'=>$id));
        $data['order'] = $order->result();
        
        $this->load->view('personal_update.php', $data);
        $this->load_footer();
    }
    
    function personal_order(){
        $id=$this->check_login();
        $this->load->model('order_model');
        $this->load_head();
		$this->load_header();
        
        $order = $this->order_model->get_member_order(array('id'=>$id));
        $data['order'] = $order->result();
        $this->load->view('personal_order', $data);
        $this->load_footer();
    }
    
    function order_detail($id){
        $this->check_login();
        $this->load->model('order_model');
        $this->load_head();
		$this->load_header();
        $order = $this->order_model->get_main_order_one($id[0]);
        $order_data= $order->row();
        $data['order'] = $order_data;
        
        $order_detail = $this->order_model->get_detail_order_one($order_data->id);
        $data['order_detail'] = $order_detail->result();
        
        $this->load->view('order_detail', $data);
        $this->load_footer();
    }
    
    function edit_member_data(){
        $id=$this->check_login();
        $this->load->model('student_model');
		$data = array(
		   'org_name' => $this->input->post('org_name'),
		   'org_password' => $this->input->post('org_password'),
		   'org_email' => $this->input->post('org_email'),
		   'cellphone' => $this->input->post('cellphone'),
           'phone' => $this->input->post('phone'),
           'gender' => $this->input->post('gender'),
           'address' => $this->input->post('address'),
		);
		
		$this->student_model->update_student($data,$id);
		redirect('/index/personal_update');
	}
    
    
    function check_atm_code(){
        $this->check_login();
        $this->load->model('order_model');
        $id=$this->input->post('id');
        $data=array(
			'atm_code'=>$this->input->post('atm_code'),
		);
        $rs=$this->order_model->update_order($data,$id);
        echo $rs;
    }
    
    /*

    function member()
    {
        $this->load_header();
        $this->load_top_menu();
        
        $this->load->view('member.php');
        $this->load_footer();
    }


    function forget_password()
    {
        $this->load_header();
        $this->load_top_menu();
        $this->load->view('forget_password.php');
        $this->load_footer();
    }
    

    function get_session_data()
    {
        $member_id = $this->session->userdata('member_id');
        $member_name = $this->session->userdata('member_name');
        $meber_email = $this->session->userdata('meber_email');

        $data['member_name'] = $member_name;
        $data['member_id'] = $member_id;
        $data['member_email'] = $meber_email;
        return $data;
    }
    function check_login()
    {
        $id = $this->session->userdata('member_id');
        if(empty($id)){ 
            redirect('/index/member'); 
        } 
        return $id;
    }
    
    function check_items(){
        $this->load->library('cart');
        $items_number=$this->cart->total_items();
        if($items_number<1){
            redirect('/index/gocart');       
        }
    }
    
    
    function send_email($toemail="",$subject="",$message=""){
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'wealthy1689@gmail.com',
            'smtp_pass' => 'WE1234567',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('wealthy1689@gmail.com', '¥çµM¤â¤u¨m');
        $this->email->to($toemail);

        $this->email->subject($subject);
        $this->email->message($message);  
        // Set to, from, message, etc.
        
        if($this->email->send()){
            return 'Your email was sent';
        }
        else{
            show_error($this->email->print_debugger());
        }
    }*/
    
    function logout(){
        $this->session->sess_destroy();
        redirect('/index');
    }
}
