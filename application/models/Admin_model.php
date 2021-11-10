<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Admin_model extends CI_Model
{

    public function login($username,$password)
    {
        $user=$this->db->escape($username);
        $pass=$this->db->escape($password);
        return $this->db->query("SELECT * FROM admin where binary username=$user AND password=$pass")->num_rows();
    }

    public function get_daftarbuku()
    {
        return $this->db->get("daftar_buku")->result();
    }

    public function tambah_buku($data)
    {
        return $this->db->insert("daftar_buku",$data);
    }

    public function hapus_dataBuku($id)
    {
        return $this->db->delete("daftar_buku",['id_buku'=>$id]);
    }

    public function cek_buku($id)
    {
        return $this->db->get_where("daftar_buku",['id_buku'=>$id]);
    }

    public function edit_buku($value,$id)
    {
        return $this->db->update("daftar_buku",$value,['id_buku'=>$id]);
    }

    public function view_buku($id)
    {
        return $this->db->get_where("daftar_buku",$id);
    }

    public function view_riwayatbuku($id)
    {
        return $this->db->get_where("riwayat_peminjaman",$id);
    }

    // public function view_buku($id)
    // {
    //     return $this->db->get_where("daftar_buku",$id);
    // }

    public function view_riwayatPeminjam($id)
    {
        // $id=[
        //     "id_buku"=>$id
        // ];

        $this->db->select("*");
        $this->db->from("daftar_buku");
        $this->db->join("riwayat_peminjaman","riwayat_peminjaman.id_riwayatbuku = daftar_buku.id_buku");
        $this->db->join("user_perpus","user_perpus.id_user = riwayat_peminjaman.id_riwayatuser");
        $this->db->where("id_buku",$id);
        return $this->db->get();

    }

    public function hapus_riwayatbuku($id,$id_buku,$value_status)
    {
        if($this->db->update("daftar_buku" ,['status'=>$value_status], ["id_buku"=>$id_buku]) && $this->db->delete("riwayat_peminjaman",['id_riwayat'=>$id])){
            return true;
        }else {
            return false;
        }
    }

    public function nama_siswa($nama)
    {

        $this->db->like('nomor_seriperpus', $nama , 'both');
        $this->db->order_by('nomor_seriperpus', 'ASC');
        $this->db->limit(10);
        return $this->db->get('user_perpus')->result();

        // return $this->db->get("user_perpus")->result();
        // return $this->db->query("SELECT nama FROM user_perpus WHERE nama LIKE '%".$_GET['query']."%' LIMIT 10");
        // $this->db->select("*");
        // $this->db->from("user_perpus");
        // return $this->db->like("nama",$val)->get();


    }

    public function nisn_siswa($nisn)
    {
        $this->db->like('nisn', $nisn , 'both');
        $this->db->order_by('nisn', 'ASC');
        $this->db->limit(10);
        return $this->db->get('user_perpus')->result();
    }

    public function view_userSiswa()
    {
        return $this->db->get("user_perpus");
    }

    public function view_userSiswa2()
    {
        $this->db->select("*");
        // $this->db->select_max("id_user");

        $this->db->order_by("id_user","DESC");
         $this->db->limit(1);
        return $this->db->get("user_perpus");
    }

    public function kelas_siswa($nama)
    {

        $this->db->like('kelas', $nama , 'both');
        $this->db->order_by('kelas', 'ASC');
        $this->db->limit(10);
        return $this->db->get('kelas_siswa')->result();

        // return $this->db->get("user_perpus")->result();
        // return $this->db->query("SELECT nama FROM user_perpus WHERE nama LIKE '%".$_GET['query']."%' LIMIT 10");
        // $this->db->select("*");
        // $this->db->from("user_perpus");
        // return $this->db->like("nama",$val)->get();


    }

    public function tambah_dataSiswa($value)
    {
        return $this->db->insert("user_perpus",$value);
    }

    public function cek_kelasSiswa($value)
    {
        return $this->db->get_where("kelas_siswa",['kelas'=>$value])->num_rows();
    }

    public function data_kelas()
    {
        return $this->db->get("kelas_siswa");
    }

    public function cek_kelas($id)
    {
        return $this->db->get_where("kelas_siswa",['id_kelas'=>$id]);
    }

    public function hapus_kelas($id)
    {
        return $this->db->delete("kelas_siswa",['id_kelas'=>$id]);
    }

    public function cek_kelas_kelas($value)
    {
        return $this->db->get_where("kelas_siswa",$value);
    }

    public function tambah_kelas($value)
    {
        return $this->db->insert("kelas_siswa",$value);
    }

    public function view_where_userSiswa($value)
    {
        return $this->db->get_where("user_perpus",$value);
    }

    public function update_siswa($id,$value)
    {
        return $this->db->update("user_perpus",$value,$id);
    }

    public function cek_riwayatUserPerpus($value)
    {
        return $this->db->get_where("riwayat_peminjaman",["id_riwayatuser"=>$value])->num_rows();
    }

    public function delete_user_perpus($id)
    {
        return $this->db->delete("user_perpus",["id_user"=>$id]);
    }

    public function input_riwayatBuku($value_peminjaman,$value_buku,$id)
    {
        if ($this->db->insert("riwayat_peminjaman",$value_peminjaman) && $this->db->update("daftar_buku",$value_buku,$id)) {
            return true;
        }else {
            return false;
        }
    }

    public function cek_dataSekolah()
    {
        return $this->db->get_where("data_sekolah",['id_sekolah'=>1])->row();
    }

    public function update_dataSekolah($value)
    {
        return $this->db->update("data_sekolah",$value,['id_sekolah'=>1]);
    }

    public function view_all_admin()
    {
        return $this->db->get("admin")->result();
    }

    public function tambah_admin($value)
    {
        return $this->db->insert("admin",$value);
    }

    public function cek_admin($id)
    {
        return $this->db->get_where("admin",["id"=>$id]);
    }

    public function hapus_admin($id)
    {
        return $this->db->delete("admin",['id'=>$id]);
    }

    public function cek_admin_where()
    {
        return $this->db->get("admin")->num_rows();
    }

    public function view_all_riwayatBuku()
    {
        $this->db->select("*");
        $this->db->from("daftar_buku");
        $this->db->join("riwayat_peminjaman","riwayat_peminjaman.id_riwayatbuku = daftar_buku.id_buku");
        $this->db->join("user_perpus","user_perpus.id_user = riwayat_peminjaman.id_riwayatuser");
        // $this->db->where("id_buku",$id);
        return $this->db->get();
    }

    // public function tambah_dataSiswa($value)
    // {
    //     return $this->db->insert("user_perpus",$value);
    // }
}


 ?>
