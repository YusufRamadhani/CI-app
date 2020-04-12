<?php

class Mahasiswa_model extends CI_model {

    public function getAllMahasiswa() {
        return $this->db->get('mahasiswa')->result_array();

        // the method chaining 
        // form is same like below
        // $query = $this->db->get('mahasiswa');
        // return $query->result_array();
    }

    public function tambahDataMahasiswa() {

        $data = [
            "nama" => $this->input->post('mahasiswa', true), // input data came from method $_POST
            "nim" => $this->input->post('nim', true), // true <field> is security req for no sql injection or hack
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];

        $this->db->insert('mahasiswa', $data);

    }

    public function hapusDataMahasiswa($id){
        
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }

    public function detailDataMahasiswa($id){

        return $this->db->get_where('mahasiswa', ['id'=>$id])->row_array();
    }

    public function ubahDataMahasiswa(){
        
        $data = [
            "nama" => $this->input->post('mahasiswa', true), // input data came from method $_POST
            "nim" => $this->input->post('nim', true), // true <field> is security req for no sql injection or hack
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);

    }

    public function cariDataMahasiswa() {

        $keyword = $this->input->post('keyword');

        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('jurusan', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}