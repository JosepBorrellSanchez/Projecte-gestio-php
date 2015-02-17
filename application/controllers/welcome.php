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
	   //var_dump($this->session->userdata('logged_in'));
     $session_data = $this->session->userdata('logged_in');
     //$data['username'] = $session_data['username'];
     //$dia =  date("d/m/Y"); 
     $ididia = array (
		"id" => $this->id2,
		"dia" => date("d/m/Y") );
     //$dia = "28/01/2015";
     
		$data = array(
			"dataavui" => date("Y/m/d"),
			//"quantescites" => $this->model_portada->getcitesdianum($dia),
			"cites" => $this->model_portada->getcitesdia($ididia)
			);
	 //$data = $this->model_portada->gettotescites();
	 //$citesavui = $this->model_portada->getcitesdianum($diaavui);
	 $this->load->view('portada', $data);
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

	public function taula()
	{
		if($this->session->userdata('logged_in'))
   {
	    //var_dump($id2);
	   // $id = $this->session->userdata('username');
		$data = $this->model_clients->getclient($this->id2);	
		$this->load->view('table', $data);}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	}
	
	public function afegir()
	{	
		if($this->session->userdata('logged_in'))
   {
		$data = array(
               "provincias" => $this->model_poblacio_provincia->getProvincias()
            );
		$this->load->view('clients', $data);}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	}

	public function agenda($codi)
	{
	if($this->session->userdata('logged_in'))
   {
	   $data = $this->model_clients->getclientcodi($codi, $this->id2)->row();
	   if(sizeof($data)==1){
           	
           	
		$cita = $this->model_clients->getcita($codi);
		$this->load->view('agenda', $cita);}
		else {
				$this->index();
			}
		}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }

	}
	
	

	public function buildDropCities()
    {
         //set selected country id from POST
        $id_provincia = $this->input->post('id',TRUE);
		//echo $id_provincia;
			
        //run the query for the cities we specified earlier
        $poblacions=$this->model_poblacio_provincia->getPoblaciones($id_provincia);
        
        
       $output = null;

        foreach ($poblacions->result() as $row){
        
            //here we build a dropdown item line for each query result
            $output .= "<option value='".$row->idpoblacion."'>".$row->poblacion."</option>";
		}
        

        echo  $output;
        
	}
	
	public function carregarCP()
    {
         //set selected country id from POST
        $id_poblacion = $this->input->post('idpoblacio',TRUE);
		//echo $id_provincia;
			
        //run the query for the cities we specified earlier
        $cp=$this->model_poblacio_provincia->getPostal($id_poblacion);
        

        echo  $cp;
        
	}


	public function insertavisita($codi) {
		if($this->session->userdata('logged_in'))
   {
		$data = $this->model_clients->getclientcodi($codi, $this->id2)->row();
		
		if(sizeof($data)==1){
           		$this->load->view('insertarcites', $data);}
           	else {
				$this->index();
			}
		}
		
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	}

	 function insertarclients() {
		 
if($this->session->userdata('logged_in'))
   {
	   
  $this->form_validation->set_rules('NIF', 'NIF', 'required|');
  $this->form_validation->set_rules('NomComercial', 'NomComercial', 'required|');
  $this->form_validation->set_rules('provincias', 'Provincia', 'required|');
  $this->form_validation->set_rules('cityDrp', 'Provincia i Ciutat', 'required|');
  $this->form_validation->set_rules('TelFixe', 'Telèfon Fixe', 'required|integer');
  $this->form_validation->set_rules('Email', 'Email', 'trim|valid_email');

if($this->form_validation->run() == TRUE)
  {
	    $id = $this->session->userdata('logged_in');
	    $id2 = $id['id'];
		$nif = $this->input->post('NIF');
		$comptecontable = $this->input->post('CompteContable');
		$nomfiscal = $this->input->post('NomFiscal');
		$nomcomercial = $this->input->post('NomComercial');
		$poblacio = $this->input->post('cityDrp');
		$cp = $this->input->post('CP');
		$provincia = $this->input->post('provincias');
		$direccio = $this->input->post('Direccio');
		$contacte = $this->input->post('Contacte');
		$email = $this->input->post('Email');
		$telfixe = $this->input->post('TelFixe');
		$telmobil = $this->input->post('TelMobil');
		$fax = $this->input->post('Fax');
		$observacions = $this->input->post('Observacions');
		//var_dump($comptecontable);
		$this->model_clients->insertaClient($nif, $id2, $comptecontable, $nomfiscal, $nomcomercial, $poblacio, $cp, $provincia, $direccio, $contacte, $email, $telfixe, $telmobil, $fax,$observacions);
		redirect('welcome/taula');}
	
		else
   {
	    $this->afegir();
   }}
     //If no session, redirect to login page
     else{
     redirect('login', 'refresh');}
   
}

	function insertarcites($codi) {
		if($this->session->userdata('logged_in'))
   {
		$data = $this->model_clients->getclientcodi($codi)->row();
		$client = $this->input->post('Client');
		$diahora = $this->input->post('DiaHora');
		$asumpte = $this->input->post('Asumpte');
		$nota = $this->input->post('Nota');		
		$this->model_clients->insertaCita($codi,$client, $diahora, $asumpte, $nota);
		redirect('welcome/agenda/'.$codi);}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}


/*
public function upload() {
		$data['content'] = 'pujar';
		$this->load->vars($data);
		$this->load->view('pujar');
	}

	function do_upload_multiple($codi) {
		$config['upload_path'] = './documents';
		$config['allowed_types'] = 'png|jpg|pdf|gif';
		$this->load->library('upload',$config);
		if(!$this->upload->do_multi_upload('archivo')) {
			$data = $this->model_clients->getclientcodi($codi)->row();
			$client = $this->input->post('Client');
			$diahora = $this->input->post('DiaHora');
			$asumpte = $this->input->post('Asumpte');
			$nota = $this->input->post('Nota');
			$this->model_clients->insertaCita($codi,$client, $diahora, $asumpte, $nota);
			 $this->load->library("email");
	 
	        //configuracion para gmail
	        $configGmail = array(
	            'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.gmail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'provahostin@gmail.com',
	            'smtp_pass' => 'fereres1',
	            'mailtype' => 'html',
	            'charset' => 'utf-8',
	            'newline' => "\r\n"
	        );    
	 
	        //cargamos la configuración para enviar con gmail
	        $this->email->initialize($configGmail);
	 
	        $this->email->from('Cita amb '.$client);
	        $this->email->to("bomberocanelles@gmail.com");
	        $this->email->subject('El dia '.$diahora );
	        $this->email->message('');
	        $this->email->send();
			redirect('welcome/agenda/'.$codi);
		}
		else {
			$datos['success'] = $this->upload->get_multi_upload_data();
			$data = $this->model_clients->getclientcodi($codi)->row();
			$client = $this->input->post('Client');
			$diahora = $this->input->post('DiaHora');
			$asumpte = $this->input->post('Asumpte');
			$nota = $this->input->post('Nota');
			$nom = $this->upload->file_name;
			$file_name = base_url()."documents/".$this->upload->file_name; 
			$this->model_clients->insertaCita($codi,$client, $diahora, $asumpte, $nota,$nom, $file_name);
			//cargamos la libreria email de ci
	        $this->load->library("email");
	 
	        //configuracion para gmail
	        $configGmail = array(
	            'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.gmail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'provahostin@gmail.com',
	            'smtp_pass' => 'fereres1',
	            'mailtype' => 'html',
	            'charset' => 'utf-8',
	            'newline' => "\r\n"
	        );    
	 
	        //cargamos la configuración para enviar con gmail
	        $this->email->initialize($configGmail);
	 
	        $this->email->from('Cita amb '.$client);
	        $this->email->to("bomberocanelles@gmail.com");
	        $this->email->subject('El dia '.$diahora );
	        $this->email->message('');
	        $this->email->send();
			redirect('welcome/agenda/'.$codi);
		}
	}
*/
	
	function EliminarClients($codi) {
		if($this->session->userdata('logged_in'))
   {
	   $data = array (
		"id" => $this->id2,
		"codi" => $codi );
		$this->model_clients->eliminarClients($data);
		redirect('welcome/taula');}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	}

		 function eliminarCita($id)
	{
		if($this->session->userdata('logged_in'))
   {
		$this->load->model('model_clients');
		$this->model_clients->eliminarCitas($id);
		redirect('welcome/taula');}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	}
	 function carregarClients($codi)  {
		 if($this->session->userdata('logged_in'))
		 
   {
	$id = $this->id2; 	
		
		$data = array(
               "provincias" => $this->model_poblacio_provincia->getProvincias(),
               "clients" => $this->model_clients->getclientcodi($codi, $id)->row(),
            );
            //var_dump($data['clients']);
           if(sizeof($data['clients'])==1){
           		$this->load->view('modificarclients', $data);}
           	else {
				$this->index();
			}
		}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   }

function carregarCites($id_agenda)  {
	 	if($this->session->userdata('logged_in'))
   {
		$data = $this->model_clients->getcitamod($id_agenda)->row();
		$this->load->view('modificarcites', $data);}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   }

	function updateCites($id_agenda)  {
		if($this->session->userdata('logged_in'))
   {
        $client = $this->input->post('Client');
		$diahora = $this->input->post('DiaHora');
		$asumpte = $this->input->post('Asumpte');
		$nota = $this->input->post('Nota');
		$this->model_clients->modificarCita($id_agenda, $diahora, $asumpte, $nota);
			//$this->load->model('model_clients');
		redirect ('welcome/taula');	}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	}
	function updateClients($codi)  {
		if($this->session->userdata('logged_in'))
   {
        $codi = $this->input->post('Codi');
		$codi1 = $codi;
		$nif = $this->input->post('NIF');
		$comptecontable = $this->input->post('CompteContable');
		$nomfiscal = $this->input->post('NomFiscal');
		$nomcomercial = $this->input->post('NomComercial');
		$poblacio = $this->input->post('cityDrp');
		$codipostal = $this->input->post('codipostal');
		$provincia = $this->input->post('provincias');
		$direccio = $this->input->post('Direccio');
		$contacte = $this->input->post('Contacte');
		$email = $this->input->post('Email');
		$telfixe = $this->input->post('TelFixe');
		$telmobil = $this->input->post('TelMobil');
		$fax = $this->input->post('Fax');
		$observacions = $this->input->post('Observacions');
		$id = $this->id2;
		if ($poblacio == null){
			$this->model_clients->modificarClients($codi, $nif, $comptecontable, $nomfiscal, $nomcomercial, $direccio, $contacte, $email, $telfixe, $telmobil, $fax,$observacions, $id2);}
		else{
		$this->model_clients->modificarClientsTot($codi, $nif, $comptecontable, $nomfiscal, $nomcomercial, $provincia, $poblacio, $codipostal, $direccio, $contacte, $email, $telfixe, $telmobil, $fax,$observacions, $id2);
			//$this->load->model('model_clients');
			}
		
		redirect ('welcome/taula');	}
		else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
	}
	
	function logout()
 //es carrega la sessió.
 {
   $this->session->unset_userdata('logged_in');
   //session_destroy();
   redirect('login', 'refresh');
 }

	public function generar($codi) {
		if($this->session->userdata('logged_in'))
   {
	   $data = $this->model_clients->getclientcodi($codi, $this->id2)->row();
	   if(sizeof($data)==1){
        $this->load->library('Pdf');
       // redefine ('PDF_HEADER_LOGO', './application/fotos/josep.jpg');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Infoworld');
        $pdf->SetTitle('Fitxa de client');
        $pdf->SetSubject('Fitxa');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData($this->id['foto'], PDF_HEADER_LOGO_WIDTH, $this->id['username'] , PDF_HEADER_STRING, array(0, 0, 0), array(0, 0, 0));
        //var_dump(PDF_HEADER_LOGO);
        //$this->id['foto'];
        
        $pdf->setFooterData($tc = array(0, 0, 0), $lc = array(0, 0, 0));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        //$pdf->Image('./application/fotos/josep.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('freemono', '', 14, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
        $data = $this->model_clients->getclientcodi($codi, $this->id2)->row();	
		//$this->load->view('table', $data);
        //preparamos y maquetamos el contenido a crear
       
        $codi = $data->Codi;
		$nif = $data->NIF;
		$comptecontable = $data->Comptecontable;
		$nomfiscal = $data->Nomfiscal;
		$nomcomercial = $data->Nomcomercial;
		$poblacio = $data->poblacion;
		$direccio = $data->Direccio;
		$contacte = $data->Contacte;
		$email = $data->Email;
		$telfixe = $data->Telfixe;
		$telmobil = $data->Telmobil;
		$fax = $data->Fax;
		$observacions = $data->Observacions;
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #fff; font-weight: bold; background-color: #222}";
        $html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<h3>Codi: ".$codi."</h3>";
        $html .= "<h3>NIF: ".$nif."</h3>";
        $html .= "<h3>Compte Contable: ".$comptecontable."</h3>";
        $html .= "<h3>Nom Fiscal: ".$nomfiscal."</h3>";
        $html .= "<h3>Nom Comercial: ".$nomcomercial."</h3>";
        $html .= "<h3>Població: ".$poblacio."</h3>";
        $html .= "<h3>Direcció: ".$direccio."</h3>";
        $html .= "<h3>Contacte: ".$contacte."</h3>";
        $html .= "<h3>Email: ".$email."</h3>";
        $html .= "<h3>Telefon Fixe: ".$telfixe."</h3>";
        $html .= "<h3>Telefon mòbil: ".$telmobil."</h3>";
        $html .= "<h3>Fax: ".$fax."</h3>";
        $html .= "<h3>Observacions: ".$observacions."</h3>";
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Fitxa del client ".$nomfiscal.".pdf");
        $pdf->Output($nombre_archivo, 'I');}
        else {
				$this->index();
			}
		}
        else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
    }

    public function generarcita($id_agenda) {
		if($this->session->userdata('logged_in'))
   {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('BORRELLS S.L');
        $pdf->SetTitle('Cita');
        $pdf->SetSubject('Cita');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData($this->id['foto'], PDF_HEADER_LOGO_WIDTH, $this->id['username'] , PDF_HEADER_STRING, array(0, 0, 0), array(0, 0, 0));
       //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE , PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('freemono', '', 14, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
        $data = $this->model_clients->getcitamod($id_agenda)->row();	
		//$this->load->view('table', $data);
        //preparamos y maquetamos el contenido a crear
       
        $client = $data->Nomfiscal;
		$diahora = $data->DiaHora;
		$asumpte = $data->Asumpte;
		$nota = $data->Nota;
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #fff; font-weight: bold; background-color: #222}";
        $html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<h2>Client: ".$client."</h2>";
        $html .= "<h2>Dia i Hora: ".$diahora."</h2>";
        $html .= "<h2>Assumpte: ".$asumpte."</h2>";
        $html .= "<h2>Nota: ".$nota."</h2>";
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Cita del client ".$client.".pdf");
        $pdf->Output($nombre_archivo, 'I');}
        else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
