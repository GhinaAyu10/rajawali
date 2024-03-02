<?php

class Search_Model extends CI_Model{

    public function __construct() {
		parent::__construct(); 
	}

	public function getDataPrestasi($rowno,$rowperpage,$search="") {
			
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.id_siswa=prestasi.siswa');

		if($search != ''){
        	$this->db->like('namasis', $search);
			$this->db->or_like('kompetisi', $search);
			$this->db->or_like('tingkat', $search);
			$this->db->or_like('despres', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();
       	
		return $query->result_array();
	}

    public function getRecordPrestasi($search = '') {

    	$this->db->select('count(*) as allcount');
		$this->db->from('prestasi');
		$this->db->join('siswa', 'siswa.id_siswa=prestasi.siswa');
      
      	if($search != ''){
        	$this->db->like('namasis', $search);
			$this->db->or_like('kompetisi', $search);
			$this->db->or_like('tingkat', $search);
			$this->db->or_like('despres', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];
    }

	public function getDataHukuman($rowno,$rowperpage,$search="") {
			
		$this->db->select('*');
		$this->db->from('hukuman');
		$this->db->join('siswa', 'siswa.id_siswa=hukuman.siswa');

		if($search != ''){
        	$this->db->like('namasis', $search);
			$this->db->or_like('pelanggaran', $search);
			$this->db->or_like('deskripsi', $search);
			$this->db->or_like('hukumakhir', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();
       	
		return $query->result_array();
	}

    public function getRecordHukuman($search = '') {

    	$this->db->select('count(*) as allcount');
		$this->db->from('hukuman');
		$this->db->join('siswa', 'siswa.id_siswa=hukuman.siswa');
      
      	if($search != ''){
        	$this->db->like('namasis', $search);
			$this->db->or_like('pelanggaran', $search);
			$this->db->or_like('deskripsi', $search);
			$this->db->or_like('hukumakhir', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];
    }

	public function getDataBayar($rowno,$rowperpage,$search="") {
			
		$this->db->select('*');
		$this->db->from('bayar');
		$this->db->join('siswa', 'siswa.id_siswa=bayar.siswa');
		$this->db->join('biaya', 'biaya.id_biaya=bayar.biaya');

		if($search != ''){
        	$this->db->like('namasis', $search);
			$this->db->or_like('namabi', $search);
			$this->db->or_like('tglbayar', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();
       	
		return $query->result_array();
	}

    public function getRecordBayar($search = '') {

    	$this->db->select('count(*) as allcount');
		$this->db->from('bayar');
		$this->db->join('siswa', 'siswa.id_siswa=bayar.siswa');
		$this->db->join('biaya', 'biaya.id_biaya=bayar.biaya');
      
      	if($search != ''){
        	$this->db->like('namasis', $search);
			$this->db->or_like('namabi', $search);
			$this->db->or_like('tglbayar', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];
    }

}