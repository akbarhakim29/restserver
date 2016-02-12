<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_cont extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->helper('url');
		$this->load->view('test_view');
		$this->load->library('curl');
	}
	function hasil(){
		if($this->input->get('dateawal')){
			$awal = $this->input->get('dateawal');
			$akhir = $this->input->get('dateakhir');
			
			$dateawal = str_replace("/","-",$awal);
			$awal = str_replace(" ","%20",$dateawal);
			$dateakhir = str_replace("/","-",$akhir);
			$akhir = str_replace(" ","%20",$dateakhir);
			
			
			$url = "http://localhost/restserver/index.php/api/example/hasil/DATE_TIME/$awal%20$akhir/format/json";
			
			$json = $this->curl->simple_get($url);
			//$jsonUrl =file_get_contents($url);
			//$json_idr = json_decode($json);
			//$client = curl_init($url);
			//curl_setopt($client, CURLOPT_RETURNTRANSFER,1);
			//$response=curl_exec($client);
			//echo $response;
			$result['query'] = json_decode($json);
			$fp = fopen('Asset/datajson.json', 'w');
			fwrite($fp, json_encode($result));
			fclose($fp);
			$this->load->view('view_hasil',$result);	
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */