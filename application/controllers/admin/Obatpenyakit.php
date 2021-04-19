<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatpenyakit extends CI_Controller {

	private $table1 = 'obatpenyakit';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/obatpenyakit/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","penyakit","obat","aturan pakai","tanggal dibuat","tanggal diupdate", "setting"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/obatpenyakit/view', $data);
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
						$this->table1 => ["*"],
                        'penyakit' => ['nama_penyakit'],
                        'obat' => ['obat'],
					],
                    'where' => [
                        [$this->table1.'.delete_set', '=', '0']
                    ],
                    "leftJoin" => [
                        "penyakit" => ["penyakit.id", '=', $this->table1.'.penyakit_id'],
                        "obat" => ["obat.id", '=', $this->table1.'.obat_id'],
                    ]
                    ,
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["penyakit.nama_penyakit", "obat.obat",$this->table1.".aturan_pemakaian",$this->table1.".created_at",$this->table1.".updated_at", $this->table1.".id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_penyakit","obat","aturan_pemakaian","created_at","updated_at", "id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"penyakit.nama_penyakit", "2"=> "obat.obat", "3"=>$this->table1.".aturan_pemakaian", "4"=>$this->table1.".created_at", "5"=>$this->table1.".updated_at", "6"=>$this->table1.".delete_set"],
                    ],
                    "custome" => [
                        "obat" => [
                            "key" => ['id', 'obat'],
                            "content" => "
                                <div class='row'>
                                    <div class='col-xs-8'>
                                    {{obat}} 
                                    </div>
                                    <div class='col-xs-4'>
                                        <button onclick='openm{{xxx}}()' class='btn btn-primary'><i class='fa fa-edit'></i></button>
                                    </div>
                                </div>
                                <script>
                                    function openm{{xxx}}(){
                                        \$(\".modal\").modal('show');
                                        globalThis.view(function(){
                                            id = '{{id}}';
                                            globalThis.obatTerpilih({{id}});
                                        });
                                    }
                                </script>

                            ",
                        ],
                        "aturan_pemakaian" => [
                            "key" => ['id'],
                            "content" => "<center><button onclick='openn{{xxx}}()' class='btn btn-primary'><i class='fa fa-edit'></i></button></center>
                            
                                <script>
                                    function openn{{xxx}}(){
                                        $(\".modal\").modal('show');
                                        globalThis.aturan(function(){
                                            id = '{{id}}';
                                            globalThis.aturanObat({{id}});
                                        });
                                    }
                                </script>
                            
                            ",
                        ],
                        "id" => [
                            "key" => ["id"],
                            "content" => "<center><button class='btn btn-danger delete'>Hapus<button></center>"
                        ]
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/obatpenyakit/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/obatpenyakit/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $penyakit = generate_session('penyakitid');

        $simpan = $this->db->query("
            INSERT INTO obatpenyakit
            (penyakit_id) VALUES ('$penyakit')
        ");
    

        if($simpan){
            redirect('admin/obatpenyakit');
        }
    }

    public function saveobat()
    {
        $post = json_decode(file_get_contents("php://input"));
        if ($post != NULL) {
            $_POST = $post;
        }

        $dd = $_POST;

        $this->db->query("UPDATE $this->table1 SET obat_id = '$dd->idobat' WHERE id = '$dd->id'");

    }

    public function update(){
          $key = post('id'); $aturan_pemakaian = post("aturan_pemakaian");

        $simpan = $this->db->query("
            UPDATE obatpenyakit SET  aturan_pemakaian = '$aturan_pemakaian' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/obatpenyakit');
        }
    }

    public function openobat($id = "")
    {
        
        $post = json_decode(file_get_contents("php://input"),true);
        var_dump($post);
        // echo json_encode($this->db->query("SELECT * FROM $this->table1 WHERE id = '$id'")->row());

    }
    
}
