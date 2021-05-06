<?php
defined('BASEPATH') OR exit ('No direct script acces allowed');


class Controller extends CI_Controller
{
   public function __construct() {
      parent::__construct();
      $this->load->library('ion_auth');
      $this->load->model('Model');
      $this->load->view('pages/header');

      if(!$this->ion_auth->logged_in())$this->load->view('pages/menu'); //když nejsem přihlášen ->menu
      else if($this->ion_auth->logged_in() && $this->ion_auth->is_admin())$this->load->view('pages/menu_admin'); //když jsem přihlášen a jsem admin ->menu_admin
   }

   
  public function index()
  {
    if(!$this->ion_auth->logged_in())
    {
         $this->load->view("pages/home");
    }

    else if($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
    {
     $data["vypis_zamestnanci"] = $this->Model->vypis_zamestnanci(); 
     $this->load->view("pages/zamestnanci", $data);
    }

  }
 

     public function zamestnanci()  
     {    
           $this->load->library('form_validation');  
           $this->form_validation->set_rules("jmeno", "jméno", 'required');  
           $this->form_validation->set_rules("prijmeni", "příjmení", 'required');  

           if($this->form_validation->run())  
           {  
                $data = array(  
                     "jmeno"     =>$this->input->post("jmeno"),  
                     "prijmeni"  =>$this->input->post("prijmeni"));  

                if($this->input->post("update"))  
                {  
                     $this->Model->update_data($data, $this->input->post("hidden_id"));  
                     redirect(base_url() . "upraveno");  
                }

                if($this->input->post("insert"))  
                {  
                     $this->Model->insert_data($data);  
                     redirect(base_url() . "vlozeno");  
                }  
           }  
           else  
           {    
               $data["vypis_zamestnanci"] = $this->Model->vypis_zamestnanci(); 
                $this->load->view("pages/zamestnanci", $data);    
           }  
     }  
     
      public function inserted()  
      {  
          $data["vypis_zamestnanci"] = $this->Model->vypis_zamestnanci(); 
          $this->load->view("pages/zamestnanci", $data);    
      }  

      public function delete_data(){  
           $id = $this->uri->segment(3);  
           $this->Model->delete_data($id);  
           redirect(base_url() . "odstraneno");  
      }  

      public function deleted()  
      {  
        $data["vypis_zamestnanci"] = $this->Model->vypis_zamestnanci(); 
        $this->load->view("pages/zamestnanci", $data);    
      }

      public function update_data(){  
           $user_id = $this->uri->segment(3);  
           $data["user_data"] = $this->Model->fetch_single_data($user_id);  
           $data["vypis_zamestnanci"] = $this->Model->vypis_zamestnanci(); 
           $this->load->view("pages/zamestnanci", $data);  
      }  
      
      public function updated()  
      {  
          $data["vypis_zamestnanci"] = $this->Model->vypis_zamestnanci(); 
          $this->load->view("pages/zamestnanci", $data);    
      }  


     
     public function zakaznici()
     {
          $this->load->library('form_validation');  
           $this->form_validation->set_rules("jmeno", "jmeno", 'required');  
           $this->form_validation->set_rules("prijmeni", "prijmeni", 'required');
           $this->form_validation->set_rules("adresa", "adresa");  
           $this->form_validation->set_rules("telefon", "telefon");
           $this->form_validation->set_rules("email", "email");

           if($this->form_validation->run())  
           {  
                $data = array(  
                     "jmeno"     =>$this->input->post("jmeno"),  
                     "prijmeni"  =>$this->input->post("prijmeni"),
                     "adresa"    =>$this->input->post("adresa"),  
                     "telefon"   =>$this->input->post("telefon"),  
                     "email"     =>$this->input->post("email"));  

                     if($this->input->post("update"))  
                     {  
                          $this->Model->update_data_zakaznici($data, $this->input->post("hidden_id"));  
                          redirect(base_url() . "upraveno_zakaznici");  
                     }
     
                     if($this->input->post("insert"))  
                     {  
                          $this->Model->insert_data_zakaznici($data);  
                          redirect(base_url() . "vlozeno_zakaznici");  
                     }  
                }  
                else  
                {    
                     $data["vypis_zakaznici"] = $this->Model->vypis_zakaznici(); 
                     $this->load->view("pages/zakaznici", $data);    
                }  
          }  
          
           public function inserted_zakaznici()  
           {  
               $data["vypis_zakaznici"] = $this->Model->vypis_zakaznici(); 
               $this->load->view("pages/zakaznici", $data);    
           }  
           
           public function delete_data_zakaznici()
           {  
                $id = $this->uri->segment(3);  
                $this->Model->delete_data_zakaznici($id);  
                redirect(base_url() . "odstraneno_zakaznici");  
           }  
     
           public function deleted_zakaznici()  
           {  
               $data["vypis_zakaznici"] = $this->Model->vypis_zakaznici(); 
               $this->load->view("pages/zakaznici", $data);    
           }
     
           public function update_data_zakaznici()
           {  
               $user_id = $this->uri->segment(3);    
               $data["user_data"] = $this->Model->vypis_jeden_zakaznik($user_id);  
               $data["vypis_zakaznici"] = $this->Model->vypis_zakaznici(); 
               $this->load->view("pages/zakaznici", $data);   
           }  
           
           public function updated_zakaznici()  
           {  
               $data["vypis_zakaznici"] = $this->Model->vypis_zakaznici(); 
               $this->load->view("pages/zakaznici", $data);    
           }  

          
     
     public function opravy()
     {
          $this->load->library('form_validation');
          $this->form_validation->set_rules("majitel", "majitel", 'required');  
          $this->form_validation->set_rules("spz", "spz");
          $this->form_validation->set_rules("zamestnanec", "zamestnanec");

          if($this->form_validation->run())  
           {  
                $data = array(  
                     "datum"     =>$this->input->post("datum"),
                     "majitel"   =>$this->input->post("majitel"),
                     "spz"       =>$this->input->post("spz"),
                     "typ"       =>$this->input->post("typ"),
                     "znacka"    =>$this->input->post("znacka"),
                     "dil"       =>$this->input->post("dil"),
                     "zamestnanec"=>$this->input->post("zamestnanec"),
                     "cena"      =>$this->input->post("cena"));  

                if($this->input->post("update"))  
                {  
                     $this->Model->update_data_opravy($data, $this->input->post("hidden_id"));  
                     redirect(base_url() . "upraveno_opravy");  
                }

                if($this->input->post("insert"))  
                {  
                     $this->Model->insert_data_opravy($data);  
                     redirect(base_url() . "vlozeno_opravy");  
                }  
           }  
           else  
           {    
               $data["vypis_opravy"] = $this->Model->vypis_opravy(); 
                $this->load->view("pages/opravy", $data);    
           }
     }

     public function delete_data_opravy()
     {  
          $id = $this->uri->segment(3);  
          $this->Model->delete_data_opravy($id);  
          redirect(base_url() . "odstraneno_opravy"); 
     }   
          
     public function deleted_opravy()  
     {  
          $data["vypis_opravy"] = $this->Model->vypis_opravy(); 
          $this->load->view("pages/opravy", $data);    
     }

     public function update_data_opravy()
     {  
          $user_id = $this->uri->segment(3);    
          $data["user_data"] = $this->Model->vypis_jedna_oprava($user_id);  
          $data["vypis_opravy"] = $this->Model->vypis_opravy(); 
          $this->load->view("pages/opravy", $data);   
     }

     public function updated_opravy()  
     {  
          $data["vypis_opravy"] = $this->Model->vypis_opravy(); 
          $this->load->view("pages/opravy", $data);    
     }

     public function inserted_opravy()  
           {  
               $data["vypis_opravy"] = $this->Model->vypis_opravy(); 
               $this->load->view("pages/opravy", $data);    
           }
     
}
