<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Member
            <small>Control panel</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
          <div class="col-md-12">
				
		<div class="container-fluid">


 
 
 <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Member</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('__admin/member/add');?>" method="post" enctype="multipart/form-data" id="edit_form">
				<div class="box-body">

						<input type="hidden" name="member_id" id="my_member_id" value="">
						<input type="hidden" name="table_id" id="my_table_id" value="">
						<input type="hidden" name="designation" id="" value="-">
						  <table class="table table-bordered">
							<tr>
								<td colspan="2" rowspan="4">
								
								
								<img src="<?php echo base_url('public/images/big/members/default.jpg');?>" id="my_image" class="img-circle" height=130px width=130px alt="User Image" />
								<div id="output">
								</div>
								<input type='file' class="form-control" name="profile_image" id="image_input" />
								
								</td>
							</tr>
							<tr>
							 <th>Gender</th><td> <div class="form-group">
									<input type="radio" name="gender" class="minimal" id="my_gender_male" value="male" checked="checked" />&nbsp;Male
									<input type="radio" name="gender" class="minimal"id="my_gender_female"  value="female" />&nbsp;Female
								</div>
								</td>
							 </tr>
							 <tr>
							 <th>date of Birth</th><td ><div class="form-group"  style="width:160px">
					
									<div class="input-group input-append date" id="dp3" data-date="2012-12-02" data-date-format="yyyy-mm-dd">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
							  <input type="text" id="my_dob" data-date-format="yyyy/mm/dd" name="dob" class="form-control" />
							</div><!-- /.input group -->
						  </div><!-- /.form group --></td>
							 </tr>
							 <tr>
							 <th>Blood Group</th><td>
							 <select id="my_blood_group" class="selectpicker form-control" name="blood_group" style="width:160px">
										<option id="A+ve" value="A+ve">A+ve</option>
										<option id="AB+ve" value="A-ve">A-ve</option>
										<option id="B-ve" value="B+ve">B+ve</option>
										<option id="AB-ve" value="B-ve">B-ve</option>
										<option id="AB+ve" value="AB+ve">AB+ve</option>
										<option id="AB-ve" value="AB-ve">AB-ve</option>
										<option id="O+ve" value="O+ve">O+ve</option>
										<option id="O-ve" value="O-ve">O-ve</option>
									</select></td>
							 </tr>
							 <tr>
							 <th>First Name</th><td><input type="text" class="form-control" id="my_fname" name="fname" value=""></td>
							 <th>Mobile</th><td><input type="text" name="mobile" class="form-control" id="my_mobile" value=""></td>
							 </tr>
							 <tr>
							 <th>Last Name</th><td><input type="text" class="form-control" id="my_lname" name="lname" value=""></td>
							 <th>Table</th><td id="my_table">
							 <select id="my_blood_group" class="selectpicker form-control" name="table_id" style="width:160px">
							 <?php 
								foreach($table as $row){
									echo "<option value=".$row->getTableId().">".$row->getTableCode()."</option>";
								}
							 ?>
							 </td>
							 </tr>
							 <tr>
							 <th>Spouse Name</th><td ><input type="text" class="form-control" id="my_spouse_name" name="spouse_name" value=""></td><th>Anniversary Date</th><td ><div class="form-group" style="width:160px">
									  <div class="input-group input-append date" id="dp3" data-date="2012-12-02" data-date-format="yyyy-mm-dd">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
							  <input type="text" id="my_anniversary_date" data-date-format="yyyy/mm/dd" name="anniversary_date" class="form-control" />
							</div><!-- /.input group -->
						  </div><!-- /.form group --></td>
							 </tr>
							 <tr>
							 <th>Spouse DOB</th><td ><div class="form-group" style="width:160px">

									  <div class="input-group input-append date" id="dp3" data-date="2012-12-02" data-date-format="yyyy-mm-dd">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
							  <input type="text" id="my_spouse_dob" name="spouse_dob" data-date-format="yyyy/mm/dd" class="form-control" />
							</div><!-- /.input group -->
						  </div><!-- /.form group --></td>
						  <th>Email</th><td ><input type="text" class="form-control" name="email" id="my_email" value=""></td>
							 </tr>

							 <tr>
								<th>Office City</th><td ><input type="text" class="form-control" id="my_office_city" name="office_city" value=""></td><th>Office Phone</th><td ><input type="text" class="form-control" id="my_office_phone" name="office_phone" value=""></td>
							 </tr>
							 <tr>
								<th>Resident City</th><td ><input type="text" class="form-control" name="res_city" id="my_res_city" value=""></td>
								<th>Resident Phone</th><td><input type="text" class="form-control" id="my_res_phone" name="res_phone" value=""></td>
							 </tr>
							<tr>
							<th>State</th><td ><input type="text" class="form-control" name="state" id="my_state" value=""></td>
							</tr>
						  </table>
				<div class="pull-right">
					 <input type="submit" id="submit_btn"class="btn btn-primary" value="ADD"> &nbsp;<a href="#" class="btn btn-default">Cancel</a></form>
				</div>
              </div><!-- /.box -->

             
         
                    </div><!-- /.col-md-6 -->
                  </div><!-- /.row -->

				  	<script>
						$('#my_anniversary_date').datepicker();	
						$('#my_dob').datepicker();	
						$('#my_spouse_dob').datepicker();
						$('icon-arrow-right').addClass('glyphicon');

						$('icon-arrow-right').addClass('glyphicon-arrow-right');
						$('icon-arrow-left').addClass('glyphicon');

						$('icon-arrow-left').addClass('glyphicon-arrow-left');
						function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#my_image').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
 
	$('input[type=file]').change(function () {
		var val = $(this).val().toLowerCase();
		var regex = new RegExp("(.*?)\.(jpg|jpeg|png)$");
		var fsize = $('#image_input')[0].files[0].size;
			if(!(regex.test(val))) {
				$(this).val('');
				alert('Unsupported file');
			}
			if(fsize>1048576) {
				$(this).val('');
				alert('Too large File');
			}
	});
	$("#image_input").change(function(){
		readURL(this);
	});	 


$.validator.addMethod("letters", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
		}, "must contain only letters");
		
		$('#edit_form').validate({
			rules: {
				fname:{
				required: true,	
				letters:true
				},
				lname: {
				required: true,
				letters:true
				},
				dob:{
				required: true,	
				date:true				
				},
				mobile:{
				required: true,
				digits:true	,
				minlength: 10
				
				},
				spouse_name:{
				required: true,
				letters:true
				},
				anniversary_date:{
				required: true,
				date:true				
				},
				spouse_dob:{
				required: true,
				date:true					
				},
				email:{
				required: true,
				email:true
				},
				office_city:{
				required: true,
				letters:true
				},
				office_phone:{
				required: true,
				digits:true	,
				minlength: 8
				},
				res_city:{
				required: true,	
				letters:true
				},
				res_phone:{
				required: true,
				digits:true	,
				minlength: 8
				},
				state:{
				required: true,	
				minlength: 2,
				letters:true
				}
			},
			messages: {
				fname:{
				required: "please enter your First Name",	
				letters:"please enter Valid Name"
				},
				lname: {
				required: "please enter your Last Name",
				letters:"please enter Valid Name",
				},
				dob:{
				required: "please enter your DOB",	
				date:"please enter Valid DOB"				
				},
				mobile:{
				required: "please enter your Mob.no",
				digits:"please enter Valid Mob.no",
				minlength:"please enter Valid Mob.no"
				
				},
				spouse_name:{
				letters:"please enter Valid Name"
				},
				anniversary_date:{
				date:"please enter Valid Date"				
				},
				spouse_dob:{
				date:"please enter Valid Date"					
				},
				email:{
				required: "please enter your Email",
				email:"please enter Valid Email"
				},
				office_city:{
				letters:"please enter Valid City"
				},
				office_phone:{
				digits:"please enter Valid Phone.no",
				minlength:"please enter Valid Phone.no"
				},
				res_city:{
				required: "please enter Valid City"	,
				letters:"please enter Valid City"
				},
				res_phone:{	
				digits:"please enter Phone.no",
				minlength: "please enter Phone.no"
				},
				state:{
				required:"please enter State",	
				letters:"please enter State"
				}
			},
		});
	
						
					</script>