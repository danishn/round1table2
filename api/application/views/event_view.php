  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Events 
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
		<?php if(isset($events)){?>
			<div class="box">	
			<div class="box-header">	
                  <h3 class="box-title">Pending Events</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="pending_events_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Event Name</td>
						<td>Image</td>
						<td>Event Date</td>
                        <td>Event Time</td>
						<td>Created By</td>
						<td>Event Venue</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php 
					 foreach($events as $event)
					 {

						 echo "<tr>";
                             echo "<td>".$event['id']."</td>";
						  echo "<td>".$event['event_name']."</td>";
						 echo "<td>"."<img src='".base_url('../'.$event['thumb_url'])."' height='25px'>"."</td>";
						 echo "<td>".$event['event_date']."</td>";
						 echo "<td>".$event['event_time']."</td>";
						 echo "<td>".$event['created_by']."</td>";
                             echo "<td>".$event['event_venue']."</td>";
                             
                             echo "<td>";
                         echo "<div class='input-group'>";
                         echo "<span class='input-group-btn'>";
						 echo "<a href='".base_url('__admin/event/info?event_id='.$event['id'])."' class='btn btn-default ajax_event_info' name='".$event['event_name']."'><i class='fa fa-search info'></i>&nbsp;Info</a>";
                         echo "</span><span class='input-group-btn'>";
                         echo "<a href='".base_url('__admin/event/approve?event_id='.$event['id'])."' class='btn btn-default ajax_approve' name='".$event['event_name']."'><i class='fa fa-check success'></i>&nbsp;Approve</a>";
                         echo "</span><span class='input-group-btn'>";
                         echo "<a href='".base_url('__admin/event/reject?event_id='.$event['id'])."' class='btn btn-default ajax_reject' name='".$event['event_name']."'><i class='fa fa-close warning'></i>&nbsp;Reject</a>";
                         echo "</span><span class='input-group-btn'>";
						 echo "<a href=".base_url('__admin/event/delete?event_id='.$event['id'])." class=' btn btn-default ajax_delete' name='".$event['event_name']."'><i class='fa fa-close danger'></i>&nbsp;Delete</a>";
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
	<?php if(isset($approved_events)){?>
		</div>
		</div>
		</div> </div>   
	<div class="row">		
		<div class="col-md-12">
				
		<div class="container-fluid">

          <div class="row">   
		   


			<div class="box">	
			<div class="box-header">	
                  <h3 class="box-title">Approved Events</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="approved_events_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Event Name</td>
						<td>Image</td>
						<td>Event Date</td>
                        <td>Event Time</td>
						<td>Created By</td>
						<td>Event Venue</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php 
					 foreach($approved_events as $event)
					 {
						 echo "<tr>";
                             echo "<td>".$event['id']."</td>";
						  echo "<td>".$event['event_name']."</td>";
						 echo "<td>"."<img src='".base_url('../'.$event['thumb_url'])."' height='25px'>"."</td>";
						 echo "<td>".$event['event_date']."</td>";
						 echo "<td>".$event['event_time']."</td>";
						 echo "<td>".$event['created_by']."</td>";
                             echo "<td>".$event['event_venue']."</td>";
                             
                             echo "<td>";
                         echo "<div class='input-group'>";
                         echo "<span class='input-group-btn'>";
						 echo "<a href='".base_url('__admin/event/info?event_id='.$event['id'])."' class='btn btn-default ajax_event_info' name='".$event['event_name']."'><i class='fa fa-search info'></i>&nbsp;Info</a>";
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
			   $('#pending_events_table').dataTable();
			  $('#approved_events_table').dataTable(); 
			  </script>
			  