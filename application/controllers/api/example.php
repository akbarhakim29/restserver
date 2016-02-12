<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Example extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
        $this->load->model('rest_model');
    }
    
    function hasil_get()
    {
        if(!$this->get('DATE_TIME'))
        {
        	$this->response(NULL, 400);
        }
		
		$this->load->model('rest_model');
		
		
		$DATE_TIME = $this->get('DATE_TIME');
		$DATE_TIME2 = $this->get('DATE_TIME2');
		$WILAYAH = $this->get('WILAYAH');
		
		if(($WILAYAH!=='null') && ($DATE_TIME!=='null')){
			$json = explode(" ",$DATE_TIME);
			$this->response($hasil = $this->rest_model->get_data_all($DATE_TIME,$DATE_TIME2,$WILAYAH));
			//$this->response(array('error' => 'User could not be found brh'), 404);
		
		}
		else if($DATE_TIME =="null"){
			$this->response($hasil = $this->rest_model->get_data_wilayah($WILAYAH));
			//$this->response(array('error' => 'User could not be '), 404);
		}
		else if($WILAYAH =="null"){
			$this->response($hasil = $this->rest_model->get_data_date($DATE_TIME,$DATE_TIME2));
			//$this->response(array('error' => 'User could not be foundASASDAS'), 404);
		}
    }
    function status_get()
    {
		$this->load->model('rest_model');
		$hasil = $this->rest_model->get_status();
		$this->response($hasil);
	}
    
	function berita_get()
	{
		$judul =  $this->get('judul');
		$berita = $this->get('berita');
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date("Y-m-d H:i:s");
	
		$hasil = $this->rest_model->insert_berita($judul,$berita,$tanggal);
		
		if($hasil){
			$this->response("Berhasil",200);
		}
		else{
			$this->response("Gagal",400);
		}
		
		
	}
	function list_get()
	{
		$this->load->model('rest_model');
		$hasil = $this->rest_model->get_list_berita();
		$this->response($hasil);
	}
	function checkadmin_get(){
		$username = $this->get('username');
		$pass = $this->get('pass');
		
		$hasil = $this->rest_model->checkadmin($username,$pass);
		$this->response($hasil);
	}
	function listadmin_get()
	{
		$this->load->model('rest_model');
		$hasil = $this->rest_model->get_list_admin();
		$this->response($hasil);
	}

	//fungsi untuk ambil admin
	function ambiladmin_get()
	{
		$username =  $this->get('username');
		$this->load->model('rest_model');
		$hasil = $this->rest_model->get_ambil_admin($username);
		$this->response($hasil);
	}

	//fungsi untuk update admin
	function updateadmin_get($username,$pass,$nama,$email,$email,$email,$hp,$jk,$alamat)
	{
		$username = $this->get('username');
        $pass     = $this->get('pass') ;
        $nama     = $this->get('nama');
        $email    = $this->get('email');
        $hp       = $this->get('hp');
        $jk       = $this->get('jk');
        $alamat   = $this->get('alamat'); 
		
		$this->load->model('rest_model');
		$hasil = $this->rest_model->get_update_admin($username,$pass,$nama,$email,$hp,$jk,$alamat);
		$this->response($hasil);
	}

	//fungsi untuk delete admin
	function deleteadmin_get()
	{

		$username =  $this->get('username');
		$this->load->model('rest_model');
		$hasil = $this->rest_model->get_delete_admin($username);
		$this->response($hasil);
	}
	function editberita_get(){
		$input = $this->get('ID');
		$this->load->model('rest_model');
		$hasil = $this->rest_model->edit_berita($input);
		$this->response($hasil);
	}
	function updateberita_get(){
		$id_berita =  $this->get('id_berita');
		$judul =  $this->get('judul');
		$berita = $this->get('berita');
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date("Y-m-d H:i:s");
		$this->load->model('rest_model');
		
		$hasil = $this->rest_model->update_berita($id_berita,$judul,$berita,$tanggal);
		
		
	}
	function bacaberita_get(){
		$input = $this->get('ID');
		$this->load->model('rest_model');
		$hasil = $this->rest_model->baca_berita($input);
		$this->response($hasil);
	}
	function deleteberita_get(){
		$input = $this->get('ID');
		$this->load->model('rest_model');
		$hasil = $this->rest_model->delete_berita($input);
		$this->response($hasil);
	}
	
	
}