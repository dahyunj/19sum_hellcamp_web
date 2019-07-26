<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
        parent::__construct();

        $userid = $this->session->userdata('userid');
        if ($userid != null){
          echo "<script>location.href='/index.php/main/get/1'</script>";
          exit();
        }

  }


	public function index() {
    $this->load->view('login.php');
	}

  public function login_ck() {

  }
}

?>
