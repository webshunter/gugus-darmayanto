<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['admin'] = "user";
		$this->load->view('login', $data);
	}

	public function prosses()
	{
		// default password admin
		$username = $_POST['username'];
		$password = $_POST['password'];
    $cu = cek(Perusahaans::get(),'username');
    $cp = cek(Perusahaans::get(),'password');

		if ($username == $cu && $password == $cp) {
			create_session('login', 'user');
			return redirect('home');
		}else{
			return redirect('login');
		}
	}

	public function daftar()
	{
		$username = post("username");
		$password = md5(md5(post("password")));
		$nama = post("nama");
		$hp = post("hp");
		$namaayah = post("namaayah");
		$namaibu = post("namaibu");
		$email = post("email");
		$status_id = post("status_id");

    $simpan = $this->db->query("
        INSERT INTO user
        (username,password,nama,hp,namaayah,namaibu,email,status_id) VALUES ('$username','$password','$nama','$hp','$namaayah','$namaibu','$email','$status_id')
    ");

		if($simpan){
			$getid = $this->db->query("SELECT * FROM user ORDER BY id DESC")->row()->id;
			create_session('loginid', $getid);
			create_session('login', 'user');
			redirect('admin/user');
		}
	}
}
