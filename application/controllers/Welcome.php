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
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function uploads()
	{
	      $data = array();
	      if (!empty($_FILES['file']['name'])) {
	          $filesCount = count($_FILES['file']['name']);
	          for ($i = 0; $i < $filesCount; $i++) {
	              $_FILES['userFile']['name'] = str_replace(",","_",$_FILES['file']['name'][$i]);
	              $_FILES['userFile']['type'] = $_FILES['file']['type'][$i];
	              $_FILES['userFile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
	              $_FILES['userFile']['error'] = $_FILES['file']['error'][$i];
	              $_FILES['userFile']['size'] = $_FILES['file']['size'][$i];
	              //Directory where files will be uploaded
	              $uploadPath = 'uploads/';
	              $config['upload_path'] = $uploadPath;
	              // Specifying the file formats that are supported.
	              $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xls|xlsx|ppt|pptx|txt|rtf';
	              $this->load->library('upload', $config);
	              $this->upload->initialize($config);
	              if ($this->upload->do_upload('userFile')) {
	                  $fileData = $this->upload->data();
	                  echo $uploadData[$i]['file_name'] = $fileData['file_name'];
	              }
	          }
	          if (!empty($uploadData)) {
	              $list=array();
	              foreach ($uploadData as $value) {
	                  array_push($list, $value['file_name']);
	              }
	        echo json_encode($list);
	      	}
	    }
	}
}
