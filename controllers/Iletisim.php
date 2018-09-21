<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iletisim extends MY_Controller {

	function __construct()
	{
			  parent::__construct();
			  $this->load->model("Mesaj_model","mesaj");
			  $config = Array(
		        'protocol' => '***',
		        'smtp_host' => '**',
		        'smtp_port' => **,
		        'smtp_user' => '***',
		        'smtp_pass' => '***?',
		        'mailtype'  => 'html',
		        'wordwrap'  => TRUE,
		        'charset'   => 'utf-8'
		       );
		      $this->load->library('email', $config);
     
	}






  public function gonder(){  
              

		                $tarih=date('d.m.y');
			  	        $mesaj = array('ad'    => $this->input->post("ad",TRUE),
			  	                     'konu'=>$this->input->post("tel",TRUE),
								     'mail'  => $this->input->post("mail",TRUE) ,
								     'mesaj' => $this->input->post("mesaj",TRUE),
								     'durum' => 0,
								     'Tarih'=>$tarih
								   );


						
		               $this->email->set_newline("\r\n");
                      

				
					  $this->email->from($this->input->post("email",TRUE),$this->input->post("ad",TRUE));
					  $this->email->to($this->input->post("firmaMail",TRUE));
					  $this->email->subject("İletişim Formu");
					  $this->email->message($this->input->post("mesaj",TRUE));
		              $this->load->model("panel/mesaj_model","mesaj");


				if($this->email->send()){
					if($this->mesaj->mesaj_gonder($mesaj)){
						redirect('iletisim');
					}
					if(!$this->email->send()){
						            var_dump($this->email->print_debugger());
						         }
				}
				else{
					
					
					redirect('iletisim');
				}

	}
	

  }
?>