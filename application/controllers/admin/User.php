<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $table1 = 'user';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/user/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","foto","username","password","nama","hp","status","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/view', $data);
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
                        'row' => ["foto","username","password","nama","hp","status_id","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","username","password","nama","hp","status_id","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"username", "3"=>"password", "4"=>"nama", "5"=>"hp", "6"=>"status_id", "7"=>"created_at", "8"=>"updated_at", "9"=>"delete_set"],
                    ],
                     'custome' => [
            
        "status_id" => [
            "replacerow" => [
				"table" => "status",
				"condition" => ['id'],
				"value" => ['status_id'],
				"get" => "status",
			],
        ],
    
        "foto" => [
            "key" => ['foto'],
            "content" => "<img width='50px' src='".base_url('')."assets/gambar/user/{{foto}}' />",
        ],
    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $foto = Form::getfile("foto", "assets/gambar/$this->table1/");
$username = post("username");
$password = md5(md5(post("password")));
$nama = post("nama");
$hp = post("hp");
$status_id = post("status_id");

        

        $simpan = $this->db->query("
            INSERT INTO user
            (foto,username,password,nama,hp,status_id) VALUES ('$foto','$username','$password','$nama','$hp','$status_id')
        ");
    

        if($simpan){
            redirect('admin/user');
        }
    }

    public function update(){
          $key = post('id'); $foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$username = post("username");
$password = post("password");
            if($this->db->query("SELECT * FROM $this->table1 WHERE id = '$key'")->row()->password != post("password")){
                $password = md5(md5(post("$key")));
            }$password = md5(md5(post("password")));
$nama = post("nama");
$hp = post("hp");
$status_id = post("status_id");

        $simpan = $this->db->query("
            UPDATE user SET  foto = '$foto', username = '$username', password = '$password', nama = '$nama', hp = '$hp', status_id = '$status_id' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/user');
        }
    }
    
}
