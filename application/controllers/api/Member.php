<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('member_model');
        $this->load->model('student_model');
		$this->Builder_Access();
	}
	
	public function get_member_list()
	{
		$member_list=$this->member_model->get_member_list();
		$data['member_list']=$member_list->result();
		$this->output->set_output(json_encode($data));
	}
	
	public function Builder_Access(){
		$this->output->set_header( 'Access-Control-Allow-Origin: *' );  
		$this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
		$this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
		$this->output->set_content_type( 'application/json' );   //輸出接收格式
	}
    
    function get_a_member(){
        $input_data=array(
            'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password')
        );
        
		$member=$this->student_model->verify_student($input_data);
        $data=array();
        $row_data=$member->num_rows();
		if($row_data==1){
            $data['member']=$member->result();
			foreach($data['member'] as $row){
				$member_data=array(
					'member_name'=>$row->org_name,
					'member_id'=>$row->org_mid,
					'member_email'=>$row->org_email,
					'member_is_logged_in'=>true
				);
				$this->session->set_userdata($member_data);
			}
            $data['transation']=1;
		}
        else{
            $data['transation']=0;
        }
		
		$this->output->set_output(json_encode($data));
	}
    
    function register(){
        $input_data=array(
            'org_email'=>$this->input->post('email'),
            'birthday'=>$this->input->post('birthday'),
            'org_name'=>$this->input->post('username'),
            'nickname'=>$this->input->post('nickname'),
            'gender'=>$this->input->post('gender'),
            'org_password'=>$this->input->post('password')
        );
        $data=array();
		$member=$this->student_model->add_student($input_data);
        if($member==1){
            $data['transation']=1;
		}
        else{
            $data['transation']=0;
        }
        
        $toemail=$input_data['org_email'];
        $subject="註冊通知信";
        $content=$input_data['org_name']." 您好，您已經成功註冊亦然手工皂的網站，歡迎您加入以下是您的帳號與密:<br/>";
        $content.="帳號:".$input_data['org_email']."<br/>密碼:".$input_data['org_password']."<br/><br/>";
        $content.="您可以此組帳號密碼，登入網站瀏覽投資文章。<br/><br/>";
        $content.="<img src='http://www.makemoney888.com.tw/resource/images/logo.png'/><br/>";
        $content.="服務專線：886-2-2662-0332　傳真電話：886-2-2662-0332　 服務時間：週一～週五：9:00~17:30";
        $content.="本網站資訊 由亦然手工皂所有 若有任何建議或疑問請與我們連繫 Copyright © MakeMoney All Rights Reserved";
        $this->send_email($toemail,$subject,$content);
        $this->output->set_output(json_encode($data));
	}
    
    function editing_member(){
        $id=$this->input->post('id');
        $data=array();
        $input_data=array(
            'org_email'=>$this->input->post('email'),
            'birthday'=>$this->input->post('birthday'),
            'org_name'=>$this->input->post('username'),
            'nickname'=>$this->input->post('nickname'),
            'gender'=>$this->input->post('gender'),
            'org_password'=>$this->input->post('password'),
            'org_cellphone'=>$this->input->post('org_cellphone'),
            //'contact_phone'=>$this->input->post('contact_phone'),
            'epaper_order'=>$this->input->post('epaper_order')
        );
        
		$member=$this->student_model->update_student($input_data,$id);
        if($member==1){
            $data['transation']=1;
		}
        else{
            $data['transation']=0;
        }
		$this->output->set_output(json_encode($data));
	}
    
    function applicant_course(){
        $this->load->library('cart');
        $this->load->model('product_model');
        
        $uniqid=$this->input->post('id');
        $product=$this->product_model->get_course($uniqid);   
        $row = $product->row();
        
        $MemberId=$this->session->userdata('member_id');
        $price=$row->product_price; 
        if(!empty($MemberId)){
            $price=$row->member_price;
        }
        $data = array(
            'id'      => $uniqid,
            'qty'     => 1,
            'productid'   => $row->products_id,
            'price'   => $price,
            'name'    => $this->escapse_strings($row->product_title),
            'type' => $row->type,
            'pic'=> $row->picture
        );
		$this->cart->insert($data);
        $shopcart=$this->cart->contents();
        $info=array(
            'cart'=>$shopcart
        );
        $this->output->set_output(json_encode($info));
    }
    
    
    function escapse_strings($str){
        return str_replace(    
        array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*',    
            '+', ', ', '-', '.', '/', ':', ';', '<', '=', '>',    
            '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|',    
            '}', '~', '；', '﹔', '︰', '﹕', '：', '，', '﹐', '、',    
            '．', '﹒', '˙', '·', '。', '？', '！', '～', '‥', '‧',    
            '′', '〃', '〝', '〞', '‵', '‘', '’', '『', '』', '「',    
            '」', '“', '”', '…', '?', '?', '﹁', '﹂', '﹃', '﹄'),    
        '',    
        $str);
        
    }
    
    /*
    function send_email($toemail="",$subject="",$message=""){
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => 'WE1234567',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('', '手工皂');
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
    }
    */
	
}
