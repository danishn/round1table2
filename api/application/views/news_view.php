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
		<?php if(isset($pending_news)){?>
			<div class="box box-default">	
			<div class="box-header">	
                  <h3 class="box-title">Pending News</h3>
                                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="pending_news_table" class="table display table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Headline</td>
						<td>Created On</td>
						<td>Upoaded By</td>
						<td>Tables</td>
                        <td>Image</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php
					 foreach($pending_news as $news)
					 {
						 echo "<tr>";
						 echo "<td>".$news['id']."</td>";
						 echo "<td>".$news['headline']."</td>";
                         echo "<td>".$news['creation_on']."</td>";
						 echo "<td>".$news['created_by']."</td>";
                         echo "<td>".$news['table_count']."</td>";
						 echo "<td>"."<img src='".base_url('../'.$news['thumb_url'])."' height='25px'>"."</td>";
						 echo "<td>";
                         echo "<div class='input-group'>";
                         echo "<span class='input-group-btn'>";
						 echo "<a href='".base_url('__admin/news/info?news_id='.$news['id'])."' class='btn btn-default ajax_news_info' name='".$news['headline']."'><i class='fa fa-search info'></i>&nbsp;Info</a>";
                         echo "</span><span class='input-group-btn'>";
                         echo "<a href='".base_url('__admin/news/approve?news_id='.$news['id'])."' class='btn btn-default ajax_approve' name='".$news['headline']."'><i class='fa fa-check success'></i>&nbsp;Approve</a>";
                         echo "</span><span class='input-group-btn'>";
                         echo "<a href='".base_url('__admin/news/reject?news_id='.$news['id'])."' class='btn btn-default ajax_reject' name='".$news['headline']."'><i class='fa fa-close warning'></i>&nbsp;Reject</a>";
                         echo "</span><span class='input-group-btn'>";
						 echo "<a href=".base_url('__admin/news/delete?news_id='.$news['id'])." class=' btn btn-default ajax_delete' name='".$news['headline']."'><i class='fa fa-close danger'></i>&nbsp;Delete</a>";
                         echo "</span></div>";
						 echo "</td>";
						 echo "</tr>";
					 }
   
					 ?>
					 </tr>

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		<?php }?><script>
			   $('#pending_news_table').dataTable();

			  </script>
	<?php if(isset($archive_news)){?>
		</div>
		</div>
		</div> </div>   
             
	<div class="row">		
		<div class="col-md-12">
				
		<div class="container-fluid">

          <div class="row">   
		   


			<div class="box box-default">	
			<div class="box-header">	
                  <h2 class="box-title">Approved News</h2>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="archive_news_table" class="table display table-bordered table-hover">
                    <thead>
                      <tr>
						<td>ID</td>
						<td>Headline</td>
						<td>Created On</td>
						<td>Upoaded By</td>
						<td>Tables</td>
                        <td>Image</td>
						<td>Actions</td>						
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
					 <?php 
					  foreach($archive_news as $news)
					 {
						 echo "<tr>";
						 echo "<td>".$news['id']."</td>";
						 echo "<td>".$news['headline']."</td>";
                         echo "<td>".$news['creation_on']."</td>";
						 echo "<td>".$news['created_by']."</td>";
                         echo "<td>".$news['table_count']."</td>";
						 echo "<td>"."<img src='".base_url('../'.$news['thumb_url'])."' height='25px'>"."</td>";
						 echo "<td>";
						 echo "<a href=".base_url('__admin/news/info?news_id='.$news['id'])." class=' btn btn-default ajax_news_info' name='".$news['headline']."'><i class='fa fa-search info'></i>&nbsp;Info</a>";
                         echo "</div>";
						 echo "</td>";
						 echo "</tr>";
					 }
					 ?>
					 </tr>
                    </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		<?php }?>
			  <script>
			   $('#archive_news_table').dataTable();
                //  $('table.display').dataTable();

			  </script>
			  