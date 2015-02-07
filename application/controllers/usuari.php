<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuari extends CI_Controller {
	function __construct() {
parent::__construct();
	$this->load->database(); // Carreguem la base de dades
	$this->load->library('form_validation'); // La llibreria per fer els camps requerits
	$this->load->model('user');
	$this->load->library('session');
} 
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
   {
     $data = "hola";
     $this->load->view('perfil', $data);
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
