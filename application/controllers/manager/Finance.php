<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Verify_model');
		$this->load->model('finance_model');
		$this->load->library('general');
        $this->load->library('FileUpload');
	}
	
	function index(){
		$this->general->init_page();
		
		$finance=$this->finance_model->get_finance_list();
		$data['finance']=$finance->result();
		
		$this->load->view('admin/finance_list.php',$data);
		$this->load->view('admin/footer');
	}
	
	function finance_adding_page(){
		$this->general->init_page();
		$this->load->view('admin/finance_adding_page');
		$this->load->view('admin/footer');
	}
	
	function finance_editing_page($id=""){
		$this->general->init_page();
		
		$finance=$this->finance_model->get_finance_one($id);
		$data['finance']=$finance->result();
		$this->load->view('admin/finance_editing_page',$data);
		$this->load->view('admin/footer');
	}
	
	
	function editing_finance(){
	    $id=$this->input->post('uniqid_id');
        
		$data=array(
			'status'=>$this->input->post('status'),
			'content'=>$this->input->post('introduction'),
			'title'=>$this->input->post('title'),
            'menu_id'=>$this->input->post('menu_id'),
		);
		$upload_data = array('path' => 'upload/finance/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['file_name'] != "") {
            $data['picture'] = $upload_info['file_name'];
        }
        
		$this->finance_model->update_finance($data,$id);
        redirect('/manager/Finance');
	}
	
	function delete_finance($id){
		$rs=$this->finance_model->delete_finance($id);
		$data=array(
			'code'=>$rs
		);
		$this->output->set_output(json_encode($data));
	}
    
    function ranking_value(){
        //$this->load->helper('file');
        $this->load->helper('directory');
        $this->load->library('PHPExcel');
        
        $file['path']="upload/finance_statistic/value_".date('Y_m_d').".xlsx";
        $data=$this->reading_excel_data($file);
        
        $content="<table border=1>";
        $content.="<tr>";
        foreach($data['header'][1] as $vk => $v){
            $content.="<td>".$v."</td>";
        }
        $content.="</tr>";
        
        foreach($data['values'] as $vk => $v){
            $content.="<tr>";
            $content.="<td>".$v['A']."</td>";
            $content.="<td>".$v['B']."</td>";
            $content.="<td>".$v['C']."</td>";
            $content.="</tr>";
        }
        
        $content.="</table>";
        //Saving data to the database and adding a new row.
        $add_data=array(
			'menu_id'=>8,
			'content'=>$content,
			'title'=>date("Y-m-d")." 股票市值排行",
            'uniqid_id' => uniqid(),
		);
        $rs=$this->finance_model->add_finance($add_data);
        
        //將已匯入至DB檔案移動到資料夾unused
        $file['copypath']="upload/finance_statistic/unused/value_".date('Y_m_d').".xlsx";
        rename($file['path'],$file['copypath']);               
    }
    
    
    
    function reading_excel_data($data=""){
        
        $file = $data['path'];
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        //get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }
        //send the data in an array format
        $data['header'] = $header;
        $data['values'] = $arr_data;
        
        return $data;
    }
}