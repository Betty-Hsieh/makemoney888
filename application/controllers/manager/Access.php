<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->library('general');
        $this->load->model('access_model');
    }

    public function index()
    {
        $this->general->init_page();
        $access_list = $this->access_model->get_access_list();
        $data['access'] = $access_list->result();
        $this->load->view('admin/access_list', $data);
        $this->load->view('admin/footer');
    }

    function adding_access_page()
    {
        $this->general->init_page();
        $this->load->view('admin/access_adding_page');
        $this->load->view('admin/footer');
    }

    function adding_access()
    {
        $data = array(
            'm_name' => $this->input->post('m_name'),
            'm_password' => $this->input->post('m_password'),
            'm_email' => $this->input->post('m_email'),
            'introduction' => $this->input->post('introduction'),
            );
        

        $this->access_model->add_access($data);
        redirect('/manager/access');
    }

    function access_editing_page($id)
    {
        $this->general->init_page();

        $access_one = $this->access_model->get_access_one($id);
        $data['access'] = $access_one->result();
        $data['id'] = $id;

        $this->load->view('admin/access_editing_page', $data);
        $this->load->view('admin/footer');
    }

    function editing_access()
    {
        $data = array(
            'm_name' => $this->input->post('m_name'),
            'm_password' => $this->input->post('m_password'),
            'm_email' => $this->input->post('m_email'),
            'introduction' => $this->input->post('introduction'),
            'status' => $this->input->post('status'));
        $id = $this->input->post('id');

        $this->access_model->update_access($data, $id);
        redirect('/manager/access');
    }

    function delete_access($id)
    {
        $rs = $this->access_model->delete_access($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
}
