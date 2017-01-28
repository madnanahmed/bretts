<!DOCTYPE html>
<html>

<!-- Mirrored from admin-plus.envato.ipv4.ro/dist/login-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2016 03:45:58 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>Admin Login</title>
  <!-- App CSS -->
  <link type="text/css" href="<?= base_url() ?>assets/admin/assets/css/style.min.css" rel="stylesheet">    
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/examples/css/morris.min.css"> <!-- CHART (morris)-->
  <!-- Google Font & Material Icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <script>
        <?php
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            echo "var base_url = 'http://localhost/pakland/';";
        }else{
            echo "var base_url = 'http://thepakland.com/';";
        }
        ?>
    </script>
  <script src="<?= base_url() ?>assets/admin/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/admin/assets/js/custom.js') ?>"></script>
</head>
<body>
  <div class="container m-t-3">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-primary center m-b-2">
              <i class="material-icons md-36"></i> <span class="icon-text">Admin login</span>
            </h2>
            <div class="card-group">
                <div class="card bg-transparent">
                    <div class="card-block">
                        <div class="center">
                            <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
                            <p class="text-muted">Access your account</p>
                        </div>
                        <?php
                        $email = $password = '';
                        $email = $this->session->flashdata('email');
                        $password = $this->session->flashdata('password');
                        if($this->session->flashdata('invalid_email')){
                            foreach($this->session->flashdata('invalid_email') as $value){
                                echo '<small class="text-danger">'. ucfirst( $value ).'</small>';
                            }
                        } ?>
                            <?php echo form_open('admin/login_process'); ?>
                            <div class="form-group">                                
                                 <?=
                                    form_input(
                                      array(
                                        'type' => 'email',
                                        'id' => 'email',
                                        'name' => 'email',
                                        'class' => 'form-control',
                                        'placeholder' => 'Email Address',
                                        'required' => 'required',
                                        'value'  => $email
                                      )
                                    );
                                  ?>
                            </div>
                            <div class="form-group">                                
                                 <?= 
                                    form_input(
                                      array(
                                        'type' => 'password',
                                        'id' => 'password',
                                        'name' => 'password',
                                        'class' => 'form-control',
                                        'placeholder' => 'Password',
                                        'required' => 'required',
                                        'value'   => $password
                                      )
                                    );
                                 ?>
                            </div>
                            <div class="center">                                
                                <?php
                                    $data = array(
                                      'name'    => 'button',
                                      'class'   => 'btn  btn-primary-outline btn-circle-large',
                                      'value'   => 'true',
                                      'type'    => 'submit',
                                      'content' => '<i class="material-icons"></i>Login'
                                    );                                
                                 echo form_button($data);
                                ?>
                            </div>
                            <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>

<!-- Mirrored from admin-plus.envato.ipv4.ro/dist/login-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2016 03:45:58 GMT -->
</html>