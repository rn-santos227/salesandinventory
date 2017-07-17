<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home">Generic Inventory System</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Dashboard <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li><a href="home"><i class="glyphicon glyphicon-home"></i> &nbsp; Home</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> &nbsp; Overview</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> &nbsp; Reports</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-stats"></i> &nbsp; Analytics</a></li>
              <li><a href="inventory"><i class="glyphicon glyphicon-list"></i> &nbsp; Inventory</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Account <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="{{ route('register') }}">Add Account</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
  </div>
</nav>
