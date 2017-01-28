

<!-- Modal login -->
<div class="modal fade" id="myLogin" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:15px 50px;">
                <div class="login_err text-danger">

                </div>
                <form role="form">
                    <div class="form-group">
                        <label for="username"><span class="glyphicon glyphicon-envelope"></span> Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" id="psw" placeholder="Enter password">
                    </div>

                    <button type="button" onclick="login()" class="btn btn-success btn_err"><span class="glyphicon glyphicon-off"></span> Login </button>
                    <span id="load"></span>
                </form>
            </div>
            <div class="modal-footer">
                <button id="register_ftr" data-dismiss="modal" type="button" class="btn btn-danger btn-default pull-left"><span class="glyphicon glyphicon-lock"></span> Register</button>
                <span><a href="javascript:void(0)" id="forgot_pass" data-dismiss="modal">Forgot password?</a></span>

            </div>
        </div>
    </div>
</div>



<!-- Modal register user -->
<div class="modal fade" id="myRegistration" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Register</h4>
            </div>
            <div class="modal-body" style="padding:15px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                         <input type="text" class="form-control" id="user_name" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off" onblur="is_email_available()">
                    </div>
                    <div class="form-group">
                        <label for="phone"><span class="glyphicon glyphicon-phone"></span> Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Example: 03451234567" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="repassword"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm password">
                    </div>
                    <div class="succ">
                        <button onclick="register()" type="button" class="btn btn-success btn-block register"><span class="glyphicon glyphicon-off"></span> Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button id="login_ftr" type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-lock"></span> Login</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal Forgot password -->
<div class="modal fade" id="myforgot_pass" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-eye-open"></span> Recover Your Password</h4>
            </div>
            <div class="modal-body" style="padding:15px 50px;">
                <form role="form">

                    <div class="form-group">
                        <label for="useremail"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                        <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Enter email" autocomplete="off">
                    </div>

                    <div class="succ">
                        <button onclick="forget_password()" type="button" class="btn btn-success btn-block register"><span class="glyphicon glyphicon-off"></span> Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer fg-pass">

            </div>
        </div>
    </div>
</div>
<!-- popup alert advertisement  -->
