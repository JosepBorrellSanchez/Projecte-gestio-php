<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_clients extends CI_Model{
function __construct()
{
parent::__construct();
$this->load->database();
}


		// Tots els gets que consulten les dades a la base dades
		function getcita($codi) {
			$this->db->select('A.id_agenda,B.Nomfiscal,A.DiaHora,A.Asumpte,A.Nota');
			$this->db->from('Agenda as A ');
			$this->db->join('Clients as B','A.Client=B.Codi');
			$this->db->where('Num_Client',$codi);
			return $this->db->get()->result_array();
		}

		function getcitamod($id_agenda) {
			$this->db->select('A.id_agenda,B.Nomfiscal,A.DiaHora,A.Asumpte,A.Nota');		
			$this->db->from('Agenda as A');
			$this->db->join('Clients as B','A.Client=B.Codi');
			$this->db->where('id_agenda',$id_agenda);
			$query = $this->db->get();
			return $query;
		}


		function getclient() {
			$this->db->select('A.Codi,A.NIF,A.Comptecontable,A.Nomfiscal,A.Nomcomercial,B.poblacion,C.Provincia,A.CodiPostal,A.Direccio, A.Contacte, A.Email, A.Telfixe, A.Telmobil, A.Fax, A.Observacions');
			$this->db->from('Clients as A');
			$this->db->join('poblaciones as B','A.Poblacio=B.idpoblacion');
			$this->db->join('provincias as C','A.Provincia=C.idprovincia');
			$query = $this->db->get();
			
			return $query->result_array();
		}

		function getclientcodi($codi) {
			$this->db->select('A.Codi,A.NIF,A.Comptecontable,A.Nomfiscal,A.Nomcomercial,B.poblacion,C.Provincia, A.CodiPostal ,A.Direccio, A.Contacte, A.Email, A.Telfixe, A.Telmobil, A.Fax, A.Observacions');
			$this->db->from('Clients as A');
			$this->db->where('A.Codi',$codi);
			$this->db->join('poblaciones as B','A.Poblacio=B.idpoblacion');
			$this->db->join('provincias as C','A.Provincia=C.idprovincia');
			//$query = $this->db->get('Clients');
			$query = $this->db->get();
			return $query;
		}



		function getNomProvincia() {
			$this->db->select('provincia');
			$query = $this->db->get('provincias')->result_array();
			return $query;
		}


		// Tots els inserts que inserten dades
		function insertaClient($nif,$comptecontable,$nomfiscal,$nomcomercial,$poblacio, $cp, $provincia,$direccio,$contacte,$email,$telfixe,$telmobil,$fax,$observacions)
		{
			$data = array(
			'Codi'=> $codi,
			'NIF'=> $nif,
			'Comptecontable'=> $comptecontable,
			'Nomfiscal'=> $nomfiscal,
			'Nomcomercial'=> $nomcomercial,
			'Poblacio'=> $poblacio,
			'CodiPostal' => $cp, 
			'Provincia' => $provincia,
			'Direccio'=> $direccio,
			'Contacte'=> $contacte,
			'Email'=> $email,
			'Telfixe'=> $telfixe,
			'Telmobil'=> $telmobil,
			'Fax'=> $fax,
			'Observacions'=> $observacions);
			$this->db->insert('Clients', $data);
		}

		// Tots els delete per eliminar les dades
		function eliminarClients($codi) {
			$this->db->delete('Clients', array('Codi' => $codi));
		}
		function eliminarCitas($id) {
			$this->db->delete('Agenda', array('id_agenda' => $id));
		}
		// Tots els update

		function modificarClients($codi,$nif,$comptecontable,$nomfiscal,$nomcomercial,$provincia,$poblacio,$codipostal,$direccio,$contacte,$email,$telfixe,$telmobil,$fax){
			$data = array(
			'Codi'=> $codi,
			'NIF'=> $nif,
			'Comptecontable'=> $comptecontable,
			'Nomfiscal'=> $nomfiscal,
			'Nomcomercial'=> $nomcomercial,
			'Provincia'=> $provincia,
			'Poblacio'=> $poblacio,
			'CodiPostal'=> $codipostal,
			'Direccio'=> $direccio,
			'Contacte'=> $contacte,
			'Email'=> $email,
			'Telfixe'=> $telfixe,
			'Telmobil'=> $telmobil,
			'Fax'=> $fax);
			$this->db->where('Codi',$codi);
			$this->db->update('Clients', $data);
		}

		function insertaCita($codi,$client,$diahora,$asumpte,$nota)
		{
			$data = array(
			'Num_Client'=> $codi,
			'Client'=> $client,
			'DiaHora'=> $diahora,
			'Asumpte'=> $asumpte,
			'Nota'=> $nota);
			$this->db->insert('Agenda', $data);
		}

		function modificarCita($id_agenda,$diahora,$asumpte,$nota)
		{
			$data = array(
			'DiaHora'=> $diahora,
			'Asumpte'=> $asumpte,
			'Nota'=> $nota);
			$this->db->where('id_agenda',$id_agenda);
			$this->db->update('Agenda', $data);
		}
}
?>
