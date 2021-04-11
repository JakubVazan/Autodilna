<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
        class hlavni_controller extends CI_Controller {
            function construct()
            {
                parent :: __construct();
                $this->load->model('hlavni_model');
            }
            
            public function PrvniVypis()
            {
                $this->load->view('content/hlavni_view');
            }
        }    
?>