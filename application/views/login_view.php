<!DOCTYPE html>
<html lang="en">
<head>
	<title>Morena</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url('assets')?>/login/images/logo_admin_morena.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/login/css/main.css">
<!--===============================================================================================-->
    <style>
    .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    }

    .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    }

    .closebtn:hover {
    color: black;
    }
    </style>
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('<?=base_url('assets')?>/login/images/background-login.png');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="<?=base_url('index.php/login/aksi_login')?>" method="post">
				<span class="login100-form-title p-b-37">
                    MORENA
				</span>
                <?php
                if($this->session->flashdata('mesg') == "true") {
                ?>
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Login Gagal</strong><br> Username atau Password salah !
                </div>
                <?php
                }
                ?>
                    <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                        <input class="input100" type="password" name="password" placeholder="password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Morena &copy; 2021, Design By IT Infomedia Malang
					</span>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url('assets')?>/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url('assets')?>/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets')?>/login/js/main.js"></script>

</body>
</html>