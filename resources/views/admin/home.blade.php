@extends('layouts.app')

@section('content')
 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-0">
        <div class="nav-side-menu submenu">
          @include('admin.sidenav')
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">User Profile Page</h1>

      <div class="container-fluid">
          <div class="row profile">
      		<div class="col-md-3">
      			<div class="profile-sidebar">
      				<!-- SIDEBAR USERPIC -->
      				<div class="profile-userpic">
      					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="">
      				</div>
      				<!-- END SIDEBAR USERPIC -->
      				<!-- SIDEBAR USER TITLE -->
      				<div class="profile-usertitle">
      					<div class="profile-usertitle-name">
      						Marcus Doe
      					</div>
      					<div class="profile-usertitle-job">
      						Developer
      					</div>
      				</div>
      				<!-- END SIDEBAR USER TITLE -->
      				<!-- SIDEBAR BUTTONS -->
      				<div class="profile-userbuttons">
      					<button type="button" class="btn btn-success btn-sm profile">Task</button>
      					<button type="button" class="btn btn-danger btn-sm profile">Messages</button>
      				</div>
      				<!-- END SIDEBAR BUTTONS -->
      				<!-- SIDEBAR MENU -->
      				<div class="profile-usermenu">
      					<ul class="nav">
      						<li class="active">
      							<a href="#">
      							<i class="glyphicon glyphicon-home"></i>
      							Overview </a>
      						</li>
      						<li>
      							<a href="#">
      							<i class="glyphicon glyphicon-user"></i>
      							Account Settings </a>
      						</li>
      						<li>
      							<a href="#" target="_blank">
      							<i class="glyphicon glyphicon-ok"></i>
      							Notes </a>
      						</li>
      						<li>
      							<a href="#">
      							<i class="glyphicon glyphicon-flag"></i>
      							Help </a>
      						</li>
      					</ul>
      				</div>
      				<!-- END MENU -->
      			</div>
      		</div>
      		<div class="col-md-9">
              <div class="profile-content">
                    <h1 class="page-header">Dashboard</h1>
                    <div class="row placeholders">
                      <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#">
                          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Overview</h4>
                        <span class="text-muted">Overview of the Company</span>
                      </div>
                      <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#">
                          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Reports</h4>
                        <span class="text-muted">Printable Documents and Reports</span>
                      </div>
                      <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="#">
                          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Analytics</h4>
                        <span class="text-muted">Company Progress Analysis</span>
                      </div>
                      <div class="col-xs-6 col-sm-3 placeholder">
                        <a href="invent">
                          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Inventory</h4>
                        <span class="text-muted">Inventory Status Report</span>
                      </div>
                    </div>
                  </div>
      		</div>
      	</div>
      </div>
    </div>
 </div>
    @include('admin.sidenav') 
@endsection

