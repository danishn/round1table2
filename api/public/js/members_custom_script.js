var loading=$('#loading');

var header=$('.content-header h1');

var breadcrumb=$('.breadcrumb');

var table_container=$('#table_container');

var modal_container=$('');

var mem_container=$('#members_container');

var modal_image=$('#modal_image');

var myMembers=[];

var myTables=[];


/*	local server variables 

var hostUrl="http://localhost/rtn";	

var imageUrl="http://localhost/rrn/api/public";				

var tableListAPI=hostUrl+"/api/table/get_all";

var searchListAPI=hostUrl+"/api/member/search";

var logoutAPI=hostUrl+"/api/members_panel/logout";

var myDetailsAPI=hostUrl+"/api/members_panel/get_my_profile";

var ApiKey="1234";*/


var hostUrl="http://roundtablenepal.esy.es";	

var imageUrl="http://roundtablenepal.esy.es/api/public";				

var tableListAPI=hostUrl+"/api/table/get_all";

var searchListAPI=hostUrl+"/api/member/search";

var logoutAPI=hostUrl+"/api/members_panel/logout";

var myDetailsAPI=hostUrl+"/api/members_panel/get_my_profile";

var ApiKey="1234";

	//$(document).ready(function(){

		function ready(){

		var viewportHeight=$(window).height();

		containerHeight=viewportHeight-134;

		if(containerHeight<100){

			containerHeight=100;

		}

		//alert(containerHeight);

		table_container.css('height',containerHeight+'px');

		get_table_data();

		get_my_data();

		

		/* $('#my_table').html(myTables[memb.table_id-1].table_code);

		$('#dropdown_table_code').html(myTables[memb.table_id-1].table_code); */

		var popOverSettings = {

			placement: 'right',

			container: 'body',

			html: true,

			trigger:'hover',

			selector: '[rel="popover"]', //Sepcify the selector here

			content: function () {

				return $($(this).data('popwrapper')).html();

			}

		}

		$('#table_container').on('click','.ajax_call',function(event){

			event.preventDefault();

			myUrl=this.href;

			ch="get_members";

			var $this = $(this);

			var id = $(this).attr('table_id');

			loading.show();

			$this.parent().parent().find('li').removeClass('active');

			$this.parent().addClass('active');

			myAjax(myUrl,ch,id);

		});

		$('body').popover(popOverSettings);

				

		//$("html").niceScroll();

		$("#table_container").niceScroll({cursorcolor:"47585F"});

		

		$('.wrapper').hide().show(0);

		

		mem_container.on('click','.gv_info-box-magnify',function(event){

			id=$(this).attr('id');

			render_modal(id);

		});

		

//	});

	}

	function get_table_members(table_id){

		ch="get_members";

		myUrl=hostUrl+'/api/table/'+table_id+'/get_members';

		myAjax(myUrl,ch,table_id-1);

	}

	function nice_scroll(){

		

		$("html").niceScroll();

		$("#table_container").niceScroll({cursorcolor:"#00F"});

	}

	

	

	function get_table_data(){

		ch="get_tables";

		id=null;

		myAjax(tableListAPI,ch,id);

		

	}

	function get_my_data(){

		ch="get_me";

		id=null;

		myAjax(myDetailsAPI,ch,id);

		

	}

	

	function myAjax(myUrl,ch,id){

		$.ajax({

		url:myUrl,

		type:"GET",

		datatype:'json',

		success:function(result){

			if(ch=="get_tables")

				render_table(result);

			if(ch=="get_members")

				render_members(result,id);

			if(ch=="get_me")

				render_my_profile(result);

			loading.hide();

		},

		error:function(){

			loading.hide();

			alert("something went wrong")

		},

		beforeSend:setHeader

		});	

	}

	function setHeader(xhr){

		xhr.setRequestHeader('Api-Key',ApiKey);

	}

	$('#search_form').submit(function(event){

		event.preventDefault();

		//var myurl=$(this).attr('action');

		myurl=searchListAPI;

		var postData=$(this).serialize();

		var mymethod="POST";

		loading.show();

		ch="search";

		myAjaxForm(myurl,postData,mymethod,ch);

	});

	

	 $('#sign_out_form').on('submit',function(event){

	event.preventDefault();

	var postData=null;

	var myurl=logoutAPI;

	var mymethod="GET";

	ch="logout";

	myAjaxForm(myurl,postData,mymethod,ch);

	});

		function myAjaxForm(myurl,postData,mymethod,ch){

		$.ajax({

			url:myurl,

			data:postData,

			datatype:'json',

			method:'POST',

			success:function(result){

				loading.hide();

				if(ch=="search")

					render_search(result);

				if(ch=="logout")

					window.location=hostUrl;

			},

			error:function(){

				alert("something went wrong");

			},

			beforeSend:setHeader

		});

	}

	

	function render_table(result){

		console.log(result.success);

			if(result.success=="true")

			{

				console.log(result.data.table_list.length);

				for(i=0;i<result.data.table_list.length;i++)

				{

					var table=result.data.table_list[i];

					

					var temp={};

					temp.table_id=table.table_id;

					temp.table_name=table.table_name;

					temp.table_code=table.table_code;

					temp.table_description=table.table_description;

					temp.table_big_url=table.table_big_url;

					temp.table_thumb_url=table.table_thumb_url;

					temp.table_members=table.table_members;

				

					myTables[i]=temp;

					var table_id=i;

					myImageUrlTemp=table.table_big_url.replace('.jpg','.png');

					myImageUrl=myImageUrlTemp.replace('/big','/big/table_transparent');

					table_container.append("<li data-popwrapper='#"+table.table_code+".imagepop' rel='popover' data-trigger='focus'><a href='/api/table/"+table.table_id+"/get_members' table_id="+table_id+" class=ajax_call><div class='pull-left image'><img src='"+hostUrl+myImageUrl+"' class='table_logo' alt='"+table.table_code+"' style='height:45px;'/></div><span>&nbsp;"+table.table_code+"<br><small class='label pull-right bg-red'>"+table.table_members+"</small></span><div style='width:150px;position:fixed; text-align:center' class='imagepop text-center' style='margin-left:10px' id='"+table.table_code+"'><img src='"+hostUrl+myImageUrl+"' style='text-align:center' height=160px/><h4>"+table.table_name+"</h4></div></a></li>");

					

						

				}

				$(".imagepop").css("display","none");

				get_table_members(1);



			}



			

	}

	function render_my_profile(result){

		console.log(result.success);

			if(result.success=="true")

			{
				
				
				memb=result.data;console.log(memb.member_id);
				if(memb.member_id){
					memb=result.data;
	
				}
				else{
					memb=result.data.updated_info;

				}
				$('#my_member_id').val(memb.member_id);

				$('#my_table_id').val(memb.table_id);

				$('#my_fname').val(memb.fname);

				$('#my_lname').val(memb.lname);

				$('#dropdown_name').html(memb.fname+" "+memb.lname);

				if(memb.gender="male"){

					$('#my_gender_male').attr('checked','checked');

				}

				else{

					$('#my_gender_female').attr('checked','checked');

				}

				$('#my_mobile').val(memb.mobile);

				$('#my_email').val(memb.email);

				$('#menu_bar_email').html(memb.email);

				$('#'+memb.blood_group).attr('selected','selected');

				$('#my_spouse_name').val(memb.spouse_name);

				$('#my_dob').val(memb.dob);

				$('#my_spouse_dob').val(memb.spouse_dob);

				$('#my_anniversary_date').val(memb.anniversary_date);

				$('#my_image').attr('src',hostUrl+"/"+memb.image_big_url);

				$('#profile_pic1').attr('src',hostUrl+"/"+memb.image_big_url);

				$('#profile_pic2').attr('src',hostUrl+"/"+memb.image_big_url);

				$('#my_res_phone').val(memb.res_phone);

				$('#my_office_phone').val(memb.office_phone);

				$('#my_designation').val(memb.designation);

				$('#my_res_city').val(memb.res_city);

				$('#my_office_city').val(memb.office_city);

				$('#my_state').val(memb.state);	



			}else

			{

				window.location=hostUrl;

			}



			

	}



	function render_members(result,id){

		

		console.log(result.success);

		mem_container.empty();

		var table=myTables[id].table_name;

		var count=myTables[id].table_members;

		var table_code=myTables[id].table_code;

		if(count==1){

			header.html(table+'<small>'+count+' Member</small>');

		}else{

			header.html(table+'<small>'+count+' Members</small>');

		}

		

		breadcrumb.html("<li class='active'><a href='#'><i class='fa fa-dashboard'></i>"+table_code+"</a><li>");
        
		if(result.success=="true")

		{

			//mem_container.empty();

			for(i=0;i<result.data.members_list.length;i++)

			{

				var memb=result.data.members_list[i];



				var temp={};

				temp.member_id=memb.member_id;

				temp.table_id=memb.table_id;

				temp.fname=memb.fname;

				temp.lname=memb.lname;

				temp.gender=memb.gender;

				temp.mobile=memb.mobile;

				temp.email=memb.email;

				temp.blood_group=memb.blood_group;

				temp.spouse_name=memb.spouse_name;

				temp.dob=memb.dob;

				temp.spouse_dob=memb.spouse_dob;

				temp.anniversary_date=memb.anniversary_date;

				temp.image_thumb_url=memb.image_thumb_url;

				temp.image_big_url=memb.image_big_url;

				temp.res_phone=memb.res_phone;

				temp.office_phone=memb.office_phone;

				temp.designation=memb.designation;

				temp.res_city=memb.res_city;

				temp.office_city=memb.office_city;

				temp.state=memb.state;	

				

				myMembers[i]=temp;



				var str="<div class=' col-md-4 col-sm-6 col-xs-12'><div class='gv_info-box'><span class='open_modal gv_info-box-icon bg-light-gray'><img src='"+hostUrl+memb.image_big_url+"' class='img-circle' alt='User Image'/></span><div class='gv_info-box-content'><a id="+i+" class='btn gv_info-box-magnify bg-light-gray' data-toggle='modal' data-target='#view_modal'><i class='fa fa-search'><br></i></a><span class='gv_info-box-number'>"+memb.fname+" "+memb.lname+"</span><span class='gv_info-box-text'>"+memb.email+"</span><span class='gv_info-box-text'>"+memb.mobile+"</span><span class='gv_info-box-label pull-right'></span></div></div></div>";

				

				
				mem_container.append(str);

			}

		}

		else

		{

			mem_container.html('<h4>No Members found</h4>');

		}		

	}

	

	

	

	function render_search(result){

		

		console.log(result.success);

		

		//var table=myTables[id].table_name;

		//var count=myTables[id].table_members;

		//var table_code=myTables[id].table_code;

		//if(count==1){

			header.html('Search Result<small>0 Members</small>');

		//}else{

		//	header.html(table+'<small>'+count+' Members</small>');

		//}

		

		//breadcrumb.html("<li class='active'><a href='#'><i class='fa fa-dashboard'></i>"+table_code+"</a><li>");

		if(result.success=="true")

		{

			mem_container.empty();

			header.html('Search Result<small>'+result.data.members_list.length+' Members</small>');

			for(i=0;i<result.data.members_list.length;i++)

			{

				var memb=result.data.members_list[i];



				var temp={};

				temp.member_id=memb.member_id;

				temp.table_id=memb.table_id;

				temp.fname=memb.fname;

				temp.lname=memb.lname;

				temp.gender=memb.gender;

				temp.mobile=memb.mobile;

				temp.email=memb.email;

				temp.blood_group=memb.blood_group;

				temp.spouse_name=memb.spouse_name;

				temp.dob=memb.dob;

				temp.spouse_dob=memb.spouse_dob;

				temp.anniversary_date=memb.anniversary_date;

				temp.image_thumb_url=memb.image_thumb_url;

				temp.image_big_url=memb.image_big_url;

				temp.res_phone=memb.res_phone;

				temp.office_phone=memb.office_phone;

				temp.designation=memb.designation;

				temp.res_city=memb.res_city;

				temp.office_city=memb.office_city;

				temp.state=memb.state;	

				

				myMembers[i]=temp;



				var str="<div class=' col-md-4 col-sm-6 col-xs-12'><div class='gv_info-box'><span class='open_modal gv_info-box-icon bg-light-gray'><img src='"+hostUrl+memb.image_big_url+"' class='img-circle' alt='User Image'/></span><div class='gv_info-box-content'><a id="+i+" class='btn gv_info-box-magnify bg-light-gray' data-toggle='modal' data-target='#view_modal'><i class='fa fa-search'><br></i></a><span class='gv_info-box-number'>"+memb.fname+" "+memb.lname+"</span><span class='gv_info-box-text'>"+memb.email+"</span><span class='gv_info-box-text'>"+memb.mobile+"</span><span class='gv_info-box-label pull-right'>"+myTables[memb.table_id-1].table_code+"</span></div></div></div>";

				

				mem_container.append(str);

				/* removed ---

				<span class='gv_info-box-label label bg-red'>"+memb.blood_group+"</span> */

			}

		}

		else

		{

			mem_container.html('<h4>No Members found</h4>');

		}		

	}



	function render_modal(id){



				int_id=parseInt(id);

				var memb=myMembers[int_id];

				

				$('#table').html(myTables[memb.table_id-1].table_code);

				$('#name').html(memb.fname+" "+memb.lname);

				$('#gender').html(memb.gender);

				$('#mobile').html(memb.mobile);

				$('#email').html(memb.email);

				$('#blood_group').html(memb.blood_group);

				$('#spouse_name').html(memb.spouse_name);

				$('#dob').html(memb.dob);

				$('#spouse_dob').html(memb.spouse_dob);

				$('#anniversary_date').html(memb.anniversary_date);

			//	$('#').html()=memb.image_thumb_url;

			//	$('#').html()=memb.image_big_url;

				$('#res_phone').html(memb.res_phone);

				$('#office_phone').html(memb.office_phone);

				$('#designation').html(memb.designation);

				$('#office_city').html(memb.res_city);

				$('#').html(memb.office_city);

				$('#state').html(memb.state);

				$('#profile_pic').attr('src',hostUrl+memb.image_big_url);				



	}



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



		$("#edit_form").on('submit',(function(e) {

			e.preventDefault();

			if($("#edit_form").valid()){

			$('#loading').show();

			 var form_data = new FormData(this);

			$.ajax({

				url: "http://roundtablenepal.esy.es/api/member/edit_profile", 

				type: "POST",      	

				data:form_data,

				contentType: false,       

				cache: false,             

				processData:false,        

				success: function(data)   

				{

					$('#loading').hide();

					if(data.success=="true"){

					alert("Profile Updated Successfully");	

					//render_my_profile(data);

					}else{

					alert("Failed to Update Profile");

					}

				},

				beforeSend:setHeader

			});}

		}));

 



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

				letters:true

				},

				anniversary_date:{

				date:true				

				},

				spouse_dob:{

				date:true					

				},

				email:{

				required: true,

				email:true

				},

				office_city:{

				letters:true

				},

				office_phone:{

				digits:true	,

				minlength: 8

				},

				res_city:{

				required: true,	

				letters:true

				},

				res_phone:{

				digits:true	,

				minlength: 8

				},

				state:{

				required: true,

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

	//}



