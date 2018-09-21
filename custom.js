$(document).ready(function(){

  baseUrl = $('base')[0].href;
$("#contact_form").validate({
        rules: {
            ad: "required",
            ad:{
                required: true,
                minlength: 3
            },
            mail:{
                required: true,
                email: true
            },
             tel:{
                required: true,
                digits: true
            },
            mesaj:{
                required: true
            }
        },
        messages: {
            ad: "Lütfen adınızı ve soyadınızı giriniz.",
            ad: {
                required: "Lütfen adınızı ve soyadınızı giriniz.",
                minlength: "En az 3 karakter giriniz."
            },
            mail: {
                required:"Lütfen geçerli E-Posta adresi giriniz.",
                email: "Lütfen geçerli E-Posta adresi giriniz."
            },
            tel: {
                required: "Lütfen telefon numaranızı giriniz.",
                digits:"Lütfen sayı giriniz."
            },
            mesaj: {
                required: aciklamaRequired
            }
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            error.addClass("help-block");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });
$('#contact_form').submit(function(e){
            //Gönderi formunu gerçekten durdur
            e.preventDefault();
            
            //Form geçerliliğini geçtiyse burayı kontrol edebilmek istiyorum
            if( $(this).valid() ) {
               
                 $('.iletisim-loading').css('display','block');
                 $('#contact_form').css('display','none');
                 // Formu gerçekten bırakmayı durdur
                 // İsteği gönder
                  var response = $.ajax({
                      type: "POST",
                      url: baseUrl+"iletisim/gonder/",
                      data: $(contact_form).serialize(),
                      success: function(){
                           $( "input[name$='ad']" ).val("");
                           $( "input[name$='tel']" ).val("");
                           $( "input[name$='mail']" ).val("");
                           $( "textarea[name$='mesaj']" ).val("");

                            $('.iletisim-loading').css('display','none');
                            $('#contact_form').css('display','block');

                           swal({
                              title: "Başarılı",
                              text: "Mesajınız başarılı bir şekilde gönderilmiştir.",
                              icon: "success",
                            });
                      },
                      error: function(){
                            $('.iletisim-loading').css('display','none');
                            $('#contact_form').css('display','block');
                            swal({
                              title: "Hata",
                              text: "Mesajınız gönderilememiştir.",
                              icon: "warning",
                            });
                      }
                  }).responseText;
                   return false;
              
            }
        });





});
