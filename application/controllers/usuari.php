<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
parent::__construct();
	$this->load->database(); // Carreguem la base de dades
	$this->load->library('form_validation'); // La llibreria per fer els camps requerits
	$this->load->model('model_clients');
	$this->load->model('model_poblacio_provincia');
	$this->load->model('model_portada');
	$this->load->library('session');
	$this->id = $this->session->userdata('logged_in');
	$this->id2 = $this->id['id'];
} 
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     //$data['username'] = $session_data['username'];
     //$dia =  date("d/m/Y"); 
     $data = array (
		"id" => $this->id2,
		"dia" => date("d/m/Y") );
	 //$data = $this->model_portada->gettotescites();
	 //$citesavui = $this->model_portada->getcitesdianum($diaavui);
	 $this->load->view('perfil', $data);
	 //$this->load->view('portada', $data);
	 //$this->load->view('portada',$citesavui);
	 
	 //http://www.iluv2code.com/login-with-codeigniter-php.html
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
