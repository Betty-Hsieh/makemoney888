<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Verify_model');
        $this->load->model('article_model');
        $this->load->model('member_model');
        $this->load->library('general');
        $this->load->library('FileUpload');
    }

    function index()
    {
        $this->general->init_page();
        
        $author = $this->member_model->get_author_list();
        $data['author'] = $author->result();
        
        $category = $this->article_model->query_article_category();
        $data['category'] = $category->row();
        
        $query=array(
            'author'=> $this->input->post('author'),
            'article_tag'=> $this->input->post('article_tag'),
        );
        $article = $this->article_model->get_article_list($query);
        $data['article'] = $article->result();
        $this->load->view('admin/article_list.php', $data);
        $this->load->view('admin/footer');
    }

    function adding_article_page()
    {
        $this->general->init_page();

        $author = $this->member_model->get_author_list();
        $data['author'] = $author->result();

        $category = $this->article_model->query_article_category();
        $data['category'] = $category->row();

        $this->load->view('admin/article_adding_page', $data);
        $this->load->view('admin/footer');
    }

    function edit_article_page($id)
    {
        $this->general->init_page();

        $author = $this->member_model->get_author_list();
        $data['author'] = $author->result();

        $category = $this->article_model->query_article_category();
        $data['category'] = $category->row();

        $article = $this->article_model->get_article_one($id);
        $data['article'] = $article->result();
        //print_r($data['article']);
        $this->load->view('admin/article_editing_page', $data);
        $this->load->view('admin/footer');
    }

    function adding_article()
    {
        $data = array(
            'product_title' => $this->input->post('title'),
            'product_content' => $this->input->post('content'),
            'read_status' => $this->input->post('read_status'),
            'article_status' => $this->input->post('article_status'),
            'article_tag' => $this->input->post('article_tag'),
            'author_id' => $this->input->post('author'),
            'article_type' => $this->input->post('article_type'),
            'type' => 'Article',
            'uniqid_id' => uniqid(),
            );
        
        $upload_data = array('path' => 'upload/article/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['status'] !=0) {
            $data['picture'] = $upload_info['file_name'];
        }
        $rs = $this->article_model->add_article($data);
        redirect('/manager/Article');
    }

    function editing_article()
    {
        $id = $this->input->post('uniqid_id');
        $data = array(
            'product_title' => $this->input->post('title'),
            'product_content' => $this->input->post('content'),
            'read_status' => $this->input->post('read_status'),
            'article_status' => $this->input->post('article_status'),
            'article_tag' => $this->input->post('article_tag'),
            'author_id' => $this->input->post('author'),
            'article_type' => $this->input->post('article_type')
            );

        $upload_data = array('path' => 'upload/article/', 'file_name' => 'picture');
        $upload_info = $this->fileupload->upload_data($upload_data);
        if ($upload_info['status'] !=0) {
            $data['picture'] = $upload_info['file_name'];
        } 
        //print_r($data);   
        $this->article_model->update_article($data, $id);
        redirect('/manager/Article');
    }

    function delete_article($id)
    {
        $rs = $this->article_model->delete_article($id);
        $data = array('code' => $rs);
        $this->output->set_output(json_encode($data));
    }
}
