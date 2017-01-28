<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
        <h1>Contact Us</h1>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->
<?php $settings =  $this->session->userdata('settings'); ?> <!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">
            <!-- start contact form -->
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3>GET IN TOUCH</h3>
                        <div class="divider"></div>
                        <ul class="contactDetails">
                            <li><img src="<?= base_url('assets/') ?>images/icon-mail.png" alt="" /><?= settings('top_email'); ?></li>
                            <li><img src="<?= base_url('assets/') ?>images/icon-phone.png" alt="" /><?= settings('top_phone'); ?></li>
                            <li><img src="<?= base_url('assets/') ?>images/icon-pin.png" alt="" /><?= ucfirst( settings('contact_address') ); ?></li>
                        </ul>
                        <div class="con_msg"></div>
                        <form  method="post" action="#" id="contact_agent">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="formBlock">
                                        <label for="user_name">Your Name</label><br>
                                        <input type="text" value="" name="user_name" id="user_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="formBlock">
                                        <label for="email_id">Your Email</label><br>
                                        <input type="text" value="" name="email_id" id="email_id">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="formBlock">
                                        <label for="user_message">Your Message</label><br>
                                        <textarea name="user_message" id="user_message" class="formDropdown"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="formBlock " id="captcha">
                                        <label for="v_captcha">Verify Code</label><br>
                                        <input type="text" name="captcha_code" placeholder="Place code here" class="form-control captcha_code">
                                        <?= $data['captcha']['image'] ?><a href="javascript:void (0)" onclick="refresh_captcha()"><span> <i class="glyphicon glyphicon-refresh"></i></span></a>
                                    </div>
                                </div>
                                <div id="cus" class="col-lg-3  col-md-4  col-sm-4 " data-value="cu">
                                    <div class="formBlock">
                                        <button type="button" onclick="contact_agent()" class="btn btn-success">SEND  <i class="glyphicon glyphicon-send"></i> </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                        <br>
                    </div>
                    <!-- col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end contact form -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end main content -->
