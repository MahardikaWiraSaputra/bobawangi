<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_toko extends CI_Model{

    function list_data($status,$like,$limit,$offset)
    {
        $this->db->select('
        a.id_produk,
        a.umkm_id,
        a.nama_produk,
        a.deskripsi_produk,
        a.harga_produk,
        a.status_stok,
        a.slug,
        a.`status`,
        a.created,
        a.created_date,
        a.modified,
        a.modified_date,
        a.`view`,
        c.NAMA_USAHA,
        d.produk_img');
        $this->db->from('produk AS a');
        $this->db->join('umkm_list AS b', 'a.umkm_id = b.umkm_id', 'INNER');
        $this->db->join('umkm_master_data AS c', 'a.umkm_id = c.ID', 'INNER');
        $this->db->join('produk_images AS d', 'a.id_produk = d.produk_id', 'LEFT');
        if($status) {
            $this->db->where('b.status', $status);
        }
        if($like) {
            $this->db->or_like('b.NAMA_USAHA' ,$like);
        }
        $this->db->group_by('a.umkm_id');
        $this->db->order_by('a.id_produk','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($status,$like)
    {
        $this->db->select('a.umkm_id');
        $this->db->from('produk AS a');
        $this->db->join('umkm_list AS b', 'a.umkm_id = b.umkm_id', 'INNER');
        $this->db->join('umkm_master_data AS c', 'a.umkm_id = c.ID', 'INNER');
        $this->db->join('produk_images AS d', 'a.id_produk = d.produk_id', 'LEFT');
        if($status) {
            $this->db->where('b.status', $status);
        }
        if($like) {
            $this->db->or_like('b.NAMA_USAHA' ,$like);
        }
        $this->db->group_by('a.umkm_id');
        $query = $this->db->get();
        return $query;
    }

    function tambah($data) {
        $query = $this->db->insert('umkm_master_data', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function detail($id) {
        $this->db->select('a.id, a.user_id, a.api_key, a.`password`, a.url_domain, a.`level`, a.ignore_limits, a.is_private_key, a.ip_addresses, a.date_created, a.api_key_activated');
        $this->db->from('keys AS a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($data) {
        $this->db->where('ID', $data['id']);
        $query = $this->db->update('umkm_master_data', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }    

    function delete($id) {  
        $this->db->where("id", $id);
        $query = $this->db->delete("keys");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 

}