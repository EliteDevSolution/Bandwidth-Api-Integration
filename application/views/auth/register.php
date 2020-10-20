<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('header'); ?>
</head>
<!-- BEGIN PAGE bootstrap-toastr -->
<!-- END PAGE bootstrap-toastr -->

<body>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if (validation_errors()) : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-offset-4 col-md-3 reg-content">
                <div class="reg-header text-center">
                    <h1><a href="#" style="text-decoration: none;"><?php echo $this->lang->line("register_subtitle") ?></a></h1>
                </div>
                <div class="reg-body">
                <div class="form-group">
                    <h1></h1><br>
                </div>        
                <?php echo form_open(base_url().'user/user_add','id="regfrm",name="regfrm"');?>
                    <div class="form-group">
                            <label><?php echo "<font color='red'>*&nbsp;</font>".$this->lang->line("firstname") ?>:</label>
                            <input type="text" class="form-control" id="firstname" placeholder="<?php echo $this->lang->line("firstname_placeholder")?>"  
                            name="firstname" value="<?php echo set_value('firstname');?>" />

                            <label><?php echo "<font color='red'>*&nbsp;</font>".$this->lang->line("lastname")?>:</label>
                            <input type="text" class="form-control" id="lastname" placeholder="<?php echo $this->lang->line("lastname_placeholder") ?>" name="lastname"
                             value="<?php echo set_value('lastname');?>" />
                    </div>
                    <div class="form-group">
                            <label for="password"><?php echo "<font color='red'>*&nbsp;</font>".$this->lang->line("password")?>:</label>
                            <input type="password" class="form-control" id="password" placeholder="<?php echo $this->lang->line("password_placeholder") ?>" name="password"
                             value="<?php echo set_value('password');?>" />
                            <label for="confirm_password"><?php echo "<font color='red'>*&nbsp;</font>".$this->lang->line("confirm_pwd")?>:</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="<?php echo $this->lang->line("confirm_pwd_placeholder") ?>" name="confirm_password" value="<?php echo set_value('confirm_password');?>" />
                    </div>
                    <div class="form-group">
                            <label><?php echo "<font color='red'>*&nbsp;</font>".$this->lang->line("email")?>:</label>
                            <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line("email_placeholder") ?>" name="email" value="<?php echo set_value('email');?>" />
                            <label><?php echo $this->lang->line("phone") ?>:</label>
                            <input type="text" class="form-control" id="phone" placeholder="<?php echo $this->lang->line("phonenumber_placeholder") ?>" name="phone" 
                            value="<?php echo set_value('phone');?>" />
                    </div>

                   <!--
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="street"><?php echo $this->lang->line("street") ?>:</label>
                            <input type="text" class="form-control" id="street" placeholder="<?php echo $this->lang->line("street_placeholder") ?>" name="street">
                        </div>
                        <div class="col-md-6">
                            <label for="exterior"><?php echo $this->lang->line("exterior") ?>:</label>
                            <input type="text" class="form-control" id="exterior" placeholder="<?php echo $this->lang->line("exterior_placeholder") ?>" name="exterior">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="interior"><?php echo $this->lang->line("interior") ?>:</label>
                            <input type="text" class="form-control" id="interior" placeholder="<?php echo $this->lang->line("interior_placeholder") ?>" name="interior">
                        </div>
                        <div class="col-md-6">
                            <label for="colonia"><?php echo $this->lang->line("colonia") ?>:</label>
                            <input type="text" class="form-control" id="colonia" placeholder="<?php echo $this->lang->line("colina_placeholder") ?>" name="colonia">
                        </div>
                    </div>
                -->
                    <div class="form-group">
                        <a class="btn btn-primary pull-right cancel-btn" style="margin-top: 30px;margin-bottom: 30px;" id="cancel" href="<?php echo base_url() ?>login"><?php echo $this->lang->line("cancel") ?></a>
                        <a class="btn btn-primary login-btn pull-right register-btn" style="margin-top: 30px;margin-bottom:30px;" name="register" id="register"><?php echo $this->lang->line("register") ?></a>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('#login').click(function(){
            $('#is_warning').css({'display':'block', 'color': 'red'});
        });
        $('#register').click(function()
        {
            var password = $('#password').val();
            var confpassword = $('#confirm_password').val();
            var firstname = $('#firstname').val();
            var lastname = $("#lastname").val(); 
            var email = $('#email').val();  
            var phone = $('#phone').val();
            if(firstname == "")
            {
                toastr.error('Please enter firstname.');
                $('#firstname').focus();
                return;
            } else if(lastname == "")
            {
                toastr.error('Please enter lastname.');
                $('#lastname').focus();
                return;
            }
            else if(password == "")
            {
                toastr.error('Please enter password.');
                $('#password').focus();
                return;
            } else if(confpassword == "")
            {
                toastr.error('Please enter confirm_password.');
                $('#confirm_password').focus();
                return;
            } else if(password != confpassword)
            {
                toastr.error('Please enter the same value again.','Warning')
                $('#password').focus();
                return;
            } else if(email == "")
            {
                toastr.error('Please enter email address.');
                $('#email').focus();
                return;
            }  
            else
            {
                  $.ajax({
                    url: '<?php echo base_url() ?>user/user_add',
                    data: {'firstname':firstname,'lastname':lastname, 'password':password, 'email': email, 'password': password, 'phone':phone},
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.msg=='success') {
                            toastr.success('The operation was successful.', 'Notice');
                            setTimeout(function(){parent.location.href = '<?php echo base_url() ?>' + 'login';}, 2000);
                        }
                        else
                        {
                            toastr.error('The operation failed.', 'Error');
                            return;
                        }
                    }
                });
            }
        });

    });

</script>
</html>