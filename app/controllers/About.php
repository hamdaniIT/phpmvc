<?php

class About extends Controller{
    public function index($nama="Hamdani",$pekerja='Seorang guru'){
        $data['title']='About';
         $data['nama']= $this->model('User_model')->getUser();
         $data['pekerja']=$pekerja;
         $this->view('template/header',$data);
        $this->view('about/index',$data);
        $this->view('template/footer');
        echo 'lfjasfd';
        
    }
    public function page(){
        
        $this->view('template/header');
        $this->view('about/page');
        $this->view('template/footer');
      
    }
}