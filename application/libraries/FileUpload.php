<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class FileUpload
{
    private $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    function upload_data($data = "")
    {
        $config = array(
            'upload_path' => $data['path'],
            'allowed_types'   => "gif|jpg|png|jpeg|pdf|doc|xml",
            //'max_size' => '0',
            'encrypt_name' => true,
            'remove_spaces'=>true
        );
        $this->CI->upload->initialize($config);
        if ($this->CI->upload->do_upload($data['file_name'])) {
            $data = $this->CI->upload->data();
            $data['status']=1;
        } else {
            $data = array(
                'msg'=>$this->CI->upload->display_errors(),
                'status'=>0
            );
        }
        return $data;
    }
}
