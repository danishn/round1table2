  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Members
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

			<div class="box">	
			<div class="box-header">	
                  <h3 class="box-title">Members </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="member_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Name</td>
						<td>gender</td>
						<td>Table</td>
						<td>email</td>
						<td>status</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php 
					 foreach($members as $member)
					 {
						 echo "<tr>";
						 echo "<td>".$member['member_id']."</td>";
						 echo "<td>".$member['fname']." ".$member['lname']."</td>";
						 echo "<td>".$member['gender']."</td>";
						 echo "<td>".$member['table_id']."</td>";
						 echo "<td>".$member['email']."</td>";
						 echo "<td>";
						 if($member['status']==1){
							 echo "<p class='green-text'>Active</p>";
						 }
						 else
						 {
							echo "<p class='red-text'>In-active</p>"; 
						 }
						 echo "</td>";
                         echo "<td>";
                         echo "<div class='input-group'>";
                         echo "<span class='input-group-btn'>";
						 echo "<a href='".base_url('__admin/member/details?member_id='.$member['member_id'])."' class='btn btn-default ajax_details' style='width:100%'><i class='fa fa-search info'></i>&nbsp;Info</a>";
                         echo "</span><span class='input-group-btn'>";
						 echo "<a href=".base_url('__admin/member/delete?member_id='.$member['member_id'])." class=' btn btn-default ajax_delete' style='width:100%' name='".$member['fname']." ".$member['lname']."'><i class='fa fa-close danger'></i>&nbsp;Delete</a>";
                         echo "</span></div>";
						 echo "</td>";
						 echo "</tr>";
					 }
					 ?>
					 </tr>
                    </tbody>
                    <tfoot>
                      <tr>
						<td>ID</td>
						<td>Name</td>
						<td>gender</td>
						<td>Table</td>
						<td>email</td>
						<td>status</td>
						<td>Actions</td>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  <script>
			  $('#member_table').dataTable();
			  </script>
			  