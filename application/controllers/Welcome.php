<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('directory_model');	

            }
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function listDirectory()
	{
		$path = 'uploads/';
		$directory = new \RecursiveDirectoryIterator($path);
		$iterator = new \RecursiveIteratorIterator($directory);
		$files = array();
		$fileList = array();
		foreach ($iterator as $info) {
			$fileList[] = $info->getPathname();
		}

		$data = array();
		$data['searchbox'] = ""		;// echo "<pre>";print_r($files);die();;

		if($this->input->post()){
			$data['searchbox'] = $this->input->post('search_box');
			$pattern = "/".$this->input->post('search_box')."/";
			$dir = new RecursiveDirectoryIterator($path);
			$ite = new RecursiveIteratorIterator($dir);
			$files = new RegexIterator($ite, $pattern, RegexIterator::GET_MATCH);
			    $fileList = array();
			foreach($files as $file) {
				        $fileList = array_merge($fileList, $file);
			}
		}
		$data['files'] = $fileList;
		
		$this->load->view('listDirectory',$data);
	}

	public function removeDirectoryOrFile()
	{
		$dir = $this->input->post('path');
		$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file) {
			(is_dir("$dir/$file")) ? recurseRmdir("$dir/$file") : unlink("$dir/$file");
			$this->directory_model->insert_entry("$dir/$file");
		}
		rmdir($dir);	
		
		echo "success";
	}

	public function uploadFiles()
	{
		$this->load->view('uploadFiles');
	}

	public function do_upload()
    {
        $config['upload_path'] = 'uploads/';

        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|jpeg';
        $config['max_size']      = '2048';
        $config['max_width']     = '1024';
        $config['max_height']    = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

        } else {
            $data = array('image_metadata' => $this->upload->data());

        }
        $this->load->view('uploadFiles');
    }

    public function listHistoryFiles(){
    	$data['files'] = $this->directory_model->getHistoryfiles();
    	$this->load->view('listDirectoryHistory',$data);
	
    }

}
