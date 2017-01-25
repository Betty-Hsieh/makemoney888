<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->model('video_model');
        $this->load->model('member_model');
        $this->load->library('general');
        $this->load->library('FileUpload');
    }

    function index()
    {
        $this->general->init_page();
        $video = $this->video_model->get_video_list();
        $data['video'] = $video->result();

        $this->load->view('admin/video_list.php', $data);
        $this->load->view('admin/footer');
    }

    function adding_video_page()
    {
        $this->general->init_page();
        
        $author = $this->member_model->get_author_list();
        $data['author'] = $author->result();
        
        $this->load->view('admin/video_adding_page',$data);
        $this->load->view('admin/footer');
    }

    function edit_video_page($id)
    {
        $this->general->init_page();
        
        $author = $this->member_model->get_author_list();
        $data['author'] = $author->result();
        
        $video = $this->video_model->get_video_one($id);
        $data['video'] = $video->result();

        $this->load->view('admin/video_editing_page', $data);
        $this->load->view('admin/footer');
    }

    function adding_video()
    {
        $data = array(
            'product_title' => $this->input->post('product_title'),
            'product_content' => $this->input->post('product_content'),
            'video' => $this->input->post('video'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'product_price' => $this->input->post('product_price'),
            'status' => $this->input->post('status'),
            'author_id' => $this->input->post('author_id'),
            'uniqid_id' => uniqid(),
            'type' => 'Video',
        );
        
        $upload_data = array('path' => 'upload/products/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['file_name'] != "") {
            $data['picture'] = $upload_info['file_name'];
        }    
        
        $rs = $this->video_model->add_video($data);
        redirect('/manager/Video');
    }

    function editing_video()
    {
        $id = $this->input->post('id');
        $data = array(
            'product_title' => $this->input->post('product_title'),
            'product_content' => $this->input->post('product_content'),
            'video' => $this->input->post('video'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'product_price' => $this->input->post('product_price'),
            'status' => $this->input->post('status'),
            'author_id' => $this->input->post('author_id'),
        );
        
        $upload_data = array('path' => 'upload/products/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if(isset($upload_info['file_name'])) {
            $data['picture'] = $upload_info['file_name'];
        }    
        
        $this->video_model->update_video($data, $id);
        redirect('/manager/Video');
    }

    function delete_video($id)
    {
        $rs = $this->video_model->delete_video($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
        redirect('/manager/Video');
    }
}
