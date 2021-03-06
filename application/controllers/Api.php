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
					"data" => "#OK^"
				);
			}else{
				$response = array(
					"code" => "",
					"message" => "Simpan data gagal",
					"severity" => "danger",
					"data" => "#NOT OK^"
				);
			}
		}else{
			$response = array(
				"code" => "",
				"message" => "Tidak ada data dikirim ke server",
				"severity" => "warning",
				"data" => "#NOT OK^"
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}

	public function get_instruksi(){
		$recent = $this->mod_sensor->get_recent();
		if($recent[0]->conductivity > 600){
			echo "RELAY ON";
		}else{
			echo "RELAY OFF";
		}

	}

	public function get_recent(){
		$response = $this->mod_sensor->get_recent();
		echo json_encode($response,JSON_PRETTY_PRINT);
	}
	
	public function get_data(){
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    
	    
	    $datas = $this->mod_sensor->get_all();
	    
	    $data = array();
	    
	    foreach($datas->result() as $r) {
	        
	        $data[] = array(
	            $r->conductivity,
	            $r->tds,
	            $r->datetime
	        );
	    }
	    
	    $output = array(
	        "draw" => $draw,
	        "recordsTotal" => $datas->num_rows(),
	        "recordsFiltered" => $datas->num_rows(),
	        "data" => $data
	    );
	    echo json_encode($output);
	    exit();
	}
}
