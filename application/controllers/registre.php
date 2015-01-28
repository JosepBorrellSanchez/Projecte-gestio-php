<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registre extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user');
 }

 function index()
 //Carrega la vista del login.
 {
   $this->load->helper(array('form'));
   $this->load->view('registre');
 }
 public function registration()
 {
$this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('username', 'Usuari', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('password', 'Paraula de pas', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Confirma la paraula de pas', 'trim|required|matches[password]');
  $this->form_validation->set_rules('nomicognoms', 'Nom i cognoms', 'trim|required|');
  $this->form_validation->set_rules('email_address', 'El teu Email', 'trim|required|valid_email');

  if($this->form_validation->run() == FALSE)
  {
	redirect('welcome/index');
  //$this->index();
  }
  else
  {
   $this->user->registre();
   
   redirect('welcome/index', 'refresh');
  }
 }
}
