  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Access Requests
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
                  <h3 class="box-title">New Reqests</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="member_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Name</td>
						<td>Email</td>
						<td>Table Name</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php 
					 foreach($members as $member)
					 {
						 echo "<tr>";
						 echo "<td>".$member['request_id']."</td>";
						 echo "<td>".$member['name']."</td>";
						 echo "<td>".$member['email']."</td>";
						 echo "<td>".$member['table_name']."</td>";
						 echo "<td>";
						 echo "<a href='".base_url('__admin/member/approve?request_id='.$member['request_id'])."' class='ajax_approve'><i class='fa fa-check success' name='".$member['name']."'></i></a>";
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
						<td>Email</td>
						<td>Table Name</td>
						<td>Actions</td>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  <script>
			  $('#member_table').dataTable();
			  </script>
			  