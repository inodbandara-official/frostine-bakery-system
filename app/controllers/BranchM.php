<?php
    class BranchM extends Controller {
      public function __construct() {
        $this->BranchMModel = $this->model('M_BranchM');
      }
      public function index(){
         // Initialize all keys for the view
         $data = [
          'Name' => '',
          'Contact' => '',
          'Address' => '',
          'Email' => '',
          'Join_Date' => '',
          'Password' => '',
          'Name_err' => '',
          'Contact_err' => '',
          'Address_err' => '',
          'Email_err' => '',
          'Join_Date_err' => '',
          'Password_err' => ''
      ];
        $this->view('BranchM/v_addCashier',$data);

      }
      /*public function about(){
        $users = $this->pagesModel->getUsers();
        $data = [
          'users' => $users
        ];

        
        $this->view('v_about',$data);
      }*/
      public function addCashier(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
              'Name' => trim($_POST['Name']),
              'Contact' => trim($_POST['Contact']),
              'Address' => trim($_POST['Address']),
              'Email' => trim($_POST['Email']),
              'Join_Date' => trim($_POST['Join_Date']),
              'Password' => trim($_POST['Password']),
              'Name_err' => '',
              'Contact_err' => '',
              'Address_err' => '',
              'Email_err' => '',
              'Join_Date_err' => '',
              'Password_err' => ''
          ];

        
           }else{
            //load view with errors
            $this->view('BranchM/v_addCashier', $data);
           }
           if (empty($data['Name'])) {
            $data['Name_err'] = 'Please enter a name';
        }
        if (empty($data['Contact'])) {
            $data['Contact_err'] = 'Please enter contact details';
        }
        if (empty($data['Address'])) {
            $data['Address_err'] = 'Please enter an address';
        }
        if (empty($data['Email'])) {
            $data['Email_err'] = 'Please enter an email address';
        }
        if (empty($data['Join_Date'])) {
            $data['Join_Date_err'] = 'Please enter a join date';
        }
        if (empty($data['Password'])) {
            $data['Password_err'] = 'Please enter a password';
        }
        
        // Check if all errors are empty
        if (empty($data['Name_err']) && empty($data['Contact_err']) && empty($data['Address_err']) && empty($data['Email_err']) && empty($data['Join_Date_err']) && empty($data['Password_err'])) {
            // Save data
            if ($this->BranchMModel->addCashier($data)) {
                die("Successfully added");
            } else {
                die('Something went wrong');
            }
      }
      else{
        $data = [
          'Name' => '',
          'Contact' => '',
          'Address' => '',
          'Email' => '',
          'Join_Date' => '',
          'Password' => '',
          'Name_err' => '',
          'Contact_err' => '',
          'Address_err' => '',
          'Email_err' => '',
          'Join_Date_err' => '',
          'Password_err' => ''
      ];
        $this->view('BranchM/v_addCashier',$data);
      }

    }
  }
?>