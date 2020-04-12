<?php 

class Mahasiswa extends CI_Controller
{

    public function __construct() {

        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        
    }
    public function index() {      
        $data['judul'] = 'Daftar Mahasiswa';

        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();

        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['judul'] = "Tambah data mahasiswa";

        $this->form_validation->set_rules('mahasiswa', 'Nama mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        }else{
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('mahasiswa'); //redirect to controller <field>
        }
    }

    public function hapus($id) {

        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id){
        $data['judul'] = "Detail Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->detailDataMahasiswa($id);

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id) {
        $data['judul'] = "Ubah data mahasiswa";
        $data['mahasiswa'] = ['id'=>$id];
        $data['mahasiswa'] = $this->Mahasiswa_model->detailDataMahasiswa($id);
        $data['jurusan'] = ['Teknik Informatika', 'Kedokteran', 'Teknik Elektro', 'Teknik Sipil', 'Arsitektur'];

        $this->form_validation->set_rules('mahasiswa', 'Nama mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('mahasiswa'); //redirect to controller <field>
        }
    }
}
