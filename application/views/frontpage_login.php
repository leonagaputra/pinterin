<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body">
                <form id="login_form" method="post" action="<?php echo $base_url?>index.php/main/do_login">
                    
                    <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Enter email" >
                    </div>
                    <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
                    </div>   
                    <div class="checkbox">
                        <div style="color:red; display: none;" id="login_gagal">Login Gagal</div>
                    </div>                
                    <button class="btn btn-default btn-success" onclick="press_login();return false;"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
            </div>
            <!--<div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>                        
                <p>Not a member? <a href="<?php echo $base_url; ?>index.php/main/signup">Sign Up</a></p>
                <p>Forgot <a href="<?php echo $base_url; ?>index.php/main/forgot">Password?</a></p>
            </div>-->
        </div>
    </div>
</div>