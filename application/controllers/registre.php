<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registre extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user');
   $this->load->library('recaptcha');
 }

 function index()
 //Carrega la vista del registre.
 {
   $this->load->helper(array('form'));
   $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
                    $data['page'] = 'registre';
					$this->load->view('registre',$data);
					//var_dump($this->recaptcha);
 }
 public function registration()
 {
$this->load->library('form_validation');
  // field name, error message, validation rules
  //$this->form_validation->set_rules('username', 'Usuari', 'trim|required|min_length[4]|xss_clean|callback_username_check');
  $this->form_validation->set_rules('password', 'Paraula de pas', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Confirma la paraula de pas', 'trim|required|matches[password]');
  $this->form_validation->set_rules('nomicognoms', 'Nom i cognoms', 'trim|required|');
  //$this->form_validation->set_rules('email_address', 'El teu Email', 'trim|required|valid_email');
  
$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

 
	  $username = $this->input->post('username');
	  $email = $this->input->post('email');
	  $data=array(
		'username'=>$this->input->post('username'),
		'Nomicognoms'=>$this->input->post('nomicognoms'),
		'password'=>md5($this->input->post('password')),
		'Email'=>$this->input->post('email')
  );
  $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
                    $data['page'] = 'registre';
  
  if($this->form_validation->run() == TRUE)
  {
	  $this->recaptcha->recaptcha_check_answer();
	  if($this->user->compusuari($username) == TRUE){
		  if($this->user->compemail($email) == TRUE){
			if($this->recaptcha->getIsValid()){
			  
	  $dades=array(
	  'username'=>$data['username'],
	  'Nomicognoms'=>$data['Nomicognoms'],
	  'password'=>$data['password'],
	  'Email'=>$data['Email']);
	  //$username = $this->input->post('username');
	  
   $this->user->registre($dades);
   //redirect a "gracies per registrar-te, qui sigues... this load view i li paso la variable Username
   //$this->load->view('gracies', $data);
   $this->gracies($data);
   //redirect('welcome/index', 'refresh');}
	}
	else{
		                        if(!$this->recaptcha->getIsValid()) {
                            $this->session->set_flashdata('error','Error, captcha incorrecte');
                            redirect('registre', 'refresh');
                        } else {
                            $this->session->set_flashdata('error','incorrect credentials');
                            redirect('welcome/index', 'refresh');
                        }
                        
                        
					}
  }
  else{
	  $this->erroremail($data);
  }
  }
	else {
		//l'usuari existeix!! error!!
		$this->errorusuari($data);
		//$this->load->view('error',$data);
		}
		
	}
	else{
		$this->erroremail($data);
	}
	
		
 }
 public function gracies($data){
	 $this->load->view('gracies', $data);
}

public function errorusuari ($data) {
	
	$this->load->view('errorusuari',$data);
}

public function erroremail ($data) {
	
	$this->load->view('erroremail',$data);
}

public function emailinvalid($data) {
	
	$this->load->view('erroremail',$data);
}
}
