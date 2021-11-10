<?php

/**
 *
 */
class View extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Client_model");
    }

    public function index()
    {
        $this->load->model("Admin_model");
        $data['data_sekolah']=$this->Client_model->view_sekolah();
        $data['buku']=$this->Admin_model->get_daftarbuku();
        $this->load->view("index",$data);
    }

    public function a(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('daftar_buku');
        echo $this->datatables->generate();
    }

    public function lihat($id=null)
    {
        if ($id) {
            if ($this->Client_model->view_where(["id_buku"=>$id])->num_rows()===1) {
                $data['view']=$this->Client_model->view_where(["id_buku"=>$id])->row();
                $this->load->view("lihat",$data);
            }else {
                show_404();
            }
        }else {
            show_404();
        }


    }
}


 ?>
