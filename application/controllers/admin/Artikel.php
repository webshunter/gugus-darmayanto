<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	private $table1 = 'artikel';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/artikel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["No","Foto","Judul","Slug", "content","Deskripsi","Tanggal dibuat","Tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/artikel/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
        
            postaxio();

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
                        'row' => ["foto","judul","slug","content","des","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","judul","slug","content","des","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'DESC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"judul", "3"=>"slug", "4"=>"content", "5"=>"des", "6"=>"created_at", "7"=>"updated_at", "8"=>"delete_set"],
                    ],
                    "custome" => [
                        "des" => [
                            "key" => ['id'],
                            "content" => "
                                <button id='id{{xxx}}' type='button' class='btn btn-primary'><i class='fa fa-eye'></i> detail</button>
                                <script>
                                    $('#id{{xxx}}').click(function(){
                                        $('.modal').modal('show');
                                        $.ajax({
                                            url: '".site_url('')."admin/artikel/detail/{{id}}',
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
                            "content" => "<img width='80px' class='img-x' src='".base_url('')."assets/gambar/artikel/{{foto}}' />",
                        ],
                    ]
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/artikel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/artikel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $foto = Form::getfile("foto", "assets/gambar/$this->table1/");
        $judul = post("judul");
        $des = post("des");
        $content = post("content");
        $slug = slug($judul);

        

        $simpan = $this->db->query("
            INSERT INTO artikel
            (foto,judul,des, slug, content) VALUES ('$foto','$judul',\"$des\", '$slug', '$content')
        ");
    

        if($simpan){
            redirect('admin/artikel');
        }
    }

    public function update(){
        $key = post('id'); $foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
        $judul = post("judul");
        $des = post("des");
        $content = post("content");

        $slug = $this->db->query("SELECT * FROM $this->table1 WHERE id = '$key' ")->row()->slug;

        if ($slug == "") {
            if (post('slug') != "") {
                $slug = post('slug');
            }else{
                $slug = slug($judul);
            }
        }else{
            $slug = post('slug');
        }

        $simpan = $this->db->query("
            UPDATE artikel SET  foto = '$foto', judul = '$judul', content = '$content', des = \"$des\", slug = '$slug' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/artikel');
        }
    }

    public function detail($id = "")
    {
        $ss = $this->db->query("SELECT * FROM $this->table1 WHERE id = '$id'")->row()->des;
        echo htmlspecialchars_decode($ss);
    }
    
}
