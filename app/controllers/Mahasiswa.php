<?php

class Mahasiswa extends Controller{
    public function index(){
        $data['title']='Mahasiswa';
        $data['mhs']=$this->model('Mahasiswa_model')->getMhs();

        $this->view('template/header',$data);
        $this->view('mahasiswa/index',$data);
        $this->view('template/footer');
    }
    public function cari(){
        $data['title']='Mahasiswa';
        $data['mhs']=$this->model('Mahasiswa_model')->cariDataMahasiswa();

        $this->view('template/header',$data);
        $this->view('mahasiswa/index',$data);
        $this->view('template/footer');
    }
    public function detail($id){
        $data['title']='Detail Mahasiswa';
        $data['mhs']=$this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header',$data);
        $this->view('mahasiswa/detail',$data);
        $this->view('template/footer');
    }
    public function tambah(){
       // var_dump($_POST);
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)>0){
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function ubah(){
       // var_dump($_POST);
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST)>0){
            Flasher::setFlash('berhasil','diubah','success');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function hapus($id){
        // var_dump($_POST);
         if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id)>0){
             Flasher::setFlash('berhasil','dihapus','success');
             header('Location:'. BASEURL .'/mahasiswa');
             exit;
         }else{
             Flasher::setFlash('gagal','dihapus','danger');
             header('Location:'. BASEURL .'/mahasiswa');
             exit;
         }
    }
    public function getUbah(){
         
         echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));

    }
}