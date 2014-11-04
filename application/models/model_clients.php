<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_clients extends CI_Model{
function __construct()
{
parent::__construct();
$this->load->database();
}


		// Tots els gets que consulten les dades a la base dades
		function getcita($codi) {
			$this->db->select('id_agenda,Client,DiaHora,Asumpte,Nota');
			$this->db->from('Agenda');
			$this->db->where('Num_Client',$codi);
			return $this->db->get()->result_array();
		}



		function getclient() {
			$this->db->select('Codi,NIF,Comptecontable,Nomfiscal,Nomcomercial,Poblacio, Direccio, Contacte, Email, Telfixe, Telmobil, Fax');
			$query = $this->db->get('Clients');
			return $query->result_array();
		}

		function getclientcodi($codi) {
			$this->db->select('Codi,NIF,Comptecontable,Nomfiscal,Nomcomercial,Poblacio, Direccio, Contacte, Email, Telfixe, Telmobil, Fax');
			$this->db->where('Codi',$codi);
			$query = $this->db->get('Clients');
			return $query;
		}

		// Tots els inserts que inserten dades
		function insertaClient($codi,$nif,$comptecontable,$nomfiscal,$nomcomercial,$poblacio,$direccio,$contacte,$email,$telfixe,$telmobil,$fax)
		{
			$data = array(
			'Codi'=> $codi,
			'NIF'=> $nif,
			'Comptecontable'=> $comptecontable,
			'Nomfiscal'=> $nomfiscal,
			'Nomcomercial'=> $nomcomercial,
			'Poblacio'=> $poblacio,
			'Direccio'=> $direccio,
			'Contacte'=> $contacte,
			'Email'=> $email,
			'Telfixe'=> $telfixe,
			'Telmobil'=> $telmobil,
			'Fax'=> $fax);
			$this->db->insert('Clients', $data);
		}

		// Tots els delete per eliminar les dades
		function eliminarClients($codi) {
			$this->db->delete('Clients', array('Codi' => $codi));
		}
		function eliminarCita($id) {
			$this->db->delete('Agenda', array('id_agenda' => $id));
		}
		// Tots els update

		function modificarClients($codi,$nif,$comptecontable,$nomfiscal,$nomcomercial,$poblacio,$direccio,$contacte,$email,$telfixe,$telmobil,$fax){
			$data = array(
			'Codi'=> $codi,
			'NIF'=> $nif,
			'Comptecontable'=> $comptecontable,
			'Nomfiscal'=> $nomfiscal,
			'Nomcomercial'=> $nomcomercial,
			'Poblacio'=> $poblacio,
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
}
?>