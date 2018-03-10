<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
		header('Content-type:json');
		$this->load->model('mod_sensor');
	}

	public function index(){}

	public function save_data(){
		if($this->uri->segment(3) != null && $this->uri->segment(4) != null){
			$data = array(
				"conductivity" => urldecode($this->uri->segment(3)),
				"tds" => urldecode($this->uri->segment(4)),
				"datetime" => date("Y-m-d H:i:s")
			);
			if($this->mod_sensor->save_data($data) > 0){
				$response = array(
					"code" => "",
					"message" => "Simpan data berhasil",
					"severity" => "success",
					"data" => ""
				);
			}else{
				$response = array(
					"code" => "",
					"message" => "Simpan data gagal",
					"severity" => "danger",
					"data" => ""
				);
			}
		}else{
			$response = array(
				"code" => "",
				"message" => "Tidak ada data dikirim ke server",
				"severity" => "warning",
				"data" => ""
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}

}
