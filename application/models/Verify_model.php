<?php
class Verify_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->library('session');
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
		 	redirect('/manager/MoneyUser');
			exit();
		}
    }
	

}
?>