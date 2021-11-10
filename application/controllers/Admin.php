<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
    }

    public function index()
    {
        $this->load->view("admin/login.php");
        if ($this->input->post("login")) {
            $username=$this->input->post("username");
            $password=sha1($this->input->post("password"));
            $query=$this->Admin_model->login($username,$password);

            if ($query===1) {
                $this->session->set_userdata("status","login_admin");
                $this->session->set_userdata("level","admin");
                redirect(base_url("dashboard/"));
            }else {
                $this->session->set_flashdata("gagal_login","gagal");
                redirect(base_url("admin/"));
            }
        }
    }
}


 ?>
