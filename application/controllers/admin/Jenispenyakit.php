<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenispenyakit extends CI_Controller {

	private $table1 = 'jenis_penyakit';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/jenispenyakit/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","status","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/jenispenyakit/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $this->Datatable_gugus->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
						"*"
					],
                    'where' => [
                        ['delete_set', '=', '0']
                    ],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["jenis_penyakit","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["jenis_penyakit","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"jenis_penyakit", "2"=>"created_at", "3"=>"updated_at", "4"=>"delete_set"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/jenispenyakit/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/jenispenyakit/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $jenis_penyakit = post("jenis_penyakit");

        

        $simpan = $this->db->query("
            INSERT INTO jenis_penyakit
            (jenis_penyakit) VALUES ('$jenis_penyakit')
        ");
    

        if($simpan){
            redirect('admin/jenispenyakit');
        }
    }

    public function update(){
          $key = post('id'); $jenis_penyakit = post("jenis_penyakit");

        $simpan = $this->db->query("
            UPDATE jenis_penyakit SET  jenis_penyakit = '$jenis_penyakit' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/jenispenyakit');
        }
    }
    
}
