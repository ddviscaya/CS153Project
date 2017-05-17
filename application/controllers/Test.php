<?php
   class Test extends CI_Controller {

      public function index() {
         echo "Hello World!";
        //  $data = array(
        //   'username' => 'dz1',
        //   'email' => 'dz@dz.com',
        //   'password' => password_hash('dz', PASSWORD_BCRYPT),
        //   'birthdate' => '11/14/1996'
        // );
        // $this->db->insert('users', $data);

        $sql = "SELECT * FROM users WHERE username = ?";
        $q = $this->db->query($sql, array('dz1'));
        foreach ($q->result() as $row)
        {
          if (password_verify('dz1', $row->password)){
           echo "PASS VALID";
         }else{
           echo "NO VALID";
         }
        }


      }
      public function hello() {
        $query = $this->db->get('users');

        foreach ($query->result() as $row)
        {
          echo $row->username;
        }
      }
   }
?>
