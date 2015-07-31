var loading=$('#loading');  //change it to #loading

var header=$('.content-header h1');

var breadcrumb=$('.breadcrumb');

var table_container=$('#table_container');

var modal_container=$('');

var main_container=$('#main_container');

var modal_image=$('#modal_image');

var myMembers=[];

var myTables=[];


/*
var hostUrl="http://localhost/rtn";	

var imageUrl="http://localhost/rtn/api/public";	
*/
var hostUrl="http://roundtablenepal.esy.es";	

var imageUrl="http://roundtablenepal.esy.es/api/public";			

var tableListAPI=hostUrl+"/api/table/get_all";

var searchListAPI=hostUrl+"/api/member/search";

var logoutAPI=hostUrl+"/api/members_panel/logout";

var myDetailsAPI=hostUrl+"/api/members_panel/get_my_profile";

var ApiKey="1234";

window.alert = function(text) {console.log(text)};

	$(document).ready(function(){

	

	});

		

	$('#side_menu').on('click','.ajax_call',function(event){

		event.preventDefault();

		myUrl=this.href;

		loading.show();		

		myAjax(myUrl);

	});

	

	$('#main_container').on('click','.ajax_delete',function(event){

		event.preventDefault();

		if(confirm('Delete Record '+$(this).attr('name')+' permanently'))

		{

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			myAjax(myUrl);

		}

	});

	$('#main_container').on('click','.ajax_details',function(event){

		event.preventDefault();

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			postData=null;

			ch="details";

			myAjaxModal(myUrl,postData,ch);

	});
$('#main_container').on('click','.ajax_news_info',function(event){

		event.preventDefault();

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			postData=null;

			ch="ajax_news_info";

			myAjaxModal(myUrl,postData,ch);

	});

$('#main_container').on('click','.ajax_event_info',function(event){

		event.preventDefault();

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			postData=null;

			ch="ajax_event_info";

			myAjaxModal(myUrl,postData,ch);

	});
$('#main_container').on('click','.ajax_meeting_info',function(event){

		event.preventDefault();

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			postData=null;

			ch="ajax_meeting_info";

			myAjaxModal(myUrl,postData,ch);

	});

	$('#main_container').on('click','.ajax_approve',function(event){

		event.preventDefault();

		if(confirm('Approve '+$(this).attr('name')+' Record'))

		{

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			myAjax(myUrl);

		}

	});

	$('#main_container').on('click','.ajax_reject',function(event){

		event.preventDefault();

		if(confirm('Reject '+$(this).attr('name')+' News'))

		{

			myUrl=this.href;

			loading.show();		

			console.log(myUrl);

			myAjax(myUrl);

		}

	});

	function myAjax(myUrl){

		$.ajax({

		url:myUrl,

		type:"GET",

		success:function(result){

			loading.hide();
            main_container.empty();
			main_container.html(result);
            

		},

		error:function(){

			loading.hide();

			alert("Internal Server Error! please try after some time")

		},

		});	

	}

	



		function myAjaxModal(myurl,postData,ch){

		$.ajax({

			url:myurl,

			data:postData,

			datatype:'json',

			method:'POST',

			success:function(result){

				loading.hide();

				if(ch=="details")

				{

					render_modal(result);

					$('#view_modal').modal('show');

				}
                if(ch=="ajax_news_info")

				{
					render_news_modal(result);
				}
                if(ch=="ajax_event_info")

				{
					render_event_modal(result);
				}
                if(ch=="ajax_meeting_info")

				{
					render_meeting_modal(result);
				}

				

			},

			error:function(){
				loading.hide()
				alert("Internal Server Error! please try after some time");

			},

		});

	}



	function render_modal(result){



			console.log(result.success);

			if(result.success=="true")

			{		

				memb=result.data.member;

				$('#table').html(memb.table_id);

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



	}
function render_news_modal(result){



			console.log(result.success);

			if(result.success=="true")

			{		

				news=result.data.news;

				$('#headline').html(news.headline);

				$('#created_by').html(news.created_by);

				$('#creation_on').html(news.creation_on);

				$('#description').html(news.description);

				$('#image').attr('src',hostUrl+news.big_url);
                for(i=0;i<news.table.length;i++){
                    if(i!=0){$('#tables').append(", ")}
                    $('#tables').append(news.table[i]);
                }
                $('#tables').append(".")
                $('#news_modal').modal('show');
			}
            else{
            alert("Error:"+result.error.Error_Message);
            }



	}
	
function render_event_modal(result){



			console.log(result.success);

			if(result.success=="true")

			{		

				event=result.data.events;

				$('#event_name').html(event.event_name);

				$('#evecreated_by').html(event.created_by);

				$('#event_date').html(event.event_date);

				$('#evedescription').html(event.description);

				$('#eveimage').attr('src',hostUrl+event.big_url);
                
                for(i=0;i<event.table.length;i++){
                    if(i!=0){$('#evetables').append(", ")}
                    $('#evetables').append(event.table[i]);
                }
                $('#evetables').append(".")
                if(event.is_spause==1){
                $('#is_spause').html("<i class='fa fa-check success' ></i>&nbsp;Yes");
                }else{
                $('#is_spause').html("<i class='fa fa-close danger'></i>&nbsp;No");
                }
                if(event.is_children==1){
                $('#is_children').html("<i class='fa fa-check success'></i>&nbsp;Yes");
                }else{
                $('#is_children').html("<i class='fa fa-close danger'></i>&nbsp;No");
                }
                $('#event_modal').modal('show');
			}
            else{
            alert("Error:"+result.error.Error_Message);
            }



	}
function render_meeting_modal(result){



			console.log(result.success);

			if(result.success=="true")

			{		

				event=result.data.events;

				$('#mevent_name').html(event.event_name);

				$('#mevecreated_by').html(event.created_by);

				$('#mevent_date').html(event.event_date);

				$('#mevedescription').html(event.description);

				$('#meveimage').attr('src',hostUrl+event.big_url);
                
                for(i=0;i<event.table.length;i++){
                    if(i!=0){$('#mevetables').append(", ")}
                    $('#mevetables').append(event.table[i]);
                }
                $('#mevetables').append(".")
                if(event.is_spause==1){
                $('#mis_spause').html("<i class='fa fa-check success' ></i>&nbsp;Yes");
                }else{
                $('#mis_spause').html("<i class='fa fa-close danger'></i>&nbsp;No");
                }
                if(event.is_children==1){
                $('#mis_children').html("<i class='fa fa-check success'></i>&nbsp;Yes");
                }else{
                $('#mis_children').html("<i class='fa fa-close danger'></i>&nbsp;No");
                }
                $('#meeting_modal').modal('show');
			}
            else{
            alert("Error:"+result.error.Error_Message);
            }



	}
	
	

	

	

	$("#main_container").on('submit','#edit_form',(function(e) {

			e.preventDefault();

			if($("#edit_form").valid()){

			$('#loading').show();

			myUrl=$(this).attr('action');

			 var form_data = new FormData(this);

			$.ajax({

				url: myUrl, 

				type: "POST",      	

				data:form_data,

				contentType: false,       

				cache: false,             

				processData:false,        

				success: function(data)   

				{

					$('#loading').hide();

					alert("Member Added Successfully");

				},
				error:function(){

					loading.hide();

					alert("Internal Server Error! please try after some time")

		},

			});}

		}));
$("#main_container").on('submit','#upload_form',(function(e) {

			e.preventDefault();

			$('#loading').show();

			myUrl=$(this).attr('action');

			 var form_data = new FormData(this);

			$.ajax({

				url: myUrl, 

				type: "POST",      	

				data:form_data,

				contentType: false,       

				cache: false,             

				processData:false,        

				success: function(data)   

				{

					$('#loading').hide();

					$("#main_container").empty();
                    $("#main_container").html(data);

				},
				error:function(){

					loading.hide();

					alert("Internal Server Error! please try after some time")

		},

			});

		}));