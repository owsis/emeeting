<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function printbreadcrumb($category_id) {
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id, parent_id, nama
		FROM ref_ketegori
		WHERE id=$category_id")->row();
	if ($query->parent_id) { // if this node has parent
		printbreadcrumb($query->parent_id); // make recursive call to this function
	}
	echo  $query->nama." > ";
	
	return ;
}

function random_char($length = 4) {
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function ParentChildTree($parent = 0, $spacing = '', $tree_array = '') {
	if (!is_array($tree_array)){
		$tree_array = array();			
	}
	if (count($tree_array) > 0){
		foreach ($tree_array as $row){
			$tree_array[] = array("id_menu" => $row->id_menu,"parent" => $row->parent, "nama_menu" => $spacing . $row->nama_menu);
			$tree_array = $this->ParentChildTree($row->id_menu, '&nbsp;&nbsp;&nbsp;&nbsp;'.$spacing . '-&nbsp;', $tree_array);
		}
	}
	return $tree_array;
}



function make_menu_left(){
	$CI =& get_instance();
	$menunav = '';
	$id_role = (!empty($CI->session->userdata('id_role'))) ? $CI->session->userdata('id_role') : 1 ;


	$CI->db = $CI->load->database('default',TRUE);

	$result = $CI->db->query(getSQLMenu('0',$id_role))->result_array();

	foreach($result as $row)
	{
		$id_menu = $row['id_menu'];
		$param=0;			

			// APAKAH PUNYA CHILDERN?
		if( toogle_left($row['id_menu']) > 0){
			$menunav .= '<li class="nav-item" id="menu'.$row['id_menu'].'" >
			<a href="#ui-'.$row['id_menu'].'" class="nav-link" data-toggle="collapse"  aria-expanded="false" aria-controls="ui-'.$row['id_menu'].'">
			<i class="menu-icon  '.$row['icon'].'"></i> 
			<span class="menu-title"> '.$row['nama_menu'].'</span>								
			<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="ui-'.$row['id_menu'].'">';
			$menunav .=	formatTree_left($row['id_menu'],0,$id_menu,$param);
			$menunav .= "</div></li>";

		}else{
			$menunav .= '<li id="menu'.$row['id_menu'].'" class="nav-item">
			<a class="nav-link" onClick="setMenuActive(\'menu'.$row['id_menu'].'\')" href="'.site_url($row['link']).'">
			<i class="menu-icon '.$row['icon'].'"></i>
			<span class="menu-title"> '.$row['nama_menu'].'</span>
			</a>
			</li>';
		}
	}

	echo $menunav;
}		

function getSQLMenu($parent,$id_role){
	return "SELECT a.id_role,b.* FROM
	(SELECT id_menu,id_role FROM ms_role_menu WHERE id_role = '$id_role') a
	JOIN (SELECT * FROM ms_menu WHERE parent = '$parent') b 
	on (a.id_menu=b.id_menu) where b.status_aktif='Y'				
	ORDER BY b.urutan ASC";
}


function formatTree_left($parent,$j,$id_menu,$param){
		// set_time_limit(100);
	$CI =& get_instance();
	$id_role = (!empty($CI->session->userdata('id_role'))) ? $CI->session->userdata('id_role') : 1 ;

	$CI->db = $CI->load->database('default',TRUE);
	$query = $CI->db->query(getSQLMenu($parent,$id_role));
	$menunav = '<ul class="nav flex-column sub-menu">';
	foreach($query->result_array() as $item){        	

		$menunav .= '<li class="nav-item">
		<a class="nav-link" id="menu'.$item['id_menu'].'" onClick="setMenuActive(\'menu'.$item['id_menu'].'\')" href="'.site_url($item['link']).'">
		'.$item['nama_menu'].'
		</a>
		</li>';				        		        
	}

	$menunav.= "</ul>";
	return $menunav;
}

function toogle_left($parent){
	$CI =& get_instance();
	$CI->db = $CI->load->database('default',TRUE);
	$query = $CI->db->query("SELECT * FROM ms_menu WHERE parent = '$parent'");
	return $query->num_rows();
}


function getValue($select,$from,$where,$stat=0)
{
	$CI =& get_instance();
	if($stat==1){
		$CI->dbs = $CI->load->database('simpeg',TRUE);
	}else{
		$CI->db = $CI->load->database('default',TRUE);
	}

	$sql = "select ".$select." as nm_field from ".$from." where ".$where;
		//return $sql;die;
	if($stat==1){
		$query = $CI->dbs->query($sql);
	}else{
		$query = $CI->db->query($sql);
	}
	$hasil ='';
	if($query->num_rows() > 0){
		$field = $query->row_array();
		$hasil = $field['nm_field'];
	}
	return $hasil;
}

function getCount($from,$where,$stat=0)
{
	$CI =& get_instance();
	if($stat==1){
		$CI->dbs = $CI->load->database('simpeg',TRUE);
	}else{
		$CI->db = $CI->load->database('default',TRUE);
	}
	$sql = "select count(*) as jml from ".$from." where ".$where;
		//echo $sql;
	if($stat==1){
		$query = $CI->dbs->query($sql)->row();
	}else{
		$query = $CI->db->query($sql)->row();
	}
	return $query->jml;
} 

function getKode($select,$from,$where,$stat=0)
{
	$CI =& get_instance();
	if($stat==1){
		$CI->dbs = $CI->load->database('simpeg',TRUE);
	}else{
		$CI->db = $CI->load->database('default',TRUE);
	}

	$sql = "select ".$select." as kode from ".$from." ".$where;
	if($stat==1){
		$query = $CI->dbs->query($sql);
	}else{
		$query = $CI->db->query($sql);
	}

	if($query->num_rows() > 0){
		$field = $query->row();
		$inc = (int)substr($field->kode,-4,4);
		$inc = $inc + 1;
		$hasil = sprintf("%04s", $inc);
	}else{
		$hasil='0001';
	}

	return $hasil;
}

function getKode6($select,$from,$where,$stat=0)
{
	$CI =& get_instance();
	if($stat==1){
		$CI->dbs = $CI->load->database('simpeg',TRUE);
	}else{
		$CI->db = $CI->load->database('default',TRUE);
	}

	$sql = "select ".$select." as kode from ".$from." ".$where;
	if($stat==1){
		$query = $CI->dbs->query($sql);
	}else{
		$query = $CI->db->query($sql);
	}

	if($query->num_rows() > 0){
		$field = $query->row();
		$inc = (int)substr($field->kode,-6,6);
		$inc = $inc + 1;
		$hasil = sprintf("%06s", $inc);
	}else{
		$hasil='000001';
	}

	return $hasil;
}


function kekata($x) {
	$x = abs($x);
	$angka = array("", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($x <12) {
		$temp = " ". $angka[$x];
	} else if ($x <20) {
		$temp = kekata($x - 10). " belas";
	} else if ($x <100) {
		$temp = kekata($x/10)." puluh". kekata($x % 10);
	} else if ($x <200) {
		$temp = " seratus" . kekata($x - 100);
	} else if ($x <1000) {
		$temp = kekata($x/100) . " ratus" . kekata($x % 100);
	} else if ($x <2000) {
		$temp = " seribu" . kekata($x - 1000);
	} else if ($x <1000000) {
		$temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
	} else if ($x <1000000000) {
		$temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
	} else if ($x <1000000000000) {
		$temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
	} else if ($x <1000000000000000) {
		$temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
	}      
	return $temp;
}

	/*****************************************	
	Konversi angka ke huruf
	from	: 2000
	to		: dua ribu
	*****************************************/
	function terbilang($x, $style=4) {
		if($x<0) {
			$hasil = "minus ". trim(kekata($x));
		} else {
			$hasil = trim(kekata($x));
		}      
		switch ($style) {
			case 1:
			$hasil = strtoupper($hasil);
			break;
			case 2:
			$hasil = strtolower($hasil);
			break;
			case 3:
			$hasil = ucwords($hasil);
			break;
			default:
			$hasil = ucfirst($hasil);
			break;
		}      
		return $hasil;
	}
	
	/*****************************************	
	Konversi Tanggal Indosesia ke Tanggal Inggris
	from 	: 13-02-2015
	to 		: 2015-02-13
	*****************************************/
	function tgl_ind_to_eng($tgl) {
		$xreturn_ = '';
		if (trim($tgl) != '' && $tgl != '00-00-0000') {
			$tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
			$xreturn_ = $tgl_eng;
		}
		return $xreturn_;
	}

	/*****************************************	
	Konversi Tanggal Inggris ke Tanggal Indonesia
	from 	: 2015-02-13
	to 		: 13-02-2015
	*****************************************/
	function tgl_eng_to_ind($tgl) {
		$xreturn_ = '';
		if (trim($tgl) != '' AND $tgl != '0000-00-00') { 
			$tgl_ind=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
			$xreturn_ = $tgl_ind;
		}
		return $xreturn_;
	}
	
	/*****************************************	
	Menentukan selisih tanggal dalah hari
	$tgl1 	: tanggal awal (2015-01-22)
	$tgl2 	: tanggal akhir (2015-05-23)
	hasil	: jml hari
	*****************************************/
	function selisihHari($tgl1,$tgl2,$par=0)
	{
		if($tgl1==''){
			$selisih = 0;
		}else{
			if($tgl2==''){
				$selisih = (0 + (int)$par);
			}else{
				$start = new DateTime($tgl1);
				$end = new DateTime($tgl2);
				$end->modify('+1 day');

				$interval = $end->diff($start);

				// total selisih seluruh
				$selisih = $interval->days;

				// membuat array tanggal dari awal hingga akhir dengan interval 1 hari
				$period = new DatePeriod($start, new DateInterval('P1D'), $end);

				// Tanggal merah selain weekend (berisi array tanggal libur)

				$holidays = ambil_hari_libur();
				// tidak digunakan tapi di ulapeg digunakan, karena 
				// untuk mendapatkan hari libur harus akses e-sidik dan e-sidik hanya bisa di akses jaringan internal
				
				// $holidays = array('');

				foreach($period as $dt) {
					$curr = $dt->format('D');

				    // minggu atau sabtu jangan di itung
					if ($curr == 'Sat' || $curr == 'Sun') {
						$selisih--;
					}

				    // tanggal merah jangan di itung
					elseif (in_array($dt->format('Y-m-d'), $holidays)) {
						$selisih--;
					}
				}
			}
		}
		return $selisih;
	}	

	function ambil_hari_libur(){

		$CI =& get_instance();
		$CI->load->library('curl');    	
		$libur = json_decode($CI->curl->simple_get("http://absensi.setjen.kemendagri.go.id:8090/esidik/api/getdata/dataharilibur/".date('Y')));

		$holidays = '';
		if ($libur != null or $libur != '') {
			if ($libur->status == true) {
				foreach ($libur->data as $key => $value) {
					$startdate = $value->startdate;
					$enddate = $value->enddate;

					$interval = new DateInterval('P1D');
					$realEnd = new DateTime($enddate);
					$realEnd->add($interval);
					$period = new DatePeriod(new DateTime($startdate), $interval, $realEnd);    			
					foreach($period as $date) { 
						$holidays[] = $date->format('Y-m-d'); 
					}
				}
			}
		}else{
			$holidays = array();    		
		}

		return $holidays;

	}
	
	function hitung_umur($tgl1,$tgl2) { //(tanggal sekarang, tanggal sebelumnya)
		$thn1=substr($tgl1,0,4);
		$bln1=substr($tgl1,5,2);
		$hr1=substr($tgl1,8,2);
		$thn2=substr($tgl2,0,4);
		$bln2=substr($tgl2,5,2);
		$hr2=substr($tgl2,8,2);
		$tahun=$thn1-$thn2;
		if ($bln1<$bln2){
			$tahun=$tahun-1;
			$bulan=((int)$bln1+12)-(int)$bln2;
			if ($hr1 < $hr2){
				$bulan=$bulan-1;
				$shr = ((int)$hr2 - (int)$hr1);
				if($shr==30){ $shr = 29;}
				$hari = 30 - $shr;
			}else{
				$hari = (int)$hr1 - (int)$hr2; 
			}
		}else if($bln1==$bln2){
			$bulan=(int)$bln1-(int)$bln2;
			if ($hr1 < $hr2){
				$tahun=$tahun-1;
				$bulan=11;
				$shr = ((int)$hr2 - (int)$hr1);
				if($hr2==31)$hari = 31 - $shr;
				else $hari = 30 - $shr;
			}else{
				$hari = (int)$hr1 - (int)$hr2; 
			}
		}else{
			$bulan=$bln1-$bln2;
			if ($hr1 < $hr2){
				$bulan=$bulan-1;
				$shr = ((int)$hr2 - (int)$hr1);
				if($hr2==31)$hari = 31 - $shr;
				else $hari = 30 - $shr;
			}else{
				$hari = (int)$hr1 - (int)$hr2; 
			}
		}
		
		$hasil = array(
			'tahun' => $tahun,
			'bulan' => $bulan,
			'hari' => $hari
		);
		return $hasil;
	}
	
	function nama_bulan($m){
		if (trim($m) != '' AND $m != '0') {
			$getbulan = array ();
			$getbulan[1] = 'Januari';
			$getbulan[2] = 'Februari';
			$getbulan[3] = 'Maret';
			$getbulan[4] = 'April';
			$getbulan[5] = 'Mei';
			$getbulan[6] = 'Juni';
			$getbulan[7] = 'Juli';
			$getbulan[8] = 'Agustus';
			$getbulan[9] = 'September';
			$getbulan[10] = 'Oktober';
			$getbulan[11] = 'November';
			$getbulan[12] = 'Desember';
			
			return $getbulan[(int)$m];
		}
	}

	function decrypt_kode_wilayah($kode){
		$kode;
		return "a";
	}


	function ambil_sisa_cuti_2thn_lalu($nip){

		$CI =& get_instance();
		$CI->db = $CI->load->database('simpeg',TRUE);



		$satutahunlalu = date("Y",strtotime("-1 year"));
		$duatahunlalu = date('Y', strtotime('-2 year'));		
		
		// SQL DIBAWAH BISA DIARTIKAN SEBAGAI BERIKUT : SELECT JUMLAH HARI DAN TAHUN (JIKA 2 KARAKTER DI TENGAH LEBIH DARI 12 MAKA TAHUN = 4 KARAKTER AWAL ELSE 4 KARAKTER AKHIR) HAL ITU DI BUAT DIKARENAKAN FORMAT TMULAI DI SIMPEG,
		// FROM RIW_CUTI (SIMPEG) WHERE NIP = $PARAMETER_NIP 
		// JIKA 2 KARAKTER DI TENGAH LEBIH DARI 12 AND WHERE 4 KARAKTER AWAL PADA FIELD TMULAI = 1TAHUN LALU ATAU 2 TAHUN LALU,
		// ELSE 4 KARAKTER AKHIR PADA FIELD TMULAI = 1TAHUN LALU ATAU 2 TAHUN LALU
		// GROOUP BY TMUALI SAMA DENGAN SEBELUMNYA DIKONDISIKAN JIKA 2 KARAKTER DI TENGAH LEBIH DARI 12 MAKA GROUP BY 4 KARAKTER AWAL FIELD TMULAI JIKA KURANG DARI 12 MAKA GROUP BY 4 KARAKTER AKHIR FIELD TMULAI

		$sql_history_cuti = " SELECT sum(jmlhari) as jumlah_hari, 
		CASE WHEN SUBSTR(tmulai, 3,2) > 12  THEN SUBSTR(tmulai, 1,4) 
		ELSE SUBSTR(tmulai, 5,4)  END AS tahun 
		FROM riw_cuti 
		WHERE nip = '$nip' AND 
		(CASE WHEN SUBSTR(tmulai, 3,2) > 12 THEN SUBSTR(tmulai, 1,4) = '$satutahunlalu' OR SUBSTR(tmulai, 1,4) = '$duatahunlalu' 
		ELSE SUBSTR(tmulai, 5,4) = '$satutahunlalu' OR SUBSTR(tmulai, 5,4) = '$duatahunlalu' END) 
		GROUP BY  CASE WHEN SUBSTR(tmulai, 3,2) > 12 THEN SUBSTR(tmulai, 1,4) 
		ELSE SUBSTR(tmulai, 5,4) END ";
		
		$history_cuti = $CI->db->query($sql_history_cuti)->result();

		// Variabel jumlah jatah tahun lalu = 0
		$jatah_thn_lalu = 0;

		if (count($history_cuti)==2) {
		// Validasi jika hasil query diatas ada 2 array maka di cek keduanya, 			
			if ($history_cuti[0]->jumlah_hari == 0 OR $history_cuti[0]->jumlah_hari == null) {
				$jatah_thn_lalu = $jatah_thn_lalu + 6;
			}
			if ($history_cuti[1]->jumlah_hari == 0 OR $history_cuti[1]->jumlah_hari == null) {
				$jatah_thn_lalu =$jatah_thn_lalu + 6;
			}
		}else if (count($history_cuti)==1){
		// apabila (hanya satu) maka cek satu dan sudah memiliki 6 jatah (karena belum mengambil sama sekali di salah satu tahun dari 2 tahun lalu)	
			$jatah_thn_lalu = $jatah_thn_lalu + 6;			
			if ($history_cuti[0]->jumlah_hari == 0 OR $history_cuti[0]->jumlah_hari == null) {
				$jatah_thn_lalu = $jatah_thn_lalu + 6;
			}
		}else{
		// apabila hasil query diatas tidak ada hasilnya maka sudah dipastikan memiliki 12 jatah cuti						
			$jatah_thn_lalu = $jatah_thn_lalu + 12;			
		}
		return $jatah_thn_lalu;

	}

