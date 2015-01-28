<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_portada extends CI_Model{
function __construct()
{
parent::__construct();
$this->load->database();
}


		// Tots els gets que consulten les dades a la base dades
		//function getcitesdia($diaavui) {
		function getcitesdia($dia) {
			// SELECT MID(DiaHora,6) FROM Agenda
			//SELECT MID(a,6) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE '______24/01/2015%') as b
			$this->db->select('A.id_agenda,B.Nomfiscal,A.DiaHora,A.Asumpte,A.Nota', FALSE);
			$this->db->from('Agenda as A', FALSE);
			$this->db->join('Clients as B','A.Client=B.Codi');
			$this->db->where('SUBSTRING(DiaHora,7)', $dia);
			//SELECT * from Agenda WHERE SUBSTRING(DiaHora,7) = '28/01/2015'
			//$this->db->like('______15/01/2015%');
			//$this->db->select('DiaHora as a');
			//$this->db->from('Agenda');
			//$this->db->where('DiaHora LIKE "______24/01/2015%"');
			//SELECT  SUBSTRING(DiaHora,6) FROM Agenda
			//$this->db->query('SELECT MID(a,6) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE' "______24/01/2015%"') as b');
			//$query = $this->db->query('SELECT SUBSTRING(DiaHora,6) FROM Agenda WHERE DiaHora'
			//$this->db->query('SELECT SUBSTRING(DiaHora,6) FROM Agenda WHERE DiaHora LIKE "______15/01/2015%" ');
			//$this->db->query('SELECT DiaHora FROM Agenda ');
			return $this->db->get()->result_array();
		}
		
		function getcitesdianum($diaavui) {
			
			// SELECT MID(DiaHora,6) FROM Agenda
			//SELECT COUNT(a) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE '______24/01/2015%') as b
			//SELECT  SUBSTRING(DiaHora,6) FROM Agenda
			$query = $this->db->query('SELECT COUNT(a) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE "______$diaavui%") as b');
			//$this->db->select('MID(a,6)');
			//$this->db->from('SELECT DiaHora as a');
			//$this->db->from('Agenda');
			//$this->db->where('DiaHora');
			//$this->db->like('______24/01/2015%');
			
			return $this->db->get($query)->row();
		}
		
		function gettotescites() {
			$this->db->select('A.id_agenda,B.Nomfiscal,A.Asumpte,A.Nota');
			$this->db->from('Agenda as A ');
			$this->db->join('Clients as B','A.Client=B.Codi');
			//$this->db->where('Num_Client',$codi);
			return $this->db->get()->result_array();
		}
		
		

}
?>
