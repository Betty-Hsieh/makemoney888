<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->library('general');
        $this->load->model('member_model');
        $this->load->library('FileUpload');
        $this->load->model('access_model');
    }

    public function index()
    {
        $this->general->init_page();
        $member_list = $this->member_model->get_member_list();
        $data['member'] = $member_list->result();
        $this->load->view('admin/member_list', $data);
        $this->load->view('admin/footer');
    }

    function adding_member_page()
    {
        $this->general->init_page();
        
        $access_list = $this->access_model->get_access_list();
        $data['access'] = $access_list->result();
        
        $this->load->view('admin/member_adding_page',$data);
        $this->load->view('admin/footer');
    }

    function adding_member()
    {
        $data = array(
            'm_name' => $this->input->post('m_name'),
            'm_password' => $this->input->post('m_password'),
            'm_email' => $this->input->post('m_email'),
            'introduction' => $this->input->post('introduction'),
            'permissions_id' => $this->input->post('pid'),
            "fid"=>$this->session->userdata('fid')
        );
        $upload_data = array('path' => 'upload/teacher/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['status'] !=0) {
            $data['picture'] = $upload_info['file_name'];
        }

        $this->member_model->add_member($data);
        redirect('/manager/member');
    }

    function member_editing_page($id)
    {
        $this->general->init_page();
        
        $access_list = $this->access_model->get_access_list();
        $data['access'] = $access_list->result();
        
        $member_one = $this->member_model->get_member_one($id);
        $data['member'] = $member_one->result();
        $data['id'] = $id;

        $this->load->view('admin/member_editing_page', $data);
        $this->load->view('admin/footer');
    }

    function editing_member()
    {
        $data = array(
            'm_name' => $this->input->post('m_name'),
            'm_password' => $this->input->post('m_password'),
            'm_email' => $this->input->post('m_email'),
            'introduction' => $this->input->post('introduction'),
            'status' => $this->input->post('status'),
            'permissions_id' => $this->input->post('pid'),
        );
        $id = $this->input->post('id');

        $upload_data = array('path' => 'upload/teacher/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['status'] !=0) {
            $data['picture'] = $upload_info['file_name'];
        }
        $this->member_model->update_member($data, $id);
        redirect('/manager/member');
    }

    function delete_member($id)
    {
        $rs = $this->member_model->delete_member($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
}
