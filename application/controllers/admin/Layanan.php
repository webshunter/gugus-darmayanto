<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	private $table1 = 'service';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/layanan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","icon","judul","deskripsi","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/layanan/view', $data);
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
                        'row' => ["icon","title","des","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["icon","title","des","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"icon", "2"=>"title", "3"=>"des", "4"=>"created_at", "5"=>"updated_at", "6"=>"delete_set"],
                    ],
                    "custome" => [
                        "icon" => [
                            "key" => ['icon'],
                            "content" => "<img width='80px' src='".base_url('')."assets/gambar/service/{{icon}}' />",
                        ],
                    ]
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/layanan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/layanan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $icon = Form::getfile("icon", "assets/gambar/$this->table1/");
$title = post("title");
$des = post("des");

        

        $simpan = $this->db->query("
            INSERT INTO service
            (icon,title,des) VALUES ('$icon','$title',\"$des\")
        ");
    

        if($simpan){
            redirect('admin/layanan');
        }
    }

    public function update(){
          $key = post('id'); $icon = Form::getfile("icon", "assets/gambar/$this->table1/", $key, $this->table1);
$title = post("title");
$des = post("des");

        $simpan = $this->db->query("
            UPDATE service SET  icon = '$icon', title = '$title', des = \"$des\" WHERE id = '$key'
        ");
    

        if($simpan){
            redirect('admin/layanan');
        }
    }
    
}
