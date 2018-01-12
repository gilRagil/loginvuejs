<?php
/**
* controllers Registrasi
*/
class CtrlRegistrasi
{
    private $objModel;

    function __construct(ModelRegistrasi $obj)
    {
        $this->objModel = $obj;
    }

    function listRegistrasi() {
        $data = $this->objModel->allData();

        return $data;
    }
	
    function listFilterRegistrasi($values,$tgl1,$tgl2) {
        
        //var_dump($values);
        $data = $this->objModel->allFilterData($values,$tgl1,$tgl2);
        
        return $data;
    }

	function listFilterAK1($values,$tgl1,$tgl2) {
		
		//var_dump($values);
        $data = $this->objModel->allFilterDataAK1($values,$tgl1,$tgl2);
		
        return $data;
    }

    function viewRegistrasi($id) {
        $rows = $this->objModel->getData($id);
		//echo $id;
		//var_dump($rows);
        foreach ($rows as $item) {
            $data = array(
                'id_registration'        => $item['id_registration'],
                'regnama'                => $item['regnama'],
                'no_registration' 	 	 => $item['no_registration'],
                'layanan' 			  	 => $item['layanan'],
                'no_kk'	 			  	 => $item['no_kk'],
                'nik'	 			  	 => $item['nik'],
                'nama'	  			  	 => $item['nama'],
                'kewarganegaraan'	  	 => $item['kewarganegaraan'],
                'alamat'  			  	 => $item['alamat'],
                'tanggal' 			  	 => date('d/m/Y', strtotime($item['tanggal'])),
                'tanggalcantik' 	  	 => date('d F Y', strtotime($item['tanggal'])),
                'no_hp' 			  	 => $item['no_hp'],
                'email'   			  	 => $item['email'],
                'maksud'   			  	 => $item['maksud'],
				'nama_lengkap_bayi'   	 => $item['nama_lengkap_bayi'],
                'jenis_kelamin_bayi'  	 => $item['jenis_kelamin_bayi'],
				'tanggal_cantik' 	 	 => date('d F Y', strtotime($item['tanggal_lahir'])),
                'kelahiran'  		 	 => $item['kelahiran'],
                'kelahiran_anak'  	  	 => $item['kelahiran_anak'],
                'tempat_kelahiran'    	 => $item['tempat_kelahiran'],
                'penolong_kelahiran'  	 => $item['penolong_kelahiran'],
				'sebab_kematian' 		 => $item['sebab_kematian'],
                'nama_pelapor' 			 => $item['nama_pelapor'],
                'hubungan_dengan_korban' => $item['hubungan_dengan_korban'],
                'tempat_kematian'		 => $item['tempat_kematian'],
                'yang_menentukan' 		 => $item['yang_menentukan'],
                'sekolahan' 			 => $item['sekolahan'],
				'alasan_pindah' 		 => $item['alasan_pindah'],
                'alamat_pindah' 		 => $item['alamat_pindah'],
                'kecamatan_id' 			 => $item['kecamatan_nama'],
                'desa_id' 			 	 => $item['desa_nama'],
                'kode_pos' 				 => $item['kode_pos'],
                'klasifikasi_pindah' 	 => $item['klasifikasi_pindah'],
                'jenis_kepindahan' 		 => $item['jenis_kepindahan'],
                'stt_bagi_tdk_pindah' 	 => $item['stt_bagi_tdk_pindah'],
                'stt_bagi_pindah' 		 => $item['stt_bagi_pindah'],
                'rt_baru'                => $item['rt_baru'],
                'rt_baru'                => $item['rt_baru'],
                'no_pencari_kerja'       => $item['no_pencari_kerja'],
                'jurusan'                => $item['jurusan'],
                'tahun_jurusan'          => $item['tahun_jurusan'],
                'pengalaman'             => $item['pengalaman'],
                'tahun_pengalaman' 		 => $item['tahun_pengalaman']
            );
        }
        return $data;
    }

    function saveRegistrasi($values) {
        session_start();

        // validate
        if ($values['nik'] == '') {
            return 'Please input NIK ';
            exit();
        }

        // check session save
        if ($_SESSION['save'] == '') {
			//generate id = genNoRegistrasi
			if ($values['no_kk'] == ''){
				$register_pindah = $values['register_pindah'];
			}else{
				$register_pindah = $values['no_kk'];
			}
			$maxno = $this->genNoRegistrasi();
			
            if ($values['id_biodata_pindah'] != "") {
                $id_biodata_pindah = implode('#',$values['id_biodata_pindah']);
            }
			
            if (isset($values['jurusan'])) {
                $jurusan = implode('#', $values['jurusan']);
                $tahun_jurusan = implode('#', $values['tahun_jurusan']);
                $pengalaman = implode('#', $values['keterampilan']);
                $tahun_pengalaman = implode('#', $values['tahun_pengalaman']);
            }else{
                $jurusan = '';
                $tahun_jurusan = '';
                $pengalaman = '';
                $tahun_pengalaman = '';
            }

            $array_data = array(
				'no_registration' 	 	 => $maxno,
                'layanan' 				 => $values['layanan'],
                'no_kk'	  				 => $register_pindah,
                'nik'	  			 	 => $values['nik'],
                'nama'	  			 	 => $values['nama'],
                'kewarganegaraan'	 	 => $values['kewarganegaraan'],
                'alamat' 			 	 => $values['alamat'],
                'tanggal' 			 	 => date('Y-m-d'),
                'no_hp'   				 => $values['no_hp'],
                'email'  			 	 => $values['email'],
                'maksud'  			 	 => $values['maksud'],
                'kelahiran'  		 	 => $values['kelahiran'],
                'kelahiran_anak'  	 	 => $values['kelahiran_anak'],
                'tempat_kelahiran'   	 => $values['tempat_kelahiran'],
                'sebab_kematian' 		 => $values['sebab_kematian'],
                'nama_pelapor' 			 => $values['nama_pelapor'],
                'hubungan_dengan_korban' => $values['hubungan_dengan_korban'],
                'tempat_kematian'        => $values['tempat_kematian'],
                'nik_mati'		         => $values['nik_mati'],
                'yang_menentukan' 		 => $values['yang_menentukan'],
                'sekolahan' 		 	 => $values['sekolahan'],
				'alasan_pindah' 		 => $values['alasan_pindah'],
                'alamat_pindah' 		 => $values['alamat_pindah'],
                'kecamatan_id' 			 => $values['kecamatan_id'],
                'desa_id' 			 	 => $values['desa_id'],
                'kode_pos' 				 => $values['kode_pos'],
                'klasifikasi_pindah' 	 => $values['klasifikasi_pindah'],
                'jenis_kepindahan' 		 => $values['jenis_kepindahan'],
                'stt_bagi_tdk_pindah' 	 => $values['stt_bagi_tdk_pindah'],
                'stt_bagi_pindah' 		 => $values['stt_bagi_pindah'],
                'rt_baru' 				 => $values['rt_baru'],
                'rw_baru' 				 => $values['rw_baru'],
                'id_biodata_pindah'      => $id_biodata_pindah,
                'no_pencari_kerja'       => $values['no_pencari_kerja'],
                'jurusan'                => $jurusan,
                'tahun_jurusan'          => $tahun_jurusan,
                'pengalaman'             => $pengalaman,
                'tahun_pengalaman' 	     => $tahun_pengalaman
            );

            $this->objModel->insertData($array_data);

            $_SESSION['save'] = 'done';
        }
		return $maxno;
    }

    function updateRegistrasi($values) {
        session_start();

        // validate
        if ($values['nik'] == '') {
            return 'Please input NIK';
            exit();
        }

        // check session save
        if ($_SESSION['save'] == '') {
			
			//explode date 
			$temp = explode('/', $values['tanggal']);
			$tanggal = $temp[2]."-".$temp[1]."-".$temp[0];
			if (isset($values['jurusan'])) {
                $jurusan = implode('#', $values['jurusan']);
                $tahun_jurusan = implode('#', $values['tahun_jurusan']);
                $pengalaman = implode('#', $values['keterampilan']);
                $tahun_pengalaman = implode('#', $values['tahun_pengalaman']);
            }else{
                $jurusan = '';
                $tahun_jurusan = '';
                $pengalaman = '';
                $tahun_pengalaman = '';
            }
            $array_data = array(
                'layanan'			 	 => $values['layanan'],
                'no_kk'   			 	 => $values['no_kk'],
                'nik' 	  			 	 => $values['nik'],
                'nama' 	 			 	 => $values['nama'],
                'alamat'  			 	 => $values['alamat'],
                'tanggal' 			 	 => $tanggal,
                'no_hp'   			 	 => $values['no_hp'],
                'email'   			 	 => $values['email'],
                'maksud'  			 	 => $values['maksud'],
                'kelahiran'  		 	 => $values['kelahiran'],
                'kelahiran_anak'  	 	 => $values['kelahiran_anak'],
                'tempat_kelahiran'    	 => $values['tempat_kelahiran'],
                'penolong_kelahiran' 	 => $values['penolong_kelahiran'],
				'sebab_kematian' 		 => $values['sebab_kematian'],
                'nama_pelapor' 			 => $values['nama_pelapor'],
                'hubungan_dengan_korban' => $values['hubungan_dengan_korban'],
                'tempat_kematian'		 => $values['tempat_kematian'],
                'yang_menentukan' 		 => $values['yang_menentukan'],
                'sekolahan' 			 => $values['sekolahan'],
                'alasan_pindah' 		 => $values['alasan_pindah'],
                'alamat_pindah' 		 => $values['alamat_pindah'],
                'kecamatan_id' 			 => $values['kecamatan_id'],
                'desa_id' 			 	 => $values['desa_id'],
                'kode_pos' 				 => $values['kode_pos'],
                'klasifikasi_pindah' 	 => $values['klasifikasi_pindah'],
                'jenis_kepindahan' 		 => $values['jenis_kepindahan'],
                'stt_bagi_tdk_pindah' 	 => $values['stt_bagi_tdk_pindah'],
                'stt_bagi_pindah' 		 => $values['stt_bagi_pindah'],
                'rt_baru' 				 => $values['rt_baru'],
                'rw_baru' 				 => $values['rw_baru'],
                'no_pencari_kerja'       => $values['no_pencari_kerja'],
                'jurusan'                => $jurusan,
                'tahun_jurusan'          => $tahun_jurusan,
                'pengalaman'             => $pengalaman,
                'tahun_pengalaman'       => $tahun_pengalaman
            );
			
            $array_condition = array(
                'id_registration' => $values['id_registration']
            );

            $this->objModel->updateData($array_data, $array_condition);

            $_SESSION['save'] = 'done';
        }
    }

    function deleteRegistrasi($values) {
        session_start();

        // validate
        if ($values['registerno'] == '') {
            return 'Empty condition';
            exit();
        }

        // check session save
        if ($_SESSION['save'] == '') {
            $array_condition = array(
                'no_registration' => $values['registerno']
            );

            $this->objModel->deleteData($array_condition);

            $_SESSION['save'] = 'done';
        }
    }
	
	//generate id
    function genNoRegistrasi() {
        $data = $this->objModel->getMaxNo();
        $maxno = $data[0]['no'];

        if ($maxno == NULL) {
            $no_registrasi = date('ymd').'-'.'0001';
        } else {
            $no_registrasi = date('ymd').'-'.str_pad(($maxno + 1), 4, '0', STR_PAD_LEFT);
        }

        return $no_registrasi;
    }
	
	function listKecamatanx($id){
		$rows = $this->objModel->getDataKecamatanx($id);
		
		return $rows;
	}
	
	function listDesax($id){
		$rows = $this->objModel->getDataDesax($id);
		
		return $rows;
	}
}
