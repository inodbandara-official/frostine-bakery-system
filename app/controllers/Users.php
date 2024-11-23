<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('M_Users');
    }
    public function index() {
        $data = [
            'users' => $this->userModel->getUsers() // Example function to retrieve user data
        ];
        $this->view('pages/v_index', $data);
    }
    

    public function register() {
        // Check if the request is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => isset($_POST['name']) ? trim($_POST['name']) : '',
                'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
                'password' => isset($_POST['password']) ? trim($_POST['password']) : '',
                'confirm_password' => isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Name is required';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Email is required';
            } else {
                // Check if email already exists
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already registered';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            }

            // Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm the password';
            } else if ($data['password'] !== $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }

            // Check for errors
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register the user
                if ($this->userModel->register($data)) {
                    redirect('Users/login');
                } else {
                    die('Something went wrong during registration');
                }
            } else {
                // Load view with errors
                $this->view('users/v_register', $data);
            }
        } else {
            // Initialize data for GET requests
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load the registration view
            $this->view('users/v_register', $data);
        }
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //form is submiting
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''

            ];
            //validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                //check if email exists
                if($this->userModel->findUserByEmail($data['email']) > 0){
                    //user is found
                    
                }
                else{
                    //user is not found
                    $data['email_err'] = 'User not found';
                }
            }
            //validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }
            //if no error found the login user
            if(empty($data['email_error']) && empty($data['password_err'])){
                //log the user
                $loggedUser = $this->userModel->login( $data['email'],$data['password']);

                if($loggedUser){
                   //create user sessions
                    $this->createUserSession($loggedUser);

                }else{
                    $data['password_err'] = 'Incorrect password';
                    //load view again with errors
                    $this->view('users/v_login', $data);
                }
            }else{
                //load view again with errors
                $this->view('users/v_login', $data);
            }
        }
        else{
            $data =[
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => ''
            ];

            //load view
            $this->view('users/v_login', $data);
        }
    }
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;

        redirect('Pages/index');

    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('Users/login');

    }
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        else{
            return false;
        }

    }

}
?>
