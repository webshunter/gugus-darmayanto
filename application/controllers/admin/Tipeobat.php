<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipeobat extends CI_Controller {

	private $table1 = 'tipe_obat';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tipeobat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","status","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tipeobat/view', $data);
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
                        'row' => ["tipe_obat","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tipe_obat","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tipe_obat", "2"=>"created_at", "3"=>"updated_at", "4"=>"delete_set"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tipeobat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tipeobat/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tipe_obat = post("tipe_obat");

        

        $simpan = $this->db->query("
            INSERT INTO tipe_obat
            (tipe_obat) VALUES ('$tipe_obat')
        ");
    

        if($simpan){
            redirect('admin/tipeobat');
        }
    }

    public function update(){
          $key = post('id'); $tipe_obat = post("tipe_obat");

        $simpan = $this->db->query("
            UPDATE tipe_obat SET  tipe_obat = '$tipe_obat' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/tipeobat');
        }
    }
    
}
