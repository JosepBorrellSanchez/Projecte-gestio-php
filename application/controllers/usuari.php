<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuari extends CI_Controller {
	function __construct() {
parent::__construct();
	$this->load->database(); // Carreguem la base de dades
	$this->load->library('session');
	$this->load->library('form_validation');
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
	   //var_dump($this->sesio);
	   $data=$this->user->getDades($this->sesio['id']);
	   //var_dump($data);
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
		$config_file = array ( 'upload_path' => './assets/fotosusuaris',
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
			$file_name = base_url()."assets/fotosusuaris/".$this->sesio['username'].$propietats['file_ext'];
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
	
	Public function CanviPassword(){
		$this->load->library('form_validation');

		$pass = $this->input->post('canvipassword');
		$passnova = $this->input->post('canvipasswordnova');
		$passnovacomp = $this->input->post('canvipasswordnovaconf');
		$pw=$this->user->compassword($this->sesio['id']);
		
		if(MD5($pass) == $pw->password) {
		//var_dump(MD5($pass));
		//var_dump($pw['password']);
		
		$this->form_validation->set_rules('canvipasswordnova', 'Nova paraula de pas', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('canvipasswordnovaconf', 'Confirma la nova paraula de pas', 'trim|required|matches[canvipasswordnova]');
		
		if($this->form_validation->run() == TRUE)
  {
		
		$this->user->modificarPassword($this->sesio['id'], MD5($passnova));
		$this->session->sess_destroy();
		
		redirect ('usuari', 'refresh');
		}
		
		else{
			$this->load->view('perfil');
		}
		}
		else{
			$this->load->view('errorpassword');
		}
	}
	
	Public function CanviEmail(){
		

		$passemail = $this->input->post('canvipasswordmail');
		$email = $this->input->post('canviarmail');
		$pw=$this->user->compassword($this->sesio['id']);
		
		if(MD5($passemail) == $pw->password) {
		//var_dump(MD5($pass));
		//var_dump($pw['password']);
		
		$this->form_validation->set_rules('canvipasswordmail', 'Nova paraula de pas', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('canviarmail', 'Confirma el teu email', 'trim|required|valid_email');
		
		
		if($this->form_validation->run() == TRUE) {
		if($this->user->compemail($email) == TRUE) {
		$this->user->modificarEmail($this->sesio['id'], $email);
		
		$id = $this->sesio['id'];
			$username = $this->sesio['username'];
			$Nomicognoms = $this->sesio['Nomicognoms'];
            $foto = $this->sesio['foto'];
            
			$actualitzarsesio = array(
			'id' => $id,
			'username' => $username,
			'Nomicognoms' => $Nomicognoms,
            'email' => $email,
			'foto' => $foto);
			$this->session->set_userdata('logged_in',$actualitzarsesio);
			
			
		redirect ('usuari', 'refresh');}
		else{
			$this->load->view('errorcanvimail');
		}
		}
		
		else{
			$this->load->view('perfil');
		}
		}
		else{
			$this->load->view('errorpassword');
			//redirect('welcome/taula', 'refresh');
		}
	}
	
	public function forget()
	{
		
		$this->load->view('login-forget');
	}

	public function forgeterror()
	{
		
		$this->load->view('errorforget');
	}
	
	public function doforget()
	{
		$this->load->helper('url');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|');
		$email= $_POST['email'];
		$q = $this->db->query("select * from users where Email='" . $email . "'");
		if($this->form_validation->run() == TRUE) {
        if ($q->num_rows > 0) {
            $r = $q->result_array();
            $user=$r[0];
			$this->resetpassword($user);
			//var_dump($user);
			$this->passwordenviada($user);
        }
        else{
		redirect('/usuari/forgeterror', 'refresh');}
		//http://classpattern.com/reset-password-codeigniter.html
		
	} 
	else{
			$this->load->view('login-forget');
		}
	}
	
public function passwordenviada ($user) {
	
	$this->load->view('passwordenviada', $user);
}


	private function resetpassword($user)
	{
		 //cargamos la libreria email de ci
        $this->load->library("email");
 
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'vforvendettawin@gmail.com',
            'smtp_pass' => 'RevengeF2w',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );    
        
		date_default_timezone_set('GMT');
		$this->email->initialize($configGmail);
		$this->load->helper('string');
		$password= random_string('alnum', 16);
		$this->db->where('id', $user['id']);
		$this->db->update('users',array('password'=>MD5($password)));
		$this->load->library('email');
		$this->email->from('noreply@infoworld.com', 'Infoworld.S.L');
		$this->email->to($user['Email']); 	
		$this->email->subject('Paraula de pas');
		$this->email->message('<p><strong>Hola '.$user['Nomicognoms'] .'</strong></p>

<p>Pareix que has oblidat la teva contrasenya, aqu&iacute; t&#39;adjuntem la nova, generada pel sistema.</p>

<p>Paraula de pas : <em><strong>'.$password.' </strong></em></p>

<p>&nbsp;</p>

<p>Recorda que pots canviar-la en qualsevol moment al teu perfil d&#39;usuari.</p>

<p>Moltes gr&agrave;cies per utilitzar els nostres serveis.</p>

<p>Cordialment,</p>

<p>Infoworld</p>
');
		$this->email->send();
	} 
		
		//var_dump($this->user->compassword($this->sesio['id']));
		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
