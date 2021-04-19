<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmed extends CI_Controller {

	private $table1 = 'sosmed';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/sosmed/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["No","Icon","Judul","Link","Tanggal dibuat","Tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/sosmed/view', $data);
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
                        'row' => ["icon","judul","link","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["icon","judul","link","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"icon", "2"=>"judul", "3"=>"link", "4"=>"created_at", "5"=>"updated_at", "6"=>"delete_set"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/sosmed/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/sosmed/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $icon = post("icon");
$judul = post("judul");
$link = post("link");

        

        $simpan = $this->db->query("
            INSERT INTO sosmed
            (icon,judul,link) VALUES ('$icon','$judul','$link')
        ");
    

        if($simpan){
            redirect('admin/sosmed');
        }
    }

    public function update(){
          $key = post('id'); $icon = post("icon");
$judul = post("judul");
$link = post("link");

        $simpan = $this->db->query("
            UPDATE sosmed SET  icon = '$icon', judul = '$judul', link = '$link' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/sosmed');
        }
    }
    
}
