<?php

class Model extends CI_model

{
    public function __construct() {
        parent::__construct();
    }


    function insert_data($data)  
    {  
         $this->db->insert("zamestnanci", $data);  
    }  
    public function vypis_zamestnanci()  
    {  
         $query = $this->db->query("SELECT * FROM zamestnanci ORDER BY id ASC");  
         return $query->result();  
    }  
    function delete_data($id)
    {  
         $this->db->where("id", $id);  
         $this->db->delete("zamestnanci");   
    }  
    function fetch_single_data($id)  
    {  
         $this->db->where("id", $id);  
         $query = $this->db->get("zamestnanci");  
         return $query;   
    }  
    function update_data($data, $id)  
    {  
         $this->db->where("id", $id);  
         $this->db->update("zamestnanci", $data);  
    }  




    function update_data_zakaznici($data, $id)  
    {  
         $this->db->where("idmajitele", $id);  
         $this->db->update("majitele", $data);  
    }  
    public function vypis_zakaznici()  
    {   
         $query = $this->db->query("SELECT * FROM majitele ORDER BY idmajitele ASC");  
         return $query->result();  
    }  
    function insert_data_zakaznici($data)  
    {  
         $this->db->insert("majitele", $data);  
    }  
    function vypis_jeden_zakaznik($id)  
    {  
         $this->db->where("idmajitele", $id);  
         $query = $this->db->get("majitele");   
         return $query; 
    }  

     function delete_data_zakaznici($id)
     {  
          $this->db->where("idmajitele", $id);  
          $this->db->delete("majitele");  
     }  



     function vypis_opravy()
     {
          $query = $this->db->query("SELECT * FROM opravy ORDER BY ID ASC");  
         return $query->result();  
     }

     function delete_data_opravy($id)
     {  
          $this->db->where("ID", $id);  
          $this->db->delete("opravy");  
     }

     function vypis_jedna_oprava($id)  
    {  
         $this->db->where("id", $id);  
         $query = $this->db->get("opravy");  
         return $query;   
    }

    function update_data_opravy($data, $id)  
    {  
         $this->db->where("ID", $id);  
         $this->db->update("opravy", $data);  
    }

    function insert_data_opravy($data)  
    {  
         $this->db->insert("opravy", $data);  
    } 




}

