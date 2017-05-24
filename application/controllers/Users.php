<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
    }

    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('LoggedIn')){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('nav', $data);
            $this->load->view('users/account', $data);
        }else{
            redirect('users/login');
        }
    }

    /*
     * User login
     */
    public function login(){
        $data = array();
        if($this->session->userdata('LoggedIn')){
          redirect('users/account');
        }

        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'username'=>$this->input->post('username'),
                    'password' => md5($this->input->post('password'))
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('LoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('users/account/');
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        //load the view: views/users/login
        $this->load->view('nav', $data);
        $this->load->view('users/login', $data);
    }

    /*
     * User registration
     */
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|callback_checkDateTime');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'username' => strip_tags($this->input->post('username')),
                'address' => strip_tags($this->input->post('address')),
                'birthdate' => strip_tags($this->input->post('birthdate')),
                'password' => md5($this->input->post('password')),
                'user_type' => 'user' //default is typical user
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successful. Please login to your account.');
                    redirect('users/login');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('nav', $data);
        $this->load->view('users/registration', $data);
    }

    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('LoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login/');
    }

    public function delete_acct ($id) {
        
        if($this->session->userdata('LoggedIn')){
            $this->session->unset_userdata('LoggedIn');
            $this->session->unset_userdata('userId');
            $this->session->sess_destroy();
            $this->load->model("User");
            $this->User->delete($id);
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $this->load->view('nav', $data);
        }
        
        redirect('users/login');
    }

    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
    * Checks valid date format
    */
    public function checkDateTime($dt)
    {
      $pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
      if(preg_match($pattern, $this->input->post('birthdate'))) {
          return true;
      }
      else {
        $this->form_validation->set_message('checkDateTime', 'Invalid Date!');
        return false;
      }
    }
    /* ADMIN FUNCTIONALITIES */
    public function create_user(){
      $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
      $this->load->view('nav', $data);

      if($data['user']['user_type'] == "admin"){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|callback_checkDateTime');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'username' => strip_tags($this->input->post('username')),
                'address' => strip_tags($this->input->post('address')),
                'birthdate' => strip_tags($this->input->post('birthdate')),
                'password' => md5($this->input->post('password')),
                'user_type' => 'user' //default is typical user
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Account creation successful.');
                    redirect('users/view_all');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $this->load->view('users/create_user');
      } else {
        //echo "Nononononocheck . di pwede bes";
        redirect('users/account');
      }

    }


	public function edit_profile() {

      $data = array();
	  $userData = array();
      $data['users'] = $this->db->query("SELECT * FROM users")->result();

	  	  if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|callback_checkDateTime');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                // 'username' => strip_tags($this->input->post('username')),
                'address' => strip_tags($this->input->post('address')),
                'birthdate' => strip_tags($this->input->post('birthdate')),
                'password' => md5($this->input->post('password'))
            );

            if($this->form_validation->run() == true){
                $update = $this->user->update($value, $userData);
                if($update){
                    $this->session->set_userdata('success_msg', 'Your registration was successful. Please login to your account.');
                    redirect('users/account');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

      if($this->session->userdata('LoggedIn')){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('nav', $data);
            $this->load->view('users/edit_profile', $data);
        } else{
            redirect('users/login');
        }

    }

    public function update_user($value) {

      $data = array();
	  $userData = array();
      $data['users'] = $this->db->query("SELECT * FROM users")->result();

	  	  if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|callback_checkDateTime');
            // $this->form_validation->set_rules('password', 'password', 'required');
            // $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                // 'username' => strip_tags($this->input->post('username')),
                'address' => strip_tags($this->input->post('address')),
                'birthdate' => strip_tags($this->input->post('birthdate')),
                // 'password' => md5($this->input->post('password')),
                'user_type' => strip_tags($this->input->post('user_type'))
            );

            if($this->form_validation->run() == true){
                $update = $this->user->update($value, $userData);
                if($update){
                    $this->session->set_userdata('success_msg', 'Your registration was successful. Please login to your account.');
                    redirect('users/view_all');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

      if($this->session->userdata('LoggedIn')){
		    $data['value'] = $this->user->getRows(array('id'=>$value));
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('nav', $data);
            $this->load->view('users/update_user', $data);
        } else{
            redirect('users/login');
        }

    }

    public function delete_user ($id) {

        if ($data['user']['user_type'] == "admin" and $data['user']['id'] != $id){
            $this->load->model("User");
            $this->User->delete($id);
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $this->load->view('nav', $data);
            redirect('users/view_all');
        } else {
            redirect('users/account');
        }
    }


    public function view_all(){
      $data = array();
      $data['users'] = $this->db->query("SELECT * FROM users")->result();


      if($this->session->userdata('LoggedIn')){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('nav', $data);
            $this->load->view('users/view_all', $data);
        } else{
            redirect('users/login');
        }
    }
}
?>
