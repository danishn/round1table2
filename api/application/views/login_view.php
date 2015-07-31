<html>

<head>

	<title>RTN Nepal</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="RTN Login" />

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
	<!--//webfonts-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/admin_AdminLTE.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/skins/admin_skin-green.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/admin_custom_style.css'); ?>" />
	<!--<link rel='stylesheet' type='text/css' href="<?php// echo base_url('public/css/form_style.css'); ?>" />-->

</head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><p>Admin Login</p></a>
      </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><img src="<?php echo base_url('public/admin_images/rtn_logo.jpg'); ?>" height="75px" ></p>
			<form id="login_form" action="#" method="post">
				<div class="form-group has-feedback">
            <input type="text" name="userName"class="form-control" placeholder="Username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
		  <div style="position:relative;height:1px"><img id="loading" class="text-center" style="display:none;position:absolute;left:45%;top:-9px; height:20px"; src="<?php echo base_url('public/admin_images/loading.gif'); ?>" style=" background-color:rgba(23,23,23,0); z-index:99999;">
		  <div class="row">
		  <div class="col-xs-10 col-md-offset-1 text-center">
             <p id="error" style="color:#FF0000"><p>
            </div><!-- /.col -->
		</div>
		</div>
		  
          <div class="row" style="margin-top:15px">
            <div class="col-xs-4 col-md-offset-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

	<!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>-->
	<script src="<?php echo base_url('public/js/jquery-2.1.3.min.js'); ?>"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>


	<script>
	var loginAPI="<?php echo base_url('__admin/authenticate'); ?>";
	var homePageUrl="http://localhost/rtn/members/";

	var loading=$('#loading');
	var error=$('#error');

	$('#login_form').submit(function(event){
		event.preventDefault();
		//var myurl=$(this).attr('action');
		myurl=loginAPI;
		var postData=$(this).serialize();
		var mymethod="POST";
		error.html('');
		loading.show();
		myAjaxForm(myurl,postData,mymethod);
	});
		function myAjaxForm(myurl,postData,mymethod){
		$.ajax({
			url:myurl,
			data:postData,
			datatype:'json',
			method:'POST',
			success:function(result){
				loading.hide();
				if(result.success=="true"){
					window.location=result.data.url;
				}
				else{
					error.html(result.error.msg);
				}
			},
			error:function(){
				loading.hide();
				alert("Internal Server ERROR! Please try after some time");
			},
		});
	}
	

	</script>

</body>

</html>
