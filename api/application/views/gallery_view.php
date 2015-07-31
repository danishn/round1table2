  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            News
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
		<?php if(isset($updates)){?>
			<div class="box">	
			<div class="box-header">	
                  <h3 class="box-title">Image Gallery</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="updates_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Image Name</td>
						<td>Description</td>
						<td>Uploaded By</td>
						<td>Submit Date</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php 
					 foreach($updates as $update)
					 {
						 echo "<tr>";
						 echo "<td>".$update['id']."</td>";
						 echo "<td>".$update['image_name']."</td>";
						 echo "<td>".$update['image_description']."</td>";
						 echo "<td>".$update['created_by']."</td>";
                         echo "<td>".$update['submit_date']."</td>";
						 echo "<td>";
						 echo "<span class='input-group-btn'>";
						 echo "<a href=".base_url('__admin/gallery/delete?image_id='.$update['id'])." class=' btn btn-default ajax_delete' name='".$update['image_name']."'><i class='fa fa-close danger'></i>&nbsp;Delete</a>";
                         echo "</span></div>";
						 echo "</td>";
						 echo "</tr>";
					 }
					 ?>
					 </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		<?php }?>
	
			  <script>
			  $('#updates_table').dataTable({
  "columnDefs": [ {
    "targets": [ 0 ],
    "data": null,
    "defaultContent": "Click to edit"
  } ]
});
			  /* $('#archive_news_table').dataTable(); */
			  </script>
			  