<body class="skin-green sidebar-mini">
<div class="modal" id="view_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="name"></h4>
                  </div>
                  <div class="modal-body">

				 
						<div class="box-body">
						  <table class="table table-bordered">
							<tr>
								<td colspan="2" rowspan="6"><img id="profile_pic" src="../api/public/images/big/members/default.jpg" class="img-circle" height=130px alt="User Image" /></td>
							</tr>
							<tr>
							 <th>Gender</th><td id="gender"></td>
							 </tr>
							 <tr>
							 <th>date of Birth</th><td id="dob"></td>
							 </tr>
							 <tr>
							 <th>Blood Group</th><td id="blood_group"></td>
							 </tr>
							 <tr>
							 <th>Mobile</th><td id="mobile"></td>
							 </tr>
							 <tr>
							 <th>Table</th><td id="table"></td>
							 </tr>
							 <tr>
							 <th>Spouse Name</th><td id="spouse_name"></td><th></th><td id="anniversary_date"></td>
							 </tr>
							 <tr>
								<th>Resident Phone</th><td id="res_phone"></td><th>Email</th><td id="email"></td>
							 </tr>
	
						  </table>
					</div><!-- /.box-body -->
					
				</div>
                  <div class="modal-footer">
					 <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    <div class="modal" id="news_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="headline"></h4>
                  </div>
                  <div class="modal-body">

				 
						<div class="box-body">
						  <table class="table table-bordered">
							<tr>
								<td colspan="2" rowspan="5"><img id="image" src="../api/public/images/big/rtn.jpg"  height=130px alt="User Image" /></td>
                                <th>Created By</th><td id="created_by"></td>
							</tr>
                              <tr>
							 <th>Created On</th><td id="creation_on"></td>
							 </tr>
							<tr>
							 <th colspan="2">Description</th>
							 </tr>
							 <tr>
							 <td colspan="2"  id="description"></td>
							 </tr>
                              <tr>
							 
							 </tr>
                              <tr>
							 <th >Tables</th><td colspan="3"  id="tables"></td>
							 </tr>
                             
						  </table>
					</div><!-- /.box-body -->
					
				</div>
                  <div class="modal-footer">
					 <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
     <div class="modal" id="event_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="event_name"></h4>
                  </div>
                  <div class="modal-body">

				 
						<div class="box-body">
						  <table class="table table-bordered">
							<tr>
								<td colspan="2" rowspan="5"><img id="eveimage" src="../api/public/images/big/rtn.jpg"  height=130px alt="User Image" /></td>
                                <th>Created By</th><td id="evecreated_by"></td>
							</tr>
                              <tr>
							 <th>Event Date</th><td id="event_date"></td>
							 </tr>
							<tr>
							 <th colspan="2">Description</th>
							 </tr>
							 <tr>
							 <td colspan="2"  id="evedescription"></td>
							 </tr>
                              <tr>
							 
							 </tr>
                              <tr>
							 <th >Tables</th><td colspan="3"  id="evetables"></td>
							 </tr>
                              </tr>
                              <tr>
							 <th >Is for Spouse</th><td colspan="3"  id="is_spause"></td></tr><tr>
                                  <th >Is for Children</th><td colspan="3"  id="is_children"></td>
							 </tr>
                             
						  </table>
					</div><!-- /.box-body -->
					
				</div>
                  <div class="modal-footer">
					 <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
<div class="modal" id="meeting_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mevent_name"></h4>
                  </div>
                  <div class="modal-body">

				 
						<div class="box-body">
						  <table class="table table-bordered">
							<tr>
                                <th>Created By</th><td id="mevecreated_by"></td>
							</tr>
                              <tr>
							 <th>Event Date</th><td id="mevent_date"></td>
							 </tr>
							<tr>
							 <th>Description</th><td id="mevedescription"></td>
							 </tr>
                              <tr>
							 <th >Tables</th><td id="mevetables"></td>
							 </tr>
                              </tr>
                              <tr>
							 <th>Is for Spouse</th><td id="mis_spause"></td></tr><tr>
                                  <th >Is for Children</th><td id="mis_children"></td>
							 </tr>
                             
						  </table>
					</div><!-- /.box-body -->
					
				</div>
                  <div class="modal-footer">
					 <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
 <div id="loading" style="display:none;position:fixed;height:100%;width:100%;bottom:0px; background-color:rgba(23,23,23,0.20); z-index:99998;" ><img src="<?php echo base_url('public/admin_images/loading.gif')?>" style="position:absolute;left:50%;top:50%; background-color:rgba(23,23,23,0); z-index:99999;"></div>
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo pull-left">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>RTN</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>RTN</b>Nepal</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
           
              <!-- Tasks: style can be found in dropdown.less -->
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('public/images/big/members/default.jpg')?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('public/images/big/members/default.jpg')?>" class="img-circle" alt="Admin" />
                    <p>
                      Round Table Nepal
                      <small>Admin</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                 <li class="user-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
					  <div class="btn-group" role="group">
						<button type="button" class="btn btn-app" data-toggle="modal" data-target="#password_modal"><i class="fa fa-pencil"></i>Edit</button>
					  </div>
					  <div class="btn-group" role="group">
					  <form id="sign_out_form" action="<?php echo base_url('__admin/logout')?>">
						<button type="submit" class="btn btn-app"><i class="fa fa-sign-out"></i>Sign-out</button></form>
					  </div>
					</div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
       
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('public/admin_images/rtn_logo_symbol.png')?>" style="height:100%" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Admin Portal</p>
			  <i class="fa fa-circle text-success"></i>&nbsp;live
            </div>
          </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" id="side_menu">
            <li class="header">MAIN NAVIGATION</li>
			<li class="active">
              <a href="<?php echo base_url('__admin/home?ajax=yes');?>" class="ajax_call">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
			<li >
              <a href="<?php echo base_url('__admin/access_request');?>" class="ajax_call">
                <i class="fa fa-users"></i> <span>Access Requests</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Members</span>
				<i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('__admin/member');?>" class="ajax_call"><i class="fa fa-circle-o"></i> View Members</a></li>
                <li>
                <a href=""><i class="fa fa-circle-o"></i> Add Members <i class="fa fa-angle-right pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('__admin/member/add_form');?>"  class="ajax_call"><i class="fa fa-circle-o"></i> Single Upload</a></li>
                    <li>
                      <a href="<?php echo base_url('__admin/member/bulk_form');?>"  class="ajax_call"><i class="fa fa-circle-o"></i> Bulk Upload</a>
                    </li>
                  </ul>
				</li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url('__admin/news');?>" class="ajax_call">
                <i class="fa fa-newspaper-o"></i> <span>News</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('__admin/event');?>" class="ajax_call">
                <i class="fa fa-globe"></i> <span>Events</span> 
              </a>
            </li>
              <li>
              <a href="<?php echo base_url('__admin/meeting');?>" class="ajax_call">
                <i class="fa fa-users"></i> <span>Meetings</span> 
              </a>
            </li>
            <li >
              <a href="<?php echo base_url('__admin/gallery');?>" class="ajax_call">
                <i class="fa fa-image"></i> <span>Photo Gallery</span> 
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div id="main_container" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
          <div class="col-md-12">
				
		<div class="container-fluid">

          <div  class="row">
           
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>117</h3>
                  <p>Members</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                 </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>11</h3>
                  <p>News</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-paper"></i>
                </div>
                  </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>Meetings</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
                 </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Events</p>
                </div>
                <div class="icon">
                  <i class="ion ion-earth"></i>
                </div>
                </div>
          </div>
          </div><!-- /.row --> 
		  </div>
		</div>
		</div>

       
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="#">RTN</a>.</strong> All rights reserved.
      </footer>
      
    </div><!-- ./wrapper -->

  