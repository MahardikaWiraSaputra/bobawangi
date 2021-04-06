<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_produk');
        $this->auth->cek_auth('data_produk');
    }

    public function index()
    {
        $data['filter_pasar'] = $this->model_produk->filter_pasar();
        $data['filter_kecamatan'] = $this->model_produk->filter_kecamatan();
        $data['filter_desa'] = $this->model_produk->filter_desa();
        $this->load->view('toko/index', $data);
    }

    public function list_data(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $pasar = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['pasar']) && $_POST['pasar'] != NULL && $_POST['pasar'] != 'all')
        {
            $pasar = $_POST['pasar'];
        }

        if (isset($_POST['page']) && $_POST['page'] != NULL) {
            $page = $_POST['page'];
            $pageof = $_POST['page']-1;
            $offset = $pageof * $limit;
        }

        if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
            $limit = $_POST['limit'];
        }

        $data['page'] = $page;
        $data['limit'] = $limit;

        $data['total_items'] = $this->model_produk->list_total($pasar,$like)->num_rows();
        $data['list_items'] = $this->model_produk->list_data($pasar,$like,$limit,$offset)->result();
        
        $this->load->view('toko/v_list', $data );
    }

    // tambah
    public function tambah(){
        $data['filter_pasar'] = $this->model_produk->filter_pasar();
        $data['filter_kecamatan'] = $this->model_produk->filter_kecamatan();
        $data['filter_desa'] = $this->model_produk->filter_desa();
        $data['filter_komoditas'] = $this->model_produk->filter_komoditas();
        $this->load->view('toko/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'NAMA LENGKAP', 'trim|required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('rw', 'rw', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('nama_usaha', 'nama_usaha', 'trim|required');
        $this->form_validation->set_rules('telp', 'telp', 'trim|required');
        $this->form_validation->set_rules('komoditas', 'komoditas', 'trim|required');
        $this->form_validation->set_rules('pasar', 'pasar', 'trim|required');
        if($this->form_validation->run()) {
            $data['nik'] = $this->input->post('nik');
            $data['nama_lengkap'] = $this->input->post('nama_lengkap');
            $data['alamat'] = $this->input->post('alamat');
            $data['rt'] = $this->input->post('rt');
            $data['rw'] = $this->input->post('rw');
            $data['desa'] = $this->input->post('desa');
            $data['kecamatan'] = $this->input->post('kecamatan');
            $data['nama_usaha'] = $this->input->post('nama_usaha');
            $data['telp'] = $this->input->post('telp');
            $data['komoditi'] = $this->input->post('komoditas');
            $data['pasar_id'] = $this->input->post('pasar');
            $data['date_created'] = date('Y-m-d H:i:s');
            $query = $this->model_produk->tambah($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }

    public function detail($id){
        if ($id) {
            $data['detail'] = $this->model_produk->detail($id);
            $this->load->view('toko/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function edit($id){
        $data['filter_pasar'] = $this->model_produk->filter_pasar();
        $data['filter_kecamatan'] = $this->model_produk->filter_kecamatan();
        $data['filter_desa'] = $this->model_produk->filter_desa();
        $data['filter_komoditas'] = $this->model_produk->filter_komoditas();
        if ($id) {
            $data['detail'] = $this->model_produk->detail($id);
            $this->load->view('toko/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function get_desa($id){
        if ($id) {
            $data['detail'] = $this->model_produk->get_desa($id);
            $this->load->view('toko/v_list_desa', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('user_id', 'USER ID', 'trim|required');
        $this->form_validation->set_rules('api_key', 'API_KEY', 'trim|required');
        $this->form_validation->set_rules('url_domain', 'URL DOMAIN', 'trim|required');
        if($this->form_validation->run()) {
            $data['id'] = $this->input->post('id');
            $data['user_id'] = $this->input->post('user_id');
            $data['api_key'] = $this->input->post('api_key');
            $data['url_domain'] = $this->input->post('url_domain');
            $data['api_key_activated'] = $this->input->post('status');
            if ($this->input->post('password')) {
                $data['password'] = md5($this->input->post('password'));
            }
            $query = $this->model_produk->update($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }


    public function delete($id){
        if($id) {         
            $query = $this->model_produk->delete($id);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DIUPDATE';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DIHAPUS';
            }
        } else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DIHAPUS';
        }
        echo json_encode($output);
    }

    public function generate_api() {
        $userid = $this->input->post('userid');
        if ($userid !== null) {
            $result['api_key'] = sha1($userid);
            $result['messages'] = 'valid';
        }
        else {
            $result['messages'] = 'invalid';
        }

        echo json_encode($result);
    }    


}