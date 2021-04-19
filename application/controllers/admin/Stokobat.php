<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stokobat extends CI_Controller {

	private $table1 = 'stokobat';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/stokobat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","obat","stok","tanggal beli","harga beli","harga jual","tanggal dibuat","tanggal diupdate", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/stokobat/view', $data);
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
                        'row' => ["obat_id","stok","tanggal_beli","harga_beli","harga_jual","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["obat_id","stok","tanggal_beli","harga_beli","harga_jual","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"obat_id", "2"=>"stok", "3"=>"tanggal_beli", "4"=>"harga_beli", "5"=>"harga_jual", "6"=>"created_at", "7"=>"updated_at", "8"=>"delete_set"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/stokobat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("UPDATE ".$this->table1." SET delete_set = '1' WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/stokobat/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $obat_id = post("obat_id");
$stok = post("stok");
$tanggal_beli = post("tanggal_beli");
$harga_beli = post("harga_beli");
$harga_jual = post("harga_jual");

        

        $simpan = $this->db->query("
            INSERT INTO stokobat
            (obat_id,stok,tanggal_beli,harga_beli,harga_jual) VALUES ('$obat_id','$stok','$tanggal_beli','$harga_beli','$harga_jual')
        ");
    

        if($simpan){
            redirect('admin/stokobat');
        }
    }

    public function update(){
          $key = post('id'); $obat_id = post("obat_id");
$stok = post("stok");
$tanggal_beli = post("tanggal_beli");
$harga_beli = post("harga_beli");
$harga_jual = post("harga_jual");

        $simpan = $this->db->query("
            UPDATE stokobat SET  obat_id = '$obat_id', stok = '$stok', tanggal_beli = '$tanggal_beli', harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/stokobat');
        }
    }
    
}
