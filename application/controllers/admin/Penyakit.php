<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	private $table1 = 'penyakit';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/penyakit/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","foto","jenis penyakit","nama penyakit","deskripsi","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/penyakit/view', $data);
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
                        'row' => ["foto","jenis_penyakit_id","nama_penyakit","deskripsi","created_at","updated_at", "id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","jenis_penyakit_id","nama_penyakit","deskripsi","created_at","updated_at", "id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"jenis_penyakit_id", "3"=>"nama_penyakit", "4"=>"deskripsi", "5"=>"created_at", "6"=>"updated_at", "7"=>"delete_set"],
                    ],
                     'custome' => [
                        "jenis_penyakit_id" => [
                            "replacerow" => [
                                "table" => "jenis_penyakit",
                                "condition" => ['id'],
                                "value" => ['jenis_penyakit_id'],
                                "get" => "jenis_penyakit",
                            ],
                        ],
                        "foto" => [
                            "key" => ['foto'],
                            "content" => "<img width='80px' src='".base_url('')."assets/gambar/penyakit/{{foto}}' />",
                        ],
                        "id" => [
                            "key" => ["id"],
                            "content" => "
                            <center>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\"><i class='fa fa-cog'></i> Setting
                                    <span class=\"caret\"></span></button>
                                    <ul class=\"dropdown-menu\">
                                        <li><a href='".base_url('')."admin/penyakit/obat/{{id}}'><i class='fas fa-cog'></i> Set Obat</a></li>
                                        <li><a data-id=\"{{id}}\" class=\"edit\" href=\"#\"><i class='fas fa-edit'></i> edit</a></li>
                                        <li><a data-id=\"{{id}}\" class=\"delete\" href=\"#\"><i class='fas fa-trash'></i> delete</a></li>
                                    </ul>
                                </div>
                            </center>
                            "
                        ],
                        "deskripsi" => [
                            "key" => ['id'],
                            "content" => "
                                <button id='id{{xxx}}' type='button' class='btn btn-primary'>detail</button>
                                <script>
                                    $('#id{{xxx}}').click(function(){
                                        $('.modal').modal('show');
                                        $.ajax({
                                            url: '".site_url('')."admin/penyakit/detail/{{id}}',
                                            success: function(result){
                                                $('#detail').html(result);
                                            }
                                        })
                                    })
                                </script>
                        ",
                        ],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/penyakit/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/penyakit/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $foto = Form::getfile("foto", "assets/gambar/$this->table1/");
$jenis_penyakit_id = post("jenis_penyakit_id");
$nama_penyakit = post("nama_penyakit");
$deskripsi = post("deskripsi");

        

        $simpan = $this->db->query("
            INSERT INTO penyakit
            (foto,jenis_penyakit_id,nama_penyakit,deskripsi) VALUES ('$foto','$jenis_penyakit_id','$nama_penyakit',\"$deskripsi\")
        ");
    

        if($simpan){
            redirect('admin/penyakit');
        }
    }

    public function update(){
          $key = post('id'); $foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$jenis_penyakit_id = post("jenis_penyakit_id");
$nama_penyakit = post("nama_penyakit");
$deskripsi = post("deskripsi");

        $simpan = $this->db->query("
            UPDATE penyakit SET  foto = '$foto', jenis_penyakit_id = '$jenis_penyakit_id', nama_penyakit = '$nama_penyakit', deskripsi = \"$deskripsi\" WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/penyakit');
        }
    }
    

    public function detail($id = '')
    {
        echo htmlspecialchars_decode(
            $this->db->query("SELECT * FROM penyakit WHERE id = '$id' ")->row()->deskripsi
        );
    }

    public function obat($id = "")
    {
        create_session('penyakitid', $id);
        return redirect('admin/obatpenyakit');
    }


}
