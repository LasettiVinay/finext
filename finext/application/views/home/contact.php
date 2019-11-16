 <link href="<?php echo base_url(); ?>assets/css/contactus.css" rel="stylesheet" type="text/css" media="all" />
<div class="container contactus">
                <div class="row">

                      <div class="contact-page-area ">
                        <div class="contact-informations">
                            <h3>Contact Info</h3>
                            <p></p>
                           <!--  <ul>
                                <li><i class="fa fa-phone" aria-hidden="true"></i> +91 8080000038</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> support@finext.in</li>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> Mon - Sat 10:00 AM to 6:00 PM</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> Money 300 , 2nd Floor , gali No 5, hyderabad.</li>
                            </ul> -->
                        </div>
                    
                    </div>   
                                   
                    <div class="col-lg-8 col-md-7 col-sm-8 col-md-offset-2 col-xs-12">                        
                        <div class="contact-page">
                           <!-- Google Map Start Here -->
                           <form class="cmxform" id="registerform" method="Post" action="<?php echo base_url()?>home/contact_form1">
                          <fieldset>
                            <div class=" col-md-6 col-sm-12 col-xs-12  ">
                              <div class="form-group">
                                <input type="text" name="name" class="form-control contact" placeholder="Name*" >
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="email" name="email" class="form-control contact" placeholder="E-mail*">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" name="mobile"  id="phone"class="form-control contact" maxlength="10" minlength="10" placeholder="You Phone*">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control contact" name="subject" placeholder="Subject*">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea cols="40" name="message" rows="10" class="textarea form-control" placeholder="Your Message"></textarea>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group acurate">
                                <button class="btn-send" name="submit" type="submit">Send Message</button>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                        </div>
                    </div>
                
            </div>
                 </div>


      <script>
            //validation===================================
            (function ($, W, D)
            {
              var JQUERY4U = {};
              JQUERY4U.UTIL =
              {
                setupFormValidation: function ()
                {
                  $("#registerform").validate({
                    rules: {
                      name: "required",
                      email: "required",
                      mobile: "required",
                      



                    },
                    messages: {
                      name: "Please  Enter First Name",
                      email: "Please  Enter Email",
                      mobile: "Please  Enter mobile number",

                    },
                    submitHandler: function (form) {

                      form.submit();
                    }
                  });
                }
              }
                //when the dom has loaded setup form validation rules
                $(D).ready(function ($) {
                  JQUERY4U.UTIL.setupFormValidation();
                });
            })(jQuery, window, document);
        </script>