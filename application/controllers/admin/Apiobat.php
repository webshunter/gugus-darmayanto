<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiobat extends CI_Controller {

	private $table1 = 'obat';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/obat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","foto obat","nama obat","tipe obat","deskripsi","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/obat/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
            $post = json_decode(file_get_contents("php://input"),true);
            if ($post != NULL) {
                $_POST = $post;
            }

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
                        'row' => ["foto","obat","tipe_obat_id","deskripsi","created_at","updated_at", "id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","obat","tipe_obat_id","deskripsi","created_at","updated_at", "id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"obat", "3"=>"tipe_obat_id", "4"=>"deskripsi", "5"=>"created_at", "6"=>"updated_at", "7"=>"delete_set"],
                    ],
                     'custome' => [
                        "deskripsi" => [
                            "key" => ['id'],
                            "content" => "
                                <button id='id{{xxx}}' type='button' class='btn btn-primary'><i class='fa fa-eye'></i> detail</button>
                                <script>
                                    $('#id{{xxx}}').click(function(){
                                        $('.modal').modal('show');
                                        $.ajax({
                                            url: '".site_url('')."admin/obat/detail/{{id}}',
                                            success: function(result){
                                                $('#detail').html(result);
                                            }
                                        })
                                    })
                                </script>
                            ",
                        ],
                        "foto" => [
                            "key" => ['foto'],
                            "content" => "<img width='100%' src='".base_url('')."assets/gambar/obat/{{foto}}' />",
                        ],
                        "tipe_obat_id" => [
                            "replacerow" => [
                                "table" => "tipe_obat",
                                "condition" => ['id'],
                                "value" => ['tipe_obat_id'],
                                "get" => "tipe_obat",
                            ],
                        ],
                        "id" => [
                            "key" => ["id"],
                            "content" => "
                            <center>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\"><i class='fa fa-cog'></i> Setting
                                    <span class=\"caret\"></span></button>
                                    <ul class=\"dropdown-menu\">
                                        <li><a data-id=\"{{id}}\" class=\"edit\" href=\"#\"><i class='fas fa-edit'></i> edit</a></li>
                                        <li><a data-id=\"{{id}}\" class=\"delete\" href=\"#\"><i class='fas fa-trash'></i> delete</a></li>
                                    </ul>
                                </div>
                            </center>
                            "
                        ]
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/obat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

	public function table_show2($action = 'show', $keyword = '')
	{
		if ($action == "show") {
            $post = json_decode(file_get_contents("php://input"),true);
            if ($post != NULL) {
                $_POST = $post;
            }
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
                        'row' => ["foto","obat"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","obat","tipe_obat_id","deskripsi","created_at","updated_at", "id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"obat", "3"=>"tipe_obat_id", "4"=>"deskripsi", "5"=>"created_at", "6"=>"updated_at", "7"=>"delete_set"],
                    ],
                     'custome' => [
                        "deskripsi" => [
                            "key" => ['id'],
                            "content" => "
                                <button id='id{{xxx}}' type='button' class='btn btn-primary'><i class='fa fa-eye'></i> detail</button>
                                <script>
                                    $('#id{{xxx}}').click(function(){
                                        $('.modal').modal('show');
                                        $.ajax({
                                            url: '".site_url('')."admin/obat/detail/{{id}}',
                                            success: function(result){
                                                $('#detail').html(result);
                                            }
                                        })
                                    })
                                </script>
                            ",
                        ],
                        "foto" => [
                            "key" => ['foto'],
                            "content" => "{{base_url}}assets/gambar/obat/{{foto}}",
                        ],
                        "tipe_obat_id" => [
                            "replacerow" => [
                                "table" => "tipe_obat",
                                "condition" => ['id'],
                                "value" => ['tipe_obat_id'],
                                "get" => "tipe_obat",
                            ],
                        ]
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/obat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/obat/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $foto = Form::getfile("foto", "assets/gambar/$this->table1/");
$obat = post("obat");
$tipe_obat_id = post("tipe_obat_id");
$deskripsi = post("deskripsi");



        $simpan = $this->db->query("
            INSERT INTO obat
            (foto,obat,tipe_obat_id,deskripsi) VALUES ('$foto','$obat','$tipe_obat_id',\"$deskripsi\")
        ");


        if($simpan){
            redirect('admin/obat');
        }
    }

    public function update(){
          $key = post('id'); $foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$obat = post("obat");
$tipe_obat_id = post("tipe_obat_id");
$deskripsi = post("deskripsi");

        $simpan = $this->db->query("
            UPDATE obat SET  foto = '$foto', obat = '$obat', tipe_obat_id = '$tipe_obat_id', deskripsi = \"$deskripsi\" WHERE id = '$key'
            ");


        if($simpan){
            redirect('admin/obat');
        }
    }

    public function detail($id = "")
    {
        $ss = $this->db->query("SELECT * FROM $this->table1 WHERE id = '$id'")->row()->deskripsi;
        echo htmlspecialchars_decode($ss);
    }

}
