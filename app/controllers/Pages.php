<?php
    class Pages extends Controller {
      public function __construct() {
        $this->pagesModel = $this->model('M_Pages');
      }
      public function index(){
        $data = [];
        $this->view('Branch_M/v_serviceDesk.php',$data);

      }
      public function about(){
        $users = $this->pagesModel->getUsers();
        $data = [
          'users' => $users
        ];

        
        $this->view('v_about',$data);
      }
    }
?>