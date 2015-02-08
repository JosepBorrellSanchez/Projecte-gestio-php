<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuari extends CI_Controller {
	function __construct() {
parent::__construct();
	$this->load->database(); // Carreguem la base de dades
	$this->load->library('session');
	$this->load->model('user');
	$this->sesio = $this->session->userdata('logged_in');
} 
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
   {
	   var_dump($this->sesio);
     $this->load->view('perfil');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 public function modifica()
	{
		if($this->session->userdata('logged_in'))
   {
     $this->load->view('modificaperfil');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 public function DoUpload() {
		//es el que s’encarrega de fer la feina de pujar la foto, si s’ha pujat correctament reenvia a la llista.
		if($this->session->userdata('logged_in')){
		$config_file = array ( 'upload_path' => './application/fotos',
			'allowed_types' => 'png|jpg',
			'overwrite' => true,
			'max_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'encrypt_name' => false,
			'file_name' => $this->sesio['username'],
			'remove_spaces' => true, );
		$this->upload->initialize($config_file);
		if (!$this->upload->do_upload('foto')) {
			$error = $this->upload->display_errors();
			echo $error; 
		} 
	    else { 
			$this->session->set_flashdata('success_upload','Pujat Correcament');
			//$nom = $this->upload->file_name;
			$propietats=$this->upload->data();
			$file_name = base_url()."application/fotos/".$this->sesio['username'].$propietats['file_ext'];
			//$file_name = base_url()."imatges/".$this->upload->file_name;
			$id = $this->sesio['id'];
			//$idproducte = $this->mod_productes->getUltimProducte();
			//var_dump($propietats['file_ext']);
			$this->user->pujarFoto($file_name, $id);
			
			$id = $this->sesio['id'];
			$username = $this->sesio['username'];
			$Nomicognoms = $this->sesio['Nomicognoms'];
            $email = $this->sesio['email'];
            
			$actualitzarsesio = array(
			'id' => $id,
			'username' => $username,
			'Nomicognoms' => $Nomicognoms,
            'email' => $email,
			'foto' => $file_name);
			$this->session->set_userdata('logged_in',$actualitzarsesio);
			//var_dump($this->session->userdata('logged_in'));
			redirect('welcome/index'); 
		}
	}
	else{
     //If no session, redirect to login page
     redirect('login', 'refresh');}
	}
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
