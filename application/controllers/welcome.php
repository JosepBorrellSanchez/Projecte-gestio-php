<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
parent::__construct();
	$this->load->database(); // Carreguem la base de dades
	$this->load->library('form_validation'); // La llibreria per fer els camps requerits
	$this->load->model('model_clients');
} 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
		$this->load->view('clients');
	}

	public function taula()
	{
		$data = $this->model_clients->getclient();	
		$this->load->view('table', $data);
	}

	public function agenda($codi)
	{

		$cita = $this->model_clients->getcita($codi);
		$this->load->view('agenda', $cita);

	}

	public function insertavisita($codi) {
		$cita = $this->model_clients->getcita($codi);
		$this->load->view('incertarcites', $cita);
	}

	 function insertarclients() {

		$codi = $this->input->post('Codi');
		$nif = $this->input->post('NIF');
		$comptecontable = $this->input->post('CompteContable');
		$nomfiscal = $this->input->post('NomFiscal');
		$nomcomercial = $this->input->post('NomComercial');
		$poblacio = $this->input->post('Poblacio');
		$direccio = $this->input->post('Direccio');
		$contacte = $this->input->post('Contacte');
		$email = $this->input->post('Email');
		$telfixe = $this->input->post('TelFixe');
		$telmobil = $this->input->post('TelMobil');
		$fax = $this->input->post('Fax');
		$observacions = $this->input->post('Observacions');
		$this->model_clients->insertaClient($codi, $nif, $comptecontable, $nomfiscal, $nomcomercial, $poblacio, $direccio, $contacte, $email, $telfixe, $telmobil, $fax,$observacions);
		redirect('welcome/index');
}

	function insertarcites($codi) {
		$client = $this->input->post('Client');
		$diahora = $this->input->post('DiaHora');
		$asumpte = $this->input->post('Asumpte');
		$nota = $this->input->post('Nota');		
		$this->model_clients->insertaCita($codi,$client, $diahora, $asumpte, $nota);
		//redirect('welcome/agenda');
}
	 function EliminarClients($codi)
	{
		$this->model_clients->eliminarClients($codi);
		redirect('welcome/taula');
	}

		 function eliminarCita($id)
	{
		$this->load->model('model_clients');
		$this->model_clients->eliminarClients($id);
		redirect('welcome/agenda');
	}
	 function carregarClients($codi)  {
	 	
		$data = $this->model_clients->getclientcodi($codi)->row();
		$this->load->view('modificarclients', $data);}


		function updateClients($codi)  {
        $codi = $this->input->post('Codi');
		$codi1 = $codi;
		$nif = $this->input->post('NIF');
		$comptecontable = $this->input->post('CompteContable');
		$nomfiscal = $this->input->post('NomFiscal');
		$nomcomercial = $this->input->post('NomComercial');
		$poblacio = $this->input->post('Poblacio');
		$direccio = $this->input->post('Direccio');
		$contacte = $this->input->post('Contacte');
		$email = $this->input->post('Email');
		$telfixe = $this->input->post('TelFixe');
		$telmobil = $this->input->post('TelMobil');
		$fax = $this->input->post('Fax');
		$observacions = $this->input->post('Observacions');
		$this->model_clients->modificarClients($codi, $nif, $comptecontable, $nomfiscal, $nomcomercial, $poblacio, $direccio, $contacte, $email, $telfixe, $telmobil, $fax,$observacions);
			//$this->load->model('model_clients');
		redirect ('welcome/taula');	
	}

	public function generar($codi) {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Albert Cañelles');
        $pdf->SetTitle('Factura');
        $pdf->SetSubject('Factura');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
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
        $data = $this->model_clients->getclient();	
		//$this->load->view('table', $data);
        //preparamos y maquetamos el contenido a crear
        $codi = $data['Codi'];
		$nif = $data['NIF'];
		$comptecontable = $data['Comptecontable'];
		$nomfiscal = $data['Nomfiscal'];
		$nomcomercial = $data['Nomcomercial'];
		$poblacio = $data['Poblacio'];
		$direccio = $data['Direccio'];
		$contacte = $data['Contacte'];
		$email = $data['Email'];
		$telfixe = $data['Telfix'];
		$telmobil = $data['Telmobil'];
		$fax = $data['Fax'];
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #fff; font-weight: bold; background-color: #222}";
        $html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<h2>Localidades de ".$nomfiscal."</h2><h4>Actualmente: ".$nomcomercial." localidades</h4>";
        $html .= "<table width='100%'>";
        $html .= "<tr><th>Id localidad</th><th>Localidades</th></tr>";
        
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Fitxe de l'empresa ".$nomfiscal.".pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */