<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->    
<link rel="icon" type="image/png" href="<?= base_url(RECURSOS_LOGIN_IMG.'/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_VENDOR.'/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_FONTS.'/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_FONTS.'/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_VENDOR.'/animate/animate.css') ?>">
<!--===============================================================================================-->    
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_VENDOR.'/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_VENDOR.'/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_VENDOR.'/select2/select2.min.css') ?>">
<!--===============================================================================================-->    
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_VENDOR.'/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_CSS.'/util.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_LOGIN_CSS.'/main.css') ?>">
<!--===============================================================================================-->

<link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_PLUGINS.'/toastr/toastr.min.css') ?>">
</head>
<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				
				<?= form_open('registrar',['class'=>'login100-form validate-form', 'id'=>'','method'=>'post']) ?>
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<?php
						$attributtes = array (
							'name' => 'email',
							'class' => 'input100',
							'type' => 'email',
						);
						echo form_input($attributtes);
						?>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<?php
						$attributtes = array (
							'name' => 'pass',
							'class' => 'input100',
							'type' => 'password',
						);
						echo form_password($attributtes);
						?>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
						<?php
							$attributes = array(
								'name' => 'remember-me',
								'id'=>'ckb1',
								'class' => 'input-checkbox100',
								'value' => '1',
								'checked' => 'false'
							);
						
						echo form_checkbox($attributes);
						?>
						<label class="label-checkbox100" for="ckb1">
								Remember me
						</label>
							
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

			

					<div class="container-login100-form-btn">
						<?php
						$attributes = array(
							'name'=>'submit',  // Cambié el nombre para mayor claridad
							'class'=>'login100-form-btn',
							'type'=>'submit',  // Asegúrate de que sea un botón de tipo submit
							'value'=>'Login'
						);
						echo form_submit($attributes);
						?>
					</div>
										
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url(<?= base_url(RECURSOS_LOGIN_IMG.'/bg-01.jpg')?>);">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/bootstrap/js/popper.js') ?>"></script>
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/daterangepicker/moment.min.js') ?>"></script>
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_VENDOR.'/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?= base_url(RECURSOS_LOGIN_JS.'/main.js') ?>"></script>

<!-- TOASTR -->
<script src="<?= base_url(RECURSOS_ADMIN_PLUGINS.'/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url(RECURSOS_ADMIN_PLUGINS.'/toastr/toastr.min.js') ?>"></script>
<script>
  	<?= show_message() ?>
  	</script>


</body>
</html>