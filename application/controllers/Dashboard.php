<?php

/**
 *
 */
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("status")!=="login_admin") {
            redirect("admin/");
            exit();
        }
        $this->load->model("Admin_model");
    }

    private function _upload_img(){
        $config["upload_path"]    = "./assets/img/";
        $config["allowed_types"]  = "jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF";
        $config["file_name"]      = htmlentities($this->input->post("gambar"))."-".htmlentities($this->input->post("judul_buku"))."-".htmlentities($this->input->post("nomor_seri"));
        $config["overwrite"]      = true;
        $config["max_size"]       = 5000;

        $this->load->library("upload",$config);
        if ($this->upload->do_upload("gambar")) {
            return $this->upload->data("file_name");
        }else{
            return "default.jpeg";
        }
    }

    private function show404(){
        $this->load->view("admin/show404");
    }

    private function hapus_gambarBuku($value){
        if ($value==="default.jpeg") {
            return true;
        }else {
            return unlink("./assets/img/".$value);
        }
    }

    public function index()
    {
        $data['buku']=$this->Admin_model->get_daftarbuku();
        $data['title']="Selamat Datang - Sistem Perpustakaan";
        $this->load->view("admin/header",$data);
        $this->load->view("admin/dashboard",$data);
        $this->load->view("admin/footer");
    }

    public function tambah_buku()
    {
        $data['title']="Dashboard - Tambah Buku";
        $this->load->view("admin/header",$data);
        $this->load->view("admin/tambah_buku");
        $this->load->view("admin/footer");
        if ($this->input->post("submit")) {
            $value=[
                "nama_buku"=>htmlentities($this->input->post("judul_buku")),
                "nomor_seri"=>htmlentities($this->input->post("nomor_seri")),
                "jumlah"=>htmlentities($this->input->post("jumlah")),
                "gambar"=>$this->_upload_img(),
                "deskripsi"=>htmlentities($this->input->post("deskripsi")),
                "status"=>0
            ];
            if ($this->Admin_model->tambah_buku($value)) {
                $this->session->set_flashdata("berhasil_tambah_buku","berhasil");
                redirect("dashboard/");
            }else {
                $this->session->set_flashdata("gagal","gagal");
                redirect("dashboard/");
            }
        }
    }

    public function delete_buku()
    {

        if ($this->input->post()) {
            $id=$this->input->post("id");
            if($this->hapus_gambarBuku($this->Admin_model->cek_buku($id)->row()->gambar)){

                $data=$this->Admin_model->hapus_dataBuku($id);
                echo json_encode($data);
            }
        }else {
            show_404();
        }
    }

    public function edit($id=null)
    {
        $data['title']="Dashboard - Edit Buku";
        $this->load->view("admin/header",$data);
        if ($id) {
            $cek=$this->Admin_model->cek_buku($id)->num_rows();
            if ($cek===1) {
                $data['valuene']=$this->Admin_model->cek_buku($id)->row();
                $this->load->view("admin/edit_buku",$data);
                if ($this->input->post("submit")) {
                    if ($this->hapus_gambarBuku($this->Admin_model->cek_buku($id)->row()->gambar)) {
                    $value=[
                        "nama_buku"=>htmlentities($this->input->post("judul_buku")),
                        "nomor_seri"=>htmlentities($this->input->post("nomor_seri")),
                        "jumlah"=>htmlentities($this->input->post("jumlah")),
                        "gambar"=>$this->_upload_img(),
                        "deskripsi"=>htmlentities($this->input->post("deskripsi"))
                    ];
                        if ($this->Admin_model->edit_buku($value,$id)) {
                            $this->session->set_flashdata("berhasil_edit_buku","berhasil");
                            redirect("dashboard/");
                        }else {
                            $this->session->set_flashdata("gagal_edit","gagal");
                            redirect("dashboard/");
                        }
                    }else {
                        $this->session->set_flashdata("gagal_edit","gagal");
                        redirect("dashboard/edit/".$id);
                    }
                }
            }else {
                $this->show404();
            }
        }else {
            $this->show404();
        }
        $this->load->view("admin/footer");
    }

    public function view($id=null)
    {
        $data['title']="Dashboard - Lihat Buku";

        $this->load->view("admin/header",$data);
        if ($id) {
            $cek=$this->Admin_model->cek_buku($id)->num_rows();
            if ($cek===1) {
                $data['riwayat']=$this->Admin_model->view_riwayatPeminjam($id)->result();
                $data['view']=$this->Admin_model->view_buku(["id_buku"=>$id])->row();
                if ($this->input->post()) {
                    $value_cek=[
                        "nomor_seriperpus"=>$this->input->post("nomor_seri"),
                        "nisn"=>$this->input->post("nisn")
                    ];
                    if ($this->Admin_model->view_where_userSiswa($value_cek)->num_rows()===1) {
                        $pinjam=$this->Admin_model->view_where_userSiswa($value_cek)->row();
                        $value_peminjaman=[
                            "nama"=>$pinjam->nama,
                            "kelas"=>$pinjam->kelas,
                            "nomor_perpus"=>$pinjam->nomor_seriperpus,
                            "nisn"=>$pinjam->nisn,
                            "id_riwayatuser"=>$pinjam->id_user,
                            "jumlah_pinjam"=>html_escape(strip_tags($this->input->post("jumlah_pinjam"))),
                            "id_riwayatbuku"=>html_escape(strip_tags($id))
                        ];
                        $value_buku=[
                            "status"=>$data['view']->status+html_escape(strip_tags($this->input->post("jumlah_pinjam")))
                        ];
                        $idne=[
                            "id_buku"=>strip_tags($id)
                        ];
                        if ($this->Admin_model->input_riwayatBuku($value_peminjaman,$value_buku,$idne)) {
                            $this->session->set_flashdata("berhasil_input_buku","berhasil");
                            redirect(base_url("dashboard/view/$id/"));
                        }else {
                            $this->session->set_flashdata("gagal_input_buku","gagal");
                            redirect(base_url("dashboard/view/$id/"));
                        }
                    }else {
                        $this->session->set_flashdata("data_tidak_cocok","gagal");
                        redirect(base_url("dashboard/view/$id/"));
                    }
                }
                $this->load->view("admin/view",$data);
            }else {
                $this->show404();
            }
        }else {
            $this->show404();
        }
        $this->load->view("admin/footer");
    }

    public function delete_riwayat()
    {
        if ($this->input->post()) {
            $id=$this->input->post("id");
            $cek_riwayatbuku=$this->Admin_model->view_riwayatbuku(['id_riwayat'=>$id])->row();
            $cek_buku=$this->Admin_model->view_buku(["id_buku"=>$cek_riwayatbuku->id_riwayatbuku])->row();
            $data=$this->Admin_model->hapus_riwayatbuku($id , $cek_buku->id_buku , $cek_buku->status - $cek_riwayatbuku->jumlah_pinjam);
            if ($data) {
                echo json_encode($data);
            }
        }else {
            show_404();
        }
    }

    public function data_nisn_siswa()
    {
        if (isset($_GET['term'])) {
            $result = $this->Admin_model->nisn_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nisn;
                echo json_encode($arr_result);
            }else {
                echo json_encode(['nama'=>"Nama tidak ditemukan"]);
            }
        }
    }

    public function data_siswa()
    {
        if (isset($_GET['term'])) {
            $result = $this->Admin_model->nama_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nomor_seriperpus;
                echo json_encode($arr_result);
            }else {
                echo json_encode(['nama'=>"Nama tidak ditemukan"]);
            }
        }
    }

    public function user_siswa()
    {
        $data['title']="Dashboard - Lihat User Siswa";

        $data["siswa"]=$this->Admin_model->view_userSiswa()->result();
        $this->load->view("admin/header",$data);
        $this->load->view("admin/user_siswa",$data);
        $this->load->view("admin/footer");
    }

    private function _cekusersiswa(){
        error_reporting(0);
        $read_user=$this->Admin_model->view_userSiswa2()->row();///ambil id user terakhir

        if ($read_user->id_user) {
            return $read_user->id_user;
        }else {
            return "0";
        }
    }

    public function tambah_usersiswa()
    {
        $data['title']="Dashboard - Tambah User Siswa";

        $read_user=$this->Admin_model->view_userSiswa2()->row();///ambil id user terakhir
        $read_user2=$this->Admin_model->view_userSiswa()->num_rows();
        $data["unik"]=uniqid()."-".$this->_cekusersiswa()."-".$read_user2;
        $this->load->view("admin/header",$data);
        $this->load->view("admin/tambah_usersiswa",$data);
        $this->load->view("admin/footer");
        if ($this->input->post("submit")) {
            // echo "<script>alert('".$this->Admin_model->cek_kelasSiswa($this->input->post("kelas"))."')</script>";
            if ($this->Admin_model->cek_kelasSiswa($this->input->post("kelas"))>0) {
                $value=[
                    "nama"=>htmlentities($this->input->post("nama")),
                    "kelas"=>htmlentities($this->input->post("kelas")),
                    "nisn"=>htmlentities($this->input->post("nisn")),
                    "nomor_seriperpus"=>$data['unik'],
                    "email"=>htmlentities($this->input->post("email"))
                ];
                if ($this->Admin_model->tambah_dataSiswa($value)) {
                    $this->session->set_flashdata("berhasil_input_siswa","sip");
                    redirect(base_url("dashboard/tambah_usersiswa/"));
                }
            }else {
                $this->session->set_flashdata("gagal_input","gagal");
                redirect(base_url("dashboard/tambah_usersiswa/"));
            }
        }
    }

    public function data_kelas_siswa()
    {
        if (isset($_GET['term'])) {
            $result = $this->Admin_model->kelas_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->kelas;
                echo json_encode($arr_result);
            }else {
                echo json_encode(['kelas'=>"Kelas tidak ditemukan"]);
            }
        }
    }

    public function kelas_siswa()
    {
        $data['title']="Dashboard - Lihat Kelas Siswa";

        $data['kelas']=$this->Admin_model->data_kelas()->result();
        $this->load->view("admin/header",$data);
        $this->load->view("admin/kelas_siswa",$data);
        $this->load->view("admin/footer");
    }

    public function delete_kelas($id=null)
    {
        $data['title']="Dashboard - 404 Not Found";

        $this->load->view("admin/header",$data);
        if ($id) {
            if ($this->Admin_model->cek_kelas($id)->num_rows()>0) {
                if ($this->Admin_model->hapus_kelas($id)) {
                    $this->session->set_flashdata("berhasil_hapus_kelas","sip");
                    redirect(base_url("dashboard/kelas_siswa/"));
                }else {
                    $this->session->set_flashdata("gagal_hapus_kelas","gagal");
                    redirect(base_url("dashboard/kelas_siswa/"));
                }
            }else {
                $this->show404();
            }
        }else {
            $this->show404();
        }
        $this->load->view("admin/footer");
    }

    public function tambah_kelas()
    {
        if ($this->input->post("submit")) {
            $kelas=htmlentities($this->input->post("kelas"));
            $value=[
                "kelas"=>$kelas
            ];
            if($this->Admin_model->cek_kelas_kelas($value)->num_rows()===0){
                if ($this->Admin_model->tambah_kelas($value)) {
                    $this->session->set_flashdata("berhasil","sip");
                    redirect("dashboard/tambah_kelas/");
                }
            }else {
                $this->session->set_flashdata("gagal","gagal");
                redirect("dashboard/tambah_kelas/");
            }
        }
        $data['title']="Dashboard - Tambah Kelas";

        $this->load->view("admin/header",$data);
        $this->load->view("admin/tambah_kelas");
        $this->load->view("admin/footer");
    }

    public function cetak_kartu($id=null)
    {
        ob_start();
        if ($id) {

            if ($this->Admin_model->view_where_userSiswa(['id_user'=>$id])->num_rows()===1) {
                $data['var']=$this->Admin_model->view_where_userSiswa(['id_user'=>$id])->row();
                $data['sekolah']=$this->Admin_model->cek_dataSekolah();
                $this->load->view('admin/kartu_perpus',$data);
                $html = ob_get_contents();
                ob_end_clean();
                include_once APPPATH . '/third_party/html2pdf/vendor/autoload.php';
                $pdf = new Spipu\Html2Pdf\Html2Pdf('L','A5','en');
                $pdf->pdf->SetTitle("Kartu Perpustakaan ".$data['var']->nama);
                $pdf->WriteHTML($html);
                $pdf->Output('kartu_perpustakaan.pdf');
            }else {
                show_404();
            }
        }else {
            show_404();
        }

    }

    public function data_sekolah()
    {
        if ($this->input->post("submit")) {
            $value=[
                "nama_perpustakaan"=>html_escape(strip_tags($this->input->post("nama_perpustakaan"))),
                "alamat_perpustakaan"=>html_escape(strip_tags($this->input->post("alamat_perpustakaan"))),
                "nama_kepsek"=>html_escape(strip_tags($this->input->post("nama_kepsek"))),
                "nip"=>html_escape(strip_tags($this->input->post("nip")))
            ];
            if ($this->Admin_model->update_dataSekolah($value)) {
                $this->session->set_flashdata("berhasil_update_sekolah","berhasil");
                redirect(base_url("dashboard/data_sekolah/"));
            }else {
                $this->session->set_flashdata("gagal_update_sekolah","gagal");
                redirect(base_url("dashboard/data_sekolah/"));
            }
        }
        $data['title']="Dashboard - Data Sekolah";

        $data['var']=$this->Admin_model->cek_dataSekolah();
        $this->load->view("admin/header",$data);
        $this->load->view("admin/data_sekolah",$data);
        $this->load->view("admin/footer");
    }

    public function edit_siswa($id=null)
    {
        $data['title']=$id ? 'Dashboard - Edit Siswa' : 'Dashboard - 404 Not Found';

        $this->load->view("admin/header",$data);
        if ($id) {
            $id=[
                "id_user"=>html_escape($id)
            ];
            if ($this->Admin_model->view_where_userSiswa($id)->num_rows()===1) {
                $data['var']=$this->Admin_model->view_where_userSiswa($id)->row();
                    if ($this->input->post("submit")) {
                        $kelas=[
                            'kelas'=>html_escape($this->input->post("kelas"))
                        ];
                        if ($this->Admin_model->cek_kelas_kelas($kelas)->num_rows()>0) {
                            $value=[
                                "nama"=>html_escape($this->input->post("nama")),
                                "kelas"=>html_escape($this->input->post("kelas")),
                                "nisn"=>html_escape($this->input->post("nisn")),
                                "email"=>html_escape($this->input->post("email"))
                            ];
                            if ($this->Admin_model->update_siswa($id,$value)) {
                                $this->session->set_flashdata("berhasil","berhasil");
                                redirect("dashboard/edit_siswa/".$id['id_user']."/");
                            }else {
                                $this->session->set_flashdata("gagal","gagal");
                                redirect("dashboard/edit_siswa/".$id['id_user']."/");
                            }
                        }else {
                            $this->session->set_flashdata("gagal_duplikat","gagal");
                            redirect("dashboard/edit_siswa/".$id['id_user']."/");
                        }
                    }
                $this->load->view("admin/edit_siswa",$data);
            }else {
                $this->show404();
            }
        }else {
            $this->show404();
        }
        $this->load->view("admin/footer");
    }

    public function c_delete_user_perpus()
    {
        if ($this->input->post()) {
            $id=$this->input->post("id");
            $data=$this->Admin_model->delete_user_perpus($id);
            if($data){
                echo json_encode($data);
            }
            // else {
            //     $this->session->set_flashdata("gagal_hapus_perpus","sip");
            //     redirect("dashboard/user_siswa/");
            // }
        }else {
            show_404();
        }
        // $data=$this->Admin_model->delete_user_perpus($id);
        //
        // echo json_encode($data);
        // echo $this->Admin_model->delete_user_perpus($id);

        // echo $this->Admin_model->cek_riwayatUserPerpus($id);

    }

    public function list_admin()
    {
        $data['title']="Dashboard - Daftar Admin";

        $data['awok']=$this->Admin_model->view_all_admin();
        $this->load->view("admin/header",$data);
        $this->load->view("admin/daftar_admin",$data);
        $this->load->view("admin/footer");
    }

    public function hapus_admin($id=null)
    {
        $data['title']="Dashboard - 404 Not Found";

        $this->load->view("admin/header",$data);
        if ($id) {
            if ($this->Admin_model->cek_admin($id)->num_rows()===1) {
                // echo "<script>alert('".$this->Admin_model->cek_admin_where()."')</script>";
                if ($this->Admin_model->cek_admin_where()>1) {
                    if ($this->Admin_model->hapus_admin($id)) {
                        $this->session->set_flashdata("berhasil_hapus_admin","sip");
                        redirect(base_url("dashboard/list_admin/"));
                    }else {
                        $this->session->set_flashdata("gagal_hapus_admin","gagal");
                        redirect(base_url("dashboard/list_admin/"));
                    }
                }else {
                    $this->session->set_flashdata("gagal_hapus_admin","gagal");
                    redirect(base_url("dashboard/list_admin/"));
                }
            }else {
                $this->show404();
            }
        }else {
            $this->show404();
        }
        $this->load->view("admin/footer");
    }

    public function tambah_admin()
    {
        if ($this->input->post()) {
            if ($this->input->post("username") && $this->input->post("password")) {
                $value=[
                    "username"=>$this->input->post("username"),
                    "password"=>sha1($this->input->post("password"))
                ];
                    if ($this->Admin_model->tambah_admin($value)) {
                        $this->session->set_flashdata("berhasil_tambah_admin","sip");
                        redirect(base_url("dashboard/list_admin/"));
                    }
            }else {
                $this->session->set_flashdata("tidak_boleh_kosong","sip");
                redirect(base_url("dashboard/tambah_admin/"));
            }
        }
        $data['title']="Dashboard - Tambah Admin";

        $this->load->view("admin/header",$data);
        $this->load->view("admin/tambah_admin");
        $this->load->view("admin/footer");
    }

    // tambah riwayat buku
    //edit,delete, user siswa

    public function riwayat_pinjam()
    {
        $data['view_all']=$this->Admin_model->view_all_riwayatBuku()->result();
        $data['title']="Dashboard - Daftar Riwayat Peminjaman";

        $this->load->view("admin/header",$data);
        $this->load->view("admin/riwayat_pinjam",$data);
        $this->load->view("admin/footer");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("admin/");
    }
}


 ?>
