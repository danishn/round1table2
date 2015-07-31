<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Bulk Upload
            <small>Control panel</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
          <div class="col-md-12">
				
		<div class="container-fluid">


 
 
 <div class="row">
            <?php if($this->session->userdata('message')){					

					echo $this->session->userdata('message');

				}?>
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Members</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('__admin/member/bulk_upload');?>" method="post" enctype="multipart/form-data" id="upload_form">
                    <div class="box-body">

                        <input class="btn btn-primary" type="file" name="file" id="file" />	
                    <div class="pull-right">
                         <input type="submit" id="submit_btn"class="btn btn-primary" value="ADD">
                             &nbsp;
                         <a href="#" class="btn btn-default">Cancel</a>
                    </div>
                    </div>
                    <hr>
                </form>
                    
                    
              </div><!-- /.box -->

            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Download Reference Excel File</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <div class="box-body">
                    <a class="btn btn-warning" href="<?php echo base_url('public/files/members/Upload_Members_reference_file.xlsx'); ?>" download>Download Refence Excel File &nbsp;&nbsp;<i class="fa fa-download"></i></a>
                </div>    
                    
              </div><!-- /.box -->

             
         
        </div><!-- /.col-md-6 -->
                  </div><!-- /.row -->

				  	<script>

						

 
	$('input[type=file]').change(function () {
		var val = $(this).val().toLowerCase();
		var regex = new RegExp("(.*?)\.(xls|xlsx)$");
		var fsize = $('#file')[0].files[0].size;
			if(!(regex.test(val))) {
				$(this).val('');
				alert('Unsupported file');
			}
			if(fsize>2048576) {
				$(this).val('');
				alert('Too large File');
			}
	});


						
	</script>