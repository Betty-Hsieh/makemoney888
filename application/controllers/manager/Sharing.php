<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sharing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->model('sharing_model');
        $this->load->library('general');
    }

    function index()
    {
        $this->general->init_page();

        $sharing = $this->sharing_model->get_sharing_list();
        $data['sharing'] = $sharing->result();

        $this->load->view('admin/sharing_list.php', $data);
        $this->load->view('admin/footer');
    }

    function adding_sharing_page()
    {
        $this->general->init_page();
        $this->load->view('admin/sharing_adding_page');
        $this->load->view('admin/footer');
    }

    function edit_sharing_page($id="")
    {
        $this->general->init_page();
        
        
        $sharing = $this->sharing_model->get_sharing_by_uniqid($id);
        $data['sharing'] = $sharing->result();

        $this->load->view('admin/sharing_editing_page', $data);
        $this->load->view('admin/footer');
    }

    function adding_sharing()
    {
        $data = array(
            'status' => $this->input->post('status'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'type'=>"UserFeedback",
            'uniqid_id' => uniqid(),
            );
        $rs = $this->sharing_model->add_sharing($data);
        redirect('/manager/sharing');
    }

    function editing_sharing()
    {
        $id = $this->input->post('id');
        $data = array(
            'status' => $this->input->post('status'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        );
        redirect('/manager/sharing');
    }

    function delete_sharing($id)
    {
        $rs = $this->sharing_model->delete_sharing($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
}
