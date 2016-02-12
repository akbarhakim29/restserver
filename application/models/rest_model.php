<?php
	class Rest_model extends CI_model{
		
		function get_data_all($DATE_TIME,$DATE_TIME2,$WILAYAH){
			$query = $this->db->query("select * from tabel_klimatologi WHERE (DATE_TIME BETWEEN '$DATE_TIME' AND '$DATE_TIME2') AND WILAYAH = '$WILAYAH'");
			
			return $query->result();
		}
		function get_data_date($DATE_TIME,$DATE_TIME2){
			$query = $this->db->query("select * from tabel_klimatologi WHERE (DATE_TIME BETWEEN '$DATE_TIME' AND '$DATE_TIME2')");
			
			return $query->result();
		}
		function get_data_wilayah($WILAYAH){
			$query = $this->db->query("select * from tabel_klimatologi WHERE WILAYAH = '$WILAYAH'");
			
			return $query->result();
		}
		function get_status(){
			$query = $this->db->query("SELECT WILAYAH,max(SUHU)as maxsuhu,max(KECEPATAN_ANGIN) as maxkecepatan_angin,max(KELEMBABAN) as maxkelembaban,
										min(SUHU)as minsuhu,min(KECEPATAN_ANGIN) as minkecepatan_angin,min(KELEMBABAN) as minkelembaban 
										FROM `tabel_klimatologi` where WAKTU=CURDATE() group by WILAYAH ");
			return $query->result();
		}
		function get_list_admin(){
			$query = $this->db->query("SELECT * from user_ms");
			return $query->result();
		}

		//model ambil admin
		function get_ambil_admin($username)
		{
			$query = $this->db->query("SELECT * from user_ms WHERE username='$username'");
			return $query->result();
		}
		
		//model update admin
		function get_update_admin($username,$pass,$nama,$email,$hp,$jk,$alamat)
		{
			$query = $this->db->query("UPDATE user_ms SET username='$username',pass='$pass',nama='$nama',
										email='$email',hp='$hp',jk='$jk',alamat='$alamat' WHERE username='$username'");
			return $query->result();
		}
		//model delete admin
		function get_delete_admin($username)
		{
			$query = $this->db->query("DELETE from user_ms WHERE username='$username'");
			return $query->result();
		}
		function insert_berita($judul,$berita,$tanggal){
			$query = $this->db->query("insert into berita value('','$judul','$berita','$tanggal')");
			return true;
		}
		function get_list_berita(){
			$query = $this->db->query("select * from berita");
			return $query->result();
		}
		function edit_berita($input){
			$query = $this->db->query("select id_berita, judul, berita from berita WHERE id_berita = '$input'");
			return $query->result();
		}
		function update_berita($id_berita,$judul,$berita,$tanggal){
			$query = $this->db->query("update berita SET judul = '$judul', berita = '$berita', tanggal = '$tanggal' WHERE id_berita = '$id_berita'");
		}
		function baca_berita($input){
			$query = $this->db->query("select id_berita, judul, berita from berita WHERE id_berita = '$input'");
			return $query->result();
		}
		function delete_berita($input){
			$query = $this->db->query("delete from berita where id_berita = '$input'");
			
		}
		 
	 	function checkadmin($username, $pass)
    	{
	        $query = $this->db->query("SELECT username, pass FROM user_ms WHERE username='$username' AND pass='$pass'");
        	if($query->num_rows() > 0) return "true";
        		else return "false";
    	}
	}
	
	
?>