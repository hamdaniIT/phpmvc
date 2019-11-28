<?php
class Mahasiswa_model{
    private $tabel='mahasiswa';
    private $db;
    public function __construct(){
        $this->db=new Database;
    }

    public function getMhs(){
        $this->db->query('SELECT * FROM '. $this->tabel);
        return $this->db->resultSet();
    }
    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT * FROM mahasiswa WHERE nama LIKE :keyword");
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }
    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '. $this->tabel .' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function hapusDataMahasiswa($id){
        $this->db->query('DELETE FROM '. $this->tabel .' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function tambahDataMahasiswa($data){
        $query="INSERT INTO mahasiswa
                            VALUES 
                            ('',:nama,:nim,:email,:jurusan)";
        $this->db->query($query);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('nim',$data['nim']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('jurusan',$data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataMahasiswa($data){
        $query="UPDATE mahasiswa SET
                        nama= :nama,
                        nim= :nim,
                        email=:email,
                        jurusan=:jurusan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('nim',$data['nim']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('jurusan',$data['jurusan']);
        $this->db->bind('id',$data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}