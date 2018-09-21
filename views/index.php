 <div class="form-section-div-child">
          <div class="row">
            <div class="col-md-12">
                <img src="<?php echo base_url('public/tema/img/loading.gif');?>" alt="" class="img-responsive iletisim-loading" style="display: none;">
                <form method="post" role="form" id="contact_form"  method="post"   class="form-class" onSubmit="return false">

                  <div class="form-group">  
                    <span class="fa fa-user mu-contact-icon"></span>              
                    <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('iletisimIsim');?>" name="ad" id="ad" required="">
                  </div>

                  <div class="form-group">  
                    <span class="fa fa-envelope mu-contact-icon"></span>              
                    <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('iletisimEmail');?>" name="mail" id="mail" required="">
                  </div>    

                  <div class="form-group"> 
                    <span class="fa fa-phone mu-contact-icon"></span>                
                    <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('iletisimTelefon');?>" name="tel" id="tel" required="">
                  </div>
                   <input name="firmaMail" type="hidden" class="textbox" value="<?php echo $footerAdres->iletisimMail ?>" >
                  <div class="form-group">
                    <span class="fa fa-pencil-square-o mu-contact-icon"></span> 
                    <textarea class="form-control" placeholder="<?php echo $this->lang->line('iletisimMesaj');?>" name="mesaj" id="mesaj" required=""></textarea>
                  </div>
                  <button type="submit" class="gonder-butonu" id="gonder_button"><span><?php echo $this->lang->line('iletisimButton');?></span></button>
                    </form>
            </div>
          </div>
        </div>