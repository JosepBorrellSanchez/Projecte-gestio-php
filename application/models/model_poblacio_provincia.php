<?php
class model_poblacio_provincia extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //fill your contry dropdown
    public function getProvincias()
    {
        $this->db->select('idprovincia,provincia');
        $this->db->from('provincias'); 
        $query = $this->db->get();
         
         foreach($query->result_array() as $row){
            $provincias[$row['idprovincia']]=$row['provincia'];
        }
        return $provincias;
    }
    
//fill your cities dropdown depending on the selected city
    public function getPoblaciones($id_provincia)
    {
        $this->db->select('idpoblacion,poblacion');
        $this->db->from('poblaciones');
        $this->db->where('idprovincia',$id_provincia); 
        $query = $this->db->get();
         
        return $query;
    }
    
    public function getPostal($id_poblacion)
    {
        $this->db->select('postal');
        $this->db->from('poblaciones');
        $this->db->where('idpoblacion',$id_poblacion); 
        $query = $this->db->get();
         
        return $query->row('postal');
    }
    
}
